@extends('layouts.backend')

@php
    $addEdit = 'Edit';
    $addUpdate = 'Update';
@endphp
@section('page-title', $addEdit . ' Event')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <form action="{{ route('admin.images.update', $eventImage->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <div class="block-header block-header-default d-flex align-items-center">
                    <h3 class="block-title">{{ $addEdit }} Event</h3>


                    <div class="d-flex justify-content-between">
                        <button type="submit" class="mt-2 ml-2 btn btn-sm btn-success">Update</button>

                        <a href="{{ route('admin.images.index') }}" class="mt-2 btn btn-sm btn-primary">All Images</a>

                    </div>
                </div>
                <div class="block-content">

                    <div class="row push justify-content-center">

                        <div class="col-lg-12 ">

                            <div class="row mb-4">

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label class="form-label" for="label">Event <span class="text-danger">*</span></label>
                                    <select required class="js-select2 form-select" name="event" style="width: 100%;"
                                        data-placeholder="Select Event">
                                        <option value=""></option>
                                        @foreach ($events as $event)
                                            <option {{ $event->id==$eventImage->event_id ? "selected":"" }} value="{{ $event->id }}">{{ $event->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                    @error('name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <?php

                                    if ($eventImage) {
                                        $selected = $eventImage->users->pluck('id')->toArray();
                                    } else {
                                        $selected = [];
                                    }

                                    ?>
                                    <label class="form-label" for="label">Users <span
                                            class="text-danger">*</span></label>

                                    <select required class="js-select2 form-select" name="users[]" style="width: 100%;"
                                        data-placeholder="Select users" multiple>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ in_array($user->id, $selected) ? 'selected' : '' }}>{{ $user->name }}
                                            </option>
                                        @endforeach

                                    </select>

                                    @error('users')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">

                                    @if ($eventImage && $eventImage->image)
                                        <br><br>
                                        <img src="{{ Storage::url($eventImage->image) }}" alt=""
                                            style="width: 400px; height:400px" class="img-fluid">
                                        <br>
                                    @endif


                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">


                                    <label class="form-label" for="label">Image<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="image" name="image"
                                        placeholder="Eelect image">
                                    @error('image')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>









                            </div>

                        </div>


                    </div>

                </div>
            </form>
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
