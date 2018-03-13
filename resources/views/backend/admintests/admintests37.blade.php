@extends('backend.layouts.app')
@section('title')
    <?php

    $this_filename ='admintests37';
    $this_table_name =$this_filename;
    create_dv($this_table_name.'_disp_per_page',6,true); //display how many boxes?

    ?>
    Artisan Befehle
@endsection

@section('meta')
    <!-- meta -->
@endsection


@section('before-styles-end')
    <!-- before-styles-end -->
@endsection

@section('page-header')
    <h4 class="table-header-model-name">PHP Artisan Befehle
    <div class="text-right dimmed04" style="margin:-20px 12px 16px 12px;color:#123;font-size:0.5em;font-weight:normal;">
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
    </h4>
@endsection

@section('content')
    @include('backend.includes.partials.dev-nav')

    <?php
    $currently_selected = get_dv($this_table_name.'_disp_per_page'); //display how many boxes?
    ?>
    @if(is_dev())
        <div class="float-right" style="margin-left:30px;margin-bottom:-15px;margin-top:4px;margin-right:24px">
            <span style="display:inline-block;margin:0 6px 3px 0;vertical-align:text-top;color:#aaa">How many Cards to display? </span>
            <select class="__custom-select" style="margin:0 0 3px 6px;"
                    onchange="set_dv(this.options[selectedIndex].value)">
                {!! get_options_for_boxes_per_page(30,$currently_selected) !!}
            </select>
            <?php $zuf = rand_str(); ?>
            <span id="{!! $zuf !!}_conf" style="width:25px;margin-left:8px"></span>
            <script>
                function set_dv(anz) {
                    ax_jq('/axfe','id=106_'+anz+'_xyx_'+'{{$this_table_name}}_disp_per_page','{!! $zuf !!}'+'_conf');
                }
            </script>
        </div>

        <div style="font-weight:normal;font-size:1.0em;color:#999;margin:-4px 0 2px 6px">{{$this_filename}}</div>
    @endif

    <?php
    $total_boxes = $currently_selected;
    $total_boxes_counter = 0;
    $card_width = '590px'; //container is flex!!
    ?>

    <style>
        div.f_container{
            width:100%;
            display: flex; /* or inline-flex */
            align-items: flex-start;
            flex-direction: row;
            flex-wrap: wrap;
        }
        div.ccol{
            margin: 0 6px;
        }
        div.card{
            width:{{$card_width}};
        }
    </style>

    <div class="f_container" style="background:none">

        @for($i = 1; $i<=$total_boxes; $i++)
            <?php $total_boxes_counter ++; ?>
            {{--############################# {{$total_boxes_counter}} #######################################--}}
            <?php
            $t_key_base = 'dev_artisan_commands_'.$total_boxes_counter;
            $curr_name = 'Artisan '.$total_boxes_counter;
            ?>
            <div class="ccol">
                <div class="card">
                    <?php
                    $t_key_header = $t_key_base.'_header';
                    $t_key_content = $t_key_base.'_content';
                    $t_key_editor_div = $t_key_base.'_inline_editor';
                    create_dv($t_key_header,$curr_name,true);
                    create_dv($t_key_content);

                    ?>
                    <div class="card-header h4">
                        <span id="a_{{$t_key_base}}"></span>
                        {{--Laravel Docs--}}
                        <?php
                        echo get_dv($t_key_header);
                        echo get_edit_link_short_toggler($t_key_editor_div,'font-size:0.8em');
                        ?>
                        <div id="{{$t_key_editor_div}}" style="display:none;font-size:0.7em;padding:5px 0 0 5px ;background:#ffe;margin: 10px -8px 0 -8px;border:1px #ddd inset">
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
                    </div>
                    <div class="card-block dev-longtxt">
                        <div class="float-right">
                            <a style="margin: -17px 0 0 0" class="float-right dimmed04" data-fancybox
                               data-type="iframe"
                               data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key_content}}&title={{$t_key_header}}"
                               href="javascript:">
                                <i><b> edit </b></i></a>
                        </div>
                        <p>{!! get_dv($t_key_content, 'div_res_long'); !!}</p>

                    </div>
                </div>{{--<div class="card">--}}
            </div>

        @endfor
    </div>{{--<div class="f_container">--}}

@endsection
