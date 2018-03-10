@extends('backend.layouts.app')
@section('title')
    <?php $this_filename = 'admintests32'  ?>
    Dashboard DEV
@endsection
@section('page-header')
    <h2>Quick-Info DEV
        {{--show debug area?--}}
        <div style="font-size:0.8em;display:inline-block;margin:9px 49px -9px 0" class="float-right">
            <?php

            $show_test_debug_area = $this_filename.'_show_test_debug_area';
            create_dv($show_test_debug_area);
            $show_test_area = get_dv($show_test_debug_area);

            echo get_checkbox_any_table(
                $table = 'diverses',
                $field = 'div_res',
                $id = $show_test_debug_area,
                $id_field = 'div_what',
                $with_comment = false,
                $tt_hint_key = 'is_dev',
                $label_text = 'show debug area? ',
                $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                $ax_response = true,
                $input_style = '',
                $label_style = 'color:#aaa;margin-left:12px;font-weight:normal;margin-right:6px;font-size:0.6em;vertical-align:top',
                $with_tooltip = false,
                $tt_class = 'tip_lu',
                $tt_width = '400px',
                $with_page_reload = true,
                $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname} - otherwise leave empty
                $from_inside_loop = false, // lookup for current value if set to false
                $as_switch = true, //only checkbox or switch?
                $switch_size = 'no' //xs, sm, no, lg
            );

            ?>
        </div></h2>
@endsection

@section('meta')
    {{--<!-- nixxxxxxxxxxxxx meta -->--}}
@endsection


@section('before-styles-end')
    {{--<!-- nixxxxxxxxxxxxx before-styles-end -->--}}
@endsection


@section('content')
    @include('backend.includes.partials.dev-nav')

    <div class="text-right dimmed04" style="margin:-6px 12px 6px 12px;color:#123;">
        <?php
        $this_table_name = $this_filename;
        create_dv($this_table_name.'_table_top_hint');
        echo get_dv_translation($this_table_name.'_table_top_hint');

        $what = $this_table_name.'_table_top_hint';
        $class="tip_lu"; //tip or tip_lu
        $width='400px';
        $style='margin-left:5px';
        $icon='';
        echo tooltip($what,$class, $width,  $style, $icon);
        ?>
    </div>


    <?php

    $title1 = 'Links'; //at10
    $key1 = 'quick_info_dev_links';
    $url1 = link_to_route('admin.dashboard.admintests10','New Window',[],[ 'target="_blank"', 'class="btn btn-primary btn-sm float-right mr-10"']) ;
    $doc_url1 = link_to_route_popup('dashboard/pop_dev_any_at?at=10','Popup')  ;


    $title2 = 'Settings'; //at28
    $key2 = 'quick_info_dev_settings';
    $url2 = link_to_route('admin.dashboard.admintests28','New Window',[],[ 'target="_blank"', 'class="btn btn-primary btn-sm float-right mr-10"']) ;
    $doc_url2 = link_to_route_popup('dashboard/pop_dev_any_at?at=28','Popup')  ;

    $title3 = 'Helpers'; //at29
    $key3 = 'quick_info_dev_helpers';
    $url3 = link_to_route('admin.dashboard.admintests29','New Window',[],[ 'target="_blank"', 'class="btn btn-primary btn-sm float-right mr-10"']) ;
    $doc_url3 = link_to_route_popup('dashboard/pop_dev_any_at?at=29','Popup')  ;


    $title4 = 'Dev Info'; //at30
    $key4 = 'quick_info_dev_info';
    $url4 = link_to_route('admin.dashboard.admintests30','New Window',[],[ 'target="_blank"', 'class="btn btn-primary btn-sm float-right mr-10"']) ;
    $doc_url4 = link_to_route_popup('dashboard/pop_dev_any_at?at=30','Popup')  ;


    $title5 = 'Translations'; //at19
    $key5 = 'quick_info_dev_translations';
    $url5 = link_to_route('admin.dashboard.admintests19','New Window',[],[ 'target="_blank"', 'class="btn btn-primary btn-sm float-right mr-10"']) ;
    $doc_url5 = link_to_route_popup('dashboard/pop_dev_any_at?at=19','Popup')  ;

    $title6 = 'Spatie'; //18
    $key6 = 'quick_info_dev_spatie';
    $url6 = link_to_route('admin.dashboard.admintests18','New Window',[],[ 'target="_blank"', 'class="btn btn-primary btn-sm float-right mr-10"']) ;
    $doc_url6 = link_to_route_popup('dashboard/pop_dev_any_at?at=18','Popup')  ;

    $title7 = 'Artisan'; //at20
    $key7 = 'quick_info_dev_artisan';
    $url7 = link_to_route('admin.dashboard.admintests20','New Window',[],[ 'target="_blank"', 'class="btn btn-primary btn-sm float-right mr-10"']) ;
    $doc_url7 = link_to_route_popup('dashboard/pop_dev_any_at?at=20','Popup')  ;

    $title8 = 'Generators'; //21
    $key8 = 'quick_info_dev_generators';
    $url8 = link_to_route('admin.dashboard.admintests21','New Window',[],[ 'target="_blank"', 'class="btn btn-primary btn-sm float-right mr-10"']) ;
    $doc_url8 = link_to_route_popup('dashboard/pop_dev_any_at?at=21','Popup')  ;

    $title9 = 'Filesystem'; //22
    $key9 = 'quick_info_dev_filesystem';
    $url9 = link_to_route('admin.dashboard.admintests22','New Window',[],[ 'target="_blank"', 'class="btn btn-primary btn-sm float-right mr-10"']) ;
    $doc_url9 = link_to_route_popup('dashboard/pop_dev_any_at?at=22','Popup')  ;


    $title10 = 'Auth/Permissions'; //23
    $key10 = 'quick_info_dev_auth_permi';
    $url10 = link_to_route('admin.dashboard.admintests23','New Window',[],[ 'target="_blank"', 'class="btn btn-primary btn-sm float-right mr-10"']) ;
    $doc_url10 = link_to_route_popup('dashboard/pop_dev_any_at?at=23','Popup')  ;

    $title11 = 'Date/Time'; //24
    $key11 = 'quick_info_dev_date_time';
    $url11 = link_to_route('admin.dashboard.admintests24','New Window',[],[ 'target="_blank"', 'class="btn btn-primary btn-sm float-right mr-10"']) ;
    $doc_url11 = link_to_route_popup('dashboard/pop_dev_any_at?at=24','Popup')  ;

    $title12 = 'PHP to Javascript'; //25
    $key12 = 'quick_info_dev_to_js';
    $url12 = link_to_route('admin.dashboard.admintests25','New Window',[],[ 'target="_blank"', 'class="btn btn-primary btn-sm float-right mr-10"']) ;
    $doc_url12 = link_to_route_popup('dashboard/pop_dev_any_at?at=25','Popup')  ;

    $title13 = 'Infyom'; //26
    $key13 = 'quick_info_dev_infyom';
    $url13 = link_to_route('admin.dashboard.admintests26','New Window',[],[ 'target="_blank"', 'class="btn btn-primary btn-sm float-right mr-10"']) ;
    $doc_url13 = link_to_route_popup('dashboard/pop_dev_any_at?at=26','Popup')  ;

    $title14 = 'Allgemein'; //27
    $key14 = 'quick_info_dev_allgemein';
    $url14 = link_to_route('admin.dashboard.admintests27','New Window',[],[ 'target="_blank"', 'class="btn btn-primary btn-sm float-right mr-10"']) ;
    $doc_url14 = link_to_route_popup('dashboard/pop_dev_any_at?at=27','Popup')  ;

    $title15 = 'nix15';
    $key15 = 'nix15';
    $url15 = '';
    $doc_url15 = '';

    //$title14 = 'Allgemein'; //27
    //$key14 = 'quick_info_dev_allgemein';
    $url16 = link_to_route('admin.dashboard.admintests33','All Notes',[],[ 'target="_blank"', 'class="btn btn-primary btn-sm float-right mr-10"']) ;
    $doc_url16 = link_to_route_popup('dashboard/pop_dev_any_at?at=33','All Notes')  ;

    $url17 = link_to_route('admin.dashboard.admintests33','All Notes',[],[ 'target="_blank"', 'class="btn btn-primary btn-sm float-right mr-10"']) ;
    $doc_url17 = link_to_route_popup('dashboard/pop_dev_any_at?at=33','All Notes')  ;

    $url18 = link_to_route('admin.dashboard.admintests33','All Notes',[],[ 'target="_blank"', 'class="btn btn-primary btn-sm float-right mr-10"']) ;
    $doc_url18 = link_to_route_popup('dashboard/pop_dev_any_at?at=33','All Notes')  ;


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
    $max_items = 15;
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
        <a title="show/hide" id="switch_display_fixed_linkbar" href="javascript:toggle('dragableheader','fade')">
            <i class="fa fa-window-close" aria-hidden="true"></i></a>
    </div>

    @if( $show_test_area )
        <div style="padding:12px;background:#fffff6;border:1px #ccc solid">
            <a style="margin:-18px -18px 0 0;" class="float-right" href="javascript:toggle('debug_inner','slide')"><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></a>
            <div id="debug_inner">
                <span class="float-right" style="color:#abc;font-size:1.2em;font-weight:bold">test & debug</span>
                <?php
                //add your test-code here
                //only for debug purposes - default: $page_debug_show = false
                //ec('$data: '.json_encode($data));
                echo 'all cols:<br>';
                echo get_columns_from_table('languages');
                echo('<hr>');
                echo 'only text-cols: &nbsp; &nbsp;  &nbsp;  ';
                $xarr = get_columns_from_table_text_only('languages',true); //true for as_array
                foreach ($xarr as $x){
                    echo $x.' | ';
                }

                ?>
            </div>
        </div>
    @endif


    {{--######################### NEW ROW wichtige Links ######################################--}}
    <div class="row">

        <div class="col-12">
            <div class="card">
                {{--<div class="card-header h4">
                </div>--}}{{--</div class="card-header h4">--}}
                <div class="card-block" style="">
                    <a target="_blank" class="btn btn-primary btn-sm" href="{{url("/admin/dashboard/admintests31")}}">Tables & Indices</a>
                    <a target="_blank" class="btn btn-primary btn-sm ml-2" href="{{url("/admin/dashboard/admintests40")}}">Caching</a>
                    <a target="_blank" class="btn btn-primary btn-sm ml-2" href="{{url("/admin/dashboard/admintests36")}}">Settings</a>
                    <a target="_blank" class="btn btn-primary btn-sm ml-2" href="{{url("/admin/dashboard/admintests51")}}">myWidgets</a>



                </div>{{--</div class="card-block">--}}
            </div>{{--</div class="card">--}}
        </div>{{--</div class="col-4">--}}
    </div>{{--</div class="row">--}}
    {{--######################### NEW ROW ######################################--}}
    {{-- DEV notes--}}
    <div class="row">

        <div class="col-4">

            {{----------------------------------------------------}}
            <?php
            $item_counter++;
            $t_key = 'notes_superadmin';
            $t_title = 'DEV Notes';
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

                    @if($url16<>'')
                        {{$url16}}
                    @endif
                    @if($doc_url16<>'')
                        {!! $doc_url16  !!}
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="display:none">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-4">
            {{----------------------------------------------------}}
            <?php
            $item_counter++;
            $t_key = 'todo_superadmin';
            $t_title = 'Dev ToDo';
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

                    @if($url17<>'')
                        {{$url17}}
                    @endif
                    @if($doc_url17<>'')
                        {!! $doc_url17  !!}
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="display:none">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-4">
            {{----------------------------------------------------}}
            <?php
            $item_counter++;
            $t_key = 'nice_to_have_superadmin';
            $t_title = 'Nice to Have';
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

                    @if($url18<>'')
                        {{$url18}}
                    @endif
                    @if($doc_url18<>'')
                        {!! $doc_url18  !!}
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="display:none">{{$t_key}}</span>
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

    {{--######################### NEW ROW 1-2 ######################################--}}
    <div class="row">
        <div class="col-4">
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
                        {{$url1}}
                    @endif

                    @if($doc_url1<>'')
                        {!! $doc_url1  !!}
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="display:none">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-4">
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
                        {{$url2}}
                    @endif

                    @if($doc_url2<>'')
                        {!! $doc_url2  !!}
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="display:none">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-4">
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
                        {{$url3}}
                    @endif

                    @if($doc_url3<>'')
                        {!! $doc_url3  !!}
                    @endif


                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="display:none">{{$t_key}}</span>
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

        <div class="col-4">
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
                        {{$url4}}
                    @endif

                    @if($doc_url4<>'')
                        {!! $doc_url4  !!}
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="display:none">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-4">
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
                        {{$url5}}
                    @endif

                    @if($doc_url5<>'')
                        {!! $doc_url5  !!}
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="display:none">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-4">
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
                            {{$url6}}
                        @endif
                        @if($doc_url6<>'')
                            {!! $doc_url6  !!}
                        @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="display:none">{{$t_key}}</span>
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
    <div class="row">
        <div class="col-4">
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

                    @if($url7<>'')
                        {{$url7}}
                    @endif
                    @if($doc_url7<>'')
                        {!! $doc_url7  !!}
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="display:none">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-4">
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

                    @if($url8<>'')
                        {{$url8}}
                    @endif
                    @if($doc_url8<>'')
                        {!! $doc_url8  !!}
                    @endif


                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="display:none">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-4">
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

                    @if($url9<>'')
                        {{$url9}}
                    @endif
                    @if($doc_url9<>'')
                        {!! $doc_url9  !!}
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="display:none">{{$t_key}}</span>
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
    <div class="row">

        <div class="col-4">
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

                        @if($url10<>'')
                            {{$url10}}
                        @endif
                        @if($doc_url10<>'')
                            {!! $doc_url10  !!}
                        @endif


                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="display:none">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-4">
            {{----------------------------------------------------}}
            <?php
            $item_counter++;
            $t_key = $key11;
            $t_title = $title11;
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

                    @if($url11<>'')
                        {{$url11}}
                    @endif
                    @if($doc_url11<>'')
                        {!! $doc_url11  !!}
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="display:none">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-4">
            {{----------------------------------------------------}}
            <?php
            $item_counter++;
            $t_key = $key12;
            $t_title = $title12;
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

                    @if($url12<>'')
                        {{$url12}}
                    @endif
                    @if($doc_url12<>'')
                        {!! $doc_url12  !!}
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="display:none">{{$t_key}}</span>
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
    <div class="row">

        <div class="col-4">
            {{----------------------------------------------------}}
            <?php
            $item_counter++;
            $t_key = $key13;
            $t_title = $title13;
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

                    @if($url13<>'')
                        {{$url13}}
                    @endif
                    @if($doc_url13<>'')
                        {!! $doc_url13  !!}
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="display:none">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-4">
            {{----------------------------------------------------}}
            <?php
            $item_counter++;
            $t_key = $key14;
            $t_title = $title14;
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

                    @if($url14<>'')
                        {{$url14}}
                    @endif
                    @if($doc_url14<>'')
                        {!! $doc_url14  !!}
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="display:none">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-6">--}}

        <div class="col-4">
            {{----------------------------------------------------}}
            <?php
            $item_counter++;
            $t_key = $key15;
            $t_title = $title15;
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

                    @if($url15<>'')
                        {{$url15}}
                    @endif
                    @if($doc_url15<>'')
                        {!! $doc_url15  !!}
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="display:none">{{$t_key}}</span>
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
