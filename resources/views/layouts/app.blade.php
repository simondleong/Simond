<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Cupid Love - Dating HTML5 Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Chat Room</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}"/>

    <!-- bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- mega menu -->
    <link href="{{ asset('css/mega-menu/mega_menu.css') }}" rel="stylesheet" type="text/css" />

    <!-- font-awesome -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Flaticon -->
    <link href="{{ asset('css/flaticon.css') }}" rel="stylesheet" type="text/css" />

    <!-- Magnific popup -->
    <link href="{{ asset('css/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css" />

    <!-- owl-carousel -->
    <link href="{{ asset('css/owl-carousel/owl.carousel.css') }}" rel="stylesheet" type="text/css" />

    <!-- General style -->
    <link href="{{ asset('css/general.css') }}" rel="stylesheet" type="text/css" />

    <!-- main style -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />

    <!-- Style customizer -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">

    <style>
        .chat {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .chat li {
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px dotted #B3A9A9;
        }

        .chat li .chat-body p {
            margin: 0;
            color: #777777;
        }

        .panel-body {
            border: 1px solid #bbb;
            overflow-y: scroll;
            height: 440px;
        }

        @media screen and (max-width: 800px) {
            .panel-body {
                overflow-y: scroll;
                height: 350px;
            }
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }
    </style>
</head>

<body>
    <header id="header" class="dark">
        @include('header')

        @include('navbar')
    </header>

    <div id="app">
        @yield('content')
    </div>

    <!--=================================
                Color Customizer -->

    <div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-level-up"></i></a></div>

    <!--=================================
     jquery -->

    @include('footer')

    <!-- jquery  -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>

    <!-- bootstrap -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-select.min.js') }}"></script>

    <!-- appear -->
    <script type="text/javascript" src="{{ asset('js/jquery.appear.js') }}"></script>

    <!-- Menu -->
    <script type="text/javascript" src="{{ asset('js/mega-menu/mega_menu.js') }}"></script>

    <!-- owl-carousel -->
    <script type="text/javascript" src="{{ asset('js/owl-carousel/owl.carousel.min.js') }}"></script>

    <!-- counter -->
    <script type="text/javascript" src="{{ asset('js/counter/jquery.countTo.js') }}"></script>

    <!-- Magnific Popup -->
    <script type="text/javascript" src="{{ asset('js/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    <!-- custom -->
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>

    <!-- Javascript -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>


</body>