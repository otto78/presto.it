<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content={{csrf_token()}}>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="shortcut icon" href="/img/icona_presto.png" />
    {{-- Libreria AOS --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Presto.it</title>
</head>
<body>
    
<x-navbar>

</x-navbar>

{{$slot}}

    <script src="{{asset('js/app.js')}}"></script>
    {{-- Libreia AOS --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>