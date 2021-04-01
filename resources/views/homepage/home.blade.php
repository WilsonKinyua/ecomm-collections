@extends('layouts.homepage')

@section('content')


      <!-- Slid Sec -->
      <section class="slid-sec">
        <div class="container">
          <div class="container-fluid">
            <div class="row">

              <!-- Main Slider  -->
              <div  class="col-md-12">

                <!-- Main Slider Start -->
                <div class="tp-banner-container">
                  <div class="tp-banner">
                    <ul>

                        @foreach ($slides as $item)
                        <li data-transition="random" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
                            <!-- MAIN IMAGE -->
                            @if($item->photo)
                                    {{-- <a href="{{ $slide->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $slide->photo->getUrl('thumb') }}">
                                    </a> --}}
                                <img src="{{ $item->photo->getUrl() }}" alt="slider" data-bgposition="center bottom" data-bgfit="cover"
                                data-bgrepeat="no-repeat">
                            @endif


                            {{-- <!-- LAYER NR. 1 -->
                            <div class="tp-caption sfl tp-resizeme" data-x="left" data-hoffset="60" data-y="center"
                              data-voffset="-110" data-speed="800" data-start="800" data-easing="Power3.easeInOut"
                              data-splitin="chars" data-splitout="none" data-elementdelay="0.03" data-endelementdelay="0.4"
                              data-endspeed="300"
                              style="z-index: 5; font-size:30px; font-weight:500; color:#888888;  max-width: auto; max-height: auto; white-space: nowrap;">
                              High Quality VR Glasses </div> --}}

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption sfr tp-resizeme" data-x="left" data-hoffset="60" data-y="center"
                              data-voffset="-60" data-speed="800" data-start="1000" data-easing="Power3.easeInOut"
                              data-splitin="chars" data-splitout="none" data-elementdelay="0.03" data-endelementdelay="0.1"
                              data-endspeed="300"
                              style="z-index: 6; font-size:50px; color:#0088cc; font-weight:800; white-space: nowrap;"> {{ $item->product_category->name }} </div>

                            {{-- <!-- LAYER NR. 3 -->
                            <div class="tp-caption sfl tp-resizeme" data-x="left" data-hoffset="60" data-y="center"
                              data-voffset="10" data-speed="800" data-start="1200" data-easing="Power3.easeInOut"
                              data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1"
                              data-endspeed="300"
                              style="z-index: 7;  font-size:24px; color:#888888; font-weight:500; max-width: auto; max-height: auto; white-space: nowrap;">
                              Starting at </div>

                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption sfr tp-resizeme" data-x="left" data-hoffset="210" data-y="center"
                              data-voffset="5" data-speed="800" data-start="1300" data-easing="Power3.easeInOut"
                              data-splitin="chars" data-splitout="none" data-elementdelay="0.03" data-endelementdelay="0.4"
                              data-endspeed="300"
                              style="z-index: 5; font-size:36px; font-weight:800; color:#000;  max-width: auto; max-height: auto; white-space: nowrap;">
                              $49.99 </div> --}}

                            <!-- LAYER NR. 4 -->
                            <div class="tp-caption lfb tp-resizeme scroll" data-x="left" data-hoffset="60" data-y="center"
                              data-voffset="80" data-speed="800" data-start="1300" data-easing="Power3.easeInOut"
                              data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" data-scrolloffset="0"
                              style="z-index: 8;"><a href="{{ route('product.category',$item->product_category_id )}}" class="btn-round big">Shop Now</a> </div>
                          </li>
                        @endforeach
                      <!-- SLIDE  -->

                    </ul>
                  </div>
                </div>
              </div>

              <!-- Main Slider  -->
              {{-- <div class="col-md-3 no-padding">

                <!-- New line required  -->
                <div class="product">
                  <div class="like-bnr">
                    <div class="position-center-center">
                      <h5>New line required</h5>
                      <h4>Smartphone s7</h4>
                      <span class="price">$259.99</span>
                    </div>
                  </div>
                </div>

                <!-- Weekly Slaes  -->
                <div class="week-sale-bnr">
                  <h4>Weekly <span>Sale!</span></h4>
                  <p>Saving up to 50% off all online
                    store items this week.</p>
                  <a href="#." class="btn-round">Shop now</a>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
      </section>


          <!-- Content -->
    <div id="content">




        <!-- tab Section -->
        <section class="featur-tabs padding-top-60 padding-bottom-60">
          <div class="container">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-pills margin-bottom-40" role="tablist">
              <li role="presentation" class="active"><a href="#featur" aria-controls="featur" role="tab"
                  data-toggle="tab">TRENDY HOUSE HOLDS & KITCHENWARE</a></li>
              {{-- <li role="presentation"><a href="#special" aria-controls="special" role="tab" data-toggle="tab">Special</a>
              </li>
              <li role="presentation"><a href="#on-sal" aria-controls="on-sal" role="tab" data-toggle="tab">Onsale</a>
              </li> --}}
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <!-- Featured -->
              <div role="tabpanel" class="tab-pane active fade in" id="featur">
                <!-- Items Slider -->
                <div class=" with-nav">
                  <!-- Product -->
                  <div class="row">

                    @foreach ($products as $product)
                    <div style="margin-top: 10px" class="col-md-3">
                        <div class="product">
                            <article
                            {{-- style="text-align: center" --}}
                            > <img class="img-responsive" src="{{ asset('assets/images/item-img-1-1.jpg')}}" alt="">
                              <!-- Content -->
                              <span class="tag">{{ $product->category->name }}</span>
                              <a href="{{ route('product.details',$product->id)}}" class="tittle">{{ $product->name }}</a>
                              <!-- Reviews -->
                              <p class="rev">
                                  {{-- <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                  class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5
                                  Review(s)</span> --}}
                                </p>
                              <div class="price">Ksh {{ $product->price_after}} </div>
                              <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a>
                            </article>
                          </div>
                      </div>
                    @endforeach



                    </div>
                  </div>


                </div>
              </div>


            </div>
          </div>
        </section>

   <!-- tab Section -->


</div>
      <!-- End Content -->

@endsection
