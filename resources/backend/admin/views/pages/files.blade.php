<div class="col-lg-8 col-12 ui-sortable">
    <div class="form-group row m-b-15">
        <label class="col-md-2 col-sm-2 col-form-label text-lg-left"></label>
        <div class="col-md-10 col-sm-10">

            <!-- begin form-file-upload -->
            {!! Form::open([
                    'url' => route('backend.image.upload'),
                    'id' => 'fileupload',
                    'method'=>'POST',
                    'enctype'=>'multipart/form-data',
                    'data-download-url' => route('backend.image.upload', ['id' => $page->id])
                ]) !!}
            {!! Form::hidden('page_id', $page->id) !!}
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <!-- begin table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-condensed text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th width="10%">ПРЕВЬЮ</th>
                                <th>ИНФОРМАЦИЯ О ФАЙЛЕ</th>
                                <th>ГЛАВНОЕ ФОТО</th>
                                <th>ФОТО СЛАЙДЕРА</th>
                                <th width="1%"></th>
                            </tr>
                            </thead>
                            <tbody class="files"></tbody>
                        </table>
                    </div>
                    <!-- end table -->
                    <!-- begin panel-body -->
                    <div class="panel-body">

                        <div class="row fileupload-buttonbar">
                            <div class="col-xl-9">
								<span class="btn btn-primary fileinput-button m-r-3">
									<i class="fa fa-fw fa-plus"></i>
									<span>Добавить фото...</span>
									<input type="file" name="files[]" multiple>
								</span>
                                <button type="submit" class="btn btn-primary start m-r-3">
                                    <i class="fa fa-fw fa-upload"></i>
                                    <span>Старт загрузки</span>
                                </button>
                                <button type="reset" class="btn btn-default cancel m-r-3">
                                    <i class="fa fa-fw fa-ban"></i>
                                    <span>Отмена загрузки</span>
                                </button>
                                <button type="button" class="btn btn-default delete m-r-3">
                                    <i class="fa fa-fw fa-trash"></i>
                                    <span>Удалить</span>
                                </button>
                                <!-- The global file processing state -->
                                <span class="fileupload-process"></span>
                            </div>
                            <!-- The global progress state -->
                            <div class="col-xl-3 fileupload-progress fade d-none d-xl-block">
                                <!-- The global progress bar -->
                                <div class="progress progress-striped active m-b-0">
                                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                </div>
                                <!-- The extended global progress state -->
                                <div class="progress-extended">&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <!-- end panel-body -->
                </div>
                <!-- end panel -->
            {!! Form::close() !!}
            <!-- end form-file-upload -->
            <!-- The blueimp Gallery widget -->
            <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
                <div class="slides"></div>
                <h3 class="title"></h3>
                <a class="prev">‹</a>
                <a class="next">›</a>
                <a class="close">×</a>
                <a class="play-pause"></a>
                <ol class="indicator"></ol>
            </div>

        </div>
    </div>
</div>

