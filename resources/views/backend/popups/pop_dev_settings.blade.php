@extends('backend.layouts.popup')

@section('title')
    {!! get_tr('Konfiguration') !!}
@endsection

@section('meta')
    {{--<!-- nixxxxxxxxxxxxx meta -->--}}
@endsection

@section('page_level_styles')
@endsection

@section('before-styles-end')
    <style>
        div.f_container {
            width: 100%;
            display: flex; /* or inline-flex */
            align-items: flex-start;
            flex-direction: row;
            flex-wrap: wrap;
        }

        div.f_col {
            width: 700px;
            margin: 10px 10px;
            flex-grow: 1;
        }

        div.editable_top {
            font-size: 0.75em;
            font-weight: normal;
            color: #666;
            padding: 3px 0px 1px 4px !important;
            margin: 3px 0 0 0;
        }

        div.editable_top p {
            margin: 1px 0 4px 0;
        }

        div.editable_add {
            margin: 4px 0 -12px 0;
        }

        /*font-size in assistants:*/
        .dev-longtxt {
            min-height: 20px;
            max-height: 170px;
            font-size: 1.15em;
            padding: 8px 12px;
        }

        div.tt-innertext > p, div.tt-innertext {
            font-size: 1.05em !important;
        }
    </style>
@endsection

@section('page-header')
    <div class="text-right dimmed04" style="margin:6px 12px 5px 12px;color:#123;">
        <?php
        /*
        create_dv($this_page_name.'_table_top_hint');
        echo get_dv_translation($this_page_name.'_table_top_hint');

        $what = $this_page_name.'_table_top_hint';
        $class="tip_lu"; //tip or tip_lu
        $width='400px';
        $style='margin-left:5px';
        $icon='';
        if(is_dev()) echo tooltip($what,$class, $width,  $style, $icon);*/
        ?>
    </div>
@endsection

@section('content')

    <div class="card" style="">
        {{------------ HEAD 1. ROW ------------}}
        <div class="card-header" style="border-bottom:none">
            <div class="btn-toolbar float-right dimmed04" role="toolbar" aria-label="Toolbar with button groups">
                    <span>
                        <a class="btn btn-info btn-sm mr-20" role="button" target="_blank" href="{{url()->full()}}">
                            {!! get_tr('in neuem Fenster öffnen') !!}</a>
                    </span>

                @if(is_dev())
                    <span style="float:right;font-weight:normal;font-size:0.9em;">
                            {{ url()->current() }}
                        <input class="dimmed04 text-left"
                               style="border:none;text-align:right;min-width:100px;margin-left:26px;padding:2px 4px"
                               onfocus="this.select()"
                               type="text" value="{{$_GET['key']}}"/>
                       </span>
                @endif

            </div>

            <div class="table-header-model-name">{!! get_tr('Konfiguration') !!} Backend
                @if(is_dev()) <span class="o">{{$_GET['key']}}</span> @endif

                <div class="" style="margin-left:30px;display:inline-block">
                    <a style="margin:0 0 0 30px" id="show_all_cards_switch" style="margin-left:30px"
                       class="btn btn-primary btn-sm dimmed04" href="javascript:show_all_cards();">
                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i> {!! get_tr('zeige alle') !!} </a>


                    <a id="hide_all_cards_switch" style="margin:0 0 0 30px;display:none"
                       class="btn btn-primary btn-sm dimmed04" href="javascript:hide_all_cards();">
                        <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i> {!! get_tr('alle ausblenden') !!}
                    </a>

                    <?php
                    $what = 'config_overview_show_all_assis';
                    $class = "tip";
                    $width = '400px';
                    $style = 'margin-left: 3px;margin-right:18px;font-size:0.5em';
                    $icon = '';
                    echo tooltip($what, $class, $width, $style, $icon);
                    ?>



                    @if(is_dev())
                        <a style="margin:0 0 0 50px" class="btn btn-success btn-sm ml-20 dimmed04" data-fancybox
                           data-type="iframe"
                           data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key=config_backend_dev_notes&title=config_backend_dev_notes"
                           href="javascript:">
                            <i class="fa fa-pencil fa-sm-text-shadow"></i> Dev Notes </a>
                    @endif

                    <div class="btn-group" style="margin:0 0 0 30px;">
                        <div class="dropdown">
                            <button class="btn btn-primary btn-sm dimmed04 dropdown-toggle" type="button"
                                    id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {!! get_tr('Weitere Assistenten') !!}
                            </button>

                            <div style="margin-top:37px" class="dropdown-menu animated slideInDown"
                                 aria-labelledby="dropdownMenuButton">

                                <a class="dropdown-item"
                                   href="">
                                    Übersicht aller Assistenten für das Backend
                                </a>

                                <a class="dropdown-item"
                                   href="">
                                    Übersicht aller Assistenten für das Frontend
                                </a>

                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>







    @include('backend.config_assistants.'.$_GET['key'])
@endsection

@section('modals')
@endsection

@section('page_level_scripts')
@endsection

@section('scripts')
@endsection

@section('after-scripts')



@endsection

