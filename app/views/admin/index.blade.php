@extends('layouts.admin')

@section('content')

<div class="page-content">
	<div class="page-header">
		<h1>
			Dashboard
			<small>
				<i class="icon-double-angle-right"></i>
			</small>
		</h1>
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->

			<div class="row">
				<div class="col-sm-6">
					<div class="widget-box transparent">
						<div class="widget-header widget-header-flat">
							<h4 class="lighter">
								<i class="icon-star orange"></i>
								Menu Utama
							</h4>

							<div class="widget-toolbar">
								<a href="#" data-action="collapse">
									<i class="icon-chevron-up"></i>
								</a>
							</div>
						</div>

						<div class="widget-body">
							<a href="{{url('admin/work')}}" class="btn btn-lg"><span class="glyphicon glyphicon-book"></span><br> Works</a> 
							<a href="{{url('admin/story')}}" class="btn btn-lg"><span class="glyphicon glyphicon-user"></span><br> Stories</a> 
							<a href="{{url('admin/collection')}}" class="btn btn-lg"><span class="glyphicon glyphicon-envelope"></span><br> Collections</a> 
							<a href="{{url('admin/gallery')}}" class="btn btn-lg"><span class="glyphicon glyphicon-asterisk"></span><br> Galleries</a> 
						</div>
					</div><!-- /widget-box -->
				</div>

				<div class="col-sm-6">
					<div class="widget-box transparent" id="recent-box">
						<div class="widget-header">
							<h4 class="lighter smaller">
								<i class="icon-rss orange"></i>
								RECENT
							</h4>

							<div class="widget-toolbar no-border">
								<ul class="nav nav-tabs" id="recent-tab">
									<li class="active">
										<a data-toggle="tab" href="#task-tab">Tasks</a>
									</li>

									<li>
										<a data-toggle="tab" href="#member-tab">Members</a>
									</li>

									<li>
										<a data-toggle="tab" href="#comment-tab">Comments</a>
									</li>
								</ul>
							</div>
						</div>
					</div><!-- /widget-box -->
				</div><!-- /span -->

			</div><!-- /span -->
		</div><!-- /row -->

		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->
</div>

@stop