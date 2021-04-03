@extends('layouts.homepage')

@section('content')

<!-- Content -->
<div id="content">

    <!-- Ship Process -->
    <div class="ship-process padding-top-30 padding-bottom-30">
      <div class="container">
        <ul class="row">

          <!-- Step 1 -->
          <li class="col-sm-3">
            <div class="media-left"> <i class="fa fa-check"></i> </div>
            <div class="media-body"> <span>Step 1</span>
              <h6>Shopping Cart</h6>
            </div>
          </li>

          <!-- Step 3 -->
          <li class="col-sm-3 current">
            <div class="media-left"> <i class="flaticon-delivery-truck"></i> </div>
            <div class="media-body"> <span>Step 2</span>
              <h6>Confirmation</h6>
            </div>
          </li>

        </ul>
      </div>
    </div>

    <!-- Payout Method -->
    <section class="padding-bottom-60">
      <div class="container">
        <!-- Payout Method -->
        <div class="pay-method">
          <div class="row">
            <div class="col-md-6">

              <!-- Your information -->
              <div class="heading">
                <h2>Your information</h2>
                <hr>
              </div>
              <form action="{{ route("place.order") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                <!-- Name -->
                <div class="col-sm-6">
                <label> Total Amount
                    <input class="form-control" type="text" name="total" value="Ksh {{ Cart::getTotal() }}" disabled>
                </label>
                </div>

                  <!-- Name -->
                  <div class="col-sm-6">
                    <label> Full name
                      <input class="form-control" type="text" name="customer_name" placeholder="John Doe">
                    </label>
                  </div>

                  <!-- Number -->
                  <div class="col-sm-6">
                    <label> Phone
                      <input class="form-control" type="text" name="customer_phone" placeholder="0717255460">
                    </label>
                  </div>

                  <div class="col-sm-6">
                    <label> Address
                      <input class="form-control" type="text" name="address" placeholder="Maji mazuri Kasarani, Nairobi Kenya">
                    </label>
                  </div>

                  <!-- Number -->
                  <div class="col-sm-6">
                    <label> Email
                      <input class="form-control" type="email" name="email" placeholder="john@doe.com">
                    </label>
                  </div>
                </div>

            </div>

            <!-- Select Your Transportation -->
            <div class="col-md-6">
              <div class="heading">
                <h2>Products</h2>
                <hr>
              </div>
              <div class="transportation">
                <div class="row">

                    @foreach (Cart::getContent() as $item)
                        <div class="col-sm-6">
                            <div class="charges select">
                            <h6>{{ $item->name }}</h6>
                            <br>
                            <span>Quantity - {{ $item->quantity }}</span> <span class="deli-charges"> Ksh {{ $item->price }} </span>
                            </div>
                        </div>
                    @endforeach

                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Button -->
        <div class="pro-btn"> <a href="/cart" class="btn-round btn-light">Back to Cart</a>
             <button type="submit" class="btn-round">Confirm Order</button> </div>
        </form>
      </div>
    </section>


  </div>
  <!-- End Content -->

@endsection
