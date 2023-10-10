<div class="form-group row">
    <label for="roleName" class="col-sm-3 col-form-label">@lang('backend.roles.name'):</label>
    <div class="col-sm-9">
        {!! Form::text('name', null,['id'=>'roleName', 'class'=>'form-control','placeholder'=>__('backend.roles.name'), 'required', 'data-parsley-required']) !!}
    </div>
</div>
<div class="form-group row">
    <label for="roleDescription" class="col-sm-3 col-form-label">@lang('backend.roles.description'):</label>
    <div class="col-sm-9">
        {!! Form::text('description', null,['id'=>'roleDescription', 'class'=>'form-control','placeholder'=>__('backend.roles.description')]) !!}
    </div>
</div>
<div class="form-group row">
    <label for="switcher-active" class="col-sm-3 col-form-label">@lang('backend.active'):</label>
    <div class="col-sm-9">
        <div class="switcher">
            {!! Form::checkbox('active', 1, null, ['id' => 'switcher-active']) !!}
            <label class="slider-v2" for="switcher-active"></label>
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="switcher-active" class="col-sm-3 col-form-label">@lang('backend.roles.permissions'):</label>
    <div class="col-sm-9">
        @foreach($permissions as $permission)
            <div class="checkbox checkbox-inline checkbox-info checkbox-sm m-b-10">
                {!! Form::checkbox('permissions[]', $permission->name, isset($role) && $role->hasPermissionTo($permission->name), ['id' => 'permission-'.$permission->id, 'class' => 'styled']) !!}
                <label for="permission-{{$permission->id}}">{{$permission->name}}</label>
            </div>
        @endforeach
    </div>
</div>
<div class="form-group">
    <div>
        @include('views.buttons.save', ['back_link' => route('backend.roles.index')])
    </div>
</div>



