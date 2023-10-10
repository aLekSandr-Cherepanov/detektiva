@extends('views.layouts.app')

@section('title', __('backend.roles.roles'))

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
                        <li class="breadcrumb-item active">@lang('backend.roles.roles')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('backend.roles.roles')</h4>
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
                                        'create_link'  => route('backend.roles.create'),
                                        'name'         => __('backend.roles.create'),
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
                            <th width="20%">@lang('backend.roles.name')</th>
                            <th width="20%">@lang('backend.roles.description')</th>
                            <th width="15%">@lang('backend.roles.users_attached')</th>
                            <th width="10%" data-orderable="false">@lang('backend.active')</th>
                            <th width="30%" data-orderable="false"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <th scope="row">{{ $roles->firstItem() + $loop->index }}</th>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->description }}</td>
                                <td>{{ $role->users()->count() }}</td>
                                <td>@if($role->active)
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
                                        'edit_link'    => route('backend.roles.edit',['role'=> $role]),
                                        'destroy_link' => $role->users()->count() == 0 ? route('backend.roles.destroy',['role' => $role]) : false,
                                        'model'        => $role,
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
                    {{ $roles->links('views.elements.paginator') }}
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

