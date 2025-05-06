jQuery(function($) {
	$(document).ready(function () {
		$('.promo-row__wrap.owl-carousel').owlCarousel({
			items: 1,          // always 1 item
			loop: true,
			margin: 10,
			nav: false,        // arrows OFF
			dots: true,        // dots ON
			autoplay: true,
			autoplayTimeout: 5000,
			responsive: false  // disable responsiveness
		});

		$('.burger').mouseup(function(){
			$(this).toggleClass('active');
			$('.header__nav').toggleClass('active');
			$('main').toggleClass('active');
			// $('main').css('transform', 'translateX(80%)');
			// $('main').css('filter', 'brightness(0.5)');
		});
		// $('.close-nav-mobile').mouseup(function(){
		// 	$(this).removeClass('active');
		// 	$('.header__nav').removeClass('active');
		// 	$('main').css('transform', 'translateX(0)');
		// 	$('main').css('filter', 'brightness(1)');
		// });

		$('.list-thumler').mouseup(function(){
			$(this).toggleClass('active');
			$('.locations').toggleClass('active');
		})
		$('.list-thumler__trigger').mouseup(function(){
			$('.list-thumler').trigger('mouseup');
		})
		var windowsize = $(window).width();
		if (windowsize <= 768) {
			// $('.list-thumler').removeClass('active');
			// $('.locations').removeClass('active');
			$('main').mouseup(function(){
				$('.header__nav').removeClass('active');
				$('main').css('transform', 'translateX(0)');
			})
		}

		$(window).scroll(function(){
	    	if (windowsize > 768) {
			    if($(this).scrollTop()>=40){
			        $('.promo-row').fadeOut();
			    } else{
			    	$('.promo-row').fadeIn();
			    };
			};
		});
	});
});