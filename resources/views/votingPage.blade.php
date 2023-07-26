@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Voting Page</div>

                <div class="card-body">
                    @foreach ($votingPositions as $item)
                            <h3>Position: {{ $item->positionNm }}</h3><br>
                            <!-- You can add any other information related to the position here -->
                            <a type="button" class="btn btn-primary" href="{{ route('finalVotingPage', $item->id) }}">Click to Vote</a>
                        <br>
                    @endforeach
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection
