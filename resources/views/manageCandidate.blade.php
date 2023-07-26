@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Candidate List</div>

                <div class="card-body">
                    <a href="{{ route('addCandidatePage') }}" class="btn btn-primary mb-3">Add Candidate</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Position</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($manageCandidates as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->candidateNm }}</td>
                                    <td>{{App\VotingPosition::find($item->candidatePos)->positionNm}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
