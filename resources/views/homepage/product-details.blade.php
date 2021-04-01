@extends('layouts.homepage')

@section('content')

      <!-- Linking -->
      <div class="linking">
        <div class="container">
           <ol class="breadcrumb">
              <li><a href="/">Home</a></li>
              <li><a href="#">{{ $product->category->name }}</a></li>
              <li class="active">{{ $product->name }}</li>
           </ol>
        </div>
     </div>
     <!-- Content -->
     <div id="content">
        <!-- Products -->
        <section class="padding-top-40 padding-bottom-60">
           <div class="container">
              <div class="row">
                 <!-- Shop Side Bar -->
                 <div class="col-md-3">
                    <div class="shop-side-bar">
                       <!-- Categories -->
                       <h6>Categories</h6>
                       <div class=" checkbox-primary">
                          <ul>
                              @foreach ($subcat as $item)
                              <li>
                                {{-- <input id="cate1" class="styled" type="checkbox"> --}}
                                <label for="cate1"> {{ $item->name }} </label>
                             </li>
                              @endforeach

                          </ul>
                       </div>
                       <!-- Categories -->
                    </div>
                 </div>
                 <!-- Products -->
                 <div class="col-md-9">
                    <div class="product-detail">
                       <div class="product">
                          <div class="row">
                             <!-- Slider Thumb -->
                             <div class="col-xs-5">
                                <article class="slider-item on-nav">
                                   <!-- <div id="slider" class="thumb-slider">
                                         <ul class="slides">
                                            <li data-thumb="images/item-img-1-1.jpg"> <img src="images/item-img-1-1.jpg" alt="" > </li>
                                            <li data-thumb="images/item-img-1-2.jpg"> <img src="images/item-img-1-2.jpg" alt="" > </li>
                                            <li data-thumb="images/item-img-1-3.jpg"> <img src="images/item-img-1-3.jpg" alt="" > </li>
                                            <li data-thumb="images/item-img-1-3.jpg"> <img src="images/item-img-1-3.jpg" alt="" > </li>
                                            <li data-thumb="images/item-img-1-3.jpg"> <img src="images/item-img-1-3.jpg" alt="" > </li>
                                         </ul>
                                      </div>
                                                                            <div id="carousel" class="thumb-slider">
                                       <ul class="slides">
                                         <li>
                                           <img src="slide1.jpg" />
                                         </li>
                                         <li>
                                           <img src="slide2.jpg" />
                                         </li>
                                         <li>
                                           <img src="slide3.jpg" />
                                         </li>
                                         <li>
                                           <img src="slide4.jpg" />
                                         </li>
                                       </ul>
                                                                            </div> -->
                                   <div id="slider" class="flexslider">
                                      <ul class="slides">
                                        @if($product->photo)
                                            <li>
                                                <img src="{{ $product->photo->getUrl() }}" alt="">
                                            </li>
                                        @endif
                                         <!-- items mirrored twice, total of 12 -->
                                      </ul>
                                   </div>
                                   <div id="carousel" class="flexslider">
                                      <ul class="slides">

                                            @if($product->photo)
                                            <li>
                                                <img src="{{ $product->photo->getUrl() }}" alt="">
                                            </li>
                                            @endif

                                         {{-- <li>
                                            <img src="images/item-img-1-2.jpg" alt="">
                                         </li>
                                         <li>
                                            <img src="images/item-img-1-3.jpg" alt="">
                                         </li>
                                         <li>
                                            <img src="images/item-img-1-1.jpg" alt="">
                                         </li>
                                         <li>
                                            <img src="images/item-img-1-2.jpg" alt="">
                                         </li>
                                         <li>
                                            <img src="images/item-img-1-3.jpg" alt="">
                                         </li> --}}
                                         <!-- items mirrored twice, total of 12 -->
                                      </ul>
                                   </div>
                                </article>
                             </div>
                             <!-- Item Content -->
                             <div class="col-xs-7">
                                <span class="tags">{{ $product->category->name }}</span>
                                <h5>{{ $product->name }}</h5>
                                {{-- <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                      class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                   <span class="margin-left-10">5 Review(s)</span></p> --}}
                                <div class="row">
                                   <div class="col-sm-6"><span class="price">Ksh {{ $product->price_after }}  </span></div>
                                   {{-- <div class="col-sm-6">
                                      <p>Availability: <span class="in-stock">In stock</span></p>
                                   </div> --}}
                                </div>
                                <!-- List Details -->
                                <ul class="bullet-round-list">
                                    <p>{{ $product->description }}</p>
                                   {{-- <li>Screen: 1920 x 1080 pixels</li>
                                   <li>Processor: 2.5 GHz None</li>
                                   <li>RAM: 8 GB</li>
                                   <li>Hard Drive: Flash memory solid state</li>
                                   <li>Graphics : Intel HD Graphics 520 Integrated</li>
                                   <li>Card Description: Integrated</li> --}}
                                </ul>
                                <!-- Colors -->
                                {{-- <div class="row">
                                   <div class="col-xs-5">
                                      <div class="clr"> <span style="background:#068bcd"></span> <span
                                            style="background:#d4b174"></span> <span style="background:#333333"></span>
                                      </div>
                                   </div>
                                   <!-- Sizes -->
                                   <div class="col-xs-7">
                                      <div class="sizes"> <a href="#.">S</a> <a class="active" href="#.">M</a> <a
                                            href="#.">L</a> <a href="#.">XL</a> </div>
                                   </div>
                                </div>
                                <!-- Compare Wishlist -->
                                <ul class="cmp-list">
                                   <li><a href="#."><i class="fa fa-heart"></i> Add to Wishlist</a></li>
                                   <li><a href="#."><i class="fa fa-navicon"></i> Add to Compare</a></li>
                                   <li><a href="#."><i class="fa fa-envelope"></i> Email to a friend</a></li>
                                </ul> --}}
                                <!-- Quinty -->
                               <form action="">
                                <div class="quinty">
                                    <input type="number" value="01">
                                 </div>
                                 <a href="#." class="btn-round"><i class="icon-basket-loaded margin-right-5 margin-top-5"></i> Add to
                                    Cart
                                </a>
                               </form>
                               <a target="_blank" href="https://wa.me/254729081936?text=Hi%20there%20%F0%9F%91%8B%20Welcome%20to%20Castle%20Homes" class="btn-round margin-top-5">
                                Need Help? Chat via Whatsapp
                                </a> <br>
                                {{-- <a href="#." class="btn-round margin-top-5">
                                    CALL TO ORDER(CAROLYNE)
                                </a>
                                <a href="#." class="btn-round margin-top-5">
                                    CALL TO ORDER(FIONA)
                                </a> --}}
                             </div>
                          </div>
                       </div>
                       <!-- Details Tab Section-->
                       <div class="item-tabs-sec">
                          <!-- Nav tabs -->
                          <ul class="nav" role="tablist">
                             <li role="presentation" class="active"><a href="#pro-detil" role="tab"
                                   data-toggle="tab">Product Details</a></li>
                             <li role="presentation"><a href="#cus-rev" role="tab" data-toggle="tab">Customer
                                   Reviews</a></li>
                          </ul>
                          <!-- Tab panes -->
                          <div class="tab-content">
                             <div role="tabpanel" class="tab-pane fade in active" id="pro-detil">
                                <!-- List Details -->
                                <p>
                                    {{ $product->description }}
                                </p>

                             </div>
                             <div role="tabpanel" class="tab-pane fade" id="cus-rev">
                                4G bands: LTE 700 / 800 / 850<br>
                                900 / 1800 / 1900 / 2100 / 2600
                             </div>
                             <div role="tabpanel" class="tab-pane fade" id="ship"></div>
                          </div>
                       </div>
                    </div>
                    <!-- Related Products -->

                 </div>
              </div>
           </div>
        </section>

     </div>
     <!-- End Content -->

@endsection