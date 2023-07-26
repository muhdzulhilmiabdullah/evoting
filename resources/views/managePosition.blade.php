@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Position List</div>

                <div class="card-body">
                    <a href="{{ route('addPositionPage') }}" class="btn btn-primary mb-3">Add Position</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Position</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($managePositions as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->positionNm }}</td>
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
