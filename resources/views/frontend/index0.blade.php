 @extends('frontend.layouts.master0')

 @section('content')


     <section id="slider">
         <!--slider-->
         <div class="container">
             <div class="row">
                 <div class="col-sm-12">
                     <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                         <ol class="carousel-indicators">
                             <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                             <li data-target="#slider-carousel" data-slide-to="1"></li>
                             <li data-target="#slider-carousel" data-slide-to="2"></li>
                         </ol>

                         <div class="carousel-inner">
                             @if ($banners->count() > 0)
                                 @foreach ($banners as $banner)
                                     @php
                                         $titles = explode(' ', $banner->title);
                                     @endphp
                                     <div class="item {{ $banner->id == 1 ? 'active' : '' }}">
                                         <div class="col-sm-6">
                                             <h1><span>{{ $titles[0] }} </span>{{ $titles[1] }} {{ $titles[2] }}
                                             </h1>
                                             <h2>افضل تسوق معنا</h2>
                                             <p>{{ html_entity_decode($banner->description) }} </p>
                                             <button type="button" class="btn btn-default get">اشتر الان</button>
                                         </div>
                                         <div class="col-sm-6">
                                             <img src="{{ $banner->photo }}" class="girl img-responsive" alt="" />
                                             <img src="{{ asset('fronEnd/images/home/pricing.png') }}" class="pricing"
                                                 alt="" />
                                         </div>
                                     </div>
                                 @endforeach
                             @endif

                         </div>

                         <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                             <i class="fa fa-angle-left"></i>
                         </a>
                         <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                             <i class="fa fa-angle-right"></i>
                         </a>
                     </div>

                 </div>
             </div>
         </div>
     </section>
     <!--/slider-->

     <section>
         <div class="container">
             <div class="row">
                 @include('frontend.layouts.sidebar')

                 <div class="col-sm-9 padding-right">
                     <div class="features_items">
                         <!--features_items-->
                         <h2 class="title text-center">منتجات مميزة</h2>
                         @php
                             $features_products = \App\Models\Product::where(['status' => 'active', 'is_featured' => 'true'])
                                 ->orderBy('id', 'DESC')
                                 ->limit('10')
                                 ->get();
                         @endphp

                         @foreach ($features_products as $product)
                             @php
                                 $photo = explode(',', $product->photo);
                             @endphp
                             <div class="col-sm-4">
                                 <div class="product-image-wrapper">
                                     <div class="single-products">
                                         <div class="product-badge"><span
                                                 class="badge badge-success">{{ $product->condition }}</span></div>
                                         <div class="productinfo text-center">
                                             <img src="{{ $photo[0] }}" alt="" />
                                             <h2> {{ $product->offer_price }} دينار</h2><span>
                                                 <small><del>{{ $product->price }} JD</del></small></span>


                                             <p>{{ $product->title }}</p>
                                             <h4><a href="{{ route('product.detail', $product->slug) }}">{{ \App\Models\Brand::where('id', $product->brand_id)->value('title') }}
                                                     :الماركة </a></h4>
                                             <a href="#" class="btn btn-default add-to-cart"><i
                                                     class="fa fa-shopping-cart"></i>Add to cart</a>
                                         </div>
                                         <div class="product-overlay">
                                             <div class="overlay-content">
                                                 <h2>{{ $product->offer_price }}دينار</h2>
                                                 <p>{{ $product->title }}</p>
                                                 <a href="{{ route('product.detail', $product->slug) }}"
                                                     class="btn btn-default add-to-cart"><i
                                                         class="fa fa-info-circle"></i>تفاصيل</a>
                                                 <a href="#" class="btn btn-default add-to-cart"><i
                                                         class="fa fa-shopping-cart"></i>Add to cart</a>
                                             </div>
                                         </div>
                                         @if ($product->condition == 'new')
                                             <img src="{{ asset('frontEnd/images/home/new.png') }}" class="new" alt="" />
                                         @else
                                             <img src="{{ asset('frontEnd/images/home/sale.png') }}" class="new"
                                                 alt="" />
                                         @endif

                                     </div>
                                     <div class="choose">
                                         <ul class="nav nav-pills nav-justified">
                                             <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                             <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                         </ul>
                                     </div>
                                 </div>
                             </div>

                         @endforeach



                     </div>
                     <!--features_items-->






                     <div class="category-tab">
                         <!--category-tab-->
                         <div class="col-sm-12">
                             <ul class="nav nav-tabs">
                                 @if ($categories->count() > 0)
                                     @foreach ($categories as $category)
                                         <li class="{{ $category->id == 21 ? 'active' : '' }}"><a
                                                 href="#{{ $category->title }}"
                                                 data-toggle="tab">{{ $category->title }}</a></li>
                                     @endforeach
                                 @endif
                             </ul>
                         </div>
                         <div class="tab-content">
                             @if ($categories->count() > 0)
                                 @foreach ($categories as $category)
                                     <div class="tab-pane fade {{ $category->id == 21 ? 'active in' : '' }} "
                                         id="{{ $category->title }}">
                                         @foreach ($category->products->take(4) as $product)
                                             @php
                                                 $photos = explode(',', $product->photo);
                                             @endphp

                                             <div class="col-sm-3">
                                                 <div class="product-image-wrapper">
                                                     <div class="single-products">
                                                         <div class="productinfo text-center">
                                                             <img src="{{ $photo[0] }}" alt="" />
                                                             <h2>{{ $product->offer_price }}</h2>
                                                             <p>{{ $product->title }}</p>
                                                             <a href="#" class="btn btn-default add-to-cart"><i
                                                                     class="fa fa-shopping-cart"></i>Add to cart</a>
                                                         </div>

                                                     </div>
                                                 </div>
                                             </div>
                                         @endforeach
                                     </div>
                                 @endforeach
                             @endif
                         </div>
                     </div>
                     <!--/category-tab-->


                 </div>

             </div>
             <div class="recommended_items">
                <!--recommended_items-->
                <h2 class="title text-center">منتجات موصى بها</h2>
                            @foreach ($recommended_products->take(4) as $product)
                                @php
                                    $photo = explode(',', $product->photo);
                                @endphp

                                <div class="col-md-3 col-sm-6">
                                    <div class="product-grid4">
                                        <div class="product-image4">
                                            <a href="#">
                                                <img class="pic-1" src="{{ $photo[0] }}">
                                                <img class="pic-2" src="{{ $photo[0] }}">
                                            </a>
                                            <ul class="social">
                                                <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a>
                                                </li>
                                                <li><a href="#" data-tip="Add to Wishlist"><i
                                                            class="fa fa-shopping-bag"></i></a></li>
                                                <li><a href="#" data-tip="Add to Cart"><i
                                                            class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                            <span class="product-new-label">New</span>
                                            <span class="product-discount-label">-{{ $product->discount }}%</span>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title"><a href="#">{{ $product->title }}</a></h3>
                                            <div class="price">
                                                {{ $product->offer_price }} JD
                                                <span>{{ $product->price }}</span>
                                            </div>
                                            <a class="add-to-cart" href="">ADD TO CART</a>
                                        </div>
                                    </div>
                           
                        </div>
                        @endforeach
                       
                    </div>
               
           </div>
         </div>

     </section>
     {{-- <!-- Slider -->
    @if ($banners->count() > 0)
    
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
                @foreach ($banners as $banner)
				<div class="item-slick1" style="background-image: url({{$banner->photo}});">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									{{$banner->title}}
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									{{$banner->description}}
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									أشترية الأن
								</a>
							</div>
						</div>
					</div>
				</div>
                @endforeach
				
			</div>
		</div>
	</section>
@endif

	<!-- Banner -->
    @if ($categories->count() > 0)
	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="row">
              
                @foreach ($categories as $category)
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="{{$category->photo}}g" alt="IMG-BANNER">

						<a href="{{route('product.category',$category->slug)}}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									{{$category->title}}
								</span>

								<span class="block1-info stext-102 trans-04">
									منتج {{$category->products->count()}}
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
@endforeach
			</div>
		</div>
	</div>
    @endif
 <!-- Hero Section Begin -->
 <section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All Categories</span>
                        @if ($categories->count() > 0)
                    </div>
                    <ul>
                        @foreach ($categories as $category)
                                                   
                        <li><a href="{{route('product.category',$category->slug)}}">{{$category->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+962 {{$setting->phone}}</h5>
                            <span>support {{$setting->opentime}}</span>
                        </div>
                    </div>
                </div>
                @if ($banners->count() > 0)
                @foreach ($banners as $banner)
                <div class="hero__item set-bg" data-setbg="{{$banner->photo}}">
                    <div class="hero__text">
                        <span>{{$banner->title}}</span>
                        <h2>{{$banner->desription}} <br />100% Garantee</h2>
                        <p>Free Pickup and Delivery Available</p>
                        <a href="#" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
@if ($categories->count() > 0)
<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach ($categories as $category)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{$category->photo}}">
                        <h5><a href="{{route('product.category',$category->slug)}}">{{$category->title}}</a> <span><p>منتج {{$category->products->count()}} </p></span></h5>
                        
                    </div>
                </div>  
                @endforeach
                
               
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->
@endif

@php
$new_products =\App\Models\Product::where(['status'=>'active','condition'=>'new'])->orderBy('id','DESC')->limit('10')->get();    
@endphp
@if ($new_products->count() > 0)
<!-- Latest Product Section Begin -->
<section class="latest-product ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="latest-product__text">
                    <h4>New Products</h4>
                    <div class="categories__slider owl-carousel">
                        @foreach ($new_products as $new_product)
                        <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                            <div class="featured__item">
                                <!--Photo exploder-->
                                @php
                                   $photo = explode(',',$new_product->photo);
                                @endphp
                                <!--Photo exploder-->
                                <div class="featured__item__pic set-bg" data-setbg="{{$photo[0]}}">
                                    <div class="product-badge"><span class="badge badge-success">{{$new_product->condition}}</span></div>

                                    <ul class="featured__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="{{route('product.detail',$new_product->slug)}}">{{$new_product->title}}</a></h6>
                                    <h5>{{$new_product->offer_price}} JD</h5>
                                    <small><del>{{$new_product->price}} JD</del></small>
                                    <h4><a href="#">Brand : {{\App\Models\Brand::where('id',$new_product->brand_id)->value('title')}}</a></h4>

                                </div>
                            </div>
                        </div>  
                        @endforeach
                        
                       
                    </div>
                </div>
            </div>
                
        </div>
    </div>
</section>
<!-- Latest Product Section End -->
@endif


<!--Div where the WhatsApp will be rendered-->  


	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					نظرة خاطفة لمنتجاتنا
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        المنتجات
                    </button>
                    @if ($categories->count() > 0)
                    @foreach ($categories as $category)
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{$category->title}}">
						{{$category->title}}
					</button>

                    @endforeach
                    @endif
				</div>
<!--
				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Default
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Popularity
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Average rating
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Newness
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$0.00 - $50.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$50.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$100.00 - $150.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$150.00 - $200.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$200.00+
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Black
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Blue
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Grey
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Green
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Red
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										White
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Tags
							</div>

							<div class="flex-w p-t-4 m-r--5">
								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Fashion
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Lifestyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Denim
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Streetstyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Crafts
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row isotope-grid">
                @if ($categories->count() > 0)

                @foreach ($categories as $category)
                @foreach ($category->products as $product)
                @php
                $photos = explode(',',$product->photo);
                @endphp
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$category->title}}">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{$photos[0]}}" alt="IMG-PRODUCT">

							<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{$product->title}}
								</a>

								<span class="stext-105 cl3">
									$16.64
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="{{asset('frontEnd/images/icons/icon-heart-01.png')}}" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset('images/icons/icon-heart-02.png')}}" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
                @endforeach
                @endforeach
                @endif
			
			</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</section> --}}





 @endsection
