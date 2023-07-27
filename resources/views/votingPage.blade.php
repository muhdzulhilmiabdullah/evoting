@extends('layouts.publicapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Voting Page</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Position</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($votingPositions as $item)
                                <tr>
                                    <td class="text-center">
                                        <h3>{{ $item->positionNm }}</h3>
                                        <!-- You can add any other information related to the position here -->
                                    </td>
                                    <td class="text-center">
                                        <a type="button" class="btn btn-primary d-flex justify-content-center" href="{{ route('finalVotingPage', $item->id) }}">Click to Vote</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection
