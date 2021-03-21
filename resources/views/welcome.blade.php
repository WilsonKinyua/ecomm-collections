@extends('layouts.home-page')

@section('content')

<main class="main mt-lg-4">
    <div class="page-content">
        <div class="container">
            <div class="row">
                <aside class="col-xl-3 col-lg-4 sidebar sidebar-fixed sticky-sidebar-wrapper home-sidebar">
                    <div class="sidebar-overlay">
                        <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
                    </div>
                    <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-right"></i></a>
                    <div class="sidebar-content">
                        <div class="sticky-sidebar">
                            <ul class="menu vertical-menu category-menu mb-4">
                                <li><a href="#" class="menu-title">Popular Categories</a></li>
                                <li><a href="#" class="menu-title">Trendy House holds</a></li>
                               @foreach ($categories as $item)
                                <li>
                                    <a href="{{ route('product.category',$item->id) }}">{{ $item->name }}</a>
                                </li>
                               @endforeach
                               <li><a href="#" class="menu-title">Kitchenware category</a></li>
                            </ul>
                            {{-- <div class="widget widget-products" data-animation-options="{
                                'delay': '.3s'
                            }">
                                <h4 class="widget-title">Our Featured</h4>
                                <div class="widget-body">
                                    <div class="owl-carousel owl-nav-top" data-owl-options="{
                                        'items': 1,
                                        'loop': true,
                                        'nav': true,
                                        'dots': false,
                                        'margin': 20
                                    }">
                                        <div class="products-col">

                                           @foreach ($featured as $item)
                                           <div class="product product-list-sm">
                                            <figure class="product-media">
                                                <a href="{{ route('product.details', $item->id)}}">
                                                    <img src="{{ asset($item->photo)}}"
                                                        alt="product" style="width: 200px; height: 200px">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-name">
                                                    <a href="{{ route('product.details', $item->id)}}">{{ $item->name }}</a>
                                                </h3>

                                                <div class="product-price">
                                                    <span class="price">Ksh {{ $item->price_now }}</span>
                                                </div>
                                            </div>
                                        </div>
                                           @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </aside>


                {{-- banners top --}}
                <div class="col-xl-9 col-lg-8">
                    <section class="intro-section mb-3">
                        <div class="owl-carousel owl-theme row owl-dot-inner owl-dot-white intro-slider animation-slider cols-1 mb-4"
                            data-owl-options="{
                            'items': 1,
                            'dots': true,
                            'nav': false,
                            'loop': true,
                            'autoplay': false,
                            'animateOut': 'fadeOutDown'
                        }">
                            <div class="banner banner-fixed intro-slide1">
                                <figure>
                                    <img src="{{ asset('assets/images/demos/demo3/slides/1.jpg')}}" alt="intro-banner" width="880"
                                        height="474" />
                                </figure>
                                <div class="banner-content y-50 slide-animate" data-animation-options="{
                                    'name': 'fadeIn',
                                    'delay': '.2s',
                                    'duration': '1s'
                                }">
                                    <h4 class="banner-subtitle mb-2 text-white">New Collection</h4>
                                    <h2 class="banner-title mb-0 text-uppercase ls-l">Fashion Trends</h2>
                                    <p class="font-primary font-weight-semi-bold ls-l text-dark mb-3">Get Free
                                        Shipping on all orders over $75</p>
                                    <div
                                        class="banner-price-info d-flex align-items-center font-secondary font-weight-semi-bold text-uppercase text-white ml-3 mb-6">
                                        <sup class="d-inline-block font-weight-bold ls-l text-dark">up
                                            to</sup><span class="text-primary font-weight-bold">$100</span>off
                                    </div>
                                    <a href="#" class="btn btn-solid">Shop Now</a>
                                </div>
                            </div>
                            <div class="banner banner-fixed intro-slide2">
                                <figure>
                                    <img src="{{ asset('assets/images/demos/demo3/slides/2.jpg')}}" alt="intro-banner" width="880"
                                        height="474" />
                                </figure>
                                <div class="banner-content y-50 pb-10 text-right">
                                    <h4 class="banner-subtitle text-primary mb-3 slide-animate"
                                        data-animation-options="{
                                        'name': 'fadeInRightShorter',
                                        'duration': '1s'
                                    }">Up to 25% Off</h4>
                                    <h2 class="banner-title text-uppercase ls-l mb-0 slide-animate"
                                        data-animation-options="{
                                        'name': 'fadeInRightShorter',
                                        'delay': '.2s',
                                        'duration': '1s'
                                    }">For Women’s</h2>
                                    <p class="font-primary font-weight-semi-bold ls-l text-dark mb-6 slide-animate"
                                        data-animation-options="{
                                        'name': 'fadeInRightShorter',
                                        'delay': '.3s',
                                        'duration': '1s'
                                    }">Start at $12.00</p>
                                    <a href="#" class="btn btn-outline btn-dark mb-2 slide-animate"
                                        data-animation-options="{
                                        'name': 'fadeInRightShorter',
                                        'delay': '.5s',
                                        'duration': '1s'
                                    }">Shop Now</a>
                                </div>
                            </div>
                            <div class="banner banner-fixed intro-slide3">
                                <figure>
                                    <img src="{{ asset('assets/images/demos/demo3/slides/3.jpg')}}" alt="intro-banner" width="880"
                                        height="474" />
                                </figure>
                                <div class="banner-content y-50 pb-3">
                                    <h4 class="banner-subtitle ls-l mb-0 slide-animate" data-animation-options="{
                                        'name': 'fadeInUpShorter',
                                        'delay': '.1s',
                                        'duration': '1s'
                                    }">For Women’s</h4>
                                    <h2 class="banner-title text-uppercase ls-m mb-1 slide-animate"
                                        data-animation-options="{
                                        'name': 'fadeInUpShorter',
                                        'delay': '.1s',
                                        'duration': '1s'
                                    }">New Shoes</h2>
                                    <p class="font-primary ls-m mb-5 text-dark text-uppercase slide-animate"
                                        data-animation-options="{
                                        'name': 'fadeInUpShorter',
                                        'delay': '.3s',
                                        'duration': '1s'
                                    }">From $19.00</p>
                                    <a href="#" class="btn btn-dark slide-animate" data-animation-options="{
                                        'name': 'fadeInUpShorter',
                                        'delay': '.5s',
                                        'duration': '1s'
                                    }">Shop Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="category category-absolute category-banner overlay-light">
                                    <a href="#">
                                        <figure class="category-media">
                                            <img src="{{ asset('assets/images/demos/demo3/banners/1.jpg')}}" alt="category"
                                                width="430" height="189">
                                        </figure>
                                    </a>
                                    <div class="category-content">
                                        <h4 class="category-name">For Fitness</h4>
                                        <span class="category-count">
                                            <span>6</span> Products
                                        </span>
                                        <a href="#" class="btn btn-underline btn-link btn-sm">Shop Now<i
                                                class="d-icon-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="category category-absolute category-banner overlay-light">
                                    <a href="#">
                                        <figure class="category-media">
                                            <img src="{{ asset('assets/images/demos/demo3/banners/2.jpg')}}" alt="category"
                                                width="430" height="189">
                                        </figure>
                                    </a>
                                    <div class="category-content">
                                        <h4 class="category-name">Summer Season’s</h4>
                                        <span class="category-count">
                                            <span>6</span> Products
                                        </span>
                                        <a href="#" class="btn btn-underline btn-link btn-sm">Shop Now<i
                                                class="d-icon-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="product-wrapper mb-4">
                        <h2 class="title title-underline with-link appear-animate" data-animation-options="{
                            'delay': '.3s'
                        }">Trendy House holds<a href="#">View more<i class="fas fa-chevron-right"></i></a></h2>
                        <div class="row gutter-xs appear-animate" data-animation-options="{
                            'delay': '.3s'
                        }">

                        @foreach ($products as $product)
                        <div class="col-md-3 col-6 mb-4">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ route('product.details', $product->id)}}">
                                        <img src="{{ asset($product->photo)}}" alt="product"
                                            width="280" height="315">
                                    </a>
                                    <div class="product-action">
                                        {{-- <a href="" class="btn-product"
                                            title="Add to Cart">Add to Cart</a> --}}
                                    </div>

                                    <div>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        @foreach($product->categories as $key => $item)
                                            <a href="{{ route('product.category',$item->id) }}">{{ $item->name }}</a>
                                        @endforeach
                                    </div>
                                    <h3 class="product-name">
                                        <a href="{{ route('product.details', $product->id)}}">{{ $product->name}}</a>
                                    </h3>
                                    <div class="product-price">
                                        <ins class="new-price">Ksh {{ $product->price_now}} </ins><del
                                            class="old-price">Ksh {{ $product->price_before}}</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </section>
{{--
                    <section class="banner banner-cta mb-7 text-center"
                        style="background-image: url({{ asset('assets/images/demos/demo3/banner.jpg')}})">
                        <div class="banner-content appear-animate" data-animation-options="{
                            'delay': '.2s',
                            'name': 'blurIn'
                        }">
                            <h4 class="banner-subtitle font-weight-bold ls-s text-white text-uppercase">Coming
                                soon</h4>
                            <h2 class="banner-title font-weight-normal ls-m mb-2"><strong>Which is</strong>
                                ....</h2>
                            <p class="font-primary text-dark">Get 10% off first order</p>
                            <form action="#" method="get" class="input-wrapper input-wrapper-inline">
                                <input type="email" class="form-control mb-4" name="email" id="email"
                                    placeholder="Email address here..." required />
                                <button class="btn btn-dark btn-sm" type="submit">Subscribe</button>
                            </form>
                        </div>
                    </section> --}}

                    <section class="product-wrapper mb-4">
                        <h2 class="title title-underline with-link appear-animate" data-animation-options="{
                            'delay': '.3s'
                        }">Kitchenware Products<a href="#">View more<i class="fas fa-chevron-right"></i></a></h2>
                        <div class="row gutter-xs appear-animate" data-animation-options="{
                            'delay': '.3s'
                        }">

                        @foreach ($productslatest as $product)
                        <div class="col-md-3 col-6 mb-4">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ route('product.details', $product->id)}}">
                                        <img src="{{ asset($product->photo)}}"
                                        alt="product" style="width: 200px; height: 200px">
                                    </a>
                                    <div class="product-action">
                                        {{-- <a href="" class="btn-product"
                                            title="Add to Cart">Add to Cart</a> --}}
                                    </div>

                                    <div>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        @foreach($product->categories as $key => $item)
                                            <a href="{{ route('product.category',$item->id) }}">{{ $item->name }}</a>
                                        @endforeach
                                    </div>
                                    <h3 class="product-name">
                                        <a href="{{ route('product.details', $product->id)}}">{{ $product->name}}</a>
                                    </h3>
                                    <div class="product-price">
                                        <ins class="new-price">Ksh {{ $product->price_now}} </ins><del
                                            class="old-price">Ksh {{ $product->price_before}}</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
