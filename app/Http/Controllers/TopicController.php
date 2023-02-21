<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::with('user','replies')->get();
        //dd($topics);
        //$date = $topics->latest('upload_time')->first();;

        return view('topic.index', ['topics' => $topics]);
    }

    public function create(Request $request)
    {
        return view('topic.create');
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        Topic::create([
            'user_id' => $user_id,
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect(route('topic.index'));
    }

    public function show($id)
    {

        $topic = Topic::with('user')->FindOrFail($id);
        $reply = Reply::with('user','likes')->where('topic_id', $id)->paginate(4);
        //dd($reply);
        return view('topic.show', ['topic' => $topic, 'reply' => $reply]);
    }


}
