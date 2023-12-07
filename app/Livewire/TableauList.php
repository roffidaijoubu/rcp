<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Dashboard;

class TableauList extends Component
{   
    
    
    public function render()
    {
        $tableauList = Dashboard::all();
        // restructure the data of $tableauList to be grouped by category
        $tableauList = $tableauList->groupBy('category');
        
        return view('livewire.tableau-list', [
            'tableauList' => $tableauList,
        ]);
    }
}
