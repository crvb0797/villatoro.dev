<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('./img/logo_64.svg') }}" type="image/x-icon">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-poppins antialiased">

    <div class="min-h-screen bg-metalic-900">
        @livewire('navigation-menu')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        {{-- FOOTER --}}
    </div>
    <footer class="relative p-6 bg-metalic-200" style="box-shadow: 0px -10px 33px rgba(0, 0, 0, 0.5)">
        <img class="line_1 absolute" src="{{ asset('./img/lines_footer.svg') }}">
        <img class="line_2 absolute rotate-180" src="{{ asset('./img/lines_footer.svg') }}">

        <div class="space-y-4">
            <div class="flex justify-center items-center">
                <img class="w-64" src="{{ asset('./img/logo_footer.svg') }}"
                    alt="Logo de carlos villatoro footer">
            </div>

            <div class="flex justify-center md:justify-end items-center">
                <p class="text-white">&copy; 2021 by <span class="font-bold text-yellow-500">Carlos
                        villatoro</span>
                </p>
            </div>
        </div>
    </footer>
    {{-- /FOOTER --}}

    @stack('modals')

    @livewireScripts
</body>

</html>
