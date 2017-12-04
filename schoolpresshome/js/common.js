$(document).ready(function(){

//---------------------------------------------------------
// Internet Explorer 6-11
//---------------------------------------------------------

	var isIE = /*@cc_on!@*/false || !!document.documentMode;
//---------------------------------------------------------
//is mobile
//---------------------------------------------------------
	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
			BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
			iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
			Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
			Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
			any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};

//---------------------------------------------------------
//burger-menu
//---------------------------------------------------------

	$('.burger-icon').click(function(){
		$('.burger-icon__line_line1').toggleClass('burger-icon__line_line-open1');
		$('.burger-icon__line_line2').toggleClass('burger-icon__line_line-open2');
		$('.burger-icon__line_line3').toggleClass('burger-icon__line_line-open3');
		$('.burger-menu').toggleClass('burger-menu_visible');
		$('.page-overlay').toggleClass('page-overlay_visible');
		$('body').toggleClass('overflow');
	});

	$('.page-overlay').click(function(){
		$('.burger-icon__line_line1, .burger-icon__line_line2, .burger-icon__line_line3, .burger-menu, .page-overlay, body, .burger-icon, .video').removeClass('burger-icon__line_line-open1 burger-icon__line_line-open2 burger-icon__line_line-open3 burger-menu_visible page-overlay_visible overflow burger-icon_hide video_visible');
	});

	$('#js-watch-video-head, #js-watch-video-content').click(function(){
		$('.video').addClass('video_visible');
		$('.page-overlay').addClass('page-overlay_visible');
		$('.burger-icon').toggleClass('burger-icon_hide');
	});

//---------------------------------------------------------
// waypoints v2
//---------------------------------------------------------

var contentWayPoint = function() {
		var i = 0;
		$('.animate-box').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('animated') ) {

				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .animate-box.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight animated');
							} else {
								el.addClass('fadeInUp animated');
							}

							el.removeClass('item-animate');
						},  k * 200, 'easeInOutExpo' );
					});

				}, 100);

			}

		} , { offset: '85%' } );
	};


//---------------------------------------------------------
// waypoints v1
//---------------------------------------------
// 	$('.showcase-title, .showcase-box, .description-box').css('opacity',0);
// 	//delay function
// 	var itemQueue = []
//   	var delay = 200
//   	var queueTimer

// 	function processItemQueue () {
//     if (queueTimer) return // We're already processing the queue
//     queueTimer = window.setInterval(function () {
//       if (itemQueue.length) {
//         $(itemQueue.shift()).addClass('animated fadeInUp');
//         processItemQueue();
//       	} else {
//         window.clearInterval(queueTimer);
//         queueTimer = null;
//         	}
// 		}, delay)
//   	}

//   	$(".description-box").waypoint(function () {
//     itemQueue.push(this.element);
//     processItemQueue();
//   	}, {
//     offset: '80%'
//   	})




//---------------------------------------------------------
// Loading page
//---------------------------------------------------------

	var loaderPage = function () {
		$(window).on('load', function () {
    	var $preloader = $('#preloader-page'),
    	    $dots   = $preloader.find('.preloader-dots');
    	$dots.fadeOut();
    	$preloader.delay(150).fadeOut('slow');
  		});
	};

//---------------------------------------------------------
//stellar parallax
//---------------------------------------------------------

	var parallax = function() {

		if ( !isMobile.any() || !isIE) {
			$(window).stellar({
				horizontalScrolling: false,
				hideDistantElements: false,
				responsive: false

			});
		}
	};

//---------------------------------------------------------
//testimonialCarousel
//---------------------------------------------------------
	var testimonialCarousel = function(){

		var owl = $('.owl-carousel');
		owl.owlCarousel({
			items: 1,
			loop: true,
			margin: 0,
			nav: false,
			dots: true,
			smartSpeed: 800,
			autoHeight: true
		});

	};

//---------------------------------------------------------
//counter
//---------------------------------------------------------

 	var counter = function() {
		$('.counter__digit').countTo({
			 formatter: function (value, options) {
	      return value.toFixed(options.decimals);
	    }
		});
	};

//---------------------------------------------------------
//goToTop
//---------------------------------------------------------

	var goToTop = function() {

		$('.js-top').on('click', function(event){
			event.preventDefault();
			$('html, body').animate({
				scrollTop: $('html').offset().top
			}, 2000 , 'easeOutExpo');
			return false;
		});

		$(window).scroll(function(){

			var $win = $(window);
			if ($win.scrollTop() > 300) {
				$('.js-top').addClass('js-top_active');
			} else {
				$('.js-top').removeClass('js-top_active');
			}

		});

	};


//---------------------------------------------------------
//svg sprites
//---------------------------------------------------------
  var svg = function () {
  	svg4everybody({});
	};


//---------------------------------------------------------
//function launch
//---------------------------------------------------------

	$(function(){
		contentWayPoint();
		svg();
		loaderPage();
		parallax();
		testimonialCarousel();
		counter();
		goToTop();
	});

 // 	$(function(){
	// 	mobileMenuOutsideClick();
	// 	offcanvasMenu();
	// 	burgerMenu();
	//
	// 	dropdown();
	//
	//
	// 	counterWayPoint();
	// 	parallax();
	// 	testimonialCarousel();
	// });

});





// 	// Loading page
// 	var loaderPage = function() {
// 		$(".fh5co-loader").fadeOut("slow");
// 	};

// 	var counter = function() {
// 		$('.js-counter').countTo({
// 			 formatter: function (value, options) {
// 	      return value.toFixed(options.decimals);
// 	    },
// 		});
// 	};

// 	var counterWayPoint = function() {
// 		if ($('#fh5co-counter').length > 0 ) {
// 			$('#fh5co-counter').waypoint( function( direction ) {

// 				if( direction === 'down' && !$(this.element).hasClass('animated') ) {
// 					setTimeout( counter , 400);
// 					$(this.element).addClass('animated');
// 				}
// 			} , { offset: '90%' } );
// 		}
// 	};






// }());