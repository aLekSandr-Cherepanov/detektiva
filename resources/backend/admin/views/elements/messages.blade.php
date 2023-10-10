<div class="modal fade" id="confirm_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title js_message"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="confirmBtnNo">@lang('backend.no')</button>
                <button type="button" class="btn btn-info" id="confirmBtnYes">@lang('backend.yes')</button>
            </div>
        </div>
    </div>
</div>
@if (isset($errors) && $errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <i class="fa fa-times-circle fa-2x pull-left m-r-10"></i>
        <p class="m-b-5 m-t-5"><strong>@lang('backend.error_title')</strong>
            @foreach ($errors->all() as $error) {{ '' . $error . ' ' }} @endforeach</p>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <i class="fa fa-check fa-2x pull-left m-r-10"></i>
        <p class="m-b-5 m-t-5"><strong>{{ session('success.title') ?? __('backend.success_title') }}</strong> {{ session('success.text') }}</p>
    </div>
@endif

@if (session('danger'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <i class="fa fa-exclamation-triangle fa-2x pull-left m-r-10"></i>
        <p class="m-b-5 m-t-5"><strong>{{ session('danger.title') ?? __('backend.error_title') }}</strong>
            {{ session('danger.text') }}</p>
    </div>
@endif


