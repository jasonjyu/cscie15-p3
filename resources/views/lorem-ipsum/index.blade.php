@extends('layouts.master')

@section('title')
    Lorem Ipsum Generator
@stop

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')
    {{-- <link href='/css/lorem-ipsum.css' type='text/css' rel='stylesheet'> --}}
@stop

@section('content')
    <h2>Lorem Ipsum Generator</h2>

    <form method='POST' action='/lorem-ipsum'>
        <input type='hidden' value='{{ csrf_token() }}' name='_token'/>
        <fieldset>
            <label for='title'>Number of Paragraphs:</label>
            <input type='text' id='num_paragraphs' name='num_paragraphs'/>
        </fieldset>
        <fieldset>
            <label for='title'>Number of Sentences Per Paragraph:</label>
            <input type='text' id='num_sentences' name='num_sentences'/>
        </fieldset>
        <fieldset>
            <label for='title'>Number of Words Per Sentence:</label>
            <input type='text' id='num_words' name='num_words'/>
        </fieldset>
        <br>
        <button type='submit' class='btn btn-primary'>Generate</button>
    </form>

    @if (count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    @if (isset($text))
        <section>
            @foreach ($text as $paragraph)
                <p>
                {{ $paragraph }}
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
    {{-- <script src='/js/lorem-ipsum.js'></script> --}}
@stop
