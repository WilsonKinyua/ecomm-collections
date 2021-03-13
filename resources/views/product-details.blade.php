@extends('layouts.home-page')

@section('content')
<main class="main mt-4">
    <div class="page-content mb-10">
        <div class="container">
            <div class="product product-single row mb-4">
                <div class="col-md-6">
                    <div class="product-gallery pg-vertical">
                        <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
                            <figure class="product-image">
                                <img src="{{ asset($details->photo)}}"
                                    data-zoom-image="images/product/product-1-800x900.jpg"
                                    alt="Women's Brown Leather Backpacks" width="800" height="900">
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-details">
                        <div class="product-navigation">
                            <ul class="breadcrumb breadcrumb-lg">
                                <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
                                <li><a class="active">Product</a></li>
                                <li>{{ $details->name }}</li>
                            </ul>

                            {{-- <ul class="product-nav">
                                <li class="product-nav-prev">
                                    <a href="#">
                                        <i class="d-icon-arrow-left"></i> Prev
                                        <span class="product-nav-popup">
                                            <img src="images/product/product-thumb-prev.jpg"
                                                alt="product thumbnail" width="110" height="123">
                                            <span class="product-name">Sed egtas Dnte Comfort</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="product-nav-next">
                                    <a href="#">
                                        Next <i class="d-icon-arrow-right"></i>
                                        <span class="product-nav-popup">
                                            <img src="images/product/product-thumb-next.jpg"
                                                alt="product thumbnail" width="110" height="123">
                                            <span class="product-name">Sed egtas Dnte Comfort</span>
                                        </span>
                                    </a>
                                </li>
                            </ul> --}}
                        </div>

                        <h1 class="product-name">{{ $details->name }}</h1>
                        {{-- <div class="product-meta">
                            SKU: <span class="product-sku">12345670</span>
                            BRAND: <span class="product-brand">The Northland</span>
                        </div> --}}
                        <div class="product-price">Ksh {{ $details->price_now }}</div>
                        {{-- <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:80%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( 6 reviews )</a>
                        </div> --}}
                        <p class="product-short-desc">
                            {{ $details->description }}
                           </p>

                        <hr class="product-divider">

                        <div class="product-form product-qty">
                            <label>QTY:</label>
                            <div class="product-form-group">
                                <div class="input-group">
                                    <button class="quantity-minus d-icon-minus"></button>
                                    <input class="quantity form-control" type="number" min="1" max="1000000">
                                    <button class="quantity-plus d-icon-plus"></button>
                                </div>
                                <button class="btn-product btn-cart"><i class="d-icon-bag"></i>Add To
                                    Cart</button>
                            </div>
                        </div>

                        <hr class="product-divider mb-3">

                        <div class="product-footer">
                            <div class="social-links">
                                <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                <a href="#" class="social-link social-vimeo fab fa-vimeo-v"></a>
                            </div>
                            {{-- <div class="product-action">
                                <a href="#" class="btn-product btn-wishlist"><i class="d-icon-heart"></i>Add To
                                    Wishlist</a>
                                <span class="divider"></span>
                                <a href="#" class="btn-product btn-compare"><i class="d-icon-random"></i>Add To
                                    Compare</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab tab-nav-simple product-tabs mb-4">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#product-tab-description">Description</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#product-tab-additional">Additional</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#product-tab-shipping-returns">Shipping &amp; Returns</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#product-tab-reviews">Reviews</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active in" id="product-tab-description">
                        <p>
                            {{ $details->description }}
                        </p>
                    </div>


                    <div class="tab-pane " id="product-tab-reviews">
                        {{-- <div class="d-flex align-items-center mb-5">
                            <h4 class="mb-0 mr-2">Average Rating:</h4>
                            <div class="ratings-container average-rating mb-0">
                                <div class="ratings-full">
                                    <span class="ratings" style="width:80%"></span>
                                    <span class="tooltiptext tooltip-top">4.00</span>
                                </div>
                            </div>
                        </div> --}}

                        <div class="comments mb-6">
                            <ul>
                                <li>
                                    <div class="comment">
                                        <figure class="comment-media">
                                            <a href="#">
                                                <img src="{{ asset('assets/images/blog/comments/1.jpg')}}" alt="avatar">
                                            </a>
                                        </figure>
                                        <div class="comment-body">
                                            <div class="comment-rating ratings-container mb-0">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width:80%"></span>
                                                    <span class="tooltiptext tooltip-top">4.00</span>
                                                </div>
                                            </div>
                                            <div class="comment-user">
                                                <h4><a href="#">Jimmy Pearson</a></h4>
                                                <span class="comment-date">November 9, 2018 at 2:19 pm</span>
                                            </div>

                                            <div class="comment-content">
                                                <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor
                                                    libero sodales leo, eget blandit nunc tortor eu nibh. Nullam
                                                    mollis. Ut justo. Suspendisse potenti.
                                                    Sed egestas, ante et vulputate volutpat, eros pede semper
                                                    est, vitae luctus metus libero eu augue. Morbi purus libero,
                                                    faucibus adipiscing, commodo quis, avida id, est. Sed
                                                    lectus. Praesent elementum hendrerit tortor. Sed semper
                                                    lorem at felis. Vestibulum volutpat.</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="comment">
                                        <figure class="comment-media">
                                            <a href="#">
                                                <img src="{{ asset('assets/images/blog/comments/3.jpg')}}" alt="avatar">
                                            </a>
                                        </figure>

                                        <div class="comment-body">
                                            <div class="comment-rating ratings-container mb-0">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width:80%"></span>
                                                    <span class="tooltiptext tooltip-top">4.00</span>
                                                </div>
                                            </div>
                                            <div class="comment-user">
                                                <h4><a href="#">Johnathan Castillo</a></h4>
                                                <span class="comment-date">November 9, 2018 at 2:19 pm</span>
                                            </div>

                                            <div class="comment-content">
                                                <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque
                                                    euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus
                                                    pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- End Comments -->
                        <div class="reply">
                            <div class="title-wrapper text-left">
                                <h3 class="title title-simple text-left text-normal">Add a Review</h3>
                                <p>Your email address will not be published. Required fields are marked *</p>
                            </div>
                            <div class="rating-form">
                                {{-- <label for="rating">Your rating: </label>
                                <span class="rating-stars selected">
                                    <a class="star-1" href="#">1</a>
                                    <a class="star-2" href="#">2</a>
                                    <a class="star-3" href="#">3</a>
                                    <a class="star-4 active" href="#">4</a>
                                    <a class="star-5" href="#">5</a>
                                </span> --}}

                                <select name="rating" id="rating" required="" style="display: none;">
                                    <option value="">Rate…</option>
                                    <option value="5">Perfect</option>
                                    <option value="4">Good</option>
                                    <option value="3">Average</option>
                                    <option value="2">Not that bad</option>
                                    <option value="1">Very poor</option>
                                </select>
                            </div>
                            <form action="#">
                                <textarea id="reply-message" cols="30" rows="4" class="form-control mb-4"
                                    placeholder="Comment *" required></textarea>
                                <div class="row">
                                    <div class="col-md-6 mb-5">
                                        <input type="text" class="form-control" id="reply-name"
                                            name="reply-name" placeholder="Name *" required />
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <input type="email" class="form-control" id="reply-email"
                                            name="reply-email" placeholder="Email *" required />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-md">Submit<i
                                        class="d-icon-arrow-right"></i></button>
                            </form>
                        </div>
                        <!-- End Reply -->
                    </div>
                </div>
            </div>


        </div>
    </div>
</main>



@endsection
