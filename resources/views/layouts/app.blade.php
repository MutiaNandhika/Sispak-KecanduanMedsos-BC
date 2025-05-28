<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

     <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/icon-logo.png') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/user/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    @stack('styles')

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
        }
        main {
            flex: 1; /* Biarkan main mengambil sisa tinggi di antara navbar dan footer */
            padding: 2rem;
        }
    </style>
</head>
<body>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>
