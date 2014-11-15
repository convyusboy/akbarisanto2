@extends('layouts.admin')

@section('content')

<div class="page-content">
  <div class="row">
    <div class="col-xs-12">
      <div class="row">
        <div class="col-xs-12">
          <h3 class="header smaller lighter blue">Work List</h3>
          <div class="table-header">
            Results for "Work List"
          </div>
          <div class="table-responsive">
            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Category</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($works as $work) { ?>
                <tr>

                  <td>{{$work->id}}</td>
                  <td>{{Category::find($work->category_id)->name}}</td>
                  <td>{{$work->title}}</td>
                  <td>{{$work->content}}</td>

                  <td>
                    <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                      <a class="blue" href="{{url('/admin/work/view/'.$work->id)}}">
                        <i class="icon-zoom-in bigger-130"></i>
                      </a>

                      <a class="green" href="{{url('/admin/work/update/'.$work->id)}}">
                        <i class="icon-pencil bigger-130"></i>
                      </a>

                      <a class="red" href="{{url('/admin/work/delete/'.$work->id)}}">
                        <i class="icon-trash bigger-130"></i>
                      </a>
                    </div>

                    <div class="visible-xs visible-sm hidden-md hidden-lg">
                      <div class="inline position-relative">
                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                          <i class="icon-caret-down icon-only bigger-120"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                          <li>
                            <a href="{{url('/admin/work/view/'.$work->id)}}" class="tooltip-info" data-rel="tooltip" title="View">
                              <span class="blue">
                                <i class="icon-zoom-in bigger-120"></i>
                              </span>
                            </a>
                          </li>

                          <li>
                            <a href="{{url('/admin/work/update/'.$work->id)}}" class="tooltip-success" data-rel="tooltip" title="Edit">
                              <span class="green">
                                <i class="icon-edit bigger-120"></i>
                              </span>
                            </a>
                          </li>

                          <li>
                            <a href="{{url('/admin/work/delete/'.$work->id)}}" class="tooltip-error" data-rel="tooltip" title="Delete">
                              <span class="red">
                                <i class="icon-trash bigger-120"></i>
                              </span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="form-group">
            <div class="col-md-offset-0">
              <a href={{url('/admin/work/create')}} >
                <button class="btn">
                  Create
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.page-content -->

@stop

@section ('page_script')
<!-- page specific plugin scripts -->
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.dataTables.bootstrap.js')}}"></script>

<!-- inline scripts related to this page -->

<script type="text/javascript">
jQuery(function($) {
  var oTable1 = $('#sample-table-2').dataTable( {
    "aoColumns": [
    null, null,null, null,{ "bSortable": false }
    ] } );
  
  
  $('table th input:checkbox').on('click' , function(){
    var that = this;
    $(this).closest('table').find('tr > td:first-child input:checkbox')
    .each(function(){
      this.checked = that.checked;
      $(this).closest('tr').toggleClass('selected');
    });
    
  });
  
  
  $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
  function tooltip_placement(context, source) {
    var $source = $(source);
    var $parent = $source.closest('table')
    var off1 = $parent.offset();
    var w1 = $parent.width();
    
    var off2 = $source.offset();
    var w2 = $source.width();
    
    if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
    return 'left';
  }
})
</script>
@stop