<div class="modal fade" tabindex="-1" role="dialog" id="delete-confirm">
    <div class="modal-dialog" role="document">
        <div class="box box-danger">
            <div class="modal-content bg-danger">
                <div class="modal-body">
                    <h4>@lang('navigation.confirm')</h4>
                </div>
                <form method="post" id="form-delete">
                    @method('delete')
                    @csrf
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('navigation.cancel')</button>
                        <button type="submit" class="btn btn-secondary">@lang('navigation.ok')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
