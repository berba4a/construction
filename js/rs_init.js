$(document).ready(function () {
	var opts = {
	interval : 3,
	transition: 2000,
	controls: {
	previousSlide: {
	place: function($slideshow, $control) {
	$slideshow.append($control);
	},
	auto: true
	},
	nextSlide: {
	place: function($slideshow, $control) {
	$slideshow.append($control);
	},
	auto: true
	},
	index: {auto: true}//displays paginated slider navigation as numbers (1,2,3,4,5, etc)
	}
	};
		$('.rs-slideshow').rsfSlideshow(opts);
		$('.rs-slideshow').mouseenter(function(e) {
		$(this).rsfSlideshow('stopShow');
	});
		$('.rs-slideshow').mouseleave(function(e) {
		$(this).rsfSlideshow('startShow');
	});

});