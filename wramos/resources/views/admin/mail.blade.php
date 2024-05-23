<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a>
                <x-application-logo class="w-auto h-14 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <h1 class="text-2xl border-b-2 border-red-500 my-2 text-center">W.Ramos Diagnostic Laboratory </h1>
            <h3 class="text-2xl border-b-2 border-red-500 my-2 text-center">194 G. Lazaro St, Dalandanan 1400
                Valenzuela, Philippines </h3>
            <h3 class="text-2xl border-b-2 border-red-500 my-2 text-center">0932 539 7973 </h3>
            <h3 class="text-2xl border-b-2 border-red-500 my-2 text-center">wramosdiagnosticlaboratory@gmail.com</h3>
            <h4 class="text-lg"><strong>Name: </strong>{{ $data['name'] }}</h4>
            <h4 class="text-lg"><strong>Email: </strong>{{ $data['email'] }}</h4>
            <h4 class="text-lg"><strong>Phone No.: </strong>{{ $data['phone'] }}</h4>
            <h4 class="text-lg"><strong>Date: </strong>{{ $data['date'] }}</h4>

            <h4 class="text-2xl border-b-2 border-red-500 inline-block mt-3">MESSAGE</h4>
            <p>{{ $data['message'] }}</p>
            <h4 class="text-2xl border-b-2 border-red-500 inline-block">REPLY</h4>
            <p>{{ $data['remarks'] }}</p>

        </div>
        <div class="text-slate-500 mt-5 text-center">
            © 2024 W. Ramos Diagnostic Laboratory
        </div>
    </div>
</body>

</html>
