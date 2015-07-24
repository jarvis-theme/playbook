var dirTema = document.querySelector('link[rel="playbook-theme"]').href;

require.config({
	baseUrl: '/',
	shim: {
		"bootstrap"	: {
			deps: ['jquery'],
		},
		'jq_ui' : {
			deps : ['jquery'],
		},
		"noty_util" : {
			deps : ['jquery','noty'],
		},
		"noty" : {
			deps : ['jquery'],
		},
		"cart" : {
			deps : ['jquery'],
		},
		'fancybox' : {
			deps : ['jquery']
		},
		"owl_carousel" : {
			deps: ['jquery'],
		},
		"jq_flexslider" : {
			deps : ['jquery'],
		},
	},
	waitSeconds: 1500,

	paths: {
		// LIBRARY
		jquery 			: ['//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min',dirTema+'assets/js/jquery.min'],
		cart			: 'js/shop_cart',
		jq_ui			: 'js/jquery-ui',
		noty			: 'js/jquery.noty',
		noty_util			: 'js/utils/noty',
		bootstrap		: dirTema+'/assets/js/bootstrap.min',
		fancybox		: dirTema+'assets/js/jquery.fancybox.pack',
		jq_flexslider		: dirTema+'assets/js/jquery.flexslider-min',
		owl_carousel		: dirTema+'assets/js/owl.carousel.min',
		navgoco			: dirTema+'assets/js/jquery.navgoco.min',
		
		// ROUTE
		router          : 'js/router',

		// CONTROLLER
		home            : dirTema+'assets/js/pages/home',
		member          : dirTema+'assets/js/pages/member',
		produk          : dirTema+'assets/js/pages/produk',
	}
});
require([
	'jquery',
	'router',
	'cart',
	'noty_util'

], function($,router,cart,noty)
{
	// PRODUK
	router.define('/', 'home@run');
	router.define('home', 'home@run');
	router.define('produk/*', 'produk@run');
	router.run();
	noty.run();
	cart.run();

	// PRELOADER
	if ($('body').hasClass('hide')) {
		$('.preloader').fadeOut(1000, function(){
			setTimeout(function(){$('.preloader').remove(); },2000);
			$('body').removeClass('hide');
		});
		$('body').removeClass('hide');
	} else {
		$('.preloader').fadeOut(1000, function(){
			$('.preloader').remove();
		});
	}
	
});