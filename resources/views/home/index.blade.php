<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--REVSLIDER-->
{{--    <link rel="stylesheet" type="text/css" media="all"--}}
{{--          href="/revslider-standalone/revslider/public/assets/css/settings.css"/>--}}
{{--    <script type="text/javascript" src="/revslider-standalone/assets/js/includes/jquery/jquery.js"></script>--}}
{{--    <script type="text/javascript"--}}
{{--            src="/revslider-standalone/revslider/public/assets/js/jquery.themepunch.tools.min.js"></script>--}}
{{--    <script type="text/javascript"--}}
{{--            src="/revslider-standalone/revslider/public/assets/js/jquery.themepunch.revolution.min.js"></script>--}}
{{--    <script type="text/javascript" src="/revslider-standalone/assets/js/revslider.js" id="revslider_script"></script>--}}
<!-- Global site tag (gtag.js) - Google Analytics -->
    {{--    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-55674129-1"></script>--}}
    {{--    <script>--}}
    {{--        window.dataLayer = window.dataLayer || [];--}}
    {{--        function gtag(){dataLayer.push(arguments);}--}}
    {{--        gtag('js', new Date());--}}
    {{--        gtag('config', 'UA-55674129-1');--}}
    {{--    </script>--}}

    <title>Rosie's Pizzeria | Beacon, NY</title>

    <link rel="icon" type="image/png" href="/favicon.png"/>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
<div id="app">
    <router-view></router-view>
</div>

<script type="text/javascript" src="/js/app.js"></script>
</body>

</html>
