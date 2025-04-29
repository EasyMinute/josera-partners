jQuery(function($) {
	$(document).ready(function () {
		$('.burger').mouseup(function(){
			// $(this).toggleClass('active');
			$('.header__nav').addClass('active');
			$('main').css('transform', 'translateX(80%)');
		});
		$('.close-nav-mobile').mouseup(function(){
			$('.header__nav').removeClass('active');
			$('main').css('transform', 'translateX(0)');
		});

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