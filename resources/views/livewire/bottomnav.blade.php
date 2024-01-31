<div class="btm-nav fixed bottom-0 z-[200]">
    @foreach($menus as $menu)
        <a
        wire:navigate
        href="{{ route($menu['route']) }}"
            class="{{ request()->routeIs($menu['route']) ? 'text-primary active' : '' }} flex gap-1 flex-col items-center justify-center">
            <x-icon name="{{$menu['icon']}}" class="w-6 h-6"/>
            <span class="text-xs">{{ $menu['label'] }}</span>
        </a>
    @endforeach
    @if(auth()->user()->isAdmin())
        <a href="/admin" target="_blank" class="flex gap-1 flex-col items-center justify-center">
            <x-heroicon-o-adjustments-horizontal class="w-6 h-6" />
            <span class="text-xs">Admin</span>
        </a>
    @endif
</div>
