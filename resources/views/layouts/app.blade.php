<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LaraStore') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @include('includes.styles')

    <livewire:styles/>
    <livewire:scripts/>

</head>
<body>
    <div id="app">

       <livewire:navbar/>

        <main>
            @yield('content')
            @include('includes.footer')
        </main>
    </div>
    @include('includes.scripts')
</body>
</html>
