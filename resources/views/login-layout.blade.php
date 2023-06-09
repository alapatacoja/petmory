<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PetMory - {{ __('general.register') }}</title>
    {{-- links --}}
    <script src="https://kit.fontawesome.com/71a9f6baad.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="/imgs/or.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&family=Jost&display=swap" rel="stylesheet">
    {{-- css --}}
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/login.css">
</head>
<style>
    .asteriskField {
        color: red;
    }
</style>

<body>
    <header class="header-login">
        <div class="logo">
            <a href="{{ route('home') }}">{{-- <span class="fa-brands fa-pinterest"></span> --}}
                <h1>Petmory</h1>
            </a>
        </div>
    </header>
    <div class="body b-login">
    @yield('content')
    <div class="info">
        <div class="title">
            <ul class="textos">
                <li><span>Pets</span></li>
                <li><span>Memories</span></li>
                <li><span>Petmory</span></li>
            </ul>
        </div>
        <p>{{ __('general.resumen') }}</p>
        <img src="/imgs/img1.png" alt="ilustración de personas con sus mascotas">
    </div>


</div> 
    @include('partials.footer')
</body>


</html>
