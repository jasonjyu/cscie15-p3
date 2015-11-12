@extends('layouts.master')

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')
    <link href='/css/home.css' type='text/css' rel='stylesheet'/>
@stop

@section('content')
    <div>
        <h2><a href='/lorem-ipsum' data-ajax='false'>Lorem Ipsum Generator</a></h2>
        <p>
            This <a href='/lorem-ipsum' data-ajax='false'>web application</a>
            generates
            <a href='https://en.wikipedia.org/wiki/Lorem_ipsum'>Lorem Ipsum</a>
            text, which
            <i>is a filler text commonly used to demonstrate the graphic
            elements of a document or visual presentation. Replacing meaningful
            content with placeholder text allows viewers to focus on graphic
            aspects such as font, typography, and page layout without being
            distracted by the content</i>.
            The application is able to generate filler text in other languages
            in addition to Latin.
        </p>
    </div>
    <div>
        <h2><a href='/random-user' data-ajax='false'>Random User Generator</a></h2>
        <p>
            This <a href='/random-user' data-ajax='false'>web application</a>
            generates random user profiles.
            User data options include: name, address, phone number, e-mail,
            birthdate and profile photo.
            The application is able to generate user data in multiple languages.
            The user photos come from
            <a href='https://randomuser.me'>https://randomuser.me</a>.
        </p>
    </div>
    <div>
        <h2><a href='/xkcd-password' data-ajax='false'>xkcd Password Generator</a></h2>
        <p>
            This <a href='/xkcd-password' data-ajax='false'>web application</a>
            generates passwords inspired by the xkcd
            <a href='http://xkcd.com/936/'>Password Strength</a> comic strip.
            The generated passwords consist of random common words that claim to
            be easy for humans to remember and difficult for machines to guess.
            The list of words come from
            <a href='http://www.wordfrequency.info'>http://www.wordfrequency.info</a>.
            <br/>
            <a href='http://xkcd.com/936/'>
                <img class='comic' src='http://imgs.xkcd.com/comics/password_strength.png' alt='xkcd password strength'>
            </a>
        </p>
    </div>
@stop

{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    {{-- <script src='/js/home.js'></script> --}}
@stop
