<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\TopicController as AdminTopicController;
use App\Http\Controllers\ProfileController;
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

    Route::group(['prefix' => 'user'], function(){
        Route::get('/',[TopicController::class,'index'])->name('topic.index');
    });

    Route::middleware('admin')->group(function(){
    Route::group(['prefix' => 'admin'], function(){
            Route::get('/',[AdminTopicController::class,'index'])->name('admin.index');
        });

    });
});

require __DIR__.'/auth.php';
