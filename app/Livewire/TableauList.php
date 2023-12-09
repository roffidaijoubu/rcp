<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Dashboard;
use Mary\Traits\Toast;

class TableauList extends Component
{
    use Toast;

    public $property;
    public $isIndex = false;
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
        $tableauList = $tableauList->sortBy('order_column');
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

        return preg_replace_callback('/' . preg_quote($searchTerm, '/') . '/i', function ($matches) {
            return "<span class='highlight'>" . $matches[0] . "</span>";
        }, $text);
    }


    public function showToast()
    {
        // Your stuff here ...

        // Toast
        $this->info('We are done, check it out');
    }
}
