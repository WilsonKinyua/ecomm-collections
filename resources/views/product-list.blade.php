@extends('layouts.home-page')

@section('content')

<main class="main">
    <div class="page-header" style="background-image: url(images/page-header.jpg)">
        <h1 class="page-title">Products</h1>
        <ul class="breadcrumb">
            <li><a href="/"><i class="d-icon-home"></i></a></li>
            <li><a href="#">Products</a></li>
            <li>{{ $category_name->name }}</li>
        </ul>
    </div>
    <!-- End PageHeader -->
    <div class="page-content">
        <div class="container">



            <section class="mt-1">
                <h2 class="title">{{ $category_name->name }} </h2>
                <div class="row product-wrapper split-line ml-0 mr-0">
                   @if (count($products)>0)
                   @foreach ($products as $item)
                   <div class="col-xl-5col col-md-3 col-6">
                       <div class="product product-slideup text-center">
                           <figure class="product-media">
                               <a href="{{ route('product.details', $item->id)}}">
                                   <img src="{{ asset($item->photo)}}" alt="product" style="width: 200px; height: 200px">
                               </a>
                           </figure>
                           <div class="product-details">
                               <h3 class="product-name">
                                   <a href="{{ route('product.details', $item->id)}}">{{ $item->name }}</a>
                               </h3>
                               <div class="product-price">
                                   <ins class="new-price">Ksh {{ $item->price_now }}</ins><del class="old-price">Ksh {{ $item->price_before }}</del>
                               </div>
                               {{-- <div class="ratings-container">
                                   <div class="ratings-full">
                                       <span class="ratings" style="width:100%"></span>
                                       <span class="tooltiptext tooltip-top"></span>
                                   </div>
                                   <a href="{{ route('product.details', $item->id)}}" class="rating-reviews">( 6 reviews )</a>
                               </div> --}}
                               {{-- <div class="product-action">
                                   <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                           class="d-icon-heart"></i></a>
                                   <a href="#" class="btn-product btn-cart" data-toggle="modal"
                                       data-target="#addCartModal" title="Add to cart">add to cart</a>
                                   <a href="#" class="btn-product-icon btn-quickview" title="Quick View"><i
                                           class="d-icon-search"></i></a>
                               </div> --}}
                           </div>
                       </div>
                   </div>
                   @endforeach
                   @else
                        <p class="text-center bg-danger">No products in the selected category!</p>
                   @endif
                </div>
            </section>
            {{-- <section>
                <h2 class="title">View More Categories</h2>

                <div class="owl-carousel owl-theme owl-nav-full row cols-2 cols-md-3 cols-lg-4"
                    data-owl-options="{
                    'items': 5,
                    'nav': false,
                    'loop': false,
                    'dots': true,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 2
                        },
                        '768': {
                            'items': 3
                        },
                        '992': {
                            'items': 4,
                            'dots': false,
                            'nav': true
                        }
                    }
                }">
                @foreach ($categories as $item)
                <div class="product shadow-media">
                    <div class="product-details">
                        <h3 class="product-name">
                            <a href="demo3-product.html">{{ $item->name }}</a>
                        </h3>
                    </div>
                </div>
                @endforeach
                </div>
            </section> --}}
        </div>
    </div>
</main>

@endsection
