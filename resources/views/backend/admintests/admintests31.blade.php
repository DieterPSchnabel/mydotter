@extends('backend.layouts.app')

<?php
$this_page_name = 'tables_and_index';
$this_file_title = 'Tabellen und Index';

//the hidden help window - press help to view it
$has_help = true;
$has_help_hints = true;
$has_help_help = true;
$has_help_related = true;
$has_help_config = true;

//the available elements in the row 2 above the table - configurable

// init each (key/value pair) one time with value = 1 (true) - only if not exists - later use the switches
create_dv($this_page_name.'_table_has_table_search',1,true); //if value <> '' add $first=true to avoid caching
create_dv($this_page_name.'_table_has_table_export',1,true);
create_dv($this_page_name.'_table_has_table_filter',1,true);
create_dv($this_page_name.'_table_has_cols_filter',1,true);
create_dv($this_page_name.'_table_has_items_per_page',1,true);

$has_table_search = get_dv($this_page_name.'_table_has_table_search');
$has_table_export = get_dv($this_page_name.'_table_has_table_export');
$has_table_filter = get_dv($this_page_name.'_table_has_table_filter');
$has_cols_filter = get_dv($this_page_name.'_table_has_cols_filter');
$has_items_per_page = get_dv($this_page_name.'_table_has_items_per_page');

//do we show these buttons? should depend on users role and privileges
$has_action_show = true;
$has_action_edit = true;
$has_action_delete = true;
$has_action_ceate_new = true;

?>
@section('title')
    {{$this_file_title}}
@endsection
@section('page-header')
    <div class="text-right dimmed04" style="margin:-6px 12px 6px 12px;color:#123;">
        <?php
        create_dv($this_page_name.'_table_top_hint');
        echo get_dv_translation($this_page_name.'_table_top_hint');

        $what = $this_page_name.'_table_top_hint';
        $class="tip_lu"; //tip or tip_lu
        $width='400px';
        $style='margin-left:5px';
        $icon='';
        echo tooltip($what,$class, $width,  $style, $icon);
        ?>
    </div>
@endsection

@section('meta')
    {{--<!-- nixxxxxxxxxxxxx meta -->--}}
@endsection


@section('before-styles-end')
    {{--<!-- nixxxxxxxxxxxxx before-styles-end -->--}}
@endsection


@section('content')


    {{--a test/debug window on top of the page becomes visible if true--}}
    {{--use help->configuration->DEV-Configuaration for this page to make debug area available - the switch is_dev must be ON--}}
    @if(get_dv($this_page_name.'_table_display_debug_area'))
        <div style="padding:12px;background:#fffff6;border:1px #ccc solid">
            <a style="margin:-18px -18px 0 0;" class="float-right" href="javascript:toggle('debug_inner','slide')"><i
                        class="fa fa-times-circle fa-2x" aria-hidden="true"></i></a>

            <?php
            echo get_checkbox_any_table(
                $table= 'diverses',
                $field = 'div_res',
                $id = $this_page_name.'_table_display_debug_area',
                $id_field ='div_what',
                $with_comment=false,
                $tt_hint_key = 'is_dev',
                $label_text = "Debug-Bereich anzeigen?",
                $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                $ax_response = true,
                $input_style= '',
                $label_style='margin-right:12px' ,
                $with_tooltip = false,
                $tt_class = 'tip',
                $tt_width = '300px',
                $with_page_reload = true,
                $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                $from_inside_loop = false, // lookup for current value if set to false
                $as_switch = true, //only checkbox or switch?
                $switch_size = 'no' //xs, sm, no, lg
            );
            ?>

            <div id="debug_inner">
                <div class="float-right"
                     style="color:#abc;font-size:1.2em;font-weight:bold;margin:-45px 20px 0 0">test & debug</div>
                <?php
                //add your test-code here
                //only for debug purposes - default: $page_debug_show = false


                //echo update_null_dates_in_all_tables($echo=true);
                // check these tables for all language columns, add where not there:
                //echo add_cols_to_language_lines();
                //echo add_cols_to_myd_translations();
                //echo add_cols_to_diverse();
                $group = 'alerts';
                $key='backend.roles.created';
                $value = 'Rolle erstellt.';
//use DB;
/*
    DB::insert('insert into `language_lines`
        (`text`, `group`, `key`, `de`)
        values (?,?,?,?)',
        ['',$group,$key,$value]);*/


                //DB::insert('insert into language_lines (group,  de) values (?, ?)', [$group,$value]);


                $sql="insert into `language_lines` set
                `text` = '',
                `group` = '".$group."',
                `key` =  '".$key."',
                `de` = '".$value."'
                ";
                //ec($sql);
                //q($sql);


                //$x = get_columns_from_table_text_only('language_lines', $as_array=true);
                    //dd($x);
                //ec('done');
                //vendor/spatie/laravel-translation-loader/src/LanguageLine.php
                    //namespace Spatie\TranslationLoader;
                $what = 'http.404.description';
                //echo vendor/spatie/laravel-translation-loader/src/LanguageLine::where(['full_key' => $what])->count();

                    $sql="select full_key from language_lines where full_key = '".$what."' ";
                    //ec(number_records($sql));


                    //TS_LOCALES=de,en,fr,es,nl,it,ru
                    //$x = env('TS_LOCALES', ['en']);
                    //ec($x);
                    //ec( get_languages_all($sorder='directory', $rf='asc', $anz=false) );
                //ec( all_languages_str($as_array=false) );
                //ec( check_table_for_all_langs('myd_translations') );
               //ec(check_diverses_for_all_langs());
                    //dd( App\Models\Diverses::all()->pluck('div_what') );
                    //ec( remove_dummy_text_from_diverses() );

//ec( get_columns_from_table_text_only('language_lines', $as_array = false) );

ec ( all_languages_str($as_array=false) );
/*
                    //set config
                    config(['translation_sheet.locales' => [active_languages_str()]]);

                    ec( config('app.timezone') );
                    //ec( config('translation_sheet.locales') );
                    $xx = active_languages_str($as_array=true);
                foreach ($xx as $value) {
                    //$value = $value * 2;
                    ec($value);
                }*/

                //use Spatie\TranslationLoader\LanguageLine;

                /*Spatie\TranslationLoader\LanguageLine::create([
                    'group' => 'validation',
                    'key' => 'required',
                    'text' => [
                        'en' => 'This is a required field',
                        'nl' => 'Dit is een verplicht veld',
                        'de' => 'Dies wird benötigt'
                ],
                ]);*/


                //ec(trans('validation.required'));
                ?>
            </div>
        </div>
    @endif

    @if($has_help)
        <?php
            $source = base_path().'\resources\views\backend\admintests\help\template_help-block.blade.php';
            $dest = base_path().'/resources/views/backend/admintests/help/'.$this_page_name.'_help-block.blade.php';
            if (!file_exists($dest) and file_exists($source)   ){
               copy($source, $dest);
               ec('created: '.$dest);
            }
        ?>
        @include('backend.admintests.help.'.$this_page_name.'_help-block')
    @endif


    <div class="card">
        {{------------ HEAD 1. ROW ------------}}
        <div class="card-header" style="border-bottom:none">
            <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">


                @if(get_dv($this_page_name.'_table_has_help'))
                    {{------------ TABLE HILFE ------------}}
                    <a style="margin-left:12px" class="btn btn-info" href="javascript:toggle('help_block','slide')" role="button">
                        <i class="icon-settings"></i> Hilfe</a>
                    <?php
                    $what = 'table_help_config_hint';
                    $class="tip_lu";
                    $width='400px';
                    $style='margin-left: 6px;margin-right:8px';
                    $icon='';
                    echo tooltip($what,$class, $width,  $style, $icon);
                    ?>
                @else
                    @if(is_dev())
                        <a style="margin-left:12px" class="btn btn-info" href="javascript:toggle('help_block','slide')" role="button">
                            <i class="icon-settings"></i> DEV-Hilfe</a>
                    @endif
                @endif
            </div>

            <div class="table-header-model-name">{{$this_file_title}}
                @if(is_dev()) <span class="o">at31</span> @endif
            </div>
        </div>


        <div class="card-body"{{-- style="padding:0;border-top:none;overflow:auto"--}}>
            @include('flash::message')

            {{--############################  row 1####################################################--}}
            <div class="row">
                <div class="col-6">

                    <div class="card">
                        <div class="card-header h4">
                            All Tables in Database:
                        </div>
                        <div class="card-block">
                            {{--<pre>nix</pre>--}}
                            <p>
<?php
                                //mit once every days
                                //update_null_dates_in_all_tables();

                                $tables = DB::select('SHOW TABLES');
                                //dd($tables);
                                $i=0;
                                foreach($tables as $tab)
                                {
                                    $i++;
                                    if( is_odd($i) ){
                                        $bg=' ;background:#f3f3f3; ';
                                    }else{
                                        $bg = '';
                                    }
                                    //echo $table->Tables_in_db_name;
                                    echo '<div style="padding:2px 4px;'.$bg.'">';
                                    echo '<span class="text-right" style="display:inline-block;width:28px;color:#aaa;margin-right:6px">'.$i.'. </span>';
                                    echo '<span style="width:330px;font-weight:bold;display:inline-block">';
                                    echo head($tab);
                                    echo '</span>';
                                    echo '';
                                    echo '';
                                    echo '<span style="text-align:right;margin-left:0px;display:inline-block;background:none;width:200px">';
                                    $t_count = nuf(DB::table(head($tab))->count());
                                    echo ''.$t_count.' records';

                                        //$t_table = DB::select('SHOW TABLE STATUS '.head($tab));
                                        //dd($t_table);
                                       // $t_size = DB::table(head($tab))->Data_length();

                                    //echo '/'.$t_size.' kb';

                                    echo '</span>';
                                    echo '';
                                    echo '<span style="margin-left:20px ;display:inline-block;color:blue">';
                                    echo '<a href="javascript:display_table_stru(\''.head($tab).'\')">';
                                    echo 'display this table structure';
                                    echo '</a>';
                                    echo '</span>';

                                    echo '</div>';
                                    //echo '<div>'.$table.'</div>';
                                }
?>
                            </p>
                        </div>
                    </div>{{--<div class="card">--}}
                </div>{{--<div class="col-6">--}}

                {{-- --------------------------------------------------------  --}}

                <div class="col-6">
                    <div class="card">
                        <div class="card-header h4">
                            Table Structure:
                        </div>

                            <div class="card-block">
                                <div id="disp_table_stru">
                            <p>
                                <?php echo get_table_stru('activity_log');   ?>
                            </p>

                        </div>{{--<div id="disp_table_stru">--}}
                        </div>{{--<div class="card-block">--}}
                    </div>{{--<div class="card">--}}

                </div>{{--<div class="col-6">--}}
            </div>{{--<div class="row">--}}

            <div class="row">
                <div class="col-6">

                    <div class="card">
                        <div class="card-header h4">
                            nix
                        </div>
                        <div class="card-block">
                            <pre>
//update_null_dates_in_all_tables()
//ec( all_languages_str($as_array=false) );
//ec( check_table_for_all_langs('myd_translations') );
//check_diverses_for_all_langs();
                            </pre>
                            <p>
                            </p>
                        </div>
                    </div>{{--<div class="card">--}}
                </div>{{--<div class="col-6">--}}

                <div class="col-6">
                    <div class="card">
                        <div class="card-header h4">
                            Database Maintainance
                        </div>
                        <div class="card-block">
                            {{--<pre>nix</pre>--}}
                            <p>
                            <?php
                            //$what = 'actionbox_update_null_dates_in_all_tables';
                            $what = 'actionbox_update_null_dates_all_tables';
                            echo get_actionbox_div(
                            $what,
                            $axfe_id = '120',
                            $button_title = 'Diese Aktion jetzt ausführen',
                            $with_panel = true,
                            $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                            $ax_response_with_page_reload = false,
                            $with_tooltip = true, //always false if $with_panel = true
                            $tt_class = 'tip',
                            $tt_width = '400px'
                            )
                            ?>
                            </p>

                            <p>
                                <?php
                                //$what = 'actionbox_update_null_dates_in_all_tables';
                                $what = 'actionbox_check_diverses_for_all_langs';
                                echo get_actionbox_div(
                                $what,
                                $axfe_id = '999999',
                                $button_title = 'Diese Aktion jetzt ausführen',
                                $with_panel = true,
                                $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                $ax_response_with_page_reload = false,
                                $with_tooltip = true, //always false if $with_panel = true
                                $tt_class = 'tip',
                                $tt_width = '400px'
                                )
                                ?>
                            </p>

                            <p>
                                <?php
                                //$what = 'actionbox_update_null_dates_in_all_tables';
                                $what = 'actionbox_check_mytranslation_for_all_langs';
                                echo get_actionbox_div(
                                $what,
                                $axfe_id = '999999',
                                $button_title = 'Diese Aktion jetzt ausführen',
                                $with_panel = true,
                                $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                                $ax_response_with_page_reload = false,
                                $with_tooltip = true, //always false if $with_panel = true
                                $tt_class = 'tip',
                                $tt_width = '400px'
                                )
                                ?>
                            </p>
                        </div>
                    </div>{{--<div class="card">--}}

                </div>{{--<div class="col-6">--}}

            </div>{{--<div class="row">--}}

        </div>
    </div>



@endsection
