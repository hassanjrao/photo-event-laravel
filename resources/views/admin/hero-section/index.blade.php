@extends('layouts.backend')

@php
    $addEdit = isset($heroSection) ? 'Edit' : 'Add';
    $addUpdate = isset($heroSection) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Hero Section')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Hero Section</h3>

            </div>
            <div class="block-content">

                <form action="{{ route('admin.hero-section.update', $heroSection->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')



                    <div class="row push justify-content-center">

                        <div class="col-lg-12 ">

                            <div class="row mb-4">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <?php
                                    $value = old('first_heading', $heroSection ? $heroSection->first_heading : null);

                                    ?>
                                    <label class="form-label" for="label">First Heading <span
                                            class="text-danger">*</span></label>
                                    <input required type="text" value="{{ $value }}" class="form-control"
                                        id="first_heading" name="first_heading" placeholder="Enter first heading">
                                    @error('first_heading')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <?php
                                    $value = old('second_heading', $heroSection ? $heroSection->second_heading : null);

                                    ?>
                                    <label class="form-label" for="label">Second Heading <span
                                            class="text-danger">*</span></label>
                                    <input required type="text" value="{{ $value }}" class="form-control"
                                        id="second_heading" name="second_heading" placeholder="Enter second heading">
                                    @error('second_heading')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="row mb-4">


                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <?php
                                    $value = old('intro_text', $heroSection ? $heroSection->intro_text : null);

                                    ?>
                                    <label class="form-label" for="label">Intro Text <span
                                            class="text-danger">*</span></label>
                                    <input required type="intro_text" value="{{ $value }}" class="form-control"
                                        id="intro_text" name="intro_text" placeholder="Enter intro text">
                                    @error('intro_text')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">


                                    <label class="form-label" for="label">Video</label>
                                    @if ($heroSection->video)
                                        <video width="600" controls>
                                            <source src="{{ asset('storage/' . $heroSection->video) }}" type="video/mp4">
                                            {{-- <source src="mov_bbb.ogg" type="video/ogg"> --}}
                                            Your browser does not support HTML video.
                                        </video>
                                    @endif
                                    <input type="file" class="form-control" id="video" name="video"
                                        accept="video/*" placeholder="Upload Video">
                                    @error('video')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                            </div>






                        </div>


                    </div>

                    <div class="d-flex justify-content-end mb-4">

                        <button type="submit" id="submitBtn" class="btn btn-primary  border">{{ $addUpdate }}</button>

                    </div>


                </form>


            </div>
        </div>


        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Hero Section Images</h3>

            </div>
            <div class="block-content">

                <form action="{{ route('admin.hero-section-images.update', $heroSection->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')



                    <div class="row push justify-content-center">

                        <div class="col-lg-12 ">

                            <div class="row mb-4">

                                @foreach ($heroSectionImages as $ind=> $image)


                                <div class="col-lg-6 col-md-6 col-sm-12 mb-4">

                                    <label class="form-label" for="label">Image {{ $ind+1 }} <span
                                            class="text-danger">*</span></label>

                                    <img src="{{ asset('storage/' . $image->image) }}" class="form-control" style="width: 100%; height: 300px;">

                                    <input type="file" class="form-control" accept="image/*"
                                        id="image{{ $ind++ }}" name="image{{ $ind++ }}">
                                    @error('image')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                @endforeach



                            </div>


                        </div>


                    </div>

                    <div class="d-flex justify-content-end mb-4">

                        <button type="submit" id="submitBtn" class="btn btn-primary  border">{{ $addUpdate }}</button>

                    </div>


                </form>


            </div>
        </div>

    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')



@endsection
