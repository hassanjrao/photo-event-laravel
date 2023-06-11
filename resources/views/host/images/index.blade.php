@extends('layouts.backend')
@section('page-title', 'Images')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">

        <div class="block block-rounded">
            <form action="{{ route('host.images.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Upload Image
                    </h3>

                    <button type="submit" class="btn btn-primary">Add</button>


                </div>

                <div class="block-content block-content-full">


                    <div class="row justify-content-between align-item-center">

                        <div class="col-lg-3">

                            <label for="events">Event</label>
                            <select required class="js-select2 form-select" name="event" style="width: 100%;"
                                data-placeholder="Select Event">
                                <option value=""></option>
                                @foreach ($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="col-lg-4">

                            <label for="events">Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>

                        <div class="col-lg-4">


                            <label for="users">Users</label>
                            <select required class="js-select2 form-select" name="users[]" style="width: 100%;"
                                data-placeholder="Select Users" multiple>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}
                                    </option>
                                @endforeach

                            </select>


                        </div>



                    </div>



                </div>
            </form>


        </div>


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Images
                </h3>
            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Event</th>
                                <th>Image</th>
                                <th>Users</th>
                                <th>Uploaded By</th>
                                <th>Uploaded At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($events as $ind => $event)
                                @foreach ($event->eventImages as $ind => $image)
                                    <tr>

                                        <td>{{ $ind + 1 }}</td>
                                        <td>{{ $event->name }}</td>
                                        <td>
                                            @if ($image->image)
                                                <img src="{{ Storage::url($image->image) }}" alt="" width="100px">
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>

                                            @foreach ($image->users as $ind => $user)
                                                <span
                                                    class="badge rounded-pill bg-primary">{{ $user->name }}</span>
                                            @endforeach

                                        </td>

                                        <td>

                                            <span
                                                class="badge rounded-pill bg-primary">{{ $image->uploadedBy->name }}</span>

                                        </td>


                                        <td>{{ $image->created_at }}</td>
                                        <td>{{ $image->updated_at }}</td>

                                        <td>
                                            <div class="btn-group" role="group" aria-label="Horizontal Primary">

                                                <a href="{{ route('host.images.edit', $image->id) }}"
                                                    class="btn btn-sm btn-alt-success">Edit</a>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>



    <div class="modal fade" id="modal-block-popin" role="dialog" aria-labelledby="modal-block-popin" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popin" role="document">
            <div class="modal-content">

                <form action="{{ route('host.images.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="block block-rounded block-transparent mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Add</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="block block-rounded">

                                <div class="block-content">

                                    <div class="row push justify-content-center">

                                        <div class="col-lg-12 ">

                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <label class="form-label" for="label">Name</label>
                                                    <input required type="text" class="form-control" id="name"
                                                        name="name">
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label" for="label">Email</label>
                                                    <input required type="email" class="form-control" id="email"
                                                        name="email">
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label" for="label">Password</label>
                                                    <input type="password" class="form-control" id="password"
                                                        name="password">
                                                </div>



                                            </div>



                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-end bg-body">
                            <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>





    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')


@endsection
