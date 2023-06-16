<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use App\Notifications\BookingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserBookingController extends Controller
{
    public function index($event_id)
    {
        $event = Event::findorfail($event_id);

        $user = Auth::user();

        $intent = $user->createSetupIntent();

        return view("front.bookings.index", compact("event", "intent"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "event_id" => "required|exists:events,id",
            "total_price"=>"required|numeric|min:0",
            "total_tickets"=>"required|numeric|min:1"
        ]);

        $event = Event::findorfail($request->event_id);

        $totalPrice=$request->total_price;

        $user = Auth::user();
        $paymentMethod = $request->input('payment_method');
        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);
        try {
            $user->charge($totalPrice * 100, $paymentMethod);
        } catch (\Exception $e) {
            Log::error("UserBookingController@store",[
                "message"=>$e->getMessage(),
                "trace"=>$e->getTraceAsString(),
            ]);
            return back()->with('toast_error',['Error ' . $e->getMessage()]);
        }

        //bookin

       $booking= Booking::create([
            "user_id" => $user->id,
            "event_id" => $event->id,
            "amount" => $totalPrice,
            "total_tickets" => $request->total_tickets,
            "ticket_price"=>$event->ticket_price,
            "status"=>"approved",
        ]);

        $user->notify(new BookingNotification($booking));

        return redirect()->route("profile.index",["booking"=>true])->withToastSuccess("Booking completed successfully");
    }

    public function processPayment(Request $request, String $product, $price)
    {

        return redirect('home');
    }
}
