@extends('frontend.master')


@section('shop')
    active
@endsection

@section('title')
    Best Care for Baby.
@endsection

@section('content')


    <!-- product-area start -->
            <div class="jumbotron text-center" style="margin-bottom: -1rem !important;">
                <h1 class="display-3">Thank You!</h1>
                <p class="lead"><strong>We received your purchase request;</strong> we'll be in touch shortly!</p>
                   
                <hr>
                {{-- <p>
                    Having trouble? <a href="#">Contact us</a>
                </p>
                <br> --}}
                <p class="lead">
                    <a class="btn btn-sm" style="color: #fff; background-color: #ef4836;" href="{{url('/shop')}}" role="button">Continue to
                        Shopping</a>
                </p>
            </div>
    <!-- product-area end -->
    <!-- start social-newsletter-section -->

@endsection

@section('footer_js')

@endsection
