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

    <!-- <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet'/> -->
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' rel='stylesheet'/>
    <link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/readable/bootstrap.min.css' rel='stylesheet'/>
    <link href='/css/p3.css' rel='stylesheet'/>

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
                <li><a href='/' data-ajax='false'>Home</a></li>
                <li><a href='/lorem-ipsum' data-ajax='false'>Lorem Ipsum Generator</a></li>
                <li><a href='/random-user' data-ajax='false'>Random User Generator</a></li>
                <li><a href='/xkcd-password' data-ajax='false'>xkcd Password Generator</a></li>
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
