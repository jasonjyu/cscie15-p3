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
    <link rel='stylesheet' type='text/css' href='//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css'/>
    <link href='/css/xkcd-password.css' type='text/css' rel='stylesheet'/>

    <script src='http://code.jquery.com/jquery-1.11.3.min.js'></script>
    <script src='http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js'></script>
@stop

@section('content')
    <h2>xkcd Password Generator</h2>

    <section class='xkcd-password'>
        {{-- if the $password is set, then print it out --}}
        {!! $password or '<br>' !!}
    </section>

    <form method='POST' action='/xkcd-password' data-transition='none'>
        <input type='hidden' value='{{ csrf_token() }}' name='_token'/>
        <input type='submit' value='Generate Password' data-inline='true'/>
        <hr/>
        <fieldset>
            <label class='ui-slider-input' for='min_words'>
                Minimum Number of Words:
            </label>
            <input id='min_words' type='range'
                   name='min_words'
                   value='{{ $_POST['min_words'] or 3 }}'
                   min='2'
                   max='9'
                   data-show-value='false'
                   data-popup-enabled='true'
                   data-highlight='true'/>
        </fieldset>
        <br/>
        <fieldset>
            <label for='num_digits'>Number of Digits:</label>
            <input id='num_digits' type='range'
                   name='num_digits'
                   value='{{ $_POST['num_digits'] or 1 }}'
                   min='0'
                   max='3'
                   data-show-value='false'
                   data-popup-enabled='true'
                   data-highlight='true'/>
        </fieldset>
        <br/>
        <fieldset>
            <label for='num_symbols'>Number of Symbols:</label>
            <input id='num_symbols' type='range'
                   name='num_symbols'
                   value='{{ $_POST['num_symbols'] or 1 }}'
                   min='0'
                   max='3'
                   data-show-value='false'
                   data-popup-enabled='true'
                   data-highlight='true'/>
        </fieldset>
        <br/>
        <fieldset>
            <label for='min_password_length'>Minimum Password Length:</label>
            <input id='min_password_length' type='range'
                   name='min_password_length'
                   value='{{ $_POST['min_password_length'] or 12 }}'
                   min='8'
                   max='32'
                   data-show-value='false'
                   data-popup-enabled='true'
                   data-highlight='true'/>
        </fieldset>
        <br/>
        <fieldset data-role='controlgroup' data-type='horizontal'>
            <p>Separator:</p>
            <label for='hyphen'>&mdash;</label>
            <input id='hyphen' type='radio'
                   name='separator'
                   value='-'
                   <?php if(isset($_POST['separator']) &&
                         $_POST['separator'] == '-')
                         echo 'checked'; ?>/>
            <label for='period'>.</label>
            <input id='period' type='radio'
                   name='separator'
                   value='.'
                   <?php if(isset($_POST['separator']) &&
                         $_POST['separator'] == '.')
                         echo 'checked'; ?>/>
            <label for='colon'>:</label>
            <input id='colon' type='radio'
                   name='separator'
                   value=':'
                   <?php if(isset($_POST['separator']) &&
                         $_POST['separator'] == ':')
                         echo 'checked'; ?>/>
            <label for='space'>Space</label>
            <label for='underscore'>__</label>
            <input id='underscore' type='radio'
                   name='separator'
                   value='_'
                   <?php if(isset($_POST['separator']) &&
                         $_POST['separator'] == '_')
                         echo 'checked'; ?>/>
            <input id='space' type='radio'
                   name='separator'
                   value=' '
                   <?php if(isset($_POST['separator']) &&
                         $_POST['separator'] == ' ')
                         echo 'checked'; ?>/>
            <label for='none'>None</label>
            <input id='none' type='radio'
                   name='separator'
                   value=''
                   <?php if(isset($_POST['separator']) &&
                         $_POST['separator'] == '')
                         echo 'checked'; ?>/>
        </fieldset>
        <br/>
        <fieldset data-role='controlgroup' data-type='horizontal'>
            <p>Letter Case:</p>
            <label for='lower'>lower</label>
            <input id='lower' type='radio'
                   name='letter_case'
                   value='strtolower'
                   <?php if(isset($_POST['letter_case']) &&
                         $_POST['letter_case'] == 'strtolower')
                         echo 'checked'; ?>/>
            <label for='upper'>UPPER</label>
            <input id='upper' type='radio'
                   name='letter_case'
                   value='strtoupper'
                   <?php if(isset($_POST['letter_case']) &&
                         $_POST['letter_case'] == 'strtoupper')
                         echo 'checked'; ?>/>
            <label for='capitalized'>Capitalized</label>
            <input id='capitalized' type='radio'
                   name='letter_case'
                   value='ucfirst'
                   <?php if(isset($_POST['letter_case']) &&
                         $_POST['letter_case'] == 'ucfirst')
                         echo 'checked'; ?>/>
        </fieldset>
    </form>

    {{-- if there are errors, then print them out --}}
    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div>
        <hr>
        <p>
            This page generates passwords inspired by the xkcd
            <a href='http://xkcd.com/936/'>
                Password Strength
            </a>
            comic strip.
            <br>
            <a href='http://xkcd.com/936/'>
                <img class='comic' src='http://imgs.xkcd.com/comics/password_strength.png' alt='xkcd password strength'>
            </a>
            <br>
            The list of words come from
            <a href='http://www.wordfrequency.info'>
                http://www.wordfrequency.info
            </a>
            .
        </p>
    </div>
@stop

{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    {{-- <script src='/js/xkcd-password.js'></script> --}}
@stop
