<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @if(false)
        <script src="{{ mix('js/app.js') }}" defer></script>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @else
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endif
    <script>
        function initMap() {
            // The location of Uluru
            const uluru = { lat: -10.169017209105768, lng: 123.57494483170778 };
            // The map, centered at Uluru
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 17,
                center: uluru,
            });
            // The marker, positioned at Uluru
            const marker = new google.maps.Marker({
                position: uluru,
                map: map,
            });
        }
    </script>
</head>
<body class="position-relative">
    <div id="app">
        <main class="position-relative">
            @yield('content')
        </main>
    </div>
    @stack('footer')
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWopilYZbUSAKPyaLJpYNqSgM45H6aOhY&callback=initMap&libraries=&v=weekly"
      async
    ></script>
</body>
</html>
