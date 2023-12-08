<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="night">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="lg:h-screen flex flex-col bg-center bg-cover lg:max-h-screen" {{-- style="background:url('/images/background.jpg')" --}}>
    <x-toast />

    <x-navbar />

    <main class="flex flex-grow relative overflow-hidden">
        <livewire-sidebar />
        <section class="flex flex-col w-full h-full">
            <div class="overflow-hidden h-full">
                {{ $slot }}
            </div>
            <footer
                class="p-2 bg-base-200 text-base-content h-7 text-center text-xs flex justify-center items-center w-full flex-shrink-0 ">
                <div>
                    <p>© 2023 All rights reserved</p>
                </div>
            </footer>
        </section>
    </main>
    {{--  --}}

    @stack('modals')
    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/theme-change@2.0.2/index.js"></script>
</body>

</html>
