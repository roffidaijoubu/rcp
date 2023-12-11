<?
    $this->year = $this->audit->year;
    $this->assessmentBefore = $this->audit->assessment;

?>

<form wire:submit.prevent="save">

    <input type="text" wire:model="year" placeholder="Year">
    <input type="text" wire:model="assessment" placeholder="Assessment">
    @error('year')
        <span class="error">{{ $message }}</span>
    @enderror




    <button type="submit">
        {{ $this->audit->exists ? 'Update' : 'Create' }} Audit
    </button>
</form>
