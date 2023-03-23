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
    {{-- css --}}
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
    <header>
        <div class="logo">
            <a href="{{ route('home') }}">{{-- <span class="fa-brands fa-pinterest"></span> --}}
                <h1>Petmory</h1>
            </a>
        </div>
    </header>

    <div class="body b-login">
        <div class="form"><div> <h2>{{ __('general.register') }}</h2>
            <h5 class="red">{{ __('general.fields', ['char' => '*']) }}</h5></div>
           
            <form action="" method="post">
                @csrf

                <label for="name"><span class="red">*</span>{{ __('general.nombre') }}:</label> <br>
                <input type="text" name="name" id="name" value="{{ old('name') }}"> <br>
                <label for="name"><span class="red">*</span>{{ __('general.usuario') }}:</label> <br>
                <input type="text" name="name" id="name" value="{{ old('name') }}"> <br>
                <label for="email"><span class="red">*</span>{{ __('general.email') }}:</label> <br>
                <input type="email" name="email" id="email" value="{{ old('email') }}"> <br>

                <label for="password"><span class="red">*</span>{{ __('general.pass') }}:</label> <br>
                <input type="password" name="password" id="password"> <br>

                <label for="password_confirmation"><span class="red">*</span>{{ __('general.pass_val') }}:</label>
                <br>
                <input type="password" name="password_confirmation" id="password_confirmation"> <br>

                <label for="pfp">{{ __('general.pfp') }}:</label><br>
                <input type="file" name="pfp" id="pfp" value="{{ old('pfp') }}"><br>

                <div class="boton"><input type="submit" value="{{ __('general.submit') }}"></div>
            </form>
        </div>
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
