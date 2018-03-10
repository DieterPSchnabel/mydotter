@extends('backend.layouts.app')
@section('title')
    <?php $this_filename ='admintests7'  ?>
    Diverses
@endsection
@section('page-header')
    <h4>Diverses</h4>

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
                    Tooltip plain
                    <span class="float-right dimmed04 ml-3" style="font-weight:normal;font-size:0.7em;color:#666">{{$this_filename}}</span>
                </div>
                <div class="card-block">

                    {{--<link class="css" src="css/prettify.css">--}}
                    <style>
                        li.L0, li.L1, li.L2, li.L3,
                        li.L5, li.L6, li.L7, li.L8 {
                            list-style-type: decimal !important;
                        }
                    </style>
<div>
    <?php

    //Cache::flush();
    //get_languages($lang='', $anz=false);
    //ec(get_languages($lang='', $anz=false));
    //ec ( get_languages_all() );

        $xxx = get_dv_id('is_dev');
        //ec(print_ar($x));
        //dd($x);
        ec(__line__.': id is '.$xxx);
        //ec(__line__.': '.$xxx);

        $y = '';
        //$y = DB::select("select $field from $table where $id_field = ?", [$id]);
        //$y = DB::select("select div_res from diverses where id = ?", [63185]);
        //ec(print_ar($y));

/*    $perPageLimit = get_dv('languages_disp_per_page');
    ec(__line__.': '.$perPageLimit);

    $redis_key = 'diverses.div_res.is_dev';
    if (Cache::has($redis_key)) {
        ec(__line__.': '.'<b style="color:green">JA!</b> <b>'.$redis_key.'</b> is in Cache - value: '.is_dev().'--');
    }else{
        ec(__line__.': '.'<b style="color:red">NEIN!</b> '.$redis_key.' is NOT Cache - value: '.is_dev().'--');
    }*/
    //use Illuminate\Support\Facades\Redis;

    //$keys = Redis::keys('diverses*');
   /* $auKeys = $redis->keys("diverses*");
    foreach ($auKeys as $key) {
        $data = $redis->get($key);
        //$redis2->set($key, $data, 6000);
        echo $key;
    }*/
/*
    $x = get_dv_arr('is_dev');
    //$x = is_dev();
    //ec( print_ar($x) );
    $dont_copy_array = ['id', 'div_what', 'updated_at', 'created_at'];
    foreach ($x as $key => $value) {
        if(!in_array($key, $dont_copy_array))  {
           if($key=='div_res_de') ec($key.' - '.$value);
        }
    }
*/
/*

    $rec = App\Models\Diverses::where('div_what','is_dev')->firstOrFail()->toArray();
    //ec( print_ar($rec) );
    foreach ($rec as $key => $value) {
        if(!in_array($key, $dont_copy_array))  {
           // if($key=='div_res_fr') ec($key.' - '.$value);
        }
    }
*/

    //$deleted = DB::delete('delete from diverses where div_what = ?',['is_dev2']);

   /* function replicate_record_by_div_what2($div_what, $new_div_what){
        $div_what = trim($div_what);
        $new_div_what = trim($new_div_what);

        //check if exists
//            $anz = 0;
//            $anz = App\Models\Diverses::where(['div_what' => $new_div_what])->count(); //where([array]) ;
//            if ($anz > 0) {
//
//            }
        //already checked in myhelper_ax at 112

        $record = App\Models\Diverses::where('div_what', $div_what)->get()->toArray();
        $res1_arr = $record;

        $newID = App\Models\Diverses::create(
            [
                'div_what' => $new_div_what
            ]);
        $insert_id = $newID->id;

        $res1_arr = array_collapse($res1_arr); // !!
        $dont_copy_array = ['id', 'div_what', 'updated_at', 'created_at'];
        $update_fields_arr = [];
        foreach ($res1_arr as $key => $value) {
            if(!in_array($key, $dont_copy_array))  {
                //ec( $key.' - '.$value.'<hr>' );
                //Todo: avoid 70 queries - modify to only 1 query
                //ec(print_ar($res1_arr));
                //$update_fields_str .= "['$key' => '$value']_xyx_";
                $update_fields_arr[$key] = $value;
                //set_dv_id($insert_id, $value, $key);
            }
        }
        //$update_fields_str .= substr($update_fields_str,0,-5);
        //$update_fields_arr = explode('_xyx_',$update_fields_str);

        //ec(print_ar($update_fields_arr));
        //App\Models\Diverses::where('div_what', '=', $what)->update([$field => $value],['updated_at' => NOW()]);
        App\Models\Diverses::where('div_what', '=', $new_div_what)->update($update_fields_arr);
        //return $update_fields_str;
    }*/

    //ec(replicate_record_by_div_what2('is_dev', 'is_dev2'));
    // $deleted = DB::delete('delete from diverses where div_what = ?',['is_dev2']);
   // $res1_arr =  replicate_record_by_div_what('is_dev', 'is_dev2');

        //dd($res1_arr);
        //$flattened = array_dot($res1_arr);
        //dd($flattened);

        //$res1 = get_dv_id('is_dev', 'div_what');
        //ec($res1);
        //dd($res1);
    ?>

</div>


                    <pre><code class="php">function tooltip(
    $t_key,
    $class = 'tip',  // tip or tip_lu -- position -- tip = right-down -- tip_lu = left-down
    $width = '',  // with px
    $style = '',
    $icon = '' // force an icon other than default icon
)</code></pre>
                    <br>test
                    <?php
                    $what = 'bonuscard_html_text';
                    echo tooltip($what,
                        $class="tip",
                        $width='400px',
                        $style='margin-left:2px',
                        $icon='');
                    ?>

                    <div>text 0
                        <?php
                        $what = 'order_phone_text';
                        $class="tip";
                        $width='500px';
                        $style='margin-left:2px';
                        $icon='';

                        echo tooltip($what,$class, $width, $style, $icon);
                        ?>
                    </div>

                    <div>
                        1. Text
                        <?php
                        $what = 'bonuscard_html_text';
                        $class='';
                        echo tooltip($what,
                            $class="tip",
                            $width='600px',
                            $style='margin-left:2px',
                            $icon='');
                        ?>
                    </div><div>
                        <?php
                        $what = 'order_phone_text';
                        echo tooltip($what,$class="tip", $width='200px', $style='margin-left:2px', $icon='');
                        ?>
                    </div><div>
                        <?php
                        $what = 'is_dev';
                        echo tooltip($what,$class="tip", $width='400px', $style='margin-left:2px', $icon='');
                        ?>
                    </div><div>
                        <?php
                        $what = 'bonuscard_html_text';
                        echo tooltip($what,
                            $class="tip",
                            $width='400px',
                            $style='margin-left:2px',
                            $icon='');
                        ?>
                    </div>
                </div>
            </div>{{--<div class="card">--}}


            {{--------------------------------------------------}}

            {{---------------------------------------------------------}}

            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">

<pre><code>function get_checkbox_div(
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
</code></pre>

<pre>
js: checkbox_to_any_table(checked, ident ,table, field, id_field, id, page_reload)
    -> mycustom.js -> axfe 102
</pre>
                    <p>
                        <?php
                        $what = 'is_dev';
                        $with_panel = true;
                        $label_text = 'Bitte wählen:';
                        $with_tooltip = true;
                        $ax_response = true;

                        echo get_checkbox_div(
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
                        $tt_width = '450px'
                        )

                        ?>
                    </p>

                    <p>

                        <?php
                        $what = 'is_dev';
                        $with_panel = true;
                        $label_text = 'Bitte wählen:';
                        $with_tooltip = true;
                        $ax_response = true;

                        echo get_checkbox_div(
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
                            $tt_width = '450px'
                        )

                        ?>

                    </p>

                </div>
            </div>{{--<div class="card">--}}






        </div>{{--<div class="col-6">--}}

        {{--#####################################################################################--}}

        <div class="col-6">

            <div class="card">
                <div class="card-header h4">
                    I'm Superadmin
                </div>
                <div class="card-block">
<pre><code class="php">function get_checkbox_any_table(
    $table,
    $field,
    $id,
    $id_field = 'id',
    $with_comment = false,
    $tt_hint_key = '', // tooltip hint key
    $label_text = '',
    $with_panel = false,
    $ax_response = false,
    $input_style = '',
    $label_style = 'font-weight:bold',
    $with_tooltip = false,
    $tt_class = 'tip',
    $tt_width = '300px',
    $with_page_reload = false,
    $this_value = '', // if $from_inside_loop = true set to: $model->fieldname otherwise leave empty
    $from_inside_loop = false, //$this_value is only possible if checkbox comes from foreach...
    $as_switch = false,
    $switch_size = 'sm' //xs, sm, no, lg -- no = normal
);</code></pre>
<div>
    {!!
                                 get_checkbox_any_table(
                                    $table= 'diverses',
                                    $field = 'div_res',
                                    $id = 'is_dev',
                                    $id_field ='div_what',
                                    $with_comment=false,
                                    $tt_hint_key = 'is_dev',
                                    $label_text = 'is Dev',
                                    $with_panel = true,
                                    $ax_response = true,
                                    $input_style= '',
                                    $label_style = 'margin-right:12px;font-weight:normal;',
                                    $with_tooltip = true,
                                    $tt_class = 'tip',
                                    $tt_width = '400px',
                                    $with_page_reload = false,
                                    $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                    $from_inside_loop = false, // lookup for current value if set to false
                                    $as_switch = true, //only checkbox or switch?
                                    $switch_size = 'no' //xs, sm, no, lg
                                 );
                                !!}
<div>
<pre><code class="php">get_checkbox_any_table(
    $table= 'diverses',
    $field = 'div_res',
    $id = 'is_dev',
    $id_field ='div_what',
    $with_comment=false,
    $tt_hint_key = 'is_dev',
    $label_text = 'is Dev',
    $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
    $ax_response = true,
    $input_style= '',
    $label_style = 'margin-right:12px;font-weight:normal;',
    $with_tooltip = true,
    $tt_class = 'tip',
    $tt_width = '300px',
    $with_page_reload = false,
    $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
    $from_inside_loop = false, // lookup for current value if set to false
    $as_switch = true, //only checkbox or switch?
    $switch_size = 'no' //xs, sm, no, lg
 );</code></pre>

</div>

                        {!!
                             get_checkbox_any_table(
                                $table= 'diverses',
                                $field = 'div_res',
                                $id = 'is_dev',
                                $id_field ='div_what',
                                $with_comment=false,
                                $tt_hint_key = 'is_dev',
                                $label_text = 'is Dev',
                                $with_panel = false,
                                $ax_response = true,
                                $input_style= '',
                                $label_style = 'margin-right:12px;font-weight:normal;',
                                $with_tooltip = true,
                                $tt_class = 'tip',
                                $tt_width = '400px',
                                $with_page_reload = false,
                                $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                $from_inside_loop = false, // lookup for current value if set to false
                                $as_switch = true, //only checkbox or switch?
                                $switch_size = 'no' //xs, sm, no, lg
                             );
                            !!}
                    </div>


                    <div>
                        {{--{!!
                             get_checkbox_any_table(
                                $table= 'diverses',
                                $field = 'div_res',
                                $id = 'is_dev',
                                $id_field ='div_what',
                                $with_comment=false,
                                $tt_hint_key = 'is_dev',
                                $label_text = 'is Dev',
                                $with_panel = false,
                                $ax_response = true,
                                $input_style= '',
                                $label_style = 'margin-right:12px;font-weight:normal;',
                                $with_tooltip = true,
                                $tt_class = 'tip',
                                $tt_width = '300px',
                                $with_page_reload = false,
                                $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                $from_inside_loop = false, // lookup for current value if set to false
                                $as_switch = true, //only checkbox or switch?
                                $switch_size = 'no' //xs, sm, no, lg
                             );
                            !!}--}}


                    </div>



                </div>
            </div>{{--<div class="card">--}}




        </div>{{--<div class="col-6">--}}

    </div>{{--<div class="row">--}}


    {{--###################################    Action Box     ##################################################--}}
    <div class="row">
        <div class="col-6">

            <div class="card">
                <div class="card-header h4">
                    Action-Box
                </div>
                <div class="card-block">
                    {{--<pre>nix</pre>--}}
                    <?php



                    ?>
                    <p>
<pre><code>$what = 'actionbox_test_action';
echo get_actionbox_div(
    $what,
    $axfe_id = '999999', //which action to execute in myhelper_ax.php
    $button_title = 'Diese Aktion jetzt ausführen',
    $with_panel = true,
    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
    $ax_response_with_page_reload = true,
    $with_tooltip = true, //always false if $with_panel = true
    $tt_class = 'tip',
    $tt_width = '400px'
)</code></pre>
                        <?php
                        $what = 'actionbox_test_action';
                        echo get_actionbox_div(
                            $what,
                            $axfe_id = '999999',
                            $button_title = 'Diese Aktion jetzt ausführen',
                            $with_panel = true,
                            $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                            $ax_response_with_page_reload = true,
                            $with_tooltip = true, //always false if $with_panel = true
                            $tt_class = 'tip',
                            $tt_width = '400px'
                        )

                        ?>
<pre><code>get_actionbox_div(
    $what,
    $axfe_id = '999999', //which action to execute in myhelper_ax.php
    $button_title = 'Jene Aktion jetzt ausführen',
    $with_panel = false,
    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
    $ax_response_with_page_reload = false,
    $with_tooltip = true,
    $tt_class = 'tip',
    $tt_width = '400px'
)</code></pre>
                        <?php

                        echo get_actionbox_div(
                            $what,
                            $axfe_id = '999999',
                            $button_title = 'Jene Aktion jetzt ausführen',
                            $with_panel = false,
                            $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                            $ax_response_with_page_reload = false,
                            $with_tooltip = true,
                            $tt_class = 'tip',
                            $tt_width = '400px'
                        )

                        ?>
                    </p>
                </div>
            </div>{{--<div class="card">--}}

            <div class="card">
                <div class="card-header h4">
                    Select
                </div>
                <div class="card-block">
<pre><code>get_select_by_t_key(
    $t_key,
    $t_key_arr ='',
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
)
</code></pre>
                    <p>

                    <?php
                    //$master_key = 'categories_images_width';
                    $t_key='categories_images_width';
                    echo get_select_by_t_key(
                    $t_key,
                    $t_key_arr ='',
                    $pref='',
                    $suff='px',
                    $arr_from = '10' ,
                    $arr_to  = '800',
                    $style='font-size:1.2em;',
                    $arr_step = '1',
                    $with_tooltip = false,
                    $tt_class = 'tip',
                    $tt_width = '300px'
                    );
                    ?>

                    </p>
                </div>
            </div>{{--<div class="card">--}}

        </div>{{--<div class="col-6">--}}


        <div class="col-6">

            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <pre>nix</pre>
                    <p>
                    </p>
                </div>
            </div>{{--<div class="card">--}}

            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <pre>nix</pre>
                    <p>
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
                    nix
                </div>
                <div class="card-block">
                    <pre>nix</pre>
                    <p>

                    </p>
                </div>
            </div>{{--<div class="card">--}}

            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <pre>nix</pre>
                    <p>

                        <?php
                        $what = 'is_dev_nix';
                        $with_panel = true;
                        $label_text = 'Bitte wählen:';
                        $with_tooltip = true;
                        $ax_response = true;

                        echo get_checkbox_div(
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
                        $tt_width = '450px'
                        )

                        ?>

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

@endsection
