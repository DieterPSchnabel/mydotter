@extends('backend.layouts.app')
@section('title')
    <?php $this_filename ='admintests29'  ?>
    {{$this_filename}}
@endsection
@section('page-header')
    <h2>Helpers</h2>
@endsection

@section('meta')
    {{--<!-- nixxxxxxxxxxxxx meta -->--}}
@endsection


@section('before-styles-end')
    {{--<!-- nixxxxxxxxxxxxx before-styles-end -->--}}
@endsection


@section('content')

    <div class="sticky" id="_dragable" style="margin:2px 0;">

        <div style="display:none" id="dragableheader">scroll to:
            <a class="ml-5 mr-5" href="javascript:scroll_to('oben1')">top</a>
            <a class="ml-5 mr-5" href="javascript:scroll_to('page_bott')">bottom</a> -
            <a class="ml-5 mr-5" href="javascript:scroll_to('laravel_php_helpers_superadmin')">Laravel Helpers</a>
            <a class="ml-5 mr-5" href="javascript:scroll_to('laravel_php_helpers_superadmin')">Eloquent Collection Helpers</a>

            <a class="ml-5 mr-5" href="javascript:scroll_to('Myhelpers_general_superadmin')">general</a>
            <a class="ml-5 mr-5" href="javascript:scroll_to('Myhelpers_any_table_superadmin')">any_table </a>

            <a class="ml-5 mr-5" href="javascript:scroll_to('Myhelpers_ax_superadmin')">Ajax</a>
            <a class="ml-5 mr-5" href="javascript:scroll_to('Myhelpers_buttons_superadmin')">Buttons </a>

            <a class="ml-5 mr-5" href="javascript:scroll_to('Myhelpers_datetime_superadmin')">datetime</a>
            <a class="ml-5 mr-5" href="javascript:scroll_to('Myhelpers_diverses_superadmin')">diverses</a>

            <a class="ml-5 mr-5" href="javascript:scroll_to('Myhelpers_dbtables_superadmin')">db_tables</a>
            <a class="ml-5 mr-5" href="javascript:scroll_to('Myhelpers_feedback_superadmin')">Feedback</a>

            <a class="ml-5 mr-5" href="javascript:scroll_to('Myhelpers_formatter_superadmin')">Formatter</a>
            <a class="ml-5 mr-5" href="javascript:scroll_to('Myhelpers_hint_superadmin')">Hint</a>

            <a class="ml-5 mr-5" href="javascript:scroll_to('Myhelpers_hints_superadmin')">Hints</a>
            <a class="ml-5 mr-5" href="javascript:scroll_to('Myhelpers_image_superadmin')">Image</a>

            <a class="ml-5 mr-5" href="javascript:scroll_to('Myhelpers_languages_superadmin')">Languages</a>
            <a class="ml-5 mr-5" href="javascript:scroll_to('Myhelpers_larapacks_superadmin')">Larapacks</a>

            <a class="ml-5 mr-5" href="javascript:scroll_to('Myhelpers_money_superadmin')">Money</a>
            <a class="ml-5 mr-5" href="javascript:scroll_to('Myhelpers_string1_superadmin')">String</a>

            <a class="ml-5 mr-5" href="javascript:scroll_to('Myhelpers_translations_superadmin')">Translations</a>
            <a class="ml-5 mr-5" href="javascript:scroll_to('Myhelpers_validation_superadmin')">Validation</a>

            <a class="ml-5 mr-5" href="javascript:scroll_to('Myhelpers_confirm_superadmin')">Confirm-Modal</a>
            <a class="ml-5 mr-5" href="javascript:scroll_to('awssat_str-helper')">awssat/str-helper</a>

            <a class="ml-5 mr-5" href="javascript:scroll_to('dmitry-ivanov-helper')">dmitry-ivanov</a>
            <a class="ml-5 mr-5" href="javascript:scroll_to('browner12_helpers')">browner12</a>

            <a class="ml-5 mr-5" href="javascript:scroll_to('svenluijten_helpers')">svenluijten</a>
            <a class="ml-5 mr-5" href="javascript:scroll_to('letrunghieu_active')">letrunghieu/active </a>

            <a class="ml-5 mr-5" href="javascript:scroll_to('spatie_string')">spatie/string</a>

            <a class="ml-5 mr-5" href="javascript:scroll_to('danielstjules_Stringy')">Stringy</a>

            <a class="ml-5 mr-5" href="javascript:scroll_to('boot4_css_superadmin')">CSS Bootstrap4 Helpers</a>
            <a class="ml-5 mr-5" href="javascript:scroll_to('mycss_helpers_superadmin')">CSS myHelpers </a>
            {{--
                        <a class="ml-5 mr-5" href="javascript:scroll_to('nix3')">title</a>
                        <a class="ml-5 mr-5" href="javascript:scroll_to('nix4')">nix4</a>--}}


        </div>
        <a title="show/hide" id="switch_display_fixed_linkbar" href="javascript:toggle('dragableheader','fade')"><i class="fa fa-window-close" aria-hidden="true"></i></a>
    </div>

    @include('backend.includes.partials.dev-nav')
    @if(is_dev())
        <div style="font-weight:normal;font-size:1.0em;color:#999;margin:-4px 0 2px 6px">{{$this_filename}}</div>
    @endif
    {{--######################### NEW ROW ######################################--}}

    {{--######################### NEW ROW ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_title = 'Myhelpers-Notes';
            $t_key = 'myhelpers_superadmin_notes';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_title = 'Myhelpers-ToDo';
            $t_key = 'myhelpers_superadmin_todo';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>{{--<div class="row">--}}

    <div class="row">

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'laravel_php_helpers_superadmin';
            $t_title = 'Laravel Helpers';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right ml-10" target="_blank" href="https://laravel.com/docs/5.5/helpers">
                        Go to  {{$t_title}}</a>

                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    {{--<a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>--}}

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    <style>


                        .collection-method-list a {
                            display: block;
                            font-size:1.3em;
                            margin-left:10px
                        }
                    </style>
                    <?php
                    //echo get_dv($t_key,'div_res_long');
                    $lara_url = 'https://laravel.com/docs/5.5/helpers';
                    ?>

                    <h3>Arrays &amp; Objects</h3>

                    <div class="collection-method-list">
                        <p><a target="_blank" href="{{$lara_url}}#method-array-add">array_add</a> <a target="_blank" href="{{$lara_url}}#method-array-collapse">array_collapse</a> <a target="_blank" href="{{$lara_url}}#method-array-divide">array_divide</a> <a target="_blank" href="{{$lara_url}}#method-array-dot">array_dot</a> <a target="_blank" href="{{$lara_url}}#method-array-except">array_except</a> <a target="_blank" href="{{$lara_url}}#method-array-first">array_first</a> <a target="_blank" href="{{$lara_url}}#method-array-flatten">array_flatten</a> <a target="_blank" href="{{$lara_url}}#method-array-forget">array_forget</a> <a target="_blank" href="{{$lara_url}}#method-array-get">array_get</a> <a target="_blank" href="{{$lara_url}}#method-array-has">array_has</a> <a target="_blank" href="{{$lara_url}}#method-array-last">array_last</a> <a target="_blank" href="{{$lara_url}}#method-array-only">array_only</a> <a target="_blank" href="{{$lara_url}}#method-array-pluck">array_pluck</a> <a target="_blank" href="{{$lara_url}}#method-array-prepend">array_prepend</a> <a target="_blank" href="{{$lara_url}}#method-array-pull">array_pull</a> <a target="_blank" href="{{$lara_url}}#method-array-random">array_random</a> <a target="_blank" href="{{$lara_url}}#method-array-set">array_set</a> <a target="_blank" href="{{$lara_url}}#method-array-sort">array_sort</a> <a target="_blank" href="{{$lara_url}}#method-array-sort-recursive">array_sort_recursive</a> <a target="_blank" href="{{$lara_url}}#method-array-where">array_where</a> <a target="_blank" href="{{$lara_url}}#method-array-wrap">array_wrap</a> <a target="_blank" href="{{$lara_url}}#method-data-fill">data_fill</a> <a target="_blank" href="{{$lara_url}}#method-data-get">data_get</a> <a target="_blank" href="{{$lara_url}}#method-data-set">data_set</a> <a target="_blank" href="{{$lara_url}}#method-head">head</a> <a target="_blank" href="{{$lara_url}}#method-last">last</a></p>
                    </div>

                    <h3>Paths</h3>

                    <div class="collection-method-list">
                        <p><a target="_blank" href="{{$lara_url}}#method-app-path">app_path</a> <a target="_blank" href="{{$lara_url}}#method-base-path">base_path</a> <a target="_blank" href="{{$lara_url}}#method-config-path">config_path</a> <a target="_blank" href="{{$lara_url}}#method-database-path">database_path</a> <a target="_blank" href="{{$lara_url}}#method-mix">mix</a> <a target="_blank" href="{{$lara_url}}#method-public-path">public_path</a> <a target="_blank" href="{{$lara_url}}#method-resource-path">resource_path</a> <a target="_blank" href="{{$lara_url}}#method-storage-path">storage_path</a></p>
                    </div>

                    <h3>Strings</h3>

                    <div class="collection-method-list">
                        <p><a target="_blank" href="{{$lara_url}}#method-__">__</a> <a target="_blank" href="{{$lara_url}}#method-camel-case">camel_case</a> <a target="_blank" href="{{$lara_url}}#method-class-basename">class_basename</a> <a target="_blank" href="{{$lara_url}}#method-e">e</a> <a target="_blank" href="{{$lara_url}}#method-ends-with">ends_with</a> <a target="_blank" href="{{$lara_url}}#method-kebab-case">kebab_case</a> <a target="_blank" href="{{$lara_url}}#method-preg-replace-array">preg_replace_array</a> <a target="_blank" href="{{$lara_url}}#method-snake-case">snake_case</a> <a target="_blank" href="{{$lara_url}}#method-starts-with">starts_with</a> <a target="_blank" href="{{$lara_url}}#method-str-after">str_after</a> <a target="_blank" href="{{$lara_url}}#method-str-before">str_before</a> <a target="_blank" href="{{$lara_url}}#method-str-contains">str_contains</a> <a target="_blank" href="{{$lara_url}}#method-str-finish">str_finish</a> <a target="_blank" href="{{$lara_url}}#method-str-is">str_is</a> <a target="_blank" href="{{$lara_url}}#method-str-limit">str_limit</a> <a target="_blank" href="{{$lara_url}}#method-str-plural">str_plural</a> <a target="_blank" href="{{$lara_url}}#method-str-random">str_random</a> <a target="_blank" href="{{$lara_url}}#method-str-replace-array">str_replace_array</a> <a target="_blank" href="{{$lara_url}}#method-str-replace-first">str_replace_first</a> <a target="_blank" href="{{$lara_url}}#method-str-replace-last">str_replace_last</a> <a target="_blank" href="{{$lara_url}}#method-str-singular">str_singular</a> <a target="_blank" href="{{$lara_url}}#method-str-slug">str_slug</a> <a target="_blank" href="{{$lara_url}}#method-str-start">str_start</a> <a target="_blank" href="{{$lara_url}}#method-studly-case">studly_case</a> <a target="_blank" href="{{$lara_url}}#method-title-case">title_case</a> <a target="_blank" href="{{$lara_url}}#method-trans">trans</a> <a target="_blank" href="{{$lara_url}}#method-trans-choice">trans_choice</a></p>
                    </div>

                    <h3>URLs</h3>

                    <div class="collection-method-list">
                        <p><a target="_blank" href="{{$lara_url}}#method-action">action</a> <a target="_blank" href="{{$lara_url}}#method-asset">asset</a> <a target="_blank" href="{{$lara_url}}#method-secure-asset">secure_asset</a> <a target="_blank" href="{{$lara_url}}#method-route">route</a> <a target="_blank" href="{{$lara_url}}#method-secure-url">secure_url</a> <a target="_blank" href="{{$lara_url}}#method-url">url</a></p>
                    </div>

                    <h3>Miscellaneous</h3>

                    <div class="collection-method-list">
                        <p><a target="_blank" href="{{$lara_url}}#method-abort">abort</a> <a target="_blank" href="{{$lara_url}}#method-abort-if">abort_if</a> <a target="_blank" href="{{$lara_url}}#method-abort-unless">abort_unless</a> <a target="_blank" href="{{$lara_url}}#method-app">app</a> <a target="_blank" href="{{$lara_url}}#method-auth">auth</a> <a target="_blank" href="{{$lara_url}}#method-back">back</a> <a target="_blank" href="{{$lara_url}}#method-bcrypt">bcrypt</a> <a target="_blank" href="{{$lara_url}}#method-blank">blank</a> <a target="_blank" href="{{$lara_url}}#method-broadcast">broadcast</a> <a target="_blank" href="{{$lara_url}}#method-cache">cache</a> <a target="_blank" href="{{$lara_url}}#method-class-uses-recursive">class_uses_recursive</a> <a target="_blank" href="{{$lara_url}}#method-collect">collect</a> <a target="_blank" href="{{$lara_url}}#method-config">config</a> <a target="_blank" href="{{$lara_url}}#method-cookie">cookie</a> <a target="_blank" href="{{$lara_url}}#method-csrf-field">csrf_field</a> <a target="_blank" href="{{$lara_url}}#method-csrf-token">csrf_token</a> <a target="_blank" href="{{$lara_url}}#method-dd">dd</a> <a target="_blank" href="{{$lara_url}}#method-decrypt">decrypt</a> <a target="_blank" href="{{$lara_url}}#method-dispatch">dispatch</a> <a target="_blank" href="{{$lara_url}}#method-dispatch-now">dispatch_now</a> <a target="_blank" href="{{$lara_url}}#method-dump">dump</a> <a target="_blank" href="{{$lara_url}}#method-encrypt">encrypt</a> <a target="_blank" href="{{$lara_url}}#method-env">env</a> <a target="_blank" href="{{$lara_url}}#method-event">event</a> <a target="_blank" href="{{$lara_url}}#method-factory">factory</a> <a target="_blank" href="{{$lara_url}}#method-filled">filled</a> <a target="_blank" href="{{$lara_url}}#method-info">info</a> <a target="_blank" href="{{$lara_url}}#method-logger">logger</a> <a target="_blank" href="{{$lara_url}}#method-method-field">method_field</a> <a target="_blank" href="{{$lara_url}}#method-now">now</a> <a target="_blank" href="{{$lara_url}}#method-old">old</a> <a target="_blank" href="{{$lara_url}}#method-optional">optional</a> <a target="_blank" href="{{$lara_url}}#method-policy">policy</a> <a target="_blank" href="{{$lara_url}}#method-redirect">redirect</a> <a target="_blank" href="{{$lara_url}}#method-report">report</a> <a target="_blank" href="{{$lara_url}}#method-request">request</a> <a target="_blank" href="{{$lara_url}}#method-rescue">rescue</a> <a target="_blank" href="{{$lara_url}}#method-resolve">resolve</a> <a target="_blank" href="{{$lara_url}}#method-response">response</a> <a target="_blank" href="{{$lara_url}}#method-retry">retry</a> <a target="_blank" href="{{$lara_url}}#method-session">session</a> <a target="_blank" href="{{$lara_url}}#method-tap">tap</a> <a target="_blank" href="{{$lara_url}}#method-today">today</a> <a target="_blank" href="{{$lara_url}}#method-throw-if">throw_if</a> <a target="_blank" href="{{$lara_url}}#method-throw-unless">throw_unless</a> <a target="_blank" href="{{$lara_url}}#method-trait-uses-recursive">trait_uses_recursive</a> <a target="_blank" href="{{$lara_url}}#method-transform">transform</a> <a target="_blank" href="{{$lara_url}}#method-validator">validator</a> <a target="_blank" href="{{$lara_url}}#method-value">value</a> <a target="_blank" href="{{$lara_url}}#method-view">view</a> <a target="_blank" href="{{$lara_url}}#method-with">with</a></p>
                    </div>



                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'laravel_php_helpers_superadmin';
            $t_title = 'Eloquent Collection Helpers';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right ml-10" target="_blank" href="https://laravel.com/docs/5.5/eloquent-collections">
                        Go to  {{$t_title}}</a>

                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    {{--<a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>--}}

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    <style>
                        .collection-method-list a {
                            display: block;
                            font-size:1.3em;
                            margin-left:10px
                        }
                    </style>
                    <?php
                    //echo get_dv($t_key,'div_res_long');
                    $lara_url = 'https://laravel.com';
                    ?>
                    <p style="font-size:1.2em">see also: <b><a target="_blank" href="https://github.com/ecrmnn/collect.js">collect.js</a></b></p>
                    <div class="collection-method-list">
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-all">all</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-average">average</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-avg">avg</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-chunk">chunk</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-collapse">collapse</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-combine">combine</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-concat">concat</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-contains">contains</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-containsstrict">containsStrict</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-count">count</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-crossjoin">crossJoin</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-dd">dd</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-diff">diff</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-diffkeys">diffKeys</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-dump">dump</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-each">each</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-eachspread">eachSpread</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-every">every</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-except">except</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-filter">filter</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-first">first</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-flatmap">flatMap</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-flatten">flatten</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-flip">flip</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-forget">forget</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-forpage">forPage</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-get">get</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-groupby">groupBy</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-has">has</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-implode">implode</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-intersect">intersect</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-isempty">isEmpty</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-isnotempty">isNotEmpty</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-keyby">keyBy</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-keys">keys</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-last">last</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-map">map</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-mapinto">mapInto</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-mapspread">mapSpread</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-maptogroups">mapToGroups</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-mapwithkeys">mapWithKeys</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-max">max</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-median">median</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-merge">merge</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-min">min</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-mode">mode</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-nth">nth</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-only">only</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-pad">pad</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-partition">partition</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-pipe">pipe</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-pluck">pluck</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-pop">pop</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-prepend">prepend</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-pull">pull</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-push">push</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-put">put</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-random">random</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-reduce">reduce</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-reject">reject</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-reverse">reverse</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-search">search</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-shift">shift</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-shuffle">shuffle</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-slice">slice</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-sort">sort</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-sortby">sortBy</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-sortbydesc">sortByDesc</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-splice">splice</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-split">split</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-sum">sum</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-take">take</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-tap">tap</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-toarray">toArray</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-tojson">toJson</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-transform">transform</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-union">union</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-unique">unique</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-uniquestrict">uniqueStrict</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-unless">unless</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-values">values</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-when">when</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-where">where</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-wherestrict">whereStrict</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-wherein">whereIn</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-whereinstrict">whereInStrict</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-wherenotin">whereNotIn</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-wherenotinstrict">whereNotInStrict</a>
                        <a target="_blank" href="{{$lara_url}}/docs/5.5/collections#method-zip">zip</a>
                    </div>



                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>{{--<div class="row">--}}

    {{--######################### NEW ROW ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'Myhelpers_general_superadmin';
            $t_title = 'Myhelpers - general';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'Myhelpers_any_table_superadmin';
            $t_title = 'Myhelpers - any_table';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    <pre>nix</pre>
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>{{--<div class="row">--}}

    {{--######################### NEW ROW ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'Myhelpers_ax_superadmin';
            $t_title = 'Myhelpers - Ajax';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    <pre>nix</pre>
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'Myhelpers_buttons_superadmin';
            $t_title = 'Myhelpers - Buttons';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>{{--<div class="row">--}}

    {{--######################### NEW ROW ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'Myhelpers_datetime_superadmin';
            $t_title = 'Myhelpers - datetime';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'Myhelpers_diverses_superadmin';
            $t_title = 'Myhelpers - Diverses';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>{{--<div class="row">--}}

    {{--######################### NEW ROW ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'Myhelpers_dbtables_superadmin';
            $t_title = 'Myhelpers - db_tables';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'Myhelpers_feedback_superadmin';
            $t_title = 'Myhelpers - Feedback';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>{{--<div class="row">--}}

    {{--######################### NEW ROW ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'Myhelpers_formatter_superadmin';
            $t_title = 'Myhelpers - Formatter';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'Myhelpers_hint_superadmin';
            $t_title = 'Myhelpers - Hint';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>{{--<div class="row">--}}

    {{--######################### NEW ROW ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'Myhelpers_hints_superadmin';
            $t_title = 'Myhelpers - Hints';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'Myhelpers_image_superadmin';
            $t_title = 'Myhelpers - Image';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>{{--<div class="row">--}}

    {{--######################### NEW ROW ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'Myhelpers_languages_superadmin';
            $t_title = 'Myhelpers - Languages';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'Myhelpers_larapacks_superadmin';
            $t_title = 'Myhelpers - Larapacks';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>{{--<div class="row">--}}

    {{--######################### NEW ROW ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'Myhelpers_money_superadmin';
            $t_title = 'Myhelpers - Money';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'Myhelpers_string1_superadmin';
            $t_title = 'Myhelpers - String';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>{{--<div class="row">--}}

    {{--######################### NEW ROW ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'Myhelpers_translations_superadmin';
            $t_title = 'Myhelpers - Translations';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">

                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'Myhelpers_validation_superadmin';
            $t_title = 'Myhelpers - Validation';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">

                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>{{--<div class="row">--}}

    {{--######################### NEW ROW ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'Myhelpers_confirm_superadmin';
            $t_title = 'Myhelpers - Confirm Modal';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'awssat_str-helper';
            $t_title = 'awssat/str-helper';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10"
                    target="_blank"  href="https://github.com/awssat/str-helper">
                        awssat/str-helper</a>


                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>{{--<div class="row">--}}

    {{--######################### NEW ROW ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'dmitry-ivanov-helper';
            $t_title = 'dmitry-ivanov/laravel-helper-functions';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10"
                       target="_blank"  href="https://github.com/dmitry-ivanov/laravel-helper-functions">
                        {{$t_key}}</a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'browner12_helpers';
            $t_title = 'browner12/helpers';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10"
                       target="_blank"  href="https://github.com/browner12/helpers">
                        {{$t_key}}</a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>{{--<div class="row">--}}

    {{--######################### NEW ROW ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'svenluijten_helpers';
            $t_title = 'svenluijten/helpers';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10"
                       target="_blank"  href="https://github.com/svenluijten/helpers">
                        {{$t_key}}</a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    <pre>
active_route  $isHome = active_route('home');
str_possessive  echo str_possessive('Brian') . ' house.'; // "Brian's house."
                    </pre>
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'letrunghieu_active';
            $t_title = 'letrunghieu/active';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10"
                       target="_blank"  href="https://github.com/letrunghieu/active">
                        {{$t_key}}</a>

                    <a class="btn btn-primary btn-sm float-right mr-10"
                       target="_blank"  href="https://www.hieule.info/tag/laravel-active">
                        Doc</a>


                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>{{--<div class="row">--}}


    {{--######################### NEW ROW ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'spatie_string';
            $t_title = 'spatie/string';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10"
                       target="_blank"  href="https://github.com/spatie/string">
                        Doc</a>


                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6 ">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'danielstjules_Stringy';
            $t_title = 'danielstjules/Stringy';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10"
                       target="_blank"  href="https://github.com/danielstjules/Stringy">
                        {{$t_title}}</a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <p>Nocht nicht installiert!!</p>
<?php
$full_link = 'https://github.com/danielstjules/Stringy';
?>
                    <table class="table table-hover ">
                        <tbody><tr>
                            <td><a target="_blank" href="{{$full_link}}#appendstring-string">append</a></td>
                            <td><a target="_blank" href="{{$full_link}}#atint-index">at</a></td>
                            <td><a target="_blank" href="{{$full_link}}#betweenstring-start-string-end--int-offset">between</a></td>
                            <td><a target="_blank" href="{{$full_link}}#camelize">camelize</a></td>
                        </tr>
                        <tr>
                            <td><a target="_blank" href="{{$full_link}}#chars">chars</a></td>
                            <td><a target="_blank" href="{{$full_link}}#collapsewhitespace">collapseWhitespace</a></td>
                            <td><a target="_blank" href="{{$full_link}}#containsstring-needle--boolean-casesensitive--true-">contains</a></td>
                            <td><a target="_blank" href="{{$full_link}}#containsallarray-needles--boolean-casesensitive--true-">containsAll</a></td>
                        </tr>
                        <tr>
                            <td><a target="_blank" href="{{$full_link}}#containsanyarray-needles--boolean-casesensitive--true-">containsAny</a></td>
                            <td><a target="_blank" href="{{$full_link}}#countsubstrstring-substring--boolean-casesensitive--true-">countSubstr</a></td>
                            <td><a target="_blank" href="{{$full_link}}#dasherize">dasherize</a></td>
                            <td><a target="_blank" href="{{$full_link}}#delimitint-delimiter">delimit</a></td>
                        </tr>
                        <tr>
                            <td><a target="_blank" href="{{$full_link}}#endswithstring-substring--boolean-casesensitive--true-">endsWith</a></td>
                            <td><a target="_blank" href="{{$full_link}}#endswithanystring-substrings--boolean-casesensitive--true-">endsWithAny</a></td>
                            <td><a target="_blank" href="{{$full_link}}#ensureleftstring-substring">ensureLeft</a></td>
                            <td><a target="_blank" href="{{$full_link}}#ensurerightstring-substring">ensureRight</a></td>
                        </tr>
                        <tr>
                            <td><a target="_blank" href="{{$full_link}}#firstint-n">first</a></td>
                            <td><a target="_blank" href="{{$full_link}}#getencoding">getEncoding</a></td>
                            <td><a target="_blank" href="{{$full_link}}#haslowercase">hasLowerCase</a></td>
                            <td><a target="_blank" href="{{$full_link}}#hasuppercase">hasUpperCase</a></td>
                        </tr>
                        <tr>
                            <td><a target="_blank" href="{{$full_link}}#htmldecode">htmlDecode</a></td>
                            <td><a target="_blank" href="{{$full_link}}#htmlencode">htmlEncode</a></td>
                            <td><a target="_blank" href="{{$full_link}}#humanize">humanize</a></td>
                            <td><a target="_blank" href="{{$full_link}}#indexofstring-needle--offset--0-">indexOf</a></td>
                        </tr>
                        <tr>
                            <td><a target="_blank" href="{{$full_link}}#indexoflaststring-needle--offset--0-">indexOfLast</a></td>
                            <td><a target="_blank" href="{{$full_link}}#insertint-index-string-substring">insert</a></td>
                            <td><a target="_blank" href="{{$full_link}}#isalpha">isAlpha</a></td>
                            <td><a target="_blank" href="{{$full_link}}#isalphanumeric">isAlphanumeric</a></td>
                        </tr>
                        <tr>
                            <td><a target="_blank" href="{{$full_link}}#isbase64">isBase64</a></td>
                            <td><a target="_blank" href="{{$full_link}}#isblank">isBlank</a></td>
                            <td><a target="_blank" href="{{$full_link}}#ishexadecimal">isHexadecimal</a></td>
                            <td><a target="_blank" href="{{$full_link}}#isjson">isJson</a></td>
                        </tr>
                        <tr>
                            <td><a target="_blank" href="{{$full_link}}#islowercase">isLowerCase</a></td>
                            <td><a target="_blank" href="{{$full_link}}#isserialized">isSerialized</a></td>
                            <td><a target="_blank" href="{{$full_link}}#isuppercase">isUpperCase</a></td>
                            <td><a target="_blank" href="{{$full_link}}#lastint-n">last</a></td>
                        </tr>
                        <tr>
                            <td><a target="_blank" href="{{$full_link}}#length">length</a></td>
                            <td><a target="_blank" href="{{$full_link}}#lines">lines</a></td>
                            <td><a target="_blank" href="{{$full_link}}#longestcommonprefixstring-otherstr">longestCommonPrefix</a></td>
                            <td><a target="_blank" href="{{$full_link}}#longestcommonsuffixstring-otherstr">longestCommonSuffix</a></td>
                        </tr>
                        <tr>
                            <td><a target="_blank" href="{{$full_link}}#longestcommonsubstringstring-otherstr">longestCommonSubstring</a></td>
                            <td><a target="_blank" href="{{$full_link}}#lowercasefirst">lowerCaseFirst</a></td>
                            <td><a target="_blank" href="{{$full_link}}#padint-length--string-padstr-----string-padtype--right-">pad</a></td>
                            <td><a target="_blank" href="{{$full_link}}#padbothint-length--string-padstr----">padBoth</a></td>
                        </tr>
                        <tr>
                            <td><a target="_blank" href="{{$full_link}}#padleftint-length--string-padstr----">padLeft</a></td>
                            <td><a target="_blank" href="{{$full_link}}#padrightint-length--string-padstr----">padRight</a></td>
                            <td><a target="_blank" href="{{$full_link}}#prependstring-string">prepend</a></td>
                            <td><a target="_blank" href="{{$full_link}}#regexreplacestring-pattern-string-replacement--string-options--msr">regexReplace</a></td>
                        </tr>
                        <tr>
                            <td><a target="_blank" href="{{$full_link}}#removeleftstring-substring">removeLeft</a></td>
                            <td><a target="_blank" href="{{$full_link}}#removerightstring-substring">removeRight</a></td>
                            <td><a target="_blank" href="{{$full_link}}#repeatint-multiplier">repeat</a></td>
                            <td><a target="_blank" href="{{$full_link}}#replacestring-search-string-replacement">replace</a></td>
                        </tr>
                        <tr>
                            <td><a target="_blank" href="{{$full_link}}#reverse">reverse</a></td>
                            <td><a target="_blank" href="{{$full_link}}#safetruncateint-length--string-substring---">safeTruncate</a></td>
                            <td><a target="_blank" href="{{$full_link}}#shuffle">shuffle</a></td>
                            <td><a target="_blank" href="{{$full_link}}#slugify-string-replacement-----string-language--en">slugify</a></td>
                        </tr>
                        <tr>
                            <td><a target="_blank" href="{{$full_link}}#sliceint-start--int-end-">slice</a></td>
                            <td><a target="_blank" href="{{$full_link}}#splitstring-pattern--int-limit-">split</a></td>
                            <td><a target="_blank" href="{{$full_link}}#startswithstring-substring--boolean-casesensitive--true-">startsWith</a></td>
                            <td><a target="_blank" href="{{$full_link}}#startswithanystring-substrings--boolean-casesensitive--true-">startsWithAny</a></td>
                        </tr>
                        <tr>
                            <td><a target="_blank" href="{{$full_link}}#stripwhitespace">stripWhitespace</a></td>
                            <td><a target="_blank" href="{{$full_link}}#substrint-start--int-length-">substr</a></td>
                            <td><a target="_blank" href="{{$full_link}}#surroundstring-substring">surround</a></td>
                            <td><a target="_blank" href="{{$full_link}}#swapcase">swapCase</a></td>
                        </tr>
                        <tr>
                            <td><a target="_blank" href="{{$full_link}}#tidy">tidy</a></td>
                            <td><a target="_blank" href="{{$full_link}}#titleize-array-ignore">titleize</a></td>
                            <td><a target="_blank" href="{{$full_link}}#toascii-string-language--en--bool-removeunsupported--true-">toAscii</a></td>
                            <td><a target="_blank" href="{{$full_link}}#toboolean">toBoolean</a></td>
                        </tr>
                        <tr>
                            <td><a target="_blank" href="{{$full_link}}#tolowercase">toLowerCase</a></td>
                            <td><a target="_blank" href="{{$full_link}}#tospaces-tablength--4-">toSpaces</a></td>
                            <td><a target="_blank" href="{{$full_link}}#totabs-tablength--4-">toTabs</a></td>
                            <td><a target="_blank" href="{{$full_link}}#totitlecase">toTitleCase</a></td>
                        </tr>
                        <tr>
                            <td><a target="_blank" href="{{$full_link}}#touppercase">toUpperCase</a></td>
                            <td><a target="_blank" href="{{$full_link}}#trim-string-chars">trim</a></td>
                            <td><a target="_blank" href="{{$full_link}}#trimleft-string-chars">trimLeft</a></td>
                            <td><a target="_blank" href="{{$full_link}}#trimright-string-chars">trimRight</a></td>
                        </tr>
                        <tr>
                            <td><a target="_blank" href="{{$full_link}}#truncateint-length--string-substring---">truncate</a></td>
                            <td><a target="_blank" href="{{$full_link}}#underscored">underscored</a></td>
                            <td><a target="_blank" href="{{$full_link}}#uppercamelize">upperCamelize</a></td>
                            <td><a target="_blank" href="{{$full_link}}#uppercasefirst">upperCaseFirst</a></td>
                        </tr>
                        </tbody></table>


                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>{{--<div class="row">--}}

    <div class="row ">

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'boot4_css_superadmin';
            $t_title = 'CSS Bootstrap4 Helpers';
            ?>
            <div class="card"><span id="{{$t_key}}"></span>
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    {{--<a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>--}}
                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                <pre>
    .w-25 {
    width: 25% !important;
    }

    .w-50 {
    width: 50% !important;
    }

    .w-75 {
    width: 75% !important;
    }

    .w-100 {
    width: 100% !important;
    }

    .h-25 {
    height: 25% !important;
    }

    .h-50 {
    height: 50% !important;
    }

    .h-75 {
    height: 75% !important;
    }

    .h-100 {
    height: 100% !important;
    }

    .mw-100 {
    max-width: 100% !important;
    }

    .mh-100 {
    max-height: 100% !important;
    }

    .m-0 {
    margin: 0 !important;
    }

    .mt-0,
    .my-0 {
    margin-top: 0 !important;
    }

    .mr-0,
    .mx-0 {
    margin-right: 0 !important;
    }

    .mb-0,
    .my-0 {
    margin-bottom: 0 !important;
    }

    .ml-0,
    .mx-0 {
    margin-left: 0 !important;
    }

    .m-1 {
    margin: 0.25rem !important;
    }

    .mt-1,
    .my-1 {
    margin-top: 0.25rem !important;
    }

    .mr-1,
    .mx-1 {
    margin-right: 0.25rem !important;
    }

    .mb-1,
    .my-1 {
    margin-bottom: 0.25rem !important;
    }

    .ml-1,
    .mx-1 {
    margin-left: 0.25rem !important;
    }

    .m-2 {
    margin: 0.5rem !important;
    }

    .mt-2,
    .my-2 {
    margin-top: 0.5rem !important;
    }

    .mr-2,
    .mx-2 {
    margin-right: 0.5rem !important;
    }

    .mb-2,
    .my-2 {
    margin-bottom: 0.5rem !important;
    }

    .ml-2,
    .mx-2 {
    margin-left: 0.5rem !important;
    }

    .m-3 {
    margin: 1rem !important;
    }

    .mt-3,
    .my-3 {
    margin-top: 1rem !important;
    }

    .mr-3,
    .mx-3 {
    margin-right: 1rem !important;
    }

    .mb-3,
    .my-3 {
    margin-bottom: 1rem !important;
    }

    .ml-3,
    .mx-3 {
    margin-left: 1rem !important;
    }

    .m-4 {
    margin: 1.5rem !important;
    }

    .mt-4,
    .my-4 {
    margin-top: 1.5rem !important;
    }

    .mr-4,
    .mx-4 {
    margin-right: 1.5rem !important;
    }

    .mb-4,
    .my-4 {
    margin-bottom: 1.5rem !important;
    }

    .ml-4,
    .mx-4 {
    margin-left: 1.5rem !important;
    }

    .m-5 {
    margin: 3rem !important;
    }

    .mt-5,
    .my-5 {
    margin-top: 3rem !important;
    }

    .mr-5,
    .mx-5 {
    margin-right: 3rem !important;
    }

    .mb-5,
    .my-5 {
    margin-bottom: 3rem !important;
    }
---------------------- add more !! -----------------
    .ml-5,
    .mx-5 {
    margin-left: 3rem !important;
    }

    .p-0 {
    padding: 0 !important;
    }

    .pt-0,
    .py-0 {
    padding-top: 0 !important;
    }

    .pr-0,
    .px-0 {
    padding-right: 0 !important;
    }

    .pb-0,
    .py-0 {
    padding-bottom: 0 !important;
    }

    .pl-0,
    .px-0 {
    padding-left: 0 !important;
    }

    .p-1 {
    padding: 0.25rem !important;
    }

    .pt-1,
    .py-1 {
    padding-top: 0.25rem !important;
    }

    .pr-1,
    .px-1 {
    padding-right: 0.25rem !important;
    }

    .pb-1,
    .py-1 {
    padding-bottom: 0.25rem !important;
    }

    .pl-1,
    .px-1 {
    padding-left: 0.25rem !important;
    }

    .p-2 {
    padding: 0.5rem !important;
    }

    .pt-2,
    .py-2 {
    padding-top: 0.5rem !important;
    }

    .pr-2,
    .px-2 {
    padding-right: 0.5rem !important;
    }

    .pb-2,
    .py-2 {
    padding-bottom: 0.5rem !important;
    }

    .pl-2,
    .px-2 {
    padding-left: 0.5rem !important;
    }

    .p-3 {
    padding: 1rem !important;
    }

    .pt-3,
    .py-3 {
    padding-top: 1rem !important;
    }

    .pr-3,
    .px-3 {
    padding-right: 1rem !important;
    }

    .pb-3,
    .py-3 {
    padding-bottom: 1rem !important;
    }

    .pl-3,
    .px-3 {
    padding-left: 1rem !important;
    }

    .p-4 {
    padding: 1.5rem !important;
    }

    .pt-4,
    .py-4 {
    padding-top: 1.5rem !important;
    }

    .pr-4,
    .px-4 {
    padding-right: 1.5rem !important;
    }

    .pb-4,
    .py-4 {
    padding-bottom: 1.5rem !important;
    }

    .pl-4,
    .px-4 {
    padding-left: 1.5rem !important;
    }

    .p-5 {
    padding: 3rem !important;
    }

    .pt-5,
    .py-5 {
    padding-top: 3rem !important;
    }

    .pr-5,
    .px-5 {
    padding-right: 3rem !important;
    }

    .pb-5,
    .py-5 {
    padding-bottom: 3rem !important;
    }

    .pl-5,
    .px-5 {
    padding-left: 3rem !important;
    }

    .m-auto {
    margin: auto !important;
    }

    .mt-auto,
    .my-auto {
    margin-top: auto !important;
    }

    .mr-auto,
    .mx-auto {
    margin-right: auto !important;
    }

    .mb-auto,
    .my-auto {
    margin-bottom: auto !important;
    }

    .ml-auto,
    .mx-auto {
    margin-left: auto !important;
    }</pre>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'mycss_helpers_superadmin';
            $t_title = 'CSS myHelpers';
            ?>
            <div class="card"><span id="{{$t_key}}"></span>
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>
                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                        <p>Samples:</p>

                        <div class="shade-demo shade1">shade1</div>
                        <div class="shade-demo shade1l">shade1l</div>
                        <div class="shade-demo shade3">shade3</div>
                        <div class="shade-demo shade4">shade4</div>
                        <div class="shade-demo shade4s">shade4s</div>
                        <div class="shade-demo shade5">shade5</div>

                        <div style="background:#567;color:#fff;text-shadow: 1px 1px 1px rgba(0,0,0,0.9);;" class="shade-demo ">text-shade1</div>



                </div>
            </div>{{--<div class="card">--}}

        </div>{{--<div class="col-6">--}}

    </div>


    <div class="row ">

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'laravel_collective_helpers';
            $t_title = 'Laravel Collective Helpers';
            ?>
            <div class="card"><span id="{{$t_key}}"></span>
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>


                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10"
                       target="_blank"  href="https://laravelcollective.com/docs/5.4/html">
                        {{$t_title}}</a>

                    {{--<a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>--}}
                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'nix2';
            $t_title = 'Buttons';
            ?>

            <div class="card"><span id="{{$t_key}}"></span>
                <div class="card-header h4">
                    <a style="margin-left:12px" class="btn btn-primary btn-sm float-right" target="_blank" href="https://v4-alpha.getbootstrap.com/components/buttons/">
                        Bootstrap 4 - Buttons </a>

                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>
                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">


                </div>
            </div>{{--<div class="card">--}}

        </div>{{--<div class="col-6">--}}

    </div>

    {{--######################### NEW ROW ######################################--}}
    <div class="row hidden">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'nixxxx7';
            $t_title = 'nixxxx7';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'nixxxx8';
            $t_title = 'nixxxx8';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>{{--<div class="row">--}}

    {{--######################### NEW ROW ######################################--}}
    <div class="row hidden">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'nixxxx7';
            $t_title = 'nixxxx7';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'nixxxx8';
            $t_title = 'nixxxx8';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>{{--<div class="row">--}}




    {{--######################### NEW ROW ######################################--}}
    <div class="row hidden">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'nixxxx7';
            $t_title = 'nixxxx7';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'nixxxx8';
            $t_title = 'nixxxx8';
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>{{--<div class="row">--}}






<div style="height:1000px"></div>
    {{--
    <div class="card">
        <div class="card-header h4">
            nix
        </div>
        <div class="card-block">
            <pre>nix</pre>
            <p>
            </p>
        </div>
    </div>
    --}}

@endsection
