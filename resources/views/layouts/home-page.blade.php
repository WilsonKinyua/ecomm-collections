<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>{{ trans('panel.site_title') }}</title>

    <meta name="keywords" content="" />
    <meta name="description" content="{{ trans('panel.site_title') }}">
    <meta name="author" content="CodeTheGuy">

    <!-- Favicon -->
    {{-- <link rel="icon" type="image/png" href="{{ asset('assets/images/icons/favicon.png')}}"> --}}

    <script>
        WebFontConfig = {
            google: { families: ['Open+Sans:400,600,700', 'Poppins:400,600,700'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = 'js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>


    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.min.css')}}">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/magnific-popup/magnific-popup.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/owl-carousel/owl.carousel.min.css')}}">

    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.min.css')}}">
             @yield('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/new-styles.css')}}">

</head>

<body class="home">
    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
            <div class="bounce4"></div>
        </div>
    </div>
    <div class="page-wrapper">
        <h1 class="d-none">{{ trans('panel.site_title') }}</h1>
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <p class="welcome-msg">Welcome to {{ trans('panel.site_title') }}!</p>
                    </div>
                    <div class="header-right">
                    </div>
                </div>
            </div>
            <!-- End of HeaderTop -->
            <div class="header-middle sticky-header fix-top sticky-content has-center">
                <div class="container">
                    <div class="header-left">
                        <a href="#" class="mobile-menu-toggle">
                            <i class="d-icon-bars2"></i>
                        </a>
                        <a href="/" class="logo d-none d-lg-block">
                            {{-- <img src="images/demos/demo3/logo.png" alt="logo" width="163" height="39" /> --}}
                            <span style="color: #1e394c; font-size: 15px !important; text-transform: uppercase">{{ trans('panel.site_title') }}</span>
                        </a>
                    </div>
                    <div class="header-center">
                        <a href="/" class="logo d-lg-none">
                            {{-- <img src="images/demos/demo3/logo.png" alt="logo" width="163" height="39" /> --}}
                            <span style="color: #1e394c; font-size: 15px !important; text-transform: uppercase">{{ trans('panel.site_title') }}</span>
                        </a>
                        <!-- End of Logo -->
                        <div class="header-search hs-expanded">
                            <form action="{{ route('search.search') }}" method="post" class="input-wrapper">
                                @csrf
                                {{-- <div class="select-box">
                                    <select id="category" name="category">
                                        <option value="">All Categories</option>
                                       @foreach ($categories as $cat)
                                       <option value="{{ $cat->id }}">- {{ $cat->name }}</option>
                                       @endforeach
                                    </select>
                                </div> --}}
                                <input type="text" class="form-control" name="q" id="search"
                                    placeholder="Search for product..." required="">
                                <button class="btn btn-sm btn-search" type="submit"><i
                                        class="d-icon-search"></i></button>
                            </form>
                        </div>
                        <!-- End of Header Search -->

                        <nav class="main-nav">
                            <ul class="menu">
                                <li class="active">
                                    <a href="/">Home</a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                    <div class="header-right">
                        {{-- <a class="" href="{{ route('auth.account') }}">
                            <i class="d-icon-user"></i>
                            <span>Login</span>
                        </a> --}}
                        <!-- End of Login -->
                        <span class="divider"></span>
                        {{-- <div class="dropdown cart-dropdown">
                            <a href="#" class="cart-toggle">
                                <span class="cart-label">
                                    <span class="cart-name">My Cart</span>
                                    <span class="cart-price">$42.00</span>
                                </span>
                                <i class="minicart-icon">
                                    <span class="cart-count">2</span>
                                </i>
                            </a>
                            <!-- End of Cart Toggle -->
                            <div class="dropdown-box">
                                <div class="product product-cart-header">
                                    <span class="product-cart-counts">2 items</span>
                                    <span><a href="{{ route('cart.cart')}}">View cart</a></span>
                                </div>
                                <div class="products scrollable">
                                    <div class="product product-cart">
                                        <div class="product-detail">
                                            <a href="product.html" class="product-name">Solid Pattern In Fashion Summer
                                                Dress</a>
                                            <div class="price-box">
                                                <span class="product-quantity">1</span>
                                                <span class="product-price">$129.00</span>
                                            </div>
                                        </div>
                                        <figure class="product-media">
                                            <a href="#">
                                                <img src="images/cart/product-1.jpg" alt="product" width="90"
                                                    height="90" />
                                            </a>
                                            <button class="btn btn-link btn-close">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </figure>
                                    </div>
                                    <!-- End of Cart Product -->
                                    <div class="product product-cart">
                                        <div class="product-detail">
                                            <a href="product.html" class="product-name">Mackintosh Poket Backpack</a>
                                            <div class="price-box">
                                                <span class="product-quantity">1</span>
                                                <span class="product-price">$98.00</span>
                                            </div>
                                        </div>
                                        <figure class="product-media">
                                            <a href="#">
                                                <img src="images/cart/product-2.jpg" alt="product" width="90"
                                                    height="90" />
                                            </a>
                                            <button class="btn btn-link btn-close">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </figure>
                                    </div>
                                    <!-- End of Cart Product -->
                                </div>
                                <!-- End of Products  -->
                                <div class="cart-total">
                                    <label>Subtotal:</label>
                                    <span class="price">$42.00</span>
                                </div>
                                <!-- End of Cart Total -->
                                <div class="cart-action">
                                    <a href="{{ route('account.checkout')}}" class="btn btn-dark"><span>Checkout</span></a>
                                </div>
                                <!-- End of Cart Action -->
                            </div>
                            <!-- End of Dropdown Box -->
                        </div> --}}

                        <div class="header-search hs-toggle mobile-search">
                            <a href="#" class="search-toggle">
                                <i class="d-icon-search"></i>
                            </a>
                            <form action="{{ route('search.search') }}" method="POST" class="input-wrapper">
                                @csrf
                                <input type="text" class="form-control" name="q" autocomplete="off"
                                    placeholder="Search products..." required />
                                <button class="btn btn-search" type="submit">
                                    <i class="d-icon-search"></i>
                                </button>
                            </form>
                        </div>
                        <!-- End of Header Search -->
                    </div>
                </div>
            </div>

            <div class="header-bottom d-lg-show">
                <div class="container">
                    <div class="inner-wrap">
                        <div class="header-left">
                            <nav class="main-nav">
                                <ul class="menu">
                                    <li class="active">
                                        <a href="/">Home</a>
                                    </li>
                                    {{-- <li>
                                        <a href="#">Pages</a>
                                        <ul>
                                            <li><a href="about-us.html">About</a></li>
                                            <li><a href="contact-us.html">Contact Us</a></li>
                                            <li><a href="account.html">Login</a></li>
                                            <li><a href="#">FAQs</a></li>
                                            <li><a href="error-404.html">Error 404</a></li>
                                            <li><a href="coming-soon.html">Coming Soon</a></li>
                                        </ul>
                                    </li> --}}
                                </ul>
                            </nav>
                        </div>
                        <div class="header-right">
                            <nav class="custom-menu">
                                <ul class="menu">
                                    {{-- <li>
                                        <a href="#">Limited time offer</a>
                                    </li> --}}
                                    <li>
                                        <a href="/">Buy at {{ trans('panel.site_title') }}!</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End of Header -->




        @yield('content')






          <!-- End of Main -->
          <footer class="footer appear-animate" data-animation-options="{
            'delay': '.3s'
        }">
            <div class="container">
                {{-- <div class="footer-top">
                    <div class="row">
                        <div class="col-lg-3">
                            <a href="/" class="logo-footer">
                                <img src="images/logo-footer.png" alt="logo-footer" width="163" height="39" />
                                <span style="color: #ffffff; font-size: 15px !important; text-transform: uppercase">{{ trans('panel.site_title') }}</span>
                            </a>
                            <!-- End of FooterLogo -->
                        </div>
                        <div class="col-lg-9">
                            <div class="widget widget-newsletter form-wrapper form-wrapper-inline">
                                <div class="newsletter-info mx-auto mr-lg-2 ml-lg-4">
                                    <h4 class="widget-title">Subscribe to our Newsletter</h4>
                                    <p>Get all the latest information on Events, Sales and Offers.</p>
                                </div>
                                <form action="#" class="input-wrapper input-wrapper-inline">
                                    <input type="email" class="form-control" name="newsletter_email"
                                        id="newsletter_email" placeholder="Email address here..." required />
                                    <button class="btn btn-grey btn-md ml-2" type="submit">subscribe<i
                                            class="d-icon-arrow-right"></i></button>
                                </form>
                            </div>
                            <!-- End of Newsletter -->
                        </div>
                    </div>
                </div> --}}
                <!-- End of FooterTop -->
                <div class="footer-middle">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="widget">
                                <h4 class="widget-title">Contact Info</h4>
                                <ul class="widget-body">
                                   <li>
                                    <label>Phone:</label>
                                    <a href="tel:+254717180525">+254717180525 / +254729081936</a>
                                </li>
                                <li>
                                    <label>Email:</label>
                                    <a href="malto:castlecollection20@gmail.com">castlecollection20@gmail.com</a>
                                </li>
                                <li>
                                    <label>Address:</label>
                                    <a href="#">Nairobi, Kenya</a>
                                </li>
                                <li>
                                    <label>WORKING DAYS/HOURS</label>
                                </li>
                                <li>
                                    <a href="#"> Monday - Sunday
                                        <br> 24Hours
                                    </a>
                                </li>
                                </ul>
                            </div>
                            <!-- End of Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            {{-- <div class="widget ml-lg-4">
                                <h4 class="widget-title">My Account</h4>
                                <ul class="widget-body">
                                    <li>
                                        <a href="#">About Us</a>
                                    </li>
                                    <li>
                                        <a href="#">Order History</a>
                                    </li>
                                    <li>
                                        <a href="#">Returns</a>
                                    </li>
                                    <li>
                                        <a href="#">Custom Service</a>
                                    </li>
                                    <li>
                                        <a href="#">Terms &amp; Condition</a>
                                    </li>
                                </ul>
                            </div> --}}
                            <!-- End of Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            {{-- <div class="widget ml-lg-4">
                                <h4 class="widget-title">Contact Info</h4>
                                <ul class="widget-body">
                                    <li>
                                        <a href="#">About Us</a>
                                    </li>
                                    <li>
                                        <a href="#">Order History</a>
                                    </li>
                                    <li>
                                        <a href="#">Returns</a>
                                    </li>
                                    <li>
                                        <a href="#">Custom Service</a>
                                    </li>
                                    <li>
                                        <a href="#">Terms &amp; Condition</a>
                                    </li>
                                </ul>
                            </div> --}}
                            <!-- End of Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            {{-- <div class="widget widget-instagram">
                                <h4 class="widget-title">Instagram</h4>
                                <figure class="widget-body row">
                                    <div class="col-3">
                                        <img src="{{ asset('assets/images/instagram/01.jpg')}}" alt="instagram 1" width="64" height="64" />
                                    </div>
                                    <div class="col-3">
                                        <img src="{{ asset('assets/images/instagram/02.jpg')}}" alt="instagram 2" width="64" height="64" />
                                    </div>
                                    <div class="col-3">
                                        <img src="{{ asset('assets/images/instagram/03.jpg')}}" alt="instagram 3" width="64" height="64" />
                                    </div>
                                    <div class="col-3">
                                        <img src="{{ asset('assets/images/instagram/04.jpg')}}" alt="instagram 4" width="64" height="64" />
                                    </div>
                                    <div class="col-3">
                                        <img src="{{ asset('assets/images/instagram/05.jpg')}}" alt="instagram 5" width="64" height="64" />
                                    </div>
                                    <div class="col-3">
                                        <img src="{{ asset('assets/images/instagram/06.jpg')}}" alt="instagram 6" width="64" height="64" />
                                    </div>
                                    <div class="col-3">
                                        <img src="{{ asset('assets/images/instagram/07.jpg')}}" alt="instagram 7" width="64" height="64" />
                                    </div>
                                    <div class="col-3">
                                        <img src="{{ asset('assets/images/instagram/08.jpg')}}" alt="instagram 8" width="64" height="64" />
                                    </div>
                                </figure>
                            </div> --}}
                            <!-- End of Instagram -->
                        </div>
                    </div>
                </div>
                <!-- End of FooterMiddle -->
                <div class="footer-bottom">
                    <div class="footer-left">
                        <figure class="payment">
                            <img src="{{asset('assets/images/payment.png')}}" alt="payment" width="159" height="29" />
                        </figure>
                    </div>
                    <div class="footer-center">
                        <p class="copyright">{{ trans('panel.site_title') }} &copy; 2021.
                            {{-- Created by: <a style="color: white" href="http://developerwilson.com/">Developer Wilson</a> --}}
                            All Rights Reserved</p>
                    </div>
                    <div class="footer-right">
                        <div class="social-links">
                            <a href="https://www.facebook.com/Castle-Collections-101358578308174" target="_blank" class="social-link social-facebook fab fa-facebook-f"></a>
                            <a href="https://www.instagram.com/castle1_collections/" target="_blank" class="social-link social-twitter fab fa-instagram"></a>
                            <a href="https://chat.whatsapp.com/HMgtavQSJ0G4JncLLptYRz" target="_blank" class="social-link social-linkedin fab fa-whatsapp" ></a>
                        </div>
                    </div>
                </div>
                <!-- End of FooterBottom -->
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- Sticky Footer -->
    <div class="sticky-footer sticky-content fix-bottom">
        <a href="/" class="sticky-link active">
            <i class="d-icon-home"></i>
            <span>Home</span>
        </a>
        {{-- <a href="{{ route('categories.categories') }}" class="sticky-link">
            <i class="d-icon-volume"></i>
            <span>Categories</span>
        </a> --}}
        <a href="{{ route('products.products') }}" class="sticky-link">
            <i class="d-icon-heart"></i>
            <span>Products</span>
        </a>
        {{-- <a href="account.html" class="sticky-link">
            <i class="d-icon-user"></i>
            <span>Account</span>
        </a>
        <div class="dropdown cart-dropdown dir-up">
            <a href="{{ route('cart.cart')}}" class="sticky-link cart-toggle">
                <i class="d-icon-bag"></i>
                <span>Cart</span>
            </a>
            <!-- End of Cart Toggle -->
            <div class="dropdown-box">
                <div class="product product-cart-header">
                    <span class="product-cart-counts">2 items</span>
                    <span><a href="{{ route('cart.cart')}}">View cart</a></span>
                </div>
                <div class="products scrollable">
                    <div class="product product-cart">
                        <div class="product-detail">
                            <a href="product.html" class="product-name">Solid Pattern In Fashion Summer Dress</a>
                            <div class="price-box">
                                <span class="product-quantity">1</span>
                                <span class="product-price">$129.00</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="#">
                                <img src="images/cart/product-1.jpg" alt="product" width="90" height="90" />
                            </a>
                            <button class="btn btn-link btn-close">
                                <i class="fas fa-times"></i>
                            </button>
                        </figure>
                    </div>
                    <!-- End of Cart Product -->
                    <div class="product product-cart">
                        <div class="product-detail">
                            <a href="product.html" class="product-name">Mackintosh Poket Backpack</a>
                            <div class="price-box">
                                <span class="product-quantity">1</span>
                                <span class="product-price">$98.00</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="#">
                                <img src="images/cart/product-2.jpg" alt="product" width="90" height="90" />
                            </a>
                            <button class="btn btn-link btn-close">
                                <i class="fas fa-times"></i>
                            </button>
                        </figure>
                    </div>
                    <!-- End of Cart Product -->
                </div>
                <!-- End of Products  -->
                <div class="cart-total">
                    <label>Subtotal:</label>
                    <span class="price">$42.00</span>
                </div>
                <!-- End of Cart Total -->
                <div class="cart-action">
                    <a href="{{ route('account.checkout')}}" class="btn btn-dark"><span>Checkout</span></a>
                </div>
                <!-- End of Cart Action -->
            </div>
            <!-- End of Dropdown Box -->
        </div> --}}
    </div>
    <!-- Scroll Top -->
    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fas fa-chevron-up"></i></a>

    <!-- MobileMenu -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay">
        </div>
        <!-- End of Overlay -->
        <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
        <!-- End of CloseButton -->
        <div class="mobile-menu-container scrollable">
            <form action="{{ route('search.search') }}" method="POST" class="input-wrapper">
                @csrf
                <input type="text" class="form-control" name="q" autocomplete="off"
                    placeholder="Search for products..." required />
                <button class="btn btn-search" type="submit">
                    <i class="d-icon-search"></i>
                </button>
            </form>
            <!-- End of Search Form -->
            <ul class="mobile-menu mmenu-anim">
                {{-- @foreach ($categories as $item)
                <li class="">
                    <a href="{{ route('product.category',$item->id) }}">{{ $item->name }}</a>
                </li>
                @endforeach --}}
                <li>
					<a href="#">Households</a>
					<ul>
                        @foreach ($catone as $item)
                            <li>
                                <a href="{{ route('product.category',$item->id) }}">{{ $item->name }}</a>
                            </li>
                        @endforeach

					</ul>
				</li>
                <li>
					<a href="#">Kitchenware</a>
					<ul>
                        @foreach ($cattwo as $item)
                        <li>
                            <a href="{{ route('product.category',$item->id) }}">{{ $item->name }}</a>
                        </li>
                    @endforeach
					</ul>
				</li>
                {{-- <li><a href="#">Buy at {{ trans('panel.site_title') }}!</a></li> --}}
            </ul>
            <!-- End of MobileMenu -->
        </div>
    </div>
         <!-- GetButton.io widget -->
         <script type="text/javascript">
            (function () {
            var options = {
            whatsapp: "+254 717 180525", // WhatsApp number
            call_to_action: "Hi there 👋 Welcome to {{ trans('panel.site_title') }}", // Call to action
            position: "left", // Position may be 'right' or 'left'
            pre_filled_message: "Hi there 👋 Welcome to {{ trans('panel.site_title') }}", // WhatsApp pre-filled message
            };
            var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
            })();
            </script>
    <!-- /GetButton.io widget -->
    <!-- Plugins JS File -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/elevatezoom/jquery.elevatezoom.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

    <script src="{{ asset('assets/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/sticky/sticky.min.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js')}}"></script>
</body>


</html>
