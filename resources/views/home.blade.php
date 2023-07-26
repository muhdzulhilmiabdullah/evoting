@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                    <a type="button" href="{{ route('VoterList')}}" class="btn btn-primary">Voter Count</a>
                    </div>
                    <div class="card">
                    <a type="button"  href="{{ route('managePosition')}}" class="btn btn-primary">Manage Position</a>
                    </div>
                    <div class="card">
                    <a type="button" href="{{ route('manageCandidate')}}" class="btn btn-primary">Manage Candidate</a>
                    </div>
                    <div class="card">
                    <a type="button" href="{{ route('votingPage')}}" class="btn btn-primary">Voting Page</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
