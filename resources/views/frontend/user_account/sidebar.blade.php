
            <div class="col-sm-6 col-lg-4">
                <div class="sidebar__item">

                    <h4>Account Settings</h4>
                    
                   
                
    
                    <div class="nav-side-menu">
                        
                           
                            <ul class="list-group pmd-list pmd-card-list">
    
                                <li class="pmd-list-divider"></li>
                                <li class="{{\Request::is('user/dashboard') ? 'active' : ''}} list-group-item">
                                    <h4 class="pmd-list-title">  <a class="" href="{{route('user.dashboard')}}">Dashboard</a></h4>
                                 
                                </li>
    
                                <li class="pmd-list-divider"></li>
                                <li class="{{\Request::is('user/order') ? 'active' : ''}} list-group-item">
                                    <h4 class="pmd-list-title">  <a class="" href="{{route('user.order')}}">Order</a></h4>
                                 
                                </li>

                                <li class="pmd-list-divider"></li>
                                <li class="{{\Request::is('user/address') ? 'active' : ''}} list-group-item">
                                    <h4 class="pmd-list-title">  <a class="" href="{{route('user.address')}}">Address</a></h4>
                                 
                                </li>

                                <li class="pmd-list-divider"></li>
                                <li class="{{\Request::is('user/account-detail') ? 'active' : ''}} list-group-item">
                                    <h4 class="pmd-list-title">  <a class="" href="{{route('user.account')}}">Account Detail</a></h4>
                                 
                                </li>

                                <li class="pmd-list-divider"></li>
                                <li class=" {{\Request::is('user/logout') ? 'active' : ''}} list-group-item">
                                    <h4 class="pmd-list-title">  <a class="" href="{{route('user.logout')}}">Logout</a></h4>
                                 
                                </li>
                               </ul>
                       
                 
                    </div>
    
                   
                </div>
            </div>

            
