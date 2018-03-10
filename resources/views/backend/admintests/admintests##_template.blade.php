@extends('backend.layouts.app')
@section('title')
    <?php $this_filename = 'admintests##_template'  ?>
    {{$this_filename}}
@endsection
@section('page-header')
    <h2>page-header</h2>
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

    $title1 = 'Nix1 - Notes';
    $key1 = str_replace('/', '_', $title1);
    $key1 = str_replace(' ', '_', $key1);
    $key1 = 'settings_superadmin_notes';
    $url1 = '';
    $doc_url1 = '';

    $title2 = 'Nix2 - ToDo';
    $key2 = str_replace('/', '_', $title2);
    $key2 = str_replace(' ', '_', $key2);
    $key2 = 'settings_superadmin_todo';
    $url2 = '';
    $doc_url2 = '';


    $title3 = 'nix3';
    $key3 = str_replace('/', '_', $title3);
    $key3 = str_replace(' ', '_', $key3);
    $key3 = substr('settings_' . $key3, 0, 50);
    $url3 = '';
    $doc_url3 = '';

    $title4 = 'nix4';
    $key4 = str_replace('/', '_', $title4);
    $key4 = str_replace(' ', '_', $key4);
    $key4 = substr('settings_' . $key4, 0, 50);
    $url4 = '';
    $doc_url4 = '';


    $title5 = 'nix5';
    $key5 = str_replace('/', '_', $title5);
    $key5 = str_replace(' ', '_', $key5);
    $key5 = substr('settings_' . $key5, 0, 50);
    $url5 = '';
    $doc_url5 = '';

    $title6 = 'nix6';
    $key6 = str_replace('/', '_', $title6);
    $key6 = str_replace(' ', '_', $key6);
    $key6 = substr('settings_' . $key6, 0, 50);
    $url6 = '';
    $doc_url6 = '';


    $title7 = 'nix7';
    $key7 = str_replace('/', '_', $title7);
    $key7 = str_replace(' ', '_', $key7);
    $key7 = substr('settings_' . $key7, 0, 50);
    $url7 = '';
    $doc_url7 = '';

    $title8 = 'nix8';
    $key8 = str_replace('/', '_', $title8);
    $key8 = str_replace(' ', '_', $key8);
    $key8 = substr('settings_' . $key8, 0, 50);
    $url8 = '';
    $doc_url8 = '';

    $title9 = 'nix9';
    $key9 = str_replace('/', '_', $title9);
    $key9 = str_replace(' ', '_', $key9);
    $key9 = substr('settings_' . $key9, 0, 50);
    $url9 = '';
    $doc_url9 = '';

    $title10 = 'nix10';
    $key10 = str_replace('/', '_', $title10);
    $key10 = str_replace(' ', '_', $key10);
    $key10 = substr('settings_' . $key10, 0, 50);
    $url10 = '';
    $doc_url10 = '';


    /*
       $title5 = '';
       $key5 = str_replace('/','_',$title5);
       $key5 = str_replace(' ','_',$key5);
       $key5 = substr('settings_'.$key5,0,50);
       $url5 = '';
       $doc_url5 = '';

       $title6 = '';
       $key6 = str_replace('/','_',$title6);
       $key6 = str_replace(' ','_',$key6);
       $key6 = substr('settings_'.$key6,0,50);
       $url6 = '';
       $doc_url6 = '';
   */

    $item_counter = 0;
    $max_items = 6;
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
                <a style="white-space:nowrap" class="ml-5 mr-5"
                   href="javascript:scroll_to('{{$$$this_key}}',-92)">{{$$title}}</a>
            @endfor

        </div>
        <a title="show/hide" id="switch_display_fixed_linkbar" href="javascript:toggle('dragableheader','fade')"><i class="fa fa-window-close"
                                                                                  aria-hidden="true"></i></a>
    </div>


    {{--######################### NEW ROW 1-2 ######################################--}}
    <div class="row">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $item_counter++;
            $t_key = $key1;
            $t_title = $title1;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox
                       data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    @if($url1<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url1}}">
                            Git</a>
                    @endif

                    @if($doc_url1<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url1}}">Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $item_counter++;
            $t_key = $key2;
            $t_title = $title2;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox
                       data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>
                    @if($url2<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url2}}">
                            Git</a>
                    @endif

                    @if($doc_url2<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url2}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
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
            $item_counter++;
            $t_key = $key3;
            $t_title = $title3;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox
                       data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    @if($url3<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url3}}">
                            Git</a>
                    @endif

                    @if($doc_url3<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url3}}">
                            Doc</a>
                    @endif


                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $item_counter++;
            $t_key = $key4;
            $t_title = $title4;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox
                       data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>
                    @if($url4<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url4}}">
                            Git</a>
                    @endif
                    @if($doc_url4<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url4}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
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
            $item_counter++;
            $t_key = $key5;
            $t_title = $title5;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox
                       data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>
                    @if($url5<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url5}}">
                            Git</a>
                    @endif
                    @if($doc_url5<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url5}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $item_counter++;
            $t_key = $key6;
            $t_title = $title6;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox
                       data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>
                    @if($url6<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url6}}">
                            Git</a>
                    @endif
                    @if($doc_url6<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url6}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>{{--<div class="row">--}}

    {{--######################### NEW ROW 7-8 ######################################--}}
    <div class="row hidden">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $item_counter++;
            $t_key = $key7;
            $t_title = $title7;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox
                       data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url7}}">
                        Git</a>

                    @if($doc_url7<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url7}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $item_counter++;
            $t_key = $key8;
            $t_title = $title8;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox
                       data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url8}}">
                        Git</a>

                    @if($doc_url8<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url8}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>{{--<div class="row">--}}

    {{--######################### NEW ROW 9-10 ######################################--}}
    <div class="row hidden">
        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $item_counter++;
            $t_key = $key9;
            $t_title = $title9;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox
                       data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url9}}">
                        Git</a>

                    @if($doc_url9<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url9}}">
                            Doc</a>
                    @endif


                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-6">
            {{----------------------------------------------------}}
            <?php
            $item_counter++;
            $t_key = $key10;
            $t_title = $title10;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox
                       data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$url10}}">
                        Git</a>

                    @if($doc_url10<>'')
                        <a class="btn btn-primary btn-sm float-right mr-10" target="_blank" href="{{$doc_url10}}">
                            Doc</a>
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="margin-left:12px;font-size:0.7em;font-weight:normal;color:#999">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}
    </div>{{--<div class="row">--}}


    <div style="height:900px"></div>





@endsection
