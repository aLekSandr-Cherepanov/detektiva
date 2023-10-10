<div class="form-group row">
    <label for="userCreateName" class="col-sm-2 col-form-label">@lang('backend.admins.name'):</label>
    <div class="col-sm-10">
        {!! Form::text('name', null,['id'=>'userCreateName', 'class'=>'form-control','placeholder'=>__('backend.admins.name'), 'required', 'data-parsley-required']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="userCreateEmail" class="col-sm-2 col-form-label">@lang('backend.admins.email'):</label>
    <div class="col-sm-10">
        {!! Form::email('email', null,['id'=>'userCreateEmail', 'class'=>'form-control','placeholder'=>__('backend.admins.email'),'required', 'data-parsley-required', 'data-parsley-type' => 'email']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="userCreatePhone" class="col-sm-2 col-form-label">@lang('backend.admins.phone'):</label>
    <div class="col-sm-10">
        {!! Form::text('phone', null,['id'=>'userCreatePhone', 'class'=>'form-control','placeholder'=>__('backend.admins.phone')]) !!}
    </div>
</div>
@can('edit admins')
    <div class="form-group row">
        <label for="userCreateRole" class="col-sm-2 col-form-label">@lang('backend.roles.role'):</label>
        <div class="col-sm-10">
            {!! Form::select('role',$roles, isset($admin) && isset($admin->roles->first()->id) ? $admin->roles->first()->id : '', ['id'=>'userCreateRole', 'class'=>'form-control', 'placeholder'=>__('backend.roles.role'), 'data-parsley-required']) !!}
        </div>
    </div>
@endcan
<div class="form-group row">
    <label for="switcher-active" class="col-sm-2 col-form-label">@lang('backend.active'):</label>
    <div class="col-sm-10">
        <div class="switcher">
            {!! Form::checkbox('active', 1, null, ['id' => 'switcher-active']) !!}
            <label class="slider-v2" for="switcher-active"></label>
        </div>
    </div>
</div>
@can('edit admins')
    <div class="form-group row">
        <label for="userCreateRole" class="col-sm-2 col-form-label">@lang('backend.admins.password'):</label>
        <div class="col-sm-10">
            {!! Form::password('password', ['placeholder' => '******', 'id'=>'userCreatePassword', 'class'=>'form-control']) !!}
        </div>
    </div>
@endcan
<div class="form-group">
    <div>
        @include('views.buttons.save', ['back_link' => route('backend.admins.index')])
    </div>
</div>



