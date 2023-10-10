@extends('views.layouts.app')

@section('title', __('backend.admins.admins'))

@section('styles')
    <link href="{{ asset('backend/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('backend/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"/>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group pull-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">@lang('backend.dashboard')</a></li>
                        <li class="breadcrumb-item active">@lang('backend.admins.admins')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('backend.admins.admins')</h4>
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
                                        'create_link'  => route('backend.admins.create'),
                                        'name'         => __('backend.admins.create'),
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
                            <th width="1%">#</th>
                            <th width="15%">@lang('backend.admins.name')</th>
                            <th width="15%">@lang('backend.admins.email')</th>
                            <th width="15%">@lang('backend.admins.phone')</th>
                            <th width="15%" data-orderable="false">@lang('backend.roles.role')</th>
                            <th width="1%" data-orderable="false">@lang('backend.active')</th>
                            <th width="30%" data-orderable="false"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($admins as $admin)
                            <tr>
                                <th scope="row">{{ $admins->firstItem() + $loop->index }}</th>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->phone }}</td>
                                <td>{{ implode(', ', $admin->getRoleNames()->toArray()) }}</td>
                                <td>@if($admin->active)
                                        <h2 class="mt-0 mb-0">
                                            <i class="fa fa-check-square text-success"></i>
                                        </h2>
                                    @else
                                        <h2 class="mt-0 mb-0">
                                            <i class="fa fa-times text-danger"></i>
                                        </h2>
                                    @endif
                                </td>
                                <td>
                                    @include('views.buttons.edit', [
                                        'edit_link'    => route('backend.admins.edit',['admin'=> $admin]),
                                        'destroy_link' => route('backend.admins.destroy',['admin' => $admin]),
                                        'model'        => $admin,
                                    ])
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="gradeA">@lang('backend.nothing_found')</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $admins->links('views.elements.paginator') }}
                </div>
            </div>
        </div>
    </div>
    <!-- end panel -->
@endsection

@section('scripts')
    <script src="{{ asset('backend/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    @include('views.scripts.data-table-js')
@endsection

