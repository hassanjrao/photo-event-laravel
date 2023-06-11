@extends('layouts.front')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center justify-content-center text-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Events</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0 justify-content-center">
                            <li class="breadcrumb-item "><a  href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Events</li>
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
                                                                               
                @foreach ($events as $event)
                    <div class="col-lg-3 col-md-6 wow fadeInUp " data-wow-delay="0.1s" >
                        <div class="service-item d-flex flex-column bg-light p-3 pb-0">
                            <div class="position-relative text-center">
                                <img class="img-fluid" src="{{ Storage::url($event->image) }}" alt="">
                                <div class="service-overlay">
                                    <a class="btn btn-lg-square btn-outline-light rounded-circle" href="{{ route("events.show",["event_id"=>$event->id]) }}"><i
                                            class="fa fa-link text-primary"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <h4>{{ $event->name }}</h4>
                            </div>

                            <div class="row justify-content-center">

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <p><b>Date:</b> {{ $event->event_date }}</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <p><b>Time:</b> {{ $event->event_time }}</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <p><b>Location:</b> {{ $event->location }}</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <p><b>Tickets:</b> {{ $event->total_tickets }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach




            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
