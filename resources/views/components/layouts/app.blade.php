<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @livewireStyles
    @if (Request::segment(1) == 'app')
        <link href="{{ asset('assets/panel/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/panel/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    @else
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap"
            rel="stylesheet">
        <link href="{{ asset('assets/compro/css/bootstrap.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/compro/css/style.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/compro/css/responsive.css') }}" rel="stylesheet" />
    @endif
</head>
@if (Request::segment(1) == 'app')
    @if (Auth::user())

        <body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid"
            data-rightbar-onstart="true">
        @else

            <body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>
    @endif
    @if (Auth::user())
        <div class="wrapper">
            <livewire:panels.layouts.leftbar />
            <div class="content-page">
                <div class="content">
                    <livewire:panels.layouts.topbar />
                    <div class="container-fluid">
                        <livewire:panels.components.titlepage />
                        {{ $slot }}
                    </div>
                </div>
                <livewire:panels.layouts.footer />
            </div>
        </div>
    @else
        {{ $slot }}
    @endif
@else
    </body>
    <div class="hero_area">
        <livewire:compro.layouts.navbar />
        <livewire:compro.layouts.slider />
    </div>
    {{ $slot }}
    <livewire:compro.layouts.info />
    <section class="container-fluid footer_section">
        <p>
            &copy; 2020 All Rights Reserved By
            <a href="https://html.design/">Free Html Templates</a>
            Distrubuted By <a href="https://themewagon.com">ThemeWagon</a>
        </p>
    </section>
@endif
@livewireScripts
@if (Request::segment(1) == 'app')
    <script defer src="{{ asset('assets/panel/js/vendor.min.js') }}"></script>
    <script defer src="{{ asset('assets/panel/js/app.min.js') }}"></script>
@else
    <script type="text/javascript" src="{{ asset('assets/compro/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/compro/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
@endif
@stack('scripts')
</body>

</html>
