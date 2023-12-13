<div class="h-full gap-4 w-full lg:w-[450px] bg-base-100 overflow-y-scroll relative">
    <div class="sticky top-0 px-3 pt-3 pb-2 z-20 bg-base-100 border-base-content/20">

        <input type="text" class="input  input-bordered w-full" wire:model.live="search"
            wire:focus="$set('isSearchFocused', true)" wire:blur="$set('isSearchFocused', false)" placeholder="Search...">
    </div>

    {{-- handle if $property is null --}}
    @php
        $property = $property ?? (object) ['category' => '', 'id' => ''];
    @endphp

    <div class="px-3 pb-3">
        @foreach ($tableauList as $category => $details)
            <details class="collapse collapse-arrow bg-base-200 mb-4"
                {{ $isIndex || $search != '' || $category == $property->category || $isSearchFocused ? 'open' : '' }}>
                <summary class="collapse-title text-base font-medium flex items-center gap-2">
                    <div class="badge badge-sm text-xs -mt-2">
                        {{ count($details) }}
                    </div>
                    {{ $category }}
                </summary>
                <div class="collapse-content">
                    <ul class="menu bg-base-200 flex flex-col gap-2">

                        @foreach ($details as $detail)
                            <li>
                                <a wire:navigate href="{{ route('tableau.detail', ['dashboard'=>$detail]) }}"
                                    class="text-sm
                                    {{ $detail->id == $property->id ? 'active' : '' }}
                                    {{request()->url() == route('tableau.detail', ['dashboard'=>$detail]) ? 'active' : ''}}
                                    flex gap-2">



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
