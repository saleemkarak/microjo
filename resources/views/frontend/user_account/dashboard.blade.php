@extends('frontend.layouts.master0')
@section('content')
 
<div class="container emp-profile">
    <form method="post">
       
        <div class="row">
            @include('frontend.user_account.sidebar')
            <div class="col-md-8">
            
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h4 class="card-title">{{$user->full_name}}</h4>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="badge badge-pill bg-primary float-right">{{$user->username}}</span>
                                        UserName
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-pill bg-info float-right">{{$user->email}}</span>
                                        Email
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-pill bg-warning float-right">1</span>
                                        Morbi leo risus
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-pill bg-success float-right">3</span>
                                        Porta ac consectetur ac
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-pill bg-danger float-right">8</span>
                                        Vestibulum at eros
                                    </li>
                                </ul>
                              
                            </div>
                        </div>
                   
           
        </div>
    </form>           
</div>
@endsection
