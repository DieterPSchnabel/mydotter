@extends('backend.layouts.app')
<?php
$this_page_name = 'settings_and_configuration';
$this_file_title = 'TEST ------------------ Settings & Konfiguration (Demo)';

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
    </style>
@endsection


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


@section('content')




    {{--a test/debug window on top of the page becomes visible if true--}}
    {{--use help->configuration->DEV-Configuaration for this page to make debug area available - the switch is_dev must be ON--}}




    <div class="card">
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
                    $label_style = 'margin-left:12px;font-weight:normal;margin-right:6px;font-size:0.7em',
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

    {{--############################  style="border:3px #c00 solid"  row 1####################################################--}}
    <div class="animated fadeIn" >
        <div class="" style="background:#eee;padding:1.0em;">

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
                        {{--################## ROW 1 ############################--}}
                        {{----------- Nix1  ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = $this_page_name.'_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            $t_key_header = $t_key.'_header';
                            create_dv($t_key_header,'Titel',true);
                            $t_key_editor_div = $t_key.'_inline_editor';
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">

                                    <?php
                                    echo get_dv($t_key_header);
                                    echo get_edit_link_short_toggler($t_key_editor_div,'font-size:0.8em');
                                    ?>
                                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#successModal">
                                        edit2
                                    </button>

                                    <div id="{{$t_key_editor_div}}" style="display:none;font-size:0.9em;padding:5px 0 0 5px ;background:#ffe;margin: 10px -8px 0 -8px;border:1px #ddd inset">
                                        <?php
                                        echo edit_text_in_any_table(
                                        $table='diverses',
                                        $field='div_res',
                                        $id = $t_key_header,
                                        $id_field = 'div_what',
                                        $with_break = true,
                                        $lang = '',
                                        $with_info = false,
                                        $style='font-size:1.0em;width:99%',
                                        $class = 'inline_txt_any_table',
                                        $show_translation_opt = false,
                                        $this_value = get_dv($t_key_header),
                                        $from_inside_loop = false,
                                        $with_page_reload = true
                                        )
                                        ?>
                                    </div>

























                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    @if($card_counter==1)
                                        <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none" class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                        <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                                            <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                                    @endif
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
    $with_panel = true, //wrap all in a green box?
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
                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--<div class="col-4">--}}



                        {{----------- Nix2  ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = 'settings_dashboard_'.$card_counter;
                            $t_title = 'Admin-Dashboard '.$card_counter;
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">
                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>
                                    {{$t_title}}

                                    @if(is_dev())<span class="dev_only" style="font-weight:normal;margin-left:24px">{{$t_key}}</span>@endif
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">
                                    <?php
                                    /*
                                    $what = 'actionbox_test_action';
                                    echo get_actionbox_div(
                                    $what,
                                    $axfe_id = '999999',
                                    $button_title = 'Diese Aktion jetzt ausführen',
                                    $with_panel = true,
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response_with_page_reload = false,
                                    $with_tooltip = true, //always false if $with_panel = true
                                    $tt_class = 'tip',
                                    $tt_width = '400px'
                                    )*/

                                    echo get_checkbox_any_table(
                                    $table= 'diverses',
                                    $field = 'div_res',
                                    $id = 'is_dev',
                                    $id_field ='div_what',
                                    $with_comment=false,
                                    $tt_hint_key = 'is_dev',
                                    $label_text = 'is Dev',
                                    $with_panel = false,
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

                                    /*$what = 'is_dev';
                                    $label_text = 'Bitte wählen:';
                                    $with_tooltip = true;
                                    $ax_response = true;

                                    echo get_checkbox_div(
                                    $what,
                                    $label_text = '',
                                    $label_style = 'font-weight:bold; margin-right:6px; ',
                                    $with_panel = true,
                                    $data_on = 'On',
                                    $data_off = 'Off',
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response = false,
                                    $ax_response_with_page_reload = false,
                                    $with_tooltip = true,
                                    $tt_class = 'tip',
                                    $tt_width = '450px'
                                    )*/
                                    ?>
                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--<div class="col-4">--}}
                        {{----------- Nix3  ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = 'settings_dashboard_'.$card_counter;
                            $t_title = 'Admin-Dashboard';
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">
                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                                    {{$t_title}}

                                    @if(is_dev())<span class="dev_only" style="font-weight:normal;margin-left:24px">{{$t_key}}</span>@endif
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">
                                    <?php

                                    $what = 'actionbox_test_action';
                                    echo get_actionbox_div(
                                    $what,
                                    $axfe_id = '999999',
                                    $button_title = 'Diese Aktion jetzt ausführen',
                                    $with_panel = true,
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response_with_page_reload = false,
                                    $with_tooltip = true, //always false if $with_panel = true
                                    $tt_class = 'tip',
                                    $tt_width = '400px'
                                    )
                                    /*
                                    echo get_checkbox_any_table(
                                       $table= 'diverses',
                                       $field = 'div_res',
                                       $id = 'is_dev',
                                       $id_field ='div_what',
                                       $with_comment=false,
                                       $tt_hint_key = 'is_dev',
                                       $label_text = 'is Dev',
                                       $with_panel = false,
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
                                    );*/

                                    /*$what = 'is_dev';
                                    $label_text = 'Bitte wählen:';
                                    $with_tooltip = true;
                                    $ax_response = true;

                                    echo get_checkbox_div(
                                    $what,
                                    $label_text = '',
                                    $label_style = 'font-weight:bold; margin-right:6px; ',
                                    $with_panel = true,
                                    $data_on = 'On',
                                    $data_off = 'Off',
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response = false,
                                    $ax_response_with_page_reload = false,
                                    $with_tooltip = true,
                                    $tt_class = 'tip',
                                    $tt_width = '450px'
                                    )*/
                                    ?>
                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--<div class="col-4">--}}
                        {{--</div>--}}{{--<div class="row">--}}

                        {{--################## ROW 2 ############################--}}
                        {{--<div class="row">--}}
                        {{----------- Nix4  ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = 'settings_dashboard_'.$card_counter;
                            $t_title = 'Admin-Dashboard';
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">
                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>
                                    {{$t_title}}

                                    @if(is_dev())<span class="dev_only" style="font-weight:normal;margin-left:24px">{{$t_key}}</span>@endif
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">
                                    <?php
                                    /*
                                    $what = 'actionbox_test_action';
                                    echo get_actionbox_div(
                                    $what,
                                    $axfe_id = '999999',
                                    $button_title = 'Diese Aktion jetzt ausführen',
                                    $with_panel = true,
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response_with_page_reload = false,
                                    $with_tooltip = true, //always false if $with_panel = true
                                    $tt_class = 'tip',
                                    $tt_width = '400px'
                                    )*/
                                    /*
                                    echo get_checkbox_any_table(
                                       $table= 'diverses',
                                       $field = 'div_res',
                                       $id = 'is_dev',
                                       $id_field ='div_what',
                                       $with_comment=false,
                                       $tt_hint_key = 'is_dev',
                                       $label_text = 'is Dev',
                                       $with_panel = false,
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
                                    );*/

                                    $what = 'is_dev';
                                    $label_text = 'Bitte wählen:';
                                    $with_tooltip = true;
                                    $ax_response = true;

                                    echo get_checkbox_div(
                                    $what,
                                    $label_text = '',
                                    $label_style = 'font-weight:bold; margin-right:6px; ',
                                    $with_panel = true,
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
                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--<div class="col-4">--}}
                        {{----------- Nix5  ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = 'settings_dashboard_'.$card_counter;
                            $t_title = 'Admin-Dashboard';
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">
                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>
                                    {{$t_title}}

                                    @if(is_dev())<span class="dev_only" style="font-weight:normal;margin-left:24px">{{$t_key}}</span>@endif
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">
                                    <?php
                                    /*
                                    $what = 'actionbox_test_action';
                                    echo get_actionbox_div(
                                    $what,
                                    $axfe_id = '999999',
                                    $button_title = 'Diese Aktion jetzt ausführen',
                                    $with_panel = true,
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response_with_page_reload = false,
                                    $with_tooltip = true, //always false if $with_panel = true
                                    $tt_class = 'tip',
                                    $tt_width = '400px'
                                    )*/
                                    /*
                                    echo get_checkbox_any_table(
                                       $table= 'diverses',
                                       $field = 'div_res',
                                       $id = 'is_dev',
                                       $id_field ='div_what',
                                       $with_comment=false,
                                       $tt_hint_key = 'is_dev',
                                       $label_text = 'is Dev',
                                       $with_panel = false,
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
                                    );*/

                                    $what = 'is_dev';
                                    $label_text = 'Bitte wählen:';
                                    $with_tooltip = true;
                                    $ax_response = true;

                                    echo get_checkbox_div(
                                    $what,
                                    $label_text = '',
                                    $label_style = 'font-weight:bold; margin-right:6px; ',
                                    $with_panel = true,
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
                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--<div class="col-4">--}}
                        {{----------- Nix6  ---------------}}
                        <div class="f_col" style="padding:5px">
                            <?php
                            $card_counter++;
                            $t_key = 'settings_dashboard_'.$card_counter;
                            $t_title = 'Admin-Dashboard';
                            ?>
                            <div class="card" style="margin:0">
                                <div class="card-header h5" style="padding:5px 10px">
                                    <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04" href="javascript:toggle('cont_{{$t_key}}','slide')">
                                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>
                                    {{$t_title}}

                                    @if(is_dev())<span class="dev_only" style="font-weight:normal;margin-left:24px">{{$t_key}}</span>@endif
                                </div>
                                <div class="card-block {{--dev-longtxt--}}" id="cont_{{$t_key}}" style="padding:5px 8px;display:none">
                                    <?php
                                    /*
                                    $what = 'actionbox_test_action';
                                    echo get_actionbox_div(
                                    $what,
                                    $axfe_id = '999999',
                                    $button_title = 'Diese Aktion jetzt ausführen',
                                    $with_panel = true,
                                    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                    $ax_response_with_page_reload = false,
                                    $with_tooltip = true, //always false if $with_panel = true
                                    $tt_class = 'tip',
                                    $tt_width = '400px'
                                    )*/
                                    /*
                                    echo get_checkbox_any_table(
                                       $table= 'diverses',
                                       $field = 'div_res',
                                       $id = 'is_dev',
                                       $id_field ='div_what',
                                       $with_comment=false,
                                       $tt_hint_key = 'is_dev',
                                       $label_text = 'is Dev',
                                       $with_panel = false,
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
                                    );*/

                                    $what = 'is_dev';
                                    $label_text = 'Bitte wählen:';
                                    $with_tooltip = true;
                                    $ax_response = true;

                                    echo get_checkbox_div(
                                    $what,
                                    $label_text = '',
                                    $label_style = 'font-weight:bold; margin-right:6px; ',
                                    $with_panel = true,
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
                                </div>
                            </div>{{--<div class="card">--}}
                        </div>{{--<div class="col-4">--}}
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

        <div style="height:800px"></div>
    </div>


@endsection


@section('scripts')
@endsection

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
