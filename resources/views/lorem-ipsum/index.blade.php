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

    <form method='post' action='/lorem-ipsum' data-transition='none'
          {!! App::environment('local') ? 'data-ajax=\'false\'' : '' !!}>
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
                   value='{{ $_POST['num_sentences'] or 13 }}'
                   min='1'
                   max='50'
                   data-show-value='false'
                   data-popup-enabled='true'
                   data-highlight='true'/>
        </fieldset>
        <br/>
        <fieldset>
            <label for='locale'>Language:</label>
            <select name='locale' id='locale'>
                <option value='la_LA'>Latin</option>
                <option value='ar_JO' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'ar_JO') echo 'selected'; ?>>Arabic</option>
                <option value='zh_TW' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'zh_TW') echo 'selected'; ?>>Chinese</option>
                <option value='cs_CZ' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'cs_CZ') echo 'selected'; ?>>Czech </option>
                <option value='fa_IR' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'fa_IR') echo 'selected'; ?>>Farsi </option>
                <option value='fr_FR' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'fr_FR') echo 'selected'; ?>>French</option>
                <option value='ka_GE' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'ka_GE') echo 'selected'; ?>>Georgian</option>
                <option value='de_DE' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'de_DE') echo 'selected'; ?>>German</option>
                <option value='hu_HU' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'hu_HU') echo 'selected'; ?>>Hungarian</option>
                <option value='it_IT' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'it_IT') echo 'selected'; ?>>Italian</option>
                <option value='kk_KZ' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'kk_KZ') echo 'selected'; ?>>Kazakh </option>
                <option value='pl_PL' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'pl_PL') echo 'selected'; ?>>Polish </option>
                <option value='ru_RU' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'ru_RU') echo 'selected'; ?>>Russian</option>
                <option value='uk_UA' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'uk_UA') echo 'selected'; ?>>Ukrainian</option>
            </select>
        </fieldset>
        <br/>
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
