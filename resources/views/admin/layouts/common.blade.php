<!doctype html>
<html class="no-js" lang="js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Biz-Sys | @yield('title') </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="/css/vendor.css">
        <!-- Theme initialization -->
        <script>
            var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
            var themeName = themeSettings.themeName || '';
            if (themeName)
            {
                document.write('<link rel="stylesheet" id="theme-style" href="/css/app-' + themeName + '.css">');
            }
            else
            {
                document.write('<link rel="stylesheet" id="theme-style" href="/css/app.css">');
            }
        </script>
        <link rel="stylesheet" href="/css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="//jpostal-1006.appspot.com/jquery.jpostal.js"></script>
    </head>
    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                @include('admin.layouts.header')
                @include('admin.layouts.sidebar')
                @yield('content')
                @include('admin.layouts.footer')
            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        <script src="/js/vendor.js"></script>
        <script src="/js/app.js"></script>
    </body>
</html>
