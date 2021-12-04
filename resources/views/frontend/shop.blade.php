@extends('frontend.master')


@section('shop')
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
    <!-- product-area start -->
    <div class="product-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="product-menu">
                        <ul class="nav justify-content-center">
                            <li>
                                <a class="active" data-toggle="tab" href="#all">All product</a>
                            </li>
                            @foreach ($categories as $category)
                                <li>
                                    <a data-toggle="tab"
                                        href="#cat_{{ $category->id }}">{{ $category->category_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">

                <div class="tab-pane active" id="all">
                    <ul class="row">
                        @foreach ($products as $product)
                            @includeif('frontend.parts.product_list',
                            ['product'=>$product,'modal_id'=>'product'.$product->id])

                            @includeif('frontend.parts.product_modal',
                            ['product'=>$product,'modal_id'=>'product'.$product->id])
                        @endforeach
                        <li class="col-12 text-center">
                            <a class="loadmore-btn" href="javascript:void(0);">Load More</a>
                        </li>
                    </ul>
                </div>


                @foreach ($categories as $category)
                    <div class="tab-pane" id="cat_{{ $category->id }}">
                        <ul class="row">
                            @foreach ($category->rel_to_product_table as $category_product)
                                @includeif('frontend.parts.product_list',
                                ['product'=>$category_product,'modal_id'=>'category_product'.$category_product->id])
                                @includeif('frontend.parts.product_modal',
                                ['product'=>$category_product,'modal_id'=>'category_product'.$category_product->id])
                            @endforeach
                        </ul>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- product-area end -->
    <!-- start social-newsletter-section -->

@endsection

@section('footer_js')

@endsection
