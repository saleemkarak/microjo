@extends('backend.layout.master')
@section('content')

            <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
          <div class="content-wrapper-before"></div>
          <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
              <h3 class="content-header-title mb-0 d-inline-block">Products</h3>
              <div class="breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper mr-1">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Produtcs</a>
                    </li>

                  </ol>
                </div>
              </div>
            </div>
            <div class="content-header-right col-md-4 col-12 d-block d-md-none"><a class="btn btn-warning btn-min-width float-md-right box-shadow-4 mr-1 mb-1" href="chat-application.html"><i class="ft-mail"></i> Email</a></div>
          </div>

          <div class="content-body">

  <!-- Tooltip validations start -->
  <section class="tooltip-validations" id="tooltip-validation">

      <div class="row match-height">
          <div class="col-md-12">
              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                         <li>{{$error}}</li>
                      @endforeach
                  </ul>
                </div>
              @endif
          </div>
              <div class="card">

                  <div class="card-block">
                      <div class="card-body">
                          <form class="needs-validation was-validated" novalidate action="{{route('product.update',$product->id)}}" method="post">
                            @csrf
                            @method('patch')
                              <div class="col-md-6 mb-6">
                                <label for="title" >Title</label>
                                <input name = "title"  type="text" class="form-control position-relative" id="title" placeholder="Title" value="{{$product->title}}" required>

                              </div>

                              <div class="col-md-12 mb-12">
                                <label for="summary">Summary</label>
                                <fieldset class="form-group">
                                  <textarea class="form-control" id="summary" rows="3" placeholder="Summary" name = "summary">{{$product->summary}}</textarea>
                              </fieldset>
                              </div>

                                <div class="col-md-12 mb-12">
                                  <label for="description">Description</label>
                                  <fieldset class="form-group">
                                    <textarea class="form-control" id="description" rows="3" placeholder="Description" name = "description">{{$product->description}}</textarea>
                                </fieldset>
                                </div>

                                <div class="container">
                                    <div class="row">

                                      <div class="col">
                                        <label for="stuck" >Stock</label>
                                    <input name = "stock"  type="number" class="form-control position-relative" id="stock" placeholder="Stuck ex:12" value="{{$product->stock}}" required>
                                      </div>

                                      <div class="col">
                                        <label for="price" >Price</label>
                                        <div class="input-group">
                                        <input name = "price" step="any"  type="number" class="form-control position-relative" id="price" placeholder="price ex:12" value="{{$product->price}}" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">JD</span>
                                          </div>
                                        </div>
                                      </div>


                                      <div class="col">
                                        <label for="discount" >Discount</label>
                                        <div class="input-group">
                                        <input name = "discount" step="any"  type="number" min="0" max="100" class="form-control position-relative" id="discount" placeholder="Discount ex:10%" value="{{$product->discount}}" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">%</span>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col ">
                                        <label for="offer_price" >Offer Price</label>
                                        <div class="input-group">
                                        <input name = "offer_price" step="any"  type="number" class="form-control position-relative" id="offer_price" placeholder="offer_price ex:12" value="{{$product->offer_price}}" disabled>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">JD</span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">

                                      <div class="col">
                                        <label for="photo">Photo</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                              </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$product->photo}}">
                                          </div>
                                          <div id="holder" style="margin-top:15px;max-height:100px;" ></div>
                                      </div>

                                      <div class="col">
                                        <label for="validationTooltip01">Brand</label>
                                    <fieldset class="form-group position-relative">
                                      <select name = "brand_id" class="form-control input-xl" id="prand" >
                                          <option value="">-- Brand --</option>
                                            @foreach (\App\Models\Brand::get() as $brand)
                                            <option value="{{$brand->id}}" {{$brand->id==$product->brand_id ? 'selected' : ''}}>{{$brand->title}}</option>
                                            @endforeach
                                      </select>
                                   </fieldset>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label for="validationTooltip01">Category</label>
                                            <fieldset class="form-group position-relative">
                                              <select name = "cat_id" class="form-control input-xl" id="cat_id">
                                                  <option value="">-- Category --</option>
                                                  @foreach (\App\Models\Category::where('is_parent','1')->get() as $category)
                                                  <option value="{{$category->id}}"{{$category->id==$product->cat_id ? 'selected' : ''}}>{{$category->title}}</option>
                                                  @endforeach
                                              </select>
                                           </fieldset>
                                        </div>
                                        <div class="col d-none" id="child_cat_div">
                                            <label for="validationTooltip01">Child-Category</label>
                                            <fieldset class="form-group position-relative">
                                                <input type="hidden" name="chil_id" id="chil_id" value="{{$product->child_cat_id}}">
                                              <select name = "child_cat_id" class="form-control input-xl " id="chil_cat_id">
                                              </select>
                                           </fieldset>
                                        </div>
                                        <div class="col">
                                            <label for="validationTooltip01">Size</label>
                                            <fieldset class="form-group position-relative">
                                              <select name = "size" class="form-control input-xl" id="size">
                                                  <option value="">-- Size --</option>
                                                  <option value="S" {{$product->size =='S' ? 'selected' : ''}}>Small</option>
                                                  <option value="M" {{$product->size=='M' ? 'selected' : ''}}>Medium</option>
                                                  <option value="L" {{$product->size=='L' ? 'selected' : ''}}>Larg</option>
                                              </select>
                                           </fieldset>
                                        </div>
                                      </div>


                                  <div class="row">

                                    <div class="col">
                                        <label for="validationTooltip01">Condition</label>
                                        <fieldset class="form-group position-relative">
                                          <select name = "condition" class="form-control input-xl" id="xLargeSelect">
                                              <option value="">-- Condition --</option>
                                              <option value="new" {{$product->condition =='new' ? 'selected' : ''}}>New</option>
                                              <option value="popular" {{$product->condition =='popular' ? 'selected' : ''}}>Popular</option>
                                              <option value="used" {{$product->condition =='used' ? 'selected' : ''}}>Used</option>
                                          </select>
                                       </fieldset>
                                    </div>

                                    <div class="col">
                                        <label for="validationTooltip01">Seller</label>
                                        <fieldset class="form-group position-relative">
                                          <select name = "seller_id" class="form-control input-xl" id="seller">
                                              <option value="">-- Seller --</option>
                                                @foreach (\App\Models\User::where('role','seller')->get() as $seller)
                                                <option value="{{$seller->id}}" {{$seller->id == $product->seller_id ? 'selected' : ''}}>{{$seller->full_name}}</option>
                                                @endforeach
                                          </select>
                                       </fieldset>
                                    </div>

                                    <div class="col">
                                        <label for="validationTooltip01">Status</label>
                                      <fieldset class="form-group position-relative">
                                        <select name = "status" class="form-control -xl" id="xLargeSelect">
                                            <option value="">-- Status --</option>
                                            <option value="active" {{$product->status=='active' ? 'selected' : ''}}>Active</option>
                                            <option value="inactive" {{$product->status=='inactive' ? 'selected' : ''}}>InActive</option>
                                        </select>
                                     </fieldset>
                                    </div>


                                  <div class="col">
                                    <label for="validationTooltip01">Is Featured</label>
                                    <fieldset class="form-group position-relative">
                                      <select name = "is_featured" class="form-control -xl" id="xLargeSelect">
                                          <option value="">-- Featured --</option>
                                          <option value="0" {{$product->is_featured =='0' ? 'selected' : ''}}>Featured</option>
                                          <option value="1" {{$product->is_featured =='1' ? 'selected' : ''}}>NotFeatured</option>
                                      </select>
                                   </fieldset>
                                  </div>
                                  <div class="col">
                                    <label for="validationTooltip01">Is Recommended</label>
                                    <fieldset class="form-group position-relative">
                                      <select name = "is_recommended" class="form-control -xl" id="xLargeSelect">
                                          <option value="">-- Recommended --</option>
                                          <option value="0" {{$product->is_recommended =='0' ? 'selected' : ''}}>Recommended</option>
                                          <option value="1" {{$product->is_recommended =='1' ? 'selected' : ''}}>Not Recommended</option>
                                      </select>
                                   </fieldset>
                                  </div>
                                </div>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                          </form>
                      </div>
                  </div>
              </div>
     </div>

  </section>
           </div>
          </div>
        </div>

      <!-- END: Content-->



@endsection

@section('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>

     $('#lfm').filemanager('image');
</script>

<script>
    $('#description').summernote({
      placeholder: 'Hello Bootstrap 4',
      tabsize: 2,
      height: 100
    });
    $('#summary').summernote({
      placeholder: 'Hello Bootstrap 4',
      tabsize: 2,
      height: 100
    });
  </script>
<script>
     var  child_cat_id=document.getElementById("chil_id").value;

    $('#cat_id').change(function(){
      var cat_id=$(this).val();

      if(cat_id !=null){

        $.ajax({

        url:"/admin/category/"+cat_id+"/child",
        type: "post",
        data:{
            _token:"{{csrf_token()}}",
            'cat_id':cat_id,
         },
        success:function(response){
            var html_option="<option value=''>----Select sub category----</option>"
            var data=response.data;
            if(response.status){

                $('#child_cat_div').removeClass('d-none');
                $.each(data,function(id,title){


                    html_option += "<option value='"+id+"' "+(child_cat_id ==id ? 'selected ' : '')+">"+title+"</option>";              });
            }
            else{
                $('#child_cat_div').addClass('d-none');
            }
            $('#chil_cat_id').html(html_option);
        }
    })

      }
    })
    if(child_cat_id!=null){
            $('#cat_id').change();
        }
  </script>
@endsection
