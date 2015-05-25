            <header>
            	<div id="top-head">
                	<div class="container">
                        @if( is_login() )
                        <div class="user-info fl">
                            Welcome, <a href="{{url('member')}}" class="username"><strong>{{user()->nama}}</strong></a>
                        </div>
                        <div class="auth-block fr">
                            <ul>
                                <li>{{HTML::link('logout', 'Logout')}}</li>
                            </ul>
                        </div>
                        @else
                        <div class="auth-block fr">
                        	<ul>
                            	<li>{{HTML::link('member', 'Login')}}</li>
                                <li>{{HTML::link('member/create', 'Register')}}</li>
                            </ul>
                        </div>
                        @endif
                        <div class="clr"></div>
                    </div>
                </div> <!--.top-head-->

                <div id="center-header">
                	<div class="container">
                    	<div id="logo" class="fl">
                            @if(@getimagesize( url(logo_image_url()) ))
                            <a href="{{ url('home') }}"> {{HTML::image(logo_image_url(), 'Book Store', array('width'=>'auto', 'max-height'=>'140px'))}}</a>
                            @else
                            <h2>
                                <strong>
                                    <a href="{{url('home')}}" style="color:#578400">{{ short_description(Theme::place('title'),50) }}</a>
                                </strong>
                            </h2>
                            @endif
                        </div>
                        <div id="shoppingcartplace">
                            {{shopping_cart()}}
                        </div>
                        <div id="search-top" class="fr">
                        	<form class="navbar-form" role="search" action="{{url('search')}}"  method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="search" required>
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="clr"></div>
                    </div>
                </div>
                <!-- MENU - START -->
                <nav id="menu" class="navbar navbar-default" role="navigation">
                	<div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand mobile-only" href="#">MENU</a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                @foreach(main_menu()->link as $key=>$link)
                                <li><a href="{{menu_url($link)}}">{{$link->nama}}</a></li>
                                @endforeach
                            </ul>   
                        </div>
                	</div>
                </nav>
                <!-- MENU - END -->
                <div class="clr"></div>
			</header>