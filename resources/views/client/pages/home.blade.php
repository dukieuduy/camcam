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

    <!--slider area start-->
    <section class="slider_section slider_two mb-50">
        <!-- slider content -->
    </section>
    <!--slider area end-->

    <!--shipping area start-->
    <section class="shipping_area mb-50">
        <!-- shipping content -->
    </section>
    <!--shipping area end-->

    <!--product area start-->
    <section class="product_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2><span><strong>Our</strong> Products</span></h2>
                        <ul class="product_tab_button nav" role="tablist" id="nav-tab">
<<<<<<< HEAD
                            @foreach ($categories as $index => $category)
                                <li>
                                    <a 
                                        class="nav-link {{ $index === 0 ? 'active' : '' }}" 
                                        data-bs-toggle="tab" 
                                        href="#category-{{ $category->id }}" 
                                        role="tab" 
                                        aria-controls="category-{{ $category->id }}" 
                                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                                        {{ $category->category_name }}
                                    </a>
                                </li>
                            @endforeach
=======
                            <li>
                                <a class="active" data-toggle="tab" href="#brake" role="tab" aria-controls="brake"
                                    aria-selected="true">Brake Parts</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#wheels" role="tab" aria-controls="wheels"
                                    aria-selected="false">Wheels & Tires</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#turbo" role="tab" aria-controls="turbo"
                                    aria-selected="false">Turbo System</a>
                            </li>
>>>>>>> edf032861578a81583a280dd0ad9a2f1adb88895
                        </ul>

                    </div>
                </div>
            </div>


            <div class="tab-content">
<<<<<<< HEAD
                @foreach ($categories as $index => $category)
                    <div 
                        class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" 
                        id="category-{{ $category->id }}" 
                        role="tabpanel" 
                        aria-labelledby="category-{{ $category->id }}">
                        
                        <div class="row">
                            @foreach ($products as $product)
                                @if ($product->category_id == $category->id)
                                <div class="col-md-3">
                                    <div class="single_product_list">
                                        <div class="single_product">
                                            <div class="product_name">
                                                <h3><a href="{{ route('product-details', $product->id) }}">{{ $product->name }}</a></h3>
                                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                                            </div>
                                    
=======
                <div class="tab-pane fade show active" id="brake" role="tabpanel">
                    <div class="product_carousel product_column5 owl-carousel">
                        @foreach ($products as $product)
                            <div class="single_product_list">
                                <div class="single_product">
                                    <div class="product_name">
                                        <h3><a href="{{ route('product-details', $product->id) }}">{{ $product->name }}</a>
                                        </h3>
                                        <p class="manufacture_product"><a href="#">Accessories</a></p>
                                    </div>
>>>>>>> edf032861578a81583a280dd0ad9a2f1adb88895
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{ route('product-details', $product->id) }}">
                                            <img src="{{ asset('assets/img/product/' . $product->image_url) }}"
                                                alt="{{ $product->name }}">
                                        </a>
                                        <a class="secondary_img" href="{{ route('product-details', $product->id) }}">
                                            <img src="{{ asset('assets/img/product/' . $product->image_url) }}"
                                                alt="{{ $product->name }}">
                                        </a>
                                        
                                        <div class="label_product">
                                            <span class="label_sale">-{{ $product->discount_percentage }}%</span>
                                        </div>

                                        <div class="action_links">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_box" title="quick view">
                                                        <span class="lnr lnr-magnifier"></span></a></li>
                                                {{-- <li class="wishlist"><a href="{{ route('wishlist.add', $product->id) }}" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <li class="compare"><a href="{{ route('compare.add', $product->id) }}" title="compare"><span class="lnr lnr-sync"></span></a></li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                                
                                    <div class="product_content">
                                        <div class="product_ratings">
                                            <!-- Hiển thị số sao trung bình cho sản phẩm này -->
                                            <ul>
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <li>
                                                        <i
                                                            class="fa {{ isset($productRatings[$product->id]) && $i <= $productRatings[$product->id] ? 'fa-star' : 'fa-star-o' }}"></i>
                                                    </li>
                                                @endfor
                                            </ul>
<<<<<<< HEAD
=======
                                        </div>
                                        <div class="product_footer d-flex align-items-center">
                                            <div class="price_box">
                                                <span class="regular_price">${{ number_format($product->price, 2) }}</span>
                                            </div>
                                            <div class="add_to_cart">
                                                {{-- <a href="{{ route('cart.add', $product->id) }}" title="add to cart"><span class="lnr lnr-cart"></span></a> --}}
                                                <form action="{{ route('cart.store') }}" method="POST"
                                                    style="margin-bottom: 10px;">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <!-- ID sản phẩm động -->
                                                    <input type="hidden" name="quantity" value="1">
                                                    <!-- Số lượng cố định -->
                                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                                    <!-- Chỉ dành cho người dùng đã đăng nhập -->
                                                    <button type="submit" title="add to cart"><span
                                                            class="lnr lnr-cart"></button>
                                                </form>
                                            </div>

                                        </div>
>>>>>>> edf032861578a81583a280dd0ad9a2f1adb88895
                                    </div>
                                         
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="regular_price">${{ number_format($product->price, 2) }}</span>
                                        </div>   
                                    
                                        <div class="add_to_cart">
                                            <a href="{{ route('cart.add', $product->id) }}" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                        </div>    
                                    </div>   
                                </div>        
                            </div>        
                        </div>                        
                        @endif        
                        @endforeach                    
                    </div>        
                </div>                        
                @endforeach        
            </div>                        
        </div>               
                          
    </section>
    <!--product area end-->

    <!--banner area start-->
    <section class="banner_area mb-50">
        <!-- Banner content -->
    </section>
    <!--banner area end-->









    <section class="custom_product_area">
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-lg-4 col-md-12">
                    <!-- Featured Product Area -->
                    <div class="custom_product">
                        <div class="section_title">
                            <h2><span>{{ $category->category_name }}</span></h2>
                        </div>
                        <div class="small_product_items small_product_active">
                            @if (isset($productsByCategory[$category->id]))
                                @foreach ($productsByCategory[$category->id] as $product)
                                    <div class="single_product_items">
                                        <div class="product_thumb">
                                            <a href="{{ route('product-details', $product->id) }}">
                                                <img src="{{ asset('assets/img/product/' . $product->image_url) }}" alt="{{ $product->name }}">
                                            </a>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_name">
                                                <h3>
                                                    <a href="{{ route('product-details', $product->id) }}">{{ $product->name }}</a>
                                                </h3>
                                            </div>
                                            <div class="product_ratings">
                                                <ul>
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <li>
                                                            <i class="fa {{ isset($productRatings[$product->id]) && $i <= $productRatings[$product->id] ? 'fa-star' : 'fa-star-o' }}"></i>
                                                        </li>
                                                    @endfor
                                                </ul>
                                            </div>
                                            <div class="price_box">
                                                <span class="current_price">${{ number_format($product->price, 2) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>No products available in this category.</p>
                            @endif
                        </div>
                    </div>
                    <!-- Featured Product End -->
                </div>
            @endforeach
        </div>
    </div>
</section>

    </section>
    <!--custom product end-->
    <!--custom product end-->

    <!--brand area start-->
    <div class="brand_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand_container owl-carousel">
                        <!-- brand content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--brand area end-->
@endsection
