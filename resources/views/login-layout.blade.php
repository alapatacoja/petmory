<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PetMory - {{ __('general.register') }}</title>
    {{-- links --}}
    <script src="https://kit.fontawesome.com/71a9f6baad.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon"
        href="https://e7.pngegg.com/pngimages/1008/531/png-clipart-dog-paw-logo-dog-animals-paw-thumbnail.png"
        type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&family=Jost&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
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
    <header>
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
