@extends('layouts.front')


@section('content')
    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center justify-content-center text-center">
                <div class="col-lg-12">
                    <h1 class="display-4 mb-3 animated slideInDown">Reset Password</h1>

                </div>

            </div>
        </div>
    </div>
    <!-- Header End -->



    <!-- Page Content -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">

                <p class="btn-block-option fs-sm" >Enter your email to reset password</p>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

            </div>
            <div class="row g-0 justify-content-center mt-4">
                <div class="col-lg-4 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="">

                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" placeholder="Email"  autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-12 text-center">
                                <button class="btn btn-primary" type="submit">{{ __('Send Password Reset Link') }}</button>
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
