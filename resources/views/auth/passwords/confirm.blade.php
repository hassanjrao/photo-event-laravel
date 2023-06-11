@extends('layouts.front')


@section('content')
    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center justify-content-center text-center">
                <div class="col-lg-12">
                    <h1 class="display-4 mb-3 animated slideInDown">Confirm Password</h1>

                </div>

            </div>
        </div>
    </div>
    <!-- Header End -->



    <!-- Page Content -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">

                <p class="btn-block-option fs-sm" >
                    {{ __('Please confirm your password before continuing.') }}</p>


            </div>
            <div class="row g-0 justify-content-center mt-4">
                <div class="col-lg-4 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="">

                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
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
