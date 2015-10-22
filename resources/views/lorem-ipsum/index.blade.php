@extends('layouts.master')

@section('title')
    Lorem Ipsum Generator
@stop

{{-- This `head` section will be yielded right before the closing </head> tag.
     Use it to add specific things that *this* View needs in the head, such as
     a page specific styesheets.
--}}
@section('head')
    <link rel='stylesheet' type='text/css' href='//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css'/>
    <link href='/css/lorem-ipsum.css' type='text/css' rel='stylesheet'/>

    <script src='http://code.jquery.com/jquery-1.11.3.min.js'></script>
    <script src='http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js'></script>
@stop

@section('content')
    <h2>Lorem Ipsum Generator</h2>

    <form method='post' action='/lorem-ipsum' data-transition='none'>
        <input type='hidden' value='{{ csrf_token() }}' name='_token'/>
        <fieldset>
            <label class='ui-slider-input' for='num_paragraphs'>
                Number of Paragraphs:
            </label>
            <input id='num_paragraphs'
                   type='range'
                   name='num_paragraphs'
                   value='{{ $_POST['num_paragraphs'] or 3 }}'
                   min='1'
                   max='50'
                   data-show-value='false'
                   data-popup-enabled='true'
                   data-highlight='true'/>
        </fieldset>
        <br/>
        <fieldset>
            <label class='ui-slider-input' for='num_sentences'>
                Number of Sentences Per Paragraph:
            </label>
            <input id='num_sentences'
                   type='range'
                   name='num_sentences'
                   value='{{ $_POST['num_sentences'] or 5 }}'
                   min='1'
                   max='50'
                   data-show-value='false'
                   data-popup-enabled='true'
                   data-highlight='true'/>
        </fieldset>
        <br/>
        <fieldset>
            <label class='ui-slider-input' for='num_words'>
                Number of Words Per Sentence:
            </label>
            <input id='num_words'
                   type='range'
                   name='num_words'
                   value='{{ $_POST['num_words'] or 8 }}'
                   min='1'
                   max='50'
                   data-show-value='false'
                   data-popup-enabled='true'
                   data-highlight='true'/>
        </fieldset>
        <br/>
        <input type='submit' value='Generate Text' data-inline='true'/>
    </form>
    <hr/>

    {{-- if there are errors, then print them out --}}
    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{-- if the $text array is set, then print out the lorem-ipsum text
         for each paragraph
    --}}
    @if (isset($text))
        <section class='lorem-ipsum'>
            @foreach ($text as $paragraph)
                <p>{{ $paragraph }}</p>
            @endforeach
        </section>
    @endif
@stop

{{-- This `body` section will be yielded right before the closing </body> tag.
     Use it to add specific things that *this* View needs at the end of the
     body, such as a page specific JavaScript files.
--}}
@section('body')
    {{-- <script src='/js/lorem-ipsum.js'></script> --}}
@stop
