@extends('app')

@section('content')
<div class="product_details mt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="#">
                            <img id="zoom1" src="{{ asset('assets/img/product/' . $product->image_url) }}" 
                                 data-zoom-image="{{ asset('assets/img/product/' . $product->image_url) }}" alt="big-1">
                        </a>
                    </div>
                    <div class="single-zoom-thumb">
                        <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                            @forelse($product->images ?? [] as $image)
                                <li>
                                    <a href="#" class="elevatezoom-gallery" data-image="{{ asset('assets/img/product/' . $image->url) }}"
                                    data-zoom-image="{{ asset('assets/img/product/' . $image->url) }}">
                                        <img src="{{ asset('assets/img/product/' . $image->url) }}" alt="zo-th-1" />
                                    </a>
                                </li>
                            @empty
                                <p>No images available for this product.</p> <!-- Bạn có thể hiển thị thông báo nếu không có hình ảnh -->
                            @endforelse

                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="product_d_right">
                    <form action="#">
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
                                    <p>No colors available for this product.</p> <!-- Hiển thị thông báo nếu không có màu -->
                                @endif

                            </ul>
                        </div>

                        <div class="product_variant quantity">
                            <label>Quantity</label>
                            <input min="1" max="100" value="1" type="number">
                            <button class="button" type="submit">Add to Cart</button>
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
