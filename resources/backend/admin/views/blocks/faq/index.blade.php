@extends('views.layouts.app')

@section('title', __('backend.blocks.faq'))

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group pull-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">@lang('backend.dashboard')</a></li>
                        <li class="breadcrumb-item active">@lang('backend.blocks.faq')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('backend.blocks.faq')</h4>
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
                                        'create_link'  => route('backend.blocks.faq.create'),
                                        'name'         => __('backend.blocks.create'),
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
                            <th>@lang('backend.pages.content')</th>
                            <th width="1%" data-orderable="false">@lang('backend.active')</th>
                            <th width="15%" data-orderable="false">@lang('backend.date_created')</th>
                            <th width="30%" data-orderable="false"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($blocks as $block)
                            <tr>
                                <th scope="row">{{ $blocks->firstItem() + $loop->index }}</th>
                                <td>{{ $block->translate(App::getLocale())->title }}</td>
                                <td>{!! $block->translate(App::getLocale())->content !!} </td>
                                <td>@if($block->active)
                                        <h2 class="mt-0 mb-0">
                                            <i class="fa fa-check-square text-success"></i>
                                        </h2>
                                    @else
                                        <h2 class="mt-0 mb-0">
                                            <i class="fa fa-times text-danger"></i>
                                        </h2>
                                    @endif
                                </td>
                                <td>{{ $block->created_at }}</td>
                                <td>
                                    @include('views.buttons.edit', [
                                        'edit_link'    => route('backend.blocks.faq.edit',['faq'=> $block]),
                                        'destroy_link' => route('backend.blocks.faq.destroy',['faq' => $block]),
                                        'model'        => $block,
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
                    {{ $blocks->links('views.elements.paginator') }}
                </div>
            </div>
        </div>
    </div>
    <!-- end panel -->
@endsection
