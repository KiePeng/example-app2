<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;

class MyTopicController extends Controller
{
    public function index(){

        $user_id = Auth::user()->id;
        $topic = Topic::with('user','replies')->where('user_id',$user_id)->get();
        //dd($topic);
        return view('myTopic.index', ['topic' => $topic]);
    }

    public function destroy(Request $request, $id){
        $topic = Topic::Find($id)->delete();

        return redirect(route('myTopic.index'));

    }
}
