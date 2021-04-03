
 @extends('frontend.layouts.master0')
 
 @section('content')

<section id="advertisement">
    <div class="container">
        <img src="images/shop/advertisement.jpg" alt="" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row">

           @include('frontend.layouts.sidebar')
            
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">البضائع </h2>
                    <div class="col-lg-4 col-md-4">
                        <div class="filter__found">
                            <h6><span>{{$products->count()}}</span> عدد المنتجات</h6>
                        </div>
                    </div>
                  
                    <!-- Single products Page  -->
                    <div class="row" id="product-data">
                   @include('frontend.layouts._single-products0')     
                    </div>
                    <div class="ajax-load text-center" style="display: none;">
                        <img src="{{asset('frontend/img/preloader.gif')}}" alt="" style="width: 60%;">
                    </div>
                  
                   
                    
                    <ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">&raquo;</a></li>
                    </ul>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
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