@extends('frontend.master')


@section('cart')
    active
@endsection

@section('title')
    Best Care for Baby.
@endsection

@section('content')

    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Shop Page</h2>
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>Shop</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->

    @if ($cart_count > 0)
        <!-- cart-area start -->
        <div class="cart-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ url('/cart/update') }}" method="POST">
                            @csrf
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
                                    @foreach ($cart_products as $cart_product)
                                        <tr>
                                            <td class="images"><img class="w-75"
                                                    src="{{ asset('uploads/product') }}/{{ App\Models\Product::find($cart_product->product_id)->product_photo }}"
                                                    alt=""></td>
                                            <td class="product"><a
                                                    href="{{ url('/products/details') }}/{{ $cart_product->product_id }}">{{ App\Models\Product::find($cart_product->product_id)->product_name }}</a>

                                                @if ($cart_product->product_quantity > App\Models\Product::find($cart_product->product_id)->quantity)
                                                    <span class="badge badge-warning">Stock Out</span>
                                                    <span class="badge badge-success">In Stock
                                                        {{ App\Models\Product::find($cart_product->product_id)->quantity }}</span>
                                                    @php
                                                        $in_stock = false;
                                                    @endphp
                                                @endif

                                            </td>
                                            <td class="ptice">
                                                ৳{{ App\Models\Product::find($cart_product->product_id)->product_price }}
                                            </td>
                                            <td class="quantity cart-plus-minus">
                                                <input type="text" name="cart_update[{{ $cart_product->id }}]"
                                                    value="{{ $cart_product->product_quantity }}" />
                                            </td>
                                            <td class="total">
                                                ৳{{ App\Models\Product::find($cart_product->product_id)->product_price * $cart_product->product_quantity }}
                                            </td>
                                            <td class="remove">
                                                <a href="{{ url('cart/delete') }}/{{ $cart_product->id }}"><i
                                                        class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        @php
                                            $total = $total + App\Models\Product::find($cart_product->product_id)->product_price * $cart_product->product_quantity;
                                        @endphp
                                    @endforeach


                                </tbody>
                            </table>
                            <div class="row mt-60">
                                <div class="col-xl-4 col-lg-5 col-md-6 ">
                                    <div class="cartcupon-wrap">
                                        <ul class="d-flex">
                                            <li>
                                                <button type="submit">Update Cart</button>
                                            </li>
                        </form>
                        <li><a href="{{ url('products/shop') }}">Continue Shopping</a></li>
                        </ul>
                        <h3>Cupon</h3>
                        <p>Enter Your Cupon Code if You Have One</p>
                        <div class="cupon-wrap">
                            <input type="text" id="coupon_name" placeholder="Cupon Code" value="{{ $coupon_code }}">

                            <button type="button" id="coupon_btn">Apply Cupon</button>

                        </div>
                        @if (session('expired'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('expired') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                    <div class="cart-total text-right">
                        <h3>Cart Totals</h3>
                        <ul>
                            <li><span class="pull-left"> Total </span>৳ {{ $total }}</li>
                            <li><span class="pull-left">Discount ({{ $discount }}%)</span> ৳
                                {{ ($total / 100) * $discount }}</li>
                            <li><span class="pull-left">Subtotal </span>৳ {{ $total - ($total / 100) * $discount }}
                            </li>
                        </ul>
                        @php
                            $discount_from_cart = ($total / 100) * $discount;
                        @endphp

                        @if ($in_stock)

                            {{-- @php
                            session([
                                'discount_from_cart' => ($total / 100) * $discount,
                            ]);
                        @endphp --}}

                            @if ($discount_from_cart > 0)
                                <a href="{{ url('/checkout', $coupon_code) }}">Proceed to Checkout</a>
                            @else

                                <a href="{{ url('/checkout') }}">Proceed to Checkout</a>
                            @endif

                        @else
                            <div class="alert alert-warning">Your Product is Out of Stock</div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    @else
        <div class="jumbotron text-center" style="margin-bottom: -1rem !important;">
            <h1 class="display-3">Sorry!</h1>
            <p class="lead"><strong>Your Cart is Empty;</strong> Plz. Add Product to Cart!</p>

            <hr>

            <p class="lead">
                <a class="btn btn-sm" style="color: #fff; background-color: #ef4836;" href="{{url('/shop')}}"
                    role="button">Continue to
                    Shopping</a>
            </p>
        </div>
    @endif



    </div>
    </div>
    </div>
    <!-- cart-area end -->
    <!-- start social-newsletter-section -->

@endsection

@section('footer_js')
    <script>
        $('#coupon_btn').click(function() {
            var coupon_name = $('#coupon_name').val();
            var current_url = "{{ url('/cart') }}";
            var link_to_go = current_url + '/' + coupon_name;
            window.location.href = link_to_go;
        });
    </script>
    <script>
        $('#coupon_button').click(function() {
            var coupon_name = $('#coupon_name').val();
            var current_url = "{{ url('/checkout') }}";
            var link_to_go = current_url + '/' + coupon_name;
            window.location.href = link_to_go;
        });
    </script>

@endsection
