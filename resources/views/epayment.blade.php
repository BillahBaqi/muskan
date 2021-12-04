@include('frontend.parts.epage')

{{-- body Start --}}

<body class="pop_up_mobile_device" data-spy="scroll" data-target=".js-scrollspy" data-new-gr-c-s-check-loaded="14.1040.0"
    data-gr-ext-installed="" cz-shortcut-listen="true">

    <header class="site-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <a href="/" class="site-header__logo mr-auto">
                        <img src="{{ asset('dashboard/img/muskan-logo-front.PNG') }}" alt="" width="220">
                    </a>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </header><!-- /.site-header -->

    {{-- <div class="hero-subheader cart_subheader">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="align-container" data-mh="">
                    <div class="align-inner">
                        
                        <h1 class="hero-subheader__title">Ecommerce Cart</h1>
                    </div><!-- /.align-inner -->
                </div><!-- /.align-container -->
            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.hero-subheader --> --}}

    <div class="section home_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p> </p>
                    <div class="content">
                        <div class="table-responsive">
                            <table class="table cart_table">
                                <thead>
                                    <tr>
                                        <th>#sl</th>
                                        <th>Product</th>
                                        <th>Available</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-right">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $in_stock = true;
                                        $total = 0;
                                    @endphp
                                    @foreach ($cart_products as $cart_product)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ App\Models\Product::find($cart_product->product_id)->product_name }}
                                            </td>
                                            <td>
                                                @if ($cart_product->product_quantity > App\Models\Product::find($cart_product->product_id)->quantity)
                                                    Out of Stock
                                                    @php
                                                        $in_stock = false;
                                                    @endphp
                                                @else
                                                    In Stock
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <input class="" type="text"
                                                    value="{{ $cart_product->product_quantity }}">
                                            </td>
                                            <td class="text-right">
                                                <span><span
                                                        class="single_amount">{{ App\Models\Product::find($cart_product->product_id)->product_price * $cart_product->product_quantity }}
                                                    </span> Taka</span>
                                            </td>

                                        </tr>
                                        @php
                                            $total = $total + App\Models\Product::find($cart_product->product_id)->product_price * $cart_product->product_quantity;
                                        @endphp
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                            </div>
                            <div class="col-md-5">
                                <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left">Subtotal</td>
                                                    <td class="text-right">
                                                        <span class="single_amount "><span
                                                                class="sub_total">{{ $total }}</span>
                                                            Taka</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">Discount</td>
                                                    <td class="text-right">
                                                        <span class="single_amount">{{ ($total / 100) * $discount }}
                                                            Taka</span>
                                                            <input type="hidden" name="discount" id="total_amount"
                                                            value="{{ ($total / 100) * $discount }}">
                                                    </td>
                                                </tr>

                                                @if ($total == 0)
                                                    <tr>
                                                        <td class="text-left">Shipping</td>
                                                        <td class="text-right">
                                                            <span class="single_amount">0 Taka</span>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $shiping_cost = 0;
                                                    @endphp
                                                @else
                                                    <tr>
                                                        <td class="text-left">Shipping</td>
                                                        <td class="text-right">
                                                            <span class="single_amount">40 Taka</span>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $shiping_cost = 40;
                                                    @endphp
                                                @endif

                                                <tr>
                                                    <td class="text-left">
                                                        <strong>Total</strong>
                                                    </td>
                                                    <td class="text-right grand_total">
                                                        <input type="hidden" name="total_amount" id="total_amount"
                                                            value="{{ $total - ($total / 100) * $discount + $shiping_cost }}">
                                                        <span class="single_amount "><span
                                                                class="total_amount1">{{ $total - ($total / 100) * $discount + $shiping_cost }}</span>
                                                            Taka</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control cus_phone" name="mobile_no" value=""
                                            placeholder="Mobile Number">
                                    </div>
                                    @error('mobile_no')
                                            <div style="margin-top:-25px;" class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    @if ($in_stock == false || $total == 0)
                                        <button class="btn btn-warning btn-lg btn-block" disabled>Cart epmty/Out of
                                            Stock</button>
                                    @else
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to
                                            checkout</button>
                                    @endif

                                </form>
                            </div>
                        </div>
                    </div><!-- /.content -->
                </div><!-- /.col -->
                <div class="col-md-4">
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.section -->

    <div class="js-footer-area">


        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="site-footer__copyright">© 2020 SSLCOMMERZ. All rights reserved.</p>

                    </div><!-- /.col -->

                    <div class="col-sm-6 align-right">
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container -->
        </footer><!-- /.site-footer -->


    </div><!-- /.js-footer-area -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>



    <script>
        var obj = {};
        obj.cus_phone = $('#cus_phone').val();
        obj.amount = $('#total_amount').val();


        $('#sslczPayBtn').prop('postdata', obj);

        (function(window, document) {
            var loader = function() {
                var script = document.createElement("script"),
                    tag = document.getElementsByTagName("script")[0];
                // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(
                    7); // USE THIS FOR SANDBOX
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload",
                loader);
        })(window, document);
    </script>


</body>
{{-- body End --}}

</html>
