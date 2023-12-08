<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AssetsTable extends Component
{
    public $search = '';
    public $columnSearches = [
        'id' => '',
        'name' => '',
        'description' => '',
        'criticality' => '',
        'category' => '',
        'group' => '',
        'location' => '',
    ];
    public $assets = [];
    public $originalAssets = [];

    public $sortColumn = 'id'; // Default sort column
    public $sortDirection = 'asc'; // Default sort direction ('asc' or 'desc')


    public function mount()
    {
        $this->fetchData();
    }

    public $loading = false;

    // ...

    public function fetchData()
    {   
        $this->originalAssets = [];
        $this->assets = [];

        if ($this->search === '') {
            return;
        }

        $response = Http::get('https://crp-dm.pgn.co.id/asset', ['q' => $this->search]);
        $this->originalAssets = $response->json('result');

        $this->assets = $response->json('result');

        
    }
    private function applyFilters()
    {
        $this->assets = collect($this->originalAssets)
            ->filter(function ($item) {
                foreach ($this->columnSearches as $column => $searchTerm) {
                    if ($searchTerm && false === stristr($item[$column] ?? '', $searchTerm)) {
                        return false;
                    }
                }
                return true;
            })
            ->sortBy($this->sortColumn, SORT_REGULAR, $this->sortDirection === 'desc')
            ->all();
    }


    public function updatedColumnSearches()
    {
        $this->applyFilters();
    }

    public function render()
    {
        $columns = [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'criticality' => 'Criticality',
            'category' => 'Category',
            'group' => 'Group',
            'location' => 'Location',
            // Add other columns here
        ];

        return view('livewire.assets-table', compact('columns'));
    }


    public function sortBy($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortColumn = $column;
            $this->sortDirection = 'asc';
        }

        $this->applyFilters();
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
}
