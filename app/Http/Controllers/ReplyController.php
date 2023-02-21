<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReplyController extends Controller
{
    public function create(Request $request, $id)
    {
        $topic = Topic::with('user')->findOrFail($id);
        return view('topic.reply.create', ['topic' => $topic]);
    }

    public function store(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $topic = Topic::with('user')->findOrFail($id);
        $reply = Reply::with('user')->where('topic_id', $id)->paginate(3);

        $request->validate([
            'content' => 'required',
        ]);
        //dd($request );
        Reply::create([
            'user_id' => $user_id,
            'topic_id' => $id,
            'reply_content' => $request->content,

        ]);
        return redirect(route('topic.show', ['id' => $id, 'topic' => $topic, 'reply' => $reply]));
    }

    public function like(Request $request, $id, $topic_id){
        $user_id = Auth::user()->id;
        $like = $request->like;
        $reply = Reply::find($id);
        //dd($reply);

        if ($like && boolval($request->like)===true) {
            $reply->likes()->attach($user_id);

        }
        else{
            $reply->likes()->detach($user_id);

        }
        return redirect(route('topic.show',[$topic_id]));
    }
}
