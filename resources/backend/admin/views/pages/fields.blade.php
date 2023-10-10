<div class="col-lg-10 col-12 ui-sortable">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label text-lg-right">@lang('backend.pages.language'):</label>

        <div class="col-sm-10">
            <!-- begin nav-pills -->
            <ul class="nav nav-pills mb-2">
                @foreach(config('app.locales') as $lang)
                    <li class="nav-item">
                        <a href="#nav-tab-{{ $lang }}" data-toggle="tab" class="nav-link @if($lang == config('app.locale')) active @endif">
                            <span class="d-sm-none">{{ mb_strtoupper($lang) }}</span>
                            <span class="d-sm-block d-none">{{ mb_strtoupper($lang) }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <!-- end nav-pills -->
        </div>
    </div>
    <!-- begin tab-content -->
    <div class="tab-content rounded bg-white mb-4">
        @foreach(config('app.locales') as $lang)
            <div class="tab-pane fade @if($lang == config('app.locale')) show active @endif" id="nav-tab-{{ $lang }}">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-lg-right" for="pageTitle">{{ __('backend.pages.title', [], $lang) }}:</label>
                    <div class="col-sm-10">
                        {{ Form::text($lang . '[title]', isset($page) && $page->translate($lang) ? $page->translate($lang)->title : null, ['id'=>'pageTitle', 'class'=>'form-control','placeholder'=>__('backend.pages.title'), ($lang == config('app.locale')) ? 'data-parsley-required' : '']) }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-lg-right" for="pageSummary">{{ __('backend.pages.summary', [], $lang) }}:</label>
                    <div class="col-sm-10">
                        {{ Form::textarea($lang . '[summary]', isset($page) && $page->translate($lang) ? $page->translate($lang)->summary : null, ['class'=>'form-control summernote']) }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-lg-right" for="pageContent">{{ __('backend.pages.content', [], $lang) }}:</label>
                    <div class="col-sm-10">
                        {{ Form::textarea($lang . '[content]', isset($page) && $page->translate($lang) ? $page->translate($lang)->content : null, ['class'=>'form-control summernote']) }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- end tab-content -->
    <div class="form-group row m-b-15">
        <label class="col-md-2 col-sm-2 col-form-label text-lg-right" for="type">@lang('backend.pages.category'):</label>
        <div class="col-md-10 col-sm-10">
            {!! Form::select('type', [
    ''  => '-- выберите --',
    '1' => 'Страница сайта',
], isset($page) ? $page->type : '', ['id'=>'type', 'class'=>'form-control', 'data-parsley-required']) !!}
        </div>
    </div>

    <div class="form-group row m-b-15">
        <label class="col-md-2 col-sm-2 col-form-label text-lg-right" for="pageCreateAlias">@lang('backend.pages.alias'):</label>
        <div class="col-md-10 col-sm-10">
            {!! Form::text('alias', null,['id'=>'pageCreateAlias', 'class'=>'form-control','placeholder'=>__('backend.pages.alias')]) !!}
        </div>
    </div>
    <div class="form-group row m-b-15">
        <label class="col-md-2 col-sm-2 col-form-label text-lg-right" for="datepicker-date">@lang('backend.pages.date_published'):</label>
        <div class="col-md-10 col-sm-10">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </span>
                {!! Form::text('date', isset($page) ? \Carbon\Carbon::parse($page->created_at)->format('d.m.Y') : \Carbon\Carbon::now()->format('d.m.Y'), ['id'=>'datepicker-date', 'class'=>($errors->has('date')) ? 'form-control datepicker is-invalid' : 'form-control datepicker', 'data-parsley-required']) !!}
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="switcher-active" class="col-sm-2 col-form-label  text-lg-right">@lang('backend.active'):</label>
        <div class="col-sm-10">
            <div class="switcher">
                {!! Form::checkbox('active', 1, null, ['id' => 'switcher-active']) !!}
                <label class="slider-v2" for="switcher-active"></label>
            </div>
        </div>
    </div>

    <div class="form-group row m-b-15 m-t-30">
        <label class="col-md-2 col-sm-2"></label>
        <div class="col-md-10 col-sm-10">
            @include('views.buttons.save', [
                        'back_link' => route('backend.pages.index'),
                        'destroy_link' => route('backend.pages.destroy', isset($page) ? $page : ''),
                        'permission' => 'pages',
                    ])
        </div>
    </div>
</div>
