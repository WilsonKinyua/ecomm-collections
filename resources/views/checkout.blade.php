@extends('layouts.home-page')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css')}}">
@endsection
@section('content')

<main class="main checkout">
    <!-- <div class="page-header bg-dark"
        style="background-image: url('images/shop/page-header-back.jpg'); background-color: #3C63A4;">
        <h1 class="page-title">Checkout</h1>
        <ul class="breadcrumb">
            <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
            <li>Checkout</li>
        </ul>
    </div> -->
    <!-- End PageHeader -->
    <div class="page-content pt-10 pb-10">
        <div class="step-by pt-2 pb-2 pr-4 pl-4">
            <h3 class="title title-simple title-step visited"><a href="cart.html">1. Shopping Cart</a></h3>
            <h3 class="title title-simple title-step active"><a href="checkout.html">2. Checkout</a></h3>
            <h3 class="title title-simple title-step"><a href="order.html">3. Order Complete</a></h3>
        </div>
        <div class="container mt-8">
            <form action="#" class="form">
                <div class="row gutter-lg">
                    <div class="col-lg-7 mb-6">
                        <h3 class="title title-simple text-left">Billing Details</h3>
                        <div class="row">
                            <div class="col-xs-6">
                                <label>First Name *</label>
                                <input type="text" class="form-control" name="first-name" required="" />
                            </div>
                            <div class="col-xs-6">
                                <label>Last Name *</label>
                                <input type="text" class="form-control" name="last-name" required="" />
                            </div>
                        </div>
                        <label>Street Address *</label>
                        <input type="text" class="form-control" name="address1" required=""
                            placeholder="House number and Street name" />
                        <input type="text" class="form-control" name="address2" required=""
                            placeholder="Appartments, suite, unit etc ..." />
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Town / City *</label>
                                <input type="text" class="form-control" name="city" required="" />
                            </div>
                            <div class="col-xs-6">
                                <label>State / County *</label>
                                <input type="text" class="form-control" name="state" required="" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Email address *</label>
                                <input type="text" class="form-control" name="email-address" required="" />
                            </div>
                            <div class="col-xs-6">
                                <label>Phone *</label>
                                <input type="text" class="form-control" name="phone" required="" />
                            </div>
                        </div>
                        <h3 class="title title-simple text-left mb-3">Additional information</h3>
                        <label>Order Notes (optional)</label>
                        <textarea class="form-control" cols="30" rows="6"
                            placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                    </div>
                    <aside class="col-lg-5 sticky-sidebar-wrapper">
                        <div class="sticky-sidebar" data-sticky-options="{'bottom': 50}">
                            <h3 class="title title-simple text-left">Your Order</h3>
                            <div class="summary mb-4">
                                <table class="order-table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="product-name">Beige knitted shoes <strong class="product-quantity">×&nbsp;1</strong></td>
                                            <td class="product-total">$84.00</td>
                                        </tr>
                                        <tr>
                                            <td class="product-name">Beige knitted shoes <strong class="product-quantity">×&nbsp;1</strong></td>
                                            <td class="product-total">$76.00</td>
                                        </tr>
                                        <tr>
                                            <td class="product-name">Beige knitted shoes <strong class="product-quantity">×&nbsp;1</strong></td>
                                            <td class="product-total">$76.00</td>
                                        </tr>
                                        <tr class="summary-subtotal">
                                            <td>
                                                <h4 class="summary-subtitle">Subtotal</h4>
                                            </td>
                                            <td class="summary-subtotal-price">$220.00
                                            </td>
                                        </tr>

                                        <tr class="summary-subtotal">
                                            <td>
                                                <h4 class="summary-subtitle">Total</h4>
                                            </td>
                                            <td>
                                                <p class="summary-total-price">$220.00</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="payment accordion radio-type">
                                    <h4 class="summary-subtitle">Payment Methods</h4>
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse1" class="collapse">Pay on delivery
                                            </a>
                                        </div>
                                        <div id="collapse1" class="expanded" style="display: block;">
                                            <div class="card-body">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                 Voluptas fugit libero ullam ducimus officia tenetur soluta
                                                 pariatur totam facilis veritatis.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse2" class="expand">Lipa na mpesa</a>
                                        </div>
                                        <div id="collapse2" class="collapsed">
                                            <div class="card-body">
                                                Ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio.
                                                Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="checkout-info">Your personal data will used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                                <button type="submit" class="btn btn-dark btn-order">Place Order</button>
                            </div>
                        </div>
                    </aside>
                </div>
            </form>
        </div>
    </div>
</main>

@endsection
