@extends('layouts.front')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center justify-content-center text-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">{{ $event->name }}</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0 justify-content-center">
                            <li class="breadcrumb-item "><a  href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Events</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $event->name }}</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
    <!-- Header End -->


    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">

                        <p>
                            {!! $event->description !!}
                        </p>
                        <div class="row g-2 mb-4">
                            <div class="col-sm-6">
                                <i class="fa fa-info text-primary me-3"></i>Date: {{ $event->event_date }}
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-info text-primary me-3"></i>Time: {{ $event->event_time }}
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-info text-primary me-3"></i>Location: {{ $event->location }}
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-info text-primary me-3"></i>Tickets Available: {{ $event->total_tickets }}
                            </div>

                            <a href="{{ route("bookings.index",["event_id"=>$event->id]) }}" class="btn btn-primary py-3 px-4 me-5 w-25 mt-4">Book</a>
                        </div>
                    </div>
                </div>
             
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s" class="text-center">

                    <img src="{{ Storage::url($event->image) }}" class="img-fluid w-75" >

                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
