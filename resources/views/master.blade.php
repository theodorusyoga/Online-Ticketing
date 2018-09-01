<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Global UPR</title>
        @component('include')
        @endcomponent
    </head>
    <body>
        <nav class="upr-custom-navbar navbar navbar-expand-md fixed-top">
            <a class="navbar-brand" href="#">
                Global UPR 2019
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#upr-navbar" aria-controls="upr-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="upr-navbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Donation</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="#">Join As Volunteer</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                    </li>
                </ul>
            </div>
            </nav>
        <div class="content">
            @yield('content')
        </div>
        <script src="/js/index.js" type="text/javascript"></script>
    </body>
</html>
