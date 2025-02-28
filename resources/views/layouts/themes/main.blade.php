<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('layouts.partials.head')
    </head>
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <div class="container">
            @include('layouts.partials.nav')
            @yield('content')
            @include('layouts.partials.footer')
        </div>
        @include('layouts.partials.script')
    </body>
</html>
