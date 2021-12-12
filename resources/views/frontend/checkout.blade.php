@extends('frontend.master')


@section('cart')
    active
@endsection

@section('title')
    Best Care for Baby.
@endsection

@section('style')
    <style>
        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #ef4836;
        }

    </style>
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

    <!-- checkout-area start -->
    @auth()
        <div class="checkout-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-form form-style">
                            <h3>Billing Details</h3>
                            <form action="{{ url('/order') }}" method="POST">
                                            @csrf
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <p>Full Name *</p>
                                        <input readonly type="text" value="{{ Auth::user()->name }}">
                                    </div>

                                    <div class="col-sm-6 col-12">
                                        <p>Email Address *</p>
                                        <input readonly type="email" value="{{ Auth::user()->email }}">
                                    </div>

                                    <div class="col-sm-6 col-12">
                                        <p>Country *</p>
                                        <select name="country_id" id="country_select">
                                            <option value="">-Select Your Country- </option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('country_id')
                                            <div style="margin-top:-25px;" class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6 col-12">
                                        <p>Town/City *</p>
                                        <select name="city_id" id="city_select">
                                            <option value="">-Select Your City- </option>
                                        </select>
                                        @error('city_id')
                                            <div style="margin-top:-25px;" class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <p>Phone No. *</p>
                                        <input value="{{ old('phone') }}" type="text" name="phone">
                                        @error('phone')
                                            <div style="margin-top:-25px;" class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <p>Postcode/ZIP</p>
                                        <input value="{{ old('zip') }}" type="text" name="zip">
                                        @error('zip')
                                            <div style="margin-top:-25px;" class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <p>Your Address *</p>
                                        <input value="{{ old('address') }}" type="text" name="address">
                                        @error('address')
                                            <div style="margin-top:-25px;" class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <p>Order Notes </p>
                                        <textarea name="notes" id="notes"
                                            placeholder="Notes about Your Order, e.g.Special Note for Delivery">{{ Request::old('notes') }}</textarea>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="order-area">
                            <h3>Your Order</h3>
                            <ul class="total-cost">
                                @php
                                    $in_stock = true;
                                    $total = 0;
                                @endphp

                                @foreach ($cart_products as $cart_product)
                                    <li>{{ App\Models\Product::find($cart_product->product_id)->product_name }} <span
                                            class="pull-right">৳{{ App\Models\Product::find($cart_product->product_id)->product_price * $cart_product->product_quantity }}</span>

                                        @if ($cart_product->product_quantity > App\Models\Product::find($cart_product->product_id)->quantity)
                                            <span class="badge badge-warning">Stock Out</span>
                                            @php
                                                $in_stock = false;
                                            @endphp
                                        @endif
                                    </li>
                                    @php
                                        $total = $total + App\Models\Product::find($cart_product->product_id)->product_price * $cart_product->product_quantity;
                                    @endphp



                                @endforeach


                                <li>Sub-total <span class="pull-right"><strong>৳{{ $total }}</strong></span>
                                </li>
                                <li>Discount(%) <span
                                        class="pull-right">৳{{ ($total / 100) * $discount_from_cart }}</span></li>

                                @if ($total == 0)
                                    <li>Shipping <span class="pull-right">৳0</span></li>
                                    @php
                                        $shiping_cost = 0;
                                    @endphp
                                @else
                                    <li>Shipping <span class="pull-right">৳40</span></li>
                                    @php
                                        $shiping_cost = 40;
                                    @endphp
                                @endif

                                <li>Total<span
                                        class="pull-right">৳{{ $total - ($total / 100) * $discount_from_cart + $shiping_cost }}</span>
                                </li>
                            </ul>
                            <ul class="payment-method check">
                                <li>
                                    <input id="bank" type="checkbox" name="payment_method" id="radio" value="1">
                                    <label for="bank">Cash on Delivery</label>
                                </li>
                                <li>
                                    <input id="paypal" type="checkbox" name="payment_method" id="radio" value="2">
                                    <label for="paypal">Ssl Commarz</label>
                                </li>
                                <li>
                                    <input id="card" type="checkbox" name="payment_method" id="radio" value="3">
                                    <label for="card">Visa Card</label>
                                </li>
                            </ul>
                            <input type="hidden" name="subtotal" value="{{ $total }}">
                            <input type="hidden" name="discount" value="{{ ($total / 100) * $discount_from_cart }}">
                            <input type="hidden" name="total"
                                value="{{ $total - ($total / 100) * $discount_from_cart + $shiping_cost }}">
                            @if ($in_stock == false || $total == 0)
                                <button disabled style="background:#868e96"
                                    onclick="window.location.href = '{{ url('/cart') }}';">Cart epmty/Out of
                                    Stock</button>
                            @else
                                <button type="submit">Order Place</button>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    @else
        @include('auth.login')
    @endauth
    <!-- checkout-area end -->

    <!-- start social-newsletter-section -->

@endsection

@section('footer_js')
    <script>
        $('#country_select').change(function() {
            var country_id = $('#country_select').val();
            var coupon_name = $('#coupon_name').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ url('/getcitylist') }}",
                data: {
                    country_id: country_id
                },
                success: function(data) {
                    $('#city_select').html(data);
                }

            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('a[data-toggle="pill"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#myTab a[href="' + activeTab + '"]').tab('show');
            }
        });
    </script>
    <script>
        $('#country_select').change(function() {
            var country_id = $('#country_select').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: 'getcitylist',
                data: {
                    country_id: country_id
                },
                success: function(data) {
                    $('#city_select').html(data);
                }

            });
        });
    </script>
    <script>
        $('.check input:checkbox').click(function() {
            $('.check input:checkbox').not(this).prop('checked', false);
        });     
    </script>
@endsection
