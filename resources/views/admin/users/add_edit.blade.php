@extends('layouts.backend')

@php
    $addEdit = isset($user) ? 'Edit' : 'Add';
    $addUpdate = isset($user) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' User')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} User</h3>


                <a href="{{ route('admin.users.index') }}" class="btn btn-primary">All Users</a>

                                        
            </div>
            <div class="block-content">

                @if ($user)
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">

                        <div class="row mb-4">

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <?php
                                $value = old('name', $user ? $user->name : null);

                                ?>
                                <label class="form-label" for="label">Name <span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="name" name="name" placeholder="Enter Name">
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <?php
                                $value = old('email', $user ? $user->email : null);

                                ?>
                                <label class="form-label" for="label">Email <span class="text-danger">*</span></label>
                                <input required type="email" value="{{ $value }}" class="form-control"
                                    id="email" name="email" placeholder="Enter email">
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <?php
                                $value = old('password');

                                ?>
                                <label class="form-label" for="label">Password <span class="text-danger">*</span></label>
                                <input {{ $user ? "" : "required" }} type="password" value="{{ $value }}" class="form-control"
                                    id="password" name="password" placeholder="Enter password">
                                @error('password')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row mb-4">

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <?php
                                $userRole= $user ? $user->roles()->first() : null;
                                $value = old('role', $userRole ? $userRole->id : null);

                                ?>
                                <label class="form-label" for="label">Role <span class="text-danger">*</span></label>

                                <select name="role" class="form-control">
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ $role->id==$value ? 'selected' : "" }}>{{ $role->name }}</option>
                                    @endforeach

                                </select>

                                @error('role')
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





    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')



@endsection
