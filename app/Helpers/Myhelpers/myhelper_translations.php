<?php

function find_missing_translation($what, $long)
{
    $what = trim($what);
    if($long) {
        $res_field = "div_res_long_" ;
    }else{
        $res_field = "div_res_" ;
    }
    //$res = App\Models\Diverses::where('div_what', $what)->firstOrFail();
    $c_key = 'diverses.'.$what.'.'.$res_field;
    $res = Cache::remember($c_key, CACHE_MINUTES_SHORT, function () use ($what) {
        return App\Models\Diverses::where('div_what', $what)->firstOrFail();
    });
    $missing = false;
    $languages = get_languages();
    foreach($languages as $lang) {

        //$content = get_dv($res_field);
        $content = $res->$res_field;
        //ec($content);
        if( trim($content) == ''){
            $missing = true;
            break;
        }
    }
    return $missing;
}
function find_missing_translation_get_color($what, $long)
{
    $color = '';
    if(find_missing_translation($what, $long)) $color = ' style="color:red" ';
    return $color;
}
function mark_missing_translation_with_icon($what, $lang_code, $long)
{
//dd(__line__.': '.$long);
    $what = trim($what);
    if ($long) {
        $res_field = "div_res_long_" . $lang_code;
    } else {
        $res_field = "div_res_" . $lang_code;
    }

    //$res = App\Models\Diverses::where('div_what', $what)->firstOrFail();
    $c_key = 'diverses.'.$what.'.'.$res_field;
    //dd(__line__.': '.$what);
    $res = Cache::remember($c_key, CACHE_MINUTES_SHORT, function () use ($what) {
        //return App\Models\Diverses::where('div_what', $what)->firstOrFail();
        return App\Models\Diverses::where('div_what', $what)->first();
    });
    //$res = App\Models\Diverses::where('div_what', $what)->first();
    $missing = false;
    //dd($res);
    if(is_null($res)){
        $missing = true;
        $symbol = '';
        return $symbol;
    }

    //$content = get_dv($res_field);
    $content = $res->$res_field;
    //ec($content);
    if (trim($content) == '') {
        $missing = true;
    }
    $symbol = '';
    if ($missing) {
        //$symbol = ' <i title="leer!" style="margin-left:4px;color:#c00" class="fa fa-bell-slash-o" aria-hidden="true"></i> ';
        $symbol = ' <span style="margin-left:4px;color:#c66;font-size:0.8em" aria-hidden="true"><i>leer!</i></span> ';
        };
    return $symbol;
}

function mark_missing_translation_with_icon_language_lines($what, $lang_code, $long)
{
/*
    $what = trim($what);
    if ($long) {
        $res_field = "div_res_long_" . $lang_code;
    } else {
        $res_field = "div_res_" . $lang_code;
    }

    //$res = App\Models\Diverses::where('div_what', $what)->firstOrFail();
    $c_key = 'diverses.'.$what.'.'.$res_field;
    $res = Cache::remember($c_key, CACHE_MINUTES, function () use ($what) {
        return App\Models\Diverses::where('div_what', $what)->firstOrFail();
    });
    //$res = App\Models\Diverses::where('div_what', $what)->firstOrFail();
    $missing = false;


    //$content = get_dv($res_field);
    $content = $res->$res_field;
    //ec($content);
    if (trim($content) == '') {
        $missing = true;
    }
    $symbol = '';
    if ($missing) {
        //$symbol = ' <i title="leer!" style="margin-left:4px;color:#c00" class="fa fa-bell-slash-o" aria-hidden="true"></i> ';
        $symbol = ' <span style="margin-left:4px;color:#c66;font-size:0.8em" aria-hidden="true"><i>leer!</i></span> ';
    };
    return $symbol;*/
}

// strip_tag_p(get_dv( $this_table_name.'_table_top_hint','div_res_long_'.session_lang_code() ));
function get_dv_translation($what){
    $r = strip_tag_p(get_dv( $what,'div_res_long_'.session_lang_code() ));
    //dd($r);
    if(trim($r)=='') {
        $languages = get_languages();
        $lang_with_transl = '';
        foreach($languages as $lang) {
            if($lang->code <> session_lang_code()) {
                $alternative = strip_tag_p(get_dv($what, 'div_res_long_' . $lang->code));
                if ($alternative <> '') {
                    $required_lang = lang_dir_from_lang_code(session_lang_code());
                    return '<span title="Sorry! No translation found yet for '.$required_lang.'" style="color:#c33">'.$alternative.'</span>';
                }
            }
        }
        return 'no translations at all';
    }
    return $r;
}
