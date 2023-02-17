<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index(){

        //  dd($topics);
        return view('admin.index');
    }
}
