@extends('backend.layouts.app')
@section('title')
    <?php $this_filename ='admintests9'  ?>
    Picker
@endsection
@section('page-header')
    <h4>Picker</h4>
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
    <div class="row">
        <div class="col-6">

            <div class="card">
                <div class="card-header h4">
                    Color-Picker
                    <span class="float-right dimmed04 ml-3" style="font-weight:normal;font-size:0.7em;color:#666">{{$this_filename}}</span>
                </div>
                <div class="card-block">
                    <?php
                    $cache_minutes_selection = (int)  get_dv('cache_minutes_selection');
                    //dd($cache_minutes_selection);
                        if($cache_minutes_selection=='3') {
                            ec('ist 3');
                        }else{
                            ec('ist NICHT 3');
                        }

                    ?>

<pre><code>function get_colorpicker_any_table(
    $table = 'diverses',
    $field = 'div_res',
    $id,
    $id_field = 'div_what',
    $with_comment = false,
    $hint_key = '',
    $label_text = '',
    $with_panel = false,
    $with_tooltip = false,
    $ax_response = false,
    $text_first = false,
    $input_style = '',
    $label_style = 'font-weight:bold',
    $cb_type = '',
    $tt_class = 'tip',
    $tt_width = '300px',
    $panel_class = '',
    $panel_style = ''
)</code></pre>

                    mit <a style="font-size:1.3em" target="_blank" href="http://bgrins.github.io/spectrum">spectrum.js</a>
                    <p>
                    <div style="margin:12px 0 0 0">
                        <hr>
                        {{--<input type=color value="#cc0000" onchange="alert(this.value)" />--}}

                        {{--<input type='text' value="#abcdef" class="spec_colpick" id="full"/>--}}
                        <input type='text' class="" id="custom"/>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                $("#custom").spectrum({
                                    color: "#f00"
                                });
                            });
                        </script>

                    </div>

                    <div style="margin:12px 0 0 0">
                        <hr>
                        <input {{--onchange="alert(this.value)"--}} value="" type='text' class="" id="togglePaletteOnly"/>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                $("#togglePaletteOnly").spectrum({
                                    showPaletteOnly: true,
                                    togglePaletteOnly: true,
                                    togglePaletteMoreText: 'mehr',
                                    togglePaletteLessText: 'weniger',
                                    color: '#f4f8ff',
                                    /*hideAfterPaletteSelect:true,*/
                                    showInitial: true,
                                    showInput: true,
                                    preferredFormat: "hex",
                                    chooseText: "Wählen",
                                    cancelText: "Abbruch",
                                    /*containerClassName: 'animated zoomIn',*/
                                    replacerClassName: 'round6',
                                    palette: [
                                        ["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
                                        ["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
                                        ["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
                                        ["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
                                        ["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
                                        ["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
                                        ["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
                                        ["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]
                                    ]
                                });
                            });
                        </script>
                        <p>
                        mit definierter Palette und more.. button - hideAfterPaletteSelect:true - showInitial: true - showInput: true
                        </p>
                    </div>


                    <div style="margin:12px 0 0 0">
                        <hr>
                        <?php
                        $t_key='categories_images_mirror_bg_color';
                        echo get_colorpicker_by_t_key(
                            $t_key
                        );

                        ?>

                    </div>
                    </p>
                </div>
            </div>{{--<div class="card">--}}



        </div>{{--<div class="col-6">--}}

        {{--#####################################################################################--}}

        <div class="col-6">

            <div class="card">
                <div class="card-header h4">
                    Select by t_key
                </div>
                <div class="card-block">
<pre><code>function get_select_by_t_key(
    $t_key,
    $t_key_arr = '',
    $pref = '',
    $suff = '',
    $arr_from = 0,
    $arr_to = 0,
    $style = '',
    $arr_step = '1',
    $with_tooltip,
    $tt_class = 'tip',
    $tt_width = '300px',
    $wrapper_style = 'padding:2px 6px 0 9px;margin:4px 0;'
)</code></pre>

                    <pre>js: set_div(this.options[selectedIndex].value, \'' . $what . '\', \'' . $ident . '\')</pre>

                    <p>
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
                    </p>
                </div>
            </div>{{--<div class="card">--}}

            {{----------------------------------------------}}

            <div class="card">
                <div class="card-header h4">
                    nix 2
                </div>
                <div class="card-block">
                    <pre>nix</pre>
                    <p>
                        <?php

                        echo date_time_picker_new_any_table(
                            $table = 'diverses',
                            $field = 'created_at',
                            $id = 'is_dev',
                            $id_field = 'div_what',
                            $label_text = 'Single DateTime Picker - save to any table:',
                            $date_to_sql = 'false',
                            $picker_type = 'date', //datetime, date, time
                            $with_tooltip = false,
                            $ax_response = false,
                            $panel_class = '',
                            $panel_style = 'width:310px;border:1px #ccc solid;padding:6px;background:#EEF7EA',
                            $input_style = 'font-size:1.2em;color:#00c',
                            $label_style = 'font-weight:bold',
                            $tt_class = 'tip',
                            $tt_width = '300px'
                        )


                        ?>


                    </p>
                </div>
            </div>{{--<div class="card">--}}


        </div>{{--<div class="col-6">--}}

    </div>{{--<div class="row">--}}

    {{--#####################################################################################--}}
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header h4">
                    nix 3
                </div>
                <div class="card-block">
                    <pre>nix</pre>
                    <p>
                    </p>
                </div>
            </div>{{--<div class="card">--}}

            <div class="card">
                <div class="card-header h4">
                    nix 4
                </div>
                <div class="card-block">
                    <pre>nix</pre>
                    <p>
                    </p>
                </div>
            </div>{{--<div class="card">--}}

        </div>{{--<div class="col-12">--}}
    </div>{{--<div class="row">--}}



    {{--<div class="card">
        <div class="card-header h4">
            nix
        </div>
        <div class="card-block">
            <pre>nix</pre>
            <p>
            </p>
        </div>
    </div>--}}


    {{--<script type="text/javascript" src="{{ config('app.url') }}/resources/assets/plugins/date-input-polyfill.dist.js"></script>--}}
@endsection
