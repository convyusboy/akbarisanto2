@extends ('layouts.admin')

@section ('content')
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="header smaller lighter blue">Edit Photo</h3>
                    
                    <form action="{{url('admin/photo/create')}}" method="POST" enctype="multipart/form-data">
                        <!-- {{Form::model($photo, array('class'=>'form-horizontal'))}} -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Title </label>

                            <div class="col-sm-9">
                                {{Form::text('title')}}
                                <!-- <input type="text" placeholder="caption" name='caption'/> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Description </label>

                            <div class="col-sm-9">
                                {{Form::textarea('desc')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Post </label>

                            <div class="col-sm-9">
                                {{Form::select('post_id', Post::lists('title', 'id'))}}
                                <!-- <input type="file" id="exampleInputFile" name='file'/> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> File </label>

                            <div class="col-sm-9">
                                {{Form::file('file')}}
                                <!-- <input type="file" id="exampleInputFile" name='file'/> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-9">
                                <!-- <button type="submit" class="btn btn-default btn-submit btn-small" style="margin:0">Upload</button> -->
                                {{Form::submit('Simpan', array('class'=>'btn btn-info'))}}

                                <a href={{url('/admin/photo/index')}}>
                                    <button class="btn">
                                        <i class="icon-undo bigger-110"></i>
                                        Kembali
                                    </button>
                                </a>
                            </div>

                        </div>
                    </form>
                    <!-- {{Form::close()}} -->

                </div>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->


@stop