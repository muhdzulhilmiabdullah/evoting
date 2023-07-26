@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Final Voting Page</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('submitVoting') }}" method="post" id="votingForm">
                        @csrf

                        <h3>{{ $candidatePosition }}</h3>
                        <div class="form-group">
                            <select class="form-control" name="candidate" required>
                                <option value="" selected disabled>Select a candidate</option>
                                @foreach ($finalVotingPages as $item)
                                    <option value="{{ $item->id }}">{{ $item->candidateNm }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- NRIC field -->
                        <div class="form-group">
                            <input type="text" class="form-control" name="nric" placeholder="Enter your IC for confirmation!" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit Vote</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
