{!! Form::open(['url' => route('backend.pages.index'),
                    'id' => 'form-search',
                    'class' => 'form-inline',
                    'method'=>'GET',
                    'placeholder'=>'Поиск страниц'
                ]) !!}
<div class="form-group col-md-10">
    <input name="search" type="text" class="form-control col-12" placeholder="@lang('backend.search')...">
</div>
<div class="form-group col-md-2">
    <button type="submit" class="btn btn-sm btn-success">
        <i class="fa fa-search"></i>
        @lang('backend.search')
    </button>
</div>
{!! Form::close() !!}

