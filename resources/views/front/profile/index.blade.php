@extends('layouts.front')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center justify-content-center text-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Profile</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0 justify-content-center">
                            <li class="breadcrumb-item "><a  href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
    <!-- Header End -->


    <livewire:profile.profile :bookings="$bookings">


@endsection

@push('scripts')

@endpush
