@extends('layouts.front')


@section('content')
    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center justify-content-center text-center">
                <div class="col-lg-12">
                    <h1 class="display-4 mb-3 animated slideInDown">Login</h1>

                </div>

            </div>
        </div>
    </div>
    <!-- Header End -->



    <!-- Page Content -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">

                <a class="btn-block-option fs-sm" href="{{ route('register') }}">Dont have an account, Click here to Register</a>

            </div>
            <div class="row g-0 justify-content-center mt-4">
                <div class="col-lg-4 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                    <form class="js-validation-signin" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="">

                                    <input type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        id="login-username" name="email" placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="">
                                    <input type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        id="login-password" name="password" required autocomplete="current-password"
                                        placeholder="Password">


                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                            id="login-remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="login-remember">Remember Me</label>
                                    </div>

                                    @if (Route::has('password.request'))
                                    <a class="btn-block-option fs-sm" href="{{ route('password.request') }}">Forgot
                                        Password?</a>
                                @endif
                                </div>
                            </div>

                            <div class="col-12 text-center">
                                <button class="btn btn-primary" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- END Page Content -->


    <!-- END Page Content -->
@endsection
