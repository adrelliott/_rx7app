<?php

use App\Http\Controllers\RespondToInvitationController;
use Illuminate\Support\Facades\Route;

/*
| Routes for visitors taking a survey 
|--------------------------------------------------------------------------
*/
Route::domain('surveys.' . config('app.domain'))->group(function () {
    
    Route::get('/{invitation}', RespondToInvitationController::class)
        ->name('show-survey')
        ->middleware('signed');
    
    Route::get('/', function() {
        return view('responses.homepage');
    })->name('survey-homepage');
});


/*
| Routes for all non-logged-in visitors 
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
| Routes for logged-in-users
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




require __DIR__.'/auth.php';
