@extends('views.layouts.app')

@section('title', __('backend.pages.create'))

@section('styles')
    <link href="{{ asset('backend/assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet"/>
    <link href="{{ asset('backend/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet"/>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group pull-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">@lang('backend.dashboard')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('backend.pages.index') }}">@lang('backend.pages.pages')</a></li>
                        <li class="breadcrumb-item active">@lang('backend.pages.create')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('backend.pages.create')</h4>
            </div>
        </div>
    </div>

    @include('views.elements.messages')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="col-12">
                        {!! Form::open([
                            'url' => route('backend.pages.store'),
                            'id' => 'form-page',
                            'class' => 'form-horizontal',
                            'method'=>'POST',
                            'data-parsley-validate',
                            'autocomplete'=>'off'
                        ]) !!}
                        @include('views.pages.fields')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('backend/assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
    <script>
        var handleSummernote = function () {
            $('.summernote').summernote({
                placeholder: '',
                tabsize    : 2,
                height     : 300,
                toolbar    : [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        };

        var FormSummernote = function () {
            "use strict";
            return {
                //main function
                init: function () {
                    handleSummernote();
                }
            };
        }();

        $(document).ready(function () {
            FormSummernote.init();
        });

        $(document).on('submit', '#form-page', function (e) {
            if ($('.summernote').summernote('codeview.isActivated')) {
                $('.summernote').summernote('codeview.deactivate');
            }
        });

        $('.datepicker').datepicker({
            format        : 'dd.mm.yyyy',
            todayHighlight: true,
            autoclose     : true,
            language      : 'ru'
        });
    </script>
@endsection
