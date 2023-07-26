@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Candidate</div>

                <div class="card-body">
                    <form action="{{ route('addCandidate') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="candidateNm">Candidate Name:</label>
                            <input type="text" id="candidateNm" name="candidateNm" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="candidatePos">Candidate Position:</label>
                            <select id="candidatePos" name="candidatePos" class="form-control" required>
                                <option value="">--Select Position--</option>
                                @foreach ($managePositions as $position)
                                    <option value="{{ $position->id }}">{{ $position->positionNm }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Candidate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
