<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{url('css/style.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
    <title>掲示板</title>
</head>
<body>
    <div class="container">
        {{ $slot }}
    </div>
</body>
</html>
