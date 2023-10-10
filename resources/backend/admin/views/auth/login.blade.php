@extends('views.layouts.guest')

@section('title', __('auth.login'))

@section('content')
    <div class="accountbg"></div>
    <div class="wrapper-page">

        <div class="card">
            <div class="card-body">

                <h3 class="text-center mt-0 m-b-15">
                    <a href="/" class="logo logo-admin"><img src="{{ asset('backend/assets/images/logo-dark.png') }}" height="30" alt="logo"></a>
                </h3>

                <h4 class="text-muted text-center font-18"><b>{{ config('app.name') }}</b></h4>
                <h5 class="text-muted text-center font-14">@lang('auth.login_message')</h5>

                <div class="p-3">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (!$errors->isEmpty())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {!! $errors->first() !!}
                        </div>
                    @endif

                    {{ Form::open(['route' => 'backend.login', 'method' => 'POST', 'autocomplete' => 'off', 'class' => 'form-horizontal m-t-20']) }}
                    <div class="form-group row">
                        <div class="col-12">
                            {!! Form::email('email', old('email'), ['placeholder' => __('auth.email_address'), 'class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            {!! Form::password('password', ['placeholder' => __('auth.password'),'class'=>'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheck1">@lang('auth.remember_me')</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button class="btn btn-info btn-block waves-effect waves-light" type="submit">@lang('auth.login')</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                    <p class="text-center text-muted mb-0">
                        &copy; 2019 - {{ date('Y') }}. @lang('backend.all_rights_reserved').
                    </p>
                    <p class="text-center text-muted mb-0">
                        <a href="{{ config('backend.cms.url') }}" target="_blank">{{ config('backend.cms.name') }}</a>. Version {{ config('backend.version') }}
                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection

