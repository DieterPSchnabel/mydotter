@extends('backend.layouts.app')
<?php
$has_help = true;
$has_help_hints = true;
$has_help_help = true;
$has_help_related = true;
$has_help_config = true;

$has_table_search = true;
$has_table_export = true;
$has_table_filter = true;
$has_items_per_page = true;

$has_action_show = true;
$page_debug_show = false;

$sortables_arr = get_columns_from_table_sortable('countries',$as_array=true);

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
$this_table_name = 'countries';

$countries = $data['countries'];
$page_appends = $data['page_appends'];
?>
@section('content')

@if($page_debug_show)
<div style="padding:12px">
<?php
 //ec('$page_appends : '. print_r($page_appends));
 //ec('$data: '.json_encode($data));
     echo get_columns_from_table('countries');
     echo('<hr>');
     $xarr = get_columns_from_table_text_only('countries',true); //true for as_array
     foreach ($xarr as $x){
         echo $x.' | ';
     }
?>
</div>
@endif

@if($has_help)
    @include('backend.larapacks.help.help-block')
@endif

<div class="card">
{{------------ HEAD 1. ROW ------------}}
<div style="position:absolute;font-size:1em;top:6px;right:410px;text-align:text-center">
{!! $countries->appends($page_appends)->render() !!}</div>
<h3 class="card-header" style="border-bottom:none">
    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">

         <span class="dimmed04 float-right" style="margin-right:30px;vertical-align:top;font-size:0.55em">
           <b>{{$countries->firstItem()}}</b> - <b>{{$countries->lastItem()}}</b> / <b>{{$countries->total()}}</b> records</span>

        <a class="btn btn-primary ml-1" role="button" href="{!! route('admin.countries.create') !!}">neu erfassen</a>
        @if($has_help)
            {{------------ TABLE HILFE ------------}}
            <a style="margin-left:12px" class="btn btn-default" href="javascript:toggle('help_block','slide')" role="button">
                <i class="icon-support"></i> Hilfe</a>
        @endif
    </div>
    Countries
    @if(isset($_GET['mysearch']) or isset($_GET['myid']) or isset($_GET['filter']))
        @if( isset($_GET['mysearch']) )
            <span style="margin-left:60px;font-size:0.6em;font-weight:normal"><b>{{$countries->total()}}</b>
                @if ($countries->total()==1)
                    Ergebnis für Suche nach:
                @else
                    Ergebnisse für Suche nach:
                @endif
                <b><mark>{{urldecode($_GET['mysearch'])}}</mark></b>
            </span>
        @endif
        <span style="margin-left:40px;font-size:0.6em;font-weight:normal">
        <a class="btn btn-default" href="{!! route('admin.countries.index') !!}">wieder alle Daten anzeigen</a></span>
    @endif
</h3>
{{-- / END HEAD  1. ROW ------------}}


{{------------ HEAD 2. ROW ------------}}
<div style="background-color: #f0f3f5;padding-top:4px;padding-bottom:4px;">
    <div class="input-group float-left" style="margin-top:0px;">
        {{------------ SEARCH ------------}}
        @if($has_table_search)
            <form id="mysearch_form" method="get" action="{{ route('admin.countries.index') }}" style="margin:0 50px 3px 18px;">
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
            <div class="btn-group" style="margin:0 30px 3px 0px;">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tabelle exportieren
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ URL::to('admin/countries/export/xls') }}">Excel.xls</a>
                        <a class="dropdown-item" href="{{ URL::to('admin/countries/export/xlsx') }}">Excel.xlsx</a>
                        <a class="dropdown-item" href="{{ URL::to('admin/countries/export/csv') }}">Excel.csv</a>
                        <a class="dropdown-item" href="{{ URL::to('admin/countries/export/pdf') }}">PDF</a>
                    </div>
                </div>
            </div>
        @endif

        {{------------ TABLE FILTER ------------}}
        @if($has_table_filter)
            <div class="btn-group" style="margin:0 30px 3px 0;">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tabelle filtern
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{!! route('admin.countries.index') !!}?filter=dummy">nur mit ID <= 30</a>
                        <a class="dropdown-item" href="{!! route('admin.countries.index') !!}">alle zeigen</a>
                    </div>
                </div>
            </div>
        @endif

        {{------------ DISPLAY PER PAGE ------------}}
        @if($has_items_per_page)
            <?php
            $currently_selected = get_dv('countries_disp_per_page');
            ?>
            <div style="margin-left:30px;margin-bottom:-15px;margin-top:4px">
                <span style="display:inline-block;margin:0 6px 3px 0;vertical-align:text-top">Records pro Seite:</span>
                <select class="__custom-select" style="margin:0 0 3px 6px;"
                        onchange="set_dv(this.options[selectedIndex].value)">
                    {!! get_options_for_records_per_page($countries->total(),$currently_selected) !!}
                </select>
                <?php $zuf = rand_str(); ?>
                <span id="{!! $zuf !!}_conf" style="width:25px;margin-left:8px"></span>
                <script>
                    function set_dv(anz) {
                        ax_jq('/axfe','id=106_'+anz+'_xyx_'+'countries_disp_per_page','{!! $zuf !!}'+'_conf');
                    }
                </script>
            </div>
        @endif
    </div>
</div>
{{-- / END HEAD  2. ROW ------------}}

    <div class="card-body" style="padding:0;border-top:none;overflow:auto">
        @include('flash::message')

        {{--------------  TABLE  -------------------}}
        @include('backend.countries.table')
        {{-------------- / END TABLE  -------------------}}

        {{------------ UNDER THE TABLE ROW 1 ------------}}
        <div class="text-left" style="background:#EFF2F4;padding:8px 0 0 35px;border-top:1px #c2cfd6 solid">
        <span class="dimmed04 float-right" style="margin:12px;vertical-align:top">
             <b>{{$countries->firstItem()}}</b> - <b>{{$countries->lastItem()}}</b> / <b>{{$countries->total()}}</b> records
        </span>

        {!! $countries->appends($page_appends)->render() !!}

        </div>

        {{------------ UNDER THE TABLE ROW 2 ------------}}
        <div class="card-footer" style="border-top:none;margin-top:-16px">
            <a class="btn btn-primary" role="button" href="{!! route('admin.countries.create') !!}">Add new</a>

            @if(isset($_GET['mysearch']) or isset($_GET['myid']) or isset($_GET['filter']) )
                <span style="margin-left:40px;font-size:1.1em"><a class="btn btn-default" href="{!! route('admin.countries.index') !!}">wieder alle Daten anzeigen</a></span>
            @endif
            <a href="{{url()->previous()}}" class="btn btn-default ml-4 float-right " role="button" >Abbruch und zurück</a>
        </div>
    </div>
</div>
@endsection

