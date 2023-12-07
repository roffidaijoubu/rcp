<div class="flex flex-col gap-4 -ml-10 -mt-10 p-5 min-w-[400px]">
    <input type="text" class="input input-bordered" wire:model.live="search" wire:focus="$set('isSearchFocused', true)"
        wire:blur="$set('isSearchFocused', false)" placeholder="Search...">

    @foreach ($tableauList as $category => $details)
        <details class="collapse bg-base-200"
            {{ $search != '' || $category == $property->category || $isSearchFocused ? 'open' : '' }}>
            <summary class="collapse-title text-xl font-medium">{{ $category }}</summary>
            <div class="collapse-content">
                <ul class="menu bg-base-200">

                    @foreach ($details as $detail)
                        <li>
                            <a href="{{ route('tableau.detail', $detail->id) }}"
                                class="{{ $detail->id == $property->id ? 'active' : '' }}">
                                <span>
                                    {!! $this->highlightMatch($detail->name, $search) !!}
                                </span>
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </details>
    @endforeach

</div>
