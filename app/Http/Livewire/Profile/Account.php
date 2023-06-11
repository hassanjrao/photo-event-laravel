<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class Account extends Component
{

    public $name;
    public $email;
    public $password;
    public $password_confirmation;


    public function updateProfile()
    {



        $this->validate([
            "name"=>"required",
            "email"=>"required|email|unique:users,email,".auth()->user()->id,
        ]);

        if($this->password){
            $this->validate([
                "password"=>"required|min:8|confirmed",
                "password_confirmation"=>"required|same:password",
            ]);
        }



        auth()->user()->update([
            "name" => $this->name,
            "email" => $this->email,
        ]);

        if ($this->password) {
            auth()->user()->update([
                "password" => bcrypt($this->password)
            ]);
        }

        $this->dispatchBrowserEvent("show-status",["message"=>"Profile updated successfully!","type"=>"success","toast"=>true]);
    }

    public function mount()
    {

        $this->setAccountInfo();
    }


    public function setAccountInfo(){

        $user=auth()->user();

        $this->name=$user->name;
        $this->email=$user->email;

    }


    public function render()
    {
        return view('livewire.profile.account');
    }
}
