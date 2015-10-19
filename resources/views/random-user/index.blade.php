@extends('layouts.master')

@section('title')
    Random User Generator
@stop

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')
    {{-- <link href='/css/random-user.css' type='text/css' rel='stylesheet'> --}}
@stop

@section('content')
    <h2>Random User Generator</h2>

    @if (count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <form method='POST' action='/random-user'>
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
    {{-- <script src='/js/random-user.js'></script> --}}
@stop
