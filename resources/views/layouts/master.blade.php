<!DOCTYPE html>
<html>
<head>
    <title>
        {{--
        Yield the title if it exists, otherwise default to
        'Developer's Best Friend'
        --}}
        @yield('title','Developer\'s Best Friend')
    </title>

    <meta charset='utf-8'/>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'/>

    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' rel='stylesheet'/>
    <link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/readable/bootstrap.min.css' rel='stylesheet'/>

    {{-- Required for the jQuery Mobile library --}}
    <link href='//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css' rel='stylesheet'/>

    <link href='/css/p3.css' rel='stylesheet'/>

    {{-- Required for the jQuery Mobile library --}}
    <script src='http://code.jquery.com/jquery-1.11.3.min.js'></script>
    <script src='http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js'></script>

    {{--
    Yield any page specific CSS files or anything else you might want in the
    <head>
    --}}
    @yield('head')
</head>
<body>
    <div class='container'>
        <header>
            <h1>Developer's Best Friend</h1>
        </header>

        <nav>
            <ul>
                <li><a class='btn btn-sm btn-default' href='/' data-ajax='false'>Home</a></li>
                <li><a class='btn btn-sm btn-default' href='/lorem-ipsum' data-ajax='false'>Lorem Ipsum Generator</a></li>
                <li><a class='btn btn-sm btn-default' href='/random-user' data-ajax='false'>Random User Generator</a></li>
                <li><a class='btn btn-sm btn-default' href='/xkcd-password' data-ajax='false'>xkcd Password Generator</a></li>
            </ul>
        </nav>

        <hr/>

        <section class='content'>
            {{-- Main page content will be yielded here --}}
            @yield('content')
        </section>

        <footer>
            &copy; {{ date('Y') }}
            <a href='https://github.com/jasonjyu/cscie15-p3' class='fa fa-github' target='_blank'>View on Github</a>
        </footer>

        {{--
        Yield any page specific JS files or anything else you might want at the
        end of the body
        --}}
        @yield('body')
    </div>
</body>
</html>
