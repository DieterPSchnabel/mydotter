@extends('backend.layouts.app')
@section('title')
    <?php $this_filename ='admintests10'  ?>
    DEV-Links
@endsection
@section('page-header')
    <h4>DEV-Links</h4>
    {{--<span>{{trans('buttons.emails.auth.reset_password')}} - {{__('buttons.emails.auth.reset_password')}}
    </span>--}}
@endsection

@section('meta')
<!-- nixxxxxxxxxxxxx meta -->
@endsection


@section('before-styles-end')
    <!-- nixxxxxxxxxxxxx before-styles-end -->
@endsection



@section('content')
    @include('backend.includes.partials.dev-nav')
    @if(is_dev())
        <div style="font-weight:normal;font-size:1.0em;color:#999;margin:-4px 0 2px 6px">{{$this_filename}}</div>
    @endif

    <?php
    $total_boxes = 24;
    $total_boxes_counter = 0;
    $card_width = '290px'
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
            margin: 0 7px;
        }
        div.card{
            width:{{$card_width}};
        }
        div .dev-longtxt {
            min-height: 270px;
            max-height: 270px;
        }
    </style>

    <div class="f_container" style="background:none">

        @for($i = 1; $i<=$total_boxes; $i++)
            <?php $total_boxes_counter ++; ?>
            {{--############################# {{$total_boxes_counter}} #######################################--}}
            <?php
            $t_key_base = 'devlinks_'.$total_boxes_counter;
            $curr_name = 'TempHeader '.$total_boxes_counter;
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
                                $style='font-size:1.0em;width:175px',
                                $class = 'inline_txt_any_table',
                                $show_translation_opt = false,
                                $this_value = get_dv($t_key_header),
                                $from_inside_loop = false,
                                $with_page_reload = true
                            )
                            ?>
                        </div>
                    </div>
                    <div class="card-block  dev-longtxt">
                        <div class="float-right">
                            <a style="margin: -17px 0 0 0" class="float-right dimmed04" data-fancybox
                               data-type="iframe"
                               data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key_content}}&title={{$t_key_header}}"
                               href="javascript:;">
                                <i><b> edit </b></i></a>
                        </div>
                        <p>{!! get_dv($t_key_content, 'div_res_long'); !!}</p>

                    </div>
                </div>{{--<div class="card">--}}
            </div>

        @endfor
    </div>{{--<div class="f_container">--}}

@endsection
