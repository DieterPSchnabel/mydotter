@extends('backend.layouts.app')
<?php
$this_page_name = 'settings_and_configuration';
$this_file_title = 'Settings & Konfiguration (Demo)';

//the hidden help window - press help to view it
$has_help = true;
$has_help_hints = true;
$has_help_help = true;
$has_help_related = true;
$has_help_config = true;

//the available elements in the row 2 above the table - configurable

// init each (key/value pair) one time with value = 1 (true) - only if not exists - later use the switches
create_dv($this_page_name.'_table_has_table_search',1,true); //if value <> '' add $first=true to avoid caching
create_dv($this_page_name.'_table_has_table_export',1,true);
create_dv($this_page_name.'_table_has_table_filter',1,true);
create_dv($this_page_name.'_table_has_cols_filter',1,true);
create_dv($this_page_name.'_table_has_items_per_page',1,true);

$has_table_search = get_dv($this_page_name.'_table_has_table_search');
$has_table_export = get_dv($this_page_name.'_table_has_table_export');
$has_table_filter = get_dv($this_page_name.'_table_has_table_filter');
$has_cols_filter = get_dv($this_page_name.'_table_has_cols_filter');
$has_items_per_page = get_dv($this_page_name.'_table_has_items_per_page');

//do we show these buttons? should depend on users role and privileges
$has_action_show = true;
$has_action_edit = true;
$has_action_delete = true;
$has_action_ceate_new = true;

$tab1_txt = 'Backend';
$tab2_txt = 'Frontend';
$tab3_txt = 'Elements';
$tab4_txt = 'Sonstiges';

$card_counter = 0;

?>
@section('title')
    <?php //$this_page_name = 'admintests36'  ?>
    Settings
@endsection


@section('meta')
    {{--<!-- nixxxxxxxxxxxxx meta -->--}}
@endsection


@section('before-styles-end')
    {{--<!-- nixxxxxxxxxxxxx before-styles-end -->--}}
    <style>
        div.f_container{
            width:100%;
            display: flex; /* or inline-flex */
            align-items: flex-start;
            flex-direction: row;
            flex-wrap: wrap;
        }

        div.f_col{
            width:575px;
            margin: 0 0px;
            flex-grow: 1;
        }
        div.editable_top{
            font-size:0.75em;
            font-weight:normal;
            color:#666;
            padding:3px 0px 1px 4px !important ;
            margin:3px 0 0 0;
        }
        div.editable_top p {
            margin: 1px 0 4px 0;
        }

        div.editable_add{
            margin:4px 0 -12px 0;
        }
    </style>
@endsection

{{------ page header --------}}
@section('page-header')
    <div class="text-right dimmed04" style="margin:6px 12px 5px 12px;color:#123;">
        <?php
        create_dv($this_page_name.'_table_top_hint');
        echo get_dv_translation($this_page_name.'_table_top_hint');

        $what = $this_page_name.'_table_top_hint';
        $class="tip_lu"; //tip or tip_lu
        $width='400px';
        $style='margin-left:5px';
        $icon='';
        if(is_dev()) echo tooltip($what,$class, $width,  $style, $icon);
        ?>
    </div>
@endsection

{{------ content --------}}
@section('content')

    @include('flash::message')


    {{--a test/debug window on top of the page becomes visible if true--}}
    {{--use help->configuration->DEV-Configuaration for this page to make debug area available - the switch is_dev must be ON--}}
    @if(get_dv($this_page_name.'_table_display_debug_area'))
        <div style="padding:12px;background:#fffff6;border:1px #ccc solid">
            <a style="margin:-18px -18px 0 0;" class="float-right dimmed04" href="javascript:toggle('debug_inner','fade')"><i
                        class="fa fa-times-circle fa-2x" aria-hidden="true"></i></a>

            <?php
            echo get_checkbox_any_table(
                $table= 'diverses',
                $field = 'div_res',
                $id = $this_page_name.'_table_display_debug_area',
                $id_field ='div_what',
                $with_comment=false,
                $tt_hint_key = 'is_dev',
                $label_text = "Debug-Bereich anzeigen?",
                $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                $ax_response = true,
                $input_style= '',
                $label_style='margin-right:12px' ,
                $with_tooltip = false,
                $tt_class = 'tip',
                $tt_width = '300px',
                $with_page_reload = true,
                $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                $from_inside_loop = false, // lookup for current value if set to false
                $as_switch = true, //only checkbox or switch?
                $switch_size = 'no' //xs, sm, no, lg
            );
            ?>

            <div id="debug_inner" style="min-height:40px">
                <div class="float-right" style="color:#abc;font-size:1.2em;font-weight:bold;margin:-45px 20px 0 0">test & debug</div>
                <?php
                //add your test-code here
                //only for debug purposes - default: $page_debug_show = false
                //ec('$data: '.json_encode($data));

                /*$t_key = 'is_dev';
                $session_lang_code = session_lang_code();
                $hint_txt = get_dv($t_key, 'div_res_'.$session_lang_code);
                //echo print_ar($hint_txt);

                echo 'all cols:<br>';
                echo get_columns_from_table($this_page_name);
                echo('<hr>');
                echo 'only text-cols: &nbsp; &nbsp;  &nbsp;  ';
                $xarr = get_columns_from_table_text_only($this_page_name, true); //true = as_array
                foreach ($xarr as $x) {
                    echo $x . ' | ';
                }*/

                ?>
            </div>
        </div>
    @endif

    @if($has_help)
        @include('backend.admintests.help.'.$this_page_name.'_help-block')
    @endif

    <div class="card" style="">
        {{------------ HEAD 1. ROW ------------}}
        <div class="card-header" style="border-bottom:none">
            <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups" >

                <div style="font-size:1.0em;display:inline-block;margin:1px 50px 0 0" class="float-right dimmed04">
                    <?php
                    echo get_checkbox_any_table(
                    $table = 'diverses',
                    $field = 'div_res',
                    $id = 'is_dev',
                    $id_field = 'div_what',
                    $with_comment = false,
                    $tt_hint_key = 'is_dev',
                    $label_text = 'Dev-View: ',
                    $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                    $ax_response = true,
                    $input_style = '',
                    $label_style = 'margin-left:12px;font-weight:normal;margin-right:16px;font-size:0.8em',
                    $with_tooltip = true,
                    $tt_class = 'tip_lu',
                    $tt_width = '400px',
                    $with_page_reload = true,
                    $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                    $from_inside_loop = false, // lookup for current value if set to false
                    $as_switch = true, //only checkbox or switch?
                    $switch_size = 'no' //xs, sm, no, lg
                    );

                    ?>
                </div>

                @if(get_dv($this_page_name.'_table_has_help'))
                    {{------------ TABLE HILFE ------------}}
                    <a style="margin-left:12px" class="btn btn-info" href="javascript:toggle('help_block','slide')" role="button">
                        <i class="icon-settings"></i> Hilfe</a>
                    <?php
                    $what = 'table_help_config_hint';
                    $class="tip_lu";
                    $width='400px';
                    $style='margin-left: 6px;margin-right:8px';
                    $icon='';
                    echo tooltip($what,$class, $width,  $style, $icon);
                    ?>
                @else
                    @if(is_dev())
                        <a style="margin-left:12px" class="btn btn-info" href="javascript:toggle('help_block','slide')" role="button">
                            <i class="icon-settings"></i> DEV-Hilfe</a>
                    @endif
                @endif
            </div>

            <div class="table-header-model-name">{{$this_file_title}}
                @if(is_dev()) <span class="o">at36</span> @endif
            </div>
        </div>
        {{--<div class="card-body" style="padding:6px 6px 0 6px;border-top:1px #ccc solid;overflow:auto">

        </div>--}}
    </div>

    {{--############################   row 1####################################################--}}
    <div class="animated fadeIn" >
        <div class="" style="background:#eee;padding:1.0em;">
            {{--<a style="margin-right:8px" class="float-right dimmed04" href="javascript:toggle('help_block','slide')">
                <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></a>--}}
            <ul class="nav nav-tabs" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-expanded="false">
                        <i class="icon-wrench font-lg"></i> <b style="font-size:1.2em">{{$tab1_txt}}</b></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-expanded="false">
                        <i class="icon-wrench font-lg"></i> <b style="font-size:1.2em">{{$tab2_txt}}</b></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#messages4" role="tab" aria-controls="messages" aria-expanded="true">
                        <i class="icon-wrench font-lg"></i> <b style="font-size:1.2em">{{$tab3_txt}}</b></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#config4" role="tab" aria-controls="config" aria-expanded="true">
                        <i class="icon-wrench font-lg "></i> <b style="font-size:1.2em">{{$tab4_txt}}</b></a>
                </li>

                <div class="__float-right" style="position:absolute;right:30px">
                    <a id="show_all_cards_switch" style="margin-left:30px" class="btn btn-primary btn-sm float-right dimmed04" href="javascript:show_all_cards();">
                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i> show all </a>

                    <a id="hide_all_cards_switch" style="margin-left:30px;display:none" class="btn btn-primary btn-sm float-right dimmed04" href="javascript:hide_all_cards();">
                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i> hide all </a>
                </div>

            </ul>

            <div class="tab-content" >


                {{--#########   Panel 1    #####################--}}
                <div style="padding:0.2em 1.2em" class="tab-pane active animated fadeIn" id="home4" role="tabpanel" aria-expanded="true">


                    <div class="f_container ">
                        {{--################## Backend Samples ############################--}}
                        {{----------- 1 Checkbox-Demo with Panel  ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;

                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';

                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    //echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';
                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="hide all" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="show all" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif

                                    <div class="editable_top" style="">
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> show PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
                                                <pre><code>
$what = 'dashboard_settings_sidebar_minimized';
echo get_checkbox_div(
    $what, //the key in table 'diverses' in field 'div_what'
    $label_text = '', //label is only available if $with_panel == false
    $label_style = 'font-weight:bold; margin-right:6px; ',
    $with_panel = true, //wrap all in a box?
    $data_on = 'On',
    $data_off = 'Off',
    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
    $ax_response = false, //if true: a little tick appears for confirmation after change
    $ax_response_with_page_reload = false, //if true: page will be reloaded on change
    $with_tooltip = true, //always false if $with_panel == true
    $tt_class = 'tip', // tip (right) or tip_lu (left)
    $tt_width = '450px' //width of tooltip popup
)
                                                </code></pre>
                                    </div>

                                    <?php
                                    echo get_checkbox_div(
                                    $what = 'dashboard_settings_sidebar_minimized',
                                    $label_text = '',
                                    $label_style = 'font-weight:bold; margin-right:6px; ',
                                    $with_panel = true,
                                    $data_on = 'On',
                                    $data_off = 'Off',
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response = false,
                                    $ax_response_with_page_reload = true,
                                    $with_tooltip = true,
                                    $tt_class = 'tip',
                                    $tt_width = '450px'
                                    )
                                    ?>
                                    {{--edit & display additional text--}}
                                    <div class="editable_add" style="">
                                        @if(is_dev())
                                        <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                        data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                        href="javascript:;">
                                        <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--<div class="col-4">--}}

                        {{----------- 2 Checkbox-Demo without Panel  ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';
                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>

                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
                                                <pre><code>
$what = 'dashboard_settings_sidebar_minimized';
echo get_checkbox_div(
    $what, //the key in table 'diverses' in field 'div_what'
    $label_text = '', //label is only available if $with_panel == false
    $label_style = 'font-weight:bold; margin-right:6px; ',
    $with_panel = false, //wrap all in a box?
    $data_on = 'On',
    $data_off = 'Off',
    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
    $ax_response = false, //if true: a little tick appears for confirmation after change
    $ax_response_with_page_reload = false, //if true: page will be reloaded on change
    $with_tooltip = true, //always false if $with_panel == true
    $tt_class = 'tip_lu', // tip (right) or tip_lu (left)
    $tt_width = '450px' //width of tooltip popup
)
                                                </code></pre>
                                    </div>

                                    <?php
                                    echo get_checkbox_div(
                                    $what = 'dashboard_settings_sidebar_minimized',
                                    $label_text = '',
                                    $label_style = 'font-weight:bold; margin-right:6px; ',
                                    $with_panel = false,
                                    $data_on = 'On',
                                    $data_off = 'Off',
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response = false,
                                    $ax_response_with_page_reload = true,
                                    $with_tooltip = true,
                                    $tt_class = 'tip_lu',
                                    $tt_width = '450px'
                                    )
                                    ?>

                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 3 top nav fixiert? ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> show PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
                                                <pre><code>
$what = 'dashboard_settings_top_nav_fixed';
echo get_checkbox_div(
    $what, //the key in table 'diverses' in field 'div_what'
    $label_text = '', //label is only available if $with_panel == false
    $label_style = 'font-weight:bold; margin-right:6px; ',
    $with_panel = true, //wrap all in a box?
    $data_on = 'On',
    $data_off = 'Off',
    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
    $ax_response = false, //if true: a little tick appears for confirmation after change
    $ax_response_with_page_reload = false, //if true: page will be reloaded on change
    $with_tooltip = true, //always false if $with_panel == true
    $tt_class = 'tip', // tip (right) or tip_lu (left)
    $tt_width = '450px' //width of tooltip popup
)
                                                </code></pre>
                                    </div>

                                    <?php
                                    create_dv('dashboard_settings_top_nav_fixed');
                                    echo get_checkbox_div(
                                    $what = 'dashboard_settings_top_nav_fixed',
                                    $label_text = '',
                                    $label_style = 'font-weight:bold; margin-right:6px; ',
                                    $with_panel = true,
                                    $data_on = 'On',
                                    $data_off = 'Off',
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response = false,
                                    $ax_response_with_page_reload = true,
                                    $with_tooltip = true,
                                    $tt_class = 'tip',
                                    $tt_width = '450px'
                                    )
                                    ?>
                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 4 bottom nav fixed?  ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> show PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
                                                <pre><code>
$what = 'dashboard_settings_bottom_nav_fixed';
echo get_checkbox_div(
    $what, //the key in table 'diverses' in field 'div_what'
    $label_text = '', //label is only available if $with_panel == false
    $label_style = 'font-weight:bold; margin-right:6px; ',
    $with_panel = true, //wrap all in a box?
    $data_on = 'On',
    $data_off = 'Off',
    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
    $ax_response = false, //if true: a little tick appears for confirmation after change
    $ax_response_with_page_reload = false, //if true: page will be reloaded on change
    $with_tooltip = true, //always false if $with_panel == true
    $tt_class = 'tip', // tip (right) or tip_lu (left)
    $tt_width = '450px' //width of tooltip popup
)
                                                </code></pre>
                                    </div>

                                    <?php
                                    create_dv('dashboard_settings_bottom_nav_fixed');
                                    echo get_checkbox_div(
                                    $what = 'dashboard_settings_bottom_nav_fixed',
                                    $label_text = '',
                                    $label_style = 'font-weight:bold; margin-right:6px; ',
                                    $with_panel = true,
                                    $data_on = 'On',
                                    $data_off = 'Off',
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response = false,
                                    $ax_response_with_page_reload = true,
                                    $with_tooltip = true,
                                    $tt_class = 'tip',
                                    $tt_width = '450px'
                                    )
                                    ?>
                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 5 is_dev 1 ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> show PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
                                                <pre><code>
$what = 'is_dev';
echo get_checkbox_div(
    $what,
    $label_text = '',
    $label_style = 'font-weight:bold; margin-right:6px; ',
    $with_panel = false,
    $data_on = 'On',
    $data_off = 'Off',
    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
    $ax_response = false,
    $ax_response_with_page_reload = false,
    $with_tooltip = true,
    $tt_class = 'tip',
    $tt_width = '450px'
)
                                                </code></pre>
                                    </div>

                                    <?php
                                    $what = 'is_dev';
                                    $with_panel = true;
                                    $label_text = 'Bitte wählen:';
                                    $with_tooltip = true;
                                    $ax_response = true;

                                    echo get_checkbox_div(
                                    $what,
                                    $label_text = '',
                                    $label_style = 'font-weight:bold; margin-right:6px; ',
                                    $with_panel = false,
                                    $data_on = 'On',
                                    $data_off = 'Off',
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response = false,
                                    $ax_response_with_page_reload = false,
                                    $with_tooltip = true,
                                    $tt_class = 'tip',
                                    $tt_width = '450px'
                                    )

                                    ?>
                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 6  ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
                                                <pre><code>
echo get_checkbox_div(
    $what = 'is_dev',
    $label_text = '',
    $label_style = 'font-weight:bold; margin-right:6px; ',
    $with_panel = true,
    $data_on = 'On',
    $data_off = 'Off',
    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
    $ax_response = false,
    $ax_response_with_page_reload = true,
    $with_tooltip = true,
    $tt_class = 'tip',
    $tt_width = '450px'
)
                                                </code></pre>
                                    </div>

                                    <?php
                                    echo get_checkbox_div(
                                    $what = 'is_dev',
                                    $label_text = '',
                                    $label_style = 'font-weight:bold; margin-right:6px; ',
                                    $with_panel = true,
                                    $data_on = 'On',
                                    $data_off = 'Off',
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response = false,
                                    $ax_response_with_page_reload = true,
                                    $with_tooltip = true,
                                    $tt_class = 'tip',
                                    $tt_width = '450px'
                                    )
                                    ?>

                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 7  ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> show PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
<pre><code>
echo get_checkbox_any_table(
    $table= 'diverses',
    $field = 'div_res',
    $id = 'is_dev',
    $id_field ='div_what',
    $with_comment=false,
    $tt_hint_key = 'is_dev',
    $label_text = 'use any indiv. Text here...',
    $with_panel = true,
    $ax_response = true,
    $input_style= '',
    $label_style = 'margin-right:12px;font-weight:normal;',
    $with_tooltip = true,
    $tt_class = 'tip',
    $tt_width = '400px',
    $with_page_reload = false,
    $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
    $from_inside_loop = false, // lookup for current value if set to false
    $as_switch = true, //only checkbox or switch?
    $switch_size = 'no' //xs, sm, no, lg
);
</code></pre>
                                    </div>

                                    <?php
                                    echo get_checkbox_any_table(
                                    $table= 'diverses',
                                    $field = 'div_res',
                                    $id = 'is_dev',
                                    $id_field ='div_what',
                                    $with_comment=false,
                                    $tt_hint_key = 'is_dev',
                                    $label_text = 'use any indiv. Text here...',
                                    $with_panel = true,
                                    $ax_response = true,
                                    $input_style= '',
                                    $label_style = 'margin-right:12px;font-weight:normal;',
                                    $with_tooltip = true,
                                    $tt_class = 'tip',
                                    $tt_width = '400px',
                                    $with_page_reload = false,
                                    $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                    $from_inside_loop = false, // lookup for current value if set to false
                                    $as_switch = true, //only checkbox or switch?
                                    $switch_size = 'no' //xs, sm, no, lg
                                    );
                                    ?>
                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 8  ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
                                                <pre><code>
echo get_checkbox_any_table(
    $table= 'diverses',
    $field = 'div_res',
    $id = 'is_dev',
    $id_field ='div_what',
    $with_comment=false,
    $tt_hint_key = 'is_dev',
    $label_text = 'use any indiv. Text here or leave blank...',
    $with_panel = false,
    $ax_response = true,
    $input_style= '',
    $label_style = 'margin-right:12px;font-weight:normal;',
    $with_tooltip = true,
    $tt_class = 'tip',
    $tt_width = '400px',
    $with_page_reload = true,
    $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
    $from_inside_loop = false, // lookup for current value if set to false
    $as_switch = true, //only checkbox or switch?
    $switch_size = 'no' //xs, sm, no, lg
);</code></pre>

                                    </div>

                                    <?php
                                    echo get_checkbox_any_table(
                                    $table= 'diverses',
                                    $field = 'div_res',
                                    $id = 'is_dev',
                                    $id_field ='div_what',
                                    $with_comment=false,
                                    $tt_hint_key = 'is_dev',
                                    $label_text = 'use any indiv. Text here or leave blank...',
                                    $with_panel = false,
                                    $ax_response = true,
                                    $input_style= '',
                                    $label_style = 'margin-right:12px;font-weight:normal;',
                                    $with_tooltip = true,
                                    $tt_class = 'tip',
                                    $tt_width = '400px',
                                    $with_page_reload = true,
                                    $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                    $from_inside_loop = false, // lookup for current value if set to false
                                    $as_switch = true, //only checkbox or switch?
                                    $switch_size = 'no' //xs, sm, no, lg
                                    );
                                    ?>

                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 9  ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> show PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
<pre><code>
    echo get_actionbox_div(
    $what = 'actionbox_test_action',
    $axfe_id = '999999', //refers to a snippet number in myhelper_ax.php and calls it through ajax
    $button_title = 'any title you want',
    $with_panel = true,
    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
    $ax_response_with_page_reload = false,
    $with_tooltip = true, //always false if $with_panel = true
    $tt_class = 'tip',
    $tt_width = '400px'
)</code></pre>

                                    </div>

                                    <?php
                                    echo get_actionbox_div(
                                    $what = 'actionbox_test_action',
                                    $axfe_id = '999999',
                                    $button_title = 'Execute this now',
                                    $with_panel = true,
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response_with_page_reload = false,
                                    $with_tooltip = true, //always false if $with_panel = true
                                    $tt_class = 'tip',
                                    $tt_width = '400px'
                                    )
                                    ?>
                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 10  ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
<pre><code>echo get_select_by_t_key(
    $t_key='categories_images_width',
    $t_key_arr ='',
    $pref='',
    $suff='px',
    $arr_from = '10' ,
    $arr_to  = '800',
    $style='font-size:1.2em;',
    $arr_step = '1',
    $with_tooltip = false,
    $tt_class = 'tip',
    $tt_width = '300px'
);</code></pre>
                                    </div>

                                    <?php
                                    echo get_select_by_t_key(
                                    $t_key='categories_images_width',
                                    $t_key_arr ='',
                                    $pref='',
                                    $suff='px',
                                    $arr_from = '10' ,
                                    $arr_to  = '800',
                                    $style='font-size:1.2em;',
                                    $arr_step = '1',
                                    $with_tooltip = false,
                                    $tt_class = 'tip',
                                    $tt_width = '300px'
                                    );
                                    ?>

                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 11  ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> show PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
<pre><code>echo get_select_by_t_key(
    $t_key='categories_images_width',
    $t_key_arr ='',
    $pref='',
    $suff='px',
    $arr_from = '10' ,
    $arr_to  = '800',
    $style='font-size:1.2em;',
    $arr_step = '1',
    $with_tooltip = true,
    $tt_class = 'tip',
    $tt_width = '300px'
);</code></pre>
                                    </div>

                                    <?php
                                    echo get_select_by_t_key(
                                    $t_key='categories_images_width',
                                    $t_key_arr ='',
                                    $pref='',
                                    $suff='px',
                                    $arr_from = '10' ,
                                    $arr_to  = '800',
                                    $style='font-size:1.2em;',
                                    $arr_step = '1',
                                    $with_tooltip = true,
                                    $tt_class = 'tip',
                                    $tt_width = '300px'
                                    );
                                    ?>
                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 12 ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">

<pre>
    <code>see source code</code>
</pre>

                                    </div>
{{--################## begin widget plus-minus #############################--}}
                                    <?php
                                    $so_id = 'so_123';
                                    $zoom_effect = 'zoom80';
                                    $so_width = '130px ';
                                    ?>
                                    <div class="btn-group btn-block {{$zoom_effect}} float-left" role="group" aria-label="plus-minus" style="width:{{$so_width}};padding:0">
                                        <button type="button" class="btn btn-sm btn-danger" onclick="change_sort_order(-1,'{{$so_id}}')">
                                            <i class="fa fa-minus" aria-hidden="true"></i></button>
                                        <input type="text" value="3" class="text-center" style="width:45px" id="{{$so_id}}" />
                                        <button type="button" class="btn btn-sm btn-success" onclick="change_sort_order(1,'{{$so_id}}')">
                                            <i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                    <script>
                                        /*
                                        //in mycustom.js
                                        function change_sort_order(val,id){
                                            var quant=$('#'+id).val();
                                            var newval = parseInt(quant)+val;
                                            $('#'+id).val(newval) ;
                                        }*/
                                    </script>
{{--################## end widget plus-minus #############################--}}
                                    <br><br>
                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 13 ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
<pre><code>
$t_key = 'cache_minutes_selection';
create_dv($t_key,'',true); //creates a new record in table 'diverses' if not exists - div_what = $t_key - third arg must be 'true' to avoid problem with caching
echo get_select_by_t_key(
$t_key,
$t_key_arr = 'kein Caching,kurzes Caching,normales Caching,extremes Caching',
$pref='',
$suff='px',
$arr_from = 300,
$arr_to = 700,
$style='font-size:1.2em;',
$arr_step ='1',
$with_tooltip = false,
$tt_class = 'tip',
$tt_width = '300px'
);</code></pre>

                                    </div>

                                    <?php
                                    $t_key = 'cache_minutes_selection';
                                    create_dv($t_key,'',true);
                                    echo get_select_by_t_key(
                                    $t_key,
                                    $t_key_arr = 'kein Caching,kurzes Caching,normales Caching,extremes Caching',
                                    $pref='',
                                    $suff='px',
                                    $arr_from = 300,
                                    $arr_to = 700,
                                    $style='font-size:1.2em;',
                                    $arr_step ='1',
                                    $with_tooltip = false,
                                    $tt_class = 'tip',
                                    $tt_width = '300px'
                                    );
                                    ?>

                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 14 ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
 <pre><code>
get_colorpicker_by_t_key(
    $t_key,
    $wrapper_style = 'margin:0 0 4px 0;',
    $with_panel = true,
    $with_tooltip = true, //becomes false if $with_panel = true
    $tt_class= 'tip', //tip or tip_lu
    $tt_width = '450px'
)
)</code></pre>
                                    </div>

                                    <?php
                                    $t_key='categories_images_mirror_bg_color';
                                    echo get_colorpicker_by_t_key(
                                    $t_key,
                                    $wrapper_style = 'margin:0 0 4px 0;',
                                    $with_panel = true,
                                    $with_tooltip = true, //becomes false if $with_panel = true
                                    $tt_class= 'tip', //tip or tip_lu
                                    $tt_width = '450px'
                                    )

                                    ?>

                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 15 ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
                                                <pre><code>
get_colorpicker_by_t_key(
    $t_key = 'categories_images_mirror_bg_color',
    $wrapper_style = 'margin:0 0 4px 0;',
    $with_panel = false,
    $with_tooltip = true, //becomes false if $with_panel = true
    $tt_class= 'tip', //tip or tip_lu
    $tt_width = '650px'
)
                                                </code></pre>
                                    </div>

                                    <?php
                                    $t_key = 'categories_images_mirror_bg_color';
                                    echo get_colorpicker_by_t_key(
                                    $t_key,
                                    $wrapper_style = 'margin:0 0 4px 0;',
                                    $with_panel = false,
                                    $with_tooltip = true, //becomes false if $with_panel = true
                                    $tt_class= 'tip_lu', //tip or tip_lu
                                    $tt_width = '650px'
                                    )
                                    ?>

                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 16 ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
                                                <pre><code>
$what = 'dashboard_settings_sidebar_minimized';
echo get_checkbox_div(
    $what, //the key in table 'diverses' in field 'div_what'
    $label_text = '', //label is only available if $with_panel == false
    $label_style = 'font-weight:bold; margin-right:6px; ',
    $with_panel = false, //wrap all in a box?
    $data_on = 'On',
    $data_off = 'Off',
    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
    $ax_response = false, //if true: a little tick appears for confirmation after change
    $ax_response_with_page_reload = false, //if true: page will be reloaded on change
    $with_tooltip = true, //always false if $with_panel == true
    $tt_class = 'tip', // tip (right) or tip_lu (left)
    $tt_width = '450px' //width of tooltip popup
)
                                                </code></pre>
                                    </div>

                                    <?php
                                    echo get_checkbox_div(
                                    $what = 'dashboard_settings_sidebar_minimized',
                                    $label_text = '',
                                    $label_style = 'font-weight:bold; margin-right:6px; ',
                                    $with_panel = false,
                                    $data_on = 'On',
                                    $data_off = 'Off',
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response = false,
                                    $ax_response_with_page_reload = true,
                                    $with_tooltip = true,
                                    $tt_class = 'tip',
                                    $tt_width = '450px'
                                    )
                                    ?>

                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 17 ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
                                                <pre><code>
echo get_checkbox_div(
    $what = 'translate_to_english_first',
    $label_text = '',
    $label_style = 'font-weight:bold; margin-right:6px; ',
    $with_panel = true,
    $data_on = 'On',
    $data_off = 'Off',
    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
    $ax_response = false,
    $ax_response_with_page_reload = false,
    $with_tooltip = true,
    $tt_class = 'tip_lu',
    $tt_width = '450px'
)
                                                </code></pre>
                                    </div>

                                    <?php
                                    echo get_checkbox_div(
                                    $what = 'translate_to_english_first',
                                    $label_text = '',
                                    $label_style = 'font-weight:bold; margin-right:6px; ',
                                    $with_panel = true,
                                    $data_on = 'On',
                                    $data_off = 'Off',
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response = false,
                                    $ax_response_with_page_reload = false,
                                    $with_tooltip = true,
                                    $tt_class = 'tip_lu',
                                    $tt_width = '450px'
                                    )
                                    ?>

                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 18 ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
                                                <pre><code>
echo get_checkbox_div(
    $what = 'allow_auto_translate_to_all_active_languages',
    $label_text = '',
    $label_style = 'font-weight:bold; margin-right:6px; ',
    $with_panel = false,
    $data_on = 'On',
    $data_off = 'Off',
    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
    $ax_response = false,
    $ax_response_with_page_reload = true,
    $with_tooltip = true,
    $tt_class = 'tip_lu',
    $tt_width = '450px'
)
                                                </code></pre>
                                    </div>

                                    <?php
                                    echo get_checkbox_div(
                                    $what = 'allow_auto_translate_to_all_active_languages',
                                    $label_text = '',
                                    $label_style = 'font-weight:bold; margin-right:6px; ',
                                    $with_panel = false,
                                    $data_on = 'On',
                                    $data_off = 'Off',
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response = false,
                                    $ax_response_with_page_reload = true,
                                    $with_tooltip = true,
                                    $tt_class = 'tip_lu',
                                    $tt_width = '450px'
                                    )
                                    ?>

                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 19 ---------------}}
                        <div class="f_col col-4" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
<pre><code>
$table = 'countries';
$field = 'countries_name';
$id = 8;
$id_field = 'id';
$with_break = false;
$lang = '';
$with_info = false;
$style = 'width:150px;padding-left:5px';
$class = 'inline_txt_any_table';
$show_translation_opt = false;

echo edit_text_in_any_table(
    $table,
    $field,
    $id,
    $id_field,
    $with_break,
    $lang,
    $with_info,
    $style,
    $class,
    $show_translation_opt = false,
    $this_value = '',
    $from_inside_loop = false,
    $with_page_reload = false
)
</code></pre>
                                    </div>

                                    <?php
                                    $table = 'countries';
                                    $field = 'countries_name';
                                    $id = 8;
                                    $id_field = 'id';
                                    $with_break = false;
                                    $lang = '';
                                    $with_info = false;
                                    $style = 'width:150px;padding-left:5px';
                                    $class = 'inline_txt_any_table';
                                    $show_translation_opt = false;

                                    echo edit_text_in_any_table(
                                    $table,
                                    $field,
                                    $id,
                                    $id_field,
                                    $with_break,
                                    $lang,
                                    $with_info,
                                    $style,
                                    $class,
                                    $show_translation_opt = false,
                                    $this_value = '',
                                    $from_inside_loop = false,
                                    $with_page_reload = false
                                    )
                                    ?>

                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 20 ---------------}}
                        <div class="f_col col-12" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
                                                <pre><code>
$what = 'dashboard_settings_sidebar_minimized';
echo get_checkbox_div(
    $what, //the key in table 'diverses' in field 'div_what'
    $label_text = '', //label is only available if $with_panel == false
    $label_style = 'font-weight:bold; margin-right:6px; ',
    $with_panel = false, //wrap all in a box?
    $data_on = 'On',
    $data_off = 'Off',
    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
    $ax_response = false, //if true: a little tick appears for confirmation after change
    $ax_response_with_page_reload = false, //if true: page will be reloaded on change
    $with_tooltip = true, //always false if $with_panel == true
    $tt_class = 'tip', // tip (right) or tip_lu (left)
    $tt_width = '450px' //width of tooltip popup
)
                                                </code></pre>
                                    </div>

                                    <?php
                                    echo get_checkbox_div(
                                    $what = 'dashboard_settings_sidebar_minimized',
                                    $label_text = '',
                                    $label_style = 'font-weight:bold; margin-right:6px; ',
                                    $with_panel = false,
                                    $data_on = 'On',
                                    $data_off = 'Off',
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response = false,
                                    $ax_response_with_page_reload = true,
                                    $with_tooltip = true,
                                    $tt_class = 'tip',
                                    $tt_width = '450px'
                                    )
                                    ?>

                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 21 ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
                                                <pre><code>
$what = 'dashboard_settings_sidebar_minimized';
echo get_checkbox_div(
    $what, //the key in table 'diverses' in field 'div_what'
    $label_text = '', //label is only available if $with_panel == false
    $label_style = 'font-weight:bold; margin-right:6px; ',
    $with_panel = false, //wrap all in a box?
    $data_on = 'On',
    $data_off = 'Off',
    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
    $ax_response = false, //if true: a little tick appears for confirmation after change
    $ax_response_with_page_reload = false, //if true: page will be reloaded on change
    $with_tooltip = true, //always false if $with_panel == true
    $tt_class = 'tip', // tip (right) or tip_lu (left)
    $tt_width = '450px' //width of tooltip popup
)
                                                </code></pre>
                                    </div>

                                    <?php
                                    echo get_checkbox_div(
                                    $what = 'dashboard_settings_sidebar_minimized',
                                    $label_text = '',
                                    $label_style = 'font-weight:bold; margin-right:6px; ',
                                    $with_panel = false,
                                    $data_on = 'On',
                                    $data_off = 'Off',
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response = false,
                                    $ax_response_with_page_reload = true,
                                    $with_tooltip = true,
                                    $tt_class = 'tip',
                                    $tt_width = '450px'
                                    )
                                    ?>

                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 22 ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
                                                <pre><code>
$what = 'dashboard_settings_sidebar_minimized';
echo get_checkbox_div(
    $what, //the key in table 'diverses' in field 'div_what'
    $label_text = '', //label is only available if $with_panel == false
    $label_style = 'font-weight:bold; margin-right:6px; ',
    $with_panel = false, //wrap all in a box?
    $data_on = 'On',
    $data_off = 'Off',
    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
    $ax_response = false, //if true: a little tick appears for confirmation after change
    $ax_response_with_page_reload = false, //if true: page will be reloaded on change
    $with_tooltip = true, //always false if $with_panel == true
    $tt_class = 'tip', // tip (right) or tip_lu (left)
    $tt_width = '450px' //width of tooltip popup
)
                                                </code></pre>
                                    </div>

                                    <?php
                                    echo get_checkbox_div(
                                    $what = 'dashboard_settings_sidebar_minimized',
                                    $label_text = '',
                                    $label_style = 'font-weight:bold; margin-right:6px; ',
                                    $with_panel = false,
                                    $data_on = 'On',
                                    $data_off = 'Off',
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response = false,
                                    $ax_response_with_page_reload = true,
                                    $with_tooltip = true,
                                    $tt_class = 'tip',
                                    $tt_width = '450px'
                                    )
                                    ?>

                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 23 ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
                                                <pre><code>
$what = 'dashboard_settings_sidebar_minimized';
echo get_checkbox_div(
    $what, //the key in table 'diverses' in field 'div_what'
    $label_text = '', //label is only available if $with_panel == false
    $label_style = 'font-weight:bold; margin-right:6px; ',
    $with_panel = false, //wrap all in a box?
    $data_on = 'On',
    $data_off = 'Off',
    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
    $ax_response = false, //if true: a little tick appears for confirmation after change
    $ax_response_with_page_reload = false, //if true: page will be reloaded on change
    $with_tooltip = true, //always false if $with_panel == true
    $tt_class = 'tip', // tip (right) or tip_lu (left)
    $tt_width = '450px' //width of tooltip popup
)
                                                </code></pre>
                                    </div>

                                    <?php
                                    echo get_checkbox_div(
                                    $what = 'dashboard_settings_sidebar_minimized',
                                    $label_text = '',
                                    $label_style = 'font-weight:bold; margin-right:6px; ',
                                    $with_panel = false,
                                    $data_on = 'On',
                                    $data_off = 'Off',
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response = false,
                                    $ax_response_with_page_reload = true,
                                    $with_tooltip = true,
                                    $tt_class = 'tip',
                                    $tt_width = '450px'
                                    )
                                    ?>

                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}

                        {{----------- 24 ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            $t_key_editor_add_txt = $t_key.'_add_txt_editor';
                            create_dv($t_key_editor_add_txt,'',true);

                            $t_key_editor_top_txt = $t_key.'_top_txt_editor';
                            create_dv($t_key_editor_top_txt,'',true);
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo '<span style="color:#ccc;font-size:0.8em">'.$card_counter.'. </span>';

                                    echo __get_dv($t_key_header,'div_res');//div_res or div_res_long;
                                    echo get_edit_link_short($t_key_header,'font-size:0.8em');
                                    ?>




                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
                                        <div class="editable_top" style="">
                                            @if(is_dev())
                                                <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                                   data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                                   href="javascript:;">
                                                    <sup><i>edit</i></sup></a>
                                            @endif
                                            <?= __get_dv($t_key_editor_top_txt, 'div_res_long') ?>
                                        </div>
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">

                                    <div class="" style="margin: -4px 0 0px 0">
                                        <a style="" class="dimmed04"
                                           title="show/hide code"
                                           href="javascript:toggle('php_code_{{$t_key}}');">
                                            <i><b> PHP code</b></i></a>
                                        @if(is_dev())<span class="o">{{$t_key}}</span>@endif
                                    </div>
                                    <div id="php_code_{{$t_key}}" style="display:none;margin:9px 0 0 0">
                                                <pre><code>
$what = 'dashboard_settings_sidebar_minimized';
echo get_checkbox_div(
    $what, //the key in table 'diverses' in field 'div_what'
    $label_text = '', //label is only available if $with_panel == false
    $label_style = 'font-weight:bold; margin-right:6px; ',
    $with_panel = false, //wrap all in a box?
    $data_on = 'On',
    $data_off = 'Off',
    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
    $ax_response = false, //if true: a little tick appears for confirmation after change
    $ax_response_with_page_reload = false, //if true: page will be reloaded on change
    $with_tooltip = true, //always false if $with_panel == true
    $tt_class = 'tip', // tip (right) or tip_lu (left)
    $tt_width = '450px' //width of tooltip popup
)
                                                </code></pre>
                                    </div>

                                    <?php
                                    echo get_checkbox_div(
                                    $what = 'dashboard_settings_sidebar_minimized',
                                    $label_text = '',
                                    $label_style = 'font-weight:bold; margin-right:6px; ',
                                    $with_panel = false,
                                    $data_on = 'On',
                                    $data_off = 'Off',
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response = false,
                                    $ax_response_with_page_reload = true,
                                    $with_tooltip = true,
                                    $tt_class = 'tip',
                                    $tt_width = '450px'
                                    )
                                    ?>

                                    {{--edit & display additional text--}}
                                    <div>
                                        @if(is_dev())
                                            <a title="DEV: Zusatz-Text editieren in allen Sprachen" data-fancybox="" data-type="iframe" class="float-right"
                                               data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}" title="info-text"
                                               href="javascript:;">
                                                <sup><i>edit</i></sup></a>
                                        @endif
                                        <?= __get_dv($t_key_editor_add_txt, 'div_res_long') ?>
                                    </div>

                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--</div class="col-4">--}}


                    </div>{{--<div class="f_container">--}}


                </div>

                {{--#########   Panel 2    #####################--}}
                <div style="padding:0.2em 1.2em" class="tab-pane animated fadeIn" id="profile4" role="tabpanel" aria-expanded="false">
                    2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>

                {{--#########   Panel 3    #####################--}}
                <div style="padding:0.2em 1.2em" class="tab-pane animated fadeIn" id="messages4" role="tabpanel" aria-expanded="false">
                    3. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>

                {{--#########   Panel 4    #####################--}}
                <div style="padding:1.0em 1.2em" class="tab-pane animated fadeIn" id="config4" role="tabpanel" aria-expanded="false">

                    <div class="card-deck">
                        <div class="card">
                            {{--<img class="card-img-top" src="..." alt="Card image cap">--}}
                            <div class="card-body">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                        <div class="card">
                            {{--<img class="card-img-top" src="..." alt="Card image cap">--}}
                            <div class="card-body">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                        <div class="card">
                            {{--<img class="card-img-top" src="..." alt="Card image cap">--}}
                            <div class="card-body">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>

                        <div class="card">
                            {{--<img class="card-img-top" src="..." alt="Card image cap">--}}
                            <div class="card-body">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                        <div class="card">
                            {{--<img class="card-img-top" src="..." alt="Card image cap">--}}
                            <div class="card-body">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                        <div class="card">
                            {{--<img class="card-img-top" src="..." alt="Card image cap">--}}
                            <div class="card-body">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="height:10px"></div>
    </div>
@endsection

{{------ modals --------}}
@section('modals')
    <div style="margin-top:150px;" class="modal animated  zoomInUp" id="successModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-primary" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">edit title {{$t_key_header}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><?php
                        echo edit_text_in_any_table(
                        $table='diverses',
                        $field='div_res',
                        $id = $t_key_header,
                        $id_field = 'div_what',
                        $with_break = true,
                        $lang = '',
                        $with_info = false,
                        $style='font-size:1.2em;width:99%',
                        $class = 'inline_txt_any_table',
                        $show_translation_opt = false,
                        $this_value = get_dv($t_key_header),
                        $from_inside_loop = false,
                        $with_page_reload = true
                        )
                        ?></p>
                </div>
            </div>
        </div>
    </div>

{{--<div style="height:500px"></div>--}}

@endsection

{{------ scripts --------}}
@section('scripts')
@endsection

{{------ after scripts --------}}
@section('after-scripts')

    <script>
        var anz = <?php echo $card_counter ?> ;
        function show_all_cards(){
            if($('#show_all_cards_switch')) $('#show_all_cards_switch').hide();
            if($('#hide_all_cards_switch')) $('#hide_all_cards_switch').show();
            if($('#show_all_cards_link')) $('#show_all_cards_link').hide();
            if($('#hide_all_cards_link')) $('#hide_all_cards_link').show();
            for(i=1; i<=anz; i++){
                if($('#cont_settings_dashboard_' + i))  show('cont_settings_dashboard_' + i );
                if($('#cont_{{$this_page_name}}_' + i))  show('cont_{{$this_page_name}}_' + i );
                //$this_page_name
            }
        }
        function hide_all_cards(){
            if($('#hide_all_cards_switch')) $('#hide_all_cards_switch').hide();
            if($('#show_all_cards_switch')) $('#show_all_cards_switch').show();
            if($('#hide_all_cards_link')) $('#hide_all_cards_link').hide();
            if($('#show_all_cards_link')) $('#show_all_cards_link').show();
            for(i=1; i<=anz; i++){
                if($('#cont_settings_dashboard_' + i)) hide('cont_settings_dashboard_' + i );
                if($('#cont_{{$this_page_name}}_' + i))  hide('cont_{{$this_page_name}}_' + i );
            }
        }
    </script>

@endsection
