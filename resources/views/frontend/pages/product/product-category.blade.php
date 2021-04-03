@extends('frontend.layouts.master0')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{$categories->photo}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{$categories->title}}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('home')}}">الرئيسية</a>
                            <span>التسوق</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        
                        <div class="sidebar__item">

                            <h4>قوائم المنتجات</h4>
                            
                           
                        

                            <div class="nav-side-menu">
                                
                                    @if($categories->count() > 0)
                                    @foreach ($categoriesIn as $category)
                                    <ul class="list-group pmd-list pmd-card-list">
  
                                        <li class="pmd-list-divider"></li>
                                        <li class="list-group-item">
                                            <h4 class="pmd-list-title">  <a class="" href="{{route('product.category',$category->slug)}}">{{$category->title}}</a></h4>
                                          
                                            <div class="pmd-child-list">
                                                @foreach ($category->childCat as $item)
                                                <a class="list-group-item list-group-item-action" href="{{route('product.category',$item->slug)}}">{{$item->title}}</a>
                                                @endforeach
                                            </div>
                                        </li>
                                        <li class="pmd-list-divider"></li>
                                      
                                      
                                    </ul>
                                   @endforeach
                                  @endif
                                 
                         
                            </div>

                           
                        </div>
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div i class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div style="float:left; width:26%">
 
                                    <p>
                                      <label for="amount">Price range:</label>
                                      <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                    </p>
                                     
                                    <div id="slider-range"></div>
                                     
                                 
                                 
                                 </div>
                            </div>
                        </div>
                        <div class="sidebar__item sidebar__item__color--option">
                            <h4>Colors</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    White
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Gray
                                    <input type="radio" id="gray">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                    Red
                                    <input type="radio" id="red">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                    Black
                                    <input type="radio" id="black">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Blue
                                    <input type="radio" id="blue">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Green
                                    <input type="radio" id="green">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <h4>Popular Size</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Large
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Medium
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Small
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    Tiny
                                    <input type="radio" id="tiny">
                                </label>
                            </div>
                        </div>
                      
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>العروض</h2>
                        </div>
                        <div class="row">
                          
                            <div class="product__discount__slider owl-carousel">
                                @if($categories->products->count() > 0)

                               @foreach ($categories->products as $item)
                               @php
                               $photos = explode(',',$item->photo);
                               @endphp
                               @if($item->discount > 5)
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="{{$photos[0]}}">
                                            <div class="product__discount__percent">-{{$item->discount}}%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>{{$categories->title}}</span>
                                            <h5><a href="#">{{ucfirst($item->title)}}</a></h5>
                                            <div class="product__item__price">{{number_format($item->offer_price,2)}} <span>{{number_format($item->price,2)}} JD</span></div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                               @endforeach
                                @else
                                <p>لا يوجد منتجات</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>ترتيب حسب</span>
                                    <select id="sortBy">
                                        <option selected >فلترة عامة</option>
                                        <option value="priceAsc" {{$sort == 'priceAsc' ? 'selected' : ''}}>السعر الاقل الى الاعلى</option>
                                        <option value="priceDesc" {{$sort == 'priceDesc' ? 'selected' : ''}}>السعر الاعلى الى الاقل</option>
                                        <option value="titleAsc" {{$sort == 'titleAsc' ? 'selected' : ''}}>الاحرف تنازلي</option>
                                        <option value="titleDesc" {{$sort == 'titleDesc' ? 'selected' : ''}}>الاحرف تصاعدي</option>
                                        <option value="discAsc" {{$sort == 'discAsc' ? 'selected' : ''}}>الخصم الاقل الى الاعلى</option>
                                        <option value="discDesc" {{$sort == 'discDesc' ? 'selected' : ''}}>الخصم الاعلى الى الاقل</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{$products->count()}}</span> عدد المنتجات</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single products Page  -->
                    <div class="row" id="product-data">
                   @include('frontend.layouts._single-products')     
                    </div>
                    <div class="ajax-load text-center" style="display: none;">
                        <img src="{{asset('frontend/img/preloader.gif')}}" alt="" style="width: 60%;">
                    </div>

                  <!-- End Single products Page  -->
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->    
@endsection

<!-- filter script -->
@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script>
     $('#sortBy').change(function(){
         var sort = $('#sortBy').val();
       window.location="{{url('' .$route.'')}}/{{$categories->slug}}?sort="+sort;
                                 


     });
     
 </script>   

 <script>
    function loadmoreData(page){
      
        $.ajax({
            url:'?page='+page,
            type:'get',
            beforSend:function(){
                
               
                $('.ajax-load').show();
            },
        })
        .done(function(data){
            
            if(data.html==''){
                $('.ajax-load').html('No more product aviallable');
                return;
            }
            $('.ajax-load').hide();
           
            $('#product-data').append(data.html);

        })
        .fail(function(){
            alert('Somthing went wrong try again');
        })

    }
    var page = 1;
    $(window).scroll(function(){
       
        if($(window).scrollTop() +$(window).height()+120>=$(document).height()){
            
            page ++;
            
            loadmoreData(page);
        }
    })
</script> 
  <script>
      $( "#slider-range" ).slider({
range: true,
min: 0,
max: 500,
values: [ 75, 300 ],
slide: function( event, ui ) {
$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
},
stop: function( event, ui ) {
    $.ajax({

  
  });
}
});
  </script>
<script>
    $(function() {
        
        $('.list-group-item').on('click', function() {
          $('.fas', this)
            .toggleClass('fa-angle-right')
            .toggleClass('fa-angle-down');
        });
      
      });
</script>
  	<script>
          $(document).on('click','.add-to-cart',function(e){
              e.preventDefault();
              var product_id=$(this).data('product-id');
              var product_qty=$(this).data('quantity');
              var token = "{{csrf_token()}}";
              var path="{{route('cart.store')}}";
              
              $.ajax({
                  url:path,
                type:"POST",
                dataType:"JSON",
                 
                data:{
                    product_id:product_id,
                    product_qty:product_qty,
                    _token:token,
                },
                beforSend:function(){
                        $('#add-to-cart'+product_id).html('<i class="fa fa-stroopwafel fa-spin></i> Loading....');
                },
                complete:function(){
                    $('#add-to-cart'+product_id).html('<i class="fa fa-cart-plus"></i>');
                },
                success:function (data){
                    console.log(data);
                    //no refresh
                   $('body #header-ajax').html(data['header']);
                    if(data['status']){
                            swal({
                            title: "Good job!",
                            text: data['message'],
                            icon: "success",
                            button: "Ok",
                            });
                        }
                }
              });   
              
          });
      </script>
      
@endsection