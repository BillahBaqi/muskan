@extends('frontend.master')


@section('my-account')
    active
@endsection

@section('title')
    Best Care for Baby.
@endsection

@section('style')

@endsection

@section('content')

    @auth()
        <div class="checkout-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4" style="background-color: #eee; padding-top:20px;  padding-bottom:20px;">
                        <div class="order-area">
                            <h3>Your Order</h3>
                            <ul class="">
                                <li><a href="/account/user">Dashboard</a>
                                </li>
                                <li><a href="/account/user/order">My Order</a>
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
