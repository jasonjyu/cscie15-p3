@extends('layouts.master')

@section('title')
    xkcd Password Generator
@stop

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')
    {{-- <link href='/css/xkcd-password.css' type='text/css' rel='stylesheet'> --}}
@stop

@section('content')
    <h1>xkcd Password Generator</h1>

    @if (count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <form method='POST' action='/xkcd-password'>
        <input type='hidden' value='{{ csrf_token() }}' name='_token'>
        <fieldset>
            <label for='title'>Title:</label>
            <input type='text' id='title' name='title'>
        </fieldset>
        <br>
        <button type='submit' class='btn btn-primary'>Generate</button>
    </form>
@stop

{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    {{-- <script src='/js/xkcd-password.js'></script> --}}
@stop
