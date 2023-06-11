@extends('layouts.backend')

@php
    $addEdit = isset($event) ? 'Edit' : 'Add';
    $addUpdate = isset($event) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Event')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex align-items-center">
                <h3 class="block-title">{{ $addEdit }} Event</h3>


                <a href="{{ route('host.events.index') }}" class="mt-2 btn btn-sm btn-primary">All Events</a>

                {{-- <a href="{{ route('host.events.index') }}" class="mt-2 btn btn-sm btn-success">Upload Images</a> --}}


            </div>
            <div class="block-content">

                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">

                        <div class="row mb-4">
                                                                                
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <?php
                                $value = old('name', $event ? $event->name : null);

                                ?>
                                <label class="form-label" for="label">Name <span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="name" name="name" placeholder="Enter Name" readonly>
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>




                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <?php
                                $value = old('date', $event ? $event->start_date : null);

                                ?>
                                <label class="form-label" for="label">Date <span class="text-danger">*</span></label>
                                <input readonly required type="datetime-local" value="{{ $value }}"
                                    class="form-control" id="date" name="date" placeholder="Select Date">
                                @error('date')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <?php
                                $value = old('location', $event ? $event->location : null);

                                ?>
                                <label class="form-label" for="label">Location <span class="text-danger">*</span></label>
                                <input readonly required type="text" value="{{ $value }}" class="form-control"
                                    id="location" name="location" placeholder="Eelect location">
                                @error('location')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>



                        <div class="row mb-4">



                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <?php
                                $value = old('total_tickets', $event ? $event->total_tickets : null);

                                ?>
                                <label class="form-label" for="label">Total Tickets <span
                                        class="text-danger">*</span></label>
                                <input readonly required type="number" min="0" value="{{ $value }}"
                                    class="form-control" id="total_tickets" name="total_tickets"
                                    placeholder="Enter total tickets">
                                @error('total_tickets')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <?php
                                $value = old('total_tickets', $event ? $event->total_tickets : null);

                                if ($event) {
                                    $selected = $event->eventHosts->pluck('user_id')->toArray();
                                } else {
                                    $selected = [];
                                }

                                ?>
                                <label class="form-label" for="label">Hosts <span class="text-danger">*</span></label>

                                <select disabled class="js-select2 form-select" name="hosts[]" style="width: 100%;"
                                    data-placeholder="Select Hosts" multiple>
                                    @foreach ($hosts as $host)
                                        <option value="{{ $host->id }}"
                                            {{ in_array($host->id, $selected) ? 'selected' : '' }}>{{ $host->name }}
                                        </option>
                                    @endforeach

                                </select>

                                @error('hosts')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>



                        <div class="row mb-4">

                            <div class="col-lg-4 col-md-4 col-sm-12">

                                @if ($event && $event->image)
                                    <br><br>
                                    <img src="{{ asset('storage/' . $event->image) }}" alt="" style="width: 200px"
                                        class="img-fluid">
                                    <br>
                                @endif

                                <label class="form-label" for="label">Image</label>
                                {{-- <input readonly type="file" class="form-control" id="image" name="image"
                                    placeholder="Eelect image"> --}}
                                @error('image')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <?php
                                $value = old('description', $event ? $event->description : null);

                                ?>
                                <label class="form-label" for="label">Description</label>
                                <textarea disabled name="description" id="editor" class="form-control" style="width: 100%" rows="30">{{ $value }}</textarea>

                                @error('description')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>



                    </div>


                </div>

            </div>
        </div>





    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')



    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>



@endsection
