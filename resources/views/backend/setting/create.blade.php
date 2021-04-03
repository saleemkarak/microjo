@extends('backend.layout.master')
@section('content')

            <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
          <div class="content-wrapper-before"></div>
          <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
              <h3 class="content-header-title mb-0 d-inline-block">Settings</h3>
              <div class="breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper mr-1">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Settings</a>
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
                          <form class="needs-validation was-validated" novalidate action="{{route('setting.store')}}" method="post">
                            @csrf

                              <div class="col-md-12 mb-12">
                                <label for="title" >Title</label>
                                <input name = "title"  type="text" class="form-control position-relative" id="title" placeholder="Title" value="{{old('title')}}" required>
                              </div>

                                <div class="col-md-12 mb-12">
                                    <label for="photo">Logo</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                          </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="photo">
                                      </div>
                                      <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                  </div>

                                  <div class="col-md-12 mb-12">
                                    <label for="about">About</label>
                                    <fieldset class="form-group">
                                      <textarea class="form-control" id="about" rows="3" placeholder="About" name = "about">{{old('about')}}</textarea>
                                  </fieldset>
                                  </div>                                    


                                  <div class="row">

                                    <div class="col">
                                        
                                      <label for="phone" >Phone</label>
                                      <div class="input-group">
                                      <input name = "phone"  type="number" class="form-control position-relative" id="phone" placeholder="Phone ex:07XXXXXXX" value="{{old('phone')}}" required>
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fa fa-phone-square" aria-hidden="true"></i></span>
                                      </div>
                                    </div>
                                    </div>

                                    <div class="col">
                                      <label for="email" >Email</label>
                                      <div class="input-group">
                                      <input name = "email"  type="text" class="form-control position-relative" id="email" placeholder="ex:microjo@gmail.com" value="{{old('email')}}" required>
                                      <div class="input-group-prepend">
                                          <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                        </div>
                                      </div>
                                    </div>
                                   
                                  </div>
                                  <div class="row">

                                    <div class="col">
                                        <label for="email" >Address</label>
                                        <div class="input-group">
                                        <input name = "address"  type="text" class="form-control position-relative" id="email" placeholder="ex:Amman-Krak" value="{{old('address')}}" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
                                          </div>
                                        </div>
                                      </div>

                                    <div class="col">
                                        <label for="facebook" >Facebook</label>
                                        <div class="input-group">
                                        <input name = "facebook"  type="text" class="form-control position-relative" id="facebook" placeholder="ex:facebook id" value="{{old('facebook')}}" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                                          </div>
                                        </div>
                                      </div>

                                    </div>  
                                    
                                    <div class="row">

                                        
                                          <div class="col">
                                            <label for="twitter" >Twitter</label>
                                            <div class="input-group">
                                            <input name = "twitter"  type="text" class="form-control position-relative" id="twitter" placeholder="ex:twitter id" value="{{old('twitter')}}" required>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                                              </div>
                                            </div>
                                          </div>
    
                                          <div class="col">
                                            <label for="insta" >Instagram</label>
                                            <div class="input-group">
                                            <input name = "insta"  type="text" class="form-control position-relative" id="insta" placeholder=" ex:instagram id" value="{{old('insta')}}" required>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fa fa-instagram" aria-hidden="true"></i></span>
                                              </div>
                                            </div>
                                          </div>
                                       
                                        </div>      
                                        <div class="row">

                                        
                                            <div class="col">
                                              <label for="opentime" >Open-Time</label>
                                              <div class="input-group">
                                              <input name = "opentime"  type="text" class="form-control position-relative" id="opentime" placeholder=" ex:12-8 " value="{{old('opentime')}}" required>
                                              <div class="input-group-prepend">
                                                  <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                                </div>
                                              </div>
                                            </div>
      
                                            <div class="col">
                                                <label for="validationTooltip01">Status</label>
                                                <fieldset class="form-group position-relative">
                                                  <select name = "status" class="form-control input-xl" id="xLargeSelect">
                                                      <option value="">-- Status --</option>
                                                      <option value="active" {{old('status')=='active' ? 'selected' : ''}}>Active</option>
                                                      <option value="inactive" {{old('status')=='inactive' ? 'selected' : ''}}>InActive</option>
          
                                                  </select>
                                               </fieldset>
                                        
                                          </div>    

                                    <div class="col-md-12 mb-12">
                                      
                                    </div>
                               
                                
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
    $('#about').summernote({
      placeholder: 'Hello Bootstrap 4',
      tabsize: 2,
      height: 100
    });
  </script>

@endsection
