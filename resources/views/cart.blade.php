@extends('layouts.home-page')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css')}}">
@endsection
@section('content')

<main class="main cart">
    <div class="page-content pt-10 pb-10">
        <div class="step-by pt-2 pb-2 pr-4 pl-4">
            <h3 class="title title-simple title-step active"><a href="{{ route('cart.cart')}}">1. Shopping Cart</a></h3>
            <h3 class="title title-simple title-step"><a href="#">2. Checkout</a></h3>
            <h3 class="title title-simple title-step"><a href="#">3. Order Complete</a></h3>
        </div>
        <div class="container mt-8 mb-4">
            <div class="row gutter-lg">
                <div class="col-lg-8 col-md-12">
                    <table class="shop-table cart-table mt-2">
                        <thead>
                            <tr>
                                <th><span>Product</span></th>
                                <th></th>
                                <th><span>Price</span></th>
                                <th><span>quantity </span></th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        {{-- {{ Cart::getTotalQuantity() }} --}}
                        <tbody>
                            @foreach (Cart::getContent() as $item)
                            <tr>
                                <td class="product-thumbnail">
                                    <figure>
                                        <a href="{{ route('product.details', $item->id)}}">
                                            <img src="{{ asset($item->associatedModel->photo)}}" width="100" height="100"
                                            alt="product">
                                        </a>
                                        <a href="#" class="product-remove" title="Remove this product">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </figure>
                                </td>
                                <td class="product-name">
                                    <div class="product-name-section">
                                        <a href="{{ route('product.details', $item->id)}}">{{ $item->name }}</a>
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">Ksh {{ $item->price }}</span>
                                </td>


                                <td class="product-quantity">
                                    <div class="input-group">
                                        {{-- <button class="quantity-minus d-icon-minus"></button> --}}
                                        {{-- <input class="quantity form-control" type="number" min="1" max="1000000"> --}}
                                        <form action="{{ route('cart.update')}}" method="POST" >
                                            @csrf
                                        <input type="hidden" name="itemId" value="{{ $item->id }}">
                                        <input class="form-control" name="quantity" type="number" value="{{ $item->quantity }}">
                                        {{-- <button class="quantity-plus d-icon-plus"></button> --}}
                                    </div>
                                </td>
                                <td class="product-price">
                                    <span class="amount">{{ ($item->price * $item->quantity) }}</span>
                                </td>
                                <td>
                                    <button type="submit" name="update" class="btn btn-md btn-icon-left"><i
                                        class="d-icon-refresh"></i>Update</button>
                                    </form>
                                </td>


                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="cart-actions mb-6 pt-6">
                        {{-- <div class="coupon">
                            <input type="text" name="coupon_code" class="input-text form-control" id="coupon_code" value="" placeholder="Coupon code">
                            <button type="submit" class="btn btn-md">Apply Coupon</button>
                        </div> --}}
                        {{-- <button type="submit" class="btn btn-md btn-icon-left"><i
                                class="d-icon-refresh"></i>Update Cart</button> --}}
                    </div>
                </div>
                <aside class="col-lg-4 sticky-sidebar-wrapper">
                    <div class="sticky-sidebar" data-sticky-options="{'bottom': 20}">
                        <div class="summary mb-4">
                            <h3 class="summary-title text-left">Cart Totals</h3>
                            <table class="shipping">
                                <tr class="summary-subtotal">
                                    <td>
                                        <h4 class="summary-subtitle">Subtotal</h4>
                                    </td>
                                    <td>
                                        <p class="summary-subtotal-price">Ksh {{ Cart::getSubTotal() }}</p>
                                    </td>
                                </tr>

                            </table>

                            <table>
                                <tr class="summary-subtotal">
                                    <td>
                                        <h4 class="summary-subtitle">Total</h4>
                                    </td>
                                    <td>
                                        <p class="summary-total-price">Ksh {{ Cart::getTotal() }}</p>
                                    </td>
                                </tr>
                            </table>
                            <a href="checkout.html" class="btn btn-dark btn-checkout">Proceed to checkout</a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</main>
@endsection
