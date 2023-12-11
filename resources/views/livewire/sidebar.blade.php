<aside class="w-24 bg-base-200 text-base-content flex flex-col gap-4 items-center py-1">
    <ul class="menu flex flex-col gap-2 h-full">

        @foreach($menus as $menu)
        <li>
            <a wire:navigate.hover href="{{ route($menu['route']) }}"
                class="{{ str_contains(Route::currentRouteName(), $menu['route']) ? 'text-primary bg-primary/10' : '' }} flex gap-1 flex-col items-center justify-center w-20 h-20">
                <x-icon name="{{$menu['icon']}}" class="w-8 h-8"/>
                <span class="text-xs">{{$menu['label']}}</span>
            </a>
        </li>
        @endforeach
        @if(auth()->user()->isAdmin())
        <li class="mt-auto">
            <a href="/admin" target="_blank" class="flex gap-1 flex-col items-center justify-center w-20 h-20">
                <x-heroicon-o-adjustments-horizontal class="w-8 h-8"/>
                <span class="text-xs">Admin</span>
            </a>
        </li>
        @endif
    </ul>
</aside>
