<!-- Main Wrapper Start -->
<!--header area start-->
<header class="header_area header_padding">
    <!--header top start-->
    <div class="header_top top_two">
        <div class="container">
            <div class="top_inner">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="follow_us">
                            <label>Follow Us:</label>
                            <ul class="follow_link">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="top_right text-end">
                            <ul>
                                <li class="top_links"><a href="#"><i class="ion-android-person"></i> @if (Auth::check())
                                    {{Auth::user()->name}}<i class="ion-ios-arrow-down"></i></a>
                                @else
                                    My Account
                                @endif

                                    <ul class="dropdown_links">
                                        <li><a href="checkout.html">checkout </a></li>
                                        @if (Auth::check())
                                         <li><a href="my-account.html">{{Auth::user()->name}} </a></li>
                                            @else
                                                My Account
                                            @endif
                                        </li>
                                        {{-- <li><a href="my-account.html">{{Auth::user()->name}} </a></li> --}}
                                        <li><a href="{{ route('cart.show') }}">Shopping Cart</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        @if (Auth::check())
                                        <li>
                                            <form action="{{route('logout')}}" method="POST">
                                                @csrf
                                                <button type="submit" onclick="return confirm('bạn muốn đăng xuất')" class="btn btn-transparent text-decoration-none">Logout</button>
                                            </form>
                                            {{-- <a href="{{route('logout')}}" >Logout</a> --}}
                                        </li>
                                        @else
                                        <li><a href="{{route('login')}}" >Login</a></li>

                                        @endif
                                    </ul>
                                </li>
                                <li class="language"><a href="#"><img src="assets/img/logo/language.png" alt="">en-gb<i class="ion-ios-arrow-down"></i></a>
                                    <ul class="dropdown_language">
                                        <li><a href="#"><img src="assets/img/logo/language.png" alt=""> English</a></li>
                                        <li><a href="#"><img style="width:17px; height:17px" src="assets/img/thenewbanner/logovie.png" alt=""> Vie</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header top start-->
    <!--header middel start-->
    <div class="header_middle middle_two">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3">
                    <div class="logo">
                        <h1 style="color: #ff6300">CAMCAM</h1>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="middel_right">
                        <div class="search-container search_two">
                            <form action="#">
                                <div class="search_box">
                                    <input placeholder="Search entire store here ..." type="text">
                                    <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="middel_right_info">

                            <div class="header_wishlist">
                                <a href="wishlist.html"><span class="lnr lnr-heart"></span> Wish list </a>
                                <span class="wishlist_quantity">3</span>
                            </div>
                            <div class="mini_cart_wrapper">
                                <a href="{{ route('cart.show') }}"><span class="lnr lnr-cart"></span>My Cart </a>
                                <span class="cart_quantity">2</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header middel end-->
    <!--mini cart-->
    {{-- <div class="mini_cart">
        <div class="cart_close">
            <div class="cart_text">
                <h3>cart</h3>
            </div>
            <div class="mini_cart_close">
                <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
            </div>
        </div>
        <div class="cart_item">
            <div class="cart_img">
                <a href="#"><img src="assets/img/s-product/product.jpg" alt=""></a>
            </div>
            <div class="cart_info">
                <a href="#">JBL Flip 3 Splasroof Portable Bluetooth 2</a>

                <span class="quantity">Qty: 1</span>
                <span class="price_cart">$60.00</span>

            </div>
            <div class="cart_remove">
                <a href="#"><i class="ion-android-close"></i></a>
            </div>
        </div>
        <div class="cart_item">
            <div class="cart_img">
                <a href="#"><img src="assets/img/s-product/product2.jpg" alt=""></a>
            </div>
            <div class="cart_info">
                <a href="#">Koss Porta Pro On Ear Headphones </a>
                <span class="quantity">Qty: 1</span>
                <span class="price_cart">$69.00</span>
            </div>
            <div class="cart_remove">
                <a href="#"><i class="ion-android-close"></i></a>
            </div>
        </div>
        <div class="mini_cart_table">
            <div class="cart_total">
                <span>Sub total:</span>
                <span class="price">$138.00</span>
            </div>
            <div class="cart_total mt-10">
                <span>total:</span>
                <span class="price">$138.00</span>
            </div>
        </div>

        <div class="mini_cart_footer">
            <div class="cart_button">
                <a href="{{ route('cart.show') }}">View cart</a>
            </div>
            <div class="cart_button">
                <a class="active" href="checkout.html">Checkout</a>
            </div>

        </div>

    </div> --}}
    <!--mini cart end-->

    <!--header bottom satrt-->
    <div class="header_bottom bottom_two sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="header_bottom_container">
                        <div class="categories_menu">
                            <div class="categories_title">
                                <h2 class="categori_toggle">Browse categories</h2>
                            </div>
                            <div class="categories_menu_toggle">
                                <ul>
                                    <li><a href="#"> Accessories</a></li>
                                    <li><a href="#">Body Parts</a></li>
                                    <li><a href="#">Perfomance Filters</a></li>
                                    <li><a href="#"> Engine Parts</a></li>
                                    <li class="hidden"><a href="shop-left-sidebar.html">New Sofas</a></li>
                                    <li class="hidden"><a href="shop-left-sidebar.html">Sleight Sofas</a></li>
                                    <li><a href="#" id="more-btn"><i class="fa fa-plus" aria-hidden="true"></i> More Categories</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="main_menu">
                            <nav>
                                <ul>
<<<<<<< HEAD
                                    <li><a href="{{ route('home') }}">home<i class="fa fa-angle-down"></i></a>
=======
                                    <li><a href="index.html">home<i class=""></i></a>
>>>>>>> 2b163f29a2ae26056e07f5b073ad7761c2a61f1b

                                    </li>
                                    <li class="mega_items"><a href="shop.html">shop<i class=""></i></a>
                                        <div class="mega_menu">
                                            <ul class="mega_menu_inner">           
                                                <li><a href="#">Categories</a>
                                                    <ul>
                                                        <li><a href="#">Men</a></li>
                                                        <li><a href="#">Women</a></li>
                                                        <li><a href="#">Kid</a></li>
                                                        <li><a href="#">Sport</a></li>
                                                        <li><a href="#">Luxury</a></li>
                                                    </ul>
                                                </li>                                       
                                            </ul>
                                            <div class="banner_static_menu">
                                                <a href="#"><img src="assets/img/thenewbanner/banner3.jpg" alt=""></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="#">blog<i class="fa fa-angle-down"></i></a>
                                        <ul class="sub_menu pages">
                                            <li><a href="#">New collection</a></li>
                                            <li><a href="#">We are hiring</a></li>
                                            <li><a href="#">KOL</a></li>
                                        </ul>
                                    </li>                           
                                    <li><a href="#">about Us</a></li>
                                    <li><a href="#"> Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!--header bottom end-->

</header>
<!--header area end-->
<!--Offcanvas menu area start-->
<div class="off_canvars_overlay"></div>
<div class="Offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <span>MENU</span>
                    <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                </div>
                <div class="Offcanvas_menu_wrapper">

                    <div class="canvas_close">
                        <a href="#"><i class="ion-android-close"></i></a>
                    </div>


                    <div class="top_right text-end">
                        <ul>
                            <li class="top_links"><a href="#"><i class="ion-android-person"></i> My Account<i
                                        class="ion-ios-arrow-down"></i></a>
                                <ul class="dropdown_links">
                                    <li><a href="checkout.html">Checkout </a></li>
                                    <li><a href="my-account.html">My Account </a></li>
                                    <li><a href="{{ route('cart.show') }}">Shopping Cart</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                </ul>
                            </li>
                            <li class="language"><a href="#"><img src="assets/img/logo/language.png" alt="">en-gb<i
                                        class="ion-ios-arrow-down"></i></a>
                                <ul class="dropdown_language">
                                    <li><a href="#"><img src="assets/img/logo/language.png" alt=""> English</a></li>
                                    <li><a href="#"><img src="assets/img/logo/language2.png" alt=""> Germany</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="currency"><a href="#">$ USD<i class="ion-ios-arrow-down"></i></a>
                                <ul class="dropdown_currency">
                                    <li><a href="#">EUR – Euro</a></li>
                                    <li><a href="#">GBP – British Pound</a></li>
                                    <li><a href="#">INR – India Rupee</a></li>
                                </ul>
                            </li>


                        </ul>
                    </div>
                    <div class="Offcanvas_follow">
                        <label>Follow Us:</label>
                        <ul class="follow_link">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                        </ul>
                    </div>
                    <div class="search-container">
                        <form action="#">
                            <div class="search_box">
                                <input placeholder="Search entire store here ..." type="text">
                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                            </div>
                        </form>
                    </div>
                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children">
                                <a href="#">Home</a>

                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Shop</a>
                                <ul class="sub-menu">
                                    <li class="menu-item-has-children">
                                        <a href="#">Shop Layouts</a>
                                        <ul class="sub-menu">
                                            <li><a href="shop.html">shop</a></li>
                                            <li><a href="shop-fullwidth.html">Full Width</a></li>
                                            <li><a href="shop-fullwidth-list.html">Full Width list</a></li>
                                            <li><a href="shop-right-sidebar.html">Right Sidebar </a></li>
                                            <li><a href="shop-right-sidebar-list.html"> Right Sidebar list</a></li>
                                            <li><a href="shop-list.html">List View</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">other Pages</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('cart.show') }}">cart</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="my-account.html">my account</a></li>
                                            <li><a href="404.html">Error 404</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Product Types</a>
                                        <ul class="sub-menu">
                                            <li><a href="product-details.html">product details</a></li>
                                            <li><a href="product-sidebar.html">product sidebar</a></li>
                                            <li><a href="product-grouped.html">product grouped</a></li>
                                            <li><a href="variable-product.html">product variable</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog.html">blog</a></li>
                                    <li><a href="blog-details.html">blog details</a></li>
                                    <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                    <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                </ul>

                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">pages </a>
                                <ul class="sub-menu">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="services.html">services</a></li>
                                    <li><a href="faq.html">Frequently Questions</a></li>
                                    <li><a href="login.html">login</a></li>
                                    <li><a href="compare.html">compare</a></li>
                                    <li><a href="privacy-policy.html">privacy policy</a></li>
                                    <li><a href="coming-soon.html">Coming Soon</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="my-account.html">my account</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="about.html">About Us</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="contact.html"> Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--Offcanvas menu area end-->
