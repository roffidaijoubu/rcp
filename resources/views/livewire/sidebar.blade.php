<aside class="w-24 bg-base-200 text-base-content flex flex-col gap-4 items-center py-1">
    <ul class="menu flex flex-col gap-2 h-full">
        <li>
            <a wire:navigate.hover href="{{ route('tableau') }}"
                class="{{ request()->routeIs('tableau') || request()->routeIs('tableau.detail') ? 'text-primary bg-primary/10' : '' }} flex gap-1 flex-col items-center justify-center w-20 h-20">
                <x-heroicon-s-chart-bar-square class="w-8 h-8"/>
                <span class="text-xs">Dashboard</span>
            </a>
        </li>
        <li>
            <a wire:navigate.hover href="{{ route('assets') }}"
                class="{{ request()->routeIs('assets') ? 'text-primary bg-primary/10' : '' }} flex gap-1 flex-col items-center justify-center w-20 h-20">
                <x-heroicon-o-table-cells class="w-8 h-8"/>
                <span class="text-xs">Assets</span>
            </a>
        </li>
        <li class="mt-auto">
            <a href="/admin" target="_blank" class="flex gap-1 flex-col items-center justify-center w-20 h-20">
                <x-heroicon-o-adjustments-horizontal class="w-8 h-8"/>
                <span class="text-xs">Admin</span>
            </a>
        </li>
    </ul>
</aside>
