$(document).ready(function() {
	
	redrawDotNav();
	
	/* Scroll event handler */
	$(window).bind('scroll',function(e){
		parallaxScroll();
		redrawDotNav();
	});

	/* Next/prev and primary nav btn click handlers */
	$('a.welcome').click(function(){
		$('html, body').animate({
			scrollTop:0
		}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
	    });
		return false;
	});
	$('a.work').click(function(){
		$('html, body').animate({
			scrollTop:$('#work').offset().top
		}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
	    });
		return false;
	});
	$('a.story').click(function(){
		$('html, body').animate({
			scrollTop:$('#story').offset().top
		}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
	    });
		return false;
	});
	$('a.collection').click(function(){
		$('html, body').animate({
			scrollTop:$('#collection').offset().top
		}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
	    });
		return false;
	});
	$('a.about').click(function(){
		$('html, body').animate({
			scrollTop:$('#about').offset().top
		}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
	    });
		return false;
	});
	$('a.contact').click(function(){
		$('html, body').animate({
			scrollTop:$('#contact').offset().top
		}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
	    });
		return false;
	});
	$('a.bye').click(function(){
		$('html, body').animate({
			scrollTop:$('#bye').offset().top
		}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
	    });
		return false;
	});

	/* Show/hide dot lav labels on hover */
	$('nav#primary a').hover(
		function () {
			$(this).prev('h1').show();
		},
		function () {
			$(this).prev('h1').hide();
		}
		);

});

/* Scroll the background layers */
function parallaxScroll(){
	var scrolled = $(window).scrollTop();
	$('#parallax-bg1').css('top',(0-(scrolled*.25))+'px');
	$('#parallax-bg2').css('top',(0-(scrolled*.5))+'px');
	$('#parallax-bg3').css('top',(0-(scrolled*.75))+'px');
	$('#parallax-bg4').css('left',(0+(scrolled*.3))+'px');
	$('#parallax-bg5').css('top',(0+(scrolled*.3))+'px');
	// $('#parallax-bg6').css('top',(0-(scrolled*.3))+'px');
	$('#parallax-bg6').css('left',(0+(scrolled*.3))+'px');
	$('#parallax-bg7').css('top',(0-(scrolled))+'px');
	// $('#parallax-bg5').css('left',(0-(scrolled*.5))+'px');
}

/* Set navigation dots to an active state as the user scrolls */
function redrawDotNav(){
	var section1Top =  0;
	// The top of each section is offset by half the distance to the previous section.
	var section2Top =  $('#work').offset().top - (($('#story').offset().top - $('#work').offset().top) / 2);
	var section3Top =  $('#story').offset().top - (($('#collection').offset().top - $('#story').offset().top) / 2);
	var section4Top =  $('#collection').offset().top - (($('#about').offset().top - $('#collection').offset().top) / 2);
	var section5Top =  $('#about').offset().top - (($('#contact').offset().top - $('#about').offset().top) / 2);
	var section6Top =  $('#contact').offset().top - (($('#bye').offset().top - $('#contact').offset().top) / 2);
	var section7Top =  $('#bye').offset().top - (($(document).height() - $('#bye').offset().top) / 2);;
	$('nav#primary a').removeClass('active');
	if($(document).scrollTop() >= section1Top && $(document).scrollTop() < section2Top){
		$('nav#primary a.welcome').addClass('active');
	} else if ($(document).scrollTop() >= section2Top && $(document).scrollTop() < section3Top){
		$('nav#primary a.work').addClass('active');
	} else if ($(document).scrollTop() >= section3Top && $(document).scrollTop() < section4Top){
		$('nav#primary a.story').addClass('active');
	} else if ($(document).scrollTop() >= section4Top && $(document).scrollTop() < section5Top){
		$('nav#primary a.collection').addClass('active');
	} else if ($(document).scrollTop() >= section5Top && $(document).scrollTop() < section6Top){
		$('nav#primary a.about').addClass('active');
	} else if ($(document).scrollTop() >= section6Top && $(document).scrollTop() < section7Top){
		$('nav#primary a.contact').addClass('active');
	} else if ($(document).scrollTop() >= section7Top){
		$('nav#primary a.bye').addClass('active');
	}
}
