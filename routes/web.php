<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/voterRegister', function () {
    return view('voterRegister');
});

Route::get('/addPositionPage', function () {
    return view('addPosition');
})->name('addPositionPage');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/managePosition', 'VotingController@managePosition')->name('managePosition');
Route::get('/manageCandidate', 'VotingController@manageCandidate')->name('manageCandidate');
Route::get('/votingPage', 'VotingController@votingPage')->name('votingPage');


Route::post('/voteRegistration', 'VotingController@voterRegister')->name('voterRegister');
Route::get('/voterCount', 'VotingController@VoterList')->name('VoterList');
Route::post('/addPosition', 'VotingController@addPosition')->name('addPosition');
Route::get('/addCandidate', 'VotingController@addCandidatePage')->name('addCandidatePage');
Route::post('/addCandidate', 'VotingController@addCandidate')->name('addCandidate');
Route::get('/finalVotingPage/{id}', 'VotingController@finalVotingPage')->name('finalVotingPage');
Route::post('/submitVoting', 'VotingController@submitVoting')->name('submitVoting');





