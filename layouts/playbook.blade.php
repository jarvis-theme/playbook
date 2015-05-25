<!DOCTYPE html>
<html lang="en">
    <head>
        <!--seostuff.blade.php-->
        {{ Theme::partial('seostuff') }} 
        <!--defaultcss.blade.php-->
        {{ Theme::partial('defaultcss') }}  
        {{ Theme::asset()->styles() }}  
    </head>
    <body>
        <div class="preloader"></div>
        <div class="page">
            <!--header-->
            {{ Theme::partial('header') }} 
            <!--slider--> 
            {{ Theme::partial('slider') }} 
            <section id="main-content">
                {{ Theme::place('content') }}  
            </section>
            <!--footer-->
            {{ Theme::partial('footer') }}  
        </div>
        
        {{ Theme::partial('defaultjs') }}
        {{ Theme::asset()->scripts() }}
        {{ Theme::asset()->container('footer')->scripts() }}
        {{ Theme::partial('analytic') }} 
    </body>
</html>