<!doctype html>
<html lang="en">
    <head>
        <title>Beblog - @yield('title')</title>
    </head>
    <body>
            <h1>Beblog - @yield('title')</h1>
            
            @if (session('message'))
            <div>
                <p><b>{{ session('message') }}</b></p>
            </div>
            @endif

            @if ($errors->any())
                <div>
                    <h2>Errors:</h2>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>
                @yield('content')
            </div>
    </body>
</html>