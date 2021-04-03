@extends('backend.layout.master')
@section('content')

            <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
          <div class="content-wrapper-before"></div>
          <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
              <h3 class="content-header-title mb-0 d-inline-block">Category</h3>
              <div class="breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper mr-1">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Categories</a>
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

              <div class="card">

                  <div class="card-block">
                      <div class="card-body">
                          <form class="needs-validation was-validated" novalidate action="{{route('category.store')}}" method="post">
                            @csrf

                              <div class="col-md-12 mb-12">
                                <label for="title" >Title</label>
                                <input name = "title"  type="text" class="form-control position-relative" id="title" placeholder="Title" value="" required>

                              </div>


                                <div class="col-md-12 mb-12">
                                  <label for="summary">Summary</label>
                                  <fieldset class="form-group">
                                    <textarea class="form-control" id="summary" rows="3" placeholder="Summary...." name = "Summary">{{old('summary')}}</textarea>
                                </fieldset>
                                </div>

                                <div class="form-group">
                                    <label for="is_parent">Is Parent</label><br>
                                    <input type="checkbox" name='is_parent' id='is_parent' value='1' checked> Yes
                                  </div>
                                  {{-- {{$parent_cats}} --}}

                                  <div class="form-group d-none" id='parent_cat_div'>
                                    <label for="parent_id">Parent Category</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="">--Select any category--</option>
                                         @foreach($parent_cats as $key=>$parent_cat)
                                            <option value='{{$parent_cat->id}}' {{old('parent_id') == $parent_cat ? 'selected' : ''}}>{{$parent_cat->title}}</option>
                                        @endforeach
                                    </select>
                                  </div>


                                    <label for="photo">Photo</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                          </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="photo">
                                      </div>
                                      <div id="holder" style="margin-top:15px;max-height:100px;"></div>


                                      <label for="validationTooltip01">Status</label>
                                      <fieldset class="form-group position-relative">
                                        <select name = "status" class="form-control input-xl" id="xLargeSelect">
                                            <option value="">-- Status --</option>
                                            <option value="active" {{old('status')=='active' ? 'selected' : ''}}>Active</option>
                                            <option value="inactive" {{old('status')=='inactive' ? 'selected' : ''}}>InActive</option>

                                        </select>
                                     </fieldset>

                            <button class="btn btn-primary" type="submit">Save</button>

                          </form>
                      </div>
                  </div>
              </div>
          </div>

      </div>
  </section>
  <!-- Tooltip validations end -->
          </div>
        </div>
      </div>
      <!-- END: Content-->


      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>

     $('#lfm').filemanager('image');
</script>

<script>
    $('#summary').summernote({
      placeholder: 'Hello Bootstrap 4',
      tabsize: 2,
      height: 100
    });
  </script>
<script>
    $('#is_parent').change(function(){
      var is_checked=$('#is_parent').prop('checked');
      // alert(is_checked);
      if(is_checked){
        $('#parent_cat_div').addClass('d-none');
        $('#parent_cat_div').val('');
      }
      else{
        $('#parent_cat_div').removeClass('d-none');
      }
    })
  </script>
@endsection
