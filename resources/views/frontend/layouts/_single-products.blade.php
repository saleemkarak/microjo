 
    @foreach ($products as $item)
    @php
    $photos = explode(',',$item->photo);
    @endphp
   
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="product__item">
            <div class="product__item__pic set-bg" data-setbg="{{$photos[0]}}">

               @if($item->condition=='new')
               <div class="product-badge"><span class="badge badge-success">{{$item->condition}}</span></div>
               @elseif($item->condition=='used')
               <div class="product-badge"><span class="badge badge-secondary">{{$item->condition}}</span></div>

                @else
                <div class="product-badge"><span class="badge badge-warning">{{$item->condition}}</span></div>  
                @endif
            
                
                <ul class="product__item__pic__hover">
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="#" data-quantity="1" data-product-id="{{$item->id}}" class="add-to-cart" id="add-to-cart{{$item->id}}"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div>
            <div class="product__item__text">
                <h4><a href="#">Brand : {{\App\Models\Brand::where('id',$item->brand_id)->value('title')}}</a></h4>
                <h6><a href="{{route('product.detail0',$item->slug)}}">{{ucfirst($item->title)}}</a></h6>
                
                <h5>{{$item->offer_price}} JD  <small class="text-danger"><del>{{$item->price}} JD</del></small></h5>
            </div>
        </div>
    </div>
    @endforeach
   
