<div class="h-full gap-4 min-w-[400px] bg-base-100 overflow-y-scroll relative">
    <div class="sticky top-0 px-3 pt-3 pb-2 z-20 bg-base-100 border-base-content/20">

        <input type="text" class="input input-sm input-bordered w-full" wire:model.live="search"
            wire:focus="$set('isSearchFocused', true)" wire:blur="$set('isSearchFocused', false)" placeholder="Search...">
    </div>

    {{-- <ul class="menu text-lg">
        @foreach ($tableauList as $category => $details)
            <li>
                <details {{ $search != '' || $category == $property->category || $isSearchFocused ? 'open' : '' }}>
                    <summary>{{ $category }}</summary>
                    <ul>
                        @foreach ($details as $detail)
                            <li>
                                <a href="{{ route('tableau.detail', $detail->id) }}"
                                    class="{{ $detail->id == $property->id ? 'active' : '' }}">
                                    {!! $this->highlightMatch($detail->name, $search) !!}
                                </a>
                            </li>
                        @endforeach

                        <!-- If you have nested categories, you can repeat the <details> structure here -->
                    </ul>
                </details>
            </li>
        @endforeach

    </ul> --}}

    {{-- handle if $property is null --}}
    @php
        $property = $property ?? (object) ['category' => '', 'id' => ''];
    @endphp

    <div class="px-3 pb-3">
        @foreach ($tableauList as $category => $details)
            <details class="collapse collapse-arrow bg-base-200 mb-4"
                {{ $isIndex || $search != '' || $category == $property->category || $isSearchFocused ? 'open' : '' }}>
                <summary class="collapse-title text-base font-medium">{{ $category }}</summary>
                <div class="collapse-content">
                    <ul class="menu bg-base-200 flex flex-col gap-2">

                        @foreach ($details as $detail)
                            <li>
                                <a wire:navigate href="{{ route('tableau.detail', ['dashboard'=>$detail]) }}"
                                    class="text-sm {{ $detail->id == $property->id ? 'active' : '' }} flex gap-2">

                                    @if ($detail->icon)
                                        @svg($detail->icon, 'w-5 h-5')
                                    @endif
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
    @if ($tableauList->isEmpty())
        <div class="text-center text-lg mt-4 font-medium">
            No Dashboard found
        </div>
    @endif

</div>
