@if(Session::has('msg'))
<div class="success" id='message' style='display:none'>
	<p>Terima kasih, testimonial anda sudah terkirim.</p>
</div>
@endif
@if($errors->all())
<div class="error" id='message' style='display:none'>
	Terjadi kesalahan dalam menyimpan data.<br>
	<ul>
	@foreach($errors->all() as $message)
		<li>{{ $message }}</li>
	@endforeach
	</ul>
</div>
@endif

<!-- Page title -->
<br>
<section id="main-content">
    <div class="container">
    	<div class="breadcrumb"><p>Testimonial</p></div>
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
                                @if(!empty($bestproduk))
                                <p class="author"><del>{{price($bestproduk->hargaCoret)}}</del></p>
                                @endif
                                <p class="price">{{price($bestproduk->hargaJual)}}</p> 
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="btn-more"><a href="{{url('produk')}}">view more</a></div>
                </div>
                <div id="latest-news" class="block">
                	<div class="title"><h2>Latest News</h2></div>
                	<ul class="block-content">
                       @foreach(list_blog(3) as $value)
                        <li>
                            <h5 class="title-news">{{$value->judul}}</h5>
                            <p>{{short_description($value->isi,55)}}...<a class="read-more" href="{{blog_url($value)}}">Read More</a></p>
                            <span class="date-post">{{date("d M Y", strtotime($value->created_at))}}</span>
                        </li> 
                        @endforeach
                    </ul>
                </div>
            </div><!--#left_sidebar-->

            <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
                @foreach (list_testimonial() as $items)  
            	<div class="panel panel-default">
            		<div class="panel-heading">
            			<h4 class="panel-title">{{$items->nama}}</h4>
            		</div>
        			<div class="panel-body">
            			"{{$items->isi}}"
        			</div>
            	</div>
                @endforeach
                <div class="row">
                	<div class="col-md-12">
                	   {{list_testimonial()->links()}}
                	</div>
                </div>
                
                <div class="respond">
                    <h3 style="margin-bottom: 20px;">Kirim Testimonial</h3>
                    <form method="post" action="{{url('testimoni')}}" role="form">
                    	<div class="form-group">
                    		<label for="name">Nama</label>
                    		<input type="text" class="form-control" name="nama" required id="name" required>
                    	</div>
                    	<div class="form-group">
                    		<label for="exampleInputEmail1">Testimonial</label>
                    		<textarea name="testimonial" required class="form-control" rows="3" required></textarea>
                    	</div>
                    	<button type="submit" class="btn btn-info">Kirim</button>
                    	<button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
            </div> <!--.center_column-->
        </div><!--.inner-column-->	
    </div>
</section>