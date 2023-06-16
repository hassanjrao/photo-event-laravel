@extends('layouts.front')


@section('content')
    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center justify-content-center text-center">
                <div class="col-lg-12">
                    <h1 class="display-4 mb-3 animated slideInDown">Register</h1>

                </div>

            </div>
        </div>
    </div>
    <!-- Header End -->



    <!-- Page Content -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <a class="btn-block-option fs-sm" href="{{ route('login') }}">Already have an account, Click here to
                    Login</a>

            </div>
            <div class="row g-0 justify-content-center mt-4">
                <div class="col-lg-6 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="row ">
                                    <div class="col-md-6">
                                        <label for="name"
                                            class=" text-md-end">{{ __('Name') }}</label>

                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">

                                        <label for="email"
                                            class="text-md-end">{{ __('Email Address') }}</label>

                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label for="password"
                                        class="text-md-end">{{ __('Password') }}</label>

                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password-confirm"
                                        class="text-md-end">{{ __('Confirm Password') }}</label>

                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 text-center">
                                <button class="btn btn-primary" type="submit">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row g-0 justify-content-center mt-3">
                Or Register with
                <div class="d-flex justify-content-center mt-2">

                    <a class="btn btn-square btn-outline-primary rounded-circle me-2"  href="{{ url('auth/facebook') }}"> <i
                        class="fab fa-facebook-f"></i></a>

                                            
                    <a class="btn btn-square btn-outline-primary rounded-circle me-2"  href="{{ url('auth/google') }}"> <i
                        class="fab fa-google"></i></a>

                </div>
            </div>
        </div>
    </div>

    <!-- END Page Content -->


    <!-- END Page Content -->
@endsection
