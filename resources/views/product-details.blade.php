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
                                    data-zoom-image="{{ asset($details->photo)}}"
                                    alt="{{ $details->name }}" style="width: 600px !important; height: 400px!important;">
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-details">
                        <div class="product-navigation">
                            <ul class="breadcrumb breadcrumb-lg">
                                <li><a href="/"><i class="d-icon-home"></i></a></li>
                                <li><a class="active">Product</a></li>
                                <li>{{ $details->name }}</li>
                            </ul>
                        </div>

                        <h1 class="product-name">{{ $details->name }}</h1>
                        <div class="product-price">Ksh {{ $details->price_now }}</div>
                        <p class="product-short-desc">
                            {{ $details->description }}
                           </p>

                        <hr class="product-divider">

                        <div class="product-form product-qty">
                            {{-- <label>QTY:</label> --}}
                            <div class="product-form-group">
                                {{-- <div class="input-group">
                                    <button class="quantity-minus d-icon-minus"></button>
                                    <input class="quantity form-control" type="number" min="1" max="1000000">
                                    <button class="quantity-plus d-icon-plus"></button>
                                </div> --}}
                                        {{-- <a href="{{ route('cart.add', $details->id )}}" class="btn-product">Need Help? Chat via Whatsapp</a> --}}
                                        <a href="https://api.whatsapp.com/send?phone=254717180525&text=More for less!! - {{ $details->name }} - {{ trans('panel.site_title') }}" target="_blank" class="btn-product">Need Help? Chat via Whatsapp</a>

                            </div>
                        </div>

                        <hr class="product-divider mb-3">

                        <div class="product-footer">
                            <div class="social-links">
                                <a href="https://www.facebook.com/Castle-Collections-101358578308174" target="_blank" class="social-link social-facebook fab fa-facebook-f"></a>
                                <a href="https://www.instagram.com/castle1_collections/" target="_blank" class="social-link social-twitter fab fa-instagram"></a>
                                <a href="https://chat.whatsapp.com/HMgtavQSJ0G4JncLLptYRz" target="_blank" class="social-link social-linkedin fab fa-whatsapp" ></a>
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
                              @foreach ($comments as $comment)
                                <li>
                                    <div class="comment">
                                        {{-- <figure class="comment-media">
                                            <a href="#">
                                                <img src="{{ asset('assets/images/blog/comments/1.jpg')}}" alt="avatar">
                                            </a>
                                        </figure> --}}
                                        <div class="comment-body">
                                            {{-- <div class="comment-rating ratings-container mb-0">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width:80%"></span>
                                                    <span class="tooltiptext tooltip-top">4.00</span>
                                                </div>
                                            </div> --}}
                                            <div class="comment-user">
                                                <h4><a href="#">{{ $comment->name }}</a></h4>
                                                <span class="comment-date">

                                                    {{ $comment->created_at }}
                                                </span>
                                            </div>

                                            <div class="comment-content">
                                                <p>{{ $comment->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                            </ul>
                        </div>
                        <!-- End Comments -->
                        <div class="reply">
                            <div class="title-wrapper text-left">
                                <h3 class="title title-simple text-left text-normal">Add a Review</h3>
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                     @if(session('message'))
                                     <div class="row mb-2">
                                         <div class="col-lg-12">
                                             <div style="color: white" class="alert alert-success" role="alert">{{ session('message') }}</div>
                                         </div>
                                     </div>
                                     @endif
                                     @if($errors->count() > 0)
                                         <div class="alert alert-danger">
                                             <ul class="list-unstyled">
                                                 @foreach($errors->all() as $error)
                                                     <li>{{ $error }}</li>
                                                 @endforeach
                                             </ul>
                                         </div>
                                     @endif
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
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

                                {{-- <select name="rating" id="rating" required="" style="display: none;">
                                    <option value="">Rate…</option>
                                    <option value="5">Perfect</option>
                                    <option value="4">Good</option>
                                    <option value="3">Average</option>
                                    <option value="2">Not that bad</option>
                                    <option value="1">Very poor</option>
                                </select> --}}
                            </div>
                            <form method="POST" action="{{ route("admin.comments.store") }}" enctype="multipart/form-data">
                                @csrf
                                <textarea id="reply-message" cols="30" rows="4" name="description" class="form-control mb-4"
                                    placeholder="Comment *" required></textarea>
                                    <input type="hidden" name="product" value="{{ $details->id }}">
                                    <input type="hidden" name="product_name" value="{{ $details->name }}">
                                <div class="row">
                                    <div class="col-md-6 mb-5">
                                        <input type="text" class="form-control" id="reply-name"
                                            name="name" placeholder="Name *" required />
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <input type="email" class="form-control" id="reply-email"
                                            name="email" placeholder="Email *" required />
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
