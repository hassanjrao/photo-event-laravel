@extends('layouts.front')

@section('content')
    <!-- Header Start -->


    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <p class="text-primary text-uppercase mb-2 animated slideInDown">Welcome To {{ config('app.name') }}</p>
                    <h1 class="display-4 mb-3 animated slideInDown">Professional Dating Portraits for all.</h1>
                    <p class="animated slideInDown">
                        Come to one of our events and see what it’s all about.</p>
                    <div class="d-flex align-items-center pt-4 animated slideInDown">
                        <a href="" class="btn btn-primary py-3 px-4 me-5">Explore More</a>
                        <button type="button" class="btn-play" data-bs-toggle="modal"
                            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                        <h5 class="ms-4 mb-0 d-none d-sm-block">Play Video</h5>
                    </div>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white p-3 w-100 mb-3" src="{{ asset('front-assets/img/hero-1.jpg') }}"
                                alt="">
                            <img class="img-fluid bg-white p-3 w-50" src="{{ asset('front-assets/img/hero-3.jpg') }}"
                                alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white p-3 w-50 mb-3" src="{{ asset('front-assets/img/hero-4.jpg') }}"
                                alt="">
                            <img class="img-fluid bg-white p-3 w-100" src="{{ asset('front-assets/img/hero-2.jpg') }}"
                                alt="">
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
                    <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                            allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->




    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Upcoming Events</p>
                <h1 class="display-6 mb-0">Here are the upcoming events</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp row g-3" data-wow-delay="0.1s">

                @foreach ($events as $ind=> $event)
             
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="width: 85% !important">
                        <div class="service-item d-flex flex-column bg-light p-3 pb-0">
                            <div class="position-relative">
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
    <!-- Testimonial End -->





    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-3 img-twice position-relative h-100">
                        <div class="col-6">
                            <img class="img-fluid bg-light p-3" src="{{ asset('front-assets/img/about-1.jpg') }}"
                                alt="">
                        </div>
                        <div class="col-6 align-self-end">
                            <img class="img-fluid bg-light p-3" src="{{ asset('front-assets/img/about-2.jpg') }}"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <p class="text-primary text-uppercase mb-2">About Us</p>
                        <h1 class="display-6 mb-4">We Are Creative And Professional Photographer</h1>
                        <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.
                            Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet
                        </p>
                        <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.
                            Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet
                        </p>
                        <div class="row g-2 mb-4">
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-3"></i>Quality Products
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-3"></i>Custom Products
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-3"></i>Online Order
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-3"></i>Home Delivery
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Facts Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Why Choose Us!</p>
                <h1 class="display-6 mb-5">The Leading Photo Studio In The Country</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6 pt-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="fact-item bg-light text-center h-100 p-5">
                        <h1 class="display-2 text-primary mb-3" data-toggle="counter-up">35</h1>
                        <h4 class="mb-3">Award Winning</h4>
                        <span>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita
                            duo justo</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="fact-item bg-light text-center h-100 p-5">
                        <h1 class="display-2 text-primary mb-3" data-toggle="counter-up">45</h1>
                        <h4 class="mb-3">Years Experience</h4>
                        <span>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita
                            duo justo</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-lg-5 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="fact-item bg-light text-center h-100 p-5">
                        <h1 class="display-2 text-primary mb-3" data-toggle="counter-up">12345</h1>
                        <h4 class="mb-3">Happy Clients</h4>
                        <span>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita
                            duo justo</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->



    <!-- Project Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Our Works</p>
                <h1 class="display-6 mb-0">Discover Our Unique And Creative Photoshoot</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="{{ asset('front-assets/img/project-5.jpg') }}"
                                    alt="">
                                <a class="project-title h5 mb-0" href="{{ asset('front-assets/img/project-5.jpg') }}"
                                    data-lightbox="project">
                                    Memory
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="{{ asset('front-assets/img/project-1.jpg') }}"
                                    alt="">
                                <a class="project-title h5 mb-0" href="{{ asset('front-assets/img/project-1.jpg') }}"
                                    data-lightbox="project">
                                    Wedding
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="{{ asset('front-assets/img/project-2.jpg') }}"
                                    alt="">
                                <a class="project-title h5 mb-0" href="{{ asset('front-assets/img/project-2.jpg') }}"
                                    data-lightbox="project">
                                    Portrait
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="{{ asset('front-assets/img/project-6.jpg') }}"
                                    alt="">
                                <a class="project-title h5 mb-0" href="{{ asset('front-assets/img/project-6.jpg') }}"
                                    data-lightbox="project">
                                    Travel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="{{ asset('front-assets/img/project-7.jpg') }}"
                                    alt="">
                                <a class="project-title h5 mb-0" href="{{ asset('front-assets/img/project-7.jpg') }}"
                                    data-lightbox="project">
                                    Wedding
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="{{ asset('front-assets/img/project-3.jpg') }}"
                                    alt="">
                                <a class="project-title h5 mb-0" href="{{ asset('front-assets/img/project-3.jpg') }}"
                                    data-lightbox="project">
                                    Memory
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="{{ asset('front-assets/img/project-4.jpg') }}"
                                    alt="">
                                <a class="project-title h5 mb-0" href="{{ asset('front-assets/img/project-4.jpg') }}"
                                    data-lightbox="project">
                                    Fashion
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="{{ asset('front-assets/img/project-8.jpg') }}"
                                    alt="">
                                <a class="project-title h5 mb-0" href="{{ asset('front-assets/img/project-8.jpg') }}"
                                    data-lightbox="project">
                                    Portrait
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Project End -->
@endsection
