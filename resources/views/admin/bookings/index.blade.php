@extends('layouts.backend')
@section('page-title', 'Bookings')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Bookings
                </h3>




            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Event</th>
                                <th>Event Date</th>
                                <th>Event Location</th>
                                <th>Single Ticket Price (At the time of booking)</th>
                                <th>Total Tickets</th>
                                <th>Total Paid</th>
                                <th>Created At</th>
                                <th>Updated At</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($bookings as $ind => $booking)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>
                                        <a target="__blank" href="{{ route("admin.users.edit",["user"=>$booking->user]) }}">{{ $booking->user->name }}</a>
                                    </td>
                                    <td>
                                        <a target="__blank" href="{{ route("admin.events.edit",["event"=>$booking->event]) }}">{{ $booking->event->name }}</a>


                                    </td>
                                    <td>{{ $booking->event->start_date }}</td>
                                    <td>{{ $booking->event->location }}</td>

                                    <td>
                                      {{ $booking->ticket_price }} {{ config("app.currency") }}
                                    </td>
                                    <td>
                                       {{ $booking->total_tickets }}
                                    </td>
                                    <td>
                                        {{ $booking->amount }} {{ config("app.currency") }}
                                    </td>


                                    <td>{{ $booking->created_at }}</td>
                                    <td>{{ $booking->updated_at }}</td>



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
