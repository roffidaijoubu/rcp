<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Audit;
use Illuminate\Support\Facades\Auth;

class AuditForm extends Component
{
    public $audit;
    public $year;
    public $assessment;

    public function mount(Audit $audit = null){
        $this->audit = $audit;
    }

    // dd the value
    // public function updated($propertyName, $value)
    // {

    //     $this->calculateAggScore();
    // }

    // public function calculateAggScore(){
    //     // TODO
    //     // Logic to calculate and update 'agg_score' for each clause

    //     return 5;
    // }

    public function save()
    {
        $this->validate([
            'year' => 'required|integer',
            'assessmentBefore' => 'required',
            'assessmentAfter' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($value === $this->assessmentBefore) {
                        $fail('The ' . $attribute . ' must be different from assessmentBefore.');
                    }
                },
            ],
            // validate assessmentBefore must be different from assessmentAfter

        ]);

        if (!$this->audit->exists) {
            $this->audit->user_id = Auth::id();
        }

        $this->audit->year = $this->year;
        $this->audit->save();

        // Redirect or emit event after saving
        return redirect()->route('audits.index');
    }


    public function render()
    {
        return view('livewire.audit-form');
    }
}
