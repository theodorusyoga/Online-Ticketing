<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Global UPR</title>
        @component('include')
        @endcomponent
        @yield('styles')
    </head>
    <body>
        <div id="app" class="content">
            @yield('content')
        </div>
        <script src="/js/index.js" type="text/javascript"></script>
        @yield('scripts')
    </body>
</html>
