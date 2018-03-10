<!DOCTYPE html>
    {{--@langRTL
        <html lang="{{ app()->getLocale() }}" dir="rtl">
    @else
        <html lang="{{ app()->getLocale() }}">
    @endif--}}
<html lang="{{ app()->getLocale() }}">
<?php
/*$fa_popup = '<sup><i title="Popup" style="color:#ccc;margin-left:2px;font-weight:normal" class="fa fa-window-restore" aria-hidden="true"></i></sup>';*/
$fa_popup = fa_popup();




?>


@include('backend.layouts.app_head')

            {{--
            see config.backend !!
            BODY options, add following classes to body to change options

            // Header options
            1. '.header-fixed'					- Fixed Header

            // Brand options
            1. '.brand-minimized'       - Minimized brand (Only symbol)

            // Sidebar options
            1. '.sidebar-fixed'					- Fixed Sidebar
            2. '.sidebar-hidden'				- Hidden Sidebar
            3. '.sidebar-off-canvas'		- Off Canvas Sidebar
            4. '.sidebar-minimized'			- Minimized Sidebar (Only icons)
            5. '.sidebar-compact'			  - Compact Sidebar

            // Aside options
            1. '.aside-menu-fixed'			- Fixed Aside Menu
            2. '.aside-menu-hidden'			- Hidden Aside Menu
            3. '.aside-menu-off-canvas'	- Off Canvas Aside Menu

            // Breadcrumb options
            1. '.breadcrumb-fixed'			- Fixed Breadcrumb

            // Footer options
            1. '.footer-fixed'					- Fixed footer
            --}}
<body class="{{ config('backend.body_classes') }}
@if(get_dv('dashboard_settings_sidebar_minimized'))  sidebar-minimized @endif
@if(get_dv('dashboard_settings_top_nav_fixed'))  header-fixed @endif
@if(get_dv('dashboard_settings_bottom_nav_fixed'))  footer-fixed @endif
">
<span id="oben1"></span>
    @include('backend.includes.header')

    <div class="app-body">
        @include('backend.includes.sidebar')

        <main class="main animated fadeIn">
            {{--@include('includes.partials.logged-in-as')--}}
            {!! Breadcrumbs::render() !!}

            <div class="container-fluid">
                    <div class="content-header">
                        {{--for help block--}}
                        @yield('page-header')
                    </div><!--content-header-->

                    @include('includes.partials.messages')
                    <div id="mydotter_overlay" class="animated slideInDown"></div>
                    @yield('content')
            </div><!--container-fluid-->
        </main><!--main-->

        @include('backend.includes.aside')
    </div><!--app-body-->



@yield('modals')

    @include('backend.includes.footer')

    <!-- Scripts -->
    @stack('before-scripts')


    {!! script(mix('js/backend.js')) !!}
    {!! script(mix('js/backend2.js')) !!}

@yield('scripts')

@if ( is_dev() )
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@endif

{{-- always last!--}}
<script src="{{ config('app.url') }}/js/custom/mycustom.js"></script>

@yield('after-scripts')

{!! Toastr::message() !!}

<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
    });
</script>

@include('backend.includes.partials.go-top')
<span id="page_bott"></span>

{{--@yield('translations')--}}
</body>
</html>
