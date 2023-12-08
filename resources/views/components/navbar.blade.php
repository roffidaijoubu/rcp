<div class="navbar bg-base-300">
    <div class="flex-1">
        <a class="pl-3" id="logo">
            <img src="{{url('/images/pgn-crp.png')}}" class="h-[34px] w-auto" alt="">
        </a>
    </div>
    <div class="flex-none gap-2">
        @livewire('theme-changer')
        @livewire('avatar-menu')
    </div>
</div>
