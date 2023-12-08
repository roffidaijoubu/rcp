<div class="dropdown dropdown-end">
    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
        <div class="avatar placeholder">
            <div class="bg-neutral text-neutral-content rounded-full w-10 p-2">
                <x-heroicon-o-user-circle />
            </div>
        </div>
    </div>
    <ul tabindex="0" class="mt-3 z-[100] p-2 shadow menu dropdown-content bg-base-100 rounded-box w-52">
        <li>
            <a wire:navigate class="justify-between" href="/user/profile">
                Profile
                {{-- <span class="badge">New</span> --}}
            </a>
        </li>
        <li>
            <!-- Logout Link -->
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>

            <!-- Logout Form -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>