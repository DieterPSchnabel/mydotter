@extends('backend.layouts.app')

@section('title')
    <?php $this_filename ='admintests4'  ?>
    tooltips
@endsection

@section('page-header')
    <h4>tooltips</h4>
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
                    mydotter tooltips
                    <span class="float-right dimmed04 ml-3" style="font-weight:normal;font-size:0.7em;color:#666">{{$this_filename}}</span>
                </div>
                <div class="card-block">
<pre><code class="php">function tooltip(
    $t_key,
    $class = 'tip',  // tip or tip_lu -- position -- tip = right-down -- tip_lu = left-down
    $width = '',  // with px
    $style = '',
    $icon = '' // force an icon other than default icon
)</code></pre>


                    <div>1. Text
                        <?php
                        $what = 'bonuscard_html_text';
                        echo tooltip($what,$class="tip", $width='600px',  $style='margin-left:2px', $icon='');
                        ?>
                        <br> 2. Text
                        <?php
                        $what = 'order_phone_text';
                        echo tooltip($what,$class="tip", $width='400px',  $style='margin-left:2px', $icon='');
                        ?>

                        <br> 3. Text
                        <?php
                        $what = 'bonuscard_html_text';
                        echo tooltip($what,$class="tip", $width='400px',  $style='margin-left:2px', $icon='');
                        ?>

                        <br>
                        <span class="float-right">
                        4. Text
                        <?php
                        $what = 'bonuscard_html_text';
                        echo tooltip($what,$class="tip_lu", $width='400px',$style='margin-left:2px', $icon='');
                        ?>
                            <br><br>
                        </span>
<hr>
                    </div>
                </div>
            </div>





        </div>
        {{--#####################################################################################--}}


        <div class="card">
            <div class="card-header h4">
                Text in any table
            </div>
            <div class="card-block">
<pre><code class="php">function edit_text_in_any_table(
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
    $from_inside_loop = false
)</code></pre>

<p>
    <?php
    $table = 'languages';
    $field = 'lara_code';
    $id = 2;
    $id_field = 'id';
    $with_break = false;
    $lang = '';
    $with_info = true;
    $style = 'width:30px;padding-left:4px';
    $class = 'inline_txt_any_table';
    $show_translation_opt = true;
    $this_value = '';
    $from_inside_loop = false;
    ?>
<pre>$show_translation_opt = false;</pre>
    {!!
        edit_text_in_any_table($table, $field, $id, $id_field,
        $with_break,  $lang, $with_info, $style,
        $class,
        $show_translation_opt = false,
        $this_value = '',
        $from_inside_loop = false)
    !!}
                </p>

<p>
                <pre>$show_translation_opt = true;</pre>
                {!!
                    edit_text_in_any_table($table, $field, $id, $id_field,
                    $with_break,  $lang, $with_info, $style,
                    $class,
                    $show_translation_opt = true,
                    $this_value = '',
                    $from_inside_loop = false)
                !!}

</p>



            </div>
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

    {{--#####################################################################################--}}
    <div class="row">
        <div class="col-12">
12er row

        </div>

    </div>




@endsection
