<div class="navbar bg-base-300 fixed top-0 lg:relative z-[200]">
    <div class="flex-1">
        <a wire:navigate href="/" class="pl-3" id="logo">
            <img src="{{ Vite::asset('public/images/pgn-crp.png') }}" class="h-[34px] w-auto" alt="">
        </a>
    </div>
    <div class="flex-none gap-2">
        <label class="btn btn-ghost btn-circle avatar" for="right-drawer">
            <div class="avatar placeholder">
                <div class="bg-neutral text-neutral-content rounded-full w-10 p-2">
                    <x-heroicon-o-user-circle />
                </div>
            </div>
        </label>
    </div>
</div>
