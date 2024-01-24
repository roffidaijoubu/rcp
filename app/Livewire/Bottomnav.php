<?php

namespace App\Livewire;

use Livewire\Component;

class Bottomnav extends Component
{
    public $menus;

    public function render()
    {
        return view('livewire.bottomnav', [
            'menus' => $this->menus
        ]);
    }
}
