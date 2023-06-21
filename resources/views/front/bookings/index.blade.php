@extends('layouts.front')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center justify-content-center text-center">
                <div class="col-lg-12">
                    <h1 class="display-4 mb-3 animated slideInDown">Booking</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0 justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Booking</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
    <!-- Header End -->


    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center justify-content-center">



                <div class="col-lg-6 wow fadeInUp">
                    <div class="h-100">

                        <form id="payment-form" action="{{ route('bookings.store') }}" method="POST"
                            enctype="multipart/form-data">

                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            <input type="hidden" name="total_price" id="input_total_price"
                                value="{{ $event->ticket_price }}">
                            <input type="hidden" name="total_tickets" id="input_total_tickets" value="1">
                            @csrf


                            <div class="row mb-4">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Event Name</th>
                                                <th>Single Ticket Price</th>
                                                <th>Total Tickets</th>
                                                <th>Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $event->name }}</td>
                                                <td id="single_ticket_price">{{ $event->ticket_price }}
                                                    {{ config('app.currency') }}</td>
                                                <td id="total_tickets">
                                                    <select class="form-select" name="total_tickets" id="total_tickets"
                                                        onchange="ticketsChanged(this)">
                                                        @for ($i = 1; $i <= $event->total_tickets; $i++)
                                                            <option value="{{ $i }}">{{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </td>
                                                <td><span id="total_price">{{ $event->ticket_price }}</span>
                                                    {{ config('app.currency') }}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group">
                                    <label for="card-holder-name">Card Holder Name</label>
                                    <input id="card-holder-name" class="form-control" type="text">
                                </div>

                                <div class="form-group mt-2">
                                    <label for="card-element">Credit or Debit card (<small>Powered by Stripe</small>)</label>
                                    <div id="card-element" class="form-control"> </div>
                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                </div>
                            </div>

                            <div class="stripe-errors"></div>
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}<br>
                                    @endforeach
                                </div>
                            @endif

                            <div class="form-row mt-4">

                                <label for="terms-cond mt-4">


                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="termsCond"
                                            onclick="termsCondChange(this)">
                                        <label class="form-check-label" for="termsCond">
                                            By checking this box, you agree to our <a href="#">Terms &
                                                Conditions</a>
                                        </label>
                                    </div>

                            </div>

                            <div class="form-group text-center mt-4">
                                <button disabled type="button" id="card-button" data-secret="{{ $intent->client_secret }}"
                                    class="btn btn-md btn-primary btn-block">SUBMIT</button>
                            </div>
                        </form>


                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        function termsCondChange(e) {
            if (e.checked) {
                document.getElementById('card-button').disabled = false;
            } else {
                document.getElementById('card-button').disabled = true;
            }
        }

        function ticketsChanged(e) {
            console.log(e.value);

            var single_ticket_price = document.getElementById('single_ticket_price').innerText;

            var total_price = parseFloat(single_ticket_price) * parseFloat(e.value);

            document.getElementById('total_price').innerText = total_price;
            document.getElementById('input_total_price').value = total_price;
            document.getElementById('input_total_tickets').value = e.value;


        }
    </script>


    <script>
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '66px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        var card = elements.create('card', {
            hidePostalCode: true,
            // style: style
        });
        card.mount('#card-element');
        console.log(document.getElementById('card-element'));
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
        cardButton.addEventListener('click', async (e) => {

            // disable button
            cardButton.disabled = true;
            // change button text
            cardButton.textContent = 'Processing...';

            console.log("attempting");
            const {
                setupIntent,
                error
            } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: card,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            );
            if (error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = error.message;
                // enable button
                cardButton.disabled = false;
                // change button text
                cardButton.textContent = 'Submit';
            } else {
                paymentMethodHandler(setupIntent.payment_method);
            }
        });

        function paymentMethodHandler(payment_method) {
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'payment_method');
            hiddenInput.setAttribute('value', payment_method);
            form.appendChild(hiddenInput);
            form.submit();
        }
    </script>
@endpush
