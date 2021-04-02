<!doctype html>
<html class="no-js" lang="en">


<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ trans('panel.site_title') }}</title>

  <!-- Favicon -->
  <link rel="icon" href="https://ems.wezadevelopment.com/asset/img/favicon.ico" type="image/x-icon">

  <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/rs-plugin/css/settings.css')}}" media="screen" />

  <!-- StyleSheets -->
  <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/responsive.css')}}">

  <!-- Fonts Online -->
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
    rel="stylesheet">


  <!-- JavaScripts -->
  <script src="{{ asset('assets/js/vendors/modernizr.js')}}"></script>

</head>

<body>

  <!-- Page Wrapper -->
  <div id="wrap" class="layout-1">

    <!-- Top bar -->
    <div class="top-bar">
      <div class="container">
        <p>Welcome to {{ trans('panel.site_title') }}!</p>
        {{-- <div class="right-sec">

          <div class="social-top">

                <a href="#."><i class="fa fa-facebook"></i></a>
                <a href="#."><i class="fa fa-twitter"></i></a>
                <a href="#."><i class="fa fa-linkedin"></i></a>
                <a href="#."><i class="fa fa-dribbble"></i></a>
                <a href="#."><i class="fa fa-pinterest"></i></a>
            </div>
        </div> --}}
      </div>
    </div>

    <!-- Header -->
    <header>
      <div class="container">
        <div class="logo"> <a href="/">
            {{-- <img src="{{ asset('assets/images/logo.png')}}" alt=""> --}}
            <h4 style="font-weight: 900; text-transform:uppercase">{{ trans('panel.site_title') }}</h4>
        </a>
         </div>
        <div class="search-cate">
          {{-- <select class="selectpicker">
            <option> All Categories</option>
            <option> Home Audio & Theater</option>
          </select> --}}
          <input type="search" placeholder="Search product...">
          <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
        </div>

        <!-- Cart Part -->
        <ul class="nav navbar-right cart-pop">
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
              aria-haspopup="true" aria-expanded="false"><span class="itm-cont">3</span> <i
                class="flaticon-shopping-bag"></i> <strong>My Cart</strong> <br>
              <span>3 item(s) - $500.00</span></a>
            <ul class="dropdown-menu">
              <li>
                <div class="media-left"> <a href="#." class="thumb"> <img src="{{ asset('assets/images/item-img-1-1.jpg')}}"
                      class="img-responsive" alt=""> </a> </div>
                <div class="media-body"> <a href="#." class="tittle">Funda Para Ebook 7" 128GB full HD</a> <span>250 x
                    1</span> </div>
              </li>
              <li>
                <div class="media-left"> <a href="#." class="thumb"> <img src="{{ asset('assets/images/item-img-1-2.jpg')}}"
                      class="img-responsive" alt=""> </a> </div>
                <div class="media-body"> <a href="#." class="tittle">Funda Para Ebook 7" full HD</a> <span>250 x
                    1</span> </div>
              </li>
              <li class="btn-cart"> <a href="#." class="btn-round">View Cart</a> </li>
            </ul>
          </li>
        </ul>
      </div>

      <!-- Nav -->
      <nav class="navbar ownmenu">
        <div class="container">

          <!-- Categories -->
          <div class="cate-lst"> <a data-toggle="collapse" class="cate-style" href="#cater"><i
                class="fa fa-list-ul"></i> Our Categories </a>
            <div class="cate-bar-in">
              <div id="cater" class="collapse">
                <ul>
                  {{-- <li><a href="#."> Home Audio & Theater</a></li>
                  <li><a href="#."> TV & Video</a></li>
                  <li><a href="#."> Camera, Photo & Video</a></li> --}}

                  @foreach ($maincat1 as $item)
                  <li class="sub-menu"><a href="#."> {{ $item->name }}</a>
                    <ul>
                        @foreach ($subcat1 as $item)
                            <li><a href="{{ route('categ.product', $item->id) }}"> {{ $item->name }} </a></li>
                        @endforeach

                    </ul>
                  </li>
                  @endforeach

                  @foreach ($maincat2 as $item)
                  <li class="sub-menu"><a href="#."> {{ $item->name }}</a>
                    <ul>
                        @foreach ($subcat2 as $item)
                            <li><a href="{{ route('categ.product', $item->id) }}"> {{ $item->name }}</a></li>
                        @endforeach

                    </ul>
                  </li>
                  @endforeach

                  {{-- <li><a href="#."> Headphones</a></li>
                  <li><a href="#."> Video Games</a></li>
                  <li class="sub-menu"><a href="#."> Bluetooth & Wireless Speakers</a>
                    <ul>
                      <li><a href="#."> TV & Video</a></li>
                      <li><a href="#."> Camera, Photo & Video</a></li>
                      <li><a href="#."> Cell Phones & Accessories</a>
                    </ul>
                  </li>
                  <li class="sub-menu"><a href="#."> Gaming Console</a>
                    <ul>
                      <li><a href="#."> TV & Video</a></li>
                      <li><a href="#."> Camera, Photo & Video</a></li>
                      <li><a href="#."> Cell Phones & Accessories</a>
                    </ul>
                  </li>
                  <li><a href="#."> Computers & Tablets</a></li>
                  <li><a href="#."> Monitors</a></li>
                  <li><a href="#."> Home Appliances</a></li>
                  <li><a href="#."> Office Supplies</a></li> --}}
                </ul>
              </div>
            </div>
          </div>

          <!-- Navbar Header -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn"
              aria-expanded="false"> <span><i class="fa fa-navicon"></i></span> </button>
          </div>
          <!-- NAV -->
          <div class="collapse navbar-collapse" id="nav-open-btn">
            <ul class="nav">

              <li class="dropdown"> <a href="index.html" class="dropdown-toggle" data-toggle="dropdown">Pages </a>
                <ul class="dropdown-menu multi-level animated-2s fadeInUpHalf">
                  <li><a href=""> Login </a></li>
                  <li><a href=""> Register </a></li>
                  <li><a href=""> Cart</a></li>
                  {{-- <li><a href="GridProducts_3Columns.html"> Products 3 Columns </a></li>
                  <li><a href="GridProducts_4Columns.html"> Products 4 Columns </a></li>
                  <li><a href="ListProducts.html"> List Products </a></li>
                  <li><a href="Product-Details.html"> Product Details </a></li> --}}

                  {{-- <li><a href="Confirmation.html"> Confirmation </a></li>
                  <li><a href="CheckoutSuccessful.html"> Checkout Successful </a></li>
                  <li><a href="Error404.html"> Error404 </a></li>
                  <li><a href="contact.html"> Contact </a></li>
                  <li class="dropdown-submenu"><a href="#."> Dropdown Level </a>
                    <ul class="dropdown-menu animated-2s fadeInRight">
                      <li><a href="#.">Level 1</a></li>
                    </ul>
                  </li> --}}
                </ul>
              </li>

              {{-- <li> <a href="shop.html">Buy theme! </a></li> --}}
            </ul>
          </div>

          <!-- NAV RIGHT -->
          <div class="nav-right"> <span class="call-mun"><i class="fa fa-phone"></i> <strong>Hotline:</strong>

            @foreach ($site as $item)
                {{ $item->support_phone_1 }} / {{ $item->support_phone_2 }}
            @endforeach

            </span> </div>
        </div>
      </nav>
    </header>



    @yield('content')



    <!-- Footer -->
    <footer style="margin-top: 40px">
      <div class="container ">

        <div class="row">

          <!-- Contact -->
          <div class="col-md-4">
            <h4>Contact {{ trans('panel.site_title') }}!</h4>

            @foreach ($site as $item)

                <p>Address: {{ $item->location }}</p>
                <p>Working Hours: {{ $item->open_hours }}</p>
                <p>Phone: {{ $item->support_phone_1 }} / {{ $item->support_phone_2 }}</p>
                <p>Email: {{ $item->email }}</p>

                <div class="social-links">
                    <a href="{{ $item->facebook}}"><i class="fa fa-facebook"></i></a>
                    {{-- <a href="{{ $item->}}"><i class="fa fa-twitter"></i></a> --}}
                    <a href="{{ $item->whatsapp}}"><i class="fa fa-whatsapp"></i></a>
                    <a href="{{ $item->instagram}}"><i class="fa fa-instagram"></i></a>
                </div>
            @endforeach

          </div>

          <!-- Categories -->
          <div class="col-md-3">
            <h4>Main Category</h4>
            <ul class="links-footer">
                @foreach ($maincat as $item)
                    <li><a href="#.">{{ $item->name }}</a></li>
                @endforeach

            </ul>
          </div>

          <div class="col-md-3">
            <h4>Sub-Categories</h4>
            <ul class="links-footer">
                @foreach ($subcat as $item)
                    <li><a href="#.">{{ $item->name }}</a></li>
                @endforeach
            </ul>
          </div>

          <!-- Categories -->
          {{-- <div class="col-md-3">
            <h4>Customer Services</h4>
            <ul class="links-footer">
              <li><a href="#.">Shipping & Returns</a></li>
              <li><a href="#."> Secure Shopping</a></li>
              <li><a href="#."> International Shipping</a></li>
              <li><a href="#."> Affiliates</a></li>
              <li><a href="#."> Contact </a></li>
            </ul>
          </div>

          <!-- Categories -->
          <div class="col-md-2">
            <h4>Information</h4>
            <ul class="links-footer">
              <li><a href="#.">Our Blog</a></li>
              <li><a href="#."> About Our Shop</a></li>
              <li><a href="#."> Secure Shopping</a></li>
              <li><a href="#."> Delivery infomation</a></li>
              <li><a href="#."> Store Locations</a></li>
              <li><a href="#."> FAQs</a></li>
            </ul>
          </div> --}}
        </div>
      </div>
    </footer>

    <!-- Rights -->
    <div class="rights">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <p>Copyright © 2021 <a href="/" class="ri-li"> {{ trans('panel.site_title') }} </a>. All rights reserved</p>
          </div>
          {{-- <div class="col-sm-6 text-right"> <img src="{{ asset('assets/images/card-icon.png')}}" alt=""> </div> --}}
        </div>
      </div>
    </div>

    <!-- End Footer -->

    <!-- GO TO TOP  -->
    <a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a>
    <!-- GO TO TOP End -->
  </div>
  <!-- End Page Wrapper -->
<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
    var options = {
    whatsapp: "+254 729 081936", // WhatsApp number
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
  <!-- JavaScripts -->
  <script src="{{ asset('assets/js/vendors/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('assets/js/vendors/wow.min.js')}}"></script>
  <script src="{{ asset('assets/js/vendors/bootstrap.min.js')}}"></script>
  <script src="{{ asset('assets/js/vendors/own-menu.js')}}"></script>
  <script src="{{ asset('assets/js/vendors/jquery.sticky.js')}}"></script>
  <script src="{{ asset('assets/js/vendors/owl.carousel.min.js')}}"></script>

  <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
  <script type="text/javascript" src="{{ asset('assets/rs-plugin/js/jquery.tp.t.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('assets/rs-plugin/js/jquery.tp.min.js')}}"></script>
  <script src="{{ asset('assets/js/main.js')}}"></script>
</body>


</html>
