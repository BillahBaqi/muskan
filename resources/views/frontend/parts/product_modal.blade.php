<!-- Modal area start -->
    <div class="modal fade" id="{{$modal_id}}">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body d-flex">
                    <div class="product-single-img w-50">
                        <img src="{{ asset('uploads/product') }}/{{ $product->product_photo }}" alt="">
                    </div>
                    <div class="product-single-content w-50">
                        <h3>{{ $product->product_name }}</h3>
                        <div class="rating-wrap fix">
                            <span class="pull-left">৳ {{ $product->product_price }}</span>
                            <ul class="rating pull-right">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li>(05 Customar Review)</li>
                            </ul>
                        </div>
                        <p>{{ $product->product_description }}</p>
                        <form action="{{ url('/cart/add') }}" method="POST">
                            @csrf
                            <input name="product_id" type="hidden" value="{{ $product->id }}" />
                            <ul class="input-style">
                                @if ($product->quantity > 0)
                                    <li class="quantity cart-plus-minus">
                                        <input name="product_quantity" type="text" value="1" />
                                    </li>
                                    <li>
                                        <button style=" height: 35px; line-height: 35px; text-align: center; width: 120px;
                                        background: #ef4836; color: #fff; display: block; margin-left: 30px; position: relative;
                                        right: 0; top: 0; font-size: 14px;" type="submit">Add to Cart</button>
                                    </li>

                                    

                                @else
                                    <div class="alert alert-warning text-center">Out of Stock</div>
                                @endif
                            </ul>
                        </form>
                        <ul class="cetagory">
                            <li>Categories:</li>
                            <li><a href="{{url('/category')}}/{{App\Models\Category::find($product->category_id)->category_name}}">{{ App\Models\Category::find($product->category_id)->category_name }}</a>, {{ App\Models\Subcategory::find($product->subcategory_id)->subcategory_name }}</li>
                            {{-- <li><a href="{{url('/category')}}/{{ App\Models\Category::find($product->category_id)->category_name }}">{{ App\Models\Category::find($product->category_id)->category_name }}</a>, {{ App\Models\Subcategory::find($product->subcategory_id)->subcategory_name }}</li> --}}
                        </ul>
                        <ul class="socil-icon">
                            <li>Share :</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal area start -->