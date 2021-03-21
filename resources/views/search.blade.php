@extends('layouts.home-page')

@section('content')

<main class="main">
    <div class="page-header" style="background-image: url(images/page-header.jpg)">
        <h1 class="page-title">Search results</h1>
    </div>
    <!-- End PageHeader -->
    <div class="page-content">
        <div class="container">



            <section class="mt-10">
                {{-- <h2 class="title">{{ $category_name->name }} </h2> --}}
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
                           </div>
                       </div>
                   </div>
                   @endforeach
                   @else
                        <p class="text-center bg-danger">No search results!</p>
                   @endif
                </div>
            </section>
        </div>
    </div>
</main>

@endsection
