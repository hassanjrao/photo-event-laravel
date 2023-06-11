@extends('layouts.front')


@section('content')
    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center justify-content-center text-center">
                <div class="col-lg-12">
                    <h1 class="display-4 mb-3 animated slideInDown">Verify Email</h1>

                </div>

            </div>
        </div>
    </div>
    <!-- Header End -->



    <!-- Page Content -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">

                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit"
                        class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                </form>

            </div>

            <div class="text-center mt-4">

                <a href="{{ route("home") }}"
                class="btn btn-primary ">Home</a>
            </div>

        </div>
    </div>

    <!-- END Page Content -->


    <!-- END Page Content -->
@endsection
