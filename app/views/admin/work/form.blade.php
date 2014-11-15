@extends ('layouts.admin')

@section ('content')
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="header smaller lighter blue">Edit Work</h3>
                    
                    {{Form::model($work, array('class'=>'form-horizontal'))}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Title </label>

                        <div class="col-sm-9">
                            {{Form::text('title')}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Content </label>

                        <div class="col-sm-9">
                            {{Form::textarea('content')}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category </label>

                        <div class="col-sm-9">
                            {{Form::select('category_id', Category::lists('name', 'id'))}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            {{Form::submit('Simpan', array('class'=>'btn btn-info'))}}

                            <a href={{url('/admin/assignment/index')}}>
                                <button class="btn">
                                    <i class="icon-undo bigger-110"></i>
                                    Kembali
                                </button>
                            </a>
                        </div>

                    </div>
                    {{Form::close()}}

                </div>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->


@stop