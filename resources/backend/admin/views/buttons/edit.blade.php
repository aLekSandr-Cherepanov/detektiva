    @if(isset($model) && $model->deleted_at && isset($restore_link) && $restore_link && isset($permission))
        @can('delete ' . $permission)
            <a href="{{ $restore_link }}" data-method="put" data-token="{{ csrf_token() }}" class="btn btn-warning btn-sm m-r-5">
                <i class="fa fa-fw"></i>
                <span class="hidden-xs">@lang('backend.restore')</span>
            </a>
        @endcan
    @endif
    @if(isset($edit_link) && $edit_link && isset($permission) && !(isset($model) && $model->deleted_at))
        @can('edit ' . $permission)
            <a href="{{ $edit_link }}"
               class="btn btn-success btn-sm m-r-5">
                <i class="fa fa-edit"></i>
                <span class="hidden-xs">@lang('backend.edit')</span>
            </a>
        @endcan
    @endif
    @if(isset($destroy_link) && $destroy_link && isset($permission))
        @can('delete ' . $permission)
            <a href="{{ $destroy_link }}"
               data-method="delete"
               data-token="{{csrf_token()}}"
               data-confirm="@lang('backend.delete_question')"
               class="btn btn-danger btn-sm m-r-5"
               title="@lang('backend.delete')"
               disabled>
                <i class="fa fa-trash"></i>
                <span class="hidden-xs">@lang('backend.delete')</span>
            </a>
        @endcan
    @endif
