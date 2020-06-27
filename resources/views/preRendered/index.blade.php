<?php
//Get CSRF Token
$csrf = csrf_token();
$googleTagHeader = "<!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PNJC9BT');</script>
        <!-- End Google Tag Manager -->";
$meta = '<meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="author" content="Paul Livorsi">
        <!-- CSRF TOKEN -->
        <meta name="csrf-token" content="' . $csrf . '">
            <!--REVSLIDER-->
    <link rel="stylesheet" type="text/css" media="all"
          href="/revslider-standalone/revslider/public/assets/css/settings.css"/>
    <script type="text/javascript" src="/revslider-standalone/assets/js/includes/jquery/jquery.js"></script>
    <script type="text/javascript"
            src="/revslider-standalone/revslider/public/assets/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript"
            src="/revslider-standalone/revslider/public/assets/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="/revslider-standalone/assets/js/revslider.js" id="revslider_script"></script>

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-128381821-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag("js", new Date());

        gtag("config", "UA-128381821-1");
    </script>';

$css = '<link rel="stylesheet" href="' . mix("/css/app.css") . '">';
$js = '<script type="text/javascript" src="' . mix('/js/app.js') . '"></script>';

$contents = file_get_contents(base_path() . '/resources/views/preRendered/' . $directory . '/index.html');
$contents = str_replace('<!-- metaReplacement -->', $meta, $contents);
$contents = str_replace('<!-- vorsiCSSReplacement -->', $css, $contents);
$contents = str_replace('<!-- vorsiJSReplacement -->', $js, $contents);

echo $contents;