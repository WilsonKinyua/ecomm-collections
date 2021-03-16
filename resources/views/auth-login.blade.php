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
                                        <a class="nav-link active" href="#signin">Sign in</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="" href="{{ route('auth.register.user') }}">Register</a>
                                    </li> --}}
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="signin">
                                        <form action="#">
                                            <div class="form-group">
                                                <label for="singin-email">email address:</label>
                                                <input type="text" class="form-control" id="singin-email" name="singin-email" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="singin-password">Password:</label>
                                                <input type="password" class="form-control" id="singin-password" name="singin-password"
                                                    required />
                                            </div>
                                            <div class="form-footer">
                                                <div class="form-checkbox">
                                                    <input type="checkbox" class="custom-checkbox" id="signin-remember"
                                                        name="signin-remember" />
                                                    <label class="form-control-label font-secondary" for="signin-remember">Remember
                                                        me</label>
                                                </div>
                                                <a href="{{ route('auth.register.user') }}" class="lost-link font-secondary">No account? Register</a>
                                            </div>
                                            <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                                        </form>
                                        {{-- <div class="form-choice text-center">
                                            <label class="font-secondary">Sign in with social account</label>
                                            <div class="social-links">
                                                <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                                <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                                <a href="#" class="social-link social-google fab fa-google"></a>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="tab-pane" id="register">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="singin-email">Email address:</label>
                                                <input type="email" class="form-control" id="register-email" name="register-email" placeholder="eg john@doe.com" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="singin-email">Address:</label>
                                                <input type="text" class="form-control" id="register-email" name="address" placeholder="eg Majimazuri Kasarani, Nairobi" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="singin-email">Phone Number:</label>
                                                <input type="number" class="form-control" id="phone" name="phone" placeholder="0717255460" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="singin-password">Password:</label>
                                                <input type="password" class="form-control" id="register-password" name="register-password" required />
                                            </div>
                                            <div class="form-footer">
                                                <div class="form-checkbox">
                                                    <input type="checkbox" class="custom-checkbox" id="register-agree" name="register-agree"
                                                        required />
                                                    <label class="form-control-label font-secondary" for="register-agree">I agree to the
                                                        privacy policy</label>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-block" type="submit" name="register">Sign up</button>
                                        </form>
                                            {{-- <div class="form-choice text-center">
                                                <label class="font-secondary">Sign in with social account</label>
                                                <div class="social-links">
                                                    <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                                    <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                                    <a href="#" class="social-link social-google fab fa-google"></a>
                                                </div>
                                            </div> --}}
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
