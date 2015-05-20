<br>
<div class="container">
<div class="breadcrumb"><p>Hasil Pencarian</p></div>
<div class="inner-column row">
<div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
    <div id="categories" class="block">
        <div class="title"><h2>Kategori</h2></div>
        <ul class="block-content">
            @foreach(list_category() as $category)
            <li><a href="{{category_url($category)}}">{{$category->nama}} <!--<span class="arrow-right">--></span></a></li>
           @endforeach
        </ul>
    </div>
    <div id="best-seller" class="block">
        <div class="title"><h2>Best <strong>Seller</strong></h2></div>
        <ul class="block-content">
            @foreach(best_seller() as $besproduk )
                <li>
                    <a href="{{product_url($besproduk)}}">
                    <div class="img-block">
                    {{HTML::image(product_image_url($besproduk->gambar1,'thumb'), 'produk', array('class'=>'img-responsive','product'=>'height:81px; margin: 0 auto;'))}}
                    </div>
                    <p class="product-name">{{short_description($besproduk->nama,15)}}</p>
                    <p class="author"><del>{{price($besproduk->hargaCoret)}}</del></p>
                    <p class="price">{{price($besproduk->hargaJual)}}</p> 
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="btn-more">
        <a href="{{url('produk')}}">view more</a>
        </div>
    </div>
    <div id="latest-news" class="block">
        <div class="title"><h2>Latest News</h2></div>
        <ul class="block-content">
           @foreach(list_blog(3) as $value)
            <li>
            <h5 class="title-news">{{$value->judul}}</h5>
            <p>{{short_description($value->isi,55)}}...<a class="read-more" href="{{URL::to("blog/".$value->slug)}}">Read More</a></p>
            <span class="date-post">{{date("d M Y", strtotime($value->created_at))}}</span>
            </li> 
            @endforeach
        </ul>
    </div>
   <div id="adv-sidebar" class="block">
    @foreach(vertical_banner() as $banners)
        <a href="{{URL::to($banners->url)}}">
        {{HTML::image(banner_image_url($banners->gambar),'banner',array('width'=>'270','height'=>'388','class'=>'img-responsive'))}}
        </a>
        </div>
    @endforeach
</div>
<div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
    <div class="product-list">
        @if($jumlahCari != 0)
        <div class="row">
            <ul class="grid">
                @foreach($hasilpro as $produks)
                      <li class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="prod-container">
                                <div class="image-container">
                                <a href="{{product_url($produks)}}">
                                {{HTML::image(product_image_url($produks->gambar1), 'produk', array('class'=>'img-responsive','product'=>'height:263px; margin: 0 auto;'))}}
                                </a>
                                <div class="icon-info icon-new">New</div>
                                </div>
                                <h5 class="product-name">{{$produks->nama}}</h5>
                                <p class="author"><del>{{$produks->hargaCoret}}</del></p>
                                <span class="price">{{$produks->hargaJual}}</span>
                                <a href="{{product_url($produks)}}" class="buy-btn">Buy Now</a>
                            </div>
                        </li>
                @endforeach
            </ul>
        </div>
    	{{--$produk->links()--}}
        @else
        <article class="text-center">
            <i>Hasil pencarian tidak ditemukan</i>
        </article>
        @endif
    </div>
</div> <!--.center_column-->
</div><!--.inner-column-->	
    
</div>