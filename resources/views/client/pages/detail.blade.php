@extends('app')

@section('content')
<div class="cart_succsess">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <script>
        // Tự động ẩn thông báo sau 3 giây
        setTimeout(function() {
            var alert = document.querySelector('.alert');
            if (alert) {
                alert.style.transition = 'opacity 0.6s';
                alert.style.opacity = '0';
                setTimeout(function() {
                    alert.remove();
                }, 600);
            }
        }, 3000);
    </script>

</div>
<div class="product_details mt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="#">
                            <img id="zoom1" src="{{ filter_var($product->image_url, FILTER_VALIDATE_URL) ? $product->image_url : asset('assets/img/product/' . $product->image_url) }}"
                                 data-zoom-image="{{ filter_var($product->image_url, FILTER_VALIDATE_URL) ? $product->image_url : asset('assets/img/product/' . $product->image_url) }}" alt="big-1">
                        </a>
                    </div>
                    <div class="single-zoom-thumb">
                        <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                            @forelse($product->images ?? [] as $image)
                                <li>
                                    <a href="#" class="elevatezoom-gallery" data-image="{{ filter_var($image->url, FILTER_VALIDATE_URL) ? $image->url : asset('assets/img/product/' . $image->url) }}"
                                       data-zoom-image="{{ filter_var($image->url, FILTER_VALIDATE_URL) ? $image->url : asset('assets/img/product/' . $image->url) }}">
                                        <img src="{{ filter_var($image->url, FILTER_VALIDATE_URL) ? $image->url : asset('assets/img/product/' . $image->url) }}" alt="zo-th-1" />
                                    </a>
                                </li>
                            @empty
                                <p>No images available for this product.</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="product_d_right">
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <h1>{{ $product->name }}</h1>
                        <div class="product_nav">
                            <ul>
                                <li class="prev"><a href="{{ route('products.index') }}"><i class="fa fa-angle-left"></i></a></li>
                                <li class="next"><a href="{{ route('products.index') }}"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div>

                        <div class="product_ratting">
                            <ul>
                                @for ($i = 1; $i <= 5; $i++)
                                    <li>
                                        <i class="fa {{ $i <= round($averageRating) ? 'fa-star' : 'fa-star-o' }}"></i>
                                    </li>
                                @endfor
                            </ul>
                            <span>Average Rating: {{ round($averageRating, 1) }} stars</span>
                        </div>
                        <style>
                            .fa-star {
                                color: gold;
                            }
                            .fa-star-o {
                                color: #d3d3d3;
                            }
                        </style>

                        <div class="price_box">
                            <span class="current_price">${{ number_format($product->price, 2) }}</span>
                            @if($product->old_price)
                                <span class="old_price">${{ number_format($product->old_price, 2) }}</span>
                            @endif
                        </div>

                        <div class="product_desc">
                            <p>{{ $product->description }}</p>
                        </div>

                        <div class="product_variant color">
                            <h3>Available Options</h3>
                            <label>Color</label>
                            <ul>
                                @if($product->colors && $product->colors->isNotEmpty())
                                    @foreach($product->colors as $color)
                                        <li class="color{{ $loop->index + 1 }}">
                                            <a href="#" style="background-color: {{ $color->hex_code }}"></a>
                                        </li>
                                    @endforeach
                                @else
                                    <p>No colors available for this product.</p>
                                @endif
                            </ul>
                        </div>

                        <div class="product_variant quantity">
                            <label>Quantity</label>
                            <input min="1" max="100" value="1" type="number" name="quantity">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <button class="button" type="submit" title="Add to Cart">
                                <span class="lnr lnr-cart"></span> Add to Cart
                            </button>
                        </div>

                        <div class="product_d_action">
                            <ul>
                                <li><a href="#" title="Add to wishlist">+ Add to Wishlist</a></li>
                                <li><a href="#" title="Compare">+ Compare</a></li>
                            </ul>
                        </div>

                        <div class="product_meta">
                            @if($product->category)
                                Category: <a href="{{ route('category.show', $product->category->id) }}">{{ $product->category->name }}</a>
                            @else
                                No category assigned
                            @endif
                        </div>
                    </form>

                    <div class="priduct_social">
                        <ul>
                            <li><a class="facebook" href="#" title="Facebook"><i class="fa fa-facebook"></i> Like</a></li>
                            <li><a class="twitter" href="#" title="Twitter"><i class="fa fa-twitter"></i> Tweet</a></li>
                            <li><a class="pinterest" href="#" title="Pinterest"><i class="fa fa-pinterest"></i> Save</a></li>
                            <li><a class="google-plus" href="#" title="Google Plus"><i class="fa fa-google-plus"></i> Share</a></li>
                            <li><a class="linkedin" href="#" title="LinkedIn"><i class="fa fa-linkedin"></i> Linked</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
