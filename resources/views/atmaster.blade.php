<!DOCTYPE html>
    <html lang="en">
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <head>
            <meta charset="UTF-8" >
            <meta http-equiv="Content-Type" name="viewport" content="width=device-width, initial-scale=1">
            
            <!--RESOURCES-->
            
            <!--CSS-->

                <link rel="stylesheet" type="text/css" href="alivetech/vendor/css/normalize.css">
                <link rel="stylesheet" type="text/css" href="alivetech/vendor/css/grid.css">
                <!--<link rel="stylesheet" type="text/css" href="vendor/css/ionicons.min.css">-->
                <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.css">
                <link rel="stylesheet" type="text/css" href="alivetech/vendor/css/animate.css">
                <link rel="stylesheet" type="text/css" href="alivetech/res/css/style.css">
                <link rel="stylesheet" type="text/css" href="alivetech/res/css/queries.css">
                <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
                <link href='https://fonts.googleapis.com/css?family=Slabo+27px&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

                <!--Favicons-->

                <link rel="apple-touch-icon" sizes="57x57" href="alivetech/res/favicons/apple-icon-57x57.png">
                <link rel="apple-touch-icon" sizes="60x60" href="alivetech/res/favicons/apple-icon-60x60.png">
                <link rel="apple-touch-icon" sizes="72x72" href="alivetech/res/favicons/apple-icon-72x72.png">
                <link rel="apple-touch-icon" sizes="76x76" href="alivetech/res/favicons/apple-icon-76x76.png">
                <link rel="apple-touch-icon" sizes="114x114" href="alivetech/res/favicons/apple-icon-114x114.png">
                <link rel="apple-touch-icon" sizes="120x120" href="alivetech/res/favicons/apple-icon-120x120.png">
                <link rel="apple-touch-icon" sizes="144x144" href="alivetech/res/favicons/apple-icon-144x144.png">
                <link rel="apple-touch-icon" sizes="152x152" href="alivetech/res/favicons/apple-icon-152x152.png">
                <link rel="apple-touch-icon" sizes="180x180" href="alivetech/res/favicons/apple-icon-180x180.png">
                <link rel="icon" type="image/png" sizes="192x192"  href="alivetech/res/favicons/android-icon-192x192.png">
                <link rel="icon" type="image/png" sizes="32x32" href="alivetech/res/favicons/favicon-32x32.png">
                <link rel="icon" type="image/png" sizes="96x96" href="alivetech/res/favicons/favicon-96x96.png">
                <link rel="icon" type="image/png" sizes="16x16" href="alivetech/res/favicons/favicon-16x16.png">
                <link rel="manifest" href="alivetech/res/favicons/manifest.json">
                <meta name="msapplication-TileColor" content="#ffffff">
                <meta name="msapplication-TileImage" content="alivetech/res/favicons//ms-icon-144x144.png">
                <meta name="theme-color" content="#ffffff">

                <!--Analytics-->
                <script>
                  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

                  ga('create', 'UA-76946538-1', 'auto');
                  ga('send', 'pageview');

                </script>

                <!--Javascript-->
                <!--<script src="http://maps.googleapis.com/maps/api/js"></script> -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
                <script src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script>
                <script src="https://cdn.jsdelivr.net/selectivizr/1.0.3b/selectivizr.min.js"></script>
                <script src="alivetech/vendor/js/jquery.waypoints.min.js"></script>
                <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script> 
                <script src="alivetech/res/js/script.js"></script> 
            
            <title> @yield('title') </title>
            <meta name="description" content="Alive Technology S.A. de C.V. es una empresa privada dedicada al desarrollo de proveedores, gestión de fondos, desarrollo de proyectos tecnológicos y ejecución de programas de gobierno entre otros servicios de consultoría." >

        </head>
        <body id="wrap">
            
            @yield('header')
            @yield('content') 
            @include('atshared.atfooter')
        </body>
        </html>
