<?php
//todo: fallbacks (nach SortOrder oder nach Vorgaben) - mody tab stru falls nötig (diverses und translations)


function get_languages($lang='', $anz=false)
{
    if($lang=='' or $lang=='all'){
        //Cache::forget( 'languages.status.1.all' );
        $languages = Cache::remember('languages.status.1.all', CACHE_MINUTES_SHORT, function () {
            return App\Models\Languages::where('status', 1)
                ->orWhere('status_frontend', 1)
                /*->orderBy('id', 'asc')*/
                ->orderBy('sort_order', 'asc')
                ->get();
        });
    }else{
        //Cache::forget( 'languages.code.'.$lang );
        $languages = Cache::remember('languages.code.'.$lang, CACHE_MINUTES_SHORT, function () use($lang) {
            return App\Models\Languages::where('code', $lang)->get();
        });
    }
    if($anz){
        return count($languages);
    }else{
        return $languages;
    }
}

function get_languages_with_en($lang = '', $anz = false)
{
// create switch: translate_to_english_first
//if we want to use the advantage in translations to translate first into english and
//then from english into all other langs (exept default language) we must make shure that
//english is in this array

    if ($lang == '' or $lang == 'all') {
        //Cache::forget( 'languages.status.1.all' );
        $languages = Cache::remember('languages.status.1.all', CACHE_MINUTES_SHORT, function () {
            return App\Models\Languages::where('status', 1)
                ->orWhere('status_frontend', 1)
                ->orWhere('code', 'en')
                /*->orderBy('id', 'asc')*/
                ->orderBy('sort_order', 'asc')
                ->get();
        });
    } else {
        //Cache::forget( 'languages.code.'.$lang );
        $languages = Cache::remember('languages.code.' . $lang, CACHE_MINUTES_SHORT, function () use ($lang) {
            return App\Models\Languages::where('code', $lang)->get();
        });
    }
    if ($anz) {
        return count($languages);
    } else {
        return $languages;
    }
}

function get_languages_all($sorder = 'code', $rf='asc', $anz=false)
{
    if(!$anz) {
        //Cache::forget( 'all_languages' );
        $languages = Cache::remember('all_languages', CACHE_MINUTES_SHORT, function () use($sorder) {
            return App\Models\Languages::orderBy($sorder, 'asc')
                ->get();
        });
    }
    if($anz){
        return count($languages);
    }else{
        return $languages;
    }
}

function active_languages_str($as_array=false){
    $languages = get_languages();
    $r = '';
    foreach ($languages as $lang) {
        //$r .= '\''.$lang->code.'\',';
        $r .= $lang->code.',';
    }
    $r = substr($r,0,-1);
    if($as_array){
        $r_arr =explode(',',$r);
        return $r_arr;
    }
    return $r;
}

function active_languages_str_for_diverses($as_array = false, $type = 'both')
{
    //$type both short or long
    $languages = get_languages();
    $r = '';
    foreach ($languages as $lang) {
        //$r .= '\''.$lang->code.'\',';
        if ($type == 'both' or $type == 'short') $r .= 'div_res_' . $lang->code . ',';
        if ($type == 'both' or $type == 'long') $r .= 'div_res_long_' . $lang->code . ',';
    }
    $r = substr($r,0,-1);
    if($as_array){
        $r_arr =explode(',',$r);
        return $r_arr;
    }
    return $r;
}

function active_languages_str_for_diverses_raw_query()
{
    $lang_arr = active_languages_str_for_diverses($as_array = true);
    //return $lang_arr;
    $r = '';
    foreach ($lang_arr as $lang) {
        $r .= $lang . '=\'\' or ';


    }
    $r = substr($r, 0, -3);
    return $r;
}

function all_languages_str($as_array=false){
    $languages = get_languages_all();
    $r = '';
    foreach ($languages as $lang) {
        //$r .= '\''.$lang->code.'\',';
        $r .= $lang->code.',';
    }
    $r = substr($r,0,-1);
    if($as_array){
        $r_arr =explode(',',$r);
        return $r_arr;
    }
    return $r;
}

function get_app_is_multilang()
{
    return true; ///////////////////// todo DS mydotter
    //$number_languages = App\Models\Languages::where('status', 1)->count();
    $number_languages = Cache::remember('cache_this_number_languages', CACHE_MINUTES_SHORT, function () {
        return App\Models\Languages::where('status', 1)
            ->count();
    });

    //$number_languages = App\Models\Languages::where('status', 1)->count();

    if($number_languages > 1) return true;
}

function flag_icon($code,$size='32')
{
    //possible sizes: 16, 20, 30, 40
    /*
    if ($size <> '') {
        $url = url('img/icons/famfamfam_flag_icons/round1/' . $size . '/' . $code . '.png');
    }else{
        $url = url('img/icons/famfamfam_flag_icons/png/'.$code.'.png');
    }*/
    if ($size <> '') {
        $url = url('img/icons/png_flags/32/' . $code . '.png');
    }else{
        $url = url('img/icons/png_flags/32/' . $code . '.png');
    }
    $img = '<img style="margin:0 5px;width:'.$size.'px;height:'.$size.'px" src="'.$url.'"  />';
return $img;
}

function flag_icon_by_col_name($col_name,$size='24')
{
    $col = $col_name;
    if (stristr($col_name, 'div_res_long_')) $col_name = str_replace('div_res_long_', '', $col_name);
    if (stristr($col_name, 'div_res_')) $col_name = str_replace('div_res_', '', $col_name);

    $code = $col_name;

    if ($size <> '') {
        $url = url('img/icons/png_flags/32/' . $code . '.png');
    } else {
        $url = url('img/icons/png_flags/32/' . $code . '.png');
    }

    if (dashboard_settings_show_edit_links()) {
        $img = '<img class="zoom100" style="margin:0 5px;width:' . $size . 'px;height:' . $size . 'px;border:none;" src="' . $url . '"  />';
        $r = '<a title="' . get_tr("hier klicken für weitere Aktionen im Popup") . '" style="border:none;" data-fancybox data-type="iframe" ';
        $r .= 'data-src="';
        $r .= url('dashboard/pop_div_actions') . '?key=' . $col;
        $r .= '" href="javascript:;">';
        $r .= $img;
        $r .= '</a>';
        return $r;
    } else {
        $img = '<img style="margin:0 5px;width:' . $size . 'px;height:' . $size . 'px;border:none;" src="' . $url . '"  />';
        return $img;
    }
}

function lang_name_from_lang_code($code)
{
    $languages = get_languages_all();
    foreach($languages as $lang) {
        if ($lang->code == $code) return $lang->name; //todo get_tr
    }
}

function lang_dir_from_lang_code($code)
{
    $languages = get_languages_all();
    foreach($languages as $lang) {
        if ($lang->code==$code) return $lang->directory;
    }
}

function get_fallback_lang_code()
{
    return config('app.fallback_locale');
}

function get_default_lang_code()
{
    return config('app.locale');
}

function get_default_lang_name()
{
    $code = config('app.locale');
    $languages = get_languages();

    foreach ($languages as $lang) {
        $name = $lang->name;
        if ($lang->code == $code) return $name;
    }
}

function get_fallback_lang_name()
{
    $code = config('app.fallback_locale');
    $languages = get_languages();

    foreach ($languages as $lang) {
        $name = $lang->name;
        if ($lang->code == $code) return $name;
    }
}
