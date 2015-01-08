@extends('layouts.master_dev')

@section('content')

<div class="container">
	<div class="menu-wrap">
		<nav class="menu">
			<div class="icon-list">
				<a href="#page-top"><i class="nav fa fa-fw fa-star-o"></i><span>Home</span></a>
				<a href="#portfolio"><i class="nav fa fa-fw fa-bell-o"></i><span>Portfolio</span></a>
				<a href="#blog"><i class="nav fa fa-fw fa-envelope-o"></i><span>Blog</span></a>
				<a href="#about"><i class="nav fa fa-fw fa-comment-o"></i><span>About</span></a>
				<a href="#contact"><i class="nav fa fa-fw fa-bar-chart-o"></i><span>Contact</span></a>
			</div>
		</nav>
		<button class="close-button" id="close-button">Close Menu</button>
		<div class="morph-shape" id="morph-shape" data-morph-open="M0,100h1000V0c0,0-136.938,0-224,0C583,0,610.924,0,498,0C387,0,395,0,249,0C118,0,0,0,0,0V100z">
			<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 1000 100" preserveAspectRatio="none">
				<path d="M0,100h1000l0,0c0,0-136.938,0-224,0c-193,0-170.235-1.256-278-35C399,34,395,0,249,0C118,0,0,100,0,100L0,100z"/>
			</svg>
		</div>
	</div>
	<button class="menu-button" id="open-button">Open Menu</button>
	<div class="content-wrap">
		<div class="content">
			<header>
				<div class="codrop-links container">
					<div class="row">
						<div class="col-lg-12">
							<div id="imgLiquids">
								<div id="imgLiquid1" class="imgLiquidFill imgLiquid">
									<img id="pic1" class="img-responsive" src="{{asset('assets/photo/me/img1.jpg')}}" alt="">
								</div>
								<div id="imgNonLiquid">
									<img class="img-responsive" src="{{asset('assets/img/RA_logo_red_circle2.png')}}" alt="">
								</div>
								<div id="imgLiquid2" class="imgLiquidFill imgLiquid">
									<img id="pic2" class="img-responsive" src="{{asset('assets/photo/me/img2.jpg')}}" alt="">
								</div>
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
						<?php foreach ($portfolios as $portfolio) { ?>
						<div class="col-sm-4 portfolio-item">
							<a href="#portfolioModal{{$portfolio['id']}}" class="portfolio-link" data-toggle="modal">
								<div class="caption">
									<div class="caption-content">
										<i class="fa fa-search-plus fa-3x"></i>
									</div>
								</div>
								<img src="{{asset('assets/photo/default.jpg')}}" class="img-responsive" alt="">
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
							<hr class="star-primary">
						</div>
					</div>
					<div class="row">
						<?php foreach ($blogs as $blog) { $photo = Photo::where('post_id','=',$blog->id)->first(); ?>
						<div class="col-sm-4 blog-item">
							<a href="#blogModal{{$blog->id}}" class="blog-link" data-toggle="modal">
								<div class="caption">
									<div class="caption-content">
										<i class="fa fa-search-plus fa-3x"></i>
									</div>
								</div>
								@if(count($photo)>0)
								<img src="{{asset('assets/photo/'.$photo->id.'.jpg')}}" class="img-responsive" alt="">
								@else
								<img src="{{asset('assets/photo/default.jpg')}}" class="img-responsive" alt="">
								@endif
							</a>
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
							<!-- <form action="{{url('mail')}}" method="POST" enctype="multipart/form-data"> -->
							<form name="sentMessage" id="contactForm" novalidate>
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
									<h3>Online Accounts</h3>
									<ul class="list-inline">
										<li>
											<a href="https://www.facebook.com/akbarisanto" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
										</li>
										<li>
											<a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
										</li>
										<li>
											<a href="https://twitter.com/convyusboy" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
										</li>
										<li>
											<a href="https://www.linkedin.com/profile/view?id=319779441&trk=nav_responsive_tab_profile" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
										</li>
										<li>
											<a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
										</li>
									</ul>
								</div>
								<div class="footer-col col-md-4">
									<h3>Others</h3>
									<p></p>
								</div>
							</div>
						</div>
					</div>
					<div class="footer-below">
						<div class="container">
							<div class="row">
								<div class="col-lg-12">
									Copyright &copy; Your Website 2014
								</div>
							</div>
						</div>
					</div>
				</footer>

				<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<!-- 			<div class="scroll-top page-scroll visible-xs visble-sm">
				<a class="btn btn-primary" href="#portfolio">
					<i class="fa fa-chevron-up"></i>
				</a>
			</div>
		-->

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
									<img src="{{asset('assets/photo/default.jpg')}}" class="img-responsive img-centered" alt="">

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

			<!-- Blog Modals -->
			<?php foreach ($blogs as $blog) { $photo = Photo::where('post_id','=',$blog->id)->first(); ?>
			<div class="blog-modal modal fade" id="blogModal{{$blog->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
									<h2>{{$blog->title}}</h2>
									<hr class="star-primary">
									@if(count($photo)>0)
									<img src="{{asset('assets/photo/'.$photo->id.'.jpg')}}" class="img-responsive img-centered" alt="">
									@else
									<img src="{{asset('assets/photo/default.jpg')}}" class="img-responsive img-centered" alt="">
									@endif

									<p>{{$blog->content}}</p>
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

		</div>
	</div><!-- /content-wrap -->
</div><!-- /container -->


@stop