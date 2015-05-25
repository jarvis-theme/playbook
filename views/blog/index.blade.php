<div class="container">
    <div class="breadcrumb">
        <p><strong>List Blog</strong></p>
    </div>
    <div class="inner-column row">
        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
            <div id="latest-news" class="block">
                <div class="title"><h2>Kategori</h2></div>
                <ul class="block-content">
                    @foreach(list_blog_category() as $kat)
                    <span style="text-decoration: underline;"><a href="{{blog_category_url($kat)}}">{{$kat->nama}}</a></span>&nbsp;&nbsp;
                    @endforeach 
                </ul>
            </div>
            @if(count(best_seller()) > 0)
            <div id="best-seller" class="block">
                <div class="title"><h2>Best <strong>Seller</strong></h2></div>
                <ul class="block-content">
                    @foreach(best_seller(5) as $bestproduk )
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
                <div class="btn-more"><a href="{{url('koleksi/best-seller')}}">view more</a></div>
            </div>
            @endif
            <div id="adv-sidebar" class="block">
                @foreach(vertical_banner() as $banners)
                <a href="{{url($banners->url)}}">
                    {{HTML::image(banner_image_url($banners->gambar),'banner',array('width'=>'270','height'=>'388','class'=>'img-responsive'))}}
                </a>
                @endforeach
            </div>
        </div><!--#left_sidebar-->
        <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
            <div class="product-list col-xs-12">
                @if(count(list_blog(null,@$blog_category)) > 0)
                <div class="row">
                    @foreach(list_blog(null,@$blog_category) as $blog)
                    <article class="col-lg-12" style="margin-bottom:10px">
                        <h3 style="margin-bottom: 3px;"><strong><a href="{{blog_url($blog)}}">{{$blog->judul}}</a></strong></h3>
                        <p style="margin-bottom: 15px;">
                            <small><i class="fa fa-calendar"></i> {{waktuTgl($blog->updated_at)}}</small>&nbsp;&nbsp;
                            <span class="date-post"><i class="fa fa-tags"></i> <a href="{{blog_category_url(@$blog->kategori)}}">{{@$blog->kategori->nama}}</a></span>
                        </p>
                        <p>
                            {{shortDescription($blog->isi,300)}}<br>
                            <a href="{{blog_url($blog)}}" class="theme">Baca Selengkapnya →</a>
                        </p>
                        <hr>
                    </article>
                    @endforeach
                </div>
                <div class="pagination">
                    {{list_blog(null,@$blog_category)->links()}}
                </div>
                @else
                <article class="search-result">
                    <small>Blog tidak ditemukan.</small>
                </article>
                @endif
            </div>
        </div> <!--.center_column-->
    </div><!--.inner-column-->
</div>