@extends('backend.layouts.app')
@section('title')
    <?php $this_filename ='admintests30'  ?>
    {{$this_filename}}
@endsection
@section('page-header')


    <h2>Dev-Info <span style="opacity:0.15">- at30</span></h2>

@endsection

@section('meta')
    {{--<!-- nixxxxxxxxxxxxx meta -->--}}
@endsection


@section('before-styles-end')
    {{--<!-- nixxxxxxxxxxxxx before-styles-end -->--}}
@endsection


@section('content')

    <div class="fixed-linkbar">

        <div style="display:none" id="dragableheader">scroll to:
        <a class="ml-5 mr-5" href="javascript:scroll_to('oben1')">top</a>
        <a class="ml-5 mr-5" href="javascript:scroll_to('page_bott')">bottom</a> -
        <a class="ml-5 mr-5" href="javascript:scroll_to('notes_superadmin')">Notes</a>
        <a class="ml-5 mr-5" href="javascript:scroll_to('todo_superadmin')">ToDo</a>

        <a class="ml-5 mr-5" href="javascript:scroll_to('translations_superadmin')">Translations</a>
        <a class="ml-5 mr-5" href="javascript:scroll_to('packages_helpers_superadmin')">Packages how to use</a>

        <a class="ml-5 mr-5" href="javascript:scroll_to('boot4_css_superadmin')">CSS Bootstrap4 Helpers</a>
        <a class="ml-5 mr-5" href="javascript:scroll_to('mycss_helpers_superadmin')">CSS myHelpers</a>

        <a class="ml-5 mr-5" href="javascript:scroll_to('nix1')">URLs & Paths</a>
        <a class="ml-5 mr-5" href="javascript:scroll_to('nix2')">Buttons</a>

        <a class="ml-5 mr-5" href="javascript:scroll_to('nix3')">aktuelle Language</a>
        <a class="ml-5 mr-5" href="javascript:scroll_to('nix4')">nix4</a>
        </div>
        <a title="show/hide" id="switch_display_fixed_linkbar" href="javascript:toggle('dragableheader','fade')"><i class="fa fa-window-close" aria-hidden="true"></i></a>
    </div>

    @include('backend.includes.partials.dev-nav')

    {{--#############################  Notes & ToDo ##############################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
                $t_key = 'notes_superadmin';
                $t_title = 'Notes';
            ?>

            <div class="card">
                <span id="{{$t_key}}"></span>
                <div class="card-header h4">

                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        {{$this_filename}} </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
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
            $t_key = 'todo_superadmin';
            $t_title = 'ToDo';
            ?>
            <div class="card"><span id="{{$t_key}}"></span>
                <div class="card-header h4">
                    <a style="margin-right:30px" class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        {{$this_filename}} </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
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
    </div>
{{--#############################  nice to have  &  keep an eye on ##############################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'nice_to_have_superadmin';
            $t_title = 'Nice to Have';
            ?>

            <div class="card">
                <span id="{{$t_key}}"></span>
                <div class="card-header h4">

                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        {{$this_filename}} </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
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
            $t_key = 'keep_an_eye_superadmin';
            $t_title = 'Keep an Eye on';
            ?>
            <div class="card"><span id="{{$t_key}}"></span>
                <div class="card-header h4">
                    <a style="margin-right:30px" class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        {{$this_filename}} </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
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
    </div>
    {{--#############################  NEW ROW ##############################################--}}

    <div class="row">

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'translations_superadmin';
            $t_title = 'Translations';
            ?>
            <div class="card"><span id="{{$t_key}}"></span>
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        {{$this_filename}} </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
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
            $t_key = 'packages_helpers_superadmin';
            $t_title = 'Packages how to use';
            ?>
            <div class="card"><span id="{{$t_key}}"></span>
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        {{$this_filename}} </a>

                    <a style="margin-right:12px" class="btn btn-primary btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/admin/dashboard/larapacks"
                       href="javascript:;">
                        go to Larapacks </a>
                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    <?php
                    //echo get_dv($t_key,'div_res_long');
                    $items = App\Models\Larapacks\Larapack::orderBy('install_str', 'asc')->where('important',1)->get();

                    //dd($items);
                    $z = 0;
                    ?>
                    @foreach ($items as $link)
                        <?php $z++ ?>
                        <div style="margin:0 0">{!!  $z !!}. <b class="mr-5">{!!  $link->install_str !!}</b>
                        @if($link->git_url<>'')
                        <a target="_blank" class="ml-5" href="{!! $link->git_url !!}">GIT</a>
                        @endif
                        @if($link->doc_url<>'')
                        <a target="_blank" class="ml-5" href="{!! $link->doc_url !!}">Doc</a>
                        @endif
                        <a target="_blank" class="ml-5" href="larapacks?mysearch={!!  $link->install_str !!}"> Larapacks</a>
                        </div>
                    @endforeach


                        {{--@include('backend.larapacks.important')--}}
                </div>
            </div>{{--<div class="card">--}}

        </div>{{--<div class="col-6">--}}

    </div>



{{--#############################  NEW ROW ##############################################--}}
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
                    {{$this_filename}} </a>

                {{--<a style="margin-right:12px" class="btn btn-primary btn-sm float-right" data-fancybox data-type="iframe"
                   data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
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
                    {{$this_filename}} </a>

                <a style="margin-right:12px" class="btn btn-primary btn-sm float-right" data-fancybox data-type="iframe"
                   data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
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

</div>




{{--################################ new row automatisch: #####################################################--}}


    {{--#############################  NEW ROW ##############################################--}}
    <div class="row">

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'nix1';
            $t_title = 'URLs & Path';
            ?>
            <div class="card"><span id="{{$t_key}}"></span>
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        {{$this_filename}} </a>

                    {{--<a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>--}}
                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    <table class="table table-hover" style="font-size:1.1em;">
                        <thead>
                        <tr>
                            <th style="width:20%">code</th><th>result</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="width:33%">base_path()</td><td>{{base_path()}}</td>
                        </tr>
                        <tr>
                            <td>app_path()</td><td>{{app_path()}}</td>
                        </tr>
                        <tr>
                            <td>config_path()</td><td>{{config_path()}}</td>
                        </tr>
                        <tr>
                            <td>database_path()</td><td>{{database_path()}}</td>
                        </tr>


                        <tr>
                            <td>public_path()</td><td>{{public_path()}}</td>
                        </tr>
                        <tr>
                            <td>resource_path()</td><td>{{resource_path()}}</td>
                        </tr>

                        <tr>
                            <td>storage_path()</td><td>{{storage_path()}}</td>
                        </tr>


                        <tr>
                            <td>config('app.url')</td>
                            <td>{{ config('app.url') }}</td>
                        </tr>

                        <tr>
                            <td>url()->current()</td><td>{{ url()->current() }}</td>
                        </tr>
                        <tr>
                            <td>url()->full()</td><td>{{ url()->full() }}</td>
                        </tr>
                        <tr>
                            <td>url()->previous()</td><td>{{ url()->previous() }}</td>
                        </tr>
                        <tr>
                            <td><b>route('log-viewer::dashboard')</b></td><td><a target="_blank"
                              href="{{ route('log-viewer::dashboard') }}">{{ route('log-viewer::dashboard') }}</a></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'nix3';
            $t_title = 'Local Language';
            ?>
            <div class="card"><span id="{{$t_key}}"></span>
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        {{$this_filename}} </a>

                    {{--<a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>--}}
                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
<pre>
echo 'aktuell: '.config('app.locale_php'). ' --- 1. config locale_php';
echo App::getLocale(). '  --- 2. App::getLocale() ';
//echo $_ENV['APP_LOCALE_PHP']. '   --- 3. ENV locale_php ';
APP_LOCALE = de
APP_FALLBACK_LOCALE = en
            </pre>
                    <p style="font-size:1.2em">
                        <?php
                        echo 'aktuell: '.config('app.locale_php'). ' --- 1. config locale_php <br>';
                        echo '<b style="color:blue">'.session()->get('locale'). '</b>  --- 2. session locale  <br>';
                        echo $_ENV['APP_LOCALE_PHP']. '   --- 3. APP_LOCALE_PHP  <br>';
                        echo env("APP_LOCALE"). '   --- 4. .env APP_LOCALE <br>';
                        echo env("APP_FALLBACK_LOCALE"). '   --- 5. .env APP_FALLBACK_LOCALE <br>';


                        ?>
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>

    {{--#############################  NEW ROW ##############################################--}}
    <div class="row">
        <div class="col-12">
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
                        {{$this_filename}} </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>
                    {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    <div style="padding:12px;float:left">
                        <button type="button" class="btn btn-primary btn-xs">button xs</button>
                        &nbsp;
                        <button type="button" class="btn btn-primary btn-sm">button sm</button>
                        &nbsp;
                        <button type="button" class="btn btn-primary">button</button>
                        &nbsp;
                        <button type="button" class="btn btn-primary btn-lg">btn-primary lg</button>
                        &nbsp;
                    </div>


                    <div style="padding:12px;float:left">
                        <button type="button" class="btn btn-default btn-xs"
                        >btn-default xs
                        </button>
                        &nbsp;
                        <button type="button" class="btn btn-default btn-sm">btn-default sm</button>
                        &nbsp;
                        <button type="button" class="btn btn-default"
                        >btn-default
                        </button>
                        &nbsp;
                        <button type="button" class="btn btn-default btn-lg">btn-default lg</button>
                        &nbsp;
                    </div>


                    <div style="padding:12px">
                        <button type="button" class="btn btn-success btn-xs">button xs</button>
                        &nbsp;
                        <button type="button" class="btn btn-success btn-sm">button sm</button>
                        &nbsp;
                        <button type="button" class="btn btn-success">button</button>
                        &nbsp;
                        <button type="button" class="btn btn-success btn-lg">btn-success lg</button>
                        &nbsp;
                    </div>


                    <div style="padding:12px;float:left">
                        <button type="button" class="btn btn-info btn-xs">button xs</button>
                        &nbsp;
                        <button type="button" class="btn btn-info btn-sm">button sm</button>
                        &nbsp;
                        <button type="button" class="btn btn-info">button</button>
                        &nbsp;
                        <button type="button" class="btn btn-info btn-lg">btn-info lg</button>
                        &nbsp;
                    </div>


                    <div style="padding:12px">
                        <button type="button" class="btn btn-warning btn-xs">button xs</button>
                        &nbsp;
                        <button type="button" class="btn btn-warning btn-sm">button sm</button>
                        &nbsp;
                        <button type="button" class="btn btn-warning">button</button>
                        &nbsp;
                        <button type="button" class="btn btn-warning btn-lg">btn-warning lg</button>
                        &nbsp;
                    </div>


                    <div style="padding:12px;float:left">
                        <button type="button" class="btn btn-danger btn-xs"
                                style="text-shadow: 1px 1px 1px rgba(0,0,0,0.9);">button xs
                        </button>
                        &nbsp;
                        <button type="button" class="btn btn-danger btn-sm"
                                style="text-shadow: 1px 1px 1px rgba(0,0,0,0.9);">button sm
                        </button>
                        &nbsp;
                        <button type="button" class="btn btn-danger"
                                style="text-shadow: 1px 1px 1px rgba(0,0,0,0.9);">button
                        </button>
                        &nbsp;
                        <button type="button" class="btn btn-danger btn-lg"
                                style="text-shadow: 1px 1px 1px rgba(0,0,0,0.9);">btn-danger lg
                        </button>
                        &nbsp;
                    </div>

                    <div style="padding:12px">
                        <button type="button" class="btn btn-link btn-xs">button xs</button>
                        &nbsp;
                        <button type="button" class="btn btn-link btn-sm">button sm</button>
                        &nbsp;
                        <button type="button" class="btn btn-link">button</button>
                        &nbsp;
                        <button type="button" class="btn btn-link btn-lg">btn-link lg</button>
                        &nbsp;
                    </div>

                </div>
            </div>{{--<div class="card">--}}

        </div>{{--<div class="col-6">--}}
    </div>

    {{--#############################  NEW ROW Buttons##############################################--}}
    <div class="row">

        <div class="col-12">
            {{----------------------------------------------------}}
            <?php
            $t_key = 'Buttons2';
            $t_title = 'sa_notes_buttons2';
            ?>
            <div class="card"><span id="{{$t_key}}"></span>
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        {{$this_filename}} </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
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

    </div>







    <div style="height:800px"></div>

@endsection

@section('scripts')
    <script type="text/javascript">
    /*    $(function() {
            $("#dragable").draggable();
        });*/
    //Make the DIV element draggagle:
/*    dragElement(document.getElementById(("dragable")));

    function dragElement(elmnt) {
        var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
        if (document.getElementById(elmnt.id + "header")) {
            /!* if present, the header is where you move the DIV from:*!/
            document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
        } else {
            /!* otherwise, move the DIV from anywhere inside the DIV:*!/
            elmnt.onmousedown = dragMouseDown;
        }

        function dragMouseDown(e) {
            e = e || window.event;
            // get the mouse cursor position at startup:
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            // call a function whenever the cursor moves:
            document.onmousemove = elementDrag;
        }

        function elementDrag(e) {
            e = e || window.event;
            // calculate the new cursor position:
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
            // set the element's new position:
            elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
            elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
        }

        function closeDragElement() {
            /!* stop moving when mouse button is released:*!/
            document.onmouseup = null;
            document.onmousemove = null;
        }
    }*/
    </script>
@endsection
