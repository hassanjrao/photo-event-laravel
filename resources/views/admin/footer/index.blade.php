@extends('layouts.backend')

@php
    $addEdit = isset($footer) ? 'Edit' : 'Add';
    $addUpdate = isset($footer) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' footer')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Footer</h3>

            </div>
            <div class="block-content">

                <form action="{{ route('admin.footer.update', $footer->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')


                    <div class="row push justify-content-center">

                        <div class="col-lg-12 ">


                            <br>
                            <div class="row mb-4">

                                <div class="col-lg-12 ">
                                    <label class="form-label" for="label">Description</label>
                                    <textarea required name="description" class="form-control">{{ $footer && $footer->description ? $footer->description : '' }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-4">

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <?php
                                    $value = old('address', $footer ? $footer->address : null);

                                    ?>
                                    <label class="form-label" for="label">Address <span
                                            class="text-danger">*</span></label>
                                    <input required type="text" value="{{ $value }}" class="form-control"
                                        id="address" name="address" placeholder="Enter Address">
                                    @error('address')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <?php
                                    $value = old('phone', $footer ? $footer->phone : null);

                                    ?>
                                    <label class="form-label" for="label">phone <span
                                            class="text-danger">*</span></label>
                                    <input required type="text" value="{{ $value }}" class="form-control"
                                        id="phone" name="phone" placeholder="Enter phone">
                                    @error('phone')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <?php
                                    $value = old('email', $footer ? $footer->email : null);

                                    ?>
                                    <label class="form-label" for="label">email <span
                                            class="text-danger">*</span></label>
                                    <input required type="text" value="{{ $value }}" class="form-control"
                                        id="email" name="email" placeholder="Enter email">
                                    @error('email')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mb-4">

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <?php
                                    $value = old('twitter_link', $footer ? $footer->twitter_link : null);

                                    ?>
                                    <label class="form-label" for="label">Twitter Link</label>
                                    <input  type="text" value="{{ $value }}" class="form-control"
                                        id="twitter_link" name="twitter_link" placeholder="Enter Twitter Link">
                                    @error('twitter_link')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <?php
                                    $value = old('facebook_link', $footer ? $footer->facebook_link : null);

                                    ?>
                                    <label class="form-label" for="label">Facebook Link </label>
                                    <input type="text" value="{{ $value }}" class="form-control"
                                        id="facebook_link" name="facebook_link" placeholder="Enter Facebook Link">
                                    @error('facebook_link')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <?php
                                    $value = old('instagram_link', $footer ? $footer->instagram_link : null);

                                    ?>
                                    <label class="form-label" for="label">Instagram Link</label>
                                    <input type="text" value="{{ $value }}" class="form-control"
                                        id="instagram_link" name="instagram_link" placeholder="Enter Instagram link">
                                    @error('instagram_link')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
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





    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')




@endsection
