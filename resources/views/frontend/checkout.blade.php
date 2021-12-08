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

    @auth()
        <div class="checkout-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4" style="background-color: #eee; padding-top:20px;  padding-bottom:20px;">
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


                        </div>

                    </div>

                    <div class="col-lg-8" style="padding-top:20px;">
                        <div class="checkout-form form-style">
                            <h3>Billing Details</h3>
                            <div class="row">
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong class="d-block d-sm-inline-block-force"></strong>{{ session('success') }}.
                                    </div><!-- alert -->
                                @endif
                                <div class="col-sm-12 col-12" id="myTab">
                                    <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                        <li class="nav-item"> <a data-toggle="pill" href="#ssl-payment"
                                                class="nav-link active"> <i class="fa fa-cc-visa mr-2"></i> SSL Payment
                                            </a> </li>
                                        <li class="nav-item"> <a data-toggle="pill" href="#stripe-payment"
                                                class="nav-link"> <i class="fa fa-credit-card mr-2"></i> Stripe
                                                Payment </a> </li>
                                        <li class="nav-item"> <a data-toggle="pill" href="#cashondelivery"
                                                class="nav-link"> <i class="fa fa-money mr-2"></i> Cash On
                                                Delivery </a> </li>
                                    </ul>
                                </div>
                                <div class="tab-content col-sm-12 col-12">
                                    <!-- ssl-payment info-->
                                    <div id="ssl-payment" class="tab-pane fade active show pt-3 order-area">
                                        <form action="{{ url('/pay') }}" method="POST">
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
                                                    <select name="s_country_id" id="country_select">
                                                        <option value="">-Select Your Country- </option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}">{{ $country->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('s_country_id')
                                                        <div style="margin-top:-25px;" class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-6 col-12">
                                                    <p>Town/City *</p>
                                                    <select name="s_city_id" id="city_select">
                                                        <option value="">-Select Your City- </option>
                                                    </select>
                                                    @error('s_city_id')
                                                        <div style="margin-top:-25px;" class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <p>Phone No. *</p>
                                                    <input value="{{ old('phone') }}" type="text" name="s_phone">
                                                    @error('s_phone')
                                                        <div style="margin-top:-25px;" class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <p>Postcode/ZIP</p>
                                                    <input value="{{ old('zip') }}" type="text" name="s_zip">
                                                    @error('s_zip')
                                                        <div style="margin-top:-25px;" class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-12">
                                                    <p>Your Address *</p>
                                                    <input value="{{ old('address') }}" type="text" name="s_address">
                                                    @error('s_address')
                                                        <div style="margin-top:-25px;" class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-12">
                                                    <p>Order Notes </p>
                                                    <textarea name="s_notes" id="notes"
                                                        placeholder="Notes about Your Order, e.g.Special Note for Delivery">{{ Request::old('notes') }}</textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" name="subtotal" value="{{ $total }}">
                                            <input type="hidden" name="discount"
                                                value="{{ ($total / 100) * $discount_from_cart }}">
                                            <input type="hidden" name="total"
                                                value="{{ $total - ($total / 100) * $discount_from_cart + $shiping_cost }}">
                                            @if ($in_stock == false || $total == 0)
                                                <button disabled style="background:#868e96"
                                                    onclick="window.location.href = '{{ url('/cart') }}';">Cart epmty/Out of
                                                    Stock</button>
                                            @else
                                                <button>SSL Order</button>
                                            @endif
                                        </form>
                                    </div>
                                    <!-- stripe-payment info-->
                                    <div id="stripe-payment" class="tab-pane fade pt-3 order-area">
                                        <form role="form" action="{{ route('stripe.post') }}" method="post"
                                            class="require-validation" data-cc-on-file="false"
                                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
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
                                                    <select name="c_country_id" id="country_select1">
                                                        <option value="">-Select Your Country- </option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}">{{ $country->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('c_country_id')
                                                        <div style="margin-top:-25px;" class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-6 col-12">
                                                    <p>Town/City *</p>
                                                    <select name="c_city_id" id="city_select1">
                                                        <option value="">-Select Your City- </option>
                                                    </select>
                                                    @error('c_city_id')
                                                        <div style="margin-top:-25px;" class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <p>Phone No. *</p>
                                                    <input value="{{ old('phone') }}" type="text" name="c_phone">
                                                    @error('c_phone')
                                                        <div style="margin-top:-25px;" class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <p>Postcode/ZIP</p>
                                                    <input value="{{ old('zip') }}" type="text" name="c_zip">
                                                    @error('c_zip')
                                                        <div style="margin-top:-25px;" class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-12">
                                                    <p>Your Address *</p>
                                                    <input value="{{ old('address') }}" type="text" name="c_address">
                                                    @error('c_address')
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

                                                <div class="col-12">
                                                    <br>
                                                    <h4>Card Information</h4>
                                                    <hr>
                                                </div>

                                                <div class='col-6 col-sm-6 form-group required'>
                                                    <label class='control-label'>Card Holder</label> <input name="card_holder"
                                                        class='form-control' size='4' type='text'>
                                                </div>

                                                <div class='col-6 col-sm-6 form-group required'>
                                                    <label class='control-label'>Card Number</label> <input name="card_number"
                                                        autocomplete='off' class='form-control card-number' size='20'
                                                        type='text'>
                                                </div>

                                                <div class='col-4 col-md-4 form-group cvc required' style="margin-top: -10px;">
                                                    <label class='control-label'>CVC</label> <input name="cvc"
                                                        autocomplete='off' class='form-control card-cvc' placeholder='ex. 311'
                                                        size='4' type='text'>
                                                </div>
                                                <div class='col-4 col-md-4 form-group expiration required'
                                                    style="margin-top: -10px;">
                                                    <label class='control-label'>Expiration Month</label> <input name="month"
                                                        class='form-control card-expiry-month' placeholder='MM' size='2'
                                                        type='text'>
                                                </div>
                                                <div class='col-4 col-md-4 form-group expiration required'
                                                    style="margin-top: -10px;">
                                                    <label class='control-label'>Expiration Year</label> <input name="year"
                                                        class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                                        type='text'>
                                                </div>

                                                <div class='col-12 error form-group d-none'>
                                                    <div class='alert-danger alert'>Please correct the errors and try
                                                        again.
                                                    </div>
                                                </div>
                                                @if (session('error'))
                                                    <div class='col-12 error form-group'>
                                                        <div class='alert-danger alert'>
                                                            {{ session('error') }}
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>


                                            <input type="hidden" name="subtotal" value="{{ $total }}">
                                            <input type="hidden" name="discount"
                                                value="{{ ($total / 100) * $discount_from_cart }}">
                                            <input type="hidden" name="total"
                                                value="{{ $total - ($total / 100) * $discount_from_cart + $shiping_cost }}">
                                            @if ($in_stock == false || $total == 0)
                                                <button disabled style="background:#868e96"
                                                    onclick="window.location.href = '{{ url('/cart') }}';">Cart epmty/Out of
                                                    Stock</button>
                                            @else
                                                <input type="hidden" name="coupon" value="{{ $coupon }}">
                                                <button type="submit">Stripe Order</button>
                                            @endif
                                        </form>
                                    </div>
                                    <!-- cash on Delivery -->
                                    <div id="cashondelivery" class="tab-pane fade pt-3 order-area">
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
                                                    <select name="country_id" id="country_select2">
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
                                                    <select name="city_id" id="city_select2">
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
                                            <input type="hidden" name="subtotal" value="{{ $total }}">
                                            <input type="hidden" name="discount"
                                                value="{{ ($total / 100) * $discount_from_cart }}">
                                            <input type="hidden" name="total"
                                                value="{{ $total - ($total / 100) * $discount_from_cart + $shiping_cost }}">
                                            @if ($in_stock == false || $total == 0)
                                                <button disabled style="background:#868e96"
                                                    onclick="window.location.href = '{{ url('/cart') }}';">Cart epmty/Out of
                                                    Stock</button>
                                            @else
                                                <button>Order Place</button>
                                            @endif
                                        </form>
                                    </div>
                                </div>
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
        $('#country_select1').change(function() {
            var country_id = $('#country_select1').val();
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
                    $('#city_select1').html(data);
                }

            });
        });
    </script>
    <script>
        $('#country_select2').change(function() {
            var country_id = $('#country_select2').val();
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
                    $('#city_select2').html(data);
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
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    // token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>




@endsection
