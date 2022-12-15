<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Poll;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function create(Request $request)
    {
        // dd($request->all());
        $vote = new Vote();
        $vote->user_id = auth()->user()->id;
        $vote->poll_id = $request->poll_id;
        $vote->option_id = $request->option_id;
        $vote->save();
        return back();
    }

    public function showMap($id)
    {
        $a = array();
        $poll = Poll::where('id', $id)->with('options')->first();
        foreach ($poll->options as $option) {
            array_push($a, $option->option);
        }
        // dd($a);
        $voteCount = Vote::where('poll_id', $id)->get()->groupBy('option_id')->map(function ($items) {
          $santosh =  $items->count();
            return $santosh;
        })->values();
        
        // foreach($poll->options as $option)
        // {
        //     array_push($voteCount, $option->id);
        // }
        // dd($voteCount);
        ;
        $option = $a;
        $vote = $voteCount;
        return view('frontend.count', ['options' => $option, 'votes' => $vote]);
    }
}