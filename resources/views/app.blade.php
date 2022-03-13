<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> -->

    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dark-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/transparent-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/skin-modes.css') }}">

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('assets/colors/color1.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="../assets/colors/color1.css" />

    <!-- Scripts -->
    <!-- JQUERY JS -->
    <script src="../assets/js/jquery.min.js" defer></script>

    <!-- BOOTSTRAP JS -->
    <script src="../assets/plugins/bootstrap/js/popper.min.js" defer></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js" defer></script>

    <!-- INTERNAL Notifications js -->
    <script src="{{ asset('assets/plugins/notify/js/rainbow.js') }}" defer></script>
    <script src="{{ asset('assets/plugins/notify/js/sample.js') }}" defer></script>
    <script src="{{ asset('assets/plugins/notify/js/jquery.growl.js') }}" defer></script>
    <script src="{{ asset('assets/plugins/notify/js/notifIt.js') }}" defer></script>

    @routes
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body class="bg-light">
    @inertia

    @env ('local')
    <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
    @endenv
</body>

</html>