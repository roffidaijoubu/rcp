<div class="w-full h-full bg-base-100 relative flex flex-col flex-nowrap">
    <form id="searchForm" class="flex gap-4 p-2 items-center">
        <div class="join w-full">

            <input type="text" name="search" id="searchAssets" class="join-item input input-bordered w-full"
                value="{{ $search }}" placeholder="Search assets...">
            <button type="submit" class="join-item btn btn-primary btn-primary-conte flex items-center gap-2">
                Search
            </button>
        </div>
    </form>


    <script>
        // when #searchForm is submitted, use Livewire to navigate to the new URL
        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault();
            document.getElementById('hideOnNavigating').classList.add('hidden');
            document.getElementById('showOnNavigating').classList.remove('hidden');
            Livewire.navigate('?search=' + document.getElementById('searchAssets').value);

        });
    </script>
    <div class="overflow-auto h-full" id="hideOnNavigating">

        <table wire:loading.remove wire:target="search" class="table table-sm table-zebra table-pin-rows">
            @if ($search != '')
            <thead>
                <tr>
                    @foreach ($columns as $column => $displayName)
                        <th class="bg-base-200 text-base-content py-3">
                            <div class="cursor-pointer flex gap-1 items-center"
                                wire:click="sortBy('{{ $column }}')">
                                {{ $displayName }}
                                @if ($sortColumn === $column)
                                    <span>{!! $sortDirection === 'asc' ? '&#8659;' : '&#8657;' !!}</span>
                                @endif
                                <span wire:loading wire:target="columnSearches.{{ $column }}"
                                    class="loading loading-dots loading-xs">
                                </span>
                            </div>
                            <input type="text" class="input mt-1 font-normal input-xs input-bordered w-[150px]"
                                wire:model.live.debounce.200ms="columnSearches.{{ $column }}"
                                placeholder="Search {{ strtolower($displayName) }}...">
                        </th>
                    @endforeach
                    <!-- Add other table headers here -->
                </tr>
            </thead>

            <tbody>
                @foreach ($assets as $asset)
                    <tr>
                        @foreach ($columns as $column => $displayName)
                            <td>
                                {!! $this->highlightMatch($asset[$column], $columnSearches[$column]) !!}
                                {{-- {{ $asset[$column] }} --}}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            @endif
        </table>

        @if ($search == '')
            <div class="flex flex-col items-center justify-center h-full">
                <div class="h-[400px] w-[400px] opacity-50 mb-5 text-error">
                    <x-undraw illustration="searching" color="currentColor" />
                </div>

                <div class="text-2xl font-semibold">Please enter a search term</div>
                <div class="text-sm text-base-content/50">Try searching for a keyword, category, or asset type.
                </div>
            </div>
        @else
            @if (empty($assets))
                <div class="flex flex-col items-center justify-center h-full">
                    <div class="h-[400px] w-[400px] opacity-50 mb-5 text-error">
                        <x-undraw illustration="searching" color="currentColor" />
                    </div>

                    <div class="text-2xl font-semibold">No results found</div>
                    <div class="text-sm text-base-content/50">Try adjusting your search or filter to find what you're looking
                        for.
                    </div>
                </div>
            @else
            @endif
        @endif


    </div>
    
    <div class="hidden h-full flex flex-col gap-4 items-center justify-center" id="showOnNavigating">
        <div class="loading loading-bars loading-lg"></div>
        <div class="text-2xl font-semibold">Searching...</div>
    </div>

    <div class="z-40 w-full bg-base-200 flex items-center justify-end h-7 px-2">
        <div class="text-sm flex-grow w-fit break text-right" style="text-wrap: nowrap;">
            Showing <span class="font-semibold">{{ count($assets) }} results</span>
        </div>
    </div>

</div>
