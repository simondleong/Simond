<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Cupid Love - Dating HTML5 Template" />
        <meta name="author" content="potenzaglobalsolutions.com" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Cupid Love Dating HTML5 Template</title>

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
    </head>

    <body>

        <header id="header" class="dark">
            @include('header')

            @include ('navbar')
        </header>

        @yield('content')

        <!--=================================
            Color Customizer -->

        <div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-level-up"></i></a></div>

        <!--=================================
         jquery -->

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

        @include('footer')

    </body>

</html>