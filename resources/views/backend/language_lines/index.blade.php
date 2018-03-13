@extends('backend.layouts.app')
<?php
$this_table_name = 'language_lines';
$cc_table_name = camel_case($this_table_name);

//the hidden help window - press help to view it
$has_help = true;
$has_help_hints = true;
$has_help_help = true;
$has_help_related = true;
$has_help_config = true;

//the available elements in the row 2 above the table - configurable

// init each (key/value pair) one time with value = 1 (true) - only if not exists - later use the switches
create_dv($this_table_name.'_table_has_table_search',1,true);
create_dv($this_table_name.'_table_has_table_export',1,true);
create_dv($this_table_name.'_table_has_table_filter',1,true);
create_dv($this_table_name.'_table_has_cols_filter',1,true);
create_dv($this_table_name.'_table_has_items_per_page',1,true);

$has_table_search = get_dv($this_table_name.'_table_has_table_search');
$has_table_export = get_dv($this_table_name.'_table_has_table_export');
$has_table_filter = get_dv($this_table_name.'_table_has_table_filter');
$has_cols_filter = get_dv($this_table_name.'_table_has_cols_filter');
$has_items_per_page = get_dv($this_table_name.'_table_has_items_per_page');

//do we show these buttons? should depend on users role and privileges
$has_action_show = true;
$has_action_edit = true;
$has_action_delete = true;
$has_action_ceate_new = true;

/*reads all cols from table*/
$sortables_arr = get_columns_from_table_sortable($this_table_name,$as_array=true);
$sortables_str = implode(',',$sortables_arr);

create_dv($this_table_name.'_disp_cols_arr', $sortables_str, true, 'div_res_long');

// only these columns will been displayed in table - change as you wish in widget - requires $has_cols_filter = true; see above to modify
$display_cols_str = get_dv($this_table_name.'_disp_cols_arr', 'div_res_long');
$display_cols_arr = explode(',',$display_cols_str);

if(  isset($_GET['mysearch'])  ) {
    $page_para = 'mysearch='.$_GET['mysearch'];
}else{
    $page_para = '';
}
if(  isset($_GET['dir'])  ) {
    $dir = 'dir='.$_GET['dir'];
}else{
    $dir = '';
}
if(  isset($_GET['order'])  ) {
    $order = 'order='.$_GET['order'];
}else{
    $order = '';
}
$curr_dir = $dir;


/*$languages = $data[$this_table_name];*/
$dataset = $data[$cc_table_name];

$page_appends = $data['page_appends'];
?>

@section('title')
    {!! ucfirst($this_table_name) !!}
@endsection

@section('page-header')
    <div class="text-right dimmed04" style="margin:-6px 12px 6px 12px;color:#123;">
        <?php
        create_dv($this_table_name.'_table_top_hint');
        echo get_dv_translation($this_table_name.'_table_top_hint');

        $what = $this_table_name.'_table_top_hint';
        $class="tip_lu";  //tip or tip_lu
        $width='400px';
        $style='margin-left:5px';
        $icon='';
        echo tooltip($what,$class, $width,  $style, $icon);
        ?>
    </div>
@endsection

@section('content')

@if(get_dv($this_table_name.'_table_display_debug_area'))
    <div style="padding:12px;background:#fffff6;border:1px #ccc solid">
        <a style="margin:-18px -18px 0 0;" class="float-right" href="javascript:toggle('debug_inner','slide')"><i
                    class="fa fa-times-circle fa-2x" aria-hidden="true"></i></a>

        <?php
        echo get_checkbox_any_table(
            $table= 'diverses',
            $field = 'div_res',
            $id = $this_table_name.'_table_display_debug_area',
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
        {{--#####################  Debug & Test   ################################################--}}
        <div id="debug_inner">
            <span class="float-right" style="color:#abc;font-size:1.2em;font-weight:bold">test & debug</span>
            <?php
            //add your test-code here
            //only for debug purposes - default: $page_debug_show = false
            //ec('$data: '.json_encode($data));

            $t_key = 'is_dev';
            $session_lang_code = session_lang_code();
            $hint_txt = get_dv($t_key, 'div_res_'.$session_lang_code);
            //echo print_ar($hint_txt);

            /*echo 'all cols:<br>';
            echo get_columns_from_table($this_table_name);
            echo('<hr>');
            echo 'only text-cols: &nbsp; &nbsp;  &nbsp;  ';
            $xarr = get_columns_from_table_text_only($this_table_name, true); //true = as_array
            foreach ($xarr as $x) {
                echo $x . ' | ';
            }*/
                //ec(__('lfm.nav-back'));
            ?>
        </div>
    </div>
@endif

@if($has_help)
    <?php
    $source = base_path().'\resources\views\backend\admintests\help\template_help-block.blade.php';
    $dest = base_path().'/resources/views/backend/'.$this_table_name.'/help/help-block.blade.php';
    if (!file_exists($dest) and file_exists($source)   ){
        $path = pathinfo($dest);
        if (!file_exists($path['dirname'])) {
            mkdir($path['dirname'], 0777, true);
        }
        if(copy($source, $dest)) ec('created: '.$dest);
    }
    ?>
    @include('backend.'.$this_table_name.'.help.help-block')
@endif

<div class="card">
{{------------ HEAD 1. ROW ------------}}
<div class="card-header" style="border-bottom:none">

    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
        @if($has_action_ceate_new)
        <a class="btn btn-primary ml-1" role="button" href="{!! route('admin.'.$cc_table_name.'.create') !!}">neu erfassen</a>
        @endif

        @if(get_dv($this_table_name.'_table_has_help'))
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
            @if(is_dev())
                <a style="margin-right:2px;margin-left:9px" class="btn btn-success float-right" data-fancybox
                   data-type="iframe"
                   data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$this_table_name}}_notes&title={{$this_table_name}}_dev_notes"
                   href="javascript:;">
                    <i class="fa fa-pencil fa-sm-text-shadow"></i> Dev Notes </a>
            @endif
    </div>

    <div class="table-header-model-name">{{ ucfirst($this_table_name)}}</div>

    <div class="" style="display:inline-block;margin-bottom:-24px;margin-top:-6px;padding-bottom:0">
        {!! $dataset->appends($page_appends)->render() !!}</div>

    <span class="" style="margin-left:30px;font-size:0.9em;color:#aaa">
      <b>{{$dataset->firstItem()}}</b> - <b>{{$dataset->lastItem()}}</b> / <b>{{$dataset->total()}}</b> records
    </span>

    @if($display_cols_str<>$sortables_str)
    <span style="margin-left:30px;font-size:0.9em;color:#bbb;font-weight:normal;">Einige Spalten sind ausgeblendet!</span>
    @endif

    @if(isset($_GET['mysearch']) or isset($_GET['myid']) or isset($_GET['filter']))
        @if( isset($_GET['mysearch']) )
            <span style="margin-left:60px;font-size:0.9em;font-weight:normal"><b>{{$dataset->total()}}</b>
                @if ($dataset->total()==1)
                    Ergebnis für Suche nach:
                @else
                    Ergebnisse für Suche nach:
                @endif
                <b><mark>{{urldecode($_GET['mysearch'])}}</mark></b>
            </span>
        @endif
        <span style="margin-left:40px;font-size:0.6em;font-weight:normal">
        <a class="btn btn-outline-success" href="{!! route('admin.'.$cc_table_name.'.index') !!}">Einige Records sind ausgefiltert, wieder alle Daten anzeigen!</a></span>
    @endif
</div>
{{-- / END HEAD  1. ROW ------------}}


{{------------ HEAD 2. ROW ------------}}
<div style="background-color: #f0f3f5;padding-top:4px;padding-bottom:0;">
    <div class="input-group float-left" style="padding-bottom:0;margin-top:0px;">
        {{------------ SEARCH ------------}}
        @if($has_table_search)
            <form id="mysearch_form" method="get" action="{{ route('admin.'.$cc_table_name.'.index') }}" style="margin:0 50px 3px 18px;">
                <div class="input-group" >
                    @if( isset($_GET['mysearch']) )
                        <input style="" name="mysearch" id="mysearch" type="text" class="form-control " placeholder="Suche nach..." value="{{$_GET['mysearch']}}" autofocus>
                    @else
                        <input style="" name="mysearch" id="mysearch" type="text" class="form-control " placeholder="Suche nach...">
                    @endif
                    <span class="input-group-btn">
                        <button onClick='$("#mysearch_form").submit()' class="btn btn-default" type="button"
                            data-toggle="tooltip" data-placement="right" title="" data-original-title="Suchtext eingeben und hier klicken oder Enter (auf der Tastatur)">
                        <i class="fa fa-search fa-sm-text-shadow" aria-hidden="true"></i></button>
                    </span>
                </div>
            </form>
        @endif

        {{------------ TABLE EXPORT ------------}}
        @if($has_table_export)
            <div class="btn-group" style="margin:0 30px 3px 0px;margin-bottom:-15px;">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tabelle exportieren
                    </button>
                    <?php
                    $what = 'table_export_hint';
                    $class="tip";
                    $width='400px';
                    $style='margin-left:-5px';
                    $icon='';
                    echo tooltip($what,$class, $width,  $style, $icon);
                    ?>
                    <div style="margin-top:37px" class="dropdown-menu animated slideInDown" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ URL::to('admin/'.$cc_table_name.'/export/xls') }}">Excel.xls</a>
                        <a class="dropdown-item" href="{{ URL::to('admin/'.$cc_table_name.'/export/xlsx') }}">Excel.xlsx</a>
                        <a class="dropdown-item" href="{{ URL::to('admin/'.$cc_table_name.'/export/csv') }}">Excel.csv</a>
                        <a class="dropdown-item" href="{{ URL::to('admin/'.$cc_table_name.'/export/pdf') }}">PDF</a>
                    </div>
                </div>
            </div>
        @endif

        {{------------ TABLE FILTER ------------}}
        @if($has_table_filter)
            <div class="btn-group" style="margin:0 30px 3px 0;margin-bottom:-15px;">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tabelle filtern
                    </button>
                    <?php
                    $what = 'table_filter_hint';
                    $class="tip";
                    $width='400px';
                    $style='margin-left:-5px';
                    $icon='';
                    echo tooltip($what,$class, $width,  $style, $icon);
                    ?>
                    <div style="margin-top:37px" class="dropdown-menu animated slideInDown" aria-labelledby="dropdownMenuButton">
                        {{--create your own filters in controller --}}
                        <a class="dropdown-item" href="{!! route('admin.'.$cc_table_name.'.index') !!}?filter=dummy">

                            Show only languages that are<br>
                            activated in languages-table<br>
                            that have missing translations. ?????</a>
                        <a class="dropdown-item" href="javascript:show_only_activated_langs('{{$this_table_name}}')">

                            Show only languages that are<br>
                            activated in languages-table.<br>
                            (column-filter)
                        </a>

                        <a class="dropdown-item" href="{!! route('admin.'.$cc_table_name.'.index') !!}">alle zeigen</a>
                    </div>
                </div>
            </div>
        @endif

        {{------------ TABLE COLUMNS FILTER ------------}}
        {{--or deactivate display of columns-filter completly - click help for settings --}}
        @if($has_cols_filter)
            <div class="btn-group" style="margin:0 30px 0 0;margin-bottom:-15px;">
                <div class="dropdown" style="">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Spalten ausblenden
                    </button>
                    <?php
                    $what = 'table_display_cols_hint';
                    $class="tip";
                    $width='400px';
                    $style='margin-left:-5px';
                    $icon='';
                    echo tooltip($what, $class, $width, $style, $icon);
                    ?>
                    <div style="margin-top:37px" class="dropdown-menu animated slideInDown" aria-labelledby="dropdownMenuButton">
                        <div>
                            <a href="javascript:display_all_cols('{{$this_table_name}}')"><button class="btn btn-link btn-sm">show all</button></a>
                            <a href="javascript:hide_all_cols('{{$this_table_name}}')"><button class="btn btn-link btn-sm">hide all</button></a>
                            <?php
                            $what = 'table_display_cols_hint';
                            $class="tip";
                            $width='400px';
                            $style='margin-left: 5px';
                            $icon='';
                            echo tooltip($what, $class, $width, $style, $icon);
                            ?>
                            <span id="{{$this_table_name}}_display_all_conf" style="margin-left:6px;width:30px"></span>
                        </div>
                        <form id="tab_cols">
                            <div class="card-footer text-center" style="
                            background:#f9f9f9;border:none;">
                                <input type="hidden" name="table_name" value="{{$this_table_name}}" />
                                <button type="submit" class="btn btn-primary btn-sm">Speichern und Reload</button>
                                <span id="{{$this_table_name}}_get_cols_conf" style="margin-left:6px;width:30px"></span>
                            </div>

                            <div class="card" style="padding-bottom:0;margin-bottom:0;background:#fff">
                                <div class="card-content " style="width:200px">
                                    <ul style="list-style-type: none;margin:2px 3px;padding:0;line-height:240%;background:#f9f9f9">
                                        <?php
                                        $cols_arr = get_columns_from_table_sortable($this_table_name,$as_array=true);
                                        foreach ($cols_arr as $col) {
                                            echo '<li class="hide_cols">';
                                            $checked='';
                                            if(strstr($display_cols_str,$col)){
                                                $checked='checked';
                                            }
                                            echo '<label class="switch switch-text switch-pill switch-success switch-sm float-right" style="margin-top:6px">
                                                <input name="'.$col.'" type="checkbox" class="switch-input" '.$checked.'>
                                                <span class="switch-label" data-on="On" data-off="Off"></span>
                                                <span class="switch-handle"></span>
                                                </label>';
                                            echo '<span>'.blurb($col, $maxChars = 22, $suffix = '...', $br = false).'</span>';
                                            echo '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="card-footer text-center" style="background:#f9f9f9;border:none">
                                    <input type="hidden" name="table_name" value="{{$this_table_name}}" />
                                    <button type="submit" class="btn btn-primary btn-sm">Speichern und Reload</button>
                                    <span id="{{$this_table_name}}_get_cols_conf" style="margin-left:6px;width:30px"></span>
                                </div>
                            </div>
                        </form>
                        <div><a href="javascript:display_all_cols('{{$this_table_name}}')"><button class="btn btn-link btn-sm">show all</button></a>

                            <a href="javascript:hide_all_cols('{{$this_table_name}}')"><button class="btn btn-link btn-sm">hide all</button></a>
                            <span id="{{$this_table_name}}_display_all_conf" style="margin-left:6px;width:30px"></span></div>
                    </div>
                </div>
            </div>
        @endif

        {{------------ DISPLAY PER PAGE ------------}}
        @if($has_items_per_page)
            <?php
            $currently_selected = get_dv($this_table_name.'_disp_per_page');
            ?>
            <div style="margin-left:30px;margin-bottom:-15px;margin-top:4px">
                <span style="display:inline-block;margin:0 6px 3px 0;vertical-align:text-top;">Records pro Seite:</span>
                <select class="__custom-select" style="margin:0 0 3px 6px;"
                        onchange="set_dv(this.options[selectedIndex].value)">
                    {!! get_options_for_records_per_page($dataset->total(),$currently_selected) !!}
                </select>
                <?php $zuf = rand_str(); ?>
                <span id="{!! $zuf !!}_conf" style="width:25px;margin-left:8px"></span>
                <script>
                    function set_dv(anz) {
                        ax_jq('/axfe','id=106_'+anz+'_xyx_'+'{{$cc_table_name}}_disp_per_page','{!! $zuf !!}'+'_conf');
                    }
                </script>
            </div>
        @endif

        <?php
        echo get_checkbox_any_table(
            $table= 'diverses',
            $field = 'div_res',
            $id = $this_table_name.'_make_translations_editable',
            $id_field ='div_what',
            $with_comment=false,
            $tt_hint_key = 'is_dev',
            $label_text = "Texte editierbar anzeigen?",
            $with_panel = false, //if with panel -> no tooltip - for text is displayed in panel
            $ax_response = true,
            $input_style= '',
            $label_style='margin-left:24px;margin-right:12px;margin-top:6px' ,
            $with_tooltip = true,
            $tt_class = 'tip_lu', //tip or tip_lu
            $tt_width = '400px',
            $with_page_reload = true,
            $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
            $from_inside_loop = false, // lookup for current value if set to false
            $as_switch = true, //only checkbox or switch?
            $switch_size = 'no' //xs, sm, no, lg
        );

        $display_translations_editable = get_dv($this_table_name.'_make_translations_editable');
        ?>

        {{------------ Open Languages ------------}}
        <div class="btn-group ml-10" style="margin:0 30px 3px 0;margin-bottom:-15px;">
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    open Languages
                </button>
                <?php
                $what = 'table_open_languages_hint';
                $class="tip_lu";
                $width='400px';
                $style='margin-left:-5px';
                $icon='';
                echo tooltip($what,$class, $width,  $style, $icon);
                ?>
                <div style="margin-top:37px" class="dropdown-menu animated slideInDown" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" data-fancybox data-type="iframe"
                       data-src="{{url('admin/languages')}}"
                       href="javascript:;">in Popup {!! get_popup_icon($style='margin-left:4px;font-size:0.8em;font-weight:normal') !!}</a>

                    {!! link_to_route('admin.languages.index','goto Languages-Table',[],[ 'target="_blank"', 'class="dropdown-item"']) !!}
                </div>
            </div>
        </div>


    </div>
</div>
{{-- / END HEAD  2. ROW ------------}}

    <div class="card-body" style="padding:0;border-top:none;overflow:auto">
        @include('flash::message')

        {{--------------  TABLE  -------------------}}
        @include('backend.'.$this_table_name.'.table')
        {{-------------- / END TABLE  -------------------}}

        {{------------ UNDER THE TABLE ROW ------------}}

        <div class="round8" style="margin:-8px 7px 0 7px;height:53px;padding:8px 25px 8px 25px;background:#EFF2F4;opacity:1">
            <span class="float-right">
            <div class="" style="display:inline-block;">
                {!! $dataset->appends($page_appends)->render() !!}</div>
            <span class="dimmed04" style="margin-left:30px;">
             <b>{{$dataset->firstItem()}}</b> - <b>{{$dataset->lastItem()}}</b> / <b>{{$dataset->total()}}</b> records</span>
            </span>

            <span class="float-left">
                @if($has_action_ceate_new)
                    <a class="btn btn-primary" role="button" href="{!! route('admin.'.$cc_table_name.'.create') !!}">neu erfassen</a>
                @endif

                @if(isset($_GET['mysearch']) or isset($_GET['myid']) or isset($_GET['filter']) )
                    <span style="margin-left:40px;font-size:1.0em"><a class="btn btn-outline-success" href="{!! route('admin.'.$cc_table_name.'.index') !!}">Einige Records sind ausgefiltert, wieder alle Daten anzeigen!</a></span>
                @endif
                <a href="{{url()->previous()}}" class="btn btn-default ml-4 " role="button" >Abbruch und zurück</a>
            </span>
        </div>

    </div>
</div>
@endsection

