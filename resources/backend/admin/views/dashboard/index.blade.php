@extends('views.layouts.app')

@section('title', __('backend.dashboard'))

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group pull-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">@lang('backend.dashboard')</a></li>
                        <li class="breadcrumb-item active">@lang('backend.dashboard')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('backend.dashboard')</h4>
            </div>
        </div>
    </div>
@endsection
