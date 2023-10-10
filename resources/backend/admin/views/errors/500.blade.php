@extends('views.layouts.guest')

@section('title', '500 Server Error')

@section('content')
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card">
            <div class="card-block">
                <div class="ex-page-content text-center">
                    <h1 class="">500!</h1>
                    <h3 class="">Internal Server Error</h3>
                    <br>
                    <a class="btn btn-info mb-5 waves-effect waves-light" href="{{ route('backend.dashboard') }}">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
@endsection

