@extends('layout')

@section('content')

<h1 class="title" > Below is the name of super hero </h1>

<h1 class="title" > {{ $hero->name }} </h1>

<h1 class="title" > {{ $hero->work }} </h1>

<p>

    <a href="/heros/{{ $hero->id }}/edit"> Edit Hero </a>

</p>

@endsection
