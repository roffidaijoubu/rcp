<div class="flex flex-col gap-4">
    @foreach ($tableauList as $category => $details)
        <details class="collapse bg-base-200">
            <summary class="collapse-title text-xl font-medium">{{ $category }}</summary>
            <div class="collapse-content">
                <x-menu activate-by-route>
                    @foreach ($details as $detail)
                        <x-menu-item title="{{ $detail->name }}" link="{{ route('tableau.detail', $detail->id) }}" />
                    @endforeach
                </x-menu>
            </div>
        </details>
    @endforeach

</div>
