@extends('layouts.master')

@section('content')

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header page-scroll">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#page-top">
				<!-- <img src="{{asset('assets/img/RA_logo_blue.png')}}"> -->
				Akbarisanto
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li class="hidden">
					<a href="#page-top"></a>
				</li>
				<li class="page-scroll">
					<a href="#portfolio">Portfolio</a>
				</li>
				<li class="page-scroll">
					<a href="#blog">Blog</a>
				</li>
				<li class="page-scroll">
					<a href="#about">About</a>
				</li>
				<li class="page-scroll">
					<a href="#contact">Contact</a>
				</li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>

<!-- Header -->
<header>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div id="imgLiquids">
<!-- 					<div id="imgLiquid1" class="imgLiquidFill imgLiquid">
						<img id="pic1" class="img-responsive" src="{{asset('assets/photo/me/img1.jpg')}}" alt="">
					</div> -->
					<div id="imgNonLiquid">
						<img class="img-responsive" src="{{asset('assets/img/RA_logo_red_circle2.png')}}" alt="">
					</div>
<!-- 					<div id="imgLiquid2" class="imgLiquidFill imgLiquid">
						<img id="pic2" class="img-responsive" src="{{asset('assets/photo/me/img2.jpg')}}" alt="">
					</div> -->
				</div>
				<div class="intro-text">
					<span class="name">Ridho Akbarisanto</span>
					<hr class="star-light">
					<span class="skills">@lang('messages.skills')</span>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- Portfolio Grid Section -->
<section id="portfolio">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2>Portfolio</h2>
				<hr class="star-primary">
			</div>
		</div>
	    <div class="row">
            <div class="btn-group filters" data-toggle="tombol">
                <label class="btn btn-default">
                    <input type="radio" name="filter" value="*"/> Show All
                </label> 
                <label class="btn btn-default">
                    <input type="radio" name="filter" value=".game"/> Game
                </label> 
                <label class="btn btn-default">
                    <input type="radio" name="filter" value=".web"/> Web
                </label> 
                <label class="btn btn-default">
                    <input type="radio" name="filter" value=".android"/> Android
                </label> 
	        </div>
    	</div>

	<!-- 		<div id="filters" class="button-group">
				<button data-filter="*">Show All</button>
				<button data-filter="*">Show All</button>
				<button data-filter=".game">Game</button>
				<button data-filter=".web">Web</button>
				<button data-filter=".android">Android</button>
			</div> -->
		<br>
		<div class="row" id="container">
			<?php foreach ($portfolios as $portfolio) { 
				$start = strpos($portfolio['content'],"<img");
				$end = strpos($portfolio['content'],"/>", $start)+2;
				$photo = substr($portfolio['content'],$start,$end-$start);

				$start2 = strpos($photo,"src")+5;
				$end2 = strlen($photo)-3;
				$photo_src = substr($photo,$start2,$end2-$start2);

				$tags = "";
				foreach ($portfolio['tags'] as $tag) {
					$tags = $tags . ' ' . $tag;
				}
				?>
			<div class="portfolio-item item{{$tags}}">
				<a href="#portfolioModal{{$portfolio['id']}}" class="portfolio-link" data-toggle="modal">
					<div class="caption">
						<div class="caption-content">
							<i class="fa fa-search-plus fa-3x"></i>
						</div>
					</div>
					@if($start === false)
						<img src="{{asset('assets/photo/default.jpg')}}" class="img-responsive" alt="">
					@else
						<img src="{{$photo_src}}" class="img-responsive" alt="">
					@endif
					<div id="title">
						<h3>
							{{$portfolio['title']}}
						</h3>
					</div>
				</a>
			</div>
			<?php } ?>

		</div>
	</div>
</section>

<!-- Blog Grid Section -->
<section id="blog">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2>Blog</h2>
				<hr class="star-secondary">
			</div>
		</div>
		<div class="row" id="container2">
			<?php foreach ($blogs as $blog) { 
				$start3 = strpos($blog['content'],"<img");
				$end3 = strpos($blog['content'],"/>", $start3)+2;
				$photo3 = substr($blog['content'],$start3,$end3-$start3);

				$start4 = strpos($photo3,"src")+5;
				$end4 = strlen($photo3)-3;
				$photo_src4 = substr($photo3,$start4,$end4-$start4);
			?>
			<div class="item2">
				<div id="title">
					<h3>
						{{$blog['title']}}
					</h3>
				</div>
<!-- 				@if(strlen($start3)>0)
				<img class="align-left" src="{{$photo_src4}}" class="img-responsive" alt="">
				@endif -->
				<div id="content">
					{{$blog['content']}}
				</div>
			</div>
			<?php } ?>

		</div>
	</div>
</section>

<!-- About Section -->
<section class="success" id="about">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2>About</h2>
				<hr class="star-light">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-lg-offset-2">
				<p>@lang('messages.about1')</p>
			</div>
			<div class="col-lg-4">
				<p>@lang('messages.about2')</p>
			</div>
		</div>
	</div>
</section>

<!-- Contact Section -->
<section id="contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2>Contact Me</h2>
				<hr class="star-primary">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<form action="{{url('mail')}}" method="POST" enctype="multipart/form-data">
					<div class="row control-group">
						<div class="form-group col-xs-12 floating-label-form-group controls">
							<label>Name</label>
							<input name="name" type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<div class="row control-group">
						<div class="form-group col-xs-12 floating-label-form-group controls">
							<label>Email Address</label>
							<input name="email" type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<div class="row control-group">
						<div class="form-group col-xs-12 floating-label-form-group controls">
							<label>Phone Number</label>
							<input name="phone" type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<div class="row control-group">
						<div class="form-group col-xs-12 floating-label-form-group controls">
							<label>Message</label>
							<textarea name="message" rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<br>
					<div id="success"></div>
					<div class="row">
						<div class="form-group col-xs-12">
							<button type="submit" class="btn btn-success btn-lg">Send</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<!-- Footer -->
<footer class="text-center">
	<div class="footer-above">
		<div class="container">
			<div class="row">
				<div class="footer-col col-md-4">
					<h3>Location</h3>
					<p>@lang('messages.address1')<br>
						@lang('messages.address2')</p>
					</div>
					<div class="footer-col col-md-4">
						<h3>Accounts</h3>
						<ul class="list-inline">
							<li>
								<a href="https://www.facebook.com/akbarisanto" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
							</li>
							<li>
								<a href="https://plus.google.com/+RidhoAkbarisanto17" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
							</li>
							<li>
								<a href="https://twitter.com/convyusboy" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
							</li>
							<li>
								<a href="https://id.linkedin.com/in/akbarisanto" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
							</li>
							<li>
								<a href="https://instagram.com/convyusboy" class="btn-social btn-outline"><i class="fa fa-fw fa-instagram"></i></a>
							</li>
							<li>
								<a href="http://akbarisanto.tumblr.com/" class="btn-social btn-outline"><i class="fa fa-fw fa-tumblr"></i></a>
							</li>
							<li>
								<a href="https://soundcloud.com/akbarisanto" class="btn-social btn-outline"><i class="fa fa-fw fa-soundcloud"></i></a>
							</li>
							<li>
								<a href="https://github.com/convyusboy" class="btn-social btn-outline"><i class="fa fa-fw fa-github"></i></a>
							</li>
							<li>
								<a href="https://bitbucket.com/convyusboy" class="btn-social btn-outline"><i class="fa fa-fw fa-bitbucket"></i></a>
							</li>
						</ul>
					</div>
					<div class="footer-col col-md-4">
						<h3>Using</h3>
						<p>Template : <a href="http://startbootstrap.com/template-overviews/freelancer/">Start Bootstrap</a><br>
							Libraries : <a href="http://masonry.desandro.com/">Masonry</a>, <a href="http://isotope.metafizzy.co/">Isotope</a><br>
							Data : <a href="https://www.tumblr.com/developers">tumblr</a></a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-below">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						Copyright &copy; Ridho Akbarisanto 2015
					</div>
				</div>
			</div>
		</div>
	</footer>

	<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
	<div class="scroll-top page-scroll visible-xs visble-sm">
		<a class="btn btn-primary" href="#page-top">
			<i class="fa fa-chevron-up"></i>
		</a>
	</div>

	<!-- Portfolio Modals -->
	<?php foreach ($portfolios as $portfolio) { 
	// $photo = Photo::where('post_id','=',$portfolio->id)->first(); 
		?>
		<div class="portfolio-modal modal fade" id="portfolioModal{{$portfolio['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-content">
				<div class="close-modal" data-dismiss="modal">
					<div class="lr">
						<div class="rl">
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<div class="modal-body">
								<h2>{{$portfolio['title']}}</h2>
								<hr class="star-primary">
								<!-- <img src="{{asset('assets/photo/default.jpg')}}" class="img-responsive img-centered" alt=""> -->

								<p>{{$portfolio['content']}}</p>
								<ul class="list-inline item-details">
									<li>Client:
										<strong><a href="http://startbootstrap.com">Akbarisanto</a>
										</strong>
									</li>
									<li>Date:
										<strong><a href="http://startbootstrap.com">April 2014</a>
										</strong>
									</li>
									<li>Service:
										<strong><a href="http://startbootstrap.com">Web Development</a>
										</strong>
									</li>
								</ul>
								<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>


		@stop