<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session; // Import the Session facade


class ThemeChanger extends Component
{
    public $theme = '';

    public function mount()
    {
        // Set the initial theme from localStorage or default to 'night' if not set
        $this->theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'night';
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
        setcookie('theme', $theme, time() + (86400 * 30), "/"); // Store the theme in a cookie for 30 days
        $this->dispatch('theme-change', $theme);
    }
}
