<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="{{asset('backend/assets/images/backgrounds/02.jpg')}}">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo" alt="Chameleon admin logo" src="{{empty(Helper::setting()->photo) ? '' : Helper::setting()->photo}}"/>
            <h3 class="brand-text">Admin</h3></a></li>
        <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
      </ul>
    </div>
    <div class="navigation-background"></div>
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

        <li class=" nav-item"><a href="#"><i class="ft-layout"></i><span class="menu-title" data-i18n="">Banners </span><span class="badge badge badge-info badge-pill float-right mr-2">3</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="{{route('banner.index')}}">All Banners</a>
            </li>
            <li class="active"><a class="menu-item" href="{{route('banner.create')}}">Add Banner</a>
            </li>
          </ul>
        </li>

        <li class=" nav-item"><a href="#"><i class="ft-server"></i><span class="menu-title" data-i18n="">Categories</span><span class="badge badge badge-info badge-pill float-right mr-2">3</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="{{route('category.index')}}">All Categoreis</a>
              </li>
              <li class="active"><a class="menu-item" href="{{route('category.create')}}">Add Category</a>
              </li>
            </ul>
          </li>

          <li class=" nav-item"><a href="#"><i class="ft-watch"></i><span class="menu-title" data-i18n="">Brands</span><span class="badge badge badge-info badge-pill float-right mr-2">3</span></a>
            <ul class="menu-content">
              <li><a class="ft-user-plus" href="{{route('brand.index')}}">All Brands</a>
              </li>
              <li class="active"><a class="menu-item" href="{{route('brand.create')}}">Add Brand</a>
              </li>
            </ul>
          </li>

          <li class=" nav-item"><a href="#"><i class="ft-layers"></i><span class="menu-title" data-i18n="">Products</span><span class="badge badge badge-info badge-pill float-right mr-2">3</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="{{route('product.index')}}">All Products</a>
              </li>
              <li class="active"><a class="menu-item" href="{{route('product.create')}}">Add Product</a>
              </li>
            </ul>
          </li>

          <li class=" nav-item"><a href="#"><i class="ft-users"></i><span class="menu-title" data-i18n="">Users</span><span class="badge badge badge-info badge-pill float-right mr-2">3</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="{{route('user.index')}}">All Users</a>
              </li>
              <li class="active"><a class="menu-item" href="{{route('user.create')}}">Add User</a>
              </li>
            </ul>
          </li>

          <li class=" nav-item"><a href="#"><i class="ft-cpu"></i><span class="menu-title" data-i18n="">Settings</span><span class="badge badge badge-info badge-pill float-right mr-2">3</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="{{route('setting.index')}}">All Settings</a>
              </li>
              <li class="active"><a class="menu-item" href="{{route('setting.create')}}">Add Setting</a>
              </li>
            </ul>
          </li>





      </ul>
    </div>
  </div>
  <!-- END: Main Menu-->
