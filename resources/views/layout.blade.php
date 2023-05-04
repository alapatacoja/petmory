<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PetMory</title>
    {{-- links --}}
    <script src="https://kit.fontawesome.com/71a9f6baad.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&family=Jost&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="/imgs/or.png" type="image/x-icon">

    
    {{-- css --}}
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    @include('partials/header')


        @yield('content')
   
    {{-- @include('partials/footer') --}}
</body>

</html>
