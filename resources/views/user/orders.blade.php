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
            background-color: #dfdfdf;
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

        .track {
            position: relative;
            background-color: #ddd;
            height: 7px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 60px;
            margin-top: 50px
        }

        .track .step {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            width: 25%;
            margin-top: -18px;
            text-align: center;
            position: relative
        }

        .track .step.active:before {
            background: #FF5722
        }

        .track .step::before {
            height: 7px;
            position: absolute;
            content: "";
            width: 100%;
            left: 0;
            top: 18px
        }

        .track .step.active .icon {
            background: #ee5435;
            color: #fff
        }

        .track .icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            position: relative;
            border-radius: 100%;
            background: #ddd
        }

        .track .step.active .text {
            font-weight: 400;
            color: #000
        }

        .track .text {
            display: block;
            margin-top: 7px
        }

        .itemside {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 100%
        }

        .itemside .aside {
            position: relative;
            -ms-flex-negative: 0;
            flex-shrink: 0
        }

        .img-sm {
            width: 80px;
            height: 80px;
            padding: 7px
        }

        ul.row,
        ul.row-sm {
            list-style: none;
            padding: 0
        }

        .itemside .info {
            padding-left: 15px;
            padding-right: 7px
        }

        .itemside .title {
            display: block;
            margin-bottom: 5px;
            color: #212529
        }

        .btn-cancel {
            color: #ffffff;
            background-color: #ee5435;
            border-color: #ee5435;
            border-radius: 1px
        }

        .btn-cancel:hover {
            color: #ffffff;
            background-color: #ff2b00;
            border-color: #ff2b00;
            border-radius: 1px
        }

        .btn-cancel {
            color: #ffffff;
            background-color: #ee5435;
            border-color: #ee5435;
            border-radius: 1px
        }

        .btn-cancel:hover {
            color: #ffffff;
            background-color: #ff2b00;
            border-color: #ff2b00;
            border-radius: 1px
        }

    </style>
@endsection

@section('content')

    @auth()
        <div class="fluid-container mt-5 mb-5">
            <div class="row">
                @include('user.nav')
                <div class="col-lg-9 my-lg-0 my-1">
                    <article class="card">
                        <header class="card-header"> My Orders / Tracking </header>

                        @if ($total_order == 0)
                            <div class="card-body">
                                You Have no order yet.
                            </div>
                        @else
                            @foreach ($orders as $order)
                                <div class="card-body" style="border-bottom: 2px solid red">
                                    <div class="row">
                                        <div class="col-3">
                                            <h6><strong>Order ID: {{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }} </strong>
                                            </h6>
                                            <span>
                                                <h6>Order Date: 10/12/2021</h6>
                                            </span>
                                            {{-- <h6>Discount: {{ $order->discount }}</h6> --}}
                                            <span>
                                                <h6>Amount: {{ $order->amount }}</h6>
                                            </span>
                                            <a target="_blank" href="{{url('/invoice/download/')}}/{{$order->id}}" class="btn btn-cancel" data-abc="true">Download Invoice</a>
                                        </div>

                                        <div class="col-9 text-right">
                                            @if ($order->status == 'Processing')
                                                @php
                                                    if ($order->track == null) {
                                                        $confirm = 'active';
                                                        $currier = false;
                                                        $ontheway = false;
                                                    } elseif ($order->track == 'currier') {
                                                        $confirm = 'active';
                                                        $currier = 'active';
                                                        $ontheway = false;
                                                    } elseif ($order->track == 'ontheway') {
                                                        $confirm = 'active';
                                                        $currier = 'active';
                                                        $ontheway = 'active';
                                                    }
                                                @endphp
                                                <div class="track">
                                                    <div class="step {{ $confirm }}"> <span class="icon"> <i
                                                                class="fa fa-check"></i>
                                                        </span> <span class="text">Order confirmed</span> </div>
                                                    <div class="step {{ $currier }} "> <span class="icon"> <i
                                                                class="fa fa-user"></i>
                                                        </span> <span class="text"> Picked by courier</span> </div>
                                                    <div class="step {{ $ontheway }}"> <span class="icon"> <i
                                                                class="fa fa-truck"></i>
                                                        </span> <span class="text"> On the way </span> </div>
                                                    <div class="step"> <span class="icon"> <i
                                                                class="fa fa-check"></i>
                                                        </span> <span class="text"> Ready for pickup </span> </div>
                                                </div>
                                            @elseif($order->status == 'Canceled')
                                                <a href="#" class="btn btn-cancel" data-abc="true">Payment Failed/Pay Now</a>
                                            @else
                                                <a href="#" class="btn btn-cancel" data-abc="true">Payment Pending</a>
                                            @endif
                                        </div>
                                    </div>



                                    <hr>
                                    <ul class="row">
                                        @foreach (App\Models\Product::find(App\Models\Order_Product_Details::where('order_id', $order->id)->get('product_id')) as $item)
                                            <li class="col-md-4">
                                                <figure class="itemside mb-3">
                                                    <div class="aside"><img
                                                            src="{{ asset('uploads/product') }}/{{ $item->product_photo }}"
                                                            class="img-sm border"></div>
                                                    <figcaption class="info align-self-center">
                                                        <p class="title">{{ $item->product_name }}</p> <span class="text-muted">৳{{$item->product_price }} x {{App\Models\Order_Product_Details::find(App\Models\Order_Product_Details::where('order_id', $order->id)->where('product_id', $item->id)->first()->id)->product_quantity}}</span>
                                                    </figcaption>
                                                </figure>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            @endforeach
                        @endif

                    </article>
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
