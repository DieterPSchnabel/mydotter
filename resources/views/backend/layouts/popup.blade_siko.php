<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="_token" content="{{ csrf_token() }}"/>


    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>@yield('title', app_name())</title> --}}
    <title>@yield('title', app_name())</title>


@langRTL
    {{ Html::style(getRtlCss(mix('css/backend.css'))) }}
@else
    {{ Html::style(mix('css/backend.css')) }}
@endif

    {{ Html::style(mix('css/backend_2.css')) }}


    <link media="all" type="text/css" rel="stylesheet" href="{{ config('app.url') }}/my_plugins/toastr/toastr.min.css">

    <link media="all" type="text/css" rel="stylesheet" href="{{ config('app.url') }}/css/mycustom.css">
<!-- begin_page_level_styles  -->
@yield('page_level_styles')
<!-- end_page_level_styles  -->


    @yield('before-styles-end')
@yield('after-styles-end')


{{-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --}}
{{-- WARNING: Respond.js doesn't work if you view the page via file://  --}}
<!--[if lt IE 9]>
    {{ HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
    {{ HTML::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}
    <![endif]-->
   {{-- {{ HTML::script(elixir('js/backend_top.js')) }}--}}
</head>


<body class="skin-{{ config('backend.theme') }} sidebar-collapse">


<div class="wrapper" style="min-height:500px;">


    {{-- Content Wrapper. Contains page content --}}
    <div class="content-wrapper">
        {{-- Content Header (Page header) --}}
        <section class="content-header">
            {{-- @yield('page-header') --}}

            {{-- Change to Breadcrumbs::render() if you want it to error to remind you to create the
            breadcrumbs for the given route --}}
            {{-- Breadcrumbs::renderIfExists() oder  render()--}}
            {{-- {!! Breadcrumbs::renderIfExists() !!} --}}
            {{-- breadcrumbs here --}}
        </section>


        <!-- Main content -->
        <section class="content">
             {{--@include('includes.partials.messages')--}}
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->




</div><!-- ./wrapper -->


<!-- JavaScripts -->
{{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js') }}

{{-- <script src="js/docs.js"></script> --}}
{{-- Html::script('js/docs.js') --}}

@yield('before-scripts-end')




{{ Html::script('/my_plugins/bootstrap/bootstrap.min.js') }}

<script src="{{ config('app.url') }}/my_plugins/toastr/toastr.min.js"></script>
<!-- begin_page_level_scripts  -->
@yield('page_level_scripts')
<!-- end_page_level_scripts  -->
{{-- immer als letztes!--}}
{{--{{ Html::script(mix('js/backend_bott.js')) }}--}}
<script src="{{ config('app.url') }}/my_plugins/toastr/config.js"></script>
<script src="{{ config('app.url') }}/my_plugins/custom/custom.js"></script>

@yield('after-scripts-end')


{{-- toastr msg --}}
@include('includes.partials.toastr_messages')
{{-- end toastr msg --}}

{{--<div class="alert alert-danger">
    <script>
        $(document).ready(function() {
            toastr.warning('Popup Flash-Message');
        });
    </script>
</div>--}}

{{--@include('includes.partials.toastr_messages')--}}

{{--<div class="alert alert-error">
    <script>
        $(document).ready(function() {
            toastr.warning('Master Flash-Message');
        });
    </script>
</div>--}}
{{--
<script src="{{ config('app.url') }}/my_plugins/jQuery-Easydrag/jQuery-Easydrag.js"></script>
--}}



</body>
</html>
