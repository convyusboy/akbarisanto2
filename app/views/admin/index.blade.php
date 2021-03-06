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
							<a href="{{url('admin/portfolio')}}" class="btn btn-lg"><span class="glyphicon glyphicon-book"></span><br> Portfolios</a> 
							<a href="{{url('admin/blog')}}" class="btn btn-lg"><span class="glyphicon glyphicon-user"></span><br> Blogs</a> 
							<a href="{{url('admin/photo')}}" class="btn btn-lg"><span class="glyphicon glyphicon-envelope"></span><br> Photos</a> 
						</div>
					</div><!-- /widget-box -->
				</div>

			</div><!-- /span -->
		</div><!-- /row -->

		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->
</div>

@stop