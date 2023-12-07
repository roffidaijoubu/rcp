<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Dashboard;

class TableauList extends Component
{

    public $property;
    public $search = '';

    public $isSearchFocused = false;


    public function render()
    {
        $tableauList = Dashboard::all();

        if ($this->search !== '') {
            $searchTerm = strtolower($this->search); // Convert search term to lower case
            $tableauList = $tableauList->filter(function ($item) use ($searchTerm) {
                return false !== stristr(strtolower($item->name), $searchTerm); // Compare in lower case
            });
        }

        $tableauList = $tableauList->groupBy('category');

        return view('livewire.tableau-list', [
            'tableauList' => $tableauList,
        ]);
    }

    public function highlightMatch($text, $searchTerm)
    {
        if (!$searchTerm) {
            return $text;
        }

        return str_ireplace($searchTerm, "<span class='highlight'>$searchTerm</span>", $text);
    }


}