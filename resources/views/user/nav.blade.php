<div class="col-lg-3 my-lg-0 my-md-1">
    <div id="sidebar" style="background: rgba(0,0,0,.03); color: rgb(0, 0, 0)" ;>
        <div class="h4">Account</div>
        <ul>
            <li class="@yield('orders')"> <a href="{{url('/account/orders')}}" class="text-decoration-none d-flex align-items-start">
                    <div class="fas fa-box-open pt-2 me-3"></div>
                    <div class="d-flex flex-column">
                        <div class="link">My Orders
                            <span class="badge badge-warning">{{ $total_order }}</span>
                        </div>

                    </div>
                </a> </li>
                
            <li class="@yield('myaccount')"> <a href="{{url('/account/user')}}" class="text-decoration-none d-flex align-items-start">
                    <div class="fas fa-box pt-2 me-3"></div>
                    <div class="d-flex flex-column">
                        <div class="link">My Account</div>
                    </div>
                </a> </li>
            
            <li> <a href="#" class="text-decoration-none d-flex align-items-start">
                    <div class="fas fa-box-open pt-2 me-3"></div>
                    <div class="d-flex flex-column">
                        <div class="link">Account Information</div>
                    </div>
                </a> </li>
        </ul>
    </div>
</div>
