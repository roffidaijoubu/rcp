<?
    $this->year = $this->audit->year;

    // dd($this->assessment);
?>
<form wire:submit.prevent="save" class="h-full">


    <div class="vertical-tabs">
        <x-tabs>
            @foreach (json_decode($this->audit->assessment, true) as $key1 => $value1)
            <div class="label">
                <span class="badge">
                    {{ $value1['clause'] }}
                </span>
                {{ $value1['text'] }}
            </div>
            @foreach ($value1['items'] as $key2 => $value2)
                <x-audit-tab name="tab-{{$key1}}-{{$key2}}" badge="{{$value2['number']}}" label="{{$value2['text']}}" wire:key="tab-{{$key1}}-{{$key2}}">
                        {{-- {{$this->assessment[$key1]['items'][$key2]['score']}}
                        {{$this->assessment[$key1]['items'][$key2]['note']}} --}}
                        @livewire('audit-inputs', [
                            'key1' => $key1,
                            'key2' => $key2,
                            'score' => $value2['score'],
                            'note' => $value2['note'],
                        ])
                </x-audit-tab>
            @endforeach
            @endforeach

        </x-tabs>
    </div>


    {{-- <button wire:click.prevent="$dispatch('openDetail', { key: {{ $key }} })"> --}}

    <div class="absolute flex w-full left-0 bottom-0 bg-base-200 px-5 h-[80px] items-center justify-end">

        <x-button class="btn btn-primary" type="submit">
            {{ $this->audit->exists ? 'Update' : 'Create' }} Audit
        </x-button>
    </div>
</form>
