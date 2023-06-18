@extends('layouts.backend')
@section('page-title', 'Contact Us')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Contact Us
                </h3>




            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Created At</th>
                                <th>Updated At</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($contactUs as $ind => $contact)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>

                                    </td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>

                                    <td>
                                        {{ $contact->subject }}
                                    </td>
                                    <td>
                                        {{ $contact->message }}
                                    </td>

                                    <td>{{ $contact->created_at }}</td>
                                    <td>{{ $contact->updated_at }}</td>



                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>








    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')


@endsection
