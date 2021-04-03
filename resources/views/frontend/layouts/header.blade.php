<!-- Navbar -->


<nav class="navbar navbar-expand-md navbar-light">

    <a class="navbar-brand" href="{{route('home')}}">
      
         
      <img src="{{$setting->photo}}" height="50" alt="mdb logo">
      <h4>{{Helper::setting()->title}}</h4>
      <h6><i class=" nav-item fa fa-envelope"></i>{{Helper::setting()->email}}</h6>
    </a>
  
    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav1"
      aria-controls="basicExampleNav1" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
  
    <!-- Links -->
    <div class="collapse navbar-collapse" id="basicExampleNav1">
      
      <!-- Right -->
  

      <ul class="navbar-nav ml-auto">
   
        <li class="nav-item">
          <a href="#!" class="nav-link waves-effect">
            الرئيسية
          </a>
        </li>
        <li class="nav-item">
          <a href="#!" class="nav-link waves-effect">
            Contact
          </a>
        </li>
     
      </ul>
      
       
    <ul class="navbar-nav ml-auto nav-flex-icons">
        <li class="nav-item dropdown notifications-nav pr-md-3">
            <a class="nav-link dropdown-toggle text-success " id="navbarDropdownMenuLink151" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="true">
             
              <span><i class="fa fa-shopping-bag"></i>{{\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count()}}</span>
            </a>
                
           
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink151">
                @foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)

              <a class="dropdown-item" href="{{route('product.detail',$item->model->slug)}}">
                <i class="far fa-money-bill mr-2" aria-hidden="true"></i>
                <span>{{$item->name}}</span>
                <img src="{{$item->model->photo}}" class="cart-thumb"
                style="height: 34px;" alt="avatar image">
                <span class="float-right">{{$item->qty}}<i class="far fa-clock" aria-hidden="true"></i> {{number_format($item->price,2)}}JD</span>
              </a>
              @endforeach
            {{--   <a class="dropdown-item" href="#!">
                <i class="far fa-money-bill mr-2" aria-hidden="true"></i>
                <span>New order received</span>
                <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 33 min</span>
              </a>
              <a class="dropdown-item" href="#!">
                <i class="fas fa-chart mr-2" aria-hidden="true"></i>
                <span>Your campaign is about end</span>
                <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 53 min</span>
              </a> --}}
            </div>
          </li>
        
        <li class="nav-item">
          <a href="{{$setting->facebook}}" class="nav-link waves-effect waves-light">
            <i class="fa fa-facebook"></i>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{$setting->twitter}}" class="nav-link waves-effect waves-light">
            <i class="fa fa-twitter"></i>
          </a>
        </li>
        <li class="nav-item">
            <a href="{{$setting->insta}}" class="nav-link waves-effect waves-light">
                <i class="fa fa-instagram"></i>
            </a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
           

             
               @if (auth()->user())
               @php
               $firstname = explode(' ',auth()->user()->full_name);
               @endphp
              aria-haspopup="true" aria-expanded="false"><span class="badge badge-pill red">{{$firstname[0]}} الحساب</span>
             
              <img src="{{auth()->user()->photo}}" class="rounded-circle"
                style="height: 34px;" alt="avatar image">
                @else
                <img src="{{Helper::userDefaultImage()}}" class="rounded-circle"
                style="height: 34px;" alt="avatar image">
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdownMenuLink-55">
                @auth
              <a class="dropdown-item" href="{{route('user.logout')}}">تسجيل الخروج</a>
              <a class="dropdown-item" href="{{route('user.dashboard')}}">الحساب</a>
              @else
              <a  href="{{route('user.auth')}}" class="dropdown-item" >تسجيل دخول</a>
              @endauth
            </div>
          </li>
      </ul>
  
    </div>
    <!-- Links -->
  
  </nav>
  <!-- Navbar -->
  
 
