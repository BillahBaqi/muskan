<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} | @yield('title')</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets') }}/images/favicon.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- select2 Js -->
    <!-- bootstrap v4.0.0-beta.2 css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/owl.carousel.min.css">
    <!-- font-awesome v4.6.3 css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/font-awesome.min.css">
    <!-- flaticon.css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/flaticon.css">
    <!-- jquery-ui.css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/jquery-ui.css">
    <!-- metisMenu.min.css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/metisMenu.min.css">
    <!-- swiper.min.css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/swiper.min.css">
    @yield('style')
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/styles.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/responsive.css">
    <!-- modernizr css -->
    <script src="{{ asset('assets') }}/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- TOSTER css -->


</head>

<body>
    <!--Start Preloader-->
    <div class="preloader-wrap">
        <div class="spinner"></div>
    </div>
    <!-- search-form here -->
    <div class="search-area flex-style">
        <span class="closebar">Close</span>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-12">
                    <div class="search-form">
                        <form action="#">
                            <input type="text" placeholder="Search Here...">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- search-form here -->
    <!-- header-area start -->
    <header class="header-area">
        <div class="header-top bg-2">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <ul class="d-flex header-contact">
                            <li><i class="fa fa-phone"></i> +88-01924-770104</li>
                            <li><i class="fa fa-envelope"></i> billahbaqi@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-12">
                        <ul class="d-flex account_login-area">
                            @auth
                                @if (Auth::user()->role === 'ADM')
                                <li>
                                    <a href="javascript:void(0);"><i class="fa fa-user"></i> My Account
                                        ({{ Auth::user()->name }})<i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="{{ url('/admin') }}">Dashboard</a></li>
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();"> logout
                                            </a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                                @elseif(Auth::user()->role === 'USR')
                                <li>
                                    <a href="javascript:void(0);"><i class="fa fa-user"></i> My Account
                                        ({{ Auth::user()->name }})<i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="{{ url('/account/user') }}">My Profile</a></li>
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();"> logout
                                            </a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                                @endif
                                
                            @else

                                <li><a href="{{ route('login') }}"> Login/Register </a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-lg-3 col-md-7 col-sm-6 col-6">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('dashboard/img/muskan-logo-front.PNG') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <nav class="mainmenu">
                            <ul class="d-flex">
                                <li class="@yield('Home')"><a href="{{ url('/') }}">Home</a></li>
                                <li>
                                    <a href="javascript:void(0);">Category <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        @foreach (App\Models\Category::all() as $category)
                                            <li><a value="{{ $category->category_id }}"
                                                    href="{{ url('/category') }}/{{ $category->category_name }}">{{ $category->category_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="@yield('shop')"><a href="{{ url('/shop') }}">Shop</a></li>

                                <li class="@yield('cart')"><a href="{{ url('/cart') }}">Cart</a></li>
                                <li><a href="about.html">About</a></li>
                                <li>
                                    <a href="javascript:void(0);">Blog <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="blog.html">blog Page</a></li>
                                        <li><a href="blog-details.html">blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-4 col-lg-2 col-sm-5 col-4">
                        <ul class="search-cart-wrapper d-flex">
                            <li class="search-tigger"><a href="javascript:void(0);"><i class="flaticon-search"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-like"></i>
                                    <span>{{ App\Models\Cart::where('random_generated_id', Cookie::get('cart_cookie'))->where('status', 2)->count() }}</span></a>
                                <ul class="cart-wrap dropdown_style">
                                    @php
                                        $sub_total = 0;
                                    @endphp
                                    <div style="overflow:auto; max-height:370px;">
                                        <form action="{{ url('/cart/markadd') }}" method="post">
                                            @csrf
                                            @foreach (App\Models\Cart::where('random_generated_id', Cookie::get('cart_cookie'))->where('status', 2)->get()
    as $cart)
                                                <li class="cart-items">
                                                    <div class="cart-img">
                                                        <img src="{{ asset('uploads/product') }}/{{ App\Models\Product::find($cart->product_id)->product_photo }}"
                                                            width="70" alt="">
                                                    </div>
                                                    <div class="cart-content">
                                                        <a
                                                            href="{{ url('/products/details') }}/{{ $cart->product_id }}">{{ App\Models\Product::find($cart->product_id)->product_name }}</a>
                                                        <span>QTY : {{ $cart->product_quantity }}</span>
                                                        <p>৳ {{ App\Models\Product::find($cart->product_id)->product_price * $cart->product_quantity }}
                                                        </p>
                                                        <a href="{{ url('cart/delete') }}/{{ $cart->id }}"><i
                                                                class="fa fa-times"></i></a>

                                                    </div>
                                                </li>
                                                <input type="hidden" name="mark_add_to_cart[]"
                                                    value="{{ $cart->id }}">
                                                @php
                                                    $sub_total = $sub_total + App\Models\Product::find($cart->product_id)->product_price * $cart->product_quantity;
                                                @endphp
                                            @endforeach
                                    </div>
                                    <li>Total: <span class="pull-right">৳ {{ $sub_total }}</span></li>
                                    <li>
                                        <button type="submit">Add to Cart</button>
                                    </li>
                                    </form>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-shop"></i>
                                    <span>{{ App\Models\Cart::where('random_generated_id', Cookie::get('cart_cookie'))->where('status', 1)->count() }}</span></a>
                                <ul class="cart-wrap dropdown_style">
                                    @php
                                        $sub_total = 0;
                                    @endphp
                                    <div style="overflow:auto; max-height:370px;">
                                        @foreach (App\Models\Cart::where('random_generated_id', Cookie::get('cart_cookie'))->where('status', 1)->get()
    as $cart)
                                            <li class="cart-items">
                                                <div class="cart-img">
                                                    <img src="{{ asset('uploads/product') }}/{{ App\Models\Product::find($cart->product_id)->product_photo }}"
                                                        width="70" alt="">
                                                </div>
                                                <div class="cart-content">
                                                    <a
                                                        href="{{ url('/products/details') }}/{{ $cart->product_id }}">{{ App\Models\Product::find($cart->product_id)->product_name }}</a>
                                                    <span>QTY : {{ $cart->product_quantity }}</span>
                                                    <p>৳ {{ App\Models\Product::find($cart->product_id)->product_price * $cart->product_quantity }}
                                                    </p>
                                                    <a href="{{ url('cart/delete') }}/{{ $cart->id }}"><i
                                                            class="fa fa-times"></i></a>
                                                </div>
                                            </li>
                                            @php
                                                $sub_total = $sub_total + App\Models\Product::find($cart->product_id)->product_price * $cart->product_quantity;
                                            @endphp
                                        @endforeach
                                    </div>
                                    <li>Total: <span class="pull-right">৳ {{ $sub_total }}</span></li>
                                    <li>
                                        <button onclick="window.location.href='{{ url('/cart') }}'">Check
                                            Out</button>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-1 col-sm-1 col-2 d-block d-lg-none">
                        <div class="responsive-menu-tigger">
                            <a href="javascript:void(0);">
                                <span class="first"></span>
                                <span class="second"></span>
                                <span class="third"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
            <div class="responsive-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-block d-lg-none">
                            <ul class="metismenu">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Category
                                    </a>
                                    <ul aria-expanded="false">
                                        @foreach (App\Models\Category::all() as $category)
                                            <li><a value="{{ $category->category_id }}"
                                                    href="{{ url('/category') }}/{{ $category->category_name }}">{{ $category->category_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{ url('/products/shop') }}">Shop</a></li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Pages
                                    </a>
                                    <ul aria-expanded="false">
                                        <li><a href="about.html">About Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Blog</a>
                                    <ul aria-expanded="false">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
        </div>
    </header>
    <!-- header-area end -->

    @yield('content')

    <!-- start social-newsletter-section -->
    <section class="social-newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter text-center">
                        <h3>Subscribe Newsletter</h3>
                        <div class="newsletter-form">
                            <form>
                                <input type="text" class="form-control" placeholder="Enter Your Email Address...">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end social-newsletter-section -->
    <!-- .footer-area start -->
    <div class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="footer-top-item">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="footer-top-text text-center">
                                <ul>
                                    <li><a href="home.html">home</a></li>
                                    <li><a href="#">our story</a></li>
                                    <li><a href="#">feed shop</a></li>
                                    <li><a href="blog.html">how to eat blog</a></li>
                                    <li><a href="contact.html">contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-12">
                        <div class="footer-icon">
                            <ul class="d-flex">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-12">
                        <div class="footer-content">
                            <p>On the other hand, we denounce with righteous indignation and dislike men who are so
                                beguiled and demoralized by the charms of pleasure righteous indignation and dislike</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-8 col-sm-12">
                        <div class="footer-adress">
                            <ul>
                                <li><a href="#"><span>Email:</span> domain@gmail.com</a></li>
                                <li><a href="#"><span>Tel:</span> 0131234567</a></li>
                                <li><a href="#"><span>Adress:</span> 52 Web Bangale , Adress line2 , ip:3105</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="footer-reserved">
                            <ul>
                                <li>Copyright © 2019 Tohoney All rights reserved.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .footer-area end -->

    <!-- jquery latest version -->
    <script src="{{ asset('assets') }}/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <script src="{{ asset('assets') }}/js/owl.carousel.min.js"></script>
    <!-- scrollup.js -->
    <script src="{{ asset('assets') }}/js/scrollup.js"></script>
    <!-- isotope.pkgd.min.js -->
    <script src="{{ asset('assets') }}/js/isotope.pkgd.min.js"></script>
    <!-- imagesloaded.pkgd.min.js -->
    <script src="{{ asset('assets') }}/js/imagesloaded.pkgd.min.js"></script>
    <!-- jquery.zoom.min.js -->
    <script src="{{ asset('assets') }}/js/jquery.zoom.min.js"></script>
    <!-- countdown.js -->
    <script src="{{ asset('assets') }}/js/countdown.js"></script>
    <!-- swiper.min.js -->
    <script src="{{ asset('assets') }}/js/swiper.min.js"></script>
    <!-- metisMenu.min.js -->
    <script src="{{ asset('assets') }}/js/metisMenu.min.js"></script>
    <!-- mailchimp.js -->
    <script src="{{ asset('assets') }}/js/mailchimp.js"></script>
    <!-- jquery-ui.min.js -->
    <script src="{{ asset('assets') }}/js/jquery-ui.min.js"></script>
    <!-- main js -->
    <script src="{{ asset('assets') }}/js/scripts.js"></script>
    <!-- main js -->

    @yield('footer_js')

</body>


<!-- Mirrored from themepresss.com/tf/html/tohoney/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Mar 2020 03:33:34 GMT -->

</html>
