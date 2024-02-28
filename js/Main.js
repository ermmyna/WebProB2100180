jQuery(document).ready(function($) {
    "use strict"

   
    // ------- Counter Start ------- //
    if ($('.counter-count').length) {
        $('.counter-count').each(function() {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 5000,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    }
    // ------- Counter End ------- // 

		if ($('#partner-logos').length) {
			$('#partner-logos').owlCarousel({
				loop: true,
				center: true,
				autoplay: true,
				margin: 30,
				responsiveClass: true,
				responsive: {
					0: {
						items: 1,
						loop: true,
					},
					600: {
						items: 3,
						loop: true,
					},
					1000: {
						items: 5,
						loop: true,
	
					}
				}
			})
		}
	}); //End


	

	/*==================== VIDEO ====================*/
		const videoFile = document.getElementById('video-file'),
		videoButton = document.getElementById('video-button'),
		videoIcon = document.getElementById('video-icon')

		function playPause(){ 
		if (videoFile.paused){
		// Play video
		videoFile.play()
		// We change the icon
		videoIcon.classList.add('ri-pause-line')
		videoIcon.classList.remove('ri-play-line')
		}
		else {
		// Pause video
		videoFile.pause(); 
		// We change the icon
		videoIcon.classList.remove('ri-pause-line')
		videoIcon.classList.add('ri-play-line')

		}
		}
		videoButton.addEventListener('click', playPause)

		function finalVideo(){
		// Video ends, icon change
		videoIcon.classList.remove('ri-pause-line')
		videoIcon.classList.add('ri-play-line')
		}
		// ended, when the video ends
		videoFile.addEventListener('ended', finalVideo)


	// ------- Current Project Slider ------- //
	if ($('.cpro-slider').length) {
		$('.cpro-slider').owlCarousel({
			loop: true,
			margin: 10,
			responsiveClass: true,
			nav: true,
			autoplay: true,
			dots: false,
			responsive: {
				0: {
					items: 1,
				},
				567: {
					items: 2,
				},
	
				991: {
					items: 3,
				},
	
				1000: {
					items: 4,
					loop: false
				}
			}
		})
	}

	

	// ------- Current Project Slider End ------- //


	// ------- Core Project Slider ------- //
	if ($('#core-projects-slider').length) {
		$('#core-projects-slider').owlCarousel({
			loop: true,
			margin: 30,
			autoplay: true,
			responsiveClass: true,
			nav: true,
			dots: false,
			responsive: {
				0: {
					items: 1,
				},
				600: {
					items: 2,
				},
				768: {
					items: 3,
				},
				1200: {
					items: 4,
					loop: false
				},
	
				1400: {
					items: 6,
					loop: false
				}
	
			}
		})
	}
	// ------- Core Project Slider End ------- //




	// ------- Core Project Slider ------- //
	if ($('#h3testimonials').length) {
		$('#h3testimonials').owlCarousel({
			loop: true,
			margin: 30,
			responsiveClass: true,
			autoHeight: true,
			autoplay: true,
			center: true,
			responsive: {
				0: {
					items: 1,
				},
				600: {
					items: 2,
				},
				1000: {
					items: 3,
					loop: true,
				}
			}
		})
	}
	// ------- Core Project Slider End ------- //


	// ------- Core Project Slider ------- //
	if ($('#testimonials').length) {
		$('#testimonials').owlCarousel({
			margin: 30,
			responsiveClass: true,
			autoHeight: true,
			autoplay: true,
			dots: true,
			responsive: {
				0: {
					items: 1,
				},
				600: {
					items: 2,
				},
				1000: {
					items: 4,
					loop: true,
				}
			}
		})
	}
	// ------- Core Project Slider End ------- //




	// ------- Home Slider Start ------- //
	if ($('#h3-events').length) {
		$('#h3-events').owlCarousel({
			loop: true,
			margin: 0,
			nav: true,
			dots: false,
			items: 1,
		})
	}
	// ------- Home Slider End ------- //
	
	
	
	// ------- Home Slider Start ------- //
	if ($('#side-slider').length) {
		$('#side-slider').owlCarousel({
			loop: true,
			margin: 0,
			nav: true,
			dots: false,
			items: 1,
			autoplay: true,
	
		})
	}
	// ------- Home Slider End ------- //



	// ------- Filter Gallery Start ------- //
	if ($('.filter-gallery').length) {
		if ($('.filter-gallery .isotope').length) {
			var $container = $('.filter-gallery .isotope');
			$container.isotope({
				itemSelector: '.item',
				transitionDuration: '0.6s',
				masonry: {
					columnWidth: $container.width() / 12
				},
				layoutMode: 'masonry'
			});
			$(window).on("resize", function() {
				$container.isotope({
					masonry: {
						columnWidth: $container.width() / 12
					}
				});
			});
		}
		if ($('.filter-gallery #filters').length) {
			$('.filter-gallery #filters').on('click', 'button', function() {
				var filterValue = $(this).attr('data-filter');
				$container.isotope({
					filter: filterValue
				});
			});
			// change is-checked class on buttons
			$('.filter-gallery .button-group').each(function(i, buttonGroup) {
				var $buttonGroup = $(buttonGroup);
				$buttonGroup.on('click', 'button', function() {
					$buttonGroup.find('.is-checked').removeClass('is-checked');
					$(this).addClass('is-checked');
				});
			});
	
		}
	}
	
	
	// ------- TimeLine ------- //
	
	if ($('.timeline').length) {
		$('.timeline').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			asNavFor: '.timeline-nav'
		});
	}
	
	if ($('.timeline-nav').length) {
		$('.timeline-nav').slick({
			slidesToShow: 3,
			slidesToScroll: 3,
			asNavFor: '.timeline',
			dots: false,
			arrows: false,
			centerMode: true,
			focusOnSelect: true,
			responsive: [{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
						infinite: false,
						dots: false
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
		});
	}
	
	// ------- TimeLine End ------- //
	
	
	
	// ------- Search Overlay Start ------- //
	
	if ($('a[href="#search"]').length) {
		$(function () {
		$('a[href="#search"]').on('click', function(event) {
			event.preventDefault();
			$('#search').addClass('open');
			$('#search > form > input[type="search"]').focus();
		});
		$('#search, #search button.close').on('click keyup', function(event) {
			if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
				$(this).removeClass('open');
			}
		});
		$('form').submit(function(event) {
			event.preventDefault();
			return false;
		})
		});
	}
	
	// ------- Search Overlay End ------- //
	
	
	// ------- Counter ------- //
	if ($('.countdown').length) {
		var austDay = new Date();
		austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
		$('.countdown').countdown({
			until: austDay
		});
		$('#year').text(austDay.getFullYear());
	}
	
	
	if ($('.hamburger-menu').length) {
		 $('.hamburger-menu').on('click', function (e){
        e.preventDefault();
        if ($(this).hasClass('active')){
            $(this).removeClass('active');
            $('.menu-overlay').fadeToggle( 'fast', 'linear' );
            $('.menu .menu-list').slideToggle( 'slow', 'swing' );
            $('.hamburger-menu-wrapper').toggleClass('bounce-effect');
        } else {
            $(this).addClass('active');
            $('.menu-overlay').fadeToggle( 'fast', 'linear' );
            $('.menu .menu-list').slideToggle( 'slow', 'swing' );
            $('.hamburger-menu-wrapper').toggleClass('bounce-effect');
        }
    })
	}
	
	if ($('.burger, .overlay').length) {
	$('.burger, .overlay').on('click', function(){
	  $('.burger').toggleClass('clicked');
	  $('.overlay').toggleClass('show');
	  $('nav').toggleClass('show');
	  $('body').toggleClass('overflow');
	});
	}



	
	
	
	