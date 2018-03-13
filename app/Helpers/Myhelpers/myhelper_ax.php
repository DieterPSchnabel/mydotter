<?php


/*ajax*/

/*   *********************************** my ajax functions ********************************** */

/*   ............. any table 100 .................. */

/*   ............. Development & Maintenance .................. */
/*   ............. logisch .................. */
/*   ............. ajax .................. */
/*   ............. Diverses .................. */

function do_exec2($id, $para){

    switch ($id) {
        case 1:
            return '';
            break;

        case 2:
            return '';
            break;

        case 3:
            return '';
            break;

        case 4:
            return '';
            break;

        case 5:
            return '';
            break;

        case 6:
            return '';
            break;

        case 7:
            return '';
            break;

        case 8:
            return '';
            break;

        case 9:
            return '';
            break;

        case 10:
            return '';
            break;


        /*   ............. any table 100 .................. */

        case 100:
            return '';
            break;

        case 101:
            //ax_jq('/axfe', '101_nix', 'msg')  test in admintest3
            return 'dies ist die neue msg';
            break;

        case 102:
            /*
            checkbox_to_any_table(
            this.checked,
            this.id,
            'languages',
            'status',
            'id',
            '7'
            );
            */
            $teile = explode("_xyx_", $para);
            $checked = $teile[0];
            $ident = $teile[1]; //random id field in html
            $table = $teile[2];
            $field = $teile[3];
            $id_field = $teile[4];
            $id = $teile[5];
            $page_reload = $teile[6];
            $affected = DB::update("update $table set $field = '$checked', updated_at = NOW()  where $id_field = ?", [$id]);


            $c_key = $table.'.'.$field.'.'.$id_field.'.'.$id;
            if ($table == 'diverses' and is_numeric($id)) {
                //$c_key = diverses.div_res.id.63051 not good must be: diverses.div_res.div_what.is_dev
                $t_div_what = get_div_what_by_id($id);
                $c_key = $table . '.' . $field . '.' . 'div_what' . '.' . $t_div_what;
            }

            //Cache::forget( $c_key );
            //Cache::put($c_key, $checked, 1);
            cache_it($c_key,$checked);

            if($table=='languages' and $field=='status') Cache::forget( 'languages.status.1.all' );
            if($table=='languages' and $field=='status_frontend') Cache::forget( 'languages.status.1.all' );

            $return = '';

            if ($checked) {
                $ret_color = '#5CB85C';
                $ret_txt = 'gespeichert - ON';
            }else{
                $ret_color = '#ddd';
                $ret_txt = 'gespeichert - OFF';
            }
            //return $c_key; //debug cache
            $return = "<span id='ret_$ident' style='color:".$ret_color.";font-size:0.9em;vertical-align:top'>
            <i title='".$ret_txt."' class='fa fa-check'></i></span>";
            if($page_reload=='1') $return .= "<script>reload_ax();</script>";
            return $return;
            break;

        case 103:
            //function text_to_any_table(ident ,table, field, id, id_field)
            //ax_jq('/axfe','id=103_'+val+'_xyx_'+ident+'_xyx_'+table+'_xyx_'+field+'_xyx_'+id_field+'_xyx_'+id,ident+'_conf');

            $teile = explode("_xyx_", $para);
            $val = $teile[0];
            $ident = $teile[1]; //id field in html
            $table = $teile[2];
            $field = $teile[3];
            $id_field = $teile[4];
            $id = $teile[5];
            $page_reload = $teile[6];
            //dd(__line.': '.$val.' - '.$field);
            $affected = DB::update("update $table set $field = '$val', updated_at = NOW()  where $id_field = ?", [$id]);
            $c_key = $table.'.'.$field.'.'.$id_field.'.'.$id;
            //Cache::forget( $c_key );
            //Cache::put($c_key, $val, 1);
            cache_it($c_key,$val);

            //return $val only for colors
            if(substr($val,0,1)=='#') {
                $return = "<span title='gespeichert' id='ret_$ident' style='color:#5cb85c;margin-left:6px;font-size:0.9em;vertical-align:top'>
            <i class='fa fa-fw fa-check'></i> <span style='color:#000;margin-left:5px'>" . $val . "</span></span>";
            }else {
                $return = "<span title='gespeichert' id='ret_$ident' style='color:#5cb85c;margin-left:6px;font-size:0.9em;vertical-align:top'>
            <i class='fa fa-fw fa-check'></i></span>";
            }

            if($page_reload==1) $return .= '<script>reload_ax();</script>';
            return $return;
            //return $page_reload;
            break;

        case 104:
            //function date_to_any_table(ident ,table, field, id, id_field)
            //ax_jq('/axfe','id=104_'+val+'_xyx_'+ident+'_xyx_'+table+'_xyx_'+field+'_xyx_'+id_field+'_xyx_'+id,ident+'_conf');

            $teile = explode("_xyx_", $para);
            $val = $teile[0];
            $ident = $teile[1]; //id field in html
            $table = $teile[2];
            $field = $teile[3];
            $id_field = $teile[4];
            $id = $teile[5];
            $date_to_sql = $teile[6];

            if($date_to_sql =='true'){
                $locale = session_lang_code_datepicker();
                //$val = $val .' 00:00:00';
                //$val = germDateToSQL($val);
                $ts = strtotime($val);
                //$val = date("d.m.Y H:i:s", $ts);
                //if($locale=='de'){
                //$val = date("d.MM Y", $ts);
                //}else{
                //$val = date("m-d-Y", $ts);
                //}
            }

            $locale_display = '';
            if(is_dev()) $locale_display = '('.$locale.')';

            $affected = DB::update("update $table set $field = '$val', updated_at = NOW()  where $id_field = ?", [$id]);

            $c_key = $table.'.'.$field.'.'.$id_field.'.'.$id;
            //Cache::forget( $c_key );
            //Cache::put($c_key, $val, 1);
            cache_it($c_key,$val);

            if($locale=='de'){
                $val = wochentag($val).', '.date("d. M Y - H:i", $ts);
            }else{
                $val = date("M-d-Y - H:i", $ts);
            }

            $val = datestring_translate($val, $locale);

            $conf = "<span title='wurde gespeichert' id='ret_$ident' 
            style='color:#5cb85c;margin-left:12px;font-size:0.9em'>
            <i class='fa fa-fw fa-check'></i></span> <span style='font-size:0.7em'>".$locale_display."</span>";

            //$js = '<script>hide(\''.$ident.'\',\'slide\'); show(\''.$ident.'_conf\',\'slide\');</script>';
            //return $return.$val;
            return $val.$conf;
            break;

        case 105:
            $teile = explode("_xyx_", $para);
            $key = $teile[0];
            $ident = $teile[1]; //id field in html
            Cache::forget($key);

            $conf = "<span title='wurde entfernt' id='ret_$ident' 
            style='color:#5cb85c;margin-left:12px;font-size:0.9em'>
            <i class='fa fa-fw fa-check'></i></span> ";
            $conf  .= '<script>reload_ax();</script>';
            return $conf;
            break;

        case 106:
            //set_dv  countries: table.blade.php
            $teile = explode("_xyx_", $para);
            $val = $teile[0];
            $key = $teile[1]; //div_what
            //dd($key.' - '.$val);
            set_dv($key,$val);
            $return = '<script>reload_ax();</script>';
            //$return = $key.' - '.$val;
            return $return;
            break;

        case 107:
            //delete_in_table(table,id)
            $teile = explode("_xyx_", $para);
            $table = $teile[0];
            $id = $teile[1];

            //before dele all cached items run
            //forget_all_cached_fields_for($table, $id_field, $id);
            delete_in_any_table($table, $id);

            if($table == 'manufacturers'){
                //dele also...
                $sql="delete from manufacturers_info where manufacturers_id = ". $id;
                q($sql);
            }

            $return = '<script>reload_ax();</script>';

            return $return;
            //return $table +' '+$id;
            //return $para;
            break;

        case 108:

            //set_dv2
            $teile = explode("_xyx_", $para);
            $val = $teile[0];
            $key = $teile[1]; //div_what
            //dd($key);
            set_dv($key,$val);
            //$return = '<script>reload_ax();</script>';
            return $val;
            break;

        case 109:
            //update_div_what_key(what)
            $teile = explode("_xyx_", $para);
            $old_name = $teile[0];
            $new_name = $teile[1];
            $div_id = get_dv_id($old_name);
            set_dv_id($div_id, $new_name, $field = 'div_what', $lang = '');
            //$return = '<script>reload_ax();</script>';
            //$return = ' '. $old_name.' '.$new_name.' '.$div_id;
            $return = 'done';
            return $return;
            break;

        case 110:
            //$( "#tab_cols" ).on( "submit", function( event ) {
            $teile = explode("_xyx_", $para);
            $table_name = $teile[0];
            $t_key = $teile[1];
            $col_str = $teile[2];
            $col_str = substr($col_str,0,-1);
            create_dv($t_key, $value = '1', true, $field = 'div_res_long');
            set_dv($t_key, $col_str, 'div_res_long', $lang = '');

            $c_key = 'diverses' . '.' . 'div_res_long' . '.' . 'div_what' . '.' . $t_key;
            cache_it($c_key, $col_str);
            //$return = $col_str;
            //$return = $c_key;
            $return = '<script>reload_ax();</script>';
            return $return;
            break;

        case 111:
            //display_all_cols($table)
            $table = $para;
            $cols_arr = get_columns_from_table_sortable($table,$as_array=true);
            $cols_str = implode(',',$cols_arr);
            $t_key = $table.'_disp_cols_arr';
            create_dv($t_key, $value = '1', true, $field = 'div_res_long');
            set_dv($t_key, $cols_str, $field = 'div_res_long', $lang = '');
            $return = '<script>reload_ax();</script>';
            //$return = $cols_str;
            return $return;
            break;
        case 112:
            //replicate_div_what_key(what)
            $teile = explode("_xyx_", $para);
            $old_name = $teile[0];
            $new_name = $teile[1];
            //check if exists
            $anz = 0;
            $anz = App\Models\Diverses::where(['div_what' => $new_name])->count(); //where([array]) ;
            if ($anz > 0) {
                $conf = "<span title='wurde NICHT gespeichert! ' style='color:#c00;margin-left:12px;font-size:0.9em'>
            <i class=\"fa fa-exclamation-triangle fa-lg \" aria-hidden=\"true\"></i> already exists!</span>";
                $return = $conf;
                return $return;
            }
            replicate_record_by_div_what($old_name, $new_name);
            $conf = "<span title='wurde gespeichert unter ' style='color:#5cb85c;margin-left:12px;font-size:0.9em'>
            <i class='fa fa-fw fa-check'></i></span>";
            $return = $conf;
            return $return;
            break;
        case 113:
            //flush_cache(ident)
            Cache::flush();
            //$return = '<i style="color:green" class=\'fa fa-fw fa-check\'></i>';
            $return = '<script>reload_ax();</script>';
            return $return;
            break;
        case 114:
            //hide_all_cols($table)
            $table = $para;
            //$cols_arr = get_columns_from_table_sortable($table,$as_array=true);
            //$cols_str = implode(',',$cols_arr);
            $t_key = $table.'_disp_cols_arr';
            create_dv($t_key, $value = '1',true, $field = 'div_res_long');
            set_dv($t_key, 'id', $field = 'div_res_long', $lang = '');
            $return = '<script>reload_ax();</script>';
            //$return = $cols_str;
            return $return;
            break;
        case 115:
            //function drop_index(table_name,field) {
            $teile = explode("_xyx_", $para);
            $table = $teile[0];
            $index = $teile[1];
            drop_index_if_exists($table, $index);
            $return = 'done';
            return $return;
            break;
        case 116:
            //function create_index(table_name,field)
            $teile = explode("_xyx_", $para);
            $table = $teile[0];
            $index = $teile[1];
            create_index_if_not_exists($table, $index);
            $return = 'done';
            return $return;
            break;
        case 117:
            //recreate_index(table_name,field) {
            $teile = explode("_xyx_", $para);
            $table = $teile[0];
            $index = $teile[1];
            drop_index_if_exists($table, $index);
            create_index_if_not_exists($table, $index);
            $return = 'done';
            return $return;
            break;
        case 118:
            //display_table_stru(table_name) at31
            $table_name = $para;
            $return = get_table_stru($table_name);
            return $return;
            break;
        case 119:
            //get_redis_value()
            $redis_key = $para;

            if( Cache::has( $redis_key ) ) {
                $res =  Cache::get( $redis_key ) ;
               //return dd($r);
                //$res = head($r);
                if(! is_null($res) and is_array($res) and count($res)>0 ) {
                    $arr = (array)$res;
                    $field = 'div_res_long_de';
                    return $arr[0]->$field;
                }else{
                    return '<b style="font-size:1.3em;color:#c00">Fehler2 in lookup -  $t_key not exists - ex myhelper_ax</b>';
                }
            } else {
                $res = 'key not found - maybe forgotten or typo';
            }

            $return = $res.'------';
            return $return;
            break;
        case 120:
            update_null_dates_in_all_tables();
            $return = 'done';
            return $return;
            break;
        case 121:
            // js: show_only_activated_langs()
            $table = $para;
            if($table=='diverses'){
                $active_str = active_languages_str_for_diverses($as_array = false);
            }else {
                $active_str = active_languages_str($as_array = false);
            }
            $active_str = $active_str .',id,full_key,updated_at,div_what';
            set_dv($table.'_disp_cols_arr', $active_str, 'div_res_long');
            $return = '<script>reload_ax();</script>';
            return $return;
            break;

        case 1211:
            // js: show_only_key_values(table)
            $table = $para; //must be diverses
            /*if($table=='diverses'){
                $active_str = active_languages_str_for_diverses($as_array = false);
            }else {
                $active_str = active_languages_str($as_array = false);
            }*/
            $active_str = 'id,div_what,div_res,div_res_long,full_key,updated_at';
            set_dv($table . '_disp_cols_arr', $active_str, 'div_res_long');
            $return = '<script>reload_ax();</script>';

            //$return = $active_str;
            return $return;
            break;


        case 122:
            //do_transl_auto(target_lang_code, source_lang_code, ident,  method)
            //ax_jq('/axfe','id=122_'+src_text+'_xyx_'+source_lang_code+'_xyx_'+target_lang_code, target_lang_ident+'_conf');
            $teile = explode("_xyx_", $para);
            $src_text = $teile[0];
            $source_lang_code = $teile[1];
            $target_lang_code = $teile[2];
            $table = $teile[3];
            $field_type = $teile[4];
            $id_field = $teile[5];
            $id = $teile[6];
            $method = $teile[7];
            $src_text = str_replace('__xhochkx__', '\'', $src_text);


            if ($table == 'diverses') {
                if ($field_type == 'short') {
                    $field = 'div_res_' . $target_lang_code;
                    $field_in_diverses = 'div_res_';
                } else {
                    $field = 'div_res_long_' . $target_lang_code;
                    $field_in_diverses = 'div_res_long_';
                }
            } else { //  table = language_lines
                $field = $target_lang_code; //in language_lines
            }
            if ($method == 'all' or $method == 'all_empty' or $method == 'all_but_default') {
                $languages = get_languages();
                foreach ($languages as $lang) {
                    if ($lang->code <> $source_lang_code) {
                        if ($method == 'all_empty') {
                            //check if empty
                            if ($table == 'diverses') {
                                $this_search_field = $field_in_diverses . $lang->code;
                            } else {
                                $this_search_field = $lang->code;
                            }
                            $curr_content = lookup($table, $this_search_field, $id, $id_field); //reads from cache
                            if (!trim(strip_tags($curr_content)) == '') continue; //back to loop begin - don't translate
                        }
                        if ($method == 'all_but_default') {
                            $default = get_default_lang_code(); //from app config
                            if ($lang->code == $default) continue; //back to loop begin - don't translate
                        }

                        if ($table == 'diverses') {
                            $save_to_field = $field_in_diverses . $lang->code;
                        } else {
                            $save_to_field = $lang->code;
                        }

                        /*#######################################################################*/
                        $translation = translate_this($src_text, $lang->code, $source_lang_code);
                        /*#######################################################################*/
                        $affected = DB::update("update $table set $save_to_field = '$translation', updated_at = NOW()  where $id_field = ?", [$id]);
                        $c_key = $table . '.' . $save_to_field . '.' . $id_field . '.' . $id;
                        cache_it($c_key, $translation);
                    }
                }
                $return = '<script>reload_ax();</script>';
                return $return;
            }

            $translation = translate_this($src_text, $target_lang_code, $source_lang_code);
            //save to table
            $affected = DB::update("update $table set $field = '$translation', updated_at = NOW()  where $id_field = ?", [$id]);
            $c_key = $table . '.' . $field . '.' . $id_field . '.' . $id;
            cache_it($c_key, $translation);
            $return = '<script>reload_ax();</script>';
            return $return;
            break;

        case 123:

            $return = '';
            return $return;
            break;
        case 124:

            $return = '';
            return $return;
            break;
        case 125:

            $return = '';
            return $return;
            break;
        case 126:

            $return = '';
            return $return;
            break;
        case 127:

            $return = '';
            return $return;
            break;
        case 128:

            $return = '';
            return $return;
            break;
        case 129:

            $return = '';
            return $return;
            break;
        case 130:

            $return = '';
            return $return;
            break;

        case 131:

            $return = '';
            return $return;
            break;
        case 132:

            $return = '';
            return $return;
            break;

        case 133:

            $return = '';
            return $return;
            break;

        case 134:

            $return = '';
            return $return;
            break;

        case 135:

            $return = '';
            return $return;
            break;

        case 136:

            $return = '';
            return $return;
            break;

        case 137:

            $return = '';
            return $return;
            break;

        case 138:

            $return = '';
            return $return;
            break;

        case 139:

            $return = '';
            return $return;
            break;

        case 140:

            $return = '';
            return $return;
            break;








        case 200:

            $return = '';
            return $return;
            break;

        case 201:

            $return = '';
            return $return;
            break;

        case 202:

            $return = '';
            return $return;
            break;

        case 203:

            $return = '';
            return $return;
            break;

        case 204:

            $return = '';
            return $return;
            break;

        case 205:

            $return = '';
            return $return;
            break;

        case 206:

            $return = '';
            return $return;
            break;

        case 207:

            $return = '';
            return $return;
            break;

        case 208:

            $return = '';
            return $return;
            break;

        case 209:

            $return = '';
            return $return;
            break;






        case 300:

            $return = '';
            return $return;
            break;

        case 301:

            $return = '';
            return $return;
            break;

        case 302:

            $return = '';
            return $return;
            break;

        case 303:

            $return = '';
            return $return;
            break;

        case 304:

            $return = '';
            return $return;
            break;

        case 305:

            $return = '';
            return $return;
            break;

        case 306:

            $return = '';
            return $return;
            break;

        case 307:

            $return = '';
            return $return;
            break;

        case 308:

            $return = '';
            return $return;
            break;

        case 309:

            $return = '';
            return $return;
            break;







        case 400:

            $return = '';
            return $return;
            break;

        case 401:

            $return = '';
            return $return;
            break;

        case 402:

            $return = '';
            return $return;
            break;

        case 403:

            $return = '';
            return $return;
            break;

        case 404:

            $return = '';
            return $return;
            break;

        case 405:

            $return = '';
            return $return;
            break;

        case 406:

            $return = '';
            return $return;
            break;

        case 407:

            $return = '';
            return $return;
            break;

        case 408:

            $return = '';
            return $return;
            break;

        case 409:

            $return = '';
            return $return;
            break;






        case 500:

            $return = '';
            return $return;
            break;

        case 501:

            $return = '';
            return $return;
            break;

        case 502:

            $return = '';
            return $return;
            break;

        case 503:

            $return = '';
            return $return;
            break;

        case 504:

            $return = '';
            return $return;
            break;

        case 505:

            $return = '';
            return $return;
            break;

        case 506:

            $return = '';
            return $return;
            break;

        case 507:

            $return = '';
            return $return;
            break;

        case 508:

            $return = '';
            return $return;
            break;

        case 509:

            $return = '';
            return $return;
            break;










        case 600:

            $return = '';
            return $return;
            break;

        case 601:

            $return = '';
            return $return;
            break;

        case 602:

            $return = '';
            return $return;
            break;

        case 603:

            $return = '';
            return $return;
            break;

        case 604:

            $return = '';
            return $return;
            break;

        case 605:

            $return = '';
            return $return;
            break;

        case 606:

            $return = '';
            return $return;
            break;

        case 607:

            $return = '';
            return $return;
            break;

        case 608:

            $return = '';
            return $return;
            break;

        case 609:

            $return = '';
            return $return;
            break;






        case 700:

            $return = '';
            return $return;
            break;

        case 701:

            $return = '';
            return $return;
            break;

        case 702:

            $return = '';
            return $return;
            break;

        case 703:

            $return = '';
            return $return;
            break;

        case 704:

            $return = '';
            return $return;
            break;

        case 705:

            $return = '';
            return $return;
            break;

        case 706:

            $return = '';
            return $return;
            break;

        case 707:

            $return = '';
            return $return;
            break;

        case 708:

            $return = '';
            return $return;
            break;

        case 709:

            $return = '';
            return $return;
            break;








        case 800:

            $return = '';
            return $return;
            break;

        case 801:

            $return = '';
            return $return;
            break;

        case 802:

            $return = '';
            return $return;
            break;

        case 803:

            $return = '';
            return $return;
            break;

        case 804:

            $return = '';
            return $return;
            break;

        case 805:

            $return = '';
            return $return;
            break;

        case 806:

            $return = '';
            return $return;
            break;

        case 807:

            $return = '';
            return $return;
            break;

        case 808:

            $return = '';
            return $return;
            break;

        case 809:

            $return = '';
            return $return;
            break;







        case 900:

            $return = '';
            return $return;
            break;

        case 901:

            $return = '';
            return $return;
            break;

        case 902:

            $return = '';
            return $return;
            break;

        case 903:

            $return = '';
            return $return;
            break;

        case 904:

            $return = '';
            return $return;
            break;

        case 905:

            $return = '';
            return $return;
            break;

        case 906:

            $return = '';
            return $return;
            break;

        case 907:

            $return = '';
            return $return;
            break;

        case 908:

            $return = '';
            return $return;
            break;

        case 909:

            $return = '';
            return $return;
            break;







        case 999999:
            $with_page_reload = $para;

            $page_reload = '';
            if($with_page_reload) $page_reload = '<script>reload_ax();</script>';
            $return = 'test - 999999 in myhelper_ax'.$page_reload;
            return $return;
            break;

        default:

            return 'default - error in myhelper_ax <br>' . $para ;
    }

}
