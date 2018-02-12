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
function active_languages_str_for_diverses($as_array=false){
    $languages = get_languages();
    $r = '';
    foreach ($languages as $lang) {
        //$r .= '\''.$lang->code.'\',';
        $r .= 'div_res_'.$lang->code.',';
        $r .= 'div_res_long_'.$lang->code.',';
    }
    $r = substr($r,0,-1);
    if($as_array){
        $r_arr =explode(',',$r);
        return $r_arr;
    }
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
    if(stristr($col_name,'div_res_long_')) $col_name = str_replace('div_res_long_','',$col_name);
    if(stristr($col_name,'div_res_')) $col_name = str_replace('div_res_','',$col_name);

    $code = $col_name;

    if ($size <> '') {
        $url = url('img/icons/png_flags/32/' . $code . '.png');
    }else{
        $url = url('img/icons/png_flags/32/' . $code . '.png');
    }
    $img = '<img style="margin:0 5px;width:'.$size.'px;height:'.$size.'px" src="'.$url.'"  />';
    return $img;
}

function lang_name_from_lang_code($code)
{
    $languages = get_languages_all();
    foreach($languages as $lang) {
        if ($lang->code==$code) return $lang->name;
    }
}

function lang_dir_from_lang_code($code)
{
    $languages = get_languages_all();
    foreach($languages as $lang) {
        if ($lang->code==$code) return $lang->directory;
    }
}

