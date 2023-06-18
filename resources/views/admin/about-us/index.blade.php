@extends('layouts.backend')

@php
    $addEdit = isset($aboutUs) ? 'Edit' : 'Add';
    $addUpdate = isset($aboutUs) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' aboutUs')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} About Us</h3>

            </div>
            <div class="block-content">

                <form action="{{ route('admin.about-us.update', $aboutUs->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')


                    <div class="row push justify-content-center">

                        <div class="col-lg-12 ">

                            <div class="row mb-4 justify-content-between">



                                <div class="col-lg-4 ">
                                    <label class="form-label" for="label">Image 1</label>
                                    @if ($aboutUs->image_1)
                                        <img src="{{ Storage::url($aboutUs->image_1) }}" alt="aboutUs Image" width="100%">

                                    @endif

                                    <input name="image_1" id="image_1" class="form-control mt-2" type="file"
                                        accept="image/*">
                                </div>

                                <div class="col-lg-4 ">
                                    <label class="form-label" for="label">Image 2</label>
                                    @if ($aboutUs->image_2)
                                        <img src="{{ Storage::url($aboutUs->image_2) }}" alt="aboutUs Image" width="100%">
                                        <br>
                                    @endif

                                    <input name="image_2" id="image_2" class="form-control" type="file"
                                        accept="image/*">
                                </div>
                            </div>

                            <br>
                            <div class="row mb-4">

                                <div class="col-lg-12 ">
                                    <label class="form-label" for="label">Description</label>
                                    <textarea required name="description" id="editorAboutUs" class="form-control" cols="30" rows="50">{{ $aboutUs && $aboutUs->description ? $aboutUs->description : '' }}</textarea>
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





    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')

    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editorAboutUs'))
            .catch(error => {
                console.error(error);
            });
    </script>



@endsection
