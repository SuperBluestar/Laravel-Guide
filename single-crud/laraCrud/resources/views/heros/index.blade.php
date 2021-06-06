@extends('layout')

@section('content')

</<!DOCTYPE html>
<html>
<head>

</head>
<body>

<h1 class="title">All Information About Super Hero</h1>

<p>

    <a href="/heros/create"> Create a new Hero </a>

</p>

@foreach ($heros as $hero)
<li>

    <a href="/heros/{{ $hero->id }}">

        {{ $hero->name}}

    </a>

</li>
@endforeach


</body>
</html>


@endsection
