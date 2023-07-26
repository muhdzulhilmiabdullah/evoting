@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Position Registration</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                    

                    <div class="row">
                        <form action="{{ route('addPosition') }}" method="post">
                            @csrf
                            <div class="col-md-6 center-vertically">
                                <div class="input-group">
                                    <input type="text" name="positionNm" class="form-control"
                                        placeholder="Add Position">
                                </div>
                            </div>
                            <div class="col-md-6 center-both">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>






@stop
