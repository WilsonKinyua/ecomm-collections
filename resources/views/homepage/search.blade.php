@extends('layouts.homepage')


@section('content')


    <!-- Content -->
    <div id="content">

        <!-- Products -->
        <section class="padding-top-40 padding-bottom-60">
          <div class="container">
            <div class="row">

              {{-- <!-- Shop Side Bar -->
              <div class="col-md-3">
                <div class="shop-side-bar">

                  <!-- Categories -->
                  <h6>Categories</h6>
                  <div class="checkbox-primary">
                    <ul>

                        @foreach ($subcat as $item)
                        <li>
                            <label for="cate1"> {{ $item->name }} </label>
                          </li>
                        @endforeach

                    </ul>
                  </div>


                </div>
              </div> --}}

              <!-- Products -->
              <div class="col-md-9">

                <!-- Short List -->
                <div class="short-lst">
                    {{-- <h2>{{ $products->category->name }}</h2> --}}

                </div>
                <!-- Items -->
                <div class="item-col-4">
                  <!-- Product -->
                  @if (count($products) > 0 )
                  @foreach ($products as $item)
                  <div class="product">
                    <article>
                        @if($item->photo)
                            <img
                            style="height: 190px; width:190px"
                             class="img-responsive" src="{{ $item->photo->getUrl() }}" alt="">
                        @endif
                         {{-- <span
                        class="sale-tag">-25%</span> --}}

                      <!-- Content -->
                      <span class="tag">{{ $item->category->name }}</span> <a href="{{ route('product.details',$item->id)}}" class="tittle">{{ $item->name }}</a>
                      <!-- Reviews -->
                      <p class="rev">
                          {{-- <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                          class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">5
                          Review(s)</span> --}}
                        </p>
                      <div class="price">Ksh {{ $item->price_after }}
                        {{-- <span>Ksh {{ $item->price_before }}</span> --}}
                    </div>
                      <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                    </article>
                  </div>
                  @endforeach
                  @else
                        <h4 class="text-center text-danger">No item found!!</h4>
                  @endif



                </div>
              </div>
            </div>
          </div>
        </section>

      </div>
      <!-- End Content -->


@endsection
