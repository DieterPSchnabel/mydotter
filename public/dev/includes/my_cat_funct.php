<?php
//my_cat_funct.php

/*
INSERT INTO `mh_DEV`.`diverses4` SELECT * FROM `mh_DEV`.`diverses`;    
*/
/*
setlocale(LC_TIME, "de_DE");
define('MYD_DATE_FORMAT_SHORT', '%d.%m.%Y');
define('MYD_DATE_FORMAT_LONG', '%A, %d. %B %Y');
define('MYD_DATE_FORMAT', 'd.m.Y');
define('MYD_PHP_DATE_TIME_FORMAT', 'd.m.Y H:i:s');
define('MYD_SQL_DATE_TIME_FORMAT', 'Y-m-d H:i:s');
define('MYD_DATE_TIME_FORMAT', MYD_DATE_FORMAT_SHORT . ' %H:%M:%S');*/


//include('my_cat_funct2.php');


//if($kaspersky_is_active) include('my_cat_funct_kaspersky.php');
//include('my_cat_funct_kaspersky.php');


function i_have_bearbeitungs_mode_view_right()
{

    $admin_current_ip_address = get_dv('admin_current_ip_address');

    $shop_is_in_bearbeitungs_mode_ausnahme_array = get_dv('shop_is_in_bearbeitungs_mode_ausnahme_array');
    $shop_is_in_bearbeitungs_mode_ausnahme_array = trim($shop_is_in_bearbeitungs_mode_ausnahme_array);
    $shop_is_in_bearbeitungs_mode_ausnahme_array = str_replace(' ', '', $shop_is_in_bearbeitungs_mode_ausnahme_array);

    $shop_is_in_bearbeitungs_mode_ausnahme_array1 = explode(',', $shop_is_in_bearbeitungs_mode_ausnahme_array);

    if (in_array($_SERVER['REMOTE_ADDR'], $shop_is_in_bearbeitungs_mode_ausnahme_array1) or $_SERVER['REMOTE_ADDR'] == $admin_current_ip_address or i_am_superadmin()) {
        return true;
    } else {
        return false;
    }

}


function tep_get_languages_catalog($only_inactive = false)
{
    if ($only_inactive) {
        $languages_query = tep_db_query("select languages_id, name, code, image, directory from " . TABLE_LANGUAGES . " where status=0 order by name");
    } else {
        $languages_query = tep_db_query("select languages_id, name, code, image, directory from " . TABLE_LANGUAGES . " where status=1 order by sort_order");
    }

    while ($languages = tep_db_fetch_array($languages_query)) {
        $languages_array[] = array('id' => $languages['languages_id'],
            'name' => $languages['name'],
            'code' => $languages['code'],
            'image' => $languages['image'],
            'directory' => $languages['directory']);
    }
    mysql_free_result($languages_query);
    return $languages_array;
}


function existing_translations($products_id, $field_name = 'products_name')
{


    $languages_array = array();
    $languages = tep_get_languages_catalog();

    for ($i = 0; $i < sizeof($languages); $i++) {
        $this_lang_code = $languages[$i]['code'];
        $this_lang_id = $languages[$i]['id'];
        if ($this_lang_code <> 'de') {
            $this_lang_name = $languages[$i]['name'];
            //echo lang_icon($this_lang_code) ;
            //$this_translation = lookup('select header_'.$this_lang_code.' from blocks where ID='.$id.' ','header_'.$this_lang_code);
            $this_table = 'products_description';
            $this_id_field = 'products_id';
            $this_field_name = $field_name; //!!
            $this_translation = lookup('select ' . $this_field_name . ' from ' . $this_table . ' where ' . $this_id_field . '=' . $products_id . ' and language_id =  ' . $this_lang_id, $this_field_name);
            /*
			 	$this_trans_link = 'popup_translate_anything.php?table='.$this_table.'&id_field='.$this_id_field.'&id='.$id.'&from_field='.$this_field_name.'&to_field='.$this_field_name.'_'.$this_lang_code.'&target_lang='.
				$this_lang_code.'&source_lang=de&html=1';
				lang_icon($lang,$is_current=false,$show_title=false,$size='')
				lang_icon($lang,$is_current=false,$show_title=false,$size='',$half_size=false)
				*/

            if (trim($this_translation) == '') {
                $r .= ' ' . lang_icon($this_lang_code, $is_current = false, $show_title = false, $size = '', $half_size = true) . ' <span style="color:#c00">' . $this_lang_name . ': leer</span> ';
            } else {
                // echo ' <span style="color:#161">('.$this_lang_name.') �bersetzung vorhanden &nbsp; </span><br>';
                $r .= ' ' . lang_icon($this_lang_code, $is_current = false, $show_title = false, $size = '', $half_size = true) . ' <span style="color:#999">' . $this_lang_name . ': vorhanden</span> ';
            }

        }
    }
    return $r;
}


function left_or_right_from_key($key)
{
    if (get_dv_bool($key)) {
        return 'left';
    } else {
        return 'right';

    }

}


function get_help_video_if_exists($v_key, $if_width = '100%', $if_height = '680px', $if_margins = '0 120px 10px 0', $show_title = true, $show_descr = true, $show_hr = true)
{
    if (help_video_exists($v_key)) {
        $help_video_top_folder_WS = DIR_WS_FULL . 'help_videos/';

        $vid_title = lookup('select * from help_videos2 where v_key =  "' . $v_key . '" ', 'vid_title');
        $vid_descr = lookup('select * from help_videos2 where v_key =  "' . $v_key . '" ', 'vid_desc');

        if ($show_title and $vid_title <> '') $r .= '<div style="font-size:1.2em;font-weight:bold">' . $vid_title . '</div>';
        $r .= '';

        $r .= '<iframe width="' . $if_width . '" height="' . $if_height . '" style="margin:' . $if_margins . '" src="' . $help_video_top_folder_WS . '/v_' . $v_key . '/index.html" frameborder="0" allowfullscreen></iframe>	';

        if ($show_descr and $vid_descr <> '') $r .= '<div class="round6" style="font-size:1.0em;font-weight:normal;padding:4px;border:1px #ccc solid;margin:5px 20px 10px 20px;background:#eee">
		
		<div class="round6" style="background:#ddd;padding:2px 3px;border:1px #ccc solid;margin:-21px 0 2px 12px;width:110px;text-align:center;position:absolute;font-size:0.9em">in diesem Video:</div>
		' . $vid_descr . '</div>';
        $r .= '';

        $r .= '<div style="margin:0 0 10px 20px">';
        $r .= '';

        $r .= '
<a style="float:right;margin:0 40px 0 0;font-size:0.9em" class="new" title="neues Fenster" target="_blank" href="' . $help_video_top_folder_WS . '/v_' . $v_key . '/index.html">das Video in neuem Fenster &ouml;ffnen </a>
<span style="color:#999;font-size:0.9em">Schalten Sie Ihre Lautschprecher ein um den Ton zu h&ouml;ren! Um obiges Video im Vollbild-Modus anzuzeigen klicken Sie im Video rechts unten auf X</span> 		
		';
        $r .= '</div>';
        if ($show_hr) $r .= '<hr style="margin-bottom:20px">';
        $r .= '';


        return $r;
    }
}


function help_video_exists($v_key)
{
    $help_video_top_folder_FS = DIR_FS_CATALOG . '/help_videos/';
    //$help_video_top_folder_WS = DIR_WS_FULL.'help_videos/';

    $t_folder = $help_video_top_folder_FS . '/v_' . $v_key;
    $video_exists = false;
    if (is_dir($t_folder)) {
        $v_index_file = DIR_FS_DOCUMENT_ROOT . '/help_videos/v_' . $v_key . '/index.html';
        if (file_exists($v_index_file)) {
            $video_exists = true;
            return true;
        }
    }

}


function platzhalter_to_display_video($ph)
{
    $ph_arr1 = explode('?', $ph);
    $items = $ph_arr1[1];
    $items = str_replace('#', '', $items);
    $items_arr = explode(',', $items);

    $para_arr = $items_arr[0];
    $para_arr2 = explode('=', $para_arr);
    $para = $para_arr2[1];
    //if(!is_int($para)) return 'falsche ID: '.$para;

    $prozent_arr = $items_arr[1];
    $prozent_arr2 = explode('=', $prozent_arr);
    $prozent = $prozent_arr2[1];
    $prozent = $prozent * 1;
    if (!is_int($prozent)) $prozent = 100;

    $header_arr = $items_arr[2];
    $header_arr2 = explode('=', $header_arr);
    $header = $header_arr2[1];
    if (strtolower($header) <> 'true') $header = false;

    $sub_header_arr = $items_arr[3];
    $sub_header_arr2 = explode('=', $sub_header_arr);
    $sub_header = $sub_header_arr2[1];
    if (strtolower($sub_header) <> 'true') $sub_header = false;

    //display_video($para,$prozent=100,$header=false,$sub_header=false)
    return display_video($para, $prozent, $header, $sub_header) . '&nbsp;';

}


function display_video($para, $prozent = 100, $header = false, $sub_header = false)
{
    global $is_adult_shop;

    if ($prozent < 10) $prozent = 100;
    if ($prozent > 200) $prozent = 100;


    $sql = "select * from video where id=" . $para;
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $title = $row["title"];
        $descr = $row["descr"];
        $active = $row["active"];
        $width = $row["width"];
        $height = $row["height"];
        $object = $row["link"];
        $ab18 = $row["ab18"];

        $link = $row["link"];

        $by_file = $row["by_file"];
        $by_file = to_bool($by_file);

        $code_flv = trim($row["code_flv"]);
    }
    mysql_free_result($sql_result);
    if ($is_adult_shop and !tep_session_is_registered('customer_id') and $ab18 == 1) {
        return '';
    }


    $zuf = mt_rand(100000, 100000000);
    $code_flv = str_replace('mediaplayer1', 'mediaplayer1_' . $zuf, $code_flv);

    if ($by_file) {

        if (!$header) {
            $code_flv = str_replace('>' . $title . '<', '><', $code_flv);
            $code_flv = str_replace('>' . $descr . '<', '><', $code_flv);
        }

        if (!$sub_header) {
            $code_flv = str_replace($descr, '', $code_flv);
        }

        if ($prozent <> 100) {
            $new_width = round($width / 100 * $prozent, 0);
            $new_height = round($height / 100 * $prozent, 0);

            $code_flv = str_replace('width:' . $width, 'width:' . $new_width, $code_flv);
            $code_flv = str_replace('height:' . $height, 'height:' . $new_height, $code_flv);

            $code_flv = str_replace('width: ' . $width, 'width:' . $new_width, $code_flv);
            $code_flv = str_replace('height: ' . $height, 'height:' . $new_height, $code_flv);

        }

        return $code_flv;
    } else {

        if ($prozent <> 100) {
            $old_width = TextBetween('width="', '"', $link);
            $old_height = TextBetween('height="', '"', $link);


            $new_width = round($width / 100 * $prozent, 0);
            $new_height = round($height / 100 * $prozent, 0);

            $link = str_replace('width="' . $old_width . '"', 'width="' . $new_width . '"', $link);
            $link = str_replace('height="' . $old_height . '"', 'height="' . $new_height . '"', $link);

        }

        return $link;

    }
}

function indiv_porto_country_name($countries_id)
{
    $sql = "select countries_name from countries where countries_id =  " . $countries_id;
    return lookup($sql, 'countries_name');
}


function indiv_porto_active_t_country($countries_id)
{
    $sql = "select indiv_porto_active from countries where countries_id =  " . $countries_id;
    return to_bool(lookup($sql, 'indiv_porto_active'));
}

function indiv_porto($countries_id)
{
    $sql = "select indiv_porto from countries where countries_id =  " . $countries_id;
    $porto = lookup($sql, 'indiv_porto');
    return $porto;
}

function indiv_porto_freigrenze($countries_id)
{
    $sql = "select indiv_porto_freigrenze from countries where countries_id =  " . $countries_id;
    $porto_freigrenze = lookup($sql, 'indiv_porto_freigrenze');
    return $porto_freigrenze;
}

function redirectTohttps()
{
    global $HTTPS_is_active_local;
    if (to_bool($HTTPS_is_active_local)) {
        if ($_SERVER['HTTPS'] != 'on') {
            $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            header('Location:' . $redirect);
        }
    }
}


function get_HTTP()
{
    global $HTTPS_is_active_local;
    if (to_bool($HTTPS_is_active_local)) {
        return ('https://');
    } else {
        return ('http://');
    }
}


/*
function add_gms_wz_tooltip($small_img,$large_img,$l_img_width='300',$l_img_height='400',$href='#', $target='',$s_img_width='',$s_img_height='', $class='',
$is_new=false, $new_m_left='17',$new_m_top='3', $is_available_again=false, $is_hot=false, $is_sold_out=false, $keep_img_size=false, $is_rare=false,$is_product_info=false){
*/
function add_gms_wz_tooltip($medium_img)
{
//global $img_tag_left_blue, $img_tag_left_green,$img_tag_left_red,$img_tag_left_grey,$img_tag_left_rare, $at_use_wz_tooltips_product_info;


    $m_img_width = get_img_size_str(img_path_to_ws_path($medium_img), $what = 0);
    $m_img_height = get_img_size_str(img_path_to_ws_path($medium_img), $what = 1);

    $medium_img_WS = FS_to_WS($medium_img);

    $BORDERCOLOR = '#666666';
    $BGCOLOR = '#eeeeee';
    $FADEIN = '360';
    $FADEOUT = '210';
    $SHADOW = 'false';
    $SHADOWCOLOR = '#C5D6FC';

    $this_font_size = '12px';
    $img_txt = '<br>' . CLICK_FOR_IMG_GALLERY_LARGE;

    /*
	$r="<a  href=\"".$href."\" class=\"_startseitename lightwindow\" rel=\"Random[BildL]\" caption=\"".IMG_GALLERY_LIGHTWINDOW_HINT."\"
          onmouseover=\"Tip('&lt;img src=\'".$large_img."\' width=\'".$l_img_width."\' height=\'".$l_img_height."\' /&gt; ".$img_txt."', BORDERCOLOR, '".$BORDERCOLOR."', BGCOLOR, '".$BGCOLOR."', OPACITY, '99',
		  FADEIN, '".$FADEIN."', FADEOUT, '".$FADEOUT."', FONTSIZE, '".$this_font_size."', FONTWEIGHT, 'normal', SHADOW, ".$SHADOW.", SHADOWCOLOR, '".$SHADOWCOLOR."', PADDING, '0');\"
          onmouseout=\"UnTip();\">";

*/

    $r = "  onmouseover=\"Tip('&lt;img src=\'" . $medium_img_WS . "\' width=\'" . $m_img_width . "\' height=\'" . $m_img_height . "\' /&gt; " . $img_txt . "', BORDERCOLOR, '" . $BORDERCOLOR . "', BGCOLOR, '" . $BGCOLOR . "', OPACITY, '99', 
		  FADEIN, '" . $FADEIN . "', FADEOUT, '" . $FADEOUT . "', FONTSIZE, '" . $this_font_size . "', FONTWEIGHT, 'normal', SHADOW, " . $SHADOW . ", SHADOWCOLOR, '" . $SHADOWCOLOR . "', PADDING, '0');\"
          onmouseout=\"UnTip();\" ";


    $r .= '';
    $r .= '';
    $r .= '';
    $r .= '';


    return $r;

//ec(__line__.' '.$small_img);
//ec(__line__.' '.$s_img_width);
//ec(__line__.' '.$s_img_height);
    /*
ec(__line__.' '.to_fs($img_url).$limg);
//ec(__line__.' '.$wz_large_img_width);
//ec(__line__.' '.$wz_large_img_height);
ec(__line__.' '.$wz_large_img_str);

ec(__line__.' '.$resize_width);
ec(__line__.' '.$resize_height);

*/
// wenn resize small img:
    $s_img_width_str = '';
    $s_img_height_str = '';
    if ($s_img_width <> '') {
        $s_img_width_str = ' width="' . $s_img_width . '" ';
        $img_is_scaled_by_width = true;
    } else {
        if ($s_img_height <> '') {
            $s_img_height_str = ' height="' . $s_img_height . '" ';
            $img_is_scaled_by_height = true;
        } else {
            $s_img_width = get_img_size_str(img_path_to_ws_path($small_img), $what = 0);
            $s_img_height = get_img_size_str(img_path_to_ws_path($small_img), $what = 1);
//ec(__line__.' '.$s_img_width);
//ec(__line__.' '.$s_img_height);

            $img_is_scaled_by_width = false;
            $img_is_scaled_by_height = false;
        }
    }

    if ($s_img_height <> '') {
        $s_img_height_str = ' height="' . $s_img_height . '" ';
    } else {
        $s_img_height = get_img_size_str(img_path_to_ws_path($small_img), $what = 1);
    }

//ec('i: '.img_path_to_ws_path($small_img));
//ec('sw: '.$s_img_width);
//ec('sh: '.$s_img_height);
//ec('shst: '.$s_img_height_str);

    if ($img_is_scaled_by_width) {
        $real_s_img_width = get_img_size_str(img_path_to_ws_path($small_img), $what = 0);
        if ($real_s_img_width > 0) {
            $factor = $s_img_width / $real_s_img_width;
        } else {
            $factor = 1;
        }
        $s_img_height = round($s_img_height * $factor, 0);
    } else {
        if ($img_is_scaled_by_height) {
            //ec('scaled by height');
            $real_s_img_height = get_img_size_str(img_path_to_ws_path($small_img), $what = 1);
            //ec('real_s_img_height: '.$real_s_img_height);

            $real_s_img_width = get_img_size_str(img_path_to_ws_path($small_img), $what = 0);
            //ec(__line__.' : '.$small_img);
            //ec(__line__.' : '.img_path_to_ws_path($small_img));


            //ec(__line__.' real_s_img_width: '.$real_s_img_width);
            //$factor = $real_s_img_width/$real_s_img_height;
            if ($real_s_img_height > 0) {
                $factor = $s_img_height / $real_s_img_height;
            } else {
                $factor = 1;
            }
            //ec($factor);
            //$s_img_width = round($s_img_width*$factor,0);
            $s_img_width = round($real_s_img_width * $factor, 0);
            $s_img_width_str = ' width="' . $s_img_width . '" ';
        }
    }
//ec('scaled height: '.$s_img_height);
//ec('scaled width: '.$s_img_width);

    $img_txt = '';

    //$l_img_width = get_img_size_str(DIR_FS_CATALOG.'' .$large_img,$what=0);
    //$l_img_height = get_img_size_str(DIR_FS_CATALOG.'' .$large_img,$what=1);

    $l_img_width = get_img_size_str(img_path_to_ws_path($large_img), $what = 0);
    $l_img_height = get_img_size_str(img_path_to_ws_path($large_img), $what = 1);


//ec('path: ' .img_path_to_ws_path($large_img));
//ec('liw: '.$l_img_width);
//ec(__line__.': lih: '.$l_img_height);

    if ($class == '') {
        $this_img_style = 'margin:1px 2px;border:none';
    } else {
        $this_img_style = '';
    }

    /*
$r="
<a ".$target." href=\"".$href."\" class=\"startseitename\"
          onmouseover=\"Tip('&lt;img src=\'".$large_img."\' width=\'".$l_img_width."\' height=\'".$l_img_height."\' /&gt; ".$img_txt."', BORDERCOLOR, '".$BORDERCOLOR."', BGCOLOR, '".$BGCOLOR."', OPACITY, '99', FADEIN, '".$FADEIN."', FADEOUT, '".$FADEOUT."', FONTSIZE, '12pt', FONTWEIGHT, 'bold', SHADOW, ".$SHADOW.", SHADOWCOLOR, '".$SHADOWCOLOR."', PADDING, '0');\"
          onmouseout=\"UnTip();\">
<img ".$class." style=\"".$this_img_style."\" ".$s_img_width_str." ".$l_img_width_str." src=\"".$small_img."\"   /></a>";
*/

//ec(__line__.' href: '.$href);
//ec(__line__.' class: '.$class);

    if ($is_product_info) {
        db_tr('CLICK_FOR_IMG_GALLERY_LARGE', 'general', 'de', 'Klicken f&uuml;r Bilder-Galerie mit sehr grossen Bildern.');
        $img_txt = '<br> ' . CLICK_FOR_IMG_GALLERY_LARGE;
        $this_img_width = get_img_size_str(img_path_to_ws_path($large_img), $what = 0);
//ec(__line__.': '.$this_img_width);
        $this_font_size = '10pt';
        if ($this_img_width < 350) $this_font_size = '9pt';
        $xl_large_img = str_replace('/subimage_medium/', '/subimage_large/', $large_img);
        $xl_large_img = str_replace('/medium/bside_', '/large/bside_', $xl_large_img);

//ec(__line__.': '.$this_img_width);
//ec(__line__.': '.$this_font_size);

        //ec(__line__.': '.$xl_large_img);
        $href = DIR_WS_FULL . $xl_large_img;
        //ec(__line__.': '.$href);
        //title=\"Bilder-Galerie\"
        $r = "<a  href=\"" . $href . "\" class=\"_startseitename lightwindow\" rel=\"Random[BildL]\" caption=\"" . IMG_GALLERY_LIGHTWINDOW_HINT . "\" 
          onmouseover=\"Tip('&lt;img src=\'" . $large_img . "\' width=\'" . $l_img_width . "\' height=\'" . $l_img_height . "\' /&gt; " . $img_txt . "', BORDERCOLOR, '" . $BORDERCOLOR . "', BGCOLOR, '" . $BGCOLOR . "', OPACITY, '99', 
		  FADEIN, '" . $FADEIN . "', FADEOUT, '" . $FADEOUT . "', FONTSIZE, '" . $this_font_size . "', FONTWEIGHT, 'normal', SHADOW, " . $SHADOW . ", SHADOWCOLOR, '" . $SHADOWCOLOR . "', PADDING, '0');\"
          onmouseout=\"UnTip();\">";

    } else {
        if (stristr($large_img, 'blocks/m_block_img_')) {
            $large_img_FS = WS_to_FS($large_img);
            $l_img_width = get_img_size_str($large_img_FS, $what = 0);
            $l_img_height = get_img_size_str($large_img_FS, $what = 1);
        }


        $r = "<a " . $target . " href=\"" . $href . "\" class=\"startseitename\" 
          onmouseover=\"Tip('&lt;img src=\'" . $large_img . "\' width=\'" . $l_img_width . "\' height=\'" . $l_img_height . "\' /&gt; " . $img_txt . "', BORDERCOLOR, '" . $BORDERCOLOR . "', BGCOLOR, '" . $BGCOLOR . "', OPACITY, '99', 
		  FADEIN, '" . $FADEIN . "', FADEOUT, '" . $FADEOUT . "', FONTSIZE, '12pt', FONTWEIGHT, 'bold', SHADOW, " . $SHADOW . ", SHADOWCOLOR, '" . $SHADOWCOLOR . "', PADDING, '0');\"
          onmouseout=\"UnTip();\">";

    }

    //attr_img($is_new, $is_sold_out, $is_hot, $is_available_again, $s_img_width, $s_img_height, $show_large_icon=false, $is_rare=false, $is_attr6=false, $is_attr7=false, $is_attr8=false, $is_attr9=false, $is_attr10=false )
    $r .= attr_img($is_new, $is_sold_out, $is_hot, $is_available_again, $s_img_width, $s_img_height, false, $is_rare, $is_attr6, $is_attr7, $is_attr8, $is_attr9, $is_attr10);

    if ($is_sold_out) $sold_out_style = ';opacity:0.4';

//ec(__line__.': '.$s_img_width_str);
//ec(__line__.': '.$l_img_width_str);
//ec(__line__.': '.$s_img_height_str);
//ec(__line__.': '.$l_img_height_str);
//ec(__line__.': '.$this_img_style.$sold_out_style);

    if ($img_is_scaled_by_width) {
        $r .= "<img " . $class . " style=\"" . $this_img_style . $sold_out_style . "\" " . $s_img_width_str . " " . $s_img_height_str . " src=\"" . $small_img . "\"   />";
    } else {
        if ($keep_img_size) {
            $r .= "<img " . $class . " style=\"" . $this_img_style . $sold_out_style . "\" " . $s_img_width_str . " " . $s_img_height_str . " src=\"" . $small_img . "\"   />";
        } else {
            $r .= "<img " . $class . " style=\"" . $this_img_style . $sold_out_style . "\" " . $s_img_width_str . " " . $s_img_height_str . " src=\"" . $small_img . "\"  width=\"" . SMALL_IMAGE_WIDTH . "\" height=\"" . SMALL_IMAGE_HEIGHT . "\" />";
        }
    }
    $r .= "</a>";

    return $r;
}


function gms_wz_tooltip(
    $small_img,
    $large_img,
    $l_img_width = '300',
    $l_img_height = '400',
    $href = '#',
    $target = '',
    $s_img_width = '',
    $s_img_height = '',
    $class = '',
    $is_new = false,
    $new_m_left = '17',
    $new_m_top = '3',
    $is_available_again = false,
    $is_hot = false,
    $is_sold_out = false,
    $keep_img_size = false,
    $is_rare = false,
    $is_product_info = false,
    $is_attr6 = false,
    $is_attr7 = false,
    $is_attr8 = false,
    $is_attr9 = false,
    $is_attr10 = false,
    $allow_attribut_images = true)
{
//$allow_attribut_images
    global $img_tag_left_blue, $img_tag_left_green, $img_tag_left_red, $img_tag_left_grey, $img_tag_left_rare, $at_use_wz_tooltips_product_info;

//ec(__line__.': '.$allow_attribut_images);

    $BORDERCOLOR = '#666666';
    $BGCOLOR = '#eeeeee';
    $FADEIN = '360';
    $FADEOUT = '210';
    $SHADOW = 'false';
    $SHADOWCOLOR = '#C5D6FC';

//ec(__line__.' '.$small_img);
//ec(__line__.' '.$s_img_width);
//ec(__line__.' '.$s_img_height);
    /*
ec(__line__.' '.to_fs($img_url).$limg);
//ec(__line__.' '.$wz_large_img_width);
//ec(__line__.' '.$wz_large_img_height);
ec(__line__.' '.$wz_large_img_str);

ec(__line__.' '.$resize_width);
ec(__line__.' '.$resize_height);

*/
// wenn resize small img:
    $s_img_width_str = '';
    $s_img_height_str = '';
    if ($s_img_width <> '') {
        $s_img_width_str = ' width="' . $s_img_width . '" ';
        $img_is_scaled_by_width = true;
    } else {
        if ($s_img_height <> '') {
            $s_img_height_str = ' height="' . $s_img_height . '" ';
            $img_is_scaled_by_height = true;
        } else {
            $s_img_width = get_img_size_str(img_path_to_ws_path($small_img), $what = 0);
            $s_img_height = get_img_size_str(img_path_to_ws_path($small_img), $what = 1);
//ec(__line__.' '.$s_img_width);
//ec(__line__.' '.$s_img_height);

            $img_is_scaled_by_width = false;
            $img_is_scaled_by_height = false;
        }
    }

    if ($s_img_height <> '') {
        $s_img_height_str = ' height="' . $s_img_height . '" ';
    } else {
        $s_img_height = get_img_size_str(img_path_to_ws_path($small_img), $what = 1);
    }

//ec('i: '.img_path_to_ws_path($small_img));
//ec('sw: '.$s_img_width);
//ec('sh: '.$s_img_height);
//ec('shst: '.$s_img_height_str);

    if ($img_is_scaled_by_width) {
        $real_s_img_width = get_img_size_str(img_path_to_ws_path($small_img), $what = 0);
        if ($real_s_img_width > 0) {
            $factor = $s_img_width / $real_s_img_width;
        } else {
            $factor = 1;
        }
        $s_img_height = round($s_img_height * $factor, 0);
    } else {
        if ($img_is_scaled_by_height) {
            //ec('scaled by height');
            $real_s_img_height = get_img_size_str(img_path_to_ws_path($small_img), $what = 1);
            //ec('real_s_img_height: '.$real_s_img_height);

            $real_s_img_width = get_img_size_str(img_path_to_ws_path($small_img), $what = 0);
            //ec(__line__.' : '.$small_img);
            //ec(__line__.' : '.img_path_to_ws_path($small_img));


            //ec(__line__.' real_s_img_width: '.$real_s_img_width);
            //$factor = $real_s_img_width/$real_s_img_height;
            if ($real_s_img_height > 0) {
                $factor = $s_img_height / $real_s_img_height;
            } else {
                $factor = 1;
            }
            //ec($factor);
            //$s_img_width = round($s_img_width*$factor,0);
            $s_img_width = round($real_s_img_width * $factor, 0);
            $s_img_width_str = ' width="' . $s_img_width . '" ';
        }
    }
//ec('scaled height: '.$s_img_height);
//ec('scaled width: '.$s_img_width);

    $img_txt = '';

    //$l_img_width = get_img_size_str(DIR_FS_CATALOG.'' .$large_img,$what=0);
    //$l_img_height = get_img_size_str(DIR_FS_CATALOG.'' .$large_img,$what=1);

    $l_img_width = get_img_size_str(img_path_to_ws_path($large_img), $what = 0);
    $l_img_height = get_img_size_str(img_path_to_ws_path($large_img), $what = 1);


//ec('path: ' .img_path_to_ws_path($large_img));
//ec('liw: '.$l_img_width);
//ec(__line__.': lih: '.$l_img_height);

    if ($class == '') {
        $this_img_style = 'margin:1px 2px;border:none';
    } else {
        $this_img_style = '';
    }

    /*
$r="
<a ".$target." href=\"".$href."\" class=\"startseitename\"
          onmouseover=\"Tip('&lt;img src=\'".$large_img."\' width=\'".$l_img_width."\' height=\'".$l_img_height."\' /&gt; ".$img_txt."', BORDERCOLOR, '".$BORDERCOLOR."', BGCOLOR, '".$BGCOLOR."', OPACITY, '99', FADEIN, '".$FADEIN."', FADEOUT, '".$FADEOUT."', FONTSIZE, '12pt', FONTWEIGHT, 'bold', SHADOW, ".$SHADOW.", SHADOWCOLOR, '".$SHADOWCOLOR."', PADDING, '0');\"
          onmouseout=\"UnTip();\">
<img ".$class." style=\"".$this_img_style."\" ".$s_img_width_str." ".$l_img_width_str." src=\"".$small_img."\"   /></a>";
*/

//ec(__line__.' href: '.$href);
//ec(__line__.' class: '.$class);

    if ($is_product_info) {
        db_tr('CLICK_FOR_IMG_GALLERY_LARGE', 'general', 'de', 'Klicken f&uuml;r Bilder-Galerie mit sehr grossen Bildern.');
        $img_txt = '<br> ' . CLICK_FOR_IMG_GALLERY_LARGE;
        $this_img_width = get_img_size_str(img_path_to_ws_path($large_img), $what = 0);
//ec(__line__.': '.$this_img_width);
        $this_font_size = '10pt';
        if ($this_img_width < 350) $this_font_size = '9pt';
        $xl_large_img = str_replace('/subimage_medium/', '/subimage_large/', $large_img);
        $xl_large_img = str_replace('/medium/bside_', '/large/bside_', $xl_large_img);

//ec(__line__.': '.$this_img_width);
//ec(__line__.': '.$this_font_size);

        //ec(__line__.': '.$xl_large_img);
        $href = DIR_WS_FULL . $xl_large_img;
        //ec(__line__.': '.$href);
        //title=\"Bilder-Galerie\"
        $r = "<a  href=\"" . $href . "\" class=\"_startseitename lightwindow\" rel=\"Random[BildL]\" caption=\"" . IMG_GALLERY_LIGHTWINDOW_HINT . "\" 
          onmouseover=\"Tip('&lt;img src=\'" . $large_img . "\' width=\'" . $l_img_width . "\' height=\'" . $l_img_height . "\' /&gt; " . $img_txt . "', BORDERCOLOR, '" . $BORDERCOLOR . "', BGCOLOR, '" . $BGCOLOR . "', OPACITY, '99', 
		  FADEIN, '" . $FADEIN . "', FADEOUT, '" . $FADEOUT . "', FONTSIZE, '" . $this_font_size . "', FONTWEIGHT, 'normal', SHADOW, " . $SHADOW . ", SHADOWCOLOR, '" . $SHADOWCOLOR . "', PADDING, '0');\"
          onmouseout=\"UnTip();\">";

    } else {
        if (stristr($large_img, 'blocks/m_block_img_')) {
            $large_img_FS = WS_to_FS($large_img);
            $l_img_width = get_img_size_str($large_img_FS, $what = 0);
            $l_img_height = get_img_size_str($large_img_FS, $what = 1);
        }


        $r = "<a " . $target . " href=\"" . $href . "\" class=\"startseitename\" 
          onmouseover=\"Tip('&lt;img src=\'" . $large_img . "\' width=\'" . $l_img_width . "\' height=\'" . $l_img_height . "\' /&gt; " . $img_txt . "', BORDERCOLOR, '" . $BORDERCOLOR . "', BGCOLOR, '" . $BGCOLOR . "', OPACITY, '99', 
		  FADEIN, '" . $FADEIN . "', FADEOUT, '" . $FADEOUT . "', FONTSIZE, '12pt', FONTWEIGHT, 'bold', SHADOW, " . $SHADOW . ", SHADOWCOLOR, '" . $SHADOWCOLOR . "', PADDING, '0');\"
          onmouseout=\"UnTip();\">";

    }

    //attr_img($is_new, $is_sold_out, $is_hot, $is_available_again, $s_img_width, $s_img_height, $show_large_icon=false, $is_rare=false, $is_attr6=false, $is_attr7=false, $is_attr8=false, $is_attr9=false, $is_attr10=false )
    if ($allow_attribut_images) $r .= attr_img($is_new, $is_sold_out, $is_hot, $is_available_again, $s_img_width, $s_img_height, false, $is_rare, $is_attr6, $is_attr7, $is_attr8, $is_attr9, $is_attr10);

    if ($is_sold_out) $sold_out_style = ';opacity:0.4';

//$s_img_width_str = ' width="120" ';
//ec(__line__.': '.$s_img_width_str);
//ec(__line__.': '.$l_img_width_str);
//ec(__line__.': '.$s_img_height_str); //////
//ec(__line__.': '.$l_img_height_str);
//ec(__line__.': '.$this_img_style.$sold_out_style);

    if ($img_is_scaled_by_width) {
        $r .= "<img " . $class . " style=\"" . $this_img_style . $sold_out_style . "\" " . $s_img_width_str . " " . $s_img_height_str . " src=\"" . $small_img . "\"   />";
    } else {
        if ($keep_img_size) {
            $r .= "<img " . $class . " style=\"" . $this_img_style . $sold_out_style . "\" " . $s_img_width_str . " " . $s_img_height_str . " src=\"" . $small_img . "\"   />";
        } else {

//ec(__line__.' img_is_scaled_by_width: '.$img_is_scaled_by_width);
//ec(__line__.' keep_img_size: '.$keep_img_size);

            $r .= "<img " . $class . " style=\"" . $this_img_style . $sold_out_style . "\" " . $s_img_width_str . " " . $s_img_height_str . " src=\"" . $small_img . "\"  width=\"" . SMALL_IMAGE_WIDTH . "\" height=\"" . SMALL_IMAGE_HEIGHT . "\" />";
        }
    }
    $r .= "</a>";

    return $r;
}


function admin_log()
{
    global $activity_logging;

    if (to_bool($activity_logging)) {
        $curPageName = curPageName();
        $curPageQueryString = curPageQueryString();
        $datum = date("Y-m-d H:m:s", $timestamp);;
        $ip = $_SERVER['REMOTE_ADDR'];
        $user = admin_status();


        $sql = "insert into admin_log set 
	user = '$user',
	ip= '$ip',
	zeitstempel = NOW(),
	page = '$curPageName',
	paras = '$curPageQueryString'
	";
        if ($curPageName <> 'ax_updater.php') q($sql);
    }
}

function admin_log_shop($user)
{
    global $activity_logging;
    if (to_bool($activity_logging)) {
        $curPageName = curPageName();
        $curPageQueryString = curPageQueryString();
        $datum = date("Y-m-d H:m:s", $timestamp);;
        $ip = $_SERVER['REMOTE_ADDR'];
        //$user = 'Superadmin (S)';
        $user = $user;

        $sql = "insert into admin_log set 
	user = '$user',
	ip= '$ip',
	zeitstempel = NOW(),
	page = '$curPageName',
	paras = '$curPageQueryString'
	";
        if ($curPageName <> 'ax_updater.php') q($sql);
    }
}


function what_kind_of_assi($url)
{
    $kind_of_assi = 'Manager';
    if (stristr($url, 'includes/quick_config_design/')) $kind_of_assi = 'Design-Assi';
    if (stristr($url, 'quick_config_new/template1.php')) $kind_of_assi = 'Konfig-Assi';
    if (stristr($url, '?incl=includes/quick_config_includes/products_display')) $kind_of_assi = 'Konfig-&Uuml;bersicht';
    if (stristr($url, '/define_')) $kind_of_assi = 'editierbare Seite';

    return $kind_of_assi;
}

function get_lw_link_button_assi(
// assis in catalog als lw
//js: open_lw_assi(url,tit,w1,h1)
    $assi_url = '',
    $goto = '',
    $help_key = '',
    $button_text = '',
    $button_class = '',
    $button_title = '',
    $pop_title = '',
    $width = '',
    $height = '',
    $button_style = '',
    $icon_size = '',
    $show_help_icon = true
)
{

    global $wizard_icon10, $wizard_icon13, $wizard_icon16, $themes_icon10, $themes_icon13, $themes_icon16, $help_13_icon, $help_16_icon, $help_24_icon, $edit_this_icon10, $edit_this_icon13, $edit_this_icon16, $manager_icon, $manager_icon13;
    $goto = trim($goto);
    $help_key = trim($help_key);
    $assi_url = trim($assi_url);

    $kind_of_assi = what_kind_of_assi($assi_url);

    //$assi_url = str_replace('admin6093/wrapper_full.php?incl=','',$assi_url);

    if (!stristr($assi_url, 'admin6093/') and $assi_url <> '') $assi_url = 'admin6093/' . $assi_url;

    $assi_url = str_replace('admin6093/wrapper_full.php?incl=', '', $assi_url);
    $assi_url = str_replace('&use_header=1', '&use_header=0', $assi_url);

    $this_icon = $wizard_icon13;
    if ($icon_size == '16') $this_icon = $wizard_icon16;
    if ($icon_size == '10') $this_icon = $wizard_icon10;
    if ($kind_of_assi == 'Design-Assi') {
        $this_icon = $themes_icon13;
        if ($icon_size == '16') $this_icon = $themes_icon16;
        if ($icon_size == '10') $this_icon = $themes_icon10;
    }
    if ($kind_of_assi == 'Konfig-&Uuml;bersicht') {
        //$this_icon = $themes_icon13;
        //if($icon_size=='16') $this_icon = $themes_icon16;
    }


    $href = $assi_url;
    if ($goto <> '' and !stristr($href, '#')) $href = $href . '#' . $goto;
    if ($goto <> '' and $button_title == '') $button_title = lookup('select assi_title from diverses where div_what =  \'' . $goto . '\'  ', 'assi_title ');

    // open_lw_assi_transl_bg_txt(url,tit,w1,h1){  ohne Zusatz bei der URL
    if (is_admin_area()) {
        $jscript = 'open_lw_assi_admin';
    } else {
        $jscript = 'open_lw_assi';
    }

    if ($kind_of_assi == 'editierbare Seite' or $kind_of_assi == 'Manager') {
        $jscript = 'open_lw_assi_transl_bg_txt';
        $this_icon = $manager_icon13;
        if ($icon_size == '16') $this_icon = $manager_icon;
        $this_icon = '' . $this_icon;
        $width = '2000';
        $height = '1200';
        if (stristr($href, '?')) {
            $href = $href . '&use_header=0';
        } else {
            $href = $href . '?use_header=0';
        }

        if (curPageName() <> 'wrapper_full.php') $href = str_replace('admin6093/', '', $href);
        //ec($href);
        $manager_name = manger_name_from_manager_url($href);
        if ($manager_name <> '') $kind_of_assi = $manager_name;
    }


    $r = '<a style="' . $button_style . ';padding:4px" class="' . $button_class . '" title="' . $kind_of_assi . ' Popup<br>' . $button_title . '" href="javascript:' . $jscript . '(\'' . $href . '\',\'' . $pop_title . '\',\'' . $width . '\',\'' . $height . '\')">';
    $r .= $this_icon . $button_text;
    $r .= '</a>';
    //$r .= ' '.$href;


    if ($help_key <> '' and $show_help_icon) $r .= get_lw_link_button_help(
    // help in catalog als lw
    //js: open_lw_help(url,tit,w1,h1)
        $help_key,
        $button_text,
        $button_class,
        $width = '',
        $height = '',
        $button_style = '',
        $icon_size = '16',
        $style = 'margin:0;padding:4px 4px 0px 2px'
    );


    return $r;
}


function get_lw_link_button_help(
// help in catalog als lw
//js: open_lw_help(url,tit,w1,h1)
    $help_key = '',
    $button_text = '',
    $button_class = 'button99',

    $width = '',
    $height = '',
    $button_style = '',
    $icon_size = '',
    $style = ''
)
{

    global $help_13_icon, $help_16_icon, $help_24_icon, $show_empty_help_links_active;

    $help_key = trim($help_key);

    if ($help_key <> '' and $help_key <> 'xxx') {

        $this_icon = $help_13_icon;
        if ($icon_size == '16') $this_icon = $help_16_icon;
        if ($icon_size == '24') $this_icon = $help_24_icon;
        //if($button_txt = '' and $this_icon == $help_13_icon) $this_icon = $help_16_icon;

        $hitem_txt = get_help_topic_plain($help_key);
        $pop_title = $hitem_txt;
        if ($button_text <> '') $button_text = ' ' . $button_text;

        $href = 'help_new/help1.php&hitem=' . $help_key . '&hitem_txt=' . $hitem_txt . '&disallow_new_window=1';


        if (is_admin_area()) {
            $jscript = 'open_lw_help_admin';
        } else {
            $jscript = 'open_lw_help';
        }


        $r = '<a style="' . $style . ';vertical-align:-14% ;display:inline-block;margin-right:4px" class="' . $button_class . '" title="Hilfe-Popup: ' . $pop_title . '" href="javascript:' . $jscript . '(\'' . $href . '\',\'' . $pop_title . '\',\'' . $width . '\',\'' . $height . '\')">';
        $r .= $this_icon . $button_text;
        $r .= '</a>';

        return $r;
    } else {
        if ($show_empty_help_links_active) {
            $this_icon = $help_13_icon;
            if ($icon_size == '16') $this_icon = $help_16_icon;
            if ($icon_size == '24') $this_icon = $help_24_icon;
            if ($button_txt = '' and $this_icon == $help_13_icon) $this_icon = $help_16_icon;

            if ($button_text <> '') $button_text = ' ' . $button_text;
            $r = '<a style="' . $style . '" class="' . $button_class . '" title="Hilfe-Popup: ' . $pop_title . '" href="#">';
            $r .= '<span style="color:#c00">DEV: xxx</span>';
            $r .= '</a>';
            return $r;
        }
    }

}


function wrap_in_div($txt, $class = 'pd_settings', $style = '', $id = '')
{
    return '<div id="' . $id . '" class="' . $class . '" style="' . $style . '">' . $txt . '</div>';
}

// bearb mode begin


function all_config_options($master_key)
{
    $sql = "select * from diverses where div_what like  'yaml_pagemargins_%' order by div_what ";
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {

        if (strip_tags($row["t_key_txt"]) <> '' and strip_tags($row["t_key_txt"]) <> '???') $r .= strip_tags($row["t_key_txt"]) . ' - ';
    }
    mysql_free_result($sql_result);
    return '<div style="font-size:0.9em;color:#666">Weitere Konfigurations-Optionen: <span style="color:#009">' . $r . '...</span></div>';
}


function all_config_options_from_arr($opt_array, $tooltip = false, $assi_url = '', $help_key = '')
{
    global $wizard_icon13;
    if ($assi_url <> '') {

    }

    if ($help_key <> '') $hk = help_icon_new($help_key, $txt = 'Hilfe', $title = '', $with_text = true, $new_window = false, $icon = '13', $class = 'button99', $style = '');

    if ($opt_array <> '') {
        for ($i = 0, $n = sizeof($opt_array); $i < $n; $i++) {
            if (stristr($opt_array[$i], '_show_on_what_page')) {
                $r .= 'auf welchen Seiten anzeigen? - ';
            } else {
                //$r .= $opt_array[$i];
                $t = lookup('select t_key_txt from diverses where div_what =  \'' . $opt_array[$i] . '\' ', 't_key_txt');
                $t = strip_tags($t);
                if (trim($t) <> '') $r .= $t . ' - ';
            }
        }
        if ($assi_url <> '') $assi_link_str = '<a class="button99" target="_blank" title="neues Fenster" href="">' . $wizard_icon13 . ' Konfig.-Assi</a>';
        if ($tooltip) {
            return '<div style="font-size:0.9em;">Konfigurations-Optionen: ' . substr($r, 0, -2) . '... ' . $assi_link_str . '</div>';
        } else {
            return '<div style="font-size:0.9em;color:#666;padding:4px 5px;border:1px #ccc solid;background:#E0E7EF;margin:0 0 3px 0">Weitere Konfigurations-Optionen:<br><br class="lh6">
			<b style="color:#009">' . substr($r, 0, -2) . '...</b> ' . $assi_link_str . $hk . '</div>';
        }
    } else {

        if ($assi_url <> '') $assi_link_str = '<a class="button99" target="_blank" title="neues Fenster" href="">' . $wizard_icon13 . ' Konfig.-Assi</a>';
        if ($tooltip) {
            return '<div style="font-size:0.9em;">Es gibt weitere Konfigurations-Optionen... ' . $assi_link_str . '</div>';
        } else {
            return '<div style="font-size:0.9em;color:#666;padding:4px 5px;border:1px #ccc solid;background:#E0E7EF;margin:0 0 3px 0"><b style="color:#009">Es gibt weitere Konfigurations-Optionen...</b> ' . $assi_link_str . $hk . '</div>';
        }
    }
}


/*
usage:

echo  get_lw_link_button(
$button_text='Assi �ffnen',
$button_class='button99p',
$title='Popup',
$href='admin6093/wrapper_full.php?use_header=0&incl=includes/quick_config_design/toolbar_free.php#all_toolbat_items_alter_margin_top',
$pop_title='alle Elemente positionieren',
$width='950',
$height='',
$style=''
)



*/

function get_lw_link_button(
    $button_text = 'Assi �ffnen',
    $button_class = 'button99p',
    $title = 'Popup',
    $href = '',
    $pop_title = 'Assi',
    $width = '',
    $height = '',
    $style = ''
)
{

    $r = '<a style="' . $style . '" class="' . $button_class . '" title="' . $title . '" href="javascript:open_lw(\'' . $href . '\',\'' . $pop_title . '\',\'' . $width . '\',\'' . $height . '\')">';
    $r .= $button_text;
    $r .= '</a>';

    return $r;
}


function get_which_pages_cat($val)
{

    if ($val == 'all_pages') return 'Anzeige auf allen Seiten';
    if ($val == 'start_only') return '<span style="color:#c33;background:#ffa">Anzeige nur auf der Startseite!</span>';
    if ($val == 'everywhere_but_on_start') return '<span style="color:#c33;background:#ffa">Anzeige auf allen Seiten ausser Startseite!</span>';


}


function get_config_all_manager($assi_txt = '', $url, $help_key = '', $class = 'button99', $style = '')
{
    global $themes_icon13;

    if ($help_key <> '') $hl = help_icon_new($help_key, $txt = 'Hilfe', $title = '', $with_text = true, $new_window = false, $icon = '13', $class, $style = '');;
    $link = '<b style="color:#009;font-size:0.9em">' . $assi_txt . '</b>' . ' <a class="' . $class . '" style="' . $style . '" target="_blank" title="neues Fenster" href="' . $url . '"> Manager &ouml;ffnen</a> ' . $hl;
    $r = wrap_in_div($link, $class = 'pd_settings', $style = 'background:#eee;margin-left:6px');
    return $r;

}

function get_config_all_konfig_assi($assi_txt = '', $url, $help_key = '', $class = 'button99', $style = '')
{
    global $wizard_icon13;

    if ($help_key <> '') $hl = help_icon_new($help_key, $txt = 'Hilfe', $title = '', $with_text = true, $new_window = false, $icon = '13', $class = 'button99', $style = '');;
    $link = '<b style="color:#009;font-size:0.9em">' . $assi_txt . '</b>' . ' <a class="' . $class . '" style="' . $style . '" target="_blank" title="neues Fenster" href="' . $url . '">' . $wizard_icon13 . ' Konfig-Assi</a> ' . $hl;
    $r = wrap_in_div($link, $class = 'pd_settings', $style = 'background:#E6EDDE;margin-left:6px');
    return $r;

}


function get_config_all_design_assi($assi_txt = '', $url, $help_key = '', $class = 'button99', $style = '')
{
    global $themes_icon13, $bearb_mode_use_popup_windows;

    if ($help_key <> '') $hl = help_icon_new($help_key, $txt = 'Hilfe', $title = '', $with_text = true, $new_window = false, $icon = '13', $class = 'button99', $style = '');

    $link = '<b style="color:#009;font-size:0.9em">' . $assi_txt . '</b>';

    if ($bearb_mode_use_popup_windows) {
        $link .= get_lw_link_button_assi(
            $url,
            $t2_goto = '',
            $t2_help_key = '',
            $t2_button_text = ' Design-Assi',
            $class,
            $t2_button_title = '',
            $t2_pop_title = '',
            $t2_width = '1550',
            $t2_height = '',
            $style,
            $t2_icon_size = '13'
        );

    } else {
        $link .= ' <a class="' . $class . '" style="' . $style . '" target="_blank" title="neues Fenster" href="' . $url . '">' . $themes_icon13 . ' Design-Assi</a> ';
    }

    $link .= $hl;


    $r = wrap_in_div($link, $class = 'pd_settings', $style = 'background:#E6EDDE;margin-left:6px');
    return $r;

}


function assi_link_button($key, $class = 'button99', $style = '', $force_new_win = false, $with_txt = false)
{
    global $themes_icon13, $wizard_icon13, $bearb_mode_use_popup_windows;
    $sql = "select assi_url from diverses where div_what = '" . $key . "'";
    $url = lookup($sql, 'assi_url');
    $sql = "select assi_title from diverses where div_what = '" . $key . "'";
    $title = lookup($sql, 'assi_title');

    if ($force_new_win) $bearb_mode_use_popup_windows = false;
    if ($with_txt) $t_txt = 'Konfigurations-Assistent &ouml;ffnen ';
    if ($url <> '') {
        if (is_admin_area()) {
            $url = str_replace('admin6093/includes', 'includes', $url);
        }
        //return $url;

        if ($bearb_mode_use_popup_windows) {
            $butt = get_lw_link_button_assi(
                $url,
                $key,
                $t2_help_key = '',
                $t2_button_text = $t_txt,
                $class,
                $title,
                $title,
                $t2_width = '1650',
                $t2_height = '',
                $style,
                $t2_icon_size = '13'
            );
        } else {
            $url = str_replace('use_header=0', 'use_header=1', $url);
            $butt = '<a class="' . $class . '" style="' . $style . '" title="' . $title . ' - neues Fenster" target="_blank" href="' . $url . '#' . $key . '">' . $t_txt . $wizard_icon13 . '</a>';
        }
        return $butt;
    } else {
        //if(is_dev()) return '<span style="color:#c00;margin:4px">keine URL!</span>';
    }
}

function design_assi_link_button($key, $class = 'button99', $style = '', $force_new_win = false, $with_txt = false)
{
    global $themes_icon13, $wizard_icon13, $bearb_mode_use_popup_windows;
    $sql = "select design_assi_url from diverses where div_what = '" . $key . "'";
    $url = lookup($sql, 'design_assi_url');
    //$sql="select assi_title from diverses where div_what = '".$key."'";
    //$title = lookup($sql,'assi_title');
    $sql = "select assi_title from diverses where design_assi_url = '" . $url . "'";
    $title = lookup($sql, 'assi_title');


    if ($force_new_win) $bearb_mode_use_popup_windows = false;

    if ($url <> '') {
        if (is_admin_area()) {
            $url = str_replace('admin6093/includes', 'includes', $url);
        }
        //return $url;
        if ($with_txt) $t_txt = 'Design-Assistent &ouml;ffnen ';
        if ($bearb_mode_use_popup_windows) {
            $butt = get_lw_link_button_assi(
                $url,
                $key,
                $t2_help_key = '',
                $t2_button_text = $t_txt,
                $class,
                $title,
                $title,
                $t2_width = '1650',
                $t2_height = '',
                $style,
                $t2_icon_size = '13'
            );
        } else {
            $butt = '<a class="' . $class . '" style="' . $style . '" title="' . $title . ' - neues Fenster" target="_blank" href="' . $url . '#' . $key . '">' . $t_txt . '' . $themes_icon13 . '</a>';
        }
        return $butt;
    } else {
        //if(is_dev() and $force_new_win) return '<span style="color:#c00;margin:4px">keine URL!</span>';
    }
}

function get_config_all(
    $t_key,
    $help_key_man = '',
    $more_opts_available = false

)
{

    $sql = "select * from diverses where div_what = '" . $t_key . "' ";
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $div_id = $row["div_id"];
        $div_what = $row["div_what"];
        $div_res = $row["div_res"];
        $div_res_long = $row["div_res_long"];
        $div_res_default = $row["div_res_default"];
        $div_res_long_default = $row["div_res_long_default"];
        $nr = $row["nr"];
        $context = $row["context"];
        $funktion = $row["funktion"];
        $bemerkung = $row["bemerkung"];
        $bemerkung_long = $row["bemerkung_long"];
        $app_top = $row["app_top"];
        $rel1 = $row["rel1"];
        $rel2 = $row["rel2"];
        $modul = $row["modul"];
        $key_type = $row["key_type"];
        $t_key_comment = $row["t_key_comment"];
        $t_key_detail_link = $row["t_key_detail_link"];
        $t_key_txt = $row["t_key_txt"];
        $last_modi = $row["last_modi"];
        $is_multi_lng = $row["is_multi_lng"];
        $assi_title = $row["assi_title"];
        $assi_url = $row["assi_url"];
        $design_assi_url = $row["design_assi_url"];
        $assi_typ = $row["assi_typ"];
        $for_menu = $row["for_menu"];
        $mtime = $row["mtime"];
        if ($help_key_man == '') {
            $help_key = $row["help_key"];
        } else {
            //$help_key = $help_key_man;
            $help_key = $row["help_key"];
        }

    }
    /*
			if($help_key_man <>''){
				$sql="update diverses set help_key = '".$help_key_man."' where div_what = '".$t_key."' ";
				q($sql);
			}
		*/
    if ($assi_typ == 'bool') {
        //$r.= get_bmode_link_catalog($text='',$link='',$t_key,$help_key);
        $inp = '<input style="margin:0 0 0  0;display:inline-block;padding:4px" type="text" onclick="this.select()" value="' . $t_key . '">';
        if (is_dev()) $r .= '<div class="dimmed04" style="margin:2px 0">' . $inp . '</div>';
        $r .= get_bmode_link_admin_new($text = '', $link = '', $t_key, $help_key, $inline = true);
        if ($more_opts_available) $r .= '<div style="font-size:0.8em;color:#999">Es gibt weitere Optionen! (Design oder Konfig.)</div>';
        return wrap_in_div($r);
    }

    if ($assi_typ == 'select') {
        $inp = '<input style="margin:0 0 0  0;display:inline-block;padding:4px" type="text" onclick="this.select()" value="' . $t_key . '">';
        if (is_dev()) $r .= '<div class="dimmed04" style="margin:2px 0">' . $inp . '</div>';
        $r .= get_select_by_t_key_easy_div($t_key, $small_display = true, $style = '', $help_key, $tip_class = 'tip', $tip_width = '400px');
        return wrap_in_div($r);
    }


    if ($assi_typ == 'text') {
        $inp = '<input style="margin:0 0 0  0;display:inline-block;padding:4px" type="text" onclick="this.select()" value="' . $t_key . '">';
        if (is_dev()) $r .= '<div class="dimmed04" style="margin:2px 0">' . $inp . '</div>';
        $zuf = mt_rand(100000, 100000000);
        $r .= get_bmode_link_admin_new_text($t_key, $help_key);
        $r .= '<div style="margin:0px 0 3px 0">' . ($is_multi_lng ? lang_icon('de') : '') . '<span style="width:96%;font-size:1.1em;margin-left:4px;' . $t_style . '" class="axupd_1" id="' . $t_key . $zuf . '">' . get_dv($t_key) . '</span>';
        $r .= '
			<script>new Ajax.InPlaceEditor(\'' . $t_key . $zuf . '\', \'ax_updater.php?id=163_' . $t_key . '\',{okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - max. 255 Zeichen\'});</script>
			';

        $r .= '</div>';
        if ($is_multi_lng) $r .= '<div style="font-size:0.8em;color:#999">Konfig-Assi &ouml;ffnen um &Uuml;bersetzungen zu bearbeiten.</div>';
        $r .= '';
        return wrap_in_div($r);
    }

    if ($assi_typ == 'longtext') {
        $inp = '<input style="margin:0 0 0  0;display:inline-block;padding:4px" type="text" onclick="this.select()" value="' . $t_key . '">';
        if (is_dev()) $r .= '<div class="dimmed04" style="margin:2px 0">' . $inp . '</div>';
        $zuf = mt_rand(100000, 100000000);
        $r .= get_bmode_link_admin_new_text($t_key, $help_key);
        $r .= '<div style="margin:0px 0 3px 0">' . ($is_multi_lng ? lang_icon('de') : '') . '<span style="width:96%;font-size:1.1em;margin-left:4px;border:1px #36b solid;background:none;' . $t_style . '" class="axupd_1" id="' . $t_key . $zuf . '">' . get_dv_l($t_key) . '</span>';
        /*
			$r .='
			<script>new Ajax.InPlaceEditor(\''. $t_key.$zuf .'\', \'ax_updater.php?id=163_'. $t_key .'\',{okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - max. 255 Zeichen\'});</script>
			';
			*/
        $r .= '</div>';
        if ($is_multi_lng) $r .= '<div style="font-size:0.8em;color:#999">Konfig-Assi &ouml;ffnen um den Text (HTML) und die &Uuml;bersetzungen zu bearbeiten.</div>';
        $r .= '';
        return wrap_in_div($r);
    }


    if ($assi_typ == 'color2') {
        $inp = '<input style="margin:0 0 0  0;display:inline-block;padding:4px" type="text" onclick="this.select()" value="' . $t_key . '">';
        if (is_dev()) $r .= '<div class="dimmed04" style="margin:2px 0">' . $inp . '</div>';

        $r .= '<b style="color:#009">' . strip_tags($t_key_txt) . ':</b> &nbsp; &nbsp;  <span style="font-size:0.8em">' . $div_res . '</span>  
			<div style="margin-left:4px; display:inline-block;width:24px;height:14px;background:' . $div_res . ';border:1px #ccc solid">&nbsp; &nbsp; &nbsp;</div>';
        $r .= assi_link_button($t_key, $class = 'button99', $style = '');
        return wrap_in_div($r);
    }
    /*
		if($assi_typ=='radio'){

			$inp .='<input style="margin:0 0 0  0;display:inline-block;padding:4px" type="text" onclick="this.select()" value="'.$t_key.'">';
			if(is_dev()) $r.= '<div class="dimmed04" style="margin:2px 0">'.$inp.'</div>';
			$r .= '<div style="font-weight:bold;color:#009;font-size:0.9em">xxxxx'.$t_key_txt.'</div>';
			$r .=  get_wo_anzeigen_radio_box_cat($t_key,$legend='Wo anzeigen? (klicken zum &Auml;ndern)',$style='margin:-6px 0 2px 0;font-size:0.8em',$width='350px');

			return wrap_in_div($r);

		}
		*/

    $r .= '<div>' . $t_key . ' &nbsp; <b>' . $t_key_txt . '</b> - weder bool, text, select - ist ' . $assi_typ . '</div>';
    mysql_free_result($sql_result);
    return $r;
}


function get_config_all_header($txt, $class = 'conf_div_header', $style = '', $help_key = '')
{
    global $show_empty_help_links_active;
    $txt .= ' ' . to_anchor($txt);
    if ($help_key <> '') {
        if ($help_key <> 'xxx') {
            $txt = $txt . help_icon_new($help_key, 'Hilfe', $title = '', $with_text = false, $new_window = false, $icon = '24', '', 'margin: -4px 12px 0 0;float:right');
        } else {
            if ($show_empty_help_links_active) $txt = $txt . help_icon_new($help_key, 'Hilfe', $title = '', $with_text = false, $new_window = false, $icon = '24', '', 'margin: -4px 12px 0 0;float:right;opacity:0.3');
        }
    }
    return wrap_in_div($txt, $class, $style);
}

function to_anchor($txt, $txt_only = false)
{
    $txt1 = str_replace(' ', '', $txt);
    $txt1 = str_replace('-', '', $txt1);
    $txt1 = strtolower($txt1);
    $txt1 = substr($txt1, 0, 30);

    if (is_dev() and 1 == 2) {
        $r = '<a name="' . $txt1 . '" id="' . $txt1 . '">' . $txt1 . '</a>';
    } else {
        $r = '<a name="' . $txt1 . '" id="' . $txt1 . '"></a>';
    }
    if ($txt_only) {
        return $txt1;
    } else {
        return $r;
    }
}

function get_anchor_str($txt, $class = '')
{
    $anc = to_anchor($txt, $txt_only = true);
    $r = '<div class="' . $class . '"><a href="javascript:scroll_to(\'' . $anc . '\')">' . $txt . '</a></div>';

    return $r;
}


function get_config_all_header_trow($txt, $class = 'conf_div_header_kl', $style = '', $colspan = '3', $help_key = '')
{
    global $show_empty_help_links_active;
    $txt .= ' ' . to_anchor($txt);
    if ($help_key <> '') {
        //$txt = $txt . help_icon_new($help_key, 'Hilfe', $title='', $with_text=false, $new_window=false, $icon='32', '', 'margin: -6px 40px 0 0;float:right');
        if ($help_key <> 'xxx') {
            $txt = $txt . help_icon_new($help_key, 'Hilfe', $title = '', $with_text = false, $new_window = false, $icon = '32', '', 'margin: -6px 40px 0 0;float:right');
        } else {
            if ($show_empty_help_links_active) $txt = $txt . help_icon_new($help_key, 'Hilfe', $title = '', $with_text = false, $new_window = false, $icon = '32', '', 'margin: -6px 40px 0 0;float:right;opacity:0.3');
        }


    }

    $w = wrap_in_div($txt, $class, $style);
    $r = '<tr><td colspan="' . $colspan . '">' . $w . '</td></tr>';
    return $r;
}

function help_icon_new($key, $txt = 'Hilfe', $title = '', $with_text = false, $new_window = false, $icon = '16', $class = '', $style = '')
{

    global $img_url, $tool_tip_icon_16, $help_24_icon, $help_16_icon, $help_13_icon, $help_32_icon, $help_40_icon, $help_56_icon, $bearb_mode_use_popup_windows;


    $admin_WS = DIR_WS_FULL . 'admin6093/';
    $catalog_WS = DIR_WS_FULL;

    $this_icon = '';
    if ($icon == '56') $this_icon = $help_56_icon;
    if ($icon == '40') $this_icon = $help_40_icon;
    if ($icon == '32') $this_icon = $help_32_icon;

    if ($icon == '24') $this_icon = $help_24_icon;
    if ($icon == '16') $this_icon = $help_16_icon;
    if ($icon == '13') $this_icon = $help_13_icon;
    if ($icon == '16a') $this_icon = '<img src="' . $img_url . '/' . 'icon4/famfam/help.png" width="16" height="16" />';
    if ($icon == '13a') $this_icon = '<img src="' . $img_url . '/' . 'icon4/famfam/help.png" width="13" height="13" />';

    if ($title == '') $title = get_help_topic_plain($key);


    if ($new_window) {


        if ($with_text) {
            $x .= '<a target="_blank" class="' . $class . '" style="' . $style . '" 
		href="wrapper_all.php?incl=help_new/help1.php&hitem=' . $key . '&hitem_txt=' . $txt . '&disallow_new_window=1" style="margin-left:4px" title="Hilfe: ' . $title . ' - neues Fenster" class="" >' . $this_icon . ' ' . $txt . '</a>';
        } else {
            $x .= '<a target="_blank" class="' . $class . '" style="' . $style . '"  
		href="wrapper_all.php?incl=help_new/help1.php&hitem=' . $key . '&hitem_txt=&disallow_new_window=1" style="margin-left:4px" title="Hilfe: ' . $title . ' - neues Fenster" class="" >' . $this_icon . '</a>';
        }

    } else {

        if (is_admin_area()) {
            // als Popup
            if ($with_text) {
                $x .= '<a class="' . $class . ' lightwindow" style="' . $style . '"  
			href="' . $admin_WS . 'wrapper_all.php?incl=help_new/help1.php&hitem=' . $key . '&hitem_txt=' . $txt . '&disallow_new_window=1" params="lightwindow_type=external" style="margin-left:4px" title="Hilfe: ' . $title . ' - Popup" >' . $this_icon . ' ' . $txt . '</a>';
            } else {
                $x .= '<a class="' . $class . ' lightwindow" style="' . $style . '"  
			href="' . $admin_WS . 'wrapper_all.php?incl=help_new/help1.php&hitem=' . $key . '&hitem_txt=&disallow_new_window=1" params="lightwindow_type=external" style="margin-left:4px" title="Hilfe: ' . $title . ' - Popup" >' . $this_icon . '</a>';
            }
        } else {
            if ($bearb_mode_use_popup_windows) {
                if (!$with_text) $txt = '';

                $x .= get_lw_link_button_help(
                    $key,
                    $button_text = $txt,
                    $button_class = 'button99',
                    $width = '',
                    $height = '',
                    $button_style = '',
                    $icon_size = $icon
                );
            } else {
                if ($with_text) {
                    $x .= '<a target="_blank" class="' . $class . '" style="' . $style . '" 
					href="' . $admin_WS . 'wrapper_all.php?incl=help_new/help1.php&hitem=' . $key . '&hitem_txt=' . $txt . '&disallow_new_window=1" style="margin-left:4px" title="Hilfe: ' . $title . ' - neues Fenster" class="" >' . $this_icon . ' ' . $txt . '</a>';
                } else {
                    $x .= '<a target="_blank" class="' . $class . '" style="' . $style . '"  
					href="' . $admin_WS . 'wrapper_all.php?incl=help_new/help1.php&hitem=' . $key . '&hitem_txt=&disallow_new_window=1" style="margin-left:4px" title="Hilfe: ' . $title . ' - neues Fenster" class="" >' . $this_icon . '</a>';
                }
            }

        } //if(is_admin_area()){
    }

    return $x;


}


function get_wo_anzeigen_radio_box_cat($show_key, $legend = 'Wo anzeigen? (zum &Auml;ndern den Assi &ouml;ffnen!)', $style = 'margin:12px 0 0 0;font-size:1.0em', $width = '900px')
{
    $values = on_which_pages_array();
    $curr_val = get_dv($show_key);
//return '<div style="'.$style.'">'.get_radio_box_small('Form_'.$show_key, $values,  $curr_val,$show_key,$legend, $width,$use_br=true).'</div>';
    return '<div style="' . $style . '"><span style="font-weight:normal;color:#666">wird angezeigt: </span>' . get_which_pages_cat(get_dv($show_key)) . '</div>';
}

function wrap_in_div_cat($txt, $class = '', $style = '', $id = '')
{
    if ($id <> '') {
        return '<div id="' . $id . '" class="' . $class . '" style="' . $style . '">' . $txt . '</div>';
    } else {
        return '<div class="' . $class . '" style="' . $style . '">' . $txt . '</div>';
    }
}


function get_startpage_conf_link($text = '', $active_key = '', $startp_active_key = '', $assi_url = '', $help_key = '', $only_for_startpage = false)
{
    global $wizard_icon13, $bearb_mode_use_popup_windows;


    $is_design_assi = true;
    if (stristr($assi_url, 'template1.php')) $is_design_assi = false;
    /*
		if($is_design_assi and $help_key <>'') $sql_div="update diverses set mtime=".microtime(true).", design_assi_url = '".$assi_url."', help_key= '".$help_key."' where div_what = '".$active_key."' " ;
		if($is_design_assi and $help_key =='') $sql_div="update diverses set mtime=".microtime(true).", design_assi_url = '".$assi_url."' where div_what = '".$active_key."' " ;

		if(!$is_design_assi and $help_key <>'') $sql_div="update diverses set mtime=".microtime(true).", assi_url = '".$assi_url."', help_key= '".$help_key."' where div_what = '".$active_key."' " ;
		if(!$is_design_assi and $help_key =='') $sql_div="update diverses set mtime=".microtime(true).", assi_url = '".$assi_url."' where div_what = '".$active_key."' " ;

		if( $assi_url<>''  ) q($sql_div);
		*/

    if (!stristr($assi_url, 'admin6093/') and $assi_url <> '') $assi_url = 'admin6093/' . $assi_url;
    if (!stristr($assi_url, '#') and $assi_url <> '') $assi_url = $assi_url . '#' . $active_key;

    if ($assi_url <> '') {

        if ($bearb_mode_use_popup_windows) {
            $assi_url_link = get_lw_link_button_assi(
                $assi_url,
                $goto = '',
                $t_help_key = '',
                $button_text = '',
                $button_class = 'button99',
                $button_title = '',
                $pop_title = '',
                $width = '1550',
                $height = '',
                $button_style = '',
                $icon_size = '13'
            );

        } else {
            if (!stristr($assi_url, 'admin6093/') and $assi_url <> '') $assi_url = 'admin6093/' . $assi_url;
            $assi_url_link = '<a class="button99" target="_blank" title="Assistent - neues Fenster" href="' . $assi_url . '">' . $wizard_icon13 . ' Konfig-Assi</a>';
        }
    }

    if ($help_key <> '') {
        //$hl = help_icon($help_key,'','','',$tiny=true,true);
        $hl = help_icon_new($help_key, $txt = 'Hilfe', $title = '', $with_text = false, $new_window = false, $icon = '13', $class = 'button99', $style = '');
    }

    if ($text == '') $text = strip_tags(lookup('select t_key_txt from diverses where div_what = "' . $active_key . '"  ', 't_key_txt'));
    //$text = '<div style="color:#009;font-size:0.9em">'.$text.'</div>';

    $t_key = $active_key;
    $t_key_txt = lookup('select t_key_txt from diverses where div_what =  \'' . $t_key . '\'  ', 't_key_txt');
    $t_key_comment = lookup('select t_key_comment from diverses where div_what =  \'' . $t_key . '\'  ', 't_key_comment');
    $tt_txt = '<div style="color:#009;font-weight:bold">' . $t_key_txt . '</div>' . $t_key_comment;
    $this_tt_width = '320px';
    //if(stristr($t_key_comment,'<img')) $this_tt_width = '750px';
    $tt_txt = wrap_in_div_cat($tt_txt, 'tttxt', 'padding: 0 7px');
    $tt = tooltip($tt_txt, $img = '13', $style = 'margin-left:10px;position:relative', $class = 'tip', $width = $this_tt_width, $admin = false, $margin_top = '', $icon = '', true);

    $text = '<div style="color:#009;font-size:0.9em">' . $tt . ' ' . $text . '</div>';

    if (get_dv_bool($active_key)) {

        if ($startp_active_key <> '') {
            $actlink = is_active_icon_link($active_key, $msgbox = true, $float_right = false, $with_text = false, $f_size = '0.9', $link_bars = false, $show_dev_key = false, $allow_as_button = false, $button_class = 'button999',
                $page_reload = true, $style = '', $pre_txt = '');

            $r = '<div style="padding:1px 3px ;margin: 1px 0;border:1px #ccc solid;background:#ffe;font-size:0.8em"><b>' . $text . '</b> ' . $assi_url_link . $hl . $actlink;
            $r .= get_wo_anzeigen_radio_box_cat($startp_active_key, $legend = 'Wo anzeigen? (zum &Auml;ndern den Assi &ouml;ffnen!)', $style = 'margin:6px 0 2px 0;font-size:0.8em', $width = '350px');
            $r .= '</div>';
        } else {
            $actlink = is_active_icon_link($active_key, $msgbox = false, $float_right = false, $with_text = false, $f_size = '0.9', $link_bars = false, $show_dev_key = false, $allow_as_button = false, $button_class = 'button999 ',
                $page_reload = false, $style = '', $pre_txt = '<span style="font-size:0.8em">ist generell </span>');
            $r = '<div style="padding:0px 3px 1px 3px ;margin: 1px 0;border:1px #ccc solid;background:#ffe;font-size:0.8em"><b>' . $text . '</b> ' . $assi_url_link . $hl . $actlink . '</div>';
        }
    } else {
        if ($only_for_startpage) {
            $actlink = is_active_icon_link($active_key, $msgbox = false, $float_right = false, $with_text = false, $f_size = '0.9', $link_bars = false, $show_dev_key = false, $allow_as_button = false, $button_class = 'button999',
                $page_reload = false, $style = '', $pre_txt = '<span style="font-size:0.8em">ist f&uuml;r die Startseite</span>');
        } else {
            $actlink = is_active_icon_link($active_key, $msgbox = false, $float_right = false, $with_text = false, $f_size = '0.9', $link_bars = false, $show_dev_key = false, $allow_as_button = false, $button_class = 'button999',
                $page_reload = false, $style = '', $pre_txt = '<span style="font-size:0.8em">ist generell f&uuml;r alle Seiten</span>');
        }
        $r = '<div style="padding:0px 3px 1px 3px ;margin: 1px 0;border:1px #ccc solid;background:#ffe;font-size:0.8em"><b>' . $text . '</b> ' . $assi_url_link . $hl . $actlink . '</div>';
    }

    return $r;
}

function save_design_assi_link($text, $link, $help_key, $active_key, $area)
{

    if ($active_key <> '') {
        //if($text<>'') q("update diverses set text = '".$text."' where div_what = '".$active_key."' ");
        //if($area<>'') q("update diverses set area = '".$area."' where div_what = '".$active_key."' ");
        if ($help_key <> '') q("update diverses set help_key = '" . $help_key . "' where div_what = '" . $active_key . "' ");
    }

    return true;
}

function try_find_help_key($key)
{
    $sql = "select help_key from diverses where div_what = '" . $key . "' ";
    return lookup($sql, 'help_key');
}

function get_design_assi_link($text = '', $link = '', $help_key = '', $active_key = '', $area = '')
{

    if (is_dev()) save_design_assi_link($text, $link, $help_key, $active_key, $area);

    if ($help_key == '') $help_key = try_find_help_key($active_key);

    global $bearb_mode_use_popup_windows;
    if (is_admin_area()) {
        //if(!stristr($link,'admin6093/') and $link<>'') $link = 'admin6093/'.$link;
    } else {
        if (!stristr($link, 'admin6093/') and $link <> '') $link = 'admin6093/' . $link;
    }
    if ($help_key <> '') {
        //$hl = help_icon($help_key,'','','',$tiny=true,true);
        $hl = help_icon_new($help_key, $txt = 'Hilfe', $title = '', $with_text = false, $new_window = false, $icon = '13', $class = '', $style = 'margin-left:6px');
    }
    if ($active_key <> '') $actlink = is_active_icon_link($active_key, $msgbox = false, $float_right = false, $with_text = false, $f_size = '0.9', $link_bars = false, $show_dev_key = false, $allow_as_button = false, $button_class = 'button999', $page_reload = false,
        $style = 'margin:0 3px;padding:2px;', $pre_txt = '');

    if ($bearb_mode_use_popup_windows and 1 == 2) {
        $r = get_lw_link_button_assi(
            $link,
            $t2_goto = '',
            $t2_help_key = '',
            $t2_button_text = ' ' . $text,
            $t2_button_class = '',
            $t2_button_title = '',
            $t2_pop_title = 'Design-Assi',
            $t2_width = '1550',
            $t2_height = '',
            $t2_button_style = '',
            $t2_icon_size = '13'
        );


        $r .= $hl . $actlink;

    } else {
        if (is_admin_area()) $link = str_replace('admin6093/', '', $link);
        $r = '<a style="" target="blank" title="neues Fenster" href="' . $link . '">' . $text . '</a>' . $hl . $actlink . '';
    }

    //$r = str_replace('admin6093/admin6093/','admin6093/',$r);
    $r = '<div style="padding:1px 3px ;margin: 1px 0;border:1px #ccc solid;background:#ffe;font-size:0.8em">' . $r . '</div>';

    return $r;
}


function get_bmode_link_catalog($text = '', $link, $active_key, $help_key, $inline = false, $active_as_button = false, $design_assi_url = '', $design_assi_show = false, $assi_type = 'Design-Assi', $auto_reload = false, $show_on_what_pages = '', $hide_assi_link = false)
{
    global $wizard_icon13, $themes_icon, $themes_icon10, $edit_this_icon13, $edit_this_icon16, $bearb_mode_use_popup_windows;
//if($auto_reload) return 'auto reload!!!!!!';
    $is_design_assi = true;
    if (stristr($design_assi_url, 'template1.php')) $is_design_assi = false;

    if ($is_design_assi and $help_key <> '') $sql_div = "update diverses set mtime=" . microtime(true) . ", design_assi_url = '" . $assi_url . "', help_key= '" . $help_key . "' where div_what = '" . $active_key . "' ";
    if ($is_design_assi and $help_key == '') $sql_div = "update diverses set mtime=" . microtime(true) . ", design_assi_url = '" . $assi_url . "' where div_what = '" . $active_key . "' ";

    if (!$is_design_assi and $help_key <> '') $sql_div = "update diverses set mtime=" . microtime(true) . ", assi_url = '" . $assi_url . "', help_key= '" . $help_key . "' where div_what = '" . $active_key . "' ";
    if (!$is_design_assi and $help_key == '') $sql_div = "update diverses set mtime=" . microtime(true) . ", assi_url = '" . $assi_url . "' where div_what = '" . $active_key . "' ";

    if ($design_assi_url <> '') q($sql_div);

//admin6093/


//if(!is_admin_area()){
    if (!stristr($design_assi_url, 'admin6093/')) $design_assi_url = 'admin6093/' . $design_assi_url;
    if (!stristr($link, 'admin6093/') and $link <> '') $link = 'admin6093/' . $link;
//}
    $ori_text = $text;
    $text = '';
    if ($text == '') {

        $t_key_txt = lookup('select t_key_txt from diverses where div_what =  \'' . $active_key . '\'  ', 't_key_txt');
        $t_key_comment = lookup('select t_key_comment from diverses where div_what =  \'' . $active_key . '\'  ', 't_key_comment');

        $text = strip_tags($t_key_txt) . ' &nbsp; ';
        if (is_dev() and !$inline) $key_text = '<div style="color:#999;font-size:0.8em">' . $active_key . ' &nbsp;</div> ';

        $tt_txt = '<div style="color:#009;font-weight:bold">' . $t_key_txt . '</div>' . $t_key_comment;
        $tt_txt = wrap_in_div_cat($tt_txt, 'tttxt', 'padding: 0 7px');

        if ($t_key_txt <> '' and $t_key_txt <> '???') $tt = tooltip($tt_txt, $img = '13', $style = 'margin-left:0;', $class = 'tip', $width = '326', $admin = false, $margin_top = '', $icon = '', $force_width = true);
        /*
	$tt_txt = '<b style="color:#009">'.$t_key_txt.'</b>' . $t_key_comment;
	if(stristr($t_key_comment,'<img')) $this_tt_width = '750px';
	$tt_txt = wrap_in_div($tt_txt,'','padding: 0 7px');
	$tt = tooltip($tt_txt,$img='13',$style='margin-left:10px;position:relative',$class='tip',$width=$this_tt_width,$admin=false,$margin_top='',$icon='');

*/
        $assi_title = lookup('select assi_title from diverses where div_what =  \'' . $active_key . '\'  ', 'assi_title');
        $assi_url = lookup('select assi_url from diverses where div_what =  \'' . $active_key . '\'  ', 'assi_url');

        if (stristr($assi_url, 'wrapper_full.php?') or stristr($assi_url, 'wrapper_all.php?')) {
            $assi_url = 'admin6093/' . $assi_url;
            if (stristr($assi_url, 'quick_config_design') and $assi_type <> 'Konfig.-Assi') {
                if ($bearb_mode_use_popup_windows) {
                    $assi_link = get_lw_link_button_assi(
                        $t2_assi_url = add_anchor($assi_url, $active_key),
                        $t2_goto = '',
                        $t2_help_key = '',
                        $t2_button_text = '',
                        $t2_button_class = 'button99',
                        $t2_button_title = $assi_title,
                        $t2_pop_title = $assi_title,
                        $t2_width = '1550',
                        $t2_height = '',
                        $t2_button_style = '',
                        $t2_icon_size = '13'
                    );
                } else {
                    if (!$bearb_mode_use_popup_windows) {
                        $assi_link = '<a class="button99" style="margin-left:0px" title="' . $assi_title . ' - Design-Assi - neues Fenster" target="_blank" href="' . add_anchor($assi_url, $active_key) . '">' . $themes_icon10 . '</a>';
                    } else {
                        $assi_link = get_lw_link_button_assi(
                            $t2_assi_url = add_anchor($assi_url, $active_key),
                            $t2_goto = '',
                            $t2_help_key = '',
                            $t2_button_text = '',
                            $t2_button_class = 'button99',
                            $t2_button_title = '',
                            $t2_pop_title = '',
                            $t2_width = '1550',
                            $t2_height = '',
                            $t2_button_style = '',
                            $t2_icon_size = '13'
                        );

                    }
                }
            } else {
                if (!$bearb_mode_use_popup_windows) {
                    $assi_link = '<a class="button99" style="margin-left:0px" title="' . $assi_title . ' - Konfig-Assi - neues Fenster" target="_blank" href="' . add_anchor($assi_url, $active_key) . '">' . $wizard_icon13 . '</a>';
                } else {
                    $assi_link = get_lw_link_button_assi(
                        $t2_assi_url = add_anchor($assi_url, $active_key),
                        $t2_goto = '',
                        $t2_help_key = '',
                        $t2_button_text = '',
                        $t2_button_class = 'button99',
                        $t2_button_title = $assi_title,
                        $t2_pop_title = $assi_title,
                        $t2_width = '1550',
                        $t2_height = '',
                        $t2_button_style = '',
                        $t2_icon_size = '13'
                    );

                }
            }
        }
        if ($design_assi_url <> '' and $design_assi_show) {
            if ($assi_type == 'Editor &ouml;ffnen') $themes_icon13 = $edit_this_icon13;

            $assi_link .= '<a class="button99" style="margin-left:0px" title="' . $assi_type . ' - neues Fenster" target="_blank" href="' . add_anchor($design_assi_url, $active_key) . '">' . $themes_icon10 . ' ' . $assi_type . ' a9x</a>';
        }

        if ($link <> '') {
            $assi_type = 'Editor';
            if (!$bearb_mode_use_popup_windows) {
                $assi_link .= '<a class="button99" style="margin-left:0px" title="' . $assi_type . ' - neues Fenster" target="_blank" href="' . $link . '"> &nbsp; ' . $edit_this_icon13 . '</a>';
            } else {
                $assi_link = get_lw_link_button_assi(
                    $t2_assi_url = $link,
                    $t2_goto = '',
                    $t2_help_key = '',
                    $t2_button_text = '',
                    $t2_button_class = 'button99',
                    $t2_button_title = '',
                    $t2_pop_title = '',
                    $t2_width = '',
                    $t2_height = '',
                    $t2_button_style = '',
                    $t2_icon_size = '13'
                );


            }
        }


        if (is_dev() and !$inline) $dev_assi_url = '<div style="color:#999;font-size:0.8em">' . $assi_url . '</div>';


    }
    if ($active_as_button) $button_class = "button999";
    if ($link == '') {
        $r = '<span style="color:#009">' . substr($text, 0, 92) . '</span>';
        //is_active_icon_link($key,$msgbox=true,$float_right=true,$with_text=false,$f_size='',$link_bars=false, $show_dev_key=false, $allow_as_button=false, $button_class='', $page_reload=false, $style='', $pre_txt='')
        if ($active_key <> '') $r .= is_active_icon_link($active_key, $msgbox = false, false, $with_text = $active_as_button, $f_size = '', false, false, $allow_as_button = false, 'button999', $auto_reload);
        if ($help_key <> '') $r .= help_icon_new($help_key, $txt = 'Hilfe', $title = '', $with_text = false, $new_window = false, $icon = '13', $class = 'button99', $style = '');;

    } else {
        $r = '<a target="_blank" title="Konfig.-Assi - neues Fenster" href="' . $link . '">' . $text . '</a> ';
        //is_active_icon_link($key,$msgbox=true,$float_right=true,$with_text=false,$f_size='',$link_bars=false, $show_dev_key=false, $allow_as_button=false, $button_class='', $page_reload=false, $style='', $pre_txt='')
        if ($active_key <> '') $r .= is_active_icon_link($active_key, $msgbox = false, false, $with_text = $active_as_button, $f_size = '', false, false, $allow_as_button = false, 'button999', $auto_reload);
        if ($help_key <> '') $r .= help_icon_new($help_key, $txt = 'Hilfe', $title = '', $with_text = false, $new_window = false, $icon = '13', $class = 'button99', $style = '');
    }

//if($auto_reload) $r .='auto_reoload!!';

    /*
	start_only
	all_pages
	everywhere_but_on_start
	*/
    $on_what_page_key = str_replace('is_active', 'show_on_what_page', $active_key);
    $on_what_page = get_dv($on_what_page_key);
    if ($on_what_page <> '' and get_dv_bool($active_key)) $on_what_page_str = '<div style="font-size:0.9em;margin:0 0 2px 4px">' . get_which_pages_cat($on_what_page) . '</div>';

    if ($hide_assi_link) $assi_link = '';

//$assi_link = str_replace('admin6093/admin6093/','admin6093/',$assi_link);
//$dev_assi_url = str_replace('admin6093/admin6093/','admin6093/',$dev_assi_url);
    if (is_admin_area()) $r = str_replace('admin6093/', '', $r);
    if (is_admin_area()) $r = str_replace('???', $ori_text, $r);
//$tt = str_replace('admin6093/admin6093/','admin6093/',$tt);

    if ($inline) {
        return '<div class="settings" style="border: 1px #c00 solid">' . $r . $tt . $assi_link . $key_text . $dev_assi_url . '</div>';
    } else {
        return '<div style="padding:0 3px ;margin: 1px 0;border:1px #ccc solid;background:#ffe;font-size:0.8em">' . $tt . $r . $assi_link . $key_text . $ori_text . $dev_assi_url . $on_what_page_str . '</div>';
    }


}


function add_anchor($url, $anchor)
{
    if (trim($anchor) <> '') {
        $add_anchor_str = '#' . $anchor;
        if (stristr($url, $add_anchor_str)) {
            return $url;
        } else {
            return $url . $add_anchor_str;
        }
    } else {
        return $url;
    }
}

function hdr($text = '???', $class = 'nix', $style = '')
{
    return '<div class="' . $class . '" style="' . $style . '">' . $text . '</div>';
}


function get_bmode_link_admin_new_text($t_key, $help_key)
{
    global $wizard_icon13, $themes_icon, $themes_icon10, $bearb_mode_use_popup_windows;


    $t_key_txt = lookup('select t_key_txt from diverses where div_what =  \'' . $t_key . '\'  ', 't_key_txt');
    $t_key_comment = lookup('select t_key_comment from diverses where div_what =  \'' . $t_key . '\'  ', 't_key_comment');

    $text = strip_tags($t_key_txt) . ' &nbsp; ';
    //if(is_dev() and !$inline) $key_text = '<div style="color:#999;font-size:0.8em">'.$t_key.' &nbsp;</div> ';

    $tt_txt = '<div style="color:#009;font-weight:bold">' . $t_key_txt . '</div>' . $t_key_comment;
    if (stristr($t_key_comment, '<img')) $this_tt_width = '750px';
    $tt_txt = wrap_in_div($tt_txt, 'tttxt', 'padding: 0 7px');
    $tt = tooltip($tt_txt, $img = '13', $style = 'margin-left:10px;position:relative', $class = 'tip', $width = $this_tt_width, $admin = false, $margin_top = '', $icon = '');

    $assi_title = lookup('select assi_title from diverses where div_what =  \'' . $t_key . '\'  ', 'assi_title');
    $assi_url = lookup('select assi_url from diverses where div_what =  \'' . $t_key . '\'  ', 'assi_url');

    if (stristr($assi_url, 'wrapper_full.php?') or stristr($assi_url, 'wrapper_all.php?')) {
        if (stristr($assi_url, 'quick_config_design') and $assi_type <> 'Konfig.-Assi') {
            if ($bearb_mode_use_popup_windows) {
                $assi_link = get_lw_link_button_assi(
                    $t2_assi_url = $assi_url . '#' . $t_key,
                    $t2_goto = '',
                    $t2_help_key = '',
                    $t2_button_text = '',
                    $t2_button_class = 'button99',
                    $t2_button_title = '',
                    $t2_pop_title = '',
                    $t2_width = '1550',
                    $t2_height = '',
                    $t2_button_style = '',
                    $t2_icon_size = '13'
                );
            } else {
                $assi_link = '<a class="button99" style="margin-left:12px" title="' . $assi_title . ' - Design-Assi - neues Fenster" target="_blank" href="' . $assi_url . '#' . $t_key . '">' . $themes_icon10 . ' Design-Assi</a>';
            }
        } else {
            if ($bearb_mode_use_popup_windows) {
                $assi_link = get_lw_link_button_assi(
                    $t2_assi_url = $assi_url . '#' . $t_key,
                    $t2_goto = '',
                    $t2_help_key = '',
                    $t2_button_text = '',
                    $t2_button_class = 'button99',
                    $t2_button_title = '',
                    $t2_pop_title = '',
                    $t2_width = '1550',
                    $t2_height = '',
                    $t2_button_style = '',
                    $t2_icon_size = '13'
                );
            } else {
                $assi_link = '<a class="button99" style="margin-left:12px" title="' . $assi_title . ' - Konfig-Assi - neues Fenster" target="_blank" href="' . $assi_url . '#' . $t_key . '">' . $wizard_icon13 . ' Konfig.-Assi</a>';
            }
        }
    }
    if ($design_assi_url <> '' and $design_assi_show) {
        if ($assi_type == 'Editor &ouml;ffnen') $themes_icon13 = '';
        // no popup !?
        $assi_link .= '<a class="button99" style="margin-left:39px" title="' . $assi_type . ' - neues Fenster" target="_blank" href="' . $design_assi_url . '">' . $themes_icon10 . ' ' . $assi_type . '</a>';
    }

    //if(is_dev() and !$inline) $dev_assi_url = '<div style="color:#999;font-size:0.8em">'.$assi_url.'</div>';


//if($active_as_button) $button_class = "button99";
    if ($link == '') {
        if (is_dev()) {
            $r = '<div style="font-size:0.9em;font-weight:bold; color:#009;margin:3px 0 4px 0;">' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_txt') . '</div>';
        } else {
            $r = '<div style="color:#009;font-weight:bold;font-size:0.9em;margin:3px 0 4px 0">' . $text . '</div>';
        }
        //if($t_key<>'') $r .= is_active_icon_link($t_key,$msgbox=false,false,$with_text=$active_as_button,$f_size='',false, false, $allow_as_button=false, $button_class='button99');
        if ($help_key <> '' and !$bearb_mode_use_popup_windows) $hk = help_icon_new($help_key, $txt = 'Hilfe', $title = '', $with_text = true, $new_window = false, $icon = '13', $class = 'button99', $style = '');

    } else {
        $r = '<a target="_blank" title="Konfig.-Assi - neues Fenster" href="' . $link . '">' . $text . '</a> ';
        //if($t_key<>'') $r .= is_active_icon_link($t_key,$msgbox=false,false,$with_text=$active_as_button,$f_size='',false, false, $allow_as_button=false, $button_class);
        if ($help_key <> '' and !$bearb_mode_use_popup_windows) $hk = help_icon_new($help_key, $txt = 'Hilfe', $title = '', $with_text = true, $new_window = false, $icon = '13', $class = 'button99', $style = '');
    }

    return '<div class="settings" style="">' . $r . $tt . $hk . $assi_link . $key_text . $dev_assi_url . '</div>';

}

function get_t_key_comment_tt($div_what)
{
    $active_key = $div_what;
    $t_key_txt = lookup('select t_key_txt from diverses where div_what =  \'' . $active_key . '\'  ', 't_key_txt');
    $t_key_comment = lookup('select t_key_comment from diverses where div_what =  \'' . $active_key . '\'  ', 't_key_comment');

    $text = strip_tags($t_key_txt) . ' &nbsp; ';
    //if(is_dev() and !$inline) $key_text = '<div style="color:#999;font-size:0.8em">'.$active_key.' &nbsp;</div> ';

    $tt_txt = '<div style="color:#009;font-weight:bold">' . $t_key_txt . '</div>' . $t_key_comment;
    if (stristr($t_key_comment, '<img')) $this_tt_width = '750px';
    $tt_txt = wrap_in_div($tt_txt, 'tttxt', 'padding: 0 7px');
    $tt = tooltip($tt_txt, $img = '13', $style = 'margin-left:10px;position:relative', $class = 'tip', $width = $this_tt_width, $admin = false, $margin_top = '', $icon = '');
    if ($t_key_comment <> '') return $tt;

}


function get_setting_box($active_key, $inline = true, $msgbox = true, $tooltip_lu = false, $page_reload = false, $show_assi_title = true, $inline_max_width = '250', $show_text_content = false, $div_class = 'pd_settings', $display_tt_text = false, $edit_text_content = false)
{
    global $wizard_icon13, $themes_icon, $themes_icon10, $bearb_mode_use_popup_windows, $manager_icon, $preview_icon, $preview_icon16, $preview_icon13;

    $admin_WS = DIR_WS_FULL . 'admin6093/';
    $catalog_WS = DIR_WS_FULL;

    $sql = "select * from diverses where div_what = '" . $active_key . "'  ";

    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $div_id = $row["div_id"];
        $div_what = $row["div_what"];
        $div_res = $row["div_res"];
        $div_res_long = $row["div_res_long"];
        $div_res_default = $row["div_res_default"];
        $div_res_long_default = $row["div_res_long_default"];
        $nr = $row["nr"];
        $context = $row["context"];
        $funktion = $row["funktion"];
        $bemerkung = $row["bemerkung"];
        $bemerkung_long = $row["bemerkung_long"];
        $app_top = $row["app_top"];
        $rel1 = $row["rel1"];
        $rel2 = $row["rel2"];
        $modul = $row["modul"];
        $key_type = $row["key_type"];
        $t_key_comment = $row["t_key_comment"];
        $t_key_detail_link = $row["t_key_detail_link"];
        $t_key_txt = $row["t_key_txt"];
        $last_modi = $row["last_modi"];
        $is_multi_lng = $row["is_multi_lng"];
        $div_res_fr = $row["div_res_fr"];
        $div_res_long_fr = $row["div_res_long_fr"];
        $div_res_en = $row["div_res_en"];
        $div_res_long_en = $row["div_res_long_en"];
        $div_res_it = $row["div_res_it"];
        $div_res_long_it = $row["div_res_long_it"];
        $div_res_ru = $row["div_res_ru"];
        $div_res_long_ru = $row["div_res_long_ru"];
        $div_res_es = $row["div_res_es"];
        $div_res_long_es = $row["div_res_long_es"];
        $div_res_nl = $row["div_res_nl"];
        $div_res_long_nl = $row["div_res_long_nl"];
        $assi_title = $row["assi_title"];
        $assi_url = $row["assi_url"];
        $assi_typ = $row["assi_typ"];
        $for_menu = $row["for_menu"];
        $mtime = $row["mtime"];
        $help_key = $row["help_key"];
        $design_assi_url = $row["design_assi_url"];
        $help_key_siko = $row["help_key_siko"];
        $c1 = $row["c1"];
        $b1 = $row["b1"];
        $sa = $row["sa"];
        $is_hidden = $row["is_hidden"];
        $manager_url = $row["manager_url"];
        $lv1 = $row["lv1"];
        $lv2 = $row["lv2"];
        $lv3 = $row["lv3"];
        $lv4 = $row["lv4"];
        $lv5 = $row["lv5"];
        $is_active_switch = $row["is_active_switch"];
        $pv_link = $row["pv_link"];
        $assi_type = $row["assi_type"];
        $temp_nr = $row["temp_nr"];
    }
    mysql_free_result($sql_result);
    $debug .= '<div>';
    $debug .= '<br>assi_url: ' . $assi_url;
    $debug .= '<br>assi typ: ' . $assi_typ;
    $debug .= '<br>design_assi_url: ' . $design_assi_url;
    $debug .= '<br>is_active_switch: ' . $is_active_switch;
    $debug .= '<br>assi type: ' . $assi_type;

    $this_assi_url = '';
    if ($design_assi_url == '' and $assi_url <> '') $this_assi_url = $assi_url;
    if ($assi_url == '' and $design_assi_url <> '') $this_assi_url = $design_assi_url;
    if ($design_assi_url <> '' and $assi_url <> '') $this_assi_url = $assi_url;

    $text = strip_tags($t_key_txt) . ' &nbsp; ';
    if (is_dev() and !$inline) $key_text = '<div style="color:#999;font-size:0.8em"><a href="javascript:open_for_edit_div2(' . $div_id . ')">' . $active_key . '</a>&nbsp;</div> ';

    if (!$display_tt_text) {
        $tt_txt = '<div style="color:#009;font-weight:bold">' . $t_key_txt . '</div>' . $t_key_comment;
        if (stristr($t_key_comment, '<img')) $this_tt_width = '750px';
        $tt_txt = wrap_in_div($tt_txt, 'tttxt', 'padding: 5px 7px;font-size:1.2em');
        $tt = tooltip($tt_txt, $img = '13', $style = 'margin-left:4px;position:relative', $class = 'tip', $width = $this_tt_width, $admin = false, $margin_top = '', $icon = '');
    } else {
        //$tt_txt = '<div style="color:#009;font-weight:bold">'.$t_key_txt.'</div>' . $t_key_comment; if(stristr($t_key_comment,'<img')) $this_tt_width = '750px';
        $tt_txt = '<div class="qedit_comment" style="font-weight:normal;margin:4px 0 0 -8px ;padding:2px 6px;max-height:120px">' . $t_key_comment . '</div>';
        if (stristr($t_key_comment, '<img')) $this_tt_width = '750px';
        $tt_txt = wrap_in_div($tt_txt, 'tttxt', 'padding: 0 7px;');
        if (trim($t_key_comment) <> '') $tt_disp = $tt_txt;
    }


    if ($assi_type == 1) {
        $assi_link = get_lw_link_button_assi(
            $assi_url,
            $goto = $active_key,
            $help_key,
            $button_text = '',
            $button_class = 'button99',
            $button_title = '',
            $pop_title = '',
            $width = '1550',
            $height = '',
            $button_style = 'margin-left:4px',
            $icon_size = '13',
            $show_help_icon = true
        );
    }

    if ($assi_type == 2) {
        $assi_link = get_lw_link_button_assi(
            $design_assi_url,
            $goto = $active_key,
            $help_key,
            $button_text = '',
            $button_class = 'button99',
            $button_title = '',
            $pop_title = '',
            $width = '1550',
            $height = '',
            $button_style = 'margin-left:4px',
            $icon_size = '13',
            $show_help_icon = true
        );
    }

    if ($assi_type == 3) {
        $assi_link = get_lw_link_button_assi(
            $manager_url,
            $goto = $active_key,
            $help_key,
            $button_text = '',
            $button_class = 'button99',
            $button_title = '',
            $pop_title = '',
            $width = '1550',
            $height = '',
            $button_style = 'margin-left:4px',
            $icon_size = '13',
            $show_help_icon = true
        );
    }

    if ($assi_type == 1 and $design_assi_url <> '') {

        $design_button_title = lookup('select assi_title from diverses where design_assi_url =  "' . $design_assi_url . '" and assi_type=2 ', 'assi_title');
        $assi_link_design = get_lw_link_button_assi(
            $design_assi_url,
            $goto = '',
            $help_key,
            $button_text = '',
            $button_class = 'button99',
            $button_title = $design_button_title,
            $pop_title = '',
            $width = '1550',
            $height = '',
            $button_style = 'margin-left:4px',
            $icon_size = '13',
            $show_help_icon = false
        );
    }

    if ($assi_type == 1 and $manager_url <> '') {
        $assi_link_design = get_lw_link_button_assi(
            $manager_url,
            $goto = '',
            $help_key,
            $button_text = '',
            $button_class = 'button99',
            $button_title = '',
            $pop_title = '',
            $width = '1550',
            $height = '',
            $button_style = 'margin-left:4px;',
            $icon_size = '13',
            $show_help_icon = false
        );
    }

    if ($pv_link <> '') {
        //$pv_link = str_replace('../','',$pv_link);

        $href = $pv_link;
        $text = $preview_icon16 . '';
        $title = 'Popup Box-Vorschau';
        $class = "button99";
        $style = "margin:0px;padding:3px 4px";
        $width = '340';
        $height = '690';
        $type = 'il';
        //get_link($href,$text,$title,$class,$style,$width,$height,$type,$add_session=true,$add_span=false,$master_key='',$header_use=false)
        $pv = get_link($href, $text, $title, $class, $style, $width, $height, $type);
    }

    if ($this_assi_url == '') $th_hint = '<span style="color:#c00">xxxxxxxxx</span>';
    if ($show_assi_title) $r = '<div style="color:#369;font-weight:normal;font-size:0.9em;margin:0 0 0 0"><a style="text-decoration:underline" target="_blank" title="diesen Assi &ouml;ffnen" href="' . $this_assi_url . '">' . $assi_title . $th_hint . '</a></div>';
    if (!$display_tt_text) {
        $r .= '<div style="color:#009;font-weight:bold;font-size:1.1em;margin:0 0 0 0">' . strip_tags($t_key_txt) . '</div>';
    } else {
        $r .= '<div style="color:#009;font-weight:bold;font-size:1.1em;margin:0 0 0 0">' . strip_tags($t_key_txt) . $tt_disp . '</div>';
    }


    if ($show_text_content and $assi_typ == 'text') {
        if ($edit_text_content) {
            //$r .= '<div style="color:#000;font-weight:normal;font-size:0.9em;margin:4px 0 6px 0;padding:3px;border:1px #ccc solid;background:#f9f9f9">'.strip_tags($div_res).'</div>';

            $zuf = mt_rand(100000, 100000000);
            //$r .= get_bmode_link_admin_new_text($t_key,$help_key);
            $r .= '<div style="margin:4px 6px 3px 0">' . ($is_multi_lng ? lang_icon('de') : '') . '<span style="width:96%;font-size:1.1em;margin-left:4px;' . $t_style . '" class="axupd_1" id="' . $active_key . $zuf . '">' . get_dv($active_key) . '</span>';
            $r .= '
			<script>new Ajax.InPlaceEditor(\'' . $active_key . $zuf . '\', \'ax_updater.php?id=163_' . $active_key
                . '\',{okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - max. 255 Zeichen\'});</script>
			';

            $r .= '</div>';
            if ($is_multi_lng) $r .= '<div style="font-size:0.9em;color:#888">Assi &ouml;ffnen f&uuml;r die &Uuml;bersetzungen.</div>';
            $r .= '';


        } else {
            $r .= '<div style="color:#000;font-weight:normal;font-size:0.9em;margin:4px 0 6px 0;padding:3px;border:1px #ccc solid;background:#f9f9f9">' . strip_tags($div_res) . '</div>';
        }
    }

    //function is_active_icon_link($key,$msgbox=true,$float_right=true,$with_text=false,$f_size='',$link_bars=false, $show_dev_key=false, $allow_as_button=false, $button_class='', $page_reload=false, $style='', $pre_txt='')
    if ($assi_typ == 'bool') $r .= is_active_icon_link($active_key, $msgbox, false, $with_text = $active_as_button, $f_size = '', false, false, $allow_as_button = false, $button_class = 'button999', $page_reload, $style = '', $pre_txt = '');


    if ($assi_typ == 'select') {
        if ($show_assi_title) $r = '<div style="color:#369;font-weight:normal;font-size:0.9em;margin:0 0 0 0">' . $assi_title . '</div>';
        $r .= '<div style="margin:-3px 4px 0px 0;font-size:1.3em;">' . get_select_by_t_key_easy($active_key, true) . '</div>';
    }

    if ($assi_typ == 'color2') {

        $r .= '<div style="margin-right:3px; display:inline-block;width:51px;padding:1px 3px;height:15px;background:' . $div_res . ';border:1px #ccc solid">&nbsp;</div> <span style="margin-right:12px">' . $div_res . '</span>';
        //$r .= assi_link_button($t_key,$class='button99',$style='');
        //return wrap_in_div($r);
    }


    if (is_dev()) $dev_key_txt = '<input style="margin:0 0 0  12px;display:inline-block;padding:4px" onclick="this.select()" value="' . $active_key . '" type="text"> ' . $key_text;

    if ($assi_typ == 'bool' and !to_bool($div_res)) {
        $t_bg_color = '#ddddd0';
    } else {
        $t_bg_color = '#ddeefe';
    }

    //$inline_max_width = $inline_max_width +26;


    $debug .= '</div>';

    if (is_dev()) $get_dev_link_short = get_dev_link_short($div_what);

    if ($inline) {
        if (is_dev()) {
            return '<div id="div_' . $active_key . '" class="' . $div_class . '" style="max-width:' . $inline_max_width . 'px;background:' . $t_bg_color . ';padding:4px;font-size:0.9em">' . $r . $tt . $assi_link . $assi_link_design . $pv . $dev_key_txt .
            get_dev_link_short($active_key) . '</div>';
        } else {
            return '<div id="div_' . $active_key . '" class="' . $div_class . '" style="max-width:' . $inline_max_width . 'px;background:' . $t_bg_color . ';padding:4px;font-size:0.9em">' . $r . $tt . $assi_link . $assi_link_design . $pv . $dev_key_txt . '</div>';
        }
    } else {
        //return '<div id="div_'.$active_key.'" style="padding:4px;margin: 0 -3px 4px -3px;border:1px #ccc outset;background:'.$t_bg_color.';font-size:0.9em">'.$r.$tt.$assi_link.$dev_assi_url.$pv.$dev_key_txt.$get_dev_link_short.$debug.'</div>';
        return '<div id="div_' . $active_key . '" style="padding:4px;margin: 0 -3px 4px -3px;border:1px #ccc outset;background:' . $t_bg_color . ';font-size:0.9em">' . $r . $tt . $assi_link . $dev_assi_url . $pv . $dev_key_txt . $get_dev_link_short . '</div>';
    }

}


function get_bmode_link_admin_new($text = '', $link, $active_key, $help_key, $inline = false, $active_as_button = false, $design_assi_url = '', $design_assi_show = false, $assi_type = 'Design-Assi')
{
//get_setting_box('at_prod_list_default_nr',$inline=true,$msgbox=true,$tooltip_lu=false,$page_reload=false,$show_assi_title=true,$inline_max_width='',$show_text_content=false,$div_class='pd_settings',$display_tt_text)
    return get_setting_box($active_key, $inline, $msgbox = true, $tooltip_lu = false, $page_reload = false, $show_assi_title = true, $inline_max_width = '250', $show_text_content = false, $div_class = 'settings', $display_tt_text);

    global $wizard_icon13, $themes_icon, $themes_icon10, $bearb_mode_use_popup_windows;


    $admin_WS = DIR_WS_FULL . 'admin6093/';
    $catalog_WS = DIR_WS_FULL;

    $text = '';
    if ($text == '') {

        $t_key_txt = strip_tags(lookup('select t_key_txt from diverses where div_what =  \'' . $active_key . '\'  ', 't_key_txt'));
        $t_key_comment = lookup('select t_key_comment from diverses where div_what =  \'' . $active_key . '\'  ', 't_key_comment');

        $text = strip_tags($t_key_txt) . ' &nbsp; ';
        if (is_dev() and !$inline) $key_text = '<div style="color:#999;font-size:0.8em">' . $active_key . ' &nbsp;</div> ';

        $tt_txt = '<div style="color:#009;font-weight:bold">' . $t_key_txt . '</div>' . $t_key_comment;
        if (stristr($t_key_comment, '<img')) $this_tt_width = '750px';
        $tt_txt = wrap_in_div($tt_txt, 'tttxt', 'padding: 0 7px');
        $tt = tooltip($tt_txt, $img = '13', $style = 'margin-left:10px;position:relative', $class = 'tip', $width = $this_tt_width, $admin = false, $margin_top = '', $icon = '');

        $assi_title = lookup('select assi_title from diverses where div_what =  \'' . $active_key . '\'  ', 'assi_title');
        $assi_url = lookup('select assi_url from diverses where div_what =  \'' . $active_key . '\'  ', 'assi_url');
        //$design_assi_url = lookup('select assi_url from diverses where div_what =  \''.$active_key.'\'  ','design_assi_url');
        //$assi_type = lookup('select assi_type from diverses where div_what =  \''.$active_key.'\'  ','assi_type');

        if (stristr($assi_url, 'wrapper_full.php?') or stristr($assi_url, 'wrapper_all.php?')) {
            if (stristr($assi_url, 'quick_config_design') and $assi_type <> 'Konfig.-Assi') {
                if (!$bearb_mode_use_popup_windows) {
                    $assi_link = '<a class="button99" style="margin-left:12px" title="' . $assi_title . ' - Design-Assi - neues Fenster" target="_blank" href="' . $assi_url . '#' . $active_key . '">' . $themes_icon10 . ' Design-Assi</a>';
                } else {
                    $assi_link = get_lw_link_button_assi(
                        $assi_url,
                        $goto = $active_key,
                        $help_key,
                        $button_text = '',
                        $button_class = 'button99',
                        $button_title = '',
                        $pop_title = '',
                        $width = '1550',
                        $height = '',
                        $button_style = 'margin-left:12px',
                        $icon_size = '13'
                    );
                }
            } else {
                if (!$bearb_mode_use_popup_windows) {
                    $assi_link = '<a class="button99" style="margin-left:12px" title="' . $assi_title . ' - Konfig-Assi - neues Fenster" target="_blank" href="' . $assi_url . '#' . $active_key . '">' . $wizard_icon13 . ' Konfig.-Assi</a>';
                } else {
                    $assi_link = get_lw_link_button_assi(
                        $assi_url,
                        $goto = $active_key,
                        $help_key,
                        $button_text = '',
                        $button_class = 'button99',
                        $button_title = '',
                        $pop_title = '',
                        $width = '1550',
                        $height = '',
                        $button_style = 'margin-left:12px',
                        $icon_size = '13'
                    );
                }
            }
        }
        if ($design_assi_url <> '' and $design_assi_show) {
            if ($assi_type == 'Editor &ouml;ffnen') $themes_icon13 = '';
            $assi_link .= '<a class="button99" style="margin-left:39px" title="' . $assi_type . ' - neues Fenster" target="_blank" href="' . $design_assi_url . '">' . $themes_icon10 . ' ' . $assi_type . '</a>';
        }

        if (is_dev() and !$inline) $dev_assi_url = '<div style="color:#999;font-size:0.8em">' . $assi_url . '</div>';


    }
    if ($active_as_button) $button_class = "button99";
    if ($link == '') {
        if (is_dev()) {
            $r = '<div style="font-size:0.9em;font-weight:bold; color:#009;margin:3px 0 4px 0;">' . get_long_html1_editor_by_t_key_field_plain($active_key, 't_key_txt') . '</div>';
        } else {
            $r = '<div style="color:#009;font-weight:bold;font-size:0.9em;margin:3px 0 4px 0">' . $text . '</div>';
        }
        //function is_active_icon_link($key,$msgbox=true,$float_right=true,$with_text=false,$f_size='',$link_bars=false, $show_dev_key=false, $allow_as_button=false, $button_class='', $page_reload=false, $style='', $pre_txt=''){
        if ($active_key <> '') $r .= is_active_icon_link($active_key, $msgbox = false, false, $with_text = $active_as_button, $f_size = '', false, false, $allow_as_button = false, $button_class = 'button999');
        //if($help_key<>'' and !$bearb_mode_use_popup_windows) $hk = help_icon_new($help_key, $txt='Hilfe', $title='', $with_text=true, $new_window=false, $icon='13', $class='button99', $style='');
        if ($help_key <> '') $hk = help_icon_new($help_key, $txt = 'Hilfe', $title = '', $with_text = true, $new_window = false, $icon = '13', $class = 'button99', $style = '');

    } else {
        $r = '<a target="_blank" title="Konfig.-Assi - neues Fenster" href="' . $link . '">' . $text . '</a> ';
        if ($active_key <> '') $r .= is_active_icon_link($active_key, $msgbox = false, false, $with_text = $active_as_button, $f_size = '', false, false, $allow_as_button = false, $button_class = 'button999');
        //if($help_key<>'' and !$bearb_mode_use_popup_windows) $hk = help_icon_new($help_key, $txt='Hilfe', $title='', $with_text=true, $new_window=false, $icon='13', $class='button99', $style='');
        if ($help_key <> '') $hk = help_icon_new($help_key, $txt = 'Hilfe', $title = '', $with_text = true, $new_window = false, $icon = '13', $class = 'button99', $style = '');
    }

    $hk = '';

    if ($inline) {
        return '<div class="settings" style="max-width:250px">' . $r . $tt . $hk . $assi_link . $key_text . $dev_assi_url . '</div>';
    } else {
        return '<div style="padding:4px;margin: 0 -3px 4px -3px;border:1px #ccc outset;background:#fff">' . $r . $tt . $hk . $assi_link . $key_text . $dev_assi_url . '</div>';
    }

}


function is_design_assi()
{
    if (stristr(getParam('incl', ''), 'includes/quick_config_design/')) {
        return true;
    } else {
        return false;
    }

}

function is_konfig_assi()
{
    if (stristr(getParam('incl', ''), 'includes/quick_config_new/template1.php')) {
        return true;
    } else {
        return false;
    }
}


function get_help_topic_plain($str)
{

    $sql = "select * from help_videos2 where `help_key` = '" . $str . "' ";
    //achtung key kann mehrfach vorhanden sein
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $id = $row["id"];
        $vid_title = $row["vid_title"];

    }
    mysql_free_result($sql_result);

    return $vid_title;

}

// bearb mode end


function str_replace_decimal_point($str)
{
    $str1 = $str;
    if (!(stristr($str, '.00') and stristr($str, ',00'))) $str = str_replace('.00', '.-', $str);
    $str = str_replace(',00', ',-', $str);
    return $str;

}

function remove_last_char($str, $anz = 1)
{
    return substr($str, 0, strlen($str) - $anz);
}


function to_ws($fs_path)
{
    $r = str_replace(ROOT_FOLDER . CAT_FOLDER_TOP . '/' . CAT_FOLDER, DIR_WS_FULL, $fs_path);
    $r = str_replace('//', '/', $r);
    $r = str_replace('http:/', 'http://', $r);
    $r = str_replace('https:/', 'https://', $r);
    return $r;
}

function to_fs($ws_path)
{
    $r = str_replace(DIR_WS_FULL, ROOT_FOLDER . CAT_FOLDER_TOP . CAT_FOLDER . '/', $ws_path);
    $r = str_replace('//', '/', $r);
    //$r = str_replace('http://','https://',$r);

    return $r;
}


function gms_products_name_js_safe($products_name)
{
    $products_name = gms_products_name($products_name);
    $products_name = str_replace('\'', '', $products_name);
    $products_name = str_replace('"', '', $products_name);
    return $products_name;
}

function number_products_manufacturer($manuf_id)
{
    global $products_number_in_category_show;
    if ($products_number_in_category_show) {
        $sql = "select anz_prod from manufacturers where manufacturers_id = " . $manuf_id;
        return '(' . lookup($sql, 'anz_prod') . ')';
    }
}


function gms_products_name($products_name)
{
    global $at_is_gay_shop, $use_gms_short_prod_name;


    if ($at_is_gay_shop and $use_gms_short_prod_name) {
        if (stristr($products_name, ':')) {
            $a = explode(':', $products_name, 2);
            return $a[1];
        } else {
            return $products_name;
        }
    } else {
        return $products_name;
    }

}

function gms_products_name_first_part($products_name)
{
    global $at_is_gay_shop, $use_gms_short_prod_name;
    if ($at_is_gay_shop and $use_gms_short_prod_name) {
        if (stristr($products_name, ':')) {
            $a = explode(':', $products_name, 2);
            return $a[0];
        } else {
            return '';
        }
    } else {
        return '';
    }
}


function color_inverse($color)
{
    $color = str_replace('#', '', $color);
    if (strlen($color) != 6) {
        return '000000';
    }
    $rgb = '';
    for ($x = 0; $x < 3; $x++) {
        $c = 255 - hexdec(substr($color, (2 * $x), 2));
        $c = ($c < 0) ? 0 : dechex($c);
        $rgb .= (strlen($c) < 2) ? '0' . $c : $c;
    }
    return '#' . $rgb;
}


function anz_prods_in_manuf($manuf_id)
{
    $sql = "select anz_prod from manufacturers where manufacturers_id =  " . $manuf_id;
    $anz_prod = lookup($sql, 'anz_prod');
    return $anz_prod;
}

function anz_prods_in_cat($cat_id)
{
    $sql = "select anz_prod from categories where categories_id =  " . $cat_id;
    $anz_prod = lookup($sql, 'anz_prod');
    if ($anz_prod == 0) {
        $sql = "select anz_prod_subcats from categories where categories_id =  " . $cat_id;
        $anz_prod_subcats = lookup($sql, 'anz_prod_subcats');
        return $anz_prod_subcats;
    } else {
        return $anz_prod;
    }
}


function has_specials($cat_id)
{
    $anz = lookup('select anz_specials from categories where categories_id = ' . $cat_id . '  ', 'anz_specials');
    if ($anz > 0) return true;
}

function has_anz_specials($cat_id)
{
    $anz = lookup('select anz_specials from categories where categories_id = ' . $cat_id . '  ', 'anz_specials');
    if ($anz > 0) return $anz;
}


//include('gms_functions.php');
function get_price_label($special_price, $norm_price, $products_tax_class_id, $vat_hint = '', $text_align = 'center', $is_prod_info = false, $show_sales_icon_here = true, $products_id = 0)
{
    global $currencies, $get_order_button_v1, $prices_to_short_price, $hide_price_label_and_order_button,
           $show_sale_icon, $specials_icon_32, $price_lable_specials_text_color, $price_lable_specials_text_shadow,
           $price_lable_specials_text_shadow_use, $price_lable_specials_text_size, $product_info_inset_text_color, $product_info_price_text_color, $kaspersky_is_active;

    if ($kaspersky_is_active) global $apreis, $apreis_type, $apreis_hint, $language, $reg_preis_hint_show, $app_top_tax_rate, $session_lang_code_from_lang_id, $price_by_bank, $customers_bank_name;

//return '-----'.$apreis_hint;
//ec(__line__.' '.$products_id);

    if ($price_lable_specials_text_shadow_use) {
        $special_text_shadow_str = ' text-shadow: 1px 1px 1px ' . $price_lable_specials_text_shadow . '; ';
    } else {
        $special_text_shadow_str = '';
    }

    if ($price_lable_specials_text_size == '') $price_lable_specials_text_size = '1.0';
    if (!$show_sales_icon_here) {
        $t_specials_icon_32 = '';
    } else {
        $t_specials_icon_32 = $specials_icon_32;
    }
    /*
if ($show_sale_icon){
	if (curPageName() == 'product_info.php' and 1==2 ){
	$specials_icon_32 = '';
	}
}
*/
    if ($hide_price_label_and_order_button) return '';

    if ($is_prod_info) {
        $label_class = 'ov_product_price';
        $price_color_style_str = ';color:' . $product_info_inset_text_color;
    } else {
        $label_class = 'ov_product_price';
    }

    $is_prod_info = false;
    if (curPageName() == 'product_info.php') $is_prod_info = true;

//ec(__line__.' ---- '.$is_prod_info);

    if ($get_order_button_v1) {
        if ($special_price > 0) {
            $norm_preis = $currencies->display_price($norm_price, tep_get_tax_rate($products_tax_class_id));
            if ($prices_to_short_price) $norm_preis = str_replace_decimal_point($norm_preis);
            $preis = $currencies->display_price($special_price, 0);

            if ($kaspersky_is_active and $apreis_type == 22 and $_SESSION['valid_coupon']) {    // if($apreis_type == 2  and !$_SESSION['valid_coupon'] == true )
                $normal_preis = $preis;
                $preis_kaspersky = get_price($products_id, $price_info = '', $add_regular_price = false, $to_currency = true, $quantity = 1, $add_price_div = true);
            }

            if ($prices_to_short_price) $preis = str_replace_decimal_point($preis);
//ec(__line__.' '.$is_prod_info);
            if ($is_prod_info) {
                $col_inv = color_inverse($product_info_price_text_color);
                $rgba_str = hex_color_to_rgba($col_inv, $opacity = 0.9);
                $l = '<div class="' . $label_class . '" style="margin:2px 8px 5px 18px;text-align:' . $text_align . ';line-height:90%;color: ' . $product_info_price_text_color . '">' . $t_specials_icon_32 .
                    '<s style="margin-left:0;font-size:0.8em;opacity:0.4;' . $price_color_style_str . '">' . $norm_preis . '</s><br>
				<span id="prod_price_inner_' . $products_id . '" style="color:' . get_dv('price_lable_text_color') . ';text-shadow:' . $rgba_str . ' 0.04em 0.05em 0.15em;font-size:' . $price_lable_specials_text_size . 'em">' . $preis . $vat_hint . '</span></div>';
            } else {

                $l = '<div class="' . $label_class . '" style="margin:0px 8px 4px 8px;text-align:' . $text_align . ';line-height:90%;position:relative;">' . $t_specials_icon_32 .
                    '<s style="font-size:0.85em;opacity:0.5;' . $price_color_style_str . '">' . $norm_preis . '</s>
				<br><span style="color:' . $price_lable_specials_text_color . ';' . $special_text_shadow_str . ' font-size:' . $price_lable_specials_text_size . 'em">
				<span style="white-space:nowrap;color:' . get_dv('price_lable_text_color') . '">' . $preis . '</span>' . $vat_hint . '</span></div>';

                if ($kaspersky_is_active and $apreis_type == 22 and $_SESSION['valid_coupon']) {
                    $l .= '<div  style="margin:0 13px 8px 4px;text-align:' . $text_align . $price_color_style_str . ';color:#a00;font-size:1.0em">' .
                        AKTIONSPREIS_KASP . ': ' . $_SESSION['valid_coupon_code'] . '<br>' . AKTIONSPREIS_STATT_KASP . ' ' . $normal_preis . '</div>';
                }

            }
        } else { //if ($special_price>0){


            $preis = $currencies->display_price($norm_price, tep_get_tax_rate($products_tax_class_id));

            //if($kaspersky_is_active  and $apreis_type == 22  and $_SESSION['valid_coupon']){
            //if($kaspersky_is_active  and $apreis  and $_SESSION['valid_coupon']){
            if ($kaspersky_is_active and $apreis) {
                $normal_preis = $preis;
                $preis_kaspersky = get_price($products_id, $price_info = '', $add_regular_price = false, $to_currency = true, $quantity = 1, $add_price_div = true);
            }

            if ($prices_to_short_price) $preis = str_replace_decimal_point($preis);

            if ($is_prod_info) {
                $col_inv = color_inverse($product_info_price_text_color);
                $rgba_str = hex_color_to_rgba($col_inv, $opacity = 0.9);

                //if($kaspersky_is_active  and $apreis_type == 22  and $_SESSION['valid_coupon']){
                //if($kaspersky_is_active  and $apreis  and $_SESSION['valid_coupon']){
                if ($kaspersky_is_active and $apreis) {
                    //$normal_preis = $preis;
                    $normal_preis = get_price_from_id($products_id, $quantity = 1, $no_class = false, $currency_rate = 1, $display_special_price = false, $line_break = false, $show_currency = true);
                    $preis_kaspersky = get_price($products_id, $price_info = '', $add_regular_price = false, $to_currency = true, $quantity = 1, $add_price_div = true);
                    $l = '<div id="prod_price_inner" class="' . $label_class . '" style="margin:2px 13px 2px 4px;text-align:' . $text_align . $price_color_style_str . ';text-shadow:' . $rgba_str . ' 0.04em 0.05em 0.15em;color: ' .
                        $product_info_price_text_color . '">' . $preis_kaspersky . $vat_hint . '</div>';

                    if ($apreis_type == 22) {
                        $l .= '<div  style="margin:2px 0 6px 0;text-align:' . $text_align . $price_color_style_str . ';color:#a00;font-size:0.75em;font-weight:normal">' .
                            AKTIONSPREIS_KASP . ': ' . $_SESSION['valid_coupon_code'] . '<br>' . AKTIONSPREIS_STATT_KASP . ' ' . $normal_preis . '</div>';
                    }

                    if ($apreis_type == 3) {
                        if ($session_lang_code_from_lang_id == 'de') {
                            $apreis_hint = get_dv('email_priv_hint_german');
                        } else {
                            $apreis_hint = get_dv_long_field('email_priv_hint_german', 'div_res_' . $session_lang_code_from_lang_id);
                        }
                        $customers_email_address = customers_email_address($_SESSION['customer_id']);
                        $priv_company_name = priv_company_name($customers_email_address);
                        $apreis_hint = str_replace('#firma#', $priv_company_name, $apreis_hint);

                        $l .= '<div  style="margin:2px 6px 6px 6px;text-align:' . $text_align . $price_color_style_str . ';color:#a00;font-size:0.7em;font-weight:normal;max-width:200px;white-space:normal">' . $apreis_hint .
                            '<br>' . AKTIONSPREIS_STATT_KASP . ' ' . $normal_preis . '</div>';
                    }

                    if ($apreis_type == 1 and $price_by_bank) {
                        if ($session_lang_code_from_lang_id == 'de') {
                            $apreis_hint = get_dv('email_bank_hint_german');
                        } else {
                            $apreis_hint = get_dv_long_field('email_priv_bank_german', 'div_res_' . $session_lang_code_from_lang_id);
                        }
                        //$customers_email_address = customers_email_address($_SESSION['customer_id']);
                        //$priv_company_name = priv_company_name($customers_email_address);
                        $apreis_hint = str_replace('#bank#', $customers_bank_name, $apreis_hint);

                        $l .= '<div  style="margin:2px 6px 6px 6px;text-align:' . $text_align . $price_color_style_str . ';color:#a00;font-size:0.7em;font-weight:normal;max-width:200px;white-space:normal">' . $apreis_hint .
                            '<br>' . AKTIONSPREIS_STATT_KASP . ' ' . $normal_preis . '</div>';
                    }


                } else {
                    /*
ec(__line__.' '.$price_color_style_str);
ec(__line__.' '.$product_info_price_text_color);
ec(__line__.' '.get_dv('price_lable_text_color'));
ec(__line__.' '.$label_class);
*/
                    /*
					$l = '<div id="prod_price_inner" class="'.$label_class.'" style="margin:2px 13px 2px 4px;text-align:'.$text_align.$price_color_style_str.';text-shadow:'.$rgba_str.' 0.04em 0.05em 0.15em;color: '.
					$product_info_price_text_color .'">'.$preis.$vat_hint.'</div>';
					*/
                    //$l = '<div id="prod_price_inner" class="'.$label_class.'" style="margin:2px 13px 2px 4px;text-align:'.$text_align.';text-shadow:'.$rgba_str.' 0.04em 0.05em 0.15em;color: '.get_dv('price_lable_text_color') .'">'.$preis.$vat_hint.'</div>';
                    $l = '<div id="prod_price_inner_' . $products_id . '" class="' . $label_class . '" style="margin:0;text-align:' . $text_align . ';text-shadow:' . $rgba_str . ' 0.04em 0.05em 0.15em;color: ' . get_dv('price_lable_text_color') . '">' . $preis . $vat_hint . '</div>';

                }


            } else { //if($is_prod_info) {


                //if($kaspersky_is_active  and $apreis_type == 22  and $_SESSION['valid_coupon']){
                //if($kaspersky_is_active  and $apreis  and $_SESSION['valid_coupon']){
                if ($kaspersky_is_active and $apreis) {
                    $l = '<div class="' . $label_class . '" style="margin:2px 13px 2px 4px;text-align:' . $text_align . $price_color_style_str . ';">' . $preis_kaspersky . $vat_hint . '</div>';

                    if ($apreis_type == 22) {
                        $l .= '<div  style="margin:0 13px 8px 4px;text-align:' . $text_align . $price_color_style_str . ';color:#a00;font-size:1.0em;font-weight:normal">' .
                            AKTIONSPREIS_KASP . ': ' . $_SESSION['valid_coupon_code'] . '<br>' . AKTIONSPREIS_STATT_KASP . ' ' . $normal_preis . '</div>';
                    }

                    if ($apreis_type == 3) {

                        if ($session_lang_code_from_lang_id == 'de') {
                            $apreis_hint = get_dv('email_priv_hint_german');
                        } else {
                            $apreis_hint = get_dv_long_field('email_priv_hint_german', 'div_res_' . $session_lang_code_from_lang_id);
                        }
                        $customers_email_address = customers_email_address($_SESSION['customer_id']);
                        $priv_company_name = priv_company_name($customers_email_address);
                        $apreis_hint = str_replace('#firma#', $priv_company_name, $apreis_hint);

                        $l .= '<div  style="margin:0 28px 8px 10px;text-align:' . $text_align . $price_color_style_str . ';color:#a00;font-size:1.0em;font-weight:normal">' . $apreis_hint . '<br>' . AKTIONSPREIS_STATT_KASP . ' <span style="white-space:nowrap">' . $normal_preis . '</span></div>';
                    }


                    if ($apreis_type == 1 and $price_by_bank) {
                        if ($session_lang_code_from_lang_id == 'de') {
                            $apreis_hint = get_dv('email_bank_hint_german');
                        } else {
                            $apreis_hint = get_dv_long_field('email_bank_hint_german', 'div_res_' . $session_lang_code_from_lang_id);
                        }
                        //$customers_email_address = customers_email_address($_SESSION['customer_id']);
                        //$priv_company_name = priv_company_name($customers_email_address);
                        $apreis_hint = str_replace('#bank#', $customers_bank_name, $apreis_hint);

                        $l .= '<div  style="margin:0 28px 8px 10px;text-align:' . $text_align . $price_color_style_str . ';color:#a00;font-size:1.0em;font-weight:normal;">' . $apreis_hint .
                            '<br>' . AKTIONSPREIS_STATT_KASP . ' ' . $normal_preis . '</div>';
                    }


                } else {
                    //ec(__line__.' '.$label_class);
                    // falsch - siehe oben !?
                    $l = '<div class="' . $label_class . '" style="margin:2px 13px 2px 4px;text-align:' . $text_align . $price_color_style_str . ';color: ' . get_dv('price_lable_text_color') . '">' . $preis . $vat_hint . '</div>';
                }

            } //if($is_prod_info) {
        } //if ($special_price>0){
    } else { //if ($get_order_button_v1){
        /*
		if ($special_price>0){
			$norm_preis = $currencies->display_price($norm_price, tep_get_tax_rate($products_tax_class_id));
			if($prices_to_short_price) $norm_preis = str_replace(',00','.-',$norm_preis);
			$preis =$currencies->display_price($special_price, 0);
			if($prices_to_short_price) $preis = str_replace(',00','.-',$preis);
			$l = '<div class="'.$label_class.'" style="margin-top:0"><s style="font-size:0.95em;opacity:0.65;">'.$norm_preis.'</s><br>
			<span style="color:'.$price_lable_specials_text_color.'">'.$preis.$vat_hint.'</span></div>';

		}else{
			$preis =$currencies->display_price($norm_price, tep_get_tax_rate($products_tax_class_id));
			if($prices_to_short_price) $preis = str_replace(',00','.-',$preis);
			$l = '<div class="'.$label_class.'" style="margin-top:0;">'.$preis.$vat_hint.'</div>';
		}
		*/
    } //if ($get_order_button_v1){
    return $l;
}

//update address_book set entry_country_id = 204 where entry_country_id = 214

function get_entry_country_id($customers_id)
{
    $sql = "select entry_country_id from address_book where customers_id = " . $customers_id;
    return lookup($sql, 'entry_country_id');
}

function get_country($customers_id)
{
    $entry_country_id = get_entry_country_id($customers_id);
    $sql = "select countries_name from countries where countries_id = " . $entry_country_id;
//return lookup($sql,'countries_name').' ('.$entry_country_id.')';
    return lookup($sql, 'countries_name');
}


function get_wishlist_box()
{
    global $wishlist, $currencies, $trash_icon13, $boxes_left_right_use_header,
           $boxes_left_right_bg_props_color_img_txt_color, $boxes_left_right_bg_props_color_img_link_color, $boxes_left_right_bg_props_color_img_link_color_mover, $new_products_id_in_wishlist, $info_icon;
    $r = "";
    $r .= '<span id="wishlist1"></span>';


    $class_master = 'boxes_left_right';
    $r .= outer_div_top(
        $header_txt = get_dv('wish_list_box_header_txt', true),
        $class_master,
        $style = '',
        $float = 'left');


    $r .= '<div class="' . $class_master . '_content" id="wishlist">
<div style="padding:6px;"><!-- inner content -->';

    if (!to_bool($boxes_left_right_use_header)) {
        $r .= '<div style="margin-bottom:6px">' . get_dv('wish_list_box_header_txt') . ':</div>';
    }

    $info_box_contents = array();
    $info_box_contents[] = array('text' => '' . '' . get_dv('wish_list_box_header_txt') . ' (' . $wishlist->count_contents() . ')');

    //new infoBoxHeading($info_box_contents, true, true, tep_href_link(FILENAME_WISHLIST));
    /*
  if ($session_started == false) {
    tep_redirect(tep_href_link(FILENAME_COOKIE_USAGE));
    $wishlist_contents_string = '';
	}
*/
    $wishlist_contents_string = '<div id="wishlist_reload" class="mb9" style="display:none">
	<a class="button4" title="' . ll('aktualisieren') . '" href="javascript:window.location.reload()">
	' . ll('Wunschliste aktualisieren') . '</a></div>';

    if ($wishlist->count_lines() > 0) {
        if ($wishlist->count_lines() <= 1) {

            $wishlist_contents_string .= '<div>';
            $products = $wishlist->get_products();
            for ($i = 0, $n = sizeof($products); $i < $n; $i++) {
                //$wishlist_contents_string .= '<tr><td align="right" valign="top" class="infoBoxContents">';

                if ((tep_session_is_registered('new_products_id_in_wishlist')) && ($new_products_id_in_wishlist == $products[$i]['id'])) {
                    $wishlist_contents_string .= '';
                } else {
                    $wishlist_contents_string .= '';
                }

                //$wishlist_contents_string .= $products[$i]['quantity'] . '&nbsp;x&nbsp;</span></td><td valign="top" class="infoBoxContents"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products[$i]['id']) . '">';
                //$wishlist_contents_string .= ''.$products[$i]['quantity'] . '&nbsp;x&nbsp;</span><a title="&ouml;ffnen" href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products[$i]['id']) . '">';


                if ((tep_session_is_registered('new_products_id_in_wishlist')) && ($new_products_id_in_wishlist == $products[$i]['id'])) {
                    $wishlist_contents_string .= '<span class="newItemInCart" style="font-weight:normal">';
                    //ec('new: '.$products[$i]['id']);
                    $wishlist_contents_string .= '<div class="scart_wl_hint" style="padding:6px 6px;border-top:1px #666 dotted" class="newItemInCart" id="wishlistCont_' . $products[$i]['id'] . '"><div style="margin:0 6px -4px 0;float:left"><a class="trash_button" title="' . db_tr($definition = 'WISHLIST_DELE_THIS_ITEM', $page = 'general', $from_lang_code = 'de', $content = 'diesen Artikel aus meiner Wunschliste l&ouml;schen') . '" href="javascript:remove_from_wishlist(\'' . $products[$i]['id'] . '\',\'' . str_replace('\'', '', $products[$i]['name']) . '\')">' . $trash_icon13 . '</a></div>';
                } else {
                    $wishlist_contents_string .= '<span class="infoBoxContents" style="font-weight:normal">';
                    //ec('OLD: '.$products[$i]['id']);
                    $wishlist_contents_string .= '<div class="scart_wl_hint" style="padding:6px 6px;border-top:1px #666 dotted"  id="wishlistCont_' . $products[$i]['id'] . '"><div style="margin:0 6px -4px 0;float:left"><a class="trash_button" title="' . db_tr($definition = 'WISHLIST_DELE_THIS_ITEM', $page = 'general', $from_lang_code = 'de', $content = 'diesen Artikel aus meiner Wunschliste l&ouml;schen') . '" href="javascript:remove_from_wishlist(\'' . $products[$i]['id'] . '\',\'' . str_replace('\'', '', $products[$i]['name']) . '\')">' . $trash_icon13 . '</a></div>';
                }

                if ((tep_session_is_registered('new_products_id_in_wishlist')) && ($new_products_id_in_wishlist == $products[$i]['id'])) {
                    //$wishlist_contents_string .= '<span class="newItemInCart">'.$products[$i]['quantity'] . '&nbsp;x&nbsp; ('.get_products_model_from_products_id($products[$i]['id']).') ';
                    $wishlist_contents_string .= '<span class="newItemInCart"> &nbsp; (' . get_products_model_from_products_id($products[$i]['id']) . ') ';
                } else {
                    //$wishlist_contents_string .= '<span>'.$products[$i]['quantity'] . '&nbsp;x&nbsp; ('.get_products_model_from_products_id($products[$i]['id']).') ';
                    $wishlist_contents_string .= '<span> &nbsp; (' . get_products_model_from_products_id($products[$i]['id']) . ') ';
                }

                $wishlist_contents_string .= '<a style="text-align:left" title="' . db_tr($definition = 'OPEN_PROD_DETAILS', $page = 'general', $from_lang_code = 'de', $content = 'Details �ffnen') . '" 
	  href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products[$i]['id']) . '">';

                $wishlist_contents_string .= get_products_name($products[$i]['id']);

                //attributes
                if (has_products_attribute(att_clean($products[$i]['id']))) {
                    //$options_id = get_options_id(att_clean($products[$i]['id']));
                    $options_id = get_options_id($products[$i]['id']);

                    if ($options_id <> '') {
                        //$this_product_attribute_option_group = this_product_attribute_option_group(att_clean($products[$i]['id']));
                        //$prod_attribute = '<br><span><i>['.get_products_attribute_optiongroup_name($this_product_attribute_option_group).': '.get_products_options_values_name($options_id).']</i></span>';
                        if (isset($products[$i]['attributes']) && is_array($products[$i]['attributes'])) {
                            reset($products[$i]['attributes']);
                            $prod_attribute = '';
                            while (list($option, $value) = each($products[$i]['attributes'])) {
                                //$prod_attribute = '<div style="margin:0 0 0 18px"><i>['.products_options_name($option).': '.products_options_value($value).']</i></div>';
                                $prod_attribute .= '<span style="margin-left:6px;color:#933"><i>' . products_options_name($option) . ': ' . products_options_value($value) . '</i></span>';
                            }
                        }
                    } else {
                        //$this_product_attribute_option_group = this_product_attribute_option_group(att_clean($products[$i]['id']));
                        //$prod_attribute = '<br><span><i>['.get_products_attribute_optiongroup_name($this_product_attribute_option_group).': '.get_products_options_values_name($options_id).']</i></span>';

                        $prod_attribute = '11111 -' . $this_product_attribute_option_group . '-' . att_clean($products[$i]['id']) . '-' . $options_id . '-';
                    }
                } else {
                    $prod_attribute = '';
                }

                $wishlist_contents_string .= $prod_attribute;

                $this_price1 = $products[$i]['final_price'];
                $this_price = price_in_curr($this_price1, $products[$i]['id'], $item_quantity);
                $this_price_one = price_in_curr($this_price1, $products[$i]['id'], 1);


                //$wishlist_contents_string .= " <span style=\"white-space:nowrap\">x121x".trim(get_price_from_id($products[$i]['id']))."</span></a></span></span>";
                $wishlist_contents_string .= " <span style=\"white-space:nowrap\">" . $this_price_one . "</span></a></span></span>";


                if (curPageName() <> 'ax_upd_cat.php') {
                    $wishlist_contents_string .=
                        '<div style="text-align:center;margin:4px 0 1px 0;">
		<a title="' . '# ' . get_products_model_from_products_id($products[$i]['id']) . ' ' . db_tr($definition = 'LINK_MOVE_FROM_WISHLIST_TO_CART', $page = 'general', $from_lang_code = 'de', $content = 'diesen Artikel in den Warenkorb verschieben') . '' . '" style="display:inline;"
		href="javascript:confirm_move_to_cart(\'' . tep_href_link(curPageName(), tep_get_all_get_params(array('action')) . 'action=cust_order&pid=' . $products[$i]['id'] . '&rfw=1', 'NONSSL') . '\',\'' . get_products_model_from_products_id($products[$i]['id']) . '\')"><img src="images/icon4/famfam/cart_put.png" width="16" height="16" /> ' . db_tr($definition = 'ORDER_BUTTON_TITLE', $page = 'general', $from_lang_code = 'de', $content = 'Artikel in den Warenkorb') .
                        '</a></span></div>';
                } else {
                    $wishlist_contents_string .= '<div style="margin:4px"></div>';
                }
                $wishlist_contents_string .= '</div>';

                if ((tep_session_is_registered('new_products_id_in_wishlist')) && ($new_products_id_in_wishlist == $products[$i]['id'])) {
                    tep_session_unregister('new_products_id_in_wishlist');
                }
            }

            /*
confirm_dele_url(url)

*/
            //$wishlist_contents_string .= '</table>';
            $wishlist_contents_string .= '</div>';
        } else { // wenn mehr als 5
            $wishlist_contents_string .= '<div style="font-size:0.9em;margin:4px 0 8px 6px">' . ' ' . $wishlist->count_lines() . ' ' . db_tr($definition = 'WISHLIST_NUMBER_PRODUCTS', $page = 'general', $from_lang_code = 'de', $content = 'Artikel in der Wunschliste') . '.</div>';
        }
    } else {
        $wishlist_contents_string .= '<span style="">' . BOX_WISHLIST_EMPTY . '</span>' . '<div style="text-align:center;margin:8px 0 0 0"><a style="" href="javascript:open_x(\'popup_wishlist_help.php&' . sess_id_full() . '\',\'' . db_tr($definition = 'BOX_HEADING_CUSTOMER_WISHLIST_HELP', $page = 'general', $from_lang_code = 'de', $content = 'Wunschliste Hilfe') . '\',800,600)">' . $info_icon . BOX_HEADING_CUSTOMER_WISHLIST_HELP . '</a></div>';
    }


    $info_box_contents = array();
    $info_box_contents[] = array('text' => $wishlist_contents_string);

    if ($wishlist->count_contents() > 0) {

        /*
$info_box_contents[] = array('align' => 'right',
							 'text' => '<div style="font-size:0.9em;color:#666665;margin:4px 0 8px 0">Summe:'.$currencies->format($wishlist->show_total()).'</div>');

if ($wishlist->count_lines() <= 5) {

*/
        if ($wishlist->count_lines() > 1) {
            $wlist_open_vis = ' style="display:none" '; //open wl button mitte -deakt-
            $wlist_open_vis2 = ' ;display:display '; //open wl button
        } else {
            $wlist_open_vis = ' style="display:none" '; //open wl button mitte -deakt-
            $wlist_open_vis2 = ' ;display:display '; //open wl button
        }

        if (tep_session_is_registered('customer_id')) {

            $info_box_contents[] = array('text' => '

	<div style="text-align:center;margin:3px 0 0 0' . $wlist_open_vis2 . '">
	<a title="' . WISHLIST_EDIT . '"  class="lightwindow button3"   params="lightwindow_type=external,lightwindow_width=1100,lightwindow_height="
	href="wishlist.php">
	' . WISHLIST_OPEN . '</a>
	</div>	
	
	
	<div style="padding:4px;border:1px #ccc solid;margin:6px 1px 2px 1px;font-size:0.9em"><div style="text-align:center">
	<a style="" href="javascript:open_x(\'popup_wishlist_help.php&' . sess_id_full() . '\',\'' . db_tr($definition = 'BOX_HEADING_CUSTOMER_WISHLIST_HELP', $page = 'general', $from_lang_code = 'de', $content = 'Wunschliste Hilfe') . '\',800,600)">' .
                BOX_HEADING_CUSTOMER_WISHLIST_HELP . '</a></div>

	<div style="text-align:center;margin:3px 0 0 0">
	<a title="' . WISHLIST_SEND_EAIL_TO_ADDRESS . '"  style="" 
	href="form_send_wishlist.php?cid=' . $_SESSION['customer_id'] . '&' . $SID . '" onclick="Modalbox.show(this.href, {title: this.title, width: 670}); return false;">
	' . db_tr($definition = 'WISHLIST_SEND_BY_EMAIL', $page = 'general', $from_lang_code = 'de', $content = 'Wunschliste per Email versenden') . '</a>
	</div>
	
	
	</div>		
	');
        } else {
            $info_box_contents[] = array('text' => '
	<div style="text-align:center;margin:3px 0 0 0' . $wlist_open_vis2 . '">
	<a title="' . WISHLIST_EDIT . '"  class="lightwindow button3"   params="lightwindow_type=external,lightwindow_width=1100"
	href="wishlist.php">
	' . WISHLIST_OPEN . '</a>
	</div>


	<div style="padding:4px;border:1px #ccc solid;margin:2px 3px;;font-size:0.9em"><div style="text-align:center">
	<a  style="" href="javascript:open_x(\'popup_wishlist_help.php&' . sess_id_full() . '\',\'' . db_tr($definition = 'BOX_HEADING_CUSTOMER_WISHLIST_HELP', $page = 'general', $from_lang_code = 'de', $content = 'Wunschliste Hilfe') . '\',800,600)">' .
                BOX_HEADING_CUSTOMER_WISHLIST_HELP . '</a></div>

	
	<div style="text-align:center;margin:3px 0 0 0">
	<a title="' . db_tr($definition = 'GENERAL_MUST_BE_LOGGED_IN', $page = 'general', $from_lang_code = 'de', $content = 'Hierf&uuml;r m&uuml;ssen Sie angemeldet sein') . '"  style=""   
	href="javascript:alert(\'' . db_tr($definition = 'GENERAL_MUST_BE_LOGGED_IN', $page = 'general', $from_lang_code = 'de', $content = 'Hierf&uuml;r m&uuml;ssen Sie angemeldet sein') . '.\')">
	' . db_tr($definition = 'WISHLIST_SEND_BY_EMAIL', $page = 'general', $from_lang_code = 'de', $content = 'Wunschliste per Email versenden') . '</a>
	</div>
	


	
	
	</div>
	');

        }


    }


    $r .= make_box2($info_box_contents, $class_master);;

    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER ['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
        $r .= '<script>
var myLightWindow = null;
myLightWindow = new lightwindow();
</script>';
    }

    $r .= '</div>';


    $r = preg_replace('/\s\s+/', ' ', $r);
    $r = str_replace("\n", "", $r);

    return $r;
}


function get_wishlist_link($products_id)
{
    global $app_wishlist, $is_in_wishlist_icon, $wishlist_add_button, $is_active_icon_small, $use_product_attribute_is_active, $use_img_buttons, $wishlist_button;

    if ($app_wishlist) {
        if (tep_session_is_registered('customer_id')) {

            if ($use_product_attribute_is_active and has_products_attribute((int)$products_id)) {

                if (already_in_wishlist($products_id, $_SESSION['customer_id'])) {
                    $wishlist_link = '
					<div class="alr_in_wishl">
					<a href="wishlist.php?' . $SID . '" 
					class="lightwindow blue dimmed06"  style="margin:0 4px;font-weight:normal;color:#369;font-size:0.9em"
					params="lightwindow_type=external,lightwindow_width=1350" 
					title="' . db_tr($definition = 'WISHLIST_EDIT', $page = 'general', $from_lang_code = 'de', $content = 'Wunschliste bearbeiten') . '">
					' . db_tr($definition = 'WISHLIST_IS_ALREADY_IN', $page = 'general', $from_lang_code = 'de', $content = 'ist bereits in meiner Wunschliste') . '</a>
			
					</div>';
                } else {

                    $app_product_attribute_option_group = this_product_attribute_option_group(att_clean($products_id));

                    $lc_text .= '<div style="margin-top:0px">';
                    $lc_text .= '<form method="post" name="wl_form_' . (int)$products_id . '" action="' . tep_href_link(curPageName(), tep_get_all_get_params(array('action', 'products_id')) . 'action=add_wishlist&products_id=' . $products_id) . '" >';
                    $lc_text .= display_products_attribute2($products_id, $app_product_attribute_option_group, false, 'wl_');

                    if ($use_img_buttons) {
                        $img_src = $wishlist_button;
                        $image_size = @getimagesize($img_src);
                        $lc_text .= '<input class="dimmed_order_buttons" value="Submit" type="image" src="' . $img_src . '" ' . $image_size[3] . '>';
                    } else {
                        //$lc_text .= '<input title="'. db_tr($definition='WISHLIST_BUTTON_TITLE',$page='general',$from_lang_code='de',$content='Artikel zu meiner Wunschliste zuf&uuml;gen').'" class="button_wishlist_new"   type="submit" value="'.GENERAL_WISHLIST_BUTTON.'">';
                        $lc_text .= '<div class="wishl_lnk" id="wishlist_add_b_' . $products_id . '"><a class="button_wishlist_new" title="' .
                            db_tr($definition = 'WISHLIST_BUTTON_TITLE', $page = 'general', $from_lang_code = 'de', $content = 'Artikel zu meiner Wunschliste zuf&uuml;gen') . '" 
									href="javascript:document.wl_form_' . (int)$products_id . '.submit()">
									' . $wishlist_add_button . '</a></div>';


                    }

                    $lc_text .= '</form>';
                    //$lc_text .= '<br /><br class="lh6" />'.$wishlist_link.''.$anzeige_komm.''.$mein_komm_link;
                    $lc_text .= '</div>';
                    $wishlist_link = $lc_text;
                }


            } else {
                if (already_in_wishlist($products_id, $_SESSION['customer_id'])) {
                    $wishlist_link = '
					<div class="alr_in_wishl">
					<a href="wishlist.php?' . $SID . '" 
					class="lightwindow blue dimmed06"  style="margin:0 4px;font-weight:normal;color:#369;font-size:0.9em"
					params="lightwindow_type=external,lightwindow_width=1350" 
					title="' . db_tr($definition = 'WISHLIST_EDIT', $page = 'general', $from_lang_code = 'de', $content = 'Wunschliste bearbeiten') . '">
					' . db_tr($definition = 'WISHLIST_IS_ALREADY_IN', $page = 'general', $from_lang_code = 'de', $content = 'ist bereits in meiner Wunschliste') . '</a>
			
					</div>';
                } else {

                    //if($use_product_attribute_is_active and has_products_attribute((int) $products_id) ){

                    $wishlist_link = '
					<div class="wishl_lnk" id="wishlist_add_b_' . $products_id . '"><a class="button_wishlist_new" title="' .
                        db_tr($definition = 'WISHLIST_BUTTON_TITLE', $page = 'general', $from_lang_code = 'de', $content = 'Artikel zu meiner Wunschliste zuf&uuml;gen') . '" 
				href="javascript:add_to_wishlist(\'' . $products_id . '\')">
					' . $wishlist_add_button . '</a></div>';

                }
            }

        } else {
            /*
		// pr�fen ob bereits in wishlist
		$wishlist_link='
		<div class="wishl_lnk"><a title="Diesen Artikel zu meiner Wunschliste zuf&uuml;gen"
		href="'.RefererPageNameNoParas().'?products_id='.$new_products['products_id'].'&action=add_wishlist&'.$SID.'&cPath='.full_cPath_from_products_id($new_products['products_id']).'">
		'.$wishlist_add_button.'</a></div>';
*/

            if ($use_product_attribute_is_active and has_products_attribute((int)$products_id)) {

                $app_product_attribute_option_group = this_product_attribute_option_group(att_clean($products_id));

                $lc_text .= '<div style="margin-top:0px">';
                $lc_text .= '<form method="post" name="wl_form_' . (int)$products_id . '" action="' . tep_href_link(curPageName(), tep_get_all_get_params(array('action', 'products_id')) . 'action=add_wishlist&products_id=' . $products_id) . '" >';
                $lc_text .= display_products_attribute2($products_id, $app_product_attribute_option_group, false, 'wl_');

                if ($use_img_buttons) {
                    $img_src = $wishlist_button;
                    $image_size = @getimagesize($img_src);
                    $lc_text .= '<input class="dimmed_order_buttons" value="Submit" type="image" src="' . $img_src . '" ' . $image_size[3] . '>';
                } else {
                    //$lc_text .= '<input title="'. db_tr($definition='WISHLIST_BUTTON_TITLE',$page='general',$from_lang_code='de',$content='Artikel zu meiner Wunschliste zuf&uuml;gen').'" class="button_wishlist_new" type="submit" value="'.GENERAL_WISHLIST_BUTTON.'">';

                    $lc_text .= '<div class="wishl_lnk" id="wishlist_add_b_' . $products_id . '"><a class="button_wishlist_new" title="' .
                        db_tr($definition = 'WISHLIST_BUTTON_TITLE', $page = 'general', $from_lang_code = 'de', $content = 'Artikel zu meiner Wunschliste zuf&uuml;gen') . '" 
									href="javascript:document.wl_form_' . (int)$products_id . '.submit()">
									' . $wishlist_add_button . '</a></div>';


                }

                $lc_text .= '</form>';
                //$lc_text .= '<br /><br class="lh6" />'.$wishlist_link.''.$anzeige_komm.''.$mein_komm_link;
                $lc_text .= '</div>';

                $wishlist_link = $lc_text;
            } else {
                $wishlist_link = '
			<div class="wishl_lnk" id="wishlist_add_b_' . $products_id . '"><a class="button_wishlist_new" title="' .
                    db_tr($definition = 'WISHLIST_BUTTON_TITLE', $page = 'general', $from_lang_code = 'de', $content = 'Artikel zu meiner Wunschliste zuf&uuml;gen') . '" 
			href="javascript:add_to_wishlist(\'' . $products_id . '\')">
			' . $wishlist_add_button . '</a></div>';
            }

        }
    } else {
        $wishlist_link = '';
    }

    return $wishlist_link;
}


function cols_without_empty($anz)
{
    global $number_cols_products;

    $r = floor($anz / $number_cols_products);
    $r = $r * $number_cols_products;

    return $r;
}


function delete_directory_cat($dirname)
{
    if (is_dir($dirname))
        $dir_handle = opendir($dirname);
    if (!$dir_handle)
        return false;
    while ($file = readdir($dir_handle)) {
        if ($file != "." && $file != "..") {
            if (!is_dir($dirname . "/" . $file))
                unlink($dirname . "/" . $file);
            else
                delete_directory_cat($dirname . '/' . $file);
        }
    }
    closedir($dir_handle);
    rmdir($dirname);
    return true;
}


function udate($format, $utimestamp = null)
{
//echo udate('H:i:s.u'); // 19:40:56.78128

    if (is_null($utimestamp))
        $utimestamp = microtime(true);

    $timestamp = floor($utimestamp);
    $milliseconds = round(($utimestamp - $timestamp) * 1000000);

    return date(preg_replace('`(?<!\\\\)u`', $milliseconds, $format), $timestamp);
}


function cod_fee_inland()
{
//MODULE_ORDER_TOTAL_COD_FEE_FLAT
//$xx = split("[:,]", MODULE_ORDER_TOTAL_COD_FEE_FLAT);
//return $xx[1];
    return get_dv('module_payment_cod_surcharge');
}

function prod_status_indic($products_id, $products_status, $add_style = '')
{

    $r = '<div id="prod_status_indic_' . $products_id . '" style="font-size:0.7em;">';
    $r .= is_active_icon_product($products_id, $products_status, 'aktiv', $add_style);
    $r .= '</div>';

    return $r;
}


function products_model_is_unique($products_model)
{
    $sql = "select products_id, products_model from products where products_model =  '" . $products_model . "' ";
    $res = q($sql);
    $anz = mysql_num_rows($res);
    if ($anz > 1) {
        return false;
    } else {
        return true;
    }

}

function show_all_products_model_not_unique()
{
    $sql = "select * from products order by products_model ";

    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {

        $products_id = $row["products_id"];
        $products_model = $row["products_model"];
        if (products_model_is_unique($products_model)) {

        } else {
            //$new_products_model = $products_model.':'.$products_id;
            ec($products_model . ':' . $products_id);
        }
    }
    mysql_free_result($sql_result);
}

function make_all_products_model_unique()
{
    $sql = "update products set temp_done = 0";
    q($sql);

    $sql = "select * from products ";

    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        //$z++;
        $products_id = $row["products_id"];
        $products_model = $row["products_model"];
        if (products_model_is_unique($products_model)) {

        } else {
            //$new_products_model = $products_model.':'.$products_id;
            //ec($products_model.':'.$products_id);
            $sql = "update products set temp_done = 1 where products_id =   " . $products_id;
            q($sql);
        }
    }
    mysql_free_result($sql_result);

    $sql = "select * from products where temp_done = 1 ";
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $z++;
        $products_id = $row["products_id"];
        $products_model = $row["products_model"];
        $new_products_model = $products_model . ':' . $products_id;
        $sql = "update products set products_model = '" . $new_products_model . "' where products_id =   " . $products_id;
        q($sql);
    }
    mysql_free_result($sql_result);

    $sql = "update products set temp_done = 0";
    q($sql);
    return $z . ' Artikelnummern umbenannt';
}


function modi_products_model_if_not_unique($products_model, $products_id)
{

}


function language_id_english()
{
    $sql = "select languages_id from languages where code = 'en'";
    return lookup($sql, 'languages_id');
}

function language_english_is_used()
{
    $sql = "select status from languages where code = 'en'";
    $r = lookup($sql, 'status');
    if ($r == 1) {
        return true;
    } else {
        return false;
    }
}


function get_original_image($products_id)
{
    $sql = "select products_originalimage from products where products_id =  " . $products_id;
    $o_image = lookup($sql, 'products_originalimage');
    return $o_image;
}

function get_small_image($products_id)
{
    $sql = "select products_image from products where products_id =  " . $products_id;
    $image = lookup($sql, 'products_image');
    return $image;
}

function get_medium_image($products_id)
{
    $sql = "select products_mediumimage from products where products_id =  " . $products_id;
    $image = lookup($sql, 'products_mediumimage');
    return $image;
}

function get_medium_image2($products_id)
{
    $sql = "select products_mediumimage_2 from products where products_id =  " . $products_id;
    $image = lookup($sql, 'products_mediumimage_2');
    return $image;
}


function get_large_image($products_id)
{
    $sql = "select products_largeimage from products where products_id =  " . $products_id;
    $image = lookup($sql, 'products_largeimage');
    return $image;
}


function adjust_db_tr($def, $page_old, $page_new)
{
    $sql = "update myd_translations set page =  '" . $page_new . "' where page = '" . $page_old . "' and definition = '" . $def . "'  ";
    q($sql);
}

function remove_db_tr($def, $page_old)
{
    $sql = "delete from myd_translations where page = '" . $page_old . "' and definition = '" . $def . "'  ";
    q($sql);
}


function db_tr_cur_page_name($def, $content, $re_translate = false)
{
    db_tr($def, curPageName(), 'de', $content, $re_translate);
}


function escape_alert_safe($unsafe)
{
// javascript:alert_safe(
    $unsafe = str_replace("&#039;", "||;uwt;||", $unsafe);
    $unsafe = str_replace("&#39;", "||;uwt;||", $unsafe);
    $unsafe = str_replace("&egrave;", "||;egrave;||", $unsafe);
    return $unsafe;
}


function get_display_state($key)
{

    if (get_dv_bool($key) == true) {
        return 'display';
    } else {
        return 'none';
    }

}

function shop_is_in_fremdsprache()
{
    global $app_top_default_lang_id, $shop_is_multilang;
    if (($_SESSION['languages_id'] == $app_top_default_lang_id) or (to_bool($shop_is_multilang) == false)) {
        return false;
    } else {
        return true;
    }

}

function add_lang_para($c = '&')
{

    if (lang_code_from_lang_id($_SESSION['languages_id']) == 'de') {
        $add_to_link = '';
    } else {
        $add_to_link = $c . 'language=' . lang_code_from_lang_id($_SESSION['languages_id']);
    }
    return $add_to_link;
}

function browser()
{

    $browser = browser_detection('browser');
    $browser_number = browser_detection('number');
    $a_browser_data = browser_detection('full');

    if ($browser == 'ie' and $browser_number < 9) $browser == 'msie';
    if ($browser == 'moz') $browser == 'mozilla';

    return $browser;
}


function file_extension($filename)
{
    return @end(explode(".", $filename));
}

function extension($path)
{
//removes query params
    $qpos = strpos($path, "?");
    if ($qpos !== false) $path = substr($path, 0, $qpos);
    $extension = pathinfo($path, PATHINFO_EXTENSION);
    return $extension;
}

function countries_id_from_countries_iso_code_2($countries_iso_code_2)
{
    $sql = "select countries_id from countries where countries_iso_code_2 = '" . $countries_iso_code_2 . "'";
    return lookup($sql, 'countries_id');
}

function countries_name_from_countries_id($countries_id)
{
    $sql = "select countries_name from countries where countries_id = '" . $countries_id . "'";
    return lookup($sql, 'countries_name');

}

function get_currency_rate($curr)
{
    $sql = "select value_calc from currencies where code = '" . $curr . "'  ";
    return lookup($sql, 'value_calc');
}


function add_session_id($url)
{
    global $SID;

    if (eregiS('mdSsid=', $url)) {
        return $url;
    } else {
        if (strpos($url, "?") != false) {
            $x = $url . '&' . $SID;
            return $x;
        } else {
            $x = $url . '?' . $SID;
            return $x;
        }
    }
}

function anz_pageears()
{
    $sql = "select * from pageears_mydotter where is_active=1";
    $res = q($sql);
    return mysql_num_rows($res);
}

function is_debug_mode()
{
    global $show_debug_loadtime_is_active, $use_cache_is_active, $debug_box_show;
    global $application_is_in_dev_mode, $application_shop_is_in_dev_mode, $app_admin_is_in_dev_mode;
//return $show_debug_loadtime_is_active;
    return to_bool($debug_box_show);
}


function get_load_time($start_time_page_load, $line = '', $comment = '', $file = '', $silent = false)
{
    global $show_debug_loadtime_is_active, $use_cache_is_active, $i_am_admin, $show_debug_loadtime_is_active_allow_everyone;
    if (!to_bool($show_debug_loadtime_is_active)) return '';

    if (($show_debug_loadtime_is_active and i_have_bearbeitungs_mode_view_right()) or ($show_debug_loadtime_is_active and $show_debug_loadtime_is_active_allow_everyone)) {
        if ($use_cache_is_active) {
            //$uc=' cache=OFF ';
        } else {
            $uc = ' <span style="color:#c00">cache=OFF</span> ';
        }


        if ($start_time_page_load == 0) {
            return $line . ' - no start_time_page_load';
        } else {

            $time = microtime();
            $time = explode(" ", $time);
            $time = $time[1] + $time[0];
            $finish = $time;
            $totaltime = ($finish - $start_time_page_load);
            $totaltime = round($totaltime, 2);
            // ec($txt,$bold=false,$style="")
            if ($silent) {
                return number_format($totaltime, 2) . ' Sek. ';
            } else {
                return ec($line . ': &nbsp; ' . number_format($totaltime, 2) . ' Sek. ' . $comment . ' &nbsp; ' . $file . ' &nbsp; ' . $uc, false, 'text-align:center;font-size:0.9em');
            }
        }
    } else {
        return '';
    }
}


function sql_timestamp()
{
    return date("Y-m-d H:i:s");
}

function amicron_image_upload_after()
{
// Amicron sollte gem. configure.php Bilder nur in den Ordner ori laden. ?!
// macht dann aber einen Eintrag in products unter products_image

    $sql = "select * from products where 
products_largeimage='no_picture.gif' and 
products_mediumimage='no_picture.gif' and 
products_image <> 'no_picture.gif'  ";

    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $id = $row["products_id"];
        $img_name = $row["products_image"];
        if ($img_name <> '') {
            $sql = "update products set  
				products_largeimage= '" . $img_name . "',
				products_largeimage= 'no_picture.gif',
				products_image= 'no_picture.gif'
				where products_id = " . $id . "
			  ";
            q($sql);


            // Art oder nicht Art ??
            $ori_img = DIR_FS_CATALOG . "images/artikel/original/" . str_replace('Art', '', $img_name);
            $large_img = DIR_FS_CATALOG . "images/artikel/large/" . str_replace('Art', '', $img_name);
            $medium_img = DIR_FS_CATALOG . "images/artikel/medium/" . str_replace('Art', '', $img_name);
            $small_img = DIR_FS_CATALOG . "images/artikel/small/" . str_replace('Art', '', $img_name);

            // copy img von ordner small nach ordner large
            if (!file_exists($large_img)) {
                if (file_exists($small_img)) {
                    copy($small_img, $large_img);
                }
            } else {
                unlink($large_img);
                if (file_exists($small_img)) {
                    copy($small_img, $large_img);
                }
            }

            // copy img von ordner small nach ordner original
            if (!file_exists($ori_img)) {
                if (file_exists($small_img)) {
                    copy($small_img, $ori_img);
                }
            } else {
                unlink($ori_img);
                if (file_exists($small_img)) {
                    copy($small_img, $ori_img);
                }
            }

            // dele img  in ordner small
            if (file_exists($small_img)) {
                unlink($small_img);
            }

        }
    }
}


function get_latest_order($customers_id)
{
    $sql = "select orders_id from orders where customers_id = " . $customers_id . " order by orders_id desc limit 1 ";
    return lookup($sql, 'orders_id');
}

function get_cart_id($customers_id)
{
    $sql = "select customers_basket_id  from  customers_basket where customers_id = '" . $customers_id . "' ";
    return lookup($sql, 'customers_basket_id');
}

function get_customers_telephone($customers_id)
{
    $sql = "select customers_telephone  from  customers where customers_id = '" . $customers_id . "' ";
    return lookup($sql, 'customers_telephone');

}


function note_email_sent($customers_id, $email_from, $sent_what, $sent_by)
{
    $sql = "insert into customers_emails_sent 
set customers_id = " . $customers_id . ", customers_email = '" . $email_from . "', 
send_what = '" . $sent_what . "', 
counter=counter+1, sent_by_who = '" . $sent_by . "'  ";
    q($sql);
}

function get_buy_now_buttton()
{
    global $buy_now_button;
//$img1 ='<img src="images/buttons/buynow2_120.png" width="120" height="41" />';
//$img2='<img src="ximg/button_in_cart.gif" width="173" height="33" />';
//return tep_image_button('button_buy_now.gif', IMAGE_BUTTON_BUY_NOW,'',70);
//<a href="' . tep_href_link('shopping_cart.php', tep_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $orders['products_id']) . '">' . tep_image_button('button_in_cart.gif', IMAGE_BUTTON_IN_CART) . '</a>


    return $buy_now_button;

}


function get_teaser()
{

}

function get_page_teaser()
{

}


function get_highlight_prod()
{

}


function get_col1_content_header()
{

}

function get_col1_content_footer()
{

}

function get_col2_content_header()
{

}

function get_col2_content_footer()
{

}


function is_current_li($txt, $last)
{
    if ($txt == $last) {
        return ' id="current" ';
    } else {
        return '';
    }

}


function in_this_cat($breadcrumb_last)
{

    if ($breadcrumb_last == 'Startseite') $breadcrumb_last = 'Auswahl aus allen Abteilungen';

    $x = '
<span style="margin-left:4px;font-size:0.72em;font-weight:normal">(' . $breadcrumb_last . ')</span>
';

    if ($breadcrumb_last <> '') return $x;

}

function get_categories_image_from_cPath($cPath)
{
    $cPath_array = explode('_', $cPath);
    $current_category_id = $cPath_array[(sizeof($cPath_array) - 1)];
    return get_categories_image($current_category_id);
}

function get_categories_image_from_products_id($products_id, $with_link = false)
{
    $categories_id = categories_id_from_products_id($products_id);
    return get_categories_image($categories_id, '', '', $with_link);
}


function get_categories_image($categories_id, $width = '', $height = '', $with_link = false)
{
    global $at_use_cat_banner, $at_cat_banner_path, $categories_images_border_use, $SID, $use_parent_cat_banner, $categories_images_width,
           $banner_txt_is_active, $banner_txt_margin_top, $banner_txt_text_color, $banner_txt_text_size,
           $session_lang_code_from_lang_id, $app_top_default_lang_id, $shop_is_multilang, $at_is_gay_shop, $hide_ab18_img;

    if ($categories_images_border_use) {
        $categories_images_border_color = get_dv('categories_images_border_color');
        $categories_images_border_width = get_dv('categories_images_border_width');
        $categories_images_border_style = get_dv('categories_images_border_style');
        $border_str = ';border:' . $categories_images_border_width . 'px ' . $categories_images_border_color . ' ' . $categories_images_border_style . '';
    }

    if ($categories_id <> '') $force_display = lookup('select force_display from categories where categories_id = ' . $categories_id, 'force_display');
    $force_display = to_bool($force_display);

    if (!$force_display) {
        if ($categories_id == '' or !$at_use_cat_banner) return;
    }

    $is_ab18 = false;
    if ($at_is_gay_shop and $hide_ab18_img and !tep_session_is_registered('customer_id')) {
        $is_ab18 = to_bool(lookup('select ab18 from categories where categories_id=' . $categories_id, 'ab18'));
    }


    $sql = "select categories_image from categories where categories_id = " . $categories_id;
    $img = $at_cat_banner_path . '/' . lookup($sql, 'categories_image');
    if (file_exists($img) and !is_dir($img)) {

        if ($width == '') {
            $img_size_str = get_img_size_str($img, $what = 3);
            $img_str = '<div class="noprint" style="width:100%;overflow:hidden;text-align:center"><img class="resize" style="margin:6px auto 5px auto' . $border_str . '" src="' . $img . '" ' . $img_size_str . ' /></div>';
        } else {
            $img_str = '<div class="noprint" style="width:100%;overflow:hidden;text-align:center"><img class="resize" style="margin:6px auto 5px auto' . $border_str . '" src="' . $img . '" width="' . $width . '" /></div>';
        }
        if ($with_link) {
            $img_str = '<a title="' . cat_name($categories_id) . '" href="index.php?cPath=' . full_cPath($categories_id) . '&' . $SID . '">' . $img_str . '</a>';
        }
        //$banner_txt_is_active, $banner_txt_margin_top,  $banner_txt_text_color , $banner_txt_text_size

        if ($banner_txt_is_active) {
            $banner_txt_germ = lookup("select banner_txt from categories where categories_id = " . $categories_id, "banner_txt");
            if ((lang_code_from_lang_id($_SESSION['languages_id']) == 'de') or (to_bool($shop_is_multilang) == false)) {
                $banner_txt = $banner_txt_germ;
            } else {
                $lang_code_from_lang_id = lang_code_from_lang_id($_SESSION['languages_id']);
                $banner_txt = lookup("select banner_txt_" . $lang_code_from_lang_id . " from categories where categories_id = " . $categories_id, "banner_txt_" . $lang_code_from_lang_id);
            }
            if (trim(strip_tags($banner_txt)) <> '') {
                $img_str .= '<div class="banner_txt" style="width=' . $categories_images_width . 'px;padding:0 9px 0 19px;
								 margin:' . $banner_txt_margin_top . 'px 0 0 0;color:' . $banner_txt_text_color . ';font-size:' . $banner_txt_text_size . 'em">' . $banner_txt . '</div>';
            } else {
                if ($banner_txt_germ <> '') {
                    $img_str .= '<div class="banner_txt" style="width=' . $categories_images_width . 'px;padding:0 9px 0 19px;
									 margin:' . $banner_txt_margin_top . 'px 0 0 0;color:' . $banner_txt_text_color . ';font-size:' . $banner_txt_text_size . 'em">' . $banner_txt_germ . '</div>';
                }
            }
        }

        if (!$is_ab18) return $img_str;
    } else {
        if (to_bool($use_parent_cat_banner)) {
            $full_cPath = full_cPath($categories_id);
            $full_cPath = str_replace('_' . $categories_id, '', $full_cPath);
            $full_cPath_arr = explode('_', $full_cPath);
            $full_cPath_arr = array_reverse($full_cPath_arr);
            for ($i = 0, $n = sizeof($full_cPath_arr); $i < $n; $i++) {
                //$categories_id = parent_id_from_categories_id($categories_id);
                $categories_id = $full_cPath_arr[$i];
                //get_categories_image($categories_id,$width,$height,$with_link);
                $sql = "select categories_image from categories where categories_id = " . $categories_id;
                $img = $at_cat_banner_path . '/' . lookup($sql, 'categories_image');
                if (file_exists($img) and !is_dir($img)) {
                    if ($width == '') {
                        $img_size_str = get_img_size_str($img, $what = 3);
                        $img_str = '<div style="width:100%;overflow:hidden;text-align:center"><img class="resize" style="margin:6px auto 5px auto' . $border_str . '" src="' . $img . '" ' . $img_size_str . ' /></div>';
                    } else {
                        $img_str = '<div style="width:100%;overflow:hidden;text-align:center"><img class="resize" style="margin:6px auto 5px auto' . $border_str . '" src="' . $img . '" width="' . $width . '" /></div>';
                    }
                    if ($with_link) {
                        $img_str = '<a title="' . cat_name($categories_id) . '" href="index.php?cPath=' . full_cPath($categories_id) . '&' . $SID . '">' . $img_str . '</a>';
                    }

                    if ($banner_txt_is_active) {
                        $banner_txt_germ = lookup("select banner_txt from categories where categories_id = " . $categories_id, "banner_txt");
                        if ((lang_code_from_lang_id($_SESSION['languages_id']) == 'de') or (to_bool($shop_is_multilang) == false)) {
                            $banner_txt = $banner_txt_germ;
                        } else {
                            $lang_code_from_lang_id = lang_code_from_lang_id($_SESSION['languages_id']);
                            $banner_txt = lookup("select banner_txt_" . $lang_code_from_lang_id . " from categories where categories_id = " . $categories_id, "banner_txt_" . $lang_code_from_lang_id);
                        }
                        if (trim(strip_tags($banner_txt)) <> '') {
                            $img_str .= '<div class="banner_txt" style="width=' . $categories_images_width . 'px;padding:0 9px 0 19px;
								 margin:' . $banner_txt_margin_top . 'px 0 0 0;color:' . $banner_txt_text_color . ';font-size:' . $banner_txt_text_size . 'em">' . $banner_txt . '</div>';
                        } else {
                            if ($banner_txt_germ <> '') {
                                $img_str .= '<div class="banner_txt" style="width=' . $categories_images_width . 'px;padding:0 9px 0 19px;
									 margin:' . $banner_txt_margin_top . 'px 0 0 0;color:' . $banner_txt_text_color . ';font-size:' . $banner_txt_text_size . 'em">' . $banner_txt_germ . '</div>';
                            }
                        }
                    }
                    if (!$is_ab18) return $img_str;
                } else {
                    //return '';
                }
            }
        } else {
            return '';
        }
    }
    return '';
}

function get_manuf_image_from_products_id($products_id, $with_link = false)
{
    $manufacturers_id = get_manufacturers_id_from_products_id($products_id);
    return get_manuf_image($manufacturers_id, '', '', $with_link);
}


function get_manuf_image($manufacturers_id, $width = '', $height = '', $with_link = false)
{
    global $at_use_manuf_banner, $at_manuf_banner_path, $manuf_images_border_use, $SID,
           $manuf_images_width, $banner_txt_is_active, $banner_txt_margin_top, $banner_txt_text_color, $banner_txt_text_size, $at_is_gay_shop, $hide_ab18_img;

    if ($manuf_images_border_use) {
        $manuf_images_border_color = get_dv('categories_images_border_color');
        $manuf_images_border_width = get_dv('categories_images_border_width');
        $manuf_images_border_style = get_dv('categories_images_border_style');
        $border_str = ';border:' . $manuf_images_border_width . 'px ' . $manuf_images_border_color . ' ' . $manuf_images_border_style . '';
    }

    if ($manufacturers_id == '' or !$at_use_manuf_banner) return;

    $is_ab18 = false;
    if ($at_is_gay_shop and $hide_ab18_img and !tep_session_is_registered('customer_id')) {
        $is_ab18 = to_bool(lookup('select ab18 from manufacturers where manufacturers_id=' . $manufacturers_id, 'ab18'));
    }

    $sql = "select manufacturers_image from manufacturers where manufacturers_id = " . $manufacturers_id;
    $img = $at_manuf_banner_path . '/' . lookup($sql, 'manufacturers_image');
    if (file_exists($img) and !is_dir($img)) {


        if ($width == '') {
            $img_size_str = get_img_size_str($img, $what = 3);
            $img_str = '<div class="noprint" style="width:100%;overflow:hidden;text-align:center"><img class="resize" style="margin:6px auto 5px auto' . $border_str . '" src="' . $img . '" ' . $img_size_str . ' /></div>';
        } else {
            $img_str = '<div class="noprint" style="width:100%;overflow:hidden;text-align:center"><img class="resize" style="margin:6px auto 5px auto' . $border_str . '" src="' . $img . '" width="' . $width . '" /></div>';
        }
        if ($with_link) {
            $img_str = '<a title="' . get_manufacturers_name_from_manufacturers_id($manufacturers_id) . '" href="index.php?manufacturers_id=' . $manufacturers_id . '&' . $SID . '">' . $img_str . '</a>';
        }
        /*
			if($banner_txt_is_active){
				$banner_txt = lookup("select banner_txt from manufacturers where manufacturers_id = ".$manufacturers_id,"banner_txt");
				if(trim(strip_tags($banner_txt))<>'') $img_str .= '<div class="banner_txt"
				style="width='.$manuf_images_width.'px;padding:0 9px;margin:'.$banner_txt_margin_top.'px 0 0 0;color:'.$banner_txt_text_color.';font-size:'.$banner_txt_text_size.'em">'.$banner_txt.'</div>';
			}
			*/
        if ($banner_txt_is_active) {
            $banner_txt_germ = lookup("select banner_txt from manufacturers where manufacturers_id = " . $manufacturers_id, "banner_txt");
            if ((lang_code_from_lang_id($_SESSION['languages_id']) == 'de') or (to_bool($shop_is_multilang) == false)) {
                $banner_txt = $banner_txt_germ;
            } else {
                $lang_code_from_lang_id = lang_code_from_lang_id($_SESSION['languages_id']);
                $banner_txt = lookup("select banner_txt_" . $lang_code_from_lang_id . " from manufacturers where manufacturers_id  = " . $categories_id, "banner_txt_" . $lang_code_from_lang_id);
            }
            if (trim(strip_tags($banner_txt)) <> '') {
                $img_str .= '<div class="banner_txt" style="width=' . $categories_images_width . 'px;padding:0 9px 0 19px;
								 margin:' . $banner_txt_margin_top . 'px 0 0 0;color:' . $banner_txt_text_color . ';font-size:' . $banner_txt_text_size . 'em">' . $banner_txt . '</div>';
            } else {
                if ($banner_txt_germ <> '') {
                    $img_str .= '<div class="banner_txt" style="width=' . $categories_images_width . 'px;padding:0 9px 0 19px;
									 margin:' . $banner_txt_margin_top . 'px 0 0 0;color:' . $banner_txt_text_color . ';font-size:' . $banner_txt_text_size . 'em">' . $banner_txt_germ . '</div>';
                }
            }
        }


        if (!$is_ab18) return $img_str;
    } else {
        return '';
    }

}


function get_large_img_link(
    $limg,
    $simg,
    $model,
    $name,
    $id,
    $special = false,
    $allow_medium_img = false,
    $force_mp3_player = true,
    $force_medium_img = false,
    $products_mediumimage_2 = '',
    $resize_width = '',
    $ausnahme = '',
    $target = '',
    $resize_height = '',
    $class = '',
    $allow_tooltip = true,
    $link_to = '',
    $hotshot = false,
    $hotshot_txt = '',
    $is_new = false,
    $new_m_left = '17',
    $new_m_top = '3',
    $allow_attr_icons = true,
    $use_medium_not_small_img_allow = true,
    $rel = ''
)
{

    global $browser,
           $application_shop_is_in_dev_mode, $bearb_mode_show_block_under_imgs,
           $use_medium_not_small_img_is_active,
           $mp3_per_product_is_active,
           $at_show_two_medium_imgs,
           $small_prod_images_use_tooltip,

           $img_url, $hide_ab18_img,
           $product_info_large_img_on_click_history_back,
           $at_select_prod_list_selected,
           $use_medium_not_small_img_is_active_img_width, $wizard_icon, $wizard_icon13,

           $prod_atr_icons_attr1_txt, $prod_atr_icons_attr1_is_active,
           $prod_atr_icons_attr2_txt, $prod_atr_icons_attr2_is_active,
           $prod_atr_icons_attr3_txt, $prod_atr_icons_attr3_is_active,
           $prod_atr_icons_attr4_txt, $prod_atr_icons_attr4_is_active,
           $prod_atr_icons_attr5_txt, $prod_atr_icons_attr5_is_active,
           $prod_atr_icons_attr6_txt, $prod_atr_icons_attr6_is_active,
           $prod_atr_icons_attr7_txt, $prod_atr_icons_attr7_is_active,
           $prod_atr_icons_attr8_txt, $prod_atr_icons_attr8_is_active,
           $prod_atr_icons_attr9_txt, $prod_atr_icons_attr9_is_active,
           $prod_atr_icons_attr10_txt, $prod_atr_icons_attr10_is_active,
           $prod_atr_icons_is_active,


           $enable_img_flipper;

    $do_echo = false;


    if ($do_echo) ec(__line__ . ' resize_width: ' . $resize_width . '');

    if (to_bool($prod_atr_icons_is_active) and $allow_attr_icons) {
        /*
$is_new=to_bool(lookup('select pnew from products where products_id ='.$id,'pnew'));
$is_available_again =to_bool(lookup('select products_old from products where products_id ='.$id,'products_old'));
$is_hot=to_bool(lookup('select hotshot from products where products_id ='.$id,'hotshot'));
$is_sold_out=to_bool(lookup('select soldout from products where products_id ='.$id,'soldout'));
$is_rare=to_bool(lookup('select rare from products where products_id ='.$id,'rare'));
*/

        $int_id = (int)$id;

        if (to_bool($prod_atr_icons_attr1_is_active)) $is_attr1 = to_bool(lookup('select attr1 from products where products_id =' . $int_id, 'attr1'));
        if (to_bool($prod_atr_icons_attr2_is_active)) $is_attr2 = to_bool(lookup('select attr2 from products where products_id =' . $int_id, 'attr2'));
        if (to_bool($prod_atr_icons_attr3_is_active)) $is_attr3 = to_bool(lookup('select attr3 from products where products_id =' . $int_id, 'attr3'));
        if (to_bool($prod_atr_icons_attr4_is_active)) $is_attr4 = to_bool(lookup('select attr4 from products where products_id =' . $int_id, 'attr4'));
        if (to_bool($prod_atr_icons_attr5_is_active)) $is_attr5 = to_bool(lookup('select attr5 from products where products_id =' . $int_id, 'attr5'));

        if (to_bool($prod_atr_icons_attr6_is_active)) $is_attr6 = to_bool(lookup('select attr6 from products where products_id =' . $int_id, 'attr6'));
        if (to_bool($prod_atr_icons_attr7_is_active)) $is_attr7 = to_bool(lookup('select attr7 from products where products_id =' . $int_id, 'attr7'));
        if (to_bool($prod_atr_icons_attr8_is_active)) $is_attr8 = to_bool(lookup('select attr8 from products where products_id =' . $int_id, 'attr8'));
        if (to_bool($prod_atr_icons_attr9_is_active)) $is_attr9 = to_bool(lookup('select attr9 from products where products_id =' . $int_id, 'attr9'));
        if (to_bool($prod_atr_icons_attr10_is_active)) $is_attr10 = to_bool(lookup('select attr10 from products where products_id =' . $int_id, 'attr10'));

//nur das attr mit der h�chsten nummer!
        for ($i = 10, $n = 1; $i >= $n; $i--) {
            $patt_is_active1 = 'is_attr' . $i;
            if ($$patt_is_active1) {
                for ($i2 = $i - 1, $n2 = 1; $i2 >= $n2; $i2--) {
                    $patt_is_active1a = 'is_attr' . $i2;
                    //if($do_echo) ec(__line__.' false: '.$patt_is_active1a);
                    $$patt_is_active1a = false;
                }
                break;
            }

        }


        $is_new = $is_attr1;
        $is_hot = $is_attr2;
        $is_sold_out = $is_attr3;
        $is_rare = $is_attr4;
        $is_available_again = $is_attr5;

        /*
if($id==24594) {
if($do_echo) ec(__line__.' '.$id.': is1 '.$is_attr1);
if($do_echo) ec(__line__.' '.$id.': is2 '.$is_attr2);
if($do_echo) ec(__line__.' '.$id.': is3 '.$is_attr3);
if($do_echo) ec(__line__.' '.$id.': is4 '.$is_attr4);
if($do_echo) ec(__line__.' '.$id.': is5 '.$is_attr5);


if($do_echo) ec(__line__.' '.$id.': is6 '.$is_attr6);
if($do_echo) ec(__line__.' '.$id.': is7 '.$is_attr7);
if($do_echo) ec(__line__.' '.$id.': is8 '.$is_attr8);
if($do_echo) ec(__line__.' '.$id.': is9 '.$is_attr9);
if($do_echo) ec(__line__.' '.$id.': is10 '.$is_attr10);

}
*/
        /*
$small_prod_images_show_medium_img,

	if( stristr($simg,'block_img_') ){
		$is_new=to_bool(lookup('select pnew from products where products_id ='.$id,'pnew'));
		$is_available_again =to_bool(lookup('select products_old from products where products_id ='.$id,'products_old'));
		$is_hot=to_bool(lookup('select hotshot from products where products_id ='.$id,'hotshot'));
		$is_sold_out=to_bool(lookup('select soldout from products where products_id ='.$id,'soldout'));
	}
*/
    }
//if($do_echo) ec(__line__.':'.'');

    if ($rel <> '') $rel_str = ' rel="' . $rel . '" ';

    if (tep_session_is_registered('customer_id') or $application_shop_is_in_dev_mode) {
        $is_ab18 = false;
    } else {
        if ($hide_ab18_img) {
            $is_ab18 = to_bool2(lookup('select ab18 from products where products_id =' . (int)$id, 'ab18'));
        } else {
            $is_ab18 = false;
        }
    }

//ec(tep_session_is_registered('customer_id') );
//ec($application_shop_is_in_dev_mode);

//ec($products_mediumimage_2);      , $is_available_again, $is_hot, $is_sold_out
    if ($force_medium_img) {
        $use_medium_not_small_img_is_active = true;
        $allow_medium_img = true;
    }


    if ($class <> '') $img_class = ' class="' . $class . '" ';


    if (eregiS('no_picture', $simg)) {
        if ($resize_width == '') {
            $x = '<a href="product_info.php?products_id=' . $id . '&' . sess_id_full() . '">' . tep_image($img_url . 'pixel_black.gif', '', SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, ' style="border:1px ccc solid;opacity:0.1" ') . '</a>';
        } else {
            $x = '<a href="product_info.php?products_id=' . $id . '&' . sess_id_full() . '">' . tep_image($img_url . 'pixel_black.gif', '', $resize_width, '', ' style="border:1px ccc solid;opacity:0.2" ') . '</a>';
        }

    } elseif ($is_ab18) {
        if (curPageName() == 'product_info.php' and 1 == 2) {
            /*
			if ($resize_width==''){
				$x= '<div style="max-width:'.MEDIUM_IMAGE_WIDTH.'px;height:320px;padding:44px 16px;color:#fff;background:#a9a9a9;font-weight:bold;font-size:1.2em;line-height:150%">'.PROD_INFO_ADD_IMGS_SHOW_AB18.'</div>';
			}else{

			}
			*/
        } else {

            //if($do_echo) ec(__line__.'  resize_width:'.$resize_width);
            if ($resize_width == '') {
                /*
				$x='<a href="javascript:ab18()">'.
				tep_image(DIR_WS_IMAGES_FULL . 'icons/attribute_left/ab18'.lang_code_from_lang_id($_SESSION['languages_id']).'.gif', '', SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT+2, '
				style="border:1px #999 solid;opacity:0.6;" ').'</a>';
				*/
//if($do_echo) ec(__line__.'  here');
                $x = '<a href="javascript:ab18()">' .
                    tep_image(DIR_WS_IMAGES_FULL . 'icons/attribute_left/ab18' . lang_code_from_lang_id($_SESSION['languages_id']) . '.png', '', '', '', ' 
				style="border:2px #939394 solid;opacity:1.0;margin-top:2px;margin-right:2px" ') . '</a>';

                //$x .= 'xxxxxxxxxxxxxxxxxxxx'.$resize_width.' - '.SMALL_IMAGE_WIDTH.' - '.SMALL_IMAGE_HEIGHT;
            } else {
                $resize_height = $resize_width * 1.5;
                $x = '<a href="javascript:ab18()">' . tep_image(DIR_WS_IMAGES_FULL . 'icons/attribute_left/ab18' . lang_code_from_lang_id($_SESSION['languages_id']) . '_gross.png', '', $resize_width, $resize_height, ' 
				style="border:2px #939394 solid;opacity:1.0;" ') . '</a>';

            }
            //$x .= 'xxxxxxxxxxxxxxxxxxxx'.$resize_width;
        }

    } else { //Bild vorhanden - nicht ab18

        if ($hotshot) {
            //$simg = str_replace('/small/','/medium/',$simg);
            $simg = lookup("select products_mediumimage from products where products_id = " . $id, "products_mediumimage");
            $allow_tooltip = true;
        }

        if ($small_prod_images_use_tooltip and $ausnahme == '') {


            if ($link_to == '' or $link_to == 'Produkt') {


                if (getParam('cPath', '')) {
                    $t_cPath = getParam('cPath', '');
                } else {
//if($do_echo) ec(__line__.' link_to: '.$link_to);
                    //$t_cPath = full_cPath_from_products_id($id);
                    $t_cPath = '';
                }

                if ($do_echo) ec(__line__ . ' t_cPath: ' . $t_cPath);
                if ($do_echo) ec(__line__ . ' id: ' . $id);
                if ($do_echo) ec(__line__ . ' t_cPath: ' . categories_id_from_products_id($id));


                //$link = 'product_info.php?products_id='.$id.'&cPath='.$t_cPath.'&'.sess_id_full();
                if (getParam('cPath', '')) {
                    $link = 'product_info.php?products_id=' . $id . '&cPath=' . $t_cPath . '&' . sess_id_full();
                } else {
                    $t_cPath = categories_id_from_products_id($id);
                    $this_full_cpath = full_cPath($t_cPath);
                    $link = 'product_info.php?products_id=' . $id . '&' . sess_id_full();
                }
            }
            if ($link_to == 'Kategorie') {
                $this_cat_id = categories_id_from_products_id($id);
                $this_full_cpath = full_cPath($this_cat_id);
                $link = 'index.php?cPath=' . $this_full_cpath . '&' . sess_id_full();
            }
            if ($link_to == 'Hersteller') {
                $this_manuf_id = get_manufacturers_id_from_products_id($id);
                if ($this_manuf_id <> '' and $this_manuf_id <> '0') {
                    $link = 'index.php?manufacturers_id=' . $this_manuf_id . '&' . sess_id_full();
                } else {
                    $link = 'product_info.php?products_id=' . $id . '&' . sess_id_full();
                }
            }
            if ($hotshot) {
                $link = 'product_info.php?products_id=' . $id . '&hotshot=' . urlencode($hotshot_txt) . '&' . sess_id_full();
            }
            //if($small_prod_images_show_medium_img and 1==2){
            if ($use_medium_not_small_img_is_active and $at_select_prod_list_selected == 'one' and $use_medium_not_small_img_allow and $use_medium_not_small_img_is_active_img_width <> 0) {

                $limg = str_replace('/large/', '/medium/', $limg);
                //$simg = str_replace('/small/','/medium/',$simg);
                $simg = lookup("select products_mediumimage from products where products_id = " . $id, "products_mediumimage");
                //ec($simg);
                $wz_large_img_width = get_img_size_str(DIR_FS_CATALOG . 'images/' . $limg, $what = 0);
                $wz_large_img_height = get_img_size_str(DIR_FS_CATALOG . 'images/' . $limg, $what = 1);
                $wz_large_img_str = get_img_size_str(DIR_FS_CATALOG . 'images/' . $limg, $what = 3);
                //ec('l_img_width: '.$l_img_width);
                //ec('l_img_height: '.$l_img_height);
                //ec('resize_width: '.$resize_width);
                //ec('resize_height: '.$resize_height);
                $resize_width = $use_medium_not_small_img_is_active_img_width;
                if ($allow_tooltip) {
                    /*
						function gms_wz_tooltip(
						$small_img,
						$large_img,
						$l_img_width='300',
						$l_img_height='400',
						$href='#',
						$target='',
						$s_img_width='',
						$s_img_height='',
						$class='',
						$is_new=false,
						$new_m_left='17',
						$new_m_top='3',
						$is_available_again=false,
						$is_hot=false,
						$is_sold_out=false,
						$keep_img_size=false,
						$is_rare=false,
						$is_product_info=false,
						$is_attr6=false,
						$is_attr7=false,
						$is_attr8=false,
						$is_attr9=false,
						$is_attr10=false){
					*/
                    $x .= gms_wz_tooltip(
                        $img_url . $simg,
                        $img_url . $limg,
                        $l_img_width,
                        $l_img_height,
                        $link,
                        $target,
                        $resize_width,
                        $resize_height,
                        $img_class,
                        $is_new,
                        $new_m_left,
                        $new_m_top,
                        $is_available_again,
                        $is_hot,
                        $is_sold_out,
                        false,
                        $is_rare, false,
                        $is_attr6,
                        $is_attr7,
                        $is_attr8,
                        $is_attr9,
                        $is_attr10);
                    $x .= '<div style="display:none"><img src="' . $img_url . $limg . '" ' . $wz_large_img_str . ' /></div>';
                } else {
                    $x = '<a title="' . OPEN_PROD_DETAILS . ' - ' . $name . '" href="' . $link . '"><img ' . $img_class . ' style="border:1px #ccc solid"  src="' . $img_url . $simg . '"  /></a>';
                }

            } else {
                if ($do_echo) ec(__function__ . ' ' . __line__ . ' xxxxxxxxxxxx');
                $limg = str_replace('/large/', '/medium/', $limg);
                $wz_large_img_width = get_img_size_str(to_fs($img_url) . $limg, $what = 0);
                $wz_large_img_height = get_img_size_str(to_fs($img_url) . $limg, $what = 1);
                $wz_large_img_str = get_img_size_str(to_fs($img_url) . $limg, $what = 3);

                if ($allow_tooltip) {

                    $x .= gms_wz_tooltip(
                        $img_url . $simg,
                        $img_url . $limg,
                        $wz_large_img_width,
                        $wz_large_img_height,
                        $link,
                        $target,
                        $resize_width,
                        $resize_height,
                        $img_class,
                        $is_new,
                        $new_m_left,
                        $new_m_top,
                        $is_available_again,
                        $is_hot,
                        $is_sold_out,
                        false,
                        $is_rare, false,
                        $is_attr6,
                        $is_attr7,
                        $is_attr8,
                        $is_attr9,
                        $is_attr10);

//if($do_echo) ec(__line__.' r_w: '.$resize_width.' r_h: '.$resize_height);
                    if ($do_echo) ec(__line__ . ' l_i_w: ' . $wz_large_img_width . ' l_i_h: ' . $wz_large_img_height);
                    if ($do_echo) ec(__line__ . ' link: ' . $link);

                    //$x .= '<img src="'.$img_url .$simg.'" />';
                    //$x .= '<div style="margin-top:1px;margin-bottom:5px"><a style="font-size:0.9em" class="button_red" href="javascript:cross_selling_remove($id,)">entfernen</a> <span id="cross_selling_remove_CONF_"></span></div>';
                } else {
                    if ($do_echo) ec(__line__ . ' xxxxxxxxxxxx');
                    $x = '<a title="' . OPEN_PROD_DETAILS . ' - ' . $name . '" href="' . $link . '"><img ' . $img_class . ' style="border:1px #ccc solid" src="' . $img_url . $simg . '"   /></a>';
                    //$x = '<img src="'.$img_url .$simg.'" />';
                    //$x .= '<div style="margin-top:1px;margin-bottom:5px"><a style="font-size:0.9em" class="button_red" href="javascript:cross_selling_remove($id,)">entfernen</a> <span id="cross_selling_remove_CONF_"></span></div>';
                }
            }
        } else {  //if($small_prod_images_use_tooltip and $ausnahme==''){
            $link = tep_href_link($img_url . $limg, '', 'NONSSL', false);
            $price = get_price_from_id($id);
            $sstr = '';
            if ($special) $sstr = 'Sonder-';

            if ($do_echo) ec(__line__ . ' xxxxxxxxxxxx');
            if (!$use_medium_not_small_img_is_active) {
                //if (($browser=='msie' or $browser=='ie') and 1==2 ){

                //}else{

                if ($name == '') $name = get_products_name($id);

                if ($products_mediumimage_2 <> '') {

                    if ($at_show_two_medium_imgs) {

                        $x = '
								<a href="' . $link .
                            '" class="lightwindow " rel="' . $model . ' - ' . dotString(str_replace('"', '', $name), 20) . '[Bild]" 
								title=" ' . $model . ' - ' . dotString(str_replace('"', '', $name), 50) . '" 
								caption="' . IMG_GALLERY_LIGHTWINDOW_HINT . '" > ' .
                            '<img id="t_img" src="' . $img_url . $simg . '" title="' . GENERAL_BILD_VERGROESSERN . '" 					
								>' .
                            '</a>
								';
                    } else {
                        $t_medium_img = $img_url . $simg;
                        $sql = "select products_largeimage from products where products_id =" . $id;
                        $products_largeimage = lookup($sql, 'products_largeimage');
                        $link = tep_href_link($img_url . $products_largeimage, '', 'NONSSL', false);
                        $t_large_img_width = get_img_size_str($t_medium_img, $what = 0);
                        $t_large_img_height = get_img_size_str($t_medium_img, $what = 1);

                        if ($product_info_large_img_on_click_history_back) {
                            $link = 'javascript:history.back()';
                            $x = '
									<a href="' . $link . '"> ' .
                                '<div style="width:' . $t_large_img_width . 'px;height:' . $t_large_img_height . 'px"><img id="t_img" src="' . $img_url . $simg . '" title="' . HISTORY_BACK . '" 
									onMouseOver ="$(\'t_img\').src=\'' . $img_url . $products_mediumimage_2 . '\'  " onMouseOut="$(\'t_img\').src=\'' . $img_url . $simg . '\'"
									></div>' .
                                '</a>
									';

                            /*
									//$products_largeimage2 = lookup('select products_largeimage2 from products where products_id = '.$id,'products_largeimage2');

									if($products_largeimage2<>'') $x.='
											<a href="'.$img_url . $products_largeimage2.'"
											class="lightwindow hidden"
											rel="'.$model.' - '.dotString(str_replace('"','',$name),20).'[Bild]"
											title="'.$model .' - '. dotString(str_replace('"','',$name),50) . '"
											caption="'.IMG_GALLERY_LIGHTWINDOW_HINT.'"
											>'.$model .'</a>
									';
									*/
                        } else { //if($product_info_large_img_on_click_history_back){
                            /* $rel_str
									$x='
									<a href="' . $link .
									'" class="lightwindow " rel="'.$model.' - '.dotString(str_replace('"','',$name),20).'[Bild]"
									title=" '.$model .' - '. dotString(str_replace('"','',$name),50) . '"
									caption="'.TABLE_HEADING_MODEL.': '.$model.' - ' . dotString(str_replace('"','',$name),200) . ' - '.$sstr.''.TABLE_HEADING_PRICE.': '.$price.' " > ' .
									'<div style="width:'.$t_large_img_width.'px;height:'.$t_large_img_height.'px"><img id="t_img" src="'.$img_url . $simg.'" title="'.GENERAL_BILD_VERGROESSERN.'"
									onMouseOver ="$(\'t_img\').src=\''.$img_url . $products_mediumimage_2.'\'  " onMouseOut="$(\'t_img\').src=\''.$img_url . $simg.'\'"
									></div>' .
									'</a>
									';
									*/
                            /*
									$x='
									<a href="' . $link .
									'" class="lightwindow " rel="Random[BildL]"
									title=" '.$model .' - '. dotString(str_replace('"','',$name),50) . '"
									caption="'.IMG_GALLERY_LIGHTWINDOW_HINT.'" > ' .
									'<div style="width:'.$t_large_img_width.'px;height:'.$t_large_img_height.'px"><img id="t_img" src="'.$img_url . $simg.'" title="'.GENERAL_BILD_VERGROESSERN.'"
									onMouseOver ="$(\'t_img\').src=\''.$img_url . $products_mediumimage_2.'\'  " onMouseOut="$(\'t_img\').src=\''.$img_url . $simg.'\'"
									></div>' .
									'</a>
									';

									*/

                            $x = '
									<a href="' . $link .
                                '" class="xample-image-link" data-lightbox="example-set" data-title="' . IMG_GALLERY_LIGHTWINDOW_HINT . '"
									
									 >
									 ' .
                                '<div style="width:' . $t_large_img_width . 'px;height:' . $t_large_img_height . 'px"><img id="t_img" src="' . $img_url . $simg . '" title="' . GENERAL_BILD_VERGROESSERN . '" 
									onMouseOver ="$(\'t_img\').src=\'' . $img_url . $products_mediumimage_2 . '\'  " onMouseOut="$(\'t_img\').src=\'' . $img_url . $simg . '\'"
									></div>' .
                                '</a>
									';


                            //$x='';
                            /*
									$products_largeimage2 = lookup('select products_largeimage2 from products where products_id = '.$id,'products_largeimage2');
									if($products_largeimage2<>'') $x.='
											<a href="'.$img_url . $products_largeimage2.'"
											class="lightwindow hidden"
											rel="Random[BildL]"
											title="'.$model .' - '. dotString(str_replace('"','',$name),50) . '"
											caption="'.IMG_GALLERY_LIGHTWINDOW_HINT.'"
											>'.$model .'</a>
									';
									*/
                            //$x='';
                        } //if($product_info_large_img_on_click_history_back){
                    }

                } else { //if($products_mediumimage_2<>'' ){
                    if ($do_echo) ec(__line__ . ' xxxxxxxxxxxx');
                    if ($product_info_large_img_on_click_history_back and curPageName() == 'product_info.php') {
                        $link = 'javascript:history.back()';
                        $x = '
								<a href="' . $link . '" 
								title="' . HISTORY_BACK . '"> ' .
                            tep_image($img_url . $simg, '' . HISTORY_BACK, $resize_width) .
                            '</a>';
                    } else {
                        /*
								$x='
								<a href="' . $link .
								'" class="lightwindow " rel="Random[BildL]"
								title=" '.$model .' - '. dotString(str_replace('"','',$name),50) . '"
								caption="'.IMG_GALLERY_LIGHTWINDOW_HINT.'" > ' .
								tep_image($img_url . $simg, ''.GENERAL_BILD_VERGROESSERN, $resize_width) .
								'</a>
								';
								*/
                        $x = '
									<a href="' . $link .
                            '" class="xample-image-link" data-lightbox="example-set" data-title="' . IMG_GALLERY_LIGHTWINDOW_HINT . '"
									
									 >
									 ' .
                            '<div style="width:' . $t_large_img_width . 'px;height:' . $t_large_img_height . 'px"><img id="t_img" src="' . $img_url . $simg . '" title="' . GENERAL_BILD_VERGROESSERN . '" 
									onMouseOver ="$(\'t_img\').src=\'' . $img_url . $products_mediumimage_2 . '\'  " onMouseOut="$(\'t_img\').src=\'' . $img_url . $simg . '\'"
									></div>' .
                            '</a>
									';


                        //$x='';
                    }
                } //if($products_mediumimage_2<>'' ){
                //} //if (($browser=='msie' or $browser=='ie') and 1==2 ){
                if ($do_echo) ec(__line__ . ' xxxxxxxxxxxx');

            } else { //if (!$use_medium_not_small_img_is_active ){
                if ($do_echo) ec(__line__ . ' xxxxxxxxxxxx');
                if ($use_medium_not_small_img_is_active and $at_select_prod_list_selected == 'one' and $use_medium_not_small_img_allow)
                    $simg = str_replace('artikel/small', 'artikel/medium', $simg); // Medium Bild verwenden

                if ($do_echo) ec(__line__ . ' xxxxxxxxxxxx');
                if ($products_mediumimage_2 <> '') {
                    if ($at_show_two_medium_imgs) {

                        $x = '
								<a href="' . $link .
                            '" class="lightwindow " rel="Random[BildL]" 
								title=" ' . $model . ' - ' . dotString(str_replace('"', '', $name), 50) . '" 
								caption="' . IMG_GALLERY_LIGHTWINDOW_HINT . '" > ' .
                            '<img id="t_img" src="' . $img_url . $simg . '" title="' . GENERAL_BILD_VERGROESSERN . '" 					
								>' .
                            '</a>
								';
                    } else {
                        $t_medium_img = $img_url . $simg;
                        $sql = "select products_largeimage from products where products_id =" . $id;
                        $products_largeimage = lookup($sql, 'products_largeimage');
                        $link = tep_href_link($img_url . $products_largeimage, '', 'NONSSL', false);
                        $t_large_img_width = get_img_size_str($t_medium_img, $what = 0);
                        $t_large_img_height = get_img_size_str($t_medium_img, $what = 1);

                        if ($product_info_large_img_on_click_history_back) {
                            $link = 'javascript:history.back()';
                            $x = '
									<a  href="' . $link . '"> ' .
                                '<div style="width:' . $t_large_img_width . 'px;height:' . $t_large_img_height . 'px"><img id="t_img" src="' . $img_url . $simg . '" title="' . HISTORY_BACK . '" 
									onMouseOver ="$(\'t_img\').src=\'' . $img_url . $products_mediumimage_2 . '\'  " onMouseOut="$(\'t_img\').src=\'' . $img_url . $simg . '\'"
									></div>' .
                                '</a>
									';
                            if ($do_echo) ec(__line__ . ': ' . $products_largeimage);
                            $x .= '<a href="' . $img_url . $products_largeimage . '" 
											class="lightwindow hidden" 
											rel="Random[BildL]" 
											title="' . $model . ' - ' . dotString(str_replace('"', '', $name), 50) . '" 
											caption="' . IMG_GALLERY_LIGHTWINDOW_HINT . '" 
											>' . $model . '</a>
											';


                            $products_largeimage2 = lookup('select products_largeimage2 from products where products_id = ' . $id, 'products_largeimage2');
                            if ($products_largeimage2 <> '') $x .= '
											<a href="' . $img_url . $products_largeimage2 . '" 
											class="lightwindow hidden" 
											rel="Random[BildL]" 
											title="' . $model . ' - ' . dotString(str_replace('"', '', $name), 50) . '" 
											caption="' . IMG_GALLERY_LIGHTWINDOW_HINT . '" 
											>' . $model . '</a>
											';
                            //$x='';
                        } else { //if($product_info_large_img_on_click_history_back){
                            /*
									$x='
									<a href="' . $link .
									'" class="lightwindow " rel="Random[BildL]"
									title=" '.$model .' - '. dotString(str_replace('"','',$name),50) . '"
									caption="'.IMG_GALLERY_LIGHTWINDOW_HINT.'" > ' .
									'<div style="width:'.$t_large_img_width.'px;height:'.$t_large_img_height.'px"><img id="t_img" src="'.$img_url . $simg.'" title="'.GENERAL_BILD_VERGROESSERN.'"
									onMouseOver ="$(\'t_img\').src=\''.$img_url . $products_mediumimage_2.'\'  " onMouseOut="$(\'t_img\').src=\''.$img_url . $simg.'\'"
									></div>' .
									'</a>
									';
									*/
                            if ($do_echo) ec(__line__ . ' xxxxxxxxxxxx');
                            $x = '
									<a href="' . $link .
                                '" class="xample-image-link" data-lightbox="example-set" data-title="' . IMG_GALLERY_LIGHTWINDOW_HINT . '"
									
									 >
									 ' .
                                '<div style="width:' . $t_large_img_width . 'px;height:' . $t_large_img_height . 'px"><img id="t_img" src="' . $img_url . $simg . '" title="' . GENERAL_BILD_VERGROESSERN . '" 
									onMouseOver ="$(\'t_img\').src=\'' . $img_url . $products_mediumimage_2 . '\'  " onMouseOut="$(\'t_img\').src=\'' . $img_url . $simg . '\'"
									></div>' .
                                '</a>
									';


                            //$x='';

                            $products_largeimage2 = lookup('select products_largeimage2 from products where products_id = ' . $id, 'products_largeimage2');
                            if ($products_largeimage2 <> '') {
                                $x .= '
											<a style="display:none" href="' . $img_url . $products_largeimage2 . '" 
											class="" data-lightbox="example-set" data-title="' . IMG_GALLERY_LIGHTWINDOW_HINT . '">' . $model . '</a>
									';
                            }

                        } //if($product_info_large_img_on_click_history_back){
                    } //if ($at_show_two_medium_imgs) {

                } else { //if($products_mediumimage_2<>''){

                    if ($product_info_large_img_on_click_history_back and curPageName() == 'product_info.php') {
                        $link = 'javascript:history.back()';
                        $x = '
								<a href="' . $link . '" 
								title="' . HISTORY_BACK . '"> ' .
                            tep_image($img_url . $simg, '' . HISTORY_BACK, $resize_width) .
                            '</a>';

                    } else {
                        if ($do_echo) ec(__function__ . ' ' . __line__ . ' no mouseover xxxxxxxx');
                        if ($name == '') $name = get_products_name($id);

                        $attr_img = attr_img($is_new, $is_sold_out, $is_hot, $is_available_again, $s_img_width, $s_img_height, false, $is_rare, $is_attr6, $is_attr7, $is_attr8, $is_attr9, $is_attr10);

                        if ($is_sold_out) $sold_out_style = ';opacity:0.4';
//unction tep_image($src, $alt = '', $width = '', $height = '', $parameters = '')

                        if ($do_echo) ec(__function__ . ' ' . __line__ . ' ' . $link);

                        if (curPageName() == 'product_info.php') {
                            $x = '
								<a href="' . $link .
                                '" class="lightwindow " rel="Random[BildL]" style="' . $sold_out_style . '" 
								title=" ' . $model . ' - ' . dotString(str_replace('"', '', $name), 50) . '" 
								caption="' . IMG_GALLERY_LIGHTWINDOW_HINT . ' "> ' .
                                tep_image($img_url . $simg, '', $resize_width, $height = '', $parameters = ' class="enlarge" ') .
                                '</a>
								' . $attr_img;
                        } else {
                            $link = 'product_info.php?products_id=' . $id . '&' . sess_id_full();
                            if ($do_echo) ec(__function__ . ' ' . __line__ . ' ' . $link);
                            $x = '<a title="' . OPEN_PROD_DETAILS . ' - ' . $name . '" href="' . $link . '"><img ' . $img_class . ' style="border:1px #ccc solid" src="' . $img_url . $simg . '"   /></a>' . $attr_img;
                        }

                    }
                }
            }
        } //


    }

//if ($allow_attr_icons) {
    if ($application_shop_is_in_dev_mode and $bearb_mode_show_block_under_imgs) {

        if ($model == '') $model = get_model_from_id($id);

        $x .= '

<div class="edit_this  round6" style="max-width:160px;font-weight:normal">
<div style="color:#999;margin:0 0 0 0"><b>' . $model . '</b> (' . $id . ')</div>

<div>
<a target="_blank"  
title="alle Artikel-Details im Admin-Bereich bearbeiten" 
href="admin6093/categories.php?search=' . $model . '">Artikel-Details</a>

&#8226;

<a title="ein neues Produkt-Bild hochladen" href="javascript:uploadDialog_from_list_cat(\'' . $id . '\')">Bild-Upload</a> &#8226; 

<a target="_blank" title="Bilder-Manager - Bilder (S/M/L) bearbeiten" href="admin6093/images_control.php?search=' . $model . '">Bilder-Manager</a>

</div>';

        if (has_products_attribute($id)) {
            $x .= '<div>';
            $app_product_attribute_option_group = this_product_attribute_option_group(att_clean($id));
            $xxxx = display_products_attribute3($id, $app_product_attribute_option_group);
            $x .= $xxxx;
            $x .= '</div>';
        }

        if ($allow_attr_icons) {

            for ($i = 1, $n = 11; $i < $n; $i++) {

                $pa_is_active1 = 'prod_atr_icons_attr' . $i . '_is_active';
                $pa_is_active = $$pa_is_active1;
                if (to_bool($pa_is_active)) {
                    $x .= '
		<div style="border:1px #ccc solid;padding:2px 3px;margin-bottom:2px">';
                    $table = 'products';
                    $field = 'attr' . $i;
                    $id_field = 'products_id';
                    $class = '';
                    $style = 'display:inline-block;margin-left:5px';
                    $show_field_name = false;
                    $margin_r = 3;

                    $t_name1 = 'prod_atr_icons_attr' . $i . '_txt';
                    $t_name = $$t_name1;

                    //prod_atr_icons_attr1_is_active

                    $x .= '' . $i . ': ' . $t_name . '' . get_checkbox_any_table($id, $table, $field, $id_field, $class, $style, $show_field_name, $margin_r, false, false, $show_hide_element_id = '', $show_if_checked = true, $show_label = false);

                    if ($i == 1) $x .= '<a target="_blank" title="Attribute - Konfig.-Assi" href="admin6093/wrapper_full.php?use_header=1&incl=includes/quick_config_design/prod_attr_icons.php">' . $wizard_icon . '</a>';


                    $x .= '</div>';
                }
            }


            /*
	$x .= '<div style="border:1px #ccc solid;padding:2px 3px;margin-bottom:2px">';
		$table = 'products' ;
		$field = 'hotshot' ;
		$id_field = 'products_id' ;
		$class='';
		$style='display:inline-block';
		$show_field_name=false;
		$margin_r= 3;
		$x .= 'HOT! '.get_checkbox_any_table($id,$table,$field,$id_field,$class,$style,$show_field_name,$margin_r,false,false);
	$x .= '</div>';
	*/

            /*
	$x .= '<div style="border:1px #ccc solid;padding:2px 3px;margin-bottom:2px">';
		$table = 'products' ;
		$field = 'products_old' ;
		$id_field = 'products_id' ;
		$class='';
		$style='display:inline-block';
		$show_field_name=false;
		$margin_r= 3;
		$x .= 'Wieder lieferbar '.get_checkbox_any_table($id,$table,$field,$id_field,$class,$style,$show_field_name,$margin_r,false,false);
	$x .= '</div>';
	*/

            /*
	$x .= '<div style="border:1px #ccc solid;padding:2px 3px;margin-bottom:2px">';
		$table = 'products' ;
		$field = 'soldout' ;
		$id_field = 'products_id' ;
		$class='';
		$style='display:inline-block';
		$show_field_name=false;
		$margin_r= 3;
		$x .= 'Sold out! '.get_checkbox_any_table($id,$table,$field,$id_field,$class,$style,$show_field_name,$margin_r,false,false);
	$x .= '</div>';
	*/

            /*
	$x .= '<div style="border:1px #ccc solid;padding:2px 3px;margin-bottom:2px">';
		$table = 'products' ;
		$field = 'rare' ;
		$id_field = 'products_id' ;
		$class='';
		$style='display:inline-block';
		$show_field_name=false;
		$margin_r= 3;
		$x .= 'Rarit&auml;t! '.get_checkbox_any_table($id,$table,$field,$id_field,$class,$style,$show_field_name,$margin_r,false,false);
	$x .= '</div>';
	*/
        } //if ($allow_attr_icons) {


        if ($hide_ab18_img) {
            $x .= '<div style="border:1px #ccc solid;padding:2px 3px;margin-bottom:2px">';
            $table = 'products';
            $field = 'ab18';
            $id_field = 'products_id';
            $class = '';
            $style = 'display:inline-block;margin-left:5px';
            $show_field_name = false;
            $margin_r = 3;
            //get_checkbox_any_table($id,$table,$field,$id_field,$class,$style,$show_field_name,$margin_r,false,false,$show_hide_element_id='',$show_if_checked=true,$show_label=false);
            $x .= 'ab 18 ' . get_checkbox_any_table($id, $table, $field, $id_field, $class, $style, $show_field_name, $margin_r, $allow_two = true, false, $show_hide_element_id = '', $show_if_checked = true, $show_label = false);
            $x .= '</div>';


        } //if ($application_shop_is_in_dev_mode and $bearb_mode_show_block_under_imgs){


        $cat_id = categories_id_from_products_id($id);
        /*
if (get_special_price($id) > 0 ){
$x .= '
<br><br class="lh6">
<a target="_blank"

title="Sonderangebote bearbeiten"
href="admin6093/specialsbycategory.php?categories='.$cat_id.'&products_id='.$id.'&poppage=1">Sonderpreis bearbeiten</a>

';

}else{
$x .= '
<br><br class="lh6">
<a target="_blank"
title="Sonderangebote bearbeiten"
href="admin6093/specialsbycategory.php?categories='.$cat_id.'&products_id='.$id.'&poppage=1">Sonderpreis neu festlegen</a>

';
}
*/
        /*
$x .= '
<br><br class="lh6">
<a target="_blank"
title="Sonderangebote bearbeiten"
href="admin6093/categories.php?search='.get_model_from_id($id).'">Videos oder PDFs zuf&uuml;gen</a>

';
*/


        $x .= '</div>';
    } else {
        if ($application_shop_is_in_dev_mode) {
            if ($model == '') $model = get_model_from_id($id);
            $x .= '
		<div class="edit_this  round6" style="max-width:160px;font-weight:normal">
		<div style="color:#999;margin:0 0 0 0"><b>' . $model . '</b> (' . $id . ')</div>
		<div>
		<a target="_blank"  
		title="Artikel-Details im Admin-Bereich bearbeiten" 
		href="admin6093/categories.php?search=' . $model . '">Artikel-Details bearbeiten</a>
		</div></div>';
        }
    }

//if (  ($mp3_per_product_is_active and $allow_medium_img) or ($mp3_per_product_is_active and $force_mp3_player)  ){
    if (($mp3_per_product_is_active and $force_mp3_player)) {
        $x .= '<div style="margin:5px auto 0  auto;width:100%">' . get_mp3_player($id) . '</div>';
    }

    return $x;
}

function ori_img_ws_path($products_model)
{
    global $artikel_img_prefix;
    $path = DIR_WS_IMAGES_FULL . 'artikel/original/' . $artikel_img_prefix . $products_model . '.jpg';
    return $path;
}

function ori_img_name($products_model)
{
    global $artikel_img_prefix;
    $name = $artikel_img_prefix . $products_model . '.jpg';
    return $name;
}


function get_menu_all($str = '', $parent_id = '0', $loop = '', $with_session_id = true)
{
    global $languages_id, $products_number_in_category_show_in_main_menu, $menu_all_has_sub_str_icon, $main_menu_max_cat_name_len, $session_lang_code_from_lang_id, $main_menu_underline_current_cats;
    $show_empty_cats_in_main_menu = get_dv_bool('show_empty_cats_in_main_menu');
    $curr_path = getParam('cPath', '');
    if ($loop == '') {
        $str .= '<ul id="menu_all">';
    } else {
        $str .= '<ul>';
    }

    $sql = "
	 select c.categories_id, c.parent_id, c.anz_prod, c.anz_prod_subcats,  cd.categories_name from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd 
	 where parent_id = '" . (int)$parent_id . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "' and sort_order <>9999 
	 order by sort_order, cd.categories_name";

    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $c_id = $row["categories_id"];
        $c_parent_id = $row["parent_id"];
        $c_anz_prod = $row["anz_prod"];
        $c_anz_prod_subcats = $row["anz_prod_subcats"];
        $categories_name = $row["categories_name"];
        if ($session_lang_code_from_lang_id <> 'ru') $categories_name = dotString($categories_name, $main_menu_max_cat_name_len);

        if ($c_anz_prod_subcats == 0 and !$show_empty_cats_in_main_menu) {

        } else {
            $has_sub = cat_has_subcats($c_id);
            if ($has_sub) {
                $has_sub_str = $menu_all_has_sub_str_icon;
            } else {
                $has_sub_str = '';
            }
            //$y=tep_get_path($c_id);
            $y = 'cPath=' . full_cPath($c_id);
            //$str.='<li><span><a href="'.tep_href_link(FILENAME_DEFAULT,$y).'">'.$has_sub_str.''.$categories_name.' ('.$c_anz_prod_subcats.') </a></span>';
            $curr_path_arr = explode('_', $curr_path);

            //if( full_cPath($c_id)==$curr_path or erste_in_cPath()==$c_id ) {
            if (in_array($c_id, $curr_path_arr)) {
                if ($main_menu_underline_current_cats) $add_style = ' style="text-decoration:underline;font-style:italic;" ';
            } else {
                $add_style = '';
            }

            if ($products_number_in_category_show_in_main_menu) {
                $str .= '<li><a href="' . tep_href_link(FILENAME_DEFAULT, $y, 'NONSSL', $with_session_id) . '"><span ' . $add_style . '>' . $has_sub_str . '' . $categories_name . ' <span class="mmenu_nr_pr">(' . nuf($c_anz_prod_subcats) . ')</span> </span></a>';
            } else {
                $str .= '<li><a href="' . tep_href_link(FILENAME_DEFAULT, $y, 'NONSSL', $with_session_id) . '"><span ' . $add_style . '>' . $has_sub_str . '' . $categories_name . '</span></a>';
            }

            $str .= get_menu_all('', $c_id, $loop .= 'x');
            $str .= '</li>';
        }
    }
    mysql_free_result($sql_result);

    $str .= '</ul>';

    $str = str_replace('<ul></ul>', '', $str);
    //$str= str_ireplace('id=""','',$str);

    return $str;
}


function get_menu_top($str = '', $parent_id = '0', $loop = '')
{
    global $languages_id, $products_number_in_category_show_in_main_menu, $menu_all_has_sub_str_icon, $main_menu_max_cat_name_len;

    $show_empty_cats_in_main_menu = get_dv_bool('show_empty_cats_in_main_menu');

    if ($loop == '') {
        $str .= '<ul style="width:190px;">';
    } else {
        $str .= '<ul>';
    }

    $sql = "
	 select c.categories_id, c.parent_id, c.anz_prod, c.anz_prod_subcats,  cd.categories_name from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd 
	 where parent_id = '" . (int)$parent_id . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "' 
	 order by sort_order, cd.categories_name";

    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $c_id = $row["categories_id"];
        $c_parent_id = $row["parent_id"];
        $c_anz_prod = $row["anz_prod"];
        $c_anz_prod_subcats = $row["anz_prod_subcats"];
        $categories_name = $row["categories_name"];

        //$categories_name = properCase($categories_name);
        $categories_name = dotString($categories_name, $main_menu_max_cat_name_len);

        if ($c_anz_prod_subcats == 0 and !$show_empty_cats_in_main_menu) {

        } else {
            $has_sub = cat_has_subcats($c_id);
            if ($has_sub) {
                //$has_sub_str = $menu_all_has_sub_str_icon;
            } else {
                $has_sub_str = '';
            }
            //$y=tep_get_path($c_id);
            $y = 'cPath=' . full_cPath($c_id);

            if ($products_number_in_category_show_in_main_menu) {
                $str .= '<li><a href="' . tep_href_link(FILENAME_DEFAULT, $y) . '"><span>' . $has_sub_str . '' . $categories_name . ' (' . $c_anz_prod_subcats . ') </span></a>';
            } else {
                $str .= '<li><a href="' . tep_href_link(FILENAME_DEFAULT, $y) . '"><span>' . $has_sub_str . '' . $categories_name . '</span></a>';
            }
            //$str.= get_menu_top('', $c_id, $loop .= 'x');
            $str .= '</li>';
        }
    }
    mysql_free_result($sql_result);
    $str .= '</ul>';

    $str = str_replace('<ul></ul>', '', $str);
    return $str;
}


function get_menu_top2($str = '', $parent_id = '0', $loop = '', $with_session_id = true)
{
    //maximal 4 level!
    global $languages_id, $products_number_in_category_show_in_main_menu, $menu_all_has_sub_str_icon, $main_menu_max_cat_name_len, $session_lang_code_from_lang_id, $global_menu_all_hover_style;
    $show_empty_cats_in_main_menu = get_dv_bool('show_empty_cats_in_main_menu');
    //'.$im_str_mo.' color: '.$lcmo.';


    if (getParam('cPath', '') and getParam('cPath', '') <> '') {
        $getParam_cPath = getParam('cPath', '');
    } else {
        if (getParam('products_id', '') and getParam('products_id', '') <> '') {

            $getParam_cPath = full_cPath_from_products_id(getParam('products_id', ''));
        }
    }

    if ($loop == '') {
        $str .= '<ul id="menu_all">';
    } else {
        //$str.='<ul>';
        //ec($loop);
        $str .= '<li style="">';
    }

    $sql = "
	 select c.categories_id, c.parent_id, c.anz_prod, c.anz_prod_subcats,  cd.categories_name from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd 
	 where parent_id = '" . (int)$parent_id . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "' and sort_order <>9999 
	 order by sort_order, cd.categories_name";
//ec(__line__.'<div style="height:300px">'.$sql.'</div>');
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $c_id = $row["categories_id"];
        $c_parent_id = $row["parent_id"];
        $c_anz_prod = $row["anz_prod"];
        $c_anz_prod_subcats = $row["anz_prod_subcats"];
        $categories_name = $row["categories_name"];
        if ($session_lang_code_from_lang_id <> 'ru') $categories_name = dotString($categories_name, $main_menu_max_cat_name_len);

        if ($c_anz_prod_subcats == 0 and !$show_empty_cats_in_main_menu) {

        } else {
            $has_sub = cat_has_subcats($c_id);
            if ($has_sub) {
                $has_sub_str = $menu_all_has_sub_str_icon;
            } else {
                $has_sub_str = '';
            }

            $full_cPath_c_id = full_cPath($c_id);
            //$y=tep_get_path($c_id);
            $y = 'cPath=' . $full_cPath_c_id;
            //$str.='<li><span><a href="'.tep_href_link(FILENAME_DEFAULT,$y).'">'.$has_sub_str.''.$categories_name.' ('.$c_anz_prod_subcats.') </a></span>';
            //$c_id == vorletzte_in_cPath()
            // or stristr(getParam('cPath',''),full_cPath($c_id))

            /*
				if( full_cPath($c_id) == getParam('cPath','')
				or  is_in_cPath(full_cPath_from_products_id( getParam('products_id','') ),$c_id)
				or ( stristr(getParam('cPath',''),full_cPath($c_id)) and (full_cPath($c_id)==erste_in_cPath() or  full_cPath($c_id)==erste_in_cPath().'_'.vorletzte_in_cPath()  )  )
				) {
*/
            if ($full_cPath_c_id == $getParam_cPath


                or (stristr($getParam_cPath, $full_cPath_c_id) and ($full_cPath_c_id == erste_in_cPath($getParam_cPath) or $full_cPath_c_id == erste_in_cPath($getParam_cPath) . '_' . vorletzte_in_cPath($getParam_cPath)))

            ) {


                $style_str = 'style="' . $global_menu_all_hover_style . '"';
                $spacer = '';
                if (is_second_level_cat_full($full_cPath_c_id)) {
                    //$spacer='&nbsp; <span style="opacity:0.5">&raquo;2</span>&nbsp;';
                    $spacer = '<span style="opacity:0.5;padding-left: 6px">&raquo;</span>&nbsp;';
                    //$l_margin_style = ' style="padding-left: 0px" ';
                    //ecdb(__line__.' 2');
                } else {
                    if (is_third_level_cat_full($full_cPath_c_id)) {
                        //$spacer='&nbsp; &nbsp; <span style="opacity:0.5">&raquo;</span>&nbsp;';
                        $spacer = '<span style="opacity:0.5;padding-left: 6px">&nbsp;&raquo;</span>&nbsp;';
                        //$l_margin_style = ' style="padding-left: 12px" ';
                        //ecdb(__line__.' 3');
                    } else {
                        if (is_fourth_level_cat_full($full_cPath_c_id)) {
                            $spacer = '<span style="opacity:0.5;padding-left: 12px">&nbsp;&nbsp;&raquo;</span>&nbsp;';
                            //$spacer='<span style="opacity:0.5;">&raquo;</span>&nbsp;';
                            //$l_margin_style = ' style="padding-left: 13px" ';
                            //ecdb(__line__.' 4');
                        }
                    }
                }
            } else {
                $style_str = '';
                if (is_second_level_cat_full($full_cPath_c_id)) {
                    //$spacer='&nbsp; <span style="opacity:0.5">&raquo;2</span>&nbsp;';
                    $spacer = '<span style="opacity:0.5">&raquo;</span>&nbsp;';
                    //$l_margin_style = ' style="padding-left: 3px" ';
                    //ecdb(__line__.' 2');
                }

                if (is_third_level_cat_full($full_cPath_c_id) and !is_fourth_level_cat_full($full_cPath_c_id)) {
                    //$spacer='&nbsp; &nbsp; <span style="opacity:0.5;">&raquo;</span>&nbsp;';
                    $spacer = '<span style="opacity:0.5;">&nbsp;&raquo;</span>&nbsp;';
                    //$l_margin_style = ' style="padding-left: 5px" ';
                    //ecdb(__line__.' 3');
                }

                if (is_fourth_level_cat_full($full_cPath_c_id)) {
                    $spacer = '<span style="opacity:0.5;padding-left: 6px">&nbsp;&nbsp;&raquo;</span>&nbsp;';
                    //ecdb(__line__.' 4');
                    //$spacer='<span style="opacity:0.5;">&raquo;</span>&nbsp;';
                    //$l_margin_style = ' style="padding: 13px" ';
                }

                /*
					if(left($loop,1)=='x' and !is_first_level_cat($c_id) ){
						$style_str= 'style=""';
						$spacer='&nbsp; <span style="opacity:0.5">&raquo;3a</span>&nbsp; ';
						if( this_cat_level()+1==cat_level($c_id) ) {
							$spacer='&nbsp; &nbsp;<span style="opacity:0.5;color:#f00">&raquo;3</span> ';
						}
					}else{
						$style_str= 'style=""';
						$spacer='';

					}
					*/
            }

            //$debug_str = ' '.this_cat_level().'='.cat_level($c_id).' '.full_cPath($c_id).'='.getParam('cPath','').' '.erste_in_cPath().'='.$c_parent_id;
            //$debug_str = full_cPath($c_id).'='.getParam('cPath','');
            //$debug_str = full_cPath($c_id).'='.full_cPath_from_products_id( getParam('products_id','') );


            if ($products_number_in_category_show_in_main_menu) {
                /*
					$str.='<li><a '.$style_str.' href="'.tep_href_link(FILENAME_DEFAULT,$y,'NONSSL',$with_session_id).'"><span>'.$has_sub_str.''.$spacer.$categories_name.$debug_str.
					' <span class="mmenu_nr_pr">('.nuf($c_anz_prod_subcats).')</span> </span></a>';
					*/
                $str .= '<li><a ' . $style_str . ' href="' . tep_href_link(FILENAME_DEFAULT, $y, 'NONSSL', $with_session_id) . '"><div ' . $l_margin_style . '><span>' . $has_sub_str . '' . $spacer . $categories_name . $debug_str .
                    ' <span class="mmenu_nr_pr">(' . nuf($c_anz_prod_subcats) . ')</span> </span></div></a>';


            } else {
                $str .= '<li><a ' . $style_str . ' href="' . tep_href_link(FILENAME_DEFAULT, $y, 'NONSSL', $with_session_id) . '"><span>' . $has_sub_str . '' . $spacer . $categories_name .
                    '</span></a>';
            }

            //if(full_cPath($c_id) == getParam('cPath','') or ( this_cat_level() == cat_level($c_id)  and stristr(full_cPath($c_id),getParam('cPath','').'_')   ) ) {
            //if( full_cPath($c_id) == getParam('cPath','')  or (is_in_cPath(full_cPath_from_products_id( getParam('products_id','') ),$c_id)  )  and getParam('products_id','') ) {
            if ($full_cPath_c_id == $getParam_cPath and $getParam_cPath <> '') {
                $str .= get_menu_top2('', $c_id, $loop .= 'x');
            } else {
                //if ( ((int)letzte_in_cPath() == (int)$c_id)   ) {
                if ($c_id == erste_in_cPath($getParam_cPath)) {
                    $str .= get_menu_top2('', $c_id, $loop .= 'x');
                } else {
                    //$str.= '<div style="color:#eee">'.erste_in_cPath().'<>'.$c_id.'</div>';
                    //$str.= get_menu_top2('', $c_id, $loop .= 'x');
                    if ($c_id == vorletzte_in_cPath($getParam_cPath)) {
                        $str .= get_menu_top2('', $c_id, $loop .= 'x');
                    } else {
                        $str .= '';
                    }
                }
            }
            //or stristr(full_cPath($c_id),getParam('cPath',''))
            //and this_cat_level() == cat_level($c_id)
            $str .= '</li>';
        }
    }
    mysql_free_result($sql_result);
    //$str.='</ul>';
    $str .= '</li>';

    $str = str_replace('<ul></ul>', '', $str);
    //$str= str_ireplace('id=""','',$str);

    return $str;
}


function get_menu_top2_kannweg($str = '', $parent_id = '0', $loop = '', $with_session_id = true)
{
    //maximal 4 level!
    global $languages_id, $products_number_in_category_show_in_main_menu, $menu_all_has_sub_str_icon, $main_menu_max_cat_name_len, $session_lang_code_from_lang_id, $global_menu_all_hover_style;
    $show_empty_cats_in_main_menu = get_dv_bool('show_empty_cats_in_main_menu');
    //'.$im_str_mo.' color: '.$lcmo.';


    if (getParam('cPath', '') and getParam('cPath', '') <> '') {
        $getParam_cPath = getParam('cPath', '');
    } else {
        if (getParam('products_id', '') and getParam('products_id', '') <> '') {

            $getParam_cPath = full_cPath_from_products_id(getParam('products_id', ''));
        }
    }

    if ($loop == '') {
        $str .= '<ul id="menu_all">';
    } else {
        //$str.='<ul>';
        //ec($loop);
        $str .= '<li style="">';
    }

    $sql = "
	 select c.categories_id, c.parent_id, c.anz_prod, c.anz_prod_subcats,  cd.categories_name from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd 
	 where parent_id = '" . (int)$parent_id . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "' and sort_order <>9999 
	 order by sort_order, cd.categories_name";
//ec(__line__.'<div style="height:300px">'.$sql.'</div>');
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $c_id = $row["categories_id"];
        $c_parent_id = $row["parent_id"];
        $c_anz_prod = $row["anz_prod"];
        $c_anz_prod_subcats = $row["anz_prod_subcats"];
        $categories_name = $row["categories_name"];
        if ($session_lang_code_from_lang_id <> 'ru') $categories_name = dotString($categories_name, $main_menu_max_cat_name_len);

        if ($c_anz_prod_subcats == 0 and !$show_empty_cats_in_main_menu) {

        } else {
            $has_sub = cat_has_subcats($c_id);
            if ($has_sub) {
                $has_sub_str = $menu_all_has_sub_str_icon;
            } else {
                $has_sub_str = '';
            }
            //$y=tep_get_path($c_id);
            $y = 'cPath=' . full_cPath($c_id);
            //$str.='<li><span><a href="'.tep_href_link(FILENAME_DEFAULT,$y).'">'.$has_sub_str.''.$categories_name.' ('.$c_anz_prod_subcats.') </a></span>';
            //$c_id == vorletzte_in_cPath()
            // or stristr(getParam('cPath',''),full_cPath($c_id))

            /*
				if( full_cPath($c_id) == getParam('cPath','')
				or  is_in_cPath(full_cPath_from_products_id( getParam('products_id','') ),$c_id)
				or ( stristr(getParam('cPath',''),full_cPath($c_id)) and (full_cPath($c_id)==erste_in_cPath() or  full_cPath($c_id)==erste_in_cPath().'_'.vorletzte_in_cPath()  )  )
				) {
*/
            if (full_cPath($c_id) == getParam('cPath', '')
                or (full_cPath($c_id) == full_cPath_from_products_id(getParam('products_id', '')) and getParam('products_id', ''))

                or (stristr(getParam('cPath', ''), full_cPath($c_id)) and (full_cPath($c_id) == erste_in_cPath() or full_cPath($c_id) == erste_in_cPath() . '_' . vorletzte_in_cPath()))

            ) {


                $style_str = 'style="' . $global_menu_all_hover_style . '"';
                $spacer = '';
                if (is_second_level_cat($c_id)) {
                    //$spacer='&nbsp; <span style="opacity:0.5">&raquo;2</span>&nbsp;';
                    $spacer = '<span style="opacity:0.5">&raquo;</span>&nbsp;';
                    $l_margin_style = ' style="padding-left: 11px" ';
                } else {
                    if (is_third_level_cat($c_id)) {
                        //$spacer='&nbsp; &nbsp; <span style="opacity:0.5">&raquo;</span>&nbsp;';
                        $spacer = '<span style="opacity:0.5">&nbsp;&raquo;</span>&nbsp;';
                        $l_margin_style = ' style="padding-left: 22px" ';
                    } else {
                        if (is_fourth_level_cat($c_id) or 1 == 2) {
                            $spacer = '&nbsp; &nbsp; &nbsp; &nbsp; <span style="opacity:0.5;">&nbsp;&nbsp;&raquo;</span>&nbsp;';
                            //$spacer='<span style="opacity:0.5;">&raquo;</span>&nbsp;';
                            //$l_margin_style = ' style="padding-left: 13px" ';
                        }
                    }
                }
            } else {
                $style_str = '';
                if (is_second_level_cat($c_id)) {
                    //$spacer='&nbsp; <span style="opacity:0.5">&raquo;2</span>&nbsp;';
                    $spacer = '<span style="opacity:0.5">&raquo;</span>&nbsp;';
                    $l_margin_style = ' style="padding-left: 11px" ';
                }

                if (is_third_level_cat($c_id) and !is_fourth_level_cat($c_id)) {
                    //$spacer='&nbsp; &nbsp; <span style="opacity:0.5;">&raquo;</span>&nbsp;';
                    $spacer = '<span style="opacity:0.5;">&nbsp;&raquo;</span>&nbsp;';
                    $l_margin_style = ' style="padding-left: 22px" ';
                }

                if (is_fourth_level_cat($c_id)) {
                    $spacer = '&nbsp; &nbsp; &nbsp; &nbsp; <span style="opacity:0.5;">&nbsp;&nbsp;&raquo;</span>&nbsp;';
                    //$spacer='<span style="opacity:0.5;">&raquo;</span>&nbsp;';
                    //$l_margin_style = ' style="padding: 13px" ';
                }

                /*
					if(left($loop,1)=='x' and !is_first_level_cat($c_id) ){
						$style_str= 'style=""';
						$spacer='&nbsp; <span style="opacity:0.5">&raquo;3a</span>&nbsp; ';
						if( this_cat_level()+1==cat_level($c_id) ) {
							$spacer='&nbsp; &nbsp;<span style="opacity:0.5;color:#f00">&raquo;3</span> ';
						}
					}else{
						$style_str= 'style=""';
						$spacer='';

					}
					*/
            }

            //$debug_str = ' '.this_cat_level().'='.cat_level($c_id).' '.full_cPath($c_id).'='.getParam('cPath','').' '.erste_in_cPath().'='.$c_parent_id;
            //$debug_str = full_cPath($c_id).'='.getParam('cPath','');
            //$debug_str = full_cPath($c_id).'='.full_cPath_from_products_id( getParam('products_id','') );


            if ($products_number_in_category_show_in_main_menu) {
                /*
					$str.='<li><a '.$style_str.' href="'.tep_href_link(FILENAME_DEFAULT,$y,'NONSSL',$with_session_id).'"><span>'.$has_sub_str.''.$spacer.$categories_name.$debug_str.
					' <span class="mmenu_nr_pr">('.nuf($c_anz_prod_subcats).')</span> </span></a>';
					*/
                $str .= '<li><a ' . $style_str . ' href="' . tep_href_link(FILENAME_DEFAULT, $y, 'NONSSL', $with_session_id) . '"><div ' . $l_margin_style . '><span>' . $has_sub_str . '' . $spacer . $categories_name . $debug_str .
                    ' <span class="mmenu_nr_pr">(' . nuf($c_anz_prod_subcats) . ')</span> </span></div></a>';


            } else {
                $str .= '<li><a ' . $style_str . ' href="' . tep_href_link(FILENAME_DEFAULT, $y, 'NONSSL', $with_session_id) . '"><span>' . $has_sub_str . '' . $spacer . $categories_name .
                    '</span></a>';
            }

            //if(full_cPath($c_id) == getParam('cPath','') or ( this_cat_level() == cat_level($c_id)  and stristr(full_cPath($c_id),getParam('cPath','').'_')   ) ) {
            //if( full_cPath($c_id) == getParam('cPath','')  or (is_in_cPath(full_cPath_from_products_id( getParam('products_id','') ),$c_id)  )  and getParam('products_id','') ) {
            if (full_cPath($c_id) == getParam('cPath', '') and getParam('cPath', '')) {
                $str .= get_menu_top2('', $c_id, $loop .= 'x');
            } else {
                //if ( ((int)letzte_in_cPath() == (int)$c_id)   ) {
                if ($c_id == erste_in_cPath()) {
                    $str .= get_menu_top2('', $c_id, $loop .= 'x');
                } else {
                    //$str.= '<div style="color:#eee">'.erste_in_cPath().'<>'.$c_id.'</div>';
                    //$str.= get_menu_top2('', $c_id, $loop .= 'x');
                    if ($c_id == vorletzte_in_cPath()) {
                        $str .= get_menu_top2('', $c_id, $loop .= 'x');
                    } else {
                        $str .= '';
                    }
                }
            }
            //or stristr(full_cPath($c_id),getParam('cPath',''))
            //and this_cat_level() == cat_level($c_id)
            $str .= '</li>';
        }
    }
    mysql_free_result($sql_result);
    //$str.='</ul>';
    $str .= '</li>';

    $str = str_replace('<ul></ul>', '', $str);
    //$str= str_ireplace('id=""','',$str);

    return $str;
}


function is_in_cPath($cur_full_cPath, $cat_id)
{

    $t_full_cPath = full_cPath($cat_id);
    $t_cPath_array = explode('_', $t_full_cPath);
    $level = sizeof($t_cPath_array);
    $level = $level - 1;

    $cPath_array = explode('_', $cur_full_cPath);
    $cur_cat = $cPath_array[$level];
    //if ($cur_cat==$cat_id) return true;
    //if ($t_full_cPath==$cur_full_cPath) return true;

    if ($cat_id == $cur_cat) return true;

}

function this_cat_level()
{
    if (getParam('cPath', '')) {
        $full_cPath = getParam('cPath', '');
    } else {
        if (getParam('products_id', '')) {
            $full_cPath = full_cPath_from_products_id(getParam('products_id', ''));
        }

    }
    return substr_count($full_cPath, '_');
}

function cat_level($cat_id)
{
    $full_cPath = full_cPath($cat_id);
    return substr_count($full_cPath, '_');
}


function is_first_level_cat($cat_id)
{
    $full_cPath = full_cPath($cat_id);
    if (stristr($full_cPath, '_')) {
        return false;
    } else {
        return true;
    }
}

function is_second_level_cat($cat_id)
{
    $full_cPath = full_cPath($cat_id);
    $cPath_array = explode('_', $full_cPath);
    if (sizeof($cPath_array) > 1) {
        if ($cPath_array[1] == $cat_id) return true;
    } else {
        return false;
    }
    return false;
}

function is_third_level_cat($cat_id)
{
    $full_cPath = full_cPath($cat_id);
    $cPath_array = explode('_', $full_cPath);
    if (sizeof($cPath_array) > 1) {
        if ($cPath_array[2] == $cat_id) return true;
    } else {
        return false;
    }
    return false;
}

function is_fourth_level_cat($cat_id)
{
    $full_cPath = full_cPath($cat_id);
    $cPath_array = explode('_', $full_cPath);
    if (sizeof($cPath_array) > 1) {
        //$current_category_id = $cPath_array[(sizeof($cPath_array)-2)];
        if ($cPath_array[3] == $cat_id) return true;
    } else {
        return false;
    }
    return false;
}


function is_first_level_cat_full($full_cPath)
{
    //$full_cPath = full_cPath($cat_id);
    if (stristr($full_cPath, '_')) {
        return false;
    } else {
        return true;
    }
}

function is_second_level_cat_full($full_cPath)
{
    //$full_cPath = full_cPath($cat_id);
    $cPath_array = explode('_', $full_cPath);
    if (sizeof($cPath_array) > 1) {
        if ($cPath_array[1] == $cat_id) return true;
    } else {
        return false;
    }
    return false;
}

function is_third_level_cat_full($full_cPath)
{
    //$full_cPath = full_cPath($cat_id);
    $cPath_array = explode('_', $full_cPath);
    if (sizeof($cPath_array) > 1) {
        if ($cPath_array[2] == $cat_id) return true;
    } else {
        return false;
    }
    return false;
}

function is_fourth_level_cat_full($full_cPath)
{
    //$full_cPath = full_cPath($cat_id);
    $cPath_array = explode('_', $full_cPath);
    if (sizeof($cPath_array) > 1) {
        //$current_category_id = $cPath_array[(sizeof($cPath_array)-2)];
        if ($cPath_array[3] == $cat_id) return true;
    } else {
        return false;
    }
    return false;
}


function tooltip($txt, $img = '16', $style = '', $class = 'tip', $width = '', $admin = false, $margin_top = '', $icon = '', $force_width = false)
{
    global $tooltip_help_in_shop_is_active, $admin_quick_icon, $img_url, $tooltip_help_in_checkout_is_active;

    $img = 13;

    $txt = deuml($txt);
    if ((int)$width < 450 and !$force_width) $width = '450px';
//class tip zeigt tip rechts unten
//class tip zeigt tip_lu links unten
    global $tool_tip_icon_13, $tool_tip_icon_16, $help_new_icon10, $help_new_icon13, $help_new_icon16, $help_new_icon20, $help_new_icon30;

    if (is_admin_area() or (is_shop_area() and $tooltip_help_in_shop_is_active) or (is_checkout() and $tooltip_help_in_checkout_is_active)) {

        if ($margin_top <> '') {
            $margin_top_txt = ';top:' . $margin_top;
        } else {
            $margin_top_txt = '';
        }

        //$txt = deuml($txt);

        // default margin bei left = -225
        if ($width <> '') {
            $width = intval($width);
            if ($class == 'tip_lu' or $class == 'tip_lo') {
                $left_magin = (225 + ($width - 225)) * -1;
            } else {
                $left_magin = -5;
            }
        } else {

        }
        if ($icon == '') {

            switch ($img) {

                case '10':
                    $this_tip_icon = $help_new_icon10;
                    break;

                case '13':
                    $this_tip_icon = $help_new_icon13;
                    break;

                case '16':
                    $this_tip_icon = $help_new_icon16; // absichtl. DS
                    break;

                case '20':
                    $this_tip_icon = $help_new_icon20;
                    break;

                case '30':
                    $this_tip_icon = $help_new_icon30;
                    break;

                default:
                    //german
                    $this_tip_icon = $help_new_icon13;
                    break;

            }
        } else {
            $this_tip_icon = $icon;
        }


        $style_add = '';
        if ($style <> '') $style_add = ' style="' . $style . '" ';


        if ($class == 'tip') {
            $x = '
		<span class="' . $class . '" ' . $style_add . '>
		' . $this_tip_icon . '  
		<center  style="line-height:140%;width:' . $width . 'px;left:' . $left_magin . 'px">' . $txt . '</center></span>	';

        } else {
            if ($class == 'tip_lu') {
                $x = '
			<span class="' . $class . '" ' . $style_add . '>
			' . $this_tip_icon . '  
			<center  style="line-height:140%;width:' . $width . 'px;left:' . $left_magin . 'px">' . $txt . '</center></span>	';
            } else {
                //tip_lo
                $x = '
			<span class="' . $class . '"' . $style_add . '>
			' . $this_tip_icon . '  
			<center   style="line-height:140%;width:' . $width . 'px;left:' . $left_magin . 'px' . $margin_top_txt . '">' . $txt . '</center></span>	';


            }

        }

        return $x;
    } else {
        return '<img style="border:none" src="' . $img_url . '/blank.gif" height="16" width="16">';
        //return '';
    }
}

function last_lang_link($last_lang, $new_window = false)
{

//if ($last_lang=='' or $last_lang=='de' or $last_lang=='fr'){
    if ($last_lang == '' or $last_lang == 'de') {
        return '';
    } else {

        if ($new_window) {
            $x = '2';
            $x_title = 'title="new browser-window"';
        } else {
            $x = '';
            $x_title = '';
        }

        //return '<a '.$x_title.' style="font-size:0.8em;color:#009;margin_left:9px" href="javascript:gettranslation_any'.$x.'(\''.$last_lang.'\')">'.transl_lang_short_to_long($last_lang).'</a> || ';
        return '<a ' . $x_title . ' style="font-size:0.8em;margin-right:6px" href="javascript:gettranslation2' . $x . '(\'' . $last_lang . '\')">' . transl_lang_short_to_long($last_lang) . '</a> ';
    }

}

function get_img_size_str($img_path, $what = 3)
{
    /*  [0] => 300
    [1] => 200
    [2] => 2
    [3] => width="300" height="200"
    [bits] => 8
    [channels] => 3
    [mime] => image/jpeg


*/

    if (file_exists($img_path)) {
        $imageinfo = getimagesize($img_path);
        return $imageinfo[$what];
    }
}

function rotateImage($sourceFile, $destImageName, $degreeOfRotation)
{
    //function to rotate an image in PHP
    //get the detail of the image
    $imageinfo = getimagesize($sourceFile);
    switch ($imageinfo['mime']) {
        //create the image according to the content type
        case "image/jpg":
        case "image/jpeg":
        case "image/pjpeg": //for IE
            $src_img = imagecreatefromjpeg("$sourceFile");
            break;
        case "image/gif":
            $src_img = imagecreatefromgif("$sourceFile");
            break;
        case "image/png":
        case "image/x-png": //for IE
            $src_img = imagecreatefrompng("$sourceFile");
            break;
    }
    //rotate the image according to the spcified degree
    $src_img = imagerotate($src_img, $degreeOfRotation, 0);
    //output the image to a file
    //imagejpeg ($src_img,$destImageName);
    imagepng($src_img, $destImageName);
}

function flipVertical(&$img)
{
    $size_x = imagesx($img);
    $size_y = imagesy($img);
    $temp = imagecreatetruecolor($size_x, $size_y);
    $x = imagecopyresampled($temp, $img, 0, 0, 0, ($size_y - 1), $size_x, $size_y, $size_x, 0 - $size_y);
    if ($x) {
        $img = $temp;
    } else {
        die("Unable to flip image");
    }
}

function flipHorizontal(&$img)
{
    $size_x = imagesx($img);
    $size_y = imagesy($img);
    $temp = imagecreatetruecolor($size_x, $size_y);
    $x = imagecopyresampled($temp, $img, 0, 0, ($size_x - 1), 0, $size_x, $size_y, 0 - $size_x, $size_y);
    if ($x) {
        $img = $temp;
    } else {
        die("Unable to flip image");
    }
}

/*
$myimage = imagecreatefromjpeg("psclogo.jpg");
flipHorizontal($myimage);
header("Content-type: image/jpeg");
imagejpeg($myimage);
*/


function nifty_str($obj_zu_runden, $master_key, $key_add = '')
{
//$sub='_round_corners'; $_round_corners = $class_master.$sub;
//global $$_round_corners;
//$GLOBALS["size"]

    $runden = get_dv_bool($master_key . $key_add . '_round_corners');

    if ($runden) {
        $radius = get_dv($master_key . $key_add . '_round_corners_size');
        if ($radius == 'normal') $radius = '';
        $was_runden = get_dv($master_key . $key_add . '_round_corners_style');
        $nifty_str = 'Nifty("' . $obj_zu_runden . '","' . $was_runden . ' ' . $radius . ' ");';
        return $nifty_str;
    } else {
        return '';
        //return $master_key.$key_add.'_round_corners';
    }

}


function get_nifty_str($obj_zu_runden, $apply_to, $if_exists = false)
{
    $runden = get_dv_bool($obj_zu_runden . '_round_corners');

    if ($runden) {
        $radius = get_dv($obj_zu_runden . '_round_corners_size');
        if ($radius == 'normal') $radius = '';
        $was_runden = get_dv($obj_zu_runden . '_round_corners_style');

        if ($if_exists) {
            $nifty_str = "if( $('" . $apply_to . "') ) " . '{Nifty("' . $apply_to . '","' . $was_runden . ' ' . $radius . ' ");}';
        } else {
            $nifty_str = 'Nifty("' . $apply_to . '","' . $was_runden . ' ' . $radius . ' ");';
        }
        return $nifty_str;
    } else {
        return '';

    }

}


function get_header_bg($class_master = 'footer_box', $obj = 'li#one h3', $ht = '24px')
{
    global $css_url;
//$class_master='footer_box';

    $sub = '_bg_color';
    $_bg_color = $class_master . $sub;
    global $$_bg_color;
//global $footer_box_bg_color;

    $sub = '_bg_img';
    $_bg_img = $class_master . $sub;
    global $$_bg_img;
//global $footer_box_bg_img;

    $sub = '_bg_img_offset';
    $_bg_img_offset = $class_master . $sub;
    global $$_bg_img_offset;
//global $footer_box_bg_img_offset;

    $sub = '_use_header';
    $_use_header = $class_master . $sub;
    global $$_use_header;
//global $footer_box_use_header;

    $sub = '_use_img';
    $_use_img = $class_master . $sub;
    global $$_use_img;


    $sub = '_bg_img';
    $_bg_img = $class_master . $sub;
//$bg_img_position = get_dv($$_bg_img);
    $bg_img_position = get_dv($footer_box_bg_img);

    $sub = '_bg_img_offset';
    $_bg_img_offset = $class_master . $sub;
    $bg_img_position_offset_loc = $$_bg_img_offset;
    $bg_img_position_loc = $bg_img_position + $bg_img_position_offset_loc;

    if ($footer_box_use_img) {

        $bg_string = $obj . ' {
height:' . $ht . ';
background: transparent url(' . $css_url . '/bx_head/img3.png) repeat-x top left;
background-position: 0 -' . $bg_img_position_loc . 'px;
}
';
    } else {
        $bg_string = $obj . ' {background: ' . $footer_box_bg_color . ' }';
    }

    return $bg_string;
}


function is_checked($val, $curr_val)
{
    if ($val == $curr_val) {
        return 'checked';
    } else {
        return 'unchecked';
    }
}

function is_checked_f($val, $curr_val)
{
    if ($val == $curr_val) {
        return ' checked="checked" ';
    } else {
        return '';
    }
}


function set_app_top($master_key, $set_to_true = true)
{

    if ($set_to_true) {
        $sql = "update diverses set app_top = '1' where div_what like '" . $master_key . "%'  ";
    } else {
        $sql = "update diverses set app_top = '0' where div_what like '" . $master_key . "%'  ";
    }
    q($sql);

}


function set_app_top_this($div_what, $to_true = true)
{
    if ($to_true) {
        q("update diverses set app_top= '1' where div_what='" . $div_what . "' ");
    } else {
        q("update diverses set app_top= '0' where div_what='" . $div_what . "' ");
    }
}


function make_app_top($key)
{
    $sql = "update diverses set app_top = '1' where div_what = '" . $key . "'  ";
    q($sql);
}


function is_app_top($key)
{
    $sql = "select * from diverses  where div_what = '" . $key . "' and app_top = '1' ";
    if (has_rows($sql)) return true;
}

function dele_app_top_vars($str = '')
{

    if ($str <> '') {
        $sql = "delete from diverses where div_what like  '" . $str . "%' ";
        q($sql);
    }

}

function app_top_vars($str = '')
{

    if (!$str == '') {
        $sql = "SELECT div_what, div_res FROM diverses WHERE  app_top = 1 and div_what like '%" . $str . "%' order by div_what";
    } else {
        $sql = "SELECT div_what, div_res FROM diverses WHERE  app_top = 1 order by div_what";
    }


    $sql_result = q($sql);
    $i = 0;
    $st = '';
    while ($row = mysql_fetch_array($sql_result)) {
        $what = $row["div_what"];
        $res = $row["div_res"];

        $i++;
        $st .= $i . ': ' . $what . ' = ' . $res . '<br>';


    }
    mysql_free_result($sql_result);
    ec_conf($st, $id_add = 'top_vars');
}


function create_master_key($master_key)
{
    insup_dv('master_key_' . $master_key, $master_key);
}

function set_defaults($css, $master_key)
{

    $sql = 'select * from diverses where div_what  like "default' . $css . '_' . $master_key . '%" order by div_what ';
    $res = q($sql);
    $z = mysql_num_rows($res);
    if ($z > 0) {
        while ($row = mysql_fetch_array($res)) {
            $key = $row["div_what"];
            $val = $row["div_res"];
            $real_key = str_replace('default' . $css . '_', '', $key);
            set_dv($real_key, $val);

        }
        mysql_free_result($res);
    } else {
        //keine Daten
    }
}


function get_button($url, $txt, $class = 'col1', $style = '', $title = '', $img = '', $typ = 'href', $col = '', $onclick = '')
{
    global $app_top_cssbutton_color;
    if ($col == '') $col = $app_top_cssbutton_color; // a b c d e e f g h
//typ: // flex, (a, button, input)

    if ($style <> '') {
        $style_txt = ' style="' . $style . '" ';
    } else {
        $style_txt = '';
    }

    if ($title <> '') {
        $title_str = ' title="' . $title . '" ';
    } else {
        $title_str = '';
    }

    if ($img <> '') {
        $img_str = $img . ' ';
    } else {
        $img_str = '';
    }


    if ($onclick <> '') {
        $onclick_str = ' onclick="' . $onclick . '" ';
    } else {
        $onclick_str = '';
    }


    if ($typ == 'flex') {
        $x = '
<div id="button_' . $class . '" ' . $style_txt . '><a ' . $title_str . ' href="' . $url . '">
' . $img_str . $txt . '</a><span></span></div>
';
    }

    if ($typ == 'href') {
        $x = '
<a ' . $title_str . '  href="' . $url . '" ' . $onclick_str . ' class="cssbutton sample ' . $col . '" ' . $style_txt . '><span>' . $img_str . $txt . '</span></a>
';
    }

    if ($typ == 'button') {
        $x = '
<button ' . $onclick_str . ' ' . $title_str . '  class="cssbutton sample ' . $col . '" ' . $style_txt . ' value="#"><span>' . $img_str . $txt . '</span></button>
';
    }

    if ($typ == 'input') {
        $x = '
<div class="cssbutton sample ' . $col . '" ' . $style_txt . '><input ' . $onclick_str . ' ' . $title_str . ' type="submit" value="' . $txt . '"></div>
';
    }


    return $x;
}


function hex2rgb($color, $as_array = false)
{
    if ($color[0] == '#')
        $color = substr($color, 1);

    if (strlen($color) == 6)
        list($r, $g, $b) = array($color[0] . $color[1],
            $color[2] . $color[3],
            $color[4] . $color[5]);
    elseif (strlen($color) == 3)
        list($r, $g, $b) = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    else
        return false;

    $r = hexdec($r);
    $g = hexdec($g);
    $b = hexdec($b);

    if ($as_array) {
        return array($r, $g, $b);
    } else {
        return 'rgb(' . $r . ',' . $g . ',' . $b . ')';
    }
}

function hex2rgba($color, $opacity = 1)
{
    if ($color[0] == '#')
        $color = substr($color, 1);

    if (strlen($color) == 6)
        list($r, $g, $b) = array($color[0] . $color[1],
            $color[2] . $color[3],
            $color[4] . $color[5]);
    elseif (strlen($color) == 3)
        list($r, $g, $b) = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    else
        return false;

    $r = hexdec($r);
    $g = hexdec($g);
    $b = hexdec($b);

    //return array($r, $g, $b);
    return 'rgba(' . $r . ',' . $g . ',' . $b . ',' . $opacity . ')';
}

function rgb2hex($r, $g = -1, $b = -1)
{
    if (is_array($r) && sizeof($r) == 3)
        list($r, $g, $b) = $r;

    $r = intval($r);
    $g = intval($g);
    $b = intval($b);

    $r = dechex($r < 0 ? 0 : ($r > 255 ? 255 : $r));
    $g = dechex($g < 0 ? 0 : ($g > 255 ? 255 : $g));
    $b = dechex($b < 0 ? 0 : ($b > 255 ? 255 : $b));

    $color = (strlen($r) < 2 ? '0' : '') . $r;
    $color .= (strlen($g) < 2 ? '0' : '') . $g;
    $color .= (strlen($b) < 2 ? '0' : '') . $b;
    return '#' . $color;
}


function verlauf_txt($nr, $what = 'text')
{

    switch ($nr) {
        case '1':
            $txt = 'von oben nach unten';
            $folder = "top_dwn";  //  top_dwn
            $v_pos = 'top';
            $h_pos = 'left';
            $repeat = 'repeat-x';
            break;
        case '2':
            $txt = 'von unten nach oben';
            $folder = "bott_up";
            $v_pos = 'bottom';
            $h_pos = 'left';
            $repeat = 'repeat-x';
            break;
        case '3':
            $txt = 'von links nach rechts';
            $folder = "left_right";
            $v_pos = 'top';
            $h_pos = 'left';
            $repeat = 'repeat-y';
            break;
        case '4':
            $txt = 'von rechts nach links';
            $folder = "right_left";
            $v_pos = 'top';
            $h_pos = 'right';
            $repeat = 'repeat-y';
            break;
        default:
            $folder = "bott_up";

    }

    if ($what == 'text') return $txt;
    if ($what == 'folder') return $folder;
    if ($what == 'v_pos') return $v_pos;
    if ($what == 'h_pos') return $h_pos;
    if ($what == 'repeat') return $repeat;


}


function make_bg_string(
    $bg_props_color,
    $bg_props_color_use_img,
    $bg_props_color_img_pos,
    $bg_props_color_img_size,
    $bg_props_color_img_name, $fixed = ''
)
{

    global $css_url;

    $colors = str_replace('.png', '', $bg_props_color_img_name);
    $colors = str_replace('.jpg', '', $colors);

    $col_arr = explode('_', $colors);
    $color1 = $col_arr[0];
    $color2 = $col_arr[1];


    switch ($bg_props_color_img_pos) {
        case '1':
            $folder = "top_dwn";  //  top_dwn
            $v_pos = 'top';
            $h_pos = 'left';
            $repeat = 'repeat-x';
            $bg_color = $color2;
            break;
        case '2':
            $folder = "bott_up";
            $v_pos = 'bottom';
            $h_pos = 'left';
            $repeat = 'repeat-x';
            $bg_color = $color2;
            break;
        case '3':
            $folder = "left_right";
            $v_pos = 'top';
            $h_pos = 'right';
            $repeat = 'repeat-y';
            $bg_color = $color2;
            break;
        case '4':
            $folder = "right_left";
            $v_pos = 'top';
            $h_pos = 'left';
            $repeat = 'repeat-y';
            $bg_color = $color2;
            break;

        default:
            $folder = "bott_up";

    }


    if (!to_bool($bg_props_color_use_img)) {
        $x = 'background-color: ' . $bg_props_color . ';';
    } else {

        $x = 'background: #' . $bg_color . ' url(' . $css_url . '/bgs/' . $folder . '/' . $bg_props_color_img_size . '/' . $bg_props_color_img_name . ') ' . $repeat . ' ' . $v_pos . ' ' . $h_pos . ' ' . $fixed . '; ';

    }

    return $x;

}

function border_style_all($master_key)
{
    $top = get_dv_bool($master_key . '_border_style_top');
    $right = get_dv_bool($master_key . '_border_style_right');
    $bottom = get_dv_bool($master_key . '_border_style_bottom');
    $left = get_dv_bool($master_key . '_border_style_left');

    if (!$top and !$right and !$bottom and !$left) {
        return '';
    } else {
        $x = '';
        if ($top) $x .= 'border-top:none;';
        if ($right) $x .= 'border-right:none;';
        if ($bottom) $x .= 'border-bottom:none;';
        if ($left) $x .= 'border-left:none;';
        return $x;
    }
}


/*
function outer_div_top($header_txt,$class_master,$style='',$float='left',$with_header=true){

if ($with_header){
$display_header = get_dv_bool($class_master.'_use_header');
}else{
$display_header = false;
}

$drop_shadow = get_dv_bool($class_master.'_drop_shadow');
//$drop_shadow = false;

if ($drop_shadow){
 $x='
<div class="ydsf '.$float.'" style="'.$style.'">
<div class="inner">
	<div class="'.$class_master.'_wrapper">
';

if ($display_header){
$x.='<div class="'.$class_master.'_hdr">
			<div class="'.$class_master.'_hdr_txt">'.$header_txt.'</div>
		</div>';
}

}else{
$x='
	<div class="'.$class_master.'_wrapper" style="'.$style.'">
';

if ($display_header){
$x .= '<div class="'.$class_master.'_hdr">
			<div class="'.$class_master.'_hdr_txt">'.$header_txt.'</div>
		</div>
';
}

}

return $x;
}

function outer_div_bott($class_master,$use_content_box=true){
$drop_shadow = get_dv_bool($class_master.'_drop_shadow');
//$drop_shadow =false;

if($use_content_box){
	if ($drop_shadow){
	$x='	</div></div></div>';
	}else{
	$x='	</div>';
	}
}else{
	if ($drop_shadow){
	$x='	</div></div>';
	}else{
	$x='	';
	}

}

return $x;
}
*/

function outer_div_top($header_txt, $class_master, $style = '', $float = 'left', $with_header = true, $force_header = false)
{

    if ($with_header) {
        $display_header = get_dv_bool($class_master . '_use_header');
//$display_header = true;
    } else {
        $display_header = false;
    }

    if ($force_header) $display_header = true;

//$drop_shadow = get_dv_bool($class_master.'_drop_shadow');
    $drop_shadow = false;

    if ($drop_shadow) {
        $x = '
	<div class="ydsf ' . $float . '" style="' . $style . '">
	<div class="inner">
		<div id="' . $class_master . '_wrapper"> 
	';

        if ($display_header) {
            $x .= '<div class="' . $class_master . '_hdr">
					<div class="' . $class_master . '_hdr_txt">' . $header_txt . '</div>
				</div>';
        }

    } else {
        $x = '
			<div class="' . $class_master . '_wrapper" style="' . $style . '"> 
		';

        if ($display_header) {
            $x .= '<div class="' . $class_master . '_hdr">
					<div class="' . $class_master . '_hdr_txt">' . $header_txt . '</div>
				</div>
		';
        }

    }

    return $x;
}

function outer_div_bott($class_master, $use_content_box = true)
{
//$drop_shadow = get_dv_bool($class_master.'_drop_shadow');
    $drop_shadow = false;

    if ($use_content_box) {
        if ($drop_shadow) {
            //$x='	<!--  ydsf --></div><!-- inner  --></div><!-- ...wrapper --></div>';
        } else {
            $x = '	<!-- ...wrapper --></div>';
        }
    } else {
        if ($drop_shadow) {
            //$x='	<!-- ...wrapper --></div></div>';
        } else {
            //$x='	<!-- ds0934  --></div>';
            $x = '	';
        }

    }

    return $x;
}


function modal_bx_link($width = 750)
{
    return ' onclick="Modalbox.show(this.href, {title: this.title, width: ' . $width . '}); return false;" ';
}


function make_box($arr, $header = 'Testtext', $bdr_style = '', $add_end_divs = false)
{
    global $bottom_margin_box_l_r_element;

    if ($add_end_divs) {
        $end_divs = '</div></div>';
    } else {
        $end_divs = '';
    }

    for ($i = 0, $n = sizeof($arr); $i < $n; $i++) {
        $txt .= $arr[$i]['form'];
//$txt .=  $arr[$i]['align'];
        $txt .= $arr[$i]['text'];
    }


    $x = '

<ul class="header_boxes_small"><li>
<h3 style="text-align:left;">' . $header . '</h3>
<div class="bdr" style="' . $bdr_style . '">

' . $txt . '

</div>
</li></ul>' . $end_divs . '
' . $bottom_margin_box_l_r_element;


    return $x;

}


function make_box2($arr, $class_master)
{

    for ($i = 0, $n = sizeof($arr); $i < $n; $i++) {
        $txt .= $arr[$i]['form'];
//$txt .=  $arr[$i]['align'];
        $txt .= $arr[$i]['text'];
    }

    $x = $txt . '</div>' . outer_div_bott($class_master);
    return $x;
}


function get_img_height($img)
{

    list($height, $width) = getimagesize($img);
    return $width;

}

function get_last_update_currencies_timestamp_diff_cat()
{
// 0.0 in Tagen
    $last = get_last_update_currencies_timestamp_cat();
    $jetzt = time();
// Zeitdiff Server und hier
    $server_diff = 60 * 60 * 9;
    $jetzt = $jetzt - $server_diff;
    $diff = $jetzt - $last;

    $sek_pro_tag = 60 * 60 * 24;
    $diff = $diff / $sek_pro_tag;
//$diff = round($diff,1);
    return $diff;
}

function date_from_sql($datestr, $format)
{
    $ts = getTimestampFromSQLDate($datestr);
    return date($format, $ts);

}

function date_from_timestamp($timestamp, $format)
{
    return date($format, $timestamp);
}


function get_last_update_currencies_timestamp_cat()
{
    $resultat = q("SELECT last_updated from currencies limit 1");
    $rad = mysql_fetch_array($resultat);
    $str = $rad["last_updated"];
    $str = getTimestampFromSQLDate($str);
    return $str;
}

function update_currencies_with_percent_cat()
{
    $sql = "select * from currencies ";
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $c_id = $row["currencies_id"];
        $value_ori = $row["value"];
        $adjust_perc = $row["adjust_prozent"];
        if ($adjust_perc <> 0) {
            $adj = (100 - $adjust_perc) / 100;
            $value_calc = $value_ori * $adj;
            $sq2 = "UPDATE currencies set value_calc='" . $value_calc . "', value_ori='" . $value_ori . "', value='" . $value_calc . "'  where  currencies_id =" . $c_id;
            q($sq2);
        } else {
            $sq2 = "UPDATE currencies set value_calc='" . $value_ori . "', value_ori='" . $value_ori . "' where  currencies_id =" . $c_id;
            q($sq2);
        }

    }
    mysql_free_result($sql_result);
}


function quote_oanda_currency_cat($code, $base = DEFAULT_CURRENCY)
{
    //ini_set("allow_url_fopen","1"); // DS http://forums.oscommerce.com/index.php?showtopic=92998&st=0&p=432631&#entry432631
    $page = file('http://www.oanda.com/convert/fxdaily?value=1&redirected=1&exch=' . $code . '&format=CSV&dest=Get+Table&sel_list=' . $base);
    $match = array();
    preg_match('/(.+),(\w{3}),([0-9.]+),([0-9.]+)/i', implode('', $page), $match);
    if (sizeof($match) > 0) {
        return $match[3];
    } else {
        return false;
    }
}

function quote_xe_currency_cat($to, $from = DEFAULT_CURRENCY)
{
    $page = file('http://www.xe.net/ucc/convert.cgi?Amount=1&From=' . $from . '&To=' . $to);
    $match = array();
    preg_match('/[0-9.]+\s*' . $from . '\s*=\s*([0-9.]+)\s*' . $to . '/', implode('', $page), $match);
    if (sizeof($match) > 0) {
        return $match[1];
    } else {
        return false;
    }
}

function update_currencies_catalog($sofort = false)
{
//wenn �lter als 24 Std.
    if (!get_dv_bool('auto_update_currencies')) return '';
    if (get_last_update_currencies_timestamp_diff_cat() > 1 or $sofort) {

        $server_used = 'oanda';
        $currency_query = tep_db_query("select currencies_id, code, title from " . TABLE_CURRENCIES);
        while ($currency = tep_db_fetch_array($currency_query)) {
            $quote_function = 'quote_' . 'oanda' . '_currency';
            //$rate = $quote_function($currency['code']);
            $rate = quote_oanda_currency_cat($currency['code']);

            if (empty($rate) && (tep_not_null('xe'))) {
                $quote_function = 'quote_' . 'xe' . '_currency_cat';
                $rate = $quote_function($currency['code']);

                $server_used = 'xe';
            }
            mysql_free_result($currency_query);
            if (tep_not_null($rate)) {
                tep_db_query("update " . TABLE_CURRENCIES . " set value = '" . $rate . "', last_updated = now() where currencies_id = '" . (int)$currency['currencies_id'] . "'");
            } else {
            }
        }

        update_currencies_with_percent_cat();
        return 'W&auml;hrungen wurden soeben aktualisiert!';
    }
}

function sozeichen_to_x($txt)
{
    $x = str_replace("'", "&#8217;", $txt);
    return $x;

}

/*
function x_to_sozeichen($txt){
$x = str_replace("�","'",$txt);
return $x;
}
*/

function get_prod_is_highlight($products_id)
{
    $products_id = (int)$products_id;
    $sql = "select is_highlight from products where products_id = " . $products_id;
    $res = lookup($sql, 'is_highlight');
    if ($res == '1') {
        return true;
    } else {
        return false;
    }

}

function set_prod_is_highlight($products_id, $value)
{
    $sql = "update products set is_highlight = '" . $value . "' where products_id =  " . $products_id;
    q($sql);
}


function echo_t_key($t_key, $value = '')
{
    if (is_dev()) {
        make_t_key($t_key, $value, false); // kein app_top
        return '<span class="onlydev">' . $t_key . '</span>';
    } else {
        return '';
    }
}

function echo_t_key2($t_key, $value = '')
{
    if (is_dev()) {
        //make_t_key($t_key,$value);
        return '<span class="onlydev">' . $t_key . '</span>';
    } else {
        return '';
    }
}


function max_width()
{
    global $app_top_screenwidth;
    if ($app_top_screenwidth > 0) {
        return $app_top_screenwidth;
    } else {
        return 1000;
    }
}

function max_height()
{
    global $app_top_screenheight;
    if ($app_top_screenheight > 0) {
        return $app_top_screenheight;
    } else {
        return 600;
    }
}


function make_link2($href, $text, $title, $class, $style, $width, $height, $type)
{

// relative URL!
    if (!is_admin_area()) $href = 'admin6093/' . $href;

    /*
type:
bn  Browser normal
bb  Browder _blank
pop   normales javascript popup
il    lightwindow
wx  windows
mo  modal
*/
    if ($type <> 'pop' and $type <> 'mo' and $type <> 'wx') {

        $l = '<a href="';
        $l .= $href . '" ';
        $l .= ' title="' . $title . '" ';

        if ($type == 'il') {
            $l .= ' class="lightwindow ' . $class . '"  params="lightwindow_type=external';
            if ($width > 0) {
                $l .= ',lightwindow_width=' . $width;
            }
            if ($height > 0) {
                $l .= ',lightwindow_height=' . $height;
            }
            $l .= '" ';

        } else { // Browser

            $l .= ' class="' . $class . '" ';
            if ($type == 'bb') {
                $l .= ' target="_blank" ';
            }
        }


        $l .= ' style="' . $style . '" ';
        $l .= '>' . $text . '</a>';

    } else {

        if ($type == 'pop') {
            $l = '<a href="';
            $l .= 'javascript: PopupLarge_sized(\'' . $href . '\',' . $width . ',' . $height . ')' . '" ';
            $l .= ' title="' . $title . '" ';

            $l .= ' style="' . $style . '" ';
            $l .= '>' . $text . '</a>';
        }

        if ($type == 'mo') {
            $l = '<a href="';
            $l .= 'javascript: open_mo(\'' . $href . '\',\'' . $title . '\',' . $width . ',' . $height . ')' . '" ';
            $l .= ' title="' . $title . '" ';

            $l .= ' style="' . $style . '" ';
            $l .= '>' . $text . '</a>';
        }

        if ($type == 'wx') {
            $l = '<a href="';
            $l .= 'javascript: open_wx(\'' . $href . '\',\'' . $title . '\',' . $width . ',' . $height . ')' . '" ';
            $l .= ' title="' . $title . '" ';

            $l .= ' style="' . $style . '" ';
            $l .= '>' . $text . '</a>';
        }


    }
    return $l;
}

function cat_folder()
{
    return DIR_WS_FULL;
}

function admin_folder()
{
    return HTTP_CATALOG_SERVER . DIR_WS_ADMIN;
}


function is_cur_li($cnr, $restore_to)
{

    if ($cnr == $restore_to) {
        return 'id="current"';
    } else {
        return '';
    }


}


function dom_names_options($selected = '')
{
    $str = '


<option value=".com">.com</option>
<option value=".net">.net</option>
<option value=".info">.info</option>
<option value=".org">.org</option>
<option value=".me">.me</option>
<option value=".mobi">.mobi</option>

<option value=".biz">.biz</option>

<option value="">&nbsp;</option>

<option value=".de">.de</option>
<option value=".at">.at</option>
<option value=".eu">.eu</option>
<option value="">&nbsp;</option>


<option value=".us">.us</option>
<option value=".tv">.tv</option>
<option value=".ws">.ws</option>
<option value=".name">.name</option>
<option value=".cc">.cc </option>
<option value=".jobs">.jobs</option>

<option value=".ca">.ca</option>
<option value=".asia">.asia</option>
<option value=".in">.in</option>
<option value=".cn">.cn</option>

<option value="">&nbsp;</option>
<option value=".jp">.jp</option>
<option value=".be">.be</option>
<option value="">&nbsp;</option>

<option value=".ms">.ms</option>
<option value=".nu">.nu</option>
<option value=".tc">.tc</option>
<option value=".tw">.tw</option>
<option value=".co.uk">.co.uk</option>
<option value=".me.uk">.me.uk</option>
<option value=".org.uk">.org.uk</option>
<option value=".vg">.vg</option>

<option value=".co.in">.co.in</option>
<option value=".net.in">.net.in</option>
<option value=".org.in">.org.in</option>
<option value=".firm.in">.firm.in</option>
<option value=".gen.in">.gen.in</option>
<option value=".ind.in">.ind.in</option>

<option value="">&nbsp;</option>		
';

    return $str;

}


function transl_lang_options($selected = '')
{
//<option value="">'.db_tr($definition='AUTO_TRANSL_SELECT_HEADER',$page='general',$from_lang_code='de',$content='Sprache w�hlen').'</option>
    if (is_admin_area()) {
        $select_txt = 'Sprache w&auml;hlen';
    } else {
        $select_txt = db_tr($definition = 'AUTO_TRANSL_SELECT_HEADER', $page = 'general', $from_lang_code = 'de', $content = 'Sprache w�hlen');
    }

    $str = '
<option value="">' . $select_txt . '</option>

<option value="sq">Albanisch</option>
<option value="ar">Arabisch</option>
<option value="bg">Bulgarisch</option>
<option value="zh-TW">Chinesisch (traditionell)</option>
<option value="zh-CN">Chinesisch (vereinfacht)</option>
<option value="da">D�nisch</option>
<option value="de">Deutsch</option>
<option value="en">Englisch</option>
<option value="et">Estnisch</option>
<option value="fi">Finnisch</option>
<option value="fr">Franz�sisch</option>
<option value="gl">Galicisch</option>
<option value="el">Griechisch</option>
<option value="iw">Hebr�isch</option>
<option value="hi">Hindi</option>
<option value="id">Indonesisch</option>
<option value="it">Italienisch</option>
<option value="ja">Japanisch</option>
<option value="ca">Katalanisch</option>
<option value="ko">Koreanisch</option>
<option value="hr">Kroatisch</option>
<option value="lv">Lettisch</option>
<option value="lt">Litauisch</option>
<option value="mt">Maltesisch</option>
<option value="nl">Niederl�ndisch</option>
<option value="no">Norwegisch</option>
<option value="pl">Polnisch</option>
<option value="pt">Portugiesisch</option>
<option value="ro">Rum�nisch</option>
<option value="ru">Russisch</option>
<option value="sv">Schwedisch</option>
<option value="sr">Serbisch</option>
<option value="sk">Slowakisch</option>
<option value="sl">Slowenisch</option>
<option value="es">Spanisch</option>
<option value="tl">Tagalog</option>
<option value="th">Thail�ndisch</option>
<option value="cs">Tschechisch</option>
<option value="tr">T�rkisch</option>
<option value="uk">Ukrainisch</option>
<option value="hu">Ungarisch</option>
<option value="vi">Vietnamesisch</option>

';

    if ($selected <> '') $str = str_replace(' value="' . $selected . '"', ' value="' . $selected . '" selected="selected" ', $str);

    return deuml_html($str);
}


function transl_lang_options_with_selection()
{
    global $app_last_lang; // aus Cookie
    $option_string = transl_lang_options();
    if ($app_last_lang <> '') $option_string = str_replace('value="' . $app_last_lang . '"', 'value="' . $app_last_lang . '" selected="selected"', $option_string);
    return $option_string;

}

function transl_lang_short_to_long($lang)
{

    switch ($lang) {
        case 'sq':
            $return = 'Albanisch';
            break;
        case 'ar':
            $return = 'Arabisch';
            break;

        case 'bg':
            $return = 'Bulgarisch';
            break;

        case 'zh-TW':
            $return = 'Chinesisch (traditionell)';
            break;

        case 'zh-CN':
            $return = 'Chinesisch (vereinfacht)';
            break;

        case 'da':
            $return = 'D�nisch';
            break;

        case 'de':
            $return = 'Deutsch';
            break;

        case 'en':
            $return = 'Englisch';
            break;

        case 'et':
            $return = 'Estnisch';
            break;

        case 'fi':
            $return = 'Finnisch';
            break;

        case 'fr':
            $return = 'Franz�sisch';
            break;

        case 'gl':
            $return = 'Galicisch';
            break;

        case 'el':
            $return = 'Griechisch';
            break;

        case 'iw':
            $return = 'Hebr�isch';
            break;

        case 'hi':
            $return = 'Hindi';
            break;

        case 'id':
            $return = 'Indonesich';
            break;

        case 'it':
            $return = 'Italienisch';
            break;

        case 'ja':
            $return = 'japanisch';
            break;

        case 'ca':
            $return = 'Katalanisch';
            break;

        case 'ko':
            $return = 'Koreanisch';
            break;

        case 'hr':
            $return = 'Kroatisch';
            break;

        case 'lv':
            $return = 'Lettisch';
            break;

        case 'lt':
            $return = 'Litauisch';
            break;

        case 'mt':
            $return = 'Maltesisch';
            break;

        case 'nl':
            $return = 'Niederl�ndisch';
            break;

        case 'no':
            $return = 'Norwegisch';
            break;

        case 'pl':
            $return = 'Polnisch';
            break;

        case 'pt':
            $return = 'Portugiesisch';
            break;

        case 'ro':
            $return = 'Rum�nisch';
            break;

        case 'ru':
            $return = 'Russisch';
            break;

        case 'sv':
            $return = 'Schwedisch';
            break;

        case 'sr':
            $return = 'Serbisch';
            break;

        case 'sk':
            $return = 'Slovakisch';
            break;

        case 'sl':
            $return = 'Slovenisch';
            break;

        case 'es':
            $return = 'Spanisch';
            break;

        case 'tl':
            $return = 'Tagalog';
            break;

        case 'th':
            $return = 'Thail�ndisch';
            break;

        case 'cs':
            $return = 'Tschechisch';
            break;

        case 'tr':
            $return = 'T�rkisch';
            break;

        case 'uk':
            $return = 'Ukrainisch';
            break;

        case 'hu':
            $return = 'Ungarisch';
            break;

        case 'vi':
            $return = 'Vietnamesisch';
            break;
    }
    return strtolower(deuml_html($return));
}


// Generate a password compatible with the htpasswd command
function htpasswd($pass)
{
    $pass = crypt(trim($pass), base64_encode(CRYPT_STD_DES));
    return $pass;
}

function get_EUR_currency_rate()
{
    $sql = "select value_calc from currencies where code = 'EUR'";
    $rate = lookup($sql, 'value_calc');

    if ($rate == 0) {
        $sql = "select value_ori from currencies where code = 'EUR'";
        $rate = lookup($sql, 'value_ori');
    }

    return $rate;
}

function out_file_google_feed()
{
    $out1 = HTTP_CATALOG_SERVER;
    $out1 = str_replace('http://', '', $out1);
    $out1 = str_replace('https://', '', $out1);
    $out1 = str_replace('www', '', $out1);
    $out1 = str_replace('.', '', $out1);
    $out1 = str_replace('/', '_', $out1);
    return $out1;
}

function currency_exists($currency)
{
    $sql = "select * from currencies where code = '" . $currency . "'";
    if (sql_has_record($sql)) {
        return true;
    } else {
        return false;
    }

}


function google_analytics_verification_metatag()
{
    $key = 'google_analytics_verification_metatag';
    $tag = get_dv('google_analytics_verification_metatag');

}


function sess_customer_full_name()
{
    return $_SESSION['customer_first_name'] . ' ' . $_SESSION['customer_last_name'];
}


function is_full_path_url($url)
{
    global $catalog_url;
    if (eregiS($catalog_url, $url)) {

        return true;
    } else {
        if (eregiS('http://', $url) or eregiS('https://', $url)) {
            return true;
        } else {
            return false;
        }
    }
}


function make_link($url, $text, $title, $method, $type = '', $class = '', $style = '')
{
    global $catalog_url;
    $ext = get_ext($url);
    if ($ext <> '') $type = $ext;


    if (substr($url, 0, 1) == '/' or substr($url, 0, 1) == '\\') {
        $url = substr($url, 1, strlen($url));
    }

    if (!is_full_path_url($url)) {
        $url = $catalog_url . $url;
    }


    if ($method == 1) {
        $m = '';
    }
    if ($method == 2) {
        $m = ' target="_blank" ';
    }

    if ($method == 3) {
        if ($type == 'swf') {
            $m = ' class="lightwindow" params="lightwindow_iframe_embed=true" ';
        } else {
            $m = ' class="lightwindow"  ';
        }
    }


    $l = '<a title="' . $title . '" ' . $m . ' href="' . $url . '">' . $text . '</a>';

    return $l;
}


function input_button_goto($url, $txt, $paras = ' class="button3" ', $title = "")
{
    $b = '<input type="button" onclick="goto(\'' . $url . '\')" ' . $paras . ' value="' . $txt . '" title="' . $title . '" />';
    return $b;
}


function get_anz_prod_manuf_cat($categories_id, $manufacturers_id)
{
    $sql = "select count(p.products_id) as total  from products p, products_to_categories ptc 
where p.products_id = ptc.products_id and ptc.categories_id = " . $categories_id . " and 
p.manufacturers_id = " . $manufacturers_id . " and p.products_status = 1 ";

    return lookup($sql, 'total');
}

function get_manuf_name($manufacturers_id)
{
    $sql = "select manufacturers_name from manufacturers where manufacturers_id = " . $manufacturers_id;
    return lookup($sql, 'manufacturers_name');
}

function full_cPath($cat_id)
{
// siehe auch tep_get_path($current_category_id = '')
    $p_id = parent_id_from_categories_id($cat_id);

    if ($p_id > 0) {
        $top_id = parent_id_from_categories_id($p_id);
        if ($top_id > 0) {
            $very_top_id = parent_id_from_categories_id($top_id);
            if ($very_top_id > 0) {
                $str = $very_top_id . '_' . $top_id . '_' . $p_id . '_' . $cat_id;
            } else {
                $str = $top_id . '_' . $p_id . '_' . $cat_id;
            }
        } else {
            $str = $p_id . '_' . $cat_id;
        }
    } else {
        $str = $cat_id;
    }
    return $str;
}

function cat_name_full($cat_id, $use_img = true)
{
    return full_cPath_str($cat_id, $use_img);

}

function full_cPath_str($cat_id, $use_img = true, $separator = ' -> ')
{
// siehe auch tep_get_path($current_category_id = '')
    if ($use_img) {
        global $breadcrumb_devider;
    } else {
        $breadcrumb_devider = $separator;
    }


    $p_id = parent_id_from_categories_id($cat_id);

    if ($p_id > 0) {
        $top_id = parent_id_from_categories_id($p_id);
        if ($top_id > 0) {
            $very_top_id = parent_id_from_categories_id($top_id);
            if ($very_top_id > 0) {
                $str = cat_name($very_top_id) . $breadcrumb_devider . cat_name($top_id) . $breadcrumb_devider . cat_name($p_id) . $breadcrumb_devider . cat_name($cat_id);
            } else {
                $str = cat_name($top_id) . $breadcrumb_devider . cat_name($p_id) . $breadcrumb_devider . cat_name($cat_id);
            }
        } else {
            $str = cat_name($p_id) . $breadcrumb_devider . cat_name($cat_id);
        }
    } else {
        $str = cat_name($cat_id);
    }
    return $str;
}

function full_cPath_str_linked_admin($cat_id, $link_last = false)
{
// siehe auch tep_get_path($current_category_id = '')
// neue funct: cat_name_admin($cat_id)
    global $breadcrumb_devider;
    $p_id = parent_id_from_categories_id($cat_id);
    if ($link_last) {
        if ($p_id > 0) {
            $top_id = parent_id_from_categories_id($p_id);
            if ($top_id > 0) {
                $very_top_id = parent_id_from_categories_id($top_id);
                if ($very_top_id > 0) {
                    $str = link_in_categories($very_top_id) . $breadcrumb_devider . link_in_categories($top_id) . $breadcrumb_devider . link_in_categories($p_id) . $breadcrumb_devider . link_in_categories($cat_id);
                } else {
                    $str = link_in_categories($top_id) . $breadcrumb_devider . link_in_categories($p_id) . $breadcrumb_devider . link_in_categories($cat_id);
                }
            } else {
                $str = link_in_categories($p_id) . $breadcrumb_devider . link_in_categories($cat_id);
            }
        } else {
            $str = link_in_categories($cat_id);
        }

    } else {
        if ($p_id > 0) {
            $top_id = parent_id_from_categories_id($p_id);
            if ($top_id > 0) {
                $very_top_id = parent_id_from_categories_id($top_id);
                if ($very_top_id > 0) {
                    $str = link_in_categories($very_top_id) . $breadcrumb_devider . link_in_categories($top_id) . $breadcrumb_devider . link_in_categories($p_id) . $breadcrumb_devider . cat_name_admin($cat_id);
                } else {
                    $str = link_in_categories($top_id) . $breadcrumb_devider . link_in_categories($p_id) . $breadcrumb_devider . '<u>' . cat_name_admin($cat_id) . '</u>';
                }
            } else {
                $str = link_in_categories($p_id) . $breadcrumb_devider . '<u>' . cat_name_admin($cat_id) . '</u>';
            }
        } else {
            $str = cat_name_admin($cat_id);
        }
    }


    return $str;
}

function link_in_categories($cat_id)
{

//return '<a href="categories.php?cPath='.$cat_id.'&mdSAdminID='. getParam('mdSAdminID','') .'">'.cat_name($cat_id).'</a>';
    return '<a href="categories.php?cPath=' . $cat_id . '">' . cat_name_admin($cat_id) . '</a>';

}


function full_cPath_from_products_id($products_id)
{
    $products_id = (int)$products_id;
    $cat_id = categories_id_from_products_id($products_id);
    return full_cPath($cat_id);
}


function getCommentPath($wintitle = false)
{

    $anz_reviews_cat = anz_reviews_cat();
    if ($anz_reviews_cat == 0) $anz_reviews_cat = 'noch keine';

    if (getParam('products_id', '') or getParam('cPath', '')) {
        if (getParam('cPath', '')) {
            $curr_cat_path = 'cPath=' . getParam('cPath', '');
            $title = $anz_reviews_cat . ' Besucher-Kommentare zu Artikeln in Abt. ' . cat_name(letzte_in_cPath());
        } else {
            $n_id = categories_id_from_products_id(getParam('products_id', ''));
            $curr_cat_path = 'products_id=' . getParam('products_id', '');
            $title = $anz_reviews_cat . ' Besucher-Kommentare zu Artikel ' . get_model_from_id(getParam('products_id', ''));
        }
    } else {
        if (getParam('manufacturers_id', '')) {
            $title = 'Neueste Besucher-Kommentare zu Artikeln von ' . get_manuf_name(getParam('manufacturers_id', ''));
            $curr_cat_path = 'nix=0';

        } else {
            $title = 'Neueste Besucher-Kommentare zu ALLEN Artikeln';
            $curr_cat_path = 'nix=0';
        }
    }
    if ($wintitle) {
        return $title;
    } else {
        return $curr_cat_path;
    }
}


function is_mysql5()
{
    $v = mysql_get_client_info();
    if (substr($v, 0, 1) == '5') {
        return true;
    } else {
        return false;
    }

}

function avail_screen_height($alternative, $reduce = 0)
{
    global $app_top_screenheight;
    if ($app_top_screenheight > 0) {
        return $app_top_screenheight - $reduce;
    } else {
        return $alternative - $reduce;
    }
}

function avail_screen_width($alternative, $reduce = 0)
{
    global $app_top_screenwidth;
    if ($app_top_screenwidth > 0) {
        return $app_top_screenwidth - $reduce;
    } else {
        return $alternative - $reduce;
    }
}


function has_cPath()
{
    if (letzte_in_cPath() == 0 and vorletzte_in_cPath() == 0 and erste_in_cPath() == 0) {
        return false;
    } else {
        return true;
    }
}

/*
function language_script_needed(){
		if (
		curPageName() == 'index.php' or
		curPageName() == 'product_info.php' or
		curPageName() == 'advanced_search_result.php' or
		curPageName() == 'manufacturers.php' or
		curPageName() == 'manufacturers.php' or
		curPageName() == 'manufacturers.php' or
		curPageName() == 'manufacturers.php' or
		curPageName() == 'manufacturers.php'

		){
			return true;
		}else{
			return false;
		}
}
*/
function is_pop_page()
{
    global $use_lw_popups;
    if ($use_lw_popups) {
        if (
            curPageName() == 'account1.php' or
            curPageName() == 'account.php' or
            curPageName() == 'account_history_info.php' or
            curPageName() == 'account_edit.php' or
            curPageName() == 'address_book.php' or
            curPageName() == 'account_password.php' or
            curPageName() == 'account_history.php' or
            curPageName() == 'account_newsletters.php' or
            curPageName() == 'account_notifications.php' or
            curPageName() == 'password_forgotten.php' or
            curPageName() == 'address_book_process.php'

        ) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function BOX_FU_WIDTH()
{
    if (is_pop_page()) {
        return 20;
    } else {
        return BOX_WIDTH;
    }
}

function lw_class($class = '', $w = 0, $h = 0)
{
    global $use_lw_popups;

    if ($w > 0) {
        $w_str = ',lightwindow_width=' . $w . '';
    } else {
        $w_str = '';
    }

    if ($h > 0) {
        $h_str = ',lightwindow_height=' . $h . ' ';
    } else {
        $h_str = '';
    }


    if ($use_lw_popups) {
        return ' class="lightwindow ' . $class . '" params="lightwindow_type=external' . $w_str . $h_str . '" ';
    } else {
        return ' class="' . $class . '" ';
    }
}

function lw_class_intern($class = '')
{
    global $use_lw_popups;
    if ($use_lw_popups) {
        return ' class="lightwindow ' . $class . '" ';
    } else {
        return ' class="' . $class . '" ';
    }
}


function sess_id_pure()
{
    global $SID;
    return str_replace('mdSsid=', '', $SID);
}

function sess_id_full()
{
    global $SID;
    return $SID;
}

function already_in_wishlist($products_id, $customer_id)
{
    $sql = "select * from customers_basket_wishlist where customers_id = " . $customer_id . " and products_id = " . $products_id;
    return sql_has_record($sql);
}

function special_rabatt($regular_price, $special_price)
{
    if ($regular_price > 0 and $special_price > 0) {
        $diff = $regular_price - $special_price;
        $rabatt = round($diff / $regular_price * 100, 0);
        return $rabatt;
    } else {
        return 0;
    }
}


function special_price_str_new($norm_price, $rabatt, $list = false, $products_id)
{
    global $currencies, $app_top_show_specials_calc, $app_top_define_Special_price, $app_top_define_Discount;

    $sql = "select products_tax_class_id from products where products_id = '" . $products_id . "'";
    $products_tax_class_id = lookup($sql, 'products_tax_class_id');


    if ($app_top_show_specials_calc) {
        if ($list) {
            $str = '<div style="text-align:center;margin:0 0 1px 0"><div style="color:#c00;font-size:90%;font-weight:bold;white-space:nowrap">' . $app_top_define_Special_price . '</div><div style="font-size:80%;"><b>' . $rabatt .
                '% </b>' . $app_top_define_Discount . '<br><s><b>' . $currencies->display_price($norm_price, tep_get_tax_rate($products_tax_class_id), 1) . '</b></s><br>' . db_tr($definition = 'GLOBAL_TERM_JETZT_NUR', $page = 'general', $from_lang_code = 'de', $content = 'jetzt nur') . ':</div></div>';
        } else {
            $str = '<div style="text-align:center;margin:0 0 1px 0"><div style="color:#c00;font-size:90%;font-weight:bold">' . $app_top_define_Special_price . '</div><div style="font-size:80%;">' . $rabatt .
                '% ' . $app_top_define_Discount . ' - <s>' . $currencies->display_price($norm_price, tep_get_tax_rate($products_tax_class_id), 1) . '</s>&nbsp;&nbsp; ' . db_tr($definition = 'GLOBAL_TERM_JETZT_NUR', $page = 'general', $from_lang_code = 'de', $content = 'jetzt nur') . ':</div></div>';
        }

    } else {
        //$str=''; // define via DB
        if ($list) {
            $str = '<div style="text-align:center;margin:0 0 1px 0"><div style="color:#c00;font-size:90%;font-weight:bold;white-space:nowrap">' . $app_top_define_Special_price . '</div><div style="font-size:80%;">statt <s><b>' . $currencies->display_price($norm_price, tep_get_tax_rate($products_tax_class_id), 1) . '</b></s></div></div>';
        } else {
            $str = '<div style="text-align:center;margin:0 0 1px 0"><div style="color:#c00;font-size:90%;font-weight:bold">' . $app_top_define_Special_price . '</div><div style="font-size:80%;">statt <s>' . $currencies->display_price($norm_price, tep_get_tax_rate($products_tax_class_id), 1) . '</s></div></div>';
        }


    }

    return $str . make_config_edit_link('wrapper_full.php?incl=includes/quick_config_new/template1.php&use_header=1&item=quick_config_boxes/config_box_product_display_specials.php', $as = 'div', $element = 'Darstellung Sonderpreis bearbeiten', $style = 'margin:-6px 0 0 6px', $in_new_window = false, $add_clearfix = false, $icon_only = true, $icon_size = '12');

}

/*
function special_price_str($norm_price,$rabatt,$list=false){
global $currencies, $app_top_show_specials_calc,$app_top_define_Special_price,$app_top_define_Discount;

$norm_price = $norm_price * 1.076;

if ($app_top_show_specials_calc){
	if ($list){
	$str='<div style="text-align:center;margin:0 0 4px 0"><div style="color:#c00;font-size:90%;font-weight:bold;white-space:nowrap">'.$app_top_define_Special_price.'</div><div style="font-size:80%;"><b>' . $rabatt .
	'% </b>'.$app_top_define_Discount.'<br><s><b>'.$currencies->display_price($norm_price,0).'</b></s><br>'.db_tr($definition='GLOBAL_TERM_JETZT_NUR',$page='general',$from_lang_code='de',$content='jetzt nur').':</div></div>';
	}else{
	$str='<div style="text-align:center;margin:0 0 4px 0"><div style="color:#c00;font-size:90%;font-weight:bold">'.$app_top_define_Special_price.'</div><div style="font-size:80%;">' . $rabatt .
	'% '.$app_top_define_Discount.' - <s>'.$currencies->display_price($norm_price,0).'</s>&nbsp;&nbsp; '.db_tr($definition='GLOBAL_TERM_JETZT_NUR',$page='general',$from_lang_code='de',$content='jetzt nur').':</div></div>';
	}

}else{
	//$str=''; // define via DB
	if ($list){
	$str='<div style="text-align:center;margin:0 0 4px 0"><div style="color:#c00;font-size:90%;font-weight:bold;white-space:nowrap">'.$app_top_define_Special_price.'</div><div style="font-size:80%;">statt <s><b>'.$currencies->display_price($norm_price,0).'</b></s></div></div>';
	}else{
	$str='<div style="text-align:center;margin:0 0 4px 0"><div style="color:#c00;font-size:90%;font-weight:bold">'.$app_top_define_Special_price.'</div><div style="font-size:80%;">statt <s>'.$currencies->display_price($norm_price,0).'</s></div></div>';
	}



}

return $str.make_config_edit_link('wrapper_full.php?incl=includes/quick_config_new/template1.php&use_header=1&item=quick_config_boxes/config_box_product_display_specials.php', $as='div', $element='Darstellung Sonderpreis bearbeiten',$style='margin:-6px 0 0 6px',$in_new_window=false,$add_clearfix=false,$icon_only=true,$icon_size='12');

}
*/

function get_special_price_net($products_id)
{
    $products_id = (int)$products_id;
    $sql = "select specials_new_products_price from specials where  products_id =" . $products_id;
    $anz = sql_has_number_records($sql);
    if ($anz == 0) {
        $p = 0;
    } else {
        $products_price = lookup($sql, 'specials_new_products_price');
        //$sql="select products_tax_class_id from products where products_id = '".$products_id."'";
        //$products_tax_class_id = lookup($sql,'products_tax_class_id');
        $p = $products_price;

    }
    return $p;
}


function get_special_price($products_id)
{
    $products_id = (int)$products_id;
    $sql = "select specials_new_products_price from specials where  products_id =" . $products_id;
    $anz = sql_has_number_records($sql);
    if ($anz == 0) {
        $p = 0;
    } else {
        $products_price = lookup($sql, 'specials_new_products_price');
        $sql = "select products_tax_class_id from products where products_id = '" . $products_id . "'";
        $products_tax_class_id = lookup($sql, 'products_tax_class_id');
        //$p = $products_price;
        $p = tep_add_tax($products_price, tep_get_tax_rate($products_tax_class_id));
        //$p = tep_add_tax($products_price, 7.6);
        //$p = tep_get_tax_rate($products_tax_class_id);
    }
    return $p;
}

function get_normal_price($products_id, $quantity = 1)
{
    $products_id = (int)$products_id;
    $artid = $products_id;
    /*
	$sql="select products_price from products where products_id = '".$products_id."'";
	$products_price = lookup($sql,'products_price');

	$sql="select products_tax_class_id from products where products_id = '".$products_id."'";
	$products_tax_class_id = lookup($sql,'products_tax_class_id');

	$p = tep_add_tax($products_price, tep_get_tax_rate($products_tax_class_id));
*/

    $sql = "select products_price from products where products_id = '" . $artid . "'";
    $products_price = lookup($sql, 'products_price');

    $sql = "select products_tax_class_id from products where products_id = '" . $artid . "'";
    $products_tax_class_id = lookup($sql, 'products_tax_class_id');
    //if ($no_class){
    //return nuf_d(tep_add_tax($products_price, tep_get_tax_rate($products_tax_class_id) ) * $quantity) ;
    //return tep_add_tax($products_price, tep_get_tax_rate($products_tax_class_id) ) * $quantity ;
    //return $products_price;
    //return $products_tax_class_id;
    return tep_add_tax($products_price, tep_get_tax_rate($products_tax_class_id)) . ' (' . tep_get_tax_rate($products_tax_class_id) . ')';
    //return  tep_get_tax_rate($products_tax_class_id) ;

    //}else{
    //	return $currencies->display_price($products_price, tep_get_tax_rate($products_tax_class_id),$quantity);
    //}


//return $p;
}

function get_normal_price_net($products_id, $quantity = 1)
{
    $products_id = (int)$products_id;
    $artid = $products_id;

    $sql = "select products_price from products where products_id = '" . $artid . "'";
    $products_price = lookup($sql, 'products_price');


    return $products_price;
}


function readable_time($timestamp, $num_times = 2)
{
// http://de3.php.net/time
    //this returns human readable time when it was uploaded (array in seconds)
    $times = array(31536000 => 'Jahr', 2592000 => 'Monat', 604800 => 'Woche', 86400 => 'Tag', 3600 => 'Stunde', 60 => 'Minute', 1 => 'Sekunde');
    $now = time();
    $secs = $now - $timestamp;
    $count = 0;
    $time = '';

    foreach ($times AS $key => $value) {
        if ($secs >= $key) {
            //time found
            $s = '';
            $time .= floor($secs / $key);

            if ((floor($secs / $key) != 1))
                $s = 'n';

            $time .= ' ' . $value . $s;
            $count++;
            $secs = $secs % $key;

            if ($count > $num_times - 1 || $secs == 0)
                break;
            else
                $time .= ', ';
        }
    }

    $time = str_replace('Tagn', 'Tagen', $time);
    $time = str_replace('Monatn', 'Monaten', $time);
    $time = str_replace('Jahrn', 'Jahren', $time);


    return $time;
}

//the second paramater is the number of rounds to output. if you put in more than the time allows, it will just show as much as it can
//echo readable_time(time()-(60*60*24*8)-3681, 5) . ' ago<br />';
//echo readable_time(time()-(60*60*24*8)-3681) . ' ago';
function readable_time_dist($timestamp, $num_times = 2)
{
    /*
$timestamp_diff = time() - $timestamp;
$timestamp = time() - $timestamp_diff;

// http://de3.php.net/time
    //this returns human readable time when it was uploaded (array in seconds)
    $times = array(31536000 => 'Jahr', 2592000 => 'Monat',  604800 => 'Woche', 86400 => 'Tag', 3600 => 'Stunde', 60 => 'Minute', 1 => 'Sekunde');
    $now = time();
    $secs = $now - $timestamp;
    $count = 0;
    $time = '';

    foreach ($times AS $key => $value)
    {
        if ($secs >= $key)
        {
            //time found
            $s = '';
            $time .= floor($secs / $key);

            if ((floor($secs / $key) != 1))
                $s = 'n';

            $time .= ' ' . $value . $s;
            $count++;
            $secs = $secs % $key;

            if ($count > $num_times - 1 || $secs == 0)
                break;
            else
                $time .= ', ';
        }
    }

	$time= str_replace('Tagn','Tagen',$time);
	$time= str_replace('Monatn','Monaten',$time);
	$time= str_replace('Jahrn','Jahren',$time);


    return $time;
	*/
    return readable_time_dist_new($timestamp, $num_times = 2);
}

function readable_time_dist_new($timestamp, $num_times = 2)
{
//readable_time_dist( strtotime($guestbook['date_added'])  ,2)
    $timestamp_diff = time() - $timestamp;
    $timestamp = time() - $timestamp_diff;

// http://de3.php.net/time
    //this returns human readable time when it was uploaded (array in seconds)
    $times = array(31536000 => 'Jahr', 2592000 => 'Monat', 604800 => 'Woche', 86400 => 'Tag', 3600 => 'Stunde', 60 => 'Minute', 1 => 'Sekunde');
    $now = time();
    $secs = $now - $timestamp;
    $count = 0;
    $time = '';

    foreach ($times AS $key => $value) {
        if ($secs >= $key) {
            //time found
            $s = '';
            $time .= floor($secs / $key);

            if ((floor($secs / $key) != 1))
                $s = 'n';

            $time .= ' ' . $value . $s;
            $count++;
            $secs = $secs % $key;

            if ($count > $num_times - 1 || $secs == 0)
                break;
            else
                $time .= ', ';
        }
    }
    /*
	$time= str_replace('Tagn','Tagen',$time);
	$time= str_replace('Monatn','Monaten',$time);
	$time= str_replace('Jahrn','Jahren',$time);
*/

    $time = str_replace('Sekunden', GENERAL_SEKUNDEN, $time);
    $time = str_replace('Sekunde', GENERAL_SEKUNDE, $time);

    $time = str_replace('Minuten', GENERAL_MINUTEN, $time);
    $time = str_replace('Minute', GENERAL_MINUTE, $time);

    $time = str_replace('Stunden', GENERAL_STUNDEN, $time);
    $time = str_replace('Stunde', GENERAL_STUNDE, $time);

    $time = str_replace('Tagn', GENERAL_TAGE, $time);
    $time = str_replace('Tag', GENERAL_TAG, $time);
    $time = str_replace('Wochen', GENERAL_WOCHEN, $time);
    $time = str_replace('Woche', GENERAL_WOCHE, $time);
    $time = str_replace('Monatn', GENERAL_MONATE, $time);
    $time = str_replace('Monat', GENERAL_MONAT, $time);
    $time = str_replace('Jahrn', GENERAL_JAHRE, $time);
    $time = str_replace('Jahr', GENERAL_JAHR, $time);


    return $time;
}


function form_date($ts, $type = 3)
{
//http://www.phpbox.de/php_befehle/strftime.php
//Donnerstag 13. Nov. 2008
    /*
%a - Wochentag, abgek�rzt (z.B. "Mon")
%A - Wochentag, ausgeschrieben (z.B. "Monday")
%b - Monat, abgek�rzt (z.B. "Jan")
%B - Monat, ausgeschrieben (z.B. "January")
%c - Vollst�ndige Datum- und Zeitausgabe nach lokalen Einstellungen
%d - Tag des Monats, mit f�hrender Null ("01" bis "31")
%H - Stunde im 24-Stunden-Format ("00" bis "23")
%I - Stunde im 12-Stunden-Format ("01" bis "12")
%j - Tag im Jahr ("001" bis "366")
%m - Monat, ohne f�rhrende Null ("1" bis "12)
%M - Minuten ("0" bis "59")
%p - amerikanische Tageszeit ("am" oder "pm")
%S - Sekunden ("0" bis "59")
%U - Wochennummer, erste Woche beginnt am ersten Sonntag im Jahr
%W - Wochennummer, erste Woche beginnt am ersten Montag im Jahr
%w - Wochentag als Zahl ("0" f�r Sonntag bis "6" f�r Samstag)
%x - Vollst�ndige Datumsausgabe nach lokalen Einstellungen
%X - Vollst�ndige Zeitausgabe nach lokalen Einstellungen
%y - Jahr, zweistellig (z.B. "98")
%Y - Jahr, vierstellig (z.B. "1998")
%Z - Differenz zur Zeitzone in Sekunden

*/

    switch ($type) {
        case 1:
            //Donnerstag 13. November 2008
            $return_str = strftime("%A", $ts) . ' ' . strftime("%d", $ts) . '. ' . strftime("%B", $ts) . ' ' . strftime("%Y", $ts);
            break;
        case 2:
            //Donnerstag 13. Nov. 2008 13:01
            //$return_str = strftime("%A",$ts).' '.strftime("%d",$ts).'. '.strftime("%b",$ts).'. '.strftime("%Y",$ts).' '.strftime("%H",$ts).':00';
            $return_str = strftime("%A", $ts) . ' ' . strftime("%d", $ts) . '. ' . strftime("%b", $ts) . '. ' . strftime("%Y", $ts) . ' ' . strftime("%H", $ts) . ':' . strftime("%M", $ts);
            break;
        case 3:
            //13. Nov. 2008
            $return_str = strftime("%d", $ts) . '. ' . strftime("%b", $ts) . '. ' . strftime("%Y", $ts);
            break;
        case 4:
            //13. Nov. 2008 23:10
            $return_str = strftime("%d", $ts) . '. ' . strftime("%b", $ts) . '. ' . strftime("%Y", $ts) . ' ' . strftime("%H", $ts) . ':' . strftime("%M", $ts);
            break;
        case 5:
            //13.11.2008 23:10
            $return_str = strftime("%d", $ts) . '.' . strftime("%m", $ts) . '.' . strftime("%Y", $ts) . ' ' . strftime("%H", $ts) . ':' . strftime("%M", $ts);
            break;
        case 6:
            //13.11.2008
            $return_str = strftime("%d", $ts) . '.' . strftime("%m", $ts) . '.' . strftime("%Y", $ts);
            break;
        case 7:
            //13.11.08
            $return_str = strftime("%d", $ts) . '.' . strftime("%m", $ts) . '.' . strftime("%y", $ts);
            break;
        case 8:
            //Donnerstag 13. Nov. 08
            $return_str = strftime("%A", $ts) . ' ' . strftime("%d", $ts) . '. ' . strftime("%b", $ts) . '. ' . strftime("%y", $ts);
            break;
        case 9:
            break;
        case 10:
            break;


        case 13:
            //%Z - Differenz zur Zeitzone in Sekunden  = CET
            $return_str = strftime("%Z", $ts);
            break;
        case 14:
            // nach lokalen Einstellungen
            $return_str = strftime("%x", $ts) . ' ' . strftime("%X", $ts);
            break;

    }
    return deuml($return_str);
}

function anz_specials_subcats($cat_id)
{
    /*
$sql="select anz_specials_subcats from categories where categories_id = ".$cat_id;
return lookup($sql,'anz_specials_subcats');
*/
    $sql = "select anz_specials_subcats from categories where categories_id = " . $cat_id;
    return lookup($sql, 'anz_specials_subcats');
}

function page_cat_has_subcats()
{
    if (getParam('cPath', '')) {
        $cat_id = letzte_in_cPath();
        return cat_has_subcats($cat_id);
    } else {
        return false;
    }
}


function cat_has_subcats($cat_id)
{
    $sql = "select categories_id from categories where parent_id = " . $cat_id;
    if (has_rows($sql)) {
        return true;
    } else {
        return false;
    }
}

function cat_has_subcats_array_str($cat_id)
{
    $sql = "select categories_id from categories where parent_id = " . $cat_id;
    if (has_rows($sql)) {
        $arr_str .= $cat_id . ',';
        $sql_result = q($sql);
        while ($row = mysql_fetch_array($sql_result)) {
            $id = $row["categories_id"];
            $arr_str .= $id . ',';
        }

        $arr_str = substr($arr_str, 0, -1);
        return $arr_str;


    } else {
        return $cat_id;
    }
}


function cat_has_subcats_number($cat_id)
{
    $sql = "select categories_id from categories where parent_id = " . $cat_id;
    $res = q($sql);
    return mysql_num_rows($res);
}


function is_parent_cat_without_prods($categories_id)
{
    if ($categories_id <> '') {
        $sql = "select anz_prod, anz_prod_subcats from categories where categories_id = " . $categories_id;
        $anz_prod = lookup($sql, 'anz_prod');
        $anz_prod_subcats = lookup($sql, 'anz_prod_subcats');
        if ($anz_prod == 0 and $anz_prod_subcats > 0) {
            return true;
        } else {
            return false;
        }
    } else {
        return 'noCID';
    }
}

function anz_specials_particular_manuf($manufacturers_id)
{
    $sql = "select count(p.products_id) as total  from products p left join specials s on p.products_id = s.products_id 
where p.manufacturers_id = " . $manufacturers_id . " and s.status = 1 and s.specials_new_products_price > 0  ";
    return lookup($sql, 'total');
}

function anz_specials_particular($cat_id)
{
    return count_specials_in_category($cat_id);
}

function count_specials_in_category($cat_id)
{
    if (is_parent_cat_without_prods($cat_id)) {
        if ($cat_id <> 0) {
            $where = get_arr_to_where($cat_id, 'categories_id', false);
            $sql = "select sum(anz_specials) as total from categories where " . $where;
            return lookup($sql, 'total');
        } else {
            $sql = "select sum(anz_specials) as total from categories "; // alle
            return lookup($sql, 'total');
        }

    } else {
        if ($cat_id <> 0) {
            $sql = "select anz_specials from categories where categories_id = " . $cat_id;
            return lookup($sql, 'anz_specials');
        } else {
            $sql = "select sum(anz_specials) as total from categories ";
            return lookup($sql, 'total');
        }
    }
}


function anz_comments_total()
{
    $sql = "
select count(p.products_id) as total from products p,products_to_categories ptc, categories c , reviews r 
where p.products_id = ptc.products_id and ptc.categories_id = c.categories_id and r.products_id = p.products_id  ";
    return lookup($sql, 'total');
//return $sql;
}


function anz_comments_in_cat($curr_categorie, $incl = true)
{
    $get_arr_to_where = get_arr_to_where($curr_categorie, 'ptc.categories_id', $incl);
    $sql = "
select count(p.products_id) as total from products p,products_to_categories ptc, categories c , reviews r 
where p.products_id = ptc.products_id and ptc.categories_id = c.categories_id and r.products_id = p.products_id 
and " . $get_arr_to_where;
    return lookup($sql, 'total');
//return $sql;
}

function anz_comments_in_cat_manuf($manufacturers_id)
{

    $sql = "
select count(p.products_id) as total from products p, reviews r 
where r.products_id = p.products_id  and p.manufacturers_id = " . $manufacturers_id . " ";
    return lookup($sql, 'total');
//return $sql;
}


function anz_star_ratings_in_cat($curr_categorie, $incl = true)
{
    $get_arr_to_where = get_arr_to_where($curr_categorie, 'ptc.categories_id', $incl);
    $sql = "
select count(r.star_rating_avrg) as total from products p,products_to_categories ptc, categories c , ratings r 
where p.products_id = ptc.products_id and ptc.categories_id = c.categories_id and r.products_id = p.products_id 

and " . $get_arr_to_where;
//and r.star_rating_avrg > 0
    return lookup($sql, 'total');
}

function anz_star_ratings_in_cat_manuf($manufacturers_id)
{

    $sql = "
select count(r.star_rating_avrg) as total from products p, ratings r 
where r.products_id = p.products_id 
and p.manufacturers_id = " . $manufacturers_id . " and r.star_rating_avrg > 0  ";
//and r.star_rating_avrg > 0
    return lookup($sql, 'total');
//return $sql;
}


function anz_sold_products_in_cat_manuf($manufacturers_id)
{
    global $app_top_show_bestseller_even_if_zero,
           $app_top_show_bestsellers_on_indexpage_only_w_img,
           $app_top_show_bestsellers_on_indexpage_only_w_price_above;

    if ($app_top_show_bestsellers_on_indexpage_only_w_img) {
        $with_img = ' and p.products_image <> \'no_picture.gif\' ';
    } else {
        $with_img = '';
    }

    if ($app_top_show_bestseller_even_if_zero) {
        $min_bestseller = -1;
    } else {
        $min_bestseller = 0;
    }

    $sql = "
select count(p.products_ordered) as total1 from products p 
where p.manufacturers_id = " . $manufacturers_id . " 
and p.products_ordered > " . $min_bestseller . " 
and p.products_price > " . $app_top_show_bestsellers_on_indexpage_only_w_price_above . " " . $with_img . " ";

    return lookup($sql, 'total1');
}


function get_sql_bestseller_startpage()
{

    global $app_top_show_bestseller_even_if_zero,
           $app_top_show_bestsellers_on_startpage,
           $app_top_max_number_bestsellers_on_startpage,
           $app_top_show_bestsellers_on_startpage_only_w_img,
           $app_top_show_bestsellers_on_startpage_only_w_price_above,
           $max_number_all_prods_on_startpage_and_incls,
           $show_bestseller_on_allpages_only_w_img,
           $show_bestseller_on_allpages_only_w_price_above,
           $bestseller_text,
           $app_top_show_bestsellers_on_indexpage,
           $app_top_max_number_bestsellers_on_indexpage,
           $app_top_show_bestsellers_on_indexpage_only_w_img,
           $app_top_show_bestsellers_on_indexpage_only_w_price_above;

    if ($app_top_show_bestsellers_on_startpage_only_w_img) {
        $with_img = ' and p.products_image <> \'no_picture.gif\' ';
    } else {
        $with_img = '';
    }

    if ($app_top_show_bestseller_even_if_zero) {
        $min_bestseller = -1;
    } else {
        $min_bestseller = 0;
    }

    $sql = "
	select p.products_id, p.products_model, p.products_image, p.products_largeimage, p.products_ordered, p.products_tax_class_id, 
	s.status, s.specials_new_products_price, p.products_price, p.products_date_added , p.products_ordered
	from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s 
	on p.products_id = s.products_id 
	where products_status = '1' 
	and p.products_price > " . $app_top_show_bestsellers_on_startpage_only_w_price_above . "  "
        . " and s.specials_new_products_price > " . $app_top_show_bestsellers_on_startpage_only_w_price_above . " 
	or s.specials_new_products_price = 0 
	 "
        . $with_img_start_page . "
	and p.products_ordered > " . $min_bestseller . "
	order by p.products_ordered desc  limit " . $app_top_max_number_bestsellers_on_startpage;

    return $sql;
}


function get_sql_bestseller_allpages($is_manuf = false)
{
    global $app_top_show_bestseller_even_if_zero,
           $app_top_show_bestsellers_on_startpage,
           $app_top_max_number_bestsellers_on_startpage,
           $app_top_show_bestsellers_on_startpage_only_w_img,
           $app_top_show_bestsellers_on_startpage_only_w_price_above,
           $max_number_all_prods_on_startpage_and_incls,
           $show_bestseller_on_allpages_only_w_img,
           $show_bestseller_on_allpages_only_w_price_above,
           $bestseller_text,
           $app_top_show_bestsellers_on_indexpage,
           $app_top_max_number_bestsellers_on_indexpage,
           $app_top_show_bestsellers_on_indexpage_only_w_img,
           $app_top_show_bestsellers_on_indexpage_only_w_price_above;


    if ($is_manuf) {
        $manuf_where = ' and p.manufacturers_id = ' . $manuf_id . ' ';
    } else {
        $manuf_where = '';
    }

    if ($app_top_show_bestsellers_on_indexpage_only_w_img) {
        $with_img = ' and p.products_image <> \'no_picture.gif\' ';
    } else {
        $with_img = '';
    }

    if ($app_top_show_bestseller_even_if_zero) {
        $min_bestseller = -1;
    } else {
        $min_bestseller = 0;
    }

    $sql = "	select distinct p.products_id,p.products_model, p.products_image, p.products_largeimage, p.products_tax_class_id, s.status, 
	s.specials_new_products_price, p.products_price , p.products_date_added, p.products_ordered
	from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s 
	on p.products_id = s.products_id, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c 
	where p.products_id = p2c.products_id and p2c.categories_id = c.categories_id  
	and " . $sub_cats_where . "
	 p.products_ordered > " . $min_bestseller . "  " . $manuf_where . "
	and p.products_status = '1' and p.products_price > " . $app_top_show_bestsellers_on_indexpage_only_w_price_above . " "
        . " and s.specials_new_products_price > " . $app_top_show_bestsellers_on_indexpage_only_w_price_above . " 
	or s.specials_new_products_price = 0
	 "
        . $with_img . " 
	order by p.products_ordered desc limit " . $max_number_all_prods_on_startpage_and_incls;

    return $sql;
}


function anz_sold_products_in_cat($curr_categorie, $incl = true)
{ // true wenn incl dieser cat_id
    global $app_top_show_bestseller_even_if_zero,
           $app_top_show_bestsellers_on_indexpage_only_w_img,
           $app_top_show_bestsellers_on_indexpage_only_w_price_above;

    $get_arr_to_where = get_arr_to_where($curr_categorie, 'ptc.categories_id', $incl);

    if ($app_top_show_bestsellers_on_indexpage_only_w_img) {
        $with_img = ' and p.products_image <> \'no_picture.gif\' ';
    } else {
        $with_img = '';
    }

    if ($app_top_show_bestseller_even_if_zero) {
        $min_bestseller = -1;
    } else {
        $min_bestseller = 0;
    }

    $sql = "
select count(p.products_ordered) as total1 from products p,  products_to_categories ptc, categories c 
where p.products_id = ptc.products_id and ptc.categories_id = c.categories_id  
and p.products_ordered > " . $min_bestseller . " 
and p.products_price > " . $app_top_show_bestsellers_on_indexpage_only_w_price_above . " " . $with_img . "  
and " . $get_arr_to_where;


    return lookup($sql, 'total1');
}

function get_arr_to_where($categories_id, $fieldname = 'ptc.categories_id', $incl = true)
{

    if ($categories_id <> 0) {
        $get_subcats_with_products = get_subcats_with_products($categories_id, $incl); // true wenn incl dieser cat_id

        if ($get_subcats_with_products <> '') {
            $sub_cats_where = arr_to_where($fieldname, $get_subcats_with_products);
            return $sub_cats_where;
        } else {
            return ' (1=1) '; // tritt nicht ein wenn  $incl==true
        }
    } else {
        return ' (1=1) ';
    }
}

function cat_has_specials($cat_id)
{
    $sql = "select anz_specials from categories where categories_id =  " . $cat_id;
    $anz = lookup($sql, 'anz_specials');
    if ($anz == 0) {
        return false;
    } else {
        return true;
    }
}

function total_specials()
{
    $sql = "select sum(anz_specials) as total from categories ";
    return lookup($sql, 'total');
}

function total_products()
{
//$sql="select sum(anz_prod) as total from categories ";
//return lookup($sql,'total');
    $sql = "select * from products where products_status = 1 ";
    return anz_records($sql);
}


function anz_votes_this_prod($products_id)
{
    $products_id = (int)$products_id;
    $sql = "select star_rating_total from ratings where products_id =  " . $products_id;
    $anz = sql_has_number_records($sql);
    if ($anz == 0) {
        $res = 0;
    } else {
        $res = lookup($sql, 'star_rating_total');
    }
    return $res;
}

function has_votes_this_prod($products_id)
{
    $products_id = (int)$products_id;
    $sql = "select star_rating_total from ratings where products_id =  " . $products_id;
    $anz = sql_has_number_records($sql);
    if ($anz == 0) {
        return false;
    } else {
        return true;
    }

}


function avrg_votes_this_prod($products_id)
{
    $products_id = (int)$products_id;
    $sql = "select star_rating_avrg from ratings where products_id =  " . $products_id;
    $anz = sql_has_number_records($sql);
    if ($anz == 0) {
        $res = 0;
    } else {
        $res = lookup($sql, 'star_rating_avrg');
    }
    return $res;
}


function reviews_text($reviews_id)
{
    $sql = "select reviews_text from reviews_description where reviews_id = " . $reviews_id;
    $txt = lookup($sql, 'reviews_text');
    $txt = nl2br($txt);
    return $txt;
}

function anz_reviews($products_id)
{
    $products_id = (int)$products_id;
    $sql = "select count(reviews_id) as total from reviews where entry_status = 1 and   products_id= " . $products_id;
    return lookup($sql, 'total');
}

function anz_reviews_cat()
{

    if (getParam('cPath', '')) {
        $categories_id = letzte_in_cPath();
        $get_arr_to_where = get_arr_to_where($categories_id, 'categories_id', true);
        $sql = "select count(reviews_id) as total from reviews where entry_status = 1 and  " . $get_arr_to_where;
        return lookup($sql, 'total');
    } else {

        if (getParam('products_id', '')) {
            return anz_reviews(getParam('products_id', ''));
        } else {
            return 0;
        }

    }

}


function anz_reviews_total()
{
    $sql = "select count(reviews_id) as total from reviews where entry_status = 1 ";
    return lookup($sql, 'total');
}

function anz_guestbook_entries_total()
{
    $sql = "select count(entry_id) as total from guestbook where entry_status = 1 ";
    return lookup($sql, 'total');
}

function anz_star_ratings_total()
{
    $sql = "select count(ratings_id) as total from ratings ";
    return lookup($sql, 'total');
}


function is_checkout()
{
    if (substr(basename($_SERVER['PHP_SELF']), 0, 8) == 'checkout' or curPageName() == 'shopping_cart.php') {
        return true;
    } else {
        return false;
    }
}

function is_customers_admin()
{
    $curPageName = curPageName();
    if (
        $curPageName == 'account.php'
        or $curPageName == 'account1.php'
        or $curPageName == 'account_edit.php'
        or $curPageName == 'account_history.php'
        or $curPageName == 'account_history_info.php'
        or $curPageName == 'account_newsletter.php'
        or $curPageName == 'account_notifications.php'
        or $curPageName == 'account_password.php'
        or $curPageName == 'address_book.php'
        or $curPageName == 'advanced_search.php'
        or $curPageName == 'tell_a_friend.php'
        or $curPageName == 'password_forgotten.php'

    ) {

        return true;
    } else {
        return false;
    }
}

function server_time_diff()
{
//return get_config('TIME_ZONE_OFFSET');
    $diff = intval(get_conf('TIME_ZONE_OFFSET'));

//return intval(app_time_zone_offset());

    /*
if (get_dv_bool('app_now_is_sommerzeit')) {
return 9;
}else{
return 8;
}
*/
}

function local_time()
{
//return time() + (server_time_diff()*60*60);
    return time();
}

function local_time_sql()
{
//$ts =  time() + (server_time_diff()*60*60);
    $ts = time();

    return date('Y-m-d H:i:s', $ts);
}


function eintrag_cron_log2($txt = '')
{
    $this_date = date('d.m.Y H:i:s', (time() + (server_time_diff() * 60 * 60)));
    set_dv('cron_log', $this_date);
    set_dv_l('cron_log', $txt);

}

function product_listing_display($prod_name, $prod_descr = '')
{
    $show_both = get_dv_bool('prodlist_show_prod_name_and_description');
    $trunc_at = get_dv('prodlist_description_trunc_at');
    $trunc_at = (int)$trunc_at;

    if ($prod_name <> $prod_descr) {
        if ($show_both) {
            if ($trunc_at > 0) {
                //$short_descr = dotString($prod_descr,$trunc_at);
                $short_descr = $prod_descr;
            } else {
                $short_descr = $prod_descr;
            }

            $disp_str = '
		<div style="margin-bottom:8px">
		' . $prod_name . '
		</div>' . $short_descr;

        } else {
            $disp_str = $prod_name;
        }
    } else {
        $disp_str = '<b>' . $prod_name . '</b>';
    }
    return $disp_str;
}


function categorie_has_child($cat_id = 0)
{

    $sql = "select parent_id from categories where parent_id =   " . $cat_id;
    $anz = anzahl_records($sql);
    if ($anz > 0) {
        return true;
    } else {
        return false;
    }

}


function parent_id_from_categories_id($cat_id = 0)
{
    if ($cat_id <> '') {
        $sql = "select parent_id from categories where categories_id =   " . $cat_id;
        return lookup($sql, 'parent_id');
    } else {
        return 'noCID';
    }
}

function letzte_in_cPath($cPath = '')
{
    if ($cPath == '') {
        if (getParam('cPath', '')) {
            $cPath = getParam('cPath', '');
            $cPath_array = explode('_', $cPath);
            $current_category_id = $cPath_array[(sizeof($cPath_array) - 1)];

        } else {
            $current_category_id = 0;
        }
    } else {
        $cPath_array = explode('_', $cPath);
        $current_category_id = $cPath_array[(sizeof($cPath_array) - 1)];
    }
    return $current_category_id;
}

function vorletzte_in_cPath($cPath = '')
{
    if ($cPath == '') {
        if (getParam('cPath', '')) {
            $cPath = getParam('cPath', '');
            $cPath_array = explode('_', $cPath);
            if (sizeof($cPath_array) > 1) {
                $current_category_id = $cPath_array[(sizeof($cPath_array) - 2)];
            } else {
                $current_category_id = $cPath_array[(sizeof($cPath_array) - 1)];
            }
        } else {
            $current_category_id = 0;
        }
    } else {
        $cPath_array = explode('_', $cPath);
        if (sizeof($cPath_array) > 1) {
            $current_category_id = $cPath_array[(sizeof($cPath_array) - 2)];
        } else {
            $current_category_id = $cPath_array[(sizeof($cPath_array) - 1)];
        }

    }

    return $current_category_id;
}


function erste_in_cPath($cPath = '')
{
    if ($cPath == '') {
        if (getParam('cPath', '')) {
            $cPath = getParam('cPath', '');
            $cPath_array = explode('_', $cPath);
            $current_category_id = $cPath_array[0];

        } else {
            $current_category_id = 0;
        }
    } else {
        $cPath_array = explode('_', $cPath);
        $current_category_id = $cPath_array[0];
    }

    return $current_category_id;
}


function get_subcats_with_products($cat_id = 0, $incl = false)
{
    $sql = "select * from categories where parent_id = " . $cat_id;
    $res = q($sql);
    $cat_str = '';
    while ($row = mysql_fetch_array($res)) {
        $this_cat = $row["categories_id"];
        if (cat_has_products($this_cat)) $cat_str .= $this_cat . ',';
        // 2. Ebene
        $sql2 = "select * from categories where parent_id = " . $this_cat;
        $res2 = q($sql2);
        while ($row = mysql_fetch_array($res2)) {
            $this_cat2 = $row["categories_id"];
            if (cat_has_products($this_cat2)) $cat_str .= $this_cat2 . ',';
            // 3. Ebene
            $sql3 = "select * from categories where parent_id = " . $this_cat2;
            $res3 = q($sql3);
            while ($row = mysql_fetch_array($res3)) {
                $this_cat3 = $row["categories_id"];
                if (cat_has_products($this_cat3)) $cat_str .= $this_cat3 . ',';
                // 4. Ebene
                $sql4 = "select * from categories where parent_id = " . $this_cat3;
                $res4 = q($sql4);
                while ($row = mysql_fetch_array($res4)) {
                    $this_cat4 = $row["categories_id"];
                    if (cat_has_products($this_cat4)) $cat_str .= $this_cat4 . ',';
                }
            }
        }
    }
    mysql_free_result($res);
    if (!$incl) {
        return substr($cat_str, 0, -1);
    } else {
        if (strlen($cat_str) > 0) {
            return $cat_id . ',' . substr($cat_str, 0, -1);
        } else {
            return $cat_id;
        }
    }
}

function arr_to_where($fieldname, $values)
{
// values zB: 98,161,200,534,1279
// (fieldname = 111 or fieldname = 222 or fieldname = 333)
    $t_arr = explode(',', $values);
    $ret_str = '(';
    for ($i = 0, $n = sizeof($t_arr); $i < $n; $i++) {
        $ret_str .= $fieldname . '=' . $t_arr[$i] . ' OR ';
    }
    $ret_str = substr($ret_str, 0, -3);
    $ret_str .= ')';
    return $ret_str;
}


function week($year, $week)
{
//strtotime() accepts ISO week date format (for example "2008-W27-2" is Tuesday of week 27 in 2008)
//echo week(2008,27);
//Returns: Week 27 in 2008 is from 2008-06-30 to 2008-07-06.
    $from = date("Y-m-d", strtotime("{$year}-W{$week}-1")); //Returns the date of monday in week
    $to = date("Y-m-d", strtotime("{$year}-W{$week}-7")); //Returns the date of sunday in week
    return "Week {$week} in {$year} is from {$from} to {$to}.";
}

function anz_sonderangebote()
{
    $sql = "select count(*) as total from specials";
    return lookup($sql, 'total');
}

function begin_month_ts($para)
{
//$para = '9,2008'
    $dat = explode(',', date($para));
    $first = mktime(0, 0, 0, $dat[0], 1, $dat[1]);
    return $first;
}

function end_month_ts($para)
{
//$para = '9,2008'
    $dat = explode(',', date($para));
    $last = mktime(23, 59, 59, $dat[0] + 1, 0, $dat[1]);
    return $last;
}

function begin_month_sql($para)
{
//$para = '9,2008'
    $dat = explode(',', date($para));
    $first = mktime(0, 0, 0, $dat[0], 1, $dat[1]);
    return date('Y-m-d H:i:s', $first);
}

function end_month_sql($para)
{
//$para = '9,2008'
    $dat = explode(',', date($para));
    $last = mktime(23, 59, 59, $dat[0] + 1, 0, $dat[1]);
    return date('Y-m-d H:i:s', $last);
}

function month_offset($para)
{
// 0 = dieser Mon, -1 Vormonat, +1 n�chster Mon
    $para = (int)$para;
    $this_monat = (int)date("n");

    if ($para == 0) return $this_monat;

    if ($para > 0) {
        $new_mon = $this_monat + $para;
        if ($new_mon > 12) $new_mon = $new_mon - 12;
        return $new_mon;
    }

    if ($para < 0) {
        $new_mon = $this_monat + $para; // ist ja bereits negativ
        if ($new_mon < 1) $new_mon = $new_mon + 12;
        return $new_mon;
    }
}

function year_offset($para)
{
    $para = (int)$para;
    $this_year = (int)date("Y");
    return $this_year + $para;

}


function monats_name($para)
{
// 0 = dieser Mon, -1 Vormonat, +1 n�chster Mon
    $monate = array(
        1 => ll("Januar"),
        2 => ll("Februar"),
        3 => ll("M&auml;rz"),
        4 => ll("April"),
        5 => ll("Mai"),
        6 => ll("Juni"),
        7 => ll("Juli"),
        8 => ll("August"),
        9 => ll("September"),
        10 => ll("Oktober"),
        11 => ll("November"),
        12 => ll("Dezember"));

    if ($para <> 0) {
        $monat1 = strtotime($para . " months");
    } else {
        $monat1 = time();
    }
    $monat = date("n", $monat1);
    return $monate[$monat];
}

function monats_name_plain($para)
{
// 0 = dieser Mon, -1 Vormonat, +1 n�chster Mon
    $monate = array(
        1 => ll("Januar"),
        2 => ll("Februar"),
        3 => ll("M&auml;rz"),
        4 => ll("April"),
        5 => ll("Mai"),
        6 => ll("Juni"),
        7 => ll("Juli"),
        8 => ll("August"),
        9 => ll("September"),
        10 => ll("Oktober"),
        11 => ll("November"),
        12 => ll("Dezember"));

    if ($para <> 0) {
        $monat1 = strtotime($para . " months");
    } else {
        $monat1 = time();
    }
    $monat = date("n", $monat1);
    return $monate[$para];
}


function format_datetime($str, $format)
{
    $timestamp = strtotime($str);
    return date($format, $timestamp);
}

function browser_counter()
{
    global $browser;
    create_table_browser();
    $user_browser = $browser;

    $sql = "select * from browser where browser ='" . $user_browser . "' ";
    $anz = number_rows_from_sql($sql);
    if ($anz == 0) {
        $sql = "insert into browser set browser = '" . $user_browser . "', views=1";
        q($sql);
    } else {
        $sql = "update browser set views= views+1 where browser = '" . $user_browser . "' ";
        q($sql);
    }

}


function this_value_individual_gutschein($code)
{
    $sql = "select * from coupons where code = '" . $code . "' and type = 'm' and used = 0 order by id limit 1 ";
    $total = 0;
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $this_customers_id = $row["customers_id"];
        $this_code = $row["code"];
        $discount = $row["discount"];
        $enddate = $row["enddate"];

        $d = $enddate;
        $xx = getTimestampFromSQLDate($d);
        $jetzt = time();

        if ($jetzt < $xx) {
            $total += $discount;
        }

    }
    return $total;
}


function total_value_individual_gutschein($customers_id)
{
    $sql = "select * from coupons where customers_id = '" . $customers_id . "' and type = 'm' and used = 0 ";
    $total = 0;
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $this_customers_id = $row["customers_id"];
        $this_code = $row["code"];
        $discount = $row["discount"];
        $enddate = $row["enddate"];

        $d = $enddate;
        $xx = getTimestampFromSQLDate($d);
        $jetzt = time();

        if ($jetzt < $xx) {
            $total += $discount;
        }

    }
    return $total;
}


function anzahl_individual_gutschein($customers_id)
{
    $sql = "select * from coupons where customers_id = '" . $customers_id . "' and type = 'm' and used = 0 ";
    return anzahl_records($sql);
}


function we_have_an_individual_gutschein($customers_id)
{
//zun�cht nur generell einen Gutscheine finden !!
    $sql = "select * from coupons where customers_id = '" . $customers_id . "' and type = 'm' and used = 0 ";
    if (anzahl_records($sql) > 0) {
        $sql_result = q($sql);
        while ($row = mysql_fetch_array($sql_result)) {
            $this_customers_id = $row["customers_id"];
            $this_code = $row["code"];
            $enddate = $row["enddate"];
        }
        if ($customers_id == $this_customers_id) {
            $d = $enddate;
            $xx = getTimestampFromSQLDate($d);
            $jetzt = time();

            if ($jetzt < $xx) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}


function entered_promo_code_is_individual_gutschein($code)
{
    $code = trim($code);
    //Auslaufdateum checken
    $sql = "select * from coupons where code = '" . $code . "' and type = 'm'  and used = 0 ";
    if (anzahl_records($sql) > 0) {

        $sql_result = q($sql);
        while ($row = mysql_fetch_array($sql_result)) {
            $this_code = $row["code"];
            $enddate = $row["enddate"];
        }
        if ($code == $this_code) {
            $d = $enddate;
            $xx = getTimestampFromSQLDate($d);
            $jetzt = time();

            if ($jetzt < $xx) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function we_have_a_general_promo_code()
{
//ist aktiviert und Datum noch g�ltig
    global $coup_akt_is_active, $coup_akt_end_date;
    $is_active = to_bool($coup_akt_is_active);
    if ($is_active) {
        //$d = get_dv('coup_akt_end_date');
        $d = $coup_akt_end_date;
        $xx = getTimestampFromSQLDate($d);
        $jetzt = time();

        if ($jetzt < $xx) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function this_general_promo_code_is_still_valid($code)
{
//ist aktiviert und Datum noch g�ltig
    global $coup_akt_is_active, $coup_akt_end_date, $coup_akt_code;
    $is_active = to_bool($coup_akt_is_active);
    if ($is_active) {
        //$d = get_dv('coup_akt_end_date');
        $d = $coup_akt_end_date;
        $xx = getTimestampFromSQLDate($d);
        $jetzt = time();

        if ($jetzt < $xx) {
            if ($code == $coup_akt_code) {
                return true;
            } else {
                return false;
            }


        } else {
            return false;
        }
    } else {
        return false;
    }
}


function get_curr_valid_promo_code()
{
    global $coup_akt_code, $coup_akt_end_date, $coup_akt_is_active;
    $curr_promo_code = $coup_akt_code;
    $curr_promo_enddate = $coup_akt_end_date;
    $curr_promo_is_active = to_bool($coup_akt_is_active);
    $curr_promo_enddate_ts = strtotime($curr_promo_enddate);

    if ($curr_promo_enddate_ts >= time()) {
        $still_valid = true;
    } else {
        $still_valid = false;
    }

    if ($still_valid and $curr_promo_is_active) {
        return $curr_promo_code;
    } else {
        return 'nix???14614';
    }

}

function curr_promo_code_is_for_cats()
{
    global $coup_akt_valid_cats;
    if (we_have_a_general_promo_code()) {
        $curr_cats = trim($coup_akt_valid_cats);
        if ($curr_cats <> '') {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function curr_promo_code_is_for_manufs()
{
    global $coup_akt_valid_manufs;
    if (we_have_a_general_promo_code()) {
        $curr_manufs = trim($coup_akt_valid_manufs);
        if ($curr_manufs <> '') {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

/*
function get_curr_promo_code_cats_array(){
	$curr_cats = trim(get_dv('coup_akt_valid_cats'));
	$curr_cats_arr = explode($curr_cats,',');
	return $curr_cats_arr;
}

function get_curr_promo_code_manufs_array(){
	$curr_manufs = trim(get_dv('coup_akt_valid_manufs'));
	$curr_manufs_arr = explode($curr_manufs,',');
	return $curr_manufs_arr;
}
*/


function is_promo_code_item($products_id)
{
    global $coup_akt_valid_cats, $coup_akt_valid_manufs;

    if (we_have_a_general_promo_code()) {
        $cat_id = categories_id_from_products_id($products_id);

        $full_cPath = full_cPath($cat_id);
        $cPath_array = explode('_', $full_cPath); // erste in cPath
        $current_category_id = $cPath_array[0];

        $manuf_id = get_manufacturers_id_from_products_id($products_id);

        $allowed_array_cats = explode(',', $coup_akt_valid_cats);
        $allowed_array_manufs = explode(',', $coup_akt_valid_manufs);

        if (in_array($current_category_id, $allowed_array_cats) or in_array($manuf_id, $allowed_array_manufs)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


function create_table_browser()
{

}


function protocheck_possible()
{
    global $browser;
    if ($browser == 'mozilla') {
        return true;
    } else {
        return false;
    }
}


function zero_to_max($max)
{
//google charts y axis
// anz rows in y  = 7
    $anzr = (int)$max / (7 * 100);
    $anzr = 7;
    $devisor = $max / $anzr;
    $devisor = floor((int)$devisor / 100);
    $devisor = $devisor * 100;

    if ($devisor == 0) $devisor = 1;

    $max = $max / $devisor;
    $max = ceil($max);
    settype($max_array, "array");
    $max_str = '';
    for ($i = 0; $i < $max; $i++) {
        $max_str .= $i * $devisor . ',';
    }
    $max_str = substr($max_str, 0, -1);
    $max_array = explode(',', $max_str);
    return $max_array;
}


function get_payment_class($oID)
{
    $sql = "select payment_class from orders where orders_id = '" . $oID . "' ";
    return lookup($sql, 'payment_class');
}

function currency()
{
    return get_conf('DEFAULT_CURRENCY');
}


function cur_lv()
{
    if (file_exists('includes/application_top.php')) {
        $lv = '';
    } else {
        if (file_exists('../includes/application_top.php')) {
            $lv = '../';
        } else {
            if (file_exists('../../includes/application_top.php')) {
                $lv = '../../';
            } else {
                //echo 'Nesting > 2 (../../) too deep';
            }
        }
    }
    return $lv;
}


function valid_coupon_code($customers_id, $what)
{
    $anz_tage = easy_coupons_settings('days');
    $auslf_date_ts = strtotime("-" . $anz_tage . " day");
//return date("Y-m-d H:i:s",time() );
    $auslf_date = date("Y-m-d", $auslf_date_ts);
    /*
$sql="
select

ot.orders_id,
ot.class,
o.customers_id,
o.date_purchased,
c.code, c.enddate, c.orders_id_issued, c.discount, c.type

from (orders o, orders_total ot, coupons c)

where (o.orders_id = ot.orders_id
	and o.orders_id = c.orders_id_issued
	and o.customers_id = '".$customers_id."'
	and ot.class='ot_easy_discount'
	and c.used = 0
	and c.enddate > '".$auslf_date."' )

order by o.date_purchased desc limit 1
";
*/
//	and ot.class='ot_easy_discount'

    $sql = "select orders_id from orders where customers_id = " . $customers_id . " order by orders_id desc limit 1 ";
    $last_order_id = lookup($sql, 'orders_id');

//ec('LastOrderID: '.$last_order_id);
    if ($last_order_id <> 0 and $last_order_id <> '') {
        $sql = "select * from coupons where orders_id_issued = " . $last_order_id;


        //ec('SQL: '.$sql);

        $valid_tage_end = lookup($sql, 'enddate');
        $valid_tage_ts = strtotime($valid_tage_end);
        $now_ts = time();
        $valid_secs = $now_ts - $valid_tage_ts;
        $valid_days = floor($valid_secs / (60 * 60 * 24)) * -1;

        $end_date = lookup($sql, 'enddate');


        $end_date_ts = strtotime($end_date);
        $end_date = date("d.m.Y", $end_date_ts);
        $wtag = wochentag($end_date);

        $date_purchased_ts = $end_date_ts - (60 * 60 * 24 * easy_coupons_settings('days'));
        $date_purchased = date("d.m.Y", $date_purchased_ts);

        if ($what == 'best_datum') return $date_purchased;

        if ($what == 'code') return lookup($sql, 'code');
        if ($what == 'valid_tage') return $valid_days;
        if ($what == 'end_date') return $wtag . ', ' . $end_date;
        if ($what == 'orders_id_issued') return lookup($sql, 'orders_id_issued');
        if ($what == 'discount') return lookup($sql, 'discount');
        if ($what == 'type') return lookup($sql, 'type');
    }
}

function easy_discount_display()
{
    //not in use
    global $currencies, $easy_discount;
    $discount = '';
    if ($easy_discount->count() > 0) {
        $easy_discounts = $easy_discount->get_all();
        $n = sizeof($easy_discounts);
        for ($i = 0; $i < $n; $i++) {
            $discount .= '<tr><td align="right" style="font-size:11px;font-family:arial,sans_serif">' . $easy_discounts[$i]['description'] . ':<br><font color="#c00"><b>- ' . $currencies->format($easy_discounts[$i]['amount']) . '</b></font></td></tr>';
        }
    }
    return $discount;
}

function easy_discount_display_2()
{
    //in use
    global $currencies, $easy_discount, $coup_akt_type, $coup_akt_value, $cart;
    $discount = '';
    if ($easy_discount->count() > 0) {

        //if(curr_promo_code_is_for_cats() or curr_promo_code_is_for_manufs()){
        if (curr_promo_code_is_for_cats() or curr_promo_code_is_for_manufs() or entered_promo_code_is_individual_gutschein($_SESSION['couponcode']['code'])) {

            if (entered_promo_code_is_individual_gutschein($_SESSION['couponcode']['code'])) {
                //ec(__line__.': '.trim($_SESSION['couponcode']['code']) );
                $discount_amount = this_value_individual_gutschein($_SESSION['couponcode']['code']);
                //$this_sum = $cart->show_total() - $easy_discount_total;
            } else {
                $products = $cart->get_products();

                for ($i = 0, $n = sizeof($products); $i < $n; $i++) {
                    if (is_promo_code_item($products[$i]['id'])) {
                        $products_tax_class_id = lookup('select products_tax_class_id from products where products_id = ' . (int)$products[$i]['id'], 'products_tax_class_id');
                        $tax_rate = tep_get_tax_rate($products_tax_class_id);
                        $brutto_price = $products[$i]['final_price'] + ($products[$i]['final_price'] * $tax_rate / 100);
                        //$discount_amount += ($brutto_price * $coup_akt_value / 100);
                        if ($coup_akt_type == 2) {
                            $discount_amount += ($brutto_price * $coup_akt_value / 100);
                        } else {
                            $discount_amount = $coup_akt_value;
                        }
                    }
                }
            }
            $easy_discounts = $easy_discount->get_all();
            $n = sizeof($easy_discounts);
            for ($i = 0; $i < $n; $i++) {
                $discount .= '' . $easy_discounts[$i]['description'] . ': <font color="#a22"><b>- ' . $currencies->format($discount_amount) . '</b></font>';
            }

        } else {


            $easy_discounts = $easy_discount->get_all();
            $n = sizeof($easy_discounts);
            for ($i = 0; $i < $n; $i++) {
                $discount .= '' . $easy_discounts[$i]['description'] . ': <font color="#a22"><b>- ' . $currencies->format($easy_discounts[$i]['amount']) . '</b></font>';
            }
        }

    }
    return $discount;
}


function easy_discount_display_3()
{
    //in use
    global $currencies, $easy_discount, $coup_akt_type, $coup_akt_value, $cart;
    $discount = '';
    if ($easy_discount->count() > 0) {

        /*
	$easy_discounts = $easy_discount->get_all();
	$n = sizeof($easy_discounts);
	for ($i=0;$i < $n; $i++) {
	   $discount .= ''.$easy_discounts[$i]['description'].':<br><font color="#00c"><b>- ' . $currencies->format($easy_discounts[$i]['amount']).'</b></font>';
	}
*/
        if (curr_promo_code_is_for_cats() or curr_promo_code_is_for_manufs() or entered_promo_code_is_individual_gutschein($_SESSION['couponcode']['code'])) {
            if (entered_promo_code_is_individual_gutschein($_SESSION['couponcode']['code'])) {
                //ec(__line__.': '.trim($_SESSION['couponcode']['code']) );
                $discount_amount = this_value_individual_gutschein($_SESSION['couponcode']['code']);
                //$this_sum = $cart->show_total() - $easy_discount_total;
            } else {
                $products = $cart->get_products();

                for ($i = 0, $n = sizeof($products); $i < $n; $i++) {
                    if (is_promo_code_item($products[$i]['id'])) {
                        $products_tax_class_id = lookup('select products_tax_class_id from products where products_id = ' . (int)$products[$i]['id'], 'products_tax_class_id');
                        $tax_rate = tep_get_tax_rate($products_tax_class_id);
                        $brutto_price = $products[$i]['final_price'] + ($products[$i]['final_price'] * $tax_rate / 100);
                        if ($coup_akt_type == 2) {
                            $discount_amount += ($brutto_price * $coup_akt_value / 100);
                        } else {
                            $discount_amount = $coup_akt_value;
                        }
                    }
                }
            }
            $easy_discounts = $easy_discount->get_all();
            $n = sizeof($easy_discounts);
            for ($i = 0; $i < $n; $i++) {
                $discount .= '' . $easy_discounts[$i]['description'] . ':<br><font color="#00c"><b>- ' . $currencies->format($discount_amount) . '</b></font>';
            }

        } else {


            $easy_discounts = $easy_discount->get_all();
            $n = sizeof($easy_discounts);
            for ($i = 0; $i < $n; $i++) {
                $discount .= '' . $easy_discounts[$i]['description'] . ':<br><font color="#00c"><b>- ' . $currencies->format($easy_discounts[$i]['amount']) . '</b></font>';
            }
        }


    }
    return $discount;
}


// my_cat_functions
//http://phpshield.com/php_encoder/buy_php_encoder.php
/*
Magische Konstanten
http://de.php.net/manual/de/language.constants.predefined.php
__LINE__
__FILE__
__DIR__
__FUNCTION__
__CLASS__
__METHOD__
__NAMESPACE__

$send_time = time();
//ec($send_time);
$sql = "select * from newsletter_jobs
		where 1=1 AND job_is_active = 1 AND num_sent < to_be_send AND UNIX_TIMESTAMP(start_mailing) <= ".$send_time."
		ORDER BY job_id asc";


string basename ( string $path [, string $suffix ] )
Given a string containing a path to a file, this function will return the base name of the file.

string dirname ( string $path )
*/
/*

*/
function is_admin_area()
{
    //if ( eregiX(ADMIN_FOLDER, curPageURL() ) and  eregiS(CAT_FOLDER, curPageURL() ) ) {
    if (stristr(curPageURL(), ADMIN_FOLDER) and stristr(curPageURL(), CAT_FOLDER)) {
        return true;
    } else {
        return false;
    }
}

function is_shop_area()
{
    //if ( !eregiS(ADMIN_FOLDER, curPageURL() )  and  eregiS(CAT_FOLDER, curPageURL() ) ) {
    if (!stristr(curPageURL(), ADMIN_FOLDER) and stristr(curPageURL(), CAT_FOLDER)) {
        return true;
    } else {
        return false;
    }
}


function is_dev()
{
    global $application_is_in_dev_mode, $application_shop_is_in_dev_mode, $app_admin_is_in_dev_mode;
//global $kaspersky_is_active;

//if($kaspersky_is_active) return true;

//if (is_mydotter() or 1==1 ){
// split user/pass parts
    list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = explode(':', base64_decode(substr($_SERVER['HTTP_AUTHORIZATION'], 6)));
//}

//ADMIN_FOLDER
//if ( md5($_SERVER['PHP_AUTH_USER'])=='34c336827b750ba10a020fd62ec4664f' or !isset($_SERVER['PHP_AUTH_USER']) ) {
//if ( md5($_SERVER['PHP_AUTH_USER'])=='34c336827b750ba10a020fd62ec4664f' or md5($_SERVER['PHP_AUTH_USER'])=='$1$3VFQj9RP$lv5h4KyZbtMGqp8fPe.iC/' ) {
    //$my4711_1stein
    if ($_SERVER['PHP_AUTH_PW'] == '$my4711_1stein' or $_SERVER['PHP_AUTH_PW'] == 'my4711_1s' or $_SERVER['PHP_AUTH_PW'] == 'my4711_1stein') {
        if (eregiS('/admin', curPageURL())) {
            return $application_is_in_dev_mode;
            //return true;
        } else {
            //return $application_shop_is_in_dev_mode;
            return $application_is_in_dev_mode;
            //return true;
        }

    } else {
        //return false;

        if (eregiS('/catalog/', curPageURL())) {
            //return $application_is_in_dev_mode;
            //return $application_shop_is_in_dev_mode;
            //if ( md5($_SERVER['PHP_AUTH_USER'])=='34c336827b750ba10a020fd62ec4664f'  ){
            if ((tep_session_is_registered('customer_id') and sess_customer_full_name() == 'Dieter Schnabel' and $app_admin_is_in_dev_mode)) {
                //return $app_admin_is_in_dev_mode ;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

}

function is_dev_admin()
{
    global $application_is_in_dev_mode;
    return $application_is_in_dev_mode;
}


function is_demo()
{
    return get_dv_bool('application_is_in_demo_mode');
}

function remove_newlines($str)
{
    return preg_replace("/[\n\r]/", "", $str);;
}


function remove_spaces($str)
{
//$str = 'foo   o';
// Das ist jetzt 'foo o'
    $str = preg_replace('/\s\s+/', ' ', $str);
    return $str;
}


function get_email_vorlage($vorlage, $lang)
{
    $file_full_path = DIR_FS_CATALOG . DIR_WS_LANGUAGES . $lang . '/sd_emails/' . $vorlage;
    if (file_exists($file_full_path)) {
        $this_template = get_text_from_path($file_full_path);
    } else {
        $file_full_path = DIR_FS_CATALOG . DIR_WS_LANGUAGES . 'german' . '/sd_emails/' . $vorlage;
        $this_template = get_text_from_path($file_full_path);
    }

    if ($vorlage <> 'email_order_confirm_kunde.htm') {
        // bei Order Conf abh�ngig von Konfig
        if (get_dv_bool('email_werbung_block_show')) {
            $this_template = str_replace('##email_werbung_block##', get_text_block('email_werbung_block.htm', $lang), $this_template); // todo long
        } else {
            $this_template = str_replace('##email_werbung_block##', '', $this_template); // todo long
        }

        if (get_dv_bool('outgoing_emails_show_open_time')) {
            $lang_code = lookup('select code from languages where directory = "' . $lang . '" ', 'code');
            $open_time_content_str = get_dv_long_lang2_or_german('open_time_content', $lang_code);
            //$open_time_content = '<div style="padding:3px 12px;border:1px #ccc solid;background:#eee;font-size:10px;margin:10px 16px;color:#333">'.get_dv_l('open_time_content').'</div>';
            $open_time_content = '<div style="padding:3px 12px;border:1px #ccc solid;background:#eee;font-size:10px;margin:10px 16px;color:#333">' . $open_time_content_str . '</div>';
            $this_template = str_replace('##opentime##', $open_time_content, $this_template);
        } else {
            $this_template = str_replace('##opentime##', '', $this_template); // todo long
        }
    }
    return $this_template;
}

function make_all_replacements($this_template, $lang)
{

//$email_logo_src = shop_url_long().'/catalog/myuploads_hidden/corp_logo/email_logo.gif';
    $email_logo_src = HTTP_CATALOG_SERVER . '/catalog/myuploads_hidden/corp_logo/email_logo.png';

//$email_logo_src = str_replace('https://','http://',$email_logo_src );

    $email_logo = '<img src="' . $email_logo_src . '" />';
    $this_template = str_replace('#email_logo#', $email_logo, $this_template);

    $this_template = str_replace('#language#', $this_lang, $this_template);
    //$this_template = str_replace('#css_color_header#', curr_stylesheet_color('color'), $this_template);
    //$this_template = str_replace('#css_no#', curr_stylesheet_no(), $this_template);
    //$this_template = str_replace('#css_background_body#', curr_stylesheet_color('hintergrund'), $this_template);
    //$this_template = str_replace('#css_background_header#', curr_stylesheet_color('background'), $this_template);
    //$this_template = str_replace('#background_img_top#', DIR_WS_FULL.'css'.curr_stylesheet_no().'/img/tile_sub.gif', $this_template);

    //$this_template = str_replace('#url_full#', shop_url_long(), $this_template);
    $this_template = str_replace('#url_full#', HTTP_CATALOG_SERVER, $this_template);
    $this_template = str_replace('#email_shop#', store_email(), $this_template);
    $this_template = str_replace('#shop_name#', store_name(), $this_template);
    $this_template = str_replace('$shop_name$', store_name(), $this_template);

    $this_template = str_replace('#ip_adresse#', ip_adr(), $this_template);

    $this_template = str_replace('#http_host#', shop_url_long(), $this_template);

    //$this_template = str_replace('#url_short#', $url_short, $this_template);
    //$email_head_adr = get_dv_l('email_head_adr');
    $email_head_adr = '';
    $this_template = str_replace('#email_head_adr#', $email_head_adr, $this_template);

    //$this_template = str_replace('#url_short#', strtolower(str_replace('http://','',HTTP_CATALOG_SERVER)), $this_template);
    //shop_url_short()
    $this_template = str_replace('#url_short#', shop_url_short(), $this_template);
    $this_template = str_replace('#order_phone#', get_dv('order_phone'), $this_template);
    $this_template = str_replace('#telefon_shop#', get_dv('order_phone'), $this_template);

    //$this_template = str_replace('##email_werbung_block##', get_text_block('email_werbung_block.htm',$this_lang), $this_template); // todo long
    //$this_template = str_replace('##opentime##', get_dv_l('open_time_content'), $this_template);


    //$this_template = str_replace('##email_bankverbindung_block##', get_text_block('email_bankverbindung_block.htm',$this_lang), $this_template); // todo

    //$this_template = str_replace('##email_couponcode_block##', get_text_block('email_couponcode_block.htm',$this_lang), $this_template);

    //$this_template = remove_newlines($this_template);

    return $this_template;
}

function ip_adr()
{
    return $_SERVER['REMOTE_ADDR'];
}

function get_text_block($blockname, $lang)
{
    $curr_file = DIR_FS_CATALOG . DIR_WS_LANGUAGES . $lang . '/sd_emails/' . $blockname;
    if (file_exists($curr_file)) {
        return get_text_from_path($curr_file);
    } else {
        $curr_file = DIR_FS_CATALOG . DIR_WS_LANGUAGES . 'german/sd_emails/' . $blockname;
        return get_text_from_path($curr_file);
    }
}

function get_this_allgem_email($block, $lang)
{
    $block_htm = $block . '.htm';
    $this_template = get_email_vorlage('email_allgem.htm', $lang);
    $this_block = get_text_block($block_htm, $lang);
    $this_template = str_replace('#msg#', $this_block, $this_template);
    //$this_topic = get_dv($block.'_topic_'.$lang);
    $lang_code = lookup('select code from languages where directory = "' . $lang . '"', 'code');
    $this_topic = get_dv_lang2_or_german($block . '_topic', $lang_code);

    //if (trim($this_topic)=='' or $this_topic=='0') $this_topic = get_dv($block.'_topic_'.'german');
    $this_template = str_replace('#topic#', $this_topic, $this_template);
    $this_template = make_all_replacements($this_template, $lang);

    return $this_template;
}

function get_this_allgem_email_pure($lang)
{
    //$block_htm = $block.'.htm';
    $this_template = get_email_vorlage('email_allgem.htm', $lang);
    //$this_block = get_text_block($block_htm,$lang);
    //$this_template = str_replace('#msg#',$this_block,$this_template);
    //$this_topic = get_dv($block.'_topic_'.$lang);
    //if (trim($this_topic)=='' or $this_topic=='0') $this_topic = get_dv($block.'_topic_'.'german');
    //$this_template = str_replace('#topic#',$this_topic,$this_template);
    $this_template = make_all_replacements($this_template, $lang);

    return $this_template;
}


function get_this_allgem_email_empty($block, $lang)
{
    $block_htm = $block . '.htm';
    $this_template = get_email_vorlage('email_allgem.htm', $lang);
    $this_block = get_text_block($block_htm, $lang);
    //$this_template = str_replace('#msg#',$this_block,$this_template);
    //$this_topic = get_dv($block.'_topic_'.$lang);
    $lang_code = lookup('select code from languages where directory = "' . $lang . '"', 'code');
    $this_topic = get_dv_lang2_or_german($block . '_topic', $lang_code);
    //if (trim($this_topic)=='' or $this_topic=='0') $this_topic = get_dv($block.'_topic_'.'german');
    $this_template = str_replace('#topic#', $this_topic, $this_template);
    $this_template = make_all_replacements($this_template, $lang);

    return $this_template;
}

function get_this_allgem_email_subject($block, $lang)
{
    //$this_subject = get_dv($block.'_subject_'.$lang);
    $lang_code = lookup('select code from languages where directory = "' . $lang . '"', 'code');
    $this_subject = get_dv_lang2_or_german($block . '_subject', $lang_code);
    /*
		if (trim($this_subject)=='' or $this_subject=='0') $this_subject = get_dv($block.'_subject_'.'german');
		$this_subject = trim($this_subject);
		$this_subject = nl2br($this_subject);
		$this_subject = str_replace('<br>','',$this_subject);
*/
    return $this_subject;
}

function lang_code_from_short_lang($lang)
{
    $sql = "select code from languages where directory = '" . $lang . "' ";
    return lookup($sql, 'code');
}


function get_order_conf_email_subject($lang)
{

    //$sql="select div_res from diverses where div_what = '".'email_order_conf_subject_'.$lang."' ";
    $lang = lang_code_from_short_lang($lang);
    if ($lang == 'de' or $lang == '') {
        $sql = "select div_res from diverses where div_what = 'email_order_conf_subject' ";
        $this_subject = lookup($sql, 'div_res');
    } else {
        $sql = "select div_res_" . $lang . " from diverses where div_what = 'email_order_conf_subject' ";
        $this_subject = lookup($sql, 'div_res_' . $lang);
    }

    /*
		if (sql_has_record($sql)) {
			//$this_subject = get_dv('email_order_conf_subject_'.$lang);
			//if (trim($this_subject)=='' or $this_subject=='0') $this_subject = get_dv('email_order_conf_subject_german');


		}else{
			//$sql="insert into diverses  set div_what = '".'email_order_conf_subject_'.$lang."', div_res = '". get_dv('email_order_conf_subject_german') ."' ";
			//q($sql);
			$this_subject = get_dv('email_order_conf_subject_'.$lang);
			if (trim($this_subject)=='' or $this_subject=='0') $this_subject = get_dv('email_order_conf_subject_german');
		}
			$this_subject = trim($this_subject);
			$this_subject = nl2br($this_subject);
			$this_subject = str_replace('<br>','',$this_subject);

	//$this_subject = get_dv('email_order_conf_subject');
*/
    return $this_subject;
}

function sql_has_record($sql)
{
    $res = q($sql);
    $anz = mysql_num_rows($res);
    if ($anz > 0) {
        return true;
    } else {
        return false;
    }
}

//auch: has_records($sql)

function anz_records($sql)
{
    $res = q($sql);
    $anz = mysql_num_rows($res);
    return $anz;
}

function num_row($sql)
{
    return anz_records($sql);
}

function sql_has_number_records($sql)
{
    return anz_records($sql);
}

function anzahl_records($sql)
{
    return anz_records($sql);
}


function more_than_one_lang()
{
    $sql = "select * from languages where status = 1 ";
    $anz = sql_has_number_records($sql);
    if ($anz == 1) {
        return false;
    } else {
        return true;
    }
}

function get_order_conf_email($lang)
{
    global $app_easy_coupons, $app_easy_coupons_indiv;
    $this_template = get_email_vorlage('email_order_confirm_kunde.htm', $lang);

    $block_htm = 'email_bankverbindung_block.htm';
    $this_block = get_text_block($block_htm, $lang);
    $this_template = str_replace('##email_bankverbindung_block##', $this_block, $this_template);

    $block_htm = 'email_couponcode_block.htm';
    $this_block = get_text_block($block_htm, $lang);
    if ($app_easy_coupons and $app_easy_coupons_indiv) {
        $this_template = str_replace('##email_couponcode_block##', $this_block, $this_template);
    } else {
        $this_template = str_replace('##email_couponcode_block##', '', $this_template);
    }
    $this_template = make_all_replacements($this_template, $lang);
    return $this_template;
}

function customers_email_by_c_id($customers_id)
{
    $x = 'customers_email_address';
    $sql = "select " . $x . " from customers where customers_id='" . $customers_id . "' ";
    return lookup($sql, $x);
}

function customers_password_by_id($customers_id)
{
    $x = 'customers_password';
    $sql = "select " . $x . " from customers where customers_id='" . $customers_id . "' ";
    return lookup($sql, $x);
}

function customers_firstname_by_customers_id($customers_id)
{
    $x = 'customers_firstname';
    $sql = "select " . $x . " from customers where customers_id='" . $customers_id . "' ";
    return lookup($sql, $x);
}

function customers_lastname_by_customers_id($customers_id)
{
    $x = 'customers_lastname';
    $sql = "select " . $x . " from customers where customers_id='" . $customers_id . "' ";
    return lookup($sql, $x);
}

function customers_fullname_by_customers_id($customers_id)
{
    $x = customers_firstname_by_customers_id($customers_id) . ' ' . customers_lastname_by_customers_id($customers_id);
    return $x;
}

function customers_email_by_customers_id($customers_id)
{
    $x = 'customers_email_address';
    $sql = "select " . $x . " from customers where customers_id='" . $customers_id . "' ";
    return lookup($sql, $x);
}

function customers_id_from_orders_id($orders_id)
{
    $x = 'customers_id';
    $sql = "select " . $x . " from orders where orders_id='" . $orders_id . "' ";
    return lookup($sql, $x);

}

function customers_firstname_by_email($email)
{
    $x = 'customers_firstname';
    $sql = "select " . $x . " from customers where customers_email_address='" . $email . "' ";
    return lookup($sql, $x);
}

function customers_lastname_by_email($email)
{
    $x = 'customers_lastname';
    $sql = "select " . $x . " from customers where customers_email_address='" . $email . "' ";
    return lookup($sql, $x);
}

function customers_gender_by_email($email)
{
// todo Ansprache nach lang !!
    $x = 'customers_gender';
    $sql = "select " . $x . " from customers where customers_email_address='" . $email . "' ";
    $g = lookup($sql, $x);
    $gender = '';
    if ($g == 'm') $gender = 'Herr';
    if ($g == 'f') $gender = 'Frau';
    return $gender;

}


function repl_templ_topic($this_template, $lang, $current_blockname, $email)
{

    $customers_gender = customers_gender_by_email($email);
    $customers_firstname = customers_firstname_by_email($email);
    $customers_lastname = customers_lastname_by_email($email);


    $curr_file = DIR_FS_CATALOG . $lang . '/' . $current_blockname;
    if (!file_exists($curr_file)) {
        // als Vorlage immer das aktuelle deutsche File
        $curr_file = DIR_FS_CATALOG . DIR_WS_LANGUAGES . 'german/sd_emails/' . $current_blockname;
    }

    $this_text_block = get_text_from_path($curr_file);
    $msg = $this_text_block;
    $msg = str_replace('#anrede#', $customers_gender, $msg);
    $msg = str_replace('#customer_firstname#', $customers_firstname, $msg);
    $msg = str_replace('#customer_lastname#', $customers_lastname, $msg);
    $msg = str_replace('#kunden_email#', $email, $msg);


    // topic?
    $this_template = str_replace('#msg#', $msg, $this_template);
    $this_template = str_replace('#anrede#', $customers_gender, $this_template);
    $this_template = str_replace('#customer_firstname#', $customers_firstname, $this_template);
    $this_template = str_replace('#customer_lastname#', $customers_lastname, $this_template);
    $this_template = str_replace('#customer_email#', $email, $this_template);

    return $this_template;
}

function send_template($this_template, $ToName, $ToEmail, $Subject, $FromName, $FromEmail)
{
    /*
		$ToName = store_name();
		$ToEmail = $email;
		$Subject = 'Test der Vorlage';
		$FromName=store_name();
		$FromEmail=store_email();
*/
    send_mail_html($ToName, $ToEmail, $Subject, $this_template, $FromName, $FromEmail);
}


function platzhalter_to_file($ph)
{

    $this_file = str_replace('##', '', $ph);
    $this_file = $this_file . '.htm';

    return $this_file;
}


function is_start_page()
{
    $p = curPageName();
    if ($p == 'index.php') {
        if (getParam('cPath', '') == '' and getParam('manufacturers_id', '') == '') {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// or ( ( $p=='index.php' and getParam('manufacturers_id','') )
function is_product_page()
{
    $p = curPageName();
    if (($p == 'index.php' and (getParam('cPath', '') or getParam('manufacturers_id', ''))) or $p == 'product_info.php' or $p == 'specials.php' or $p == 'products_bestrated.php'
        or $p == 'products_bestseller.php' or $p == 'products_new.php' or $p == 'shopping_cart.php' or $p == 'advanced_search_result.php'
    ) {

        return true;

    } else {
        return false;
    }
}

function is_checkout_page()
{
    $p = curPageName();
    if (eregiS('checkout', $p) or curPageName() == 'shopping_cart.php') {
        return true;
    } else {
        return false;
    }
}

function is_checkout_page_pure()
{
    $p = curPageName();
    if (eregiS('checkout', $p) and curPageName() <> 'checkout_success.php') {
        return true;
    } else {
        return false;
    }
}


function is_customer_account()
{
    $p = curPageName();
    if (eregiS('account', $p) and $p <> 'account_wrap.php') {
        return true;
    } else {
        return false;
    }
}

function create_table_nl_bestellungen()
{
}

function create_table_nl_abbestellungen()
{
}

function show_footer_hint_box_here()
{

    $show_general = get_dv_bool('show_footer_hint_box');
    $show_only_on_start = get_dv_bool('show_footer_hint_box_only_on_startpage');

    if ($show_general) {
        if ($show_only_on_start) {
            if (is_start_page()) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    } else {
        return false;
    }
}

function is_in_table($table, $field, $value)
{
    $sql = "select " . $field . " from " . $table . " where " . $field . " = '" . $value . "' ";
    $res = q($sql);
    if (mysql_num_rows($res) == 0) {
        return false;
    } else {
        return true;
    }
}

function wieoft_in_table($table, $field, $value)
{
    $sql = "select " . $field . " from " . $table . " where " . $field . " = '" . $value . "' ";
    $res = q($sql);
    return mysql_num_rows($res);
}

function get_options($curr_val, $pref, $array, $suff)
{
    $d = explode(',', $array);
    $options = '';

    $prev_dis = 0;
    foreach ($d as $dis) {
        $options .= '<option ';
        if ($curr_val > $prev_dis AND $curr_val <= $dis) {
            $options .= ' selected ';
        }
        $options .= ' value="' . $dis . '">' . $pref . ' ' . nuf($dis) . ' ' . $suff . '</option>';
        $prev_dis = $dis;
    }
    return $options;
}

function get_options_str($curr_val, $pref, $array, $suff)
{
    $d = explode(',', $array);
    $options = '';

    $prev_dis = 0;
    foreach ($d as $dis) {
        $options .= '<option ';
        if (trim($curr_val) == trim($dis)) {
            $options .= ' selected="selected" ';
        }
        $options .= ' value="' . trim($dis) . '">' . $pref . ' ' . trim($dis) . ' ' . $suff . '</option>';
        $prev_dis = $dis;
    }
    return $options;
}

function backup_silent_exec()
{
    if (get_dv('cron_job_is_installed_backup') == 1) {
        return false;
    } else {
        if (true_in_div('db_auto_backup_is_installed')) {
            $db_auto_backup_freq = get_dv('db_auto_backup_freq');
            if (once_every_hours('db_auto_backup_freq')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}


function make_table_siko_drop($table)
{
    $siko_table = $table . '_siko';
    drop_table($siko_table);
    if (!Table_Exists($siko_table)) {
        $sql_create = "
			create table " . $siko_table . " 
			select * from " . $table . "
		";
        q($sql_create);

        return $siko_table;
    }
}


function make_table_siko($table)
{
    $siko_table = $table . long_siko_datum_ext_for_table();
    if (Table_Exists($siko_table)) drop_table($siko_table);

    if (!Table_Exists($siko_table)) {
        $sql_create = "
			create table " . $siko_table . " 
			select * from " . $table . "
		";
        q($sql_create);
        //index ?
        return $siko_table;
    } else {
        return 'TAB EXISTS ALREADY	';
    }

}


function re_make_table_siko($table)
{
    $siko_table = $table . siko_datum_ext_for_table();

    if (Table_Exists($siko_table)) {

        if (Table_Exists($table)) {
            drop_table($table);
        }

        $sql_create = "
			create table " . $table . " 
			select * from " . $siko_table . "
		";
        q($sql_create);

        drop_table($siko_table);
        return 'new tab created: ' . $table . ' - siko dropped';
    } else {
        return 'TAB NOT EXISTS: ' . $siko_table;
    }


}


function truncate_table($table)
{
    if (Table_Exists($table)) {
        $sql = "TRUNCATE TABLE " . $table . " ";
        q($sql);
        return 'OK truncated';
    } else {
        return 'TAB NOT EXISTS for TRUNC';
    }
}

function drop_table($table)
{
    if (Table_Exists($table)) {
        $sql = "DROP TABLE " . $table . " ";
        q($sql);
        return 'OK dropped';
    } else {
        return 'TAB NOT EXISTS for DROP';
    }
}

function drop_all_tables_like($str)
{

    $sql = "show table status";
    $res = q($sql);

    while ($row = mysql_fetch_array($res)) {
        $this_name = $row["Name"];

        //if ( eregX($str,$this_name) ){
        if (stristr($this_name, $str)) {
            $sql = "drop table " . $this_name . " ";
            q($sql);

            ec('Dropped: ' . $this_name);
        }

    }
    mysql_free_result($res);


}


function siko_datum_ext_for_table()
{
    $t = time();
    $t2 = Timestamp_to_SQLDate($t);
    $t2 = str_replace('-', '_', $t2);
    $t2 = substr($t2, 5, 5);

    return "_siko_" . $t2;
}

function long_siko_datum_ext_for_table()
{
    $t = time();
    $t2 = Timestamp_to_SQLDate($t);
    $t2 = str_replace('-', '', $t2);
    $t2 = str_replace(':', '', $t2);
    $t2 = str_replace(' ', '_', $t2);

    return $t2;
}

function i_am_admin()
{
    if (trim(get_dv('admin_current_ip_address')) == $_SERVER['REMOTE_ADDR']) {
        return true;
    } else {
        return false;
    }
}

function i_am_superadmin()
{
    if (trim(get_dv('superadmin_current_ip_address')) == $_SERVER['REMOTE_ADDR']) {
        return true;
    } else {
        return false;
    }
}

/*
function redirect_if_wartungsmode(){
global $application_shop_is_in_dev_mode;
if (get_dv_bool('application_is_in_maint_mode')){
	//if (curPageName()<>'maintenance.php') 	header('Location:maintenance.php');
	if (curPageName()<>'index_bearbeitungs_mode.php') 	header('Location:index_bearbeitungs_mode.php');
}else{
 if ($application_shop_is_in_dev_mode and get_dv('admin_current_ip_address') <> $_SERVER['REMOTE_ADDR']  )
			header('Location:maintenance.php');
}
}
*/
function redirect_if_is_banned_ip()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    $sql = "select ip from banned_adresses where ip = '" . $ip . "'";
    if (has_rows($sql)) {
        if (curPageName() <> 'index_banned.php') header('Location:index_banned.php');
    } else {

    }
}

function redirect_if_is_bearbeitungs_mode()
{
    global $shop_is_in_bearbeitungs_mode_but_no_redirect;
    $shop_is_in_bearbeitungs_mode_ausnahme_array = get_dv('shop_is_in_bearbeitungs_mode_ausnahme_array');
    $shop_is_in_bearbeitungs_mode_ausnahme_array1 = explode(',', $shop_is_in_bearbeitungs_mode_ausnahme_array);

    if (in_array($_SERVER['REMOTE_ADDR'], $shop_is_in_bearbeitungs_mode_ausnahme_array1) or $_SERVER['REMOTE_ADDR'] == get_dv('admin_current_ip_address')) {

    } else {
        if (!to_bool($shop_is_in_bearbeitungs_mode_but_no_redirect)) {
            if (curPageName() <> 'index_bearbeitungs_mode.php') header('Location:index_bearbeitungs_mode.php');
        }
    }

}

function redirect_if_is_redirect_mode()
{
    if (curPageName() <> 'index_bearbeitungs_mode.php') header('Location:index_bearbeitungs_mode.php');
}


function redirect_if_is_brut_force_close_down()
{
    if (curPageName() <> 'index_bearbeitungs_mode.php') header('Location:index_bearbeitungs_mode.php');
}

function redirect_if_is_banned_email()
{
    $cid = $_SESSION['customer_id'];
    $email = customers_email_by_c_id($cid);
    $sql = "select * from banned_adresses where email = '" . $email . "'";
    if (has_rows($sql)) {
        if (curPageName() <> 'index_banned.php') header('Location:index_banned.php');
    } else {

    }
}


function redirect_if_is_blocked($shop_is_blocked)
{

    if ($shop_is_blocked) {
        if (curPageName() <> 'index_blocked.php') header('Location:index_blocked.php');
    } else {

    }
}

function my_page_title($title = '')
{

    $shop_folder = str_replace('sp/', '', CAT_FOLDER_TOP);

    if (eregiS('/admin', curPageURL())) {

        if ($title <> '') {
            if (is_dev()) {
                if (is_dev_site()) {
                    return '' . $title . ' - SA';
                } else {
                    return 'SA(' . $shop_folder . ')  - ' . $title;
                }
            } else {
                return '' . $title . ' - Admin';
            }

        } else {

            if (is_dev()) {
                if (is_dev_site()) {
                    return '' . curPageName() . ' - SA';
                } else {
                    return '' . $shop_folder . ' - ' . curPageName();
                }

            } else {
                //return 'Admin  - '.STORE_NAME;
                return '' . curPageName() . ' - Admin';
            }
        }

    } else {
        if (is_dev() and 1 == 2) {
            return 'Shop  - ' . curPageName();
        } else {
            if (getParam('sdp', '')) {
                $self_def_page = getParam('sdp', '');

                return get_dv($self_def_page . '_link_text') . ' - ' . STORE_NAME;
            } else {
                if (getParam('cPath', '') and !getParam('products_id', '') and !is_start_page()) {
                    $letzte_in_cPath = letzte_in_cPath();
                    $curr_cat = cat_name($letzte_in_cPath);
                    //return STORE_NAME;
                    return $curr_cat;
                }

                if (getParam('cPath', '') and getParam('products_id', '') and !is_start_page()) {
                    $letzte_in_cPath = letzte_in_cPath();
                    $curr_cat = cat_name($letzte_in_cPath);
                    //return STORE_NAME;
                    $pid = getParam('products_id', '');
                    $prod = get_products_name_from_products_id($pid);
                    return $prod;
                }

                if (!getParam('cPath', '') and getParam('products_id', '') and !getParam('manufacturers_id', '') and !is_start_page()) {
                    $pid = getParam('products_id', '');
                    $prod = get_products_name_from_products_id($pid);
                    return $prod;
                }

                if (!getParam('cPath', '') and getParam('products_id', '') and getParam('manufacturers_id', '') and !is_start_page()) {
                    $pid = getParam('products_id', '');
                    $prod = get_products_name_from_products_id($pid);
                    $manufacturers_id = getParam('manufacturers_id', '');
                    $m = get_manufacturers_name_from_manufacturers_id($manufacturers_id) . ' - ';
                    return $m . $prod;
                }

                if (!getParam('cPath', '') and !getParam('products_id', '') and getParam('manufacturers_id', '') and !getParam('filter_id', '') and !is_start_page()) {
                    //$pid = getParam('products_id','');
                    //$prod = get_products_name_from_products_id($pid);
                    $manufacturers_id = getParam('manufacturers_id', '');
                    $m = get_manufacturers_name_from_manufacturers_id($manufacturers_id) . '';
                    return $m;
                }

                if (!getParam('cPath', '') and !getParam('products_id', '') and getParam('manufacturers_id', '') and getParam('filter_id', '') and !is_start_page()) {
                    //$pid = getParam('products_id','');
                    //$prod = get_products_name_from_products_id($pid);
                    $manufacturers_id = getParam('manufacturers_id', '');
                    $m = get_manufacturers_name_from_manufacturers_id($manufacturers_id) . '';
                    $curr_cat = cat_name(getParam('filter_id', ''));
                    return $m . ' - ' . $curr_cat;
                }

                if (!getParam('cPath', '') and !getParam('products_id', '') and !getParam('manufacturers_id', '') and !getParam('filter_id', '') and getParam('filter_cat', '') and !is_start_page()) {
                    $curr_cat = cat_name(getParam('filter_cat', ''));

                    if (curPageName() == 'specials.php') {
                        $r = get_dv('specials_text');
                    }

                    if (curPageName() == 'products_new.php') {
                        $r = get_dv('new_prods_text');
                    }

                    if (curPageName() == 'products_bestseller.php') {
                        $r = get_dv('bestseller_text');
                    }
                    return $curr_cat . ' - ' . $r;
                }

                if (curPageName() == 'specials.php') {
                    $r = get_dv('specials_text');
                    return $r;
                }

                if (curPageName() == 'products_new.php') {
                    $r = get_dv('new_prods_text');
                    return $r;
                }

                if (curPageName() == 'products_bestseller.php') {
                    $r = get_dv('bestseller_text');
                    return $r;
                }

                if (curPageName() == 'products_bestrated.php') {
                    $r = get_dv('best_rated_text');
                    return $r;
                }

                if (curPageName() == 'login.php') {
                    $r = get_dv('checkin_process_login_page_header');
                    return $r;
                }

                if (curPageName() == 'checkout_shipping.php') {
                    $r = 'Lieferung - Checkout';
                    return $r;
                }

                if (curPageName() == 'checkout_shipping_address.php') {
                    $r = 'Lieferadresse festlegen - Checkout';
                    return $r;
                }

                if (curPageName() == 'checkout_payment.php') {
                    $r = 'Zahlung - Checkout';
                    return $r;
                }

                if (curPageName() == 'checkout_payment_address.php') {
                    $r = 'Rechnungsadresse - Checkout';
                    return $r;
                }

                if (curPageName() == 'checkout_confirmation.php') {
                    $r = 'Zusammenfassung - Checkout';
                    return $r;
                }

                if (curPageName() == 'checkout_success.php') {
                    $r = 'Wir danken f&uuml;r Ihre Bestellung';
                    return $r;
                }


                if (is_start_page()) return STORE_NAME . ' - Home';

            }
        }
    }

}

function add_meta_tag()
{
//keywords
    if (getParam('cPath', '')) {
        $letzte_in_cPath = letzte_in_cPath();
        $r = full_cPath_str($letzte_in_cPath, false, ', ') . ', ';
    }

    if (getParam('manufacturers_id', '')) {
        $manufacturers_id = getParam('manufacturers_id', '');
        $m = get_manufacturers_name_from_manufacturers_id($manufacturers_id) . ', ';

        if (getParam('products_id', '')) {
            $products_id = getParam('products_id', '');
            $categories_id = categories_id_from_products_id($products_id);
            $m1 = full_cPath_str($categories_id, false, ', ') . ',';
        }

    } else {

        if (getParam('products_id', '')) {
            $products_id = getParam('products_id', '');
            $manufacturers_id = get_manufacturers_id_from_products_id($products_id);
            $manuf_name = get_manufacturers_name_from_manufacturers_id($manufacturers_id);
            if ($manuf_name <> '') $m1 = $manuf_name . ', ';
            $cat_name = cat_name_from_products_id($products_id);
            if ($cat_name <> '') $m1 .= $cat_name . ', ';

        }

    }


    return $r . $m . $m1;
}

/*
function get_manufacturers_id_from_products_id($products_id){
$products_id=(int)$products_id;
$sql="select manufacturers_id from products where products_id = '".$products_id."'";
return lookup($sql,'manufacturers_id');
}
function get_manufacturers_name_from_manufacturers_id($manufacturers_id){
$sql="select manufacturers_name from manufacturers where manufacturers_id = '".$manufacturers_id."'";
return lookup($sql,'manufacturers_name');
}
*/


function get_text_from_path($path)
{
// /home/content/d/i/e/dieterPMX/html/pizza_jetline/catalog_dev//admin6093/newsl_tool/templates/pizza_mx2.htm
    $fileToOpen = fopen($path, "r");
    $txt = fread($fileToOpen, filesize($path));
    fclose($fileToOpen);
    return $txt;
}

function cat_name_from_products_id($products_id, $lang_id = '')
{
    $products_id = (int)$products_id;
    $products_id = att_clean($products_id);
    $lang_id = $_SESSION['languages_id'];
    if ($products_id > 0) {
        $sql = "select categories_id from  products_to_categories where products_id = " . $products_id;
        $cat_id = lookup($sql, 'categories_id');
        return cat_name($cat_id);
    } else {
        return '';
    }
}

function cat_name($cat_id, $lang_id = '')
{
    $lang_id = $_SESSION['languages_id'];
    if ($lang_id == '') $lang_id = 2;
    $sql = "select categories_name from categories_description where categories_id = '" . $cat_id . "' and language_id = '" . $lang_id . "'";
    return lookup($sql, 'categories_name');
}

function cat_name_admin($cat_id, $lang_id = '')
{
    if ($lang_id == '') $lang_id = 2;
    $sql = "select categories_name from categories_description where categories_id = '" . $cat_id . "' and language_id = '" . $lang_id . "'";
    return lookup($sql, 'categories_name');
}


function anz_art_in_cat($cat_id)
{
//$sql="select categories_name from categories_description where categories_id = '".$cat_id."' and language_id = '".$lang_id."'";
//return  lookup($sql,'categories_name');
}


function easy_coupon_active()
{
//global $app_easy_coupons;

//if($easy_coupons_is_active){
    $st = get_config_value_byKey('EASY_COUPONS');
    $st_arr = explode(";", $st);
    return $st_arr[0];

//}else{
//	return 0;
//}

//return $app_easy_coupons;
}

function remove_ext($filename)
{
    $ext = get_ext($filename);
    return str_replace('.' . $ext, '', $filename);

}


function img_options_in_folder_2($relation, $folder, $curr_value, $use_folder = true)
{
    $folders = array();
    $folder_plain = $folder;
    $folder = $relation . $folder;
    if (file_exists($folder)) {

        $dossier = opendir($folder);
        while ($file = readdir($dossier)) {
            if ($file != "." && $file != ".." && $file != "Thumbs.db") {

                if (!is_dir($folder . "/" . $file)) {
                    if (strtolower(get_ext($file)) == 'jpg' or strtolower(get_ext($file)) == 'gif' or strtolower(get_ext($file)) == 'png') {
                        $folders[] = $file;

                    }
                }

            }
        }

        sort($folders);

        foreach ($folders as $file) {

            if ($use_folder) {
                if ($curr_value == $folder_plain . "/" . $file) {
                    $opt .= "<option selected='selected' value='" . $folder_plain . "/" . $file . "'>" . $file . "</option>";
                } else {
                    $opt .= "<option value='" . $folder_plain . "/" . $file . "'>" . $file . "</option>";
                }
            } else {
                if ($curr_value == $folder_plain . "/" . $file) {
                    $opt .= "<option selected='selected' value='" . $file . "'>" . $file . "</option>";
                } else {
                    $opt .= "<option value='" . $file . "'>" . $file . "</option>";
                }
            }

        }

        closedir($dossier);
        return $opt;

    } else {
        return '';

    }

}


function css_switch_in_cat()
{
    return true;
}

function show_fahrer_unterwegs_link_in_conf_email()
{
    return true;
}

function css_switch_box_show_in_cat()
{
    if (css_switch_in_cat() and is_dev()) {
        return true_in_div('css_switch_box_show_in_cat');
    } else {
        return false;
    }
}

function reverse($t)
{
    return strrev($t);
}

function utf8_entities_strrev($str, $preserve_numbers = true)
{
    //split string into string-portions (1 byte characters, numerical entitiesor numbers)
    $parts = Array();
    while ($str) {
        if ($preserve_numbers && preg_match('/^([0-9]+)(.*)$/', $str, $m)) {
            // number-flow
            $parts[] = $m[1];
            $str = $m[2];
        } elseif (preg_match('/^(\&#[0-9]+;)(.*)$/', $str, $m)) {
            // numerical entity
            $parts[] = $m[1];
            $str = $m[2];
        } else {
            $parts[] = substr($str, 0, 1);
            $str = substr($str, 1);
        }
    }
    $str = implode(array_reverse($parts), "");
    return $str;
}

//function artikel_img_prefix(){
//return 'Art';
//}


function google_use_analytics()
{
    $res = lookup("select div_res from diverses where div_what = 'google_use_analytics' ", 'div_res');
    if ($res = 1 and google_get_analytics_script_long() <> '') {
        return true;
    } else {
        return false;
    }
}

function google_get_analytics_script_long()
{
    return lookup("select div_res_long from diverses where div_what = 'google_get_analytics_scr' ", 'div_res_long');
}

function google_analytics_report_link()
{
    return lookup("select div_res_long from diverses where div_what = 'google_analytics_report_link' ", 'div_res_long');
}

function show_google_map_box()
{
    if (google_map_api_key() <> '') { // und wenn geocodes
        return true;
    } else {
        return false;
    }
}

function google_map_api_key()
{

    $google_map_api_key_good_for = str_replace('https://', '', get_dv('google_map_api_key_good_for'));
    $google_map_api_key_good_for = str_replace('http://', '', $google_map_api_key_good_for);

    $google_map_api_key_good_for = google_map_api_remove_subdomain($google_map_api_key_good_for);


    $curServerName = $_SERVER["SERVER_NAME"];


// 1 oder 2 ?
    $api_url_1 = $google_map_api_key_good_for;
    if (stristr($curServerName, $api_url_1)) {
        return get_dv('google_map_api_key');
    } else {
        $google_map_api_key_good_for2 = str_replace('http://', '', get_dv('google_map_api_key_good_for2'));
        $google_map_api_key_good_for2 = google_map_api_remove_subdomain($google_map_api_key_good_for2);
        $api_url_2 = $google_map_api_key_good_for2;
        if (stristr($curServerName, $api_url_2)) {
            return get_dv('google_map_api_key2');
        } else {
            $api_url_3 = str_replace('http://', '', get_dv('google_map_api_key_good_for3'));
            $api_url_3 = google_map_api_remove_subdomain($api_url_3);
            if (stristr($curServerName, $api_url_3)) {
                return get_dv('google_map_api_key3');
            } else {
                $api_url_4 = str_replace('http://', '', get_dv('google_map_api_key_good_for4'));
                $api_url_4 = google_map_api_remove_subdomain($api_url_4);
                if (stristr($curServerName, $api_url_4)) {
                    return get_dv('google_map_api_key4');
                }
            }
        }
    }
}


function google_map_api_remove_subdomain($url)
{

    $url_arr = explode('.', $url);

    $p0 = $url_arr[0];
    $p1 = $url_arr[1];
    $p2 = $url_arr[2];

    if (count($url_arr) == 3) {
        if ($p0 == 'www') {
            return $p0 . '.' . $p1 . '.' . $p2;
        } else {
            return $p1 . '.' . $p2;
        }
    }

    if (count($url_arr) == 2) {
        return $p0 . '.' . $p1;
    }
}

function google_map_api_key_good_for()
{
    global $google_map_api_key_good_for;
    return $google_map_api_key_good_for;
}

function my_lat()
{
    global $google_map_my_lat;
    return $google_map_my_lat;
}

function my_lon()
{
    global $google_map_my_lon;
    return $google_map_my_lon;
}

function google_map_show_on_page()
{
//global $google_map_show_on_page;

    //if ( google_map_api_key()<>'' and my_lat() <> 0 and $google_map_show_on_page ){ // und wenn geocodes
    if (google_map_api_key() <> '' and my_lat() <> 0) { // und wenn geocodes popup_catalog_box_wrapper
        if (eregiS('index', curPageName()) or eregiS('popup_catalog_box_wrapper.php', curPageName())) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function google_map_installed()
{
    if (google_map_api_key() <> '' and my_lat() <> 0) { // und wenn geocodes
        return true;
    } else {
        return false;
    }
}

function if_needed_in_admin($curPageName, $js_lib)
{
    return false;
}

function if_needed_in_catalog($curPageName, $js_lib)
{
    return false;
}

///// needed js includes in admin
function google_map_needed_admin($curPageName)
{
    $page_array_admin = array(
        'nix.php',
        'nux.php'

    );

    if (in_array($curPageName, $page_array_admin)) {
        return true;
    } else {
        return false;
    }
}

function tinymce_needed_admin($curPageName)
{
    $page_array_admin = array(
        'categories.php',
        'define_mainpage.php'

    );

    if (in_array($curPageName, $page_array_admin)) {
        return true;
    } else {
        return false;
    }

}

function protocheck_needed_admin($curPageName)
{
    $page_array_admin = array(
        'nix.php'


    );

    if (in_array($curPageName, $page_array_admin)) {
        return true;
    } else {
        if (eregiS('config_', $curPageName)) {
            return true;
        } else {
            return false;
        }
    }
}


function protocheck_needed_catalog()
{
    $curPageName = curPageName();

    $page_array = array(
        'nix.php',
        'shopping_cart.php'
    );

    if (in_array($curPageName, $page_array)) {
        return true;
    } else {
        if (eregiS('checkout_', $curPageName) or eregiS('address_book', $curPageName)) {
            return true;
        } else {
            return false;
        }
    }
}

function jscalendar_needed_admin($curPageName)
{
    $page_array_admin = array(
        'nix.php'

    );

    if (in_array($curPageName, $page_array_admin)) {
        return true;
    } else {
        return false;
    }

}

///// needed js includes in catalog
function google_map_needed_shop($curPageName)
{
    $page_array_admin = array(
        'index.php',
        'nix.php'

    );

    if (in_array($curPageName, $page_array_admin)) {
        return true;
    } else {
        return false;
    }
}


function offer_menu_as_pdf()
{
    return true_in_div('top_link_bar_show_menu_link');
}


function use_dhtml_buttons()
{
    return true;
}

function res_nr_to_bool($nr)
{
    if ($nr == 1) {
        return true;
    } else {
        return false;
    }
}

function show_besuchercounter_box()
{
    $res = 1;
    return res_nr_to_bool($res);
}

/*
function show_video_on_start(){
global $video_is_installed, $video_is_active, $show_video_on_start;
	if ($video_is_installed and $video_is_active){
		return $show_video_on_start;
	}else{
		return false;
	}
}
*/
function video_title($video_id)
{
    $sql = "select title from video where id= " . $video_id;
    return lookup($sql, 'title');
}

function video_width($video_id)
{
    $sql = "select width from video where id= " . $video_id;
    return lookup($sql, 'width');
}

function video_height($video_id)
{
    $sql = "select height from video where id= " . $video_id;
    return lookup($sql, 'height');
}


function show_which_video_nr_on_start()
{
    return get_dv('show_which_video_nr_on_start');
}

function show_video_on_checkout_succes()
{
    global $video_is_installed, $video_is_active, $show_video_on_checkout;
    if ($video_is_installed and $video_is_active) {
        return $show_video_on_checkout;
    } else {
        return false;
    }
}

function show_which_video_nr_on_checkout_succes()
{
    return get_dv('show_which_video_nr_on_checkout');
}

function get_img_karte_ext()
{
    $resultat = mysql_query("select div_res from diverses where div_what = 'img_karte_ext' ");
    $rad = mysql_fetch_array($resultat);
    $st = trim($rad["div_res"]);
    return $st;
}


function show_footer_hint_box()
{
    return true_in_div('show_footer_hint_box');
}

function footer_hint_box_text()
{
    return get_div_long_value_byKey('footer_hint_box_text');
}

function show_pageears()
{
    global $pageears_is_active, $pageears_is_installed;
    if ($pageears_is_active and $pageears_is_installed) {
        return true;
    } else {
        return false;
    }


}

function random_pageaer_nr($max)
{
    return mt_rand(1, $max);
//return 17;
}

function curr_css_file()
{
//return 'css2/Kopievonstylesheet.css';
    return 'css2/stylesheet.css';
}

function headerbanner_height()
{
//return 55;
    return get_div_value_byKey('headerbanner_height');
}

function headerbanner_background_img_url()
{
//return 'myuploads/img_top_background/background_oben2_55.jpg';
    return get_div_value_byKey('headerbanner_background_img_url');
}

function get_from_diverses($what)
{
    $sql = "select div_res from diverses where div_what = '" . $what . "'";
    return lookup($sql, 'div_res');
}

// Design betreffend Anfang
function curr_stylesheet_no()
{
    $sql = "select div_res from diverses where div_what = 'css'";
    return lookup($sql, 'div_res');
}

// Design betreffend Ende
function default_country_in_pulldowns()
{
    return '204'; // Schweiz  -  ID in Tabelle  countries
}

function enable_reviews()
{
    return false;
}

function show_admin_link_in_catalog()
{
    return true_in_div('show_admin_link_in_catalog');
}

function show_ladezeit()
{
    return true_in_div('show_ladezeit');
}

function show_ipadr()
{
    return true_in_div('show_ipadr');
}

function show_designnr()
{
    return true_in_div('show_designnr');
}

function enable_enhanced_currencies()
{
    return false;
}

function show_schnellsuche_in_shoppingcart()
{
    return false;
}

function show_visitor_email_nl()
{
    return true_in_div('show_visitor_email_nl');
}


function small_img_from_pid($products_id)
{
    $sql = "select products_image from " . TABLE_PRODUCTS . " where products_id ='" . $products_id . "'";
    return lookup($sql, 'products_image');
}


function small_img_from_model($products_model)
{
    $sql = "select products_image from " . TABLE_PRODUCTS . " where products_model ='" . $products_model . "'";
    return lookup($sql, 'products_image');
}

function medium_img_from_model($products_model)
{
    $sql = "select products_mediumimage from " . TABLE_PRODUCTS . " where products_model ='" . $products_model . "'";
    return lookup($sql, 'products_mediumimage');
}

function large_img_from_model($products_model)
{
    $sql = "select products_largeimage from " . TABLE_PRODUCTS . " where products_model ='" . $products_model . "'";
    return lookup($sql, 'products_largeimage');
}

/*function lookup($sql, $field)
{
// $x = lookup("select free_promo from phpclass_category_user where cat_id ='".$user_cat_id."'","free_promo");
    $field = trim($field);
    $resultat = q($sql);
    $rad = mysql_fetch_array($resultat);
    mysql_free_result($resultat);
    return $rad[$field];
}*/

function get_anzahl_sql($query_sql_strg)
{
    $res = q($query_sql_strg);
    return mysql_num_rows($res);
}

function number_rows_from_sql($sql)
{
    $sql_res = q($sql);
    $Anzahl = mysql_num_rows($sql_res);
    return $Anzahl;
}
/*
function has_rows($sql)
{
    $sql_res = q($sql);
    $Anzahl = mysql_num_rows($sql_res);
    if ($Anzahl > 0) {
        return true;
    } else {
        return false;
    }
}*/
/*
function has_records($sql)
{
    return has_rows($sql);
}*/

// es gibt eine identische funct  easy_coupon_active()
function easy_coupon_is_active()
{
    $resultat = mysql_query("select * from configuration where configuration_key = 'EASY_COUPONS' ");
    $rad = mysql_fetch_array($resultat);
    $st = trim($rad["configuration_value"]);
    $st_arr = explode(";", $st);
    return $st_arr[0];
}


function curPageName_paras()
{
//http://www.webcheatsheet.com/php/get_current_page_url.php

    if (curPageQueryString() <> '') {
        return curPageName() . '?' . curPageQueryString();
    } else {
        return curPageName();
    }

}

function is_this_domain($url = 'xxxx')
{
    if (eregiS($url, curPageURL())) {
        return true;
    } else {
        return false;
    }
}


function curPageName()
{
//http://www.webcheatsheet.com/php/get_current_page_url.php
    return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
}

function RefererPageName()
{
//http://www.webcheatsheet.com/php/get_current_page_url.php
    return substr($_SERVER["HTTP_REFERER"], strrpos($_SERVER["HTTP_REFERER"], "/") + 1);
}

function RefererPageNameNoParas()
{
    $full = substr($_SERVER["HTTP_REFERER"], strrpos($_SERVER["HTTP_REFERER"], "/") + 1);
    return substr($full, 0, strpos($full, '?'));
}


function pure_url()
{
// without query string identisch mit gleicher javascript function in general.js
    $full = curPageURL();
    $qstring = '?' . curPageQueryString();
    return str_replace($qstring, '', $full);
}

function pure_url_no_http()
{
    global $shop_url;
    $x = $shop_url;
    $x = str_replace('http://', '', $x);
    $x = str_replace('https://', '', $x);
    return $x;

}


function curPageURL()
{
    //if($_SERVER['HTTPS']){
    if (isset($_SERVER["HTTPS"]) && strtolower($_SERVER["HTTPS"]) == "on") {
        $pageURL = 'https';
    } else {
        $pageURL = 'http';
    }

    //if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        //$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        $pageURL .= $_SERVER["SERVER_NAME"] . "" . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

function curPageQueryString()
{
    return $_SERVER["QUERY_STRING"];
}

function add_to_curPageQueryString($pair)
{
    $x = $_SERVER["QUERY_STRING"];
    if ($x <> '') {
        //return '?'.$x.'&'.$pair;
        return '&' . $pair;
    } else {
        return '?' . $pair;
    }
}

function add_to_curPageQueryString_if_not_exists($pair)
{
    $x = $_SERVER["QUERY_STRING"];

    if (eregiS($pair, $x)) {
        return '';
    } else {
        if ($x <> '') {
            //return '?'.$x.'&'.$pair;
            return '&' . $pair;
        } else {
            return '?' . $pair;
        }
    }

}


function curPageURL_no_SID()
{
    global $SID;
    $x = curPageURL();
    $x = str_replace('&' . $SID, '', $x);
    return $x;
}

/*
It does not work for urls like http://stwofinishm.users41.donhost.co.uk//index.php
I had a similar problem, but using the PHP str_replace() function, i got round it:

IE:
After the function closes, add this:
------------------------------------------------------------
$current_url = str_replace("www.", "", curPageURL());
*/

function check_for_curl()
{
// Curl class -> Documentation and updates can be found at http://github.com/shuber/curl
    if (function_exists('curl_init')) {
        return true;
    } else {
        return false;
    }
}

function check_for_allow_url_fopen()
{
    if (ini_get('allow_url_fopen') == 1) {
        return true;
    } else {
        return false;
    }
}

function check_rc()
{
    $r = 0;
    if (check_for_curl()) $r = $r + 2;
    if (check_for_allow_url_fopen()) $r = $r + 1;
    return $r;
}

/*function Table_Exists($table_name)
{
    $Table = q("show tables like '" . $table_name . "'");
    if (mysql_fetch_row($Table) === false)
        return (false);
    return (true);
}*/

function QueryIntoArray($query)
{
    settype($retval, "array");

    $result = mysql_query($query);
    if (!$result) {
        print "Query Failed";
    }
    for ($i = 0; $i < mysql_numrows($result); $i++) {
        for ($j = 0; $j < mysql_num_fields($result); $j++) {
            $retval[$i][mysql_field_name($result, $j)] = mysql_result
            ($result, $i, mysql_field_name($result, $j));
        }//end inner loop
    }//end outer loop
    return $retval;
}


function in_str($haystack, $needle)
{
    $pos = strrpos($haystack, $needle);
    if ($pos === false) { // note: three equal signs
        return false;
    } else {
        return true;
    }
}

function my_doc_root()
{
    return getcwd();
}

function uml_js($txt)
{
    $txt = str_replace('&auml;', '\'+unescape("%E4")+\'', $txt);
    $txt = str_replace('&ouml;', '\'+unescape("%F6")+\'', $txt);
    $txt = str_replace('&uuml;', '\'+unescape("%FC")+\'', $txt);
    $txt = str_replace('&Auml;', '\'+unescape("%C4")+\'', $txt);
    $txt = str_replace('&Uuml;', '\'+unescape("%DC")+\'', $txt);
    $txt = str_replace('&Ouml;', '\'+unescape("%D6")+\'', $txt);
    $txt = str_replace('&szlig;', '\'+unescape("%DF")+\'', $txt);
    return $txt;
}

function deuml_html($txt)
{
    $txt = str_replace('�', '&auml;', $txt);
    $txt = str_replace('�', '&ouml;', $txt);
    $txt = str_replace('�', '&uuml;', $txt);
    $txt = str_replace('�', '&Auml;', $txt);
    $txt = str_replace('�', '&Uuml;', $txt);
    $txt = str_replace('�', '&Ouml;', $txt);
    $txt = str_replace('�', '&szlig;', $txt);


//$text = str_replace('&','&amp;',$text); // Nein - ruiniert es
//$text = str_replace('xxxxxxxxxxx','&#8364;',$text);
    $text = str_replace('�', '&#8364;', $text);
    $text = str_replace('�', '&eacute;', $text);
    $text = str_replace('�,', '&Eacute;', $text);

    return $txt;
}


// beginn datefunctions

/*
date('YmdHis')
date('Y')
date(CA_PHP_DATE_TIME_FORMAT)
$file_array['date'] = date(CA_PHP_DATE_TIME_FORMAT, filemtime(DIR_FS_BACKUP . $entry));

date('YmdHis')

*/

function age($birthDate_sql)
{
    //date in mm/dd/yyyy format; or it can be in other formats as well
    //$birthDate = "12/17/1983";
    $birthDate = sql_to_germ_datestring($birthDate_sql);
    //explode the date to get month, day and year
    $birthDate = explode(".", $birthDate);
    //get age from date or birthdate
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
        ? ((date("Y") - $birthDate[2]) - 1)
        : (date("Y") - $birthDate[2]));
    //echo "Age is:" . $age;
    return $age;
}

function secondsToTime($seconds)
{
    $dtF = new DateTime("@0");
    $dtT = new DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%a Tage, %h Stunden, %i Minuten and %s Sekunden');
}

function timeDiff($firstTime, $lastTime)
{
//echo timeDiff("2002-04-16 10:00:00","2002-03-16 18:56:32");
    $firstTime = strtotime($firstTime);
    $lastTime = strtotime($lastTime);
    $timeDiff = $firstTime - $lastTime;
    return $timeDiff; // in secs
}

function now_sql()
{
    return date("Y-m-d H:i:s", time());
}


function get_tage_seit_begin($begin_date)
{
// format $begin_date = '13.05.2008 00:00:00'
    $begin_date_sql = germDateToSQL($begin_date);
    $begin_timestamp = getTimestampFromSQLDate($begin_date_sql);
    $jetzt = time();
    $diff_secs = $jetzt - $begin_timestamp; // Diff in Sek
    $diff_days = $diff_secs / (60 * 60 * 24);
    $diff_days = floor($diff_days);
    return $diff_days;
}

function get_std_seit_begin($begin_date)
{
    $begin_date_sql = germDateToSQL($begin_date);
    $begin_timestamp = getTimestampFromSQLDate($begin_date_sql);
    $jetzt = time();
    $diff_secs = $jetzt - $begin_timestamp; // Diff in Sek
    $diff_std = $diff_secs / (60 * 60);
    $diff_std = floor($diff_std);
//ec_l('6. Stunden '.$diff_std);
    return $diff_std;
}

function get_min_seit_begin($begin_date)
{
    $begin_date_sql = germDateToSQL($begin_date);
    $begin_timestamp = getTimestampFromSQLDate($begin_date_sql);
    $jetzt = time();
    $diff_secs = $jetzt - $begin_timestamp; // Diff in Sek
    $diff_std = $diff_secs / (60);
    $diff_std = floor($diff_std);
//ec_l('6. Stunden '.$diff_std);
    return $diff_std;
}


function germDateToTimestamp($datestring)
{
    $sqlDate = germDateToSQL($datestring);
    return getTimestampFromSQLDate($sqlDate);
}

function getDatefromTimestamp($aTimeStamp)
{
    if ($aTimeStamp > 0) {
        return date("d.m.Y H:i:s", $aTimeStamp);
    } else {
        return $aTimeStamp;
    }
}

function Timestamp_to_SQLDate($aTimeStamp)
{
    if ($aTimeStamp > 0) {
        return date("Y-m-d H:i:s", $aTimeStamp);
    } else {
        return $aTimeStamp;
    }
}

function Timestamp_to_SQLDate_Null_Uhr($aTimeStamp)
{
    if ($aTimeStamp > 0) {
        return date("Y-m-d 00:00:00", $aTimeStamp);
    } else {
        return $aTimeStamp;
    }
}


function getDatefromTimestamp_short($aTimeStamp)
{
    if ($aTimeStamp > 0) {
        return date("d.m.Y", $aTimeStamp);
    } else {
        return $aTimeStamp;
    }
}

function germDateToSQL($datestring)
{
//01.04.2008 22:01:58 = 2008-04-01 22:01:58
    $datestring1 = substr($datestring, 0, 10);
    $ttime = str_replace($datestring1, "", $datestring);
    $ttime = trim($ttime);
    $arr = explode(".", $datestring1);
    $temp = $arr[2] . '-' . $arr[1] . '-' . $arr[0];
    return $temp . ' ' . $ttime;
}

function getTimestampFromSQLDate($sqlDate)
{
    $ts = strtotime($sqlDate);
    return $ts;
}

function TimestampFromString($str)
{
    return strtotime($str);
    /*
echo strtotime("now"), "\n";
echo strtotime("10 September 2000"), "\n";
echo strtotime("+1 day"), "\n";
echo strtotime("+1 week"), "\n";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo strtotime("next Thursday"), "\n";
echo strtotime("last Monday"), "\n";


When using a custom timestamp and adding a day to it, this works:

strtotime("20080601 +1 day")

this does not:

strtotime("20080601") + strtotime("+1 day")

<?php
$str = 'Not Good';

// previous to PHP 5.1.0 you would compare with -1, instead of false
if (($timestamp = strtotime($str)) === false) {
    echo "The string ($str) is bogus";
} else {
    echo "$str == " . date('l dS \o\f F Y h:i:s A', $timestamp);
}
?>
In PHP 5 up to 5.0.2, "now" and other relative times are wrongly computed from today's midnight. It differs from other versions where it is correctly computed from current time.

In PHP versions prior to 4.4.0, "next" is incorrectly computed as +2. A typical solution to this is to use "+1".

Note: The valid range of a timestamp is typically from Fri, 13 Dec 1901 20:45:54 GMT to Tue, 19 Jan 2038 03:14:07 GMT. (
These are the dates that correspond to the minimum and maximum values for a 32-bit signed integer.)
Additionally, not all platforms support negative timestamps, therefore your date range may be limited to
no earlier than the Unix epoch. This means that e.g. dates prior to Jan 1, 1970 will not work on Windows,
some Linux distributions, and a few other operating systems. PHP 5.1.0 and newer versions overcome this limitation though.

An easier way to find the first and last time stamp of any given month.

<?php
$dat = explode(',',date('n,Y'));
$first = mktime(0,0,0,$dat[0],1,$dat[1]);
$last =   mktime(23,59,59,$dat[0]+1,0,$dat[1]);
?>
*/
}

function getSQLDatefromGermDate($datestring)
{
    return germDateToSQL($datestring);
}

function getSQLDatefromTimestamp($aTimeStamp)
{
    return date("Y-m-d H:i:s", $aTimeStamp);
}

function getSQLDatefromTimestamp_local_time($aTimeStamp)
{
    //$time_diff = 60*60*9; // 9 Std.
    $time_diff = 0;
    $aTimeStamp = $aTimeStamp + $time_diff;
    return date("Y-m-d H:i:s", $aTimeStamp);
}

function getGermanDatefromTimestamp($aTimeStamp)
{
    return date("d.m.Y H:i:s", $aTimeStamp);
}

function getGermanDatefromTimestamp_no_secs($aTimeStamp)
{
    return date("d.m.Y H:i", $aTimeStamp);
}


function getGermanDatefromSQLDate($sqlDate)
{
    $x = getTimestampFromSQLDate($sqlDate);
    return getDatefromTimestamp($x);
}

function getGermanDatefromSQLDate_short($sqlDate)
{
    $x = getTimestampFromSQLDate($sqlDate);
    return getDatefromTimestamp_short($x);
}

function add_days_to_sql_date($sqlDate, $days)
{
    $secs = $days * 24 * 60 * 60;
    $TimeStamp = getTimestampFromSQLDate($sqlDate);
    $TimeStamp = $TimeStamp + $secs;
    return getSQLDatefromTimestamp($TimeStamp);
}

function wochentag($sqlDate)
{
//2008-06-20 19:43:00
    /*
$stunde = substr($sqlDate,11,2);
$minute = substr($sqlDate,14,2);
$sekunde = substr($sqlDate,17,2);
$monat = substr($sqlDate,6,2);
$tag = substr($sqlDate,8,2);
$jahr = substr($sqlDate,0,4);
$mydate = mktime($stunde, $minute, $sekunde, $monat, $tag, $jahr);
*/
    $mydate = strtotime($sqlDate);
    $weekday = date("w", $mydate);
    $weekdays = array(ll("Sonntag"), ll("Montag"), ll("Dienstag"), ll("Mittwoch"), ll("Donnerstag"), ll("Freitag"), ll("Samstag"));
    $weekdayname = $weekdays[$weekday];
    return $weekdayname;
}

function tag_and_date_germ_from_SQLDate($SQLDate)
{
    $r_wtag = wochentag($SQLDate);
    return $r_wtag . ', ' . getGermanDatefromSQLDate($SQLDate);
}

function tag_and_date_germ_from_Timestamp_local_time($Timestamp)
{
    $SQLDate = getSQLDatefromTimestamp_local_time($Timestamp);
    $r_wtag = wochentag($SQLDate);
    return $r_wtag . ', ' . getGermanDatefromSQLDate($SQLDate);
}

function tag_and_date_germ_from_Timestamp_server_time($Timestamp)
{
    $SQLDate = getSQLDatefromTimestamp($Timestamp);
    $r_wtag = wochentag($SQLDate);
    return $r_wtag . ', ' . getGermanDatefromSQLDate($SQLDate);
}

function germ_datestring_to_sql($datestring)
{
    $arr = explode(".", $datestring);
    $temp = trim($arr[2]) . '-' . trim($arr[1]) . '-' . trim($arr[0]);
    return $temp;
}

function sql_to_germ_datestring($datestring)
{
    $datestring = str_replace('00:00:00', '', $datestring);
    $datestring = trim($datestring);

    $arr = explode("-", $datestring);
    $temp = $arr[2] . '.' . $arr[1] . '.' . $arr[0];
    if ($temp == '00.00.0000') {
        return '';
    } else {
        return $temp . '';
    }
}

function addDaysToTimeStamp($aAddDays, $aTimestamp)
{
    return mktime(
        date("H", $aTimestamp),
        date("i", $aTimestamp),
        date("s", $aTimestamp),
        date("m", $aTimestamp),
        date("d", $aTimestamp) + $aAddDays,
        date("Y", $aTimestamp));
}

function subtractDaysFromTimeStamp($aAddDays, $aTimestamp)
{
    return mktime(
        date("H", $aTimestamp),
        date("i", $aTimestamp),
        date("s", $aTimestamp),
        date("m", $aTimestamp),
        date("d", $aTimestamp) - $aAddDays,
        date("Y", $aTimestamp));
}

function makeExpireDate($daysToAdd)
{
    return mktime(date("H"), date("i"), date("s"), date("m"), date("d") + $daysToAdd, date("Y"));
}

function makeExpireDateFromTimeStamp($timestamp, $daysToAdd)
{
    return mktime(date("H"), date("i"), date("s"), date("m"), date("d") + $daysToAdd, date("Y"));
}

function getDateAddHours($aTimeStamp, $Hours)
{
    return mktime(date("H", $aTimeStamp) + $Hours, date("i", $aTimeStamp), date("s", $aTimeStamp), date("m", $aTimeStamp), date("d", $aTimeStamp), date("Y", $aTimeStamp));
}

function getDateAddMonths($aTimeStamp, $aMonths)
{
    return mktime(date("H", $aTimeStamp), date("i", $aTimeStamp), date("s", $aTimeStamp), date("m", $aTimeStamp) + $aMonths, date("d", $aTimeStamp), date("Y", $aTimeStamp));
}

function getDateAddDays($aTimeStamp, $aDays)
{
    return mktime(date("H", $aTimeStamp), date("i", $aTimeStamp), date("s", $aTimeStamp), date("m", $aTimeStamp), date("d", $aTimeStamp) + $aDays, date("Y", $aTimeStamp));
}

function getDateSubstMonths($aTimeStamp, $aMonths)
{
    return mktime(date("H", $aTimeStamp), date("i", $aTimeStamp), date("s", $aTimeStamp), date("m", $aTimeStamp) - $aMonths, date("d", $aTimeStamp), date("Y", $aTimeStamp));
}

function formatDate($aDate)
{
    // aDate should have Ymd format
    global $date_format;
    $year = substr($aDate, 0, 4);
    $month = substr($aDate, 4, 2);
    $day = substr($aDate, 6, 2);
    // Date_format grabbed from settings...
    $date_added_1 = $date_format;
    $date_added_1 = str_replace("d", "$day", $date_added_1);
    $date_added_1 = str_replace("m", "$month", $date_added_1);
    $date_added_1 = str_replace("y", "$year", $date_added_1);
    $ad_date1 = $date_added_1;
    return $ad_date1;
}

function formatDateShort($aTimestamp)
{
    global $set_date_format_short;

    if (!empty($aTimestamp))
        return date($set_date_format_short, $aTimestamp);
    else
        return "";
}

function formatDateLong($aTimestamp)
{
    global $set_date_format_long;

    if (!empty($aTimestamp))
        return date($set_date_format_long, $aTimestamp);
    else
        return "";
}

function formatDateClock($aTimestamp)
{
    global $set_date_format;
    if (!empty($aTimestamp))
        return date("H:i", $aTimestamp);
}

// ende datefunctions
/*function q($aSQL)
{
    $res = mysql_query($aSQL) or die(failMsg("Invalid MySql query:<br>" . $aSQL, mysql_error()));
    return $res;
}*/

function failMsg($aTitle, $aContent)
{


    echo "<p><b style='color:red'>Error occurred on " . curPageName() . "</b><br />
	We are sorry, but an unexpected error occurred and the system could not continue serving you.
	</p>";
    echo "<p><b>" . $aTitle . "</b><br /> " . $aContent . "</p>";
    $show_bar = 0;
}

function left($string, $count)
{
    return substr($string, 0, $count);
}

function right($str, $length)
{
    return substr($str, -$length);
}

function nuf($number)
{
    if ($number == '') $number = 0;
    return number_format($number, 0, ',', '.');
}

function nuf_d($number)
{
    if ($number == '') $number = 0;
    return number_format($number, 2, ',', '.');
}

function nuf_d1($number)
{
    if ($number == '') $number = 0;
    $number = floatval($number);
    return number_format($number, 2, '.', '');

}

function deuml($text)
{
    /*
<p>&agrave;
</p>
<p>&aacute;</p>
<p>&acirc;</p>
<p>&egrave;</p>
<p>&eacute;</p>
<p>&ecirc;</p>
<p>&ugrave;</p>
<p>&uacute;</p>
<p>&ucirc;</p>
<p>&Agrave;</p>
<p>&Aacute;</p>
<p>&Acirc;</p>
<p>&Egrave;</p>
<p>&Eacute;</p>
<p>&Ecirc;</p>
<p>&Uacute;</p>
<p>&Ugrave;</p>
<p>&Ucirc;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
*/
    $text = str_replace('�', '&auml;', $text);
    $text = str_replace('�', '&ouml;', $text);
    $text = str_replace('�', '&uuml;', $text);
    $text = str_replace('�', '&Auml;', $text);
    $text = str_replace('�', '&Ouml;', $text);
    $text = str_replace('�', '&Uuml;', $text);
    $text = str_replace('�', '&szlig;', $text);
//$text = str_replace('&','&amp;',$text); // Nein - ruiniert es
//$text = str_replace('xxxxxxxxxxx','&#8364;',$text);
    $text = str_replace('�', '&#8364;', $text);
    $text = str_replace('�', '&eacute;', $text);
    $text = str_replace('�,', '&Eacute;', $text);
    return $text;
}


function uml($text)
{

    $text = str_replace('&auml;', '�', $text);
    $text = str_replace('&ouml;', '�', $text);
    $text = str_replace('&uuml;', '�', $text);
    $text = str_replace('&Auml;', '�,', $text);
    $text = str_replace('&Ouml;', '�', $text);
    $text = str_replace('&Uuml;', '�', $text);
    $text = str_replace('&szlig;', '�', $text);
//$text = str_replace('&#8364;','�',$text);
//$text = str_replace('&eacute;','�',$text);
//$text = str_replace('&Eacute;','�,',$text);
    return $text;
}

function uml_table($table, $field, $id_field_name = 'id')
{
    $sql = "select * from " . $table;
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $field_txt = $row[$field];
        $id = $row[$id_field_name];
        if (has_uml($field_txt)) {
            $field_txt = encodeToUtf8(uml($field_txt));
            $sql = "update " . $table . " set " . $field . " = '" . addslashes($field_txt) . "' where " . $id_field_name . " = " . $id;
            q($sql);
        }

    }
    mysql_free_result($sql_result);
}

function has_uml($txt)
{
    if (trim($txt) == '') return false;
    if (strstr($txt, '&auml;')) return true;
    if (strstr($txt, '&ouml;')) return true;
    if (strstr($txt, '&uuml;')) return true;
    if (strstr($txt, '&Auml;')) return true;
    if (strstr($txt, '&Ouml;')) return true;
    if (strstr($txt, '&Uuml;')) return true;
    if (strstr($txt, '&szlig;')) return true;

}


function remove_linebreak($temp)
{
    $temp = nl2br($temp);
    $temp = str_replace("<br>", " ", $temp);
    $temp = str_replace("\n", " ", $temp);
    $temp = str_replace("\r", " ", $temp);
    $temp = str_replace("<br />", " ", $temp);
    $temp = str_replace("<br>", " ", $temp);
    $temp = str_replace("<br />", " ", $temp);
    $temp = strToDb($temp);
    return $temp;
}


function ecdb($txt, $bold = false, $style = "")
{
    global $debug_show_index_page_no;
    if (to_bool($debug_show_index_page_no)) {
        if ($bold) {
            $bold_txt = 'font-weight:bold;';
        } else {
            $bold_txt = '';
        }
        if ($style <> '') $style_txt = ';' . $style . ';';
        if (i_am_superadmin()) echo '<div style="font-size:1.2em;padding:3px 10px;background:#e9ffe9;color:#001;' . $bold_txt . $style . '">' . $txt . '</div>';
    }
}


function ec($txt, $bold = false, $style = "")
{
    if ($bold) {
        $bold_txt = 'font-weight:bold;';
    } else {
        $bold_txt = '';
    }
    if ($style <> '') $style_txt = ';' . $style . ';';
    echo '<div style="font-size:1.2em;padding:3px 10px;background:#ffffe9;color:#001;' . $bold_txt . $style . '">' . $txt . '</div>';

}

function rec($txt, $bold = false, $style = "")
{
    if ($bold) {
        $bold_txt = 'font-weight:bold;';
    } else {
        $bold_txt = '';
    }
    if ($style <> '') $style_txt = ';' . $style . ';';
    return '<div style="font-size:1.2em;padding:3px 10px;background:#ffffe9;color:#001;' . $bold_txt . $style . '">' . $txt . '</div>';
}


function ec_conf($txt, $id_add = '')
{
    if ($id_add == '') {
        srand(microtime() * 1000000);
        $zufall = rand(1, 100000);
        $id_add = $zufall;
    }
    echo '<div id="conf_div' . $id_add . '" style="display:display;font: 14px verdana, arial, sans-serif;padding:10px 10px;color:#333;background:#daff8c;text-align:left;border:1px #ccc outset;margin: 6px"><img onclick="weg2(\'conf_div' . $id_add . '\',\'shrink\')" src="' . DIR_WS_CATALOG_IMAGES . 'icons/close.gif" width="19" height="19" hspace="4" title="schliessen" style="float:right">' . $txt .
        '</div>';
}

function ec_alert($txt)
{
    echo '<div id="conf_div" style="display:display;font: 14px verdana, arial, sans-serif;padding:10px 10px;background:#faa;text-align:left;border:1px #ccc outset;margin: 6px"><img onclick="weg2(\'conf_div\',\'shrink\')" src="' . DIR_WS_CATALOG_IMAGES . 'icons/close.gif" width="19" height="19" hspace="4" title="schliessen" style="float:right">' . $txt .
        '</div>';
}

function ec_conf_id($txt, $id)
{
    echo '<div id="conf_div' . $id . '" style="display:display;font: 14px verdana, arial, sans-serif;padding:10px 10px;background:#daff8c;text-align:left;border:1px #ccc outset;margin: 6px"><img onclick="weg2(\'conf_div' . $id . '\',\'shrink\')" src="' . DIR_WS_CATALOG_IMAGES . 'icons/close.gif" width="19" height="19" hspace="4" title="schliessen" style="float:right">' . $txt .
        '</div>';
}

function ec_id_class_style($txt, $id, $class = "", $style = "")
{

//$r='<img title="Informationen ein- und ausblenden" src="../images/icon4/toggle/24/toggle-collapse-alt.png" width="'.$size.'" height="'.$size.'" style="float:right;margin:-9px -8px 0 0" onclick="box_toggle_vis(\''.$id.'\',\'blind\')" />';

//echo '<div class="'.$class.'" id="conf_div'.$id.'" style="'.$style.'"><img onclick="weg2(\'conf_div'.$id.'\',\'shrink\')" src="'.DIR_WS_CATALOG_IMAGES.'icons/close.gif" width="19" height="19" hspace="4" title="schliessen" style="float:right">'.$txt.'</div>';

    echo '<div class="' . $class . '" id="conf_div' . $id . '" style="' . $style . '"><img title="Informationen ein- und ausblenden" src="../images/icon4/toggle/24/toggle-collapse-alt.png" width="' . $size . '" height="' . $size . '" style="float:right;margin:-9px -8px 0 0" onclick="box_toggle_vis(\'conf_div' . $id . '\',\'fade\')" />' . $txt . '</div>';


}


function ec_alert_id($txt, $id)
{
    echo '<div id="conf_div' . $id . '" style="display:display;font: 14px verdana, arial, sans-serif;padding:10px 10px;background:#faa;text-align:left;border:1px #ccc outset;margin: 6px"><img onclick="weg2(\'conf_div' . $id . '\',\'shrink\')" src="' . DIR_WS_CATALOG_IMAGES . 'icons/close.gif" width="19" height="19" hspace="4" title="schliessen" style="float:right">' . $txt .
        '</div>';
}


function commify($wert)
{
    $decimals = 2;
    $dec_point = ',';
    $thousands_sep = '.';
    if ($decimals == -1) {
        if (preg_match('/\.\d+/', $wert)) {
            //return number_format($wert) . preg_replace('/.*(\.\d+).*/', '$1', $wert);
            $x = number_format($wert) . preg_replace('/.*(\.\d+).*/', '$1', $wert);

            if (strpos($x, '.00') === true) {
                $result = number_format(str_replace(trim($x), ".00", ".-"));
            } else {
                $result = number_format($x);
            }
        } else {
            $x = $wert;
            if (strpos($x, '.00') === true) {
                $result = number_format(str_replace(trim($x), ".00", ".-"));
            } else {
                $result = number_format($x);
            }
        }
    } else {
        $result = number_format($wert, $decimals, $dec_point, $thousands_sep);
    }
    if ($result == '0,00') $result = 'k.A.';
    $result = str_replace($ad_id . ",00", ".-", $result);
    return $result;
}

function properCase($strIn)
{
    $retVal = '';
    $arrTmp = explode(" ", trim($strIn));
    for ($i = 0; $i < count($arrTmp); $i++) {
        $firstLetter = substr($arrTmp[$i], 0, 1);
        if (isAlpha($firstLetter)) {
            $rest = substr($arrTmp[$i], 1, strlen($arrTmp[$i]));
            $arrOut[$i] = strtoupper($firstLetter) . strtolower($rest);

        } else {
            $firstLetter = substr($arrTmp[$i], 0, 1);
            $secondLetter = substr($arrTmp[$i], 1, 1);
            $rest = substr($arrTmp[$i], 2, strlen($arrTmp[$i]));
            $arrOut[$i] = $firstLetter . strtoupper($secondLetter) . strtolower($rest);
        }
    }
    for ($j = 0; $j < count($arrOut); $j++)
        $retVal .= $arrOut[$j] . " ";
    return trim($retVal);
}

function isAlpha($character)
{
    $c = Ord($character);
    return ((($c >= 64) && ($c <= 90)) || (($c >= 97) && ($c <= 122)));
}

function haversine($lat1, $lon1, $lat2, $lon2)
{
    $lat1 = deg2rad($lat1);
    $sinl1 = sin($lat1);
    $lat2 = deg2rad($lat2);
    $lon1 = deg2rad($lon1);
    $lon2 = deg2rad($lon2);

    return (7926 - 26 * $sinl1) * asin(min(1, 0.707106781186548 * sqrt((1 - (sin($lat2) * $sinl1) - cos($lat1) * cos($lat2) * cos($lon2 - $lon1)))));
}

function miles_to_km($M)
{
    return $M * 1.609344;
}

function km_to_miles($km)
{
    return $km / 1.609344;
}

//aus GoogleMapAPI.class.php
function geoGetDistance2($lat1, $lon1, $lat2, $lon2, $unit = 'K')
{
    // calculate miles
    $M = 69.09 * rad2deg(acos(sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($lon1 - $lon2))));
    switch (strtoupper($unit)) {
        case 'K':
            // kilometers
            return $M * 1.609344;
            break;
        case 'N':
            // nautical miles
            return $M * 0.868976242;
            break;
        case 'F':
            // feet
            return $M * 5280;
            break;
        case 'I':
            // inches
            return $M * 63360;
            break;
        case 'M':
        default:
            // miles
            return $M;
            break;
    }
}

function get_myf_lat()
{
//siehe Excel in G:\Projekte\Kleinanzeigen\mysql und Geocodes
    return 0.0099522;
}

function get_myf_lon()
{
    return 0.01332334;
}

function isAjax()
{
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER ['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
        return true;
    } else {
        return false;
    }

}

function pp($arr, $txt = '')
{
    if ($txt <> '') $txt = '<div style="font-weight:bold;background:#ffa">' . $txt . '</div>';
    $retStr = '<ul>';
    if (is_array($arr)) {
        foreach ($arr as $key => $val) {
            if (is_array($val)) {
                $retStr .= '<li>' . $key . ' => ' . pp($val) . '</li>';
            } else {
                $retStr .= '<li>' . $key . ' => ' . $val . '</li>';
            }
        }
    }
    $retStr .= '</ul>';
    return $txt . $retStr;
}

function print_ar($array, $count = 0)
{
    $i = 0;
    $tab = '';
    while ($i != $count) {
        $i++;
        $tab .= "&nbsp;&nbsp;|&nbsp;&nbsp;";
    }
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            echo $tab . "[<strong><u>$key</u></strong>]<br />";
            $count++;
            print_ar($value, $count);
            $count--;
        } else {
            $tab2 = substr($tab, 0, -12);
            echo "$tab2~ $key: <strong>$value</strong><br />";
        }
        $k++;
    }
    $count--;
}

function debug_POST()
{
    echo('<p style="font-size:1.4em;color:#666">' . '$_POST' . '</p>');
    foreach ($_POST as $keyname => $value) {
        echo('<p style="font-size:1.1em;color:#666;margin:0px"> <b>' . $keyname . ' --&gt; ' . $value . '</b></p>');
    }
}

function debug_GET()
{
    echo('<p style="font-size:1.4em;color:#666">' . '$_GET' . '</p>');
    foreach ($_GET as $keyname => $value) {
        echo('<p style="font-size:1.1em;color:#666;margin:0px"> <b>' . $keyname . ' --&gt; ' . $value . '</b></p>');
    }
}

function debug_SESSION_new()
{
    echo var_dump($_SESSION);
}

function debug_SESSION()
{
    echo('<p style="font-size:1.4em;color:#666">' . '$_SESSION' . '</p>');
    foreach ($_SESSION as $keyname => $value) {
        echo('<p style="font-size:1.1em;color:#666;margin:0px"> <b>' . $keyname . ' --&gt; ' . $value . '</b></p>');
    }
}

function debug_REQUEST()
{
    echo('<p style="font-size:1.4em;color:#666">' . '$_REQUEST' . '</p>');
    foreach ($_REQUEST as $keyname => $value) {
        echo('<p style="font-size:1.1em;color:#666;margin:0px"> <b>' . $keyname . ' --&gt; ' . $value . '</b></p>');
    }
}

function debug_COOKIE()
{
    echo('<p style="font-size:1.4em;color:#666">' . '$_COOKIE' . '</p>');
    foreach ($_COOKIE as $keyname => $value) {
        echo('<p style="font-size:1.1em;color:#666;margin:0px"> <b>' . $keyname . ' --&gt; ' . $value . '</b></p>');
    }
}

function debug_ENV()
{
    echo('<p style="font-size:1.4em;color:#666">' . '$_ENV' . '</p>');
    foreach ($_ENV as $keyname => $value) {
        echo('<p style="font-size:1.1em;color:#666;margin:0px"> <b>' . $keyname . ' --&gt; ' . $value . '</b></p>');
    }
}

function debug_FILES()
{
    echo('<p style="font-size:1.4em;color:#666">' . '$_FILES' . '</p>');
    foreach ($_FILES as $keyname => $value) {
        echo('<p style="font-size:1.1em;color:#666;margin:0px"> <b>' . $keyname . ' --&gt; ' . $value . '</b></p>');
    }
}

// DuplicateMySQLRecord ('newsletter_jobs', 'job_id', 10)
function DuplicateMySQLRecord($table, $id_field, $id)
{
    // load the original record into an array
    $result = mysql_query("SELECT * FROM {$table} WHERE {$id_field}={$id}");
    $original_record = mysql_fetch_assoc($result);

    // insert the new record and get the new auto_increment id
    mysql_query("INSERT INTO {$table} (`{$id_field}`) VALUES (NULL)");
    $newid = mysql_insert_id();

    // generate the query to update the new record with the previous values
    $query = "UPDATE {$table} SET ";
    foreach ($original_record as $key => $value) {
        if ($key != $id_field) {
            $query .= '`' . $key . '` = "' . str_replace('"', '\"', $value) . '", ';
        }
    }
    $query = substr($query, 0, strlen($query) - 2); # lop off the extra trailing comma
    $query .= " WHERE {$id_field}={$newid}";
    mysql_query($query);

    // return the new id
    return $newid;
}

function get_url($show_port = false)
//http://de2.php.net/reserved.variables (sicherer als HTTP Referer ?!)
// returns die normale URL
{
    if ($_SERVER['HTTPS']) {
        $my_url = 'https://';
    } else {
        $my_url = 'http://';
    }
    $my_url .= $_SERVER['HTTP_HOST'];
    if ($show_port) {
        $my_url .= ':' . $_SERVER['SERVER_PORT'];
    }
    $my_url .= $_SERVER['SCRIPT_NAME'];
    if ($_SERVER['QUERY_STRING'] != null) {
        $my_url .= '?' . $_SERVER['QUERY_STRING'];
    }
    return $my_url;
}

function setUrlVariables()
{
//http://de2.php.net/reserved.variables
//use: setUrlVariables("var", "value");
//use: setUrlVariables("var", "");
    $arg = array();
    $string = "?";
    $vars = $_GET;
    for ($i = 0; $i < func_num_args(); $i++)
        $arg[func_get_arg($i)] = func_get_arg(++$i);
    foreach (array_keys($arg) as $key)
        $vars[$key] = $arg[$key];
    foreach (array_keys($vars) as $key)
        if ($vars[$key] != "") $string .= $key . "=" . $vars[$key] . "&";
    if (SID != "" && SID != "SID" && $_GET["PHPSESSID"] == "")
        $string .= htmlspecialchars(SID) . "&";
    return htmlspecialchars(substr($string, 0, -1));
}

function make_google_map_url($strasse, $plz, $ort, $land)
{

    $land_long = get_country_long($land);
    $land_long = htmlentities($land_long);
    if ($strasse <> '') {
        $google_map_url = "http://maps.google.com/maps?f=q&hl=de&q=" . $strasse . ",%2B" . $plz . "%2B" . $ort . ",%2B" . $land_long . "&sll=37.0625,-95.677068&sspn=47.972233,81.035156&ie=UTF8&om=1&z=16&iwloc=addr";
    } else {
        $google_map_url = "http://maps.google.com/maps?f=q&hl=de&q=" . $plz . "%2B" . $ort . ",%2B" . $land_long . "&sll=37.0625,-95.677068&sspn=47.972233,81.035156&ie=UTF8&om=1&z=16&iwloc=addr";
    }
    return $google_map_url;
}

/*
function getParam($aVarName,$aVarAlt){

	$lVarName=$_REQUEST[$aVarName];
	if (!Empty($lVarName)){
		if (is_array($lVarName))
		{
			$lReturnArray = array();
			foreach ($lVarName as $key => $value) {
				$value=cleanInput($value);
				$key=cleanInput($key);
				$lReturnArray[$key]=$value;
			}
			return $lReturnArray;
		}
		else
			return cleanInput($lVarName);
	}
	else
		return $aVarAlt;
}
*/

function getParamCookie($aVarName, $aVarAlt)
{

    $lVarName = $_COOKIE[$aVarName];
    if (!Empty($lVarName)) {
        return cleanInput($lVarName);
    } else {
        return $aVarAlt;
    }
}


function getParam($aVarName, $aVarAlt)
{

    $lVarName = $_REQUEST[$aVarName];
    //$lVarName=$_GET[$aVarName];
    if (!Empty($lVarName)) {
        if (is_array($lVarName)) {
            $lReturnArray = array();
            foreach ($lVarName as $key => $value) {
                $value = cleanInput($value);
                $key = cleanInput($key);
                $lReturnArray[$key] = $value;
            }
            return $lReturnArray;
        } else
            return cleanInput($lVarName);
    } else {
        $lVarName = $_COOKIE[$aVarName];
        if (!Empty($lVarName)) {
            return cleanInput($lVarName);
        } else {
            return $aVarAlt;
        }
    }
}


function getParamInt($aVarName, $aVarAlt)
{
    $lNum = "";

    if ($_REQUEST["$aVarName"] != "")
        $lNum = $_REQUEST["$aVarName"];
    elseif ($_REQUEST["$aVarName"] != "")
        $lNum = $_REQUEST["$aVarAlt"];

    return preg_replace('/\D+(\.)+/', '', $lNum);
}

function cleanInput($var)
{
    return $var;
}

function strEncISO($aStr)
{
    $lLangSet = "iso-8859-1";
    return htmlentities($aStr, ENT_QUOTES, $lLangSet);
}

function strEnc($aStr)
{
    $lLangSet = "utf-8";
    return htmlentities($aStr, ENT_QUOTES, $lLangSet);
}

function strEncUTF($aStr)
{
    $lLangSet = "utf-8";
    return htmlentities($aStr, ENT_QUOTES, $lLangSet);
}

function dotString($aText, $aSize)
{
//$aText = uml($aText);
    if (strlen($aText) > $aSize) $aText = substr($aText, 0, $aSize) . "&#8230;";
    //if (strlen($aText)>$aSize)	$aText=substr($aText,0,$aSize) . "...";
//$aText = deuml($aText);
    return $aText;
}

function getRemoteIp()
{
    return getenv("REMOTE_ADDR");
}

function makePDF($aInputHtmlPath, $aOutPutPDFPath)
{
    if (!file_exists($aInputHtmlPath))
        return file_not_present;

    $file_pointer = fopen($html_file, "w");
    fwrite($file_pointer, $line);
    fclose($file_pointer);

    $commandString = "htmldoc --webpage --firstpage toc --jpeg --permissions all -f $aOutPutPDFPath $aInputHtmlPath 2>&1";
    $command = exec($commandString, $output);
    exec($commandString);

    if (file_exists($aOutPutPDFPath))
        return true;
    else
        return pdf_not_created;
}

function echo_Fields($aTableName)
{
    global $set_mysql_base;
    //$res=q("show fields from $aTableName from $set_mysql_base");
    $res = q("show fields from $aTableName");

    while ($row = mysql_fetch_array($res)) {
        $lFieldArray[$i]["Field"] = $row["Field"];
        ec($row["Field"]);
        $i++;
    }
    mysql_free_result($res);
    return $lFieldArray;
}

function echo_Columns($aTableName)
{
    global $set_mysql_base;
    //$res=q("show fields from $aTableName from $set_mysql_base");
    $res = q("show columns from $aTableName");

    while ($row = mysql_fetch_array($res)) {
        $lFieldArray[$i]["Field"] = $row["Field"];
        ec($row["Field"] . ' - ' . $row["Type"] . ' - ' . $row["extra"]);
        $i++;
    }
    mysql_free_result($res);
    return $lFieldArray;
}

function checkIfExistsField($lFields, $aTableName, $aField)
{

    if (!empty($lFields)) {

        foreach ($lFields as $lField) {
            if (trim($aField) == trim($lField))
                return true;

        }
    }
    return false;
}

function getFields($aTableName)
{
    //global $set_mysql_base;
    //$res=q("show fields from $aTableName from `$set_mysql_base`");
    // ? oder columns ?
    $res = q("show fields from $aTableName ");

    while ($row = mysql_fetch_array($res)) {
        $lFieldArray[$i]["Field"] = $row["Field"];
        $lFieldArray[$i]["Type"] = $row["Type"];
        $lFieldArray[$i]["Extra"] = $row["extra"];
        $i++;


    }
    mysql_free_result($res);
    return $lFieldArray;
}

function getIndex($aTableName)
{
    global $set_mysql_base;
    $sql = "SHOW INDEX FROM $aTableName FROM `$set_mysql_base`";
    $res = mysql_query($sql);
    $row = mysql_fetch_array($res);
    return $row["Column_name"];
}
/*
function getAllTables()
{
    global $set_mysql_base;

    $res = q("show tables from `$set_mysql_base`");
    while ($row = mysql_fetch_array($res)) {
        $resFields = q("show fields from " . $row[0] . " from `$set_mysql_base`");
        while ($row_fields = mysql_fetch_array($resFields)) {
            $lFieldArray[$i]["Table"] = $row[0];
            $lFieldArray[$i]["Field"] = $row_fields["Field"];
            $lFieldArray[$i]["Type"] = $row_fields["Type"];
            $lFieldArray[$i]["Extra"] = $row_fields["Extra"];
            $i++;


        }


    }
    mysql_free_result($res);
    return $lFieldArray;
}*/

function mysql_draw_table($sql, $null = '&nbsp;', $table_class, $table_header_class, $add_js_to_field = '', $js_function = '')
{
    // Sanity check
    $result = q($sql);
    if (!is_resource($result) ||
        substr(get_resource_type($result), 0, 5) !== 'mysql'
    ) {
        return false;
    }

    $out = "<table class=\"" . $table_class . "\">\n";

    if (is_dev()) $out .= "<tr><td style='color:#c44' colspan=\"" . mysql_num_fields($result) . "\">" . $sql . "</td></tr>";

    // Table header
    $out .= "\t<tr>";
    for ($i = 0, $ii = mysql_num_fields($result); $i < $ii; $i++) {
        $out .= '<th class="' . $table_header_class . '">' . mysql_field_name($result, $i) . '</th>';
    }
    $out .= "</tr>\n";

    // Table content
    for ($i = 0, $ii = mysql_num_rows($result); $i < $ii; $i++) {
        $out .= "\t<tr>";

        $row = mysql_fetch_row($result);
        $xxi = 0;
        foreach ($row as $value) {
            $xxi++;
            // Display empty cells
            $value = (empty($value) && ($value != '0')) ?
                $null :
                htmlspecialchars($value);

            if ($xxi == 1 and $js_function <> '') {
                $out .= '<td><a href="javascript:' . $js_function . '(' . $value . ')">' . $value . '</a></td>';
            } else {
                $out .= '<td>' . $value . '</td>';
            }

        }
        $out .= "</tr>\n";
    }
    $out .= "</table>\n";
// echo $out;
    return $out;
}

/*
function browser_detection( $which_test ) {
global $browser;
	// initialize the variables
	$browser = '';
	$dom_browser = '';
	// set to lower case to avoid errors, check to see if http_user_agent is set
	$navigator_user_agent = ( isset( $_SERVER['HTTP_USER_AGENT'] ) ) ? strtolower( $_SERVER['HTTP_USER_AGENT'] ) : '';
	// run through the main browser possibilities, assign them to the main $browser variable
	if (stristr($navigator_user_agent, "opera"))
	{
		$browser = 'opera';
		$dom_browser = true;
	}
	elseif (stristr($navigator_user_agent, "msie 4"))
	{
		$browser = 'msie4';
		$dom_browser = false;
	}
	elseif (stristr($navigator_user_agent, "msie"))
	{
		$browser = 'msie';
		$dom_browser = true;
	}
	elseif ((stristr($navigator_user_agent, "konqueror")) || (stristr($navigator_user_agent, "safari")))
	{
		$browser = 'safari';
		$dom_browser = true;
	}
	elseif (stristr($navigator_user_agent, "gecko"))
	{
		$browser = 'mozilla';
		$dom_browser = true;
	}

	elseif (stristr($navigator_user_agent, "mozilla/4"))
	{
		$browser = 'ns4';
		$dom_browser = false;
	}

	else
	{
		$dom_browser = false;
		$browser = false;
	}
	// return the test result you want
	if ( $which_test == 'browser' )
	{
		return $browser;
	}
	elseif ( $which_test == 'dom' )
	{
		return $dom_browser;
		// note: $dom_browser is a boolean value, true/false, so you can just test if
		// it's true or not.
	}
}
*/
/*
you would call it like this:
$user_browser = browser_detection('browser');
if ( $user_browser == 'opera' )
{
	do something;
}
or like this:
if ( browser_detection('dom') )
{
	execute the code for dom browsers
}
else
{
	execute the code for non DOM browsers
}
and so on.......
*/


function browser_detection($which_test)
{
//global $browser;
    // initialize variables
    $browser_name = '';
    $browser_number = '';
    // get userAgent string
    $browser_user_agent = (isset($_SERVER['HTTP_USER_AGENT'])) ? strtolower($_SERVER['HTTP_USER_AGENT']) : '';
    //pack browser array
    // values [0]= user agent identifier, lowercase, [1] = dom browser, [2] = shorthand for browser,
    $a_browser_types = array(
        array('opera', true, 'op'),
        array('msie', true, 'ie'),
        array('konqueror', true, 'konq'),
        # comment out safari if you just want basic webkit detection.
        array('safari', true, 'saf'),
        # note, sometimes 'like gecko' string is in webkit ua so needs to be before gecko
        array('webkit', true, 'webkit'),
        array('gecko', true, 'moz'),
        array('mozilla/4', false, 'ns4'),
        # this will set a default 'unknown' value
        array('other', false, 'other')
    );

    $i_count = count($a_browser_types);
    for ($i = 0; $i < $i_count; $i++) {
        $s_browser = $a_browser_types[$i][0];
        $b_dom = $a_browser_types[$i][1];
        $browser_name = $a_browser_types[$i][2];
        // if the string identifier is found in the string
        if (stristr($browser_user_agent, $s_browser)) {
            // we are in this case actually searching for the 'rv' string, not the gecko string
            // this test will fail on Galeon, since it has no rv number. You can change this to
            // searching for 'gecko' if you want, that will return the release date of the browser
            if ($browser_name == 'moz') {
                $s_browser = 'rv';
            }
            $browser_number = browser_version($browser_user_agent, $s_browser);
            break;
        }
    }
    // which variable to return
    if ($which_test == 'browser') {
        return $browser_name;
    } elseif ($which_test == 'number') {
        # this will be null for default other category, so make sure to test for null
        return $browser_number;
    } /* this returns both values, then you only have to call the function once, and get
	 the information from the variable you have put it into when you called the function */
    elseif ($which_test == 'full') {
        $a_browser_info = array($browser_name, $browser_number);
        return $a_browser_info;
    }
}

// function returns browser number or gecko rv number
// this function is called by above function, no need to mess with it unless you want to add more features
function browser_version($browser_user_agent, $search_string)
{
    $string_length = 8;// this is the maximum  length to search for a version number
    //initialize browser number, will return '' if not found
    $browser_number = '';

    // which parameter is calling it determines what is returned
    $start_pos = strpos($browser_user_agent, $search_string);

    // start the substring slice 1 space after the search string
    $start_pos += strlen($search_string) + 1;

    // slice out the largest piece that is numeric, going down to zero, if zero, function returns ''.
    for ($i = $string_length; $i > 0; $i--) {
        // is numeric makes sure that the whole substring is a number
        if (is_numeric(substr($browser_user_agent, $start_pos, $i))) {
            $browser_number = substr($browser_user_agent, $start_pos, $i);
            break;
        }
    }
    return $browser_number;
}


/* sample:
include('browser_detection.php');
$a_browser_data = browser_detection('full');
if ( $a_browser_data[0] !== 'ie' )
{
	execute the non msie conditions
}
else // if it is msie, that is
{
	if ( $a_browser_data[1] >= 5 )
	{
		execute the ie stuff
	}
}
*/


function check_email_address($email)
{
    if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
        return false;
    }
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
        if
        (!preg_match("[^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$]",
            $local_array[$i])
        ) {
            return false;
        }
    }
    if (!preg_match("[^\[?[0-9\.]+\]?$]", $email_array[1])) {
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
            return false; // Not enough parts to domain
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if
            (!preg_match("[^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$]",
                $domain_array[$i])
            ) {
                return false;
            }
        }
    }
    return true;
}

function get_ext($fileName)
{
    return strtolower(substr($fileName, strrpos($fileName, '.') + 1));
}

function do_mde()
{ // demo Mode
    return true;
}

function do_exp()
{
    if (do_mde()) {
        return lookup("select div_res_long from diverses where div_what ='inst_for'", "div_res_long");
    } else {
        return '01.01.2108';
    }
}

/*
function inst_for_url(){
$url = HTTP_CATALOG_SERVER;
$x = lookup("select div_res from diverses where div_what ='inst_for'","div_res");
	if ( eregiS($x, $url) ) {
		return true;
	}else{
		return false;
		//return true;
	}
}
*/
function get_inst_for_url()
{
    return lookup("select div_res from diverses where div_what ='inst_for'", "div_res");
}

/*
function nuf($number){
return number_format($number, 0, ',', '.');
}
*/
function page_counter($i_am_superadmin = false, $i_am_admin = false)
{
//global $i_am_admin;
    if ($i_am_superadmin or $i_am_admin) {
//if (trim(get_dv('admin_current_ip_address')) == $_SERVER['REMOTE_ADDR'] ){

    } else {
        $vergl_datum = getDatefromTimestamp_short(time()); // z.B. 20.05.2008
        $getSQLDatefromTimestamp = getSQLDatefromTimestamp(time());
        $sql_pe = "Update pageviews_counter set views = views +1, datum = '" . $getSQLDatefromTimestamp . "', vergl_datum='" . $vergl_datum . "' ";
        q($sql_pe);

        $sq = "select vergl_datum from page_views order by id desc limit 1";
        $letztes_vergl_datum = lookup($sq, 'vergl_datum');

        if ($letztes_vergl_datum <> $vergl_datum) {
            $tage_seit_beginn = lookup('select tage_seit_begin from page_views order by id desc limit 1', 'tage_seit_begin');
            $tage_seit_beginn = $tage_seit_beginn + 1;
            $anz_views_today = lookup('select views from pageviews_counter limit 1', 'views');
            // eintragen in page_views
            $sq = "insert into page_views set views = " . $anz_views_today . ", datum = '" . $getSQLDatefromTimestamp . "', vergl_datum='" . $vergl_datum . "', tage_seit_begin = " . $tage_seit_beginn . " ";
            q($sq);
            // pageviews_counter auf 0 setzen
            $sql_pe = "Update pageviews_counter set views = 0, datum = '" . $getSQLDatefromTimestamp . "', vergl_datum='" . $vergl_datum . "' ";
            q($sql_pe);

        }
    }
}

function make_div_all_langs($what, $val)
{
// siehe ax_updater (admin) 206
    /*
		$what_l = $what.'_german';
		$sql_res = q("select div_what from diverses WHERE div_what='".$what_l."'");
		$z = mysql_num_rows($sql_res);
		if ($z==0){
			$sq3="Insert into diverses set div_what='".$what_l."', div_res='".$val."' ";
			q($sq3);
		}

		$sql="select * from languages where directory <> 'german' order by sort_order";
		$res=q($sql);

		while ($row=mysql_fetch_array($res)){
			$dir = $row["directory"];
			$text=trim($row["name"]);
			$what_this_l = $what.'_'.$dir;

			$sql_res = q("select div_what from diverses WHERE div_what='".$what_this_l."'");
			$z = mysql_num_rows($sql_res);
			if ($z==0){
				$sq3="Insert into diverses set div_what='".$what_this_l."', div_res='".$val."' ";
				q($sq3);
			}
		}
*/
}

//set_div_res_insup('akt_uebertragungs_art',$uebertr_art);
//set_div_res_insup('my_lon',$lon);

function make_multilang($what)
{
    $what = trim($what);
    $sql = "update diverses set is_multi_lng = 1 where div_what='" . $what . "'";
    q($sql);
}

function set_dv_is_multi_lang($what)
{
    $sql = "update diverses set is_multi_lng = 1 where div_what = '" . $what . "' ";
    q($sql);
}

function unset_dv_is_multi_lang($what)
{
    $sql = "update diverses set is_multi_lng = 0 where div_what = '" . $what . "' ";
    q($sql);
}


function create_dv($what, $val, $app_top = false)
{
    $what = trim($what);
    $sql_res = q("select div_what from diverses WHERE div_what='" . $what . "'");
    $z = mysql_num_rows($sql_res);
    if ($z == 0) {
        $sq3 = "Insert into diverses set div_what='" . $what . "', div_res='" . $val . "' ";
        q($sq3);
    }
    if ($app_top) {
        $sql = "update diverses set app_top = 1 where div_what='" . $what . "'";
        q($sql);
    }

}

function set_dv_if_not_exists_to($what, $val, $app_top = false)
{
    $what = trim($what);
    $sql_res = q("select div_what from diverses WHERE div_what='" . $what . "'");
    $z = mysql_num_rows($sql_res);
    if ($z == 0) {
        $sq3 = "Insert into diverses set div_what='" . $what . "', div_res='" . $val . "' ";
        q($sq3);
    } else {
        //$sql="update diverses set div_res='".$val."' where div_what='".$what."'";
        //q($sql);
    }
    if ($app_top) {
        $sql = "update diverses set app_top = 1 where div_what='" . $what . "'";
        q($sql);
    }


}

function set_dv_long_if_not_exists_to($what, $val, $app_top = false)
{
    $what = trim($what);
    $sql_res = q("select div_what from diverses WHERE div_what='" . $what . "'");
    $z = mysql_num_rows($sql_res);
    if ($z == 0) {
        $sq3 = "Insert into diverses set div_what='" . $what . "', div_res_long='" . $val . "' ";
        q($sq3);
    } else {
        //$sql="update diverses set div_res='".$val."' where div_what='".$what."'";
        //q($sql);
    }
    if ($app_top) {
        $sql = "update diverses set app_top = 1 where div_what='" . $what . "'";
        q($sql);
    }


}


function set_dv_insup($what, $val, $long = false)
{
    $what = trim($what);
    $sql_res = q("select div_what from diverses WHERE div_what='" . $what . "'");
    $z = mysql_num_rows($sql_res);
    if ($long) {
        $val = addslashes($val);
        if ($z == 0) {
            $sq3 = "Insert into diverses set div_what='" . $what . "', div_res_long='" . $val . "' ";
            q($sq3);
        } else {
            $sq3 = "UPDATE diverses set div_res_long='" . $val . "' where div_what='" . $what . "'";
            q($sq3);
        }
    } else {
        if ($z == 0) {
            $sq3 = "Insert into diverses set div_what='" . $what . "', div_res='" . $val . "' ";
            q($sq3);
        } else {
            $sq3 = "UPDATE diverses set div_res='" . $val . "' where div_what='" . $what . "'";
            q($sq3);
        }
    }
}


function set_div_res_insup($what, $val, $app_top = false, $do_update = true)
{
    $what = trim($what);
    $sql_res = q("select div_what from diverses WHERE div_what='" . $what . "'");
    $z = mysql_num_rows($sql_res);
    if ($z == 0) {
        if ($app_top) {
            $sq3 = "Insert into diverses set div_what='" . $what . "', div_res='" . $val . "', app_top = 1 ";
        } else {
            $sq3 = "Insert into diverses set div_what='" . $what . "', div_res='" . $val . "' ";
        }
        q($sq3);
    } else {
        if ($app_top) {
            $sq3 = "UPDATE diverses set div_res='" . $val . "', app_top = 1 where div_what='" . $what . "' ";
        } else {
            $sq3 = "UPDATE diverses set div_res='" . $val . "' where div_what='" . $what . "' ";
        }
        if ($do_update) q($sq3);
    }
}

function ins_dv_txt_all_langs($what, $val)
{
    $what = trim($what);
    $sql = "select * from languages where status = 1 order by sort_order";
    $res = q($sql);
    while ($row = mysql_fetch_array($res)) {
        $lang = $row["directory"];
        $what_l = $what . '_' . $lang;
        //set_div_res_insup($what_l,$val);

        $sql_res = q("select div_what from diverses WHERE div_what='" . $what_l . "'");
        $z = mysql_num_rows($sql_res);
        if ($z == 0) {
            $sq3 = "Insert into diverses set div_what='" . $what_l . "', div_res='" . $val . "' ";
            q($sq3);
        } else {
            //if ($lang=='german'){
            // nicht bereits gemacht �bersetzungen �berschreiben
            //$sq3="UPDATE diverses set div_res='".$val."' where div_what='".$what_l."'";
            //q($sq3);
            //}
        }
    }
    mysql_free_result($res);
}

//set_div_res_long_insup('akt_uebertragungs_art','teilweise');
function set_div_res_long_insup($what, $val)
{
    $what = trim($what);
    $sql_res = q("select div_what from diverses WHERE div_what='" . $what . "'");
    $z = mysql_num_rows($sql_res);
    if ($z == 0) {
        $sq3 = "Insert into diverses set div_what='" . $what . "', div_res_long='" . $val . "' ";
        q($sq3);
    } else {
        $sq3 = "UPDATE diverses set div_res_long='" . $val . "' where div_what='" . $what . "'";
        q($sq3);
    }
}

// $insid = insert_new_in_div('neuer_langer_begriff','',$long_begriff,$long_begriff_default)
function insert_new_in_div($what, $val_short, $val_long, $val_long_default)
{
    $sq3 = "Insert into diverses set div_what='" . $what . "', div_res='" . $val_short . "', div_res_long='" . $val_long . "', div_res_long_default='" . $val_long_default . "',  ";
    q($sq3);
    return mysql_insert_id();
}

//get_config_value_byKey('STORE_NAME')
function get_config_value_byKey($conf_key)
{
    $sql = "select configuration_value from configuration where configuration_key ='" . $conf_key . "'";
    return lookup($sql, 'configuration_value');
}


function get_config_key_from_id($conf_id)
{
    $sql = "select configuration_key from configuration where configuration_id ='" . $conf_id . "'";
    return lookup($sql, 'configuration_key');
}

function get_config_id_byKey($conf_key)
{
    $sql = "select configuration_id from configuration where configuration_key ='" . $conf_key . "'";
    return lookup($sql, 'configuration_id');
}

function lang()
{
    return $_SESSION['language'];
}

function get_dv_lang_new($t_key, $lang_code)
{
    $sql = "select div_res_" . $lang_code . " from diverses where div_what = '" . $t_key . "'    ";
    return lookup($sql, 'div_res_' . $lang_code);
}

function get_dv_long_lang_new($t_key, $lang_code)
{
    $sql = "select div_res_long_" . $lang_code . " from diverses where div_what = '" . $t_key . "'    ";
    return lookup($sql, 'div_res_long_' . $lang_code);
}


function get_dv_lang($what, $lang)
{
//$lang = language_code  de en fr ...
    $what_l = $what . "_" . $lang;
    $sql = "select div_res from diverses where div_what ='" . $what_l . "'";
//return  lookup($sql,'div_res_'.$lang);
    return lookup($sql, 'div_res');
}


function get_dv_lang2($what, $lang)
{
//$lang = language_code  de en fr ...
    $what_l = $what . "_" . $lang;
    $sql = "select div_res_" . $lang . " from diverses where div_what ='" . $what . "'";
    return lookup($sql, 'div_res_' . $lang);
}

function get_dv_lang2_or_german($what, $lang)
{
//$lang = language_code  de en fr ...
    if ($lang <> 'de' and $lang <> '') {
        $what_l = $what . "_" . $lang;
        $sql = "select div_res_" . $lang . " from diverses where div_what ='" . $what . "'";
        $r = lookup($sql, 'div_res_' . $lang);
        if ($r <> '') {
            return $r;
        } else {
            $sql = "select div_res from diverses where div_what ='" . $what . "'";
            $r = lookup($sql, 'div_res');
            return $r;
        }
    } else {
        $sql = "select div_res from diverses where div_what ='" . $what . "'";
        $r = lookup($sql, 'div_res');
        return $r;
    }
}


function get_dv_long_lang2($what, $lang)
{
    //$lang = language_code  de en fr ...
    $what_l = $what . "_" . $lang;
    $sql = "select div_res_long_" . $lang . " from diverses where div_what ='" . $what . "'";
    return lookup($sql, 'div_res_long_' . $lang);
}

function get_dv_long_lang2_or_german($what, $lang)
{
    //$lang = language_code  de en fr ...
    if ($lang <> 'de' and $lang <> '') {
        $what_l = $what . "_" . $lang;
        $sql = "select div_res_long_" . $lang . " from diverses where div_what ='" . $what . "'";
        $r = lookup($sql, 'div_res_long_' . $lang);
        if ($r <> '') {
            return $r;
        } else {
            $sql = "select div_res_long from diverses where div_what ='" . $what . "'";
            $r = lookup($sql, 'div_res_long');
            return $r;
        }
    } else {
        $sql = "select div_res_long from diverses where div_what ='" . $what . "'";
        $r = lookup($sql, 'div_res_long');
        return $r;
    }
}


function get_dv_lg($what)
{

    $lang = $_SESSION['language'];
    $what_l = $what . "_" . $lang;
    $sql = "select div_res from diverses where div_what ='" . $what_l . "'";
// wenn nicht vorhanden dann ohne endung _german usw. suchen und verwenden
// oder automatisch generieren und zun�chst deutschen Text verwenden, markieren zwecks auto-translation
// oder sofort auto �bersetzen
    return lookup($sql, 'div_res');
}

function get_dv_color($what)
{
    $curr_css = get_dv('css');
    $t_key = 'css' . $curr_css . '_' . $what;
    return get_dv($t_key);
}

function get_dv_t_key_txt($what)
{
    $sql = "select t_key_txt from diverses where div_what ='" . $what . "'";
    return lookup($sql, 't_key_txt');
}

function get_dv_t_key_detail_link($what)
{
    $sql = "select t_key_detail_link from diverses where div_what ='" . $what . "'";
    return lookup($sql, 't_key_detail_link');
}

function get_dv_t_key_comment($what)
{
    $sql = "select t_key_comment from diverses where div_what ='" . $what . "'";
    return lookup($sql, 't_key_comment');
}

function get_dv_nr($what)
{
    $sql = "select nr from diverses where div_what ='" . $what . "'";
    return lookup($sql, 'nr');
}

function get_dv_context($what)
{
    $sql = "select context from diverses where div_what ='" . $what . "'";
    return lookup($sql, 'context');
}

function get_dv_funktion($what)
{
    $sql = "select funktion from diverses where div_what ='" . $what . "'";
    return lookup($sql, 'funktion');
}

function get_dv_bemerkung($what)
{
    $sql = "select bemerkung from diverses where div_what ='" . $what . "'";
    return lookup($sql, 'bemerkung');
}

function get_dv_bemerkung_l($what)
{
    $sql = "select bemerkung_long from diverses where div_what ='" . $what . "'";
    return lookup($sql, 'bemerkung_long');
}

function get_dv_default($what)
{
    $sql = "select div_res_default from diverses where div_what ='" . $what . "'";
    return lookup($sql, 'div_res_default');
}

function remove_dv($what)
{
    $sql = "delete from diverses where div_what ='" . $what . "'";
    q($sql);
}

function set_dv_default($what, $val)
{
    $sql = "update diverses set div_res_default = '" . $val . "' where div_what ='" . $what . "'";
    q($sql);
}

function dv_on($what)
{
    $sql = "update diverses set div_res = 1 where div_what ='" . $what . "'";
    q($sql);
}

function dv_off($what)
{
    $sql = "update diverses set div_res = 0 where div_what ='" . $what . "'";
    q($sql);
}

function set_dv_app_top($what, $val = 1)
{
    $sql = "update diverses set app_top = '" . $val . "' where div_what ='" . $what . "'";
    q($sql);
}

//t_key_txt
function set_dv_t_key_txt($what, $val)
{
    $sql = "update diverses set t_key_txt = '<p>" . $val . "</p>' where div_what ='" . $what . "'";
    q($sql);
}

/*
function get_dv_t_key_txt($what){
$r = lookup('select t_key_text from diverses where div_what = \''.$what.'\' ','t_key_text');
return $r;
}
*/
//t_key_comment
function set_dv_t_key_comment($what, $val)
{
    $sql = "update diverses set t_key_comment = '" . $val . "' where div_what ='" . $what . "'";
    q($sql);
}

/*
function get_dv_t_key_comment($what){
$r = lookup('select t_key_comment from diverses where div_what = \''.$what.'\' ','t_key_comment');
return $r;
}
*/

function set_dv_nr($what, $val)
{
    $sql = "update diverses set nr = '" . $val . "' where div_what ='" . $what . "'";
    q($sql);
}

function set_dv_context($what, $val)
{
    $sql = "update diverses set context = '" . $val . "' where div_what ='" . $what . "'";
    q($sql);
}

function set_dv_funktion($what, $val)
{
    $sql = "update diverses set funktion = '" . $val . "' where div_what ='" . $what . "'";
    q($sql);
}

function set_dv_bemerkung($what, $val)
{
    $sql = "update diverses set bemerkung = '" . $val . "' where div_what ='" . $what . "'";
    q($sql);
}

function set_dv_bemerkung_l($what, $val)
{
    $val = addslashes($val);
    $sql = "update diverses set bemerkung_long = '" . $val . "' where div_what ='" . $what . "'";
    q($sql);
}


function get_kl_temp_spez($div_what)
{
    $sql = "select spezifisch from key_list_temp where div_what ='" . $div_what . "'";
    return lookup($sql, 'spezifisch');
}

function set_kl_temp_spez($div_what, $value)
{
    $sql = "update key_list_temp set spezifisch = '" . $value . "' where div_what ='" . $div_what . "'";
    q($sql);
}

function get_kl_temp($div_what, $shop = '', $long = false)
{
// shop: p d f  x = spezifisch
    if (!$long) {
        if ($shop == '') {
            $sql = "select current from key_list_temp where div_what ='" . $div_what . "'";
            return lookup($sql, 'current');
        }
        if ($shop == 'p') {
            $sql = "select premium_soll from key_list_temp where div_what ='" . $div_what . "'";
            return lookup($sql, 'premium_soll');
        }
        if ($shop == 'd') {
            $sql = "select deluxe_soll from key_list_temp where div_what ='" . $div_what . "'";
            return lookup($sql, 'deluxe_soll');
        }
        if ($shop == 'f') {
            $sql = "select foodshop_soll from key_list_temp where div_what ='" . $div_what . "'";
            return lookup($sql, 'foodshop_soll');
        }

        if ($shop == 'x') {
            $sql = "select spezifisch from key_list_temp where div_what ='" . $div_what . "'";
            return lookup($sql, 'spezifisch');
        }


    } else {
        if ($shop == '') {
            $sql = "select current_long from key_list_temp where div_what ='" . $div_what . "'";
            return lookup($sql, 'current_long');
        }
        if ($shop == 'p') {
            $sql = "select premium_soll_long from key_list_temp where div_what ='" . $div_what . "'";
            return lookup($sql, 'premium_soll_long');
        }
        if ($shop == 'd') {
            $sql = "select deluxe_soll_long from key_list_temp where div_what ='" . $div_what . "'";
            return lookup($sql, 'deluxe_soll_long');
        }
        if ($shop == 'f') {
            $sql = "select foodshop_soll_long from key_list_temp where div_what ='" . $div_what . "'";
            return lookup($sql, 'foodshop_soll_long');
        }
    }

}

function set_kl_temp($div_what, $value, $shop = '', $long = false)
{
    $value = addslashes($value);
    make_t_key_temp($div_what, $default = '', $default_long = '', $update = false); // if not exists key (insup) ohne values update

    if (!$long) {

        if ($shop == '') {
            $sql = "update key_list_temp set current = '" . $value . "' where div_what ='" . $div_what . "'";
            q($sql);
        }
        if ($shop == 'p' or $shop == 'premium') {
            $sql = "update key_list_temp set premium_soll = '" . $value . "' where div_what ='" . $div_what . "'";
            q($sql);
        }
        if ($shop == 'd' or $shop == 'deluxe') {
            $sql = "update key_list_temp set deluxe_soll = '" . $value . "' where div_what ='" . $div_what . "'";
            q($sql);
        }
        if ($shop == 'f' or $shop == 'foodshop') {
            $sql = "update key_list_temp set foodshop_soll = '" . $value . "' where div_what ='" . $div_what . "'";
            q($sql);
        }

        if ($shop == 'x') {
            $sql = "update key_list_temp set spezifisch = '" . $value . "' where div_what ='" . $div_what . "'";
            q($sql);
        }


    } else {
        if ($shop == '') {
            $sql = "update key_list_temp set current_long = '" . $value . "' where div_what ='" . $div_what . "'";
            q($sql);
        }
        if ($shop == 'p' or $shop == 'premium') {
            $sql = "update key_list_temp set premium_soll_long = '" . $value . "' where div_what ='" . $div_what . "'";
            q($sql);
        }
        if ($shop == 'd' or $shop == 'deluxe') {
            $sql = "update key_list_temp set deluxe_soll_long = '" . $value . "' where div_what ='" . $div_what . "'";
            q($sql);
        }
        if ($shop == 'f' or $shop == 'foodshop') {
            $sql = "update key_list_temp set foodshop_soll_long = '" . $value . "' where div_what ='" . $div_what . "'";
            q($sql);
        }
    }
}

function get_dv_shop($div_what, $table = "div")
{


    switch ($table) {
        case 'div':
            $sql = "select div_res from diverses where div_what ='" . $div_what . "'";
            return lookup($sql, 'div_res');
            break;
        case 'premium':
            $sql = "select premium_soll from key_list_temp where div_what ='" . $div_what . "'";
            return lookup($sql, 'premium_soll');
            break;
        case 'deluxe':
            $sql = "select deluxe_soll from key_list_temp where div_what ='" . $div_what . "'";
            return lookup($sql, 'deluxe_soll');
            break;
        case 'foodshop':
            $sql = "select foodshop_soll from key_list_temp where div_what ='" . $div_what . "'";
            return lookup($sql, 'foodshop_soll');
            break;
        default:
            $sql = "select div_res from diverses where div_what ='" . $div_what . "'";
            return lookup($sql, 'div_res');
    }


}

function define_translations($page, $ec_defs = false)
{
    global $session_lang_code_from_lang_id, $application_shop_is_in_dev_mode;
    $sql = "select definition, " . $session_lang_code_from_lang_id . ", page from myd_translations where page = '" . $page . "' and hidden = 0 ";
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $definition = $row['definition'];
        $t_page = $row['page'];
        $content = $row[$session_lang_code_from_lang_id];
        define($definition, $content);
        if ($ec_defs and $application_shop_is_in_dev_mode) ec($definition . ': ' . $content . ' - ' . $t_page);
        //if ($t_page<>'general') ec($definition.': '.$content.' - '.$t_page);
    }
    mysql_free_result($sql_result);
}

function get_products_description($products_id)
{
    $r = get_products_description_in_lang($products_id);
    if ($r == '') {
        $r = get_products_description_in_german($products_id);
    }
    return $r;
}

function get_products_description_in_lang($products_id)
{
    global $session_lang_code_from_lang_id;
    $sql = "select products_description from products_description where products_id=" . $products_id . " and language_id = " . $_SESSION['languages_id'] . "  ";
    return lookup($sql, 'products_description');
}

function get_products_description_in_german($products_id)
{
    global $app_top_default_lang_id;
    $sql = "select products_description from products_description where products_id=" . $products_id . " and language_id = " . $app_top_default_lang_id . "  ";
    return lookup($sql, 'products_description');
}

function att_clean($products_id)
{
    if (strstr($products_id, '{')) {
        $products_id_arr = explode("{", $products_id, 2);
        $products_id = $products_id_arr[0];
    }
    return $products_id;
}

function get_products_name($products_id)
{
//wenn mit attribute z.B.  products_id=14071{8}175
//global $products_name_show_in_lists;

//if (is_shop_area() and !$products_name_show_in_lists ) return;

    if (strstr($products_id, '{')) {
        $products_id_arr = explode("{", $products_id, 2);
        $products_id = $products_id_arr[0];
    }

    $r = get_products_name_in_lang($products_id);
    if ($r == '') {
        $r = get_products_name_in_german($products_id);
    }
    return strip_tags($r);

}

function get_products_name_in_lang($products_id)
{
    global $session_lang_code_from_lang_id;
    $sql = "select products_name from products_description where products_id=" . $products_id . " and language_id = '" . $_SESSION['languages_id'] . "'  ";
    return strip_tags(lookup($sql, 'products_name'));
}

function get_products_name_in_this_lang($products_id, $languages_id)
{
    $sql = "select products_name from products_description where products_id=" . $products_id . " and language_id = '" . $languages_id . "'  ";
    return strip_tags(lookup($sql, 'products_name'));
}


function get_products_name_in_german($products_id)
{
    global $app_top_default_lang_id;
    $sql = "select products_name from products_description where products_id=" . $products_id . " and language_id = '" . $app_top_default_lang_id . "'  ";
    return strip_tags(lookup($sql, 'products_name'));
}

function get_div_value_byKey($div_what)
{
    return get_dv($div_what);
}

function key_exists_dv($div_what)
{
    $sql = "select div_what from diverses where div_what = '" . $div_what . "' ";
    if (has_records($sql)) {
        return true;
    } else {
        return false;
    }
}


function get_dv($div_what, $add_blink = false)
{
    $div_what = trim($div_what);
    global $session_lang_code_from_lang_id, $app_top_default_lang_id, $shop_is_multilang, $app_top_hint_not_yet_translated, $application_shop_is_in_dev_mode;


    if ($application_shop_is_in_dev_mode and $add_blink) {
        global $bearb_mode_icon12_red;
        $blink = '<a title="Text und &Uuml;bersetzungen editieren" 
				href="javascript:open_lw_assi_transl_bg_txt(\'admin6093/popup_edit_text_div.php?key=' . $div_what . '\',\'Text und &Uuml;bersetzungen\',\'1000\',\'\')">' . $bearb_mode_icon12_red . '</a>';
    } else {
        $blink = '';
    }


    $sql = "select * from diverses where div_what ='" . $div_what . "'";
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        //$div_id = $row["div_id"];

        $div_res = $row["div_res"];
        $is_multi_lng = $row["is_multi_lng"];

        if (($_SESSION['languages_id'] == $app_top_default_lang_id) or (to_bool($shop_is_multilang) == false)) {
            mysql_free_result($sql_result);
            return $div_res . $blink;
        } else {
            if ($is_multi_lng == 0) {
                mysql_free_result($sql_result);
                return $div_res . $blink;
            } else {
                $r = $row["div_res_" . $session_lang_code_from_lang_id . ""];
                if (trim($r) <> '') {
                    $umlaute = Array("/�/", "/�/", "/�/", "/�/", "/�/", "/�/", "/�/");
                    $replace = Array("ae", "oe", "ue", "Ae", "Oe", "Ue", "ss");
                    mysql_free_result($sql_result);
                    return str_replace("/\'", "", $r) . $blink;
                } else {
                    mysql_free_result($sql_result);
                    return $div_res . $app_top_hint_not_yet_translated . $blink;
                }
            }
        }

    }

    //$sql="select div_res from diverses where div_what ='".$div_what."'";
    //return  lookup($sql,'div_res');
}


function get_dv_l_in_lang($div_what, $lang_code)
{
    if ($lang_code <> '') $r = lookup('select div_res_long_' . $lang_code . ' from diverses where div_what = "' . $div_what . '"', 'div_res_long_' . $lang_code);
    if ($r <> '') {
        return $r;
    } else {
        return lookup('select div_res_long from diverses where div_what = "' . $div_what . '"', 'div_res_long');
    }
}

function get_dv_in_lang($div_what, $lang_code)
{
    if ($lang_code <> '') $r = lookup('select div_res_' . $lang_code . ' from diverses where div_what = "' . $div_what . '"', 'div_res_' . $lang_code);

    if ($r <> '') {
        return $r;
    } else {
        return lookup('select div_res from diverses where div_what = "' . $div_what . '"', 'div_res');
    }
}


function get_dv_l($div_what, $add_blink = false)
{
    $div_what = trim($div_what);

    global $session_lang_code_from_lang_id, $app_top_default_lang_id, $shop_is_multilang, $app_top_hint_not_yet_translated, $application_shop_is_in_dev_mode;

    if ($application_shop_is_in_dev_mode and $add_blink) {
        global $bearb_mode_icon12_red, $bearb_mode_icon16_red, $bearb_mode_icon20_red;
        $blink = '<a class="b_link" title="obigen Text und &Uuml;bersetzungen editieren" 
				href="javascript:open_lw_assi_transl_bg_txt(\'admin6093/help_2_adm.php?url=popup_edit_html.php?p=' . $div_what . '&long=1&what=&field=div_res_long\',\'Text und &Uuml;bersetzungen\',\'1600\',\'\')">' . $bearb_mode_icon16_red . ' Text bearbeiten</a>';

    } else {
        $blink = '';
    }


    $sql = "select * from diverses where div_what ='" . $div_what . "'";
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {

        $div_res_long = $row["div_res_long"];
        $is_multi_lng = $row["is_multi_lng"];

        if (($_SESSION['languages_id'] == $app_top_default_lang_id) or (!to_bool($shop_is_multilang))) {
            mysql_free_result($sql_result);
            return $div_res_long . $blink;
        } else {
            if ($is_multi_lng == 0) {
                mysql_free_result($sql_result);
                return $div_res_long . $blink;
            } else {
                $r = $row["div_res_long_" . $session_lang_code_from_lang_id . ""];
                if (trim($r) <> '') {
                    mysql_free_result($sql_result);
                    return $r . $blink;
                } else {
                    mysql_free_result($sql_result);
                    if (trim($div_res_long) <> '') return $div_res_long . $app_top_hint_not_yet_translated . $blink;
                }
            }
        }

    }

}


function get_dv_by_id($div_id)
{
    $sql = "select div_res from diverses where div_id ='" . $div_id . "'";
    return lookup($sql, 'div_res');
}

function get_dv_long_by_id($div_id)
{
    $sql = "select div_res_long from diverses where div_id ='" . $div_id . "'";
    return lookup($sql, 'div_res_long');
}

function get_div_what_from_id($div_id)
{
    $sql = "select div_what from diverses where div_id ='" . $div_id . "'";
    return lookup($sql, 'div_what');
}

function get_config_title_from_id($conf_id)
{
    $sql = "select configuration_title from configuration where configuration_id ='" . $conf_id . "'";
    return lookup($sql, 'configuration_title');
}

function get_config_description_from_id($conf_id)
{
    $sql = "select configuration_description from configuration where configuration_id ='" . $conf_id . "'";
    return lookup($sql, 'configuration_description');
}

function get_config_value_from_id($conf_id)
{
    $sql = "select configuration_value from configuration where configuration_id ='" . $conf_id . "'";
    return lookup($sql, 'configuration_value');
}

function get_dv_germdate($div_what, $short = false)
{
    $sql_date = get_div_value_byKey($div_what);
    if ($short) {
        return getGermanDatefromSQLDate_short($sql_date);
    } else {
        return getGermanDatefromSQLDate($sql_date);
    }
}

function get_dv_germdate_no_secs($div_what)
{
    $sql_date = get_div_value_byKey($div_what);
    $x = getTimestampFromSQLDate($sql_date);
    return date("d.m.Y H:i", $x);

}


function get_dv_long_field($div_what, $field = 'div_res_long')
{
    $div_what = trim($div_what);
    $sql = "select " . $field . " from diverses where div_what ='" . $div_what . "'";
    return lookup($sql, $field);
}

function set_dv_long_field($div_what, $field = 'div_res_long', $val)
{
    $div_what = trim($div_what);
    $sql = "update diverses set " . $field . " = '" . $val . "' where div_what = '" . $div_what . "' ";
    q($sql);
}


function get_dv_long($div_what, $table = 'div')
{
    $div_what = trim($div_what);
    switch ($table) {
        case 'div':
            $sql = "select div_res_long from diverses where div_what ='" . $div_what . "'";
            return lookup($sql, 'div_res_long');

            break;
        case 'premium':
            $sql = "select premium_soll_long from key_list_temp where div_what ='" . $div_what . "'";
            return lookup($sql, 'premium_soll_long');
            break;
        case 'deluxe':
            $sql = "select deluxe_soll_long from key_list_temp where div_what ='" . $div_what . "'";
            return lookup($sql, 'deluxe_soll_long');
            break;
        case 'foodshop':
            $sql = "select foodshop_soll_long from key_list_temp where div_what ='" . $div_what . "'";
            return lookup($sql, 'foodshop_soll_long');

            break;
        default:
            $sql = "select div_res_long from diverses where div_what ='" . $div_what . "'";
            return lookup($sql, 'div_res_long');

    }
}


function get_dv_bool($div_what)
{
    $div_what = trim($div_what);
    return get_bool_div_value_byKey($div_what);
}

function get_dv_bool_state($div_what)
{
    $div_what = trim($div_what);
//return get_bool_div_value_byKey($div_what);
    $state = get_bool_div_value_byKey($div_what);
    if ($state) {
        return ' ' . $div_what . ' = true';
    } else {
        return ' ' . $div_what . ' = false';
    }


}


function get_dv_bool_both($div_what, $div_what2)
{
    $b1 = get_dv_bool($div_what);
    $b2 = get_dv_bool($div_what2);

    if ($b1 and $b2) {
        return true;
    } else {
        return false;
    }
}

function get_dv_bool_any($div_what, $div_what2)
{
    $b1 = get_dv_bool($div_what);
    $b2 = get_dv_bool($div_what2);

    if ($b1 or $b2) {
        return true;
    } else {
        return false;
    }
}

function insup_dv($what, $val, $app_top = false)
{
    $what = trim($what);
    set_div_res_insup($what, $val);
}

function insup_dv_l($what, $val)
{
    $what = trim($what);
    set_div_res_long_insup($what, $val);
}


function make_t_key_if_not_exists($what, $value = '', $app_top = false)
{
    $what = trim($what);
    $sql_res = q("select div_what from diverses WHERE div_what='" . $what . "'");
    $z = mysql_num_rows($sql_res);
    if ($z == 0) {
        if ($app_top) {
            $sq3 = "Insert into diverses set div_what='" . $what . "', div_res='" . $value . "', app_top='1' ";
        } else {
            $sq3 = "Insert into diverses set div_what='" . $what . "', div_res='" . $value . "', app_top='0' ";
        }
        q($sq3);
        return mysql_insert_id();
    }
}


// $insid = insert_new_in_div('neuer_langer_begriff','',$long_begriff,$long_begriff_default)
function make_t_key($what, $default = '', $set_add_top = true)
{
    $what = trim($what);
    $sql_res = q("select div_what from diverses WHERE div_what='" . $what . "'");
    $z = mysql_num_rows($sql_res);
    if ($z == 0) {
        if ($set_add_top) {
            $sq3 = "Insert into diverses set div_what='" . $what . "', div_res='" . $default . "', div_res_default='" . $default . "', app_top=1   ";
        } else {
            $sq3 = "Insert into diverses set div_what='" . $what . "', div_res='" . $default . "', div_res_default='" . $default . "'  ";
        }
        q($sq3);
        return mysql_insert_id();
    }
}


function make_t_key_long($what, $default = '')
{
    $what = trim($what);
    $sql_res = q("select div_what from diverses WHERE div_what='" . $what . "'");
    $z = mysql_num_rows($sql_res);
    if ($z == 0) {
        $sq3 = "Insert into diverses set div_what='" . $what . "', div_res_long='" . $default . "', div_res_long_default='" . $default . "'  ";
        q($sq3);
        return mysql_insert_id();
    }
}


function make_t_key_temp($what, $default = '', $default_long = '', $update = true)
{
    $what = trim($what);
    $sql_res = q("select div_what from key_list_temp WHERE div_what='" . $what . "'");
    $z = mysql_num_rows($sql_res);
    if ($z == 0) {
        if ($default_long == '') {
            $sq3 = "Insert into key_list_temp set div_what='" . $what . "', current='" . $default . "', 
				premium_soll='" . $default . "', deluxe_soll='" . $default . "', foodshop_soll='" . $default . "' ";
        } else {
            $sq3 = "Insert into key_list_temp set div_what='" . $what . "', current='" . $default . "', 
				premium_soll='" . $default . "', deluxe_soll='" . $default . "', foodshop_soll='" . $default . "', 
				current_long='" . $default_long . "', premium_soll_long='" . $default_long . "', deluxe_soll_long='" . $default_long . "', foodshop_soll_long='" . $default_long . "'  ";
        }
        q($sq3);
        return mysql_insert_id();
    } else { //wenn key vorhanden dann nur nach current aber nicht nach premium/deluxe/foodshop
        if ($default_long == '') {
            $sq3 = "Update key_list_temp set current='" . $default . "' where div_what = '" . $what . "' ";
        } else {
            $sq3 = "Update key_list_temp set current='" . $default . "', current_long='" . $default_long . "'  where div_what = '" . $what . "' ";
        }
        if ($update) q($sq3);
    }
}

function diverses_to_current()
{
    $sql = "select * from diverses where div_id > 0 order by div_id asc ";
    $res = q($sql);

    while ($row = mysql_fetch_array($res)) {
        $what = $row["div_what"];
        $div_res = addslashes($row["div_res"]);
        $div_res_long = addslashes($row["div_res_long"]);

        $sql = "update key_list_temp set current= '" . $div_res . "', current_long='" . $div_res_long . "' where div_what = '" . $what . "'   ";
        q($sql);
    }
    mysql_free_result($res);
}

function current_to_diverses()
{

    $sql = "select * from key_list_temp where ID > 0 order by ID asc ";
    $res = q($sql);

    while ($row = mysql_fetch_array($res)) {

        $div_what = $row["div_what"];
        $current = addslashes($row["current"]);
        $current_long = addslashes($row["current_long"]);

        $sql2 = "update diverses set div_res = '" . $current . "', div_res_long='" . $current_long . "' where div_what = '" . $div_what . "'  ";
        q($sql2);
    }
    mysql_free_result($res);
}

function key_list_temp_TO_key_list_transfer()
{

    if (Table_Exists('key_list_transfer')) {
        $sql = "drop table key_list_transfer";
        q($sql);
    }

    if (!Table_Exists('key_list_transfer')) {
        $sql = "

CREATE TABLE `key_list_transfer` (
  `ID` mediumint(6) NOT NULL auto_increment,
  `spezifisch` varchar(1) NOT NULL,
  `div_what` varchar(255) NOT NULL,
  `current` varchar(255) NOT NULL,
  `premium_soll` varchar(255) NOT NULL,
  `deluxe_soll` varchar(255) NOT NULL,
  `foodshop_soll` varchar(255) NOT NULL,
  `current_long` longtext NOT NULL,
  `premium_soll_long` longtext NOT NULL,
  `deluxe_soll_long` longtext NOT NULL,
  `foodshop_soll_long` longtext NOT NULL,
  PRIMARY KEY  (`ID`),
  KEY `div_what` (`div_what`)
) ENGINE=MyISAM;
";
        q($sql);
    }

    $sql = "INSERT INTO `key_list_transfer` SELECT * FROM `key_list_temp`;";
    q($sql);

}

function key_list_transfer_TO_key_list_temp($shop)
{

    $sql = "select * from key_list_transfer ";
    $res = q($sql);

    while ($row = mysql_fetch_array($res)) {
        $div_what = $row["div_what"];
        $premium_soll = addslashes($row["premium_soll"]);
        $deluxe_soll = addslashes($row["deluxe_soll"]);
        $foodshop_soll = addslashes($row["foodshop_soll"]);

        $premium_soll_long = addslashes($row["premium_soll_long"]);
        $deluxe_soll_long = addslashes($row["deluxe_soll_long"]);
        $foodshop_soll_long = addslashes($row["foodshop_soll_long"]);


        if ($shop == 'premium') $sql2 = 'update key_list_temp set premium_soll = "' . $premium_soll . '", premium_soll_long =  "' . $premium_soll_long . '" where div_what = "' . $div_what . '" ';
        if ($shop == 'deluxe') $sql2 = 'update key_list_temp set deluxe_soll = "' . $deluxe_soll . '", deluxe_soll_long =  "' . $deluxe_soll_long . '" where div_what = "' . $div_what . '" ';
        if ($shop == 'foodshop') $sql2 = 'update key_list_temp set foodshop_soll = "' . $foodshop_soll . '", foodshop_soll_long =  "' . $foodshop_soll_long . '" where div_what = "' . $div_what . '" ';
        q($sql2);

    }
    mysql_free_result($res);

}

function diverses_to_shop($shop)
{

    $sql = "select * from diverses ";
    $res = q($sql);
    $cat_str = '';
    while ($row = mysql_fetch_array($res)) {
        $div_what = $row["div_what"];
        $div_res = addslashes($row["div_res"]);
        $div_res_long = addslashes($row["div_res_long"]);

        if ($shop == 'premium') $sql2 = 'update key_list_temp set premium_soll = "' . $div_res . '", premium_soll_long =  "' . $div_res_long . '" where div_what = "' . $div_what . '" ';
        if ($shop == 'deluxe') $sql2 = 'update key_list_temp set deluxe_soll = "' . $div_res . '", deluxe_soll_long =  "' . $div_res_long . '" where div_what = "' . $div_what . '" ';
        if ($shop == 'foodshop') $sql2 = 'update key_list_temp set foodshop_soll = "' . $div_res . '", foodshop_soll_long =  "' . $div_res_long . '" where div_what = "' . $div_what . '" ';
        q($sql2);

    }
    mysql_free_result($res);

}


function shop_to_diverses($shop)
{
    $sql = "select * from key_list_temp where ID > 0 order by ID asc ";
    $res = q($sql);
    $cat_str = '';
    while ($row = mysql_fetch_array($res)) {
        $what = $row["div_what"];
        $premium_soll = addslashes($row["premium_soll"]);
        $deluxe_soll = addslashes($row["deluxe_soll"]);
        $foodshop_soll = addslashes($row["foodshop_soll"]);

        $premium_soll_long = addslashes($row["premium_soll_long"]);
        $deluxe_soll_long = addslashes($row["deluxe_soll_long"]);
        $foodshop_soll_long = addslashes($row["foodshop_soll_long"]);

// wenn key nicht vorhanden dann wird auch Premium/Deluxe/Foodshop gef�llt, sonst nur current
//make_t_key_temp($what, addslashes($div_res), addslashes($div_res_long) );

        if ($shop == 'premium') $sql2 = 'update diverses set div_res = "' . $premium_soll . '", div_res_long =  "' . $premium_soll_long . '" where div_what = "' . $what . '" ';
        if ($shop == 'deluxe') $sql2 = 'update diverses set div_res = "' . $deluxe_soll . '", div_res_long =  "' . $deluxe_soll_long . '" where div_what = "' . $what . '" ';
        if ($shop == 'foodshop') $sql2 = 'update diverses set div_res = "' . $foodshop_soll . '", div_res_long =  "' . $foodshop_soll_long . '" where div_what = "' . $what . '" ';

        q($sql2);

    }
    mysql_free_result($res);
}


function make_t_key_with_value($what, $value)
{
    $sql_res = q("select div_what from diverses WHERE div_what='" . $what . "'");
    $z = mysql_num_rows($sql_res);
    if ($z == 0) {
        $sq3 = "Insert into diverses set div_what='" . $what . "', div_res='" . $value . "' ";
        q($sq3);
        return mysql_insert_id();
    }
}


function get_bool_div_value_byKey($div_what)
{
    $sql = "select div_res from diverses where div_what ='" . $div_what . "'";
    $nr = lookup($sql, 'div_res');
    return res_nr_to_bool($nr); // 0 oder 1   nur true wenn $nr == 1
}

function true_in_div($what)
{
    $res = lookup("select div_res from diverses where div_what='" . $what . "'", "div_res");
    if ($res == "1") {
        return true;
    } else {
        return false;
    }
}

function onoff_in_div($what)
{
    $res = lookup("select div_res from diverses where div_what='" . $what . "'", "div_res");
    if ($res == "1") {
        return '<span class="green">ein</span>';
    } else {
        return '<span class="red">aus</span>';
    }
}

function janein_in_div($what)
{
    $res = lookup("select div_res from diverses where div_what='" . $what . "'", "div_res");
    if ($res == "1") {
        return '<span class="green">ja</span>';
    } else {
        return '<span class="red">nein</span>';
    }
}

function active_in_div($what)
{
    $res = lookup("select div_res from diverses where div_what='" . $what . "'", "div_res");
    if ($res == "1") {
        return '<span class="green">aktiv</span>';
    } else {
        return '<span class="red">deaktiviert</span>';
    }
}

function active_in_div_field($what, $field)
{
    $res = lookup("select " . $field . " from diverses where div_what='" . $what . "'", $field);
    if ($res == "1") {
        return '<span class="green">ja</span>';
    } else {
        return '<span class="red">nein</span>';
    }
}

function eingerichtet_in_div_field($what)
{
    $res = lookup("select div_res from diverses where div_what='" . $what . "'", "div_res");
    if ($res == "1") {
        return '<span style="color:#060;font-size:0.8em">eingerichtet</span>';
    } else {
        return '<span style="color:#c77;font-size:0.8em">noch <b>NICHT</b> eingerichtet!</span>';
    }
}


//get_div_long_value_byKey('open_time')
function get_div_long_value_byKey($div_what)
{
    return get_dv_l($div_what);
}

//get_div_long_default_value_byKey('open_time')
function get_div_long_default_value_byKey($div_what, $table = "div")
{

    $sql = "select div_res_long_default from diverses where div_what ='" . $div_what . "'";
    return lookup($sql, 'div_res_long_default');

    /*
	switch ($table) {
		 case 'div':
			$sql="select div_res_long_default from diverses where div_what ='".$div_what."'";
			return lookup($sql,'div_res_long_default');
			break;
		 case 'premium':
			$sql="select div_res_long_default from diverses where div_what ='".$div_what."'";
			return lookup($sql,'div_res_long_default');

			  break;
		 case 'deluxe':
				q("update key_list_temp set deluxe_soll = '".$val."' where div_what='".$div_what."' ");
			  break;
		 case 'foodshop':
				q("update key_list_temp set foodshop_soll = '".$val."' where div_what='".$div_what."' ");
			  break;
		default:
			$sql="select div_res_long_default from diverses where div_what ='".$div_what."'";
			return lookup($sql,'div_res_long_default');
	}

*/

}


function set_dv_or_create($div_what, $val, $app_top = false)
{

    $what = trim($div_what);
    $sql_res = q("select div_what from diverses WHERE div_what='" . $what . "'");
    $z = mysql_num_rows($sql_res);
    if ($z == 0) {
        $sq3 = "Insert into diverses set div_what='" . $what . "', div_res='" . $val . "' ";
        q($sq3);
    } else {
        set_div_res($div_what, $val);
    }

    if ($app_top) {
        $sql = "update diverses set app_top='1' where div_what = '" . $div_what . "' ";
        q($sql);
    }
}

function set_dv_l_or_create($div_what, $val, $app_top = false)
{

    $what = trim($div_what);
    $sql_res = q("select div_what from diverses WHERE div_what='" . $what . "'");
    $z = mysql_num_rows($sql_res);
    if ($z == 0) {
        $sq3 = "Insert into diverses set div_what='" . $what . "', div_res_long='" . $val . "' ";
        q($sq3);
    } else {
        set_div_res_long($div_what, $val);
    }

    if ($app_top) {
        $sql = "update diverses set app_top='1' where div_what = '" . $div_what . "' ";
        q($sql);
    }


}


function set_dv($div_what, $val)
{
    set_div_res($div_what, $val);
}

function set_dv_l($div_what, $val)
{
    set_div_res_long($div_what, $val);
}

function set_dv_l_p($div_what, $val)
{
// add to msg
    q("update diverses set div_res_long = concat(div_res_long ,  '" . $val . "' ) where div_what='" . $div_what . "' ");
}


function set_div_res($div_what, $val, $table = "div")
{

    switch ($table) {
        case 'div':
            q("update diverses set div_res= '" . $val . "' where div_what='" . $div_what . "' ");
            break;
        case 'premium':
            q("update key_list_temp set premium_soll = '" . $val . "' where div_what='" . $div_what . "' ");
            break;
        case 'deluxe':
            q("update key_list_temp set deluxe_soll = '" . $val . "' where div_what='" . $div_what . "' ");
            break;
        case 'foodshop':
            q("update key_list_temp set foodshop_soll = '" . $val . "' where div_what='" . $div_what . "' ");
            break;
        default:
            q("update diverses set div_res= '" . $val . "' where div_what='" . $div_what . "' ");
    }

}

function set_div_res_long($div_what, $val, $table = "div")
{
    switch ($table) {
        case 'div':
            q("update diverses set div_res_long = '" . $val . "' where div_what='" . $div_what . "' ");
            break;
        case 'premium':
            q("update key_list_temp set premium_soll_long = '" . $val . "' where div_what='" . $div_what . "' ");
            break;
        case 'deluxe':
            q("update key_list_temp set deluxe_soll_long = '" . $val . "' where div_what='" . $div_what . "' ");
            break;
        case 'foodshop':
            q("update key_list_temp set foodshop_soll_long = '" . $val . "' where div_what='" . $div_what . "' ");
            break;
        default:
            q("update diverses set div_res_long = '" . $val . "' where div_what='" . $div_what . "' ");
    }
}

function set_div_res_long_default($div_what, $val)
{
    q("update diverses set div_res_long_default = '" . $val . "' where div_what='" . $div_what . "' ");
}


//set_configuration_val('STORE_NAME','Pizzeria Milano')
function set_conf($conf_key, $val)
{
    q("update configuration set configuration_value = '" . $val . "' where configuration_key='" . $conf_key . "' ");
}

function set_configuration_val($conf_key, $val)
{
    q("update configuration set configuration_value = '" . $val . "' where configuration_key='" . $conf_key . "' ");
    set_dv($conf_key, $val);
}

function get_conf($conf_key)
{
    $sql = "select configuration_value from configuration where configuration_key= '" . $conf_key . "' ";
    return lookup($sql, 'configuration_value');
}

function get_configuration_val($conf_key)
{
    $sql = "select configuration_value from configuration where configuration_key= '" . $conf_key . "' ";
    return lookup($sql, 'configuration_value');
}

function get_configuration_val_bool($conf_key)
{
    $sql = "select configuration_value from configuration where configuration_key= '" . $conf_key . "' ";
    $res = strtolower(lookup($sql, 'configuration_value'));

    if ($res == 'true' or $res == 'True') {
        return '<span style="color:#383">ja/aktiviert</span>';
    } else {
        return '<span style="color:#d66">nein/deaktiviert</span>';
    }

}

function get_conf_bool($conf_key)
{
    $sql = "select configuration_value from configuration where configuration_key= '" . $conf_key . "' ";
    $res = strtolower(lookup($sql, 'configuration_value'));

    if ($res == 'true' or $res == 'True') {
        return '<span style="color:#383">ja/aktiviert</span>';
    } else {
        return '<span style="color:#d66">nein/deaktiviert</span>';
    }

}

function get_conf_bool1($conf_key)
{
    $sql = "select configuration_value from configuration where configuration_key= '" . $conf_key . "' ";
    $res = strtolower(lookup($sql, 'configuration_value'));

    if ($res == 'true' or $res == 'True' or strtoupper($res) == 'TRUE') {
        return true;
    } else {
        return false;
    }

}


function order_phone()
{
    return get_div_value_byKey('order_phone');
}

function get_default_lang_value()
{
    return get_config_value_byKey('DEFAULT_LANGUAGE'); // de en usw.
}

function get_default_lang_id()
{
    $default_lang = get_default_lang_value();
    $sql = "select languages_id from languages where code = '" . $default_lang . "'";
    return lookup($sql, 'languages_id');
}


function strToDb($aStr)
{
    /* Protects data and solves quoting issues */
    //$aStr=ereg_replaceX("\|","",$aStr);
    $aStr = preg_replace("(\|)", "", $aStr);

    if (get_magic_quotes_gpc()) {
        $aStr = stripslashes($aStr);
    }

    if (!is_numeric($aStr) || $aStr == '0') {
        if (version_compare(phpversion(), "4.3.0", "<"))
            return mysql_escape_string($aStr);
        else
            return mysql_real_escape_string($aStr);

    } else
        return $aStr;
}


function uploadLogoImage($aFileArray, $aSaveAs, $aMax, $aDimensionArray, $aVideo, $aProgram)
{
    //global $set_chmod,$set_image_filetypes,$set_video_filetypes,$set_doc_filetypes;
    $set_chmod = "0777";

    if ($set_video_filetypes)
        $lVideoArray = explode(",", $set_video_filetypes);
    if ($set_doc_filetypes)
        $lDocArray = explode(",", $set_doc_filetypes);
    if ($set_image_filetypes)
        $lImageArray = explode(",", $set_image_filetypes);

    // Security check
    if (!is_uploaded_file($aFileArray["tmp_name"]))
        return 2;

    // File-size check
    if ($aFileArray["size"] > ($aMax * 1024))
        return 3;
    //$set_image_size_logo_banner = "500x90";
    // New filename
    if (!$aVideo) {
        /*
		$fileNameSplit=explode("/",$aSaveAs);
		$lastFileName=end($fileNameSplit);
		$lToday=date("YmHs");
		//$fileName=$lastFileName . "_" . $lToday;
		$fileName=$lastFileName .  'karte';
		$dotpos = strrpos($fileName, '.');
		$fileName = str_replace('.', '_', substr($fileName, 0, $dotpos)) . substr($fileName, $dotpos);
		*/

        if ($aFileArray["type"] == "image/gif")
            $ext = "gif";
        elseif ($aFileArray["type"] == "image/pjpeg" || $aFileArray["type"] == "image/jpeg")
            $ext = "jpg";
        elseif ($aFileArray["type"] == "image/png" || $aFileArray["type"] == "image/x-png")
            $ext = "png";
        elseif (!$aVideo)
            return 4;

        //$newFileName=$fileName . "." . $ext;
        //$saveTo_org=$aSaveAs . 'karte' . "." . $ext;
        //$ext="gif";
        $saveTo_org = $aSaveAs;
        //$saveTo_org='karte' . "." . $ext;

    } else {
        $fileNameSplit = explode("/", $aSaveAs);
        $lastFileName = end($fileNameSplit); // 1 or 2 or 3.. whatever the ad number is
        //$newFileName=strtolower($aFileArray["name"]);
        $newFileName = $aFileArray["name"];

        $ext = substr(strrchr($newFileName, "."), 1);

        //$dotpos = strrpos($newFileName, '.');
        //$newFileName = str_replace('.', '_', substr($newFileName, 0, $dotpos)) . substr($newFileName, $dotpos);
        $saveTo_org = $aSaveAs . "_" . $newFileName;
        //$newFileName = $lastFileName."_".$newFileName;
    }


    if (!@move_uploaded_file($aFileArray['tmp_name'], $saveTo_org))
        return 5;

    // Do thumb/resize-creation
    $returnFileArray[] = $newFileName;

    if (!empty($aDimensionArray) && $aProgram != 0) {
        $total_dimentions = count($aDimensionArray);

        foreach ($aDimensionArray as $item) {
            $c++;
            $xyArray = explode("x", $item);
            $x = $xyArray[0];
            $y = $xyArray[1];
            //$x=500;
            //$y=90;

            $saveTo = $aSaveAs . "_" . $lToday . "_logo_2" . $c . "." . $ext;
            if ($total_dimentions == $c)
                $saveTo = $saveTo_org;
            else
                $returnFileArray[] = $fileName . "_logo_2" . $c . "." . $ext;

            if ($aProgram == 1)
                makeIMThumb($saveTo_org, $saveTo, $item);
            elseif ($aProgram == 2)
                $res = makeGDThumb($saveTo_org, $saveTo, $ext, $x, $y);

            @chmod("$saveTo", octdec($set_chmod));

            if (!file_exists($saveTo))
                return 6;

        }

    }

    return $returnFileArray;

}

function makeIMThumb($aFromfile, $aToFile, $aGeo)
{
    global $set_magic_path;
    $command = "$set_magic_path -quality 80 -geometry $aGeo $aFromfile $aToFile";
    $res = exec($command);
}

function makeGDThumb($aInputPath, $aOutputPath, $aFileType, $max_x, $max_y)
{
    /*
echo	'<p style="font-size:2em"> 3086 '.$aInputPath.'<p>';
echo	'<p style="font-size:2em"> 3087 '.$aOutputPath.'<p>';
echo	'<p style="font-size:2em">'.$aFileType.'<p>';
echo	'<p style="font-size:2em"> x '.$max_x.' y '.$max_y.'<p>';
exit;
*/
    if ($aFileType == "jpg")
        $source = ImageCreateFromJPEG($aInputPath);
    elseif ($aFileType == "png")
        $source = ImageCreateFromPNG($aInputPath);
    elseif ($aFileType == "gif")
        $source = ImageCreateFromGIF($aInputPath);

    list($x, $y) = getimagesize($aInputPath);
    //echo 	'<p style="font-size:2em">3100 input path: '.$aInputPath.'<p>';
    //echo 	'<p style="font-size:2em">3100  x: '.$x.' y: '.$y.'<p>';


    if (($max_x / $max_y) < ($x / $y)) {
        $save = imagecreatetruecolor($x / ($x / $max_x), $y / ($x / $max_x));
    } else {
        $save = imagecreatetruecolor($x / ($y / $max_y), $y / ($y / $max_y));
    }

    imagecopyresampled($save, $source, 0, 0, 0, 0, imagesx($save), imagesy($save), $x, $y);
    //echo 	'<p style="font-size:2em">3113  x: '.$x.' y: '.$y.'<p>';
    //echo 	'<p style="font-size:2em">3114  save: '.$save.' source: '.$source.' output path: '.$aOutputPath.'<p>';
    if ($aFileType == "jpg")
        imagejpeg($save, $aOutputPath, 80);
    elseif ($aFileType == "png")
        imagePNG($save, $aOutputPath);
    elseif ($aFileType == "gif")
        imageGIF($save, $aOutputPath);

}

function getErrorMsg($aID)
{
    if ($aID == 1)
        return LA_UP_ER1;
    elseif ($aID == 2)
        return LA_UP_ER2;
    elseif ($aID == 3)
        return LA_UP_ER3;
    elseif ($aID == 4)
        return LA_UP_ER4;
    elseif ($aID == 5)
        return LA_UP_ER5;
    elseif ($aID == 6)
        return LA_UP_ER6;
    else
        return LA_UP_UNKNOWN;

}


/*
function strEncISO($aStr){
$lLangSet="iso-8859-1";
return htmlentities($aStr,ENT_QUOTES,$lLangSet);
}

function strEnc($aStr){
$lLangSet="utf-8";
return htmlentities($aStr,ENT_QUOTES,$lLangSet);
}
function strEnc5($Str){
$Str = encodeToIso($Str);
return $Str;
}
function conv_5($str){
$str1=encodeToUtf8($str);
return $str1;
}
function conv_utoi($str){
$str1=encodeToIso($str);
return $str1;
}
function conv_itou($str){
$str1=encodeToUtf8($str);
return $str1;
}

function encodeToUtf8($string) {
  return mb_convert_encoding($string, "UTF-8", mb_detect_encoding($string, "UTF-8, ISO-8859-1, ISO-8859-15", true));
}



*/


function encodeToIso($string)
{
    return mb_convert_encoding($string, "ISO-8859-1", mb_detect_encoding($string, "UTF-8, ISO-8859-1, ISO-8859-15", true));
}

function make_excel_from_sql($sql, $filename = 'Daten.xls')
{


    $res = q($sql);
    $z = nuf(mysql_num_rows($res));

    header("Content-Type: application/vnd.ms-excel;charset=utf-8");
//header("Content-Type: application/vnd.ms-excel;charset=iso-8859-1");
    header('Content-Disposition: attachment; filename="' . $filename . '"');
//header ('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');

//$sql='select * from '.$tabelle." ";

//$export =q($sql);
    $flag = false;


//while ($row = mysql_fetch_assoc($export)) {
    while ($row = mysql_fetch_assoc($res)) {
        if (!$flag) {
            //# display field/column names as first row
            echo 'Anzahl: ' . $z . ' - ' . date('d.m.Y H:i') . "";
            echo "\n\n\n\n";
            echo $sql . '';
            echo "\n\n\n\n";

            //echo implode("\t", array_keys($row)) . "\n";
            echo utf8_decode(implode("\t", array_values($row)) . "\n");
            $flag = true;
        }
        //array_walk($row, 'cleanData');
        //encodeToUtf8(
        //echo implode("\t", array_values($row)) . "\n";
        //echo encodeToUtf8(implode("\t", array_values($row)) . "\n");
        echo utf8_decode(implode("\t", array_values($row)) . "\n");
    }
    mysql_free_result($res);
    echo "\n\n\n\n";
}


function make_excel($tabelle, $name)
{
    $filename = $name;
    header("Content-Type: application/vnd.ms-excel");
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');

    $sql = 'select * from ' . $tabelle . " ";
    $export = q($sql);
    $flag = false;

    while ($row = mysql_fetch_assoc($export)) {
        if (!$flag) {
            //# display field/column names as first row
            echo date('d.m.Y') . "   \n";
            //echo implode("\t", array_keys($row)) . "\n";
            echo utf8_decode(implode("\t", array_values($row)) . "\n");
            $flag = true;
        }
        //array_walk($row, 'cleanData');
        //echo implode("\t", array_values($row)) . "\n";
        echo utf8_decode(implode("\t", array_values($row)) . "\n");
    }

    mysql_free_result($export);
    echo "\n\n\n\n";
}

function cleanData(&$str)
{
    //$str = preg_replace("/\t/", "\\t", $str);
    //$str = preg_replace("/\n/", "\\n", $str);
    //$str = htmlentities($str);
    //$str = nl2br($str);
    $str = str_replace("\r\n", "", $str);
    $str = encodeToIso_loc($str);
    //$str= encodeToUtf8_loc($str);

    //$str = preg_replace("/\n/", "", $str);
}

function encodeToUtf8_loc($string)
{
    return mb_convert_encoding($string, "UTF-8", mb_detect_encoding($string, "UTF-8, ISO-8859-1, ISO-8859-15", true));
}

function encodeToIso_loc($string)
{
    return mb_convert_encoding($string, "ISO-8859-1", mb_detect_encoding($string, "UTF-8, ISO-8859-1, ISO-8859-15", true));
}

function tep_count_products_in_category($category_id, $include_inactive = false, $always = false)
{
    global $products_number_in_category_show;

    if ($category_id <> '') {
        if ($products_number_in_category_show or $always) {
            $sql = "select anz_prod_subcats from categories where categories_id = " . $category_id;
            return lookup($sql, 'anz_prod_subcats');
        } else {
            return 0;
        }
    } else {
        return 'noCID';
    }
}

function tep_count_products_in_category_admin($category_id)
{
    if ($category_id <> '') {
        $sql = "select anz_prod_subcats from categories where categories_id = " . $category_id;
        return lookup($sql, 'anz_prod_subcats');
    } else {
        return 'noCID';
    }
}


function count_products_in_this_particular_category($categories_id)
{
    if ($categories_id <> '') {
        $sql = "select anz_prod from categories where categories_id = " . $categories_id;
        $res = lookup($sql, 'anz_prod');
        if ($res == '') $res = 0;
    }
    return $res;
}

function count_special_in_this_particular_category($categories_id)
{

    if ($categories_id <> '') {
        $sql = "select anz_specials from categories where categories_id = " . $categories_id;
        $res = lookup($sql, 'anz_specials');
        if ($res == '') $res = 0;
    }
    return $res;
}


// Return the number of products in a category
// TABLES: products, products_to_categories, categories
function tep_count_products_in_category_real($category_id, $include_inactive = false)
{
// mit cronjob
    $products_count = 0;
    if ($include_inactive == true) {
        $products_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_id = p2c.products_id and p2c.categories_id = '" . (int)$category_id . "'");
    } else {
        $products_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_id = p2c.products_id and p.products_status = '1' and p2c.categories_id = '" . (int)$category_id . "'");
    }
    $products = tep_db_fetch_array($products_query);
    $products_count += $products['total'];
    $child_categories_query = tep_db_query("select categories_id from " . TABLE_CATEGORIES . " where parent_id = '" . (int)$category_id . "'");
    if (tep_db_num_rows($child_categories_query)) {
        while ($child_categories = tep_db_fetch_array($child_categories_query)) {
            $products_count += tep_count_products_in_category_real($child_categories['categories_id'], $include_inactive);
        }
    }
    return $products_count;
}

////
// Return true if the category has subcategories
// TABLES: categories
function tep_has_category_subcategories($category_id)
{
    $child_category_query = tep_db_query("select count(*) as count from " . TABLE_CATEGORIES . " where parent_id = '" . (int)$category_id . "'");
    $child_category = tep_db_fetch_array($child_category_query);
    if ($child_category['count'] > 0) {
        return true;
    } else {
        return false;
    }
}

function tep_has_category_subcategories_count($category_id)
{
    $child_category_query = tep_db_query("select count(*) as count from " . TABLE_CATEGORIES . " where parent_id = '" . (int)$category_id . "'");
    $child_category = tep_db_fetch_array($child_category_query);
    if ($child_category['count'] > 0) {
        return $child_category['count'];
    } else {
        return $child_category['count'];
    }
}

/*
function cat_has_products($cat_id){
$sql="select * from products_to_categories where categories_id = ". $cat_id;
$anz=number_rows_from_sql($sql);
	if ($anz==0){
	return false;
	}else{
	return true;
	}
}
*/
function cat_has_products($cat_id)
{
    $sql = "select * from categories where  (anz_prod > 0 or anz_prod_subcats > 0 ) and categories_id = " . $cat_id;
    $anz = number_rows_from_sql($sql);
    if ($anz == 0) {
        return false;
    } else {
        return true;
    }
}


function cat_has_sub_cats($cat_id)
{
    $sql = "select categories_id from categories where parent_id = " . $cat_id;
    $anz = number_rows_from_sql($sql);
    if ($anz == 0) {
        return false;
    } else {
        return true;
    }
}

function product_is_misplaced($products_id)
{
    $products_id = (int)$products_id;
// muss in eine Sub_Kat verschoben werden um angezeigt zu werden
    $cat_id = categories_id_from_products_id($products_id);
    if (tep_has_category_subcategories($cat_id)) {
        return true;
    } else {
        return false;
    }
}

function categories_id_from_products_id($products_id)
{
//$products_id = att_clean($products_id);
//$products_id=(int)$products_id;
    $products_id = (int)$products_id;

    $sql = "select categories_id from products_to_categories where products_id = " . $products_id;
    return lookup($sql, 'categories_id');
}

function get_img_url()
{
    global $img_url;
    return $img_url;
}

function get_small_img_from_id($products_id, $width = '', $style = '')
{
    global $catalog_url, $img_url;
    $products_id = (int)$products_id;
    $sql = "select products_image from products where products_id =  " . $products_id;
    $img = lookup($sql, 'products_image');
    if ($img <> 'no_picture.gif') $has_img = true;
    if ($style <> '') $style = ' style="' . $style . '" ';
    if ($has_img) {
        if ($width <> '') {
            $return = '<img ' . $style . ' src="' . $img_url . '/' . $img . '" width="' . $width . '" />';
        } else {
            $return = '<img ' . $style . ' src="' . $img_url . '/' . $img . '" />';
        }
    } else {
        if ($width <> '') {
            $return = '<img ' . $style . ' src="' . $img_url . '/p.gif" width="' . $width . '" />';
        } else {
            $return = '<img ' . $style . ' src="' . $img_url . '/p.gif" height="' . SMALL_IMAGE_HEIGHT . '" width="' . SMALL_IMAGE_WIDTH . '" />';
        }
    }
    return $return;
}

function get_small_img_from_id_ab18($products_id, $width = '', $ab = 'ab0')
{
    global $catalog_url, $img_url, $hide_ab18_img;

    $products_id = (int)$products_id;

    $is_ab18 = false;
    if ($ab == 'ab18' and $hide_ab18_img) {
        $is_ab18 = to_bool2(lookup('select ab18 from products where products_id =' . $products_id, 'ab18'));
    }
//PROD_INFO_ADD_IMGS_SHOW_AB18
    if ($is_ab18) {
        if ($width <> '') {
            $return = '<img src="' . $img_url . '/p.gif" width="' . $width . '" height="1" /><div class="grey10n" style="margin:0 ;width:50px;height:75px;background:#bbb"></div>';
        } else {
            $return = '<img src="' . $img_url . '/p.gif" height="' . SMALL_IMAGE_HEIGHT . '" width="' . SMALL_IMAGE_WIDTH . '" />';
        }
    } else {
        $sql = "select products_image from products where products_id =  " . $products_id;
        $img = lookup($sql, 'products_image');
        if ($img <> 'no_picture.gif') $has_img = true;

        if ($has_img) {
            if ($width <> '') {
                $return = '<img src="' . $img_url . '/' . $img . '" width="' . $width . '" />';
            } else {
                $return = '<img src="' . $img_url . '/' . $img . '" />';
            }
        } else {
            if ($width <> '') {
                $return = '<img src="' . $img_url . '/p.gif" width="' . $width . '" />';
            } else {
                $return = '<img src="' . $img_url . '/p.gif" height="' . SMALL_IMAGE_HEIGHT . '" width="' . SMALL_IMAGE_WIDTH . '" />';
            }
        }
    }

    return $return;
}


function get_small_img_path_from_id($products_id)
{
    global $img_url;
    $products_id = (int)$products_id;
    $sql = "select products_image from products where products_id =  " . $products_id;
    $img = lookup($sql, 'products_image');
    if ($img <> 'no_picture.gif') $has_img = true;

    if ($has_img) {
        return $img_url . '/' . $img;
    } else {
        return '';
    }
}

function get_manufacturers_id_from_products_id($products_id)
{
    $products_id = (int)$products_id;
    $sql = "select manufacturers_id from products where products_id = '" . $products_id . "'";
    return lookup($sql, 'manufacturers_id');
}

function get_manufacturers_name_from_manufacturers_id($manufacturers_id)
{
    $sql = "select manufacturers_name from manufacturers where manufacturers_id = '" . $manufacturers_id . "'";
    return lookup($sql, 'manufacturers_name');
}

function get_manufacturers_name_from_products_id($products_id)
{
    $products_id = (int)$products_id;
    $manufacturers_id = get_manufacturers_id_from_products_id($products_id);
    return get_manufacturers_name_from_manufacturers_id($manufacturers_id);
}

function get_products_model_from_products_id($artid)
{
    $sql = "select products_model from products where products_id = '" . $artid . "'";
    return lookup($sql, 'products_model');
}

function get_products_name_from_products_id($artid, $lang_id = 2)
{
    $sql = "select products_name from products_description where products_id = '" . $artid . "' and language_id = '" . $lang_id . "'";
    $r = lookup($sql, 'products_name');
    if ($r == '') {
        $sql = "select products_name from products_description where products_id = '" . $artid . "' and language_id = '" . DEFAULT_LANGUAGE_ID . "'";
        $r = lookup($sql, 'products_name');
    }
    return $r;
}

function get_products_id_from_products_model($products_model)
{
    $sql = "select products_id from products where products_model = '" . $products_model . "'";
    return lookup($sql, 'products_id');
}

function get_specials_id_from_products_id($products_id)
{
    $sql = "select specials_id from specials where products_id = '" . $products_id . "'";
    return lookup($sql, 'specials_id');
}

function get_languages_id_from_code($code)
{
    $sql = "select languages_id from languages where code = '" . $code . "'";
    return lookup($sql, 'languages_id');
}

function get_code_from_language_id($language_id)
{
    return lang_code_from_lang_id($language_id);
}


function get_specials_id_from_products_model($products_model)
{
    $products_id = get_products_id_from_products_model($products_model);

    $sql = "select specials_id from specials where products_id = '" . $products_id . "'";
    return lookup($sql, 'specials_id');
}


function get_products_id_from_specials_id($specials_id)
{
    $sql = "select products_id from specials where specials_id = '" . $specials_id . "'";
    return lookup($sql, 'products_id');
}

function get_products_model_from_specials_id($specials_id)
{
    $products_id = get_products_id_from_specials_id($specials_id);
    return get_products_model_from_products_id($products_id);
}


function norm_price_special_price_from_products_model($products_model)
{
    $products_id = get_products_id_from_products_model($products_model);
    return norm_price_special_price_from_products_id($products_id);
}

function norm_price_special_price_from_products_id($products_id)
{
    global $currencies, $easy_discount;
    $norm_price = lookup('select products_price from products where products_id = ' . $products_id . '', 'products_price');
    $norm_price = $currencies->format($norm_price);

    $x = $norm_price;

    $specials_id = get_specials_id_from_products_id($products_id);

    if ($specials_id > 0) {
        $special_price = lookup('select specials_new_products_price from specials where specials_id = ' . $specials_id . ' ', 'specials_new_products_price');
        $special_price = $currencies->format($special_price);

        $x = '<span style="color:#666"><s>' . $x . '</s></span><br><span style="color:#c00">' . $special_price . '</span>';
        return $x;
    } else {
        return $x;
    }

}


function norm_price_special_price_from_products_model_value($products_model)
{
    $products_id = get_products_id_from_products_model($products_model);
    return norm_price_special_price_from_products_id_value($products_id);
}


function norm_price_special_price_from_products_id_value($products_id)
{
    global $currencies, $easy_discount;
    $norm_price = lookup('select products_price from products where products_id = ' . $products_id . '', 'products_price');

    $specials_id = get_specials_id_from_products_id($products_id);

    if ($specials_id > 0) {
        $special_price = lookup('select specials_new_products_price from specials where specials_id = ' . $specials_id . ' ', 'specials_new_products_price');
        return $special_price;
    } else {
        return $norm_price;
    }

}


function get_model_from_id($artid)
{
    $sql = "select products_model from products where products_id = '" . $artid . "'";
    return lookup($sql, 'products_model');
}

function get_name_from_id($artid)
{
    global $shop_is_multilang, $app_top_default_lang_id, $app_top_hint_not_yet_translated;
    $sql = "select products_name from products_description where products_id = '" . $artid . "' and language_id = '" . $_SESSION['languages_id'] . "' ";
    $r = lookup($sql, 'products_name');

    if ($r == '' and $shop_is_multilang and $_SESSION['languages_id'] <> $app_top_default_lang_id) {
        $r = get_products_name_in_german($artid) . $app_top_hint_not_yet_translated;
    }


    return strip_tags($r);
}

function get_description_from_id($artid, $truncate = false, $truncate_len = 2000)
{
    global $shop_is_multilang, $app_top_default_lang_id, $app_top_hint_not_yet_translated;
    $sql = "select products_description from products_description where products_id = '" . $artid . "' and language_id = '" . $_SESSION['languages_id'] . "' ";
    $r = lookup($sql, 'products_description');

    if ($r == '' and $shop_is_multilang and $_SESSION['languages_id'] <> $app_top_default_lang_id) {
        $r = get_products_description_in_german($artid) . $app_top_hint_not_yet_translated;
    }

    if ($truncate) $r = substr($r, 0, $truncate_len) . '&#8230;';

    return $r;
}

function products_options_name($id)
{
    global $languages_id;
    $sql = "select products_options_name from products_options where products_options_id = " . $id . " and language_id =  " . $languages_id;
    return lookup($sql, 'products_options_name');
}

function products_options_value($id)
{
    global $languages_id;
    $sql = "select products_options_values_name from products_options_values where products_options_values_id = " . $id . " and language_id =  " . $languages_id;
    return lookup($sql, 'products_options_values_name');
}


function get_products_norm_price_from_products_model($products_model, $quantity = 1)
{
    $products_id = get_id_from_model($products_model);
    $sql = "select products_price from products where products_id = '" . $products_id . "'";
    $products_price = lookup($sql, 'products_price');
    return $products_price;
}

function get_products_norm_price_from_products_id($products_id, $quantity = 1)
{
    $sql = "select products_price from products where products_id = '" . $products_id . "'";
    $products_price = lookup($sql, 'products_price');
    return $products_price;
}

function products_tax_class_id($products_id)
{
    $sql = "select products_tax_class_id from products where products_id = " . $products_id;
    return lookup($sql, 'products_tax_class_id');
}

function price_in_curr($price, $products_id, $quantity = 1)
{
    global $currencies;
//$t_price = $price;
    $products_tax_class_id = products_tax_class_id((int)$products_id);
//$price_incl_vat = tep_add_tax($t_price, tep_get_tax_rate($products_tax_class_id) ) * $quantity ;
    return $currencies->display_price($price, tep_get_tax_rate($products_tax_class_id), $quantity);

}

function get_att_price_from_id($artid, $options_id = '', $quantity = 1, $no_class = false)
{
    if (trim($options_id) == '') {
        return get_price_from_id($artid, $quantity, $no_class);
    } else {
        //global $currencies;
        $grund_price = get_grund_price_from_id($artid, $quantity);
        $options_values_price = lookup("select options_values_price from products_attributes where products_id = " . (int)$artid . "", "options_values_price");
        $price_prefix = lookup("select price_prefix from products_attributes where products_id = " . (int)$artid . "", "price_prefix");

        $sql = "select products_tax_class_id from products where products_id = '" . (int)$artid . "'";
        $products_tax_class_id = lookup($sql, 'products_tax_class_id');
        $options_values_price_incl_vat = tep_add_tax($options_values_price, tep_get_tax_rate($products_tax_class_id)) * $quantity;
        if ($price_prefix == '+') {
            //return $grund_price + $options_values_price_incl_vat;
            return $options_values_price;
        } else {
            return $grund_price - $options_values_price_incl_vat;
        }

    }
}


function get_pure_price_from_id($artid, $quantity = 1)
{
    $get_special_price = get_special_price($artid);
    if ($get_special_price == 0) {
        $sql = "select products_price from products where products_id = '" . (int)$artid . "'";
        $products_price = lookup($sql, 'products_price');

        $sql = "select products_tax_class_id from products where products_id = '" . (int)$artid . "'";
        $products_tax_class_id = lookup($sql, 'products_tax_class_id');
        return tep_add_tax($products_price, tep_get_tax_rate($products_tax_class_id)) * $quantity;

    } else {
        return $get_special_price;
    }
}


function get_grund_price_from_id($artid, $quantity = 1)
{
    $get_special_price = get_special_price($artid);
    if ($get_special_price == 0) {
        $sql = "select products_price from products where products_id = '" . (int)$artid . "'";
        $products_price = lookup($sql, 'products_price');

        $sql = "select products_tax_class_id from products where products_id = '" . (int)$artid . "'";
        $products_tax_class_id = lookup($sql, 'products_tax_class_id');
        return tep_add_tax($products_price, tep_get_tax_rate($products_tax_class_id)) * $quantity;

    } else {
        //$sql="select products_tax_class_id from products where products_id = '".(int) $artid."'";
        //$products_tax_class_id = lookup($sql,'products_tax_class_id');
        //return tep_add_tax($get_special_price, tep_get_tax_rate($products_tax_class_id) ) * $quantity ;
        return $get_special_price;
    }
}

function get_price_from_id($artid, $quantity = 1, $no_class = false, $currency_rate = 1, $display_special_price = false, $line_break = false, $show_currency = true)
{
// in specials.php (admin)
//get_price_from_id($specials['products_id'], $quantity = 1, $no_class=true,$currency_rate=1,$display_special_price=true,$line_break=true,$show_currency=true)

    global $currencies;

    if ($show_currency) $DEFAULT_CURRENCY = DEFAULT_CURRENCY . ' ';


    $artid = (int)$artid; // product attributes = product_info.php?products_id=629{1}9
    $get_special_price = get_special_price($artid);

    if ($get_special_price == 0) {
        $sql = "select products_price from products where products_id = '" . $artid . "'";
        $products_price = lookup($sql, 'products_price');

        $sql = "select products_tax_class_id from products where products_id = '" . $artid . "'";
        $products_tax_class_id = lookup($sql, 'products_tax_class_id');

        if ($no_class) {
            if ($currency_rate == 1) {
                if ($show_currency) {
                    return $DEFAULT_CURRENCY . ' ' . nuf_d(tep_add_tax($products_price, tep_get_tax_rate($products_tax_class_id)) * $quantity);
                } else {
                    return nuf_d(tep_add_tax($products_price, tep_get_tax_rate($products_tax_class_id)) * $quantity);
                }
            } else {
                if ($show_currency) {
                    return $DEFAULT_CURRENCY . ' ' . nuf_d(tep_add_tax($products_price * $currency_rate, tep_get_tax_rate($products_tax_class_id)) * $quantity);
                } else {
                    return nuf_d(tep_add_tax($products_price * $currency_rate, tep_get_tax_rate($products_tax_class_id)) * $quantity);
                }

            }
        } else {
            //return __line__.' x27691235x ';
            return $currencies->display_price($products_price, tep_get_tax_rate($products_tax_class_id), $quantity);
        }
    } else {
        $sql = "select products_tax_class_id from products where products_id = '" . $artid . "'";
        $products_tax_class_id = lookup($sql, 'products_tax_class_id');

        if ($no_class) {
            if ($currency_rate == 1) {
                if ($display_special_price) {
                    $sql = "select products_price from products where products_id = '" . $artid . "'";
                    $products_price = lookup($sql, 'products_price');
                    $sql = "select products_tax_class_id from products where products_id = '" . $artid . "'";
                    $products_tax_class_id = lookup($sql, 'products_tax_class_id');

                    $r = '<span><s>' . $DEFAULT_CURRENCY . '' . nuf_d(tep_add_tax($products_price * $currency_rate, tep_get_tax_rate($products_tax_class_id)) * $quantity) . '</s></span> ';
                    if ($line_break) $r .= '<br />';
                    $r .= '<span style="color:#c22">' . $DEFAULT_CURRENCY . '' . nuf_d($get_special_price * $quantity) . '</span>';
                    return $r;
                } else {
                    return nuf_d($get_special_price * $quantity);
                }
            } else {
                return nuf_d($get_special_price * $currency_rate * $quantity);
            }

        } else {
            return $currencies->display_price($get_special_price * $quantity, '');

        }
    }
}


function get_id_from_model($products_model)
{
    $sql = "select products_id from products where products_model = '" . $products_model . "'";
    return lookup($sql, 'products_id');
}


function easy_coupons_settings($what)
{

    $config_query = tep_db_query("select configuration_value from configuration where configuration_key = 'EASY_COUPONS' ");
    $config_array = tep_db_fetch_array($config_query);
    if ($config_array) {
        $config_all = explode('d', $config_array['configuration_value']);
        $config = explode(';', $config_all[0]);
        $active = $config[0];
        $auto = $config[1];
        $slip = $config[2];
        $invoice = $config[3];
        $email = $config[4];
        $expire = $config[5];
        $days = $config[6];
        $dtype = $config[7];
        $mf = $config[8];
        $clth = $config[9];
        $dtable = $config_all[1];
    }

    if ($what == 'days') return $days;

    if ($what == 'type') {
        if ($dtype == 'p') {
            //prozent
            return '%';
        } else {
            return '';
        }
    }

    if ($what == 'wieviel') {
        // wieviel
        $wieviel_arr = explode(';', $dtable);
        return $wieviel_arr[1]; //die erste Rabatt Stufe
    }

}


function open_time()
{
    $resultat = mysql_query("select div_res_long from diverses where div_what = 'open_time' ");
    $rad = mysql_fetch_array($resultat);
    $st = trim($rad["div_res_long"]);
    $st = nl2br($st);
    return $st;
}

function open_time_plain()
{
    $resultat = mysql_query("select div_res_long from diverses where div_what = 'open_time' ");
    $rad = mysql_fetch_array($resultat);
    $st = trim($rad["div_res_long"]);
    $order = array("\r\n", "\n", "\r");
    $replace = '<br />';
    $st = str_replace($order, $replace, $st);
//$st = nl2br($st);
//$st = str_replace('\n','',$st);
//$st = strip_tags($st);
    return $st;
}

function get_meta_description()
{
    $resultat = mysql_query("select div_res_long from diverses where div_what = 'meta_description' ");
    $rad = mysql_fetch_array($resultat);
    $st = trim($rad["div_res_long"]);
    return $st;
}

function get_meta_keywords()
{
    $resultat = mysql_query("select div_res_long from diverses where div_what = 'meta_keywords' ");
    $rad = mysql_fetch_array($resultat);
    $st = trim($rad["div_res_long"]);
    return $st;
}

function curr_stylesheet()
{
    $st = get_dv('css');
    return 'css' . $st . '/stylesheet.css';
}

function curr_stylesheet_folder()
{
    $st = get_dv('css');
    return 'css' . $st;
}

function curr_stylesheet_color($what)
{

    $st = get_dv('css');
    switch ($st) {
        case 1:
            $hintergrund = '#f9f9ee';
            $background = '#bebaa0';
            $color = '#541';
            $border = '#761';
            $font_color_on_light = '#009';
            break;
        case 2:
            $hintergrund = '#ddd';
            $background = '#444';
            $color = '#eef';
            $border = '#c00';
            $font_color_on_light = '#009';
            break;
        case 3:
            $hintergrund = '#dee4eb';
            $background = '#466a8c';
            $color = '#ffa';
            $border = '#f90';
            $font_color_on_light = '#009';
            break;
        case 4:
            $hintergrund = '#a09999';
            $background = '#000';
            $color = '#ffeeee';
            $border = '#8f140c';
            $font_color_on_light = '#900';
            break;
        case 5:
            $hintergrund = '#fafcda';
            $background = '#a94e36';
            $color = '#ff9';
            $border = '#600';
            $font_color_on_light = '#900';
            break;
        case 6:
            $hintergrund = '#99a699';
            $background = '#226307';
            $color = '#4eff11';
            $border = '#46c710';
            $font_color_on_light = '#009';
            break;
        case 7:
            $hintergrund = '#dcdac2';
            $background = '#ab6644';
            $color = '#ff9';
            $border = '#ecd33b';
            $font_color_on_light = '#009';
            break;
        case 8:
            $hintergrund = '#E1EEC4';
            $background = '#ab9b44';
            $color = '#baf84b';
            $border = '#f90';
            $font_color_on_light = '#009';
            break;
        case 9:
            $hintergrund = '#FEFEFE';
            $background = '#7797b7';
            $color = '#fff';
            $border = '#c90';
            $font_color_on_light = '#009';
            break;
        case 10:
            $hintergrund = '#ddd';
            $background = '#000';
            $color = '#fff';
            $border = '#c00';
            $font_color_on_light = '#009';
            break;
    }
    if ($what == 'background') return $background;
    if ($what == 'color') return $color;
    if ($what == 'hintergrund') return $hintergrund;
    if ($what == 'border') return $border;
    if ($what == 'font_color_on_light') return $font_color_on_light;
}

function get_bg_txt_color($class_name, $byid = false, $bytag = false)
{
    if ($byid) {
        $dot = '#';
    } else {
        $dot = '.';
    }
    if ($bytag) {
        $dot = '';
    }

    $curr_css = get_dv('css');
    $t_key = 'css' . $curr_css . '_' . $class_name;
    $t_key_txt = 'css' . $curr_css . '_' . $class_name . '_txt';
    $bg = get_dv($t_key);
    $txt = get_dv($t_key_txt);

    $str = $dot . $class_name . "{
background-color:" . $bg . ";
color:" . $txt . ";
}";
    return $str;
}

function get_only_txt_color($class_name, $byid = false)
{
    if ($byid) {
        $dot = '#';
    } else {
        $dot = '.';
    }

    $curr_css = get_dv('css');
    $t_key = 'css' . $curr_css . '_' . $class_name;
    $t_key_txt = 'css' . $curr_css . '_' . $class_name . '_txt';
    $bg = get_dv($t_key);
    $txt = get_dv($t_key_txt);

    $str = $dot . $class_name . "{
color:" . $txt . ";
}";

    return $str;
}


function gruss_appetit()
{
    $resultat = mysql_query("select div_res from diverses where div_what = 'gruss_appetit' ");
    $rad = mysql_fetch_array($resultat);
    $st = trim($rad["div_res"]);
    $st = htmlentities($st);
    return $st;
}

// start_oben_1 Shop Name
function start_oben_1()
{
    return get_div_value_byKey('show_index_logo_text_box_zeile1');
}

// start_oben_2 Lieferzeit    Lieferung 30-45 Min.
function start_oben_2()
{
    return get_div_value_byKey('show_index_logo_text_box_zeile2');
}

// start_oben_3 LONG  Liefergebiet    wir Liefern nach ....
function start_oben_3()
{
    return get_div_long_value_byKey('show_index_logo_text_box_zeile3');
}


function show_video()
{
    return get_div_value_byKey('show_video');
}

function show_about_us()
{
    return get_div_value_byKey('show_about_us');
}

function show_our_menu()
{
    return get_div_value_byKey('show_our_menu');
}

function show_most_ordered()
{
    return get_div_value_byKey('show_most_ordered');
}

function show_specials()
{
    return get_div_value_byKey('show_specials');
}

function show_schnellsuche()
{
    $resultat = mysql_query("select div_res from diverses where div_what = 'show_schnellsuche' ");
    $rad = mysql_fetch_array($resultat);
    $st = trim($rad["div_res"]);
    return $st;
}

function show_aktionsangebote()
{
    $resultat = mysql_query("select div_res from diverses where div_what = 'show_aktionsangebote' ");
    $rad = mysql_fetch_array($resultat);
    $st = trim($rad["div_res"]);
    return $st;
}

function show_tellfiend()
{
    $resultat = mysql_query("select div_res from diverses where div_what = 'show_tellfriend' ");
    $rad = mysql_fetch_array($resultat);
    $st = trim($rad["div_res"]);
    return $st;
}

function show_bestsellers()
{
    $resultat = mysql_query("select div_res from diverses where div_what = 'show_most_ordered' ");
    $rad = mysql_fetch_array($resultat);
    $st = trim($rad["div_res"]);
    return $st;
}

////

function valid_email($email)
{

    /*
  // First, we check that there's one @ symbol, and that the lengths are right
  if (!preg_match("[^[^@]{1,64}@[^@]{1,255}$]", $email)) {
    // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
    return false;
  }
  // Split it into sections to make life easier
  $email_array = explode("@", $email);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++) {
     if (!preg_match("[^(([A-Za-z0-9!#$%&#038;'*+/=?^_`{|}~-][A-Za-z0-9!#$%&#038;'*+/=?^_`{|}~\.-]{0,63})|(\"\[^(\\|\")\]{0,62}\"))$]", $local_array[$i])) {
      return false;
    }
  }
  //if (!eregX("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
  if (!preg_match("[^\[?[0-9\.]+\]?$]", $email_array[1])) {
    $domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2) {
        return false; // Not enough parts to domain
    }
    for ($i = 0; $i < sizeof($domain_array); $i++) {
      //if (!eregX("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
	  if (!preg_match("[^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|(\[A-Za-z0-9\]+))$]", $domain_array[$i])) {
        return false;
      }
    }
  }
  return true;
*/

    return filter_var($email, FILTER_VALIDATE_EMAIL);

}


// if (once_every_hours('send_mail_that_there_is_no_nl_job',false,48)) do this
function once_every_hours($eintrag_inDiv, $cronjob = false, $val = '48')
{
// in Div:  short = update_customers_orders_wie_oft  (Std) z.B: 24
// long = update_customers_orders_wie_oft (letzten Datum SQL )
// Bespiel: once_every_hours('update_customers_orders_wie_oft')

// zB: send_mail_that_there_is_no_nl_job = 24
// sendet alle 24 Std. div_res
// letztes SendeDatum im SQL-Format in div_res_long 2008-08-08 10:00:00
//$item='send_mail_that_there_is_no_nl_job';
//create_dv($what,$val)
    set_dv_if_not_exists_to($eintrag_inDiv, $val, $app_top = false);

    $item = $eintrag_inDiv;
    $send_every_hours = get_dv($item);

    if ($cronjob) $send_every_hours = floor($send_every_hours / 2);

    $last_send_date = get_div_long_value_byKey($item); // Datum in SQL Format

    if ($last_send_date == '') $last_send_date = '2001-01-01 00:00:00';

    $last_send_date_timestamp = getTimestampFromSQLDate($last_send_date);
    $last_send_date_timestamp = $last_send_date_timestamp + ($send_every_hours * 60 * 60);

    $t = local_time();
    $t_sql = Timestamp_to_SQLDate($t);


    if ($t > $last_send_date_timestamp) {
        //update $item
        $sql = "update diverses set div_res_long = '" . $t_sql . "' where div_what = '" . $item . "' ";
        q($sql);
        return true;
    } else {
        return false;
    }
}

// if (once_every_days('send_mail_that_there_is_no_nl_job')) do this
function once_every_days($eintrag_inDiv)
{
// sendet alle 60 Tage div_res
// letztes SendeDatum im SQL-Format in div_res_long 2008-08-08 10:00:00
//$item='send_mail_that_there_is_no_nl_job';
    $item = $eintrag_inDiv;
    $send_every_days = get_dv($item);
    $last_send_date = get_div_long_value_byKey($item);
    if ($last_send_date == '') $last_send_date = '2001-01-01 00:00:00';

    $last_send_date_timestamp = getTimestampFromSQLDate($last_send_date);
    $last_send_date_timestamp = $last_send_date_timestamp + ($send_every_days * 24 * 60 * 60);

    $t = time();
    $t_sql = Timestamp_to_SQLDate($t);

    if ($t > $last_send_date_timestamp) {
        //update $item
        $sql = "update diverses set div_res_long = '" . $t_sql . "' where div_what = '" . $item . "' ";
        q($sql);
        return true;
    } else {
        return false;
    }
}

function send_html_msg($template = 'email_st.htm', $subject = '', $header = '', $msg_head = '', $msg = '', $firstname = '', $lastname = '', $email_adr)
{
    $email_template = get_html_template($template);
//ec($email_template);
    $email_template = str_replace('#customer_firstname#', $firstname, $email_template);
    $email_template = str_replace('#customer_lastname#', $lastname, $email_template);
    $email_template = str_replace('#header#', $header, $email_template);
    $email_template = str_replace('#msg_head#', $msg_head, $email_template);
    $email_template = str_replace('#msg#', $msg, $email_template);
    $full_name = $firstname . ' ' . $lastname;

    $sender_email = get_config_value_byKey('STORE_OWNER_EMAIL_ADDRESS');
    $sender_name = get_config_value_byKey('STORE_NAME');

    if (valid_email($email_adr)) {
        return sendEmail($email_adr, $full_name, $sender_email, $sender_name, $subject, $email_template);
    }

}

function store_email()
{
    return STORE_OWNER_EMAIL_ADDRESS;
//return SEND_EXTRA_ORDER_EMAILS_TO;
//return get_dv('host_europe_webmail_account');
}

function store_email_all()
{
//return get_dv('host_europe_webmail_account');
    return STORE_OWNER_EMAIL_ADDRESS;
//return SEND_EXTRA_ORDER_EMAILS_TO;
}


function store_name()
{
    return STORE_NAME;
}


//sendEmail($empf_email,$abs_email,$abs_name,$subject,$nl_body);
function sendEmail($ToEmail, $ToName, $FromEmail, $FromName, $Subject, $Body)
{
    define('ENCODING', 'utf-8');
    return send_mail_html($ToName, $ToEmail, $Subject, $Body, $FromName, $FromEmail);
}

function send_mail_html_alt($ToName, $ToEmail, $Subject, $Body, $FromName, $FromEmail)
{
    //$message = new email(array('X-Mailer: osCommerce Mailer'));
    $message = new email(array('X-Mailer: myshop Mailer'));
    $message->add_html($Body, $text);
    $message->build_message();
    return $message->send($ToName, $ToEmail, $FromName, $FromEmail, $Subject);
}


function send_mail_html($ToName, $ToEmail, $Subject, $Body, $FromName, $FromEmail, $SMTPDebug = 0)
{
    // ex https://github.com/PHPMailer/PHPMailer

    /*
	 //$message = new email(array('X-Mailer: osCommerce Mailer'));
	 $message = new email(array('X-Mailer: myshop Mailer'));
	 $message->add_html($Body, $text);
	 $message->build_message();
	 return $message->send($ToName, $ToEmail, $FromName, $FromEmail, $Subject);
	*/

    //date_default_timezone_set('Europe/Berlin'); // besser in PHP.ini
    //require '../PHPMailerAutoload.php';
    //require(DIR_FS_DOCUMENT_ROOT.DIR_WS_CLASSES . 'PHPMailer/PHPMailerAutoload.php');

    if (AT_KASPERSKY_IS_ACTIVE and 1 == 2) {
        //use sendmail
        //Create a new PHPMailer instance
        $mail = new PHPMailer();
        // Set PHPMailer to use the sendmail transport
        $mail->isSendmail();
        //Set who the message is to be sent from
        /*

							//Enable SMTP debugging
							// 0 = off (for production use)
							// 1 = client messages
							// 2 = client and server messages
							$mail->SMTPDebug = $SMTPDebug;
							//Ask for HTML-friendly debug output
							$mail->Debugoutput = 'html';
*/

        $mail->setFrom($FromEmail, $FromName);
        //Set an alternative reply-to address
        //$mail->addReplyTo('replyto@example.com', 'First Last');
        //Set who the message is to be sent to
        $mail->addAddress($ToEmail, $ToName);
        //Set the subject line
        $mail->Subject = $Subject;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
        $mail->msgHTML($Body);

        //Replace the plain text body with one created manually

        //f�r reine Textmail:
        //TextBetween($s1,$s2,$s)
        $style_txt = TextBetween('<style>', '</style>', $Body);
        $plain_body = str_replace($style_txt, '', $Body);

        $plain_body = strip_tags($plain_body);
        $plain_body = str_replace('&nbsp;', ' ', $plain_body);
        $plain_body = uml($plain_body);

        $mail->AltBody = $plain_body;

        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');

        //send the message, check for errors
        if (!$mail->send()) {
            echo " Mailer Error: " . $mail->ErrorInfo;
            return false;
        } else {
            //echo " Message sent!";
            return true;
        }


    } else {

        /*
				//use sendmail
				//Create a new PHPMailer instance
				$mail = new PHPMailer();
				// Set PHPMailer to use the sendmail transport
				$mail->isSendmail();
				//Set who the message is to be sent from
				$mail->setFrom($FromEmail, $FromName);
				//Set an alternative reply-to address
				//$mail->addReplyTo('replyto@example.com', 'First Last');
				//Set who the message is to be sent to
				$mail->addAddress($ToEmail, $ToName);
				//Set the subject line
				$mail->Subject = $Subject;
				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
				$mail->msgHTML($Body);

				//Replace the plain text body with one created manually

				//f�r reine Textmail:
				//TextBetween($s1,$s2,$s)

				$style_txt = TextBetween('<style>','</style>',$Body) ;
				$plain_body = str_replace($style_txt,'',$Body);

				$plain_body = strip_tags($plain_body);
				$plain_body = str_replace('&nbsp;',' ',$plain_body);
				$plain_body = uml($plain_body);

				$mail->AltBody = $plain_body;


				//Attach an image file
				//$mail->addAttachment('images/phpmailer_mini.png');

				//send the message, check for errors
				if (!$mail->send()) {
					echo " Mailer Error: " . $mail->ErrorInfo;
					return false;
				} else {
					//echo " Message sent!";
					return true;
				}

			*/


        //use SMTP

        //$mail_host = 'mail.erotik-mega-store.ch';
        //$mail_port = '25';
        //$mail_username = 'info@erotik-mega-store.ch';
        //$mail_password = '!teller99_7209Nx';


        $mail_host = get_dv('host_europe_mail_host');
        $mail_port = '25';
        //$mail_username = 'info@gay-mega-store.ch';
        //$mail_password = 'C?2gis68';
        $mail_username = get_dv('host_europe_webmail_account');
        $mail_password = get_dv('host_europe_webmail_pw');


        $mail = new PHPMailer;
        //$mail = new SMTP;

        // per SMTP:
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = $SMTPDebug;
        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';


        //Set the hostname of the mail server
        //$mail->Host = "mail.erotik-mega-store.ch";
        $mail->Host = $mail_host;

        //Set the SMTP port number - likely to be 25, 465 or 587
        //$mail->Port = 25;
        $mail->Port = $mail_port;

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication
        //$mail->Username = "info@erotik-mega-store.ch";
        $mail->Username = $mail_username;

        //Password to use for SMTP authentication
        //$mail->Password = "!teller99_7209Nx";
        $mail->Password = $mail_password;


        //Set who the message is to be sent from
        //$mail->setFrom('info@erotik-mega-store.ch', 'erotik-mega-store');
        $mail->setFrom($FromEmail, $FromName);


        //Set an alternative reply-to address
        //$mail->addReplyTo('info@erotik-mega-store.ch', 'erotik-mega-store');
        $mail->addReplyTo($FromEmail, $FromName);


        /////////////////////////////////////////////////////////
        //Set who the message is to be sent to
        //$mail->addAddress('mydotter.webservice@googlemail.com', 'Test Name');
        $mail->addAddress($ToEmail, $ToName);

        //Set the subject line
        //$mail->Subject = 'PHPMailer SMTP test';
        $mail->Subject = $Subject . '';

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
        $mail->msgHTML($Body);


        //Replace the plain text body with one created manually
        //$mail->AltBody = 'This is a plain-text message body';  // lassen ?!

        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');

        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
            return false;
        } else {
            //echo "Message sent!";
            return true;
        }


        /*
							//$mail->isSMTP();                                      // Set mailer to use SMTP
							//$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup server
							//$mail->SMTPAuth = true;                               // Enable SMTP authentication
							//$mail->Username = 'jswan';                            // SMTP username
							//$mail->Password = 'secret';                           // SMTP password
							//$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

							$mail->From = $FromEmail;
							$mail->FromName = $FromName;
							//$mail->addAddress('josh@example.net', 'Josh Adams');  // Add a recipient
							$mail->addAddress($ToEmail);               // Name is optional
							//$mail->addReplyTo('info@example.com', 'Information');
							//$mail->addCC('cc@example.com');
							//$mail->addBCC('bcc@example.com');

							$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
							//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
							//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
							$mail->isHTML(true);                                  // Set email format to HTML

							$mail->Subject = $Subject;
							$mail->Body    = $Body;
							$mail->AltBody = strip_tags($Body);

							if(!$mail->send()) {
							   //echo 'Message could not be sent.';
							   //echo 'Mailer Error: ' . $mail->ErrorInfo;
							   //exit;
							   return false;
							}else{
								return true;
							}

						//echo 'Message has been sent';
						*/

    }//if(AT_KASPERSKY_IS_ACTIVE ){
}


function get_from_customers($customers_id, $what)
{
    $sql = "select " . $what . " from customers where customers_id = '" . $customers_id . "' ";
    return lookup($sql, $what);
}

function get_customers_lang_id($customers_id)
{
//1, 2, 3 usw
    $sql = "select customers_lang from customers where customers_id='" . $customers_id . "' ";
    $lang = lookup($sql, 'customers_lang');
    return $lang;
}

function get_customers_lang($customers_id)
{
    //german, french, english usw
    $sql = "select customers_lang from customers where customers_id='" . $customers_id . "' ";
    $lang_id = lookup($sql, 'customers_lang'); //das ist die lang_id !!
    //if ($lang=='') $lang = 'german';
    $lang_dir = lang_long_from_lang_id($lang_id);
    return $lang_dir;
}

function get_customers_lang_from_email($customers_email)
{
    //german, french, english usw
    $sql = "select customers_lang from customers where customers_email_address='" . $customers_email . "' ";
    $lang_id = lookup($sql, 'customers_lang'); //das ist die lang_id !!
    //if ($lang=='') $lang = 'german';
    //return $lang;
    $lang_dir = lang_long_from_lang_id($lang_id);
    return $lang_dir;
}

function get_customers_lang_from_order_id($o_id)
{
    $sql = "select customers_id from orders where orders_id='" . $o_id . "' ";
    $customers_id = lookup($sql, 'customers_id');
    return get_customers_lang($customers_id);
}

function get_customers_id_from_order_id($o_id)
{
    $sql = "select customers_id from orders where orders_id='" . $o_id . "' ";
    $customers_id = lookup($sql, 'customers_id');
    return $customers_id;
}

function get_customers_country_from_order_id($o_id)
{
    $sql = "select customers_country from orders where orders_id='" . $o_id . "' ";
    $customers_country = lookup($sql, 'customers_country');
    return $customers_country;
}


function ___tep_mail($to_name, $to_email_address, $email_subject, $email_text, $from_email_name, $from_email_address)
{

    return send_mail_html($to_name, $to_email_address, $email_subject, $email_text, $from_email_name, $from_email_address, $SMTPDebug = 0);

}

function update_html_template($nl_template, $job_id)
{

    $t = time();
//$t = $t + (9*60*60);
    $t_sql = Timestamp_to_SQLDate($t);
//$t_german = getDatefromTimestamp($t);
//$t_german = $t_german .' (Serverzeit) - '.getDatefromTimestamp( $t + (server_time_diff()*60*60) ) . ' (lokale Zeit)';
    $ts = ($t + (server_time_diff() * 60 * 60));
    $t_german = getDatefromTimestamp(time());

    $color = curr_stylesheet_color('color');//#color#
    $css_no = curr_stylesheet_no();//#css_no#
    $curr_stylesheet_color = curr_stylesheet_color('hintergrund'); //#background#
    $curr_stylesheet_hintergr = curr_stylesheet_color('background'); //#background#

    $sql = "select sender_name from newsletter_jobs where job_id = '" . $job_id . "' ";
    $firma = lookup($sql, 'sender_name');//#firma#
    //$firma=start_oben_1();//#firma#
    $opentime = open_time();//#opentime#
    $domain = DIR_WS_FULL;//#http_host#
    $url = shop_url_long();//#url#
    //$url_short= strtolower(str_replace('http://','',HTTP_CATALOG_SERVER));//#url_short#
    $url_short = shop_url_short();

    $background_img_top = DIR_WS_FULL . 'css' . curr_stylesheet_no() . '/img/tile_sub.gif';
    $order_phone = order_phone(); //#order_phone#

    $nl_template = str_replace('#color#', $color, $nl_template);
    $nl_template = str_replace('#css_no#', $css_no, $nl_template);
    $nl_template = str_replace('#background#', $curr_stylesheet_color, $nl_template);
    $nl_template = str_replace('#hintergr#', $curr_stylesheet_hintergr, $nl_template);

    $nl_template = str_replace('#firma#', $firma, $nl_template);
    $nl_template = str_replace('#http_host#', $domain, $nl_template);
    $nl_template = str_replace('#css_no#', $css_no, $nl_template);
    $nl_template = str_replace('#opentime#', $opentime, $nl_template);
    $nl_template = str_replace('#url#', $url, $nl_template);
    $nl_template = str_replace('#url_short#', shop_url_short(), $nl_template);
    $email_head_adr = get_dv_l('email_head_adr ');
    $nl_template = str_replace('#email_head_adr#', $email_head_adr, $nl_template);

    $nl_template = str_replace('#order_phone#', $order_phone, $nl_template);
    $nl_template = str_replace('#timestamp#', $t_german, $nl_template);
    $nl_template = str_replace('#background_img_top#', $background_img_top, $nl_template);
    return $nl_template;

}


function get_html_template($selected_template)
{
    $t = time();
//$t = $t + (9*60*60);
    $t_sql = Timestamp_to_SQLDate($t);
//$t_german = getDatefromTimestamp($t);
//$t_german = $t_german .' (Serverzeit) - '.getDatefromTimestamp( $t + (server_time_diff()*60*60) ) . ' (lokale Zeit)';
    $ts = ($t + (server_time_diff() * 60 * 60));
    $t_german = getDatefromTimestamp(time());

    //$template = DIR_FS_DOCUMENT_ROOT.DIR_WS_INCLUDES.'templates/'.$selected_template;
    $template = DIR_WS_INCLUDES . 'templates/' . $selected_template;
    if (file_exists($template)) {
        $nl_template = get_text_from_path($template);

        $color = curr_stylesheet_color('color');//#color#
        $css_no = curr_stylesheet_no();//#css_no#
        $curr_stylesheet_color = curr_stylesheet_color('hintergrund'); //#background#
        $curr_stylesheet_hintergr = curr_stylesheet_color('background'); //#background#
        $firma = start_oben_1();//#firma#
        $opentime = open_time();//#opentime#
        $domain = DIR_WS_FULL;//#http_host#
        $url = shop_url_long();//#url#
        $url_short = shop_url_short();//#url_short#

        $order_phone = order_phone(); //#order_phone#

        $nl_template = str_replace('#color#', $color, $nl_template);
        $nl_template = str_replace('#css_no#', $css_no, $nl_template);
        $nl_template = str_replace('#background#', $curr_stylesheet_color, $nl_template);
        $nl_template = str_replace('#hintergr#', $curr_stylesheet_hintergr, $nl_template);
        $nl_template = str_replace('#firma#', $firma, $nl_template);
        $nl_template = str_replace('#http_host#', $domain, $nl_template);
        $nl_template = str_replace('#css_no#', $css_no, $nl_template);
        $nl_template = str_replace('#opentime#', $opentime, $nl_template);
        $nl_template = str_replace('#url#', $url, $nl_template);
        $nl_template = str_replace('#url_short#', $url_short, $nl_template);

        $email_head_adr = get_dv_l('email_head_adr ');
        $nl_template = str_replace('#email_head_adr#', $email_head_adr, $nl_template);

        $nl_template = str_replace('#order_phone#', $order_phone, $nl_template);
        $nl_template = str_replace('#timestamp#', $t_german, $nl_template);
        return $nl_template;
    } else {
        return 'not found ' . $template;
    }

}

function add_http_to_url($url)
{
    if ($url == '') {
        return '';
    } else {
        if (stristr($url, 'http://')) {
            return $url;
        } else {
            return 'http://' . $url;
        }
    }
}

function this_URL()
{
    return root_path_URL();
}

function root_path_URL()
{

    if (url_has_no_subdomain(HTTP_CATALOG_SERVER)) {
        return HTTP_CATALOG_SERVER . '/' . CAT_FOLDER_TOP . DIR_WS_CATALOG;
    } else {
        return HTTP_CATALOG_SERVER . DIR_WS_CATALOG;
    }

}


function url_has_no_subdomain($url)
{
    global $apptop_shop_server;

    if (stristr($url, ':www.')) {
        return true;
    } else {
        $clear_root = str_replace($apptop_shop_server, '', $_SERVER["SERVER_NAME"]);
        $clear_root = str_replace('.', '', $clear_root);
        if ($clear_root == '') {
            return true;
        } else {
            return false;
        }
    }

}

function root()
{
    global $apptop_shop_server;
//$folder = $_SERVER["DOCUMENT_ROOT"]."/sp/".$shop."/catalog/images/artikel/".$folder_size."/";
    if ($apptop_shop_server == 'mydatashop.net') {
        //return '/public_html/';
        return ROOT_FOLDER;
    } else {
        return $_SERVER["DOCUMENT_ROOT"] . '/';
    }
}

function clear_root($str)
{
    if (stristr($_SERVER["DOCUMENT_ROOT"], $str)) {
        return str_replace($str, '', $_SERVER["DOCUMENT_ROOT"]);
    } else {
        return $_SERVER["DOCUMENT_ROOT"];
    }
}

function dev_root()
{
    global $apptop_shop_server;
    if ($apptop_shop_server == 'mydatashop.net') {
        $r = str_replace('/sp/mh_DEV', '', ROOT_FOLDER);
    } else {
        $r = ROOT_FOLDER;
    }
    return $r;
}

function server_set_time_limit($limit)
{
    if (!get_cfg_var('safe_mode')) {
        set_time_limit($limit);
    }
}

function get_current_validate_sign_session()
{
    $sql = 'select current_validate_sign_session FROM session where id_session=1';
    $sql_result = mysql_query($sql);
    $row = mysql_fetch_array($sql_result);
    $number = $row["current_validate_sign_session"];
    return $number;
}


function update_session($new_string)
{
    $sql = 'update session set current_validate_sign_session ="' . $new_string . '" where id_session=1';
    $sql_result = mysql_query($sql);
}

function get_mind_bestwerte($there_is_a_porto_freigrenze = true)
{
    if ($there_is_a_porto_freigrenze or 1 == 1) {
        $tab = '
<table border="0" cellspacing="0" cellpadding="3" style="width:99%;color:#000;line-height:140%">
<tr><td><strong  style="color:#009;"><u>Liefergebiet 1 - Mindestbestellwert ' . DEFAULT_CURRENCY . ' ' . get_dv('min_wert_plz_betrag1') . '.-</u></strong></td></tr>
<tr><td style="font-size:1.2em">' . get_dv_l('min_wert_plz_long_txt1') . '</td></tr>
<tr><td style="color:#999;padding-left:12px">' . get_dv_l('min_wert_plz_long_list1') . '</td></tr> 
';
        if (get_dv_l('min_wert_plz_long_list2') <> '') {

            $tab .= '
<tr><td><strong style="color:#009;"><u>Liefergebiet 2 - Mindestbestellwert ' . DEFAULT_CURRENCY . ' ' . get_dv('min_wert_plz_betrag2') . '.-</u></strong></td>
</tr><tr><td style="font-size:1.2em">' . get_dv_l('min_wert_plz_long_txt2') . '</td></tr>
<tr><td style="color:#999;padding-left:12px">' . get_dv_l('min_wert_plz_long_list2') . '</td></tr>';
        };

        if (get_dv_l('min_wert_plz_long_list3') <> '') {

            $tab .= '
<tr><td><strong style="color:#009;"><u>Liefergebiet 3 - Mindestbestellwert ' . DEFAULT_CURRENCY . ' ' . get_dv('min_wert_plz_betrag3') . '.-</u></strong></td></tr>
<tr><td style="font-size:1.2em">' . get_dv_l('min_wert_plz_long_txt3') . '</td></tr>
<tr><td style="color:#999;padding-left:12px">' . get_dv_l('min_wert_plz_long_list3') . '</td></tr>';
        }

        $tab .= '
</table>
';
        return $tab;
    }
}

function min_order_amount()
{
    if (get_dv_bool('min_order_plz_is_installed')) {
        if (get_dv_bool('min_wert_plz_is_active')) {
            $plz = get_customer_delivery_plz();
            if ($plz == 'nix') {
                $st = get_dv('min_wert_plz_betrag1'); //Liefergebiet 1 - wenn PLZ unbekannt
            } else {
                $st = min_order_amount_plz($plz); // Liefergebiet gem PLZ
            }
        } else {
            // MIN_ORDER_AMOUNT
            $sql = "select configuration_value from configuration where configuration_key ='MIN_ORDER_AMOUNT' ";
            $st = lookup($sql, 'configuration_value');
        }
    } else {
        // MIN_ORDER_AMOUNT
        $sql = "select configuration_value from configuration where configuration_key ='MIN_ORDER_AMOUNT' ";
        $st = lookup($sql, 'configuration_value');
    }
    if ($st == '') $st = 0;
    return $st;
}

function min_order_amount_plz($plz)
{
    if (get_dv_bool('min_order_plz_is_installed')) {
        if (get_dv_bool('min_wert_plz_is_active')) {
            $plz_liste1 = get_dv_l('min_wert_plz_long_list1');
            $plz_liste2 = get_dv_l('min_wert_plz_long_list2');
            $plz_liste3 = get_dv_l('min_wert_plz_long_list3');

            if (strstr($plz_liste3, $plz)) {
                return get_dv('min_wert_plz_betrag3');
            } else {
                if (strstr($plz_liste2, $plz)) {
                    return get_dv('min_wert_plz_betrag2');
                } else {
                    return get_dv('min_wert_plz_betrag1');
                }
            }
        } else {
            // MIN_ORDER_AMOUNT
            $sql = "select configuration_value from configuration where configuration_key ='MIN_ORDER_AMOUNT' ";
            $st = lookup($sql, 'configuration_value');
        }
    } else {
        // MIN_ORDER_AMOUNT
        $sql = "select configuration_value from configuration where configuration_key ='MIN_ORDER_AMOUNT' ";
        $st = lookup($sql, 'configuration_value');
    }
    if ($st == '') $st = 0;
    return $st;
}

function get_customer_delivery_plz()
{
    if (tep_session_is_registered('customer_id')) {
        //if (!isset($_SESSION['angemeldet'])
        $customers_id = $_SESSION['customer_id'];
        $address_id = $_SESSION['customer_default_address_id'];

        $sql = "select entry_firstname as firstname, entry_lastname as lastname, entry_company as company, entry_street_address as street_address, entry_suburb as suburb, entry_city as city, entry_postcode as postcode, entry_state as state, entry_zone_id as zone_id, entry_country_id as country_id from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . (int)$customers_id . "' and address_book_id = '" . (int)$address_id . "'";
        return lookup($sql, 'postcode');
    } else {
        return 'nix';
    }
}


function get_customers_lang_long($customers_id)
{
    $lang_id = get_customers_lang_id($customers_id);
    return lang_long_from_lang_id($lang_id);
}

function set_default_lang($customers_id, $lang_id)
{
    $sql = "update customers set customers_lang='" . $lang_id . "' where customers_id='" . $customers_id . "' ";
    q($sql);
}

function lang_code_from_lang_id($lang_id)
{
    $sql = "select code from languages where languages_id='" . $lang_id . "' ";
    return lookup($sql, 'code');
}

function lang_id_from_lang($lang)
{
    $sql = "select languages_id from languages where directory='" . $lang . "' ";
    return lookup($sql, 'languages_id');
}

function lang_long_from_lang_id($lang_id)
{
    $sql = "select directory from languages where languages_id='" . $lang_id . "' ";
    return lookup($sql, 'directory');
}

function lang_directory_from_lang_code($lang_code)
{
    $sql = "select directory from languages where code='" . $lang_code . "' ";
    return lookup($sql, 'directory');
}

function lang_code_from_lang_directory($lang_directory)
{
    $sql = "select code from languages where directory='" . $lang_directory . "' ";
    return lookup($sql, 'code');
}


function lang_name_from_lang_code($lang_code)
{
    $sql = "select name from languages where code='" . $lang_code . "' ";
    return lookup($sql, 'name');
}

function lang_name_from_lang_id($lang_id)
{
    $sql = "select name from languages where languages_id='" . $lang_id . "' ";
    return lookup($sql, 'name');
}


function lang_full_from_lang_id($lang_id)
{
    $sql = "select name from languages where languages_id='" . $lang_id . "' ";
    return lookup($sql, 'name');
}

function latest_orders_id($customers_id)
{
    $sql = "select orders_id from orders where customers_id='" . $customers_id . "' order by orders_id desc limit 1 ";
    return lookup($sql, 'orders_id');
}

function get_orders_comment($orders_id)
{

    if (AT_KASPERSKY_IS_ACTIVE) {
        $sql = "select comments from orders_status_history where orders_id='" . $orders_id . "' and orders_status_id = 3 ";
    } else {
        $sql = "select comments from orders_status_history where orders_id='" . $orders_id . "' ";
    }
    return lookup($sql, 'comments');
}


function customer_first_order_date($customers_id)
{

//$sql="select date_purchased from orders where customers_id='".$customers_id."' order by orders_id limit 1 ";
//return lookup($sql,'date_purchased');

    $sql = "select customers_first_order from customers where customers_id='" . $customers_id . "'  ";
    return lookup($sql, 'customers_first_order');
}

function customer_last_order_date($customers_id)
{
    $sql = "select customers_last_order from customers where customers_id='" . $customers_id . "'  ";
    return lookup($sql, 'customers_last_order');
}


function customers_info_date_account_created($customers_id)
{
    $sql = "select customers_info_date_account_created from customers_info where customers_info_id='" . $customers_id . "'  ";
    return lookup($sql, 'customers_info_date_account_created');
}

function customers_info_number_of_logons($customers_id)
{
    $sql = "select customers_info_number_of_logons from customers_info where customers_info_id='" . $customers_id . "'  ";
    return lookup($sql, 'customers_info_number_of_logons');
}

function customers_info_date_of_last_logon($customers_id)
{
    $sql = "select customers_info_date_of_last_logon from customers_info where customers_info_id='" . $customers_id . "'  ";
    return lookup($sql, 'customers_info_date_of_last_logon');
}


/*

$customers_info_date_account_created = customers_info_date_account_created($customers_id);

$customers_info_number_of_logons = customers_info_number_of_logons($customers_id);

$customers_info_date_of_last_logon = customers_info_date_of_last_logon($customers_id);

function get_customers_lang($customers_id){
//german, french, english usw
$sql="select customers_lang from customers where customers_id='".$customers_id."' ";
$lang = lookup($sql,'customers_lang');
if ($lang=='') $lang = 'german';
return $lang;
}

function get_customers_lang_from_email($customers_email){
//german, french, english usw
$sql="select customers_lang from customers where customers_email_address='".$customers_email."' ";
$lang = lookup($sql,'customers_lang');
if ($lang=='') $lang = 'german';
return $lang;
}

function get_customers_lang_from_order_id($o_id){
$sql="select customers_id from orders where orders_id='".$o_id."' ";
$customers_id = lookup($sql,'customers_id');
return get_customers_lang($customers_id);
}
*/
?>
