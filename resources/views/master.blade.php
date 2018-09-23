<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Global UPR</title>
        <link rel="icon" type="image/png" href="favicon.png">
        @component('include')
        @endcomponent
        @yield('styles')
    </head>
    <body>
        <nav class="upr-custom-navbar navbar navbar-expand-md fixed-top">
            <a class="navbar-brand" href="#">
                Global UPR 2019
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#upr-navbar" aria-controls="upr-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="upr-navbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a id="about-link" class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/donation">Donation</a>
                    </li>
                    <li class="nav-item">
                        <a id="join-volunteer-link" class="nav-link" href="#volunteer">Join As Volunteer</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="/register">Register</a>
                    </li>

                </ul>
            </div>
            </nav>
        <div id="app" class="content">
            @yield('content')
        </div>
        <script src="/js/index.js" type="text/javascript"></script>
        <script src="/js/app.js" type="text/javascript"></script>
        @yield('scripts')
    </body>
</html>
