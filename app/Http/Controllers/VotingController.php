<?php

namespace App\Http\Controllers;
use App\Voter;
use App\Voting;
use App\VotingCandidate;
use App\VotingPosition;
use Validate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class VotingController extends Controller
{
    //Voter Registration
    public function voterRegister(Request $request){
        
        $request->validate([
            'nric' => 'required',
        ]);

        $checkNric = Voter::where('NRIC',$request->nric)->first();

        if($checkNric){
            return redirect('/voterRegister')->with('error', $request->nric.' is registered.');
        }else{
        $storeNric = new Voter();
        $storeNric->NRIC = $request->nric;
        $storeNric->save();
        }

        return redirect('/voterRegister')->with('status','Registered for '.$request->nric);
    }

    //registered voter list
    public function VoterList(){

        $voterCount = Voter::count();

    return view('voter', [
        'voterCount' => $voterCount]);
    }

    //Add Position
    public function addPosition(Request $request){

        $request->validate([
            'positionNm' => 'required',
        ]);

        $addPosition = new VotingPosition();
        $addPosition->positionNm = $request->positionNm;
        $addPosition->save();

        return redirect('/managePosition')->with('status','Position '.$request->positionNm.' is added!');
    }

    //manage position page
    public function managePosition(){
        $managePosition = VotingPosition::get();

        return view('managePosition', [
            'managePositions' => $managePosition]);
    }

    //manage candidate page
    public function manageCandidate(){
        $manageCandidate = VotingCandidate::get();

        return view('manageCandidate', [
            'manageCandidates' => $manageCandidate]);
    }

    //Add candidate page
    public function addCandidatePage(){

        $candidate = VotingCandidate::get();
        $managePosition = VotingPosition::get();


        return view('addCandidate', [
            'addCandidates' => $candidate,
            'managePositions' => $managePosition
    ]);
    }

    //Add people to Position
    public function addCandidate(Request $request){

        $request->validate([
            'candidateNm' => 'required',
            'candidatePos' => 'required',
        ]);

        $addCandidate = new VotingCandidate();
        $addCandidate->candidateNm = $request->candidateNm;
        $addCandidate->candidatePos = $request->candidatePos;
        $addCandidate->save();

        return redirect('/manageCandidate')->with('status','Candidate '.$request->candidateNm.' is added!');
    }

    //Voting Page
    public function votingPage(){

        $votingPosition = VotingPosition::get();

        return view('votingPage', [
            'votingPositions' => $votingPosition
        ]);
    }

    public function finalVotingPage($id){

        $finalVotingPage = VotingCandidate::where('candidatePos',$id)->get();
        $candidatePosition = VotingPosition::find($id)->positionNm;

        return view('finalVotingPage', [
            'finalVotingPages' => $finalVotingPage,
            'candidatePosition' => $candidatePosition
        ]);

    }

    //Submit Voting
    public function submitVoting(Request $request)
{
    $request->validate([
        'candidate' => 'required',
        'nric' => 'required|string|max:12', // Assuming NRIC is a string and has a maximum length of 12 characters.
    ]);
    
    $candidateProfile = VotingCandidate::find($request->candidate);

    $checkVoter = Voter::where('NRIC',$request->nric)->first();
    if($checkVoter){
    $checkVoting = Voting::where('nric',$request->nric)->where('votePosition',$candidateProfile->candidatePos)->first();
    }else{
        return redirect('/finalVotingPage/'.$candidateProfile->candidatePos)->with('error', 'NRIC is not registered!');
    }

    if($checkVoting == null){
    $voting = new Voting();
        $voting->votePosition = $candidateProfile->candidatePos; // Assuming you have a variable $candidatePos set in the controller.
        $voting->voteCandidate = $candidateProfile->candidateNm; // Assuming you have a variable $candidateNm set in the controller.
        $voting->nric = $request->nric;
        $voting->save();
        return redirect('/finalVotingPage/'.$candidateProfile->candidatePos)->with('success', 'Voting submitted successfully!');
    }else{
        return redirect('/finalVotingPage/'.$candidateProfile->candidatePos)->with('error', 'This NRIC has voted for this Position!');
    }
    
}
}
