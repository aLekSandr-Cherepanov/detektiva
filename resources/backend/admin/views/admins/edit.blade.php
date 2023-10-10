@extends('views.layouts.app')

@section('title', __('backend.admins.edit'))

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group pull-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">@lang('backend.dashboard')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('backend.admins.index') }}">@lang('backend.admins.admins')</a></li>
                        <li class="breadcrumb-item active">@lang('backend.admins.edit')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('backend.admins.edit')</h4>
            </div>
        </div>
    </div>

    @include('views.elements.messages')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="col-6">
                        {!! Form::model($admin, [
                            'url' => route('backend.admins.update', ['admin'=> $admin]),
                            'id' => 'form-page',
                            'class' => 'form-horizontal',
                            'method'=>'PUT',
                            'data-parsley-validate',
                            'autocomplete'=>'off'
                        ]) !!}
                        @include('views.admins.fields')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('backend/assets/plugins/parsleyjs/parsley.min.js') }}"></script>
@endsection