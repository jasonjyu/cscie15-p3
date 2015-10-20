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
    <link rel='stylesheet' type='text/css' href='//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css'/>
    <link href='/css/random-user.css' type='text/css' rel='stylesheet'/>

    <script src='http://code.jquery.com/jquery-1.11.3.min.js'></script>
    <script src='http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js'></script>
@stop

@section('content')
    <h2>Random User Generator</h2>

    <form method='post' action='/random-user' data-transition='none'>
        <input type='hidden' value='{{ csrf_token() }}' name='_token'/>
        <fieldset>
            <label for='num_users'>Number of Users:</label>
            <input id='num_users'
                   type='range'
                   name='num_users'
                   value='<?php echo isset($_POST['num_users']) ?
                                     $_POST['num_users'] : 3; ?>'
                   min='1'
                   max='50'
                   data-show-value='false'
                   data-popup-enabled='true'
                   data-highlight='true'/>
            <br>
        </fieldset>
        <br>
        <input type='submit' value='Generate Users' data-inline='true'/>
    </form>

    @if (count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    @if (isset($users))
        <section class='random-user'>
            @foreach ($users as $user)
                <p>{{ $user }}</p>
            @endforeach
        </section>
    @endif
@stop

{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    {{-- <script src='/js/random-user.js'></script> --}}
@stop
