<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<meta name="_token" content="{{ csrf_token() }}"/>--}}
    <title>@yield('title', app_name())</title>

    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <meta name="description" content="@yield('meta_description', 'mydotter Laravel 5.5 Boilerplate')">
    <meta name="author" content="@yield('meta_author', 'mydotter - Dieter Schnabel')">

    @yield('meta')

    {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
    @stack('before-styles')

<!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    {{ style(mix('css/backend.css')) }}
    {{--<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">--}}
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote-bs4.css" rel="stylesheet">--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
    <link media="all" type="text/css" rel="stylesheet" href="{{config('app.url')}}/css/mycustom.css">
    {{--<link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">--}}

    @stack('after-styles')
    {{--{!! script(mix('js/backend.js')) !!}--}}
    {{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.6.6/tinymce.min.js"></script>--}}
    {{--<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>--}}
    {{--<script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>--}}
    {{--<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>--}}
    @if ( is_dev() )
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai.min.css">
    @endif

    @yield('before-styles-end')
</head>
