<?php

namespace App\Livewire;

use Livewire\Component;

class AuditInputs extends Component
{
    public $note;
    public $score;
    public $key1;
    public $key2;
    public function render()
    {
        return view('livewire.audit-inputs');
    }

    public function updated($propertyName, $value)
    {
        // dd($propertyName, $value);
        if (str_contains($propertyName, 'score')) {
            $this->dispatch('scoreUpdated', score: ($this->key1 . "/" . $this->key2 . "/" . $value));
        }
        if ($propertyName == 'note') {
            $this->dispatch('noteUpdated', note: ($this->key1 . "/" . $this->key2 . "/" . $value));
        }
    }

    public function onSaveUpdate()
    {

    }
}
