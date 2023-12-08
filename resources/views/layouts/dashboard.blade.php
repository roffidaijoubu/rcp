<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />

    <!-- Fonts -->



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="lg:h-screen flex flex-col bg-center bg-cover lg:max-h-screen" {{-- style="background:url('/images/background.jpg')" --}}>
    <x-toast />

    @livewire('navbar')

    <main class="flex flex-grow relative overflow-hidden">
        <livewire-sidebar />
        <section class="flex flex-col w-full h-full">
            <div class="overflow-hidden h-full">
                {{ $slot }}
            </div>
            <footer
                class="p-2 bg-base-200 text-base-content h-7 text-center text-xs flex justify-center items-center w-full flex-shrink-0 ">
                <div>
                    <p>Copyright © PT Perusahaan Gas Negara, Tbk. • All Rights Reserved</p>
                </div>
            </footer>
        </section>
    </main>
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
