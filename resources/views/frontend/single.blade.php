@extends('frontend.master')

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
                        <h2>Product Page</h2>
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>Products</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- single-product-area start-->
    <div class="single-product-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-single-img">
                        <div class="product-active owl-carousel">
                            <div class="item">
                                <img src="{{ asset('uploads/product') }}/{{ $product_details->product_photo }}" alt="">
                            </div>

                            @foreach ($thumbnails as $thumbnail)
                                <div class="item">
                                    <img src="{{ asset('uploads/product/thumbnails') }}/{{ $thumbnail->product_thumbnail }}"
                                        alt="">
                                </div>
                            @endforeach

                        </div>

                        <div class="product-thumbnil-active  owl-carousel">
                            <div class="item">
                                <img src="{{ asset('uploads/product') }}/{{ $product_details->product_photo }}" alt="">
                            </div>

                            @foreach ($thumbnails as $thumbnail)
                                <div class="item">
                                    <img src="{{ asset('uploads/product/thumbnails') }}/{{ $thumbnail->product_thumbnail }}"
                                        alt="">
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-single-content">
                        <h3>{{ $product_details->product_name }}</h3>
                        <div class="rating-wrap fix">
                            <span class="pull-left">??? {{ $product_details->product_price }}</span>
                            @php
                                $total_star = App\Models\Order_Product_Details::where('product_id', $product_details->id)->whereNotNull('star')->sum('star');
                                if ($total_star > 0) {
                                    $rating = App\Models\Order_Product_Details::where('product_id', $product_details->id)->whereNotNull('star')->sum('star')/App\Models\Order_Product_Details::where('product_id', $product_details->id)->whereNotNull('star')->count();
                                }
                                else {
                                   $rating = 0;
                                }
                            @endphp
                            <ul class="rating pull-right">
                                @foreach(range(1,5) as $i)
                                    @if($rating >0)
                                        @if($rating >0.5)
                                            <li><i class="fa fa-star"></i></li>
                                        @else
                                            <li><i class="fa fa-star-half-o"></i></li>
                                        @endif
                                    @else
                                        <li><i class="fa fa-star-o"></i></li>
                                    @endif
                                    <?php $rating--; ?>
                                @endforeach
                                
                                <li>({{str_pad(App\Models\Order_Product_Details::where('product_id', $product_details->id)->whereNotNull('star')->count(), 3, '0', STR_PAD_LEFT)}} Customar Review)</li>
                            </ul>
                        </div>
                        <p>{{ $product_details->product_description }}</p>
                        <form id="cartform" action="{{ url('/cart/add') }}" method="POST">
                            @csrf
                            <input name="product_id" type="hidden" value="{{ $product_details->id }}" />
                            <ul class="input-style">
                                @if ($product_details->quantity > 0)
                                    <li class="quantity cart-plus-minus">
                                        <input name="product_quantity" type="text" value="1" />
                                    </li>
                                    <li><a href="#" onclick="document.getElementById('cartform').submit()" name="cart"
                                            value="cart">Add to Cart</a></li>
                                @else
                                    <div class="alert alert-warning text-center">Out of Stock</div>
                                @endif
                            </ul>
                        </form>

                        <ul class="cetagory">
                            <li>Categories:</li>
                            <li><a
                                    href="{{ url('/category') }}/{{ App\Models\Category::find($product_details->category_id)->category_name }}">{{ App\Models\Category::find($product_details->category_id)->category_name }}</a>,
                                {{ App\Models\Subcategory::find($product_details->subcategory_id)->subcategory_name }}
                            </li>
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
            <div class="row mt-60">
                <div class="col-12">
                    <div class="single-product-menu">
                        <ul class="nav">
                            <li><a class="active" data-toggle="tab" href="#description">Description</a> </li>
                            <li><a data-toggle="tab" href="#tag">Faq</a></li>
                            <li><a data-toggle="tab" href="#review">Review</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="tab-content">
                        <div class="tab-pane active" id="description">
                            <div class="description-wrap">
                                <p>we denounce with righteous indignation and dislike men who are so beguiled and
                                    demoralized by the charms of pleasure of the moment, so blinded by desire, that they
                                    cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to
                                    those who fail in their duty through weakness of will, which is the same as saying
                                    through shrinking from toil and pain. </p>
                                <p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power
                                    of choice is untrammelled and when nothing prevents our being able to do what we like
                                    best, every pleasure is to be welcomed and every pain avoided. </p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tag">
                            <div class="faq-wrap" id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5><button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">General Inquiries ?</button> </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                            brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                            sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                            cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                            Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                            you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5><button class="collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">How To Use ?</button></h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                            brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                            sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                            cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                            Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                            you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5><button class="collapsed" data-toggle="collapse"
                                                data-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">Shipping & Delivery ?</button></h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                            brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                            sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                            cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                            Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                            you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingfour">
                                        <h5><button class="collapsed" data-toggle="collapse"
                                                data-target="#collapsefour" aria-expanded="false"
                                                aria-controls="collapsefour">Additional Information ?</button></h5>
                                    </div>
                                    <div id="collapsefour" class="collapse" aria-labelledby="headingfour"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                            brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                            sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                            cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                            Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                            you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingfive">
                                        <h5><button class="collapsed" data-toggle="collapse"
                                                data-target="#collapsefive" aria-expanded="false"
                                                aria-controls="collapsefive">Return Policy ?</button></h5>
                                    </div>
                                    <div id="collapsefive" class="collapse" aria-labelledby="headingfive"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                            brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                            sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                            cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                            Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                            you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="review">
                            <div class="review-wrap">
                                @if ($total_star === 0)
                                    No review Yet
                                    @else
                                    <ul>
                                        
                                        @foreach (App\Models\Order_Product_details::where('product_id', $product_details->id)->whereNotNull('review')->get() as $review)
                                        <li class="review-items">
                                            <div class="review-img">
                                                <img style="width:90px; border-radius: 50%;" src="{{ asset('uploads') }}/profile/{{App\Models\User::where('id', $review->user_id)->first()->profile_image}}" alt="img">
                                            </div>
                                            <div class="review-content">
                                                <h3><a href="#">{{App\Models\User::where('id', $review->user_id)->first()->name}}</a></h3>
                                                <span>{{$review->updated_at->format('d-M-Y h:iA')}}</span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan
                                                    egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget
                                                    eni Praesent et messages in con sectetur posuere dolor non.</p>
                                                <ul class="rating">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                            </div>
                            @auth
                                @if (App\Models\Order_Product_details::where('user_id', Auth::id())->where('product_id', $product_details->id)->exists())
                                    @if (App\Models\Order_Product_details::where('user_id', Auth::id())->where('product_id', $product_details->id)->whereNull('review')->exists())
                                        <div class="add-review">
                                            <form action="{{ route('review') }}" method="post">
                                                @csrf
                                                <h4>Add A Review</h4>
                                                <div class="ratting-wrap">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th>task</th>
                                                                <th>1 Star</th>
                                                                <th>2 Star</th>
                                                                <th>3 Star</th>
                                                                <th>4 Star</th>
                                                                <th>5 Star</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>How Many Stars?</td>
                                                                <td>
                                                                    <input type="radio" value="1" name="star" />
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="2" name="star" />
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="3" name="star" />
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="4" name="star" />
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="5" name="star" />
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <h4>Name:</h4>
                                                        <input readonly type="text" value="{{ Auth::user()->name }}" />
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <h4>Email:</h4>
                                                        <input type="email" value="{{ Auth::user()->email }}" />
                                                    </div>
                                                    <div class="col-12">
                                                        <h4>Your Review:</h4>
                                                        <textarea name="massage" id="massage" cols="30" rows="10"
                                                            placeholder="Your review here..."></textarea>
                                                    </div>
                                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}" />
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $product_details->id }}" />

                                                    <div class="col-12">
                                                        <button type="submit" class="btn-style">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @else
                                        <div class="row">
                                            <a class="col-12"
                                                style="height: 35px; line-height: 35px; text-align: center; background: #ef4836; color: #fff;">You
                                                Already review This product</a>
                                        </div>
                                    @endif
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single-product-area end-->
    <!-- featured-product-area start -->
    <div class="featured-product-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-left">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($related_product as $product)
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="featured-product-wrap">
                            <div class="featured-product-img">
                                <img src="{{ asset('uploads/product') }}/{{ $product->product_photo }}" alt="">
                            </div>
                            <div class="featured-product-content">
                                <div class="row">
                                    <div class="col-7">
                                        <h3><a
                                                href="{{ url('/products/details') }}/{{ $product->id }}">{{ $product->product_name }}</a>
                                        </h3>
                                        <p>??? {{ $product->product_price }}</p>
                                    </div>
                                    <div class="col-5 text-right">
                                        <ul>
                                            <li><a href="{{ url('/cart/addtocart') }}/{{ $product->id }}" <i
                                                    class="fa fa-shopping-cart"></i></a></li>
                                            <li><a href="{{ url('/cart/addtowish') }}/{{ $product->id }}" <i
                                                    class="fa fa-heart"></i></a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- featured-product-area end -->

@endsection

@section('footer_js')

@endsection
