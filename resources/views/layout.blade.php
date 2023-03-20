<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PetMory</title>
    {{-- links --}}
    <script src="https://kit.fontawesome.com/71a9f6baad.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon"
        href="https://e7.pngegg.com/pngimages/1008/531/png-clipart-dog-paw-logo-dog-animals-paw-thumbnail.png"
        type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&family=Jost&display=swap" rel="stylesheet">
    {{-- css --}}
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    @include('partials/header')

    <div class="body">
        @yield('content')
    </div>
    <div class="side">@yield('sidebar')</div>
    @include('partials/footer')
</body>

</html>
