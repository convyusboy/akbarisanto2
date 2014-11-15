@extends ('layouts.dashboard')

@section ('content')
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="header smaller lighter blue">Nama Course</h3>
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
							<li class="active">
								<a data-toggle="tab" href="#Information">Information</a>
							</li>

							<li class="">
								<a data-toggle="tab" href="#Week">Week</a>
							</li>

							<li class="">
								<a data-toggle="tab" href="#Assignment">Assignment</a>
							</li>

							<li class="">
								<a data-toggle="tab" href="#Participant">Participant</a>
							</li>

							<li class="">
								<a data-toggle="tab" href="#Lecturer">Lecturer</a>
							</li>

							<li class="">
								<a data-toggle="tab" href="#Feedback">Feedback</a>
							</li>
						</ul>

						<div class="tab-content">
							<div id="Information" class="tab-pane active">
									<form class="form-horizontal" role="form">
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ID Course </label>

											<div class="col-sm-9">
												<input readonly="" type="text" class="col-xs-10 col-sm-5" id="form-input-readonly" value={{$course->id}}>
											</div>
										</div>
										<div class="space-4"></div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category </label>

											<div class="col-sm-9">
												<input readonly="" type="text" class="col-xs-10 col-sm-5" id="form-input-readonly" value={{Category::find($course->category_id)->name}}>
											</div>
										</div>
										<div class="space-4"></div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name </label>

											<div class="col-sm-9">
												<input readonly="" type="text" class="col-xs-10 col-sm-5" id="form-input-readonly" value={{$course->name}}>
											</div>
										</div> 
										<div class="space-4"></div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Description </label>

											<div class="col-sm-9">
												<textarea readonly="" id="form-field-11" class="autosize-transition form-control" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 52px;">{{$course->description}}</textarea>
											</div>
										</div>
									</form>
							</div>
						
							<div id="Week" class="tab-pane">
								<div class="table-responsive">
                        			<table id="tabel-week" class="table table-striped table-bordered table-hover">
			                            <thead>
			                                <tr>
			                                    <th>ID</th>
			                                    <th>Course</th>
			                                    <th>Name</th>
			                                    <th>Description</th>
			                                    <th>Order</th>
			                                    <th></th>
			                                </tr>
			                            </thead>
			                            <tbody>
			                            <?php 
			                            	$course_weeks = CourseWeek::where('course_id', $course->id)->get();
			                            	foreach ($course_weeks as $course_week) { 
			                            ?>
			                                <tr>
			                                    <td>{{$course_week->id}}</td>
			                                    <td>{{$course->name}}</td>
			                                    <td>{{$course_week->name}}</td>
			                                    <td>{{$course_week->description}}</td>
			                                    <td>{{$course_week->order}}</td>
			                                    <td>
			                                        <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
			                                            <a class="blue" href="{{url('/admin/course_week/view/'.$course_week->id)}}">
			                                                <i class="icon-zoom-in bigger-130"></i>
			                                            </a>

			                                            <a class="green" href="{{url('/admin/course_week/update/'.$course_week->id)}}">
			                                                <i class="icon-pencil bigger-130"></i>
			                                            </a>

			                                            <a class="red" href="{{url('/admin/course_week/delete/'.$course_week->id)}}">
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
			                                                        <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
			                                                            <span class="blue">
			                                                                <i class="icon-zoom-in bigger-120"></i>
			                                                            </span>
			                                                        </a>
			                                                    </li>

			                                                    <li>
			                                                        <a href="{{url('/course_week/update/'.$course_week->id)}}" class="tooltip-success" data-rel="tooltip" title="Edit">
			                                                            <span class="green">
			                                                                <i class="icon-edit bigger-120"></i>
			                                                            </span>
			                                                        </a>
			                                                    </li>

			                                                    <li>
			                                                        <a href="{{url('/course_week/delete/'.$course_week->id)}}" class="tooltip-error" data-rel="tooltip" title="Delete">
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
			                            <a href={{url('/admin/course_week/create')}} >
			                                <button class="btn">
			                                    Create
			                                </button>
			                            </a>
			                        </div>
			                    </div>
							</div>

							<div id="Assignment" class="tab-pane">
								<div class="table-responsive">
			                        <table id="tabel-assignment" class="table table-striped table-bordered table-hover">
			                            <thead>
			                                <tr>
			                                    <th>ID</th>
			                                    <th>COURSE</th>
			                                    <th>Question</th>
			                                    <th></th>
			                                </tr>
			                            </thead>
			                            <tbody>
			                            <?php 
			                            	$assignments = Assignment::where('course_id', $course->id)->get();
			                            	foreach ($assignments as $assignment) { 
			                            ?>
			                                <tr>
			                                    <td>{{$assignment->id}}</td>
			                                    <td>{{Course::find($assignment->course_id)->name}}</td>
			                                    <td>{{$assignment->question}}</td>
			                                    <td>
			                                        <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
			                                            <a class="blue" href="{{url('/assignment/update/'.$assignment->id)}}">
			                                                <i class="icon-zoom-in bigger-130"></i>
			                                            </a>

			                                            <a class="green" href="{{url('/admin/assignment/update/'.$assignment->id)}}">
			                                                <i class="icon-pencil bigger-130"></i>
			                                            </a>

			                                            <a class="red" href="{{url('/admin/assignment/delete/'.$assignment->id)}}">
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
			                                                        <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
			                                                            <span class="blue">
			                                                                <i class="icon-zoom-in bigger-120"></i>
			                                                            </span>
			                                                        </a>
			                                                    </li>

			                                                    <li>
			                                                        <a href="{{url('/admin/assignment/update/'.$assignment->id)}}" class="tooltip-success" data-rel="tooltip" title="Edit">
			                                                            <span class="green">
			                                                                <i class="icon-edit bigger-120"></i>
			                                                            </span>
			                                                        </a>
			                                                    </li>

			                                                    <li>
			                                                        <a href="{{url('/admin/assignment/delete/'.$assignment->id)}}" class="tooltip-error" data-rel="tooltip" title="Delete">
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
			                            <a href={{url('/admin/assignment/create')}} >
			                                <button class="btn">
			                                    Create
			                                </button>
			                            </a>
			                        </div>
			                    </div>
							</div>

							<div id="Participant" class="tab-pane">
								<div class="table-responsive">
			                        <table id="tabel-participant" class="table table-striped table-bordered table-hover">
			                            <thead>
			                                <tr>
			                                    <th>Course</th>
			                                    <th>User</th>
			                                    <th></th>
			                                </tr>
			                            </thead>
			                            <tbody>
			                            <?php 
			                            	$course_participants = CourseParticipant::where('course_id', $course->id)->get();
			                            	foreach ($course_participants as $course_participant) { 
			                            ?>
			                                <tr>
			                                    <td>{{Course::find($course_participant->course_id)->name}}</td>
			                                    <td>{{User::find($course_participant->user_id)->username}}</td>
			                                    <td>
			                                        <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
			                                            <a class="blue" href="#">
			                                                <i class="icon-zoom-in bigger-130"></i>
			                                            </a>

			                                            <a class="green" href="{{url('/admin/course_participant/update/'.$course_participant->id)}}">
			                                                <i class="icon-pencil bigger-130"></i>
			                                            </a>

			                                            <a class="red" href="{{url('/admin/course_participant/delete/'.$course_participant->id)}}">
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
			                                                        <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
			                                                            <span class="blue">
			                                                                <i class="icon-zoom-in bigger-120"></i>
			                                                            </span>
			                                                        </a>
			                                                    </li>

			                                                    <li>
			                                                        <a href="{{url('/admin/course_participant/update/'.$course_participant->id)}}" class="tooltip-success" data-rel="tooltip" title="Edit">
			                                                            <span class="green">
			                                                                <i class="icon-edit bigger-120"></i>
			                                                            </span>
			                                                        </a>
			                                                    </li>

			                                                    <li>
			                                                        <a href="{{url('/admin/course_participant/delete/'.$course_participant->id)}}" class="tooltip-error" data-rel="tooltip" title="Delete">
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
			                            <a href={{url('/admin/course_participant/create')}} >
			                                <button class="btn">
			                                    Create
			                                </button>
			                            </a>
			                        </div>
			                    </div>
							</div>

							<div id="Lecturer" class="tab-pane">
								<div class="table-responsive">
			                        <table id="tabel-lecturer" class="table table-striped table-bordered table-hover">
			                            <thead>
			                                <tr>
			                                    <th>Course</th>
			                                    <th>User</th>
			                                    <th></th>
			                                </tr>
			                            </thead>
			                            <tbody>
			                            <?php 
			                            	$course_lecturers = CourseLecturer::where('course_id', $course->id)->get();
			                            	foreach ($course_lecturers as $course_lecturer) { 
			                            ?>
			                                <tr>
			                                    <td>{{Course::find($course_lecturer->course_id)->name}}</td>
			                                    <td>{{User::find($course_lecturer->user_id)->username}}</td>
			                                    <td>
			                                        <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
			                                            <a class="blue" href="#">
			                                                <i class="icon-zoom-in bigger-130"></i>
			                                            </a>

			                                            <a class="green" href="{{url('/admin/course_lecturer/update/'.$course_lecturer->id)}}">
			                                                <i class="icon-pencil bigger-130"></i>
			                                            </a>

			                                            <a class="red" href="{{url('/admin/course_lecturer/delete/'.$course_lecturer->id)}}">
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
			                                                        <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
			                                                            <span class="blue">
			                                                                <i class="icon-zoom-in bigger-120"></i>
			                                                            </span>
			                                                        </a>
			                                                    </li>

			                                                    <li>
			                                                        <a href="{{url('/admin/course_lecturer/update/'.$course_lecturer->id)}}" class="tooltip-success" data-rel="tooltip" title="Edit">
			                                                            <span class="green">
			                                                                <i class="icon-edit bigger-120"></i>
			                                                            </span>
			                                                        </a>
			                                                    </li>

			                                                    <li>
			                                                        <a href="{{url('/admin/course_lecturer/delete/'.$course_lecturer->id)}}" class="tooltip-error" data-rel="tooltip" title="Delete">
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
			                            <a href={{url('/admin/course_lecturer/create')}} >
			                                <button class="btn">
			                                    Create
			                                </button>
			                            </a>
			                        </div>
			                    </div>
							</div>

							<div id="Feedback" class="tab-pane">
								<div class="table-responsive">
			                        <table id="tabel-feedback" class="table table-striped table-bordered table-hover">
			                            <thead>
			                                <tr>
			                                    <th>ID</th>
			                                    <th>Course</th>
			                                    <th>User</th>
			                                    <th>Feedback</th>
			                                    <th>Rate</th>
			                                    <th></th>
			                                </tr>
			                            </thead>
			                            <tbody>
			                            <?php 
			                            	$course_feedbacks = CourseFeedback::where('course_id', $course->id)->get();
			                            	foreach ($course_feedbacks as $course_feedback) { 
			                            ?>
			                                <tr>
			                                    <td>{{$course_feedback->id}}</td>
			                                    <td>{{Course::find($course_feedback->course_id)->name}}</td>
			                                    <td>{{User::find($course_feedback->user_id)->username}}</td>
			                                    <td>{{$course_feedback->feedback}}</td>
			                                    <td>{{$course_feedback->rate}}</td>
			                                    <td>
			                                        <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
			                                            <a class="blue" href="#">
			                                                <i class="icon-zoom-in bigger-130"></i>
			                                            </a>

			                                            <a class="green" href="{{url('/admin/course_feedback/update/'.$course_feedback->id)}}">
			                                                <i class="icon-pencil bigger-130"></i>
			                                            </a>

			                                            <a class="red" href="{{url('/admin/course_feedback/delete/'.$course_feedback->id)}}">
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
			                                                        <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
			                                                            <span class="blue">
			                                                                <i class="icon-zoom-in bigger-120"></i>
			                                                            </span>
			                                                        </a>
			                                                    </li>

			                                                    <li>
			                                                        <a href="{{url('/admin/course_feedback/update/'.$course_feedback->id)}}" class="tooltip-success" data-rel="tooltip" title="Edit">
			                                                            <span class="green">
			                                                                <i class="icon-edit bigger-120"></i>
			                                                            </span>
			                                                        </a>
			                                                    </li>

			                                                    <li>
			                                                        <a href="{{url('/admin/course_feedback/delete/'.$course_feedback->id)}}" class="tooltip-error" data-rel="tooltip" title="Delete">
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
			                            <a href={{url('/admin/course_feedback/create')}} >
			                                <button class="btn">
			                                    Create
			                                </button>
			                            </a>
			                        </div>
			                    </div>
							</div>
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
            var oTable1 = $('#tabel-week').dataTable( {
            "aoColumns": [
              null, null, null,null, null,{ "bSortable": false }
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

    <script type="text/javascript">
        jQuery(function($) {
            var oTable1 = $('#tabel-assignment').dataTable( {
            "aoColumns": [
              null,null, null,{ "bSortable": false }
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

    <script type="text/javascript">
        jQuery(function($) {
            var oTable1 = $('#tabel-participant').dataTable( {
            "aoColumns": [
              null, null,{ "bSortable": false }
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

    <script type="text/javascript">
        jQuery(function($) {
            var oTable1 = $('#tabel-lecturer').dataTable( {
            "aoColumns": [
              null, null,{ "bSortable": false }
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

    <script type="text/javascript">
        jQuery(function($) {
            var oTable1 = $('#tabel-feedback').dataTable( {
            "aoColumns": [
              null,null, null,null, null,{ "bSortable": false }
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