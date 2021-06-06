@extends('layout')

@section('content')

    <h1 class="title"> Edit Heros </h1>

    <form method="POST" action="/heros/{{ $heros->id }}">

    @method('PATCH')
    @csrf


        <div class="field">

            <label class="lable" for="name">Name </label>

            <div class="control">

                <input type="text" class="input" name="name" placeholder="Title" value="{{ $heros->name }}" required>

            </div>

        </div>

        <div class="field">

                <label class="lable" for="work">Work </label>

                <div class="control">

                      <textarea class="textarea" name="work" required>{{ $heros->work }} </textarea>

                </div>

        </div>

        <div class="field">

            <div class="control">

                <button type="submit" class="button is-link">Update Hero</button>

            </div>

        </div>

    </form>

    <form method="POST" action="/heros/{{ $heros->id }}">

    @method('DELETE')
    @csrf


        <div class="field">

            <div class="control">

                <button type="submit" class="button is-link">Delete Hero</button>

            </div>

        </div>

    </form>


 @endsection
