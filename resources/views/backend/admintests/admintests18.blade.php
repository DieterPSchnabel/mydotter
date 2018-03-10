@extends('backend.layouts.app')
@section('title')
    <?php $this_filename ='admintests18'  ?>
    {{$this_filename}}
@endsection
@section('page-header')
    <h2>Spatie - how to</h2>
@endsection

@section('meta')
    {{--<!-- nixxxxxxxxxxxxx meta -->--}}
@endsection


@section('before-styles-end')
    {{--<!-- nixxxxxxxxxxxxx before-styles-end -->--}}
@endsection


@section('content')
    @include('backend.includes.partials.dev-nav')
    @if(is_dev())
        <div style="font-weight:normal;font-size:1.0em;color:#999;margin:-4px 0 2px 6px">{{$this_filename}}</div>
    @endif


    <?php


    $title1 = 'spatie/laravel-db-snapshots';
    $key1 = 'spatie_laravel-db-snapshots';
    $url1 = 'https://github.com/spatie/laravel-db-snapshots';
    $doc_url1 = '';

    $title2 = 'spatie/laravel-backup';
    $key2 = 'spatie_laravel-backup';
    $url2 = 'https://github.com/spatie/laravel-backup';
    $doc_url2 = 'https://murze.be/taking-care-of-backups-with-laravel';

    $title3 = 'spatie/laravel-artisan-dd';
    $key3 = 'spatie_laravel-artisan-dd';
    $url3 = 'https://github.com/spatie/laravel-artisan-dd';
    $doc_url3 = 'https://murze.be/quickly-dd-anything-from-the-commandline';

    $title4 = 'spatie/laravel-html';
    $key4 = 'spatie_laravel-html';
    $url4 = 'https://github.com/spatie/laravel-html';
    $doc_url4 = '';

    $title5 = 'marvinlabs/laravel-html-bootstrap-4';
    $key5 = 'marvinlabs_laravel-html-bootstrap-4';
    $url5 = 'https://github.com/marvinlabs/laravel-html-bootstrap-4';
    $doc_url5 = '';

    $title6 = 'spatie/laravel-permission';
    $key6 = 'spatie_laravel-permission';
    $url6 = 'https://github.com/spatie/laravel-permission';
    $doc_url6 = '';

    $title7 = 'spatie/laravel-tags';
    $key7 = 'spatie_laravel-tags';
    $url7 = 'https://github.com/spatie/laravel-tags';
    $doc_url7 = '';

    $title8 = 'spatie/flysystem-dropbox';
    $key8 = 'spatie_flysystem-dropbox';
    $url8 = 'https://github.com/spatie/flysystem-dropbox';
    $doc_url8 = 'https://murze.be/an-opinionated-tagging-package-for-laravel-apps';

    $title9 = 'spatie/laravel-sluggable';
    $key9 = 'spatie_laravel-sluggable';
    $url9 = 'https://github.com/spatie/laravel-sluggable';
    $doc_url9 = 'https://murze.be/a-php-7-laravel-package-to-create-slugs';

    $title10 = 'spatie/laravel-sitemap';
    $key10 = 'spatie_laravel-sitemap';
    $url10 = 'https://github.com/spatie/laravel-sitemap';
    $doc_url10 = 'https://murze.be/automatically-generate-a-sitemap-in-laravel';

    $title11 = 'spatie/laravel-partialcache';
    $key11 = 'spatie_laravel-partialcache';
    $url11 = 'https://github.com/spatie/laravel-partialcache';
    $doc_url11 = 'https://spatie.be/en/opensource';

    $title12 = 'spatie/laravel-newsletter';
    $key12 = str_replace('/','_',$title12);
    $url12 = 'https://github.com/spatie/laravel-newsletter';
    $doc_url12 = 'https://murze.be/easily-integrate-mailchimp-in-laravel-5';

    $title13 = 'spatie/laravel-migrate-fresh';
    $key13 = str_replace('/','_',$title13);
    $url13 = 'https://github.com/spatie/laravel-migrate-fresh';
    $doc_url13 = 'https://murze.be/a-laravel-package-to-rebuild-the-database';

    $title14 = 'spatie/laravel-menu';
    $key14 = str_replace('/','_',$title14);
    $url14 = 'https://github.com/spatie/laravel-menu';
    $doc_url14 = 'https://murze.be/a-modern-package-to-generate-html-menus';

    $title15 = 'spatie/laravel-medialibrary';
    $key15 = str_replace('/','_',$title15);
    $url15 = 'https://github.com/spatie/laravel-medialibrary';
    $doc_url15 = 'https://docs.spatie.be/laravel-medialibrary/v6/introduction';

    $title16 = 'spatie/laravel-mailable-test';
    $key16 = str_replace('/','_',$title16);
    $url16 = 'https://github.com/spatie/laravel-mailable-test';
    $doc_url16 = 'https://murze.be/an-artisan-command-to-easily-test-mailables';

    $title17 = 'spatie/laravel-link-checker';
    $key17 = str_replace('/','_',$title17);
    $url17 = 'https://github.com/spatie/laravel-link-checker';
    $doc_url17 = 'https://murze.be/a-package-to-check-all-links-in-a-laravel-app';

    $title18 = 'spatie/laravel-html';
    $key18 = str_replace('/','_',$title18);
    $url18 = 'https://github.com/spatie/laravel-html';
    $doc_url18 = '';

    $title19 = 'spatie/laravel-glide';
    $key19 = str_replace('/','_',$title19);
    $url19 = 'https://github.com/spatie/laravel-glide';
    $doc_url19 = 'https://murze.be/easily-convert-images-with-glide';

    $title20 = 'spatie/laravel-fractal';
    $key20 = str_replace('/','_',$title20);
    $url20 = 'https://github.com/spatie/laravel-fractal';
    $doc_url20 = 'https://murze.be/a-fractal-service-provider-for-laravel';

    $title21 = 'spatie/laravel-failed-job-monitor';
    $key21 = str_replace('/','_',$title21);
    $url21 = 'https://github.com/spatie/laravel-failed-job-monitor';
    $doc_url21 = 'https://murze.be/get-notified-when-a-queued-job-fails';

    $title22 = 'spatie/laravel-demo-mode';
    $key22 = str_replace('/','_',$title22);
    $url22 = 'https://github.com/spatie/laravel-demo-mode';
    $doc_url22 = 'https://murze.be/a-package-to-protect-your-work-in-progress-from-prying-eyes';

    $title23 = 'spatie/laravel-db-snapshots';
    $key23 = str_replace('/','_',$title23);
    $url23 = 'https://github.com/spatie/laravel-db-snapshots';
    $doc_url23 = '';

    $title24 = 'spatie/laravel-blade-javascript';
    $key24 = str_replace('/','_',$title24);
    $url24 = 'https://github.com/spatie/laravel-blade-javascript';
    $doc_url24 = 'https://murze.be/a-blade-directive-to-export-php-variables-to-javascript';

    $title25 = 'spatie/laravel-artisan-dd';
    $key25 = str_replace('/','_',$title25);
    $url25 = 'https://github.com/spatie/laravel-artisan-dd';
    $doc_url25 = 'https://murze.be/quickly-dd-anything-from-the-commandline';

    $title26 = 'spatie/laravel-activitylog';
    $key26 = str_replace('/','_',$title26);
    $url26 = 'https://github.com/spatie/laravel-activitylog';
    $doc_url26 = 'https://docs.spatie.be/laravel-activitylog/v1/introduction';

    $item_counter = 0;
    $max_items = 26;
    ?>


    <div class="fixed-linkbar">

        <div style="display:none" id="dragableheader">
            <a class="ml-5 mr-5" href="javascript:scroll_to('oben1')">top</a>
            <a class="ml-5 mr-5" href="javascript:scroll_to('page_bott')">bottom</a> -

            @for ($i = 1; $i <= $max_items; $i++)
                @php
                    $this_title = 'title';
                    $$this_title = $this_title.$i;
                    $this_key = 'key';
                    $$this_key = $this_key.$i;
                @endphp
                <a style="white-space:nowrap" class="ml-5 mr-5" href="javascript:scroll_to('{{$$$this_key}}',-92)">{{$$title}}</a>
            @endfor

        </div>
        <a title="show/hide" id="switch_display_fixed_linkbar" href="javascript:toggle('dragableheader','fade')"><i class="fa fa-window-close" aria-hidden="true"></i></a>
    </div>


    {{--######################### NEW ROW 1-2 ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $item_counter ++;
            $t_key = $key1;
            $t_title = $title1;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url1}}">
                            Git</a>

                    @if($doc_url1<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url1}}">Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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
            $item_counter ++;
            $t_key =  $key2;
            $t_title = $title2;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url2}}">
                        Git</a>

                    @if($doc_url2<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url2}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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


    {{--######################### NEW ROW 3-4 ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $item_counter ++;
            $t_key =  $key3;
            $t_title = $title3;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url3}}">
                        Git</a>

                    @if($doc_url3<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url3}}">
                            Doc</a>
                    @endif


                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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
            $item_counter ++;
            $t_key =  $key4;
            $t_title = $title4;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url4}}">
                        Git</a>

                    @if($doc_url4<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url4}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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



    {{--######################### NEW ROW 5-6######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $item_counter ++;
            $t_key =  $key5;
            $t_title = $title5;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url5}}">
                        Git</a>

                    @if($doc_url5<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url5}}">
                            Doc</a>
                    @endif

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url5}}">
                        Doc</a>

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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
            $item_counter ++;
            $t_key =  $key6;
            $t_title = $title6;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url6}}">
                        Git</a>

                    @if($doc_url6<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url6}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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



    {{--######################### NEW ROW 7-8 ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $item_counter ++;
            $t_key =  $key7;
            $t_title = $title7;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url7}}">
                        Git</a>

                    @if($doc_url7<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url7}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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
            $item_counter ++;
            $t_key =  $key8;
            $t_title = $title8;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url8}}">
                        Git</a>

                    @if($doc_url8<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url8}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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

    {{--######################### NEW ROW 9-10 ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $item_counter ++;
            $t_key =  $key9;
            $t_title = $title9;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url9}}">
                        Git</a>

                    @if($doc_url9<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url9}}">
                            Doc</a>
                    @endif


                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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
            $item_counter ++;
            $t_key =  $key10;
            $t_title = $title10;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url10}}">
                        Git</a>

                    @if($doc_url10<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url10}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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

    {{--######################### NEW ROW 11-12 ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $item_counter ++;
            $t_key =  $key11;
            $t_title = $title11;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="larapacks?mysearch=spatie">
                        Git</a>

                    @if($doc_url11<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url11}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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
            $item_counter ++;
            $t_key =  $key12;
            $t_title = $title12;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url2}}">
                        Git</a>

                    @if($doc_url12<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url12}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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

    {{--######################### NEW ROW 13-14 ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $item_counter ++;
            $t_key =  $key13;
            $t_title = $title13;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url13}}">
                        Git</a>

                    @if($doc_url13<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url13}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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
            $item_counter ++;
            $t_key =  $key14;
            $t_title = $title14;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url14}}">
                        Git</a>

                    @if($doc_url14<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url14}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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

    {{--######################### NEW ROW 15-16 ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $item_counter ++;
            $t_key =  $key15;
            $t_title = $title15;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url15}}">
                        Git</a>

                    @if($doc_url15<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url15}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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
            $item_counter ++;
            $t_key =  $key16;
            $t_title = $title16;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url16}}">
                        Git</a>

                    @if($doc_url16<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url16}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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


    {{--######################### NEW ROW 17-18 ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $item_counter ++;
            $t_key =  $key17;
            $t_title = $title17;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url17}}">
                        Git</a>

                    @if($doc_url17<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url17}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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
            $item_counter ++;
            $t_key =  $key18;
            $t_title = $title18;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url18}}">
                        Git</a>

                    @if($doc_url18<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url18}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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


    {{--######################### NEW ROW 19-20 ######################################--}}
    <div class="row ">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $item_counter ++;
            $t_key =  $key19;
            $t_title = $title19;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url19}}">
                        Git</a>

                    @if($doc_url19<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url19}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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
            $item_counter ++;
            $t_key =  $key20;
            $t_title = $title20;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url20}}">
                        Git</a>

                    @if($doc_url20<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url20}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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


    {{--######################### NEW ROW 21-22 ######################################--}}
    <div class="row ">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $item_counter ++;
            $t_key =  $key21;
            $t_title = $title21;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url21}}">
                        Git</a>

                    @if($doc_url21<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url21}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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
            $item_counter ++;
            $t_key =  $key22;
            $t_title = $title22;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url22}}">
                        Git</a>

                    @if($doc_url22<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url22}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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


    {{--######################### NEW ROW - 23-24 ######################################--}}
    <div class="row ">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $item_counter ++;
            $t_key =  $key23;
            $t_title = $title23;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url23}}">
                        Git</a>

                    @if($doc_url23<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url23}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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
            $item_counter ++;
            $t_key =  $key24;
            $t_title = $title24;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url24}}">
                        Git</a>

                    @if($doc_url24<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url24}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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

    {{--######################### NEW ROW 25-26 ######################################--}}
    <div class="row ">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $item_counter ++;
            $t_key =  $key25;
            $t_title = $title25;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url25}}">
                        Git</a>

                    @if($doc_url25<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url25}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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
            $item_counter ++;
            $t_key =  $key26;
            $t_title = $title26;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url26}}">
                        Git</a>

                    @if($doc_url26<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url26}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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
            $item_counter ++;
            $t_key =  $key15;
            $t_title = $title15;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url15}}">
                        Git</a>

                    @if($doc_url15<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url15}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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
            $item_counter ++;
            $t_key =  $key16;
            $t_title = $title16;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url16}}">
                        Git</a>

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
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



    <div style="height:900px"></div>










@endsection
