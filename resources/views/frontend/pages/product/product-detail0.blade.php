    
   @extends('frontend.layouts.master0')
   @section('content')
   <div class="container">
    <div class="row">
       @include('frontend.layouts.sidebar')
        
        <div class="col-sm-9 padding-right">
            <div class="product-details"><!--product-details-->
                <div class="col-sm-5">
                    @php
                    $photos = explode(',',$product->photo);
                @endphp
                    <div class="view-product">
                        <img src="{{$photos[0]}}" alt="" />
                        <h3>ZOOM</h3>
                    </div>
                    <div id="similar-product" class="carousel slide" data-ride="carousel">
                        
                          <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                @foreach ($photos as $key=>$photo)
                           
                           
                                <div class="item {{$photo[0] ? 'active' : ''}}">
                                  <a href=""><img src="{{$photo}}" alt=""></a>
                              
                                </div>
                             
                                @endforeach
                                
                            </div>

                          <!-- Controls -->
                          <a class="left item-control" href="#similar-product" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a class="right item-control" href="#similar-product" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                          </a>
                    </div>

                </div>
                <div class="col-sm-7">
                    <div class="product-information"><!--/product-information-->
                        
                        <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                        <h2>{{$product->title}}</h2>
                        <p>Web ID: 100-{{$product->id}}</p>
                        <img src="images/product-details/rating.png" alt="" />
                        <span>
                            <span> {{$product->offer_price}} دينار</span>
                            <span style="color: red"><del><small>{{$product->price}}</small></del></span>
                            <label>الكمية:</label>
                            <input type="text" value="3" />
                            <button type="button" class="btn btn-fefault cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button>
                        </span>
                        <p><b>Availability:</b> {{$product->stock>0 ? 'In Stock' : 'Out Stock'}}</p>
                        <p><b>Condition:</b> {{$product->condition}}</p>
                        <p><b>Brand:</b> E-SHOPPER</p>
                        <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                    </div><!--/product-information-->
                </div>
            </div><!--/product-details-->
            
            <div class="category-tab shop-details-tab"><!--category-tab-->
                <div class="col-sm-12">
                    <ul class="nav nav-tabs">
                        <li><a href="#details" data-toggle="tab">تفاصيل المنتج</a></li>
                        
                        <li><a href="#tag" data-toggle="tab">Tag</a></li>
                        <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade" id="details" >
                        <div class="col-sm-12">
                          
<p>{{$product->description}}</p>                            
                            
                        </div>
                    </div>
                 
                    
                    <div class="tab-pane fade" id="tag" >
                        <div class="col-sm-12">
                          <p>{{$product->summary}}</p>
                            
                        </div>
                    </div>
                    
                    <div class="tab-pane fade active in" id="reviews" >
                        <div class="col-sm-12">
                            <ul>
                                <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <p><b>Write Your Review</b></p>
                            
                            <form action="#">
                                <span>
                                    <input type="text" placeholder="Your Name"/>
                                    <input type="email" placeholder="Email Address"/>
                                </span>
                                <textarea name="" ></textarea>
                                <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                                <button type="button" class="btn btn-default pull-right">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div><!--/category-tab-->
            
            <div class="recommended_items"><!--related-->
                <h2 class="title text-center">منتجات متعلقة بها</h2>
                
                <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                       
                                          
                        @if($product->related_products->count() > 0)                   
                        <div class="item active">	
                            @foreach ($product->related_products->take(3) as $item)
                   
                            @if ($product->id != $item->id)
            
                            @php
                            $photo = explode(',',$item->photo);
                         @endphp
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{$photo[0]}}" alt="" />
                                            <h2>{{$item->offer_price}} JD</h2>
                                            <p>{{$item->title}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            @endif
                           @endforeach
                        </div>
                        @endif
                     
                     
                    </div>
                     <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                      </a>
                      <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                      </a>			
                </div>
            </div><!--/Related-->
            
        </div>
    </div>
</div>
    @endsection