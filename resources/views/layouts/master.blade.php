<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta name="_token" content="{{ csrf_token() }}" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Post and Share Recipes at Recipe Sharing App</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="/css/dropzone.css">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,300,500,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="/css/app.css">
        <!--<script src="/js/vendor/modernizr-2.8.3.min.js"></script>-->
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

        @include('includes.alert')
        @include('includes.header')
        @yield('content')
        @include('includes.footer')

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        @include('includes.scripts-analytics')
        
    </body>
</html>