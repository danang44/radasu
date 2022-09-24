<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\produkpenjual;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home', [
            'produkpenjual' => produkpenjual::get(),
        ]);
    }
}
