@extends('layouts.front')

@section('content')
    <!-- Header Start -->


    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <p class="text-primary text-uppercase mb-2 animated slideInDown">{{ $heroSection->first_heading }}</p>
                    <h1 class="display-4 mb-3 animated slideInDown">{{ $heroSection->second_heading }}</h1>
                    <p class="animated slideInDown">
                        {{ $heroSection->intro_text }}</p>
                    <div class="d-flex align-items-center pt-4 animated slideInDown">
                        <a href="#events" class="btn btn-primary py-3 px-4 me-5">Explore More</a>
                        @if ($heroSection->video)
                            <button type="button" class="btn-play" data-bs-toggle="modal"
                                data-src="{{ $heroSection->video }}" data-bs-target="#videoModal">
                                <span></span>
                            </button>

                            <h5 class="ms-4 mb-0 d-none d-sm-block">Play Video</h5>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white p-3 w-100 mb-3"
                                src="{{ Storage::url($heroSection->images[0]->image) }}" alt="">
                            <img class="img-fluid bg-white p-3 w-50"
                                src="{{ Storage::url($heroSection->images[1]->image) }}" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white p-3 w-50 mb-3"
                                src="{{ Storage::url($heroSection->images[2]->image) }}" alt="">
                            <img class="img-fluid bg-white p-3 w-100"
                                src="{{ Storage::url($heroSection->images[3]->image) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Video Modal Start -->
    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <video controls class="w-100">
                            <source src="{{ asset('storage/' . $heroSection->video) }}" type="video/mp4">
                            {{-- <source src="mov_bbb.ogg" type="video/ogg"> --}}
                            Your browser does not support HTML video.
                        </video>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->




    <!-- Testimonial Start -->
    <div class="container-xxl py-5" id="events">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Upcoming Events</p>
                <h1 class="display-6 mb-0">Here are the upcoming events</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp row g-3" data-wow-delay="0.1s">

                @foreach ($events as $ind => $event)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="width: 85% !important">
                        <div class="service-item d-flex flex-column bg-light p-3 pb-0">
                            <div class="position-relative">
                                <img class="img-fluid" src="{{ Storage::url($event->image) }}" alt="">
                                <div class="service-overlay">
                                    <a class="btn btn-lg-square btn-outline-light rounded-circle"
                                        href="{{ route('events.show', ['event_id' => $event->id]) }}"><i
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
    <!-- Testimonial End -->





    <!-- About Start -->
    <div class="container-xxl py-5" id="about">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-3 img-twice position-relative h-100">
                        <div class="col-6">
                            <img class="img-fluid bg-light p-3" src="{{ Storage::url($aboutUs->image_1) }}" alt="">
                        </div>
                        <div class="col-6 align-self-end">
                            <img class="img-fluid bg-light p-3" src="{{ Storage::url($aboutUs->image_1) }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <p class="text-primary text-uppercase mb-2">About Us</p>

                        {!! $aboutUs->description !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->





    <!-- Project Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Our Works</p>
                <h1 class="display-6 mb-0">Discover Our Unique And Creative Photoshoot</h1>
            </div>
            <div class="row g-3">

                @foreach ($ourWorks as $ourWork)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">

                        <img class="img-fluid" src="{{ Storage::url($ourWork->image) }}" alt="">

                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Project End -->
@endsection
