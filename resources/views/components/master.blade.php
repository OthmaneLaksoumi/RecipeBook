@props(['title'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <title>My Recipes | {{$title}}</title>
</head>
<body>

    @include('partials.header')

    {{ $slot }}
    

    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>