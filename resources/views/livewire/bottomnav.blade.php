<div class="btm-nav fixed bottom-0 z-[200]">
    <a wire:navigate.hover href="{{ route('tableau') }}"
        class="{{ request()->routeIs('tableau') || request()->routeIs('tableau.detail') ? 'text-primary active' : '' }} flex gap-1 flex-col items-center justify-center">
        <x-heroicon-s-chart-bar-square class="w-6 h-6" />
        <span class="text-xs">Dashboard</span>
    </a>
    <a wire:navigate.hover href="{{ route('assets') }}"
        class="{{ request()->routeIs('assets') ? 'text-primary active' : '' }} flex gap-1 flex-col items-center justify-center">
        <x-heroicon-o-table-cells class="w-6 h-6" />
        <span class="text-xs">Assets</span>
    </a>
    <a wire:navigate.hover href="{{ route('audits') }}"
        class="{{ request()->routeIs('audit') ? 'text-primary active' : '' }} flex gap-1 flex-col items-center justify-center">
        <x-heroicon-o-table-cells class="w-6 h-6" />
        <span class="text-xs">Audit</span>
    </a>
    @if(auth()->user()->isAdmin())
        <a href="/admin" target="_blank" class="flex gap-1 flex-col items-center justify-center">
            <x-heroicon-o-adjustments-horizontal class="w-6 h-6" />
            <span class="text-xs">Admin</span>
        </a>
    @endif
</div>
