   
        {{generate_theme_css('playbook/assets/css/reset.css')}}
        {{generate_theme_css('playbook/assets/css/bootstrap.css')}}
        {{generate_theme_css('playbook/assets/css/font-awesome.min.css')}}
        @if($tema->isiCss=='')  
        {{generate_theme_css('playbook/assets/css/style.css')}}
        @else   
        {{generate_theme_css('playbook/assets/css/editstyle.css')}}
        @endif  
        {{generate_theme_css('playbook/assets/css/flexslider.css')}}
        {{generate_theme_css('playbook/assets/css/owl.carousel.css')}}
        {{generate_theme_css('playbook/assets/css/owl.theme.css')}}
        {{generate_theme_css('playbook/assets/css/jquery.fancybox.css')}}
        {{createFavicon($toko)}}

        {{generate_theme_js('playbook/assets/js/modernizr.custom.28468.js')}}
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>

        <noscript>
        {{generate_theme_css('playbook/assets/css/nojs.css')}}
        </noscript>