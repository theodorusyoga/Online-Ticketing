<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="title" content="World Generation Gathering - Global UPR">
        <meta name="description" content="4 hari konfrensi doa yang akan mengubah dunia. Segera daftarkan diri Anda sekarang!">
        <title>World Generation Gathering - Global UPR</title>
        <link rel="icon" type="image/png" href="favicon.png">
        @component('include')
        @endcomponent
        @yield('styles')
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WT5394F');</script>
        <!-- End Google Tag Manager -->
    </head>
    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WT5394F"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
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
        <script src="/js/index_11102018.js" type="text/javascript"></script>
        @yield('scripts')
    </body>
</html>
