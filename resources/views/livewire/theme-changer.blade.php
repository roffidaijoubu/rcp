@php
$themes = [
    'light' => 'Light',
    'night' => 'Dark',
    'pastel' => 'Kartini',
];

@endphp

<div class="dropdown dropdown-end">
    <div tabindex="0" role="button" class="btn">Change Theme</div>
    <ul tabindex="0" class="dropdown-content z-[100] menu menu-sm p-2 shadow bg-base-100 rounded-box w-32 mt-2 flex flex-col gap-2">
        @foreach ($themes as $option=>$label)
        <li>

            <button wire:click="changeTheme('{{ $option }}')" class="flex justify-between items-center {{$theme===$option ? 'active' : ''}}">{{ $label }}
                <div wire:loading wire:target="changeTheme('{{ $option }}')" class="loading loading-spinner loading-xs"></div>
            </button>

        </li>
        @endforeach
    </ul>
</div>