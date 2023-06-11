<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class Profile extends Component
{
    public $bookings=[];

    public $activeTab = 'profileTab';

    public function changeTab($tab){
        $this->activeTab = $tab;
    }

    public function mount(){
        // get #booking parameter from url
        $booking = request()->booking;


        if($booking){
            $this->activeTab = 'bookingTab';
        }

    }

    public function render()
    {
        return view('livewire.profile.profile');
    }
}
