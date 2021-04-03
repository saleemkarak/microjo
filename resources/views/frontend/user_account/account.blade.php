@extends('frontend.layouts.master0')
@section('content')

<div class="container emp-profile">
   
       
        <div class="row">
           @include('frontend.user_account.sidebar')
           
            <div class="col-xs-12 col-sm-6 col-lg-8">

          
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-colored-form-control">Account Detail</h4>
                            <a class="heading-elements-toggle">
                                <i class="la la-ellipsis-v font-medium-3"></i>
                            </a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li>
                                        <a data-action="collapse">
                                            <i class="ft-minus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-action="reload">
                                            <i class="ft-rotate-cw"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-action="expand">
                                            <i class="ft-maximize"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-action="close">
                                            <i class="ft-x"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
        
                              
                                <form class="form" action="{{ route('update.account',[$user->id])}}" method="post">
                                    @csrf
                                
                                    <div class="form-body">
        
                                        <div class="form-group">
                                            <label for="contactinput5">Full Name</label>
                                            <input name="full_name" value="{{$user->full_name}}" class="form-control border-primary" type="text" placeholder="{{$user->full_name}}" id="contactinput5">
                                        @error('full_name')
                                           <p class="text-danger">{{$message}}</p> 
                                        @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="contactinput5">UserName</label>
                                            <input name="username" value="{{$user->username}}" class="form-control border-primary" type="text" placeholder="{{$user->username}}" id="contactinput5">
                                            @error('username')
                                            <p class="text-danger">{{$message}}</p> 
                                         @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input name="phone" value="{{$user->phone}}" class="form-control border-primary" id="contactinput7" type="tel" placeholder="{{$user->phone}}">
                                            @error('phone')
                                            <p class="text-danger">{{$message}}</p> 
                                         @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="contactinput5">Email</label>
                                            <input name="email" value="{{$user->email}}" class="form-control border-primary" type="email" placeholder="{{$user->email}}" id="contactemail5" disabled>
                                        </div>
        
                                       
        
                                        <div class="form-group">
                                            <label>كلمة المرور القديمة</label>
                                            <input class="form-control border-primary" id="currentPass" name="oldpassword" type="password" placeholder="">
                                            @error('oldpassword')
                                            <p class="text-danger">{{$message}}</p> 
                                         @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>كلمة المرور الجديدة</label>
                                            <input class="form-control border-primary" id="newPass" name="newpassword" type="password" placeholder=" ">
                                            @error('newpassword')
                                            <p class="text-danger">{{$message}}</p> 
                                         @enderror
                                        </div>
                                       
        
                                    </div>
        
                                    <div class="form-actions right">
                                        <button type="button" class="btn btn-danger mr-1">
                                            <i class="ft-x"></i> Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> Save
                                        </button>
                                    </div>
                                </form>
        
                            </div>
                        </div>
                    </div>
                
            </div>
        
            </div>
                
        </div>
         
</div>
@endsection
