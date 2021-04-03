@extends('frontend.layouts.master0')
@section('content')
		<!-- Shop Login -->
	
        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    
                    <div class="row">
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Login to our site</h3>
	                            		<p>Enter username and password to log on:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-key"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="{{route('login.submit')}}" method="post" class="login-form">
				                    	@csrf
                                        <div class="form-group">
				                    		<label class="sr-only" for="form-username">Email</label>
				                        	<input type="text" name="email" placeholder="Email@gmail.com..." class="form-username form-control" id="email">
				                        @error('email')
                                          <p class="text-danger">{{$message}}</p>  
                                        @enderror
                                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="password">
                                            @error('password')
                                            <p class="text-danger">{{$message}}</p>  
                                          @enderror
                                        </div>
				                        <button type="submit" class="btn btn-primary">Sign in!</button>
				                    </form>
			                    </div>
		                    </div>
		                
		                	<div class="social-login">
	                        	<h3>or:</h3>
	                        	<div class="social-login-buttons">
		                        	<a class="btn btn-link-1 btn-link-1-facebook" href="#">
		                        		<i class="fa fa-facebook"></i> Facebook
		                        	</a>
		                        	<a class="btn btn-link-1 btn-link-1-twitter" href="#">
		                        		<i class="fa fa-twitter"></i> Twitter
		                        	</a>
		                        	<a class="btn btn-link-1 btn-link-1-google-plus" href="#">
		                        		<i class="fa fa-google-plus"></i> Google Plus
		                        	</a>
	                        	</div>
	                        </div>
	                        
                        </div>
                        
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>
                        	
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Sign up now</h3>
	                            		<p>Fill in the form below to get instant access:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="{{route('register.submit')}}" method="post" class="registration-form">
                                        {{csrf_field()}}
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-first-name">Fullname</label>
				                        	<input type="text" name="full_name" placeholder="First name..." class="form-first-name form-control" id="full_name" value="{{old('full_name')}}">
                                            @error('full_name')
                                            <p class="text-danger">{{$message}}</p>  
                                          @enderror
                                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-last-name">Username</label>
				                        	<input type="text" name="username" placeholder="User name..." class="form-last-name form-control" id="username"  value="{{old('username')}}">
                                            @error('username')
                                            <p class="text-danger">{{$message}}</p>  
                                          @enderror
                                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-email">Email</label>
				                        	<input type="text" name="email" placeholder="Email..." class="form-email form-control" id="email"  value="{{old('email')}}">
                                            @error('email')
                                            <p class="text-danger">{{$message}}</p>  
                                          @enderror
                                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-email">Password</label>
				                        	<input type="text" name="password" placeholder="PassWord" class="form-email form-control" id="password" >
                                            @error('password')
                                            <p class="text-danger">{{$message}}</p>  
                                          @enderror
                                        </div>
                                        <div class="form-group">
				                        	<label class="sr-only" for="form-email">Pass Confirm</label>
				                        	<input type="text" name="password_confirmation" placeholder="Confirm PassWord..." class="form-email form-control" id="confirm_password">
                                            
                                        </div>

				                        <button type="submit" class="btn btn-primary">Sign me up!</button>
				                    </form>
			                    </div>
                        	</div>
                        	
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>

@endsection
