<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracket/img/bracket-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracket">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>{{env('APP_NAME')}} | @yield('title')</title>

    <!-- vendor css -->
    <link href="{{ asset('dashboard') }}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('dashboard') }}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{ asset('dashboard') }}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('dashboard') }}/lib/jquery-switchbutton/jquery.switchButton.css" rel="stylesheet">
    <link href="{{ asset('dashboard') }}/lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="{{ asset('dashboard') }}/lib/chartist/chartist.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/bracket.css">
</head>

<body>    


    <!-- ########## START: MAIN PANEL ########## -->
    @yield('content')
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="{{ asset('dashboard') }}/lib/jquery/jquery.js"></script>
    <script src="{{ asset('dashboard') }}/lib/popper.js/popper.js"></script>
    <script src="{{ asset('dashboard') }}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{ asset('dashboard') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="{{ asset('dashboard') }}/lib/moment/moment.js"></script>
    <script src="{{ asset('dashboard') }}/lib/jquery-ui/jquery-ui.js"></script>
    <script src="{{ asset('dashboard') }}/lib/jquery-switchbutton/jquery.switchButton.js"></script>
    <script src="{{ asset('dashboard') }}/lib/peity/jquery.peity.js"></script>
    <script src="{{ asset('dashboard') }}/lib/chartist/chartist.js"></script>
    <script src="{{ asset('dashboard') }}/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="{{ asset('dashboard') }}/lib/d3/d3.js"></script>
    <script src="{{ asset('dashboard') }}/lib/rickshaw/rickshaw.min.js"></script>

    @yield('footer_js')

    <script src="{{ asset('dashboard') }}/js/bracket.js"></script>
    <script src="{{ asset('dashboard') }}/js/ResizeSensor.js"></script>
    <script src="{{ asset('dashboard') }}/js/dashboard.js"></script>
    <script>
        $(function() {
            'use strict'

            // FOR DEMO ONLY
            // menu collapsed by default during first page load or refresh with screen
            // having a size between 992px and 1299px. This is intended on this page only
            // for better viewing of widgets demo.
            $(window).resize(function() {
                minimizeMenu();
            });

            minimizeMenu();

            function minimizeMenu() {
                if (window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)')
                    .matches) {
                    // show only the icons and hide left menu label by default
                    $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
                    $('body').addClass('collapsed-menu');
                    $('.show-sub + .br-menu-sub').slideUp();
                } else if (window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass(
                        'collapsed-menu')) {
                    $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
                    $('body').removeClass('collapsed-menu');
                    $('.show-sub + .br-menu-sub').slideDown();
                }
            }
        });
    </script>
</body>

</html>
