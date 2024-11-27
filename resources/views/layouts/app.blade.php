<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials.header')
<body>
    <div id="app">
            @include('partials.navbar')
        <main class="py-4">
            @include('partials.errors')
            @yield('content')
        </main>
    </div>
</body>
</html>
