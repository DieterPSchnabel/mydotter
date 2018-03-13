@extends('backend.layouts.popup')

@section('page-header')
<h4>editor for short text in div</h4>
@endsection

@section('meta')
    {{-- nixxxxxxxxxxxxx meta  --}}
@endsection

@section('page_level_styles')
    <!--begin page level css-->

    {{--<link href="{{ config('app.url') }}/my_plugins/editors/editor.css" rel="stylesheet" type="text/css"/>--}}
    {{--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">--}}
    {{--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">--}}
    <!--end of page level css-->
@endsection


@section('before-styles-end')
    {{--  nixxxxxxxxxxxxx before-styles-end  --}}
@endsection


@section('content')
<?php

$field = 'div_res';
$id = $_GET['key'];
$id_field = 'div_what';
$with_break = false;
$lang = 'all'; //oder all
$with_info = true;
$style = 'width:600px;padding-left:4px;margin-bottom:14px';
$class = 'inline_txt_any_table';
//dd($id);

?>
{{----------------- begin header on all  ---------------------------}}
@if(is_dev())
<div style="margin:0 6px 19px 6px;font-weight:bold;color:#aaa">
    <span>
        <a class="btn btn-info btn-sm mr-5" role="button" target="_blank" href="{{url()->full()}}">
                ...in neuem Fenster öffnen (DEV)</a>
    </span>
    </span>

    <span style="float:right;font-weight:normal;font-size:0.9em;">
            {{ url()->current() }}
            <input class="dimmed04 text-left" style="border:none;text-align:right;min-width:250px;margin-left:26px;padding:2px 4px" onfocus="this.select()"
                   type="text" value="{{$id}}"/>
        </span>
    <br>
</div>
@endif
{{----------------- end header on all  ---------------------------}}
<div style="min-height:600px;margin:20px auto 6px auto;max-width:100%;padding: 0 0 70px 0;border:0px #c00 solid">
{!!
edit_text_in_div($table='diverses',$field, $id,
    $id_field='div_what',
    $with_break = false,
    $lang='all',
    $with_info,
    $style,
    $class)
!!}

    <div>
        <a style="margin:-20px 0 6px 12px" class="btn btn-info btn-sm"
           href="javascript:javascript:parent.location.reload()" role="button">
            <i class="fa fa-refresh fa-lg" aria-hidden="true"></i> Editor schliessen mit Reload der Hintergrundseite</a>
    </div>
</div>


@endsection




@section('page_level_scripts')

        <!-- end page level js -->


@endsection
