	<div class="container">
    	<div class="breadcrumb"><p>Detail Produk</p></div>
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
                    <a href="{{url($banners->url)}}">
                        {{HTML::image(banner_image_url($banners->gambar),'banner',array('width'=>'270','height'=>'388','class'=>'img-responsive'))}}
                    </a>
                    @endforeach
                </div>
            </div><!--#left_sidebar-->
            <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
            	<div class="product-details">
                    <form action="#" id="addorder">
                    	<div class="row">
                        	<div id="prod-left" class="col-lg-6 col-xs-12 col-sm-6">
                            	<div class="big-image">
                                    {{HTML::image(product_image_url($produk->gambar1),'produk',array('width'=>'292','height'=>'392'))}}
                                    <a class="zoom fancybox" href="{{product_image_url($produk->gambar1)}}" title="{{$produk->nama}}">&nbsp;</a>
                                </div>
                            </div>
                            <div id="prod-right" class="col-lg-6 col-xs-12 col-sm-6">
                            	<h2 class="name-title">{{$produk->nama}}</h2>
                                @if(!empty($produk->hargaCoret))
                                <h3 class="author"><del>{{price($produk->hargaCoret)}}</del></h3>
                                @endif
                                <span class="price">{{price($produk->hargaJual)}}</span>
                                <div class="img-rating">{{sosialShare(url(product_url($produk)))}}</div>

                                <div class="desc-prod">
                                	<p class="title">Deskripsi Produk</p>
                                    <p>{{$produk->deskripsi}}</p>
                                </div>

                                @if($opsiproduk->count() > 0)                 
                                <div class="size-list">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Opsi :</label>
                                        <div class="col-sm-5">
                                            <select class="form-control attribute_select" name="opsiproduk">
                                                <option value="">-- Pilih Opsi --</option>
                                                @foreach ($opsiproduk as $key => $opsi)
                                                <option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >
                                                    {{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{jadiRupiah($opsi->harga)}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <div class="quantity">
                                	<div class="form-group">
                                    	<label class="control-label">Quantity :</label>
                                        <div>
                                            <input type="number" name="qty" class="text" value="1" />
                                            <span class="clearfix"></span>
                                        </div>
                                     </div>
                                </div>
                                <div class="avail-info">
                                    @if(!empty($produk->stok))
                                	<span class="instock">Available, Stock <span class="ttl-stock">{{$produk->stok}} item</span></span>
                                    @else
                                    <span class="fa-stack fa-1x">
                                        <i style="color: #d9534f;" class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-close fa-stack-1x fa-inverse"></i>
                                    </span>
                                    Out of Stock
                                    @endif
                                </div>
                                <div class="attribute clr">
                                	<fieldset class="attribute_fieldset">
                                    	<div class="attribute_list">
                                        	<div class="color-list">
                                            	<ul id="color_to_pick_list" class="clearfix">
                                                    @if($produk->gambar2!='')
                                                	<li class="item col-xs-4">
                                                        <div class="img-container">
                                                            <a class="fancybox" href="{{product_image_url($produk->gambar2)}}" title="{{$produk->nama}}">
                                                                {{HTML::image(product_image_url($produk->gambar2),'produk',array('width'=>'122','height'=>'182','class'=>'img-responsive'))}}
                                                            </a>
                                                        </div>
                                                    </li>
                                                    @endif
                                                    @if($produk->gambar3!='')
                                                    <li class="item col-xs-4">
                                                        <div class="img-container">
                                                            <a class="fancybox" href="{{product_image_url($produk->gambar3)}}" title="{{$produk->nama}}">
                                                                {{HTML::image(product_image_url($produk->gambar3),'produk',array('width'=>'122','height'=>'182','class'=>'img-responsive'))}}
                                                            </a>
                                                        </div>
                                                    </li>
                                                    @endif
                                                    @if($produk->gambar4!='')
                                                    <li class="item col-xs-4">
                                                        <div class="img-container">
                                                            <a class="fancybox" href="{{product_image_url($produk->gambar2)}}" title="{{$produk->nama}}">
                                                                {{HTML::image(product_image_url($produk->gambar4),'produk',array('width'=>'122','height'=>'182','class'=>'img-responsive'))}}
                                                            </a>
                                                        </div>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="clr"></div>
                        </div><!--.row-->

                        <div class="btm-details">
                        	<div class="bank-logo fl">
                                @foreach(list_banks() as $value)
                                <img class="banks img-responsive" src="{{bank_logo($value)}}" />
                                @endforeach
                            </div>
                            <div class="button-detail fr">
                                <button class="btn addtocart" type="submit"><i class="cart"></i>Add to cart</button>
                            </div>
                            <div class="clr"></div>
                        </div>
                    </form>
                </div><!--.product-details-->

                @if(count(other_product($produk, 4)) > 0)
                <div id="related-product" class="product-list">
                    <h2 class="title">Related Product</h2>
                    <div class="row">
                        <ul class="grid">
                            @foreach(other_product($produk, 4) as $relproduk)
                       		<li class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                <div class="prod-container">
                                    <div class="image-container">
                                        <a href="{{product_url($relproduk)}}">
                                            {{HTML::image(product_image_url($relproduk->gambar1),'produk',array('class'=>'img-responsive'))}}
                                        </a>
                                        @if(is_outstok($relproduk))
                                        <div class="icon-info icon-sold">Sold</div>
                                        @else
                                            @if(is_terlaris($relproduk))
                                            <div class="icon-info icon-sale">Hot Item</div>
                                            @elseif(is_produkbaru($relproduk))
                                            <div class="icon-info icon-new">New</div>
                                            @endif
                                        @endif
                                    </div>
                                    <h5 class="product-name">{{$relproduk->nama}}</h5>
                                    @if(!empty($relproduk->hargaCoret))
                                    <p class="author"><del>{{price($relproduk->hargaCoret)}}</del></p>
                                    @endif
                                    <span class="price">{{price($relproduk->hargaJual)}}</span>
                                    <a href="{{product_url($relproduk)}}" class="buy-btn">Buy Now</a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <hr>
                </div><!--.product-list-->
                @endif

                {{pluginTrustklik()}}
            </div> <!--.center_column-->
        </div><!--.inner-column-->	
    </div>