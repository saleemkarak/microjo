<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
@include('backend.layout.head')
  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">
    @include('backend.layout.nav')

    @include('backend.layout.sidebar')


  @yield('content')
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    @include('backend.layout.footer')
  </body>
</html>
