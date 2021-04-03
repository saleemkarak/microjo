<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>تصنيفات المنتجات</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            @if($categoriesIn ->count() > 0)
            @foreach ($categoriesIn as $category)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#{{$category->title}}">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            {{$category->title}}
                        </a>
                    </h4>
                </div>
                <div id="{{$category->title}}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul> 
                            <li><a href="{{route('product.category',$category->slug)}}">{{$category->title}}</a></li> 
                            @foreach ($category->childCat as $item)
                            <li><a href="{{route('product.category',$item->slug)}}">{{$item->title}}</a></li> 
                           @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
         @endif 
        </div><!--/category-products-->
    
        <div class="brands_products"><!--brands_products-->
            <h2>الماركات</h2>
            @if($brands->count() > 0)
           
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    @foreach ($brands as $brand)
                    <li><a href="#"> <span class="pull-right">({{$brand->products->count()}})</span>{{$brand->title}}</a></li>
                    @endforeach
                </ul>
            </div>
           
            @endif
        </div><!--/brands_products-->
        
        <div class="price-range"><!--price-range-->
            <h2>Price Range</h2>
            <div class="well text-center">
                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
            </div>
        </div><!--/price-range-->
        
        <div class="shipping text-center"><!--shipping-->
            <img src="images/home/shipping.jpg" alt="" />
        </div><!--/shipping-->
    
    </div>
</div>