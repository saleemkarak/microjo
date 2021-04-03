<!DOCTYPE html>
<html lang="en">

    <head>
        @include('frontend.layouts.head0')
     </head>

<body class="animsition">
 
    <!-- Header Section Begin -->
    <header class="header" id="header-ajax">
        @include('frontend.layouts.header0')
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


    @include('frontend.layouts.footer0')

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>



    @include('frontend.layouts.scripts0')
    @yield('scripts')

</body>
</html>