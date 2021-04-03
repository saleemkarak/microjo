@extends('backend.layout.master')
@section('content')

            <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
          <div class="content-wrapper-before"></div>
          <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
              <h3 class="content-header-title mb-0 d-inline-block">Users</h3>
              <div class="breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper mr-1">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Users</a>
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
                          <form class="needs-validation was-validated" novalidate action="{{route('user.store')}}" method="post">
                            @csrf

                              <div class="col-md-6 mb-6">
                                <label for="full_name" >FullName</label>
                                <input name = "full_name"  type="text" class="form-control position-relative" id="full_name" placeholder="FullName" value="{{old('full_name')}}" required>

                              </div>


                                <div class="container">
                                    <div class="row">

                                      <div class="col">
                                        <label for="username" >UserName</label>
                                        <input name = "username"  type="text" class="form-control position-relative" id="username" placeholder="UserName" value="{{old('username')}}" required>
                                      </div>

                                      <div class="col">
                                        <label for="email" >Email</label>
                                        <div class="input-group">
                                            <input name = "email"  type="email" class="form-control position-relative" id="email" placeholder="Email@email.com" value="{{old('email')}}" required>
                                            <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col">
                                        <label for="password" >Password</label>
                                        <div class="input-group">
                                            <input name = "password"  type="password" class="form-control position-relative" id="password" placeholder="SrtongPass" value="{{old('password')}}" required>
                                            <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend"> <input type="checkbox" onclick="myFunction()">show
                                            </span>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col">
                                        <label for="address" >Address</label>
                                        <div class="input-group">
                                            <input name = "address"  type="address" class="form-control position-relative" id="address" placeholder="Jordan-Amman" value="{{old('address')}}" required>
                                            <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">!</span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>



                                      <div class="col-md-6 mb-6">
                                        <label for="photo">Photo</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                              </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">
                                          </div>
                                          <div id="holder" style="margin-top:15px;max-height:100px;" ></div>
                                      </div>



                                    <div class="row">
                                        <div class="col">
                                            <label for="validationTooltip01">Role <span class="text-danger">*</span></label>
                                            <fieldset class="form-group position-relative">
                                              <select name = "role" class="form-control input-xl" id="role">
                                                  <option value="">-- Role --</option>
                                                  <option value="admin" {{old('admin')=='admin' ? 'selected' : ''}}>Admin</option>
                                                  <option value="customer" {{old('customer')=='customer' ? 'selected' : ''}}>Customer</option>
                                                  <option value="vendor" {{old('vendor')=='vendor' ? 'selected' : ''}}>Vendor</option>
                                              </select>
                                           </fieldset>
                                        </div>




                                    <div class="col">
                                        <label for="validationTooltip01">Status</label>
                                      <fieldset class="form-group position-relative">
                                        <select name = "status" class="form-control -xl" id="xLargeSelect">
                                            <option value="">-- Status --</option>
                                            <option value="active" {{old('status')=='active' ? 'selected' : ''}}>Active</option>
                                            <option value="inactive" {{old('status')=='inactive' ? 'selected' : ''}}>InActive</option>
                                        </select>
                                     </fieldset>
                                    </div>


                                </div>
                            <button class="btn btn-primary" type="submit">Save</button>
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
                html_option +="<option value='"+id+"'>"+title+"</option>"
              });
            }
            else{
                $('#child_cat_div').addClass('d-none');
            }
            $('#child_cat_id').html(html_option);
        }
    })

      }
    })
  </script>
<script>
    function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>

@endsection
