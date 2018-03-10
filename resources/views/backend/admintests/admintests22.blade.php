@extends('backend.layouts.app')
@section('title')
    <?php $this_filename ='admintests22'  ?>
    {{$this_filename}}
@endsection
@section('page-header')
    <h2>Filesystem - How to</h2>
@endsection

@section('meta')
    {{--<!-- nixxxxxxxxxxxxx meta -->--}}
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

    $title1 = 'thephpleague/flysystem-aws-s3-v3';
    $key1 = str_replace('/','_',$title1);
    $url1 = 'https://github.com/thephpleague/flysystem-aws-s3-v3';
    $doc_url1 = '';

    $title2 = 'spatie/flysystem-dropbox';
    $key2 = str_replace('/','_',$title2);
    $url2 = 'https://github.com/spatie/flysystem-dropbox';
    $doc_url2 = 'https://murze.be/dropbox-will-turn-off-v1-of-their-api-soon-its-time-to-update-your-php-application';

    $title3 = '';
    $key3 = str_replace('/','_',$title3);
    $url3 = '';
    $doc_url3 = '';

    $title4 = '';
    $key4 = str_replace('/','_',$title4);
    $url4 = '';
    $doc_url4 = '';

/*    $title5 = '';
    $key5 = str_replace('/','_',$title5);
    $url5 = '';
    $doc_url5 = '';

    $title6 = '';
    $key6 = str_replace('/','_',$title6);
    $url6 = '';
    $doc_url6 = '';*/

    /*
    $title1 = '';
    $key1 = str_replace('/','_',$title1);
    $url1 = '';
    $doc_url1 = '';

    $title2 = '';
    $key2 = str_replace('/','_',$title2);
    $url2 = '';
    $doc_url2 = '';

    $title3 = '';
    $key3 = str_replace('/','_',$title3);
    $url3 = '';
    $doc_url3 = '';

    $title4 = '';
    $key4 = str_replace('/','_',$title4);
    $url4 = '';
    $doc_url4 = '';

    $title5 = '';
    $key5 = str_replace('/','_',$title5);
    $url5 = '';
    $doc_url5 = '';

    $title6 = '';
    $key6 = str_replace('/','_',$title6);
    $url6 = '';
    $doc_url6 = '';
*/

    $item_counter = 0;
    $max_items = 4;
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






    <div style="height:900px"></div>
@endsection
