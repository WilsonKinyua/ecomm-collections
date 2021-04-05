@extends('layouts.homepage')

@section('content')


<div id="content">
    <!-- Products -->
    <section class="padding-top-40 padding-bottom-60">
       <div class="container">
          <div class="row">
             <!-- Shop Side Bar -->
             <div class="col-md-4"></div>
             <div class="col-md-4">
                <div class="shop-side-bar">
                   <!-- Categories -->
                   <h6 style="color: red; margin-left:5px">Please Select Category to view Product</h6>
                   <div class=" checkbox-primary">
                      <ul>
                        @foreach ($categories as $cat)
                        <li>
                            <label for="cate1"> <a style="text-align: center !important; background-color:#0a95da" class="btn" href="{{ route('categ.product', $cat->id) }}">{{ $cat->name }}</a></label>
                         </li>
                        @endforeach
                      </ul>
                   </div>

                </div>
             </div>
             <div class="col-md-4"></div>
          </div>
       </div>
    </section>


 </div>


@endsection
