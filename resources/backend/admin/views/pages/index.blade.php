@extends('views.layouts.app')

@section('title', __('backend.pages.pages'))

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group pull-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">@lang('backend.dashboard')</a></li>
                        <li class="breadcrumb-item active">@lang('backend.pages.pages')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('backend.pages.pages')</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            @include('views.buttons.create', [
                                        'create_link'  => route('backend.pages.create'),
                                        'name'         => __('backend.pages.create'),
                                        ])
                        </div>
                        <div class="col-md-6">
                            @include('views.elements.search-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('views.elements.messages')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <table class="table table-striped table-bordered">
                        <thead class="thead-default">
                        <tr>
                            <th width="1%">@lang('backend.number')</th>
                            <th>@lang('backend.pages.title')</th>
                            <th>@lang('backend.pages.alias')</th>
                            <th width="1%" data-orderable="false">@lang('backend.active')</th>
                            <th width="15%" data-orderable="false">@lang('backend.date_created')</th>
                            <th width="30%" data-orderable="false"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($pages as $page)
                            <tr>
                                <th scope="row">{{ $pages->firstItem() + $loop->index }}</th>
                                <td>{{ $page->translate(App::getLocale())->title }}</td>
                                <td>{{ $page->alias }}</td>
                                <td>@if($page->active)
                                        <h2 class="mt-0 mb-0">
                                            <i class="fa fa-check-square text-success"></i>
                                        </h2>
                                    @else
                                        <h2 class="mt-0 mb-0">
                                            <i class="fa fa-times text-danger"></i>
                                        </h2>
                                    @endif
                                </td>
                                <td>{{ $page->created_at }}</td>
                                <td>
                                    @include('views.buttons.edit', [
                                        'edit_link'    => route('backend.pages.edit',['page'=> $page]),
                                        'destroy_link' => route('backend.pages.destroy',['page' => $page]),
                                        'model'        => $page,
                                    ])
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">@lang('backend.nothing_found')</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $pages->links('views.elements.paginator') }}
                </div>
            </div>
        </div>
    </div>
    <!-- end panel -->
@endsection
