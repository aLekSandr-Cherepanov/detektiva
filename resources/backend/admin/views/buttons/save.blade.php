{!! Form::hidden('action', '') !!}
@if(isset($back_link))
    <a href="{{$back_link}}" data-do="link" class="btn btn-dark pull-left">
        <i class="fa fa-reply"></i> @lang('backend.back')</a>
@endif
@if(isset($permission))
    @can('delete ' . $permission)
        @if(isset($model) && $model->deleted_at && isset($restore_link))
            <a href="{{$restore_link}}" class="btn btn-warning m-r-5">
                <i class="glyphicon glyphicon-refresh"></i> @lang('backend.restore')
            </a>
        @elseif(isset($destroy_link))
            <a href="{{$destroy_link}}"
               data-method="delete"
               data-token="{{csrf_token()}}"
               data-confirm="@lang('backend.delete_question')"
               class="btn btn-danger m-r-5 pull-right"
               title="@lang('backend.delete')">
                <i class="fa fa-trash-o"></i> @lang('backend.delete')
            </a>
        @endif
    @endcan
@endif
<button type="submit" data-action="continue" class="btn btn-info m-r-5 pull-right">
    <i class="fa fa-save"></i> @lang('backend.save_continue')
</button>
<button type="submit" class="btn btn-primary m-r-5 pull-right">
    <i class="fa fa-save"></i> @lang('backend.save')
</button>
