define(['jquery','fancybox'], function($)
{
	return new function(){
		var self = this;
		self.run = function(){

			$("a.fancybox").fancybox({
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'speedIn'		:	600, 
				'speedOut'		:	200, 
				'overlayShow'	:	false
			});
		};
	}
});