
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            {{-- <li><a href="#"><i class="fa fa-phone"></i> {{Helper::setting()->phone}}</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> {{Helper::setting()->email}}</a></li --}}>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
                        <a href="index.html"><img src="" alt="" height="100" /></a>
                    </div>
                    
                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav">
                            
                            <li><a href=""><i class="fa fa-star"></i> قائمة التمنيات</a></li>
                            <li><a id="cart" href="checkout.html"><i class="fa fa-crosshairs"></i> تخليص الطلب</a></li>
                            @auth
                            
                            <li><a href="{{route('user.logout')}}"><i class="fa fa-lock"></i> تسجيل الخروج</a></li>
                            <li><a href="{{route('user.dashboard')}}"><i class="fa fa-user"></i> الحساب</a></li>
                            @else
                            <li><a href="{{route('user.auth')}}"><i class="fa fa-lock"></i> تسجيل دخول</a></li>
                            @endauth

                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <!-- -->
    
<!-- -->


    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.html" class="active">الرئيسية</a></li>
                            <li class="dropdown"><a href="#">السوق<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="shop.html">المنتجات</a></li>
                                    <li><a href="product-details.html">تفاصيل منتج</a></li> 
                                    <li><a href="checkout.html">تخليص الطلب</a></li> 
                                    <li><a href="cart.html"> السلة</a></li> 
                                    <li><a href="{{route('user.auth')}}">تسجيل دخول</a></li> 
                                  

                                </ul>
                            </li> 
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="blog.html">Blog List</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li> 
                            <li class="dropdown"> <a href="#">{{\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count()}} <i class="fa fa-shopping-cart"></i> السلة</a>
                                <ul role="menu" class="sub-menu">
                                    @foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                                    <li>
                                    <a class="dropdown-item" href="{{route('product.detail',$item->model->slug)}}">
                                      <i class="far fa-money-bill mr-2" aria-hidden="true"></i>
                                      <span>{{$item->name}}</span>
                                      <img src="{{$item->model->photo}}" class="cart-thumb"
                                      style="height: 34px;" alt="avatar image">
                                      <span class="float-right">{{$item->qty}}<i class="far fa-clock" aria-hidden="true"></i> {{number_format($item->price,2)}}JD</span>
                                    </a>
                                    @endforeach
                                    </li>
                                  
                                </ul>
                            </li>
                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
