@section('html')
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @section('metas')
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @show

        <title>@yield('title')</title>

        @section('stylesheets')
            <link rel="stylesheet" href="{{ asset(mix('/css/app.css')) }}"/>
        @show
    </head>

    <body @yield('body-attr')>
        @section('body')
            @yield('content')
        @show

        @section('javascripts')
            <script src="{{ asset(mix('/js/app.js')) }}"></script>
        @show
    </body>
</html>
@show