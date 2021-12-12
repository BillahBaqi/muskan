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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            font-family: 'Montserrat', sans-serif
        }



        .card {
            position: relative;
            background: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, .1)
        }

        small {
            font-size: 12px
        }

        .cart {
            line-height: 1
        }

        .icon {
            background-color: #eee;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%
        }

        .pic {
            width: 70px;
            height: 90px;
            border-radius: 5px
        }

        td {
            vertical-align: middle
        }

        .red {
            color: #fd1c1c;
            font-weight: 600
        }

        .b-bottom {
            border-bottom: 2px dotted black;
            padding-bottom: 20px
        }

        p {
            margin: 0px
        }

        table input {
            width: 40px;
            border: 1px solid #eee
        }

        input:focus {
            border: 1px solid #eee;
            outline: none
        }

        .round {
            background-color: #eee;
            height: 40px;
            width: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .unregistered {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #eee;
            text-transform: uppercase;
            font-size: 14px
        }

        input {
            width: 100%;
            margin-right: 20px
        }

        .sale {
            width: 100%;
            background-color: #e9b3b3;
            text-transform: uppercase;
            font-size: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 5PX 0
        }

        .red {
            color: #fd1c1c
        }

        .del {
            width: 35px;
            height: 35px;
            object-fit: cover
        }

        .delivery .card {
            padding: 10px 5px
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
            <div class="checkout-area ptb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 m-auto">
                        <div class="order-area">
                            <form action="{{route('pay')}}" method="post">
                            @csrf
                            <h3 class="text-center">Pay Online</h3>
                            
                            @if ($order_products->status == null)
                                <ul class="total-cost">
                                
                                    @foreach (App\Models\Product::find(App\Models\Order_Product_Details::where('order_id', $order_id)->get('product_id')) as $item)
                                        <li>{{ $item->product_name }} x {{App\Models\Order_Product_Details::find(App\Models\Order_Product_Details::where('order_id', $order_id)->where('product_id', $item->id)->first()->id)->product_quantity}} <span
                                                class="pull-right">৳{{$item->product_price * App\Models\Order_Product_Details::find(App\Models\Order_Product_Details::where('order_id', $order_id)->where('product_id', $item->id)->first()->id)->product_quantity }}</span>
                                        </li>
                                    @endforeach


                                    <li>Sub-total <span class="pull-right"><strong>৳{{ $order_products->sub_total }}</strong></span>
                                    </li>
                                    <li>Discount <span
                                            class="pull-right">৳{{ $order_products->discount }}</span></li>

                                    <li>Shipping <span class="pull-right">৳40</span></li>
                                    @php
                                        $shiping_cost = 40;
                                    @endphp
                                    

                                    <li>Total<span
                                            class="pull-right">৳{{ $order_products->amount }}</span>
                                    </li>
                                </ul>
                                 <input type="hidden" name="amount"
                                value="{{ $order_products->amount }}">
                            <input type="hidden" name="order_id"
                                value="{{ $order_id }}">
                            <button type="submit">Pay ৳{{$order_products->amount}}</button>
                            @else
                                <h5 class="text-center">Payment Allready Successfull</h5>
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
