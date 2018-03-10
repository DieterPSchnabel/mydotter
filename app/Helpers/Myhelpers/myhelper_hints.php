<?php
/**
 * Created by PhpStorm.
 * User: Medion
 * Date: 23.05.2017
 * Time: 13:49
 */


/*   ............. 5 tooltips .................. */

function get_hint_by_t_key(
    $t_key,
    $text_only = false,
    $lang = ''
) {
    $ret = '';
    $session_lang_code = session_lang_code();
    $def = $t_key.'_l_'.$session_lang_code;

    //definitions: oben in helpers.php
    //show_countries_deactivated_hint_l_de
    //if (defined($def)) {
    if (1==2) {
        //$hint_txt = constant($def);
        $hint_txt = get_dv($t_key, 'div_res_long_'.$session_lang_code);
        if(trim($hint_txt)==''){
            $def = $t_key.'_l_'.env('APP_LOCALE');
            $hint_txt = env('APP_LOCALE').': '. constant($def);
        }
        //ec(__line__.': '.$hint_txt,false, 'background:#afa');
    } else {
        $hint_txt = __get_dv($t_key, 'div_res_long');
        //ec($def.': '.$hint_txt,false, 'background:#faa');
        //todo get fallback wenn leer
    }

    if ($text_only) {
        return $hint_txt;
    }
    $ret .= '<div id="'.$t_key.'_wrp" class="tt-hint-wrp">';
    $ret .= '<div class="round6 tt-innertext">';
    $ret .= $hint_txt;
    $ret .= '</div>';
    $ret .= '<div class="tt-hint-edit">';

    // open in langs
    $add_l = '&lang=all'; //defaults to session_lang()
    $add_l .= '&curr_lang'; //defaults to session_lang()

    if (dashboard_settings_show_edit_links()) {
        $ret .= '<a style="" class="tt-edit-link btn btn-link btn-xs dimmed04 " title="diesen Hinweis editieren in allen Sprachen" 
            data-fancybox data-type="iframe" data-src="' . url('/dashboard/pop1?key=' . $t_key . $add_l . '') . '" href="javascript:;">            
            <b>edit</b>';
        //check for missing translations
        if (find_missing_translation($t_key, true)) {
            $ret .= '<span style="margin-left:6px;font-size:0.7em;color:#c66">es fehlen Übersetzungen!</span>';
        }
        $ret .= '</a>';
    }
    if (is_dev()) {
        $ret .= '<div class="tt-key-disp pull-right dimmed04">'.$t_key.'</div>';
    }
    $ret .= '</div>'; /*<div class="hint_edit __dimmed04">*/

    $ret .= '</div>'; /*<div id="'.$t_key.'_wrp" class="__hint_wrp">*/
    return $ret;
}

function get_hint_by_t_key_short(
    $t_key,
    $text_only = false,
    $lang = ''
) {
    $ret = '';
    $session_lang_code = session_lang_code();
    $def = $t_key.'_'.$session_lang_code.'_s';
    //definition in routes/web.php
    if (defined($def)) {
        $hint_txt = constant($def);
        if(trim($hint_txt)==''){
            $def = $t_key.'_l_'.env('APP_LOCALE');
            $hint_txt = env('APP_LOCALE').': '. constant($def);
        }
    } else {
        $hint_txt = get_dv($t_key, 'div_res_'.$session_lang_code);
    }

    if ($text_only) {
        return $hint_txt;
    }
    $ret .= '<div id="'.$t_key.'_wrp" class="hint_wrp">';
    $ret .= $hint_txt;
    $ret .= '<div class="hint_edit dimmed04">';

    if (is_dev()) {
        $ret .= '<span class="pull-right dimmed04">'.$t_key.'</span>';
    }

    // open in langs
    $add_l = '&lang=all'; //defaults to session_lang()
    $add_l .= '&curr_lang'; //defaults to session_lang()

    $ret .= '<a class="btn btn-link btn-xs dimmed04" title="Hinweis editieren" 
            data-fancybox data-src="'.url('admin/dashboard/pop1?key='.$t_key.$add_l.'').'" href="javascript:;">            
            edit</a>
            </div>';

    $ret .= '</div>';

    return $ret;
}

//function tooltip(
function tooltip(
    $t_key,
    $class = 'tip',  // tip or tip_lu -- position -- tip = right-down -- tip_lu = left-down
    $width = '',  // with px - default 300px
    $style = '', // e.g. for margin left and right
    $icon = '' // force an icon other than default icon
)
{
    if ($icon == '') {
        $icon = '<span style="color:#20A8D8" class="dimmed06" aria-hidden=true>
        <i class="fa fa-info-circle"></i></span>';
    }
    //TODO wann mit _hint und wann ohne ??
    // rechts immer _hint
    //if(right($t_key,5) <> '_hint') $t_key = $t_key .'_hint'; //nein !!

    create_dv($t_key, $value = '', true, $field = 't_key_comment');
    $txt = get_hint_by_t_key($t_key, $text_only = false);

    //set is_hint - get_dv is cached
    if(get_dv($t_key, $field = 'is_hint')<>'1') set_dv($t_key, '1', $field = 'is_hint');

    if ((int) $width < 300) {
        $width = '300px';
    }

    if ($width <> '') {
        $width = intval($width);
        if ($class == 'tip_lu' or $class == 'tip_lo') {
            $left_margin = (225 + ($width - 225)) * -1;
        } else {
            $left_margin = '';
        }
    } else {
        $width = '300px';
    }

    $this_tip_icon = $icon;

    $style_add = '';
    if ($style <> '') {
        $style_add = ' style="'.$style.'" ';
    }

    $ident = str_random(10) . '_' . $t_key . '_center';
    if ($class == 'tip') {
        $ret = '
            <span class="'.$class.'" '.$style_add.'>
            '.$this_tip_icon.' 
            <center 

            id="'.$ident.'" class="animated zoomInRight" 
            style="line-height:160%;width:'.$width.'px;left: 3px;top:3px;font-weight:normal;"
            >'.$txt.'</center></span>    ';
    } else {
        $ret = '
            <span class="'.$class.'" '.$style_add.'>
            '.$this_tip_icon.'  
            <center id="'.$ident.'" class="animated zoomIn" style="line-height:160%;width:'.$width.'px;left:'.$left_margin.'px;top:3px;font-weight:normal">'.$txt.'</center></span>    ';
    }

    return $ret;
}
