@extends('layouts.front')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center justify-content-center text-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Event Images</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0 justify-content-center">
                            <li class="breadcrumb-item "><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Images</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
    <!-- Header End -->



    <div class="container-xxl py-5">
        <div class="container">
            <div class="row mb-4 align-items-center justify-content-between">

                <div class="col-lg-4">
                    <label for="event">Events</label>
                    <select multiple class="form-select select2" onchange="eventSelected(this)">
                        @foreach ($events as $event)

                            <option value="{{ $event->id }}" {{ $event_id==$event->id ? "selected" : "" }}>{{ $event->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row g-5 align-items-center justify-content-between" id='img-cont'>

                @foreach ($eventImages as $eventImage)
                    <div class="col-lg-3 col-md-6 wow fadeInUp bg-light p-3 " style="margin-right:35px !important" data-wow-delay="0.1s">
                        <img class="img-fluid  w-100  h-100"
                            style="height: 350px !important; width: 350px !important"
                            src="{{ Storage::url($eventImage->image) }}" alt="">
                        <div class="d-flex justify-content-around pt-2 align-items-centerd ">
                            <a href="{{ Storage::url($eventImage->image) }}" target="_blank">View</a>
                            <a href="{{ Storage::url($eventImage->image) }}" download>Download</a>
                        </div>
                    </div>
                @endforeach




            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Filter by event",
                allowClear: true
            });


        });

        function eventSelected(e) {

            if ($(".select2").val() != "all") {

                let event_ids = $(".select2").val();
                console.log(event_ids);

                $.ajax({
                url: "{{ route('images.event-images') }}",
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "event_ids": event_ids
                    },
                    success: function(response) {

                        let imageArr=response.eventImages

                        console.log(imageArr);

                        let imgCont = document.getElementById('img-cont');

                        imgCont.innerHTML = '';

                        imageArr.forEach(element => {

                            console.log(element.image);

                            let col = document.createElement('div');
                            col.setAttribute('class', 'col-lg-3 col-md-6 wow fadeInUp bg-light p-3');
                            col.setAttribute('style', 'margin-right:35px !important')
                            col.setAttribute('data-wow-delay', '0.1s');

                            let img = document.createElement('img');
                            img.setAttribute('class', 'img-fluid w-100 h-100');
                            img.setAttribute('style', 'height: 350px !important; width: 350px !important');
                            img.setAttribute('src', element.image);

                            col.appendChild(img);

                            let div = document.createElement('div');
                            div.setAttribute('class', 'd-flex justify-content-around pt-2 align-items-centerd ');

                            let a1 = document.createElement('a');
                            a1.setAttribute('href', element.image);
                            a1.setAttribute('target', '_blank');
                            a1.innerHTML = 'View';

                            let a2 = document.createElement('a');
                            a2.setAttribute('href', element.image);
                            a2.setAttribute('download', '');
                            a2.innerHTML = 'Download';

                            div.appendChild(a1);
                            div.appendChild(a2);

                            col.appendChild(div);


                            imgCont.appendChild(col);
                        });




                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            }
        }
    </script>
@endpush
