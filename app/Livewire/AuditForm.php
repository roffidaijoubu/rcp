<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Audit;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;


class AuditForm extends Component
{
    public $audit;
    public $year;
    public $assessment = [];

    public function mount(Audit $audit = null){
        $this->audit = $audit;
    }

    public $activeTab = 'tab1';

    public function switchTab($tab)
    {
        $this->activeTab = $tab;
    }


    public function save()
    {
        $this->validate([
            'year' => 'required|integer',
            'assessment' => 'required|array', // validate assessment is an array
            // validate assessmentBefore must be different from assessmentAfter

        ]);


        // $this->audit->year = $this->year;
        // dd($this->assessment);

        // return;

        $this->audit->save();

        // Redirect or emit event after saving
        return redirect()->route('audits.index');
    }

    #[On('scoreUpdated')]
    public function scoreUpdated($score)
    {
        // get the key1 from the score
        $key1 = explode("/", $score)[0];
        // get the key2 from the score
        $key2 = explode("/", $score)[1];
        // get the real score value
        $score = explode("/", $score)[2];

        $this->assessment[$key1]['items'][$key2]['score'] = $score;

        // dd($this->assessment);
    }

    #[On('noteUpdated')]
    public function noteUpdated($note)
    {
        // get the key1 from the score
        $key1 = explode("/", $note)[0];
        // get the key2 from the score
        $key2 = explode("/", $note)[1];
        // get the real score value
        $note = explode("/", $note)[2];

        $this->assessment[$key1]['items'][$key2]['note'] = $note;

        // dd($this->assessment);
    }

    public function render()
    {
        return view('livewire.audit-form');
    }
}
