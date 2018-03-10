<!DOCTYPE html>
{{--@langRTL
    <html lang="{{ app()->getLocale() }}" dir="rtl">
@else
    <html lang="{{ app()->getLocale() }}">
@endif--}}
<html lang="{{ app()->getLocale() }}">

    @include('backend.layouts.app_head')

<body class="{{ config('backend.body_classes') }}">
<span id="oben1"></span>

<!-- Main content -->
<div class="container" style="max-width:100%">
    <div class="row">
        <div class="col animated fadeInDown" style="padding-top:24px;animation-delay: 1.0s;animation-duration: 1.2s">
            @yield('content')
        </div>
    </div>
</div>
<!-- Scripts -->
@stack('before-scripts')

{!! script(mix('js/backend.js')) !!}
{!! script(mix('js/backend2.js')) !!}
{{-- immer als letztes!--}}
<script src="{{ config('app.url') }}/js/custom/mycustom.js"></script>

@stack('after-scripts')

{{--#############################--}}
@yield('page_level_scripts')
{{--#############################--}}

@include('backend.includes.partials.go-top')
<span id="page_bott"></span>
{!! Toastr::message() !!}
</body>
</html>
