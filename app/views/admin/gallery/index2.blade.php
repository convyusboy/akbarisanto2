@extends('layouts.admin')

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-xs-12">
        <h3 class="header smaller lighter blue">Gallery List</h3>
        <div class="table-responsive">
          <table id="sample-table-2" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Button</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($galleries as $gallery) { ?>
              <tr>
                <td>{{$gallery->id}}</td>
                <td>{{$gallery->title}}</td>
                <td>{{$gallery->content}}</td>
                <td>{{$gallery->img}}</td>
                <td><a href="{{url('/admin/gallery/update/'.$gallery->id)}}">Edit</a> <a href="{{url('/admin/gallery/delete/'.$gallery->id)}}">Delete</a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="form-group">
          <a href={{url('/admin/gallery/create')}} >
            <button class="btn">
              Create Album
            </button>
          </a>
        </div>
      </div>
    </div>
  </div><!-- /.col -->
</div><!-- /.row -->


@stop
