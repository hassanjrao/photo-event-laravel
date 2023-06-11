@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="row row-deck">



            <div class="col-sm-6 col-xxl-3 col-md-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('host.events.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $events }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Events Assigned</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">

                                <i class="fas fa-calendar-alt fa-2x"></i>

                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('host.events.index') }}">
                                <span>View Events</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>


            <div class="col-sm-6 col-xxl-3 col-md-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('host.images.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $images }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Images Uploaded</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">

                                <i class="fas fa-images fa-2x"></i>

                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('host.images.index') }}">
                                <span>View images</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>


        </div>
    </div>
    <!-- END Page Content -->
@endsection
