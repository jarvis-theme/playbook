define(['jquery','navgoco','bootstrap'], function($,navgoco)
{
	return new function(){
		var self = this;
		self.run = function(){
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
            
            $('.sidey .nav').navgoco();

            $('footer h4.title').click(function() {
                $(this).toggleClass('active');
                $(this).next().slideToggle(250);
            });
		};
	}
});