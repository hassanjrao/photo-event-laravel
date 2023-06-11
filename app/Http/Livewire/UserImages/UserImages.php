<?php

namespace App\Http\Livewire\UserImages;

use App\Models\Event;
use App\Models\EventImage;
use Livewire\Component;

class UserImages extends Component
{
    public $events = [];
    public $eventImages = [];
    public $selectedEvents = [];

    public function mount()
    {
        $userBookings = auth()->user()->bookings;

        $this->events = $this->userEvents($userBookings);
        $this->eventImages = $this->userEventImages($this->events->pluck('id'));

    }

    public function userEvents($userBookings)
    {

        $events = Event::whereIn('id', $userBookings->pluck('event_id'))
            ->latest()->get();

        return $events;
    }

    public function userEventImages($event_ids)
    {
        $eventImages = EventImage::whereIn('event_id', $event_ids)
            ->whereHas('users', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })
            ->latest()->get();

        return $eventImages;
    }


    public function updatedSelectedEvents()
    {

        $this->eventImages = $this->userEventImages($this->selectedEvents);
    }



    public function render()
    {

        return view('livewire.user-images.user-images');
    }
}
