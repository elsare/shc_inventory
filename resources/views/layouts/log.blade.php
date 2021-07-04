
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SHC</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for " name="description" />
        <meta content="" name="author" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('log/css/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('log/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('log/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('log/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('log/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('log/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('log/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('log/css/login-4.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="favicon.ico" /> </head>

    <body class=" login">
        <div class="logo">
            <a href="index.html">
                <img src="{{ asset('img/shin_heung.png') }}" width="80" /> </a>
        </div>
        <div id="app">
        <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> -->
        </div>

        <main class="py-4">
            @yield('content')
        </main>
        </div>
        <div class="copyright"> 2021 &copy; SHC | Inventory </div>
        <script src="{{ asset('log/js/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('log/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('log/js/js.cookie.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('log/js/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('log/js/jquery.blockui.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('log/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('log/js/jquery.validate.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('log/js/additional-methods.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('log/js/select2.full.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('log/js/jquery.backstretch.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('log/js/app.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('log/js/login-4.min.js') }}" type="text/javascript"></script>
    </body>

</html>