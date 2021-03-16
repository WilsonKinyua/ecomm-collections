@extends('layouts.home-page')

@section('content')

<main class="main mt-lg-4">
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="login-popup">
                        <div class="form-box">
                            <div class="tab tab-nav-simple tab-nav-boxed form-tab">
                                <ul class="nav nav-tabs nav-fill" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#signin">Register</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="signin">
                                        <form action="{{ route('auth.register')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="singin-email">Name:</label>
                                                <input type="text" class="form-control" id="singin-email" name="name" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="singin-email">Email address:</label>
                                                <input type="text" class="form-control" id="singin-email" name="email" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone:</label>
                                                <input type="text" class="form-control" id="phone" name="phone" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address:</label>
                                                <input type="text" class="form-control" id="address" name="address" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="singin-password">Password:</label>
                                                <input type="password" class="form-control" id="singin-password" name="password"
                                                    required />
                                            </div>
                                            <div class="form-footer">
                                                <a href="#" class="lost-link font-secondary">Lost your password?</a>
                                            </div>
                                            <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>

        </div>
    </div>
</main>



@endsection
