<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Counter extends Component
{

    public $counter = 5;


    #[Validate()]
    public $text = 'Inserisci qui il tuo testo';



    public function increment(){
        $this->counter++;
        $this->dispatch('incrment');
    }


    public function decrement(){
        $this->counter--;
    }





    #[On('increment')]
    public function render()
    {
        $users = User::all();
        return view('livewire.counter',compact('users'));
    }

    public function mount(){
        
    }
}
