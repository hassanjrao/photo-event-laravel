<div class="container-xxl py-5">
    <div class="container">
        <div class="row mb-4 align-items-center">

            <div class="col-lg-4">
                <label for="event">Events</label>
                <select wire:model='selectedEvents' class="form-select select2" multiple>
                    <option value="" selected>All</option>
                    @foreach ($events as $event)
                        <option value="{{ $event->id }}">{{ $event->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row g-5 align-items-center">

            @foreach ($eventImages as $eventImage)
                <div class="col-lg-3 col-md-6 wow fadeInUp " data-wow-delay="0.1s">
                    <img class="img-fluid bg-light p-3 w-100 mb-3 h-100"
                        style="height: 350px !important; width: 350px !important"
                        src="{{ Storage::url($eventImage->image) }}" alt="">



                </div>
            @endforeach




        </div>
    </div>
</div>
