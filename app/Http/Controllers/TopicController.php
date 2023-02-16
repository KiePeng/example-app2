<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index(){
        $topics = Topic::with(['user'])->get();
            //  dd($posts);
        return view('topic.index', ['topics' => $topics]);

    }
}
