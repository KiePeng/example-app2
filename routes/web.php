<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\TopicController as AdminTopicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\TopicController;
use App\Models\Topic;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [TopicController::class, 'index'])->name('topic.index');
        Route::get('/create', [TopicController::class, 'create'])->name('topic.create');
        Route::post('/create', [TopicController::class, 'store'])->name('topic.store');
        Route::get('{id}', [TopicController::class, 'show'])->name('topic.show');


        Route::get('{id}/reply/create', [ReplyController::class, 'create'])->name('topic.reply.create');
        Route::post('{id}/reply/create', [ReplyController::class, 'store'])->name('topic.reply.store');
        Route::put('{id}/{topic_id}/like',[ReplyController::class,'like'])->name('topic.reply.like');

    });

    Route::middleware('admin')->group(function () {
        Route::group(['prefix' => 'admin'], function () {
            Route::get('/', [AdminTopicController::class, 'index'])->name('admin.index');
        });
    });
});

require __DIR__ . '/auth.php';
