<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PollController extends Controller
{
    Public Function poll()
    {
        return view('dashboard.poll');
    }

    Public Function create(Request $request)
    {
        $Validate = $request->validate([
            'questions' => 'required',
            'opens' => 'required',
            'closes' => 'required'
        ]);

        $poll = new Poll();
        $poll->questions = $request->questions;
        $poll->opens = $request->opens;
        $poll->closes = $request->closes;
        $poll->user_id = auth()->user()->id;
        $poll->save();
        return back();
    }

    
    public function polls()
    {
        $polls = Poll::active()->with('options')->get();
        return view('dashboard.polls',compact('polls'));
    }

    public function singlePoll($id)
    {
        $polls = Poll::where('id',$id)->first();
        return view('dashboard.singlepoll',compact('polls'));
    }


}
