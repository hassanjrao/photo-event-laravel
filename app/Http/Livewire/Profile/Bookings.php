<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class Bookings extends Component
{
    public $bookings=[];

    public function render()
    {
        return view('livewire.profile.bookings');
    }
}
