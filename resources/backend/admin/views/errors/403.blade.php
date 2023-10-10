@extends('views.layouts.guest')

@section('title', '403 Error Page')

@section('content')
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card">
            <div class="card-block">
                <div class="ex-page-content text-center">
                    <h1 class="">403!</h1>
                    <h3 class="">Forbidden</h3>
                    <div class="error-desc mb-3 mb-sm-4 mb-md-5">
                        You don’t have permission to access this route.
                    </div>
                    <br>
                    <a class="btn btn-info mb-5 waves-effect waves-light" href="{{ route('backend.dashboard') }}">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
@endsection

