@extends('frontend.master')

@section('category')
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
                        <h2>Catrgory Page</h2>
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>Category</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->


    <!-- product-area start -->
    <div class="product-area">
        <div class="fluid-container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{ $active_category }} Product</h2>
                        <img src="{{ asset('assets') }}/images/section-title.png" alt="">
                    </div>
                </div>
            </div>
            <ul class="row">
                @foreach ($products as $product)
                    @includeif('frontend.parts.product_list',
                    ['product'=>$product,'modal_id'=>'product'.$product->id])
                    @includeif('frontend.parts.product_modal',
                    ['product'=>$product,'modal_id'=>'product'.$product->id]) @endforeach
                <li class="col-12 text-center">
                    <a class="loadmore-btn" href="javascript:void(0);">Load More</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- product-area end -->

@endsection

@section('footer_js')

@endsection
