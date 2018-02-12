@extends('backend.layouts.app')
@section('title')
    <?php $this_filename ='admintests6'  ?>
    Any table
@endsection
@section('page-header')
    <h4>Any table</h4>
@endsection

@section('meta')
<!-- nixxxxxxxxxxxxx meta -->
@endsection


@section('before-styles-end')

@endsection


@section('content')
    @include('backend.includes.partials.dev-nav')
    @if(is_dev())
        <div style="font-weight:normal;font-size:1.0em;color:#999;margin:-4px 0 2px 6px">{{$this_filename}}</div>
    @endif

    {{--############################   begin row   ##########################################################--}}
    <div class="row">
        <div class="col-6">

            {{--
            <div class="card">
                <div class="card-header h4">
                    fancybox3
                </div>
                <div class="card-block">
                    <p>
                    </p>
                </div>
            </div>
            --}}

            <div class="card">
                <div class="card-header">
                    checkbox any table
                    <span class="float-right dimmed04 ml-3" style="font-weight:normal;font-size:0.7em;color:#666">{{$this_filename}}</span>
                </div>

                <div class="card-block">
                    <h4 class="card-title">checkbox any table</h4>
                    <p class="card-text">nur gestyled ohne Funktion:</p>

                    <div class="checkbox checkbox-success">
                        <input id="checkbox3" class="styled" type="checkbox">
                        <label for="checkbox3">
                            Success
                        </label>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-header h4">
                    checkbox in diverses - ohne panel
                </div>
                <div class="card-block">
                    <p class="card-text">
<pre><code class="dev-longtxt">get_checkbox_div(
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
    $tt_width = '350px'
)

</code></pre></p>
                    <p>
                        <?php
                        echo get_checkbox_div(
                            $what = 'is_dev',
                            $label_text='',
                            $label_style = 'font-weight:normal;color:#999;margin-right:6px;',
                            $with_panel = false,
                            $data_on = 'Ein',
                            $data_off = 'Aus',
                            $wrapper_style = 'padding:2px 9px 0 9px;',
                            $ax_response = true,
                            $ax_response_with_page_reload = false,
                            $with_tooltip = true,
                            $tt_class = 'tip_lu',
                            $tt_width = '500px'
                            )
                        ?>
                    </p>





                </div>




            </div>

            {{---------------------------------------------------------------}}
            <div class="card">
                <div class="card-header h4">
                    checkbox in diverses - mit panel
                </div>
                <div class="card-block">
                    <p class="card-text">
                    <pre><code>get_checkbox_div(
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
    $tt_width = '350px'
)

</code></pre></p>
                    <p>
                        <?php


                        echo get_checkbox_div(
                            $what = 'is_dev',
                            $label_text='',
                            $label_style = 'font-weight:normal;color:#999;margin-right:6px;',
                            $with_panel = true,
                            $data_on = 'Ein',
                            $data_off = 'Aus',
                            $wrapper_style = 'padding:2px 9px 0 9px;',
                            $ax_response = true,
                            $ax_response_with_page_reload = false,
                            $with_tooltip = true,
                            $tt_class = 'tip_lu',
                            $tt_width = '500px'
                        )
                        ?>
                    </p>
                    <div>
                        <hr>
                        get colorpicker:
<pre><code>get_colorpicker_by_t_key(
    $t_key = 'categories_images_mirror_bg_color',
    $wrapper_style = 'margin:0 0 4px 0;',
    $with_panel = false,
    $with_tooltip = true, //becomes false if $with_panel = true
    $tt_class= 'tip', //tip or tip_lu
    $tt_width = '450px'
)</code></pre>
                        <hr>
                        <?php
                        $t_key = 'categories_images_mirror_bg_color';
                        echo get_colorpicker_by_t_key(
                            $t_key,
                            $wrapper_style = 'margin:0 0 4px 0;',
                            $with_panel = false,
                            $with_tooltip = true, //becomes false if $with_panel = true
                            $tt_class= 'tip_lu', //tip or tip_lu
                            $tt_width = '450px'
                        )
                        ?>
                    </div>
                </div>

            </div>

        </div>

        {{----------------------------------------------------------------}}
        <div class="col-6">
            <div class="card">
                <div class="card-header h4">
                    Text in any table
                </div>
                <div class="card-block">
<pre><code>edit_text_in_any_table(
    $table,
    $field,
    $id,
    $id_field = 'id',
    $with_break = true,
    $lang = '',
    $with_info = false,
    $style,
    $class = 'inline_txt_any_table',
    $show_translation_opt = true,
    $this_value = '',
    $from_inside_loop = false,
    $with_page_reload = false
)</code></pre>


                    <p>
                        <?php
                        $table = 'languages';
                        $field = 'lara_code';
                        $id = 7;
                        $id_field = 'id';
                        $with_break = false;
                        $lang = '';
                        $with_info = false;
                        $style = 'width:50px;padding-left:5px';
                        $class = 'inline_txt_any_table';
                        $show_translation_opt = false;
                        ?>

                        {!!
                            edit_text_in_any_table(
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
                        !!}
                    </p>


                    <p>

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
                            $label_style = 'margin-right:12px;font-weight:bold;',
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

                    </p>


                    <p>

                        <?php
                        echo get_checkbox_any_table(
                            $table= 'diverses',
                            $field = 'div_res',
                            $id = 'is_dev',
                            $id_field ='div_what',
                            $with_comment=false,
                            $tt_hint_key = 'is_dev',
                            $label_text = 'use any indiv. Text here...',
                            $with_panel = false,
                            $ax_response = true,
                            $input_style= '',
                            $label_style = 'margin-right:12px;font-weight:bold;',
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

                    </p>
                </div>

                {{----------------------------------------------------------------}}
                <div class="card-block">
                    <pre>function edit_text_in_any_div</pre>
                    <p>
                        <?php

                        $field = 'div_res';
                        $id = 'is_dev';
                        $id_field = 'div_what';
                        $with_break = false;
                        $lang = 'de'; //oder all
                        $with_info = true;
                        $style = 'width:600px;padding-left:4px;margin-bottom:14px';
                        $class = 'inline_txt_any_table';
                        ?>

                        {{--{!!
                        edit_text_in_div($table='diverses',$field, $id,
                                $id_field='div_what',
                                $with_break = false,
                                $lang,
                                $with_info,
                                $style,
                                $class,
                                $show_translation_opt = false,
                                $this_value = '',
                                $from_inside_loop = false,
                                $with_page_reload = false
                            )
                        !!}--}}
                    </p>
                </div>
            </div>
        </div>
        </div>
    {{--############################   end row   ##########################################################--}}


    {{--############################   begin row   ##########################################################--}}
    <div class="row">
        <div class="col-12">
            {{----------------------------------------------------------------}}
            <div class="card">
                <div class="card-header h4">
                    all langs in div (div_res) short
                </div>
                <div class="card-block">
<pre><code>function edit_text_in_div(
        $table='diverses',
        $field = 'div_res',
        $id = 'is_dev',
        $id_field='div_what',
        $with_break = false,
        $lang = 'all',
        $with_info  = true,
        $style = 'width:600px;padding-left:4px;margin-bottom:14px',
        $class  = 'inline_txt_any_table')</code></pre>
                    <p>
                        <?php

                        $field = 'div_res';
                        $id = 'is_dev';
                        $id_field = 'div_what';
                        $with_break = false;
                        $lang = 'all'; //oder all
                        $with_info = true;
                        $style = 'width:600px;padding-left:4px;margin-bottom:14px';
                        $class = 'inline_txt_any_table';
                        ?>
                        {!!
                        edit_text_in_div($table='diverses',$field, $id,
                                $id_field='div_what',
                                $with_break = false,
                                $lang,
                                $with_info,
                                $style,
                                $class)
                        !!}
                    </p>
                </div>
            </div>

            <div class="card">
                <div class="card-header h4">
                    all langs in div  - gleiche Funktion für short text und long text
                </div>
                <div class="card-block">

<pre><code>function edit_text_in_div(
        $table='diverses',
        $field = 'div_res_long',
        $id = 'is_dev',
        $id_field='div_what',
        $with_break = false,
        $lang,
        $with_info,
        $style,
        $class)</code></pre>

                    <p>
                        <?php

                        $field = 'div_res_long';
                        $id = 'is_dev';
                        $id_field = 'div_what';
                        $with_break = false;
                        $lang = 'all'; //oder all
                        $with_info = true;
                        $style = 'width:700px;padding-left:4px';
                        $class = 'inline_txt_any_table';
                        ?>
                        {!!
                        edit_text_in_div($table='diverses',$field, $id,
                                $id_field='div_what',
                                $with_break = false,
                                $lang,
                                $with_info,
                                $style,
                                $class)
                        !!}

                    </p>
                </div>
            </div>





        </div>
    </div>
    {{--############################   end row   ##########################################################--}}
@endsection
