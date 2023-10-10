@extends('views.layouts.guest')

@section('title', '404 Page Not Found')

@section('content')
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card">
            <div class="card-block">
                <div class="ex-page-content text-center">
                    <h1 class="">404!</h1>
                    <h3 class="">Sorry, page not found</h3>
                    <br>
                    <div class="error-desc mb-3 mb-sm-4 mb-md-5">
                        The page you're looking for doesn't exist.
                    </div>
                    <a class="btn btn-info mb-5 waves-effect waves-light" href="{{ route('backend.dashboard') }}">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
@endsection

