<?php

namespace App\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public $menus;
    public function render()
    {
        return view('livewire.sidebar', [
            'menus' => $this->menus
        ]);
    }
}
