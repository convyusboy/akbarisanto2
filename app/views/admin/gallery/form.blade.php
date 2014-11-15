@extends ('layouts.admin')

@section ('content')
<div class="page-content">
  <h3 class="header smaller lighter blue">Edit Album</h3>

  {{Form::model($gallery, array('class'=>'form-horizontal'))}}
  <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name </label>

    <div class="col-sm-9">
      {{Form::text('name')}}
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> File </label>

    <div class="col-sm-9">
      {{Form::file('file')}}
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-offset-3 col-md-9">
      {{Form::submit('Simpan', array('class'=>'btn btn-info'))}}

      <a href={{url('/admin/gallery/index')}}>
        <button class="btn">
          <i class="icon-undo bigger-110"></i>
          Kembali
        </button>
      </a>
    </div>

  </div>
  {{Form::close()}}
</div>

@stop