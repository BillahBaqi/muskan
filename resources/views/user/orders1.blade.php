@extends('frontend.master')


@section('orders')
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
                        
                        <div class="d-flex flex-column" style="margin-top: -30px;">
                            <div class="h5 my-3">My Orders</div>
                            
                            <table class="table-responsive cart-wrap">
                                {{-- <thead class="mb-2">
                                    <tr>
                                        <th style="border-bottom:10px solid white; width:1%" class="product">#</th>
                                        <th style="border-bottom:10px solid white;" class="ptice">Order ID</th>
                                        <th style="border-bottom:10px solid white;" class="quantity">Total</th>
                                        <th style="border-bottom:10px solid white;" class="total">Status</th>
                                        <th style="border-bottom:10px solid white;" class="remove">Invoice</th>
                                        <th style="border-bottom:10px solid white;" class="remove">Details</th>
                                    </tr>
                                </thead> --}}
                                <tbody>
                                    @foreach ($orders as $order)                                    
                                    <tr style="background: rgb(221, 220, 220);">

                                        <td style="padding: 20px; border:none; border-bottom: 10px solid rgb(255, 255, 255);"
                                            class="valign-middle">#1
                                        </td>
                                        <td style="padding: 20px; border:none; border-bottom: 10px solid rgb(255, 255, 255);"
                                            class="valign-middle">
                                            <div class="font-weight-bold pd-b-2">ORDER_ID: {{str_pad($order->id, 5, '0', STR_PAD_LEFT)}}</div>
                                        </td>
                                        <td style="padding: 20px; border:none; border-bottom: 10px solid rgb(255, 255, 255);"
                                            class="valign-middle">Dicount: {{$order->discount}}
                                        </td>
                                        <td style="padding: 20px; border:none; border-bottom: 10px solid rgb(255, 255, 255);"
                                            class="valign-middle">Amount: {{$order->amount}}
                                        </td>
                                        @if ($order->status == 'Processing')
                                            <td style="padding: 20px; border:none; border-bottom: 10px solid rgb(255, 255, 255);"
                                                class="valign-middle">
                                                Status: Paid
                                            </td>
                                        @elseif($order->status == 'Faild')
                                            <td style="padding: 20px; border:none; border-bottom: 10px solid rgb(255, 255, 255);"
                                                class="valign-middle">
                                                Status: Faild
                                            </td>  
                                        @else
                                            <td style="padding: 20px; border:none; border-bottom: 10px solid rgb(255, 255, 255);"
                                                class="valign-middle">
                                                Status: Pending
                                            </td>                                        
                                        @endif
                                        
                                        <td style="padding: 20px; border:none; border-bottom: 10px solid rgb(255, 255, 255);"
                                            class="valign-middle">
                                            <a href="">Invoice <i class="fa fa-download text-danger" aria-hidden="true"></i></a>
                                        </td>
                                        <td style="padding: 20px; border:none; border-bottom: 10px solid rgb(255, 255, 255);"
                                            class="valign-middle">
                                            <a href="">Details <span><i class="fa fa-angle-double-right"></i></span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    {{-- <tr>
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
                                    </tr> --}}

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
