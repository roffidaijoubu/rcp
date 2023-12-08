<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session; // Import the Session facade


class ThemeChanger extends Component
{
    public $theme = '';

    public function mount()
    {
        // Set the initial theme from session or default to 'light' if not set
        $this->theme = Session::get('theme', '');
        $this->dispatch('theme-change', $this->theme);
        // dd($this->theme);
    }

    public function render()
    {
        return view('livewire.theme-changer');
    }


    public function changeTheme($theme)
    {
        $this->theme = $theme;
        Session::put('theme', $theme); // Store the theme in the session
        $this->dispatch('theme-change', $theme);
    }
}
