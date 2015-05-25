<div class="container">
    <div class="breadcrumb">
    	<p><strong>List Produk</strong></p>
    </div>
    <div class="inner-column row">
        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
            <div id="categories" class="block sidey">
                <div class="title"><h2>Kategori</h2></div>
                <ul class="block-content nav">
                    @foreach(list_category() as $side_menu)
                        @if($side_menu->parent == '0')
                        <li>
                            <a href="{{category_url($side_menu)}}">{{$side_menu->nama}}</a>
                            @if($side_menu->anak->count() != 0)
                            <ul style="padding: 0px 20px;">
                                @foreach($side_menu->anak as $submenu)
                                @if($submenu->parent == $side_menu->id)
                                <li>
                                    <a href="{{category_url($submenu)}}" style="background-color:transparent">{{$submenu->nama}}</a>
                                    @if($submenu->anak->count() != 0)
                                    <ul style="padding: 0px 20px;">
                                        @foreach($submenu->anak as $submenu2)
                                        @if($submenu2->parent == $submenu->id)
                                        <li>
                                            <a href="{{category_url($submenu2)}}">{{$submenu2->nama}}</a>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endif
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            @if(count(best_seller()) > 0)
            <div id="best-seller" class="block">
            	<div class="title"><h2>Best <strong>Seller</strong></h2></div>
            	<ul class="block-content">
                    @foreach(best_seller() as $bestproduk )
                    <li>
                    	<a href="{{product_url($bestproduk)}}">
                        	<div class="img-block">
                            {{HTML::image(product_image_url($bestproduk->gambar1,'thumb'), 'produk', array('class'=>'img-responsive','product'=>'height:81px; margin: 0 auto;'))}}
                            </div>
                            <p class="product-name">{{short_description($bestproduk->nama,15)}}</p>
                            @if(!empty($bestproduk->hargaCoret))
                            <p class="author"><del>{{price($bestproduk->hargaCoret)}}</del></p>
                            @endif
                            <p class="price">{{price($bestproduk->hargaJual)}}</p> 
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="btn-more">
                    <a href="{{url('koleksi/best-seller')}}">view more</a>
                </div>
            </div>
            @endif
            <div id="latest-news" class="block">
                <div class="title"><h2>Koleksi</h2></div>
                <ul class="block-content">
                    @foreach(list_koleksi() as $kol)
                    <li>
                        <div class="col-sm-6 col-xs-6 img-block">
                            <a href="{{koleksi_url($kol)}}">
                                {{ HTML::image(koleksi_image_url($kol->gambar,'thumb'),$kol->nama, array('class' => 'img-responsive' ))}}
                            </a>
                        </div>
                        <a href="{{koleksi_url($kol)}}" class="col-sm-6 col-xs-6" style="margin: 15px 0;">{{$kol->nama}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div id="adv-sidebar" class="block">
                @foreach(vertical_banner() as $banners)
                <a href="{{URL::to($banners->url)}}">
                    {{HTML::image(banner_image_url($banners->gambar),'banner',array('width'=>'270','height'=>'388','class'=>'img-responsive'))}}
                </a>
                @endforeach
            </div>
        </div><!--#left_sidebar-->
        <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
        	<div class="product-list">
            	<div class="row">
                    <ul class="grid">
                    @if(count(list_product(null, @$category,@$collection)) > 0)
                        @foreach(list_product(null, @$category) as $produks)
                        <li class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="prod-container">
                                <div class="image-container">
                                    <a href="{{product_url($produks)}}">
                                        {{HTML::image(product_image_url($produks->gambar1), 'produk', array('class'=>'img-responsive','product'=>'height:263px; margin: 0 auto;'))}}
                                    </a>
                                    @if(is_outstok($produks))
                                    <div class="icon-info icon-sold">Sold</div>
                                    @else
                                        @if(is_terlaris($produks))
                                        <div class="icon-info icon-sale">Hot Item</div>
                                        @elseif(is_produkbaru($produks))
                                        <div class="icon-info icon-new">New</div>
                                        @endif
                                    @endif
                                </div>
                                <h5 class="product-name">{{ short_description($produks->nama,26)}}</h5>
                                @if(!empty($produks->hargaCoret))
                                <p class="author"><del>{{price($produks->hargaCoret)}}</del></p>
                                @endif
                                <span class="price">{{price($produks->hargaJual)}}</span>
                                <a href="{{product_url($produks)}}" class="buy-btn">Buy Now</a>
                            </div>
                        </li>
                        @endforeach
                    @else
                        <article class="search-result">
                            Produk tidak ditemukan
                        </article>
                    @endif  
                    </ul>
                </div><!--.row-->
            </div><!--.product_list-->
            <div class="clr"></div>
            <div class="content_sortPagiBar">
            	{{list_product(null, @$category, @$collection)->links()}}
                <div class="clr"></div>
            </div>
        </div> <!--.center_column-->
    </div><!--.inner-column-->	
</div>