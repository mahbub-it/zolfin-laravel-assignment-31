<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- for ajax --}}
    <title>Document</title>
</head>

<body>

    <form action="{{ route('csrf-testing') }}" method="POST">

        {{-- <input name="_token" type="hidden" value="{{ csrf_token() }}"> // or csrf same thing --}}

        @csrf

        <input type="text">

        <button type="submit">Submit</button>

    </form>

</body>

</html>