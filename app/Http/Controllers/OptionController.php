<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Poll;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    //
    public function view(request $request)
    {
        $polls = Poll::all();
        return view('dashboard.option',compact('polls'));
    }
    Public Function create(Request $request)
    {

        // dd($request->all());
        $Validate = $request->validate([
            'poll_id' => 'required',
            'option' => 'required',
        ]);

        $option = new Option();
        $option->user_id = auth()->user()->id;
        $option->poll_id = $request->poll_id;
        $option->option = $request->option;
        $option->save();
        return back();
    }
}
