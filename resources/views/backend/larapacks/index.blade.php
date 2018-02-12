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

$sortables_arr = array('id','tag1','tag2','tag3','important','install_str','git_url','doc_url','is_installed','pt_title','pt_link');


if(  isset($_GET['mysearch'])  ) {
    $page_para = 'mysearch='.$_GET['mysearch'];
}else{
    $page_para = '';
}

$page_debug = false;
?>
@section('page-header')
    {{--HELP-BLOCK--}}
    @if($has_help)
        {{-- ---------------------- INCLUDE help-block -------------------- --}}
    @include('backend.larapacks.help.help-block')
    @endif
    {{-- / END HELP-BLOCK--}}
@endsection

@section('meta')
{{--<!-- nixxxxxxxxxxxxx meta -->--}}
@endsection

@section('before-styles-end')
    {{--<!-- nixxxxxxxxxxxxx before-styles-end -->--}}
@endsection

@section('content')

    @if($page_debug)
    <div id="nix1_wrapper">
        <div><a href="javascript:toggle('nix1','slide')">weg</a></div>
    <div id="nix1" class="nix" style="padding:12px ">

        <?php
        /*    $table_name = 'larapacks';
                $columns = DB::select('show columns from ' . $table_name);
                foreach ($columns as $value) {
                    echo "'" . $value->Field . "' => '" . $value->Type . "|" . ( $value->Null == "NO" ? 'required' : '' ) ."', <br/>" ;
                }*/
        echo get_columns_from_table('larapacks');
        echo('<hr>');
        //echo print_r(get_columns_from_table_text_only('llands',true));
        $xarr = get_columns_from_table_text_only('larapacks',true); //true for as_array
        foreach ($xarr as $x){
            echo $x.' ';
        }
        ?>
    </div>
    </div>
    @endif

        <div class="card">
            {{------------ HEAD 1. ROW ------------}}
            @include('backend.larapacks.table_head_row1')
            {{------------ HEAD 2. ROW ------------}}
            @include('backend.larapacks.table_head_row2')
            {{------------ TABLE BEGIN ------------}}
            @include('backend.larapacks.table')
        </div>
@endsection
