<div id="slide-row">
	<div id="bg-slider">
    	<div class="container">
            <div id="da-slider" class="flexslider">
                <ul class="slides">
                    @foreach (slideshow() as $val)  
                    <li> {{HTML::image(slide_image_url($val->gambar), 'slide banner',array('width'=>'1020', 'height'=>'285'))}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div><!--#bg-slider-->
	<div id="adv-home">
    	<div class="container">
            <div class="row">
                @foreach(horizontal_banner() as $banners)
                <div class="col-sm-12">
                    <div class="adv-full">
                        <a href="{{URL::to($banners->url)}}">
                            {{HTML::image(banner_image_url($banners->gambar),'banner',array('width'=>'1181','height'=>'80'))}}
                        </a>
                    </div>
                </div>
                @endforeach
    	   </div>
	   </div>
   </div><!--.adv-home-->
</div><!--#slide-row-->