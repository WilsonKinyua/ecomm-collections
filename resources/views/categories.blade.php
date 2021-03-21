@extends('layouts.home-page')
{{-- @section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection --}}

@section('content')

<main class="main mt-lg-4">
    <div class="page-content">
        <div class="container">
            <div class="row">

                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <li><a href="#" class="menu-title">Popular Categories</a></li>

                            <ul>
                                @foreach ($categories as $item)
                                <li>
                                    <a href="{{ route('product.category',$item->id) }}">{{ $item->name }}</a>
                                </li>
                                @endforeach
                              </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">

                </div>

            </div>
        </div>
    </div>
</main>


@endsection
