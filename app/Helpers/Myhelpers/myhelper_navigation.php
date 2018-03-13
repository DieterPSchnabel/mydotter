<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25.01.2018
 * Time: 16:44
 */
function my_active_link(
    $route,
    $class,
    $title,
    $subtitle = '',
    $target = '' // _b for target="_blank"
)
{
    if($target=='_b') {
        $target = ' target="_blank" ';
    }else{
        $target = '';
    }

    $r = '<a '.$target.' class="'.$class.' ';
    $r .= active_class(Active::checkUriPattern($route));
    $r .= '" href="';
    $r .= url($route);
    $r .= '"><b style="font-weight:500">'.$title.'</b>';
    if($subtitle<>'') {
        $r .= '<div style="font-size:0.9em;opacity:0.7">';
        $r .= $subtitle;
        $r .= '</div>';
    }
    $r .= '</a>';

    return $r;
}

//function get_edit_link_short($t_key,$style='',$edit_txt_short='edit')
function get_edit_link_short($t_key, $style = '')
{
    $edit_txt_short = get_tr('edit');
    $edit_link_short = '
    <a style="'.$style.'" class="dimmed04 ml-1" title="diesen Text editieren"
    data-fancybox data-type="iframe" data-src="' . url('/dashboard/pop_div_res_short?key=' . $t_key .  '') . '" href="javascript:;">
    <sup><i>' . $edit_txt_short . '</i></sup></a>';

    return $edit_link_short;
}

function get_edit_link_short_toggler($t_key,$style='',$edit_txt_short='edit')
{
    //$edit_txt_short = 'edit';
    $edit_link_short = '
    <a style="'.$style.'" class="dimmed04 ml-1" title="diesen Text editieren (show/hide)"
     href="javascript:toggle(\''.$t_key.'\');">
    <sup><i>' . $edit_txt_short . '</i></sup></a>';
    return $edit_link_short;
}

function get_popup_icon($style=null)
{
    $r = '<i title="Popup" style="'.$style.'" class="fa fa-window-restore" aria-hidden="true"></i>';
    return $r;

}
