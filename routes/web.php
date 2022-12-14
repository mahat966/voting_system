<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\VoteController;
use App\Models\Poll;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::get('/', function () {
    return view('welcome');
});


// User login Route
Route::get('auth/register', [AdminController::class, 'register'])->name('auth.register');
Route::get('auth/login', [AdminController::class, 'login'])->name('login');
Route::post('/auth/save',[AdminController::class,'save'])->name('auth.save');
Route::post('/auth/check',[AdminController::class,'check'])->name('auth.check');
Route::get('/auth/logout',[AdminController::class,'logout'])->name('logout');

// poll route
Route::get('dashboard/poll', [PollController::class, 'poll'])->name('poll');
Route::post('dashboard/create', [PollController::class, 'create'])->name('create.poll');
Route::get('dashboard/polls', [PollController::class,'polls']);
Route::get('dashboard/singlepoll/{id}', [PollController::class, 'singlePoll'])->name('cast.vote');


//option route
Route::get('dashboard/option', [OptionController::class, 'view'])->name('options');
Route::post('dashboard/option/create', [OptionController::class, 'create'])->name('create.option');

//vote route
Route::post('dashboard/vote', [VoteController::class, 'create'])->name('cast.answer');
Route::get('frontend/count/{id}',[VoteController::class,'showMap']);