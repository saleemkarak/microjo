<!DOCTYPE html>
<html lang="zxx" >

<head>
   @include('frontend.layouts.head')
</head>

<body >
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div> 
   

    <!-- Header Section Begin -->
    <header class="header" id="header-ajax">
    @include('frontend.layouts.header')
</header>
    <!-- Header Section End -->


<div class="containar">
    <div class="row">
        <div class="col-md-12">
            @include('backend.layout.notification')
        </div>
    </div>
</div>
   @yield('content')

 
    @include('frontend.layouts.footer')
   @include('frontend.layouts.scripts')
   @yield('scripts')
   
</body>

</html>