<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="nord">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="lg:h-screen lg:overflow-hidden flex flex-col bg-center bg-cover" style="background:url('/images/background.jpg')">
        
        <header class="navbar bg-primary text-primary-content">
            <div class="flex-none">
                <label for="my-drawer" class="btn btn-square btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-5 h-5 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                        </path>
                    </svg>
                </label>
    
    
            </div>
            <div class="flex-1">


                <a class="btn btn-ghost text-xl">CRP</a>
            </div>
            
        </header>
        <main class="flex h-full relative">
            {{$slot}}
        </main>
        <footer class="p-2 footer bg-base-200 text-base-content footer-center">
            <div>
                <p>© 2023 All rights reserved</p>
            </div>
        </footer>
        
</body>

</html>
