<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
            <div class="card">
                <div class="card-header">{{ __('Profile Information') }}</div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Booking ID</th>
                                            <th>Booking Date</th>
                                            <th>Event Name</th>
                                            <th>Total Tickets</th>
                                            <th>Single Ticket Price</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookings as $booking)
                                            <tr>
                                                <td>{{ $booking->booking_id }}</td>
                                                <td>{{ $booking->created_at }}</td>
                                                <td>{{ $booking->event->name }}</td>
                                                <td>{{ $booking->total_tickets }}</td>
                                                <td>{{ $booking->ticket_price }}</td>
                                                <td>
                                                    <a href="{{ route("images.index",["id"=>$booking->event->id]) }}"
                                                        class="btn btn-sm btn-primary">View Images</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>
