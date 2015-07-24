            <section id="btm-info">
                <div class="container">
                    <div class="row">
                        <div id="bio-info" class="col-xs-12 col-sm-6">
                            <div class="split-blue">&nbsp;</div>
                            <h2>Newsletter</h2>
                            <div class="block-content">
                                <p>
                                    Jadilah orang pertama yang mendapatkan info produk terbaru, dan promo dari kami.
                                    <br><br>
                                    Daftarkan email anda dan dapatkan segera promo menarik.
                                </p>
                                <form class="newsletter-form inputfooter" action="{{@$mailing->action}}" method="post" target="_blank" novalidate>
                                    <input class="input-newsletter"  type="text" value="" {{ @$mailing->action==''?'disabled="disabled"':'' }} placeholder="Enter your email" name="EMAIL" class="input-medium required email" id="newsletter mce-EMAIL"/>
                                    <div class="fr ">
                                        <button class="submitnewletter" type="submit" {{ @$mailing->action==''?'disabled="disabled" style="opacity:0.5"':'' }}>SUBSCRIBE</button>
                                    </div>
                                    <div class="clr"></div>
                                </form>
                            </div>
                        </div>

                        <div id="testi-info" class="col-xs-12 col-sm-6">
                            <div class="split-orange">&nbsp;</div>
                            <h2>Testimonial</h2>
                            @foreach(random_testimonial(1) as $testimonial)
                            <div class="block-content">
                                <div class="test-item">
                                    <p>{{$testimonial->isi}}</p>
                                    <i>&nbsp;</i>
                                </div>
                                <span class="ava">{{$testimonial->nama}}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <footer>
            	<div class="top-footer">
                	<div class="container">
                    	<div class="row">
                            <div id="about-foot" class="col-xs-12 col-sm-4">
                            	<h4 class="title">About Us</h4>
                            	<div class="block-content">
                                    <p>{{short_description(about_us()->isi,400)}}</p>
                                </div>
                            </div>

                            @foreach($tautan as $key=>$menu)
                                @if($key == '1' || $key == '2')
                                <div id="links-foot" class="col-xs-12 col-sm-2">
                                    <h4 class="title">{{$menu->nama}}</h4>
                                    <div class="block-content">
                                        <ul>
                                        @foreach($quickLink as $link_menu)
                                            @if($menu->id == $link_menu->tautanId)
                                            <li>
                                            @if($link_menu->halaman == '1')
                                                @if($link_menu->linkTo == 'halaman/about-us')
                                                <a href="{{url(strtolower($link_menu->linkTo))}}">{{$link_menu->nama}}</a>
                                                @else
                                                <a href='{{url("halaman/".strtolower($link_menu->linkTo))}}'>{{$link_menu->nama}}</a>
                                                @endif
                                            @elseif($link_menu->halaman == '2')
                                                <a href='{{url("blog/".strtolower($link_menu->linkTo))}}'>{{$link_menu->nama}}</a>
                                            @elseif($link_menu->url == '1')
                                                <a href="{{url(strtolower($link_menu->linkTo))}}">{{$link_menu->nama}}</a>
                                            @else
                                                <a href="{{url(strtolower($link_menu->linkTo))}}">{{$link_menu->nama}}</a>
                                            @endif
                                            </li>
                                            @endif
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endif
                            @endforeach  

                            <div id="contact-foot" class="col-xs-12 col-sm-3">
                            	<h4 class="title">Contact Info</h4>
                            	<div class="block-content">
                                    <p><strong>{{$kontak->nama}}</strong></p>
                                    <p>{{$kontak->alamat}}</p><br>
                                    @if(!empty($kontak->telepon))
                                    <p><strong>Phone :</strong> {{$kontak->telepon}}<br>
                                    @endif
                                    @if(!empty($kontak->hp))
                                    <strong>HP :</strong> {{$kontak->hp}}<br>
                                    @endif
                                    @if(!empty($kontak->bb))
                                    <strong>BBM :</strong> {{$kontak->bb}}<br>
                                    @endif
                                    @if(!empty($kontak->email))
                                    <strong>Email :</strong> <a href="{{$kontak->email}}">{{$kontak->email}}</a></p>
                                    @endif
                                    <br>
                                    <div class="social">
                                    	<h4>Social Media</h4>
                                        @if(!empty($kontak->fb))
                                        <div class="social-btn">
                                            <a class="first-link" href="{{url($kontak->fb)}}" target="_blank">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                            <a href="{{url($kontak->fb)}}"><i class="fa fa-facebook"></i></a>
                                        </div>
                                        @endif
                                        @if(!empty($kontak->tw))
                                        <div class="social-btn">
                                            <a class="first-link" href="{{url($kontak->tw)}}" target="_blank">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                            <a href="{{url($kontak->tw)}}"><i class="fa fa-twitter"></i></a>
                                        </div>
                                        @endif
                                        @if(!empty($kontak->gp))
                                        <div class="social-btn">
                                            <a class="first-link" href="{{url($kontak->gp)}}" target="_blank">
                                                <i class="fa fa-google"></i>
                                            </a>
                                            <a href="{{url($kontak->gp)}}"><i class="fa fa-google"></i></a>
                                        </div>
                                        @endif
                                        @if(!empty($kontak->pt))
                                        <div class="social-btn">
                                            <a class="first-link" href="{{url($kontak->pt)}}" target="_blank">
                                                <i class="fa fa-pinterest"></i>
                                            </a>
                                            <a href="{{url($kontak->pt)}}"><i class="fa fa-pinterest"></i></a>
                                        </div>
                                        @endif
                                        @if(!empty($kontak->tl))
                                        <div class="social-btn">
                                            <a class="first-link" href="{{$kontak->tl}}" target="_blank">
                                                <i class="fa fa-tumblr"></i>
                                            </a>
                                            <a href="{{$kontak->tl}}"><i class="fa fa-tumblr"></i></a>
                                        </div>
                                        @endif
                                        @if(!empty($kontak->ig))
                                        <div class="social-btn">
                                            <a class="first-link" href="{{url($kontak->ig)}}" target="_blank">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                            <a href="{{url($kontak->ig)}}"><i class="fa fa-instagram"></i></a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="copyright">
                	<div class="container">
                    	<p><strong>&copy; {{ short_description(Theme::place('title'),80) }} {{date('Y')}} All Right Reserved. </strong> Powered by <a href="http://jarvis-store.com" target="_blank">Jarvis Store</a></p>
                    </div>
                </div>
            </footer>