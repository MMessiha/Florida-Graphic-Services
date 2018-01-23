;
(function ($) {


	// Sticky Footer
	var bumpIt = function() {
			$('body').css('padding-bottom', $('.footer').outerHeight(true));
			$('.footer').addClass('sticky-footer');
		},
		didResize = false;

	$(window).resize(function() {
		didResize = true;
	});
	setInterval(function() {
		if(didResize) {
			didResize = false;
			bumpIt();
		}
	}, 250);

	// Show or hide Search form on Search Button click
	function showSearchForm(){
		var searchForm = $('#searchform');
		var searchBtn = $('#search-btn');
		searchBtn.on('click', function(){
			if(searchForm.is(":visible")){
				searchForm.fadeOut(300);
			}else{
				searchForm.fadeIn(300);
			}
		});
		$(document).mouseup(function(e){
			if(!searchForm.is(e.target) && searchForm.has(e.target).length === 0){
				if(!searchBtn.is(e.target) && searchBtn.has(e.target).length === 0){
					searchForm.fadeOut();
				}
			}
		});
	}

	function activeTab(link, e, attrHesh) {
		if ($('.tabs').length) {
			if (link) {
				if (attrHesh) {
					var hash = attrHesh.replace('#', '');
				} else {
					if (link && location.pathname.replace(/^\//, '') == link.pathname.replace(/^\//, '')
				         && location.hostname == link.hostname) {
						e.preventDefault();
					}
					var hash = link.hash;
					var hash = hash.replace('#', '');
					window.location.hash = "";
				}
			} else {
				var hash = window.location.hash;
				var hash = hash.replace('#', '');
				window.location.hash = "";
			}

			if ($("#" + hash).length) {
				if ($("#" + hash).hasClass('tabs-panel')) {
					$('[data-tabs]').eq(0).foundation('selectTab', $("#" + hash));
				} else {
					var tabID = $("#" + hash).closest('.tabs-panel').attr('id');
					$('[data-tabs]').eq(0).foundation('selectTab', $("#" + tabID));
					if ($("#" + hash).hasClass('hidden')) {
						$("#" + tabID).find('.portfolio-post').removeClass('hidden');
						$("#" + tabID).find('.view-more').hide();
					}
					$('html, body').animate({
						scrollTop: $("#" + hash).offset().top - 50
					}, 600);
				}

				if ($('.tabs-title').hasClass('slick-slide')) {
					var slideIndex = $('.tabs-title.is-active').data('slick-index');
					$('#portfolio-tabs').slick('slickGoTo', slideIndex);
				}
				if ($('body').hasClass('page-template-template-contact')) {
					$('h1.page-title').html($('.tabs-title.is-active .tabs-title-link').html());
				}
			}
		}
	}

	function checkThumb(i){
		$('.tabs-panel.is-active .portfolio-thumbnail').removeClass('current').eq(i).addClass('current');
	}


	function subMenuWidth() {
		var menuWidth = $('#main-menu .ubermenu-nav').outerWidth();
		var firstSMWidth = $('#main-menu .ubermenu-item-level-0 > .ubermenu-submenu').outerWidth();
		$('#main-menu .ubermenu-item-level-1 > .ubermenu-submenu.ubermenu-submenu-type-mega.ubermenu-submenu-align-vertical_full_height').outerWidth(menuWidth - firstSMWidth);
	}


	// Scripts which runs after DOM load

	$(document).ready(function () {
		bumpIt();
		showSearchForm();

		$('#portfolio-tabs').slick({
			arrows: true,
			dots: false,
			autoplay: false,
			slidesToShow: 3,
			slidesToScroll: 1,
			//centerMode: true,
			//variableWidth: true,
			infinite: true,
			slide: '#portfolio-tabs .tabs-title', // Cause trouble with responsive settings
			responsive: [
				{
					breakpoint: 901,
					settings: {
						slidesToShow: 2,
					}
				},
				{
					breakpoint: 641,
					settings: {
						slidesToShow: 1,
					}
				},
		   ]
		});

		$('.tabs-panel .portfolio-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
			// console.log(nextSlide);
			checkThumb(nextSlide);
		}).on('init', function(event, slick){
			checkThumb(0);
		});
		var portfolio_settings = {
			cssEase: 'ease',
			fade: true,  // Cause trouble if used slidesToShow: more than one
			arrows: true,
			dots: false,
			infinite: true,
			speed: 500,
			autoplay: false,
			autoplaySpeed: 5000,
			slidesToShow: 1,
			slidesToScroll: 1,
			slide: '.portfolio-slider-item', // Cause trouble with responsive settings
		};
		setTimeout(function() {
			$('.tabs-panel.is-active .portfolio-slider').slick(portfolio_settings);
		}, 1);




		activeTab();

		if ($('body').hasClass('page-template-template-contact')) {
			$('.tabs .tabs-title').on('click', function(){
				var headerContent = $(this).find('.tabs-title-link').html();
				$('h1.page-title').html(headerContent);
			});
		}

		if ($('body').hasClass('page-template-template-page-portfolio')) {
			$('.tabs .tabs-title').on('click', function(){
				$('.portfolio-slider.slick-initialized').slick('unslick');
				setTimeout(function() {
					$('.tabs-panel.is-active .portfolio-slider').slick(portfolio_settings);
					var slideIndex = $('.tabs-title.is-active').data('slick-index');
					$('#portfolio-tabs').slick('slickGoTo', slideIndex);
					$('.tabs-title').removeClass('is-active').find('.tabs-title-link').attr('aria-selected','false');
					$('.tabs-title.slick-current').addClass('is-active').find('.tabs-title-link').attr('aria-selected','true');
				}, 1);
			});
			$('body').on('click', '.portfolio-thumbnail', function() {
				var slideIndex =  $(this).data('index');
				$(this).closest('.tabs-panel').find('.portfolio-slider').slick('slickGoTo', slideIndex);
			});
		}



		$('.view-more-btn').on('click', function() {
			$(this).closest('.view-more').siblings('.portfolio-post').removeClass('hidden');
			$(this).closest('.view-more').hide();
		});


		$("textarea").each(function () {
			if ($(this).closest('.gfield').find('.gfield_description').length) {
				$(this).closest('.gfield').addClass('has-description');
			}
		});


		//Remove placeholder on click
		$("input,textarea").each(function () {
			$(this).data('holder', $(this).attr('placeholder'));

			$(this).focusin(function () {
				$(this).attr('placeholder', '');
				if ($(this).closest('.gfield').hasClass('has-description')) {
					$(this).closest('.gfield').find('.gfield_description').hide();
				}
			});

			$(this).focusout(function () {
				$(this).attr('placeholder', $(this).data('holder'));
				$('.gfield.has-description .gfield_description').show();
			});
		});

		//Make elements equal height
		$('.matchHeight').matchHeight();

		// Add fancybox to images
		$('.gallery-item a').attr('rel', 'gallery');
		$('a[rel*="album"], .gallery-item a, .fancybox, a[href$="jpg"], a[href$="png"], a[href$="gif"]').fancybox({
			minHeight: 0,
			helpers: {
				overlay: {
					locked: false
				}
			}
		});

		// Sticky footer
		$('.footer').find('img').one('load',function () {
			bumpIt();
		}).each(function () {
			if(this.complete) $(this).load();
		});


	});


	// Scripts which runs after all elements load

	$(window).on( 'load', function () {
		subMenuWidth();


		$('.ubermenu-item a').filter("[data-ubermenu-scrolltarget]").on('click', function(e){
			var attrHesh = $(this).attr("data-ubermenu-scrolltarget");
			activeTab(this, e, attrHesh);
			//return false;
		});


		$('a[href*="#"]:not([href="#"],[href="#0"],[href^="#popup-"])').on('click', function(e){
		   activeTab(this, e);
		});

		//jQuery code goes here
		if($('.preloader').length){
			$('.preloader').addClass('preloader--hidden');
		}



	});

	// Scripts which runs at window resize

	$(window).resize(function () {
		subMenuWidth();
		//jQuery code goes here


	});

}(jQuery));
