<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="">

<head>
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="viewport-fit=cover"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <!-- Fonts -->



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body {{-- style="background:url('/images/background.jpg')" --}}>
    <x-toast />

    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif

    <x-thelayout>
        @slot('main_content')
            <main class="h-screen flex flex-col bg-center bg-cover max-h-screen py-[64px] lg:py-0">
                @livewire('navbar')
                <div class="flex flex-grow relative overflow-hidden">
                    <x-dashboard.navigation />
                    <section class="flex flex-col w-full h-full">
                        <div class="overflow-hidden h-full">
                            {{ $slot }}
                        </div>
                        <footer
                            class="hidden lg:flex p-2 bg-base-200 text-base-content h-7 text-center text-xs justify-center items-center w-full flex-shrink-0 ">
                            <div>
                                <p>Copyright © PT Perusahaan Gas Negara, Tbk. • All Rights Reserved</p>
                            </div>
                        </footer>
                    </section>
                </div>
            </main>
        @endslot


        @slot('right_drawer')
            <div class="h-full flex flex-col">
                <div class="flex items-center justify-between h-20 px-8">
                    <p class="font-bold">
                        Hello, {{ auth()->user()->name }}!
                    </p>
                </div>
                <ul class="menu menu-lg flex flex-col gap-4 h-full">
                    <li>
                        <a wire:navigate href="{{ route('profile.show') }}">
                            Profile Settings
                        </a>
                    </li>
                    <li>
                        @livewire('theme-changer')
                    </li>
                    <li class="mt-auto">
                        <!-- Logout Link -->
                        <a class="text-error" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <!-- Logout Form -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        @endslot
    </x-thelayout>



    {{--  --}}

    @stack('modals')
    @livewireScripts

    <script>
        window.addEventListener('theme-change', (event) => {
            const theme = event.detail;
            document.documentElement.setAttribute('data-theme', theme);
        })
    </script>
</body>

</html>
