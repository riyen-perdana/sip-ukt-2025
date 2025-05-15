<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Sistem Informasi Penyesuaian UKT - Universitas Islam Negeri Sultan Syarif Kasim Riau</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

        <!-- Scripts -->
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-['Poppins']" antialiased>
        {{-- <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
            <div>
                <a href="/" wire:navigate>
                    <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
                </a>
            </div>

            <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg">
                {{ $slot }}
            </div>
        </div> --}}
        <div class="bg-white dark:bg-gray-900">
            <div class="flex justify-center h-screen">
                <div class="hidden bg-cover border-r-1 lg:block lg:w-2/3" style="background-image: url('/assets/images/pattern_react.jpg')">
                </div>
                <div class="flex items-center justify-center w-full max-w-* px-6 mx-auto bg-slate-50 lg:w-2/6">
                    <div class="w-full px-6 py-4 mt-6 overflow-hidden sm:max-w-md sm:rounded-lg">
                        <div class="flex flex-col gap-y-5">
                            <div class="flex flex-row items-center gap-x-3">
                                <img src="{{asset('assets/images/logo.png')}}" alt="" class="h-[60px]">
                                <div class="flex flex-col gap-y-1">
                                    <h3 class="text-sm font-semibold leading-none md:block lg:block text-indigo-950">Sistem Informasi Penyesuaian UKT</h3>
                                    <h4 class="text-xs font-semibold leading-none md:block lg:block text-indigo-950">Universitas Islam Negeri Sultan Syarif Kasim Riau</h4>
                                </div>
                            </div>
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @livewireScript
    </body>
</html>
