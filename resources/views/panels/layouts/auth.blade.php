<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="shortcut icon" href="{{ asset('assets/panel/images/favicon.ico') }}">
    <livewire:styles />
    <!-- App css -->
    <link href="{{ asset('assets/panel/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/panel/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
</head>

<body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>
    @yield('content')
    <!-- bundle -->
    <livewire:scripts />
    <script src="{{ asset('assets/panel/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/panel/js/app.min.js') }}"></script>
</body>

</html>
