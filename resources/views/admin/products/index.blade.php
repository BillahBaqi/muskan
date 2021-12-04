@extends('layouts.app')
@section('products')
    active
@endsection
@section('product-list')
    active
@endsection
@section('title')
    Products
@endsection

@section('content')
    @include('layouts.nav')
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" target="_blank" href="{{ url('/') }}">Muskan</a>
                <a class="breadcrumb-item" href="{{ url('/admin') }}">Dashboard</a>
                <span class="breadcrumb-item active">Products</span>
            </nav>
        </div>
        <div class="pd-x-30 pd-t-30">
            <h4 class="tx-gray-800 mg-b-5">Muskan Dashboard</h4>
            <p class="mg-b-0">Built on Service, and Focused on Style.</p>
        </div><!-- d-flex -->



        <div class="d-flex align-items-center justify-content-start pd-x-20 pd-sm-x-30 pd-t-25 mg-b-20 mg-sm-b-30">

            <button id="showSubLeft" class="btn btn-secondary mg-r-10 hidden-lg-up"><i class="fa fa-navicon"></i></button>

            <div class="text-info" style="padding-top: 20px;">
                Total Products- {{ $total_products }}
            </div><!-- btn-group -->

            <div class="mg-l-auto">
                <a href="{{ url('/admin/products-add') }}" class="btn btn-info"><span><i class="fa fa-plus"></i></span>
                    Add New</a>
            </div>
        </div>

        <div class="br-pagebody pd-x-20 pd-sm-x-30">
            @if (session('product_success'))
                <div class="alert alert-bordered alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {{ session('product_success') }}
                </div>
            @endif
            <div class="card bd-0">
                <table class="table mg-b-0 table-contact">
                    <thead class="thead-info">
                        <tr>
                            {{-- <th style="padding: 20px; border-bottom:10px solid rgb(233 236 239); color :white;"
                                class="wd-5p">
                                <label class="ckbox mg-b-0">
                                    <input type="checkbox"><span></span>
                                </label>
                            </th> --}}
                            <th style="padding: 20px; border-bottom:10px solid rgb(233 236 239); color :white;"
                                class="tx-12 wd-5p">SL</th>
                            <th style="padding: 20px; border-bottom:10px solid rgb(233 236 239); color :white;"
                                class="tx-12 wd-10p">Thumb.</th>
                            <th style="padding: 20px; border-bottom:10px solid rgb(233 236 239); color :white;"
                                class="tx-12 wd-35p">Product</th>
                            <th style="padding: 20px; border-bottom:10px solid rgb(233 236 239); color :white;"
                                class="tx-12">
                                Category</th>
                            <th style="padding: 20px; border-bottom:10px solid rgb(233 236 239); color :white;"
                                class="tx-12">
                                S.Category</th>
                            <th style="padding: 20px; border-bottom:10px solid rgb(233 236 239); color :white;"
                                class="tx-12">Quantity</th>
                            <th style="padding: 20px; border-bottom:10px solid rgb(233 236 239); color :white;"
                                class="tx-12 wd-10p">Price</th>
                            <th style="padding: 20px; border-bottom:10px solid rgb(233 236 239); color :white;"
                                class="tx-12">Status</th>
                            <th style="padding: 20px; border-bottom:10px solid rgb(233 236 239); color :white;"
                                class="tx-12 wd-20p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index => $product)
                            <tr>
                                {{-- <td style="padding: 20px; border:none; border-bottom: 10px solid rgb(233 236 239);"
                                    class="valign-middle">
                                    <label class="ckbox mg-b-0">
                                        <input type="checkbox"><span></span>
                                    </label>
                                </td> --}}
                                <td style="padding: 20px; border:none; border-bottom: 10px solid rgb(233 236 239);"
                                    class="valign-middle">{{ $products->firstitem() + $index }}</td>
                                <td style="padding: 20px; border:none; border-bottom: 10px solid rgb(233 236 239);"
                                    class="valign-middle">
                                    <img class="wd-80"
                                        src="{{ asset('uploads/product') }}/{{ $product->product_photo }}" alt="">
                                </td>
                                <td style="padding: 20px; border:none; border-bottom: 10px solid rgb(233 236 239);"
                                    class="valign-middle">

                                    <div class="font-weight-bold pd-b-2">{{ $product->product_name }}</div>
                                    <span class="tx-12">{{substr($product->product_description, 0, 60)  }} ...</span>

                                </td>
                                <td style="padding: 20px; border:none; border-bottom: 10px solid rgb(233 236 239);"
                                    class="valign-middle">
                                    {{ App\Models\Category::find($product->category_id)->category_name ?? 'N/A'}}</td>
                                <td style="padding: 20px; border:none; border-bottom: 10px solid rgb(233 236 239);"
                                    class="valign-middle">
                                    {{ App\Models\Subcategory::find($product->subcategory_id)->subcategory_name ?? 'N/A'}}</td>
                                <td style="padding: 20px; border:none; border-bottom: 10px solid rgb(233 236 239);"
                                    class="valign-middle">{{ $product->quantity }}</td>
                                <td style="padding: 20px; border:none; border-bottom: 10px solid rgb(233 236 239);"
                                    class="valign-middle">৳ {{ $product->product_price }}</td>
                                <td style="padding: 20px; border:none; border-bottom: 10px solid rgb(233 236 239);"
                                    class="valign-middle">
                                    <a href="" class="btn btn-warning">Draft</a>
                                </td>
                                <td style="padding: 20px; border:none; border-bottom: 10px solid rgb(233 236 239);"
                                    class="valign-middle">
                                    <a href="{{ url('/admin/products/edit') }}/{{ $product->id }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="{{ url('/admin/products/delete') }}/{{ $product->id }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>                
            </div>
            {{ $products->links() }}
        </div>
        <footer class="br-footer">
            <div class="footer-left">
                <div class="mg-b-2">Copyright &copy; 2021. Bracket. All Rights Reserved.</div>
                <div>Attentively and carefully made by ThemePixels.</div>
            </div>
            <div class="footer-right d-flex align-items-center">
                <span class="tx-uppercase mg-r-10">Share:</span>
                <a target="_blank" class="pd-x-5" href="https://www.facebook.com/billahbaqi"><i
                        class="fa fa-facebook tx-20"></i></a>
                <a target="_blank" class="pd-x-5" href="https://twitter.com/mdbaqibillah"><i
                        class="fa fa-twitter tx-20"></i></a>
            </div>
        </footer>
    </div><!-- br-mainpanel -->

@endsection
