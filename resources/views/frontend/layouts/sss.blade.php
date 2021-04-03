
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i>{{Helper::setting()->email}}</li>
                          
                            <li>شحن مجاني لغاية ١٠٠ دينار</li>
                            @if (auth()->user())
                            @php
                                $firstname = explode(' ',auth()->user()->full_name);
                                @endphp

                            <li><a href=""><i></i> {{$firstname[0]}}</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="header__top__right__language">
                    <div>السلة <i class="fa fa-shopping-bag"></i> <span>{{\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count()}}</span></div>
                    <span class="arrow_carrot-down"></span>
                    <ul>
                        
                        <li><a href="{{route('user.dashboard')}}"><i class="fa fa-heart"></i> الحساب</a></li>
                        <li><a href="{{route('user.logout')}}"><i class="fa fa-price"></i> خروج</a></li>
                            
                    
                </ul>
                </div>



                <div class="col">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a>
                            <a href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a>
                            <a href="{{$setting->insta}}"><i class="fa fa-instagram"></i></a>
                          
                          
                        </div>
                         @if (auth()->user())
                         <div class="header__top__right__language">
                            <img src="{{auth()->user()->photo}}" alt="">
                            {{-- <div>Arabic</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                               
                                <li><a href="#">Jordan</a></li>
                            </ul> --}}
                        </div> 
                        @else
                        <div class="header__top__right__language">
                            
                            <img src="{{Helper::userDefaultImage()}}" alt="" style="width: 5%;hight:5%">
                            {{-- <div>Arabic</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                               
                                <li><a href="#">Jordan</a></li>
                            </ul> --}}
                        </div> 
                         @endif
                        
                       
                        
                                        <!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-light ">

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav7"
      aria-controls="basicExampleNav7" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <!-- Links -->
    <div class="collapse navbar-collapse" id="basicExampleNav7">
  
      <!-- Right -->
      <ul class="navbar-nav nav-flex-icons ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle"
              style="height: 34px;" alt="avatar image">
          </a>
          @auth
          <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdownMenuLink-55">
            <a class="dropdown-item" href="{{route('user.logout')}}">Logout</a>
            <a class="dropdown-item" href="{{route('user.dashboard')}}">Settings</a>
          
          </div>
                 
          @else
                     
          <div class="dropdown-menu dropdown-menu-lg-right " aria-labelledby="navbarDropdownMenuLink-55">
            <a class="dropdown-item" href="{{route('user.auth')}}">دخول | تسجيل حساب</a>
           
          </div>
          @endauth

        </li>
      </ul>
  
    </div>
    <!-- Links -->
  
  </nav>
  <!-- Navbar -->
                     
                       
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{route('home')}}"><img src="{{$setting->photo}}" alt=""></a>
                    <h2>{{Helper::setting()->title}}</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{route('home')}}">الرئيسية</a></li>
                        <li><a href="./shop-grid.html">السوق</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="./shop-details.html">قائمة المنتجات</a></li>
                                <li><a href="./shoping-cart.html">سلة التسوق</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        {{-- <li><a href="{{route('user.address')}}">العناوين</a></li> --}}
                        <li><a href="./contact.html">اتصل بنا</a></li>
                    </ul>

                </nav>
            </div>
           
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
