 
   @foreach ($products as $item)
   @php
   $photos = explode(',',$item->photo);
   @endphp

  <div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <img src="{{$photos[0]}}" alt="" />
                <h2>{{$item->offer_price}} دينار</h2>
                <p>{{$item->title}}</p>
                <h4><a href="#">Brand : {{\App\Models\Brand::where('id',$item->brand_id)->value('title')}}</a></h4>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>اضف للسلة</a>
                

            </div>
            <div class="product-overlay">
                <div class="overlay-content">
                    <h2 dir="rtl">{{$item->offer_price}} دينار</h2>
                    <p>{{$item->title}}</p>
                    <a href="#" data-quantity="1" data-product-id="{{$item->id}}" id="add-to-cart{{$item->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>اضف للسلة</a>
                    <a href="{{route('product.detail',$item->slug)}}" class="btn btn-default"><i class="fa fa-shopping-cart"></i>شاهد المنتج</a>
                </div>
            </div>
        </div>
        <div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a href=""><i class="fa fa-plus-square"></i>مفضلة</a></li>
                <li><a href=""><i class="fa fa-plus-square"></i>مقارنة</a></li>
            </ul>
        </div>
    </div>
</div>
@endforeach