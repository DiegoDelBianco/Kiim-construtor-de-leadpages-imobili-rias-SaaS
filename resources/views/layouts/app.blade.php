<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/principal/brand/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/principal/brand/favicon-16x16.png')}}">
        <link rel="shortcut icon" href="{{asset('images/principal/brand/favicon.ico')}}">

        
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles --> 
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/principal/style.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Font awesome -->
        <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
        <!--script src="{{asset('fontawesome/js/all.min.js')}}" crossorigin="anonymous"></script-->
        
    </head>
    <body class="font-sans antialiased body-app">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <script src="{{ asset('js/principal/jquery-3.6.0.min.js') }}"></script>
                <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>








