@extends('frontend.master')


@section('myaccount')
    active
@endsection

@section('title')
    Best Care for Baby.
@endsection

@section('style')
<style>
    
#sidebar {
    padding: 15px 0px 15px 0px;
}

#sidebar .h4 {
    font-weight: 500;
    padding-left: 15px
}

#sidebar ul {
    list-style: none;
    margin: 0;
    padding-left: 0rem
}

#sidebar ul li {
    padding: 10px 0;
    display: block;
    padding-left: 1rem;
    padding-right: 1rem;
    border-left: 5px solid transparent
}

#sidebar ul li.active {
    border-left: 5px solid #a81100;
    background-color: #f5f5f5;
}

#sidebar ul li a {
    display: block
}

#sidebar ul li a .fas,
#sidebar ul li a .far {
    color: #ddd
}

#sidebar ul li a .link {
    color: rgb(46, 46, 46);
    font-weight: 500
}

#sidebar ul li a .link-desc {
    font-size: 0.8rem;
    color: #ddd
}

#main-content {
    padding: 30px;
}

#main-content .h5,
#main-content .text-uppercase {
    font-weight: 600;
    margin-bottom: 0
}

#main-content .h5+div {
    font-size: 0.9rem
}

#main-content .box {
    padding: 10px;
    border-radius: 6px;
    width: 170px;
    height: 90px
}

#main-content .box img {
    width: 40px;
    height: 40px;
    object-fit: contain
}

#main-content .box .tag {
    font-size: 0.9rem;
    color: #000;
    font-weight: 500
}

#main-content .box .number {
    font-size: 1.5rem;
    font-weight: 600
}



</style>
@endsection

@section('content')

    @auth()
            <div class="fluid-container mt-5 mb-5">
                <div class="row">
                    @include('user.nav')
                    <div class="col-lg-9 my-lg-0 my-1">
                        <div id="main-content" class="bg-white border">
                            <div class="d-flex flex-column">
                                <div class="h5">{{Auth::user()->name}},</div>
                                <div>Logged in as: {{Auth::user()->email}}</div>
                            </div>
                            <div class="d-flex flex-column mt-5">
                                <div class="h5">Your Order</div>
                                <table class="table-responsive cart-wrap">
                            <thead>
                                <tr>
                                    <th class="images">Image</th>
                                    <th class="product">Product</th>
                                    <th class="ptice">Price</th>
                                    <th class="quantity">Quantity</th>
                                    <th class="total">Total</th>
                                    <th class="remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                    $in_stock = true;
                                @endphp
                               
                                    <tr>
                                        <td class="images"><img class="w-75"
                                                src="{{ asset('uploads/product')}}" alt="">
                                            </td>
                                        <td class="product"><a
                                                href="{{ url('/products/details')}}"></a>
                                        </td>

                                        <td class="ptice">
                                            ৳10
                                        </td>
                                        <td class="quantity cart-plus-minus">
                                            <input type="text" name="cart_update[]"
                                                value="2" />
                                        </td>
                                        <td class="total">
                                            ৳20
                                        </td>
                                        <td class="remove">
                                            <a href="{{ url('cart/delete') }}"><i
                                                    class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @php
                                        $total = $total;
                                    @endphp
                               


                            </tbody>
                        </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        @include('auth.login')
    @endauth


    <!-- checkout-area start -->

    <!-- checkout-area end -->

    <!-- start social-newsletter-section -->

@endsection

@section('footer_js')

    <script>
        ///
    </script>

@endsection
