<?php
//my_cat_funct2.php
/*
db_tr($definition='SHOPPING_CART_IST_LEER_HINT',$page='general',$from_lang_code='de',$content='Der Warenkorb ist leer!')
TextBetween($s1,$s2,$s)

fields_in_table($table){ 

fields_in_table2($table){ 


echo get_long_html_editor_any_table($id,$table,$field,$id_field,$use_enh_editor=true);


echo date_picker_any_table($id,$table,$date_key,$id_field,$h)


get_enh_html_editor_any_table($id,$table,$field,$id_field)


$table = 'languages' ;
$field = 'status' ;
$id_field = 'languages_id' ;
$class='qedit_comment'; // defualt = 'qedit_outer' 
$style='max-width:300px';

echo get_checkbox_any_table($id,$table,$field,$id_field,$class,$style);

get_plain_text_editor_any_table($id,$table,$field,$id_field,$class,$style,$before_txt='',$after_txt='') 

get_hint_by_t_key($t_key,$use_outer_div=true,$show_header=true,$use_comment_div=true)


get_colorpicker_by_t_key($t_key,$field='')

get_link_to_define_anypage('lief_zlg')


get_file_html_editor_by_t_key_link('conditions_content.php')


get_enh_html_editor_by_t_key_link('conditions_is_active',$field='t_key_comment') 


get_select_by_t_key(
$t_key,$pref='',$suff='',$show_bitte=false,$allow_edit=false,$option_arr='',
$make_arr = false,
$arr_from = 0,
$arr_to = 0,
$add_in='',
$show_link=true,
$use_enh_editor=true,
$use_on_change=true,$style='margin-left:6px;',$arr_step ='1'
)

get_open_in_options($t_key)   

*/


function bool_to_text($var)
{

    if ($var === true) {
        return ' ist TRUE';
    } else {
        return ' ist FALSE';
    }

}


function get_zusatz_bilder_lightbox($products_id)
{
    global $product_info_large_img_on_click_history_back;
    //$zi .= get_backside_b($products_id);
    for ($i = 2; $i < 26; $i++) {
        $zi .= get_zusatz_b_lightbox($i, $products_id);
    }
    return $zi;
}

function get_zusatz_b_lightbox($i, $products_id)
{
    global $at_use_wz_tooltips_product_info, $img_url, $prod_info_zusatz_img_height, $img_settings_status;
// ein Bild
    $sql = "select products_subimage" . $i . " from products where products_id =  " . $products_id;
    $r = lookup($sql, 'products_subimage' . $i);
//ec($r);


//db_tr('CLICK_RIGHT_PART_OF_IMG_FOR_NEXT_IMG','general','de','Klicken Sie auf die rechte H�lfte des Bildes, um zum n�chsten Bild zu gehen.');

    if (stristr($r, 'artikel/subimage')) {
        $FS_img_dir = DIR_FS_CATALOG . 'images/';
        $WS_img_dir = $img_url;
        $old_folder = false;
    } else {
        //$FS_img_dir = DIR_FS_CATALOG.'images/artikel/';
        //$WS_img_dir = DIR_WS_FULL.'images/artikel/';
        $old_folder = true;
    }

    $i = $i - 1;
    if ($r <> '') {
        if ($old_folder and file_exists('images/artikel/imagecache/' . $r)) {

        } else {

            if (!$old_folder and file_exists($FS_img_dir . $r)) {
                $r_large = str_replace('/subimage_small/', '/subimage_medium/', $r);
                //if(is_dev()) $rt.='<div style="margin-top:5px;font-size:0.8em;color:#666">DEV: kleines Bild: <b>'.to_href($WS_img_dir.$r).'</b> &nbsp; '.img_info_str($FS_img_dir.$r).'</div>';
                if (file_exists($FS_img_dir . '' . $r)) {
                    //if(is_dev()) $rt.='<div style="margin-top:5px;font-size:0.8em;color:#666">DEV: grosses Bild: <b>'.to_href($WS_img_dir.''.$r_large).'</b> &nbsp; '.img_info_str($FS_img_dir.''.$r_large).'</div>';
                }

                $model = get_model_from_id($products_id);
                $name = get_name_from_id($products_id);
                $price = get_price_from_id($products_id);
                $link = 'images/' . $r_large;
                $what_img = 'products_subimage' . $i;
                $img_FS = $FS_img_dir . $r;
                $r_medium = $r_large;
                $r_large = str_replace('/subimage_medium/', '/subimage_large/', $r_large);

                if ($at_use_wz_tooltips_product_info) {


//ec(__line__.': '.$r);
//ec(__line__.': '.$r_large);
//$prod_info_zusatz_img_height
//ec(__line__.': '.$prod_info_zusatz_img_height);

                    $wz_small_img = 'images/' . $r;
                    $wz_large_img = 'images/' . $r_large;
                    //if($at_use_wz_tooltips_product_info) $wz_large_img=str_replace('/subimage_medium/','/subimage_large/',$wz_large_img);

                    $wz_large_img_width = get_img_size_str($wz_large_img, $what = 0);
                    $wz_large_img_height = get_img_size_str($wz_large_img, $what = 1);
                    //gms_wz_tooltip($small_img,$large_img,$l_img_width='300',$l_img_height='400',$href='#')
                    //gms_wz_tooltip($small_img,$large_img,$l_img_width='300',$l_img_height='400',$href='#', $target='',$s_img_width='',$s_img_height='', $class='', $is_new=false, $new_m_left='17',$new_m_top='3', $is_available_again=false, $is_hot=false, $is_sold_out=false)


                    //ec(__line__.': '.$FS_img_dir.$r_medium);
                    //ec(__line__.': '.$FS_img_dir.$r_large);
                    //ec(__line__.': '.add_gms_wz_tooltip($FS_img_dir.$r_medium));
                    $add_gms_wz_tooltip = add_gms_wz_tooltip($FS_img_dir . $r_medium);

                    //$data_title = encodeToUtf8(CLICK_RIGHT_PART_OF_IMG_FOR_NEXT_IMG);
                    //$data_title = CLICK_RIGHT_PART_OF_IMG_FOR_NEXT_IMG;
                    $data_title = encodeToUtf8_loc(IMG_GALLERY_LIGHTWINDOW_HINT);

                    $rt .= '<a class="example-image-link" href="images/' . $r_large . '" data-lightbox="example-set" data-title="' . $data_title . '" ' . $add_gms_wz_tooltip . '>
                    <img class="example-image enlarge" src="images/' . $r . '" height="' . $prod_info_zusatz_img_height . '" alt=""/></a>';


                } else { //if ($at_use_wz_tooltips_product_info){
                    //ec(__line__.' link: '.$link);
                    $large_link = str_replace('/subimage_medium/', '/subimage_large/', $link);

//ec(__line__.': '.$large_link);
                    /*					
					$rt .= '<a class="lightwindow page-options" rel="Random[BildL]" 
					title="'.GENERAL_BILD_VERGROESSERN.'" 
					caption="'.IMG_GALLERY_LIGHTWINDOW_HINT.'"
					href="'.$large_link.'"><img style="margin:2px 4px;border:none;" src="images/'.$r.'" height="'.$prod_info_zusatz_img_height.'" /></a>';
*/
                    //$data_title = encodeToUtf8(CLICK_RIGHT_PART_OF_IMG_FOR_NEXT_IMG);
                    $data_title = encodeToUtf8_loc(IMG_GALLERY_LIGHTWINDOW_HINT);

                    $rt .= '<a class="example-image-link" href="images/' . $r_large . '" data-lightbox="example-set" data-title="' . $data_title . '">
                    <img class="example-image enlarge" src="images/' . $r . '" height="' . $prod_info_zusatz_img_height . '" alt=""/></a>';


                }

                //$rt .= $img_str;
                //if($at_use_wz_tooltips_product_info) $wz_large_img=str_replace('/subimage_medium/','/subimage_large/',$wz_large_img);	


//ec(__line__.': '.$img_url);
//ec(__line__.': '.$wz_large_img);

                //$wz_large_img = str_replace('images/',$img_url,$wz_large_img);
//ec(__line__.': '.$wz_large_img);		


                return $rt;

            }


        }
    }

}


function FS_to_WS_img($path, $show_details = false)
{
    $p = str_replace(ROOT_FOLDER, HTTP_CATALOG_SERVER, $path);

    if ($show_details) {
        $details = get_img_size_str($path, $what = 3) . ' ' . round(filesize($path) / (256 * 4), 1) . ' Kb<br>' . $path;
        return '<img src="' . $p . '"><div class="grey11">' . $details . '</div>';
    } else {
        return '<img src="' . $p . '">';
    }
}


function FS_to_WS($path)
{
    $p = str_replace(ROOT_FOLDER, HTTP_CATALOG_SERVER, $path);
    return $p;
}

function WS_to_FS($path)
{
    $p = str_replace(HTTP_CATALOG_SERVER, ROOT_FOLDER, $path);
    return $p;

}


function get_wow_slider_size($path, $return_width = true)
{
    //$path= DIR_FS_CATALOG.'myuploads_wow_slider/WOW/sdps//banner_test2/data1/images/';  
    $path = str_replace('//', '/', $path);
    $path = str_replace('/index.html', '/data1/images/', $path);


    $max_w = 0;
    $max_h = 0;

    if (is_dir($path)) {
        $imgs = get_images_in_folder($path);
        $imgs_arr = explode(',', $imgs);
        for ($i = 0, $n = sizeof($imgs_arr); $i < $n; $i++) {
            $this_img = $path . '' . $imgs_arr[$i];
            $image_size = @getimagesize($this_img);
            $max_w = max($image_size[0], $max_w);
            $max_h = max($image_size[1], $max_h);


        }

        if ($return_width) {
            return $max_w;
        } else {
            return $max_h;
        }

    } else {
        if ($return_width) {
            return '0';
        } else {
            return '0';
        }
    }

}


function platzhalter_to_display_google_map_shop($ph)
{
    $ph_arr1 = explode('?', $ph);
    $items = $ph_arr1[1];
    $items = str_replace('#', '', $items);
    $items_arr = explode(',', $items);

    $height_arr = $items_arr[0];
    $height_arr2 = explode('=', $height_arr);
    $height = $height_arr2[1];

    $width_arr = $items_arr[1];
    $width_arr2 = explode('=', $width_arr);
    $width = $width_arr2[1];

    $margin_arr = $items_arr[2];
    $margin_arr2 = explode('=', $margin_arr);
    $margin = $margin_arr2[1];

    return get_google_map_store($height, $width, $margin);
}

function platzhalter_to_txt($txt)
{

    if (strstr($txt, '##include_google_map_shop?')) {
        //$include_txt = str_replace('#include_google_map#',get_google_map_store(),$include_txt);
        //$include_txt = str_replace('#include_google_map#',get_google_map_store(),$include_txt);

        $to_be_replaced = TextBetween('##include_google_map_shop?', '##', $txt);
        $to_be_replaced = '##include_google_map_shop?' . $to_be_replaced . '##';
        //$replace_with = '<!-- video begin -->'.platzhalter_to_display_video($to_be_replaced).'<!-- video end -->';
        $replace_with = '<span class="notranslate">' . platzhalter_to_display_google_map_shop($to_be_replaced) . '</span>';

        $txt = str_replace($to_be_replaced, $replace_with, $txt);

    }

    return $txt;
}


function include_to_txt($include, $add_wrapper = true)
{
    $include_txt = $source_str = file_get_contents($include);

    if (strstr($include_txt, '#include_google_map#')) {
        $include_txt = str_replace('#include_google_map#', get_google_map_store(), $include_txt);
    }

    if (stristr($include_txt, '##superfish_catlist#')) {
        $this_superfish_catlist = TextBetween('##superfish_catlist#', '#end_superfish_catlist##', $include_txt);
        $this_superfish_catlist = '##superfish_catlist#' . $this_superfish_catlist . '#end_superfish_catlist##';
        $this_superfish_catlist_str = categories_superfish_from_str($this_superfish_catlist, false);
        //$superfish_text = str_replace($this_superfish_catlist,$this_superfish_catlist_str,$superfish_text);
        $include_txt = str_replace($this_superfish_catlist, $this_superfish_catlist_str, $include_txt);
        //$include_txt = $this_superfish_catlist_str.$include_txt;
        $include_txt = str_replace('class="sf-mega-section"', '', $include_txt);
        //
    }


    if ($add_wrapper) $include_txt = '<div class="mystyle_sdp_wrap">' . $include_txt . '</div>';

    return $include_txt;
}


function get_google_map_store($height = '500px', $width = '100%', $margins = '9px 0 2px 0')
{
//function db_tr($definition,$page,$from_lang_code,$content,$re_translate=false){
    db_tr($definition = 'STREETVIEW_PULL_ICON_HINT', 'general', $from_lang_code = 'de', $content = 'Um den Streetview anzeigen ziehen Sie in der Map das Icon auf die Adresse.', false);

    $r = '
<div style="overflow:hidden;height:' . $height . ';width:' . $width . ';margin:' . $margins . ';">
<div id="gmap_canvas" style="height:' . $height . ';width:' . $width . ';"></div>

<style>#gmap_canvas img{max-width:none !important;background:none !important;} </style>

<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>

<!--
<script src="http://maps.gstatic.com/maps-api-v3/api/js/20/6/intl/de_ALL/main.js"></script>
-->

<script type="text/javascript"> function init_map(){
	var myOptions = {zoom:#google_map_gross_zfaktor#,center:new google.maps.LatLng(#my_lat#,#my_lon#),mapTypeId: google.maps.MapTypeId.ROADMAP};
	map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
	marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(#my_lat#, #my_lon#)});
	infowindow = new google.maps.InfoWindow({content:"<span style=\'height:auto !important; display:block; white-space:nowrap; overflow:hidden !important;\'>#STORE_NAME_ADDRESS#</span>" });
	google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, \'load\', init_map);
</script>

</div>

';
//<div style="margin:0 0 9px 0;color:#666;font-size:0.8em;font-weight:normal">'.STREETVIEW_PULL_ICON_HINT.'<img src="images/icons/sv_icon.gif" width="12" height="22" /></div>

    $r = str_replace('#google_map_gross_zfaktor#', get_dv('google_map_gross_zfaktor'), $r);
    $r = str_replace('#my_lat#', my_lat(), $r);
    $r = str_replace('#my_lon#', my_lon(), $r);
//$r = str_replace('#STORE_NAME_ADDRESS#',nl2br(strip_tags(STORE_NAME_ADDRESS)),$r);
//$r = str_replace('#STORE_NAME_ADDRESS#',nl2br(strip_tags(trim(STORE_NAME_ADDRESS))),$r);
//$t_STORE_NAME_ADDRESS = str_replace(PHP_EOL, '', STORE_NAME_ADDRESS);
    $t_STORE_NAME_ADDRESS = strip_tags(STORE_NAME_ADDRESS);

    $t_STORE_NAME_ADDRESS = str_replace('\n', '', $t_STORE_NAME_ADDRESS);
    $t_STORE_NAME_ADDRESS = str_replace('\r', '', $t_STORE_NAME_ADDRESS);
    $t_STORE_NAME_ADDRESS = str_replace('\r\n', '', $t_STORE_NAME_ADDRESS);
    $t_STORE_NAME_ADDRESS = nl2br($t_STORE_NAME_ADDRESS);


//$t_STORE_NAME_ADDRESS = str_replace(PHP_EOL, '', $t_STORE_NAME_ADDRESS);

//$r = str_replace('#STORE_NAME_ADDRESS#',$t_STORE_NAME_ADDRESS,$r);
    $r = str_replace('#STORE_NAME_ADDRESS#', STORE_NAME, $r);
    $r = str_replace('', '', $r);

    return $r;

//return	$t_STORE_NAME_ADDRESS;

}


function getDefaultLanguage()
{
    if (isset($_SERVER["HTTP_ACCEPT_LANGUAGE"]))
        return parseDefaultLanguage($_SERVER["HTTP_ACCEPT_LANGUAGE"]);
    else
        return parseDefaultLanguage(NULL);
}

function parseDefaultLanguage($http_accept, $deflang = "en")
{
    if (isset($http_accept) && strlen($http_accept) > 1) {
        # Split possible languages into array
        $x = explode(",", $http_accept);
        foreach ($x as $val) {
            #check for q-value and create associative array. No q-value means 1 by rule
            if (preg_match("/(.*);q=([0-1]{0,1}.d{0,4})/i", $val, $matches))
                $lang[$matches[1]] = (float)$matches[2];
            else
                $lang[$val] = 1.0;
        }

        #return default language (highest q-value)
        $qval = 0.0;
        foreach ($lang as $key => $value) {
            if ($value > $qval) {
                $qval = (float)$value;
                $deflang = $key;
            }
        }
    }
    return strtolower($deflang);
}


function is_valid_language($code)
{
    $sql = "select * from languages where code = '" . $code . "' and status = 1  ";
    if (has_records($sql)) return true;

}


function manger_name_from_manager_url($href)
{

    if (stristr($href, 'all_navbars.php')) return 'Link-Manager';
    if (stristr($href, 'config_003_color_class.php')) return 'Farbpalette-Manager';
    if (stristr($href, 'currencies.php')) return 'W�hrungsmanager-Manager';
    if (stristr($href, 'design_11_video.php')) return 'Video-Manager';
    if (stristr($href, 'google_mk_map.php')) return 'Google-Map Manager';
    if (stristr($href, 'guestbook.php')) return 'G�stebuch-Manager';
    if (stristr($href, 'manufacturers.php')) return 'Hersteller-Marken Manager';
    if (stristr($href, 'pageears_manager.php')) return 'PageEars-Manager';
    if (stristr($href, 'pdf_manager.php')) return 'PDF-Manager';
    if (stristr($href, 'reviews.php')) return 'Produkt-Kommentare Manager';
    if (stristr($href, 'specialsbycategory.php')) return 'Manager f�r Sonderangebote nach Kategorie/Hersteller';
    if (stristr($href, 'startseite_blocks.php')) return 'Blocks-Manager';
    if (stristr($href, 'ov_self_def_boxes.php')) return 'schematische Seiten-&Uuml;bersicht';

    /*
	all_navbars.php
	config_003_color_class.php
	currencies.php
	design_11_video.php
	google_mk_map.php
	guestbook.php
	manufacturers.php
	pageears_manager.php
	pdf_manager.php
	reviews.php
	specialsbycategory.php
	startseite_blocks.php
	wrapper_full.php?incl=includes/quick_config_new/template1.php&use_header=1&item=quick_config_includes/ov_self_def_boxes.php
	
	*/

}

function categories_superfish_from_str($str, $sf_mega_section_div = true)
{
    $t_str = str_replace('##superfish_catlist#', '', $str);
    $t_str = str_replace('#end_superfish_catlist##', '', $t_str);
    $t_str_arr = explode('#', $t_str);
    $cat_id_arr = $t_str_arr[0];
    $show_number_prods_arr = $t_str_arr[1];
    $with_cat_header_arr = $t_str_arr[2];
    $show_subcats_arr = $t_str_arr[3];

    $parent_id_arr = explode(':', $cat_id_arr);
    $parent_id = $parent_id_arr[1];

    $show_number_prods_arr_arr = explode(':', $show_number_prods_arr);
    $show_number_prods_str = $show_number_prods_arr_arr[1];
    if ($show_number_prods_str == 'true') {
        $show_number_prods = true;
    } else {
        $show_number_prods = false;
    }

    $with_cat_header_arr_arr = explode(':', $with_cat_header_arr);
    $with_cat_header_str = $with_cat_header_arr_arr[1];
    if ($with_cat_header_str == 'true') {
        $with_cat_header = true;
    } else {
        $with_cat_header = false;
    }

    $show_subcats_arr_arr = explode(':', $show_subcats_arr);
    $show_subcats_str = $show_subcats_arr_arr[1];
    if ($show_subcats_str == 'true') {
        $show_subcats = true;
    } else {
        $show_subcats = false;
    }


    //$debug = 'ID: '.$parent_id.' - show_number_prods: '.$show_number_prods_str.' - with_cat_header: '.$with_cat_header_str.' - show_subcats: '.$show_subcats_str.'<br>';

    //return '<div class="sf-mega-section" style="margin-top:-8px">'.$debug.categories_superfish($categories_array = '', $parent_id, $indent = '',$show_number_prods, $with_cat_header, $show_subcats).'</div>';
    return '' . $debug . categories_superfish($categories_array = '', $parent_id, $indent = '', $show_number_prods, $with_cat_header, $show_subcats, $sf_mega_section_div) . '';
}


function categories_superfish($categories_array = '', $parent_id = '0', $indent = '', $products_number_in_category_show, $include_itself, $show_subcats, $sf_mega_section_div)
{
    global $languages_id, $tabs_topd_superfish_number_per_col;

    $max_rows = $tabs_topd_superfish_number_per_col + 1;

    if (stristr($parent_id, '_')) {
        $parent_id_array = explode('_', $parent_id);
        $parent_id = $parent_id_array[(sizeof($parent_id_array) - 1)];
    }

    $values = tep_get_categories_superfish($categories_array = '', $parent_id, $indent = '', $products_number_in_category_show, $include_itself, $show_subcats, $sf_mega_section_div);

    for ($i = 0, $n = sizeof($values); $i < $n; $i++) {

        if (stristr(full_cPath($values[$i]['id']), '_')) {
            $add_style = '';
        } else {
            $add_style = 'font-weight:bold;';
        }
        if ($i == 0) {
            if ($sf_mega_section_div) {
                $categories_string .= '<div class="sf-mega-section" style="margin-top:-8px">';
            } else {
                $categories_string .= '<div class="" style="">';
            }

            if ($include_itself) {
                $header = '<h2><a href="index.php?cPath=' . $parent_id . '">' . lookup("select categories_name from categories_description where categories_id = " . $parent_id . " and language_id = " . $languages_id, 'categories_name') . ':</a></h2>';
                $categories_string .= $header;
            }
        }

        if (full_cPath($values[$i]['id']) == getParam('cPath', '') and 1 == 2) {
            $categories_string .= '<div><a id="currc" title="' . GENERAL_OPEN_ABT . '" target="_parent" style="background:#ffa;;color:#a66' . $add_style . '" href="index.php?cPath=' . full_cPath($values[$i]['id']) . '&' . $SID . '">' .
                tep_output_string($values[$i]['text'], array('"' => '"', '\'' => '&#039;', '<' => '<', '>' => '>')) . '</a> <span style="margin-left:18px;font-size:0.7em;color:#a66">< ' .
                db_tr($definition = 'CURR_DEPARTMENT', $page = 'general', $from_lang_code = 'de', $content = 'aktuelle Abteilung') . '</span></div>';
        } else {
            $categories_string .= '<div style="margin:0 0 0.2em 0"><a title="' . GENERAL_OPEN_ABT . '" target="_parent" style="' . $add_style . ';float:none !important" href="index.php?cPath=' . full_cPath($values[$i]['id']) . '&' . $SID . '">' .
                tep_output_string($values[$i]['text'], array('"' => '"', '\'' => '&#039;', '<' => '<', '>' => '>')) . '</a></div>';

        }

        if ($i == $max_rows and $i < ($n - 1)) $categories_string .= '</div><div class="sf-mega-section" style="margin-top: 8px;margin-right: 1em">'; //new column
    }
    $categories_string .= '</div>';
    return $categories_string;
}


function tep_get_categories_superfish($categories_array = '', $parent_id, $indent = '', $products_number_in_category_show, $include_itself, $show_subcats, $sf_mega_section_div)
{
    global $languages_id;

    if (!is_array($categories_array)) $categories_array = array();
    $sql = "select c.categories_id, cd.categories_name from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd 
	where parent_id = '" . (int)$parent_id . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "' order by sort_order, cd.categories_name";
    /*
    $categories_query = tep_db_query("select c.categories_id, cd.categories_name from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd 
	where parent_id = '" . (int)$parent_id . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "' order by sort_order, cd.categories_name");
	*/
    $categories_query = tep_db_query($sql);


    while ($categories = tep_db_fetch_array($categories_query)) {
        if ($products_number_in_category_show) {
            $products_in_category = tep_count_products_in_category($categories['categories_id'], false, true); //tep_count_products_in_category($category_id, $include_inactive = false,$always=false)

            if ($products_in_category > 0) {
                $categories_array[] = array('id' => $categories['categories_id'],
                    'text' => $indent2 . $categories['categories_name'] . ' <span style="font-size:0.8em;display:inline;padding:0;float:none;opacity:0.4">(' . nuf($products_in_category) . ')</span>');
            }
        } else {

            $categories_array[] = array('id' => $categories['categories_id'],
                'text' => $indent . $categories['categories_name']);
        }
        if ($categories['categories_id'] != $parent_id and $show_subcats) {
            $categories_array = tep_get_categories_superfish($categories_array, $categories['categories_id'], $indent . '&nbsp; &nbsp; &nbsp; ', $products_number_in_category_show, $include_itself, $show_subcats, $sf_mega_section_div);
        }
    }
    mysql_free_result($categories_query);
    return $categories_array;
}


function d_admin($def, $forPage = 'product_info.php')
{
    global $bearb_mode_icon21, $bearb_mode_icon31, $bearb_mode_icon41, $bearb_mode_icon12_red;

    if (1 == 1) {


        //$curr_lang = lang_code_from_lang_id($_SESSION['languages_id']);
        $curr_lang = 'de';

        $key = lookup('select definition from myd_translations where hidden = 0 and ' . $curr_lang . ' = "' . $def . '" and page = "' . $forPage . '" ', 'definition');

        $blink = '<a class="lightwindow" title="diesen Text und &Uuml;bersetzungen bearbeiten" 
			href="javascript:open_lw_assi_transl_bg_txt(\'popup_edit_mys_transl_by_definition.php?p=' . $key . '&page=' . $forPage . '\',\'Hintergrund-Text und &Uuml;bersetzungen\',\'1000\',\'\')">' . $bearb_mode_icon12_red . '</a>';


        return $def . ' ' . $blink;
        //return $blink ;
    } else {
        return $def;
    }

}


function d($def, $curPage = false)
{
    global $application_shop_is_in_dev_mode, $bearb_mode_icon21, $bearb_mode_icon31, $bearb_mode_icon41, $bearb_mode_icon12_red;

    if ($application_shop_is_in_dev_mode) {

        if ($curPage) {
            $page = curPageName();
        } else {
            $page = 'general';
        }

        $curr_lang = lang_code_from_lang_id($_SESSION['languages_id']);
        $key = lookup('select definition from myd_translations where hidden = 0 and ' . $curr_lang . ' = "' . $def . '" and page = "' . $page . '" ', 'definition');

        $blink = '<a title="Hintergrund-Text und &Uuml;bersetzungen" 
			href="javascript:open_lw_assi_transl_bg_txt(\'admin6093/popup_edit_mys_transl_by_definition.php?p=' . $key . '&page=' . $page . '\',\'Hintergrund-Text und &Uuml;bersetzungen\',\'1000\',\'\')">' . $bearb_mode_icon12_red . '</a>';


        return $def . ' ' . $blink;
    } else {
        return $def;
    }

}


function is_tooltip($para)
{
    $para = trim($para);

    if (stristr($para, 'tooltip')
        or $para == 'shopping_cart_goto_shoppingcart'
        or $para == 'open_manuf_overview_hint'
        or $para == 'index3_manufacturers_select_cat_hint'
        or $para == 'index3_categories_select_cat_hint'
        or $para == 'checkout_payment_change_shipping_method'
        or $para == 'checkout_confirmation_backto_shoppingcart'
        or $para == 'checkout_shipping_change_address_hint'
        or $para == 'checkout_confirmation_widerrufsrecht_hint'
        or $para == 'checkout_payment_change_address_hint'
        or $para == 'checkout_process_success_allow_email_order_copy_hint'
        or $para == 'bestrated_products_select_cat_hint'
        or $para == 'bestseller_products_select_cat_hint'
        or $para == 'new_products_select_cat_hint'
        or $para == 'specials_select_cat_hint'
        or $para == 'shopping_cart_page_hint'
        or $para == 'shopping_cart_tooltip'
        or $para == 'wish_list_email_hint'
        or $para == 'wish_list_dele_all_hint'
        or $para == 'shopping_cart_prods_in_wishlist'
        or $para == 'login_box_forgotten_passw_hint'
        or $para == 'shopping_cart_box_get_login_hint'
        or $para == 'shopping_cart_5addresses_tooltip'
        or $para == 'shopping_cart_goto_checkout'
        or $para == 'shopping_cart_insert_coupon'
        or $para == 'shopping_cart_goto_myaccount'
        or $para == 'shopping_cart_logout'
        or $para == 'shopping_cart_page_hint'
        or $para == 'search_box_tooltip'
        or $para == 'currencies_box_tooltip'
        or $para == 'checkout_payment_saferpay_hint'

        or $para == 'checkout_payment_paypal_hint'
        or $para == 'checkout_payment_cash_hint'
        or $para == 'checkout_payment_cod_hint'

        or $para == 'checkout_payment_change_address_hint'
        or right($para, 5) == '_hint'


    ) {

        return true;
    } else {
        return false;
    }
}


function get_bmode_link($text = '???', $link, $active_key, $help_key, $from_admin = false)
{

    if ($from_admin) {
        $r = '<a target="_blank" title="Konfig.-Assi - neues Fenster" href="' . $link . '">' . $text . '</a> ';
    } else {
        $r = '<a target="_blank" title="Konfig.-Assi - neues Fenster" href="admin6093/' . $link . '">' . $text . '</a> ';
    }

    if ($active_key <> '') $r .= is_active_icon_link($active_key, $msgbox = false, false, false, $f_size = '', false, false);
    if ($help_key <> '') $r .= help_icon_cat($help_key, '', '', '', $tiny = false, true);

    return $r;
}


function get_blocks($block_id = '')
{
    global $hide_price_label_and_order_button, $hide_all_blocks_onm_startpage, $HTTPS_is_active_local;

    if (is_start_page() and $hide_all_blocks_onm_startpage) return '';

    $lang_code_from_lang_id = lang_code_from_lang_id($_SESSION['languages_id']);
    $is_in_lang = false;
    if ($lang_code_from_lang_id <> DEFAULT_LANGUAGE) $is_in_lang = true;
    if ($lang_code_from_lang_id == 'de') {
        $lang_code_from_lang_id_str = '';
    } else {
        $lang_code_from_lang_id_str = '_' . $lang_code_from_lang_id;
    }
    $blocks = '';

    if ($block_id == '') {
        $sql = "select * from blocks where active = 1 order by sort_order, ID desc";
    } else {
        $sql = "select * from blocks where ID = " . $block_id;
    }
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {

        $id = $row["ID"];
        $header = $row["header"];
        if ($is_in_lang) {
            $header_lng = $row["header" . $lang_code_from_lang_id_str];
            if ($header_lng <> '') $header = $header_lng;
        }
        //if( to_bool($HTTPS_is_active_local) ) $header = str_replace('http://','https://',$header);

        //$anz_prods = $row["anz_prods"];
        $sort_order = $row["sort_order"];
        $active = $row["active"];

        $text = $row["text"];
        if ($is_in_lang) {
            $text_lng = $row["text" . $lang_code_from_lang_id_str];
            if ($text_lng <> '') $text = $text_lng;
        }
        //if( to_bool($HTTPS_is_active_local) ) $text = str_replace('http://','https://',$text);

        $html = $row["html_text"];
        if ($is_in_lang) {
            $html_lng = $row["html_text" . $lang_code_from_lang_id_str];
            if ($html_lng <> '') $html = $html_lng;
        }
        //if( to_bool($HTTPS_is_active_local) ) $html = str_replace('http://','https://',$html);

        do {
            if (strstr($html, '##display_video?')) {
                $to_be_replaced = TextBetween('##display_video?', '##', $html);
                $to_be_replaced = '##display_video?' . $to_be_replaced . '##';
                $replace_with = '<!-- video begin -->' . platzhalter_to_display_video($to_be_replaced) . '<!-- video end -->';
                $html = str_replace($to_be_replaced, $replace_with, $html);
            }
        } while (strstr($html, '##display_video?'));

        //kaspersky

        do {
            if (strstr($html, '##preisvergleich#')) {
                $to_be_replaced = TextBetween('##preisvergleich#', '##', $html);
                $to_be_replaced = '##preisvergleich#' . $to_be_replaced . '##';
                $replace_with = '' . platzhalter_to_preisvergleich($to_be_replaced) . '';
                $html = str_replace($to_be_replaced, $replace_with, $html);
            }
        } while (strstr($html, '##preisvergleich#'));


        if (strstr($html, '##include_google_map_shop?')) {
            $html = platzhalter_to_txt($html); //##include_google_map_shop?
        }

        /*
			if(strstr($html,'##display_video?') ){
				$to_be_replaced = TextBetween('##display_video?','##',$html);	
				$to_be_replaced = '##display_video?'.$to_be_replaced .'##';
				$replace_with = '<!-- video begin -->'.platzhalter_to_display_video($to_be_replaced).'<!-- video end -->';				
				$html = str_replace($to_be_replaced,$replace_with,$html);
			}
*/


        $banner_top = $row["banner_top"];
        if (stristr($banner_top, 'block_top_')) {
            $is_indiv_img_top = false;
        } else {
            $is_indiv_img_top = true;
        }


        $banner_bottom = $row["banner_bottom"];
        if (stristr($banner_bottom, 'block_bottom_')) {
            $is_indiv_img_bottom = false;
        } else {
            $is_indiv_img_bottom = true;
        }


        $banner_top_url = $row["banner_top_url"];
        $banner_bottom_url = $row["banner_bottom_url"];

        $banner_top_url_target = $row["banner_top_url_target"];
        $banner_bottom_url_target = $row["banner_bottom_url_target"];


        $style = $row["style"];
        $last_modified = $row["last_modified"];

        $number_prods = $row["number_prods"];
        $cat_manuf = $row["cat_manuf"];
        $cat_id = $row["cat_id"];
        $manuf_id = $row["manuf_id"];
        $new_best = $row["new_best"];
        $price_label = $row["price_label"];
        $show_price = to_bool($row["show_price"]);
        $show_medium_img = to_bool($row["show_medium_img"]);
        $typ = $row["typ"];    //simple/modified/indiv
        $link_to = $row["link_to"];    //Podukt Kategorie Hersteller
        $hotshot = to_bool($row["hotshot"]);
        $hotshot_txt = $row["hotshot_txt"];

        if ($block_id == '') {
            $blocks .= make_config_edit_link('startseite_blocks.php?block_id=' . $id, 'div', 'diesen Block (ID: ' . $id . ') bearbeiten', '');
        } else {
            $blocks .= make_config_edit_link('startseite_blocks.php?block_id=' . $block_id, 'div', 'diesen Block (ID: ' . $block_id . ') bearbeiten', '');
        }

        if ($hide_price_label_and_order_button) $show_price = false;

        $blocks .= '<div class="blocks_wrapper">';
        /*
				-webkit-box-shadow: inset 2px 2px 4px rgba(0,0,0,.8); 
				-moz-box-shadow: inset -2px 0 4px rgba(0,0,0,.4);
				box-shadow: inset 2px 2px 4px rgba(0,0,0,.8); 
*/

        if (trim(strip_tags($header)) <> '') {
            $blocks .= '<div class="blocks_header">' . $header . '</div>';
            //$blocks .= '<div class="blocks_wrapper2" style="border-top:none;">';	
            $blocks .= '<div class="blocks_wrapper2">';
        } else {
            $blocks .= '<div class="blocks_wrapper2">';
        }
        if ($banner_top <> '') $blocks .= '<div class="blocks_banner_top">' . banner_string($banner_top, $banner_top_url, $banner_top_url_target) . '</div>';
        if ($text <> '') $blocks .= '<div class="blocks_text">' . $text . '</div>';
        if ($html <> '') $blocks .= '<div class="blocks_html">' . $html . '</div>';
        if ($typ == 'simple') {
            $blocks .= get_blocks_content($id, $cat_id, $number_prods, $show_medium_img, $show_price, $cat_manuf, $manuf_id, $new_best, $price_label, $typ, $link_to);
        } else {

            $blocks .= get_blocks_content_modified($id, $cat_id, $number_prods, $show_medium_img, $show_price, $cat_manuf, $manuf_id, $new_best, $price_label, $typ, $link_to, $hotshot, $hotshot_txt);
        }

        if ($banner_bottom <> '') $blocks .= '<div class="blocks_banner_bottom " >' . banner_string($banner_bottom, $banner_bottom_url, $banner_bottom_url_target) . '</div>';

        $blocks .= '</div></div>';

    }
    mysql_free_result($sql_result);
    return $blocks;
}

//show_medium_img
//modified und indiv
function get_blocks_content_modified($blocks_id, $cat_id, $limit, $allow_tooltip, $show_price, $cat_manuf, $manuf_id, $new_best, $price_label, $typ, $link_to, $hotshot, $hotshot_txt)
{

    global $price_lable1_blocks_hide_currency_symbol, $price_lable2_blocks_hide_currency_symbol, $at_get_currency_rate, $price_lable1_blocks_text_size, $price_lable2_blocks_text_size, $hotshot_img_shadow_str, $img_url, $hide_price_label_and_order_button, $blocks_startpage_indiv_img_medium_width, $blocks_startpage_indiv_img_medium_height, $blocks_disp_img_height_all_same, $blocks_disp_img_height, $HTTPS_is_active_local;

    //$r .= '<div style="text-align:center;border:2px #c00 solid">';
    //$r .= '<div style="text-align:center;width:100%;height:100%;position:relative;overflow:auto;padding-left:22px">';
    $r .= '<div class="blocks_content_modified" style="overflow:hidden;text-align:center;padding-top:9px;padding-bottom:4px;">';
    //$r .= '<div style="text-align:center;padding-top:7px;padding-bottom:4px">';

//ec(__line__.' here '.$hotshot_txt);

    $sort_order_flag = $new_best;

    if ($sort_order_flag == 'best') {
        //$sql="select * from blocks_products where block_id = $blocks_id and show_hide = 0 order by is_img DESC, sort_order, products_ordered desc ";
        $sql = "select * from blocks_products where block_id = $blocks_id and show_hide = 0 order by  sort_order, products_ordered desc ";
        //$sql="select * from blocks_products where block_id = $blocks_id and show_hide = 0 order by products_ordered_f desc, products_ordered desc, products_id desc ";
    } else {
        //$sql="select * from blocks_products where block_id = $blocks_id and show_hide = 0 order by is_img DESC, sort_order, products_id desc ";
        //$sql="select * from blocks_products where block_id = $blocks_id and show_hide = 0 order by sort_order, products_id desc ";
        $sql = "select * from blocks_products where block_id = $blocks_id and show_hide = 0 order by sort_order, products_id desc ";

        //$sql="select * from blocks_products where block_id = $blocks_id and show_hide = 0 order by sort_order, products_id desc ";
    }

    //$sql="select * from blocks_products where block_id = ".$blocks_id." and show_hide = 0 order by sort_order ";
    //ec($sql,true,'background:#ff6');
    $this_as_hot_shot = $hotshot;
    $z = 0;
    $standard_price_label = $price_label;
    $anz_rimg = 0; //nur Bild
    $anz_pimg = 0; // Produkt-Bild
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $z++;
        $main_id = $row["id"];
        $id = $row["products_id"];
        $is_img = to_bool($row["is_img"]);
        $url = $row["url"];
        $url = str_replace('mdSsid=', 'nix=', $url);
        //if( to_bool($HTTPS_is_active_local) ) $url = str_replace('http://','https://',$url);
        //$url = tep_href_link($url);
        $url = add_session_id($url);
        $w_img = $row["w_img"];
        $sort_order = $row["sort_order"];
        $hide_ribbon = $row["hide_ribbon"];
        //$hide_ribbon = to_bool($hide_ribbon);
//if($blocks_id==66) ec(__function__.'/'.__line__.' '.$id.' is: '.$hide_ribbon);		
        //$allow_attr_icons
        $allow_attr_icons = true;
        if ($hide_ribbon == 1) $allow_attr_icons = false;

        //$curr_selected_img = lookup('select w_img from blocks_products where id ='.$id,'w_img'); 
        if ($w_img == 'small') $block_image = '' . $row["image"];
        if ($w_img == 'medium') $block_image = 'm_' . $row["image"];
        if ($w_img == 'large') $block_image = 'l_' . $row["image"];

        if ($is_img) {
            $fs_folder = DIR_FS_DOCUMENT_ROOT . 'images/artikel/blocks/';
            $ws_folder = DIR_WS_FULL . 'images/artikel/blocks/';
            $block_image_fs = $fs_folder . $block_image;
            $block_image_ws = $ws_folder . $block_image;
        }

        $is_img_small = false;
        $is_img_medium = false;
        $is_img_large = false;
        if (left($block_image, 9) == 'block_img') $is_img_small = true;
        if (left($block_image, 11) == 'm_block_img') $is_img_medium = true;
        if (left($block_image, 11) == 'l_block_img') $is_img_large = true;


        ///$limg=$row['products_largeimage']; 
        $simg = lookup('select products_image from products where products_id = ' . $id, 'products_image');
        ///$simg=$row['products_image'];
        $limg = lookup('select products_mediumimage from products where products_id = ' . $id, 'products_mediumimage');
        $model = $row['model'];
        $this_show_price = to_bool($row['show_price']);

        $name = tep_get_products_name($id);
        $special = true;
        $allow_medium_img = false;
        $force_mp3_player = true;
        $force_medium_img = false;
        $products_mediumimage_2 = '';
        $resize_width = '';
        $ausnahme = '';
        $target = '';
        $resize_height = '';
        $class = 'blocks_banner_link'; //f�r img
        $allow_tooltip = $allow_tooltip;

        if ($z == 1 and $this_as_hot_shot) {
            //$resize_width = '205';
            if ($is_img_medium) {
                $resize_width = get_dv('blocks_startpage_indiv_img_medium_width');
                $hot_shot_text_size = '2.4em';
            }
            if ($is_img_large) {
                $resize_width = get_dv('blocks_startpage_indiv_img_large_width');
                $hot_shot_text_size = '2.7em';
            }

            $hot_shot_margin_top = lookup('select hotshot_img_resize_width from blocks where ID=' . $blocks_id, 'hotshot_img_resize_width');
            $price_label = 2;
            //$allow_tooltip = true;
            $hotshot_style = 'font-size:' . $hot_shot_text_size . ';width:' . $resize_width . 'px;margin-top:' . $hot_shot_margin_top . 'px;margin-left:0;font-weight:bold;';
            //$large_img_link = get_large_img_link($limg,$simg,$model,$name,$id,$special,$allow_medium_img, $force_mp3_player, $force_medium_img, $products_mediumimage_2, $resize_width, $ausnahme, $target, $resize_height, $class, $allow_tooltip, $link_to, $hotshot=true,$hotshot_txt);


            if ($is_img) {
                if (left($url, 4) == 'http') {
                    $large_img_link = '<a class="_startseitename" href="' . $url . '"><img src="' . $block_image_ws . '" style="margin: 1px ;border:none" /></a>';
                } else {
                    $large_img_link = '<img src="' . $block_image_ws . '" style="margin:1px;border:none" />';
                }

                $this_block_item_show_price = false;
            } else {
                //bild in medium block bild breite : $blocks_startpage_indiv_img_medium_width
                /*
				$large_img_link = get_large_img_link($limg,$simg,$model,$name,$id,$special,true,true,false,'',$blocks_startpage_indiv_img_medium_width,'','','', $class='', $allow_tooltip=true, $link_to='', $hotshot=true, 
				$hotshot_txt,$is_new=false, $new_m_left='17',$new_m_top='3'); 
				*/
//ec(__line__.' '.'xxxxxxxx');				
                $simg = str_replace('/small/', '/medium/', $simg);
                //$simg = lookup('select products_image from products where products_id = '. $products[$i]['id'],'products_image');
                $large_img_link = get_large_img_link($limg, $simg, $model, $name, $id, $special, true, false, false, '', $blocks_startpage_indiv_img_medium_width, '', '', $resize_height = '',
                    $class = '',
                    $allow_tooltip,
                    $link_to = '',
                    $hotshot = false,
                    $hotshot_txt = $hotshot_txt,
                    $is_new = false,
                    $new_m_left = '17',
                    $new_m_top = '3',
                    $allow_attr_icons,
                    $use_medium_not_small_img_allow = false
                );

                $this_block_item_show_price = $this_show_price;
            }

            if ($hide_price_label_and_order_button) $this_block_item_show_price = false;
            if ($hide_price_label_and_order_button) $show_price = false;

//ec(__line__.' here ');								
            if ((to_bool($show_price) or $this_block_item_show_price or $this_as_hot_shot) and !to_bool($hide_price_label_and_order_button)) {
//ec(__line__.' here ');									
                //$font_size_style = '';
                //if($at_get_currency_rate<>1 ) {
                //if (  ($price_label==1 and $price_lable1_blocks_text_size > 2.3) or ($price_label==2 and $price_lable2_blocks_text_size > 2.3)  ) {
                //if(!$hotshot) $font_size_style = 'font-size:2.3em;';
                //}
                //}

                if ($price_label == 1) {
                    $price_lable_current_blocks_hide_currency_symbol = $price_lable1_blocks_hide_currency_symbol;
                } else {
                    $price_lable_current_blocks_hide_currency_symbol = $price_lable2_blocks_hide_currency_symbol;
                }


                if (!$is_img) {
//ec(__line__.' here '.$hotshot_txt);						
                    //$hotshot_style = 'font-size:2.2em;width:'.$resize_width.'px;margin-top:'.$hot_shot_margin_top.'px;margin-left:0px;font-weight:bold;'; 
                    $hotshot_style = 'font-size:2.3em;width:' . $blocks_startpage_indiv_img_medium_width . 'px;margin-top:' . $hot_shot_margin_top . 'px;margin-left:0px;font-weight:bold;';

                    $this_price_str = str_replace_decimal_point(get_price_from_id($id, $quantity = 1, to_bool($price_lable_current_blocks_hide_currency_symbol), $at_get_currency_rate));

                    $r .= '<div class="img_prlst" style="padding:0;display:inline-block;float:left;margin:0 12px 0 12px;' . $hotshot_img_shadow_str . '">' . $large_img_link . '<div>';
                    if ($hotshot_txt <> '') {
                        $r .= '<div class="prlb' . $price_label . '_block" style="' . $hotshot_style . '">' . $hotshot_txt . '';
                    } else {
                        $r .= '<div class="prlb' . $price_label . '_block" style="display:none;' . $hotshot_style . '">' . $hotshot_txt . '';
                    }
                    if ((to_bool($show_price) or $this_block_item_show_price) and !to_bool($hide_price_label_and_order_button)) {
                        $r .= '<br><span style="font-size:0.9em">' . $this_price_str . '</span>';
                    }
                } else {
//ec(__line__.' here ');									
                    //margin: 0 20px 6px 16px
                    $r .= '<div style="padding:0;display:inline-block;float:left;margin: 0 20px 6px 16px;' . $hotshot_img_shadow_str . '">' . $large_img_link . '<div>
					<div class="prlb' . $price_label . '_block" style="' . $hotshot_style . '">' . $hotshot_txt . '';

                }


                $special_price = get_special_price_net($id);
                if ($special_price > 0) {
                    //$small_save_money_icon = '<img src="'.$img_url.'/icons/order_butt/save_money_small.png" width="59" height="59" />';
                    $small_save_money_icon = '<img src="images/icons/order_butt/save_money.png" width="89" height="89" />';
                    $norm_price = lookup('select products_price from products where products_id = ' . $id . '', 'products_price');
                    $rabatt = special_rabatt($norm_price, $special_price);
                    $r .= '<div style="position:absolute;margin:20px 0 0 -14px;opacity:0.8">' . $small_save_money_icon . '
					<div style="color:#fff;font-size:0.6em;margin:-42px 0 0 2px">' . $rabatt . '%</div>
					</div>';

                }

                //$r.='</div></div></div>';

                //$r.='</div></div></div>';
                $r .= '</div>';

                $r .= '</div>';
                //$r.='<div style="background:#ffa;padding:9px;font-size:2em">Test1 4578</div>';
                $r .= '</div>';
                //$r.='<div style="background:#ffa;padding:9px;font-size:2em">Test2 1234</div>';
            } else {
//ec(__line__.' here ');
                $r .= '<div class="img_prlst" style="padding:4px 6px;display:inline-block">' . $large_img_link . '</div>';
            }


        } else {  //if($z==1 and $this_as_hot_shot){
            $price_label = $standard_price_label;
            //$label_class='ov_product_price';
            $label_class = 'prlb' . $price_label . '_block';
//ec(__line__.' is img '.$is_img);
            //$large_img_link = get_large_img_link($limg,$simg,$model,$name,$id,$special,$allow_medium_img, $force_mp3_player, $force_medium_img, $products_mediumimage_2, $resize_width, $ausnahme, $target, $resize_height, $class, $allow_tooltip, $link_to);

//ec(__line__.' here ');						
            if ($is_img) {
                /*
				$large_img_link = '<div style="padding:4px 6px;display:inline;float:left;">
				<a class="startseitename" href="'.$url.'"><img src="'.$block_image_ws.'" style="margin:1px;border:none;" /></a></div>'; 
				*/
                //$block_image_fs
                //ec(__line__.': '.'xxxxxxx');
                $this_img_size = @getimagesize($block_image_fs);
                $this_img_width = $this_img_size[0];
                $this_img_height = $this_img_size[1];
                if (left($url, 4) == 'http' or 1 == 1) {
                    //$large_img_link = '<a class="startseitename" href="'.$url.'"><img src="'.$block_image_ws.'" '.$this_img_size[3].' style="margin:0 1px;border:none;float:left;position:relative" /></a>'; 
                    if ($is_img_small) {
                        $block_image_ws_medium = str_replace('block_img_', 'm_block_img_', $block_image_ws);
                        $block_image_fs_medium = WS_to_FS($block_image_ws_medium);

                        //ec($block_image_fs);
                        //ec($block_image_fs_medium);
                        //ec( file_exists($block_image_fs_medium) );

                        /*				
						$large_img_link = '<a class="startseitename" href="'.$url.'"><img src="'.$block_image_ws.'" width="'.SMALL_IMAGE_WIDTH.'" height="'.SMALL_IMAGE_HEIGHT.'" 
						style="margin:0 1px;border:none;float:left;position:relative" /></a>'; 
						*/


                        $large_img_link = gms_wz_tooltip($block_image_ws, $block_image_ws_medium, $l_img_width = '300', $l_img_height = '400', $href = $url, $target = '', $s_img_width = '', $s_img_height = '', $class = '',
                            $is_new = false, $new_m_left = '17', $new_m_top = '3', $is_available_again = false, $is_hot = false, $is_sold_out = false, $keep_img_size = true, $is_rare = false, $is_product_info = false, $is_attr6 = false,
                            $is_attr7 = false,
                            $is_attr8 = false,
                            $is_attr9 = false,
                            $is_attr10 = false,
                            $allow_attr_icons);


                        /*
						$large_img_link = gms_wz_tooltip(
								$$block_image_ws,
								$block_image_ws_medium,
								$l_img_width='300',
								$l_img_height='400',
								$href=$url, 
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
								$keep_img_size=true, 
								$is_rare=false,
								$is_product_info=false, 
								$is_attr6=false, 
								$is_attr7=false, 
								$is_attr8=false, 
								$is_attr9=false, 
								$is_attr10=false,
								$allow_attribut_images=true						
						);
						*/
                        //$large_img_link = 'nixxxx'; $allow_attr_icons;

                    } else {
                        $large_img_link = '<a class="startseitename" href="' . $url . '"><img src="' . $block_image_ws . '" ' . $this_img_size[3] . ' 
						style="margin:0 1px;border:none;float:left;position:relative" /></a>';
                    }
                } else {
//ec(__line__.' here ');						
                    $large_img_link = '<img src="' . $block_image_ws . '" ' . $this_img_size[3] . ' style="margin:0 1px;border:none;float:left;position:relative" />';
                }
                $anz_rimg++;
                $this_block_item_show_price = false;
            } else {
//ec(__function__.'/'.__line__.' here ');						


                if ($blocks_disp_img_height_all_same) {
                    $resize_height = $blocks_disp_img_height;
                } else {
                    $resize_height = '';
                }

                $large_img_link = get_large_img_link($limg, $simg, $model, $name, $id, $special, true, false, false, '', $resize_width = '', '', '', $resize_height,
                    $class = '',
                    $allow_tooltip,
                    $link_to = '',
                    $hotshot = false,
                    $hotshot_txt = '',
                    $is_new = false,
                    $new_m_left = '17',
                    $new_m_top = '3',
                    $allow_attr_icons,
                    $use_medium_not_small_img_allow = false
                );

                //$large_img_link = 'allow:' . $row["hide_ribbon"];

                $small_image_width = SMALL_IMAGE_WIDTH + 2;
                $small_image_height = SMALL_IMAGE_HEIGHT + 2;

                $large_img_link = '<div class="img_prlst" style="width:auto;vertical-align:top;display:inline-block;margin:0 1px;float:left;position:relative">' . $large_img_link . '</div>';
                $this_block_item_show_price = $this_show_price;
                $anz_pimg++;
            }

            if ($hide_price_label_and_order_button) $this_block_item_show_price = false;
            if ($hide_price_label_and_order_button) $show_price = false;


            if ((to_bool($show_price) or $this_block_item_show_price) and !$is_img) {
                //if ( (to_bool($show_price) or $this_block_item_show_price)  ) {	


                $font_size_style = '';
                if ($at_get_currency_rate <> 1) {
                    if (($price_label == 1 and $price_lable1_blocks_text_size > 2.3) or ($price_label == 2 and $price_lable2_blocks_text_size > 2.3)) {
                        $font_size_style = 'font-size:2.1em;';
                    }
                }

                if ($price_label == 1) {
                    $price_lable_current_blocks_hide_currency_symbol = $price_lable1_blocks_hide_currency_symbol;
                } else {
                    $price_lable_current_blocks_hide_currency_symbol = $price_lable2_blocks_hide_currency_symbol;
                }


                $this_price_str = str_replace_decimal_point(get_price_from_id($id, $quantity = 1, to_bool($price_lable_current_blocks_hide_currency_symbol), $at_get_currency_rate));
                //if( stristr($this_price_str,'.-') ) $font_size_style = 'font-size:2.9em;margin-left:8px';
                //$r .= '<div style="padding:4px 6px;display:inline-block;">'.$large_img_link.'<div>';
                $r .= '<div style="padding:0;display:inline-block;float:left;margin: 0 6px 6px 6px ;position:relative;">' . $large_img_link . '<div>';
                if ($price_label == 1) {
                    $r .= '<div class="' . $label_class . '" style="' . $font_size_style . '">' . $this_price_str . '</div> </div></div>';
                } else {
                    $r .= '<div class="prlb2_block" style="margin-top:105px;' . $font_size_style . '">' . $this_price_str . '</div> </div></div>';
                }
                //$r .= '<div class="prlb1_block" style="'.$font_size_style.'">'.$this_price_str.'</div> </div></div>';

            } else {
//ec(__line__.' here ');											
                if ($is_img) {
                    $is_new = to_bool(lookup('select pnew from blocks_products where id =' . $main_id, 'pnew'));
                    $is_available_again = to_bool(lookup('select products_old from blocks_products where id =' . $main_id, 'products_old'));
                    $is_hot = to_bool(lookup('select hotshot from blocks_products where id =' . $main_id, 'hotshot'));
                    $is_sold_out = to_bool(lookup('select soldout from blocks_products where id =' . $main_id, 'soldout'));
                    //$is_rare=to_bool(lookup('select rare from blocks_products where id ='.$main_id,'rare'));	

                    if ($w_img == 'small') {
                        //$r .= '<div style="padding:4px 6px;display:inline-block;float:left;margin: 0 -21px 0 21px;position:relative">'.$large_img_link.'</div>';
                        //$r .= '<div style="width:112px;height;170px;padding:0;display:inline-block;float:left;margin: 0 0 8px 0;position:relative;border:1px #c66 solid">'.$large_img_link.'</div>';
//ec(__line__.' here ');
                        //$r .= '<div style="padding:1px 1px 3px 1px;display:inline-block;float:left;margin: 0 6px 6px 6px;position:relative;">'.$large_img_link.'';
                        $r .= '<div style="display:inline-block;float:left;margin: 0 6px 6px 6px;position:relative;">' . $large_img_link . '';


                        //$r .= attr_img($is_new, $is_sold_out, $is_hot, $is_available_again, $s_img_width, $s_img_height );

                        //attr_img($is_new, $is_sold_out, $is_hot, $is_available_again, $s_img_width, $s_img_height, $show_large_icon=false, $is_rare=false, $is_attr6=false, $is_attr7=false, $is_attr8=false, $is_attr9=false, $is_attr10=false )
                        //, $is_rare=false, $is_attr6=false, $is_attr7=false, $is_attr8=false, $is_attr9=false, $is_attr10=false

                        if ($allow_attr_icons) $r .= attr_img($is_new, $is_sold_out, $is_hot, $is_available_again, SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, $show_large_icon = false, $is_rare, $is_attr6, $is_attr7, $is_attr8, $is_attr9, $is_attr10);
                        //$r .= attr_img($is_new, $is_sold_out, $is_hot, $is_available_again, SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT );
                        $r .= '</div>';
                    } else {
                        if ($w_img == 'medium') {
                            //$r .= '<div style="padding:4px 6px;display:inline-block;float:left;margin: 0 -12px 0 20px;position:relative">'.$large_img_link.'</div>'; 
                            //$r .= '<div style="padding:4px 6px;display:inline-block;float:left;margin: 0;position:relative">'.$large_img_link.'</div>'; 
                            //$r .= '<div style="width:210px;height;314px;padding:0;display:inline-block;float:left;margin: 0 18px 0 0;position:relative">'.$large_img_link.'</div>'; 
                            //$r .= '<div style="width:225px;height;324px;padding:0;display:inline-block;float:left;margin: 0 0 -2px 0 ;position:relative;border:1px #c66 solid">'.$large_img_link.'</div>'; 

                            $r .= '<div style="padding:0 0 5px 0;display:inline-block;float:left;margin: 0 6px 0 18px ;position:relative;">' . $large_img_link . '';

                            //attr_img($is_new, $is_sold_out, $is_hot, $is_available_again, $s_img_width, $s_img_height, $show_large_icon=false, $is_rare=false, $is_attr6=false, $is_attr7=false, $is_attr8=false, $is_attr9=false, $is_attr10=false )		
                            if ($allow_attr_icons) $r .= attr_img($is_new, $is_sold_out, $is_hot, $is_available_again, $this_img_width, $this_img_height, $show_large_icon = true, $is_rare, $is_attr6, $is_attr7, $is_attr8, $is_attr9, $is_attr10);
                            //$r .= attr_img($is_new, $is_sold_out, $is_hot, $is_available_again, SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT );
                            $r .= '</div>';


                        } else {
                            //if($w_img=='large') $r .= '<div style="padding:4px 6px;display:inline-block;float:left;margin: 0 0 0 20px;position:relative">'.$large_img_link.'</div>'; 
                            //if($w_img=='large') $r .= '<div style="width:314px;height;471px;padding:0;display:inline-block;float:left;margin: 0 20px 6px 0;position:relative;border:1px #c66 solid">'.$large_img_link.'</div>'; 
//ec(__line__.' here ');
                            if ($w_img == 'large') {
                                $r .= '<div style="padding:0;display:inline-block;float:left;margin: 0 20px 6px 16px;position:relative;">' . $large_img_link . '';
                                //attr_img($is_new, $is_sold_out, $is_hot, $is_available_again, $s_img_width, $s_img_height, $show_large_icon=false, $is_rare=false, $is_attr6=false, $is_attr7=false, $is_attr8=false, $is_attr9=false, $is_attr10=false )	
                                if ($allow_attr_icons) $r .= attr_img($is_new, $is_sold_out, $is_hot, $is_available_again, $this_img_width, $this_img_height, $show_large_icon = true, $is_rare, $is_attr6, $is_attr7, $is_attr8, $is_attr9, $is_attr10);
                                //$r .= attr_img($is_new, $is_sold_out, $is_hot, $is_available_again, SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT );
                                $r .= '</div>';

                            }
                        }
                    }
                    //$r .= '<div class="clearfix"></div>';


                } else {
//ec(__line__.' is img '.$is_img);
//ec(__line__.' here ');				
                    //$r .= '<div style="padding:4px 6px;display:inline-block">'.$large_img_link.'</div>';
                    //$r .= '<div style="padding:4px 6px;display:inline-block;float:left;margin: 0 -21px 0 21px;position:relative">'.$large_img_link.'</div>';
                    //$r .= '<div style="width:112px;height;170px;padding:0;display:inline-block;float:left;margin: 0 0 8px 0 ;position:relative;border:1px #c66 solid">'.$large_img_link.'</div>';
                    $r .= '<div class="img_prlst" style="padding:0;display:inline-block;float:left;margin: 0 6px 6px 6px ;position:relative;">' . $large_img_link . '</div>';
                    //$anz_rimg ++;
                }
                //$r .= '</div></div>'; $sort_order.			
            } //if ( (to_bool($show_price) or $this_block_item_show_price) and !$is_img ) {
        } //if($z==1 and $this_as_hot_shot){
        //$r .= '<div>'.$sort_order.'</div>';
    } //while
    //if($anz_rimg==0 and $anz_pimg > 0) $r .= '<div style="height:1px;clear:both"></div>';
    //if($anz_rimg > 0 and $anz_pimg == 0) $r .= '<div style="height:1px;width:100%;clear:both"></div>';
    //if($anz_rimg > 0 and $anz_pimg == 0) $r .= '<div style="background:#ffa;color:#009;padding:5px">&nbsp;xx</div>';	
    //if($anz_rimg==0 and $anz_pimg > 0) $r .= '<div style="clear:both;border:2px #060 solid;background:#ffa;color:#009;padding:5px">rim: '.$anz_rimg.' - pimg:  '.$anz_pimg.'</div>';
    //$r .= '<div style="border:2px #060 solid;background:#ffa;color:#009;padding:5px">Bilder: '.$anz_rimg.' - Produktbilder:  '.$anz_pimg.'</div>';

    //if($anz_rimg==0 ) $r .= '<div style="height:1px;clear:both"></div>';				
    //if(!$is_img) $r .= '</div>'; 
    //$r .= '</div>'; 
    $r .= '</div>';

    //if ( !to_bool($show_price) and !$this_block_item_show_price ) $r .= '<div class="clear"></div>'; 
    //if ( !to_bool($show_price) ) $r .= '<div class="clear"></div>'; 
    //$r .= '<div class="clear"></div>'; 
    //$r .= '<div style="height:1px;clear:both"></div>'; 

    //if($anz_rimg > 0 and $anz_pimg == 0) $r .= '<div style="height:1px;width:100%;clear:both"></div>';
    //$r .= make_config_edit_link('startseite_blocks.php?block_id='.$blocks_id,'div','diesen Block bearbeiten','');
    mysql_free_result($sql_result);
    return $r;
}


function get_blocks_content_sql($block_id)
{

    $sql = "select * from blocks where ID = " . $block_id;
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {

        $id = $row["ID"];
        $header = $row["header"];
        //$anz_prods = $row["anz_prods"];

        $sort_order = $row["sort_order"];
        $active = $row["active"];
        $text = $row["text"];
        $html = $row["html_text"];
        $banner_top = $row["banner_top"];
        $banner_bottom = $row["banner_bottom"];
        $banner_top_url = $row["banner_top_url"];
        $banner_bottom_url = $row["banner_bottom_url"];

        $style = $row["style"];
        $last_modified = $row["last_modified"];

        $number_prods = $row["number_prods"];
        $limit = $number_prods;
        $cat_manuf = $row["cat_manuf"];
        $cat_id = $row["cat_id"];
        $manuf_id = $row["manuf_id"];
        $new_best = $row["new_best"];
        $price_label = $row["price_label"];
        $show_price = to_bool($row["show_price"]);
        $show_medium_img = to_bool($row["show_medium_img"]);

        if ($new_best == 'new' and $cat_manuf == 'cat') $order_by_str = ' order by sort_order, p.products_id desc ';
        if ($new_best == 'new' and $cat_manuf == 'manuf') $order_by_str = ' order by sort_order, products_id desc ';

        if ($new_best == 'best' and $cat_manuf == 'cat') $order_by_str = ' order by sort_order, products_ordered desc ';
        if ($new_best == 'best' and $cat_manuf == 'manuf') $order_by_str = ' order by sort_order, products_ordered desc ';

        if ($new_best == 'spec' and $cat_manuf == 'cat') $order_by_str = ' order by sort_order, p.products_id desc ';
        if ($new_best == 'spec' and $cat_manuf == 'manuf') $order_by_str = ' order by sort_order, products_id desc ';

        if ($new_best <> 'spec') {
            if ($cat_manuf == 'cat') {
                //cat
                $cat_has_sub_cats = cat_has_sub_cats($cat_id);
                $get_arr_to_where = " pc.categories_id = '" . $cat_id . "' ";
                if ($cat_has_sub_cats) {
                    $get_arr_to_where = get_arr_to_where($cat_id, 'pc.categories_id', true);
                }

                $sql = "select * from products p, products_to_categories pc  where pc.products_id = p.products_id and " . $get_arr_to_where . " and products_status = 1 " . $order_by_str . " limit " . $limit . " ";

            } else {
                //manuf
                $sql = "select * from products   where manufacturers_id = " . $manuf_id . " and products_status = 1 " . $order_by_str . " limit " . $limit . " ";
            }
        } else {
            //specials
            if ($cat_manuf == 'cat') {
                //cat
                $cat_has_sub_cats = cat_has_sub_cats($cat_id);
                $get_arr_to_where = " pc.categories_id = '" . $cat_id . "' ";
                if ($cat_has_sub_cats) {
                    $get_arr_to_where = get_arr_to_where($cat_id, 'pc.categories_id', true);
                }

                $sql = "select p.products_date_added, p.products_id, p.products_model, pd.products_name, p.products_price, p.products_tax_class_id, p.products_image, p.products_largeimage, 
			s.specials_new_products_price 
			from products p, products_description pd, specials s, products_to_categories pc 
			where pc.products_id = p.products_id and p.products_status = '1' and s.products_id = p.products_id 
			and p.products_id = pd.products_id and pd.language_id = '" . $_SESSION['languages_id'] . "' and s.status = '1' and " . $get_arr_to_where . " " . $order_by_str . " limit " . $limit;
            } else {
                //manuf
                $sql = "select p.products_date_added, p.products_id, p.products_model, pd.products_name, p.products_price, p.products_tax_class_id, p.products_image, p.products_largeimage, 
			s.specials_new_products_price from products p, products_description pd, specials s where p.products_status = '1' and s.products_id = p.products_id 
			and p.products_id = pd.products_id and pd.language_id = '" . $_SESSION['languages_id'] . "' and s.status = '1' and p.manufacturers_id = " . $manuf_id . " " . $order_by_str . " limit " . $limit;

            }
        }

        //ec($sql);

    }
    mysql_free_result($sql_result);
    return $sql;
}

//simple
function get_blocks_content($blocks_id, $cat_id, $limit, $allow_tooltip, $show_price, $cat_manuf, $manuf_id, $new_best, $price_label, $typ, $link_to)
{
    global $price_lable1_blocks_hide_currency_symbol, $price_lable2_blocks_hide_currency_symbol, $at_get_currency_rate, $price_lable1_blocks_text_size, $price_lable2_blocks_text_size,
           $hide_price_label_and_order_button, $wish_list_is_active;

    $r .= '<div style="text-align:center">';

    if ($new_best == 'new' and $cat_manuf == 'cat') $order_by_str = ' order by p.products_id desc ';
    if ($new_best == 'new' and $cat_manuf == 'manuf') $order_by_str = ' order by products_id desc ';

    if ($new_best == 'best' and $cat_manuf == 'cat') $order_by_str = ' order by products_ordered desc ';
    if ($new_best == 'best' and $cat_manuf == 'manuf') $order_by_str = ' order by products_ordered desc ';

    if ($new_best == 'spec' and $cat_manuf == 'cat') $order_by_str = ' order by p.products_id desc ';
    if ($new_best == 'spec' and $cat_manuf == 'manuf') $order_by_str = ' order by products_id desc ';


    if ($new_best <> 'spec') {
        if ($cat_manuf == 'cat') {
            //cat
            $cat_has_sub_cats = cat_has_sub_cats($cat_id);
            $get_arr_to_where = " pc.categories_id = '" . $cat_id . "' ";
            if ($cat_has_sub_cats) {
                $get_arr_to_where = get_arr_to_where($cat_id, 'pc.categories_id', true);
            }

            $sql = "select * from products p, products_to_categories pc  where pc.products_id = p.products_id and " . $get_arr_to_where . " and products_status = 1 " . $order_by_str . " limit " . $limit . " ";

        } else {
            //manuf
            $sql = "select * from products   where manufacturers_id = " . $manuf_id . " and products_status = 1 " . $order_by_str . " limit " . $limit . " ";
        }
    } else {
        //specials
        if ($cat_manuf == 'cat') {
            //cat
            $cat_has_sub_cats = cat_has_sub_cats($cat_id);
            $get_arr_to_where = " pc.categories_id = '" . $cat_id . "' ";
            if ($cat_has_sub_cats) {
                $get_arr_to_where = get_arr_to_where($cat_id, 'pc.categories_id', true);
            }

            $sql = "select p.products_date_added, p.products_id, p.products_model, pd.products_name, p.products_price, p.products_tax_class_id, p.products_image, p.products_largeimage, 
			s.specials_new_products_price 
			from products p, products_description pd, specials s, products_to_categories pc 
			where pc.products_id = p.products_id and p.products_status = '1' and s.products_id = p.products_id 
			and p.products_id = pd.products_id and pd.language_id = '" . $_SESSION['languages_id'] . "' and s.status = '1' and " . $get_arr_to_where . " " . $order_by_str . " limit " . $limit;
        } else {
            //manuf
            $sql = "select p.products_date_added, p.products_id, p.products_model, pd.products_name, p.products_price, p.products_tax_class_id, p.products_image, p.products_largeimage, 
			s.specials_new_products_price from products p, products_description pd, specials s where p.products_status = '1' and s.products_id = p.products_id 
			and p.products_id = pd.products_id and pd.language_id = '" . $_SESSION['languages_id'] . "' and s.status = '1' and p.manufacturers_id = " . $manuf_id . " " . $order_by_str . " limit " . $limit;

        }
    }

    //ec($sql);

    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $id = $row["products_id"];
        $limg = $row['products_largeimage'];
        $simg = $row['products_image'];
        $model = $row['products_model'];
        $name = tep_get_products_name($id);
        $special = true;
        $allow_medium_img = false;
        $force_mp3_player = true;
        $force_medium_img = false;
        $products_mediumimage_2 = '';
        $resize_width = '';
        $ausnahme = '';
        $target = '';
        $resize_height = '';
        $class = 'blocks_banner_link'; //f�r img
        $allow_tooltip = $allow_tooltip;

        $large_img_link = get_large_img_link($limg, $simg, $model, $name, $id, $special, true, true, false, '', '', '', '', $resize_height = '',
            $class = '',
            $allow_tooltip = true,
            $link_to = '',
            $hotshot = false,
            $hotshot_txt = '',
            $is_new = false,
            $new_m_left = '0',
            $new_m_top = '5',
            $allow_attr_icons = true,
            $use_medium_not_small_img_allow = false
        );

        $this_block_item_show_price = to_bool(lookup('select show_price from blocks_products where products_id = ' . $id . ' and block_id = ' . $blocks_id . '', 'show_price'));

        if ($hide_price_label_and_order_button) $this_block_item_show_price = false;
        if ($hide_price_label_and_order_button) $show_price = false;

        if ($show_price or $this_block_item_show_price) {
            $font_size_style = '';
            if ($at_get_currency_rate <> 1) {
                if (($price_label == 1 and $price_lable1_blocks_text_size > 2.3) or ($price_label == 2 and $price_lable2_blocks_text_size > 2.3)) {
                    $font_size_style = ' style="font-size:2.3em" ';
                }
            }

            if ($price_label == 1) {
                $price_lable_current_blocks_hide_currency_symbol = $price_lable1_blocks_hide_currency_symbol;
            } else {
                $price_lable_current_blocks_hide_currency_symbol = $price_lable2_blocks_hide_currency_symbol;
            }

            $this_price_str = str_replace_decimal_point(get_price_from_id($id, $quantity = 1, to_bool($price_lable_current_blocks_hide_currency_symbol), $at_get_currency_rate));
            /*
			if($wish_list_is_active) {
				$o_button = '<div style="position:absolute;z-index:10;margin:26px 0 0 54px">'.
				get_order_button_v1($id,$wishlist_link='', $anzeige_komm, $mein_komm_link,$show_order_buttons=true,$large_button,$parent=false, $small_icon=true).'</div>';			
			}else{
				$o_button = '<div style="position:absolute;z-index:10;margin:26px 0 0 71px">'.
				get_order_button_v1($id,$wishlist_link='', $anzeige_komm, $mein_komm_link,$show_order_buttons=true,$large_button,$parent=false, $small_icon=true).'</div>';
			}
			*/
            $r .= '<div style="padding:4px 6px;display:inline-block">' . $o_button . $large_img_link . '<div>
			<div class="prlb' . $price_label . '_block" ' . $font_size_style . '>' . $this_price_str . '</div></div></div>';
        } else {
            $r .= '<div class="img_prlst" style="padding:4px 6px;display:inline-block">' . $large_img_link . '</div>';
        }

    }

    $r .= '</div>';
    mysql_free_result($sql_result);
    return $r;
}


function banner_string($banner, $banner_url = '', $target_nr = 0)
{
    global $at_comm_banner_path, $at_comm_banner_path_WS, $at_comm_banner_path_FS;
    if ($banner == '') return;
    if ($banner_url <> '') $banner_url = add_session_id($banner_url);

    if (stristr($banner, 'block_top_') or stristr($banner, 'block_bottom_')) {
        $is_indiv_img = false;
    } else {
        $is_indiv_img = true;
    }

    if ($is_indiv_img) {
        $img_size_str = get_img_size_str(to_fs($banner), $what = 3);
        $img_src = $banner;
    } else {
        $img_size_str = get_img_size_str($at_comm_banner_path_FS . '/' . $banner, $what = 3);
        $img_src = $at_comm_banner_path_WS . '/' . $banner;
    }

    if ($banner_url <> '') {
        $img_str = '<img title="' . OPEN_PROD_DETAILS . '" class="blocks_banner_link" src="' . $img_src . '" ' . $img_size_str . ' />';
        if ($target_nr == 1) {
            $r = '<a target="_blank" href="' . $banner_url . '">' . $img_str . '</a>';
        } else {
            $r = '<a  href="' . $banner_url . '">' . $img_str . '</a>';
        }
    } else {
        $img_str = '<img src="' . $img_src . '" ' . $img_size_str . ' style="margin:1px" />';
        $r = $img_str;
    }
    return $r;
}


function get_attr_input_box($products_id)
{
    global $prod_atr_icons_is_active, $hide_ab18_img, $wizard_icon,
           $prod_atr_icons_attr1_txt, $prod_atr_icons_attr1_is_active,
           $prod_atr_icons_attr2_txt, $prod_atr_icons_attr2_is_active,
           $prod_atr_icons_attr3_txt, $prod_atr_icons_attr3_is_active,
           $prod_atr_icons_attr4_txt, $prod_atr_icons_attr4_is_active,
           $prod_atr_icons_attr5_txt, $prod_atr_icons_attr5_is_active,
           $prod_atr_icons_attr6_txt, $prod_atr_icons_attr6_is_active,
           $prod_atr_icons_attr7_txt, $prod_atr_icons_attr7_is_active,
           $prod_atr_icons_attr8_txt, $prod_atr_icons_attr8_is_active,
           $prod_atr_icons_attr9_txt, $prod_atr_icons_attr9_is_active,
           $prod_atr_icons_attr10_txt, $prod_atr_icons_attr10_is_active;

    $id = $products_id;


    if ($prod_atr_icons_is_active) {

        for ($i = 1, $n = 11; $i < $n; $i++) {

            $pa_is_active1 = 'prod_atr_icons_attr' . $i . '_is_active';
            $pa_is_active = $$pa_is_active1;
            if (to_bool($pa_is_active)) {
                $x .= '
				<div style="border:1px #ccc solid;padding:2px 3px;margin-bottom:1px">';
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

                $x .= '' . $i . ': ' . $t_name . ' ' . get_checkbox_any_table($id, $table, $field, $id_field, $class, $style, $show_field_name, $margin_r, false, false, $show_hide_element_id = '', $show_if_checked = true, $show_label = false);

                if ($i == 1) $x .= '<a target="_blank" title="Attribute - Konfig.-Assi" href="wrapper_full.php?use_header=1&incl=includes/quick_config_design/prod_attr_icons.php">' . $wizard_icon . '</a>';


                $x .= '</div>';
            }
        }

    }

    if ($hide_ab18_img) {
        $x .= '<div style="border:1px #ccc solid;padding:2px 3px;margin-bottom:2px;margin-top:6px">';
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
    }


    return $x;

}

function attr_img($is_new, $is_sold_out, $is_hot, $is_available_again, $s_img_width, $s_img_height, $show_large_icon = false, $is_rare = false, $is_attr6 = false, $is_attr7 = false, $is_attr8 = false, $is_attr9 = false, $is_attr10 = false)
{
    global $img_tag_left_red, $img_tag_left_green, $img_tag_left_grey, $img_tag_left_rare, $img_tag_left_rare_80,
           $img_tag_left_red_80, $img_tag_left_green_80,
           $prod_atr_icons_is_active, $prod_atr_icons_avail_again_is_active,
           $prod_atr_icons_text_color, $prod_atr_icons_border_color, $prod_atr_icons_bg_color,

           $prod_atr_icons_attr1_txt, $prod_atr_icons_attr1_text_size, $prod_atr_icons_attr1_txt_color, $prod_atr_icons_attr1_bg_props_color, $prod_atr_icons_attr1_bg_props_color_use_img,
           $prod_atr_icons_attr2_txt, $prod_atr_icons_attr2_text_size, $prod_atr_icons_attr2_txt_color, $prod_atr_icons_attr2_bg_props_color, $prod_atr_icons_attr2_bg_props_color_use_img,
           $prod_atr_icons_attr3_txt, $prod_atr_icons_attr3_text_size, $prod_atr_icons_attr3_txt_color, $prod_atr_icons_attr3_bg_props_color, $prod_atr_icons_attr3_bg_props_color_use_img,
           $prod_atr_icons_attr4_txt, $prod_atr_icons_attr4_text_size, $prod_atr_icons_attr4_txt_color, $prod_atr_icons_attr4_bg_props_color, $prod_atr_icons_attr4_bg_props_color_use_img,
           $prod_atr_icons_attr5_txt, $prod_atr_icons_attr5_text_size, $prod_atr_icons_attr5_txt_color, $prod_atr_icons_attr5_bg_props_color, $prod_atr_icons_attr5_bg_props_color_use_img,
           $prod_atr_icons_attr6_txt, $prod_atr_icons_attr6_text_size, $prod_atr_icons_attr6_txt_color, $prod_atr_icons_attr6_bg_props_color, $prod_atr_icons_attr6_bg_props_color_use_img,
           $prod_atr_icons_attr7_txt, $prod_atr_icons_attr7_text_size, $prod_atr_icons_attr7_txt_color, $prod_atr_icons_attr7_bg_props_color, $prod_atr_icons_attr7_bg_props_color_use_img,
           $prod_atr_icons_attr8_txt, $prod_atr_icons_attr8_text_size, $prod_atr_icons_attr8_txt_color, $prod_atr_icons_attr8_bg_props_color, $prod_atr_icons_attr8_bg_props_color_use_img,
           $prod_atr_icons_attr9_txt, $prod_atr_icons_attr9_text_size, $prod_atr_icons_attr9_txt_color, $prod_atr_icons_attr9_bg_props_color, $prod_atr_icons_attr9_bg_props_color_use_img,
           $prod_atr_icons_attr10_txt, $prod_atr_icons_attr10_text_size, $prod_atr_icons_attr10_txt_color, $prod_atr_icons_attr10_bg_props_color, $prod_atr_icons_attr10_bg_props_color_use_img,

           $prod_atr_icons_attr1_bg_props_color_img_name,
           $prod_atr_icons_attr2_bg_props_color_img_name,
           $prod_atr_icons_attr3_bg_props_color_img_name,
           $prod_atr_icons_attr4_bg_props_color_img_name,
           $prod_atr_icons_attr5_bg_props_color_img_name,
           $prod_atr_icons_attr6_bg_props_color_img_name,
           $prod_atr_icons_attr7_bg_props_color_img_name,
           $prod_atr_icons_attr8_bg_props_color_img_name,
           $prod_atr_icons_attr9_bg_props_color_img_name,
           $prod_atr_icons_attr10_bg_props_color_img_name;


    if ($is_new) {
        $atrr_nr = 1;
        if (to_bool($prod_atr_icons_attr1_bg_props_color_use_img)) {
            $this_bg = $prod_atr_icons_attr1_bg_props_color_img_name;
        } else {
            $this_bg = $prod_atr_icons_attr1_bg_props_color;
        }

        $r .= '<h2 style="color:' . $prod_atr_icons_attr1_txt_color . ';font-size:' . $prod_atr_icons_attr1_text_size . 'px;background:' . $this_bg . '">' .
            $prod_atr_icons_attr1_txt . '</h2>';
    }

    if ($is_hot) {
        $atrr_nr = 2;
        if (to_bool($prod_atr_icons_attr2_bg_props_color_use_img)) {
            $this_bg = $prod_atr_icons_attr2_bg_props_color_img_name;
        } else {
            $this_bg = $prod_atr_icons_attr2_bg_props_color;
        }

        $r .= '<h2 style="color:' . $prod_atr_icons_attr2_txt_color . ';font-size:' . $prod_atr_icons_attr2_text_size . 'px;background:' . $this_bg . '">' .
            $prod_atr_icons_attr2_txt . '</h2>';
    }

    if ($is_sold_out) {
        $atrr_nr = 3;
        if (to_bool($prod_atr_icons_attr3_bg_props_color_use_img)) {
            $this_bg = $prod_atr_icons_attr3_bg_props_color_img_name;
        } else {
            $this_bg = $prod_atr_icons_attr3_bg_props_color;
        }

        $r .= '<h2 style="color:' . $prod_atr_icons_attr3_txt_color . ';font-size:' . $prod_atr_icons_attr3_text_size . 'px;background:' . $this_bg . '">' .
            $prod_atr_icons_attr3_txt . '</h2>';
    }


    if ($is_rare) {
        $atrr_nr = 4;
        if (to_bool($prod_atr_icons_attr4_bg_props_color_use_img)) {
            $this_bg = $prod_atr_icons_attr4_bg_props_color_img_name;
        } else {
            $this_bg = $prod_atr_icons_attr4_bg_props_color;
        }

        $r .= '<h2 style="color:' . $prod_atr_icons_attr4_txt_color . ';font-size:' . $prod_atr_icons_attr4_text_size . 'px;background:' . $this_bg . '">' .
            $prod_atr_icons_attr4_txt . '</h2>';
    }


    if ($is_available_again) {
        $atrr_nr = 5;
        if (to_bool($prod_atr_icons_attr5_bg_props_color_use_img)) {
            $this_bg = $prod_atr_icons_attr5_bg_props_color_img_name;
        } else {
            $this_bg = $prod_atr_icons_attr5_bg_props_color;
        }

        $r .= '<h2 style="color:' . $prod_atr_icons_attr5_txt_color . ';font-size:' . $prod_atr_icons_attr5_text_size . 'px;background:' . $this_bg . '">' .
            $prod_atr_icons_attr5_txt . '</h2>';
    }


    if ($is_attr6) {
        $atrr_nr = 6;
        if (to_bool($prod_atr_icons_attr6_bg_props_color_use_img)) {
            $this_bg = $prod_atr_icons_attr6_bg_props_color_img_name;
        } else {
            $this_bg = $prod_atr_icons_attr6_bg_props_color;
        }

        $r .= '<h2 style="color:' . $prod_atr_icons_attr6_txt_color . ';font-size:' . $prod_atr_icons_attr6_text_size . 'px;background:' . $this_bg . '">' .
            $prod_atr_icons_attr6_txt . '</h2>';
    }


    if ($is_attr7) {
        $atrr_nr = 7;
        if (to_bool($prod_atr_icons_attr7_bg_props_color_use_img)) {
            $this_bg = $prod_atr_icons_attr7_bg_props_color_img_name;
        } else {
            $this_bg = $prod_atr_icons_attr7_bg_props_color;
        }

        $r .= '<h2 style="color:' . $prod_atr_icons_attr7_txt_color . ';font-size:' . $prod_atr_icons_attr7_text_size . 'px;background:' . $this_bg . '">' .
            $prod_atr_icons_attr7_txt . '</h2>';
    }

    if ($is_attr8) {
        $atrr_nr = 8;
        if (to_bool($prod_atr_icons_attr8_bg_props_color_use_img)) {
            $this_bg = $prod_atr_icons_attr8_bg_props_color_img_name;
        } else {
            $this_bg = $prod_atr_icons_attr8_bg_props_color;
        }

        $r .= '<h2 style="color:' . $prod_atr_icons_attr8_txt_color . ';font-size:' . $prod_atr_icons_attr8_text_size . 'px;background:' . $this_bg . '">' .
            $prod_atr_icons_attr8_txt . '</h2>';
    }

    if ($is_attr9) {
        $atrr_nr = 9;
        if (to_bool($prod_atr_icons_attr9_bg_props_color_use_img)) {
            $this_bg = $prod_atr_icons_attr9_bg_props_color_img_name;
        } else {
            $this_bg = $prod_atr_icons_attr9_bg_props_color;
        }

        $r .= '<h2 style="color:' . $prod_atr_icons_attr9_txt_color . ';font-size:' . $prod_atr_icons_attr9_text_size . 'px;background:' . $this_bg . '">' .
            $prod_atr_icons_attr9_txt . '</h2>';
    }

    if ($is_attr10) {
        $atrr_nr = 10;
        if (to_bool($prod_atr_icons_attr10_bg_props_color_use_img)) {
            $this_bg = $prod_atr_icons_attr10_bg_props_color_img_name;
        } else {
            $this_bg = $prod_atr_icons_attr10_bg_props_color;
        }

        $r .= '<h2 style="color:' . $prod_atr_icons_attr10_txt_color . ';font-size:' . $prod_atr_icons_attr10_text_size . 'px;background:' . $this_bg . '">' .
            $prod_atr_icons_attr10_txt . '</h2>';
    }


    return $r;
}


function is_long_text($key)
{

    $sql = "select div_res from diverses where div_what ='" . $key . "'";
    $short_t = lookup($sql, 'div_res');

    $sql = "select div_res_long from diverses where div_what ='" . $key . "'";
    $long_t = lookup($sql, 'div_res_long');

    if (trim($short_t) == '' and trim($long_t) <> '') {
        return true;
    } else {
        return false;
    }


}


function get_translator_by_key($key)
{
    global $bearb_mode_icon12, $translate_icon;
    $long = is_long_text($key);

    if ($long) {
        $l = '<a 
	class="lightwindow"  
	href="popup_edit_transl_by_key.php?p=' . $key . '&long=1" 
	title="&Uuml;bersetzung bearbeiten - HTML-Text"  
	params="lightwindow_type=external,lightwindow_width=900,lightwindow_height=700">
	' . $translate_icon . '</a>
	';

    } else {

        $l = '<a 
	class="lightwindow"  
	href="popup_edit_transl_by_key.php?p=' . $key . '&long=0" 
	title="&Uuml;bersetzung bearbeiten - einfacher Text"  
	params="lightwindow_type=external,lightwindow_width=900,lightwindow_height=700">
	' . $translate_icon . '</a>
	';
    }


    return $l;

}

function add_querystring_var($url, $key, $value)
{
    $url = preg_replace('/(.*)(?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
    $url = substr($url, 0, -1);
    if (strpos($url, '?') === false) {
        return ($url . '?' . $key . '=' . $value);
    } else {
        return ($url . '&' . $key . '=' . $value);
    }
}


function remove_querystring_var($url, $key)
{
    $url = preg_replace('/(.*)(?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
    $url = substr($url, 0, -1);
    return ($url);
}

//db_tr($definition='MOST_ORDERED_IN_DEPARTMENT',$page='general',$from_lang_code='de',$content='Am meisten bestellt',true)
function db_tr($definition, $page, $from_lang_code, $content, $re_translate = false)
{
    global $session_lang_code_from_lang_id, $always_auto_translate_to_all_active_languages, $db_tr_log_hits, $shop_is_multilang;

    if ($session_lang_code_from_lang_id == '') $session_lang_code_from_lang_id = 'de';

    if (defined($definition) and constant($definition) <> '' and !$re_translate) {
        if ($db_tr_log_hits) {
            $sql = "update myd_translations set hits=hits+1, page_paras = '" . curPageName() . "'   where definition = '" . $definition . "' and page = '" . $page . "'    ";
            q($sql);
        }

        return constant($definition);
    } else {

        if ((($shop_is_multilang and $always_auto_translate_to_all_active_languages))) {
            if (make_this_definition_if_not_exists_in_db($definition, $page, $from_lang_code, $content, $re_translate) or $re_translate) {

                $sql = "select * from languages where status = 1 ";
                $res = q($sql);
                while ($row = mysql_fetch_array($res)) {
                    $to_lang_code = $row["code"];
                    if ($to_lang_code <> $from_lang_code) {
                        $transl = translate_this_from_to($content, $from_lang_code, $to_lang_code);
                        //$transl = translate_this_from_to($content,'de',$to_lang_code);
                        if ($transl <> '') {
                            $sql = "update myd_translations set " . $to_lang_code . " = '" . addslashes($transl) . "', de = '" . $content . "' where definition = '" . $definition . "'  and page = '" . $page . "' ";
                            q($sql);
                        }
                    } else {
                        $sql = "update myd_translations set " . $to_lang_code . " = '" . $content . "' where definition = '" . $definition . "'  and page = '" . $page . "' ";
                        q($sql);

                    }
                }
            }
            mysql_free_result($res);
            $sql = "select " . $session_lang_code_from_lang_id . " from myd_translations where  page = '" . $page . "' and definition = '" . $definition . "'    ";
            $r = lookup($sql, $session_lang_code_from_lang_id);

            if ($db_tr_log_hits) {
                $sql = "update myd_translations set hits=hits+1, page_paras = '" . curPageName() . "'   where definition = '" . $definition . "' and page = '" . $page . "'    ";
                q($sql);
            }

            return $r;
        }
    }
}


function make_this_definition_if_not_exists_in_db($definition, $page, $from_lang_code, $content, $re_translate)
{
    if ($re_translate) return;
    $sql = "select * from myd_translations where  page = '" . $page . "' and definition = '" . $definition . "'    ";
    $anz = sql_has_number_records($sql);
    if ($anz == 0) {
        $sql = "insert into myd_translations set page = '" . $page . "', definition = '" . $definition . "'    ";
        q($sql);
        return true;
    } else {
        //$sql="update myd_translations set ".$write_to." = '".addslashes($content)."' where page = '".$page."' and definition = '".$constant."'    ";
        //q($sql);
        return false;
    }
}


function translate_this_from_to($translate_string, $lang_code_source = 'de', $lang_code_target)
{
    return translate_this($translate_string, $lang_code_target, $lang_code_source);
}


function translate_this($translate_string, $lang_code_target, $lang_code_source = 'de')
{

    if (trim(strip_tags($translate_string)) == '') return $translate_string;

//$translate_string = str_replace('class="notranslate"','class=notranslate',$translate_string);

//$lang_id_target = langid_from_langdir($lang_code_target);
    require_once(DIR_FS_CATALOG . 'includes/classes/gtranslate-api-php-0.7.9.1/googleapiversion2/GTranslateV2.php');

    $gt = new Gtranslate;
    $gt->setApiVersion(2);
    $gt->setApiKey(GOOGLE_API_KEY);
    $gt->setUrl('https://www.googleapis.com/language/translate/v2');
    $gt->setRequestType('curl');
    $a = $gt->translate($lang_code_source, $lang_code_target, $translate_string);

    $r = $a[0]->translatedText;
//$r = str_replace('</ ','</',$r);
    $r = str_replace('/ ', '/', $r);
//$r = str_replace('# ','#',$r);
//$r = htmlspecialchars_decode($r, ENT_QUOTES);

    return $r;
}


function html2rgb($color)
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

    return array($r, $g, $b);
}

function rgb2html($r, $g = -1, $b = -1)
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

function hex_color_to_rgba($hex_color, $opacity = 0.5)
{
//rgba(143,161,180,.6)
    $color_array = html2rgb($hex_color);
    $r = 'rgba(' . $color_array[0] . ',' . $color_array[1] . ',' . $color_array[2] . ',' . $opacity . ')';

    return $r;
}


function price_from_plan($plan, $round = 2)
{
    global $currency_from_ip;

    $plan = strtolower($plan);
    if ($plan == 'professional') $plan = 'pro';
    $sql = "select products_price from products where products_model = '" . $plan . "'";
    $price = lookup($sql, 'products_price');

    if ($currency_from_ip == 'CHF') {
        $chf_exc_rate = get_currency_rate('CHF');
        $price = round($price * $chf_exc_rate, $round);
    }

    return $price;

}

function price_txt_from_plan($plan, $round = 2)
{
    global $currency_from_ip;

    $plan = strtolower($plan);
    if ($plan == 'professional') $plan = 'pro';
    $sql = "select products_price from products where products_model = '" . $plan . "'";
    $price = lookup($sql, 'products_price');

    if ($currency_from_ip == 'CHF') {
        $chf_exc_rate = get_currency_rate('CHF');
        $price = round($price * $chf_exc_rate, $round);
        return nuf_d($price) . ' CHF';
    } else {
        return nuf_d($price) . ' &#8364;';
    }


}


function get_video_descr($video_id)
{
    $sql = "select descr from video where id=" . $video_id;
    return lookup($sql, 'descr');
}


function get_video_title($video_id)
{
    $sql = "select title from video where id=" . $video_id;
    return lookup($sql, 'title');
}

function get_plain_video_link($video_id)
{

    $sql = "select * from video where id=" . $video_id;
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $title = $row["title"];
        $descr = $row["descr"];
        $active = $row["active"];
        $width = $row["width"];
        $height = $row["height"];
        $object = $row["link"];
    }

    if ($width == 0) {
        $width = 600;
    }

    if ($height == 0) {
        $height = 530;
    }
    $width = round($width * 1.05, 0);
    $height = round($height * 1.05, 0);

    $title1 = sozeichen_to_x($title);
    $link = 'javascript:open_video(' . $video_id . ',\'' . $title1 . '\',' . $width . ',' . $height . ')';
    mysql_free_result($sql_result);
    return $link;
}


function get_products_video_from_products_id($products_id)
{
    $sql = "select products_video from products where products_id = " . $products_id;
    return lookup($sql, 'products_video');
}


function country_from_ip()
{
    /*
$ip_address = $_SERVER['REMOTE_ADDR'];
$sql = 'SELECT 
	            c.country 
	        FROM 
	            ip2nationCountries c,
	            ip2nation i 
	        WHERE 
	            i.ip < INET_ATON("'.$ip_address.'") 
	            AND 
	            c.code = i.country 
	        ORDER BY 
	            i.ip DESC 
	        LIMIT 0,1';

return lookup($sql,'country');
*/
}

function currency_from_ip()
{
    $country_from_ip = country_from_ip();

    if ($country_from_ip == 'Switzerland') {
        $currency_from_ip = 'CHF';
    } else {
        $currency_from_ip = 'EUR';
    }
    return $currency_from_ip;

}

function comp($str)
{
    $str = preg_replace('/\s\s+/', ' ', $str);
    $str = str_replace("\n", "", $str);
    return str;
}

function bg_repeat($key_val)
{

    switch ($key_val) {
        case 'repeat':
            return ' top left repeat ';
            break;
        case 'repeat_x':
            return ' top left repeat-x ';
            break;
        case 'repeat_none':
            return ' top center no-repeat ';
            break;

        case 'repeat_none_left':
            return ' top left no-repeat ';
            break;

        case 'repeat_none_right':
            return ' top right no-repeat ';
            break;


        default:
            return ' top left repeat-x ';
    }

}

function toggler_shop($id, $minus = false, $size = '24', $txt = '')
{
    if ($minus) {
        $r = '<img title="Infos ein- und ausblenden" src="images/icon4/toggle/24/toggle-collapse-alt.png" width="' . $size . '" height="' . $size . '" style="float:right;margin:-9px -8px 0 0;opacity:0.5" onmouseover="this.style.opacity=1.0"  onmouseout="this.style.opacity=0.5" onclick="box_toggle_vis(\'' . $id . '\',\'blind\')" />';
    } else {
        $r = '<img title="Infos ein- und ausblenden" src="images/icon4/toggle/24/toggle-down-alt.png" width="' . $size . '" height="' . $size . '" style="float:right;margin:-9px -8px 0 0;opacity:0.5" onmouseover="this.style.opacity=1.0"  onmouseout="this.style.opacity=0.5"  onclick="box_toggle_vis(\'' . $id . '\',\'blind\')" />';
    }
    if ($txt <> '') $txt = '<span style="color:#369;font-size:0.9em;float:right;margin-right:12px;vertical-align:50%">' . $txt . '</span>';

    return $r . $txt;
}

/*
if (!function_exists('eregi')) {
    function eregiS($find, $str) {
        return stristr($str, $find);
    }
}
*/

function eregiS($find, $str)
{
    return stristr($str, $find);
}


function get_abt_div_prod_display($url, $title, $mit_str, $target = '', $cat_name_this, $y, $anz_in_cat, $force = false, $min_height = true)
{
    return false;
    /*	
global $show_abteilung_div, $goto_icon, $never_show_abteilung_div ;
if (!to_bool($show_abteilung_div) or !$force) return '';
//if ($never_show_abteilung_div) return '';

if($min_height){
$r='<div class="new_prod" style="min-height:0;border-bottom: 1px solid #ccc;"><a '.$target.' class="noul" href="' . $url . '" title="Abteilung '.$title.' '.$mit_str.' &ouml;ffnen...">';
}else{
$r='<div class="new_prod" style="min-height:0;border-bottom: 1px solid #ccc;"><a '.$target.' class="noul" href="' . $url . '" title="Abteilung '.$title.' '.$mit_str.' &ouml;ffnen...">';	
}

//$r.=  cpath_str_in_abt_div(dotString($cat_name_this,35),$y).$anz_in_cat;
$r.=  cpath_str_in_abt_div(dotString($cat_name_this,35),$y);
$r.='' ;
$r.='</a></div>';

return $r;
*/
}

function get_manuf_div_prod_display($products_id)
{
    global $show_abteilung_div, $goto_icon, $never_show_abteilung_div, $SID;
    if (!to_bool($show_abteilung_div) or !$force) return '';
//if ($never_show_abteilung_div) return '';


    $manuf_txt = 'Komponist';
    $manuf_id = lookup('select manufacturers_id from products where products_id =' . $products_id, 'manufacturers_id');
    $manuf_name = lookup('select manufacturers_name from manufacturers where manufacturers_id =' . $manuf_id, 'manufacturers_name');
    $url = 'index.php?manufacturers_id=' . $manuf_id . '&' . $SID;

    $r = '<div class="new_prod" style="min-height:0;border-bottom: 1px solid #ccc;padding:3px;0">' . $manuf_txt . ': <a class="noul" style="display:inline" href="' . $url . '" title="' . $manuf_txt . ': ' . $manuf_name . ' &ouml;ffnen...">';

    $r .= $manuf_name;
    $r .= '</a></div>';


    return $r;
}

function get_app_top_img($img, $style = "")
{
    $img = str_replace('<img', '<img style="' . $style . '" ', $img);
    return $img;
}

function get_main_page($which = 1)
{
    global $language, $mainpage_box_is_active;


    $r = '';

    if ($mainpage_box_is_active) {
        if (element_show_here('mainpage_box')) {
            //$r.=make_config_edit_link('define_mainpage.php','div','Mainpage bearbeiten',''); 
            $r .= '<div style="width:100%;overflow:hidden;">';

            $mainpage_box_curr = get_dv('mainpage_box_curr');
            if (file_exists(DIR_WS_LANGUAGES . $language . '/sdp/' . $mainpage_box_curr)) {
                $r .= file_get_contents(DIR_WS_LANGUAGES . $language . '/sdp/' . $mainpage_box_curr);
            } else {
                $r .= file_get_contents(DIR_WS_LANGUAGES . 'german' . '/sdp/' . $mainpage_box_curr);

            }

            $r .= '</div>';

        }
    }

    return $r;
}

/*
function element_show_here($element){
$show_where = get_dv($element.'_show_on_what_page');
if ($show_where=='all_pages'){
	return true;
}else{
	if ($show_where=='start_only' and is_start_page()){
		return true;
	}else{
		if ($show_where=='everywhere_but_on_start' and !is_start_page()){
			return true;
		}else{
			return false;
		}
	}
}
}
*/

function element_show_here($element)
{
    $show_where = get_dv($element . '_show_on_what_page');
//if ($show_where=='') return true;
    if ($show_where == 'all_pages') {
        return true;
    } else {
        if ($show_where == 'start_only' and is_start_page()) {
            return true;
        } else {
            if ($show_where == 'everywhere_but_on_start' and !is_start_page()) {
                return true;
            }
        }
    }
}


function element_show_where($element)
{

    $is_active = get_dv_bool($element . '_is_active');

    if ($is_active) {
        $show_where = get_dv($element . '_show_on_what_page');
        if ($show_where == 'all_pages') {
            return ' Anzeige: <b>Auf allen Seiten.</b>';
        } else {
            if ($show_where == 'start_only') {
                return ' Anzeige: <b>Nur auf Startseite.</b>';
            } else {
                if ($show_where == 'everywhere_but_on_start') {
                    return ' Anzeige: <b>&Uuml;berall ausser auf Startseite.</b>';
                }
            }
        }

    }

}


function get_shopping_cart($display_open = false)
{
    global $cart, $currencies, $easy_discount, $trash_icon13, $SID, $app_easy_coupons, $app_easy_coupons_indiv, $shoppig_cart_icon, $shopping_cart_box_move_to_left_col, $all_boxes_move_to_left_col, $new_products_id_in_cart, $at_is_gay_shop;
    global $shopping_cart_box_show_client_adress_box, $shopping_cart_box_show_client_adress_box_edit_address_link,
           $toolbar_free_border_color, $cart_48_style1, $cart_48_style2, $shoppig_cart_icon, $shoppig_cart_icon13;

    global $dvd_bonuscard_is_active, $dvd_bonuscard_display_box, $at_all_bananas, $at_banana_discount, $at_banana_discount_value, $pizza_shop_is_active;

    $shoppig_cart_icon = $shoppig_cart_icon13 . ' ';


//$max_cart_lines = $shopping_cart_box_max_prods_visible_in_cart;
    $max_cart_lines = 1;
    if ($pizza_shop_is_active) $max_cart_lines = 8;


    $show_prod_model_in_cart = false;

    $r = "";

    $class_master = 'boxes_left_right';

    $r .= '<span id="cart1"></span>';

    $r .= outer_div_top(
        $header_txt = ll(get_dv('shopping_cart_box_header_txt')),
        $class_master,
        $style = '',
        $float = 'left');


    if ($shopping_cart_box_move_to_left_col or $all_boxes_move_to_left_col) {
        $tooltip_class = 'tip';
    } else {
        $tooltip_class = 'tip_lu';
    }

    $r .= '
<div class="' . $class_master . '_content" id="shopping_cart">
<div style="padding:6px;"><!-- inner content -->
';

//$cart_box_header=get_dv('cart_box_header');

    $info_box_contents = array();
    $info_box_contents[] = array('text' => '' . $header_txt . ' (' . $cart->count_contents() . ')');
    //new infoBoxHeading($info_box_contents, true, true, tep_href_link(FILENAME_SHOPPING_CART));

    if (tep_session_is_registered('customer_id')) {
        if (get_dv_bool('shopping_cart_box_show_client_adress_box')) {
            //$hint='shopping_cart_5addresses_tooltip';
            //update_t_key_comment_temp($hint); 
            //$h = get_hint_by_t_key($hint,$use_outer_div=false,$show_header=false,$use_comment_div=false,$parse_links=true);

            $cart_contents_string = '	<a title="' . get_dv('shopping_cart_box_button_change_order_mo') . '" href="' . tep_href_link(FILENAME_SHOPPING_CART) . '">' . $cart_48_style1 . '</a>' . get_dv('shopping_cart_box_greeting_txt') . '<br>
	  <div class="round6  scart_wl_hint" style="margin:5px 0 6px 0;padding:4px 3px 2px 6px;font-size:0.9em;font-weight:bold;border:1px ' . $toolbar_free_border_color . ' solid;
		-webkit-box-shadow: inset inset 2px 2px 5px rgba(0,0,0,.2); 
		-moz-box-shadow: inset inset 2px 2px 5px rgba(0,0,0,.2);
		box-shadow: inset 2px 2px 5px rgba(0,0,0,.2);">';
            $shopping_cart_adress_display = get_dv('shopping_cart_adress_display');
            if ($shopping_cart_adress_display == 'full') $cart_contents_string .= tep_address_label($_SESSION['customer_id'], $_SESSION['customer_default_address_id'], true, '', '<br>');
            if ($shopping_cart_adress_display == 'both') $cart_contents_string .= $_SESSION['customer_first_name'] . ' ' . $_SESSION['customer_last_name'];
            if ($shopping_cart_adress_display == 'first') $cart_contents_string .= '<span style="font-size:1.2em">' . $_SESSION['customer_first_name'] . '</span>';
            if ($shopping_cart_adress_display == 'none') $cart_contents_string .= '';


            $cart_contents_string .= '<div style="margin: 1px 0 3px 3px;">';

            if ($shopping_cart_box_show_client_adress_box_edit_address_link) {
                $cart_contents_string .= '
		<a title="' . db_tr($definition = 'MY_ACCOUNT', $page = 'general', $from_lang_code = 'de', $content = 'Mein Konto') . '" style="font-size:0.9em;font-weight:normal"  '
                    . lw_class('', '1050', '800') . ' href="account.php?' . SID . '">' . HEADER_TITLE_MY_ACCOUNT . '</a> ';

                $cart_contents_string .= '<a style="margin-left:12px;font-size:0.9em;font-weight:normal" title="' . get_dv('shopping_cart_box_button_abmelden_mo') . '" href="javascript:logoff()" >' . get_dv('shopping_cart_box_button_abmelden') . '</a>';
            }
            $cart_contents_string .= '</div></div>';
        }
    }

    if ($cart->count_contents() > 0) {

        if ((tep_session_is_registered('new_products_id_in_cart')) && ($new_products_id_in_cart == $products[$i]['id'])) {

        }

        if ((tep_session_is_registered('new_products_id_in_cart'))) {
            //ec('new: '.$new_products_id_in_cart );
        }


        if (!tep_session_is_registered('customer_id') and $cart->count_contents() > 0) {
            $hint = 'shopping_cart_box_get_login_hint';
            //update_t_key_comment_temp($hint); 
            $h = get_hint_by_t_key($hint, $use_outer_div = false, $show_header = false, $use_comment_div = false, $parse_links = true);

            $cart_contents_string .= '
	<div class="scart_wl_hint" style="margin:0 0 12px 0;font-size:0.8em;line-height:80%;color:#a66;padding:5px 5px;border:1px #999 solid;box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.25) inset;">

	<a title="' . get_dv('shopping_cart_box_button_change_order_mo') . '" href="' . tep_href_link(FILENAME_SHOPPING_CART) . '">' . $cart_48_style2 . '</a>

	
	<a href="login.php">' . db_tr($definition = 'PLS_LOGIN_OR_REGISTER', $page = 'general', $from_lang_code = 'de', $content = 'Melden Sie sich an oder registrieren Sie sich!') . '</a> ' . tooltip($h, $img = '10', $style = '', $class = $tooltip_class, '650px', false) . '</div>
	
	';
        }

        if ($cart->count_lines() > $max_cart_lines and !tep_session_is_registered('new_products_id_in_cart')) {
            $cart_contents_string .= '<div class="scart_wl_hint round6_top" style="padding:3px;">
	<div id="cart_box_header_trig_hide" style="display:none;margin-bottom:0px;"><a style="text-align:center;width:150px" class="button99 dimmed08" title="' . db_tr($definition = 'CART_HIDE_TITLE', $page = 'general', $from_lang_code = 'de', $content = 'Warenkorb ausblenden') . '" href="javascript:hide_cont(\'cart_box_header_trig_show\',\'cart_box_header_trig_hide\',\'cart_inner1\')">' . $shoppig_cart_icon . db_tr($definition = 'CART_HIDE', $page = 'general', $from_lang_code = 'de', $content = 'Artikel ausblenden') . '</a></div>
	<div id="cart_box_header_trig_show" style="display:display"><a style="text-align:center;width:150px" class="button99 dimmed08" title="' . db_tr($definition = 'CART_SHOW_TITLE', $page = 'general', $from_lang_code = 'de', $content = 'Warenkorb einblenden') . '" href="javascript:show_cont(\'cart_box_header_trig_show\',\'cart_box_header_trig_hide\',\'cart_inner1\')"> ' . $shoppig_cart_icon . db_tr($definition = 'CART_SHOW', $page = 'general', $from_lang_code = 'de', $content = ' Artikel anzeigen') . ' (' . $cart->count_contents() . ')</a></div></div>
	';
            $cart_contents_string .= '<div class="scart_wl_hint" id="cart_inner1" style="display:none;padding:0 4px;margin:0"><table width="100%" cellspacing="0" cellpadding="0">';
        } else {
            if ($cart->count_lines() > $max_cart_lines and tep_session_is_registered('new_products_id_in_cart')) {
                $cart_contents_string .= '<div class="scart_wl_hint round6_top" style="padding:3px 3px 3px 3px">
			<div id="cart_box_header_trig_hide" style="display:display;margin-bottom:0px;"><a style="text-align:center;width:150px" class="button99 dimmed08" title="' . db_tr($definition = 'CART_HIDE_TITLE', $page = 'general', $from_lang_code = 'de', $content = 'Artikel ausblenden') . '" href="javascript:hide_cont(\'cart_box_header_trig_show\',\'cart_box_header_trig_hide\',\'cart_inner1\')">' . $shoppig_cart_icon . db_tr($definition = 'CART_HIDE', $page = 'general', $from_lang_code = 'de', $content = 'Artikel ausblenden') . '</a></div>
			<div id="cart_box_header_trig_show" style="display:none"><a style="text-align:center;width:150px" class="button99 dimmed08" title="' . db_tr($definition = 'CART_SHOW_TITLE', $page = 'general', $from_lang_code = 'de', $content = ' Warenkorb einblenden') . '" href="javascript:show_cont(\'cart_box_header_trig_show\',\'cart_box_header_trig_hide\',\'cart_inner1\')"> ' . $shoppig_cart_icon . db_tr($definition = 'CART_SHOW', $page = 'general', $from_lang_code = 'de', $content = ' Artikel anzeigen') . ' (' . $cart->count_contents() . ')</a></div></div>
			';
            }
            $cart_contents_string .= '<div class="scart_wl_hint" id="cart_inner1" style="display:display;padding:0 4px;"><table width="100%" cellspacing="0" cellpadding="0" style="opacity:1">';

        }

        $products = $cart->get_products();


        for ($i = 0, $n = sizeof($products); $i < $n; $i++) {


            if ((tep_session_is_registered('new_products_id_in_cart')) && ($new_products_id_in_cart == $products[$i]['id'])) {
                $cart_contents_string .= '<tr><td align="left" class="cartCont_td_quant" ><div style="margin-bottom:6px;padding-top:6px;border-top:1px #666 dotted" class="newItemInCart" id="cartCont_' . $products[$i]['id'] . '">';
                $cart_contents_string .= '<span class="newItemInCart">';
            } else {
                $cart_contents_string .= '<tr><td align="left" class="cartCont_td_quant" ><div  style="margin-bottom:6px;padding-top:6px;border-top:1px #666 dotted" id="cartCont_' . $products[$i]['id'] . '">';
                $cart_contents_string .= '<span>';
            }

            $item_quantity = $products[$i]['quantity'];

            //$cart_contents_string .= $products[$i]['quantity'] . '&nbsp;x&nbsp;</span></td><td class="cartCont_td"><a title="&ouml;ffnen" href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products[$i]['id']) . '">';
//��?�?\  $shoppig_cart_minus_icon

            $cart_contents_string .= '<div style="margin:0 6px -4px 0;float:left"><a class="trash_button" title="' . db_tr($definition = 'GENERAL_DELETE_FOM_CART_TITLE', $page = 'general', $from_lang_code = 'de',
                    $content = 'diesen Artikel aus meinem Warenkorb l�schen') . '" href="javascript:hide_prod_in_cart(\'' . $products[$i]['id'] . '\',\'' . gms_products_name_js_safe($products[$i]['name']) . '\')">' . $trash_icon13 . '</a></div>';
//'&cPath='.full_cPath_from_products_id($new_products['products_id'])		
            if ($show_prod_model_in_cart) {
                $cart_contents_string .= $item_quantity . '&nbsp;x&nbsp; (' . get_products_model_from_products_id($products[$i]['id']) . ') </span>		
		<div class="cartCont_td" style="display:inline"><a title="' . OPEN_PROD_DETAILS . '" href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products[$i]['id']) . '">';
            } else {
                $cart_contents_string .= $item_quantity . '&nbsp;x  </span>		
		<div class="cartCont_td" style="display:inline"><a title="' . OPEN_PROD_DETAILS . '" href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products[$i]['id']) . '">';
            }

            if ((tep_session_is_registered('new_products_id_in_cart')) && ($new_products_id_in_cart == $products[$i]['id'])) {
                $cart_contents_string .= '<span class="newItemInCart">';
            } else {
                $cart_contents_string .= '<span>';
            }
            //attributes
            //if ($use_product_attribute_is_active and has_products_attribute(att_clean($products[$i]['id'])) ){
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

                            //ec(__line__.' '.$option.' name: '.products_options_name($option)  .' val: '.products_options_value($value) );
                            //if($value<>'') 
                            //$prod_attribute = '<div style="margin:0 0 0 18px"><i>['.products_options_name($option).': '.products_options_value($value).']</i></div>';
                            $prod_attribute .= '<div style="margin-left:19px;color:#a22;white-space:nowrap"><i>' . products_options_name($option) . ': ' . products_options_value($value) . '</i></div>';
                            //$prod_attribute .= '<span style="margin-left:6px;color:#a22"><i>: '.products_options_value($value).'</i></span>';
                        }
                    }
                } else {
                    //$this_product_attribute_option_group = this_product_attribute_option_group(att_clean($products[$i]['id']));  
                    //$prod_attribute = '<br><span><i>['.get_products_attribute_optiongroup_name($this_product_attribute_option_group).': '.get_products_options_values_name($options_id).']</i></span>';

                    //$prod_attribute ='11111 -'.$this_product_attribute_option_group.'-'.att_clean($products[$i]['id']).'-'.$options_id.'-';
                }
            } else {
                $prod_attribute = '';
            }

            //$cart_contents_string .= '<div style="margin:0 0;float:left"><a title="diesen Artikel aus meinem Warenkorb l�schen" href="javascript:hide_prod_in_cart('.$products[$i]['id'].')">'.$trash_icon13.'</a></div>';
            //'.$products[$i]['final_price'].'

            if (get_dv_bool('kaspersky_is_active')) {
                //get_price($products[$i]['id'],$apreis_hint,$add_regular_price=true,$to_currency=true,$products[$i]['quantity'],false)
                $this_price1 = get_price($products[$i]['id'], $apreis_hint, $add_regular_price = false, $to_currency = false, 1, false);
                $this_price = price_in_curr($this_price1, $products[$i]['id'], $item_quantity);
                $this_price_one = price_in_curr($this_price1, $products[$i]['id'], 1);

            } else {
                $this_price1 = $products[$i]['final_price'];
                //$this_price1 = get_price_from_id($products[$i]['id'], $quantity = 1, $no_class=false,$currency_rate=1,$display_special_price=false,$line_break=false,$show_currency=false);
                $this_price = price_in_curr($this_price1, $products[$i]['id'], $item_quantity);
                $this_price_one = price_in_curr($this_price1, $products[$i]['id'], 1);
            }

            if ($item_quantity > 1) {
                if (AT_KASPERSKY_IS_ACTIVE) {
                    $cart_contents_string .= get_products_name($products[$i]['id']) . $prod_attribute .
                        '<div style="float:right;text-align:right;margin-right:6px;font-weight:normal;white-space:nowrap"> &aacute; ' . $this_price_one . ' = ' . $this_price . '</div></span>';
                } else {
                    $cart_contents_string .= gms_products_name(get_products_name($products[$i]['id'])) . $prod_attribute .
                        '<div style="float:right;text-align:right;margin-right:6px;font-weight:normal;white-space:nowrap"> &aacute; ' . $this_price_one . ' = ' . $this_price . '</div></span>';
                }
            } else {
                if (AT_KASPERSKY_IS_ACTIVE) {
                    $cart_contents_string .= get_products_name($products[$i]['id']) . $prod_attribute . '<div style="float:right;text-align:right;margin-right:6px;font-weight:normal">' . $this_price . '</div></span>';
                } else {
                    $cart_contents_string .= gms_products_name(get_products_name($products[$i]['id'])) . $prod_attribute . '<div style="float:right;text-align:right;margin-right:6px;font-weight:normal">' . $this_price . '</div></span>';
                }
            }

            $cart_contents_string .= '</a>
		

		</div></div></td></tr>';


            if ((tep_session_is_registered('new_products_id_in_cart')) && ($new_products_id_in_cart == $products[$i]['id'])) {
                tep_session_unregister('new_products_id_in_cart');
            }
        }
        $cart_contents_string .= '</table></div>';
    } else {


        if (tep_session_is_registered('customer_id')) {

            $cart_contents_string .= '<span class="dgrey10" style="">' . db_tr($definition = 'SHOPPING_CART_IST_LEER_HINT', $page = 'general', $from_lang_code = 'de', $content = 'Der Warenkorb ist leer!') . '</span> ';

            if (sizeof($products) == 0) {
                $hint = 'shopping_cart_logout';
                $h = get_hint_by_t_key($hint, $use_outer_div = false, $show_header = false, $use_comment_div = false, $parse_links = true);
                //$cart_contents_string .= '<div style="margin:6px 0 0 102px"><a title="Logout" style="font-size:0.8em;" href="javascript:logoff()">'.ll('Abmelden').'</a>';
                $cart_contents_string .= '<div style="margin:2px 0 0 102px">';
                //$cart_contents_string .= tooltip($h,$img='10',$style='display:inline',$class=$tooltip_class,'',false); 
                $cart_contents_string .= '</div>';
            }

        } else {

            $hint = 'shopping_cart_tooltip';
            $h = get_hint_by_t_key($hint, $use_outer_div = false, $show_header = false, $use_comment_div = false, $parse_links = true);

            $cart_contents_string .= '<span class="dgrey10" style="">' . db_tr($definition = 'SHOPPING_CART_IST_LEER_HINT', $page = 'general', $from_lang_code = 'de', $content = 'Der Warenkorb ist leer!') . '</span> ' .
                tooltip($h, $img = '13', $style = '', $tooltip_class, $width = '300');
        }

    }

    $info_box_contents = array();
    $info_box_contents[] = array('text' => $cart_contents_string);
    if ($cart->count_contents() > 0) {
        //$info_box_contents[] = array('text' => tep_draw_separator());
        /*
	$info_box_contents[] = array('align' => 'right',
                                 'text' => '<div class="scart_wl_hint" style="text-align:right;padding: 6px 6px 3px 6px ;font-size:0.9em; border-top: 1px #666 dotted;">'.$cart->count_contents().' '
											.get_dv('shopping_cart_box_artikel').' <br> '.
											get_dv('shopping_cart_box_sum').' <b>'.$currencies->format($cart->show_total()).'</b></div>'); 								 
	*/
        $info_box_contents[] = array('align' => 'right',
            'text' => '<div class="scart_wl_hint" style="text-align:right;padding: 6px 6px 3px 6px ;font-size:0.9em; border-top: 1px #666 dotted;">' .
                '' . ' <b>' . $currencies->format($cart->show_total()) . '</b></div>');


        //ec(__line__.': '. $_SESSION['couponcode']['code'] );	
        //ec(__line__.': '. get_curr_valid_promo_code() );	

        if ($easy_discount->count() > 0 or $_SESSION['couponcode']['code'] == get_curr_valid_promo_code() or entered_promo_code_is_individual_gutschein($_SESSION['couponcode']['code'])) {
            $discount = '';
            if ($easy_discount->count() > 0) {

                if (curr_promo_code_is_for_cats() or curr_promo_code_is_for_manufs() or entered_promo_code_is_individual_gutschein($_SESSION['couponcode']['code'])) {

                    if (entered_promo_code_is_individual_gutschein($_SESSION['couponcode']['code'])) {
                        //ec(__line__.': '.trim($_SESSION['couponcode']['code']) );		
                        $easy_discount_total = this_value_individual_gutschein($_SESSION['couponcode']['code']);
                        $discount_amount = $cart->show_total() - $easy_discount_total;
                    } else {

                        global $coup_akt_type, $coup_akt_value;
                        $products = $cart->get_products();

                        for ($i = 0, $n = sizeof($products); $i < $n; $i++) {
                            if (is_promo_code_item($products[$i]['id'])) {
                                //ec(__line__.': '. $products[$i]['id'] );	
                                //ec(__line__.': '. $products[$i]['price'] );	
                                //ec(__line__.': '. $products[$i]['final_price'] );	
                                $products_tax_class_id = lookup('select products_tax_class_id from products where products_id = ' . (int)$products[$i]['id'], 'products_tax_class_id');
                                $tax_rate = tep_get_tax_rate($products_tax_class_id);
                                //ec(__line__.': '. $tax_rate );	
                                $brutto_price = $products[$i]['final_price'] + ($products[$i]['final_price'] * $tax_rate / 100);
                                //ec(__line__.': '. $brutto_price );	
                                if ($coup_akt_type == 2) {
                                    $discount_amount += ($brutto_price * $coup_akt_value / 100);
                                } else {
                                    $discount_amount = $coup_akt_value;
                                }
                                //ec(__line__.': '. $discount_amount );						
                            }
                        }
                    }
                    $easy_discounts = $easy_discount->get_all();
                    $n = sizeof($easy_discounts);
                    for ($i = 0; $i < $n; $i++) {
                        $discount .= '' . $easy_discounts[$i]['description'] . ': <span style="color:#a22;font-weight:bold;white-space:nowrap">- ' . $currencies->format($discount_amount) . '</span>';
                    }

                } else {
                    $easy_discounts = $easy_discount->get_all();
                    $n = sizeof($easy_discounts);
                    for ($i = 0; $i < $n; $i++) {
                        $discount .= '' . $easy_discounts[$i]['description'] . ': <span style="color:#a22;font-weight:bold;white-space:nowrap">- ' . $currencies->format($easy_discounts[$i]['amount']) . '</span>';
                    }
                }

            }
            $info_box_contents [] = array('align' => ' right ',
                'text' => '<div class="scart_wl_hint" style="text-align:right;padding: 3px 6px 4px 6px;font-size:0.9em;color:#33c">' . $discount . '</div>');
        }


        //if ( function_exists('get_all_bananas') and to_bool($dvd_bonuscard_is_active)  and to_bool($dvd_bonuscard_display_box) ) {		
        if (function_exists('get_all_bananas') and to_bool($dvd_bonuscard_is_active)) {
            $at_all_bananas = get_all_bananas();
            $at_old_bananas = get_old_bananas();
            $at_cart_bananas = $at_all_bananas - $at_old_bananas;
            $at_banane_neu = get_banana_neu();

            $at_banana_discount = get_banana_discount($at_all_bananas, true); // in currency
            $at_banana_discount_value = get_banana_discount($at_all_bananas, false); // als value 

        }

        //if ( (to_bool($dvd_bonuscard_is_active) and to_bool($dvd_bonuscard_display_box) and $at_banana_discount_value > 0)  ) {  
        if ((to_bool($dvd_bonuscard_is_active) and $at_banana_discount_value > 0)) {

            $bc_discount = '';
            $bc_discount .= get_dv('bonuscard_header_text') . ': <span style="color:#a22;font-weight:bold">- <span id="at_banana_discount">' . str_replace_decimal_point($at_banana_discount) . '</span></span>';

            $info_box_contents [] = array('align' => ' right ',
                'text' => '<div id="bcard_discount" class="scart_wl_hint" style="text-align:right;padding: 0px 3px 2px 0px;font-size:0.9em;color:#33c;">' . $bc_discount . '</div>');

            $this_sum = $cart->show_total();
            if ($easy_discount->count() > 0) {
                //echo  easy_discount_display_2();
                //echo '<br>'.SUB_TITLE_TOTAL.': &nbsp; <b>'. 
                //$currencies->format(($cart->show_total() - $easy_discount->total()).'</b>');

                if (curr_promo_code_is_for_cats() or curr_promo_code_is_for_manufs() or entered_promo_code_is_individual_gutschein($_SESSION['couponcode']['code'])) {
                    //ec(__line__.': '.trim($_SESSION['couponcode']['code']) );
                    if (entered_promo_code_is_individual_gutschein($_SESSION['couponcode']['code'])) {
                        //ec(__line__.': '.trim($_SESSION['couponcode']['code']) );		
                        $easy_discount_total = this_value_individual_gutschein($_SESSION['couponcode']['code']);
                        $this_sum = $cart->show_total() - $easy_discount_total;
                    } else {
                        global $coup_akt_type, $coup_akt_value;
                        $products = $cart->get_products();
                        $discount_amount = 0;
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
                                $easy_discount_total = $discount_amount;
                                $this_sum = $cart->show_total() - $easy_discount_total;
                                //ec(__line__.': '. $easy_discount_total );						
                            }
                        }
                    }
                    //$easy_discounts = $easy_discount->get_all();
                    //$n = sizeof($easy_discounts);
                    //for ($i=0;$i < $n; $i++) {
                    //  $discount .= ''.$easy_discounts[$i]['description'].': <span style="color:#a22;font-weight:bold;white-space:nowrap">- ' . $currencies->format($discount_amount).'</span>';
                    //}			
                    //$couponcode['code']		
                } else {
                    $easy_discount_total = $easy_discount->total();

                    $this_sum = $cart->show_total() - $easy_discount_total;
                    //ec(__line__.'  '.$cart->show_total());	
                    //ec(__line__.'  '.$easy_discount->total());	
                    //ec(__line__.'  '.$this_sum);		
                }

            }

            $this_sum = $this_sum - $at_banana_discount_value;
            //ec(__line__.'  '.$this_sum);	
            $info_box_contents [] = array('align' => ' right ',
                'text' => '<div id="" class="round6_bottom scart_wl_hint" style="text-align:right;padding: 0px 3px 6px 0px;font-size:0.9em;">' . get_dv('shopping_cart_box_sum') . ' <b>' . $currencies->format($this_sum) . '</b></div>');


        }


        /*
	if (get_dv_bool('show_shipping_free_txt')){
	
		$porto_freigrenze = get_porto_freigrenze($_SESSION['customer_id']);
		$current_order_value = $cart->show_total();
		
		if ($current_order_value<$porto_freigrenze ){
			$porto_betrag_string = '<span style="">'.porto_betrag_string_box($_SESSION['customer_id']).'</span>';
			if($porto_freigrenze<>999999) $porto_freigrenze_string = '<br><br class="lh4"><span style="">'.porto_freigrenze_string($_SESSION['customer_id']).'</span>'; 
		}else{
			if($porto_freigrenze<>999999) $porto_betrag_string =  '<span style="font-weight:normal;color:#060;font-size:0.9em">'.db_tr($definition='GENERAL_DELIVERY_FREE_OF_CHARGE',$page='general',$from_lang_code='de',$content='Die Lieferung erfolgt versandkostenfrei!').' </span>';
			$porto_freigrenze_string = '';
		}
	}else{
			$porto_betrag_string =  '';
			$porto_freigrenze_string = '';
	
	}
	
	
		$info_box_contents[] = array('align' => 'right',
									 'text' => '<div class="round6_bottom scart_wl_hint" style="text-align:right;padding: 0px 6px 4px 1px;font-size:0.9em;margin-bottom:6px;">'.$porto_betrag_string.$porto_freigrenze_string.' </div>'); 								*/


////////////////
        $min_order_value = min_order_amount();
        if ($min_order_value > 0) {
            if (($cart->show_total() - $easy_discount->total()) < $min_order_value) {
                $min_order_text = '<div style="color:#a66;font-size:0.9em;margin: 1px 0 9px 0">' . ll('Mindest-Bestellwert:') . ' ' . $currencies->format($min_order_value) . '</div>';

                if (!tep_session_is_registered('customer_id') and get_dv_bool('min_order_plz_is_installed') and get_dv_bool('min_wert_plz_is_active')) {
                    $min_order_text .= '<a class="button30__" style="font-size:0.9em" href="javascript:show_mind_best_werte()">' . ll('Der Mindesbestellwert ist abh&auml;ngig von Ihrer PLZ') . ' </a><br><br class="lh6">';
                }

            } else {
                $min_order_text = '';
            }
        } else {
            $min_order_text = '';
        }
/////////////////////


        $info_box_contents[] = array('align' => 'right',
            'text' => $min_order_text);


        if (substr(basename($_SERVER['PHP_SELF']), 0, 8) != '_checkout') {
            //$info_box_contents[] = array('text' => tep_draw_separator());


            //$hint='shopping_cart_goto_shoppingcart';
            //$h = get_hint_by_t_key($hint,$use_outer_div=false,$show_header=false,$use_comment_div=false,$parse_links=true);

            /*
		$info_box_contents [] = array('align' => ' left ',
			 'text' => '<div align="left" style="margin:5px 0 0 0"><a href="'.tep_href_link(FILENAME_SHOPPING_CART).'" 
			 class="button31" style="width:130px !important;display:inline-block;text-align:center" >'.ll('Bestellung &auml;ndern &plusmn;').
			 '</a>'.tooltip($h,$img='13',$style='display:inline',$class=$tooltip_class,'',false).'</div>  
			');
*/
            $info_box_contents [] = array('align' => ' left ',
                'text' => '<br class="lh6"><div align="left" style="margin:5px 0 0 5px;display:inline;font-size:0.9em">
			 <a title="' . get_dv('shopping_cart_box_button_change_order_mo') . '" href="' . tep_href_link(FILENAME_SHOPPING_CART) . '" 
			 class="button99" style="display:inline">' . get_dv('shopping_cart_box_button_change_order') . '' .
                    '</a></div>');


            //$hint='shopping_cart_goto_checkout';
            //$h = get_hint_by_t_key($hint,$use_outer_div=false,$show_header=false,$use_comment_div=false,$parse_links=true);

// Bei Pizza Shop ohne Selbstabholung direkt zu checkout_payment.php gehen
            if (get_dv_bool('jump_direct_to_payment_on_checkout')) {
                if (substr(basename($_SERVER['PHP_SELF']), 0, 8) != 'checkout') {

                    /*
		$info_box_contents [] = array('align' => ' center ',
			 'text' => '<div align="center" style="margin:0"><a href="'.tep_href_link(FILENAME_CHECKOUT_SHIPPING).'" 
			 class="button31" style="width:140px !important;display:inline-block;text-align:center" >'.ll('Zur Kasse &raquo;').
			 '</a>'.tooltip($h,$img='13',$style='display:inline',$class=$tooltip_class,'',false).' 
			');
*/
                    if (($cart->show_total() - $easy_discount->total()) < $min_order_value) {
                        $info_box_contents [] = array('align' => ' left ',
                            'text' => ' &nbsp; <div align="left" style="margin:0;display:inline;font-size:0.9em">
			 <a href="javascript:alert_swal(\'Der Mindestbestellwert ist ' . $currencies->format($min_order_value) . '.\')" 
			 class="dimmed04" style="display:inline" >' . get_dv('shopping_cart_box_button_zur_kasse') .
                                '</a></div>');
                    } else {
                        $info_box_contents [] = array('align' => ' left ',
                            'text' => ' &nbsp; <div align="left" style="margin:0;display:inline;font-size:0.9em">
			 <a title="' . get_dv('shopping_cart_box_button_zur_kasse_mo') . '" href="' . tep_href_link(FILENAME_CHECKOUT_SHIPPING) . '" 
			 class="button99" style="display:inline" >' . get_dv('shopping_cart_box_button_zur_kasse') .
                                '</a></div>');
                    }

                }
            } else {
                if (substr(basename($_SERVER['PHP_SELF']), 0, 8) != 'checkout') {

                    if (($cart->show_total() - $easy_discount->total()) < $min_order_value) {

                        $info_box_contents [] = array('align' => ' left ',
                            'text' => ' &nbsp; <div class="showcase sweet" align="left" style="margin:0;display:inline;font-size:0.9em">
			 <a class="dimmed04"  href="javascript:alert_swal(\'Der Mindestbestellwert ist ' . $currencies->format($min_order_value) . '\')" 
			 style="display:inline;" > 
			 ' . get_dv('shopping_cart_box_button_zur_kasse') . '' .
                                '</a>' . '</div> 
			');

                    } else {
                        $info_box_contents [] = array('align' => ' left ',
                            'text' => ' &nbsp; <div align="left" style="margin:0;display:inline;font-size:0.9em">
			 <a title="' . get_dv('shopping_cart_box_button_zur_kasse_mo') . '" href="' . tep_href_link(FILENAME_CHECKOUT_SHIPPING) . '" 
			 class="button99" style="display:inline;" > 
			 ' . get_dv('shopping_cart_box_button_zur_kasse') . '' .
                                '</a>' . '</div> 
			');


                    }

                }
            }

//$valid_code = valid_coupon_code($_SESSION['customer_id'],'code');
//if (  $valid_code<>'' and  !eregiS($valid_code, easy_discount_display() )  ) {
            /*
if ( (substr(basename($_SERVER['PHP_SELF']), 0, 8) != 'checkout' and $app_easy_coupons and tep_session_is_registered('customer_id') )  ) {

	$hint='shopping_cart_insert_coupon';
	$h = get_hint_by_t_key($hint,$use_outer_div=false,$show_header=false,$use_comment_div=false,$parse_links=true);

$info_box_contents [] = array('align' => ' left ',
'text' => tooltip($h,$img='13',$style='margin-left:5px;display:inline;',$class=$tooltip_class,'',false).'
<div align="left" style="display:inline">
<a class="button31 dimmed04" style="width:130px ;display:inline-block;text-align:center" title="'.get_dv('shopping_cart_box_button_rabatt_coupon_mo').'" href="coupon_box.php?'.$SID.'" onclick="Modalbox.show(this.href, {title: this.title, width: 760}); return false;">
'.get_dv('shopping_cart_box_button_rabatt_coupon').'
</a>'.'</div>');

}
*/

            /*
if (tep_session_is_registered('customer_id') and !get_dv_bool('hide_general_my_account_acc') ){
	$hint='shopping_cart_goto_myaccount';
	$h = get_hint_by_t_key($hint,$use_outer_div=false,$show_header=false,$use_comment_div=false,$parse_links=true);

	$info_box_contents [] = array('align' => ' left ',
	'text' => tooltip($h,$img='13',$style='margin-left:5px;display:inline;',$class=$tooltip_class,'',false).'
	<div align="left" style="display:inline"><a style="width:130px ;display:inline-block;text-align:center " title="'.get_dv('shopping_cart_box_button_mein_konto').'" '.lw_class('button31 dimmed04','1050','600') .'
	href="account1.php">'.get_dv('shopping_cart_box_button_mein_konto').'</a>'.'</div>');
	}else{
	$info_box_contents [] = array('align' => ' center ',
	'text' => '');

}


if (tep_session_is_registered('customer_id')){
	$hint='shopping_cart_logout';
	$h = get_hint_by_t_key($hint,$use_outer_div=false,$show_header=false,$use_comment_div=false,$parse_links=true);

	$info_box_contents [] = array('align' => ' left ',
	'text' => tooltip($h,$img='13',$style='margin-left:5px;display:inline;',$class=$tooltip_class,'',false).'
	<div align="left" style="display:inline"><a  class="button31 dimmed04" style="width:130px ;display:inline-block;text-align:center" title="'.get_dv('shopping_cart_box_button_abmelden_mo').'" 
	href="javascript:logoff()" >'.get_dv('shopping_cart_box_button_abmelden').'</a>'.'</div>');
	}else{
	$info_box_contents [] = array('align' => ' center ',
	'text' => '');

}
*/


            if (get_dv_bool('shopping_cart_box_img_show_img ')) {

                $img_src = get_dv('shopping_cart_box_img');
                $image_size = @getimagesize($img_src);

                $info_box_contents [] = array('align' => ' center ',
                    'text' => '

<hr style="margin:2px">
<div style="font-size:0.9em;margin:1px 0 1px 0;line-height:130%">' . get_dv_l('cart_box_header_long_txt1') . '</div>
<div align="center"><img src="' . $img_src . '" ' . $image_size[3] . '>' . '</div>
');

            } else {

                $info_box_contents [] = array('align' => ' center ',
                    'text' => '<hr style="margin:2px"><div style="font-size:0.9em;margin:1px 0 1px 0;line-height:130%">' . get_dv_l('cart_box_header_long_txt1') . '</div>');
            }


///////////////
        }

    }
    $r .= make_box2($info_box_contents, $class_master);
    $r .= '</div>';

    $r = preg_replace('/\s\s+/', ' ', $r);
    $r = str_replace("\n", "", $r);
    return $r;
}

// ende function get_shopping_cart() {


function tep_get_address_format_id2($country_id)
{
    $address_format_query = tep_db_query("select address_format_id as format_id from " . TABLE_COUNTRIES . " where countries_id = '" . (int)$country_id . "'");
    if (tep_db_num_rows($address_format_query)) {
        $address_format = tep_db_fetch_array($address_format_query);
        return $address_format['format_id'];
    } else {
        return '1';
    }
}

function tep_address_label3($customers_id, $address_id = 1, $html = false, $boln = '', $eoln = "\n")
{
    $address_query = tep_db_query("select entry_firstname as firstname, entry_lastname as lastname, entry_company as company, entry_street_address as street_address, entry_suburb as suburb, entry_city as city, entry_postcode as postcode, entry_state as state, entry_zone_id as zone_id, entry_country_id as country_id from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . (int)$customers_id . "' and address_book_id = '" . (int)$address_id . "'");
    $address = tep_db_fetch_array($address_query);
    $format_id = tep_get_address_format_id2($address['country_id']);
    return tep_address_format($format_id, $address, $html, $boln, $eoln);
}

function date_purchased_from_orders_id($orders_id, $long = false, $wochentag = false)
{

    $sql = "select date_purchased from orders where orders_id = " . $orders_id;
    $r = lookup($sql, 'date_purchased');

    if ($long) {
        $r = date_from_sql($r, 'd. M Y - H:i');
    } else {
        $r = date_from_sql($r, 'd.m.Y - H:i');
    }

    if ($wochentag) {

        $tag = wochentag($sql);
        return $tag . ' ' . $r;
    } else {
        return $r;
    }
}


function curr_left_nav_menu_id($v1_tabs_folder)
{


    switch ($v1_tabs_folder) {
        /*
case 'Vertical Menu 12':
return '#menu12_v';
break;
*/
        case 'E-lusion 1':
            return '#menu';
            break;

        case 'E-lusion 2':
            return '#menu2';
            break;

        case 'E-lusion 3':
            return '#menu3';
            break;

        case 'E-lusion 4':
            return '#menu4';
            break;

        case 'E-lusion 5':
            return '#menu5';
            break;

        case 'E-lusion 6':
            return '#menu6';
            break;

        case 'E-lusion 7':
            return '#menu7';
            break;

        case 'E-lusion 8':
            return '#menu8';
            break;

        case 'E-lusion 9':
            return '#menu9';
            break;

        case 'Green and Blue':
            return '#navlist_green_and_blue';
            break;

        case 'Taming List':
            return '#button';
            break;

        case 'Vertical Buttons':
            return '#navcontainer_vertical';
            break;

        case 'Vertical Menu 1':
            return '#menu1_v';
            break;

        case 'Vertical Menu 2':
            return '#menu2_v';
            break;

        case 'Vertical Menu 3':
            return '#menu3_v';
            break;

        case 'Vertical Menu 4':
            return '#menu4_v';
            break;

        case 'Vertical Menu 5':
            return '#menu5_v';
            break;

        case 'Vertical Menu 6':
            return '#menu6_v';
            break;

        case 'Vertical Menu 7':
            return '#menu7_v';
            break;

        case 'Vertical Menu 8':
            return '#menu8_v';
            break;

        case 'Vertical Menu 9':
            return '#menu9_v';
            break;

        case 'Vertical Menu 10':
            return '#menu10_v';
            break;

        case 'Vertical Menu 11':
            return '#menu11_v';
            break;

        case 'Vertical Menu 12':
            return '#menu12_v';
            break;

        case 'Vertical Menu 13':
            return '#menu13_v';
            break;

        case 'Vertical Menu 14':
            return '#menu14_v';
            break;


        default:
            return 'nav_menu_id???';
    }

}


function to_bool($val)
{
    if ($val == 1 or $val === true) {
        return true;
    } else {
        return false;
    }
}

function to_bool2($val)
{
    if ($val == 1 or $val == 2) {
        return true;
    } else {
        return false;
    }
}


function to_gradient_img_pos($key)
{
//menu_all_bg_props_color_img_pos
    $img_pos = get_dv($key);

    switch ($img_pos) {
        case '1':
            return 'top_dwn';
            break;
        case '2':
            return 'bott_up';
            break;
        case '3':
            return 'left_right';
            break;
        case '4':
            return 'right_left';
            break;
        default:
            return '';
    }
}

function to_gradient_img_size($key)
{
//menu_all_bg_props_color_img_size
    return get_dv($key);
}

function to_gradient_img_url($im = 'eee1d1_FFFFFF.png', $master_key = 'menu_all_bg_props_color')
{
// $img
// $master_eky
    $to_gradient_img_pos = to_gradient_img_pos($master_key . '_img_pos');
    $to_gradient_img_size = to_gradient_img_size($master_key . '_img_size');

    $url = DIR_WS_FULL . 'css_common/bgs/' . $to_gradient_img_pos . '/' . $to_gradient_img_size . '/' . $im;
    $fs_url = DIR_FS_CATALOG . 'css_common/bgs/' . $to_gradient_img_pos . '/' . $to_gradient_img_size . '/' . $im;

//pr�fen ob exist sonst kopieren von mh_DEV
    if (file_exists($fs_url)) {
        $ex = 'OK existiert ';
    } else {
//$ex = 'existiert NICHT ';
//$get_img = $_SERVER["DOCUMENT_ROOT"].'/sp/mh_DEV/catalog/css_common/bgs/'.$to_gradient_img_pos.'/'.$to_gradient_img_size.'/'.$im;
//if (file_exists($get_img)) copy($get_img,$fs_url);
    }

    return $url;
}

function new_gradient($t_key, $which = 1)
{
    $txt = get_dv_long($t_key);
    if (stristr($txt, '_x_y_x_')) {
        $teile = explode("_x_y_x_", $txt, 2);
        $short = $teile[0];
        $long = $teile[1];
    } else {
        $long = $txt;
    }

    if (is_dev()) {
        //new_gradient_to_png($t_key);		
    }
    if ($which == 1) {
        return $short;
    } else {

        $del1 = TextBetween('background: url(', ');', $long);
        $r = str_replace($del1, '', $long);
        $r = str_replace('background: url();', '', $r);
        return $r;
        //return $long; 
    }

}


function get_bg_or_gradient($t_key, $plain_key, $use_img_key)
{
    //funkt nur mit Top Nav ?
    $use_img = get_dv_bool($use_img_key);
    if ($use_img) {
        return new_gradient($t_key, $which = 2);
    } else {
        $plain_col = get_dv($plain_key);
        return 'background: ' . $plain_col . ';';
    }


}


/*
function img_to_gradient_css($im, $vice_versa=false, $horizontal=false, $force_img = false, $master_key='',$size='30',$verlauf='1' ){
global $browser;
$im_ori=$im;
$im = str_replace('.png','',$im);

	switch ($verlauf) {
		 case '1':
				$folder="top_dwn";  
				$moz_verlauf = 'top';
				break;
		 case '2':
				$folder="bott_up";
				$moz_verlauf = 'bottom';
				//$vice_versa = true;
			  break;
		 case '3':
				$folder="left_right";
				$moz_verlauf = 'left';
			  break;
		 case '4':
				$folder="right_left";
				$moz_verlauf = 'right';
				//$vice_versa = true;
			  break;

		default:
			$folder="bott_up";
			
	}



if ($master_key<>''){
	$url=to_gradient_img_url($im_ori,$master_key);
}else{
	$url=DIR_WS_FULL.'css_common/bgs/'.$folder.'/'.$size.'/'.$im_ori;
		$fs_url = DIR_FS_CATALOG.'css_common/bgs/'.$folder.'/'.$size.'/'.$im_ori;


}



$im_arr = explode("_", $im,2);
if($vice_versa){
$e_c = $im_arr[0];
$a_c = $im_arr[1];

}else{
$a_c = $im_arr[0];
$e_c = $im_arr[1];
}

if ( ($browser=='msie' or $browser=='ie' or $browser=='op' or $force_img) and 1==1){
	if (!$horizontal){
		$css .='background: #'.$e_c.' url("'.$url.'") repeat-x top;';
	}else{
		$css .='background: #'.$e_c.' url("'.$url.'") repeat-y left;';
	}
}else{

	if ($horizontal){
		$css = '
		background-color: #'.$e_c.';
		background: -moz-linear-gradient(
			45deg,
			#'.$a_c.',
			#'.$e_c.'
		);
		background: -webkit-gradient(
			linear,
			left top, right bottom,
			from(#'.$a_c.'),
			to(#'.$e_c.')
		);

		
		';
		
	
	
	}else{
		$css = '
		background-color: #'.$e_c.';
		background: -moz-linear-gradient(
			'.$moz_verlauf.',
			#'.$a_c.',
			#'.$e_c.'
		);
		background: -webkit-gradient(
			linear,
			left top, left bottom,
			from(#'.$a_c.'),
			to(#'.$e_c.')
		);
		
		
		
		';
	}
}

return $css;

//-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#'.$a_c.', endColorstr=#'.$e_c.')";
//-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#'.$a_c.', endColorstr=#'.$e_c.', GradientType=1)";
}
*/


function is_ie()
{
    global $browser;
    if ($browser == 'ie' or $browser == 'msie') {
        return true;
    } else {
        return false;
    }

}

function fs_catalog()
{
    return DIR_FS_CATALOG;
}

function fs_admin()
{
    return DIR_FS_ADMIN;
}

function fs_root()
{
    return $_SERVER["DOCUMENT_ROOT"] . '/';
}

function returnImageFile($fileName, $imageType = '')
{
    $imageType = get_ext($fileName);

    $expires = 10800; // 3 Std.
    header("Expires: " . gmdate("D, d M Y H:i:s", strtotime("+$expires seconds")) . " GMT");
    header("Cache-Control: public, max-age=$expires, pre-check=$expires");
    header("Pragma: cache", true);
    if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])) {
        // if the browser has a cached version of this image, send 304
        header("Last-Modified: " . gmdate('D, d M Y H:i:s', filemtime($fileName)) . ' GMT');
        header("HTTP/1.1 304 Not Modified");
        //die;
    } else if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && (strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) == filemtime($fileName))) {
// option 2, if you have a file to base your mod date off:
// send the last mod time of the file back
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($fileName)) . ' GMT', true, 304);
        header("HTTP/1.1 304 Not Modified");
        //die;
    } else {
        header("Last-Modified: " . gmdate('D, d M Y H:i:s', filemtime($fileName)) . ' GMT');
    }

    switch ($imageType) {
        case '1':
        case 'gif':
            header("Content-type: image/gif");
            ob_start();
            readfile($fileName);
            $ImageData = ob_get_contents();
            $ImageDataLength = ob_get_length();
            ob_end_clean();
            header("Content-Length: " . $ImageDataLength);
            //echo $ImageData;
            return $ImageData;
            break;
        case '2':
        case 'jpg':
        case 'jpeg':
            header("Content-type: image/jpeg");
            ob_start();
            readfile($fileName);
            $ImageData = ob_get_contents();
            $ImageDataLength = ob_get_length();
            ob_end_clean();
            header("Content-Length: " . $ImageDataLength);
            //echo $ImageData;
            return $ImageData;
            break;
        case '3':
        case 'png':
            header("Content-type: image/png");
            ob_start();
            readfile($fileName);
            $ImageData = ob_get_contents();
            $ImageDataLength = ob_get_length();
            ob_end_clean();
            header("Content-Length: " . $ImageDataLength);
            //echo $ImageData;
            return $ImageData;
            break;
    }

//die;
}

function to_euro($chf_val)
{
    $_euro_kurs = get_EUR_currency_rate();
    $val = $chf_val * $_euro_kurs;
    $val = number_format(round($val, 1), 2);
    return $val;

}

function merge_pdfs_in_products()
{

    $sql = "update products set products_pdf = '' ";
    q($sql);

    $sql = "select * from products";
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $id = $row["products_id"];
        $pdf_p = $row["pdf_p"];
        $pdf_m = $row["pdf_m"];
        $pdf_c = $row["pdf_c"];
        $pdf_c = $row["pdf_mc"];

        $all = $pdf_p . $pdf_m . $pdf_c . $pdf_mc;

        if (trim($all) <> '') {
            //merge this
            $full = '';

            if ($pdf_p <> '') $full .= $pdf_p . '_';
            if ($pdf_m <> '') $full .= $pdf_m . '_';
            if ($pdf_c <> '') $full .= $pdf_c . '_';
            if ($pdf_mc <> '') $full .= $pdf_mc . '_';

            //$full=$pdf_p.'_'.$pdf_m.'_'.$pdf_c;
            $full = str_replace('__', '_', $full);
            if (right($full, 1) == '_') $full = substr_replace($full, "", -1);

            $full = unify_pdfs($full);


            //update
            $sql = "update products set products_pdf = '" . $full . "'  where products_id = " . $id;
            q($sql);
        }


    }
    mysql_free_result($sql_result);
}


function unify_pdfs($str)
{

    $str_arr = explode("_", $str);

    $str_arr = array_unique($str_arr);
//$str_arr1 = rectify_keys($str_arr);
    $str_arr1 = rectify_keys($str_arr);

    asort($str_arr1);
    foreach ($str_arr1 as $item) {
        //$z++;
        //if ($z==1 or $prev_item<>$item) $curr_pdfs_arr_str .= $item.'_';
        $rstr .= $item . '_';
        //$prev_item =  $item;
    }

    if (right($rstr, 1) == '_') $rstr = substr_replace($rstr, "", -1);
    return $rstr;
}

function rectify_keys($array)
{
    foreach ($array as $arr) {
        $new_arr[] = $arr;
    }
    return $new_arr;
}

function remove_element($arr, $val)
{
    foreach ($arr as $key => $value) {
        if ($arr[$key] == $val) {
            unset($arr[$key]);
        }
    }
    return $arr = array_values($arr);
}

function bool_str_to_bool($str)
{

    if ($str == 'true') {
        return true;
    } else {
        return false;
    }

}


function remove_item_by_value($array, $val = '', $preserve_keys = true)
{
    if (empty($array) || !is_array($array)) return false;
    if (!in_array($val, $array)) return $array;

    foreach ($array as $key => $value) {
        if ($value == $val) unset($array[$key]);
    }

    return ($preserve_keys === true) ? $array : array_values($array);
}


function pdf_title_from_id($id)
{
    $sql = "select pdf_title from pdf_manager where pdf_id = " . $id;
    return lookup($sql, 'pdf_title');
}

function pdf_description_from_id($id)
{
    $sql = "select pdf_description from pdf_manager where pdf_id = " . $id;
    return lookup($sql, 'pdf_description');
}


function pdf_url_from_id($id)
{
    $sql = "select pdf_url from pdf_manager where pdf_id = " . $id;
    return lookup($sql, 'pdf_url');
}


function filename_from_path($filepath)
{
    preg_match('/[^?]*/', $filepath, $matches);
    $string = $matches[0];
    #split the string by the literal dot in the filename
    $pattern = preg_split('/\./', $string, -1, PREG_SPLIT_OFFSET_CAPTURE);
    #get the last dot position
    $lastdot = $pattern[count($pattern) - 1][1];
    #now extract the filename using the basename function
    $filename = basename(substr($string, 0, $lastdot - 1));
    #return the filename part
    return $filename;
}

function filename_from_path2($filepath)
{
    $f_arr = explode('/', $filepath);

    //return $filename;
    return end($f_arr);
}


function is_selected($val1, $val2)
{
    if ($val1 == $val2) {
        return ' selected="selected" ';
    } else {
        return '';
    }
}

function table_is_empty($table)
{
    $sql = "select * from " . $table;
    $res = q($sql);
    $anz = mysql_num_rows($res);
    if ($anz > 0) {
        return false;
    } else {
        return true;
    }
}

function vat_hint($with_div = true)
{
    global $prices_show_vat_with_price, $prices_show_vat_txt;

    if ($prices_show_vat_with_price and $prices_show_vat_txt <> '') {
        if ($with_div) {
            return '<div style="font-size:0.7em">' . $prices_show_vat_txt . '</div>';
        } else {
            return '<span style="font-size:0.7em">' . $prices_show_vat_txt . '</span>';
        }
    }

}

function zuletzt_vor($sql_date, $val = 'days')
{
    $last_time = strtotime($sql_date);
    $time_diff = time() - $last_time;

    if ($val == 'days') return round($time_diff / (60 * 60 * 24), 1);
    if ($val == 'hours') return round($time_diff / (60 * 60), 1);
    if ($val == 'minutes') return round($time_diff / (60), 0);

}


function activate_cache()
{
    if (!get_dv_bool('use_cache_is_active')) {
        $last_time = strtotime(get_dv('cache_deactivated_last'));
        //$last_time_germ = date('d.m. Y H:i ',$last_time);
        $time_diff = time() - $last_time;

        $time_diff_minutes = round($time_diff / (60), 1);
        if ($time_diff_minutes > 60) {
            set_dv('use_cache_is_active', '1');
        }
    }
}

function get_bool_any_table($id, $table, $field, $id_field)
{
    $sql = 'select ' . $field . ' from ' . $table . ' where ' . $id_field . ' = "' . $id . '"';
    $val = lookup($sql, $field);
    if ($val == 1) {
        return true;
    } else {
        return false;
    }
}


function get_long_html_editor_any_table($id, $table, $field, $id_field, $max_height = '500', $tinymce_options = 'tinymce_options', $enh_editor = true, $pagetitle = '', $allow_inline_edit = true, $div_id_german = '')
{
// InPlaceRichEditor

    $sql = 'select ' . $field . ' from ' . $table . ' where ' . $id_field . ' = "' . $id . '"';
    $this_txt = lookup($sql, $field);

    $t_key = $id . $field;

    $txt = '
<div style="padding:0;background:none">
<div style="padding:0px;border:1px #abc inset;max-height:' . $max_height . 'px;overflow:auto;background:#fff;">';

    if ($div_id_german == '') {
        $txt = '<div id="tobeedited' . $t_key . '" style="min-height:10px;padding:2px 3px;">' . $this_txt . '</div>';
    } else {
        $txt = '<div id="' . $div_id_german . '" style="min-height:10px;padding:2px 3px;background:#fff;border:1px #ccc inset">' . $this_txt . '</div>';
    }

    $txt .= '</div>';

    /*
$txt.='
<script>
new Ajax.InPlaceRichEditor($(\'tobeedited'. $t_key .'\'), \'ax_updater.php?id=389_'. $id .'_x_y_x_'.$table.'_x_y_x_'.$field.'_x_y_x_'.$id_field.'\', {okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten\',tinymceSave: true, tinymceToElementSize: true}, tinymce_options); 
</script>
';
*/
    /*
$txt.='
<script>
new Ajax.InPlaceRichEditor($(\'tobeedited'. $t_key .'\'), \'ax_updater.php?id=389_'. $id .'_x_y_x_'.$table.'_x_y_x_'.$field.'_x_y_x_'.$id_field.'\', {okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - Text unbegrenzt\',tinymceSave: true}, '.$tinymce_options.'); 
</script>
';
*/


    if ($allow_inline_edit) {
        $txt .= '
<script>
new Ajax.InPlaceEditor($(\'tobeedited' . $t_key . '\'), \'ax_updater.php?id=389_' . $id . '_x_y_x_' . $table . '_x_y_x_' . $field . '_x_y_x_' . $id_field . '\', {okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - Text unbegrenzt\',tinymceSave: true}, ' . $tinymce_options . '); 
</script>
';
    }

    if ($enh_editor) $txt .= get_enh_html_editor_any_table($id, $table, $field, $id_field, $pagetitle);

    $txt .= '</div>';

    return $txt;

}


function get_enh_html_editor_any_table($id, $table, $field, $id_field, $pagetitle, $max255 = false, $target_blank = false, $language_id = '')
{

    global $html_editor_icon;
    $href = 'popup_edit_text_long_all_tables.php?tab=' . $table . '&field=' . $field . '&id_fn=' . $id_field . '&id=' . $id . '&cuPageName=' . curPageName() . '&pagetitle=' . $pagetitle . '&language_id=' . $language_id;
//$sql='select '.$field.' from '.$table.' where '.$id_field.' = "'.$id.'"';
//$this_txt = lookup($sql,$field); 
    if ($max255) {
        $html_editor_icon = '';

        if ($target_blank) {
            $link .= '<a title="Text im erweiterten HTML-Editor bearbeiten" class="button3" style="max-width:110px;"   
		target="_blank"
		 href="' . $href . '">
		 ' . $html_editor_icon . ' HTML-Editor' . '</a>';
        } else {
            $link .= '<a title="Text im erweiterten HTML-Editor bearbeiten" class="lightwindow button3" style="max-width:110px;"   
		params="lightwindow_type=external,lightwindow_width=1300,lightwindow_height=" 
		 href="' . $href . '">
		 ' . $html_editor_icon . ' HTML-Editor' . '</a>';
        }

        $link .= '<span class="grey10" style="color:#c66;margin-left:12px">Maximal 255 Zeichen!</span>';


    } else {
        $link .= '<span class="grey10" style="color:#bbb;">Beliebig langer Text, zum editieren auf <i><b>HTML-Editor</b></i> klicken.</span>';

        if ($target_blank) {
            $link .= '<a title="Text im erweiterten HTML-Editor bearbeiten - neues Fenster" class="button3" style="max-width:110px;margin:6px 12px 9px 0;float:left;"   
		target="_blank" 
		 href="' . $href . '">
		 ' . $html_editor_icon . ' HTML-Editor' . '</a>';
        } else {
            $link .= '<a title="Text im erweiterten HTML-Editor bearbeiten" class="lightwindow button3" style="max-width:110px;margin:6px 12px 9px 0;float:left;"   
		params="lightwindow_type=external,lightwindow_width=1300,lightwindow_height=" 
		 href="' . $href . '">
		 ' . $html_editor_icon . ' HTML-Editor' . '</a>';


        }

    }


    return $link;
}


function date_picker_any_table($id, $table, $date_key, $id_field, $h)
{

    $sql = 'select ' . $date_key . ' from ' . $table . ' where ' . $id_field . ' = "' . $id . '"';
    $this_date = lookup($sql, $date_key);
    if ($this_date > 0) {
        $this_date = date('d. m. Y', strtotime($this_date));
    } else {
        $this_date = '';
    }


    $l = '

<div class="grey_inset" style="max-width:420px"><input type="text" name="date" id="' . $date_key . '" readonly="1" style="width:105px;font-size:1.2em;font-weight:bold;border:1px #ddd solid;color:#009;padding-left:4px" value="' . $this_date . '" /> 
<img src="../images/icons/calendar.png" id="' . $date_key . 'f_trigger_c" style="cursor: pointer; border: 1px solid red;margin:0 0 0 0" title="Kalender - Datum w&auml;hlen"  onmouseover="this.style.background=\'red\';" onmouseout="this.style.background=\'\'" />
<a class="button30" style="margin-left:6px" href="javascript:' . $date_key . 'save_date(\'' . $date_key . '\')">speichern</a><a class="button30" style="margin-left:6px" href="javascript:' . $date_key . 'clear_date(\'' . $date_key . '\')">clear</a><span style="margin-left:6px;font-size:0.7em;color:#494" id="conf_save_date_' . $date_key . '"></span>
' . tooltip($h, $img = '13', $style = 'margin-left:6px', $class = 'tip_lu', '400', true) . '
</div>

<script type="text/javascript">
    Calendar.setup({
        inputField     :    "' . $date_key . '",     
		  ifFormat       :    "%d. %m. %Y  ",      
        button         :    "' . $date_key . 'f_trigger_c",  
        align          :    "Tl",           
        singleClick    :    true
    });

function ' . $date_key . 'save_date(key){
newdate= $(key).value;

id = \'' . $id . '\';
table = \'' . $table . '\';
field = \'' . $date_key . '\';
id_field = \'' . $id_field . '\'; 

do_qu(\'ax_updater.php\',\'id=387_\' + newdate +\'_x_y_x_\'+id+\'_x_y_x_\'+table+\'_x_y_x_\'+field+\'_x_y_x_\'+id_field ,\'conf_save_date_' . $date_key . '\');
}
function ' . $date_key . 'clear_date(key){
$(key).value="";
}


</script>
';


    return $l;
}

function is_odd($number)
{
    return $number & 1; // 0 = even, 1 = odd
}


function is_dev_site()
{

    if (eregiS('sp/mh_DEV', DIR_FS_DOCUMENT_ROOT) or $_SERVER['SERVER_NAME'] == 'erotik-mega-discount.ch') {
        return true;
    } else {
        return false;
    }

}


function yellow($txt, $search, $force_yellow = false)
{


    if (curPageName() == 'advanced_search_result.php' or $force_yellow) {

//$t = str_ireplace($search,'<span style="background:#ee8;color:#600;opacity:0.6">'.properCase($search).'</span>',$txt);
//$t = str_ireplace($search,'<span style="background:#dd8;">'.properCase($search).'</span>',$txt);
//$t = str_ireplace($search,'<span style="background:#dd8;">'.properCase($search).'</span>',$txt);
//return $t;


//if( strstr($search,'�') and  !strstr($txt,'�')) {
        /*
if( stristr(htmlentities($search),'�') ) {
	
	$search = str_replace('�','&uuml;',$search);
	return 'u-Umlaut';
}else{
	return 'Test xxxxxxxxxxxxx '.$search.'<br>'.$txt.'<br>'.htmlentities($search).'<br>'.html_entity_decode($search);
}
*/
        return highlight($txt, $search);
//return highlightkeyword($txt, $search);
//return hl($txt, $search);
    }

    return $txt;

}

/*
function hl($inp, $words)
{
  $replace=array_flip(array_flip($words)); // remove duplicates
  $pattern=array();
  foreach ($replace as $k=>$fword) {
     $pattern[]='/\b(' . $fword . ')(?!>)\b/i';
     $replace[$k]='<b>$1</b>';
  }
  return preg_replace($pattern, $replace, $inp);
}
 
function highlightkeyword($str, $search) {
    $highlightcolor = "#daa732";
    $occurrences = substr_count(strtolower($str), strtolower($search));
    $newstring = $str;
    $match = array();
 
    for ($i=0;$i<$occurrences;$i++) {
        $match[$i] = stripos($str, $search, $i);
        $match[$i] = substr($str, $match[$i], strlen($search));
        $newstring = str_replace($match[$i], '[#]'.$match[$i].'[@]', strip_tags($newstring));
    }
 
    $newstring = str_replace('[#]', '<span style="color: '.$highlightcolor.';">', $newstring);
    $newstring = str_replace('[@]', '</span>', $newstring);
    return $newstring;
 
}
*/
function highlight($haystack, $needle)
{
    if (strlen($haystack) < 1 || strlen($needle) < 1) {
        return $haystack;
    }
    if ($haystack == $needle) {
        return '<font style="background-color:#dd8">' . $needle . '</font>';
    }

    $needle = str_replace(')', '', $needle);
    $needle = str_replace('(', '', $needle);

    preg_match_all("/$needle+/i", $haystack, $match);
    $exploded = preg_split("/$needle+/i", $haystack);
    //$exploded = explode($needle,$haystack);

    //$exploded = split($needle.i,$haystack);
    $replaced = "";
    foreach ($exploded as $e)
        foreach ($match as $m)
            if ($e != $exploded[count($exploded) - 1]) {
                $replaced .= $e . "<font style=\"background-color:#dd8\">" . $m[0] . "</font>";
            } else {
                $replaced .= $e;
            }
    if ($replaced <> '') {
        return $replaced;
    } else {
        return '<span style="background-color:#dd8">' . $haystack . '</span>';
    }
}


function get_config_assi_button($link, $txt = 'Konfigurations-Assistent', $title = '', $target = '', $style = '')
{
    global $wizard_icon;

    $x = '
<a title="Konfigurations-Assistent - ' . $title . '" class="button3" style="' . $style . '" ' . $target . ' href="' . conf_l($link) . '">' . $wizard_icon . ' ' . $txt . '</a>
';

    return $x;
}


function update_t_key_comment_temp($key)
{

    $x = get_dv($key);
    $sql = "update diverses set t_key_comment = '" . $x . "' where div_what =  '" . $key . "'";
    q($sql);

}

function porto_string($customers_id, $address_id = 1)
{

}


function porto_betrag_string($customers_id, $address_id = 1)
{
//if($customers_id=='') return '';	

    global $currencies;
    $porto_betrag = get_porto_betrag($customers_id, $address_id = 1);
    $t = db_tr($definition = 'PLUS_SHIPPING_COSTS', $page = 'general', $from_lang_code = 'de', $content = 'zzgl. Versandkosten');
    $x = $t . ': ' . $currencies->display_price($porto_betrag, 0) . '';
    return $x;
}

function porto_betrag_string_box($customers_id, $address_id = 1)
{
    global $currencies;
    $porto_betrag = get_porto_betrag($customers_id, $address_id = 1);
    $x = '' . db_tr($definition = 'GENERAL_PLUS_POSTAGE', $page = 'general', $from_lang_code = 'de', $content = 'zzgl. Porto') . ': ' . $currencies->display_price($porto_betrag, 0) . '';
    return $x;
}


function porto_freigrenze_string($customers_id, $address_id = 1)
{
    global $currencies;
    $t_nat = db_tr($definition = 'NO_SHIPPING_TEXT_NATIONAL', $page = 'general', $from_lang_code = 'de', $content = 'Wir liefern im Inland versandkostenfrei bei einem Bestellwert ab');
    $t_eu = db_tr($definition = 'NO_SHIPPING_TEXT_EU', $page = 'general', $from_lang_code = 'de', $content = 'Wir liefern innerhalb der EU versandkostenfrei bei einem Bestellwert ab');
    $t_world = db_tr($definition = 'NO_SHIPPING_TEXT_WORLD', $page = 'general', $from_lang_code = 'de', $content = 'Wir liefern weltweit versandkostenfrei bei einem Bestellwert ab');

    $get_liefer_land_country_id = get_liefer_land_country_id($customers_id);
    $country_name = indiv_porto_country_name($get_liefer_land_country_id);

    $t_individuell = db_tr($definition = 'NO_SHIPPING_TEXT_INDIVIDUAL', $page = 'general', $from_lang_code = 'de', $content = 'Wir liefern versandkostenfrei bei einem Bestellwert ab');

    $porto_freigrenze = get_porto_freigrenze($customers_id, $address_id = 1);
    if ($porto_freigrenze > 0 and $porto_freigrenze < 999999) {


        if (indiv_porto_active_t_country($get_liefer_land_country_id)) {
            $t_nat = $country_name . ': ' . $t_individuell;
        }

        if (get_liefer_area($customers_id) == 'national' or indiv_porto_active_t_country($get_liefer_land_country_id)) {
            //$x='Bei einem Bestellwert ab '.$currencies->display_price($porto_freigrenze,0).' liefern wir im Inland versandkostenfrei!';

            $x = $t_nat . ' ' . $currencies->display_price($porto_freigrenze, 0);
        } else {
            if (get_liefer_area($customers_id) == 'international') {
                //$x='Bei einem Bestellwert ab '.$currencies->display_price($porto_freigrenze,0).' liefern wir innerhalb der EU versandkostenfrei!';
                $x = $t_eu . ' ' . $currencies->display_price($porto_freigrenze, 0);
            } else {
                //$x='Bei einem Bestellwert ab '.$currencies->display_price($porto_freigrenze,0).' liefern wir weltweit versandkostenfrei!';
                $x = $t_world . ' ' . $currencies->display_price($porto_freigrenze, 0);
            }

        }
        return '<div style="margin:0 0 0 3px;font-style:italic;white-space:normal;opacity:1.0;font-weight:bold">' . $x . ' &nbsp;</div>';
    }
}

function get_porto_freigrenze($customers_id, $address_id = 1)
{
    if ($customers_id <> '') {
        $get_liefer_land_country_id = get_liefer_land_country_id($customers_id);
        if (!indiv_porto_active_t_country($get_liefer_land_country_id)) {
            if (get_liefer_area($customers_id) == 'national') {
                return MODULE_SHIPPING_FLAT_FREE_SHIPPING_OVER;
            } else {
                if (get_liefer_area($customers_id) == 'international') {
                    return MODULE_SHIPPING_FLAT3_FREE_SHIPPING_OVER; //Europa
                } else {
                    return MODULE_SHIPPING_FLAT4_FREE_SHIPPING_OVER; // ausser Europa
                }
            }
        } else {
            return indiv_porto_freigrenze($get_liefer_land_country_id);  // individuelle Portofreigrenze je Land
        }

    } else {
        return MODULE_SHIPPING_FLAT_FREE_SHIPPING_OVER;
    }
}

function get_porto_betrag($customers_id, $address_id = 1)
{
    if ($customers_id <> '') {
        $get_liefer_land_country_id = get_liefer_land_country_id($customers_id);
        if (!indiv_porto_active_t_country($get_liefer_land_country_id)) {
            if (get_liefer_area($customers_id) == 'national') {
                return MODULE_SHIPPING_FLAT_COST;
            } else {
                if (get_liefer_area($customers_id) == 'international') {
                    return MODULE_SHIPPING_FLAT3_COST; //Europa
                } else {
                    return MODULE_SHIPPING_FLAT4_COST; // ausser Europa
                }
            }
        } else {
            return indiv_porto($get_liefer_land_country_id);  // individuelles Porto je Land
        }

    } else {
        return MODULE_SHIPPING_FLAT_COST;
    }
}


function is_europe($countries_id)
{
    $sql = "select is_europe from countries where countries_id = '" . $countries_id . "' ";
    $res = lookup($sql, 'is_europe');
    if ($res == 1) {
        return true;
    } else {
        return false;
    }
}

function get_liefer_area($customers_id, $address_id = 1)
{
//national oder international oder international2

    //wenn Kunde angemeldet ist
    if (tep_session_is_registered('customer_id')) {
        $get_liefer_land_country_id = get_liefer_land_country_id($customers_id);
        if (STORE_COUNTRY == $get_liefer_land_country_id) {
            return 'national';
        } else {
            if (is_europe($get_liefer_land_country_id)) {
                return 'international';
            } else {
                return 'international2';
            }
        }
    } else {
        return 'national';
    }

}


function get_liefer_land_country_id($customers_id, $address_id = 1)
{
    if ($customers_id <> '') {
        $sql = "select customers_default_address_id from customers where customers_id = " . $customers_id;
        $customers_default_address_id = lookup($sql, 'customers_default_address_id');

        $sql = "select entry_country_id  from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . (int)$customers_id . "' and address_book_id = '" . $customers_default_address_id . "'";
        return lookup($sql, 'entry_country_id');
    } else {
        return STORE_COUNTRY;
    }
}

//tep_get_country_name($country_id)


function get_order_button_v1($products_id, $wishlist_link = '', $anzeige_komm, $mein_komm_link, $show_order_buttons = true, $large_button, $parent = false, $small_icon = false, $force_attributes = false, $force_large_button = false)
{
    global $use_product_attribute_is_active, $use_img_buttons, $show_shipping_free_txt, $tick_icon_16,
           $wishlist_add_button, $buy_now_button, $product_text_display_show_no_postage, $product_text_display_show_no_postage_txt, $get_order_button_v1, $wish_list_is_active;

    global $more_icon_v1, $buy_icon_v2, $more_icon_v2, $buy_icon_70_v2, $module_also_p, $buy_icon_v2_scale20, $more_icon_v2_scale20, $quant_input_on_product_info, $at_select_prod_list_selected;

    if ($small_icon) {
        $buy_icon_v2 = $buy_icon_v2_scale20;
        $more_icon_v2 = $more_icon_v2_scale20;
        //$large_button = false;	
    } else {
        //$large_button = true;	
    }

//ec(__line__.': '.$buy_icon_v2);
//ec(__line__.': '.$buy_icon_70_v2);
//ec(__line__.': '.$more_icon_v2);
//ec(__line__.': '.$more_icon_v2_scale20);


    $wishlist_link = '';
    if ($parent) $parent_txt = 'window.close(); parent.';

    $app_product_attribute_option_group = this_product_attribute_option_group(att_clean($products_id));

    if ($use_product_attribute_is_active and has_products_attribute((int)$products_id)) {

        if ((curPageName() == 'product_info.php' and $large_button) or $force_attributes) {
            if (to_bool($wish_list_is_active)) $wishlist_link = '<div class="_wl_link" style="text-align:right;padding:0 18px 9px 0;font-size:0.9em;">
					<a id="wishlist_add_b_' . $products_id . '" class="dimmed06 wl_link round6" style="border:1px #999 solid;" 
					title="' . db_tr($definition = 'WISHLIST_BUTTON_TITLE', $page = 'general', $from_lang_code = 'de', $content = 'Artikel zu meiner Wunschliste zuf&uuml;gen') . '" 
					href="javascript:add_to_wishlist(' . $products_id . ')">' . GENERAL_WISHLIST_BUTTON . '</a></div>';

            //$page = 'product_info.php';
            $page = curPageName();

            $lc_text .= '<div style="margin-top:6px;">';
            $lc_text .= '<form method="post" name="form_' . (int)$products_id . '" id="form_' . (int)$products_id . '" action="' . tep_href_link($page, tep_get_all_get_params(array('action', 'products_id')) .
                    'action=buy_now&products_id=' . $products_id) . '" >';

            $MODULE_SHIPPING_TABLE_TEXT_AMOUNT = db_tr($definition = 'MODULE_SHIPPING_TABLE_TEXT_AMOUNT', $page = 'general', $from_lang_code = 'de', $content = 'Menge');
            if ($quant_input_on_product_info)
                $lc_text .= '<div class="dimmed04" style="margin:4px 0px 6px 16px;display:block;float:left">
					 <div class="round6" style="padding:1px 4px 1px 6px;background:rgba(230, 230, 230, 0.4);border:1px #ddd solid;">
					 <span style="font-weight:bold;font-size:1.0em;text-shadow: 0.04em 0.05em 0.15em rgba(255, 255, 255, 0.9);">' . $MODULE_SHIPPING_TABLE_TEXT_AMOUNT . ':</span> 
					 <input id="buy_now_quant_' . (int)$products_id . '" name="buy_now_quant_' . (int)$products_id . '" type="text" value="1" 
					 style="width:30px;padding:1px 3px;font-size:1.2em;color:#009;text-align:center;margin-left:8px" />
					<img title="+1" onclick=change_quant(1,\'buy_now_quant_' . $products_id . '\') style="margin:4px 0 -4px 1px" src="images/icons/pr/plus_20.png" width="19" height="19" />
					<img title="-1" onclick=change_quant(-1,\'buy_now_quant_' . $products_id . '\') style="margin:4px 0 -4px 0" src="images/icons/pr/minus_20.png" width="19" height="19" />
					 
					 </div></div> ';

            //$lc_text .= display_products_attribute2($products_id,$app_product_attribute_option_group);
            /*
					$lc_text .= '<a class="dimmed_order_buttons" style="margin-left:190px;margin-top:-220px;margin-bottom:-40px;display:inline-block;position:relative;" 
					title="'.db_tr($definition='ORDER_BUTTON_TITLE',$page='general',$from_lang_code='de',$content='Artikel in den Warenkorb').'" 
					href="javascript:document.form_'.(int) $products_id.'.submit()"><span onclick="buy_now_pinfo('.$products_id.')" id="buy_now_b_'.$products_id.'">' . $buy_icon_70_v2 . '<span></a>';					 
					*/

            $options_id_arr = array();
            $sql = "select options_id from products_attributes where products_id = " . $products_id;
            $sql_result = q($sql);
            while ($row = mysql_fetch_array($sql_result)) {
                $options_id_arr[] = $row["options_id"];
                //$z++;
            }
            $options_id_arr = array_unique($options_id_arr);
            $options_id_arr = implode('-', $options_id_arr);
            //ec(__line__.' '.$options_id_arr);

            $lc_text .= '<a class="dimmed_order_buttons" style="margin-left:190px;margin-top:-220px;margin-bottom:-40px;display:inline-block;position:relative;" 
					title="' . db_tr($definition = 'ORDER_BUTTON_TITLE', $page = 'general', $from_lang_code = 'de', $content = 'Artikel in den Warenkorb') . '" 
					href="javascript:buy_now_pinfo(' . $products_id . ',\'' . $options_id_arr . '\')"><span id="buy_now_b_' . $products_id . '">' . $buy_icon_70_v2 . '<span></a>';

            //produkt attribute hier in my_cat_funct2.php  line 4470  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //ec(__line__.' '.$app_product_attribute_option_group);
            //function display_products_attribute2($products_id,$options_id,$display=true,$add_to_id='',$this_language_id='',$display_options_price=true){
            $lc_text .= display_products_attribute2($products_id, $app_product_attribute_option_group, $display = true, $add_to_id = '', $this_language_id = '');

            $lc_text .= '</form>';
            $lc_text .= '' . $wishlist_link;
            $lc_text .= '</div>';
            //ec(__line__.' xxxxxxxxxxx');
        } else { //if ( (curPageName()=='product_info.php' and $large_button) or $force_attributes){
            //$more_icon_v2_scale20  $more_icon_v2
            //ec(__line__.' xxxxxxxxxxx');
            $lc_text .= '<div id="buy_now_b_' . $products_id . '" style="margin:-32px -7px -17px 3px;display:inline;float:right">
					<a class="dimmed_order_buttons" style="z-index:1" title="' . OPEN_PROD_DETAILS . '..." 
					href="product_info.php?products_id=' . $products_id . '&' . $SID . '">' . $more_icon_v2_scale20 . '</a></div>' . $wishlist_link . '' . $anzeige_komm . '' . $mein_komm_link . '';

            if (to_bool($wish_list_is_active)) $lc_text .= '<div  
					style="font-weight:normal;font-size:0.9em;margin:1px 0 2px 0">
					<a id="wishlist_add_b_' . $products_id . '" class="dimmed06 wl_link" title="' . db_tr($definition = 'WISHLIST_BUTTON_TITLE', $page = 'general', $from_lang_code = 'de', $content = 'Artikel zu meiner Wunschliste zuf&uuml;gen') . '" 
					style="" href="javascript:add_to_wishlist(' . $products_id . ')">' . GENERAL_WISHLIST_BUTTON . '</a></div>';

        } //if ( (curPageName()=='product_info.php' and $large_button) or $force_attributes){


    } else { //if($use_product_attribute_is_active and has_products_attribute((int) $products_id) ){
        if (curPageName() == 'product_info.php' and $large_button) {
            //<img src="images/icons/minus.gif" width="9" height="9" /><img src="images/icons/plus.gif" width="9" height="9" />
            //<img src="images/icons/pr/quantity_down.gif" width="14" height="9" /><img src="images/icons/pr/quantity_up.gif" width="14" height="9" />
            if ($quant_input_on_product_info) $lc_text .= '<div class="dimmed04" style="margin:-1px 14px -12px 34px ;display:inline;float:left">
					<div class="round6" style="padding:1px 4px 1px 6px;background:rgba(230, 230, 230, 0.4);border:1px #ddd solid;">
					<span style="font-weight:bold;font-size:1.0em;text-shadow: 0.04em 0.05em 0.15em rgba(255, 255, 255, 0.9);">' . MODULE_SHIPPING_TABLE_TEXT_AMOUNT . ':</span> 
					<input id="buy_now_quant_' . $products_id . '" type="text" value="1" 
					style="width:30px;padding:1px 3px;font-size:1.1em;font-weight:bold;color:#009;text-align:center;margin-left:8px" />
					<img title="+1" onclick=change_quant(1,\'buy_now_quant_' . $products_id . '\') style="margin:4px 0 -4px 1px" src="images/icons/pr/plus_20.png" width="19" height="19" />
					<img title="-1" onclick=change_quant(-1,\'buy_now_quant_' . $products_id . '\') style="margin:4px 0 -4px 0" src="images/icons/pr/minus_20.png" width="19" height="19" />
					</div></div>
					<div class="clear" style="height:2px"></div> ';
            //$buy_icon_70_v2  $buy_icon_v2
            $lc_text .= '<div id="buy_now_b_' . $products_id . '" style="margin:-30px 9px 12px 5px ;display:inline;float:right">
					<a class="dimmed_order_buttons" title="' . db_tr($definition = 'ORDER_BUTTON_TITLE', $page = 'general', $from_lang_code = 'de', $content = 'Artikel in den Warenkorb') . '" 
					href="javascript:buy_now(' . $products_id . ')">' . $buy_icon_70_v2 . '</a></div>' . $wishlist_link . '' . $anzeige_komm . '' . $mein_komm_link . '';

            if (to_bool($wish_list_is_active)) $lc_text .= '<div class="_wl_link" style="text-align:right;margin:49px 0 0 0;font-size:0.9em"> 
					<a id="wishlist_add_b_' . $products_id . '" class="dimmed06 wl_link round6" style="border:1px #999 solid;" title="' . db_tr($definition = 'WISHLIST_BUTTON_TITLE', $page = 'general', $from_lang_code = 'de',
                    $content = 'Artikel zu meiner Wunschliste zuf&uuml;gen') . '" 
					href="javascript:add_to_wishlist(' . $products_id . ')">' . GENERAL_WISHLIST_BUTTON . '</a></div>';
        } else {

            if ($large_button) {
                //ec(__line__.': xxxxxxxxx'. $large_button);
                if ($force_large_button) $buy_icon_v2 = $buy_icon_70_v2;
                $page = curPageName();

                $lc_text .= '<form method="post" name="form_' . (int)$products_id . '" id="form_' . (int)$products_id . '" action="' . tep_href_link($page, tep_get_all_get_params(array('action', 'products_id')) .
                        'action=buy_now&products_id=' . $products_id) . '" >';

                if ($quant_input_on_product_info) $lc_text .= '<div class="dimmed04" style="margin:12px 60px -2px -3px ;display:inline;float:left;">
						<div class="round6" style="padding:1px 4px 1px 6px;background:rgba(230, 230, 230, 0.4);border:1px #ddd solid;">
						<span style="font-weight:bold;font-size:1.0em;text-shadow: 0.04em 0.05em 0.15em rgba(255, 255, 255, 0.9);">' . MODULE_SHIPPING_TABLE_TEXT_AMOUNT . ':</span> 
						<input id="buy_now_quant_' . $products_id . '" name="buy_now_quant_' . $products_id . '" type="text" value="1"  
						style="width:30px;padding:1px 3px;font-size:1.1em;font-weight:bold;color:#009;text-align:center;margin-left:8px" />
						<img title="+1" onclick=change_quant(1,\'buy_now_quant_' . $products_id . '\') style="margin:4px 0 -4px 1px" src="images/icons/pr/plus_20.png" width="19" height="19" />
						<img title="-1" onclick=change_quant(-1,\'buy_now_quant_' . $products_id . '\') style="margin:4px 0 -4px 0" src="images/icons/pr/minus_20.png" width="19" height="19" />
						</div></div>
						<div class="clear" style="height:2px"></div>';

                $lc_text .= '</form>';

            } //if($large_button) {

            $lc_text .= '<div id="buy_now_b_' . $products_id . '" style="margin:-45px -12px -17px 3px ;display:inline;float:right">
					<a class="dimmed_order_buttons" style="z-index:1" title="' . db_tr($definition = 'ORDER_BUTTON_TITLE', $page = 'general', $from_lang_code = 'de', $content = 'Artikel in den Warenkorb') . '" 
					href="javascript:' . $parent_txt . 'buy_now(' . $products_id . ')">' . $buy_icon_v2 . '</a></div>' . $wishlist_link . '' . $anzeige_komm . '' . $mein_komm_link . '';

            /*
					$lc_text .= '<div id="buy_now_b_'.$products_id.'" style="margin:-45px -12px -17px 3px ;display:inline;float:right">
					<a class="dimmed_order_buttons" style="z-index:1" title="'.db_tr($definition='ORDER_BUTTON_TITLE',$page='general',$from_lang_code='de',$content='Artikel in den Warenkorb').'" 
					href="javascript:'.$parent_txt.'buy_now_index3('.$products_id.')">' . $buy_icon_v2 . '</a></div>'.$wishlist_link.''.$anzeige_komm.''.$mein_komm_link.'';
					*/
            if ($at_select_prod_list_selected == 'multi') {
                $t_margin_str = 'font-size:0.9em;margin:1px 0 2px 0';
            } else {
                if (page_cat_has_subcats()) {
                    $t_margin_str = 'font-size:0.9em;margin:17px -5px 0 0';
                } else {
                    $t_margin_str = 'font-size:0.8em;margin:-18px 46px 0 0';
                }
            }
            //margin:1px 0 2px 0
            if (to_bool($wish_list_is_active)) $lc_text .= '<div style="font-weight:normal;' . $t_margin_str . '">
					<a id="wishlist_add_b_' . $products_id . '" class="dimmed06 wl_link" title="' . db_tr($definition = 'WISHLIST_BUTTON_TITLE', $page = 'general', $from_lang_code = 'de', $content = 'Artikel zu meiner Wunschliste zuf&uuml;gen') . '" 
					style="" href="javascript:add_to_wishlist(' . $products_id . ')">' . GENERAL_WISHLIST_BUTTON . '</a></div>';
        }
    } //if($use_product_attribute_is_active and has_products_attribute((int) $products_id) ){

    return $lc_text;
}

function get_order_button_new($products_id, $width_details = '95')
{
    global $hide_price_label_and_order_button, $wish_list_is_active, $use_img_buttons, $use_product_attribute_is_active, $use_img_cart_icons;
    $width_details2 = $width_details - 7; // wenn wishlist is active

    //$width_details = $width_details + 53;
//if($use_product_attribute_is_active and has_products_attribute((int) $products_id) ){

    if ($wish_list_is_active) {
        $r .= '<div class="order_b _dimmed06" style="white-space:nowrap;display:block;height:25px;align:left;margin:0 -9px 0 0px;width:106%;background:none;padding:0">';


        if (already_in_wishlist($products_id, $_SESSION['customer_id'])) {
            $r .= '<a title="' . WISHLIST_IS_ALREADY_IN . '" href="javascript:add_to_wishlist(' . $products_id . ')"><div class="wl_wrp  round6_down_left" style="padding-left:8px;padding-right:8px;max-height:21px;padding-bottom:4px">
		<i class="fa fa-thumb-tack " style="color:#80DD80;text-shadow: 1px 1px 1px rgba(0,100,0,0.9);"></i></div></a>';
        } else {
            $r .= '<a title="' . GENERAL_WISHLIST_BUTTON . '" href="javascript:add_to_wishlist(' . $products_id . ')"><div class="wl_wrp  round6_down_left" style="padding-left:8px;padding-right:8px;max-height:21px;padding-bottom:4px">
		<i class="fa fa-thumb-tack "></i></div></a>';
        }

        //$r.= '<a title="Details" href="product_info.php?products_id='.$products_id.'"><div class="det_wrp" style="width:80px;">Details <i class="fa fa-arrow-circle-right"></i></div></a>';
        $r .= '<a title="' . OPEN_PROD_DETAILS . '" href="product_info.php?products_id=' . $products_id . '&' . sess_id_full() . '"><div class="det_wrp" style="width:' . $width_details2 . 'px;max-height:22px;">Details</div></a>';
        if ($use_product_attribute_is_active and has_products_attribute((int)$products_id)) {
            $r .= '<a  title="' . OPEN_PROD_DETAILS . '" href="product_info.php?products_id=' . $products_id . '&' . sess_id_full() . '"><div class="ob_wrp" style="padding-left:9px;padding-right:8px;padding-bottom:5px;max-height:22px;">
			<i class="fa fa-caret-square-o-right fa-lg"></i></div></a>';
        } else {
            if (!to_bool($use_img_cart_icons)) {
                $r .= '<a  title="' . ICON_CART . '" href="javascript:buy_now(' . $products_id . ')"><div class="ob_wrp" style="padding-left:7px;padding-right:6px;max-height:22px;padding-top:1px;padding-bottom:4px">
				<span class="glyphicons glyphicons-shopping-cart " style="font-size:20px; text-shadow: rgba(40,40,40,.6) 1px 1px 2px;"></span>
				</div></a>';
            } else {
                $r .= '<a  title="' . ICON_CART . '" href="javascript:buy_now(' . $products_id . ')"><div class="ob_wrp" style="padding-left:8px;padding-right:8px;max-height:22px;padding-bottom:5px"><i class="fa fa-shopping-cart fa-lg"></i></div></a>';
            }
        }
        $r .= '';
        $r .= '</div>';
    } else {
        $r .= '<div class="order_b _dimmed06" style="white-space:nowrap;display:block;height:25px;align:left;margin:0 -9px 0 0px;width:106%;background:none;padding:0">';

        //$r.= '<a title="merken" href="javascript:add_to_wishlist('.$products_id.')"><div class="wl_wrp  round6_down_left" style="padding-left:8px;padding-right:8px;"><i class="fa fa-thumb-tack fa-2x"></i></div></a>';
        $r .= '<a title="' . OPEN_PROD_DETAILS . '" href="product_info.php?products_id=' . $products_id . '&' . sess_id_full() . '"><div class="det_wrp round6_down_left" style="width:' . $width_details . 'px;height:22px;">Details</div></a>';
        if ($use_product_attribute_is_active and has_products_attribute((int)$products_id)) {
            $r .= '<a  title="' . OPEN_PROD_DETAILS . '" href="product_info.php?products_id=' . $products_id . '&' . sess_id_full() . '"><div class="ob_wrp" style="padding-left:18px;padding-right:18px;;padding-bottom:4px;height:21px;">
			<i class="fa fa-caret-square-o-right fa-lg"></i></div></a>';
        } else {
            if (!to_bool($use_img_cart_icons)) {
                $r .= '<a  title="' . ICON_CART . '" href="javascript:buy_now(' . $products_id . ')"><div class="ob_wrp" style="padding-left:16px;padding-right:16px;height:21px;">
				<span class="glyphicons glyphicons-shopping-cart " style="font-size:20px; text-shadow: rgba(40,40,40,.6) 1px 1px 2px;"></span>
				</div></a>';
            } else {
                $r .= '<a  title="' . ICON_CART . '" href="javascript:buy_now(' . $products_id . ')"><div class="ob_wrp" style="padding-left:17px;padding-right:18px;height:21px;"><i class="fa fa-shopping-cart fa-lg"></i></div></a>';
            }
        }
        $r .= '';
        $r .= '</div>';
    }

    return $r;
}

function get_order_button($products_id, $wishlist_link, $anzeige_komm, $mein_komm_link, $show_order_buttons = true, $large_button = false, $parent = false, $small_icon = false)
{
    global $use_product_attribute_is_active, $use_img_buttons, $show_shipping_free_txt, $tick_icon_16,
           $wishlist_add_button, $buy_now_button, $product_text_display_show_no_postage, $product_text_display_show_no_postage_txt, $get_order_button_v1, $hide_price_label_and_order_button;

//ec(__line__.' '.$get_order_button_v1);					

    if ($hide_price_label_and_order_button) return '';

    if (!$show_order_buttons) return;

//if(INDEX3_ORDER_BUTT_ATTR){
//}else{
    if ($get_order_button_v1) return get_order_button_v1($products_id, $wishlist_link, $anzeige_komm, $mein_komm_link, $show_order_buttons = true, $large_button, $parent, $small_icon);
//}

    if ($parent) $parent_txt = 'parent:';

    $app_product_attribute_option_group = this_product_attribute_option_group(att_clean($products_id));
//$app_product_attribute_option_group = 2; 


    if (!$show_order_buttons) return '';

    if (
        basename($_SERVER['PHP_SELF']) == 'bestrated_products.php' or
        basename($_SERVER['PHP_SELF']) == 'bestseller_products.php' or
        basename($_SERVER['PHP_SELF']) == 'highlight_products.php' or
        basename($_SERVER['PHP_SELF']) == 'new_products.php'
    ) {
        $page = 'index.php';
    } else {
        $page = basename($_SERVER['PHP_SELF']);
    }
//ec(__line__.' xxxxxxxxxxxxxxxxxxxxxxxxx');					
    if ($use_product_attribute_is_active and has_products_attribute((int)$products_id)) {

        $lc_text .= '<div style="margin-top:6px;">';

        $lc_text .= '<form method="post" name="form_' . (int)$products_id . '" action="' . tep_href_link($page, tep_get_all_get_params(array('action', 'products_id')) . 'action=buy_now&products_id=' .
                $products_id) . '" >';


        $lc_text .= display_products_attribute2($products_id, $app_product_attribute_option_group);


        if ($use_img_buttons) {
            $img_src = get_dv('buy_now_button');
            $image_size = @getimagesize($img_src);
            $lc_text .= '<input class="dimmed_order_buttons" value="Submit" type="image" src="' . $img_src . '" ' . $image_size[3] . '>';
        } else {

            $lc_text .= '<a class="button_order_new" title="' . db_tr($definition = 'ORDER_BUTTON_TITLE', $page = 'general', $from_lang_code = 'de', $content = 'Artikel in den Warenkorb') . '" 
						href="javascript:document.form_' . (int)$products_id . '.submit()">' . get_buy_now_buttton() . '</a>';
        }


        $lc_text .= '</form>';
        $lc_text .= '' . $wishlist_link . '' . $anzeige_komm . '' . $mein_komm_link;
        $lc_text .= '</div>';

    } else {

        $lc_text .= '<div style="border-radius:6px;"><div id="buy_now_b_' . $products_id . '" style="margin:0 0 4px 0 ;display:inline;border-radius:6px;">
					<a class="button_order_new" title="' . db_tr($definition = 'ORDER_BUTTON_TITLE', $page = 'general', $from_lang_code = 'de', $content = 'Artikel in den Warenkorb') . '" 
					href="javascript:buy_now(' . $products_id . ')">' . get_buy_now_buttton() . '</a></div>' . $wishlist_link . '' . $anzeige_komm . '' . $mein_komm_link . '</div>';
    }


    if ($show_shipping_free_txt) {
        //$get_price = norm_price_special_price_from_products_id_value($products_id);
        $get_price = get_price_from_id($products_id);
        $porto_freigrenze = get_porto_freigrenze($_SESSION['customer_id'], $address_id = 1);

        if ($get_price >= $porto_freigrenze) {
            //$lc_text.='<div>Lieferung portofrei! '.$porto_freigrenze.' _'.$_SESSION['customer_id'].'_</div>'; '.$tick_icon_16.'
            //$img='<img src="'.catalog_url().'/'.'images/icons/kein_porto.png" width="132" height="21" />';

            //$lc_text.='<div class="kein_porto">keine Versandkosten!</div>'; 
            //$lc_text.='<div class="">'.$img.'</div>'; 
            if ($show_shipping_free_txt and curPageName() <> 'product_info.php') {
                $lc_text .= '<div class="kein_porto2">' . $product_text_display_show_no_postage_txt . '</div>';
            }


        }

    }


    return $lc_text;


}

function this_product_attribute_option_group($products_id)
{
    $sql = "select options_id from products_attributes where products_id = " . $products_id . "  limit 1";
    return lookup($sql, 'options_id');
}

function display_products_attribute($products_id, $options_id = 2)
{

    global $use_product_attribute_is_active, $languages_id, $currencies;


    if (has_products_attribute($products_id, $options_id)) {

        $t = '<div class="products_attributes">';


        $products_options_name_query = tep_db_query("select distinct popt.products_options_id, popt.products_options_name from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib
	  where patrib.products_id='" . (int)$_GET['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "' 
	  order by popt.products_options_name");
        //$products_options_name_query = tep_db_query("select distinct popt.products_options_id, popt.products_options_name from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$_GET['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "' order by popt.products_options_id");
        //$products_options_name_query = tep_db_query("select distinct popt.products_options_id, popt.products_options_name, popt.option_values_id from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$_GET['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "' order by patrib.option_values_id");	 

        while ($products_options_name = tep_db_fetch_array($products_options_name_query)) {
            $products_options_array = array();
            $products_options_query = tep_db_query("select pov.products_options_values_id, pov.products_options_values_name, pa.options_values_price, pa.price_prefix 
		 from " . TABLE_PRODUCTS_ATTRIBUTES . " pa, " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov 
		 where pa.products_id = '" . (int)$_GET['products_id'] . "' and pa.options_id = '" . (int)$products_options_name['products_options_id'] . "' 
		 and pa.options_values_id = pov.products_options_values_id and pov.language_id = '" . (int)$languages_id . "' 
		 order by pov.products_options_values_name");
            while ($products_options = tep_db_fetch_array($products_options_query)) {
                $products_options_array[] = array('id' => $products_options['products_options_values_id'], 'text' => $products_options['products_options_values_name']);
                if ($products_options['options_values_price'] != '0') {
                    $products_options_array[sizeof($products_options_array) - 1]['text'] .= ' (' . $products_options['price_prefix'] . $currencies->display_price($products_options['options_values_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) . ') ';
                }
            }
            mysql_free_result($products_options_name_query);


            if (isset($cart->contents[$_GET['products_id']]['attributes'][$products_options_name['products_options_id']])) {
                $selected_attribute = $cart->contents[$_GET['products_id']]['attributes'][$products_options_name['products_options_id']];
            } else {
                $selected_attribute = false;
            }


            //echo get_products_options_values_name($selected_attribute,(int)$languages_id).'<br>';
            //echo get_options_id($_GET['products_id']) .' ---- '.$products_options_name['products_options_name'] . ':'; 
            $t .= $products_options_name['products_options_name'] . ': ';

            $t .= tep_draw_pull_down_menu($products_id . 'id[' . $products_options_name['products_options_id'] . ']', $products_options_array, $selected_attribute, '', false, '', false);
            //$t.=   tooltip($product_attribute_hint,$img='13',$style='margin:0 6px;font-size:0.9em',$class='tip_lu',$width='350') ;


        }

        $t .= '</div>';
        return $t;
    }
}


//called in die file  4177
function display_products_attribute2($products_id, $options_id, $display = true, $add_to_id = '', $this_language_id = '')
{
    global $use_product_attribute_is_active, $languages_id, $currencies;

    $display_options_price = true;

    if (!$this_language_id == '') $languages_id = $this_language_id;

    $languages_id = SESSION_LANGUAGE_ID;

    if (has_products_attribute($products_id, $options_id)) {

//$base_price =  lookup('select products_price from products where products_id = '.$products_id,'products_price');


        $specials_price = lookup('select specials_new_products_price from specials where products_id = ' . $products_id, 'specials_new_products_price');
        if ($specials_price <> '' or $specials_price > 0) {
            $base_price = $specials_price;
        } else {
            $base_price = lookup('select products_price from products where products_id = ' . $products_id, 'products_price');
        }


//ec(__line__.' base_price: '.$base_price); 

        if ($display) {

            $t = '<div class="products_attributes dimmed04 round6" style="padding:4px 6px;background:rgba(230, 230, 230, 0.4);border:1px #ddd solid;margin-left:0px;margin-bottom:18px;min-width:258px;text-align:left;">';
        } else {
            $t = '<div class="products_attributes" style="display:none">';
        }

        //ec(__line__.'   -----');

        $sql1 = "select distinct popt.products_options_id, popt.products_options_name from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$products_id . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "' order by popt.products_options_name";

//ec($sql1);

        $products_options_name_query = tep_db_query("select distinct popt.products_options_id, popt.products_options_name from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$products_id . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "' order by popt.products_options_name");
        //$products_options_name_query = tep_db_query("select distinct popt.products_options_id, popt.products_options_name from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$_GET['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "' order by popt.products_options_id");
        //$products_options_name_query = tep_db_query("select distinct popt.products_options_id, popt.products_options_name, popt.option_values_id from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$_GET['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "' order by patrib.option_values_id");	 

//ecdb(__line__.': sql = '."select distinct popt.products_options_id, popt.products_options_name from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$products_id . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "' order by popt.products_options_name");

        while ($products_options_name = tep_db_fetch_array($products_options_name_query)) {
            $products_options_array = array();

            $sql2 = "
select pov.products_options_values_id, pov.products_options_values_name, pa.options_values_price, pa.price_prefix, pa.products_options_sort_order  
 from products_attributes pa, products_options_values pov 
 where pa.products_id = '" . (int)$products_id . "' and pa.options_id = '" . (int)$products_options_name['products_options_id'] . "' 
 and pa.options_values_id = pov.products_options_values_id and pov.language_id = '" . (int)$languages_id . "' order by pa.products_options_sort_order,pa.options_values_price, pov.products_options_values_name 
";

//ec($sql2);   //added distinct

            $products_options_query = tep_db_query("select distinct pov.products_options_values_id, pov.products_options_values_name, pa.options_values_price, pa.price_prefix, pa.products_options_sort_order  
 from products_attributes pa, products_options_values pov 
 where pa.products_id = '" . (int)$products_id . "' and pa.options_id = '" . (int)$products_options_name['products_options_id'] . "' 
 and pa.options_values_id = pov.products_options_values_id and pov.language_id = '" . (int)$languages_id . "' order by pa.products_options_sort_order,pa.options_values_price, pov.products_options_values_name ");

            while ($products_options = tep_db_fetch_array($products_options_query)) {
                $products_options_array[] = array('id' => $products_options['products_options_values_id'], 'text' => $products_options['products_options_values_name']);


                //if ($products_options['options_values_price'] != '0') {
                if ($products_options['price_prefix'] == '+') {
                    $this_price = $base_price + $products_options['options_values_price'];
                } else {
                    $this_price = $base_price - $products_options['options_values_price'];
                }
                //ec(__line__.' this_price: '.$this_price); 

                $products_tax_class_id = products_tax_class_id($products_id);

//ec(__line__.' price: '. $currencies->display_price( ($products_options['options_values_price'] + $base_price), tep_get_tax_rate($products_tax_class_id))  ); 	

                //$products_options_array[sizeof($products_options_array)-1]['text'] .= ' (' . $products_options['price_prefix'] . $currencies->display_price($products_options['options_values_price'], tep_get_tax_rate($products_tax_class_id)) .') ';
                //if( $products_options['options_values_price'] <> 0  or 1==1){
                //if( $products_options['options_values_price'] <> 0  and $display_options_price){
                if ($display_options_price) {
                    //$display_options_price	 

                    $products_options_array[sizeof($products_options_array) - 1]['text'] .= ' (' . $currencies->display_price($this_price, tep_get_tax_rate($products_tax_class_id)) . ') ';
                } else {
                    $products_options_array[sizeof($products_options_array) - 1]['text'] .= '';
                }
                //}

            }

            if (isset($cart->contents[$products_id]['attributes'][$products_options_name['products_options_id']])) {
                $selected_attribute = $cart->contents[$products_id]['attributes'][$products_options_name['products_options_id']];
            } else {
                $selected_attribute = false;
            }


//echo get_products_options_values_name($selected_attribute,(int)$languages_id).'<br>';  
//echo get_options_id($_GET['products_id']) .' ---- '.$products_options_name['products_options_name'] . ':'; 
            $t .= '<div style="margin:4px 0 7px 0;">';

            if (curPageName() == 'product_info.php') {
                $t .= '<span style="font-size:0.9em;min-width:60px;display:inline-block;float:left;">' . $products_options_name['products_options_name'] . ':</span> &nbsp; '; //60
            } else {
                $t .= '<span style="font-size:1.3em;min-width:60px;display:inline-block;float:left;font-weight:bold;margin-top:3px">' . $products_options_name['products_options_name'] . ':</span> &nbsp; '; //60
            }


            $list_po .= $products_options_name['products_options_name'] . ' & ';
            /*
//tep_draw_pull_down_menu($name, $values, $default = '', $parameters = '', $required = false,$style='',$bitte_waehlen=true) 
*/
//ec(__line__. ' ');

            if ($add_to_id == '') {
                //ec(__line__. ' here ');
                //multiple select ????
                //select to checkbox
                if (curPageName() == 'product_info.php') {
                    $t .= tep_draw_pull_down_menu($add_to_id . $products_id . 'id[' . $products_options_name['products_options_id'] . ']',
                        $products_options_array,
                        $selected_attribute,
                        ' onchange="sync_selects(this.value,\'' . $products_id . '\',' . $products_options_name['products_options_id'] . ')" ', false, 'background:#fff;float:right;min-width:125px;max-width:185px;font-size:1.0em', true); //165
                } else {
                    $t .= tep_draw_pull_down_menu($add_to_id . $products_id . 'id[' . $products_options_name['products_options_id'] . ']',
                        $products_options_array,
                        $selected_attribute,
                        ' onchange="sync_selects(this.value,\'' . $products_id . '\',' . $products_options_name['products_options_id'] . ')" ', false, 'background:#fff;float:none;width:185px;font-size:1.3em;margin-top:2px;', true); //165
                }

            } else {
                //ec(__line__. ' here ');
                $t .= tep_draw_pull_down_menu($add_to_id . $products_id . 'id[' . $products_options_name['products_options_id'] . ']', $products_options_array, $selected_attribute, ' ', false, '', false);
            }
//$t.=   tooltip($product_attribute_hint,$img='13',$style='margin:0 6px;font-size:0.9em',$class='tip_lu',$width='350') ;
            $zz++;
//if (curPageName()=='product_info.php' and $zz>0) $t.= '<div style="height:6px"></div>';
//ec(__line__.' '.$zz);
            $t .= '</div>';
        }


        $t .= '</div>';


        $list_po = substr($list_po, 0, -3);

//ec(__line__.' '.$products_id.' '.$list_po);
//$t.='<div class="round6 shade4" id = "pls_select" style="padding:5px 9px;border:1px #800 solid;background:#a00;display:none;clear:both;margin:0 19px;color:#fff">'.PULL_DOWN_DEFAULT.': <b>'.$list_po.'</b></div>';
        $t .= '<div class="round6 shade1" id = "pls_select_' . $products_id . '" style="padding:5px 9px;border:1px #800 solid;background:#a00;display:none;clear:both;margin:0 5px 0 39px;color:#fff;text-align:center">' . PULL_DOWN_DEFAULT . ': <b>' . $list_po . '</b></div>';
        mysql_free_result($products_options_query);
        return $t;
    }
}


function display_products_attribute33($products_id, $options_id, $display = true, $add_to_id = '', $this_language_id = '')
{
    global $use_product_attribute_is_active, $languages_id, $currencies;

    if (!$this_language_id == '') $languages_id = $this_language_id;


    //$languages_id = 1;

    if (has_products_attribute($products_id, $options_id)) {

        if ($display) {
            //$t='<div class="products_attributes " style="padding:1px 4px 1px 6px;background:rgba(230, 230, 230, 0.4);border:1px #ddd solid;margin-bottom:2px;min-width:137px;text-align:left">';
            $t = '<div style="font-size:1.1em">';
        } else {
            $t = '<div class="products_attributes" style="display:none">';
        }

        $products_options_name_query = tep_db_query("select distinct popt.products_options_id, popt.products_options_name from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$products_id . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "' order by popt.products_options_name");

        $editor14326 = '';
        while ($products_options_name = tep_db_fetch_array($products_options_name_query)) {
            $products_options_array = array();
            $products_options_query = tep_db_query("select pov.products_options_values_id, pov.products_options_values_name, pa.options_values_price, pa.price_prefix, pa.products_options_sort_order  , pa.products_attributes_id  
		 from products_attributes pa, products_options_values pov 
		 where pa.products_id = '" . (int)$products_id . "' and pa.options_id = '" . (int)$products_options_name['products_options_id'] . "' 
		 and pa.options_values_id = pov.products_options_values_id and pov.language_id = '" . (int)$languages_id . "' order by pa.products_options_sort_order, pov.products_options_values_name, pa.options_values_price");

            while ($products_options = tep_db_fetch_array($products_options_query)) {
                $products_options_array[] = array('id' => $products_options['products_options_values_id'], 'text' => $products_options['products_options_values_name']);
                if ($products_options['options_values_price'] != '0') {
                    $products_tax_class_id = products_tax_class_id($products_id);


                    $id123 = $products_options['products_attributes_id'];
                    //$id123=$products_id;
                    //$id='190';
                    $table = 'products_attributes';
                    $field = 'options_values_price';
                    //$id_field = 'products_id' ;

                    $id_field = 'products_attributes_id';
                    $class = '__qedit_outer'; // defualt = 'qedit_outer'
                    $style = 'width:45px;max-width:45px;font-size:12px;margin:0 0';
                    $before_txt = '';
                    $after_txt = '';

                    //ec(__line__.': ID: '.$id123.' - field: '.$field.' = '.$products_options['price_prefix'].$products_options['options_values_price']);	

                    $editor14326 = get_plain_text_editor_any_table($id123, $table, $field, $id_field, $class, $style, $before_txt, $after_txt);

                    //$products_options_array[sizeof($products_options_array)-1]['text'] .= ' (' . $products_options['price_prefix'] . $currencies->display_price($products_options['options_values_price'], tep_get_tax_rate($products_tax_class_id)) .') ';

                    $sql = "select products_price from products where products_id = '" . $products_id . "'";
                    $products_price = lookup($sql, 'products_price');

                    $sql = "select products_tax_class_id from products where products_id = '" . $products_id . "'";
                    $products_tax_class_id = lookup($sql, 'products_tax_class_id');
                    $normal_price = tep_add_tax($products_price, tep_get_tax_rate($products_tax_class_id)) . ' (' . tep_get_tax_rate($products_tax_class_id) . ')';

                    $var_prefix = $products_options['price_prefix'];
                    $var_price = $products_options['options_values_price'];

                    if ($var_prefix == '+') {
                        $this_price = $normal_price + $var_price;
                    } else {
                        $this_price = $normal_price - $var_price;
                    }


                    $products_options_array[sizeof($products_options_array) - 1]['text'] .= ' (' . $products_options['price_prefix'] . $editor14326 . ' = ' . $currencies->display_price($this_price, tep_get_tax_rate($products_tax_class_id)) . ')';


                } else {
                    //$products_tax_class_id = products_tax_class_id($products_id);

                    $sql = "select products_price from products where products_id = '" . $products_id . "'";
                    $products_price = lookup($sql, 'products_price');

                    $sql = "select products_tax_class_id from products where products_id = '" . $products_id . "'";
                    $products_tax_class_id = lookup($sql, 'products_tax_class_id');
                    //$this_prod_price2643 = tep_add_tax($products_price, tep_get_tax_rate($products_tax_class_id) );
                    $this_prod_price2643 = $currencies->display_price($products_price, tep_get_tax_rate($products_tax_class_id), 1);

                    //$this_prod_price2643 = get_normal_price($products_id,$quantity=1);
                    $products_options_array[sizeof($products_options_array) - 1]['text'] .= ' (<b>' . $this_prod_price2643 . '</b>) ';

                }
            }

            $t .= '<span style="font-size:0.8em;text-shadow: 0.04em 0.05em 0.15em rgba(255, 255, 255, 0.9">' . $products_options_name['products_options_name'] . ':</span> &nbsp; ';

            for ($i = 0, $n = sizeof($products_options_array); $i < $n; $i++) {
                $t .= $products_options_array[$i]['text'] . ', ';
            }

            $t = substr($t, 0, -2);
            if ($show_edit_button) {
                $t .= ' &nbsp; &nbsp; <a style="font-size:0.8em" target="_blank" title="Artikel-Attribute bearbeiten - neues Fenster" href="admin6093/wrapper_all.php?pID=' . $products_id . '&incl=categories_attributes_incl.php&disallow_new_window=1">edit</a><br>';
            } else {
                $t .= ' &nbsp; &nbsp;  ';
            }

            $zz++;


        }

        $t .= '</div>';

        mysql_free_result($products_options_query);
        return $t;
    }

}


function display_products_attribute3($products_id, $options_id, $display = true, $add_to_id = '', $this_language_id = '', $show_edit_button = true)
{
    global $use_product_attribute_is_active, $languages_id, $currencies;

    if (!$this_language_id == '') $languages_id = $this_language_id;


//$languages_id = 1;

    if (has_products_attribute($products_id, $options_id)) {

        if ($display) {
//$t='<div class="products_attributes " style="padding:1px 4px 1px 6px;background:rgba(230, 230, 230, 0.4);border:1px #ddd solid;margin-bottom:2px;min-width:137px;text-align:left">';
            $t = '<div style="font-size:1.1em">';
        } else {
            $t = '<div class="products_attributes" style="display:none">';
        }

        $products_options_name_query = tep_db_query("select distinct popt.products_options_id, popt.products_options_name from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$products_id . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "' order by popt.products_options_name");
        //$products_options_name_query = tep_db_query("select distinct popt.products_options_id, popt.products_options_name from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$_GET['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "' order by popt.products_options_id");
        //$products_options_name_query = tep_db_query("select distinct popt.products_options_id, popt.products_options_name, popt.option_values_id from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$_GET['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "' order by patrib.option_values_id");	  

        while ($products_options_name = tep_db_fetch_array($products_options_name_query)) {
            $products_options_array = array();
            $products_options_query = tep_db_query("select pov.products_options_values_id, pov.products_options_values_name, pa.options_values_price, pa.price_prefix, pa.products_options_sort_order  
 from products_attributes pa, products_options_values pov 
 where pa.products_id = '" . (int)$products_id . "' and pa.options_id = '" . (int)$products_options_name['products_options_id'] . "' 
 and pa.options_values_id = pov.products_options_values_id and pov.language_id = '" . (int)$languages_id . "' order by pa.products_options_sort_order, pov.products_options_values_name, pa.options_values_price");

            while ($products_options = tep_db_fetch_array($products_options_query)) {
                $products_options_array[] = array('id' => $products_options['products_options_values_id'], 'text' => $products_options['products_options_values_name']);
                if ($products_options['options_values_price'] != '0') {
                    $products_tax_class_id = products_tax_class_id($products_id);
                    //$products_options_array[sizeof($products_options_array)-1]['text'] .= ' (' . $products_options['price_prefix'] . $currencies->display_price($products_options['options_values_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) .') ';
                    $products_options_array[sizeof($products_options_array) - 1]['text'] .= ' (' . $products_options['price_prefix'] . $currencies->display_price($products_options['options_values_price'], tep_get_tax_rate($products_tax_class_id)) . ') ';
                } else {
                    //$products_tax_class_id = products_tax_class_id($products_id);

                    $sql = "select products_price from products where products_id = '" . $products_id . "'";
                    $products_price = lookup($sql, 'products_price');

                    $sql = "select products_tax_class_id from products where products_id = '" . $products_id . "'";
                    $products_tax_class_id = lookup($sql, 'products_tax_class_id');
                    //$this_prod_price2643 = tep_add_tax($products_price, tep_get_tax_rate($products_tax_class_id) );
                    $this_prod_price2643 = $currencies->display_price($products_price, tep_get_tax_rate($products_tax_class_id), 1);

                    //$this_prod_price2643 = get_normal_price($products_id,$quantity=1);
                    $products_options_array[sizeof($products_options_array) - 1]['text'] .= ' (' . trim($this_prod_price2643) . ')   ';
                }
            }

            /*
 if (isset($cart->contents[$products_id]['attributes'][$products_options_name['products_options_id']])) {
 	$selected_attribute = $cart->contents[$products_id]['attributes'][$products_options_name['products_options_id']];
 } else {
 	$selected_attribute = false;
 }
*/


//echo get_products_options_values_name($selected_attribute,(int)$languages_id).'<br>';  
//echo get_options_id($_GET['products_id']) .' ---- '.$products_options_name['products_options_name'] . ':'; 
            $t .= '<span style="font-size:0.8em;text-shadow: 0.04em 0.05em 0.15em rgba(255, 255, 255, 0.9">' . $products_options_name['products_options_name'] . ':</span> &nbsp; ';

            /*
//tep_draw_pull_down_menu($name, $values, $default = '', $parameters = '', $required = false,$style='',$bitte_waehlen=true)
*/
            /*
	if ($add_to_id==''){
		$t.= tep_draw_pull_down_menu($add_to_id.$products_id.'id[' . $products_options_name['products_options_id'] . ']', 
		$products_options_array, 
		$selected_attribute,
		' onchange="sync_selects(this.value,\''.$products_id.'\','.$products_options_name['products_options_id'].')" ',false,'background:#fff',false); 
	}else{
		$t.= tep_draw_pull_down_menu($add_to_id.$products_id.'id[' . $products_options_name['products_options_id'] . ']', $products_options_array, $selected_attribute,' ',false,'',false); 
	}
*/
//$t.= print_ar($products_options_array); http://www.erotic-mega-discount.ch/catalog/admin6093/categories.php?search=W-SPORT-AC-66101
            for ($i = 0, $n = sizeof($products_options_array); $i < $n; $i++) {
                $t .= $products_options_array[$i]['text'] . ', ';
            }

            $t = substr($t, 0, -2);
            if ($show_edit_button) {
                //$t.= ' &nbsp; &nbsp; <a style="font-size:0.8em" target="_blank" title="Artikel-Attribute bearbeiten - neues Fenster" href="admin6093/categories.php?search='.get_model_from_id($products_id).'">edit</a><br>';
                //wrapper_all.php?pID='.$products["products_id"].'&incl=categories_attributes_incl.php
                $t .= ' &nbsp; &nbsp; <a style="font-size:0.8em" target="_blank" title="Artikel-Attribute bearbeiten - neues Fenster" href="admin6093/wrapper_all.php?pID=' . $products_id . '&incl=categories_attributes_incl.php&disallow_new_window=1">edit</a><br>';
            } else {
                $t .= ' &nbsp; &nbsp;  ';
            }
//$t.=   tooltip($product_attribute_hint,$img='13',$style='margin:0 6px;font-size:0.9em',$class='tip_lu',$width='350') ;
            $zz++;
//if (curPageName()=='product_info.php' and $zz>0) $t.= '<div style="height:0px"></div>';

        }

        $t .= '</div>';

        mysql_free_result($products_options_query);
        return $t;
    }
}


function has_products_attribute($products_id, $options_id = 'nix')
{

    global $use_product_attribute_is_active;
//$options_id = 2 = Sprache
// options_values_id array
    if ($use_product_attribute_is_active) {
        //$sql = "select * from  products_attributes where products_id = '".$products_id."' and options_id =  ".$options_id ;
        $sql = "select * from  products_attributes where products_id = '" . $products_id . "'  ";
        if (has_rows($sql)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }

}


function set_products_attribute($products_id, $options_id)
{
    global $languages_id;
//$options_id = 2 = Sprache
// options_values_id array
    $sql = "select * from  products_options_values_to_products_options where 	products_options_id =  " . $options_id;
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $products_options_values_id = $row["products_options_values_id"];
        $sql = "insert into products_attributes set 
			products_id='" . $products_id . "',  options_id = '" . $options_id . "', options_values_id = '" . $products_options_values_id . "',
			options_values_price = 0 , price_prefix = '+', products_options_sort_order = 0
			";
        q($sql);
    }
    mysql_free_result($sql_result);
}


function delete_products_attribute($products_id, $options_id)
{
//$options_id = 2 = Sprache
// options_values_id array
    $sql = "select * from  products_options_values_to_products_options where 	products_options_id =  " . $options_id;
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $products_options_values_id = $row["products_options_values_id"];
        $sql = "delete from products_attributes where products_id='" . $products_id . "'		";
        q($sql);
    }
    mysql_free_result($sql_result);
}

/*
function get_products_options_values_name($products_options_values_id){
global $languages_id;
$sql="select products_options_values_name from products_options_values where products_options_values_id = ".$products_options_values_id." and language_id =".$language_id." ";
return lookup($sql,'products_options_values_name');
}
*/

function get_products_attribute_optiongroup_name($options_id)
{
    global $languages_id;

    $sql = "select  products_options_name from products_options where language_id = '" . $languages_id . "' and products_options_id = " . $options_id;
    $options_name = lookup($sql, 'products_options_name');
    return $options_name;
}

//products_options_values_name
function get_products_options_values_name($products_options_values_id)
{
    global $languages_id;
    $sql = " select products_options_values_name from products_options_values where products_options_values_id = " . $products_options_values_id . " and language_id = " . $languages_id . " ";
    return lookup($sql, 'products_options_values_name');

}


function get_options_id($products_id)
{
    if (eregiS('{', $products_id)) {
        $part1_arr = explode("{", $products_id, 2);
        $part1 = $part1_arr[1];

        $part2_arr = explode("}", $part1, 2);
        $options_id = $part2_arr[1];

        return $options_id;
    } else {
        //return '';
        $sql = "select options_id from products_attributes where products_id =  " . products_id;
        return lookup($sql, 'options_id');
    }
}


/*
function desctip($txt,$img='16',$style='',$class='tip',$width='',$admin=false){
// description als tooltip
//class tip zeigt tip rechts unten
//class tip zeigt tip_lu links unten
global $tool_tip_icon_13, $tool_tip_icon_16;
$txt = deuml($txt);

// default margin bei left = -225
if ($width<>''){
	$width = intval($width);
	if ($class=='tip_lu') {
		$left_magin = (225 + ($width-225))*-1;
	}else{
		$left_magin = -225;
	}
}else{

}

if ($img=='16'){
	$this_tip_icon = $tool_tip_icon_16;
}else{
	$this_tip_icon = $tool_tip_icon_13;
}

$style_add = '';
if ($style<>'') $style_add = ' style="'.$style.'" ';

if ($class=='tip'){
	$x='
	<span class="'.$class.'" '.$style_add.'>
	'.$this_tip_icon.'  
	<span>'.$txt.'</span></span>	';

}else{
	$x='
	<span class="'.$class.'" '.$style_add.'>
	'.$this_tip_icon.'  
	<span style="width:'.$width.'px;left:'.$left_magin.'px">'.$txt.'</span></span>	';
}


return $x;
}
*/


function products_text_and_description($products_name, $products_id, $target, $allow_prod_description = false)
{
    $products_id = (int)$products_id;
    global
    $product_text_display_show_description_in_list,
    $product_text_display_show_description_in_list_only_on_mouseover,
    $product_text_display_nl2br_in_list,
    $product_text_display_striptags_in_list,
    $product_text_display_truncate_description_in_list,
    $product_text_display_max_description_len,
    $product_text_display_use_description_for_title,
    $product_text_display_max_title_len,
    $pdf_manager_display_everywhere,
    $pdf_manager_display_on_product_page,
    $pdf_icon_for_display, $product_display_show_model_is_active, $preview_icon13, $show_video_links_in_prods,
    $shop_is_multilang, $app_top_default_lang_id, $app_top_hint_not_yet_translated, $video_gallery_icon13,
    $products_name_show_in_lists, $at_is_gay_shop, $at_select_prod_list_selected, $products_description_show_in_multi_col_lists;

    if (!$products_name_show_in_lists) return '';

//ec(__line__.' allow_prod_description: '.$allow_prod_description);

    if ($products_name == '' and $shop_is_multilang and $_SESSION['languages_id'] <> $app_top_default_lang_id) {
        $products_name = get_products_name_in_german($products_id) . $app_top_hint_not_yet_translated;
    }

    if ($at_is_gay_shop) $products_name = strip_tags(gms_products_name($products_name));

    $products_name = strip_tags($products_name);

    if ($product_display_show_model_is_active) {
        $products_model = get_products_model_from_products_id($products_id);
        $products_model_txt = '<span style="font-size:0.8em;color:#666;font-weight:normal;margin-left:5px"> (' . $products_model . ')</span>';
    } else {
        $products_model_txt = '';
    }


    if (getParam('cPath', '')) {
        $t_cPath = getParam('cPath', '');
    } else {
        $t_cPath = '';
    }


    if (!to_bool($product_text_display_show_description_in_list)) {
        //return '<div class="prdtxt"><a '.$target.' class="open" title="Details &ouml;ffnen..." href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products_id) .'&cPath='.full_cPath_from_products_id($products_id).  '">' . $products_name.$products_model_txt.'</a></div>';
        $t = '<div class="prdtxt"><a ' . $target . ' class="open" title="' . db_tr($definition = 'OPEN_PROD_DETAILS', $page = 'general', $from_lang_code = 'de', $content = 'Details �ffnen') . '..." 
	href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products_id) . '">' . $products_name . $products_model_txt . '</a></div>';

    } else {

        if ($product_text_display_show_description_in_list_only_on_mouseover) {

            $t = '
		<div class="prdtxt" 
		onmouseover=show2("prod_descr_in_list_' . $products_id . '","blind") 
		onmouseout=weg2("prod_descr_in_list_' . $products_id . '","fade") >
		
		<a ' . $target . ' class="open" title="' . db_tr($definition = 'OPEN_PROD_DETAILS', $page = 'general', $from_lang_code = 'de', $content = 'Details �ffnen') . '..." 
		href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products_id) . '">' . $products_name . $products_model_txt . '</a> 
		</div>';

            if ($allow_prod_description) {
                $t .= '
		<div class="prod_descr_in_list" id="prod_descr_in_list_' . $products_id . '" 
		style="display:none">' . get_description_from_id($products_id, $product_text_display_truncate_description_in_list, $product_text_display_max_description_len) . '</div>			
		';
            }
        } else {


            $t = '
		<div class="prdtxt">
		
		<a ' . $target . ' class="open" title="' . db_tr($definition = 'OPEN_PROD_DETAILS', $page = 'general', $from_lang_code = 'de', $content = 'Details �ffnen') . '..." 
		href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products_id) . '">' . $products_name . $products_model_txt . '</a></div>';


            //products_description_show_in_multi_col_lists  $at_select_prod_list_selected
            if ($allow_prod_description) {
                $t .= '
		<div class="prod_descr_in_list" id="prod_descr_in_list_' . $products_id . '" 
		style="display:display">' . get_description_from_id($products_id, $product_text_display_truncate_description_in_list, $product_text_display_max_description_len) . '</div>			
		';
            }

        }
    }

    if ($pdf_manager_display_everywhere) $pdf_list = products_pdf_by_id($products_id);

    if ($pdf_manager_display_everywhere and $pdf_list <> '') {
        $pdf_list_arr = explode("_", $pdf_list);

        $t .= '
<div class="pdf_display_on_lists">';

        foreach ($pdf_list_arr as $pdf_item) {
            $pdf_url_from_id = pdf_url_from_id($pdf_item);
            if (file_exists($pdf_url_from_id)) {
                $pdf_title_from_id = pdf_title_from_id($pdf_item);
//$t.='<a title="PDF-Dokument im Popup-Fenster &ouml;ffnen" class="lightwindow pdf_display_on_lists" params="lightwindow_type=external,lightwindow_width=1100,lightwindow_height=" href="'.$pdf_url_from_id.'">'.$pdf_icon_for_display.'<span style="color:#ccc;margin-left:4px">('.$pdf_item.')</span> '.pdf_title_from_id($pdf_item).' <span style="color:#aaa;margin-left:6px">('.filesize_in_kb_mb($pdf_url_from_id).')</span></a>';
                $t .= '<a title="' . $pdf_title_from_id . ' - ' . db_tr($definition = 'GENERAL_TERM_OPEN', $page = 'general', $from_lang_code = 'de', $content = '�ffnen') . ' (' . filesize_in_kb_mb($pdf_url_from_id) . ')" 
class="lightwindow pdf_display_on_lists" params="lightwindow_type=external,lightwindow_width=1300,lightwindow_height=" href="' . $pdf_url_from_id . '">'
                    . $pdf_icon_for_display . ' ' . substr($pdf_title_from_id, 0, 36) . '</a>';
            }
        }


        $t .= '
</div>
';


    }

    $get_products_video_from_products_id = get_products_video_from_products_id($products_id);
    if ($show_video_links_in_prods and $get_products_video_from_products_id <> '') {
        $v_link = get_plain_video_link($get_products_video_from_products_id);
        $get_video_title = get_video_title($get_products_video_from_products_id);
        $t .= '<a  title="' . db_tr($definition = 'GENERAL_VIDEO_SHOW', $page = 'general', $from_lang_code = 'de', $content = 'Video zeigen') . ': ' . $get_video_title . '" class="pdf_display_on_lists" href="' . $v_link . '">' . $video_gallery_icon13 . ' Video:  ' . $get_video_title . '</a>';
    }


    return $t;
}


function pdf_p_by_id($products_id, $as_txt = false)
{
    $sql = "select pdf_p from products where products_id = " . $products_id;
    $r = lookup($sql, 'pdf_p');
    if ($as_txt) {
        if ($r <> '') {
            return $r;
        } else {
            return '<span style="color:#c66">keine</span>';
        }
    } else {
        return $r;
    }
}

function pdf_m_by_id($products_id, $as_txt = false)
{
    $sql = "select pdf_m from products where products_id = " . $products_id;
    $r = lookup($sql, 'pdf_m');
    if ($as_txt) {
        if ($r <> '') {
            return $r;
        } else {
            return '<span style="color:#c66">keine</span>';
        }
    } else {
        return $r;
    }
}

function pdf_c_by_id($products_id, $as_txt = false)
{
    $sql = "select pdf_c from products where products_id = " . $products_id;
    $r = lookup($sql, 'pdf_c');
    if ($as_txt) {
        if ($r <> '') {
            return $r;
        } else {
            return '<span style="color:#c66">keine</span>';
        }
    } else {
        return $r;
    }
}

function pdf_k_by_id($products_id, $as_txt = false)
{
    $sql = "select pdf_mc from products where products_id = " . $products_id;
    $r = lookup($sql, 'pdf_mc');
    if ($as_txt) {
        if ($r <> '') {
            return $r;
        } else {
            return '<span style="color:#c66">keine</span>';
        }
    } else {
        return $r;
    }
}


function products_pdf_by_id($products_id, $as_txt = false)
{
    $sql = "select products_pdf from products where products_id = " . $products_id;
    $r = lookup($sql, 'products_pdf');
    if ($as_txt) {
        if ($r <> '') {
            return $r;
        } else {
            return '<span style="color:#c66">keine</span>';
        }
    } else {
        return $r;
    }
}

function manufacturers_pdf_by_id($manufacturers_id, $as_txt = false)
{
    $sql = "select pdfs from manufacturers where manufacturers_id = " . $manufacturers_id;
    $r = lookup($sql, 'pdfs');

    if ($as_txt) {
        if ($r <> '') {
            return $r;
        } else {
            return '<span style="color:#c66">keine</span>';
        }
    } else {
        return $r;
    }
}


function kombi_pdf_by_id($manufacturers_id, $categories_id, $as_txt = false)
{
    $sql = "
	select distinct p.products_id,p.products_model, p.pdf_c, p.pdf_mc, p.manufacturers_id, c.categories_id, c.parent_id, c.pdfs						
	from products p, products_to_categories p2c, categories c						
	where p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and (p2c.categories_id = " . $categories_id . " or c.parent_id= " . $categories_id . ") and (p.manufacturers_id=" . $manufacturers_id . ") ";

//$anz = anz_records($sql);


    $r = lookup($sql, 'pdf_mc');
    if ($as_txt) {
        if ($r <> '') {
            return $r;
        } else {
            return '<span style="color:#c66">keine</span>';
        }
    } else {
        return $r;
    }
}


function categories_pdf_by_id($categories_id, $as_txt = false)
{
    $sql = "select pdfs from categories where categories_id = " . $categories_id;
    $r = lookup($sql, 'pdfs');
    if ($as_txt) {
        if ($r <> '') {
            return $r;
        } else {
            return '<span style="color:#c66">keine</span>';
        }
    } else {
        return $r;
    }
}


function cpath_str_in_abt_div($short_version, $full_cpath)
{
    global $use_full_cpath_str_in_abt_div;

    if ($use_full_cpath_str_in_abt_div) {
        $cPath_array = explode('_', $full_cpath);
        $cat_id = $cPath_array[(sizeof($cPath_array) - 1)];
        $str = full_cPath_str($cat_id) . ' &nbsp; ';
    } else {
        $str = $short_version;
    }

    return $str . ' ';
}

function mp3_file_exists_icon($art_id, $class = 'lgrey10', $info_only = false)
{

    global $mp3_per_product_is_active, $audio_file_play_icon, $audio_file_not_exists_icon, $shop_url;

    if ($mp3_per_product_is_active) {
        $mp3url = $art_id . '.mp3';
        $mp3_path_ws = $shop_url . '/catalog/products_mp3/';
        $mp3_ws = $mp3_path_ws . $mp3url;
        $mp3_fs = DIR_FS_DOCUMENT_ROOT . '/products_mp3/' . $mp3url;

        if (file_exists($mp3_fs)) {
            if ($info_only) {
                return '<span class="' . $class . '" style="margin:0px;color:#060">MP3 zugeordnet </span>';
            } else {
                return '<a class="button30" style="font-size:0.8em" target="_blank" href="' . $mp3_ws . '">' . $audio_file_play_icon . ' MP3 abspielen</a>';
            }
        } else {
            return '<span class="' . $class . '" style="margin:0px">kein MP3</span>';
        }
    } else {
        return '';
    }

}


function get_mp3_player($art_id)
{
//
    global $mp3_per_product_is_not_available_txt, $mp3_per_product_start_play_txt, $mp3_per_product_background_color, $shop_url;
//$art_id = '41';

    $src = 'mp3player/mp3.swf';
    $mp3_path_ws = $shop_url . '/catalog/products_mp3/';
    $mp3url = $art_id . '.mp3';
    $mp3_ws = $mp3_path_ws . $mp3url;
    $mp3_fs = DIR_FS_DOCUMENT_ROOT . '/products_mp3/' . $mp3url;

//$txt = $mp3_fs;
//$txt = 'Auf den Pfeil klicken zum abspielen der Audio-Datei. - '.get_name_from_id($art_id);
//$txt = 'Pfeil klicken für Hörmuster...';
//$txt = $mp3_per_product_start_play_txt;
    $txt = get_dv('mp3_per_product_start_play_txt');
    /*
$player='
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="275" height="50" id="mp3" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="mp3.swf?mp3url=hello.mp3&txt=Hello World&bgcolor=#ffffff&txtcolor=#000099&barbgcolor=#999999&loadbar=#3c3c3c&posbar=000000&loop=false" />
<param name="quality" value="high" />
<param name="bgcolor" value="#222222" />
<embed src="mp3.swf?mp3url=message.mp3&txt=Hello World&bgcolor=#ffffff&txtcolor=#000099&barbgcolor=#999999&loadbar=#3c3c3c&posbar=000000&loop=false" quality="high" bgcolor="#ffffff" width="275" height="50" name="mp3" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>

';
*/

    if (file_exists($mp3_fs)) {
        $w = '256'; // normal: 275, 256 
        $txtcolor = '#cccccc';
        $txtcolor = get_dv('mp3_per_product_background_text_color');

//$bgcolor = '#f9f9ff';
        $bgcolor = $mp3_per_product_background_color;


        $player = '<div class="round6 mp3player" style="width:' . $w . 'px;background:' . $bgcolor . ';padding:0 3px">
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="' . $w . '" height="40" id="mp3" align="center">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="' . $src . '?mp3url=' . $mp3_ws . '&txt=' . $txt . '&bgcolor=' . $bgcolor . '&txtcolor=' . $txtcolor . '&barbgcolor=#999999&loadbar=#3c3c3c&posbar=#cc3333&loop=false" />
<param name="quality" value="high" />
<param name="bgcolor" value="' . $bgcolor . '" />
<embed src="' . $src . '?mp3url=' . $mp3_ws . '&txt=' . $txt . '&bgcolor=' . $bgcolor . '&txtcolor=' . $txtcolor . '&barbgcolor=#999999&loadbar=#3c3c3c&posbar=#cc3333&loop=false" quality="high" bgcolor="' . $bgcolor . '" width="' . $w . '" height="40" name="mp3" align="center" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object></div>

';

    } else {

        if ($mp3_per_product_is_not_available_txt <> '') {
            $player = '<div style="width:' . $w . 'px;height:26px;text-align:center;color:#999;font-size:0.8em;font-weight:normal;padding:12px 0 0 0">' . $mp3_per_product_is_not_available_txt . '</div>';
        }

    }


    return $player;

}


function make_folder_if_not_exists($folder)
{
    if (!is_dir($folder)) {
        mkdir($folder);
    }
}

function set_current_shop_version()
{
//$version = '2.1.0'; // z.B.: 2.0.0
//set_dv('current_shop_version',$version);  
}

//function get_config_key_from_id($conf_id)
//function get_config_id_byKey($conf_key)

function shop_url()
{
//global $shop_url;
/// http://www.mysite.com 
//$x = get_dv('shop_url');
    $x = HTTP_CATALOG_SERVER;

    if (trim($x) <> '') {
        $res = $x;

        $res = str_replace('/catalog', '', $res);
        $res = str_replace('/index.php', '', $res);
        return $res;

    } else {
        $res = str_replace('http://', '', HTTP_CATALOG_SERVER);
        //$res = str_replace('','',HTTP_CATALOG_SERVER);
        $res = str_replace('/catalog', '', $res);
        $res = str_replace('/index.php', '', $res);
        return $res;
    }

}


function catalog_url()
{
//global $shop_url;
//
// f�r Admin Links zum Shop
    return HTTP_CATALOG_SERVER . '/catalog';
}

/*
function clipad_url(){

// f�r paralles Laden - sollte anders sein als catalog_url()
return HTTP_CATALOG_SERVER.'/catalog';
}
function shop_server_url(){
return  clipad_url();
}
function is_clipad(){
	if (eregiS('clipad.net',$_SERVER['SERVER_NAME'])){
	return true;
	}else{
	return false;
	}
}
*/
function is_mydotter()
{
    if (eregiS('mydotter-shops.com', $_SERVER['SERVER_NAME']) or eregiS('mydottershop.com', $_SERVER['SERVER_NAME']) or eregiS('mydotter-shops2.com', $_SERVER['SERVER_NAME']) or eregiS('mydotter.net', $_SERVER['SERVER_NAME']) or eregiS('mydatashop.net', $_SERVER['SERVER_NAME'])) {
        return true;
    } else {
        return false;
    }
}


function shop_url_short()
{
/// www.mysite.com 
//$x = get_dv('shop_url');
    $x = HTTP_CATALOG_SERVER;

    if (trim($x) <> '') {
        $res = $x;
        $res = str_replace('http://', '', $res);
        $res = str_replace('/catalog', '', $res);
        $res = str_replace('/index.php', '', $res);
        return $res;

    } else {
        $res = str_replace('http://', '', HTTP_CATALOG_SERVER);
        $res = str_replace('/catalog', '', $res);
        $res = str_replace('/index.php', '', $res);
        return $res;
    }

}

function shop_url_long()
{
//$x = get_dv('shop_url');
    $x = HTTP_CATALOG_SERVER;
    if (trim($x) <> '') {
        return $x;
    } else {
        return HTTP_CATALOG_SERVER;
    }

}

//CAT_FOLDER_TOP
function cat_folder_top()
{
    return CAT_FOLDER_TOP;
}

function cat_folder_top_string()
{
    if (CAT_FOLDER_TOP <> '') {
        return '_' . str_replace('/', '_', CAT_FOLDER_TOP);
    } else {
        $x = HTTP_CATALOG_SERVER;
        $x = str_replace('http://', '', $x);
        $x = str_replace('www.', '', $x);
        $x = str_replace('.', '_', $x);
        $x = str_replace('-', '_', $x);

        return '_' . $x;

    }

}


/*
en|ar English to Arabic
en|zh-CN English to Chinese (Simplified)
en|zh-TW English to Chinese (Traditional)
en|nl English to Dutch
en|fr English to French
en|de English to German
en|el English to Greek
en|it English to Italian
en|ja English to Japanese
en|ko English to Korean
en|pt English to Portuguese
en|ru English to Russian
en|es English to Spanish

ar|en Arabic to English
zh|en Chinese to English
zh-CN|zh-TW Chinese (Simplified to Traditional)
zh-TW|zh-CN Chinese (Traditional to Simplified)
nl|en Dutch to English
fr|en French to English
fr|de French to German
de|en German to English
de|fr German to French
el|en Greek to English
it|en Italian to English
ja|en Japanese to English
ko|en Korean to English
pt|en Portuguese to English
ru|en Russian to English
es|en Spanish to English
*/
function googletranslate($langpair, $text)
{
    $url = "http://www.google.com/translate_t?langpair=" . $langpair;
    $text = urlencode($text);
    $langpair = urlencode($langpair);
    $ch = curl_init(); // initialize curl handle
    curl_setopt($ch, CURLOPT_URL, $url); // set url to post to
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// allow redirects
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
    curl_setopt($ch, CURLOPT_TIMEOUT, 30); // times out after 30s
    curl_setopt($ch, CURLOPT_POST, 1); // set POST method
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "hl=en&ie=UTF8&text=$text&langpair=$langpair");
    $result = curl_exec($ch); // run the whole process
    $pos = strpos($result, "id=suggestion>");
    if ($pos === false) {
        return ("");
        curl_close($ch);
    } else {
        preg_match_all('/id=suggestion>(.+?)\<\/textarea/m', $result, $match);
        return ($match[1][0]);
        curl_close($ch);
    }
}


function shop_uses_multi_langs()
{
    global $shop_is_multilang;

    if ($shop_is_multilang) {
        $languages = tep_get_languages();
        $n = sizeof($languages);
        if ($n > 1) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function get_new_lang_options()
{

    $sql_result = q("select * from languages order by sort_order ");

    $r = '<option value="">Sprache w&auml;hlen...</option>';

    while ($row = mysql_fetch_array($sql_result)) {
        $id = $row["languages_id"];
        $name = $row["name"];
        $code = $row["code"];
        $directory = $row["directory"];
        $status = $row["status"];

        if ($name <> 'deutsch') {
            if (language_is_active($id)) {
                $r .= '<option value="' . $code . '">' . $name . '</option>';
            } else {
                $r .= '<option style="color:#999" value="' . $code . '">' . $name . '</option>';
            }


        }
    }
    mysql_free_result($sql_result);

    return $r;


}

function language_is_active($languages_id)
{
    $sql = "select status from languages where languages_id = '" . $languages_id . "'";
    $r = lookup($sql, 'status');
    if ($r == 1) return true;
}

function langid_from_langdir($langdir)
{
    $sql = "select languages_id from languages where code = '" . $langdir . "'";
    return lookup($sql, 'languages_id');
}


//$lang = iso code  
function number_lang_items_string($lang)
{

    $sql_res = q("select id from myd_translations where hidden = 0");
    $anz_elemente = mysql_num_rows($sql_res);

//$sql_res = q("select id from myd_translations where ".lang_long_from_iso($lang)."_man = '' and hidden = 0 "); 
    $sql_res = q("select id from myd_translations where " . $lang . " = '' and hidden = 0 ");
    $anz_elemente_untranslated = mysql_num_rows($sql_res);

    if ($anz_elemente_untranslated_percent > 0) {
        $anz_elemente_untranslated_percent = round($anz_elemente_untranslated / $anz_elemente * 100, 0) . '%';

        return 'Anzahl: ' . $anz_elemente . ' - davon noch nicht &uuml;bersetzt: ' . $anz_elemente_untranslated . ' (' . $anz_elemente_untranslated_percent . ')';
    }
}

function all_lang_icons()
{
    $languages = tep_get_languages();

    for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
        $language_id = $languages[$i]['id'];
        $language_name = $languages[$i]['name'];
        $language_code = $languages[$i]['code'];
        //$ret .= '<div style="padding:3px 9px">'.$language_name.'</div>';
        $r .= lang_icon($language_code) . ' ';
    }

    return $r;
}


//iso_code
function lang_icon($lang, $is_current = false, $show_title = false, $size = '', $half_size = false)
{
    //$size  40 30 20 16
    if ($show_title) {
        $t = 'title="' . get_dv('select_lang_box_header_txt') . '"';
    } else {
        $lang_long = lookup("select name from languages where code = '" . $lang . "'", "name");
        $t = 'title="' . $lang_long . '(' . $lang . ')"';
    }
    if ($size == '') {
        if ($is_current) {
            if ($half_size) {
                return '<img style="border:1px #999 outset" src="' . DIR_WS_IMAGES_FULL . '/famfamfam_flag_icons/png/' . $lang . '.png" width="11" height="8" />';
            } else {
                return '<img style="border:1px #999 outset" src="' . DIR_WS_IMAGES_FULL . '/famfamfam_flag_icons/png/' . $lang . '.png" width="16" height="11" />';
            }
        } else {
            if (file_exists(DIR_FS_CATALOG . 'images/famfamfam_flag_icons/png/' . $lang . '.png')) {
                //return '<img '.$t.' src="'.DIR_WS_IMAGES_FULL.'/famfamfam_flag_icons/png/'.$lang.'.png" width="16" height="11" />';
                if ($half_size) {
                    return '<img style="border:1px #999 outset" src="' . DIR_WS_IMAGES_FULL . '/famfamfam_flag_icons/png/' . $lang . '.png" width="11" height="8" />';
                } else {
                    return '<img style="border:1px #999 outset" src="' . DIR_WS_IMAGES_FULL . '/famfamfam_flag_icons/png/' . $lang . '.png" width="16" height="11" />';
                }


            } else {
                return $lang_long . '(' . $lang . ')';
            }

        }
    } else {
        if ($is_current) {
            return '<img style="border:1px #999 outset" src="' . DIR_WS_IMAGES_FULL . '/famfamfam_flag_icons/round1/' . $size . '/' . $lang . '.png" width="' . $size . '" height="' . $size . '" />';
        } else {
            if (file_exists(DIR_FS_CATALOG . 'images/famfamfam_flag_icons/png/' . $lang . '.png')) {
                return '<img ' . $t . ' src="' . DIR_WS_IMAGES_FULL . '/famfamfam_flag_icons/round1/' . $size . '/' . $lang . '.png" width="' . $size . '" height="' . $size . '" />';
            } else {
                return $lang_long . '(' . $lang . ')';
            }

        }

    }
}

//folder 
function lang_icon_from_folder($folder, $is_current = false, $round_flag = false, $size = '16')
{
    $lang = lang_iso_from_folder($folder);
// 16 11 round: 16 20 30 40

    if ($round_flag) {
        if ($is_current) {
            return '<img style="" title="' . lang_name_from_folder($folder) . '" src="' . DIR_WS_IMAGES_FULL . '/famfamfam_flag_icons/round1/' . $size . '/' . $lang . '.png" width="' . $size . '" height="' . $size . '" />';
        } else {
            return '<img title="' . lang_name_from_folder($folder) . '" src="' . DIR_WS_IMAGES_FULL . '/famfamfam_flag_icons/round1/' . $size . '/' . $lang . '.png" width="' . $size . '" height="' . $size . '" />';
        }

    } else {
        if ($is_current) {
            return '<img style="border:1px #999 outset" title="' . lang_name_from_folder($folder) . '" src="' . DIR_WS_IMAGES_FULL . '/famfamfam_flag_icons/png/' . $lang . '.png" width="16" height="11" />';
        } else {
            return '<img title="' . lang_name_from_folder($folder) . '" src="' . DIR_WS_IMAGES_FULL . '/famfamfam_flag_icons/png/' . $lang . '.png" width="16" height="11" />';
        }
    }
}

function tep_get_languages_cat()
{

    $languages_query = tep_db_query("select languages_id, name, code, image, directory from languages where status=1 order by sort_order");
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


function langs_flag_string($show_title = true, $round = false, $size = '16')
{
    global $request_type, $toolbar_free_use_flagbox, $shop_is_multilang;
    $languages = tep_get_languages_cat();
    for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
        $language_id = $languages[$i]['id'];
        $language_name = $languages[$i]['name'];
        $language_code = $languages[$i]['code'];
        $language_directory = $languages['directory'];

        if ($_SESSION['languages_id'] == $language_id) {
            $languages_string .= lang_icon($language_code, false, $show_title);
        } else {
            $languages_string .= ' <a class="dimmed_flags" style="" href="' . tep_href_link(basename($_SERVER['PHP_SELF']), tep_get_all_get_params(array('language', 'currency')) . 'language=' . $language_code, $request_type) . '">'
                . lang_icon($language_code, false, $show_title) . '</a> ';
        }


    }

    if ($shop_is_multilang) return $languages_string;
}


function lang_id_from_folder($folder)
{
    $sql = "select languages_id from languages where directory = '" . $folder . "'";
    return lookup($sql, 'languages_id');
}


function lang_iso_from_folder($folder)
{
    $sql = "select code from languages where directory = '" . $folder . "'";
    return lookup($sql, 'code');
}

function lang_name_from_folder($folder)
{
    $sql = "select name from languages where directory = '" . $folder . "'";
    return lookup($sql, 'name');
}

function lang_id_from_code($code)
{
    $sql = "select languages_id from languages where code = '" . $code . "'";
    return lookup($sql, 'languages_id');
}

function lang_name_from_code($code)
{
    $sql = "select name from languages where code = '" . $code . "'";
    return lookup($sql, 'name');
}

function lang_folder_from_id($id)
{
    $sql = "select directory from languages where languages_id = '" . $id . "'";
    return lookup($sql, 'directory');
}

function cat_name_in_lang($cat_id, $lang_id)
{
    $sql = "select categories_name from categories_description where categories_id = " . $cat_id . " and language_id = " . $lang_id . " ";
    return lookup($sql, 'categories_name');
}

function lang_long_from_iso($id)
{

    switch ($id) {

        case 'bg':
            return 'bulgarian';
            break;

        case 'ca':
            return 'catalan';
            break;

        case 'cr':
            return 'croatian';
            break;

        case 'cz':
            return 'czech';
            break;

        case 'dk':
            return 'danish';
            break;

        case 'nl':
            return 'dutch';
            break;

        case 'et':
            return 'eesti';
            break;

        case 'en':
            return 'english';
            break;

        case 'el':
            return 'greek';
            break;


        case 'es':
            return 'espanol';
            break;

        case 'fi':
            return 'finnish';
            break;

        case 'fr':
            return 'french';
            break;

        case 'gl':
            return 'galego';
            break;

        case 'hu':
            return 'hungarian';
            break;

        case 'is':
            return 'icelandic';
            break;

        case 'it':
            return 'italian';
            break;

        case 'lv':
            return 'latvian';
            break;

        case 'lt':
            return 'lithuanian';
            break;

        case 'mk':
            return 'macedonian';
            break;

        case 'no':
            return 'norwegian';
            break;

        case 'pl':
            return 'polish';
            break;

        case 'pt':
            return 'portuguese';
            break;

        case 'ro':
            return 'romanian';
            break;

        case 'ru':
            return 'russian';
            break;

        case 'sr':
            return 'srpski';
            break;

        case 'se':
            return 'svenska';
            break;

        case 'tr':
            return 'turkish';
            break;

        case 'uk':
            return 'ukrainian';
            break;

    }


}


function ll($txt)
{
    return $txt;
}


function user_email_from_cookie()
{

    if (isset($_COOKIE["user_email"])) {
        $user_email = $_COOKIE["user_email"];
    } else {
        $user_email = '';
    }
    return $user_email;
}


function set_app_easy_coupons($boolval)
{
    $curr = EASY_COUPONS;

    $curr_arr = explode(';', EASY_COUPONS);
    if ($boolval) {
        $curr_arr[0] = '1';
    } else {
        $curr_arr[0] = '0';
    }
    $new_arr = implode(';', $curr_arr);

    tep_db_query("update configuration set configuration_value = '" . $new_arr . "' where configuration_key = 'EASY_COUPONS' ");
}


function set_app_easy_coupons_days()
{
    $curr = EASY_COUPONS;
    $dayslz = get_dv('easy_coupons_days');
    $curr_arr = explode(';', EASY_COUPONS);
//$curr_arr = explode(';',$curr);

    $curr_arr[6] = (int)$dayslz;
    //$curr_arr[6] = 99;

    $new_arr = implode(';', $curr_arr);

//tep_db_query("update configuration set configuration_value = '".$new_arr."' where configuration_key = 'EASY_COUPONS' ");
    $sql = "update configuration set configuration_value = '" . $new_arr . "' where configuration_key = 'EASY_COUPONS' ";
    q($sql);

}

function set_app_easy_coupons_percent()
{
    $curr = EASY_COUPONS;
    $percent = get_dv('easy_coupons_percent');
    $curr_arr = explode(';', EASY_COUPONS);
    $curr_arr[10] = (int)$percent;
    $new_arr = implode(';', $curr_arr);
    tep_db_query("update configuration set configuration_value = '" . $new_arr . "' where configuration_key = 'EASY_COUPONS' ");
}


function bool_icon_13($boolval)
{
    global $tick_icon_13, $cross_icon_13;
    if ($boolval) {
        return '<span title="die Einstellung &auml;ndern Sie mit dem Konfigurations-Assistenten" style="margin:4px;color:#262;font-size:10px;font-weight:normal">ja</span>' . $tick_icon_13;
    } else {
        return '<span title="die Einstellung &auml;ndern Sie mit dem Konfigurations-Assistenten" style="margin:4px;color:#c33;font-size:10px;font-weight:normal">nein</span>' . $cross_icon_13;
    }
}

function bool_icon_13_active($boolval)
{
    global $tick_icon_13, $cross_icon_13;
    if ($boolval) {
        return '<span title="die Einstellung &auml;ndern Sie mit dem Konfigurations-Assistenten" style="margin:4px;color:#262;font-size:10px;font-weight:normal">aktiv</span>' . $tick_icon_13;
    } else {
        return '<span title="die Einstellung &auml;ndern Sie mit dem Konfigurations-Assistenten" style="margin:4px;color:#c33;font-size:10px;font-weight:normal">deaktiviert</span>' . $cross_icon_13;
    }
}


function app_time_zone_offset()
{
    $o = TIME_ZONE_OFFSET;
    if (!get_dv_bool('app_now_is_sommerzeit ')) $o = $o - 1;
    $o = intval($o);
    if ($o > 0) {
        return '+' . $o;
    } else {
        return '-' . $o;
    }

}

function date_from_timestamp_from_servertime($timestamp, $dformat = 'd.m.Y H:i')
{

    $diff = intval(app_time_zone_offset());
    $diff_secs = $diff * 60 * 60;
    $timestamp = $timestamp + $diff_secs;
    return date($dformat, $timestamp);
}

function date_from_sqldate_from_servertime($sqldate, $dformat = 'd.m.Y H:i')
{
    $timestamp = getTimestampFromSQLDate($sqldate);
    $diff = intval(app_time_zone_offset());
    $diff_secs = $diff * 60 * 60;
    $timestamp = $timestamp + $diff_secs;
    return date($dformat, $timestamp);
}

//date_from_sql($orders['date_purchased'],'d.m.y H:i') = ohne DIFF


function get_config($conf_key)
{
    return get_config_value_byKey($conf_key);
}

function set_config($conf_key, $val)
{
    set_configuration_val($conf_key, $val);
}

function get_conf_field($c_key, $field)
{
    $sql = "select " . $field . " from configuration where configuration_key = '" . $c_key . "' ";
    return lookup($sql, $field);
}

function set_conf_field($c_key, $field, $value)
{
    $sql = "update configuration set " . $field . " = '" . $value . "'  where configuration_key = '" . $c_key . "' ";
    q($sql);
}

function get_config_title($conf_key)
{
    $sql = "select title from configuration where configuration_key= '" . $conf_key . "' ";
    return lookup($sql, 'title');
}


function set_config_title($conf_key, $val)
{
    q("update configuration set title = '" . $val . "' where configuration_key='" . $conf_key . "' ");
}


function get_config_description($conf_key)
{
    $sql = "select description from configuration where configuration_key= '" . $conf_key . "' ";
    return lookup($sql, 'description');

}


function set_config_description($conf_key, $val)
{
    q("update configuration set description = '" . $val . "' where configuration_key='" . $conf_key . "' ");
}


function get_plain_text_editor_config($t_key, $before_txt = '', $after_txt = '', $style = '', $force_text_area = false)
{
    $x = '
' . $before_txt . '
<span class="axupd_1" style="' . $style . ';font-size:1.3em" id="plain_txt_' . $t_key . '">' .

        trim(get_configuration_val($t_key)) .

        '</span>' . $after_txt . '
<script>new Ajax.InPlaceEditor(\'' . 'plain_txt_' . $t_key . '\', \'ax_updater.php?id=1694_' . $t_key . '\',{rows:1,okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - max. 255 Zeichen\'});</script>
';


    return $x;
}


function get_conf_editor_by_key($key)
{
    return get_conf_editor_by_key2($key, false);
    /*
$sql="select * from configuration where configuration_key = '".$key."' limit 1 ";
$sql_result = q($sql);
while ($row = mysql_fetch_array($sql_result)){
$configuration_id = $row["configuration_id"]; // int 11
$configuration_title = $row["configuration_title"]; // var 64
$configuration_key = $row["configuration_key"]; // var 64
$configuration_value = $row["configuration_value"]; // var 255
$configuration_description = $row["configuration_description"]; // var 255
$configuration_group_id = $row["configuration_group_id"]; //int 11
$sort_order = $row["sort_order"]; //int 5
$use_function = $row["use_function"]; // var 255
$set_function = $row["set_function"]; // var 255
}

//if ($t_key_txt<>'') $t_key_txt = $t_key_txt.': ';
$qedit_outer_style='';
$txt.= '<div class="qedit_outer" style="text-align:left;'.$qedit_outer_style.'">';

//$txt.= '<div><span class="onlydev">'.$key.'</span></div>';

if(is_dev()){

		$href='help_2_adm.php?url=popup_admin_bearb_config.php?p='.$configuration_id;
		$text=''.$configuration_id;
		$title='DEV: Config-Editor '.$configuration_id;
		$class='button2';
		$style='';
		$width='920';
		$height='650';
		$type='il';
		$link = make_link2($href,$text,$title,$class,$style,$width,$height,$type);

		$txt.= '<span style="margin-left:2px;margin-right:12px;float:left" class="onlydev">'.$link.'</span><span class="onlydev">'.$key.'</span>';

}else{
		//$txt.= '<span class="onlydev">'.$key.'</span>';
}


//$txt.='<div style="margin:12px 0 0 0;font-weight:bold;color:#009">'.$configuration_title.'</div>';

//$txt.='<div style="margin:6px 0;font-weight:normal;color:#444;font-size:0.9em">'.$configuration_description.'</div>';

$txt.='<div class="configuration_title">'.$configuration_title.'</div>';

$txt.='<div class="configuration_description">'.$configuration_description.'</div>';

$txt.='<div>'.get_plain_text_editor_config($configuration_key).'<span style="margin:0 0 0 9px;font-weight:normal;color:#999;font-size:0.8em">&laquo; Text klicken zum Editieren - max. 255 Zeichen. '.help_icon_by_key('configuration_wizard_plain_text_editor',$hi_txt='Hilfe',$hi_title='Hilfe zum Simple-Editor - Popup').'</span></div>';

if(is_dev()){

$txt.='<div style="margin:6px 0 0 0;font-weight:normal;color:#666;font-size:0.8em">GroupID: '.$configuration_group_id.' - SortOrder: '.$sort_order.'</div>';
$txt.='<div style="margin:6px 0 0 0;font-weight:normal;color:#666;font-size:0.8em">UseFunction: '.$use_function.' - SetFunction: '.$set_function.'</div>';


}

$txt.='</div>';
return $txt;
*/
}


function get_conf_editor_by_key2($key, $use_InPlaceRichEditor = false, $force_text_area = false)
{

    global $assi_title;

    $sql = "select * from configuration where configuration_key = '" . $key . "' limit 1 ";
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $configuration_id = $row["configuration_id"]; // int 11
        $configuration_title = $row["configuration_title"]; // var 64
        $configuration_key = $row["configuration_key"]; // var 64
        $configuration_value = $row["configuration_value"]; // var 255
        $configuration_description = $row["configuration_description"]; // var 255
        $configuration_group_id = $row["configuration_group_id"]; //int 11
        $sort_order = $row["sort_order"]; //int 5
        $use_function = $row["use_function"]; // var 255
        $set_function = $row["set_function"]; // var 255
    }
    mysql_free_result($sql_result);

// �bernehemen in diverses damit in Suche erscheint 
    if ($assi_title <> '') {
        $sql = "select * from diverses where div_what = '" . $configuration_key . "' ";
        if (anz_records($sql) == 0) {
            //$tempx = 'neu - not found'	;
            $sql = "select * from diverses where assi_title = '" . $assi_title . "' and assi_url <>'' and is_hidden <>'1' ";
            $sql_result = q($sql);
            while ($row = mysql_fetch_array($sql_result)) {
                $div_id = $row["div_id"];
                $div_what = $row["div_what"];
                $div_res = $row["div_res"];
                $div_res_long = $row["div_res_long"];
                //$div_res_default = $row["div_res_default"];
                //$div_res_long_default = $row["div_res_long_default"];
                $nr = $row["nr"];
                $context = $row["context"];
                $funktion = $row["funktion"];
                $bemerkung = $row["bemerkung"];
                $bemerkung_long = $row["bemerkung_long"];
                $app_top = $row["app_top"];
                $rel1 = $row["rel1"];
                $rel2 = $row["rel2"];
                $modul = $row["modul"]; ////////////////////////// set to CONF
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
            $assi_typ = 'text';
            if (strtoupper($configuration_value) == 'FALSE') {
                $configuration_value = 0;
                $assi_typ = 'bool';
            }
            if (strtoupper($configuration_value) == 'TRUE') {
                $configuration_value = 1;
                $assi_typ = 'bool';
            }

            $sql = "insert into diverses set 
			div_what = '" . $configuration_key . "', modul = 'CONF', t_key_txt = '" . addslashes($configuration_title) . "', t_key_comment = '" . addslashes($configuration_description) . "', div_res = '" . $configuration_value . "',
			assi_title = '" . $assi_title . "',
			assi_url = '" . $assi_url . "',
			assi_typ = '" . $assi_typ . "',
			help_key = '" . $help_key . "',
			design_assi_url = '" . $design_assi_url . "',
			c1 = '1',
			lv1 = '" . $lv1 . "',
			lv2 = '" . $lv2 . "',
			lv3 = '" . $lv3 . "',
			lv4 = '" . $lv4 . "',
			lv5 = '" . $lv5 . "',
			assi_type = '" . $assi_type . "'
			";
            q($sql);

        }

    }

    //immer:
    $sql = "update diverses set t_key_txt = '" . addslashes($configuration_title) . "', t_key_comment = '" . addslashes($configuration_description) . "' where modul = 'CONF' and div_what = '" . $configuration_key . "' ";
    q($sql);

//set_dv($configuration_key,$configuration_value);	


//if ($t_key_txt<>'') $t_key_txt = $t_key_txt.': ';
    $qedit_outer_style = '';
    $txt .= '<a name="' . $key . '" id="a_' . $key . '"></a><div class="qedit_outer" style="text-align:left;' . $qedit_outer_style . '">';

//$txt.= '<div><span class="onlydev">'.$key.'</span></div>';

    if (is_dev()) {

        $href = 'help_2_adm.php?url=popup_admin_bearb_config.php?p=' . $configuration_id;
        $text = '' . $configuration_id;
        $title = 'DEV: Config-Editor ' . $configuration_id;
        $class = 'button2';
        $style = '';
        $width = '920';
        $height = '650';
        $type = 'il';
        $link = make_link2($href, $text, $title, $class, $style, $width, $height, $type);

        $txt .= '<span style="margin-left:2px;margin-right:12px;float:left" class="onlydev">' . $link . '</span><span class="onlydev">' . $key . '</span>';

    } else {
        //$txt.= '<span class="onlydev">'.$key.'</span>';
    }


//$txt.='<div style="margin:12px 0 0 0;font-weight:bold;color:#009">'.$configuration_title.'</div>';

//$txt.='<div style="margin:6px 0;font-weight:normal;color:#444;font-size:0.9em">'.$configuration_description.'</div>';

//$txt.='<div class="configuration_title">'.$configuration_title.'</div>';


    $txt .= '<a id="' . $configuration_key . '"></a>
<div style="margin:6px 0 0 0;font-weight:bold;color:#009" >
<div id="tobeedited_title_' . $configuration_key . '">
' . $configuration_title . '</div></div>
';
    if (is_dev()) {

        $txt .= '
	<script>
	new Ajax.InPlaceRichEditor($(\'tobeedited_title_' . $configuration_key . '\'), \'ax_updater.php?id=1701_' . $configuration_key . '_xyx_configuration_title\', {okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - Text unbegrenzt\'}, tinymce_options);
	</script>
	';

    }


//$txt.='<div class="configuration_description">'.$configuration_description.'</div>';
    $txt .= '
<div style="margin:6px 0 0 0;" >
<div class="qedit_comment" id="tobeedited_description_' . $configuration_key . '">
' . $configuration_description . '</div></div>
';
    if (is_dev()) {

        $txt .= '
	<script>
	new Ajax.InPlaceRichEditor($(\'tobeedited_description_' . $configuration_key . '\'), \'ax_updater.php?id=1701_' . $configuration_key . '_xyx_configuration_description\', {okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - Text unbegrenzt\'}, tinymce_options);
	</script>
	';

    }


    /*
$txt.='<div style="margin:9px 0 0 0;font-weight:normal;color:#999;font-size:0.66em">In den Text klicken zum Editieren - kein HTML - max. 255 Zeichen:</div>
<div>'.get_plain_text_editor_config($configuration_key).'</div>';
*/

    /*
$txt.='<div style="margin:9px 0 0 0;font-weight:normal;color:#999;font-size:0.66em">In den Text klicken zum Editieren - kein HTML - max. 255 Zeichen:</div>
<div><form id="form_'.$configuration_id.'"><textarea theme="simple" name="txt_'.$configuration_id.'" id="txt_'.$configuration_id.'">xxxxxxxxx'.$configuration_value.'</textarea></form></div>';
*/


//if (is_dev() or $use_InPlaceRichEditor) {
    if ($use_InPlaceRichEditor) {

        $txt .= '<div style="margin:9px 0 0 0;font-weight:normal;color:#999;font-size:0.66em">
	
	&laquo; Text klicken zum Editieren - kein HTML - max. 255 Zeichen: ' . help_icon_by_key('configuration_wizard_enh_html_editor', $hi_txt = 'Hilfe', $hi_title = 'Hilfe zum erweiterten Editor 2 - Popup') . '</div>
	<div>';

//$force_text_area
        if (trim($configuration_value == '')) $configuration_value = '&nbsp;';
        $configuration_title = lookup('select configuration_title from configuration where configuration_key = "' . $configuration_key . '" ', 'configuration_title');
        $txt .= '
	<div class="content_tobeedited" style="border: 2px #abc solid;background:#ffe;font-size:1.1em"
	onclick="
	pop_il(\'popup_edit_text_long_all_tables.php?tab=configuration&amp;field=configuration_value&amp;id_fn=configuration_key&amp;id=' . $configuration_key . '&amp;disallow_new_window=0&amp;curPageName=startseite_blocks.php&pagetitle=' . $configuration_title . '\')">
	<div id="tobeedited_' . $configuration_key . '">' . $configuration_value . '</div></div>';
        /*	
popup_edit_text_long_all_tables.php?tab=configuration&amp;field=configuration_value&amp;id_fn=configuration_key&amp;id=STORE_NAME_ADDRESS&amp;disallow_new_window=0&amp;curPageName=startseite_blocks.php&pagetitle=deutsch

	$txt.='
	<script>
	new Ajax.InPlaceRichEditor($(\'tobeedited_'. $configuration_key.'\'), \'ax_updater.php?id=1701_'. $configuration_key.'_xyx_configuration_value\', {okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - Text unbegrenzt\'}, tinymce_advanced_options);
	</script>
	';
*/
//$txt.='</div>';	

    } else {


        $txt .= '<div style="margin:9px 0 0 0;font-weight:normal;color:#999;font-size:1.0em">' . get_plain_text_editor_config($configuration_key) . '
<span style="font-size:0.7em;margin-left:6px"> in den Text klicken zum Editieren - max. 255 Zeichen!' . help_icon_by_key('admin_all_text_editors_simple', $hi_txt = 'Hilfe', $hi_title = 'einfacher Text-Editor - Popup') . '</span></div>
<div></div>';


    }


    if (is_dev()) {

        $txt .= '<div style="margin:6px 0 0 0;font-weight:normal;color:#666;font-size:0.8em">GroupID: ' . $configuration_group_id . ' - SortOrder: ' . $sort_order . '</div>';
        $txt .= '<div style="margin:6px 0 0 0;font-weight:normal;color:#666;font-size:0.8em">UseFunction: ' . $use_function . ' - SetFunction: ' . $set_function . ' ' . $assi_title . ' </div>';


        $txt .= '<div style="margin:6px 0 0 0;font-weight:normal;color:#666;font-size:0.8em">' . get_dev_link_short($configuration_key) . ' </div>';


    }

    $txt .= '</div>';
    return $txt;

}


function get_conf_checkbox_by_key($key, $show_hide_div = false)
{

    global $assi_title;

    $sql = "select * from configuration where configuration_key = '" . $key . "' limit 1 ";
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $configuration_id = $row["configuration_id"]; // int 11
        $configuration_title = $row["configuration_title"]; // var 64
        $configuration_key = $row["configuration_key"]; // var 64
        $configuration_value = $row["configuration_value"]; // var 255
        $configuration_description = $row["configuration_description"]; // var 255
        $configuration_group_id = $row["configuration_group_id"]; //int 11
        $sort_order = $row["sort_order"]; //int 5
        $use_function = $row["use_function"]; // var 255
        $set_function = $row["set_function"]; // var 255
    }
    mysql_free_result($sql_result);
    $config_key = $configuration_key;

//if ($t_key_txt<>'') $t_key_txt = $t_key_txt.': ';
    $qedit_outer_style = '';
    $txt .= '<a name="' . $key . '" id="a_' . $key . '"></a><div class="qedit_outer" style="text-align:left;' . $qedit_outer_style . '">';

//$txt.= '<div><span class="onlydev">'.$key.'</span></div>';


// �bernehemen in diverses damit in Suche erscheint
    if ($assi_title <> '') {
        $sql = "select * from diverses where div_what = '" . $configuration_key . "' ";
        if (anz_records($sql) == 0) {
            //$tempx = 'neu - not found'	;
            $sql = "select * from diverses where assi_title = '" . $assi_title . "' and assi_url <>'' and is_hidden <>'1' ";
            $sql_result = q($sql);
            while ($row = mysql_fetch_array($sql_result)) {
                $div_id = $row["div_id"];
                $div_what = $row["div_what"];
                $div_res = $row["div_res"];
                $div_res_long = $row["div_res_long"];
                //$div_res_default = $row["div_res_default"];
                //$div_res_long_default = $row["div_res_long_default"];
                $nr = $row["nr"];
                $context = $row["context"];
                $funktion = $row["funktion"];
                $bemerkung = $row["bemerkung"];
                $bemerkung_long = $row["bemerkung_long"];
                $app_top = $row["app_top"];
                $rel1 = $row["rel1"];
                $rel2 = $row["rel2"];
                $modul = $row["modul"]; ////////////////////////// set to CONF
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
            //$assi_typ = 'text';
            if (strtoupper($configuration_value) == 'FALSE') {
                $configuration_value = 0;
                //$assi_typ = 'bool';
            }
            if (strtoupper($configuration_value) == 'TRUE') {
                $configuration_value = 1;
                //$assi_typ = 'bool';
            }

            $assi_typ = 'bool';

            $sql = "insert into diverses set 
			div_what = '" . $configuration_key . "', modul = 'CONF', t_key_txt = '" . addslashes($configuration_title) . "', t_key_comment = '" . addslashes($configuration_description) . "', div_res = '" . $configuration_value . "',
			assi_title = '" . $assi_title . "',
			assi_url = '" . $assi_url . "',
			assi_typ = '" . $assi_typ . "',
			help_key = '" . $help_key . "',
			design_assi_url = '" . $design_assi_url . "',
			c1 = '1',
			lv1 = '" . $lv1 . "',
			lv2 = '" . $lv2 . "',
			lv3 = '" . $lv3 . "',
			lv4 = '" . $lv4 . "',
			lv5 = '" . $lv5 . "',
			assi_type = '" . $assi_type . "'
			";
            q($sql);

        }

    }


    //immer:
    $sql = "update diverses set t_key_txt = '" . addslashes($configuration_title) . "', t_key_comment = '" . addslashes($configuration_description) . "' where modul = 'CONF' and div_what = '" . $configuration_key . "' ";
    q($sql);


    if (is_dev()) {

        $href = 'help_2_adm.php?url=popup_admin_bearb_config.php?p=' . $configuration_id;
        $text = '' . $configuration_id;
        $title = 'DEV: Config-Editor ' . $configuration_id;
        $class = 'button2';
        $style = '';
        $width = '920';
        $height = '650';
        $type = 'il';
        $link = make_link2($href, $text, $title, $class, $style, $width, $height, $type);

        $txt .= '<span style="margin-left:2px;margin-right:12px;float:left" class="onlydev">' . $link . '</span><span class="onlydev">' . $key . '</span>';

    } else {
        //$txt.= '<span class="onlydev">'.$key.'</span>';
    }


    $txt .= '<div class="configuration_title">' . $configuration_title . '</div>';

    $txt .= '<div class="qedit_comment">' . $configuration_description . '</div>';

//$txt.='<div style="margin:9px 0 0 0;font-weight:normal;color:#999;font-size:0.66em">In den Text klicken zum Editieren - kein HTML - max. 255 Zeichen:</div><div>'.get_plain_text_editor_config($configuration_key).'</div>';
    $get_configuration_val = get_configuration_val($config_key);

    if ($get_configuration_val == "true" or $get_configuration_val == "True") {
        $checked_txt = ' checked="checked" ';
    } else {
        $checked_txt = '';
    }

    $txt .= '<div style="margin:0 0 6px 0">
<span id="' . $config_key . '_conf" class="ax_result" style="margin-left:12px;margin-right:12px;font-size:1.0em">
' . get_configuration_val_bool($config_key) . '
</span>
<label class=\'pc_checkbox\' title=\'zum &auml;ndern klicken\'>';

    if ($show_hide_div) {
        $txt .= '<input onclick="ax_checkbox_to_configuration_active_inactive_show_hide(this.checked, this.id);" type="checkbox" id="' . $config_key . '" value="1" ' . $checked_txt . ' />';
    } else {
        $txt .= '<input onclick="ax_checkbox_to_configuration_active_inactive(this.checked, this.id);" type="checkbox" id="' . $config_key . '" value="1" ' . $checked_txt . ' />';
    }

    $txt .= '</label> 
</span></div>
';


    if (is_dev()) {

        $txt .= '<div style="margin:6px 0 0 0;font-weight:normal;color:#666;font-size:0.8em">GroupID: ' . $configuration_group_id . ' - SortOrder: ' . $sort_order . '</div>';
        $txt .= '<div style="margin:6px 0 0 0;font-weight:normal;color:#666;font-size:0.8em">UseFunction: ' . $use_function . ' - SetFunction: ' . $set_function . '</div>';


    }

    $txt .= '</div>';
    return $txt;

}

function self_def_link_array()
{
    global $app_anzahl_self_def_link;
    $list = '';
    for ($i = 1; $i <= $app_anzahl_self_def_link; $i++) {
        $list .= 'self_def_link' . $i . ',';
    }
    $arr = explode(",", $list);
    return $arr;
}

function self_def_box_right_array()
{
    global $app_anzahl_self_def_box;
    $list = '';
    for ($i = 1; $i <= $app_anzahl_self_def_box; $i++) {
        $list .= 'self_def_box_right' . $i . ',';
    }
    $arr = explode(",", $list);
    return $arr;
}

function self_def_box_left_array()
{
    global $app_anzahl_self_def_box;
    $list = '';
    for ($i = 1; $i <= $app_anzahl_self_def_box; $i++) {
        $list .= 'self_def_box_left' . $i . ',';
    }
    $arr = explode(",", $list);
    return $arr;
}

function content_configure_option_list_content($use_header)
{

    $para = 'is_active';
    $sql = 'select * from diverses where div_what like "%' . $para . '%" order by t_key_txt';
    $res = q($sql);
    $i = 0;
    while ($row = mysql_fetch_array($res)) {
        $id = $row["div_id"];
        $div_what = $row["div_what"];
        $div_res = $row["div_res"];
        $div_res_long = $row["div_res_long"];
        $t_key_detail_link = $row["t_key_detail_link"];
        $t_key_txt = $row["t_key_txt"];

        $i++;

        /*
ec($i.'. '.str_replace('_is_active','',$div_what) .' - '.strip_tags(get_t_key_txt($div_what,true)) .'
<br><span style="font-size:0.8em;"><a style="color:#888" target="_blank" href="'.get_t_key_detail_link($div_what).'">'.get_t_key_detail_link($div_what).'</a></span>' );

*/

        $str .= '<option value="' . $t_key_detail_link . '">' . $i . '. ' . $t_key_txt . '</option>';

    }
    mysql_free_result($res);
    return $str;  // dekativiert

}


function content_configure_option_list_content_alt($use_header)
{


    $x = '

      <optgroup label="Link bearbeiten zu...">
        <option label="x" value="quick_config_boxes/config_box_myblog.php">Blog</option>
        <option label="x" value="quick_config_boxes/config_box_gallery.php">Bilder-Galerie</option>
        <option label="x" value="">Video-Galerie</option>
		  <option label="x" value="">Audio-Galerie</option>
        <option label="x" value="">PDF Download-Seite</option>
		  <option label="x" value="">FLASH-Paper Download-Seite</option>
		  <option label="x" value="">Link-Liste</option>	  
        <option label="x" value="">???</option>		  		  
      </optgroup>

      <optgroup label="Elemente im Header">
        <option label="x" value="quick_config_boxes/config_box_top_nav.php">Top Link-Bar</option>
        <option label="x" value="">Tools-Bar (Seiten-Übersetzung, Währungen, Suchen )</option>
		  <option label="x" value="quick_config_boxes/config_box_top_hint.php">Text-Hinweis oben</option>
        <option label="x" value="">Teaser1 Startseite</option>
        <option label="x" value="">Teaser2 alle Seiten</option>		  
      </optgroup>

      <optgroup label="Boxen links">
        <option label="Berta">Berta</option>
        <option label="Barbara">Barbara</option>
        <option label="Bernhard">Bernhard</option>
      </optgroup>

      <optgroup label="Boxen rechts">
        <option label="x" value="">Berta</option>
      </optgroup>


      <optgroup label="Elemente im Footer">
        <option label="x" value="quick_config_boxes/config_box_order_phone.php">Footer Telefon-Nummer</option>
        <option label="x" value="quick_config_boxes/config_box_footer_boxes.php">Footer Boxen</option>
        <option label="x" value="quick_config_boxes/config_box_footer_hint_box.php">Footer Hinweise</option>
        <option label="x" value="">Footer Linkbar</option>
        <option label="x" value="">Footer Bottom-Linkbar</option>		  
      </optgroup>

      <optgroup label="Module">
        <option label="Module" value="quick_config/config_overview_modul.php">Module Übersicht - Elemente ein- oder abschalten</option>
		  <option label="x" value="">Wunschliste - Details konfigurieren</option>
		  <option label="x" value="">Sterne-Bewertung - Details konfigurieren</option>
		  <option label="x" value="">Besucher-Kommentare - Details konfigurieren </option>
		  <option label="x" value="">Gästebuch - Details konfigurieren</option>
		  <option label="x" value="">Rabatt-Coupons - Details konfigurieren</option>
		  <option label="x" value="">Pageears - Details konfigurieren</option>
		  <option label="x" value="">Google-Map - Details konfigurieren</option>
		  <option label="x" value="">Videos - Details konfigurieren</option>
		  <option label="x" value="">Audios - Details konfigurieren</option>		  		  		  		  		  		  		  		  
		  <option label="x" value="">Social-Bookmarks (Addthis) - Details konfigurieren</option>		  		  		  		  		  		  		  		  

      </optgroup>

      <optgroup label="Texte">
        <option label="x" value="">Öffnungszeiten</option>
        <option label="x" value="">Formulare</option>
        <option label="x" value="">ausgehende Emails</option>
        <option label="x" value="">Widerrufsrecht</option>
		  <option label="x" value="">Liefer- und Zahlungsbedingungen</option>
		  <option label="x" value="">Distanzierung von externen Links</option>
		  		  
      </optgroup>



      <optgroup label="rechtlich relevante Seiten">
        <option label="x" value="">Impressum</option>
        <option label="x" value="">AGBs</option>
        <option label="x" value="">Datenschutz und Privacy</option>
        <option label="x" value="">Widerrufsrecht</option>
		  <option label="x" value="">Liefer- und Zahlungsbedingungen</option>
		  <option label="x" value="">Distanzierung von externen Links</option>
		  		  
      </optgroup>


      <optgroup label="Sonstiges">
        <option label="x" value="">Meta-Tags</option>
        <option label="x" value="">robots.txt</option>
        <option label="x" value="">FavIcon hochladen</option>
		  		  
      </optgroup>





';
    return deuml($x);
}


function content_configure_option_list($use_header)
{
// deaktiviert
    /*
open_this_config(this.options[selectedIndex].value,this.options[selectedIndex].text)
open_this_config_url(this.options[selectedIndex].value)
*/

    $on_change_action = 'open_this_config_url(this.options[selectedIndex].value,this.options[selectedIndex].text)';

    $x = '
<select id="conf_option_list" style="" onchange="' . $on_change_action . '">
<option value="">Ein anderes Element konfigurieren &raquo; </option>

' . content_configure_option_list_content($use_header) . '

</select>

';
//return deuml($x);
}


function get_open_in_array()
{
    /*
$values = array(
'popup'=>'als Inline-Popup <span class="grey10">(die Fenstergr&ouml;sse k&ouml;nnen Sie unten festlegen)</span>', 
'newpage'=>'in neuem Browser-Fenster <span class="grey10">(das aktuelle Fenster bleibt ge&ouml;ffnet)</span>',
'bn'=>'im selben Browser-Fenster <span class="grey10">(Standard)</span>'
);
*/

    $values = array(
        'bn' => 'im selben Browser-Fenster <span class="grey10">(Standard)</span>',
        'popup' => 'als Popup-Fenster <span class="grey10">(die Fenstergr&ouml;sse k&ouml;nnen Sie unten festlegen)</span>',
        'newpage' => 'in neuem Browser-Fenster <span class="grey10">(das aktuelle Fenster bleibt ge&ouml;ffnet - sinnvoll bei externen Links)</span>'

    );

    return $values;

}


function dynamic_radio_group2($formelement, $values, $html, $def_value = '', $t_key)
{
    $radio_group = '<div>' . "\n";
    $radio_group .= (!empty($html['label'])) ? $html['label'] . "\n" : '';

    if (isset($_REQUEST[$formelement])) {
        $curr_val = stripslashes($_REQUEST[$formelement]);
    } elseif (isset($def_value) && !isset($_REQUEST[$formelement])) {
        $curr_val = $def_value;
    } else {
        $curr_val = "";
    }
    foreach ($values as $key => $val) {
        $radio_group .= $html['before'] . "\n";
        //$radio_group .= '<input name="radio_'.$t_key.'" type="radio" value="'.$key.'"';
        $radio_group .= '<input name="radio_' . $t_key . '" id="radio_' . $t_key . '" type="radio" value="' . $key . '"';
        $radio_group .= ($curr_val == $key) ? ' checked="checked" />' : ' />';
        //$radio_group .= ' '.$val."\n".$html['after']."\n";
        $radio_group .= ' <span style="font-size:1.1em;font-weight:bold;color:#009">' . $val . "</span>" . $html['after'] . "";
    }
    $radio_group .= '</div>' . "\n";
    return $radio_group;
}


function get_radio_box($formelement, $values, $def_value = '', $t_key, $legend = '', $hint = '', $show_hint = true)
{
    global $assi_title, $allow_assi_title_write;

    /*
$sql_div="update diverses set assi_typ='radio', mtime=".microtime(true).", assi_url = '".getParam('item','')."', assi_title='".$assi_title."' where div_what = '".$t_key."' "  ;
if( getParam('item','') and $assi_title<>'' and to_bool($allow_assi_title_write) ) q($sql_div);
*/

    $sql_div = "update diverses set assi_typ='radio' where div_what = '" . $t_key . "' ";
    q($sql_div);


    if ($show_hint) {
        if ($hint <> '') $hint_box = '<div class="qedit_comment" style="margin:1px 6px 6px 0;">' . $hint . '</div>';
    } else {
        $hint_box = '';
    }


    $html = array(
        'before' => '<label class="pc_radiobutton">',
        'after' => '</label><br />',
        'label' => '<label for="nix">' . $hint_box . '<span class="onlydev">' . $t_key . '</span></label><br />');

    $form = '<a name="rb' . $t_key . '" id="a_' . $t_key . '"></a><div class="qedit_outer" style="text-align:left;">
<form id="' . $formelement . '">
<fieldset 
 onchange="radio_to_db(getCheckedValue(document.forms[\'' . $formelement . '\'].elements[\'radio_' . $t_key . '\']),\'' . $t_key . '\');"  
 id="pc_radiobutton_' . $t_key . '" >
<legend style="font-weight:bold;color:#009;padding:0 6px 2px 6px">' . $legend . '</legend>
' . dynamic_radio_group2($formelement, $values, $html, $def_value, $t_key, $hint) . '
</fieldset>	
</form></div>	
';

    return $form;

}

function on_which_pages_array()
{
    $values = array(
        'all_pages' => 'immer auf allen Seiten anzeigen <span class="grey10"></span>',
        'start_only' => 'nur auf der Startseite anzeigen <span class="grey10"></span>',
        'everywhere_but_on_start' => 'auf allen Seiten ausser der Startseite anzeigen <span class="grey10"></span>'
    );
    return $values;
}

function get_radio_box_small($formelement, $values, $def_value = '', $t_key, $legend = '', $width = '900px', $use_br = false)
{

    if (is_dev()) {
        if ($use_br) {
            $txt_al = 'left';
            $html = array(
                'before' => '<label class="pc_radiobutton">',
                'after' => '</label><br />',
                'label' => '<label for="nix"><span class="onlydev">' . $t_key . '</span></label><br />');

        } else {
            $txt_al = 'center';
            $html = array(
                'before' => '<label class="pc_radiobutton">',
                'after' => '</label> &nbsp; | &nbsp;  ',
                'label' => '<label for="nix"><span class="onlydev">' . $t_key . '</span></label><br />');
        }
    } else {
        if ($use_br) {
            $txt_al = 'left';
            $html = array(
                'before' => ' <label class="pc_radiobutton">',
                'after' => '</label><br/ >',
                'label' => '');

        } else {
            $txt_al = 'center';
            $html = array(
                'before' => ' <label class="pc_radiobutton">',
                'after' => '</label> &nbsp; | &nbsp;  ',
                'label' => '');
        }
    }

//ec(__file__.'<br>'.__function__.' '.__line__.': '.$formelement.' - '.$def_value.' - '.$use_br.' ');

    $form = '<div class="_qedit_outer" style="text-align:' . $txt_al . ';width:' . $width . ';margin:0  auto">
<form id="' . $formelement . '" style="margin:0">
<fieldset style="margin:0;color:#666;line-height:150%" 
 onchange="radio_to_db(getCheckedValue(document.forms[\'' . $formelement . '\'].elements[\'radio_' . $t_key . '\']),\'' . $t_key . '\');"  
 id="pc_radiobutton_' . $t_key . '" >
<legend style="font-weight:normal;padding:0 6px 2px 6px;color:#555;margin:0;">' . $legend . '</legend>
' . dynamic_radio_group2($formelement, $values, $html, $def_value, $t_key, $hint) . ' 
</fieldset>	
</form></div>	
';

    return $form;

}


function get_open_in_setting($t_key)
{
    $x = get_dv($t_key);
    /* 
type: 
bn  Browser normal
bb  Browder _blank
pop   normales javascript popup
il    lightwindow
wx  windows
mo  modal
*/

    switch ($x) {
        case 'popup':
            return 'il';
            break;
        case 'newpage':
            return 'bb';
            break;
        case 'bn':
            return 'bn';
            break;
        case 'pop':
            return 'pop';
            break;
        case 'mo':
            return 'mo';
            break;

        default:
            return 'il';

    }


}


function get_shop_link($t_key, $class = '', $style = '', $add_span = false, $pure_href = false, $span_id = '')
{
    global $app_top_screenheight, $app_top_screenwidth, $shop_url, $catalog_url, $tabs_topd_as_bar_bg_props_color;
    global $SID;

    $link_text = get_dv($t_key . '_link_text');
    if ($add_span) $link_text = '<span>' . $link_text . '</span>';


    $link_hover_title = get_dv($t_key . '_link_hover_title');

    $link_type = get_dv($t_key . '_link_type'); // external_link - product_link - category_link  - internal_link 
    $url = get_dv($t_key . '_url'); // extern

    $link_product = get_dv($t_key . '_link_product');
    $link_cat = get_dv($t_key . '_link_cat');
    $link_manuf = get_dv($t_key . '_link_manuf');
    $link_page = get_dv($t_key . '_link_page');

//ec(__line__.' '.$t_key);
//ec(__line__.' '.$link_cat);

    $link_open_in = get_dv($t_key . '_link_open_in'); // bn (browser normal) - newpage - popup

    if ($link_open_in == 'popup') {
        $link_open_in_width = get_dv($t_key . '_link_open_in_width');
        $link_open_in_height = get_dv($t_key . '_link_open_in_height');
        if ($link_open_in_width == 0) $link_open_in_width = '';
        if ($link_open_in_height == 0) $link_open_in_height = '';


        $link_open_in_class = 'lightwindow ';
        $params = ' params="lightwindow_type=external,lightwindow_width=' . $link_open_in_width . ',lightwindow_height=' . $link_open_in_height . '" ';
    } else {
        $link_open_in_class = '';
        $params = '';
    }

    if ($link_open_in == 'newpage') {
        $target = ' target="_blank" ';
    } else {
        $target = '';
    }


    if ($link_type == 'self_def_page_link') {
        $page = get_dv($t_key . '_link_self_def_page');
        if ($link_open_in == 'popup') {
            $curr_page = get_dv($page . '_box_curr');
            //$href= DIR_WS_FULL.'includes/languages/german/'.$curr_page;
            //$url= DIR_WS_FULL.'wrapper_all.php?incl=includes/languages/german/sdp/'.$curr_page.'&'.$SID;

            $url = $catalog_url . 'wrapper_all.php?incl=includes/languages/german/sdp/' . $curr_page . '&' . $SID;
        } else {
            //$url= DIR_WS_FULL.'wrapper_full.php?sdp='.$page.'&'.$SID;
            $url = $catalog_url . 'wrapper_full.php?sdp=' . $page . '&' . $SID;

        }
        $x = '
			<a ' . $target . ' title="' . $link_hover_title . '" class="' . $link_open_in_class . $class . '" style="' . $style . '" ' . $params . ' 
			href="' . $url . '">
			' . $link_text . '</a>		
		';

    }

    if ($link_type == 'external_link') {

        $x = '
<a ' . $target . ' title="' . $link_hover_title . '" class="' . $link_open_in_class . $class . '" style="' . $style . '" ' . $params . ' 
href="' . $url . '">
' . $link_text . '</a>
';

    }


    if ($link_type == 'product_link') {
        $model = trim($link_product);
        if ($model == '') $model = first_prod_in_shop();

        $sql = "select products_id from products where products_model = '" . $model . "' ";
        $products_id = lookup($sql, 'products_id');

        if ($products_id <> '') {
//$sql="select categories_id from products_to_categories where products_id = ".$products_id."  ";
//$cPath = lookup($sql,'categories_id');
            $cPath = full_cPath_from_products_id($products_id);
        }

        $this_url = $catalog_url . 'product_info.php?cPath=' . $cPath . '&products_id=' . $products_id . '&' . $SID;


        $x = '
<a ' . $target . ' title="' . $link_hover_title . '" class="' . $link_open_in_class . $class . '" style="' . $style . '" ' . $params . ' 
href="' . $this_url . '">
' . $link_text . '</a>
';

    }


    if ($link_type == 'category_link') {

        $this_url = $catalog_url . 'index.php?cPath=' . full_cPath($link_cat) . '&' . $SID;

        $x = '
<a ' . $target . ' title="' . $link_hover_title . '" class="' . $link_open_in_class . $class . '" style="' . $style . '" ' . $params . ' 
href="' . $this_url . '">
' . $link_text . '</a>
';

    }


    if ($link_type == 'manuf_link') {

        $this_url = $catalog_url . 'index.php?manufacturers_id=' . $link_manuf . '&' . $SID;

        $x = '
<a ' . $target . ' title="' . $link_hover_title . '" class="' . $link_open_in_class . $class . '" style="' . $style . '" ' . $params . ' 
href="' . $this_url . '">
' . $link_text . '</a>
';

    }


//if ($link_type=='internal_link' or $link_type=='self_def_page_link' ) {
    if ($link_type == 'internal_link') {

        if (stristr($link_page, '?')) {
            $para_connector = '&';
        } else {
            $para_connector = '?';
//if ( eregiX('?',$link_page) ) $para_connector='&';
        }

        $x = '
<a ' . $target . ' title="' . $link_hover_title . '" class="' . $link_open_in_class . $class . '" style="' . $style . '" ' . $params . ' 
href="' . $link_page . $para_connector . $SID . '">
' . $link_text . '</a>
';

    }


//speziell f�r superfish top-link keep hover color
    if ($add_span and $span_id <> '') {
        $x1 = $this_url;
        if ($x1 == '') $x1 = $link_page;

        $x2 = curPageURL();
        $x3 = get_cPath_from_url($this_url);
        //$x4 = $products_id;


        $same_cat = is_same_cat($x1, $x2, $x3, $products_id);
        $is_media = is_media($x1, $x2, $x3, $products_id);

        //$pos1 = strpos($x1,'products_new.php');
        //$pos2 = strpos($x2,'products_new.php');


        //if($x1==$x2 or $same_cat or $is_media or ( stristr($x2,'products_new.php') and stristr($x1,'products_new.php')  ) or ( stristr($x2,'specials.php') and stristr($x1,'specials.php')  )  ) {
        if ($x1 == $x2 or $same_cat or $is_media or ($x1 == 'products_new.php' and curPageName() == 'products_new.php') or ($x1 == 'specials.php' and curPageName() == 'specials.php')) {
            //ec($x1);
            $x = str_replace('<span>', '<span id="xxx' . $span_id . '" style="background:#fff;color:' . $tabs_topd_as_bar_bg_props_color . '" >', $x); //id mit xxx ! wegen function superfish_top_link_off(id){
            //$x = str_replace('<a ','<a id="'.$span_id.'" ',$x); 
        } else {
            $x = str_replace('<span>', '<span id="' . $span_id . '" style="" >', $x);
        }
    }


    if ($pure_href) {
        $x = str_replace('</a>', '', $x);
        $x = str_replace($link_text, '', $x);
        return $x;
    } else {
        return $x;
    }

}


function is_media($link, $cur_url, $cPath = '', $products_id = '')
{
    if ($cPath == 3) {
        $cur_url_cPath = getParam('cPath', '');
        if (getParam('cPath', '') and (erste_in_cPath() == 36 or erste_in_cPath() == 27 or erste_in_cPath() == 109)) {
            return true;
        } else {
            if (curPageName() == 'product_info.php') {
                $full_cPath_from_products_id = full_cPath_from_products_id(getParam('products_id', ''));

                $cPath_array = explode('_', $full_cPath_from_products_id);
                $current_category_id = $cPath_array[0];

                if ($current_category_id == 3 or $current_category_id == 36 or $current_category_id == 27 or $current_category_id == 109) return true;


            }
        }
    } else {
        return false;
    }
}


function is_same_cat($link, $cur_url, $cPath = '', $products_id = '')
{
    if (curPageName() == 'index.php') {
        if (getParam('cPath', '')) {
            $cur_url_cPath = getParam('cPath', '');
            if (is_in_cPath($cur_url_cPath, $cPath)) return true;
        } else {
            if (getParam('manufacturers_id', '')) {
                $manufacturers_prod_id = lookup('select products_id from products where manufacturers_id = ' . getParam('manufacturers_id', '') . ' limit 1', 'products_id');
                $manufacturers_cat_id = full_cPath_from_products_id($manufacturers_prod_id);
                if (is_in_cPath($manufacturers_cat_id, $cPath)) return true;
            }
        }
    } else {

        if (curPageName() == 'product_info.php') {
            if (is_in_cPath(full_cPath_from_products_id(getParam('products_id', '')), $cPath)) return true;
        } else {


        }
    }

}


function get_cPath_from_url($t_url)
{
    global $SID;
    if (stristr($t_url, 'cPath=')) {
        $qstr_arr = explode('?', $t_url);
        $qstr = $qstr_arr[1];
        $qstr = str_replace('&' . $SID, '', $qstr);

        $qstr_ar2 = explode('=', $qstr);
        $qstr = $qstr_ar2[1];

        return $qstr;
    } else {
        return '';
    }
}


function first_prod_in_shop()
{
    $sql = " select products_model from products order by products_id limit 1";
    return lookup($sql, 'products_model');
}

function get_link_by_key($page, $class = "", $style = "")
{
//$sdp_link = get_link_by_key('dvd_lcode_hint_sdp_',$class="button3",$style="margin-left:18px");
    $master_key = $page;
    $is_active = get_dv_bool($master_key . '_is_active');

    if ($is_active) {
        $link_text = get_dv($page . '_link_text');
        $href = '';
        $text = get_dv($master_key . '_link_text');
        $title = get_dv($master_key . '_link_hover_title');
        //$class="";
        //$style=""; 
        $width = '0';
        $height = '0';
        $type = get_open_in_setting($master_key . '_link_open_in');
        return '' . get_link($href, $text, $title, $class, $style, $width, $height, $type, $add_session = true, $add_span = false, $master_key) . '';
    }
}


function get_link($href, $text, $title, $class, $style, $width, $height, $type, $add_session = false, $add_span = false, $master_key = '', $header_use = false)
{
    global $app_top_screenheight, $app_top_screenwidth;
    global $SID, $catalog_url;

    $add_session = true;
//global $header_use;
    $cl = $class;

//$link_type = get_dv($master_key.'_link_type'); // external_link - product_link - category_link  - internal_link

    if ($header_use) {
        $header_use_add = '&use_header=1';
    } else {
        $header_use_add = '&use_header=0';
    }
    if ($type == 'il' or $type == 'pop' or $type == 'mo') $href = str_replace('use_header=1', 'use_header=0', $href);

    if ($master_key <> '' and !eregiS('_sdp_', $master_key)) {
//self_def_page_link
        $sdp = false;
        if (get_dv($master_key . '_link_type') == 'self_def_page_link') {
            $page = get_dv($master_key . '_link_self_def_page');
            //$curr_page = get_dv($page.'_box_curr');
            //$sdp_key = '';
            if ($type == 'il') {
                $curr_page = get_dv($page . '_box_curr');
                //$href= DIR_WS_FULL.'includes/languages/german/'.$curr_page;
                $href = $catalog_url . 'wrapper_all.php?incl=includes/languages/german/sdp/' . $curr_page;
            } else {
                $href = 'wrapper_full.php?sdp=' . $page;
            }
        }

    }

    if ($master_key <> '' and eregiS('_sdp_', $master_key)) {
        //self_def_page
        $sdp = true;
        if ($type == 'il') {
            $curr_page = get_dv($master_key . '_box_curr');
            //$href= $catalog_url.'wrapper_all.php?incl=includes/languages/german/sdp/'.$curr_page;
            $href = 'wrapper_all.php?incl=includes/languages/german/sdp/' . $curr_page;
            if ($add_session) $href = $href . '&' . $SID;
        } else {
            $href = 'wrapper_full.php?sdp=' . $master_key;
        }

    }


    if ($type == 'bb' or $type == 'bn') {
        $href = str_replace('wrapper_all.php', 'wrapper_full.php', $href);
        if ($add_session and !strstr($href, $SID)) $href = $href . '&' . $SID;
    }

    if ($add_span) {
        $span1 = '<span>';
        $span2 = '</span>';
    } else {
        $span1 = '';
        $span2 = '';

    }

// relative URL!
//if (!is_admin_area()) $href = 'admin6093/'. $href;

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
            $l .= ' class="lightwindow ' . $cl . '"  params="lightwindow_type=external';
            $width1 = get_dv($master_key . '_link_open_in_width');
            if ($width > 0 or ($width == 0 and $width1 > 0)) {
                $width = max($width, $width1);
                $l .= ',lightwindow_width=' . $width;
            }
            $height1 = get_dv($master_key . '_link_open_in_height');
            if ($height > 0 or ($height == 0 and $height1 > 0)) {
                $height = max($height, $height1);
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
        $l .= '>' . $span1 . $text . $span2 . '</a>';

    } else {

        if ($type == 'pop') {
            if ($height == '' or $height == 0) $height = $app_top_screenheight;

            $l = '<a href="';
            $l .= 'javascript: PopupLarge_sized(\'' . $href . '\',' . $width . ',' . $height . ')' . '" ';
            $l .= ' title="' . $title . '" ';
            $l .= ' class="' . $class . '" ';
            $l .= ' style="' . $style . '" ';
            $l .= '>' . $span1 . $text . $span2 . '</a>';
        }

        if ($type == 'mo') {

            if ($width == '' or $width == 0) $width = 820;
            $l = '
			<a 
			title="' . $title . '" 
			onclick="Modalbox.show(this.href, {title: this.title, width: ' . $width . '}); return false;"
			class="' . $class . '" 
			style="' . $style . '" 
			href="' . $href . '"
			>
			' . $span1 . $text . $span2 . '</a>		
		
		
		';


        }

        if ($type == 'wx') {
            $l = '<a href="';
            $l .= 'javascript: open_wx(\'' . $href . '\',\'' . $title . '\',' . $width . ',' . $height . ')' . '" ';
            $l .= ' title="' . $title . '" ';

            $l .= ' style="' . $style . '" ';
            $l .= '>' . $span1 . $text . $span2 . '</a>';
        }


    }

    if ($add_span) {
        return '<span>' . $l . '</span>';
    } else {
        return $l;
    }
}


function get_colorpicker_by_t_key($t_key, $field = '', $use_enh_editor = true, $default_general_color = '#123456', $t_plain_col_inactive = false)
{
    global $colorpicker_icon, $assi_title, $palette_force_color_palette, $palette_force_nearest_color, $allow_assi_title_write;

    make_t_key_if_not_exists($t_key, $default_general_color);

    $sql = "select * from diverses where div_what = '" . $t_key . "' limit 1 ";
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $div_id = $row["div_id"];
        $div_what = $row["div_what"];
        $div_res = $row["div_res"];
        $div_res_long = $row["div_res_long"];
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
    }
    mysql_free_result($sql_result);
//if ($t_key_txt<>'') $t_key_txt = $t_key_txt.': ';
    if ($t_key_txt == '') $t_key_txt = $t_key_txt . '???? ';
//ec($t_key_txt);
//if(getParam('item','')) $assi_url = getParam('item','');
//if(getParam('incl','')) $assi_url = getParam('incl','');

    /*
$assi_url = str_replace(HTTP_CATALOG_SERVER.DIR_WS_ADMIN,'',curPageURL());
//$sql_div="update diverses set assi_typ='color', mtime=".microtime(true).", assi_url = '".$assi_url."', assi_title='".$assi_title."' where div_what = '".$t_key."' " ;

$is_design_assi = true;
if(stristr($assi_url,'template1.php') ) $is_design_assi = false;

if($is_design_assi){
	$sql_div="update diverses set assi_typ='color2', mtime=".microtime(true).", design_assi_url = '".$assi_url."', assi_title='".$assi_title."' where div_what = '".$t_key."' " ;
}else{
	$sql_div="update diverses set assi_typ='color2', mtime=".microtime(true).", assi_url = '".$assi_url."', assi_title='".$assi_title."' where div_what = '".$t_key."' " ;	
}

if( $assi_url<>'' and !stristr($assi_url,'popup_config_this.php') and to_bool($allow_assi_title_write)) q($sql_div);
*/


    $sql_div = "update diverses set assi_typ='color2' where div_what = '" . $t_key . "' ";
    q($sql_div);

    if ($t_key_detail_link <> '') {
        $detail_link_txt = '
<div class="qedit_linkdiv">
<a target="_blank" title="in neuem Browser-Fenster" href="' . $t_key_detail_link . '">' . $t_key_txt . ' <u>Details konfigurieren</u></a>
</div>
';
        $detail_link_txt2 = '
<div class="qedit_linkdiv">
<a class="lightwindow" params="lightwindow_type=external"
title="Inline Popup" href="' . $t_key_detail_link . '?poppage=1">' . $t_key_txt . ' <u>Details konfigurieren</u> im PopUp-Fenster</a>
</div>
';
    } else {
        $detail_link_txt = '';
        $detail_link_txt2 = '';
    }

    if (is_dev()) {
//////////////////////////////
        $comment_txt = '
<div class="qedit_comment" style="font-weight:normal">
' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_comment') . '
</div>
<div class="qedit_comment" style="display:none">
' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_detail_link') . '
</div>
';
        if ($use_enh_editor) {
            $comment_txt .= '<div style="margin:0 6px 9px 0">' . get_enh_html_editor_by_t_key_link($t_key, 't_key_comment') . '</div>';
        }
/////////////////////////////
    } else {

        if ($t_key_comment <> '') {
            $comment_txt = '
<div class="qedit_comment" style="font-weight:normal;">
' . parse_links($t_key_comment) . '
</div>
';
        } else {
            $comment_txt = '';
        }
    }


    if (right($t_key, 9) == '_bg_color') {
        $use_img1 = str_replace('_bg_color', '', $t_key);
        $use_img2 = $use_img1 . '_use_img';
        if (get_dv_bool($use_img2)) {
            $this_bg_color = 'background:#bbb';
        } else {
            $this_bg_color = 'background:#def';
        }
    } else {
        $this_bg_color = 'background:#def';
    }

    if (right($t_key, 6) == '_color') {
        $use_img1 = str_replace('_bg_color', '', $t_key);
        $use_img2 = $use_img1 . '_use_img';
        if (get_dv_bool($use_img2) or $t_plain_col_inactive) {
            $this_bg_color = 'background:#bbb';
        } else {
            $this_bg_color = 'background:#def';
        }
    } else {
        $this_bg_color = 'background:#def';
    }


    if ($field == '') {

        $txt .= '<a name="' . $t_key . '" id="a_' . $t_key . '"></a><div id="colpick_' . $t_key . '" class="qedit_outer" style="text-align:left;' . $this_bg_color . '">';

        if (is_dev()) {
            $txt .= '<span style="margin:0 5px 0 0;float:right" class="onlydev">' . get_dev_link($t_key) . '</span>';
        } else {
            $txt .= '<span style="margin:0 5px 0 0;float:right" class="notonlydev">' . $t_key . '</span>';
        }

        /*
	if ($t_key_txt<>'#######') {
	$txt.='<div style="font-weight:bold;color:#009;font-size:1.0em;padding:0 0 6px 0">'.$t_key_txt.'</div>';
	}
*/
        if (is_dev()) {
            $txt .= '<div style="font-weight:bold;color:#009;font-size:1.0em;padding:0 0 6px 0">' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_txt') . '</div>
	<span id="' . $t_key . '_conf" class="ax_result" style="margin-right:6px;font-size:1.05em">';
        } else {
            $txt .= '<div style="font-weight:bold;color:#009;font-size:1.0em;padding:0 0 6px 0">' . $t_key_txt . '</div>';
        }


        $the_color = get_dv($t_key);

        if ($palette_force_nearest_color and !to_bool($palette_force_color_palette) and 1 == 2) {
            $txt .= '<div  style="font-weight:normal;color:#009;font-size:1.0em;padding:1px 0 6px 0;margin:-12px 0 0 6px;padding:4px 0">' . $colorpicker_icon . ' Farbw&auml;hler: 
	<span style="margin-left:12px;font-size:0.8em">es wird die jeweils &auml;hnlichste Farbe aus der 
	<a title="Assistent f&uuml;r Farb-Palette" target="_blank" href="wrapper_full.php?use_header=1&incl=includes/quick_config_design/palette.php"><u>Farb-Palette</u></a> &uuml;bernommen!</span>';
        } else {
            $txt .= '<div  style="font-weight:normal;color:#009;font-size:1.0em;padding:1px 0 6px 0;margin:-12px 0 0 6px;padding:4px 0">' . $colorpicker_icon . ' Farbw&auml;hler:';
        }
//is_active_icon_link($key,$msgbox=true,$float_right=true,$with_text=false,$f_size='',$link_bars=false, $show_dev_key=false, $allow_as_button=false, $button_class='', $page_reload=false, $style='', $pre_txt='')
        $txt .= '<span style="font-size:0.8em;font-weight:normal;float:right;margin-right:12px;color:#666">


Farbpalette verwenden ist ' .
            is_active_icon_link('palette_force_color_palette', $msgbox = true, $float_right = false, $with_text = false, $f_size = '', $link_bars = false, $show_dev_key = false, $allow_as_button = false, $button_class = '', $page_reload = true, $style = '', $pre_txt = '')
            . ' - immer &auml;hnlichste Farbe verwenden ist ' .
            is_active_icon_link('palette_force_nearest_color', $msgbox = true, $float_right = false, $with_text = false, $f_size = '', $link_bars = false, $show_dev_key = false, $allow_as_button = false, $button_class = '', $page_reload = true, $style = '', $pre_txt = '')
            . ' - 
<a target="_blank" title="Einstellung bearbeiten - neues Fenster" href="wrapper_full.php?use_header=1&incl=includes/quick_config_design/palette.php#palette_force_nearest_color">Konfig.-Assi &ouml;ffnen</a></span>';

        $txt .= '</div>';


        if ($palette_force_color_palette) {

            $txt .= '<input style="margin-left:6px;color:#009;font-size:1.2em;width:75px;border:3px solid ' . $the_color . ';border-right:30px solid ' . $the_color . ';border-left:30px solid ' . $the_color . ';" type="text" size="10" 
	maxlength="7" id="' . $t_key . '"  value="' . $the_color . '" onchange="cdisp_col(this.value,\'' . $t_key . '\')" onMouseOver="cdisp_col(this.value,\'' . $t_key . '\')"  onclick="showColorPalette(\'' . $t_key . '\',0)">
	<div id="col_pick_' . $t_key . '" style="margin:0 0 0 40px;position:absolute;z-index:51"></div>
	';

        } else {
            $txt .= '<input style="margin-left:6px;color:#009;font-size:1.2em;width:75px;border:3px solid ' . $the_color . ';border-right:30px solid ' . $the_color . ';border-left:30px solid ' . $the_color . ';" type="text" size="10" 
	maxlength="7" id="' . $t_key . '"  value="' . $the_color . '" onchange="cdisp_col(this.value,\'' . $t_key . '\')" onMouseOver="cdisp_col(this.value,\'' . $t_key . '\')"  onclick="showColorPicker(this,$(\'' . $t_key . '\'))">';

        }


        $txt .= '<input type="button" value=" speichern & Vorschau" onclick="update_color(\'' . $t_key . '\')">
<a style="margin:9px;font-weight:normal;font-size:0.7em;color:#666" href="javascript:do_qu_confirm_frage(\'ax_updater.php\',\'id=482_' . $t_key . '\' ,\'conf_' . $t_key . '\',\'Keine Farbe?\');">keine Farbe</a>
';


        if ($palette_force_color_palette) {
            $h = get_hint_by_t_key('color_palette_hint', $use_outer_div = false, $show_header = false, $use_comment_div = false, $parse_links = true);
            $txt .= tooltip($h, $img = '13', $style = '', $class = 'tip', $width = '350px', $admin = true);
        } else {
            $h = get_hint_by_t_key('color_picker_hint2', $use_outer_div = false, $show_header = false, $use_comment_div = false, $parse_links = true);
            $txt .= tooltip($h, $img = '13', $style = '', $class = 'tip', $width = '350px', $admin = true);
        }


        if (is_dev() and 1 == 2) {
            $col_inv = color_inverse($the_color);
            $txt .= '<div style="margin-left:12px;width:28px;height:22px;background:' . $col_inv . ';display:inline-block">&nbsp;</div> <span class="grey10" style="font-size:1.1em">' . $col_inv . '</span>';
        }


        /*
$txt.= '<span style="margin-left:130px;font-weight:normal;color:#000"><a  
title="alle Farben anzeigen die f&uuml;r das aktuelle Theme verwendet werden - PopUp" href="popup_used_colors.php"
class="lightwindow button3" params="lightwindow_type=external,lightwindow_width=,lightwindow_height=" 
>alle Farben</a></span>';

$h2 = get_hint_by_t_key('all_colors_used_in_theme_hint',$use_outer_div=false,$show_header=false,$use_comment_div=false,$parse_links=true);
$txt.= tooltip($h2,$img='13',$style='',$class='tip_lu',$width='400px',$admin=true); 
*/
        $txt .= '<div class="CONF" style="margin:6px 0 9px 0" id=\'conf_' . $t_key . '\'></div>';


        $txt .= $comment_txt;
        $txt .= $detail_link_txt;
        $txt .= $detail_link_txt2;


        $txt .= '</div>';


    } else {
        //$ax_updater_id = '1630'; // needs field   Tkey = t_key.$field
        $txt .= '<a name="' . $t_key . '" id="a_' . $t_key . '"></a><div class="qedit_outer" style="text-align:left">';
        $txt .= '<span style="margin:0 5px 0 0;float:right" class="onlydev">' . $t_key . ' - <b>' . $field . '</b></span>';


        $txt .= '

<div style="font-weight:bold;color:#369;font-size:1.0em;padding:0 0 6px 0"> Farbe w&auml;hlen:</div>
<input style="margin-left:2px;color:#009;font-size:1.2em" type="text" size="10" maxlength="7" id="' . $t_key . '"  value="' . get_dv($t_key) . '" onclick="showColorPicker(this,$(\'' . $t_key . '\'))">
<input type="button" value="Farbe &auml;ndern" onclick="showColorPicker(this,$(\'' . $t_key . '\'))">

<input type="button" value=" speichern & Vorschau" onclick="update_color(\'' . $t_key . '\')">
<a style="font-size:11px;margin-left:6px" href="help/color_picker.php" 
title="Hilfe zum Farb-W&auml;hler" 
class="lightwindow page-options" 
params="lightwindow_type=external"> Hilfe </a>
<div class="CONF" style="margin:6px 0 9px 0" id=\'conf_' . $t_key . '\'></div>
</div>


';

        $txt .= $comment_txt;
        $txt .= $detail_link_txt;
        $txt .= $detail_link_txt2;

        $txt .= '</div>';

    }


    return $txt;

}


function set_checkbox_by_t_key($t_key, $text, $type = '', $comment = '', $detail_link = '',
                               $update_div = false, $rel1 = '', $rel2 = '', $modul = '', $key_type = '', $t_key_in_app_top = false, $item_no = '')
{

    if ($item_no <> '') {
        $item_no_txt = '
<span style="margin-right:6px;color:#68a">
' . $item_no . '
</span>
';
    } else {
        $item_no_txt = '';
    }

    $dev_link = get_dev_link($t_key);

// type = '' = janein   _onoff   _active_inactive 
    if ($detail_link <> '') {
        $detail_link_txt = '
<div class="qedit_linkdiv">
<a target="_blank" title="in neuem Browser-Fenster" href="' . $detail_link . '">' . $text . ' - <u>Details konfigurieren</u></a>

</div>
';
        $detail_link_txt2 = '
<div class="qedit_linkdiv" style="display:inline;margin-left:9px">
<a class="lightwindow" params="lightwindow_type=external"
title="Inline Popup" href="' . $detail_link . '?poppage=1"><u>Details konfigurieren</u> im PopUp-Fenster</a>
</div>
';


    } else {
        $detail_link_txt = '';
        $detail_link_txt2 = '';
    }


    if ($comment <> '') {
        $comment_txt = '
<div class="qedit_comment">
' . $comment . '
</div>
';
    } else {
        $comment_txt = '';
    }


    $type_txt = '';
    if ($type == 'o') $type_txt = '_onoff';
    if ($type == 'a') $type_txt = '_active_inactive';


    if (get_dv($t_key) == 1) {
        $checked_txt = ' checked="checked" ';
    } else {
        $checked_txt = '';
    }
    if (is_dev()) {
        $dev_txt = '<span style="margin:0 0 0 9px;" class="onlydev">' . $dev_link . '</span>';
    } else {
        $dev_txt = '<span style="margin:0 0 0 9px;" class="notonlydev">' . $t_key . '</span>';
    }

//$txt .= $item_no_txt; 
    $txt .= '<div class="qedit_outer">';


    $txt .= '<span style="font-size:1.0em;font-weight:bold; color:#009;margin:1px;float:left;">' . $item_no_txt . $text . ':</span>
<span id="' . $t_key . '_conf" class="ax_result" style="margin-right:6px;font-size:1.05em">
' . active_in_div($t_key) . '
</span>

<label class=\'pc_checkbox\' title=\'klicken zum ein- oder ausschalten\'>
<input onclick="ax_checkbox_to_div' . $type_txt . '(this.checked, this.id);" type="checkbox" id="' . $t_key . '" 
value="1" ' . $checked_txt . ' />
</label>
' . $dev_txt . '

</span></li>	
';

    $txt .= $comment_txt;

    $txt .= $detail_link_txt . $detail_link_txt2;

    $txt .= '</div>';

    if ($update_div) {
        $sql = ' update diverses set ';

        if ($t_key_in_app_top) $sql_update_str .= ' app_top="1", ';
        if ($text <> '') $sql_update_str .= ' t_key_txt="' . addslashes($text) . '", ';
        if ($comment <> '') $sql_update_str .= ' t_key_comment="' . addslashes($comment) . '", ';
        if ($detail_link <> '') $sql_update_str .= ' t_key_detail_link="' . $detail_link . '", ';
        if ($rel1 <> '') $sql_update_str .= ' rel1="' . $rel1 . '", ';
        if ($rel2 <> '') $sql_update_str .= ' rel2="' . $rel2 . '", ';
        if ($modul <> '') $sql_update_str .= ' modul="' . $modul . '", ';
        if ($key_type <> '') $sql_update_str .= ' key_type="' . $key_type . '", ';

        $sql_update_str = substr($sql_update_str, 0, strlen($sql_update_str) - 2); # lop off the extra trailing comma

        $sql .= $sql_update_str;

        $sql .= ' where div_what = \'' . $t_key . '\' ';
        q($sql);
    }

    return $txt;
}

function parse_links($t_key_comment)
{
    global $new_browser_window_icon, $popup_window_icon, $info_icon, $wizard_icon, $goto_icon;
    if (strpos($t_key_comment, 'help-link:::') > 0) {
        $strpos = strpos($t_key_comment, 'help-link:::');
        $strlen = strlen($t_key_comment);

        for ($i = $strpos; $i <= $strlen; $i++) {
            $char = substr($t_key_comment, $i, 1);
            if ($char <> '%') {
                $link .= substr($t_key_comment, $i, 1);
            } else {
                break;
            }
        }

        $link_arr = explode(":::", $link, 3);
        $link_type = $link_arr[0];
        $link_key = $link_arr[1];
        $link_txt1 = $link_arr[2];

        $help_link = help_link_by_key($link_key, $link_txt1, 'Hilfe zu diesem Thema - Popup', true);

        $t_key_comment = str_replace($link . '%', $help_link, $t_key_comment);
    }


    if (strpos($t_key_comment, 'conf-link:::') > 0 and 1 == 1) {
        $strpos = strpos($t_key_comment, 'conf-link:::');
        $strlen = strlen($t_key_comment);

        for ($i = $strpos; $i <= $strlen; $i++) {
            $char = substr($t_key_comment, $i, 1);
            if ($char <> '%') {
                $link2 .= substr($t_key_comment, $i, 1);
            } else {
                break;
            }
        }

        $link_arr = explode(":::", $link2, 3);
        $link_type = $link_arr[0];
        $link_key = $link_arr[1];
        $link_txt = $link_arr[2];

        $conf_link = '<a target="_blank" title="Konfigurations-Assistent �ffnen - neues Browser-Fenster"  href="' . conf_l($link_key) . '">' . $link_txt . ' ' . $wizard_icon . '</a>';
        $t_key_comment = str_replace($link2 . '%', $conf_link, $t_key_comment);
    }


    if (strpos($t_key_comment, 'admi-link:::') > 0 and 1 == 1) {
        $strpos = strpos($t_key_comment, 'admi-link:::');
        $strlen = strlen($t_key_comment);

        for ($i = $strpos; $i <= $strlen; $i++) {
            $char = substr($t_key_comment, $i, 1);
            if ($char <> '%') {
                $link3 .= substr($t_key_comment, $i, 1);
            } else {
                break;
            }
        }

        $link_arr = explode(":::", $link3, 3);
        $link_type = $link_arr[0];
        $link_key = $link_arr[1];
        $link_txt = $link_arr[2];

        $admi_link = '<a title="Seite �ffnen"  href="' . $link_key . '">' . $link_txt . ' ' . $goto_icon . ' </a>';
        $t_key_comment = str_replace($link3 . '%', $admi_link, $t_key_comment);
    }

    if (strpos($t_key_comment, 'shop-link:::') > 0 and 1 == 1) {
        $strpos = strpos($t_key_comment, 'shop-link:::');
        $strlen = strlen($t_key_comment);


        for ($i = $strpos; $i <= $strlen; $i++) {
            $char = substr($t_key_comment, $i, 1);
            if ($char <> '%') {
                $link4 .= substr($t_key_comment, $i, 1);
            } else {
                break;
            }
        }

        $link_arr = explode(":::", $link4, 3);
        $link_type = $link_arr[0];
        $link_key = $link_arr[1];
        $link_txt = $link_arr[2];

        $shop_link = '<a target="_blank" title="Seite �ffnen - neues Browser-Fenster"  href="../' . $link_key . '">' . $link_txt . ' ' . $goto_icon . ' </a>';
        $t_key_comment = str_replace($link4 . '%', $shop_link, $t_key_comment);
    }

    if (strpos($t_key_comment, 'box_preview:::') > 0 and 1 == 1) {
        $strpos = strpos($t_key_comment, 'box_preview:::');
        $strlen = strlen($t_key_comment);


        for ($i = $strpos; $i <= $strlen; $i++) {
            $char = substr($t_key_comment, $i, 1);
            if ($char <> '%') {
                $link5 .= substr($t_key_comment, $i, 1);
            } else {
                break;
            }
        }

        $link_arr = explode(":::", $link5, 3);

        $box_name = $link_arr[1];
        $title = $link_arr[2];

        $shop_link = get_preview_box_button($box_name, $title, $width = '760', $height = '490', $class = 'button30', $style = '');
        $t_key_comment = str_replace($link5 . '%', $shop_link, $t_key_comment);
    }


    return $t_key_comment;
}


function get_hint_by_t_key($t_key, $use_outer_div = true, $show_header = true, $use_comment_div = true, $parse_links = true, $allow_set_app_top = true, $allow_toggler = true)
{
    global $new_browser_window_icon, $popup_window_icon, $info_icon, $wizard_icon, $goto_icon, $browser, $application_shop_is_in_dev_mode, $session_lang_code_from_lang_id, $app_top_default_lang_id;


    $sql = "select * from diverses where div_what = '" . $t_key . "' limit 1 ";
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $div_id = $row["div_id"];
        $div_what = $row["div_what"];
        $div_res = $row["div_res"];
        $div_res_long = $row["div_res_long"];
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
    }
    mysql_free_result($sql_result);

    $sql = "update diverses set app_top = 0 where div_what = '" . $div_what . "' ";
    if ($allow_set_app_top) q($sql);

//$sql="update diverses set app_top = 1 where div_what = '".$div_what."' ";
//q($sql);

    $sql = "update diverses set assi_url = '" . curPageName() . "', assi_typ = 'hint' where div_what = '" . $div_what . "' ";
    if (strip_tags(trim($t_key_comment)) == '') q($sql); //nur wenn ohne text


    if ($item_no <> '') {
        $item_no_txt = '
<span style="margin-right:6px;color:#68a">
' . $item_no . '
</span>
';
    } else {
        $item_no_txt = '';
    }

/////parse_links

    if ($parse_links or 1 == 1) {

        $t_key_comment = parse_links($t_key_comment);

    }

    $dev_link = get_dev_link($t_key);

// type = '' = janein   _onoff   _active_inactive  
    if ($t_key_detail_link <> '') {


    } else {
        $detail_link_txt = '';
        $detail_link_txt2 = '';
    }

    if ($use_comment_div) {
        $qedit_comment_class = 'qedit_comment';
    } else {
        $qedit_comment_class = 'qedit_hint';
    }

    if (!$allow_toggler) $no_margin_str = 'margin:0;';


    $comment_txt .= '<a name="' . $t_key . '" id="a_' . $t_key . '"></a>';

//if ( is_dev() and i_am_admin() and $browser =='moz'  ){
//if ( (is_dev() and  i_am_superadmin() and $browser =='moz') or $application_shop_is_in_dev_mode ){
    if ((is_dev() and i_am_superadmin()) or $application_shop_is_in_dev_mode) {
//////////////////////////////

        if (is_admin_area()) {
            $comment_txt .= '
		<div class="' . $qedit_comment_class . '" style="font-size:1.0em;background:#ffc;' . $no_margin_str . '">
		' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_comment') . '
		</div>';
        } else {
            if (shop_is_in_fremdsprache()) {

                $sql = "select div_res_long_" . $session_lang_code_from_lang_id . " from diverses where div_what = '" . $t_key . "' ";
                $res_lang = lookup($sql, 'div_res_long_' . $session_lang_code_from_lang_id);
                if ($res_lang == '') $res_lang = parse_links(get_dv_t_key_comment($t_key));
                $comment_txt .= '
			<div class="' . $qedit_comment_class . '">
			' . $res_lang . '
			</div>
			';

            } else {

                $comment_txt .= '
			<div class="' . $qedit_comment_class . '">
			' . parse_links(get_dv_t_key_comment($t_key)) . '
			</div>';

            }
        }

        $t_key_display = '(' . $t_key . ')';

        if (is_admin_area()) {
            $comment_txt .= '<div style="margin:0 6px 9px 0">' . get_enh_html_editor_by_t_key_link($t_key, 't_key_comment') . ' <div style="margin:9px 0 0 0" class="grey10">
		<a target="_blank" href="admin6093/wrapper_full.php?incl=includes/quick_config_new/template1.php&use_header=1&item=quick_config_boxes/checkin_process.php#' . $t_key . '">Tooltip-&Uuml;bersetzungen bearbeiten... </a> ' . $t_key_display . '</div></div>';
        } else {
            $comment_txt .= '<div style="margin:0 6px 9px 0"><div style="margin:9px 0 0 0" class="grey10">
		<a target="_blank" href="admin6093/wrapper_full.php?incl=includes/quick_config_new/template1.php&use_header=1&item=quick_config_boxes/checkin_process.php#' . $t_key . '">Tooltip-Text & -&Uuml;bersetzungen bearbeiten... </a> ' . $t_key_display . '</div></div>';
        }
/////////////////////////////$use_comment_div  
    } else {

        if ($t_key_comment <> '') {

            if (shop_is_in_fremdsprache() and !is_admin_area()) {

                $sql = "select div_res_long_" . $session_lang_code_from_lang_id . " from diverses where div_what = '" . $t_key . "' ";
                $res_lang = lookup($sql, 'div_res_long_' . $session_lang_code_from_lang_id);
                if ($res_lang == '') $res_lang = parse_links(get_dv_t_key_comment($t_key));
                $comment_txt .= '
			<div class="' . $qedit_comment_class . '">
			' . $res_lang . '
			</div>
			';

            } else {
                $comment_txt .= '
		<div class="' . $qedit_comment_class . '" style="font-size:1.0em;">
		' . parse_links($t_key_comment) . '
		</div>
		';
            }


        } else {
            $comment_txt .= '';
        }

    }

    $type_txt = '';
    if ($type == 'o') $type_txt = '_onoff';
    if ($type == 'a') $type_txt = '_active_inactive';
    if ($type == 's') $type_txt = '_show_hide';

    if (get_dv($t_key) == 1) {
        $checked_txt = ' checked="checked" ';
    } else {
        $checked_txt = '';
    }
    if (is_dev() and $browser == 'moz') {
        $dev_txt = '<span style="margin:0 0 0 9px;" class="onlydev">' . $dev_link . '</span>';
    } else {
        $dev_txt = '<span style="margin:0 0 0 9px;" class="notonlydev">' . $t_key . '</span>';
    }


    if ($use_outer_div) {
        $txt .= '<div id="qedit_outer_' . $t_key . '" class="qedit_outer" style="text-align:left;border:none">';
    } else {
        $txt .= '<div id="qedit_outer_' . $t_key . '" class="qedit_outer" style="background:none;text-align:left;border:none">';
    }

    if ((is_dev() and i_am_superadmin())) {

        if (trim($t_key_txt) == '') set_t_key_txt_empty($t_key);
        if ($show_header) {
            //$txt.= '<div><span class="onlydev">'.$t_key.'</span></div><div  style="font-size:1.8em;font-weight:bold; color:#9ab;margin: 6px 6px -12px 6px;padding:0">' .$item_no_txt.get_long_html1_editor_by_t_key_field_plain($t_key,'t_key_txt').'</div>';

            $txt .= '<div>';
            $txt .= ' <a class="button_blue" title="DEV: Txt und Beschreibung" href="javascript:from_div_update(\'' . $t_key . '\')" >FROM div_update</a><span id="CONF_from_div_update_' . $t_key . '"></span> ';
            $txt .= ' &nbsp; <span class="onlydev">' . $t_key . '</span> &nbsp; ';
            $txt .= ' <a class="button3" title="DEV: Txt und Beschreibung" href="javascript:to_div_update(\'' . $t_key . '\')" >TO div_update</a><span id="CONF_to_div_update_' . $t_key . '"></span> ';
            $txt .= '</div>';

            $txt .= '<div  style="font-size:1.8em;font-weight:bold; color:#9ab;margin: 6px 6px -12px 6px;padding:0">' . $item_no_txt . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_txt') . '</div>';

        } else {
            //$txt.= '<div style="margin:0 0 4px 0"><span class="onlydev">'.$t_key.'</span></div>';	
            //$txt.= '<span class="onlydev">xxxxxxxxxxx'.$t_key.'</span><br>';	


        }
    } else {

        if ($show_header) $txt .= '<div style="font-size:1.8em;font-weight:bold; color:#9ab;margin: 6px 6px  -12px 6px;padding:0">' . $item_no_txt . $t_key_txt . '</div>';

    }


    if (is_dev() and i_am_superadmin() and $browser == 'moz') {
        $txt .= $comment_txt . '<div style="display:inline;font-size:1.0em">' . $t_key . '</div';
    } else {
        $txt .= $comment_txt;
    }

//$txt.= 'Tooltip-Editor: '.$t_key.'t_key_txt'.'  -  '.get_long_html1_editor_by_t_key_field_plain($t_key,'t_key_txt');
//$txt.= 'Tooltip-Editor: '.get_long_html1_editor_by_t_key_field($t_key,'t_key_comment');

    $txt .= '</div>';

    if (trim($comment_txt) == '' and !is_dev()) {
        $txt = '';
    }


    /*
if(function_exists(toggler_left)){
	if($allow_toggler) $tg = toggler_left('inner_'.$t_key,$minus=true,$size='24','',$margin='-10px -6px -15px -3px',$title='Infobox ein- und ausblenden');
	//$tg = toggler('inner_'.$t_key,$minus=true,$size='24','',$margin='0 0 -12px -12px',$title='Infobox ein- und ausblenden');
	$txt1 = '<div>'.$tg.'<div id="inner_'.$t_key.'" style="display:display">'.$txt.'</div></div>';
	return $txt1;
}else{
	return $txt;
}
*/
    return $txt;
}

function get_checkbox_by_t_key($t_key, $type = '', $field = '', $detail_link = true, $detail_link_pop = true, $use_enh_editor = true, $is_parent = false)
{
    $use_enh_editor = true;

    global $new_browser_window_icon, $popup_window_icon, $wizard_icon, $browser, $assi_title, $allow_assi_title_write;
    $sql = "select * from diverses where div_what = '" . $t_key . "' limit 1 ";
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $div_id = $row["div_id"];
        $div_what = $row["div_what"];
        $div_res = $row["div_res"];
        $div_res_long = $row["div_res_long"];
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
    }
    mysql_free_result($sql_result);

    if ($app_top == 0 or $app_top == '') make_app_top($t_key);
//ec($t_key_txt);
//if( getParam('item','')  ) $assi_url =  getParam('item','')  ;
//if( getParam('incl','')  ) $assi_url =  getParam('incl','')  ;


    /*
$assi_url = str_replace(HTTP_CATALOG_SERVER.DIR_WS_ADMIN,'',curPageURL());
//ec(__file__.' '.__function__.'-'.__line__.': Assi-Title: '.$assi_title);
$is_design_assi = true;
if(stristr($assi_url,'template1.php') ) $is_design_assi = false;

if($is_design_assi){
	$sql_div="update diverses set assi_typ='bool', mtime=".microtime(true).", design_assi_url = '".$assi_url."', assi_title='".$assi_title."' where div_what = '".$t_key."' " ;
}else{
	$sql_div="update diverses set assi_typ='bool', mtime=".microtime(true).", assi_url = '".$assi_url."', assi_title='".$assi_title."' where div_what = '".$t_key."' " ;	
}

if( $assi_url<>'' and !stristr($assi_url,'popup_config_this.php') and to_bool($allow_assi_title_write)) {
	q($sql_div);
}
*/
    $sql_div2 = "update diverses set assi_typ='bool' where div_what = '" . $t_key . "' ";
    q($sql_div2);


    if ($item_no <> '') {
        $item_no_txt = '
<span style="margin-right:6px;color:#68a">
' . $item_no . '
</span>
';
    } else {
        $item_no_txt = '';
    }

//if ($t_key_txt<>'') $t_key_txt = $t_key_txt.':  ';

    $dev_link = get_dev_link($t_key);

// type = '' = janein   _onoff   _active_inactive 
    if ($t_key_detail_link <> '') {
        /*
	$detail_link_txt='
	<div class="qedit_linkdiv">
	<a target="_blank" title="in neuem Browser-Fenster" href="'.$t_key_detail_link.'">'.strip_tags($t_key_txt).' konfigurieren &nbsp; '.$new_browser_window_icon.'</a>
	</div>
	';
	
	$detail_link_txt2='
	<div class="qedit_linkdiv">
	<a title="in diesem Fenster" href="'.$t_key_detail_link.'"> '.strip_tags($t_key_txt).' konfigurieren &nbsp; '.$popup_window_icon.'</a>
	</div>
	';
*/


        /*
if (eregiS('includes/quick_config',$t_key_detail_link)){
	$item=str_replace('includes/','',$t_key_detail_link);
	$detail_link_txt='
	<div class="qedit_linkdiv">'.strip_tags($t_key_txt).' - Konfigurations-Assistent &ouml;ffnen &raquo; &nbsp;
	<a target="_blank" title="in neuem Browser-Fenster" href="wrapper_full.php?incl=includes/quick_config_new/template1.php&amp;use_header=1&amp;item='.$item.'">'.$wizard_icon.'</a>
	<a title="in diesem Fenster" href="wrapper_full.php?incl=includes/quick_config_new/template1.php&amp;use_header=1&amp;item='.$item.'"> '.$wizard_icon.'</a>
	</div>
	';

}else{
	$detail_link_txt='
	<div class="qedit_linkdiv">'.strip_tags($t_key_txt).' - Details konfigurieren &raquo; &nbsp;
	<a target="_blank" title="in neuem Browser-Fenster" href="'.$t_key_detail_link.'">'.$new_browser_window_icon.'</a>
	<a title="in diesem Fenster" href="'.$t_key_detail_link.'"> '.$popup_window_icon.'</a>
	</div>
	';
}
*/

        /*
	$detail_link_txt2='
	<div class="qedit_linkdiv">
	<a title="in diesem Fenster" href="'.$t_key_detail_link.'"> '.strip_tags($t_key_txt).' konfigurieren &nbsp; '.$popup_window_icon.'</a>
	</div>
	';
	*/

    } else {
        $detail_link_txt = '';
        $detail_link_txt2 = '';
    }


    if (is_dev()) {
        ////////////////////////////// get_long_html1_editor_by_t_key_field_plain($t_key,'t_key_comment')
        $comment_txt = '
	<div class="qedit_comment">
	' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_comment') . '
	</div>
	<div class="qedit_comment" style="display:none">
	' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_detail_link') . '
	</div>
	';


        if ($use_enh_editor) {
            if (stristr($t_key, 'self_def_box')) {
                $this_sub_key = str_replace('self_def_box_', '', $t_key);

                $this_sub_key = str_replace('left10_', '', $this_sub_key);
                $this_sub_key = str_replace('left1_', '', $this_sub_key);
                $this_sub_key = str_replace('left2_', '', $this_sub_key);
                $this_sub_key = str_replace('left3_', '', $this_sub_key);
                $this_sub_key = str_replace('left4_', '', $this_sub_key);
                $this_sub_key = str_replace('left5_', '', $this_sub_key);
                $this_sub_key = str_replace('left6_', '', $this_sub_key);
                $this_sub_key = str_replace('left7_', '', $this_sub_key);
                $this_sub_key = str_replace('left8_', '', $this_sub_key);
                $this_sub_key = str_replace('left9_', '', $this_sub_key);

                $this_sub_key = str_replace('right10_', '', $this_sub_key);
                $this_sub_key = str_replace('right1_', '', $this_sub_key);
                $this_sub_key = str_replace('right2_', '', $this_sub_key);
                $this_sub_key = str_replace('right3_', '', $this_sub_key);
                $this_sub_key = str_replace('right4_', '', $this_sub_key);
                $this_sub_key = str_replace('right5_', '', $this_sub_key);
                $this_sub_key = str_replace('right6_', '', $this_sub_key);
                $this_sub_key = str_replace('right7_', '', $this_sub_key);
                $this_sub_key = str_replace('right8_', '', $this_sub_key);
                $this_sub_key = str_replace('right9_', '', $this_sub_key);


                $duplicate_help_str = '<span style="margin-right:12px;font-size:0.8em"><a href="javascript:duplicate_help(\'' . $t_key . '\',\'self_def_box\',\'' . $this_sub_key . '\')">duplicate help <b>self_def_box</b> - 
			<b style="color:#c00">' . $this_sub_key . '</b></a></span> 
			<span id="CONF_duplicate_help_self_def_box_' . $t_key . '"></span>';

            }

            $comment_txt .= '<div style="margin:0 6px 9px 0">' . $duplicate_help_str . get_enh_html_editor_by_t_key_link($t_key, 't_key_comment') . '</div>';
        }

/////////////////////////////
    } else {

        if ($t_key_comment <> '') {
            $comment_txt = '
		<div class="qedit_comment">
		' . parse_links($t_key_comment) . '
		</div>
		';
        } else {
            $comment_txt = '';
        }

    }

    $type_txt = '';
    if ($type == 'o') $type_txt = '_onoff';
    if ($type == 'a') $type_txt = '_active_inactive';
    if ($type == 's') $type_txt = '_show_hide';


    if (get_dv($t_key) == 1) {
        $checked_txt = ' checked="checked" ';
    } else {
        $checked_txt = '';
    }
    if (is_dev()) {
        $dev_txt = '<span style="margin:0 9px;" class="onlydev">' . $dev_link . '</span>';
    } else {
//$dev_txt='<span style="margin:0 9px;" class="notonlydev">'.$t_key.'</span>';
    }


    /*
if (eregiS('_is_active',$t_key)  
or eregiS('_use_link_button',$t_key) 
or eregiS('_img_show_img',$t_key) 
or eregiS('_use_header',$t_key) 
or eregiS('_show_in_',$t_key) 
or eregiS('_drop_shadow',$t_key) 
or eregiS('_round_corners',$t_key) 
or eregiS('_text_shadow',$t_key) 
or eregiS('_text_bold',$t_key) 
or eregiS('_text_center',$t_key) 
or eregiS('_text_small_caps',$t_key)  
or eregiS('_border_use',$t_key) 
or eregiS('prices_show_vat_with_price',$t_key) 
or eregiS('_move_to_left_col',$t_key) 
or eregiS('_xxx_',$t_key) 
or eregiS('_xxx_',$t_key) 

or eregiS('_use_img',$t_key) ) {
*/
//if (is_app_top($t_key) ) {

    if (get_dv_bool($t_key)) {
//	$qedit_outer_style ='background:#def';
    } else {
        $qedit_outer_style = 'background:#bbbbba';
    }
//}

    if (eregiS('_is_installed', $t_key)) $qedit_outer_style = 'background:#fde';
    if (eregiS('_content', $t_key)) $qedit_outer_style = 'border:3px #369 dotted;';

    if ($is_parent) {
        $txt .= '<a name="' . $t_key . '" id="a_' . $t_key . '"></a><div id="qedit_outer_' . $t_key . '" class="qedit_outer_parent" style="padding: 9px 4px 16px 4px;' . $qedit_outer_style . '">';
    } else {
        $txt .= '<a name="' . $t_key . '" id="a_' . $t_key . '"></a><div id="qedit_outer_' . $t_key . '" class="qedit_outer" style="padding: 9px 4px 16px 4px;' . $qedit_outer_style . '">';
    }
    if (is_dev()) {
//////////////////////////////////
        if (trim($t_key_txt) == '') set_t_key_txt_empty($t_key);

        $txt .= '<div style="font-size:1.0em;font-weight:bold; color:#009;margin:-8px 0 0 0;float:left;display:inline">' . $item_no_txt . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_txt') . '</div><div class="clear"></div>
<span id="' . $t_key . '_conf" class="ax_result" style="margin-right:6px;font-size:1.05em">
' . active_in_div($t_key) . '</span>';

//////////////////////////////////

    } else {
        /*
$txt.='<span style="font-size:1.0em;font-weight:bold; color:#009;margin:1px;float:left;line-height:6px">'.$item_no_txt.$t_key_txt.'</span>
<span id="'.$t_key .'_conf" class="ax_result" style="margin-right:6px;font-size:1.05em">
'. active_in_div($t_key) .'</span>';
*/

        $txt .= '<div style="font-size:1.0em;font-weight:bold; color:#009;margin:-2px 0 6px 0;float:left;padding:0 4px;">' . $item_no_txt . strip_tags($t_key_txt) . '</div><div class="clear"></div>
<div id="' . $t_key . '_conf" class="ax_result" style="margin: 0px 0 0 9px;font-size:1.05em;white-space:nowrap;font-weight:bold;text-align:left;float:left;">' . active_in_div($t_key) . '</div>';


    }

    if (eregiS('_is_active', $t_key) and cannot_deactivate($t_key)) {

        $txt .= ' <span style="color:#070; font-size:0.7em">(immer aktiv, nicht deaktivierbar)</span> ' . $dev_txt . '';
        $display_this_box = false;
    } else {
        $display_this_box = true;

        if ($div_res == 1) {
            $checked = ' checked="checked" ';
        } else {
            $checked = '';
        }

        if ($browser == "saf" and 1 == 2) {
            /*
	$txt.='
	<label class=\'pc_checkbox\' title=\'klicken zum ein- oder ausschalten\' style="margin-right:12px;border:2px #c00 outset;background-color:#fff">
	<input onclick="ax_checkbox_to_div'.$type_txt.'(this.checked, this.id);'.$add_onclick_script.'" type="checkbox" id="'. $t_key .'" name="'. $t_key .'" '.$checked.' value="" '. $checked_txt .' />
	</label>
	'. $dev_txt .'
	
	';
*/
        } else {
            $txt .= '
	<label class=\'pc_checkbox round6 shade3\' title=\'klicken zum ein- oder ausschalten\' style="margin:6px;border:1px #999 solid;background-color:#fff">
	<input onclick="ax_checkbox_to_div' . $type_txt . '(this.checked, this.id);' . $add_onclick_script . '" type="checkbox" id="' . $t_key . '" name="' . $t_key . '" ' . $checked . ' value="" ' . $checked_txt . ' />
	</label>
	' . $dev_txt . '
	
	';
        }

    }

    $txt .= $comment_txt;

    if ($detail_link) $txt .= $detail_link_txt;
    if ($detail_link and $detail_link_pop) $txt .= $detail_link_txt2;


    $txt .= '</div>';
    if ($display_this_box) return $txt;
}


function set_t_key_txt_empty($t_key)
{
    $sql = "select div_id from diverses where div_what = '" . $t_key . "' ";
    $sql_res = q($sql);
    $z = mysql_num_rows($sql_res);
    if ($z == 0) {
        $sql = "insert into diverses set t_key_txt = '???', app_top = 1 , div_what = '" . $t_key . "' ";

        q($sql);

    } else {
        $sql = "update diverses set t_key_txt = '???' where div_what = '" . $t_key . "' ";
        q($sql);
    }

}

function get_checkbox_by_t_key_field($t_key, $field, $echo_key = true)
{

    if (get_dv_field($t_key, $field) == 1) {
        $checked_txt = ' checked="checked" ';
    } else {
        $checked_txt = '';
    }

    $txt .= '<div class="qedit_outer">';

    if ($echo_key) {
        $txt .= '<span style="margin:0 5px 0 12px;float:right" class="onlydev">' . $t_key . ' - <b>' . $field . '</b></span>';
    } else {
        $txt .= '<span style="margin:4px;" class="onlydev">' . $field . '</span>';
    }


    $txt .= '<span style="font-size:0.8em;font-weight:bold; color:#009;margin:1px;float:left;">' . $t_key_txt . '</span>
<span id="' . $t_key . $field . '_conf" class="ax_result" style="margin-right:6px;font-size:0.8em">
' . active_in_div_field($t_key, $field) . '
</span>';


    $txt .= '
<label class=\'pc_checkbox\' title=\'klicken zum ein- oder ausschalten\'>
<input onclick="ax_checkbox_to_div_field(this.checked, this.id,\'' . $field . '\');" type="checkbox" id="' . $t_key . '" 
value="1" ' . $checked_txt . ' />
</label>
' . $dev_txt . '

</span></li>	
';

    $txt .= $comment_txt;

    $txt .= $detail_link_txt . $detail_link_txt2;

    $txt .= '</div>';
    return $txt;

}

function get_select_by_t_key_easy_div($t_key, $small_display = false, $style = '', $help_key = '', $tip_class = 'tip', $tip_width = '400px')
{
    global $wizard_icon13, $themes_icon10, $bearb_mode_use_popup_windows;

    //tooltip
    $t_key_txt = lookup('select t_key_txt from diverses where div_what =  \'' . $t_key . '\'  ', 't_key_txt');
    $t_key_comment = lookup('select t_key_comment from diverses where div_what =  \'' . $t_key . '\'  ', 't_key_comment');
    $tt_txt = '<b>' . $t_key_txt . '</b>' . $t_key_comment;
    $tt_txt = wrap_in_div_cat($tt_txt, 'tttxt', 'padding: 0 7px');
    $tt = tooltip($tt_txt, $img = '13', $style = 'margin-left:1px;position:relative', $class = $tip_class, $width = $tip_width, $admin = false, $margin_top = '', $icon = '');
    /*
	$tt_txt = '<b style="color:#009">'.$t_key_txt.'</b>' . $t_key_comment; 
	if(stristr($t_key_comment,'<img')) $this_tt_width = '750px';
	$tt_txt = wrap_in_div($tt_txt,'','padding: 0 7px');
	$tt = tooltip($tt_txt,$img='13',$style='margin-left:10px;position:relative',$class='tip',$width=$this_tt_width,$admin=false,$margin_top='',$icon=''); 

*/

    // help
    if ($help_key <> '') {
        //help_icon($key='',$preview_key='',$img='',$live_url='',$tiny=false,$new_window=false, $display_img = true,$big_icon=false)
        //$hk = help_icon($help_key,'','','',$tiny=true,false);	
        $hk = help_icon_new($help_key, $txt = 'Hilfe', $title = '', $with_text = false, $new_window = false, $icon = '13', $class = 'button99', $style = '');
    }
    //assi link
    $assi_url = lookup('select assi_url from diverses where div_what =  \'' . $t_key . '\'  ', 'assi_url');
    if ($assi_url <> '') {
        $assi_title = lookup('select assi_title from diverses where div_what =  \'' . $t_key . '\'  ', 'assi_title ');
        if (!$bearb_mode_use_popup_windows) {
            $assi_url_str = '<a target="_blank" title="' . strip_tags($assi_title) . ' - neues Fenster" class="button99" href="' . $assi_url . '#' . $t_key . '">' . $wizard_icon13 . ' Konfig.-Assi</a>';
        } else {

            $assi_url_str = get_lw_link_button_assi(
                $t_assi_url = $assi_url . '#' . $t_key,
                $goto = '',
                $t_help_key = '',
                $t_button_text = '',
                $t_button_class = 'button99',
                $t_button_title = strip_tags($assi_title),
                $t_pop_title = strip_tags($assi_title),
                $t_width = '1550',
                $t_height = '',
                $t_button_style = '',
                $t_icon_size = '13'
            );

        }

    }

    $design_assi_url = lookup('select design_assi_url from diverses where div_what =  \'' . $t_key . '\'  ', 'design_assi_url');
    $c1 = str_replace('&use_header=1', '', $assi_url);
    $c1 = str_replace('&use_header=0', '', $c1);
    $c2 = str_replace('&use_header=1', '', $design_assi_url);
    $c2 = str_replace('&use_header=0', '', $c2);


    if ($design_assi_url <> '' and $design_assi_url <> $assi_url and $c1 <> $c2 and $design_assi_url <> curPageName()) {
        /*
		if($bearb_mode_use_popup_windows){
			$design_assi_url_str = get_lw_link_button_assi(
				$t2_assi_url = $design_assi_url.'#'.$t_key,
				$t2_goto='',
				$t2_help_key='',
				$t2_button_text='',
				$t2_button_class='button99',
				$t2_button_title = '',
				$t2_pop_title = '',
				$t2_width='1550',
				$t2_height='',
				$t2_button_style='',
				$t2_icon_size = '13'
				);
		}else{
			$design_assi_url_str = '<a target="_blank" title="Design-Assi - neues Fenster" class="button99" href="'.$design_assi_url.'#'.$t_key.'">'.$themes_icon10.' Design-Assi</a>';	
		}
		*/
    }

    $r .= '<div class="settings" style="' . $style . '">';
    $r .= '';
    $r .= $tt . $hk . $assi_url_str . $design_assi_url_str;
    //$r .= '<div style="style="float:right;margin:-5px -5px 0 0"">'.$tt.'</div>';	  
    $r .= '<div style="margin:1px 4px 0 0">' . get_select_by_t_key_easy($t_key, $small_display) . '</div>';
    //$r .=  $c1.' =  '.$c2; 
    $r .= '</div>';

    return $r;
}


function get_select_by_t_key_easy($t_key, $small_display = false, $save_assi_title = false)
{
    $para_str = lookup('select funktion from diverses where div_what = "' . $t_key . '" ', 'funktion');
    if ($para_str <> '' and stristr($para_str, '�')) {
        $para_str_arr = explode('�', $para_str);
        $pref = $para_str_arr[0];
        $suff = $para_str_arr[1];
        $show_bitte = $para_str_arr[2];
        $allow_edit = $para_str_arr[3];
        $option_arr = $para_str_arr[4];
        $make_arr = $para_str_arr[5];
        $arr_from = $para_str_arr[6];
        $arr_to = $para_str_arr[7];
        $add_in = $para_str_arr[8];
        $show_link = $para_str_arr[9];
        $use_enh_editor = $para_str_arr[10];
        $use_on_change = $para_str_arr[11];
        $style = $para_str_arr[12];
        $arr_step = $para_str_arr[13];
        $curr_val = $para_str_arr[14];
        $default_val = $para_str_arr[15];

        return get_select_by_t_key(
            $t_key,
            $pref,
            $suff,
            $show_bitte,
            $allow_edit,
            $option_arr,
            $make_arr,
            $arr_from,
            $arr_to,
            $add_in,
            $show_link,
            $use_enh_editor,
            $use_on_change,
            $style,
            $arr_step,
            $curr_val,
            $default_val, $write_to_db = false, $small_display, $save_assi_title);

    } else {
        return 'noch keine Daten!';
    }


}

function get_select_by_t_key(
    $t_key, $pref = '', $suff = '', $show_bitte = false, $allow_edit = false, $option_arr = '',
    $make_arr = false,
    $arr_from = 0,
    $arr_to = 0,
    $add_in = '',
    $show_link = true,
    $use_enh_editor = true,
    $use_on_change = true,
    $style = 'margin-left:6px;',
    $arr_step = '1',
    $curr_val = '',
    $default_val = '',
    $write_to_db = true,
    $small_display = false,
    $save_assi_title = true
)
{
    global $new_browser_window_icon, $popup_window_icon, $assi_title, $allow_assi_title_write;

    $save_str = $pref . '�' . $suff . '�' . $show_bitte . '�' . $allow_edit . '�' . $option_arr . '�' . $make_arr . '�' . $arr_from . '�' . $arr_to . '�' . $add_in . '�' . $show_link . '�' . $use_enh_aditor . '�' . $use_on_change . '�' . $style . '�' . $arr_step . '�' . $curr_val . '�' . $default_val;
    $sql = "update diverses set funktion = '" . $save_str . "' where div_what = '" . $t_key . "' ";
    if ($write_to_db and $add_in == '') q($sql);

//if( getParam('item','')  ) $assi_url =  getParam('item','')  ;
//if( getParam('incl','')  ) $assi_url =  getParam('incl','')  ;
    /*
$assi_url = str_replace(HTTP_CATALOG_SERVER.DIR_WS_ADMIN,'',curPageURL());
//$sql_div="update diverses set assi_typ='select', mtime=".microtime(true).", assi_url = '".$assi_url."', assi_title='".$assi_title."' where div_what = '".$t_key."' " ;
$is_design_assi = true;
if(stristr($assi_url,'template1.php') ) $is_design_assi = false;

if($is_design_assi){
	$sql_div="update diverses set assi_typ='select', mtime=".microtime(true).", design_assi_url = '".$assi_url."', assi_title='".$assi_title."' where div_what = '".$t_key."' " ;
}else{
	$sql_div="update diverses set assi_typ='select', mtime=".microtime(true).", assi_url = '".$assi_url."', assi_title='".$assi_title."' where div_what = '".$t_key."' " ;	
}
if( $assi_url<>'' and !$small_display and !stristr($assi_url,'popup_config_this.php') and $save_assi_title and to_bool($allow_assi_title_write) ) q($sql_div);
*/


    $sql_div = "update diverses set assi_typ='select' where div_what = '" . $t_key . "' ";
    q($sql_div);


    if (get_dv($t_key) == 'default_val') set_dv($t_key, $default_val);

    set_dv_if_not_exists_to($t_key, $default_val, true);

    if ($curr_val == '') $curr_val = get_dv($t_key);

//if(is_dev() and !$make_arr) make_t_key($t_key.'_array',$option_arr); // nur wenn noch nicht vorhanden
    set_dv_if_not_exists_to($t_key . '_array', $option_arr, false);


    $sql = "select * from diverses where div_what = '" . $t_key . "' limit 1 ";
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $div_id = $row["div_id"];
        $div_what = $row["div_what"];
        $div_res = $row["div_res"];
        $div_res_long = $row["div_res_long"];
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

        $assi_title = $row["assi_title"];
        $assi_url = $row["assi_url"];
        $design_assi_url = $row["design_assi_url"];
    }
    mysql_free_result($sql_result);
//if ($t_key_txt<>'') $t_key_txt = $t_key_txt.': ';

    if ($t_key_detail_link <> '' and $show_link) {
        $detail_link_txt = '
<div class="qedit_linkdiv">
<a target="_blank" title="in neuem Browser-Fenster" href="' . $t_key_detail_link . '">' . $t_key_txt . ' <u>Details konfigurieren</u></a>
</div>
';
        $detail_link_txt2 = '
<div class="qedit_linkdiv">
<a class="lightwindow" params="lightwindow_type=external"
title="Inline Popup" href="' . $t_key_detail_link . '?poppage=1">' . $t_key_txt . ' <u>Details konfigurieren</u> im PopUp-Fenster</a>
</div>
';


    } else {
        $detail_link_txt = '';
        $detail_link_txt2 = '';
    }


    if (is_dev()) {
//////////////////////////////
        $comment_txt = '
<div class="qedit_comment">
' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_comment') . '
</div>
<div class="qedit_comment" style="display:none">
' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_detail_link') . '
</div>
';
        if ($use_enh_editor) {
            $comment_txt .= '<div style="margin:0 6px 9px 0">' . get_enh_html_editor_by_t_key_link($t_key, 't_key_comment') . '</div>';
        }
/////////////////////////////
    } else {

        if ($t_key_comment <> '') {
            $comment_txt = '
<div class="qedit_comment">
' . parse_links($t_key_comment) . '
</div>
';
        } else {
            $comment_txt = '';
        }
    }

    if ($small_display) {
        //$txt.='<div class="_qedit_outer" style="text-align:left;font-size:0.9em"><img style="float:right;margin:-5px -5px 0 0" src="../images/icon4/famfam/wand.png" />';	
        $txt .= '<div class="_qedit_outer" style="text-align:left;font-size:0.9em">';
    } else {
        $txt .= '<a name="' . $t_key . '" id="a_' . $t_key . '"></a><div class="qedit_outer" style="text-align:left">';
    }

    if (is_dev()) {
        if (!to_bool($small_display)) $txt .= '<span style="margin:0 5px 0 0;float:right" class="onlydev">' . get_dev_link($t_key) . '</span>';
    } else {
        if (!$small_display) $txt .= '<span style="margin:0 5px 0 0;float:right" class="notonlydev">' . $t_key . '</span>';
    }


    if (is_dev()) {
//////////////////////////////////
        if ($t_key_txt == '') set_t_key_txt_empty($t_key);

        $txt .= '<span style="font-size:1.0em;font-weight:bold; color:#009;margin:1px;float:left;">
' . $item_no_txt . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_txt') . '</span><br><br class="lh8">';

//////////////////////////////////

    } else {

        $txt .= '<div style="font-size:1.0em;font-weight:bold; color:#009;margin:3px 0 0 0 ;float:left;">' . strip_tags($t_key_txt) . '</div><div class="clear"></div>';
    }


    if ($use_on_change) {
        $zuf = mt_rand(100000, 100000000);
        $txt .= '<div  style="margin:5px;display:inline;font-size:0.9em;white-space:nowrap">aktueller Wert ist: ' . $pref . '<span class="CONF" style="color:#c00" id="conf_' . $t_key . $zuf . '">' . get_dv($t_key) . '</span> ' . $suff . '</div>';
    }


    if ($use_on_change) {

        $txt .= '<select style="' . $style . ';margin-top: 0.1em;margin-bottom: 0.15em;font-size:1.0em" id="' . $t_key . $zuf . '" onchange="do_qu(\'ax_updater.php\',\'id=2901_\' + $F($(\'' . $t_key . $zuf . '\')) + \'_x_y_x_' . $t_key . '\' ,\'conf_' . $t_key . $zuf . '\');">';

        //$txt.='<select style="'.$style.'" id="'.$t_key.'" onchange="alert(\'xx\')">';


    } else {
        $txt .= '<select style="' . $style . '" id="' . $t_key . '" >';
    }


    if ($show_bitte) $txt .= '<option value="0">' . PULL_DOWN_DEFAULT . '...</option>';

    if (!$make_arr) {
        $array = get_dv($t_key . '_array');
    } else {
        $array = get_array($arr_from, $arr_to, $arr_step);
    }
    $curr_val = get_dv($t_key);
    $txt .= get_options_str($curr_val, $pref, $array, $suff);


    $txt .= '</select>';

//print_ar($array);
//ec($array);


    if ($add_in <> '') {
        $txt .= $add_in;
    }


    if ((is_dev() or $allow_edit) and !$make_arr) {

        $txt .= '<div class="inline_edit_options" style="display:inline;">
<span><a href="javascript:show_hide(\'EDIT_' . $t_key . '\',\'\')">editiere Optionen (ein/aus)</a>
' . tooltip('
Sie k&ouml;nnen die Optionen-Anzeige im Pulldown-Men&uuml; &auml;ndern und bleibend abspeichern.<br>
Achten Sie darauf, dass die einzelnen Werte mit Komma (,) getrennt werden.<br>
Klicken Sie zun&auml;chst auf <b>editiere Optionen (ein/aus)</b> und danach in das sich &ouml;ffnende Feld.<br><br>
Nach &Auml;nderungen auf <b>speichern</b> klicken. Sie m&uuml;ssen die Seite neu laden damit die ge&auml;nderten Werte im Pulldown-Men&uuml; erscheinen.


', $img = '13', $style = '', $class = 'tip_lu') . '
</span>
<div id="EDIT_' . $t_key . '" style="display:none;margin:6px">
<span class="axupd_1" id="' . $t_key . '_array' . '">' . get_dv($t_key . '_array') . '</span>
<script>new Ajax.InPlaceEditor(\'' . $t_key . '_array' . '\', \'ax_updater.php?id=1632_' . $t_key . '_array' . '\',{okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - max. 255 Zeichen\'});</script>
</div>
</div>
';
    }

    if ($small_display) {

    } else {
        $txt .= $comment_txt;
        $txt .= $detail_link_txt . $detail_link_txt2;
    }


    $txt .= '</div>';
    return $txt;
}


function get_array($arr_from, $arr_to, $arr_step = '1')
{
    $x = '';
    if ($arr_from == '' or $arr_to == '') return;

    for ($i = $arr_from; $i <= $arr_to; $i = $i + $arr_step) {
        $x .= $i . ',';
    }
    $x = str_replace('<option value="">   px</option>', '', $x);

    return substr($x, 0, -1);
}

function get_editor_by_t_key_pop($t_key, $class = '', $style = '', $type = 'il')
{
    $shop = 'd';
    $shop_l = 'div';


    $href = 'help_2_adm.php?url=popup_edit_text.php?p=' . $t_key . '&long=short&what=' . $shop_l;
    $text = 'bearbeiten (' . $t_key . ')';
    $title = 'Text-Editor (PopUp) ' . $t_key;
    //$class='';
    //$style='';
    $width = '900';
    $height = '500';
    //$type='il';
    $link = make_link2($href, $text, $title, $class, $style, $width, $height, $type);

    return $link;

}


function get_editor_by_t_key($t_key, $field = '', $use_title = true, $use_outer_div = true, $t_style = '', $allow_html_editor = true)
{
    global $shop_is_multilang, $multi_lang_icon_65, $assi_title, $allow_assi_title_write;

    $sql = "select * from diverses where div_what = '" . $t_key . "' limit 1 ";
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $div_id = $row["div_id"];
        $div_what = $row["div_what"];
        $div_res = $row["div_res"];
        $div_res_long = $row["div_res_long"];
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

        if ($shop_is_multilang) $is_multi_lng = $row["is_multi_lng"];
    }
    mysql_free_result($sql_result);

    $languages = tep_get_languages();
//if ($t_key_txt<>'') $t_key_txt = $t_key_txt.': ';
    $this_conf_url = curPageName() . '?incl=' . getParam('incl', '') . '&use_header=1&item=' . getParam('item', '');
    $sql = "update diverses set t_key_detail_link  = '" . $this_conf_url . "' where div_what = '" . $t_key . "' ";
    if (to_bool($is_multi_lng)) q($sql);
//ec($this_conf_url);


//if( getParam('item','')  ) $assi_url =  getParam('item','')  ;
//if( getParam('incl','')  ) $assi_url =  getParam('incl','')  ;
    /*
$assi_url = str_replace(HTTP_CATALOG_SERVER.DIR_WS_ADMIN,'',curPageURL());


//$sql_div="update diverses set assi_typ='text', mtime=".microtime(true).", assi_url = '".$assi_url."', assi_title='".$assi_title."' where div_what = '".$t_key."' " ;

$is_design_assi = true;
if(stristr($assi_url,'template1.php') ) $is_design_assi = false;

if($is_design_assi){
	$sql_div="update diverses set assi_typ='text', mtime=".microtime(true).", design_assi_url = '".$assi_url."', assi_title='".$assi_title."' where div_what = '".$t_key."' " ;
}else{
	$sql_div="update diverses set assi_typ='text', mtime=".microtime(true).", assi_url = '".$assi_url."', assi_title='".$assi_title."' where div_what = '".$t_key."' " ;	
}


if( $assi_url<>'' and !stristr($assi_url,'popup_config_this.php') and to_bool($allow_assi_title_write) ) q($sql_div);
//q($sql_div);
*/


    $sql_div = "update diverses set assi_typ='text' where div_what = '" . $t_key . "' ";
    q($sql_div);


    if (($t_key_txt == '' or $t_key_txt == '???') and eregiS('_link_text', $t_key)) {
        $sql = "update diverses set t_key_txt = 'Dieser Text wird als Link angezeigt:' where div_what =  '" . $t_key . "' ";
        q($sql);
    }

    if (eregiS('_link_text', $t_key)) {
        $sql = "update diverses set t_key_comment = 'Der sichtbare Text f&uuml;r den Link. M&ouml;glichst kurz!<br>Dieser Text wird auch verwendet um diese Seite zu identifizieren, z.B. in der Liste der editierbaren Seiten' where div_what =  '" . $t_key . "' ";
        q($sql);
    }


    if (($t_key_txt == '' or $t_key_txt == '???') and eregiS('_link_hover_title', $t_key)) {
        $sql = "update diverses set t_key_txt = 'Titel bei MouseOver:' where div_what =  '" . $t_key . "' ";
        q($sql);
    }


    if ($t_key_comment == '' and eregiS('_link_hover_title', $t_key)) {
        $sql = "update diverses set t_key_comment = 'Dieser Text wird bei MouseOver angezeigt, sowie als Titel bei Popup-Fenstern. ' where div_what =  '" . $t_key . "' ";
        q($sql);
    }

    if (is_dev()) {

        $comment_txt = '
	<div class="qedit_comment">
	' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_comment') . '
	</div>
	';

        $comment_txt .= '<div style="margin:0 6px 9px 0">' . get_enh_html_editor_by_t_key_link($t_key, 't_key_comment') . '</div>';


    } else {  //if (is_dev()){

        if ($t_key_comment <> '') {
            $comment_txt = '
	<div class="qedit_comment" > 
	' . parse_links($t_key_comment) . '
	</div>
	';
        } else {  //if (is_dev()){
            $comment_txt = '';
        }
    } //if (is_dev()){

    if ($field == '') {
        //$ax_updater_id = '163';


        if (eregiS('_is_active', $t_key)) $qedit_outer_style = 'background:#def';
        if (eregiS('_is_installed', $t_key)) $qedit_outer_style = 'background:#fde';
        if (eregiS('_txt', $t_key)) $qedit_outer_style = 'none;';
        if (!$use_outer_div) $qedit_outer_style = 'none;background:transparent';

        $txt .= '<a name="' . $t_key . '" id="a_' . $t_key . '"></a><div class="qedit_outer" style="text-align:left;' . $qedit_outer_style . '">';

        if (is_dev()) {
            $txt .= '<span style="margin:0 5px 0 0;float:right" class="onlydev">' . get_dev_link($t_key) . '</span>';
        } else {
            $txt .= '<span style="margin:0 5px 0 0;float:right" class="notonlydev">' . $t_key . '</span>';
        }

        if (eregiS('_is_active', $t_key)) $qedit_outer_style = 'background:#def';
        if (eregiS('_is_installed', $t_key)) $qedit_outer_style = 'background:#fde';
        if (eregiS('_content', $t_key)) $qedit_outer_style = 'border:6px #369 dotted;';


        //$txt.='<div class="qedit_outer" style="'.$qedit_outer_style.'">'; 

        if ($is_multi_lng) $txt .= '<span style="float:right;margin:12px 24px 0 0">
	<a style="font-size:0.8em" target="_blank" title="alle Sprachen - neues Fenster" 
	href="http://translate.google.de/?hl=de&cp=15&gs_id=3cw&xhr=t&q=&bav=on.2,or.r_gc.r_pw.r_qf.,cf.osb&biw=1920&bih=948&um=1&ie=UTF-8&sa=N&tab=wT">Google-&Uuml;bersetzer</a></span>';


        if (is_dev()) {
            if ($t_key_txt == '' and $use_title) set_t_key_txt_empty($t_key);
            if ($use_title) $txt .= '<div style="font-size:1.0em;font-weight:bold; color:#009;margin:5px 0 0 0;float:left;display:inline">' . $item_no_txt . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_txt') . '</div><div class="clear"></div>';
        } else {
            if ($use_title) $txt .= '<div style="font-size:1.0em;font-weight:bold; color:#009;margin:5px 0 0 0;float:left;display:block">' . $t_key_txt . '</div><div class="clear"></div>';
        }

        if ($comment_txt <> '') $txt .= $comment_txt;
        $txt .= '<div style="margin:18px 0 9px 0">' . ($is_multi_lng ? lang_icon('de') : '') . '<span style="width:95%;font-size:1.2em;margin-left:4px;' . $t_style . '" class="axupd_1" id="' . $t_key . '">' . get_dv($t_key) . '</span>';
        $txt .= '<script>new Ajax.InPlaceEditor(\'' . $t_key . '\', \'ax_updater.php?id=163_' . $t_key . '\',{okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - max. 255 Zeichen\',rows:1,cols:1});</script>';

        $hint = 'html_editor_for_255_chars_hint';
        $h = get_hint_by_t_key($hint, $use_outer_div = false, $show_header = false, $use_comment_div = false, $parse_links = true);

        /*
	$txt.=' <span class="lgrey9" style="margin-left:6px"> Text klicken zum Editieren - max. 255 Zeichen! '.help_icon_by_key('admin_all_text_editors_simple',$hi_txt='Hilfe',$hi_title='einfacher Text-Editor - Popup').'
	oder den Text mit dem HTML-Editor &ouml;ffnen '.get_enh_html_editor_any_table($div_id,'diverses','div_res','div_id','',true).tooltip($h,$img='13',$style='',$class='tip','',true).'</span>
	</div>';
	*/
        $editor_link = '<a class="button3 lightwindow" params="lightwindow_type=external,lightwindow_width="  href="popup_edit_html_short.php?p=' . $t_key . '&lang=de&what=' . $t_key . '">HTML-Editor</a>';
        $txt .= ' <span class="lgrey9" style="margin-left:6px"> Text klicken zum Editieren - max. 255 Zeichen! ' . help_icon_by_key('admin_all_text_editors_simple', $hi_txt = 'Hilfe', $hi_title = 'einfacher Text-Editor - Popup') . '
	oder den Text mit dem HTML-Editor &ouml;ffnen ' . $editor_link . '</span>
	</div>';


        /*$txt.='<div style="margin:9px 0 0 0;font-weight:normal;color:#999;font-size:1.0em">'.get_plain_text_editor_config($configuration_key).'
<span style="font-size:0.7em;margin-left:6px"> in den Text klicken zum Editieren - max. 255 Zeichen!'.help_icon_by_key('admin_all_text_editors_simple',$hi_txt='Hilfe',$hi_title='einfacher Text-Editor - Popup').'</span></div>
<div></div>'; 	
*/

//echo '<div style="display:inline-block;font-size:0.8em;margin: 3px 0 0 1px">'.get_enh_html_editor_any_table($id,$table,$field,$id_field,'',true).'</div>';
//echo '<div style="display:inline-block;font-size:0.8em;margin: 3px 0 0 1px">'.get_enh_html_editor_any_table($div_id,'diverses,'div_res','div_id,'',true).'</div>';

        if ($shop_is_multilang) {
            if ($is_multi_lng == 1) {
                $h = get_hint_by_t_key('txt_translation_hint', $use_outer_div = false, $show_header = false, $use_comment_div = false, $parse_links = true);

                $txt .= '<div style="float:right;margin:6px 6px 0 0"><a title="oder unten die Texte einzelnd bearbeiten..." class="button_green" style="font-size:0.9em" 
			href="javascript:do_transl_general_all_langs_and_save(\'' . $t_key . '\')">deutschen Text in alle Sprachen &uuml;bersetzen und speichern</a><span id="CONF_do_transl_general_all_langs_and_save_' . $t_key . '"></span></div>
			<div style="font-weight:bold;padding:0 0 6px 6px;color:#246">&Uuml;bersetzungen f&uuml;r obigen Text: ' . tooltip($h, $img = '16', $style = 'margin-left:9px', $class = 'tip', $width = '650px', $admin = true) . '</div>';

                $language_id_english = language_id_english();
                $language_english_is_used = language_english_is_used();
                $translations_exist = false;
                for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
                    $language_id = $languages[$i]['id'];
                    $language_name = $languages[$i]['name'];
                    $language_code = $languages[$i]['code'];
                    if ($language_name <> 'deutsch') {
                        if (get_dv_lang_new($t_key, $language_code) <> '') $translations_exist = true;
                        $txt .= '<div style="padding:0 0 1px 6px">' . lang_icon($languages[$i]['code']) . ' <div style="font-size:0.8em;color:#666;display:inline-block;width:170px">&Uuml;bersetzung in ' . $language_name . ': </div><br />';
                        $txt .= '<input style="width:410px;color:#006;font-weight:normal;margin-bottom:1px;font-size:1.1em;background:#ffe" type="text" id="transl_res_' . $t_key . $language_id . '" value="' . get_dv_lang_new($t_key, $language_code) . '" />';
                        $txt .= '<a title="&uuml;bersetzen von deutsch" class="button3" style="font-size:0.8em;margin-left:4px" 
						href="javascript:do_transl_general(\'' . $t_key . '\',\'transl_res_' . $t_key . $language_id . '\',\'' . $language_code . '\')" >' . lang_icon('de') . ' > ' . lang_icon($languages[$i]['code']) . '</a>';

                        if ($language_code <> 'en' and $language_english_is_used)
                            $txt .= '<a title="&uuml;bersetzen von englisch!" class="button3" style="font-size:0.8em;margin-left:4px" 
							href="javascript:do_transl_general_en(\'transl_res_' . $t_key . $language_id_english . '\',\'transl_res_' . $t_key . $language_id . '\',\'' . $language_code . '\')" >' . lang_icon('en') . ' > ' . lang_icon($languages[$i]['code']) . '</a>';

                        $txt .= '<a title="&Uuml;bersetzung speichern" class="button_green" style="margin-left:4px;font-size:0.8em" href="javascript:do_takeover_general1(\'transl_res_' . $t_key . $language_id . '\',\'' . $language_code . '\',\'' . $t_key . '\')" >speichern </a>';
                        $txt .= "<span style='margin-left:4px' id='takeover_CONF_" . $t_key . $language_code . "'></span>";
                        $txt .= '</div>';
                    }
                } //for
            }  //if ($is_multi_lng==1){
        } //if ($shop_is_multilang){

        global $attention_icon24;
        if ($translations_exist and get_dv($t_key) == '') $txt .= '<div style="margin:5px 0 18px 0;padding:6px;border:1px #c00 solid;background:#fee;font-size:1.1em"><div style="float:left;margin:0 8px 12px 0">' . $attention_icon24 . '</div>Der Text in deutsch ist leer, aber es gibt &uuml;bersetzte Texte. 
<br>
Diese &Uuml;bersetzungen jetzt entfernen?
<div style="margin:9px 0 5px 28px"><a class="button3" href="javascript:remove_unused_translations(\'' . $t_key . '\',\'short\')">Ja, entfernen!</a> <span id="CONF_remove_unused_translations_' . $t_key . '"></span></div>
</div>';


    } else { //if($field==''){
        //$ax_updater_id = '1630'; // needs field   Tkey = t_key.$field
        $txt .= '<div class="qedit_outer" style="text-align:left;' . $qedit_outer_style . '">';
        $txt .= '<span style="margin:0 5px 0 0;float:right" class="onlydev">' . $t_key . ' - <b>' . $field . '</b></span>';
        if ($comment_txt <> '') $txt .= $comment_txt;
        $txt .= '<span style="width:95%;' . $t_style . '" class="axupd_1" id="' . $t_key . $field . '"> ' . $field . ' - ' . get_dv_field($t_key, $field) . '</span>';
        $txt .= '
	<script>new Ajax.InPlaceEditor(\'' . $t_key . $field . '\', \'ax_updater.php?id=1630_' . $t_key . '_x_y_x_' . $field
            . '\',{okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - max. 255 Zeichen\'});</script>
	';


    }
//if ($comment_txt<>'') $txt.=$comment_txt;
    $txt .= '</div>';
    return $txt;
}


function get_long_html1_editor_by_t_key($t_key, $use_enh_editor = true, $is_tooltip = false)
{
    global $new_browser_window_icon, $popup_window_icon, $html_editor_icon;
    global $shop_is_multilang, $multi_lang_icon_65, $assi_title, $allow_assi_title_write;
    $sql = "select * from diverses where div_what = '" . $t_key . "' limit 1 ";
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $div_id = $row["div_id"];
        $div_what = $row["div_what"];
        $div_res = $row["div_res"];
        $div_res_long = $row["div_res_long"];
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
        $is_multi_lng = $row["is_multi_lng"];
    }
    mysql_free_result($sql_result);

    if (stristr($t_key, '_superfish_text') and $is_multi_lng == 0) {
        create_dv($t_key, '0', $app_top = false);
        $sql = "update diverses set is_multi_lng=1 where div_what =  '" . $t_key . "'";
        q($sql);
        $is_multi_lng = 1;
    }


//�bersetzungen loop

    $this_conf_url = curPageName() . '?incl=' . getParam('incl', '') . '&use_header=1&item=' . getParam('item', '');
    $sql = "update diverses set t_key_detail_link  = '" . $this_conf_url . "' where div_what = '" . $t_key . "' ";
    if (to_bool($is_multi_lng)) q($sql);

//if( getParam('item','')  ) $assi_url =  getParam('item','')  ;
//if( getParam('incl','')  ) $assi_url =  getParam('incl','')  ;
    /*
$assi_url = str_replace(HTTP_CATALOG_SERVER.DIR_WS_ADMIN,'',curPageURL());


//$sql_div="update diverses set assi_typ='longtext', mtime=".microtime(true).", assi_url = '".$assi_url."', assi_title='".$assi_title."' where div_what = '".$t_key."' " ;

$is_design_assi = true;
if(stristr($assi_url,'template1.php') ) $is_design_assi = false;

if($is_design_assi){
	$sql_div="update diverses set assi_typ='longtext', mtime=".microtime(true).", design_assi_url = '".$assi_url."', assi_title='".$assi_title."' where div_what = '".$t_key."' " ;
}else{
	$sql_div="update diverses set assi_typ='longtext', mtime=".microtime(true).", assi_url = '".$assi_url."', assi_title='".$assi_title."' where div_what = '".$t_key."' " ;	
}


if( $assi_url<>'' and !stristr($assi_url,'popup_config_this.php') and to_bool($allow_assi_title_write) ) q($sql_div);
*/


    $sql_div = "update diverses set assi_typ='longtext' where div_what = '" . $t_key . "' ";
    q($sql_div);

//if($is_tooltip) $tt_class_add = '_toolt';  //div.qedit_comment, div.qedit_comment_toolt {

    if (is_dev()) {
        $comment_txt .= '
	<div class="qedit_comment">
	' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_comment') . '
	</div>
	<div class="qedit_comment" style="display:none">
	' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_detail_link') . '
	</div>
	';
        if ($use_enh_editor) {
            $comment_txt .= '<div style="margin:0 6px 9px 0">' . get_enh_html_editor_by_t_key_link($t_key, 't_key_comment') . '</div>';
        }

    } else {
        if ($t_key_comment <> '') {
            $comment_txt = '
		<div class="qedit_comment">
		' . parse_links($t_key_comment) . '
		</div>
		';
        } else {
            $comment_txt = '';
        }
    }
//if ($t_key_txt<>'') $t_key_txt = $t_key_txt.': ';
//$comment_txt .= '<a name="'.$t_key.'" id="'.$t_key.'"></a>';


    $dev_link = get_dev_link($t_key);

    if (is_dev() and $t_key_detail_link <> '') {
        $detail_link_txt = '
	<div class="qedit_linkdiv">
	<a target="_blank" title="in neuem Browser-Fenster" href="' . $t_key_detail_link . '">' . $t_key_txt . ' <u>Details konfigurieren</u></a>
	</div>
	';
        $detail_link_txt2 = '
	<div class="qedit_linkdiv" style="display:inline;margin-left:9px">
	<a class="lightwindow" params="lightwindow_type=external"
	title="Inline Popup" href="' . $t_key_detail_link . '?poppage=1">' . $t_key_txt . ' <u>Details konfigurieren</u> im PopUp-Fenster</a>
	</div>
	';
    } else {
        $detail_link_txt = '';
        $detail_link_txt2 = '';
    }

    if (is_dev()) {

        $comment_txt = '
	<div class="qedit_comment">
	' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_comment') . '
	</div>
	<div class="qedit_comment" style="display:none">
	' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_detail_link') . '
	</div>
	';
        if ($use_enh_editor) {
            $comment_txt .= '<div style="margin:0 6px 9px 0">' . get_enh_html_editor_by_t_key_link($t_key, 't_key_comment') . '</div>';
        }

    } else {

        if ($t_key_comment <> '') {
            $comment_txt = '
		<div class="qedit_comment">
		' . parse_links($t_key_comment) . '
		</div>
		';
        } else {
            $comment_txt = '';
        }
    }

//ec(__line__.' '.$comment_txt);


//$href='wrapper_all.php?incl=popup_edit_html.php?p='.$t_key.'&long=1&what='.$shop_l;
    $text = $html_editor_icon . ' <b>HTML-Editor</b> &nbsp; ' . lang_icon('de');
    $title = 'HTML-Editor im Popup-Fenster ';
    $class = 'button1';
    $style = '';
    $width = '1000';
    $height = '800';
    if (curPageName() == 'edit_langs2.php' or curPageName() == 'ax_updater.php') {
        $type = 'bb';
    } else {
        $type = 'il';
    }

    if ($is_tooltip) $add_para = '&field=t_key_comment';

    if ($type == 'bb') {
        $href = 'popup_edit_html.php?p=' . $t_key . '&long=1&what=' . $shop_l . $add_para;
    } else {
        $href = 'help_2_adm.php?url=popup_edit_html.php?p=' . $t_key . '&long=1&what=' . $shop_l . $add_para;
    }

    $link = make_link2($href, $text, $title, $class, $style, $width = '', $height = '', $type);

    if (eregiS('_content', $t_key)) $qedit_outer_style = 'margin-bottom:3px;';
//$txt.='<div class="qedit_outer" style="text-align:left;'.$qedit_outer_style.'">';


//if($is_tooltip) $tt_class_add = '_toolt';  //div.qedit_comment, div.qedit_comment_toolt {

    if (is_dev()) {

        if ($t_key_txt == '') set_t_key_txt_empty($t_key);
        $txt .= '<div class="qedit_outer" style="' . $qedit_outer_style . '"><span style="font-size:1.0em;font-weight:bold; color:#009;margin:1px;float:left;">
	' . $item_no_txt . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_txt') . '</span><br>';
        //////////////////////////////////if ($is_tooltip){

    } else {
        $txt .= '<div class="qedit_outer" style="' . $qedit_outer_style . '"><span style="font-size:1.0em;font-weight:bold; color:#009;margin:1px;float:left;">' . $t_key_txt . '</span><br>';
    }

//$txt .= get_help_block('17','admin_all_text_editors');
//$txt .= ''.help_icon_by_key('admin_all_text_editors_html',$txt='',$title='erweiterter HTML-Editor - Popup',$with_text=false).'';
//$txt .= ''.help_icon_by_key('admin_all_text_editors_new_translations',$txt='&Uuml;bersetzungen mit dem HTML-Editor',$title='&Uuml;bersetzungen mit erweiterter HTML-Editor - Popup',$with_text=false).'';

    $txt .= '<a name="' . $t_key . '" id="a_' . $t_key . '"></a>';

    if (!$is_tooltip) $txt .= '<div class="clear" style="margin-top:-6px">' . $comment_txt . '</div>';

    $txt .= deuml('<div class="round6 dimmed04" style="padding:4px 6px;border:1px #ccc solid;text-align:justify;margin:9px 8px 3px 8px;background:#eee;font-size:0.9em">
Um den Text zu bearbeiten oder zu �bersetzen benutzen Sie den erweiterten HTML-Editor. Im HTML-Editor k�nnen die Texte in deutsch und allen anderen Sprachen �bersetzt und bearbeitet werden.<br>
Klicken Sie in den Text oder auf den Button.');

    if ($shop_is_multilang) {
        $txt .= deuml('<br>Falls Sie den deutschen Text �ndern m�ssen Sie wahrscheinlich auch die �bersetzungen neu machen.');
        $txt .= '</div>';
    }


    $txt .= '<div class="clear" style="border-bottom:1px #ccc solid;height:1px;margin: 5px 0 -22px 0"></div><a title="Anzeigen aktualisieren - Assistent neu laden" class="button3" style="float:right;font-size:0.9em;margin: 25px 9px -25px 0" href="javascript:window.location.reload()" >Refresh</a>';

    if (is_dev()) {
        $txt .= '
	<span style="margin:0 5px 0 0;float:right" class="onlydev">
	' . get_dev_link($t_key) . '</span><div class="clear"></div>
	<div class="inline_edit_options" style="font-size:1.0em">' . lang_icon('de') . ' Zum Editieren den Text im ' . $link . ' &ouml;ffnen';
    } else {
        $txt .= '<div class="clear"></div>
	<div class="inline_edit_options" style="font-size:1.0em">' . lang_icon('de') . ' Zum Editieren den Text im ' . $link . ' &ouml;ffnen';
    }


    $hint = get_hint_by_t_key('configuration_wizard_enh_html_editor_hint', $use_outer_div = false, $show_header = false, $use_comment_div = false, $parse_links = true);
    $txt .= tooltip($hint, $img = '16', $style = 'margin-left:8px', $class = 'tip_lu', $width = '600px', $admin = true);

//$txt .= ''.help_icon_by_key('admin_all_text_editors_new_translations',$txt='&Uuml;bersetzungen mit dem HTML-Editor',$title='&Uuml;bersetzungen mit erweiterter HTML-Editor - Popup',$with_text=false).''; 

    $txt .= '<div style="border-bottom:1px #ccc solid;height:12px;margin:0 -5px"></div></div>';


    if ($is_tooltip) {
        $url = 'popup_edit_html.php?p=' . $t_key . '&amp;long=1&amp;what=';
        //$txt.='<div class="content_tobeedited" ><div id="tobeedited'. $t_key .'" style="min-height:24px">'.$t_key_comment .'</div>';
        $url = 'popup_edit_html.php?p=' . $t_key . '&amp;long=1&amp;what=&amp;rel=t_key_comment&amp;field=t_key_comment';
        $txt .= '<div class="content_tobeedited" onclick="pop_il(\'' . $url . '\',\'HTML-Editor im Popup-Fenster\',\'\',\'\')" ><div id="tobeedited' . $t_key . '" style="min-height:24px">' . $t_key_comment . '</div>';
        /*
	$txt.='
	<script>
	new Ajax.InPlaceEditor($(\'tobeedited'. $t_key .'\'), \'ax_updater.php?id=1695_'. $t_key .'\', {okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten -  Text nicht begrenzt\'}, tinymce_options);
	</script>
	';
*/

    } else {
//	popup_edit_html.php?p=self_def_box_right1_content&amp;long=1&amp;what=" title="HTML-Editor im Popup-Fenster " 
        $url = 'popup_edit_html.php?p=' . $t_key . '&amp;long=1&amp;what=';
        $txt .= '<div class="content_tobeedited" onclick="pop_il(\'' . $url . '\',\'HTML-Editor im Popup-Fenster\',\'\',\'\')" ><div id="tobeedited' . $t_key . '" style="min-height:24px">' . get_dv_l($t_key) . '</div>';
        /*	
	$txt.='
	<script>
	new Ajax.InPlaceEditor($(\'tobeedited'. $t_key .'\'), \'ax_updater.php?id=170_'. $t_key .'\', {okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten -  Text nicht begrenzt\'}, tinymce_advanced_options);
	</script>
	';
*/
    }

    $txt .= '</div>';


//languages //////////////////////////////////////////
    if ($shop_is_multilang) {
        if ($is_multi_lng == 1) {

            $languages = tep_get_languages();
            $h = get_hint_by_t_key('txt_long_translation_hint', $use_outer_div = false, $show_header = false, $use_comment_div = false, $parse_links = true);


            $l_block .= '<div style="padding:6px;text-align:left;margin-top:24px;border-top: 1px #ccc solid">';

//$t_help_icon = help_icon_by_key('admin_all_text_editors_new_translations',$txt='&Uuml;bersetzungen mit dem HTML-Editor',$title='&Uuml;bersetzungen mit erweiterter HTML-Editor - Popup',$with_text=false);

            $l_block .= '<div style="float:right;margin:-19px 6px 0 0">' . $multi_lang_icon_65 . '</div><div style="float:left;font-weight:bold;padding:0 0 6px 6px;color:#246">&Uuml;bersetzungen f&uuml;r obigen HTML-Text: ' .
                tooltip($h, $img = '16', $style = 'margin-left:9px', $class = 'tip', $width = '550px', $admin = true) . ' </div><div class="clear"></div>';

            $language_id_english = language_id_english();
            $language_english_is_used = language_english_is_used();
            $translations_exist = false;

            for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
                $language_id = $languages[$i]['id'];
                $language_name = $languages[$i]['name'];
                $language_code = $languages[$i]['code'];
                if ($language_name <> 'deutsch') {

                    $l_block .= '<div style="padding:6px 0 14px 6px">' . lang_icon($languages[$i]['code']) . ' <div style="font-size:0.8em;color:#666;display:inline-block;width:270px:margin:6px 0 0 0">&Uuml;bersetzung in ' . $language_name . ': </div><br>';
                    $get_dv_long_lang_new = get_dv_long_lang_new($t_key, $language_code);
                    if ($get_dv_long_lang_new <> '') $translations_exist = true;


                    if ($is_tooltip) {
                        $url = 'popup_edit_html.php?p=' . $t_key . '&amp;long=1&amp;what=&amp;rel=t_key_comment&field=div_res_long_' . $language_code;
                    } else {
                        $url = 'popup_edit_html.php?p=' . $t_key . '&amp;long=1&amp;what=&field=div_res_long_' . $language_code;
                    }

                    $l_block .= '<div onclick="pop_il(\'' . $url . '\',\'HTML-Editor (' . $language_name . ') - Popup\',\'\',\'\')" 
style="padding:4px;border:1px #ccc inset;background:#fff;min-height:24px;margin-bottom:1px;overflow:auto;" id="transl_res_' . $t_key . $language_id . '">' . $get_dv_long_lang_new . '</div>';

                    /*
$l_block.='
<script>
new Ajax.InPlaceEditor($(\'transl_res_'. $t_key.$language_id .'\'), \'ax_updater.php?id=1702_'. $t_key .'_xyx_div_res_long_'. $language_code .'\', {okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten -  Text nicht begrenzt\'}, tinymce_options);
</script>
';
*/


                    $l_block .= '<a title="&uuml;bersetzen von deutsch" class="button3" style="font-size:0.8em;margin-left:4px" href="javascript:do_transl_long_general(\'tobeedited' . $t_key . '\',\'transl_res_' . $t_key . $language_id . '\',\'' . $language_code . '\')" >' . lang_icon('de') . ' &uuml;bersetzen > ' . lang_icon($languages[$i]['code']) . '</a>';


                    if ($language_code <> 'en' and $language_english_is_used) $l_block .= '<a title="&uuml;bersetzen von englisch!" class="button3" style="font-size:0.8em;margin-left:4px" href="javascript:do_transl_general_en_long(\'transl_res_' . $t_key . $language_id_english . '\',\'transl_res_' . $t_key . $language_id . '\',\'' . $language_code . '\')" >' . lang_icon('en') . ' > ' . lang_icon($languages[$i]['code']) . '</a>';


                    $l_block .= '<a title="&Uuml;bersetzung speichern" class="button_green" style="margin-left:4px;font-size:0.8em" href="javascript:do_takeover_general1_long(\'transl_res_' . $t_key . $language_id . '\',\'' . $language_code . '\',\'' . $t_key . '\')" >speichern </a>';
                    $l_block .= "<span style='margin-left:4px' id='takeover_CONF_" . $t_key . $language_code . "'></span>";


//$l_block .= '<a title="Assistent neu laden" class="button3" style="font-size:0.8em;margin-left:4px" href="javascript:widow.location.reload()" >Refresh</a>';


                    $text = $html_editor_icon . ' <b>HTML-Editor</b> &nbsp; ' . lang_icon($languages[$i]['code']);
                    $title = '&Uuml;bersetzung (' . $language_name . ') mit dem HTML-Editor bearbeiten';
                    $class = 'button1';
                    $style = '';
                    $width = '';
                    $height = '';
                    $type = 'il';

//if ($type=='bb'){
                    if ($is_tooltip) {
                        $href = 'popup_edit_html.php?p=' . $t_key . '&long=1&rel=t_key_comment&what=' . $shop_l . '&field=div_res_long_' . $language_code;
                    } else {
                        $href = 'popup_edit_html.php?p=' . $t_key . '&long=1&what=' . $shop_l . '&field=div_res_long_' . $language_code;
                    }
//}else{
//$href='help_2_adm.php?url=popup_edit_html.php?p='.$t_key.'&long=1&what='.$shop_l;
//}

                    $link = make_link2($href, $text, $title, $class, $style, $width, $height, $type);


                    $l_block .= '<span style="float:right;margin-right:40px" class="grey10">Zum Editieren den Text im ' . $link . ' &ouml;ffnen</span>';

                    $l_block .= '</div>';

                }
            }

            $l_block .= '</div>';

        }
    }

    $txt .= $l_block . '';

    global $attention_icon24;
    if ($translations_exist and get_dv_l($t_key) == '' and !$is_tooltip) $txt .= '<div style="margin:5px 0 18px 0;padding:6px;border:1px #c00 solid;background:#fee;font-size:1.1em"><div style="float:left;margin:0 8px 12px 0">' . $attention_icon24 . '</div>Der Text in deutsch ist leer, aber es gibt &uuml;bersetzte Texte. 
<br>
Diese &Uuml;bersetzungen jetzt entfernen?
<div style="margin:9px 0 5px 28px"><a class="button3" href="javascript:remove_unused_translations(\'' . $t_key . '\',\'long\')">Ja, entfernen!</a> <span id="CONF_remove_unused_translations_' . $t_key . '"></span></div>
</div>';


    if ($translations_exist and $t_key_comment == '' and $is_tooltip) $txt .= '<div style="margin:5px 0 18px 0;padding:6px;border:1px #c00 solid;background:#fee;font-size:1.1em"><div style="float:left;margin:0 8px 12px 0">' . $attention_icon24 . '</div>Der Text in deutsch ist leer, aber es gibt &uuml;bersetzte Texte. 
<br>
Diese &Uuml;bersetzungen jetzt entfernen?
<div style="margin:9px 0 5px 28px"><a class="button3" href="javascript:remove_unused_translations(\'' . $t_key . '\',\'long\')">Ja, entfernen!</a> <span id="CONF_remove_unused_translations_' . $t_key . '"></span></div>
</div>';


    $txt .= '</div>';

    return $txt;
}


function get_long_html1_editor_by_t_key_plain($t_key)
{

    $sql = "select * from diverses where div_what = '" . $t_key . "' limit 1 ";
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $div_id = $row["div_id"];
        $div_what = $row["div_what"];
        $div_res = $row["div_res"];
        $div_res_long = $row["div_res_long"];
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
    }

    mysql_free_result($sql_result);

    if (is_dev()) {

        $txt .= '
<span style="margin:0 5px 0 0;float:right" class="onlydev">
' . get_dev_link($t_key) . '</span><br>';
    }


    $txt .= '
<div class="__content_tobeedited" >
<div id="tobeedited' . $t_key . '">
' . get_dv_l($t_key) . '</div>
';

    $txt .= '
<script>
new Ajax.InPlaceRichEditor($(\'tobeedited' . $t_key . '\'), \'ax_updater.php?id=170_' . $t_key . '\', {okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - Text unbegrenzt\'}, tinymce_options);
</script>
';

    $txt .= '</div>';


    return $txt;
}


function get_long_html1_editor_by_t_key_field($t_key, $field)
{
    $curr_content = get_dv_field($t_key, $field);
    $txt .= '
<div class="qedit_outer"> <span style="margin:0 5px 0 0;float:right" class="onlydev">' . $t_key . ' - <b>' . $field . '</b></span><br>
<div class="inline_edit_options"> in den Text klicken zum Editieren</div>
<div class="content_tobeedited" >
<div style="min-height:10px" id="tobeedited' . $t_key . $field . '">
' . $curr_content . '</div>
';
    $txt .= '
<script>
new Ajax.InPlaceRichEditor($(\'tobeedited' . $t_key . $field . '\'), \'ax_updater.php?id=1700_' . $t_key . '_xyx_' . $field . '\', {okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - Text unbegrenzt\'}, tinymce_options);
</script>
';
    $txt .= '</div>';
    $txt .= '</div>';
    return $txt;
}

function get_long_html1_editor_by_t_key_field_plain($t_key, $field, $parse_links = true)
{
    if ($parse_links) {
        $curr_content = get_dv_field($t_key, $field);
        $curr_content = parse_links($curr_content);
    } else {
        $curr_content = get_dv_field($t_key, $field);
    }

    $zuf = mt_rand(100000, 100000000);

    /*	
$txt.='
<div style="min-height:10px" id="tobeedited'. $t_key.$field.$zuf .'">
'.strip_tags($curr_content) .'</div>
';
*/
    $txt .= '
<div style="min-height:10px" id="tobeedited' . $t_key . $field . $zuf . '">
' . $curr_content . '</div>
';


    /*
$txt.='
<script>
new Ajax.InPlaceRichEditor($(\'tobeedited'. $t_key.$field.$zuf .'\'), \'ax_updater.php?id=1700_'. $t_key.'_xyx_'. $field .'\', {okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - Text unbegrenzt\'}, tinymce_options);
</script>
';
*/
    $txt .= '
<script>
new Ajax.InPlaceEditor($(\'tobeedited' . $t_key . $field . $zuf . '\'), \'ax_updater.php?id=1700_' . $t_key . '_xyx_' . $field . '\', {okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - Text max. 255 Zeichen\'}, tinymce_options);
</script>
';


    $txt .= '';

    return $txt;
}


function get_dv_field($t_key, $field)
{
    $sql = "select " . $field . " from diverses where div_what = '" . $t_key . "' ";
    return lookup($sql, $field);
}

function set_dv_field($t_key, $field, $value)
{
    $sql = "update diverses set " . $field . " = '" . addslashes($value) . "'  where div_what = '" . $t_key . "' ";
    q($sql);
}


function get_dev_link($t_key)
{


    $div_id = lookup("select div_id from diverses where div_what = '" . $t_key . "' ", 'div_id');

    $sql = "select app_top from diverses where div_what = '" . $t_key . "' ";
    $app_top = lookup($sql, 'app_top');

    if ($app_top == 1) {
        $ap_top_icon = ' <img src="../images/icon4/famfam/tick.png" width="14" height="14" />';
    } else {
        $ap_top_icon = ' <img src="../images/icon4/famfam/cross.png" width="14" height="14" />';
    }


    $sql = "select is_multi_lng from diverses where div_what = '" . $t_key . "' ";
    $multi_lang = lookup($sql, 'is_multi_lng');

    if ($multi_lang == 1) {
        $multi_lang_icon = ' <img src="../images/icon4/famfam/tick.png" width="14" height="14" />';
    } else {
        $multi_lang_icon = ' <img src="../images/icon4/famfam/cross.png" width="14" height="14" />';
    }
    $t_assi_title = get_dv_field($t_key, 'assi_title');
    if ($t_assi_title == '') {
        $t_input_border_txt = ';border:3px #c00 solid';
    }

    $txt = '<input style="margin:0 9px 0  0;display:inline-block;padding:4px' . $t_input_border_txt . '" type="text" onclick="this.select()" value="' . $t_key . '">';
    /*
	$txt.='<a title="DEV: Key bearbeiten" href="wrapper_all.php?incl=popup_admin_bearb_div_all.php&p='.$t_key.'" 
	class="lightwindow" params="lightwindow_type=external">
	'.$t_key.'</a>';
	*/
    //$txt.='<a title="DEV: Key bearbeiten" href="javascript:open_for_edit_div2('.$div_id.')" class="lightwindow" params="lightwindow_type=external">'.$t_key.'</a>';
    $txt .= ' <a class="button_blue" title="DEV: Txt und Beschreibung" href="javascript:from_div_update(\'' . $t_key . '\')" >FROM div_update</a><span id="CONF_from_div_update_' . $t_key . '"></span> ';

    $txt .= '<a title="DEV: Key bearbeiten" href="javascript:open_for_edit_div2(' . $div_id . ')" >' . $t_key . '</a>';

    $txt .= ' <a class="button3" title="DEV: Txt und Beschreibung" href="javascript:to_div_update(\'' . $t_key . '\')" >TO div_update</a><span id="CONF_to_div_update_' . $t_key . '"></span> ';


    $txt .= '<a title="make unmake app_top" href="javascript:make_unmake_app_top(\'' . $t_key . '\')"><span style="margin:9px" id="conf_make_unmake_app_top' . $t_key . '">AT: ' . $ap_top_icon . '</span></a>
	<a title="make unmake multi_lang" href="javascript:make_unmake_multi_lang(\'' . $t_key . '\')"><span style="margin:9px" id="conf_make_unmake_multi_lang' . $t_key . '">ML: ' . $multi_lang_icon . '</span></a>
	<a title="delete t_key" href="javascript:dele_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_dele_key' . $t_key . '"><img src="../images/icon4/famfam/delete.png" width="16" height="16" /></span></a>';


    if (is_hidden_key($t_key)) {
        $txt .= '<a title="hidden?" href="javascript:is_hidden_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_is_hidden_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icon4/famfam/eye.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="hidden?" href="javascript:is_hidden_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_is_hidden_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icon4/famfam/eye.png" width="16" height="16" /></span></a>';
    }

    $txt .= '';

    if (is_setup_key($t_key)) {
        $txt .= '<a title="setup?" href="javascript:setup_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_setup_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icon4/famfam/house.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="setup?" href="javascript:setup_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_setup_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icon4/famfam/house.png" width="16" height="16" /></span></a>';
    }


    if (is_critical_key($t_key)) {
        $txt .= '<a title="critical?" href="javascript:critical_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_critical_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icon4/famfam/key.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="critical?" href="javascript:critical_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_critical_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icon4/famfam/key.png" width="16" height="16" /></span></a>';
    }


    if (is_active_switch($t_key)) {
        $txt .= '<a title="is_active_switch?" href="javascript:is_active_switch_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_is_active_switch_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icons/dialog-warning.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="is_active_switch?" href="javascript:is_active_switch_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_is_active_switch_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icons/dialog-warning.png" width="16" height="16" /></span></a>';
    }


    if (is_c_admin($t_key)) {
        $txt .= '<a title="c_admin" href="javascript:c_admin_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_admin_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icon4/famfam/group_error.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="c_admin" href="javascript:c_admin_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_admin_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icon4/famfam/group_error.png" width="16" height="16" /></span></a>';
    }

    if (is_c_geld($t_key)) {
        $txt .= '<a title="c_geld" href="javascript:c_geld_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_geld_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icon4/famfam/money.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="c_geld" href="javascript:c_geld_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_geld_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icon4/famfam/money.png" width="16" height="16" /></span></a>';
    }


    if (is_c_bilder($t_key)) {
        $txt .= '<a title="c_bilder" href="javascript:c_bilder_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_bilder_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icon4/famfam/camera.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="c_bilder" href="javascript:c_bilder_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_bilder_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icon4/famfam/camera.png" width="16" height="16" /></span></a>';
    }


    if (is_c_startp($t_key)) {
        $txt .= '<a title="c_startp" href="javascript:c_startp_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_startp_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icon4/famfam/application_home.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="c_startp" href="javascript:c_startp_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_startp_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icon4/famfam/application_home.png" width="16" height="16" /></span></a>';
    }


    if (is_c_layout($t_key)) {
        $txt .= '<a title="c_layout" href="javascript:c_layout_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_layout_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icon4/famfam/color_swatch.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="c_layout" href="javascript:c_layout_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_layout_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icon4/famfam/color_swatch.png" width="16" height="16" /></span></a>';
    }


    if (is_c_navi($t_key)) {
        $txt .= '<a title="c_navi" href="javascript:c_navi_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_navi_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icon4/famfam/chart_organisation.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="c_navi" href="javascript:c_navi_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_navi_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icon4/famfam/chart_organisation.png" width="16" height="16" /></span></a>';
    }


    if (is_c_seo($t_key)) {
        $txt .= '<a title="c_seo" href="javascript:c_seo_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_seo_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icons/google_seo16.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="c_seo" href="javascript:c_seo_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_seo_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icons/google_seo16.png" width="16" height="16" /></span></a>';
    }


    if (is_c_theme($t_key)) {
        $txt .= '<a title="c_theme" href="javascript:c_theme_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_theme_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icon4/famfam/rosette.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="c_theme" href="javascript:c_theme_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_theme_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icon4/famfam/rosette.png" height="16" /></span></a>';
    }


    $assi_title126136 = get_dv('assi_title126136');
    if ($t_assi_title == '' or $assi_title <> $assi_title126136) {
        $assi_title = $assi_title126136;
        $txt .= '<div style="margin:9px 0">';
        $txt .= '<div style="font-size:1.0em;color:#c66">' . $t_key . ' <a style="margin-left:64px" href="javascript:move_to_other_assi2(\'' . $t_key . '\')">move to other assi2</a></div>
			<div style="display:none" id="move_to_other_assi2_wrap_' . $t_key . '"><input value="' . $assi_title . '" id="move_to_other_assi2_' . $t_key . '" type="text" style="width:500px"> <a href="javascript:exe_move_to_other_assi2(\'' . $t_key . '\')">Go</a>
			<span id="CONF_move_to_other_assi2_' . $t_key . '"></span></div>';
        $txt .= '</div>';
    } else {
        $txt .= ' <span>' . $t_assi_title . '/' . $assi_title126136 . '</span>';
    }

    return $txt;
}


function get_dev_link_short($t_key)
{

    $txt .= '<a title="delete t_key" href="javascript:dele_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_dele_key' . $t_key . '"><img src="../images/icon4/famfam/delete.png" width="16" height="16" /></span></a>';

    if (is_hidden_key($t_key)) {
        $txt .= '<a title="hidden?" href="javascript:is_hidden_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_is_hidden_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icon4/famfam/eye.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="hidden?" href="javascript:is_hidden_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_is_hidden_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icon4/famfam/eye.png" width="16" height="16" /></span></a>';
    }


    if (is_setup_key($t_key)) {
        $txt .= '<a title="setup?" href="javascript:setup_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_setup_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icon4/famfam/house.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="setup?" href="javascript:setup_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_setup_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icon4/famfam/house.png" width="16" height="16" /></span></a>';
    }


    if (is_critical_key($t_key)) {
        $txt .= '<a title="critical?" href="javascript:critical_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_critical_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icon4/famfam/key.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="critical?" href="javascript:critical_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_critical_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icon4/famfam/key.png" width="16" height="16" /></span></a>';
    }


    if (is_active_switch($t_key)) {
        $txt .= '<a title="is_active_switch?" href="javascript:is_active_switch_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_is_active_switch_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icons/dialog-warning.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="is_active_switch?" href="javascript:is_active_switch_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_is_active_switch_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icons/dialog-warning.png" width="16" height="16" /></span></a>';
    }


    if (is_c_admin($t_key)) {
        $txt .= '<a title="c_admin" href="javascript:c_admin_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_admin_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icon4/famfam/group_error.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="c_admin" href="javascript:c_admin_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_admin_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icon4/famfam/group_error.png" width="16" height="16" /></span></a>';
    }

    if (is_c_geld($t_key)) {
        $txt .= '<a title="c_geld" href="javascript:c_geld_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_geld_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icon4/famfam/money.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="c_geld" href="javascript:c_geld_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_geld_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icon4/famfam/money.png" width="16" height="16" /></span></a>';
    }


    if (is_c_bilder($t_key)) {
        $txt .= '<a title="c_bilder" href="javascript:c_bilder_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_bilder_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icon4/famfam/camera.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="c_bilder" href="javascript:c_bilder_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_bilder_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icon4/famfam/camera.png" width="16" height="16" /></span></a>';
    }


    if (is_c_startp($t_key)) {
        $txt .= '<a title="c_startp" href="javascript:c_startp_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_startp_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icon4/famfam/application_home.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="c_startp" href="javascript:c_startp_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_startp_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icon4/famfam/application_home.png" width="16" height="16" /></span></a>';
    }


    if (is_c_layout($t_key)) {
        $txt .= '<a title="c_layout" href="javascript:c_layout_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_layout_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icon4/famfam/color_swatch.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="c_layout" href="javascript:c_layout_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_layout_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icon4/famfam/color_swatch.png" width="16" height="16" /></span></a>';
    }


    if (is_c_navi($t_key)) {
        $txt .= '<a title="c_navi" href="javascript:c_navi_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_navi_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icon4/famfam/chart_organisation.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="c_navi" href="javascript:c_navi_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_navi_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icon4/famfam/chart_organisation.png" width="16" height="16" /></span></a>';
    }


    if (is_c_seo($t_key)) {
        $txt .= '<a title="c_seo" href="javascript:c_seo_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_seo_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icons/google_seo16.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="c_seo" href="javascript:c_seo_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_seo_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icons/google_seo16.png" width="16" height="16" /></span></a>';
    }


    if (is_c_theme($t_key)) {
        $txt .= '<a title="c_theme" href="javascript:c_theme_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_theme_t_key' . $t_key . '"><img style="border:1px #c00 solid" src="../images/icon4/famfam/rosette.png" width="16" height="16" /></span></a>';
    } else {
        $txt .= '<a title="c_theme" href="javascript:c_theme_t_key(\'' . $t_key . '\')"><span style="margin-left:9px" id="conf_c_theme_t_key' . $t_key . '"><img style="opacity:0.5" src="../images/icon4/famfam/rosette.png" height="16" /></span></a>';
    }

    return $txt;
}

function is_c_theme($t_key)
{
    $r = lookup('select c_theme from diverses where div_what = \'' . $t_key . '\'', 'c_theme');
    return to_bool($r);
}


function is_c_seo($t_key)
{
    $r = lookup('select c_seo from diverses where div_what = \'' . $t_key . '\'', 'c_seo');
    return to_bool($r);
}


function is_c_navi($t_key)
{
    $r = lookup('select c_navi from diverses where div_what = \'' . $t_key . '\'', 'c_navi');
    return to_bool($r);
}


function is_c_layout($t_key)
{
    $r = lookup('select c_layout from diverses where div_what = \'' . $t_key . '\'', 'c_layout');
    return to_bool($r);
}


function is_c_startp($t_key)
{
    $r = lookup('select c_startp from diverses where div_what = \'' . $t_key . '\'', 'c_startp');
    return to_bool($r);
}


function is_c_bilder($t_key)
{
    $r = lookup('select c_bilder from diverses where div_what = \'' . $t_key . '\'', 'c_bilder');
    return to_bool($r);
}


function is_c_geld($t_key)
{
    $r = lookup('select c_geld from diverses where div_what = \'' . $t_key . '\'', 'c_geld');
    return to_bool($r);
}


function is_c_admin($t_key)
{
    $r = lookup('select c_admin from diverses where div_what = \'' . $t_key . '\'', 'c_admin');
    return to_bool($r);
}


function get_plain_text_editor($t_key, $before_txt = '', $after_txt = '', $style = '')
{
    $x = $before_txt . '<span class="axupd_1" style="' . $style . '" id="plain_txt_' . $t_key . '">' . get_dv($t_key) . '</span>' . $after_txt . '<script>new Ajax.InPlaceEditor(\'' . 'plain_txt_' . $t_key . '\', \'ax_updater.php?id=163_' . $t_key . '\',{okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - max. 255 Zeichen\'});</script>';
    return $x;
//return '<div style="max-width:250px">'.$x.'</div>';
}

function is_active_switch($t_key)
{
    $r = lookup('select is_active_switch from diverses where div_what = \'' . $t_key . '\'', 'is_active_switch');
    return to_bool($r);
}


function is_critical_key($t_key)
{
    $r = lookup('select c1 from diverses where div_what = \'' . $t_key . '\'', 'c1');
    return to_bool($r);
}

function is_setup_key($t_key)
{
    $r = lookup('select b1 from diverses where div_what = \'' . $t_key . '\'', 'b1');
    return to_bool($r);
}

function is_hidden_key($t_key)
{
    $r = lookup('select is_hidden from diverses where div_what = \'' . $t_key . '\'', 'is_hidden');
    return to_bool($r);
}


function get_this_country_options($c_key = 'STORE_COUNTRY')
{
    $curr_val = get_conf($c_key);

    $sql = "select countries_name from countries where countries_id = '" . $curr_val . "'";
    $curr_val1 = lookup($sql, 'countries_name');

    $sql = "select countries_iso_code_2 from countries where countries_id = '" . $curr_val . "'";
    $curr_val_countries_iso_code_2 = lookup($sql, 'countries_iso_code_2');


    $legend = 'In welchem Land liegt dieser Shop? &nbsp; &nbsp;  aktuelle Einstellung ist: <span style="font-size:1.2em; margin:9px" id="current_country_conf">' . $curr_val1 . '</span>';
    $values = get_this_country_array();

    $hint = '';

    return get_radio_box_conf('Form_' . $c_key, $values, $curr_val_countries_iso_code_2, $c_key, $legend, $hint);
}


function get_radio_box_conf($formelement, $values, $def_value = '', $t_key, $legend = '', $hint = '')
{

    if ($hint <> '') $hint = '<div class="qedit_comment" style="margin:1px 6px 6px 0;">' . $hint . '</div>';

    $html = array(
        'before' => '<label class="pc_radiobutton">',
        'after' => '</label><br />',
        'label' => '<label for="nix">' . $hint . '<span class="onlydev">' . $t_key . '</span></label><br />');

    $form = '<div class="qedit_outer" style="text-align:left;">
<form id="' . $formelement . '">
<fieldset 
 onchange="radio_to_db_conf(getCheckedValue(document.forms[\'' . $formelement . '\'].elements[\'radio_' . $t_key . '\']),\'' . $t_key . '\');"  
 id="pc_radiobutton_' . $t_key . '" >
<legend style="font-weight:bold;color:#009;padding:0 6px 2px 6px">' . $legend . '</legend>
' . dynamic_radio_group2($formelement, $values, $html, $def_value, $t_key, $hint) . '
</fieldset>	
</form></div>	
';

    return $form;

}

function get_this_country_array()
{
    /*
DE = 81
AT = 14
CH = 204

*/
    $values = array(
        'DE' => 'Deutschland',
        'AT' => '&Ouml;sterreich',
        'CH' => 'Schweiz',
        'LI' => 'Liechtenstein'
    );

    return $values;

}


function get_open_in_options($t_key)
{
    $curr_val = get_dv($t_key);
    $legend = 'Wie soll der Link ge&ouml;ffnet werden?';
    $values = get_open_in_array();

    $hint = '';

    return get_radio_box('Form_' . $t_key, $values, $curr_val, $t_key, $legend, $hint);
}


function t_key_detail_link_short($t_key_detail_link)
{
    global $header_use;
    $x = str_replace('wrapper_all.php?incl=includes/quick_config_boxes/config_box_', '', $t_key_detail_link);
    $x = str_replace('.php', '', $x);
    $x = str_replace('&use_header=1', '', $x);
    $x = str_replace('&amp;use_header=1', '', $x);


    if ($x == 'top_nav') $x = 'Top-Linkbar';
    if ($x == 'left_nav') $x = 'Information-Box (links)';
    if ($x == 'footer_nav') $x = 'Footer-Linkbar';
    if ($x == 'guestbook') $x = 'Gästebuch';
    if ($x == 'design_21_forms') $x = 'Formulare';

    if ($x == 'addthis') $x = 'AddThis';
    if ($x == 'clipad_schnittstelle') $x = 'Clipad Schnittstelle';


    if ($x == 'conditions') $x = 'AGBs';
    if ($x == 'coup_akt') $x = 'Coupon Aktionen';
    if ($x == 'footer_boxes') $x = 'Footer-Boxen';
    if ($x == 'google_direct_translation') $x = 'Direkt-Übersetzung';
    if ($x == 'google_page_translation') $x = 'Google Seiten-Übersetzung';
    if ($x == 'impressum') $x = 'Impressum';
    if ($x == 'liefergebiet') $x = 'Liefergebiet ';
    if ($x == 'lief_zlg') $x = 'Lieferung & Zahlung';
    if ($x == 'min_wert_plz') $x = 'Mindesbestellwerte nach PLZ';
    if ($x == 'multi_currencies') $x = 'Währungen';
    if ($x == 'myblog') $x = 'Blog';


    if ($x == 'open_time') $x = 'Öffnungszeiten';
    if ($x == 'order_phone') $x = 'Hot-Line Box';
    if ($x == 'pageears') $x = 'Pageears';
    if ($x == 'pdf_download') $x = 'PDF-Downloads';
    if ($x == 'privacy') $x = 'Datenschutz & Privacy';
    if ($x == 'reviews') $x = 'Produkt-Kommentare';
    if ($x == 'star_rating') $x = 'Sterne-Bewertung';
    if ($x == 'gallery') $x = 'Bilder-Galerie';
    if ($x == 'top_hint') $x = 'Aktions-Hinweis (oben)';
    if ($x == 'design_11_video') $x = 'Video-Modul';
    if ($x == 'wish_list') $x = 'Wunsch-Liste Modul';
    if ($x == 'footer_hint_box') $x = 'frei definierbare Hinweis-Box im Footer';
    if ($x == 'easy_coupon_aktion') $x = 'Rabatt-Coupon Aktionen';
    if ($x == 'vorteile_registrierte_kunden') $x = 'Vorteile für registrierte Kunden';
    if ($x == 'widerrufsrecht') $x = 'Widerrufsrecht';
    if ($x == 'google_products') $x = 'Google Produkt-Übermittlung';
    if ($x == 'mainpage_box') $x = 'Mainpage-Box';
    if ($x == 'coupon_auto_reminder') $x = 'automatische Erinnerung an Rabatt-Coupons';
    if ($x == 'easy_coupons') $x = 'AddThis';
    if ($x == 'customer_greeting') $x = 'Kundenbegrüssung auf der Startseite';
    if ($x == 'google_analytics') $x = 'Google Analytics';
    if ($x == 'google_map') $x = 'Google Map';
    if ($x == 'define_mainpage') $x = 'Mainpage';
    if ($x == 'teaser') $x = 'Teaser auf der Startseite';
    if ($x == 'easy_coupons_reminder') $x = 'automatische Erinnerung an Rabatt-Coupons';
    if ($x == 'addthis') $x = 'AddThis';
    if ($x == 'addthis') $x = 'AddThis';
    if ($x == 'addthis') $x = 'AddThis';
    if ($x == 'addthis') $x = 'AddThis';
    if ($x == 'addthis') $x = 'AddThis';
    if ($x == 'addthis') $x = 'AddThis';
    if ($x == 'addthis') $x = 'AddThis';
    if ($x == 'addthis') $x = 'AddThis';
    if ($x == 'addthis') $x = 'AddThis';
    if ($x == 'addthis') $x = 'AddThis';
    if ($x == 'addthis') $x = 'AddThis';
    if ($x == 'addthis') $x = 'AddThis';
    if ($x == 'addthis') $x = 'AddThis';
    if ($x == 'addthis') $x = 'AddThis';
    if ($x == 'addthis') $x = 'AddThis';
    if ($x == 'addthis') $x = 'AddThis';
    if ($x == 'addthis') $x = 'AddThis';
    if ($x == 'addthis') $x = 'AddThis';
    if ($x == 'addthis') $x = 'AddThis';
    if ($x == 'addthis') $x = 'AddThis';


    return deuml($x);
}


function get_t_key_detail_link($key)
{
    $sql = "select t_key_detail_link from diverses where div_what = '" . $key . "' ";
    return lookup($sql, 't_key_detail_link');
}


function get_t_key_txt($key, $make_txt = false)
{

    if ($make_txt) {
        $sql = "select t_key_txt from diverses where div_what = '" . $key . "' ";
        $x = lookup($sql, 't_key_txt');

        if ($x == '???') {
            $newtext = str_replace('_is_active', ' ', $key);
            $newtext = str_replace('_', ' ', $newtext);
            $newtext = properCase($newtext);
            $sql = "update diverses set t_key_txt='" . $newtext . "' where div_what = '" . $key . "' ";
            q($sql);
        }

        if (strstr($x, 'Is Active')) {
            $newtext = str_replace('Is Active', ' ', $x);
            $newtext = trim($newtext);
            $sql = "update diverses set t_key_txt='" . $newtext . "' where div_what = '" . $key . "' ";
            q($sql);

        }

    }


    $sql = "select t_key_txt from diverses where div_what = '" . $key . "' ";
    return lookup($sql, 't_key_txt');

}

function get_t_key_comment($key)
{
    $sql = "select t_key_comment from diverses where div_what = '" . $key . "' ";
    $x = lookup($sql, 't_key_comment');
    return $x;
}

function cannot_deactivate($t_key)
{
// _is_active 
    /*
'left_nav_is_active',
'login_start_box_is_active',
'main_menu_is_active',
*/

    $not = array(
        'robots_is_active',
        'artikel_img_prefix_is_active',
        'conditions_is_active',
        'favicon_is_active',
        'cart_box_is_active',
        'footer_nav_is_active',
        'emails_default_is_active',
        'emails_order_confirm_is_active',
        'footer_bottom_nav_is_active',
        'impressum_is_active',


        'robots_is_active',
        'meta_tag_is_active',
        'specials_display_is_active',
        'bottom_link_bar_is_active',
        'product_display_is_active',

        'product_newentry_is_active',
        'passwords_is_active',
        'product_text_display_is_active',
        'product_listing_is_active'

        /*
 
*/

    );

    if (in_array($t_key, $not, false)) {
        return true;
    } else {
        return false;
    }
}


function img_path_to_ws_path($path)
{
    global $img_url;
    $x = $path;
    if (stristr($path, $img_url)) $x = str_replace($img_url, DIR_FS_CATALOG . 'images/', $path);
    return $x;
}


function fs_path_to_ws_path_admin($fs_path)
{
    $x = str_replace(DIR_FS_CATALOG, DIR_WS_FULL, $fs_path);
    return $x;
}

function full_path_to_include_path_admin($fs_path)
{
    $x = str_replace(DIR_FS_CATALOG, '', $fs_path);
    return $x;
}


function get_file_html_editor_by_t_key($t_key, $use_enh_editor = true)
{
    global $new_browser_window_icon, $popup_window_icon, $html_editor_icon, $preview_icon;
    $sql = "select * from diverses where div_what = '" . $t_key . "' limit 1 ";
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $div_id = $row["div_id"];
        $div_what = $row["div_what"];
        $div_res = $row["div_res"];
        $div_res_long = $row["div_res_long"];
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
    }

    mysql_free_result($sql_result);


    if (is_dev()) {

        if ($t_key_comment == '') {
            $ctxt = '<p>Hierbei handelt es sich um ein eigenes File das Sie mit dem HTML File-Editor bearbeiten k&ouml;nnen. Der Pfad zum diesem File lautet:<br>
catalog/includes/languages/german/' . $t_key . '.php</p>';

            $sql = "update diverses set t_key_comment='" . $ctxt . "' where div_what = '" . $t_key . "'";
            q($sql);
        }

//////////////////////////////
        $comment_txt = '
<div class="qedit_comment">
' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_comment') . '
</div>
<div class="qedit_comment" style="display:none">
' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_detail_link') . '
</div>
';
        if ($use_enh_editor) {
            $comment_txt .= '<div style="margin:0 6px 9px 0">' . get_enh_html_editor_by_t_key_link($t_key, 't_key_comment') . '</div>';
        }
/////////////////////////////
    } else {

        if ($t_key_comment <> '') {
            $comment_txt = '
<div class="qedit_comment">
' . parse_links($t_key_comment) . '
</div>
';
        } else {
            $comment_txt = '';
        }
    }
//if ($t_key_txt<>'') $t_key_txt = $t_key_txt.': ';

    $dev_link = get_dev_link($t_key);

    if ($t_key_detail_link <> '') {
        $detail_link_txt = '
<div class="qedit_linkdiv">
<a target="_blank" title="in neuem Browser-Fenster" href="' . $t_key_detail_link . '">' . $t_key_txt . ' <u>Details konfigurieren</u></a>
</div>
';
        $detail_link_txt2 = '
<div class="qedit_linkdiv" style="display:inline;margin-left:9px">
<a class="lightwindow" params="lightwindow_type=external"
title="Inline Popup" href="' . $t_key_detail_link . '?poppage=1">' . $t_key_txt . ' <u>Details konfigurieren</u> im PopUp-Fenster</a>
</div>
';
    } else {
        $detail_link_txt = '';
        $detail_link_txt2 = '';
    }

    if (is_dev()) {
//////////////////////////////
        $comment_txt = '
<div class="qedit_comment">
' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_comment') . '
</div>
<div class="qedit_comment" style="display:none">
' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_detail_link') . '
</div>
';
        if ($use_enh_editor) {
            $comment_txt .= '<div style="margin:0 6px 9px 0">' . get_enh_html_editor_by_t_key_link($t_key, 't_key_comment') . '</div>';
        }
/////////////////////////////
    } else {

        if ($t_key_comment <> '') {
            $comment_txt = '
<div class="qedit_comment">
' . parse_links($t_key_comment) . '
</div>
';
        } else {
            $comment_txt = '';
        }
    }

//$href='wrapper_all.php?incl=popup_edit_html.php?p='.$t_key.'&long=1&what='.$shop_l;
    $text = $html_editor_icon . ' <b>erweiterten HTML-Editor</b>';
    $title = 'erweiterter HTML-Editor in neuem Fenster ';
    $class = '';
    $style = '';
    $width = '';
    $height = '';
    $type = 'il';

    if ($type == 'bb') {
        $href = 'popup_edit_html.php?p=' . $t_key . '&long=1&what=' . $shop_l;
    } else {
        $href = 'help_2_adm.php?url=popup_edit_html.php?p=' . $t_key . '&long=1&what=' . $shop_l;
    }

//$link = make_link2($href,$text,$title,$class,$style,$width,$height,$type);
    $link = '<a class="button1" style="margin: 0 9px;font-size:1.3em" target="_blank" href="file_editor.php?filename=' . DIR_FS_CATALOG . 'includes/languages/german/' . $t_key . '.php">' . $html_editor_icon . ' HTML-Editor &ouml;ffnen</a>';

    if (is_dev()) {
//////////////////////////////////
        if ($t_key_txt == '') set_t_key_txt_empty($t_key);
        $txt .= '<div class="qedit_outer"><span style="font-size:1.0em;font-weight:bold; color:#009;margin:1px;float:left;">
' . $item_no_txt . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_txt') . '</span><br>';
//////////////////////////////////

    } else {
        $txt .= '<div class="qedit_outer"><span style="font-size:1.0em;font-weight:bold; color:#009;margin:1px;float:left;">' . $t_key_txt . '</span><br><br>';
    }


    $txt .= '
<span style="margin:0 5px 0 0;float:right" class="onlydev"> 
' . get_dev_link($t_key) . '</span><br>
<div class="inline_edit_options">Um den Text zu bearbeiten HTML-Editor in neuem Browser-Fenster &ouml;ffnen:<br><br>' . $link . '  </div>
';

    /*
$txt.='
<script>
new Ajax.InPlaceRichEditor($(\'tobeedited'. $t_key .'\'), \'ax_updater.php?id=170_'. $t_key .'\', {okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - Text unbegrenzt\'}, tinymce_options);
</script>
';
*/
//$txt.='</div>';
    $txt .= $comment_txt;
    $txt .= $detail_link_txt . $detail_link_txt2;
    $txt .= '</div>';

    return $txt;
}


function get_file_html_editor_by_t_key_link($t_key,
                                            $text = ' <b>erweiterten HTML-Editor</b>',
                                            $title = 'erweiterter HTML-FileEditor in neuem Fenster ',
                                            $target = ' target="_blank" ',
                                            $class = 'button1',
                                            $style = 'margin: 0 9px;font-size:1.3em;',
                                            $width = '',
                                            $height = '',
                                            $type = 'il')
{

    global $html_editor_icon;

    /*
if ($type=='bb'){
$href='popup_edit_html.php?p='.$t_key.'&long=1&what='.$shop_l;
}else{
$href='help_2_adm.php?url=popup_edit_html.php?p='.$t_key.'&long=1&what='.$shop_l;
}
*/
//$link = make_link2($href,$text,$title,$class,$style,$width,$height,$type);
    $link = '<a class="' . $class . '" style="' . $style . '"  ' . $target . '
 href="file_editor.php?filename=' . DIR_FS_CATALOG . 'includes/languages/german/' . $t_key . '.php">
 ' . $html_editor_icon . $text . '</a>';

    return $link;
}


function get_enh_html_editor_by_t_key_link($t_key, $field,
                                           $text = ' <b>HTML-Editor DEV</b>',
                                           $title = 'erweiterter Field-Editor ',
                                           $target = ' target="_blank" ',
                                           $class = 'button3',
                                           $style = 'margin: 0 2px;font-size:0.9em;',
                                           $width = '',
                                           $height = '',
                                           $type = 'il')
{

    global $html_editor_icon;

    if (eregiS('/catalog/', curPageURL()) and !eregiS('/admin', curPageURL())) {
        $lx = 'admin6093/';
    } else {
        $lx = '';
    }

    if ($type == 'bb') {
        $href = $lx . 'popup_edit_html.php?p=' . $t_key . '&long=1&what=' . $shop_l . '&field=' . $field;
    } else {
        $href = $lx . 'help_2_adm.php?url=popup_edit_html.php?p=' . $t_key . '&long=1&what=' . $shop_l . '&field=' . $field;
    }

//$link = make_link2($href,$text,$title,$class,$style,$width,$height,$type); 

    if ($type == 'il') {

        $link = '<a title="' . $title . '" class="lightwindow ' . $class . '" style="max-width:110px;' . $style . '"  ' . $target . ' 
params="lightwindow_type=external,lightwindow_width=' . $width . ',lightwindow_height=' . $height . '" 
 href="' . $href . '">
 ' . $html_editor_icon . $text . '</a>';

    } else {

        $link = '<a title="' . $title . '" class="' . $class . '" style="' . $style . '"  ' . $target . '
 href="' . $href . '">
 ' . $html_editor_icon . $text . '</a>';


    }


    return $link;
}


function is_in_cat_path($categories_id)
{
    $current_path = getParam('cPath', '');
    // besser $current_path split in array, dann if is_in_array
    if (eregiS($categories_id, $current_path) and $current_path <> '') {
        return true;
    } else {
        return false;
    }
}


function show_this_box_here($box_key)
{
    global $at_is_gay_shop, $hide_ab18_img;
    /*
echo get_checkbox_by_t_key($master_key.'_show_on_checkout_pages',$type='s',$field='',$detail_link,$detail_link_pop); 

echo get_checkbox_by_t_key($master_key.'_show_on_shopping_cart_pages',$type='s',$field='',$detail_link,$detail_link_pop); 
*/


//Anzeige in column_left und column_right
//is_checkout_page() ? einfügen ???
    $show_on_startpage = get_dv_bool($box_key . '_show_on_startpage');
    $show_on_all_product_pages = get_dv_bool($box_key . '_show_on_all_product_pages');
    $show_on_categorie_pages = get_dv_bool($box_key . '_show_on_categorie_pages');

    $show_on_checkout_pages = get_dv_bool($box_key . '_show_on_checkout_pages');
    $show_on_cart_pages = get_dv_bool($box_key . '_show_on_shopping_cart_pages');


    if ($show_on_categorie_pages) $show_on_categorie_pages_catnr = get_dv($box_key . '_show_on_categorie_pages_catnr');

    $show_on_every_page = get_dv_bool($box_key . '_show_on_every_page');

    $show_this_box_here = false;

    if ($show_on_every_page and !is_start_page()) {
        $show_this_box_here = true;
    } else {
        if ($show_on_startpage and is_start_page()) {
            $show_this_box_here = true;
        } else {
            if ($show_on_all_product_pages and is_product_page()) {
                $show_this_box_here = true;
            } else {
                if ($show_on_categorie_pages and is_in_cat_path($show_on_categorie_pages_catnr)) {
                    $show_this_box_here = true;
                }
            }
        }
    }

    if ($show_on_checkout_pages and is_checkout_page_pure()) {
        $show_this_box_here = true;
    }
    if ($show_on_cart_pages and curPageName() == 'shopping_cart.php') {
        $show_this_box_here = true;
    }


    if ($at_is_gay_shop and $hide_ab18_img) {
        if (tep_session_is_registered('customer_id')) {
            return $show_this_box_here;
        } else {
            if (get_dv_bool($box_key . '_ab18')) {
                return false;
            } else {
                return $show_this_box_here;
            }
        }
    } else {
        return $show_this_box_here;
    }

}


function show_on_what_page($active_key, $ret = '0')
{

    $element = str_replace('is_active', 'show_on_what_page', $active_key);
    $show_where = get_dv($element);
//if ($show_where=='') return true;
    if ($show_where == 'all_pages') {
        $r = true;
        //$r1 = 'auf allen Seiten';
        $r1 = '';
    } else {
        if ($show_where == 'start_only') {
            $r = true;
            $r1 = ' Anzeige: nur auf der Startseite';
        } else {
            if ($show_where == 'everywhere_but_on_start') {
                $r = true;
                $r1 = ' Anzeige: alle Seiten ausser Startseite';
            }
        }
    }

    if ($ret == '0') return $r;
    if ($ret == '1') return $r1;
}


//  neu: $active_key text kofig-assi (mehrere?) desig-assi  help  class  style  icon draggable  vorweg: if ($bearbitungsmodus) ??
function make_config_edit_link2(
    $text = '',
    $active_key = '',
    $k_assi_url_1 = '',
    $k_assi_url_2 = '',
    $d_assi_url_1 = '',
    $help_key = '',
    $class = '',
    $style = '',
    $icon = '',
    $icon_size = '13',
    $add_clearfix = false,
    $draggable = false,
    $right_col = false

)
{
    global $application_shop_is_in_dev_mode;
    if (!$application_shop_is_in_dev_mode) return false;
    global $bearb_mode_icon21, $bearb_mode_icon31, $bearb_mode_icon41, $bearb_mode_icon12, $bearb_mode_icon41_left, $bearb_mode_use_popup_windows, $img_url, $bearb_mode_icon24_red_left;

    // if(is_dev()) i_am_superadmin() help_key und assi urls wegschreiben nach diverses

    $bearb_mode_icon41 = '<img src="' . $img_url . '/icons/utilities41.png" width="41" height="41" />';
    $bearb_mode_icon41_left = '<img style="float:left;margin:-10px 4px 0 -12px" src="' . DIR_WS_IMAGES_FULL . '/icons/utilities41_blue.png" width="24" height="24" />';
    $bearb_mode_icon41_right = '<img style="float:right;margin:-10px -12px 0 4px" src="' . DIR_WS_IMAGES_FULL . '/icons/utilities41_blue.png" width="24" height="24" />';
    $bearb_mode_icon31 = '<img style="border:none;margin:-8px 4px -2px -11px" src="' . DIR_WS_IMAGES_FULL . '/icons/utilities31.png" width="24" height="24" />';


    $text = deuml($text);
    if ($add_clearfix) $add_clearfix_txt = '<div class="clearfix"></div>';

    if ($active_key <> '' and $active_key <> 'true' and $active_key <> 'false') {
        $we_have_active_key = true;
        $is_active = get_dv_bool($active_key);

        if (!$is_active) {
            $style .= ';background:#FCE7E5;';
            $element .= ' <span style="margin-right:7px">ist deaktiviert!</span>';
            if (!stristr($k_assi_url_1, '_self_def_box'))
                $element .= is_active_icon_link($active_key, $msgbox = true, $float_right = false, $with_text = false, $f_size = '0.9', $link_bars = false, $show_dev_key = false, $allow_as_button = false, $button_class = 'button999',
                    $page_reload = true, ';padding:0;margin:0;', $pre_txt = '');

            $not_active = true;

        } else {
            if (show_on_what_page($active_key, '0')) {
                //$style .= ';background:#FCE7E5;';
                //$element .= ' Anzeige: <b>'.show_on_what_page($active_key,'1').'</b>';
                $element .= show_on_what_page($active_key, '1');
                $not_active = false;
            }
            if (!stristr($k_assi_url_1, '_self_def_box'))
                $element .= is_active_icon_link($active_key, $msgbox = true, $float_right = false, $with_text = false, $f_size = '0.9', $link_bars = false, $show_dev_key = false, $allow_as_button = false, $button_class = 'button999',
                    $page_reload = true, ';padding:0;margin:0;', $pre_txt = '');
        }

    } else {
        $we_have_active_key = false;
        if ($active_key == 'false' or $active_key == '') {
            $style .= ';background:#FCE7E5;';
            $element .= ' <b>z.Zt. deaktiviert!</b>';
        }
    }

    if ($we_have_active_key) $k_assi_1_title = strip_tags(lookup('select t_key_txt from diverses where div_what = \'' . $active_key . '\'  ', 't_key_txt'));
    if ($right_col) {
        $this_icon = $bearb_mode_icon41_right;
        $tt_class = 'tip_lu';
    } else {
        $this_icon = $bearb_mode_icon41_left;
        $tt_class = 'tip';
    }
    if ($not_active) $this_icon = $bearb_mode_icon24_red_left;
    $return .= $add_clearfix_txt;

    //if($help_key<>'') $hl = help_icon_new($help_key, $txt='Hilfe', $title='', $with_text=false, $new_window=false, $icon='13', $class, $style='');
    if ($k_assi_url_1 <> '') $k_assi_link1 = get_lw_link_button_assi(
        $assi_url = $k_assi_url_1,
        $goto = $active_key,
        $help_key,
        $button_text = '',
        $button_class = '_button99',
        $button_title = '',
        $pop_title = '',
        $width = '1550',
        $height = '',
        $button_style = ';margin:0 5px 0 0;',
        $icon_size = '13'
    );


    if ($k_assi_url_2 <> '') $k_assi_link2 = get_lw_link_button_assi(
        $assi_url = $k_assi_url_2,
        $goto = $active_key,
        $help_key,
        $button_text = '',
        $button_class = '_button99',
        $button_title = '',
        $pop_title = '',
        $width = '1550',
        $height = '',
        $button_style = ';margin:0 5px 0 0;',
        $icon_size = '13'
    );

    if ($k_assi_url_1 == '') $t_help_key = $help_key;
    if ($d_assi_url_1 <> '') $d_assi_link = get_lw_link_button_assi(
        $assi_url = $d_assi_url_1,
        $goto = $active_key,
        $t_help_key,
        $button_text = '',
        $button_class = '_button99',
        $button_title = '',
        $pop_title = '',
        $width = '1550',
        $height = '',
        $button_style = ';margin:0 5px 0 0;',
        $icon_size = '13'
    );

    if ($we_have_active_key) {
        $t_key = $active_key;
        $t_key_txt = lookup('select t_key_txt from diverses where div_what =  \'' . $t_key . '\'  ', 't_key_txt');
        $t_key_comment = lookup('select t_key_comment from diverses where div_what =  \'' . $t_key . '\'  ', 't_key_comment');
        $tt_txt = '<div style="color:#009;font-weight:bold">' . $t_key_txt . '</div>' . $t_key_comment;
        $this_tt_width = '320px';
        $this_tt_width = '450px';
        if (stristr($t_key_comment, '<img')) $this_tt_width = '750px';
        $tt_txt = wrap_in_div_cat($tt_txt, 'tttxt', 'padding: 0 7px');
        $tt = tooltip($tt_txt, $tt_img = '13', $tt_style = 'margin-left:10px;position:relative', $tt_class, $width = $this_tt_width, $admin = false, $tt_margin_top = '', $tt_icon = '', true);
    }
    $zuf = mt_rand(100000, 100000000);
    $return .= '<div id="drgg_' . $active_key . $zuf . '" class="edit_this2 dimmed04f" style="' . $style . '">' . $this_icon;
    //$return .='<a title="'.$k_assi_1_title.'" target="_blank" href="'.ADMIN_FOLDER.'/'.$k_assi_url_1.'">'.$text.'</a>';
    $return .= $text . ' &nbsp; &nbsp; ';
    $return .= $k_assi_link1 . ' '; //k-Assi1
    $return .= $k_assi_link2 . ' '; //k-Assi2
    if ($d_assi_url_1 <> '') $return .= ' &nbsp; ' . $d_assi_link; //d-assi
    $return .= ' ';
    $return .= $tt;
    //$return .= $hl; //Hilfe
    $return .= ' &nbsp; &nbsp; ';

    $return .= $element; //Tooltip	

    $return .= '</div>';

    if ($draggable) {
        $return .= '
		<script>
		new Draggable(\'drgg_' . $active_key . $zuf . '\',{revert: false});
		</script> 
			';
    }

    return $return;
}


function make_config_edit_link(
    $url,
    $as = 'div',
    $element = 'Element bearbeiten',
    $style = '',
    $in_new_window = true,
    $add_clearfix = false,
    $icon_only = false,
    $icon_size = '12',
    $is_active = true,
    $this_id = '',
    $dragable = false,
    $show_pos = true,
    $right_col = false,
    $no_col = true
)
{
    global $application_shop_is_in_dev_mode, $bearb_mode_icon21, $bearb_mode_icon31, $bearb_mode_icon41, $bearb_mode_icon12, $bearb_mode_icon41_left, $img_url, $bearb_mode_use_popup_windows, $bearb_mode_icon24_red_left, $bearb_mode_icon24_red_right;

    $bearb_mode_icon31 = '<img style="border:none;margin:-8px 4px -2px -11px" src="' . DIR_WS_IMAGES_FULL . '/icons/utilities31.png" width="24" height="24" />';
    $bearb_mode_icon31_right = '<img style="float:right;border:none;margin:-8px -11px -2px 4px" src="' . DIR_WS_IMAGES_FULL . '/icons/utilities31.png" width="24" height="24" />';

    $in_new_window = true;//immer in neuem Fenster - kein Popup
    if ($application_shop_is_in_dev_mode) {
        if ($add_clearfix) $add_clearfix_txt = '<div class="clearfix"></div>';

        if (!$is_active) {


            $style .= ';background:#FCE7E5;';
            if (stristr($url, '_self_def_box')) {
                $element .= ' <b>nicht genutzt!</b>';
            } else {
                $element .= ' <b>hier nicht genutzt!</b>';
            }
            $not_active = true;
        }

        $pos_str = '';
        /*
if($show_pos and $dragable){
 if ( stristr($style,'top:') ){
	 $pos_str= ' <i>top: '. TextBetween('top:','px',$style).'px';
	 $pos_str .= ' left: '. TextBetween('left:','px',$style).'px</i>';
 }
}
*/

        $element = str_replace('mcel_', '', $element);
        $element = deuml($element);

        if ($icon_only) {
            $this_icon = $bearb_mode_icon21;
            if ($icon_size == '12') $this_icon = $bearb_mode_icon12;

            if (!$in_new_window) {
                $return = $add_clearfix_txt . '
			<a title="Popup: ' . $element . '" 
			href="' . ADMIN_FOLDER . '/' . $url . '"
			class="lightwindow " params="lightwindow_type=external">
			<' . $as . ' class="" style="' . $style . '">' . $this_icon . '</' . $as . '></a>
			';
            } else {
                $return = $add_clearfix_txt . '
			<a title="Neues-Browserfenster: ' . $element . '" target="_blank" 
			href="' . ADMIN_FOLDER . '/' . $url . '">
			<' . $as . ' class="" style="' . $style . '">' . $this_icon . '</' . $as . '></a>
			';
            }

        } else {
            if (!$in_new_window) {
                $return = $add_clearfix_txt . '
			<a title="Konfigurations-Assistent - ' . $element . '" 
			href="' . ADMIN_FOLDER . '/' . $url . '"
			class="lightwindow " params="lightwindow_type=external">
			<' . $as . ' class="edit_this dimmed04f" style="' . $style . '">' . $bearb_mode_icon31 . $element . '</' . $as . '></a>
			';
            } else {
                /*
			$return = $add_clearfix_txt.'
			<a title="Neues-Browserfenster - Konfigurations-Assistent - '.$element.'" target="_blank" 
			href="'.ADMIN_FOLDER.'/'.$url.'">
			<'.$as.' class="edit_this round6_top" style="'.$style.'">'.$bearb_mode_icon31.$element.'</'.$as.'></a>
			';
			*/
                if (!$no_col) {
                    if ($right_col) {
                        $this_margin = ';margin-right:-24px';
                        $this_icon = $bearb_mode_icon31_right;
                        if ($not_active) $this_icon = $bearb_mode_icon24_red_right;
                    } else {
                        $this_margin = ';margin-left:-24px';
                        $this_icon = $bearb_mode_icon31;
                        if ($not_active) $this_icon = $bearb_mode_icon24_red_left;
                    }
                } else {
                    $this_icon = $bearb_mode_icon31;
                }

                if ($this_id <> '' and $dragable) {
                    $this_icon = $bearb_mode_icon41_left;


                    $return = $add_clearfix_txt . '
				<' . $as . ' id="' . $this_id . '" class="edit_this dimmed04f" style="' . $style . '">' . $this_icon . '
				<a title="Neues-Browserfenster - Konfigurations-Assistent - ' . strip_tags($element) . '" target="_blank" href="' . ADMIN_FOLDER . '/' . $url . '">
				' . $element . '' . $pos_str . '</a></' . $as . '>';
                    $return = '';
                } else {
                    //$this_icon = $bearb_mode_icon31; 

                    $return = $add_clearfix_txt;
                    if ($bearb_mode_use_popup_windows) {
                        $t_link = get_lw_link_button_assi(
                            $t2_assi_url = ADMIN_FOLDER . '/' . $url,
                            $t2_goto = '',
                            $t2_help_key = '',
                            $t2_button_text = $element,
                            $t2_button_class = '',
                            $t2_button_title = strip_tags($element),
                            $t2_pop_title = '',
                            $t2_width = '1550',
                            $t2_height = '',
                            $t2_button_style = '',
                            $t2_icon_size = '13'
                        );
                        $return .= '<' . $as . ' class="edit_this dimmed04f" style="' . $style . $this_margin . '">' . $this_icon . $t_link . '</' . $as . '>';
                    } else {
                        $return .= '<a title="Neues-Browserfenster - Konfigurations-Assistent - ' . strip_tags($element) . '" target="_blank" href="' . ADMIN_FOLDER . '/' . $url . '">';
                        $return .= '<' . $as . ' class="edit_this dimmed04f" style="' . $style . $this_margin . '">' . $this_icon . $element . '</' . $as . '></a>';
                    }

                }


            }
        }

        if ($this_id <> '' and $dragable) {

            $return .= '
<script>
new Draggable(\'' . $this_id . '\',{revert: false});
</script> 
	';

        }


        return $return;
    } else {
        return '';
    }

}


function config_edit_link_by_box_key($box_key, $as = 'div', $element = '', $style = '', $in_new_window = false, $add_clearfix = false)
{
    global $application_shop_is_in_dev_mode, $new_browser_window_icon, $popup_window_icon;

//$application_shop_is_in_dev_mode=true;

    if ($application_shop_is_in_dev_mode) {
        if ($add_clearfix) $add_clearfix_txt = '<div class="clearfix"></div>';
        $url = ADMIN_FOLDER . '/wrapper_all.php?incl=includes/quick_config_boxes/config_box_' . $box_key . '.php';

        //$element=deuml($element);
        if ($element == '') $element = strip_tags(get_dv($box_key . '_header_txt ')) . ' bearbeiten ';


        if (!$in_new_window) {
            $return = $add_clearfix_txt . '
		<a title="PopUp - Konfigurations-Assistent - ' . $element . '" 
		href="' . $url . '"
		class="lightwindow " params="lightwindow_type=external,lightwindow_width=840 ">
		<' . $as . ' class="edit_this" style="' . $style . '">' . $element . '</' . $as . '></a>
		';
        } else {
            $return = $add_clearfix_txt . '
		<a title="Neues-Browserfenster - Konfigurations-Assistent - ' . $element . '" target="_blank" 
		href="' . $url . '">
		<' . $as . ' class="edit_this" style="' . $style . '">' . $element . '</' . $as . '></a>
		';

        }


        $popup = '
		<a title="PopUp - Konfigurations-Assistent" 
		href="' . $url . '"
		class="lightwindow " params="lightwindow_type=external,lightwindow_width=840 ">
		' . $popup_window_icon . '</a>
		';

        $new_win = '
		<a title="Neues-Browserfenster - Konfigurations-Assistent" target="_blank" 
		href="' . $url . '">
		' . $new_browser_window_icon . '</a>		
		';

        $return = $add_clearfix_txt . '<' . $as . ' class="edit_this" style="' . $style . '">' . $element . ' ' . $popup . ' ' . $new_win . '</' . $as . '>';


    } else {
        $return = '';
    }
    return $return;
}


function get_preview_link_self_def_box($master_key)
{
    global $preview_icon;
    $preview_link = '../wrapper_all.php?incl=includes/boxes/self_def_box.php&master_key=' . $master_key;

    $href = $preview_link;
    $text = $preview_icon . ' Vorschau';
    $title = get_dv($master_key . '_link_title');
    $class = "button3";
    $style = "margin-left:12px";
    $width = '240';
    $height = '490';
    $type = 'pop';


    return get_link($href, $text, $title, $class, $style, $width, $height, $type);

}


function set_app_top_true($div_what)
{
    if ($app_admin_is_in_dev_mode) {
        $sql = " update diverses set app_top=1 where div_what = '" . $div_what . "' ";
        q($sql);
    }
}

function set_app_top_false($div_what)
{
    if ($app_admin_is_in_dev_mode) {
        $sql = " update diverses set app_top=0 where div_what = '" . $div_what . "' ";
        q($sql);
    }
}


function get_config_link(
    $url,
    $txt = '??????',
    $blank = false,
    $has_sublinks = false,
    $show_is_activ_icon = false,
    $key = '',
    $float_right = true,
    $wrap = false,
    $style = '',
    $class = '')
{

    global $new_browser_window_icon;
    global $header_use;

    if ($header_use) {
        $header_use_add = '&use_header=1';
    } else {
        $header_use_add = '&use_header=0';
    }
    $url = str_replace('&use_header=0', '', $url);
    $url = str_replace('&use_header=1', '', $url);

    $url = $url . $header_use_add;

    if ($float_right) {
        $is_inactive_icon = '<img title="ist deaktiviert!" style="float:right;opacity:0.6" src="../images/icon4/famfam/cross.png" width="16" height="16" />';
        $is_active_icon = '<img title="ist aktiv" style="float:right;opacity:0.2" src="../images/icon4/famfam/tick.png" width="16" height="16" />';
    } else {
        $is_inactive_icon = '<img title="ist deaktiviert!" style="margin:4px;opacity:0.6" src="../images/icon4/famfam/cross.png" width="16" height="16" />';
        $is_active_icon = '<img title="ist aktiv" style="margin:4px;opacity:0.2" src="../images/icon4/famfam/tick.png" width="16" height="16" />';
    }

    if ($class <> '') {
        $class_txt = ' class="' . $class . '" ';
    } else {
        $class_txt = '';
    }

    if ($style <> '') {
        $style_txt = ' style="' . $class . '" ';
    } else {
        $style_txt = '';
    }


//$blank=false;
    $this_key = $key . '_is_active';

    if ($show_is_activ_icon) {
        $is_active = get_dv_bool($this_key);
        if ($is_active) {
            $is_active_txt = $is_active_icon;
            $is_active_hint = ' (das Element ist aktiv) ';

        } else {
            $is_active_txt = $is_inactive_icon;
            $is_active_hint = ' (das Element ist deaktiviert) ';
        }
    } else {
        $is_active_txt = '';
    }


    if (!$blank) {
        if ($url <> '') {
            //return HTTP_CATALOG_SERVER.DIR_WS_ADMIN.DIR_WS_INCLUDES.$url; $go_to_bullet  $go_to_bullet_float_right   '<img src="images/icons/bullet_go/bullet_go11.png" width="16" height="16" />'
            if ($has_sublinks) {
                //return '<a '.$class_txt.$style_txt.' href="wrapper_all.php?incl=includes/'.$url.'">'.$txt.$is_active_txt.'<img style="float:right" src="../images/icon4/famfam/bullet_go.png" width="16" height="16" /></a>';
                return '<a ' . $class_txt . $style_txt . ' href="wrapper_all.php?incl=includes/' . $url . '">' . $txt . $is_active_txt . $go_to_bullet_float_right . '</a>';
            } else {
                return '<a ' . $class_txt . $style_txt . ' href="wrapper_all.php?incl=includes/' . $url . '">' . $txt . $is_active_txt . '</a>';
            }
        } else {
            if ($has_sublinks) {
                //return '<a href="#">'.$txt.' <img style="float:right" src="../images/icon4/famfam/bullet_go.png" width="16" height="16" /></a>';
                return '<a href="#">' . $txt . ' ' . $go_to_bullet_float_right . '</a>';
            } else {
                return '<a href="#">' . $txt . ' (x)</a>';
            }
        }
    } else {
        if ($url <> '') {
            //return HTTP_CATALOG_SERVER.DIR_WS_ADMIN.DIR_WS_INCLUDES.$url; title="neues Browser-Fenster"  $new_browser_window_icon.
            if ($wrap) {
                //return '<a href="'.$url.'">'.$txt.$is_active_txt.'</a>';
                return '<a ' . $class_txt . $style_txt . ' target="_blank" title="neues Browser-Fenster ' . $is_active_hint . '" href="wrapper_all.php?incl=includes/' . $url . '">' . $txt . $is_active_txt . '</a>';
            } else {
                return '<a target="_blank" title="neues Browser-Fenster ' . $is_active_hint . '"  ' . $class_txt . $style_txt . ' href="' . $url . '">' . $txt . $is_active_txt . '</a>';
            }
        } else {
            if ($has_sublinks) {
                //return '<a href="#">'.$txt.' <img style="float:right" src="../images/icon4/famfam/bullet_go.png" width="16" height="16" /></a>';		
                return '<a href="#">' . $txt . ' ' . $go_to_bullet_float_right . '</a>';
            } else {
                return '<a href="#">' . $txt . ' (x)</a>';
            }

        }
    }
}


function make_t_key_detail_link($key)
{
    $x = 'wrapper_all.php?incl=includes/quick_config_boxes/config_box_' . $key . '.php';
    return $x;
}


function plain_link($url, $text, $key = '', $title = '', $class = '', $style = '', $target_blank = false)
{
    global $new_browser_window_icon;
    /*
global $header_use;

if ($header_use) {
	$header_use_add = '&use_header=1'; 
}else{
	$header_use_add = '&use_header=0'; 
}

if (!eregiS('use_header',$url) ) {
	$url = $url.$header_use_add;
}else{
	$url=str_replace('&use_header=1',$header_use_add,$url);
	$url=str_replace('&use_header=0',$header_use_add,$url);	
}
*/
//if ( !eregiS('?',$url) ) $url=str_replace('&','?',$url);	

    $is_inactive_icon = '<img title="ist deaktiviert!" style="float:right;opacity:0.6" src="../images/icon4/famfam/cross.png" width="16" height="16" />';
    $is_active_icon = '<img title="ist aktiv" style="float:right;opacity:0.2" src="../images/icon4/famfam/tick.png" width="16" height="16" />';

    if ($key <> '') {
        $is_active = get_dv_bool($key . '_is_active');
        if ($is_active) {
            $is_active_txt = $is_active_icon;
        } else {
            $is_active_txt = $is_inactive_icon;
        }
    } else {
        $is_active_txt = '';
    }


    if ($title == '') $title = 'in neuem Browser-Fenster';
    if ($target_blank) $target_blank_txt = ' target="_blank" ';

    $l = '
<a ' . $target_blank_txt . ' class="' . $class . '" style="' . $style . '" title="' . $title . '" href="' . $url . '">' . $text . $is_active_txt . '</a>
';


    return $l;
}


function get_config_link_by_key(
    $key,
    $uni = false,
    $by_template = false,
    $show_is_activ_icon = true,
    $class = '',
    $style = '',
    $blank = false,
    $force_txt = '')
{

    global $new_browser_window_icon;
    global $header_use;

    if ($header_use) {
        $header_use_add = '&use_header=1';
    } else {
        $header_use_add = '&use_header=0';
    }

    $is_inactive_icon = '<img title="ist deaktiviert!" style="float:right;opacity:0.6" src="../images/icon4/famfam/cross.png" width="16" height="16" />';
    $is_active_icon = '<img title="ist aktiv" style="float:right;opacity:0.2" src="../images/icon4/famfam/tick.png" width="16" height="16" />';

    $this_key = $key . '_is_active';

    if ($show_is_activ_icon) {
        $is_active = get_dv_bool($this_key);
        if ($is_active) {
            $is_active_txt = $is_active_icon;
            $is_active_style = '';
        } else {
            $is_active_txt = $is_inactive_icon;
            $is_active_style = 'color:#aaa;';
        }
    } else {
        $is_active_txt = '';
    }


    if (!$uni) {
        if (!$by_template) {
            $url = 'wrapper_all.php?incl=includes/quick_config_boxes/config_box_' . $key . '.php' . $header_use_add;
        } else {
            $url = 'wrapper_all.php?incl=includes/quick_config_boxes/config_box_self_def_box.php&master_key=' . $key . $header_use_add;
        }
    } else {
        if (!$by_template) {
            $url = 'wrapper_all.php?incl=includes/quick_config_boxes/config_box_uni.php&key=' . $key . $header_use_add;
        } else {
            $url = 'wrapper_all.php?incl=includes/quick_config_boxes/config_box_self_def_box.php&master_key=' . $key . $header_use_add;
        }
    }


    $txt = get_t_key_txt($this_key, $make_txt = false);

    if (eregiS('Selbst definiert', $txt) or eregiS('self def', $txt) or eregiS('self_def', $txt)) {

        if (eregiS('self_def_link', $key)) {
            $txt = strip_tags(get_dv($key . '_link_text'));
        } else {
            $txt = strip_tags(get_dv($key . '_header_txt'));
        }

        $txt_add = '<div style="font-size:0.8em;font-weight:normal;color:#c66">' . $key . ' (selbst definiert)</div>';
        $title = $txt;

    } else {
        $txt = strip_tags($txt);
        $title = $txt;
    }

    if ($blank) $blank_txt = ' target="_blank" ';

    if ($txt == '') $txt = $key;
    if ($url == '') $txt = $txt . '(x)';

    if ($force_txt == '') {
        return '<a ' . $blank_txt . ' class="' . $class . '" style="' . $is_active_style . $style . '" title="' . $title . '" href="' . $url . '">' . $is_active_txt . $txt . $txt_add . '</a>';
    } else {
        return '<a ' . $blank_txt . ' class="' . $class . '" style="' . $is_active_style . $style . '" title="' . $title . '" href="' . $url . '">' . $force_txt . '</a>';

    }

}


function get_config_link_by_key3(
    $key,
    $uni = false,
    $by_template = false,
    $show_is_activ_icon = true,
    $class = '',
    $style = '',
    $blank = false,
    $force_txt = '')
{

    global $new_browser_window_icon;
    global $header_use;

    if ($header_use) {
        $header_use_add = '&use_header=1';
    } else {
        $header_use_add = '&use_header=0';
    }

    $is_inactive_icon = '<img title="ist deaktiviert!" style="float:right;opacity:0.6;margin-right:10px" src="../images/icon4/famfam/cross.png" width="13" height="13" />';
    $is_active_icon = '<img title="ist aktiv" style="float:right;opacity:0.6;margin-right:10px" src="../images/icon4/famfam/tick.png" width="13" height="13" />';

    $this_key = $key . '_is_active';

    if ($show_is_activ_icon) {
        $is_active = get_dv_bool($this_key);
        if ($is_active) {
            $is_active_txt = $is_active_icon;
            $is_active_style = '';
        } else {
            $is_active_txt = $is_inactive_icon;
            $is_active_style = 'color:#aaa;';
        }
    } else {
        $is_active_txt = '';
    }

    /*
if (!$uni){
	if (!$by_template){
		$url = 'wrapper_full.php?includes/quick_config_new/template1.php&use_header=1&item=config_box_'.$key.'.php';
	}else{
		$url = 'wrapper_full.php?incl=includes/quick_config_boxes/config_box_self_def_box.php&master_key='.$key;
	}
}else{
	if (!$by_template){
		$url = 'wrapper_full.php?incl=includes/quick_config_boxes/config_box_uni.php&key='.$key;
	}else{
		$url = 'wrapper_full.php?incl=includes/quick_config_boxes/config_box_self_def_box.php&master_key='.$key;
	}
}
*/
    $url = 'wrapper_full.php?incl=includes/quick_config_new/template1.php&use_header=1&item=quick_config_boxes/config_box_' . $key . '.php';

    $txt = get_t_key_txt($this_key, $make_txt = false);

    if (eregiS('Selbst definiert', $txt) or eregiS('self def', $txt) or eregiS('self_def', $txt)) {

        if (eregiS('self_def_link', $key)) {
            $txt = strip_tags(get_dv($key . '_link_text'));
        } else {
            $txt = strip_tags(get_dv($key . '_header_txt'));
        }

        //$txt_add = '<div style="font-size:0.8em;font-weight:normal;color:#c66">'.$key.' (selbst definiert--------)</div>';
        $txt_add = '';
        $title = $txt;

    } else {
        $txt = strip_tags($txt);
        $title = $txt;
    }

    if ($blank) $blank_txt = ' target="_blank" ';

    if ($txt == '') $txt = $key;
    if ($url == '') $txt = $txt . '(x)';

    if ($force_txt == '') {
        return '<a ' . $blank_txt . ' class="' . $class . '" style="' . $is_active_style . $style . '" title="' . $title . '" href="' . $url . '">' . $is_active_txt . $txt . $txt_add . '</a>';
    } else {
        return '<a ' . $blank_txt . ' class="' . $class . '" style="' . $is_active_style . $style . '" title="' . $title . '" href="' . $url . '">' . $force_txt . '</a>';

    }

}


//neu:
function get_config_link_by_key2(
    $key,
    $uni = false,
    $by_template = false,
    $show_is_activ_icon = true,
    $class = '',
    $style = '',
    $blank = false,
    $force_txt = '')
{

    global $new_browser_window_icon;


//$is_inactive_icon = '<img title="ist deaktiviert!" style="float:right;opacity:0.6;margin-right:10px" src="../images/icon4/famfam/cross.png" width="12" height="12" />';
//$is_active_icon = '<img title="ist aktiv" style="float:right;opacity:1.0;margin-right:10px" src="../images/icon4/famfam/tick.png" width="12" height="12" />';
    $this_key = $key . '_is_active';

    $is_active_icon = is_active_icon_link($this_key);
    $is_inactive_icon = $is_active_icon;


    if ($show_is_activ_icon) {
        $is_active = get_dv_bool($this_key);
        if ($is_active) {
            $is_active_txt = $is_active_icon;
            $is_active_style = '';
        } else {
            $is_active_txt = $is_inactive_icon;
            $is_active_style = 'color:#aaa;';
        }
    } else {
        $is_active_txt = '';
    }

    /*
if (!$uni){
	if (!$by_template){
		$url = 'wrapper_all.php?incl=includes/quick_config_boxes/config_box_'.$key.'.php'.$header_use_add;
	}else{
		$url = 'wrapper_all.php?incl=includes/quick_config_boxes/config_box_self_def_box.php&master_key='.$key.$header_use_add;
	}
}else{
	if (!$by_template){
		$url = 'wrapper_all.php?incl=includes/quick_config_boxes/config_box_uni.php&key='.$key.$header_use_add;
	}else{
		$url = 'wrapper_all.php?incl=includes/quick_config_boxes/config_box_self_def_box.php&master_key='.$key.$header_use_add;
	}
}
*/

    $url = 'wrapper_full.php?incl=includes/quick_config_new/template1.php&item=quick_config_boxes/config_box_self_def_box.php&master_key=' . $key . '&use_header=1';


    $txt = get_t_key_txt($this_key, $make_txt = false);

    if (eregiS('Selbst definiert', $txt) or eregiS('self def', $txt) or eregiS('self_def', $txt)) {

        if (eregiS('self_def_link', $key)) {
            $txt = strip_tags(get_dv($key . '_link_text'));
        } else {
            $txt = strip_tags(get_dv($key . '_header_txt'));
        }

        //$txt_add = '<div style="font-size:0.8em;font-weight:normal;color:#c66">'.$key.' (selbst definiert)</div>';
        $txt_add = '';
        $title = $txt;

    } else {
        $txt = strip_tags($txt);
        $title = $txt;
    }

    if ($blank) $blank_txt = ' target="_blank" ';

    if ($txt == '') $txt = $key;
    if ($url == '') $txt = $txt . '(x)';

    if ($force_txt == '') {
//return '<a '.$blank_txt.' class="'.$class.'" style="'.$is_active_style.$style.'" title="'.$title.'" href="'.$url.'">'.$is_active_txt.$txt.$txt_add.'</a>';
        return '<a ' . $blank_txt . ' class="' . $class . '" style="' . $is_active_style . $style . '" title="' . $title . '" href="' . $url . '">' . $txt . $txt_add . '</a>' . $is_active_txt;
    } else {
        return '<a ' . $blank_txt . ' class="' . $class . '" style="' . $is_active_style . $style . '" title="' . $title . '" href="' . $url . '">' . $force_txt . '</a>';

    }

}


function get_config_link_by_key4(
    $key,
    $uni = false,
    $by_template = false,
    $show_is_activ_icon = true,
    $class = 'button30',
    $style = '',
    $blank = false,
    $force_txt = '')
{

    global $new_browser_window_icon;


//$is_inactive_icon = '<img title="ist deaktiviert!" style="float:right;opacity:0.6;margin-right:10px" src="../images/icon4/famfam/cross.png" width="12" height="12" />';
//$is_active_icon = '<img title="ist aktiv" style="float:right;opacity:1.0;margin-right:10px" src="../images/icon4/famfam/tick.png" width="12" height="12" />';
    $this_key = $key . '_is_active';

    $is_active_icon = is_active_icon_link($this_key);
    $is_inactive_icon = $is_active_icon;


    if ($show_is_activ_icon) {
        $is_active = get_dv_bool($this_key);
        if ($is_active) {
            $is_active_txt = $is_active_icon;
            $is_active_style = '';
        } else {
            $is_active_txt = $is_inactive_icon;
            $is_active_style = 'color:#aaa;';
        }
    } else {
        $is_active_txt = '';
    }

    /*
if (!$uni){
	if (!$by_template){
		$url = 'wrapper_all.php?incl=includes/quick_config_boxes/config_box_'.$key.'.php'.$header_use_add;
	}else{
		$url = 'wrapper_all.php?incl=includes/quick_config_boxes/config_box_self_def_box.php&master_key='.$key.$header_use_add;
	}
}else{
	if (!$by_template){
		$url = 'wrapper_all.php?incl=includes/quick_config_boxes/config_box_uni.php&key='.$key.$header_use_add;
	}else{
		$url = 'wrapper_all.php?incl=includes/quick_config_boxes/config_box_self_def_box.php&master_key='.$key.$header_use_add;
	}
}
*/

    $url = 'wrapper_full.php?incl=includes/quick_config_new/template1.php&item=quick_config_boxes/config_box_self_def_box.php&master_key=' . $key . '&use_header=1';


    $txt = get_t_key_txt($this_key, $make_txt = false);

    if (eregiS('Selbst definiert', $txt) or eregiS('self def', $txt) or eregiS('self_def', $txt)) {

        if (eregiS('self_def_link', $key)) {
            $txt = strip_tags(get_dv($key . '_link_text'));
        } else {
            $txt = strip_tags(get_dv($key . '_header_txt'));
        }

        //$txt_add = '<div style="font-size:0.8em;font-weight:normal;color:#c66">'.$key.' (selbst definiert)</div>';
        $txt_add = '';
        $title = $txt;

    } else {
        $txt = strip_tags($txt);
        $title = $txt;
    }

    if ($blank) $blank_txt = ' target="_blank" ';

    if ($txt == '') $txt = $key;
    if ($url == '') $txt = $txt . '(x)';

    if ($force_txt == '') {
//return '<a '.$blank_txt.' class="'.$class.'" style="'.$is_active_style.$style.'" title="'.$title.'" href="'.$url.'">'.$is_active_txt.$txt.$txt_add.'</a>';
        $r = '<span style="' . $is_active_style . $style . ';margin-right:28px">' . $txt . '</span>' . is_active_icon_link($this_key, true, false, true, '0.8') .
            '<a target="_blank" ' . $blank_txt . ' class="' . $class . '" style="' . $is_active_style . $style . ';font-size:0.8em;color:#009;margin-left:12px" title="' . $title . '" href="' . $url . '">Box bearbeiten</a>';

        return $r;
    } else {
        return '<a ' . $blank_txt . ' class="' . $class . '" style="' . $is_active_style . $style . '" title="' . $title . '" href="' . $url . '">' . $force_txt . '</a>';

    }

}


function get_config_link_by_key5(
    $key,
    $uni = false,
    $by_template = false,
    $show_is_activ_icon = true,
    $class = '',
    $style = '',
    $blank = false,
    $force_txt = '')
{

    global $new_browser_window_icon;
    global $header_use;

    if ($header_use) {
        $header_use_add = '&use_header=1';
    } else {
        $header_use_add = '&use_header=0';
    }

    $is_inactive_icon = '<img title="ist deaktiviert!" style="float:right;opacity:0.6;margin-right:10px" src="../images/icon4/famfam/cross.png" width="13" height="13" />';
    $is_active_icon = '<img title="ist aktiv" style="float:right;opacity:0.6;margin-right:10px" src="../images/icon4/famfam/tick.png" width="13" height="13" />';

    $this_key = $key . '_is_active';

    if ($show_is_activ_icon) {
        $is_active = get_dv_bool($this_key);
        if ($is_active) {
            $is_active_txt = $is_active_icon;
            $is_active_style = '';
        } else {
            $is_active_txt = $is_inactive_icon;
            $is_active_style = 'color:#aaa;';
        }
    } else {
        $is_active_txt = '';
    }

    /*
if (!$uni){
	if (!$by_template){
		$url = 'wrapper_full.php?includes/quick_config_new/template1.php&use_header=1&item=config_box_'.$key.'.php';
	}else{
		$url = 'wrapper_full.php?incl=includes/quick_config_boxes/config_box_self_def_box.php&master_key='.$key;
	}
}else{
	if (!$by_template){
		$url = 'wrapper_full.php?incl=includes/quick_config_boxes/config_box_uni.php&key='.$key;
	}else{
		$url = 'wrapper_full.php?incl=includes/quick_config_boxes/config_box_self_def_box.php&master_key='.$key;
	}
}
*/
    $url = 'wrapper_full.php?incl=includes/quick_config_new/template1.php&use_header=1&item=quick_config_boxes/config_box_' . $key . '.php';

    $txt = get_t_key_txt($this_key, $make_txt = false);

    if (eregiS('Selbst definiert', $txt) or eregiS('self def', $txt) or eregiS('self_def', $txt)) {

        if (eregiS('self_def_link', $key)) {
            $txt = strip_tags(get_dv($key . '_link_text'));
        } else {
            $txt = strip_tags(get_dv($key . '_header_txt'));
        }

        //$txt_add = '<div style="font-size:0.8em;font-weight:normal;color:#c66">'.$key.' (selbst definiert--------)</div>';
        $txt_add = '';
        $title = $txt;

    } else {
        $txt = strip_tags($txt);
        $title = $txt;
    }

    if ($blank) $blank_txt = ' target="_blank" ';

    if ($txt == '') $txt = $key;
    if ($url == '') $txt = $txt . '(x)';

    if ($force_txt == '') {
//$r = '<a '.$blank_txt.' class="'.$class.'" style="'.$is_active_style.$style.'" title="'.$title.'" href="'.$url.'">'.$is_active_txt.$txt.$txt_add.'</a>';
        $r = '<span style="' . $is_active_style . $style . ';margin-right:28px">' . $txt . '</span>' . is_active_icon_link($this_key, true, false, true, '0.8', true) .
            '<a target="_blank" ' . $blank_txt . ' class="' . $class . '" style="' . $is_active_style . $style . ';font-size:0.8em;color:#009;margin-left:12px" title="' . $title . '" href="' . $url . '">Link bearbeiten</a>';

        return $r;
    } else {
        return '<a ' . $blank_txt . ' class="' . $class . '" style="' . $is_active_style . $style . '" title="' . $title . '" href="' . $url . '">' . $force_txt . '</a>';

    }

}


function get_config_link_by_key6(
    $key,
    $uni = false,
    $by_template = false,
    $show_is_activ_icon = true,
    $class = '',
    $style = '',
    $blank = false,
    $force_txt = '')
{

    global $new_browser_window_icon, $wizard_icon13;


//$is_inactive_icon = '<img title="ist deaktiviert!" style="float:right;opacity:0.6;margin-right:10px" src="../images/icon4/famfam/cross.png" width="12" height="12" />';
//$is_active_icon = '<img title="ist aktiv" style="float:right;opacity:1.0;margin-right:10px" src="../images/icon4/famfam/tick.png" width="12" height="12" />';
    $this_key = $key . '_is_active';

    $is_active_icon = is_active_icon_link($this_key);
    $is_inactive_icon = $is_active_icon;


    if ($show_is_activ_icon) {
        $is_active = get_dv_bool($this_key);
        if ($is_active) {
            $is_active_txt = $is_active_icon;
            $is_active_style = '';
        } else {
            $is_active_txt = $is_inactive_icon;
            $is_active_style = 'color:#aaa;';
        }
    } else {
        $is_active_txt = '';
    }

    /*
if (!$uni){
	if (!$by_template){
		$url = 'wrapper_all.php?incl=includes/quick_config_boxes/config_box_'.$key.'.php'.$header_use_add;
	}else{
		$url = 'wrapper_all.php?incl=includes/quick_config_boxes/config_box_self_def_box.php&master_key='.$key.$header_use_add;
	}
}else{
	if (!$by_template){
		$url = 'wrapper_all.php?incl=includes/quick_config_boxes/config_box_uni.php&key='.$key.$header_use_add;
	}else{
		$url = 'wrapper_all.php?incl=includes/quick_config_boxes/config_box_self_def_box.php&master_key='.$key.$header_use_add;
	}
}
*/

    $url = 'wrapper_full.php?incl=includes/quick_config_new/template1.php&item=quick_config_boxes/config_box_self_def_box.php&master_key=' . $key . '&use_header=1';


    $txt = get_t_key_txt($this_key, $make_txt = false);

    if (eregiS('Selbst definiert', $txt) or eregiS('self def', $txt) or eregiS('self_def', $txt)) {

        if (eregiS('self_def_link', $key)) {
            $txt = strip_tags(get_dv($key . '_link_text'));
        } else {
            $txt = strip_tags(get_dv($key . '_header_txt'));
        }

        //$txt_add = '<div style="font-size:0.8em;font-weight:normal;color:#c66">'.$key.' (selbst definiert)</div>';
        $txt_add = '';
        $title = $txt;

    } else {
        $txt = strip_tags($txt);
        $title = $txt;
    }

    if ($blank) $blank_txt = ' target="_blank" ';

    if ($txt == '') $txt = $key;
    if ($url == '') $txt = $txt . '(x)';

    if ($force_txt == '') {
//return '<a '.$blank_txt.' class="'.$class.'" style="'.$is_active_style.$style.'" title="'.$title.'" href="'.$url.'">'.$is_active_txt.$txt.$txt_add.'</a>';
        $r = '<a target="_blank" ' . $blank_txt . ' class="button3" style="font-size:1.0em" title="Konfigurations-Assistent f&uuml;r diese Box &ouml;ffnen" href="' . $url . '">Box bearbeiten ' . $wizard_icon13 . '</a>';

        return $r;
    } else {
        return '<a ' . $blank_txt . ' class="' . $class . '" style="font-size:0.9em;' . $is_active_style . $style . '" title="' . $title . '" href="' . $url . '">' . $force_txt . '</a>';

    }

}


function link_to_img_popup($image_url, $title = '', $caption = '', $icon_size = '', $pre_text = '', $style = 'margin-left: 6px;font-size:0.8em;color:#666', $class = 'button30')
{
    global $preview_img_icon, $preview_img_icon13, $preview_img_icon10;

    $this_preview_img_icon = $preview_img_icon;
    if ($icon_size == '13') $this_preview_img_icon = $preview_img_icon13;
    if ($icon_size == '10') $this_preview_img_icon = $preview_img_icon10;

    $l = '<span style="' . $style . '">' . $pre_text . ' 
<a href="' . $image_url . '" 
class="lightwindow ' . $class . '" title="' . $title . '" 
author="mydotter" caption="' . $caption . '">
' . $this_preview_img_icon . '</a>
</span>
';


    return $l;
}

function self_def_box_make_visible($box)
{
// = self_def_box_left1
    $is_visible = false;

    if (get_dv_bool($box . '_show_on_startpage')) $is_visible = true;
    if (get_dv_bool($box . '_show_on_all_product_pages')) $is_visible = true;
    if (get_dv_bool($box . '_show_on_categorie_pages')) $is_visible = true;
    if (get_dv_bool($box . '_show_on_every_page')) $is_visible = true;

    if (!$is_visible) {
        $sql = "update diverses set div_res = 1 where div_what = '" . $box . '_show_on_startpage' . "'  ";
        q($sql);
    }
}

function self_def_box_is_visible($box)
{
    $is_visible = false;
    if (get_dv_bool($box . '_show_on_startpage')) $is_visible = true;
    if (get_dv_bool($box . '_show_on_all_product_pages')) $is_visible = true;
    if (get_dv_bool($box . '_show_on_categorie_pages')) $is_visible = true;
    if (get_dv_bool($box . '_show_on_every_page')) $is_visible = true;
    return $is_visible;
}


function get_link_to_define_anypage($t_key)
{
    global $new_browser_window_icon, $popup_window_icon, $html_editor_icon;
    global $header_use;


    $sql = "select * from diverses where div_what = '" . $t_key . "' limit 1 ";
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $div_id = $row["div_id"];
        $div_what = $row["div_what"];
        $div_res = $row["div_res"];
        $div_res_long = $row["div_res_long"];
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
    }
    mysql_free_result($sql_result);

    $name = strip_tags(get_dv_t_key_txt($t_key . '_is_active'));

//zu self_def_page machen
    $sql = "update diverses set div_res = 'self_def_page' where div_what = '" . $t_key . "' ";
    q($sql);

//if ($t_key_txt='???' or $t_key_txt='' or eregiS('???',$t_key_txt)){
    $sql = "update diverses set t_key_txt = 'Inhalt der Seite bearbeiten' where div_what = '" . $t_key . "' ";
    q($sql);

//}

    if (is_dev()) {
//////////////////////////////
        $comment_txt = '
<div class="qedit_comment">
' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_comment') . '
</div>
<div class="qedit_comment" style="display:none">
' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_detail_link') . '
</div>
';
        if ($use_enh_editor) {
            $comment_txt .= '<div style="margin:0 6px 9px 0">' . get_enh_html_editor_by_t_key_link($t_key, 't_key_comment') . '</div>';
        }
/////////////////////////////
    } else {

        if ($t_key_comment <> '') {
            $comment_txt = '
<div class="qedit_comment">
' . parse_links($t_key_comment) . '
</div>
';
        } else {
            $comment_txt = '';
        }
    }
//if ($t_key_txt<>'') $t_key_txt = $t_key_txt.': ';

    $dev_link = get_dev_link($t_key);

    if ($t_key_detail_link <> '') {
        $detail_link_txt = '
<div class="qedit_linkdiv">
<a target="_blank" title="in neuem Browser-Fenster" href="' . $t_key_detail_link . '">' . $t_key_txt . ' <u>Details konfigurieren</u></a>
</div>
';
        $detail_link_txt2 = '
<div class="qedit_linkdiv" style="display:inline;margin-left:9px">
<a class="lightwindow" params="lightwindow_type=external"
title="Inline Popup" href="' . $t_key_detail_link . '?poppage=1">' . $t_key_txt . ' <u>Details konfigurieren</u> im PopUp-Fenster</a>
</div>
';
    } else {
        $detail_link_txt = '';
        $detail_link_txt2 = '';
    }

    if (is_dev()) {
//////////////////////////////
        $comment_txt = '
<div class="qedit_comment">
' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_comment') . '
</div>
<div class="qedit_comment" style="display:none">
' . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_detail_link') . '
</div>
';

        $comment_txt .= '<div style="margin:0 6px 9px 0">' . get_enh_html_editor_by_t_key_link($t_key, 't_key_comment') . '</div>';

/////////////////////////////
    } else {

        if ($t_key_comment <> '') {
            $comment_txt = '
<div class="qedit_comment">
' . parse_links($t_key_comment) . '
</div>
';
        } else {
            $comment_txt = '';
        }
    }

//$href='wrapper_all.php?incl=popup_edit_html.php?p='.$t_key.'&long=1&what='.$shop_l;
    $text = $html_editor_icon . ' <b>File-Editor</b>';
    $title = 'erweiterter File-Editor in Popup-Fenster ';
    $class = 'button1';
    $style = 'padding:5px 4px;font-size:1.3em';
    $width = '';
    $height = '';
    $type = 'il';
    /*
if ($type=='bb'){
//$href='popup_edit_html.php?p='.$t_key.'&long=1&what='.$shop_l;
}else{
//$href='help_2_adm.php?url=popup_edit_html.php?p='.$t_key.'&long=1&what='.$shop_l;
}
*/
    $href = 'define_anypage.php?pagekey=' . $t_key . '&pagename=' . $name . '&poppage=true';
    $link = make_link2($href, $text, $title, $class, $style, $width, $height, $type);

    $text = $html_editor_icon . ' <b>File-Editor</b>';
    $title = 'erweiterter File-Editor in neuem Fenster ';
    $class = 'button1';
    $style = 'padding:5px 4px;font-size:1.3em';
    $width = '';
    $height = '';
    $type = 'bb';

    $href = 'define_anypage.php?pagekey=' . $t_key . '&pagename=' . $name . '';
    $link2 = make_link2($href, $text, $title, $class, $style, $width, $height, $type);


    if (is_dev()) {
//////////////////////////////////
        if ($t_key_txt == '') set_t_key_txt_empty($t_key);
        $txt .= '<div class="qedit_outer" style="border: 6px #369 dotted"><span style="font-size:1.0em;font-weight:bold; color:#009;margin:1px;float:left;">
' . $item_no_txt . get_long_html1_editor_by_t_key_field_plain($t_key, 't_key_txt') . '</span><br>';
//////////////////////////////////

    } else {
        $txt .= '<div class="qedit_outer" style="border: 6px #369 dotted"><span style="font-size:1.0em;font-weight:bold; color:#009;margin:1px;float:left;">' . $t_key_txt . '</span><br>';
    }


    $txt .= '
<span style="margin:0 5px 0 0;float:right" class="onlydev">
' . get_dev_link($t_key) . '</span><br>
<div class="inline_edit_options"> 
File-Editor als PopUp (Schnell-Ansicht) ' . $link . ' oder in neuem Browser-Fenster ' . $link2 . ' &ouml;ffnen 
<br><br>

</div>';
    /*
<div class="content_tobeedited" >
<div id="tobeedited'. $t_key .'">
'.get_dv_l($t_key) .'</div>
';

$txt.='
<script>
new Ajax.InPlaceRichEditor($(\'tobeedited'. $t_key .'\'), \'ax_updater.php?id=170_'. $t_key .'\', {okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - max. 255 Zeichen\'}, tinymce_options);
</script>
';

$txt.='</div>';
*/
    $txt .= $comment_txt;
    $txt .= $detail_link_txt . $detail_link_txt2;
    $txt .= '</div>';

    return $txt;


}


function link_text($key)
{
    return get_dv($key . '_link_text');
}

function cmp($a, $b)
{
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}

function sdp_comments_activated($key)
{
    return get_dv_bool($key . '_allow_page_comments');
//return $key.'_sdp__allow_page_comments';
}

function sdp_comments_activated_txt($key)
{
    if (sdp_comments_activated($key)) return ' &#8226;&#8226;&#8226;';
}

function sdp_comments_activated_number()
{
    $sql = "select div_res_default, div_what, div_res  from diverses where div_res = 'self_def_page' and div_what like '%_sdp_%' and div_what not like 'default%' order by div_res ";
    $data_array = array();
    $data_array = QueryIntoArray($sql);
    $z = 0;
    for ($ii = 0; $ii < sizeof($data_array); $ii++) {
        $page = $data_array[$ii]['div_what'];
        if (get_dv_bool($page . '_is_active')) {
            if (sdp_comments_activated($page)) {
                $z++;
            }
        }
    }
    return $z;
}

function sdp_comments_activated_page_list()
{

    $sql = "select div_res_default, div_what, div_res  from diverses where div_res = 'self_def_page' and div_what like '%_sdp_%' and div_what not like 'default%' order by div_res ";
    $data_array = array();
    $data_array = QueryIntoArray($sql);
    $z = 0;
    for ($ii = 0; $ii < sizeof($data_array); $ii++) {
        $page = $data_array[$ii]['div_what'];
        if (get_dv_bool($page . '_is_active')) {
            if (sdp_comments_activated($page)) {
                $page_title = get_dv($page . '_link_text');;
                //$link_text = $data_array[$ii]['div_res_default'];
                $key = $page . '';
                $l .= '<div style="margin-left:12px">
				<a target="_blank" title="Editor in neuem Fenster &ouml;ffnen" href="define_anypage.php?pagekey=' . $page . '"><b>' . $page_title . '</b> </a> <span class="grey11" style="margin-left:9px">Anzahl Kommentare: ' . sdp_comments_number_page($key) . '</span>				
				</div>';
            }
        }
    }
    return $l;
}

function sdp_comments_number_total()
{
    $sql = "select * from page_comments";
    $res = q($sql);
    return mysql_num_rows($res);
}

function sdp_comments_number_total_not_approved()
{

    $sql = "select * from page_comments where is_approved<>1";
    $res = q($sql);
    return mysql_num_rows($res);

}

function sdp_comments_number_page($key)
{
    $sql = "select * from page_comments where page_id = '" . $key . "' ";
    $res = q($sql);
    return mysql_num_rows($res);

}


function get_self_def_pages_options($full_link = true, $curr_page = '')
{
//$sql="select div_what from diverses where div_res = 'self_def_page' and div_what like '%_sdp_%' order by div_what ";  
    $sql = "select div_res_default, div_what, div_res  from diverses where div_res = 'self_def_page' and div_what like '%_sdp_%' and div_what not like 'default%' order by div_res ";
    $data_array = array();
    $data_array = QueryIntoArray($sql);

//$res=q($sql); 
    //while ($row=mysql_fetch_array($res)){
    for ($ii = 0; $ii < sizeof($data_array); $ii++) {
        $page = $data_array[$ii]['div_what'];
        $link_text = get_dv($page . '_link_text');
        $data_array[$ii]['div_res_default'] = $link_text;
    }

    //$data_array1 = array();
    //$data_array1 = ksort ($data_array);
    usort($data_array, "cmp");

    for ($ii = 0; $ii < sizeof($data_array); $ii++) {
        //$page = $row["div_what"] $data_array[$ii]['div_what'];
        $page = $data_array[$ii]['div_what'];
        if ($curr_page == $page) {
            $selected = ' selected="selected" ';
        } else {
            $selected = '';
        }

        //$link_text = get_dv($page.'_link_text');
        $link_text = $data_array[$ii]['div_res_default'];
        /*
			if (!get_dv_bool($page.'_is_active')) {
			$c= ' class="inactive" ';
			}else{
			$c= '';
			}
			*/
        $c = this_is_inactive_loc($page . '_is_active', '');

        if ($full_link) {
            $opt .= '<option ' . $selected . ' ' . $c . ' value="define_anypage.php?pagekey=' . $page . '">' . $link_text . sdp_comments_activated_txt($page) . '</option>';
        } else {
            $opt .= '<option ' . $selected . ' ' . $c . ' value="' . $page . '">' . $link_text . sdp_comments_activated_txt($page) . '</option>';
        }
    }
    return $opt;
}


function get_self_def_pages_array()
{
//$sql="select div_what from diverses where div_res = 'self_def_page' and div_what like '%_sdp_%' order by div_what ";  
    $sql = "select div_res_default, div_what, div_res  from diverses where div_res = 'self_def_page' and div_what like '%_sdp_%' and div_what not like 'default%' order by div_res ";
    $data_array = array();
    $data_array = QueryIntoArray($sql);

//$res=q($sql); 
    //while ($row=mysql_fetch_array($res)){
    for ($ii = 0; $ii < sizeof($data_array); $ii++) {
        $page = $data_array[$ii]['div_what'];
        $link_text = get_dv($page . '_link_text');
        $data_array[$ii]['div_res_default'] = $link_text;
    }

    //$data_array1 = array();
    //$data_array1 = ksort ($data_array);
    usort($data_array, "cmp");


    return $data_array;
}

function get_self_def_pages_options2($full_link = true, $curr_page = '')
{
//$sql="select div_what from diverses where div_res = 'self_def_page' and div_what like '%_sdp_%' order by div_what ";  
    $sql = "select div_what from diverses where div_res = 'self_def_page' and div_what like '%_sdp_%' and div_what not like 'default%' order by div_what ";
    $res = q($sql);
    while ($row = mysql_fetch_array($res)) {
        $page = $row["div_what"];
        if ($curr_page == $page) {
            $selected = ' selected="selected" ';
        } else {
            $selected = '';
        }

        $link_text = get_dv($page . '_link_text');
        /*
			if (!get_dv_bool($page.'_is_active')) {
			$c= ' class="inactive" ';
			}else{
			$c= '';
			}
			*/
        $c = this_is_inactive_loc($page . '_is_active', '');

        if ($full_link) {
            $opt .= '<option ' . $selected . ' ' . $c . ' value="define_anypage.php?pagekey=' . $page . '">' . $link_text . '</option>';
        } else {
            $opt .= '<option ' . $selected . ' ' . $c . ' value="' . $page . '">' . $link_text . '</option>';
        }
    }
    mysql_free_result($res);
    return $opt;
}

function get_self_def_pages_links()
{
    global $external_icon;
    /* 
<div class="conf_lv2"><?php echo is_active_icon('link_list_sdp__is_active')  ?><a target="_blank" title="Assistent f�r editierbare Seiten �ffnen" class="conf_lv2" href="define_anypage.php?pagekey=link_list_sdp_">Unsere Linkliste <?php echo $external_icon  ?></a></div>
*/

    $sql = "select div_what from diverses where div_res = 'self_def_page' and div_what like '%_sdp_%' order by div_id ";
    $res = q($sql);
    while ($row = mysql_fetch_array($res)) {
        $page = $row["div_what"];
        $link_text = get_dv($page . '_link_text');

        if (!get_dv_bool($page . '_is_active')) {
            $c = ' class="inactive" ';
        } else {
            $c = '';
        }


        $this_key = $page . '_is_active';

        $is_active_icon = is_active_icon_link($this_key);
        $is_inactive_icon = $is_active_icon;

        //$opt.='<option '.$c.' value="define_anypage.php?pagekey='.$page.'">'.$link_text.'</option>';
        $l .= '<div class="conf_lv2">';
        //$l .= is_active_icon($page.'_is_active');		
        $l .= '<a target="_blank" title="Assistent f�r editierbare Seiten �ffnen" class="conf_lv2" href="define_anypage.php?pagekey=' . $page . '">' . $link_text . ' ' . $external_icon . '</a>';
        $l .= $is_active_icon;
        $l .= '</div>';
    }
    mysql_free_result($res);
    return $l;
}


function get_self_def_pages_links2()
{
    global $external_icon;
    /* 
<div class="conf_lv2"><?php echo is_active_icon('link_list_sdp__is_active')  ?><a target="_blank" title="Assistent f�r editierbare Seiten �ffnen" class="conf_lv2" href="define_anypage.php?pagekey=link_list_sdp_">Unsere Linkliste <?php echo $external_icon  ?></a></div>
*/

//$sql="select div_what from diverses where div_res = 'self_def_page' and div_what like '%_sdp_%' order by div_id ";
    $sql = "select div_what from diverses where div_res = 'self_def_page' and div_what like '%_sdp_%' and div_what not like 'default%' order by div_what ";
    $res = q($sql);
    while ($row = mysql_fetch_array($res)) {
        $page = $row["div_what"];
        $link_text = get_dv($page . '_link_text');

        if (!get_dv_bool($page . '_is_active')) {
            $c = ' class="inactive" ';
            $st = 'color:#666; text-decoration:line-through';
        } else {
            $c = '';
            $st = '';
        }


        $this_key = $page . '_is_active';

        //$is_active_icon = is_active_icon_link($this_key);
        $is_inactive_icon = is_active_icon_link($this_key, true, false, true, '0.8', true);

        //$opt.='<option '.$c.' value="define_anypage.php?pagekey='.$page.'">'.$link_text.'</option>';
        $l .= '<div style="margin:2px 2px 4px 2px;font-size:0.8em;padding:2px;border: 1px #ccc solid">';
        $l .= '<span style="' . $st . '">' . $link_text . '</span>';

        $l .= ' ' . $is_inactive_icon;
        $l .= '<div style="margin:0"><a target="_blank" title="neues Fenster" class="button99" href="define_anypage.php?pagekey=' . $page . '">Seite bearbeiten</a>';

        $l .= '</div></div>';
    }
    mysql_free_result($res);
    return $l;
}

function get_ip()
{
    if (getenv(HTTP_X_FORWARDED_FOR)) {
        $ip = getenv(HTTP_X_FORWARDED_FOR);
    } else {
        $ip = getenv(REMOTE_ADDR);
    }
    return $ip;
}

function get_ip1()
{

    $ip = getenv(REMOTE_ADDR);

    return $ip;
}

/*function create_index_if_not_exists($table, $index_field)
{
    $sql = " SHOW KEYS FROM " . $table . " where Column_name = '" . $index_field . "' ";

    if (!has_rows($sql)) {
        $sql = "ALTER TABLE `" . $table . "` ADD INDEX `" . $index_field . "` ( `" . $index_field . "` ) ";
        q($sql);
    }
}*/

/*function check_index_if_exists($table, $index_field)
{
    $sql = " SHOW KEYS FROM " . $table . " where Column_name = '" . $index_field . "' ";

    if (has_rows($sql)) {
        return true;
    } else {
        return false;
    }
}*/

function create_copy_diverses()
{

    $sql = "drop table if exists `diverses_transfer` ";
    q($sql);

    $sql = "

 CREATE  TABLE  `diverses_transfer` (  `div_id` int( 11  )  NOT  NULL  auto_increment ,
 `div_what` varchar( 100  )  NOT  NULL ,
 `div_res` varchar( 255  )  NOT  NULL ,
 `div_res_long` longtext character  set utf8 collate utf8_unicode_ci NOT  NULL ,
 `div_res_default` varchar( 255  )  NOT  NULL ,
 `div_res_long_default` longtext NOT  NULL ,
 `nr` varchar( 12  )  NOT  NULL ,
 `context` varchar( 255  )  NOT  NULL ,
 `funktion` varchar( 255  )  NOT  NULL ,
 `bemerkung` varchar( 255  )  NOT  NULL ,
 `bemerkung_long` longtext NOT  NULL ,
 `app_top` tinyint( 1  )  NOT  NULL default  '0',
 `rel1` varchar( 60  )  NOT  NULL ,
 `rel2` varchar( 60  )  NOT  NULL ,
 `modul` varchar( 60  )  NOT  NULL ,
 `key_type` varchar( 60  )  NOT  NULL ,
 `t_key_comment` longtext NOT  NULL ,
 `t_key_detail_link` varchar( 255  )  NOT  NULL ,
 `t_key_txt` varchar( 255  )  NOT  NULL ,
 `last_modi` timestamp NOT  NULL  default CURRENT_TIMESTAMP ,
 PRIMARY  KEY (  `div_id`  ) ,
 KEY  `div_what` (  `div_what`  ) ,
 KEY  `key_txt` (  `t_key_txt`  ) ,
 KEY  `div_res` (  `div_res`  )  ) ENGINE  =  MyISAM  DEFAULT CHARSET  = utf8;

";
    q($sql);

    $sql = "INSERT INTO `diverses_transfer` SELECT * FROM `diverses`;";
    q($sql);


    return true;
}


function create_siko_diverses($with_index = false)
{
    $timestamp = date("Y_m_d"); //einmal am Tag //spater: alle l�schen die �lter sind als 30 Tage  in install_create_tables
    $sql = "create table if not exists `diverses_siko_" . $timestamp . "` SELECT * FROM `diverses`;";
    q($sql);
    return true;
}


function create_backup_file($table = 'diverses_transfer')
{

    $tableName = $table;
    $backupFile = DIR_FS_CATALOG . 'data_transfer/' . $table . '.sql';
    $query = "SELECT * INTO OUTFILE '" . $backupFile . "' FROM " . $tableName . " ";
//ec($query);

//$result = mysql_query($query);
    return true;
}

function create_backup_file_system($table = 'diverses_transfer')
{
    /*
$tableName  = $table;
$backupFile = DIR_FS_CATALOG.'data_transfer/'.$table.'.sql';
$query      = "SELECT * INTO OUTFILE '".$backupFile."' FROM ".$tableName." ";

$result = mysql_query($query);
  define('DB_SERVER', 'p50mysql275.secureserver.net'); // eg, localhost - should not be empty for productive servers

  define('DB_SERVER_USERNAME', 'mh_DEV');

  define('DB_SERVER_PASSWORD', 'foafzu93476P');

  define('DB_DATABASE', DB_SERVER_USERNAME);
*/

//$backupFile = DIR_FS_CATALOG.'data_transfer/'.$table . date("Y-m-d-H-i-s")  . '.gz';
    $backupFile = DIR_FS_CATALOG . 'data_transfer/' . $table . '.gz';
    $to_backup = '  ';

//$command = "mysqldump --opt -h $dbhost -u $dbuser -p $dbpass $dbname | gzip > $backupFile";
//$command = "mysqldump --opt -h ".DB_SERVER." -u ".DB_SERVER_USERNAME." -p ".DB_SERVER_PASSWORD." ".DB_DATABASE." | gzip > $backupFile";
    $command = "mysqldump --opt -h " . DB_SERVER . " -u " . DB_SERVER_USERNAME . " -p " . DB_SERVER_PASSWORD . " " . DB_DATABASE . " | gzip > $backupFile";
    system($command);

    return true;
}


function echo_files_in_folder($folder)
{
// mögliche types: pdf img
//$folder = "../myuploads/img_top_background/";
    $dossier = opendir($folder);
    while ($file = readdir($dossier)) {
        if ($file != "." && $file != ".." && $file != "Thumbs.db") {
//    if(is_dir($file)) { // Do not always works
            if (!is_dir($folder . "/" . $file)) { // Works always
                if (get_ext($file) == 'jpg' or get_ext($file) == 'gif' or get_ext($file) == 'png') {
                    ec("$file");
                }
            } // fin if is file
        } // fin if restriction des fichiers à ne pas afficher
    } // fin while
    closedir($dossier);
}


function get_images_in_folder($folder)
{
    $dossier = opendir($folder);
    while ($file = readdir($dossier)) {
        if ($file != "." && $file != ".." && $file != "Thumbs.db") {
            if (!is_dir($folder . "/" . $file)) { // Works always
                if (get_ext($file) == 'jpg' or get_ext($file) == 'gif' or get_ext($file) == 'png') {
                    $r .= $file . ',';
                }
            }
        }
    }
    closedir($dossier);

    if (right($r, 1) == ',') $r = substr($r, 0, -1);

    return $r;
}

///* hslide/vslide/fade */
function construct_img_slider_get_max_size_style_block($fs_folder, $div_id, $transition = 'fade')
{
    /*
<script type="text/javascript" src="../js_jq/jquery.aw-showcase.1.1.1/jquery.aw-showcase/jquery.aw-showcase.min.js"></script>
*/
    $ws_folder = DIR_WS_FULL . str_replace(DIR_FS_DOCUMENT_ROOT, '', $fs_folder);
    $max_w = 0;
    $max_h = 0;

    $img_str = get_images_in_folder($fs_folder);
    $img_array = explode(',', $img_str);

    for ($i = 0; $i < sizeof($img_array); $i++) {
        $image_size = @getimagesize($ws_folder . $img_array[$i]);
        $max_w = max($image_size[0], $max_w);
        $max_h = max($image_size[1], $max_h);
    }

//if ($what==0) return $max_w;	
//if ($what==1) return $max_h;	

    $r .= '
<script type="text/javascript">

$j(document).ready(function()
{
	$j("#' . $div_id . '").awShowcase(
	{
		content_width:			' . $max_w . ',
		content_height:			' . $max_h . ',
		fit_to_parent:			false,
		auto:					true,
		interval:				5000,
		continuous:				true,
		loading:				true,
		tooltip_width:			200,
		tooltip_icon_width:		32,
		tooltip_icon_height:	32,
		tooltip_offsetx:		18,
		tooltip_offsety:		0,
		arrows:					false,
		buttons:				false,
		btn_numbers:			false,
		keybord_keys:			true,
		mousetrace:				false, /* Trace x and y coordinates for the mouse */
		pauseonover:			true,
		stoponclick:			false,
		transition:				\'' . $transition . '\', /* hslide/vslide/fade */
		transition_delay:		200,
		transition_speed:		1500,
		show_caption:			\'onload\', /* onload/onhover/show */
		thumbnails:				false,
		thumbnails_position:	\'outside-last\', /* outside-last/outside-first/inside-last/inside-first */
		thumbnails_direction:	\'vertical\', /* vertical/horizontal */
		thumbnails_slidex:		1, /* 0 = auto / 1 = slide one thumbnail / 2 = slide two thumbnails / etc. */
		dynamic_height:			false, /* For dynamic height to work in webkit you need to set the width and height of images in the source. Usually works to only set the dimension of the first slide in the showcase. */
		speed_change:			true, /* Set to true to prevent users from swithing more then one slide at once. */
		viewline:				false, /* If set to true content_width, thumbnails, transition and dynamic_height will be disabled. As for dynamic height you need to set the width and height of images in the source. */
		custom_function:		null /* Define a custom function that runs on content change */
	});
});

</script>';


    $r .= '
<style>	
.showcase-content-wrapper{
	height: ' . $max_h . 'px;
	width: ' . $max_w . 'px;
}
</style>
';

    return $r;
}


function construct_img_slider($fs_folder, $div_id, $transition = 'fade')
{
    /*
<script type="text/javascript" src="../js_jq/jquery.aw-showcase.1.1.1/jquery.aw-showcase/jquery.aw-showcase.min.js"></script>
*/
    $ws_folder = DIR_WS_FULL . str_replace(DIR_FS_DOCUMENT_ROOT, '', $fs_folder);

    $r .= construct_img_slider_get_max_size_style_block($fs_folder, $div_id, $transition);

    $r .= '<div id="' . $div_id . '" class="showcase" style="">';


    $img_str = get_images_in_folder($fs_folder);
    $img_array = explode(',', $img_str);
    sort($img_array);
    for ($i = 0; $i < sizeof($img_array); $i++) {
        $r .= '<div class="showcase-slide">';
        $r .= '<div class="showcase-content">';
        $r .= '<img src="' . $ws_folder . $img_array[$i] . '" alt="0' . $i . '" />';
        $r .= '</div>';

        //$r .= '<div class="showcase-caption">'.$img_array[$i].'</div>';	

        $r .= '</div>';
    }

    $r .= '</div>';
    return $r;
}


function construct_img_slider_CYCLE($fs_folder, $div_id, $transition = 'fade', $easing = 'easeOutCirc', $slider_background = '#000', $use_href_for_img = false, $this_href = '')
{
    /*
<script type="text/javascript" src="../js/slider_cycle/full_c.js" charset="ISO-8859-1"></script> 
http://www.malsup.com/jquery/cycle/faq.html

        blindX
        blindY
        blindZ
        cover
        curtainX
        curtainY
        fade
        fadeZoom
        growX
        growY
        scrollUp
        scrollDown
        scrollLeft
        scrollRight
        scrollHorz
        scrollVert
        shuffle
        slideX
        slideY
        toss
        turnUp
        turnDown
        turnLeft
        turnRight
        uncover
        wipe
        zoom
*/

    $r .= '
<script type="text/javascript">
$j(document).ready(function() {
    $j(\'#' . $div_id . '\').cycle({
		fx: \'' . $transition . '\',
		pause: 1,
		speedIn: 1500,
		speedOut: 1800,
		delay: -1000,
		timeout: 4000,
		easing: \'' . $easing . '\' 
	});
});
</script>';


    $ws_folder = DIR_WS_FULL . str_replace(DIR_FS_DOCUMENT_ROOT, '', $fs_folder);

//$r .= construct_img_slider_get_max_size_style_block_CYCLE($fs_folder,$div_id,$transition); 
    $max_w = 0;
    $max_h = 0;

    $img_str = get_images_in_folder($fs_folder);
    $img_array = explode(',', $img_str);

    for ($i = 0; $i < sizeof($img_array); $i++) {
        $image_size = @getimagesize($ws_folder . $img_array[$i]);
        $max_w = max($image_size[0], $max_w);
        $max_h = max($image_size[1], $max_h);
    }

    $r .= '<style>
#' . $div_id . ' { height: ' . $max_h . 'px; overflow:hidden } 
</style>';

    $r .= '<div id="' . $div_id . '" class="cycle_slideshow" style="background:' . $slider_background . ';">';


    $img_str = get_images_in_folder($fs_folder);
    $img_array = explode(',', $img_str);
    sort($img_array);
    for ($i = 0; $i < sizeof($img_array); $i++) {
        //$r .= '<div class="showcase-slide">';
        if ($use_href_for_img) $r .= $this_href;
        $image_size = @getimagesize($ws_folder . $img_array[$i]);
        $size_str = $image_size[3];
        $this_class = '';
        if ($i == 0) $this_class = ' class="first" ';
        $r .= '<img ' . $this_class . ' src="' . $ws_folder . $img_array[$i] . '" ' . $size_str . '  />';
        if ($use_href_for_img) $r .= '</a>';
        //$r .= '</div>';	

        //$r .= '<div class="showcase-caption">'.$img_array[$i].'</div>';	

        //$r .= '</div>';		
    }

    $r .= '</div>';
    return $r;
}

/*
function number_files_in_folder_by_ext($folder,$ext=''){
	if ( is_dir($folder) ){

			$dossier = opendir($folder);
			while ($file = readdir($dossier)) {
			  if ($file != "." && $file != ".." && $file != "Thumbs.db") {

				 if(!is_dir($folder."/".$file)) { // Works always
							if ($ext==''){
								$i++;
							}else{
								if (get_ext($file)==$ext){
								$i++;
								}
							}
				 } // fin if is file

			  } // fin if restriction des fichiers à ne pas afficher
			} // fin while
			closedir($dossier);
			return $i;
	}else{
			return 0;
	}
}
*/

function number_files_in_folder_img($folder)
{
    if (is_dir($folder)) {
        $dossier = opendir($folder);
        while ($file = readdir($dossier)) {
            if ($file != "." && $file != ".." && $file != "Thumbs.db") {
//    if(is_dir($file)) { // Do not always works
                if (!is_dir($folder . "/" . $file)) { // Works always
                    if (get_ext($file) == 'jpg' or get_ext($file) == 'gif' or get_ext($file) == 'png') {
                        //ec("$file");
                        $i++;
                    }
                } // fin if is file
            } // fin if restriction des fichiers à ne pas afficher
        } // fin while
        closedir($dossier);

        return $i;
    } else {
        return 0;
    }
}

// wenn nur eines
function name_file_in_folder_img($folder)
{
    if (is_dir($folder)) {
        $dossier = opendir($folder);
        while ($file = readdir($dossier)) {
            if ($file != "." && $file != ".." && $file != "Thumbs.db") {
//    if(is_dir($file)) { // Do not always works
                if (!is_dir($folder . "/" . $file)) { // Works always
                    if (get_ext($file) == 'jpg' or get_ext($file) == 'gif' or get_ext($file) == 'png') {
                        //ec("$file");
                        $name = $file;
                        $i++;
                    }
                } // fin if is file
            } // fin if restriction des fichiers à ne pas afficher
        } // fin while
        closedir($dossier);

        return $name;
    } else {
        return 0;
    }
}


function filesize_in_kb($file)
{
    $x = filesize($file);
    $x = $x / 1024;
    return nuf(round($x, 0)) . ' KB';
}

function filesize_in_kb_mb($file)
{
    $file = DIR_FS_CATALOG . '' . $file;

    if (file_exists($file)) {
        $x = filesize($file);
        $x = $x / 1024;

        if ($x < 1000) {

            return nuf(round($x, 0)) . ' KB';
        } else {
            return nuf(round($x / 1000, 1)) . ' MB';
        }
    } else {
        return 'file not found!';
    }

}

function active_in_table_field($table, $field, $id_field, $id, $allow_two = false)
{
    $res = lookup("select " . $field . " from " . $table . " where " . $id_field . "='" . $id . "'", $field);
    if ($res == "1") {
        return '<span class="green">ja</span>';
    } else {
        if ($allow_two) {
            if ($res == "2") {
                return '<span class="green">ja</span>';
            }
        } else {
            return '<span class="red">nein</span>';
        }
    }
}

function val_in_table_field($table, $field, $id_field, $id, $where = '')
{
    if ($where == '') {
        return lookup("select " . $field . " from " . $table . " where " . $id_field . "='" . $id . "'", $field);
    } else {
        return lookup("select " . $field . " from " . $table . " where " . $id_field . "='" . $id . "' and " . $where . " ", $field);
    }

}


function get_checkbox_any_table($id, $table, $field, $id_field, $class = 'qedit_outer', $style = '', $show_field_name = false, $margin_r = 12, $allow_two = false, $show_ja_nein = true, $show_hide_element_id = '', $show_if_checked = true, $show_label = true)
{

    $ident = $table . $field . $id_field . $id;
    $curr_val = val_in_table_field($table, $field, $id_field, $id);

    $x = '<div class="' . $class . '" style="' . $style . '">';


    if ($show_ja_nein) {
        $x .= '<span id="conf_' . $ident . '" class="ax_result" style="margin-right:' . $margin_r . 'px">';
        $x .= active_in_table_field($table, $field, $id_field, $id, $allow_two);
        $x .= '</span>';
    }

    if ($show_label) $x .= '<label class="pc_checkbox round6 shade3" style="margin:0 3px;border:1px #999 solid;background-color:#fff" title=\'zum &auml;ndern klicken\'>';

    if ($show_hide_element_id == '') {
        $x .= '<input onclick="checkbox_to_any_table(this.checked, this.id,\'' . $table . '\',\'' . $field . '\',\'' . $id_field . '\',\'' . $id . '\');" ';
    } else {
        $x .= '<input onclick="checkbox_to_any_table_show_hide(this.checked, this.id,\'' . $table . '\',\'' . $field . '\',\'' . $id_field . '\',\'' . $id . '\',\'' . $show_hide_element_id . '\');" ';
    }


    $x .= 'type="checkbox" id="' . $ident . '" value="1"';

    if ($curr_val == 1 or ($curr_val == 2 and $allow_two)) {
        $x .= '
 checked="checked"/>';
    }

    if ($show_label) $x .= '</label>';


    if (is_dev() and $show_field_name) {
        $x .= '<span style="margin:0 0 0 9px" class="onlydev">' . $table . '/' . $field . '/' . $id . '</span>';
    }

    $x .= '
</span>	
</div>		
';

    return $x;
}


function TextBetweenArray($s1, $s2, $s)
{
    $myarray = array();
    $s1 = strtolower($s1);
    $s2 = strtolower($s2);
    $L1 = strlen($s1);
    $L2 = strlen($s2);
    $scheck = strtolower($s);
    do {
        $pos1 = strpos($scheck, $s1);
        if ($pos1 !== false) {
            $pos2 = strpos(substr($scheck, $pos1 + $L1), $s2);
            if ($pos2 !== false) {
                $myarray[] = substr($s, $pos1 + $L1, $pos2);
                $s = substr($s, $pos1 + $L1 + $pos2 + $L2);
                $scheck = strtolower($s);
            }
        }
    } while (($pos1 !== false) and ($pos2 !== false));
    return $myarray;
}

function TextBetween($s1, $s2, $s)
{
    $s1 = strtolower($s1);
    $s2 = strtolower($s2);
    $L1 = strlen($s1);
    $scheck = strtolower($s);
    if ($L1 > 0) {
        $pos1 = strpos($scheck, $s1);
    } else {
        $pos1 = 0;
    }
    if ($pos1 !== false) {
        if ($s2 == '') return substr($s, $pos1 + $L1);
        $pos2 = strpos(substr($scheck, $pos1 + $L1), $s2);
        if ($pos2 !== false) return substr($s, $pos1 + $L1, $pos2);
    }
    return '';
}


function flush_1()
{
    echo(str_repeat(' ', 256));
    // check that buffer is actually set before flushing
    if (ob_get_length()) {
        @ob_flush();
        @flush();
        @ob_end_flush();
    }
    @ob_start();
}


function get_orders_status_from_orders($orders_id)
{
    $sql = "select orders_status from orders where orders_id = '" . $orders_id . "' ";
    return lookup($sql, 'orders_status');
}


function get_payment_method_from_orders($orders_id)
{
    $sql = "select payment_method from orders where orders_id = '" . $orders_id . "' ";
    return lookup($sql, 'payment_method');
}

function get_payment_class_from_orders($orders_id)
{
    $sql = "select payment_class from orders where orders_id = '" . $orders_id . "' ";
    return lookup($sql, 'payment_class');
}

function get_shipping_method_from_orders($orders_id)
{
    $sql = "select shipping_method from orders where orders_id = '" . $orders_id . "' ";
    return lookup($sql, 'shipping_method');
}

function get_shipping_class_from_orders($orders_id)
{
    $sql = "select shipping_class from orders where orders_id = '" . $orders_id . "' ";
    return lookup($sql, 'shipping_class');
}

// Aufruf nur �ber ipn.php (PayPal) !
function email_order_confirmation(
    $customers_id,
    $address_label_delivery,
    $address_label_billing,
    $insert_id,
    $products_ordered,
    $email_order_summe,
    $email_order_comments,
    $zlgsart,
    $debug_txt = '',
    $paypal = false,
    $new_couponcode,
    $ec_days

)
{
//emails
///////////////////////////////////////////////////////////
    global $ec_auto, $catalog_url;
    global $at_is_larrangement, $at_larrangement_pdf_folder;
    global $at_is_gay_shop, $at_use_packing;
    if ($at_is_gay_shop) global $at_banana_discount_value, $at_banana_discount, $at_all_bananas, $currencies, $at_lieferart;
/////////////////////////////////////////////////////////// 
    $orders_id = $insert_id;

    $order = new order($orders_id);

//$debug_txt.='Sprache bei Bestellung: '.get_customers_lang_long($customers_id);
    for ($i = 0, $n = sizeof($order->products); $i < $n; $i++) {
//$debug_txt.='<br> (' . $order->products[$i]['model'] . ')';

    }

    if ($paypal) {
        $zlgsart = 'PayPal';
    } else {
        $zlgsart = get_payment_method_from_orders($orders_id);
    }

//$zlgsart='PayPal';

//$lieferart= 'Post/UPS';
    $lieferart = $at_lieferart;

    $payment_class = get_payment_class_from_orders($orders_id);
    $shipping_method = get_shipping_method_from_orders($orders_id);
    $shipping_class = get_shipping_class_from_orders($orders_id);


    $lang = trim($_SESSION["language"]);

    $this_lang_id = lang_id_from_lang($lang);
    set_default_lang($customer_id, $this_lang_id);

    $this_template = get_email_vorlage('email_order_confirm_kunde.htm', $lang);
    $this_template = make_all_replacements($this_template, $lang); //replace allgemeine eintragungen wie shop-url uns styles

//$firstname=$order->customer['firstname'];
    $firstname = customers_firstname_by_customers_id($customers_id);
//$lastname=$order->customer['lastname'];
    $lastname = customers_lastname_by_customers_id($customers_id);
//$ToEmail=$order->customer['email_address']; 
    $ToEmail = customers_email_by_customers_id($customers_id);

    $customers_telephone = get_customers_telephone($customers_id);

//$Subject = get_order_conf_email_subject($lang).' (PayPal)';  // ??? pr�fen
//$Subject = make_all_replacements($Subject , $lang);

//$Subject = 'Ihre Bestellung via PayPal';

    $this_template = str_replace('#anrede#', '', $this_template);
    $this_template = str_replace('#customer_firstname#', $firstname, $this_template);
    $this_template = str_replace('#customer_lastname#', $lastname, $this_template);
//spezifisch this block
    $this_template = str_replace('#adress_label_delivery#', $address_label_delivery, $this_template);
    $this_template = str_replace('#adress_label_invoice#', $address_label_billing, $this_template);
    $this_template = str_replace('#customer_telefon#', $customers_telephone, $this_template);
    $this_template = str_replace('#customer_email#', $ToEmail, $this_template);
    $this_template = str_replace('#order_nr#', $orders_id, $this_template);
    $this_template = str_replace('#order_history_link#', $catalog_url . '/' . tep_href_link(FILENAME_ACCOUNT_HISTORY_INFO, 'order_id=' . $insert_id, 'SSL', false), $this_template);
    $this_template = str_replace('#order_date#', strftime(DATE_FORMAT_LONG), $this_template);
    $this_template = str_replace('#order_time#', strftime('%H:%M'), $this_template);
    $this_template = str_replace('#order_products#', nl2br($products_ordered), $this_template);

    if ($at_is_gay_shop and $at_banana_discount_value > 0) {
        $email_order_summe .= '<br>' . get_dv('bonuscard_header_text') . ': <span style="color:#a22">-' . $at_banana_discount . '</span>';
        $email_order_summe .= '<br>' . COUT_CONF_END_SUMME_TXT . ': ' . $currencies->display_price($endsum_after, 0, 1) . '<br>';
    }

    $this_template = str_replace('#order_summe#', nl2br($email_order_summe), $this_template);

//$email_order_comments .= '<br>Zahlungsart: '.$zlgsart;
//$email_order_comments .= '<br>Customers ID: '.$customer_id; 
    if ($debug_txt <> '') {
        $email_order_comments = $debug_txt . '<br><hr><br>' . $email_order_comments;
    }

    $add_txt = '';
    if ($at_use_packing) {
        if ($_SESSION['packing'] == 1) {
            //$add_txt = 'DVD oder BLU-RAY <strong>mit Originalh&uuml;llen</strong>';
            $add_txt = DVD_OR_BLUERAY . ' <strong>' . DVD_OR_BLUERAY_WITH_ORI_COVER . '</strong>';

        }

        if ($_SESSION['packing'] == 2) {
            /*
		$add_txt = 'DVD oder BLU-RAY <strong>ohne Originalh&uuml;llen</strong>
		<div style="font-size:0.9em;margin:5px 0 0 6px">
		<strong>Vorteil:</strong> Kleineres Paket, briefkastentauglich, schnellerer Versand
		</div>';
		*/
            $add_txt = DVD_OR_BLUERAY . ' <strong>' . DVD_OR_BLUERAY_WITHOUT_ORI_COVER . '</strong>
		<div style="font-size:0.9em;margin:5px 0 0 6px">
		<strong>' . DVD_OR_BLUERAY_ADVANTAGE . ':</strong> ' . DVD_OR_BLUERAY_ADVANTAGE_1 . '
		</div>';

        }

        if ($_SESSION['packing'] == 3) {
            $add_txt = DVD_OR_BLUERAY . ' <strong>' . DVD_OR_BLUERAY_WITHOUT_BOX_BUT_WITH_COVER . '</strong>
		<div style="font-size:0.9em;margin:5px 0 0 6px">
		<strong>' . DVD_OR_BLUERAY_ADVANTAGE . ':</strong> ' . DVD_OR_BLUERAY_ADVANTAGE_1 . '
		</div>';

        }
        $add_txt = '<br><br>' . $add_txt;
    }

    $this_template = str_replace('#order_comments#', $email_order_comments . $add_txt, $this_template);

    $this_template = str_replace('#payment_class#', $zlgsart, $this_template);


    $this_template = str_replace('#delivery_class#', $lieferart, $this_template);
    $this_template = str_replace('#customer_ip#', $_SERVER['REMOTE_ADDR'], $this_template);

    if (get_dv_bool('email_werbung_block_show')) {
        $this_template = str_replace('##email_werbung_block##', get_text_block('email_werbung_block.htm', $lang), $this_template); // todo long
    } else {
        $this_template = str_replace('##email_werbung_block##', '', $this_template);
    }

    if (get_dv_bool('outgoing_emails_show_open_time')) {

        $lang_code = lookup('select code from languages where directory = "' . $lang . '" ', 'code');
        $open_time_content_str = get_dv_long_lang2_or_german('open_time_content', $lang_code);
        //$open_time_content = '<div style="padding:3px 12px;border:1px #ccc solid;background:#eee;font-size:10px;margin:10px 16px;color:#333">'.get_dv_l('open_time_content').'</div>';
        $open_time_content = '<div style="padding:3px 12px;border:1px #ccc solid;background:#eee;font-size:10px;margin:10px 16px;color:#333">' . $open_time_content_str . '</div>';
        $this_template = str_replace('##opentime##', $open_time_content, $this_template);

        //$open_time_content = '<div style="padding:3px 12px;border:1px #ccc solid;background:#eee;font-size:10px;margin:10px 16px;color:#333">'.get_dv_l('open_time_content').'</div>';
        //$this_template = str_replace('##opentime##', $open_time_content, $this_template); 
    } else {
        $this_template = str_replace('##opentime##', '', $this_template);
    }

// keine Bankverbindung wenn nicht Voraus-Zahlung     payment_method 
    /*
if (trim(get_payment_class($insert_id))=='cash'  or $zlgsart=='PayPal' or trim(get_payment_class($insert_id))=='cod' ){
	$this_template = str_replace('##email_bankverbindung_block##','',$this_template);
}else{
// ##email_bankverbindung_block##
	$block_htm = 'email_bankverbindung_block.htm';		
	$this_block = get_text_block($block_htm,$lang);
	$this_template = str_replace('##email_bankverbindung_block##',$this_block,$this_template);
}
*/
    if (trim(get_payment_class($insert_id)) == 'moneyorder') {
        // ##email_bankverbindung_block##
        $block_htm = 'email_bankverbindung_block.htm';
        $this_block = get_text_block($block_htm, $lang);
        $this_template = str_replace('##email_bankverbindung_block##', $this_block, $this_template);
        $this_template = str_replace('#order_nr#', $orders_id, $this_template);

    } else {
        $this_template = str_replace('##email_bankverbindung_block##', '', $this_template);
    }


    $this_template = str_replace('#order_nr#', $orders_id, $this_template);


///////////////////////////////////////////////////////////
    if (easy_coupon_active() == 1 and get_dv_bool('easy_coupons_print_in_email')) {

// ##email_couponcode_block##
        /*
$value = valid_coupon_code($customer_id,'discount');
$type = valid_coupon_code($customer_id,'type');
if ($type=='p'){
	$value = round($value,0);
	$type_str=$value.'%';
}else{
	$type_str=$currencies->display_price($value,'');
}
*/
        $value = easy_coupons_settings('wieviel');
        $type = easy_coupons_settings('type');
        if ($type <> '%') {
            $value = $currencies->display_price($value, '');
        }
        $type_str = $value . ' ' . $type;


//$end_date = valid_coupon_code($customer_id,'end_date');
        $anz_tage = easy_coupons_settings('days');
        $end_date = strtotime('now + ' . $anz_tage . ' days  ');
        $end_date_wt = date("Y-m-d", $end_date);
        $wtag = wochentag($end_date_wt);
        $end_date = $wtag . ', ' . date("d.m.Y", $end_date);


        $block_htm = 'email_couponcode_block.htm';
        $this_block = get_text_block($block_htm, $lang);
        $this_template = str_replace('##email_couponcode_block##', $this_block, $this_template);

        $this_template = str_replace('#rabatt#', $type_str, $this_template);
        $this_template = str_replace('#end_date#', $end_date, $this_template);

        $this_template = str_replace('#new_coupon_code#', $new_couponcode, $this_template);
        $this_template = str_replace('#new_coupon_valid_from#', strftime(DATE_FORMAT_SHORT), $this_template);
        $this_template = str_replace('#new_coupon_valid_for_days#', $ec_days, $this_template);
    } else {
        $this_template = str_replace('##email_couponcode_block##', '', $this_template);
    }
//////////////////////

// ##email_werbung_block##
    if (get_dv_bool('email_werbung_block_show')) {
        $block_htm = 'email_werbung_block.htm';
        $this_block = get_text_block($block_htm, $lang);
        $this_template = str_replace('#email_werbung_block#', $this_block, $this_template);
    }

//////////////////////////////////
    if ($at_is_larrangement) {
//$temp_folder_name='cpdf/'.md5(customers_email_by_c_id($customers_id)); //email to md5 + password //customers_password_by_id
//$temp_folder_name.= customers_password_by_id($customers_id).'__'.time();

        $temp_folder_name = 'cpdf/' . $customers_id . customers_password_by_id($customers_id); //email to md5 + password //customers_password_by_id
        $temp_folder_name .= '__' . time() . '/';


        $order_lang = get_customers_lang_long($customers_id); // in checkout_confirmation.php gesetzt

//DIR_FS_CATALOG  DIR_WS_FULL
        if (!is_dir(DIR_FS_CATALOG . $temp_folder_name)) mkdir(DIR_FS_CATALOG . $temp_folder_name, 0777, true);
        for ($i = 0, $n = sizeof($order->products); $i < $n; $i++) {
            $add_pdf = $at_larrangement_pdf_folder . '/' . $order_lang . '/' . trim($order->products[$i]['model']) . '.pdf';

            if (file_exists(DIR_FS_CATALOG . $add_pdf)) {
                //$test->add_attach_file(DIR_FS_CATALOG.$add_pdf);
                if (copy(DIR_FS_CATALOG . $add_pdf, DIR_FS_CATALOG . $temp_folder_name . '/' . trim($order->products[$i]['model']) . '.pdf'))
                    $pdf_link .= '<br><a href="' . DIR_WS_FULL . $temp_folder_name . '/' . trim($order->products[$i]['model']) . '.pdf' . '">download: ' . trim($order->products[$i]['model']) . '.pdf - ' . strip_tags($order->products[$i]['name']) . '</a>';
            }
        }


        $find_notes = 'Die bestellten Noten finden Sie als Anhang dieser Email!';
        if ($order_lang == 'german') $find_notes = 'Die bestellten Noten k&ouml;nnen Sie hier direkt herunterladen und speichern:';
        if ($order_lang == 'english') $find_notes = 'The ordered music notes are attached to this email.<br>Alternatively you can download and save the sheet music right here:';
        if ($order_lang == 'french') $find_notes = 'Les notes de musique command�s sont attach�s � cet e-mail.<br>Alternativement, vous pouvez t�l�charger et sauvegarder la partition ici:';
        if ($order_lang == 'italian') $find_notes = 'Le note musicali ordinati sono allegati alla presente e-mail. In alternativa � possibile scaricare e salvare la partitura proprio qui:';
        if ($order_lang == 'russian') $find_notes = "The ordered music notes are attached to this email. <br>Alternatively you can download and save the sheet music right here:";

        $find_notes .= '<div style="font-size:0.9em;margin:4px 0 9px 5px;line-height:140%">' . $pdf_link . '</div>';
        if ($order_lang == 'german') $find_notes .= '<span style="font-size:0.8em;color:#666;font-weight:normal">Diese Download-Links sind nur f&uuml;r 48 Stunden g&uuml;ltig!</span>';
        if ($order_lang == 'english') $find_notes .= '<span style="font-size:0.8em;color:#666;font-weight:normal">These download links are only valid for 48 hours!</span>';
        if ($order_lang == 'french') $find_notes .= '<span style="font-size:0.8em;color:#666;font-weight:normal">Ces liens de t�l�chargement ne sont valables que pendant 48 heures!</span>';
        if ($order_lang == 'italian') $find_notes .= '<span style="font-size:0.8em;color:#666;font-weight:normal">Questi link per il download sono validi solo per 48 ore!</span>';
        if ($order_lang == 'russian') $find_notes .= '<span style="font-size:0.8em;color:#666;font-weight:normal">These download links are only valid for 48 hours!</span>';

        $this_template = str_replace('#hinweis_zahlung_paypal_nur_shopeigner#', '
<div style="padding:6px;color:#900;font-weight:bold;font-size:1.3em">
' . $find_notes . '
</div>
', $this_template);

    } else {
        $this_template = str_replace('#hinweis_zahlung_paypal_nur_shopeigner#', '
<div style="padding:9px 6px;color:#900;font-weight:bold;font-size:1.2em">
Zahlung durch PayPal
</div>
', $this_template);
    }

    $owner_template = $this_template;

// Fahrer unterwegs entfernen für diese Email
    $this_template = str_replace('##fahrer_unterwegs_link##', '', $this_template);
    $this_template = str_replace('#hinweis_erstbestellung_nur_shopeigner#', '', $this_template);
    $this_template = str_replace('#history_nur_shopeigner#', '', $this_template);

///////////////////////////////////		
    if ($at_is_larrangement) {
        $Subject = 'Ihre Noten-Bestellung bei ' . store_name() . ' - #' . $insert_id . ' - via PayPal';
    } else {
        $Subject = 'Ihre Bestellung bei ' . store_name() . ' - #' . $insert_id . ' - via PayPal';
    }
// immer so...
    $ToName = $firstname . ' ' . $lastname;
//$ToEmail = $ToEmail;
    $FromName = store_name();
    $FromEmail = store_email();
// Kunde		
    if ($at_is_larrangement) {
//$test = new attach_mailer($name = "Olaf", $from = "info@mydotter.net", $to = "mydotter.webservice@googlemail.com", $cc = "", $bcc = "", $Subject.' :: '.__line__.' - attach_mailer');
        $bcc = store_email();
        $cc = store_email();
        $test = new attach_mailer($FromName, $FromEmail, $ToEmail, $cc, $bcc, $Subject);

        $order = new order($orders_id);


        for ($i = 0, $n = sizeof($order->products); $i < $n; $i++) {
            //$debug_txt.=' (' . $order->products[$i]['model'] . ')';

            $add_pdf = $at_larrangement_pdf_folder . '/' . $order_lang . '/' . trim($order->products[$i]['model']) . '.pdf';
            if (file_exists(DIR_FS_CATALOG . $add_pdf)) {
                $test->add_attach_file(DIR_FS_CATALOG . $add_pdf);
            } else {
                //$test->add_attach_file(DIR_FS_DOCUMENT_ROOT.DIR_WS_CLASSES."attach_mailer/1-2K.pdf.pdf");
            }
        }

        //$test->add_attach_file(DIR_FS_DOCUMENT_ROOT.DIR_WS_CLASSES."attach_mailer/1-2K.pdf.pdf");
        //$test->add_attach_file(DIR_FS_DOCUMENT_ROOT.DIR_WS_CLASSES."attach_mailer/1-F.pdf.pdf");

        $test->html_body = $this_template;

        $test->process_mail();
    } else {
        send_mail_html($ToName, $ToEmail, $Subject, $this_template, $FromName, $FromEmail);
    }

//////////////////////////////////////////////////////////////////////////////////////////////////

//$Subject = 'Ihre Bestellung - bezahlt mit PayPal';
// 1. Kopie an Owner
    $ToName = store_name();
    $ToEmail = store_email();
    $FromName = store_name();
    $FromEmail = store_email();

//$Subject = __line__.' - '.udate('H:i:s.u'). ' Bestellung von '.$firstname. ' '. $lastname . ' - Order-Nr. '.$insert_id.' - PayPal';
    $Subject = ' Bestellung von ' . $firstname . ' ' . $lastname . ' - Order-Nr. ' . $insert_id . ' - PayPal';

    send_mail_html($ToName, $ToEmail, $Subject, $this_template, $FromName, $FromEmail);


    /*
if (get_dv_bool('oc_mail_two_versions_to_owner')) {
	send_mail_html('', SEND_EXTRA_ORDER_EMAILS_TO, $Subject, $this_template, $FromName, $FromEmail);
}
*/
// ende neu
//////////////////////////////////////////////////////////////

// owner email
    $this_template = $owner_template;

// Fahrer unterwegs 
    if (get_dv_bool('pizza_use_fahrer_unterwegs_link') and get_dv_bool('this_is_pizza_shop')) {
        $unterwegs_link = get_dv_l('pizza_use_fahrer_unterwegs_link_txt');
        $this_template = str_replace('##fahrer_unterwegs_link##', $unterwegs_link, $this_template);
    } else {
        $this_template = str_replace('##fahrer_unterwegs_link##', '&nbsp;', $this_template);
    }


// Email Version f&uuml;r Shop-Inhaber
//$email_order_html = str_replace('Auftragsbest&auml;tigung', 'Lieferschein &amp; Rechnung', $email_order_html);
//$email_order_html = str_replace('Lieferschein &amp; Rechnung', 'interne Bestellungs-Kopie ', $email_order_html);

    $sql = "SELECT o.orders_id, o.customers_name, o.customers_id, o.payment_method, o.date_purchased, o.currency, s.orders_status_name, ot.text AS order_total ";
    $sql .= "FROM orders o ";
    $sql .= "LEFT JOIN orders_total ot ON ( o.orders_id = ot.orders_id ) , orders_status s ";
    $sql .= "WHERE o.orders_status = s.orders_status_id ";
    $sql .= "AND ot.class = 'ot_total' ";
    $sql .= "AND o.customers_id = " . $customer_id . " ";
    $sql .= "AND o.orders_id != " . $insert_id . " ";
    $sql .= "ORDER BY o.orders_id DESC ";
    $anz_bestellungen = sql_has_number_records($sql) + 1;
    $sql .= "LIMIT 10 ";
    $result = tep_db_query($sql);
    $order_history = "";
    if (!$result) {
        //$message = 'Invalid query: ' . mysql_error() . "\n";
    } else {
        $count = @mysql_num_rows($result);
        $ist_erstbestellung = false;
        if ($count > 0) {
            $order_history .= 'Die (max. 10) letzten Bestellungen dieses Kunden waren: <br>';
            while ($row = tep_db_fetch_array($result)) {
                $order_history .= $row['orders_id'] . ' - ' . tep_date_short($row['date_purchased']) . ' : ' . $row['order_total'];
                $order_history .= '<br>';
            }
            mysql_free_result($result);
        } else {
            $order_history .= '<strong><font color="#990000" size="6"> Erst-Bestellung !</font></strong> <br>';
            $ist_erstbestellung = true;
        }
    }
// Gesamt Umsatz Kunde
    $sql_ot = 'SELECT '
        . ' o.orders_id,'
        . ' o.customers_id,'
        . ' o.date_purchased,'
        . ' sum(ot.value) as total,'
        . ' ot.class '
        . ' FROM '
        . ' orders o LEFT JOIN orders_total ot '
        . ' ON'
        . ' o.orders_id = ot.orders_id '
        . ' WHERE '
        . ' ot.class = \'ot_total\' and o.customers_id = ' . $customer_id
        . ' GROUP BY '
        . ' ot.class';
    $result_ot = tep_db_query($sql_ot);
    while ($row_ot = tep_db_fetch_array($result_ot)) {
        $order_history .= 'Bisheriger Gesamt-Umsatz: <b>' . $currencies->display_price($row_ot['total'], 0, 1) . ' - Anzahl Bestellungen: ' . $anz_bestellungen . '</b>';
    }
    mysql_free_result($result_ot);

    $this_template = str_replace('#history_nur_shopeigner#', $order_history, $this_template);

    if ($ist_erstbestellung) {
        $this_template = str_replace('#hinweis_erstbestellung_nur_shopeigner#', '<span style="font-size:18px;font-weight:bold;color:#c00">Erstbestellung !</span>', $this_template);
    } else {
        $this_template = str_replace('#hinweis_erstbestellung_nur_shopeigner#', '&nbsp;', $this_template);
    }


// 2. Kopie an Owner
    $ToName = store_name();
    $ToEmail = store_email();
    $FromName = store_name();
    $FromEmail = store_email();

    $Subject = __line__ . ' - ' . udate('H:i:s.u') . ' Bestellung von ' . $firstname . ' ' . $lastname . ' - (2. Bestellkopie #' . $insert_id . ') (PayPal-Vorabinfo)';

    send_mail_html($ToName, $ToEmail, $Subject, $this_template, $FromName, $FromEmail);


    if (SEND_EXTRA_ORDER_EMAILS_TO != '') {
        send_mail_html('Admin-Extra', SEND_EXTRA_ORDER_EMAILS_TO, $Subject, $this_template, $FromName, $FromEmail);
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////// 
// end emails 

}


function help_icon_by_key($key, $txt = 'Hilfe', $title = 'Hilfe zu diesem Element - Popup', $with_text = false, $new_window = false)
{

    global $tool_tip_icon_13, $video_help_icon, $goto_icon, $external_icon, $preview_icon13, $external_icon_no_title, $help_new_icon13, $info_hint_icon_13, $info_hint_icon_10, $info_hint_icon_16, $wizard_icon13, $tool_tip_icon_16, $help_24_icon, $help_16_icon;

    $st = '';


    if ($new_window) {
        if ($with_text) {
            $x .= '<a target="_blank" ' . $st . ' href="wrapper_all.php?incl=help_new/help1.php&hitem=' . $key . '&hitem_txt=' . $txt . '&disallow_new_window=1" style="margin-left:4px" title="Hilfe: ' . $title . ' - neues Fenster" class="" >' . $help_24_icon . ' ' . $title . '</a>';
        } else {
            $x .= '<a target="_blank" ' . $st . ' href="wrapper_all.php?incl=help_new/help1.php&hitem=' . $key . '&hitem_txt=&disallow_new_window=1" style="margin-left:4px" title="Hilfe: ' . $title . ' - neues Fenster" class="" >' . $help_24_icon . '</a>';
        }

    } else {
        if ($with_text) {
            $x .= '<a ' . $st . ' href="wrapper_all.php?incl=help_new/help1.php&hitem=' . $key . '&hitem_txt=' . $txt . '&disallow_new_window=1" params="lightwindow_type=external" style="margin-left:4px" title="Hilfe: ' . $title . '" class="lightwindow " >' . $help_24_icon . ' ' . $title . '</a>';
        } else {
            $x .= '<a ' . $st . ' href="wrapper_all.php?incl=help_new/help1.php&hitem=' . $key . '&hitem_txt=&disallow_new_window=1" params="lightwindow_type=external" style="margin-left:4px" title="Hilfe: ' . $title . '" class="lightwindow " >' . $help_24_icon . '</a>';
        }
    }


    return $x;

}

function get_file_size_from_key($key)
{
    $sql = "select file_size from help_files_md where `key` = '" . $key . "' ";
    return lookup($sql, 'file_size');
}

function txt_help($key)
{
    return help_icon($key, '', '', '', true);
}


function help_icon_cat($key = '', $preview_key = '', $img = '', $live_url = '', $tiny = false, $new_window = false, $style = '')
{
    global $tool_tip_icon_13, $video_help_icon, $goto_icon, $external_icon,
           $preview_icon13, $external_icon_no_title, $help_new_icon13, $info_hint_icon_13, $info_hint_icon_10, $info_hint_icon_16, $wizard_icon13, $tool_tip_icon_16, $tool_tip_icon_11,
           $preview_img_icon, $lupe_icon_16, $preview_icon;

    if ($style == '') $style = 'margin-left:4px;';
    $title = help_topic_by_key($key, true);

    if (is_dev() and !$tiny) {
        $get_file_size_from_key = get_file_size_from_key($key);
        if ($get_file_size_from_key > 20) {
            $dev_hint = ' <span style="font-size:0.8em;color:#666;font-weight:normal">' . $key . ' (' . $get_file_size_from_key . ')</span>';
        } else {
            $dev_hint = ' <span style="font-size:0.8em;color:#c66;font-weight:normal">' . $key . ' (' . $get_file_size_from_key . ')</span>';
        }
    }

    if ($key <> '') {
        if ($tiny) {
            $x = '<a href="admin6093/wrapper_all.php?incl=help_new/help1.php&hitem=' . $key . '" params="lightwindow_type=external,lightwindow_width=\'\',lightwindow_height=\'\'  
		style="' . $style . '" title="' . $title . '" class="lightwindow " >' . $tool_tip_icon_11 . '</a>';
        } else {
            $x = '<a href="admin6093/wrapper_all.php?incl=help_new/help1.php&hitem=' . $key . '" params="lightwindow_type=external,lightwindow_width=\'\',lightwindow_height=\'\'  
		style="' . $style . '" title="' . $title . '" class="lightwindow " >' . $tool_tip_icon_16 . $dev_hint . '</a>';
        }

        if ($new_window) {
            $x = '<a target="_blank" href="admin6093/wrapper_all.php?incl=help_new/help1.php&hitem=' . $key . '"  
		style="' . $style . '" title="' . $title . ' - neues Fenster" > ' . $tool_tip_icon_11 . '</a>';
        }


    }

    if ($preview_key <> '') {
        $pl = '<a class="button30_" target="_blank" title="Wo ist das auf der Seite? Neues Fenster" href="../wrapper_screenshot.php?show=' . $preview_key . '">' . $preview_icon13 . '</a>';
        $x .= ' ' . $pl;
    } else {
        $pl = '';
    }

    if ($img <> '') {
        $img_link = link_to_img_popup($img, $title = 'Element-Screenshot - PopUp', $caption = $title, $icon_size = '', $pre_text = '', $style = 'display:inline', $class = 'button30_');
        $x .= ' ' . $img_link;
    }

    if ($live_url <> '') {
        $live_url_link = get_live_vorschau($live_url);
        $x .= ' ' . $live_url_link;
    }


    $x = '<span style="margin:0 2px;white-space:nowrap;">' . $x . '</span>';


    return $x;

}


function help_icon($key = '', $preview_key = '', $img = '', $live_url = '', $tiny = false, $new_window = false, $display_img = true, $big_icon = false)
{

    global $tool_tip_icon_13, $video_help_icon, $goto_icon, $external_icon,
           $preview_icon13, $external_icon_no_title, $help_new_icon13, $info_hint_icon_13, $info_hint_icon_10,
           $info_hint_icon_16, $wizard_icon13, $tool_tip_icon_16, $tool_tip_icon_11,
           $preview_img_icon, $lupe_icon_16, $preview_icon, $help_24_icon, $help_16_icon;

    if (to_bool($big_icon)) {
        $tool_tip_icon_11 = $help_24_icon;
        $tool_tip_icon_16 = $help_16_icon;

    }

    $admin_WS = DIR_WS_FULL . 'admin6093/';
    $catalog_WS = DIR_WS_FULL;

    $style = '';
    $title = help_topic_by_key($key, true);

    if (is_dev() and !$tiny) {
        $get_file_size_from_key = get_file_size_from_key($key);
        if ($get_file_size_from_key > 20) {
            $dev_hint = ' <span style="font-size:0.8em;color:#666;font-weight:normal">' . $key . ' (' . $get_file_size_from_key . ')</span>';
        } else {
            $dev_hint = ' <span style="font-size:0.8em;color:#c66;font-weight:normal">' . $key . ' (' . $get_file_size_from_key . ')</span>';
        }
    }

    if ($key <> '') {
        if ($tiny) {
            $x = '<a ' . $style . ' href="' . $admin_WS . 'wrapper_all.php?incl=help_new/help1.php&hitem=' . $key . '" params="lightwindow_type=external,lightwindow_width=" 
		style="margin-left:4px" title="' . $title . '" class="lightwindow " >' . $tool_tip_icon_11 . '</a>';
        } else {
            $x = '<a ' . $style . ' href="' . $admin_WS . 'wrapper_all.php?incl=help_new/help1.php&hitem=' . $key . '" params="lightwindow_type=external,lightwindow_width=" 
		style="margin-left:4px" title="' . $title . '" class="lightwindow " >' . $tool_tip_icon_16 . $dev_hint . '</a>';
        }

        if ($new_window) {
            $x = '<a target="_blank" ' . $style . ' href="' . $admin_WS . 'wrapper_all.php?incl=help_new/help1.php&hitem=' . $key . '"  
		style="margin-left:4px" title="' . $title . ' - neues Fenster" >' . $tool_tip_icon_16 . $dev_hint . '</a>';
        }


    }

    if ($preview_key <> '') {
        $pl = '<a class="button30_" target="_blank" title="Wo ist das auf der Seite? Neues Fenster" href="' . $catalog_WS . 'wrapper_screenshot.php?show=' . $preview_key . '">' . $preview_icon13 . '</a>';
        $x .= ' ' . $pl;
    } else {
        $pl = '';
    }

    if ($img <> '') {
        $img_link = link_to_img_popup($img, $title = 'Element-Screenshot - PopUp', $caption = $title, $icon_size = '', $pre_text = '', $style = 'display:inline', $class = 'button30_');
        $x .= ' ' . $img_link;
    }

    if ($live_url <> '') {
        $live_url_link = get_live_vorschau($live_url);
        $x .= ' ' . $live_url_link;
    }


    $x = '<span style="margin:0 2px;white-space:nowrap;">' . $x . '</span>';

    if ($display_img and $img <> '') {
        $ish = get_img_size_str($img, 1);
        if ($ish > 120) {
            $pop = true;
        } else {
            $pop = false;
        }

        $y = '<div id="" style="margin:19px 0 12px 9px;max-width:710px;overflow:hidden">';
        if ($pop) $y .= '<a href="' . $img . '" class="lightwindow " title="Element-Screenshot - PopUp" author="mydotter" caption="Element-Screenshot">';

        if ($ish > 120) {
            $y .= '<img title="Beispiel vergr&ouml;ssern" src="' . $img . '" height="120" />';
        } else {
            $y .= '<img title="Beispiel" src="' . $img . '" height="' . $ish . '" />';
        }
        if ($pop) $y .= '</a>';
        if ($pop) $y .= '<span class="grey10" style="margin-left:12px">&laquo; ins Bild klicken f&uumlr eine Vergr&ouml;sserung</span>';
        $y .= '</div>';
    } else {
        $y = '';
    }

    return $x . $y;

}

function help_topic_by_key($help_key, $add_hilfe = true)
{

    /*
$sql="select  * from help_files_md where `key` = '".$help_key."' order by id limit 1  ";
		$sql_result = q($sql); 
		while ($row = mysql_fetch_array($sql_result)){
			$id = $row["id"];
			$lv1_nr = $row["lv1_nr"];
			$lv1_topic = $row["lv1_topic"];
			$lv1_so = $row["lv1_so"];
			$lv2_nr = $row["lv2_nr"];
			$lv2_topic = $row["lv2_topic"];
			$lv2_so = $row["lv2_so"];
			$lv3_nr = $row["lv3_nr"];
			$lv3_topic = $row["lv3_topic"];
			$lv3_so = $row["lv3_so"];
			$lv4_nr = $row["lv4_nr"];
			$lv4_topic = $row["lv4_topic"];
			$lv4_so = $row["lv4_so"];
			$lv5_nr = $row["lv5_nr"];
			$lv5_topic = $row["lv5_topic"];
			$lv5_so = $row["lv5_so"];
		}			

if ($lv5_topic=='0' or $lv5_topic=='') $r = $lv4_topic;
if ($lv4_topic=='0' or $lv4_topic=='') $r = $lv3_topic;
if ($lv3_topic=='0' or $lv3_topic=='') $r = $lv2_topic;
if ($lv2_topic=='0' or $lv2_topic=='') $r = $lv1_topic;
*/
    $r = lookup('select vid_title from help_videos2 where help_key = "' . $help_key . '" ', 'vid_title');


    if ($add_hilfe) $ah = 'Hilfe: ';

    return $ah . $r;

}


function get_plain_text_editor_any_table($id, $table, $field, $id_field, $class, $style, $before_txt = '', $after_txt = '', $where = '', $div_id_german = '', $uniqe_str = '')
{
    $ident = $table . $field . $id_field . $id . $uniqe_str;
    $curr_val = val_in_table_field($table, $field, $id_field, $id, $where);
    $curr_val = trim($curr_val);

    /*
$x=$before_txt.'<span class="axupd_1" style="display:inline-block;'.$style.'" id="plain_txt_'.$ident .'">'. $curr_val .'
</span>'.$after_txt.'<script>new Ajax.InPlaceEditor(\''.'plain_txt_'. $ident .'\', \'ax_updater.php?id=3641_'.$table.'_xyx_'.$field.'_xyx_'.$id_field.'_xyx_'.$id .'\',{okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - max. 255 Zeichen\'});</script>';
*/

    if ($div_id_german == '') {

        $x = $before_txt . '<span class="axupd_1" style="display:inline-block;' . $style . '" id="plain_txt_' . $ident . '">' . $curr_val . '</span>' . $after_txt . '<script>new Ajax.InPlaceEditor(\'' . 'plain_txt_' . $ident . '\', \'ax_updater.php?id=3641_' . $table . '_xyx_' . $field . '_xyx_' . $id_field . '_xyx_' . $id . '\',{okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - max. 255 Zeichen\'});</script>';

    } else {

        $x = $before_txt . '<span class="axupd_1" style="display:inline-block;' . $style . '" id="' . $div_id_german . '">' . $curr_val . '</span>' . $after_txt . '<script>new Ajax.InPlaceEditor(\'' . '' . $div_id_german . '\', \'ax_updater.php?id=3641_' . $table . '_xyx_' . $field . '_xyx_' . $id_field . '_xyx_' . $id . '\',{okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - max. 255 Zeichen\'});</script>';

    }
    return $x;
}


function get_plain_text_editor_any_table2($name, $id, $table, $field, $id_field, $class, $style, $size = '1')
{
    $ident = $table . $field . $id_field . $id;
    $curr_val = val_in_table_field($table, $field, $id_field, $id, $where);
    $curr_val = trim($curr_val);

    /*	
$x=$before_txt.'<span class="axupd_1" style="display:inline-block;'.$style.'" id="plain_txt_'.$ident .'">'. $curr_val .'</span>'.$after_txt.'<script>new Ajax.InPlaceEditor(\''.'plain_txt_'. $ident .'\', \'ax_updater.php?id=3641_'.$table.'_xyx_'.$field.'_xyx_'.$id_field.'_xyx_'.$id .'\',{okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - max. 255 Zeichen\'});</script>';
*/
    $x = '<input class="shadeform" style="' . $style . '" name="' . $name . '" id="' . $name . '" value="' . $curr_val . '" size="' . $size . '" type="text">';

    $x .= '<script>new Ajax.InPlaceEditor(\'' . '' . $name . '\', \'ax_updater.php?id=3641_' . $table . '_xyx_' . $field . '_xyx_' . $id_field . '_xyx_' . $id . '\',{okText:\'Speichern\', cancelText:\'Abbruch\',savingText:\'wird gespeichert\',clickToEditText:\'klicken zum Bearbeiten - max. 255 Zeichen\'});</script>';


    return $x;
}


function save_help_link($key, $txt, $preview_key, $hk)
{
    if ($key == 'x') return false;

    $title = $txt;


    $h_key_parts = explode(".", $hk);
    $hk_1 = $h_key_parts[0];
    $hk_2 = $h_key_parts[1];
    $hk_3 = $h_key_parts[2];
    $hk_4 = $h_key_parts[3];
    $hk_5 = $h_key_parts[4];


    $key_parts = explode("_", $key);

    $key_split_1 = $key_parts[0];
    $key_split_2 = $key_parts[1];
    $key_split_3 = $key_parts[2];
    $key_split_4 = $key_parts[3];
    $key_split_5 = $key_parts[4];
    $key_split_6 = $key_parts[5];
    $key_split_7 = $key_parts[6];
    $key_split_8 = $key_parts[7];

    $file = DIR_FS_ADMIN . 'help_new/german/' . $key . '.php';
    $file_size = filesize($file);

    $sql_res = q("select * from help_files_md WHERE `key` = '" . $key . "'");
    $z = mysql_num_rows($sql_res);
    if ($z == 0) {
        $sql = "insert into help_files_md set 
				`key` = '" . $key . "', 
				title= '" . $title . "', 
				ist_wie_oft = 1,
				preview_key = '" . $preview_key . "',
				key_split_1 = '" . $key_split_1 . "',
				key_split_2 = '" . $key_split_2 . "',
				key_split_3 = '" . $key_split_3 . "',
				key_split_4 = '" . $key_split_4 . "',
				key_split_5 = '" . $key_split_5 . "',
				key_split_6 = '" . $key_split_6 . "',
				key_split_7 = '" . $key_split_7 . "',
				key_split_8 = '" . $key_split_8 . "',
				file_size = " . $file_size . ",
				lv1_nr = '" . $hk_1 . "',
				lv2_nr = '" . $hk_2 . "',
				lv3_nr = '" . $hk_1 . "',
				lv4_nr = '" . $hk_4 . "',
				lv5_nr = '" . $hk_5 . "'																
																												
				
				
				";
        q($sql);
    } else {
        $sql = "update help_files_md set 
				ist_wie_oft = ist_wie_oft+1, 
				title= '" . $title . "', 
				preview_key = '" . $preview_key . "',																																
				file_size = " . $file_size . ",				
				lv1_nr = '" . $hk_1 . "',
				lv2_nr = '" . $hk_2 . "',
				lv3_nr = '" . $hk_1 . "',
				lv4_nr = '" . $hk_4 . "',
				lv5_nr = '" . $hk_5 . "'
								
				where `key` = '" . $key . "' ";
        q($sql);
    }


}


function public_help_link_by_key($key, $txt = '�bersicht & Hilfe', $title = 'Hilfe und Erl�uterungen zu diesem Bereich - Popup', $add_icon = false, $no_pop = false, $show = true, $indent = 0, $goto_link = '', $class = 'conf_lv2', $a_class = 'conf_help_link', $preview_key = '')
{
    global $show_full_help_to_public, $tool_tip_icon_13, $video_help_icon, $goto_icon, $external_icon, $preview_icon13, $external_icon_no_title, $help_new_icon13, $info_hint_icon_13, $info_hint_icon_16, $wizard_icon13, $modul_icon13, $modul_icon10;

    if (!$show_full_help_to_public) return;

    $DIR_FS_ADMIN = ROOT_FOLDER . 'sp/s50/catalog/admin6093/';

    $hitem = trim(getParam('hitem', ''));

    if ($preview_key <> '') {
        $pl = '<a class="button30" target="_blank" title="Was ist das? Element-Vorschau - neues Fenster" href="wrapper_screenshot.php?show=' . $preview_key . '">' . $preview_icon13 . '</a>';
    } else {
        $pl = '';
    }

    insup_dv($key, get_help_topic_config($hitem) . ' - ' . $txt, $app_top = false); // speichern

    if ($hitem == $key) {
        $mark = 'background:#ff6;';
    } else {
        $mark = '';
    }

//existiert help file?
    $master_page = $DIR_FS_ADMIN . 'help_new/german/leere_vorlage.php';
    $file = $DIR_FS_ADMIN . 'help_new/german/' . $key . '.php';

    if (!file_exists($file)) {
//$ne_hint = 'xx ';
//copy($master_page,$file); 
    } else {
//$ne_hint = '';
    }

    $txt2 = str_replace('&', '#pl#', $txt);
    $txt2 = urlencode($txt2);
    if ($title == '') $title = 'Hilfe-Thema &ouml;ffnen';

    if (is_dev()) $title .= ' - ' . $key;

    if (!$show) {
        if ($indent > 0) {
            $st = ' style="' . $mark . 'color:#999;font-size:0.8em;" ';
        } else {
            $st = ' style="' . $mark . 'color:#999;font-size:0.8em" ';
        }
    } else {
        if ($indent > 0) {
            $st = ' style="' . $mark . '" ';
        } else {
            $st = ' style="' . $mark . '" ';
        }
    }

//$txt = $ne_hint.$txt;

    if ($indent > 0) {
        $class_modi = '_' . $indent;
    } else {
        $class_modi = '';
    }

    if (!$no_pop) {
        if (!$add_icon) {
            $l = '
			<a ' . $st . ' href="' . shop_server_url() . '/admin6093/wrapper_all.php?incl=help_new/help1.php&hitem=' . $key . '&hitem_txt=' . $txt2 . '&disallow_new_window=1" params="lightwindow_type=external"  title="' . $title . '" class="lightwindow ' . $a_class . '" >' . $txt . '</a>
			';
        } else {
            $l = '
			<a ' . $st . ' href="' . shop_server_url() . '/admin6093/wrapper_all.php?incl=help_new/help1.php&hitem=' . $key . '&hitem_txt=' . $txt2 . '&disallow_new_window=1" params="lightwindow_type=external"  title="' . $title . '" class="lightwindow ' . $a_class . '" >' . $txt . ' ' . $info_hint_icon_13 . '</a>
			';
        }
    } else {
        if (!$add_icon) {
            $l = '<div class="' . $class . '' . $class_modi . '">
			<a class="' . $a_class . '" ' . $st . ' href="wrapper_all.php?incl=help_new/help1.php&hitem=' . $key . '&hitem_txt=' . $txt2 . '&disallow_new_window=1"  title="' . $title . '" class="conf_lv2" >' . $txt . '</a>
			';
        } else {
            $l = '<div class="' . $class . '' . $class_modi . '">
			<a class="' . $a_class . '" ' . $st . ' href="wrapper_all.php?incl=help_new/help1.php&hitem=' . $key . '&hitem_txt=' . $txt2 . '&disallow_new_window=1"  title="' . $title . '" class="conf_lv2" >' . $txt . ' ' . $info_hint_icon_13 . '</a>
			';
        }
    }

    if (!$no_pop) {
        if ($goto_link <> '') {
            $l .= ' <a class="button30" title="&ouml;ffnen zum Bearbeiten - neues Browser-Fenster" target="_blank" href="' . $goto_link . '">' . $modul_icon13 . '</a>' . $pl;
        } else {
            $l .= '';
        }

    } else {
        if ($goto_link <> '') {
            $l .= ' <a class="button30" title="&ouml;ffnen zum Bearbeiten - neues Browser-Fenster" target="_blank" href="' . $goto_link . '">' . $modul_icon13 . '</a>' . $pl . '</div>';
        } else {
            $l .= '</div>';
        }
    }

    if (!$show and !is_dev()) $l = '';


    return $l;
}


function get_help_topic_config($str)
{
    global $goto_icon;

    $sql = "select * from help_videos2 where help_key = '" . $str . "' order by l1,l2,l3,l4,l5,l6 ";
    $anz = anzahl_records($sql);
    if ($anz > 1) return '';

    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $id = $row["id"];
        $nr = $row["nr"];
        $l1 = $row["l1"];
        $l2 = $row["l2"];
        $l3 = $row["l3"];
        $l4 = $row["l4"];
        $l5 = $row["l5"];
        $l6 = $row["l6"];
        $vid_title = $row["vid_title"];
        $vid_desc = $row["vid_desc"];
        $vid_url = $row["vid_url"];
        $vid_iframe = $row["vid_iframe"];
        $vid_len = $row["vid_len"];
        $active = $row["active"];
        $sort_order = $row["sort_order"];
        $views = $row["views"];
        $views_help = $row["views_help"];
        $youtube_name = $row["youtube_name"];
        $help_key = $row["help_key"];
        $file_size = $row["file_size"];
        $v_key = $row["v_key"];
        $video_folder_exists = $row["video_folder_exists"];
        $video_index_exists = $row["video_index_exists"];
        $doubles = $row["doubles"];
        $neu = $row["neu"];

        $nr_arr = explode(".", $nr);
        $this_t_level = sizeof($nr_arr);

        //return '<span style="font-size:1.8em">'.$str.'</span>';

        //for ($i=0, $n=sizeof($nr_arr); $i<$n; $i++) {
        //for ($i=sizeof($nr_arr), $n=0; $i>$n; $i--) {
        //if(stristr($nr_arr[$i],'_show_on_what_page') ){

        if ($this_t_level > 5) $p6 = $nr_arr[0] . '.' . $nr_arr[1] . '.' . $nr_arr[2] . '.' . $nr_arr[3] . '.' . $nr_arr[4] . '.' . $nr_arr[5];
        if ($this_t_level > 4) $p5 = $nr_arr[0] . '.' . $nr_arr[1] . '.' . $nr_arr[2] . '.' . $nr_arr[3] . '.' . $nr_arr[4];
        if ($this_t_level > 3) $p4 = $nr_arr[0] . '.' . $nr_arr[1] . '.' . $nr_arr[2] . '.' . $nr_arr[3];
        if ($this_t_level > 2) $p3 = $nr_arr[0] . '.' . $nr_arr[1] . '.' . $nr_arr[2];
        if ($this_t_level > 1) $p2 = $nr_arr[0] . '.' . $nr_arr[1];
        $p1 = $nr_arr[0] . '';

        if ($p1 <> '' and $p1 <> $nr) {
            $p1_key = lookup('select * from help_videos2 where nr = "' . $p1 . '" ', 'help_key');
            $p1_title = lookup('select * from help_videos2 where nr = "' . $p1 . '" ', 'vid_title');
            $p1_link = '<a title="gehe zu ' . $p1_title . '" href="wrapper_all.php?incl=help_new/help1.php&hitem=' . $p1_key . '&hitem_txt=' . $p1_title . '&disallow_new_window=1">' . $p1_title . '</a>' . $goto_icon;
        }

        if ($p2 <> '' and $p2 <> $nr) {
            $p2_key = lookup('select * from help_videos2 where nr = "' . $p2 . '" ', 'help_key');
            $p2_title = lookup('select * from help_videos2 where nr = "' . $p2 . '" ', 'vid_title');
            $p2_link = '<a title="gehe zu ' . $p2_title . '" href="wrapper_all.php?incl=help_new/help1.php&hitem=' . $p2_key . '&hitem_txt=' . $p2_title . '&disallow_new_window=1">' . $p2_title . '</a>' . $goto_icon;
        }

        if ($p3 <> '' and $p3 <> $nr) {
            $p3_key = lookup('select * from help_videos2 where nr = "' . $p3 . '" ', 'help_key');
            $p3_title = lookup('select * from help_videos2 where nr = "' . $p3 . '" ', 'vid_title');
            $p3_link = '<a title="gehe zu ' . $p3_title . '" href="wrapper_all.php?incl=help_new/help1.php&hitem=' . $p3_key . '&hitem_txt=' . $p3_title . '&disallow_new_window=1">' . $p3_title . '</a>' . $goto_icon;
        }

        if ($p4 <> '' and $p4 <> $nr) {
            $p4_key = lookup('select * from help_videos2 where nr = "' . $p4 . '" ', 'help_key');
            $p4_title = lookup('select * from help_videos2 where nr = "' . $p4 . '" ', 'vid_title');
            $p4_link = '<a title="gehe zu ' . $p4_title . '" href="wrapper_all.php?incl=help_new/help1.php&hitem=' . $p4_key . '&hitem_txt=' . $p4_title . '&disallow_new_window=1">' . $p4_title . '</a>' . $goto_icon;
        }

        if ($p5 <> '' and $p5 <> $nr) {
            $p5_key = lookup('select * from help_videos2 where nr = "' . $p5 . '" ', 'help_key');
            $p5_title = lookup('select * from help_videos2 where nr = "' . $p5 . '" ', 'vid_title');
            $p5_link = '<a title="gehe zu ' . $p5_title . '" href="wrapper_all.php?incl=help_new/help1.php&hitem=' . $p5_key . '&hitem_txt=' . $p5_title . '&disallow_new_window=1">' . $p5_title . '</a>' . $goto_icon;
        }

        if ($p6 <> '' and $p6 <> $nr) {
            $p6_key = lookup('select * from help_videos2 where nr = "' . $p6 . '" ', 'help_key');
            $p6_title = lookup('select * from help_videos2 where nr = "' . $p6 . '" ', 'vid_title');
            $p6_link = '<a title="gehe zu ' . $p6_title . '" href="wrapper_all.php?incl=help_new/help1.php&hitem=' . $p6_key . '&hitem_txt=' . $p6_title . '&disallow_new_window=1">' . $p6_title . '</a>' . $goto_icon;
        }


        //$sql="update help_files_md set key1 = `key` "; 
        //q($sql);

    }
    mysql_free_result($sql_result);

    $s = $p1_link . $p2_link . $p3_link . $p4_link . $p5_link . $p6_link;
    //$s = $p1_key.' '.$p2_key.' '.$p3_key.' '.$p4_key.' '.$p5_key.' '.$p6_key;
    //$s = $p1.' - '.$p2.' - '.$p3.' - '.$p4.' - '.$p5.' - '.$p6;


    //return  '<span style="color:#aaa;font-weight:normal;font-size:0.9em">'.$s.' ('.$nr.') - 1: '.$p1.' - 2: '.$p2.' - 3: '.$p3.' - 4: '.$p4.' - 5: '.$p5.' - 6: '.$p6.'</span>';
    return '<span style="color:#aaa;font-weight:normal;font-size:0.9em">' . $s . '</span>';


}


function get_help_topic_config_alt_kann_weg($str)
{
    global $goto_icon;

    $sql = "select * from help_files_md where `key` = '" . $str . "' ";
    $sql_result = q($sql);
    while ($row = mysql_fetch_array($sql_result)) {
        $id = $row["id"];
        $sort_order = $row["sort_order"];
        $lv1_nr = $row["lv1_nr"];
        $lv1_topic = $row["lv1_topic"];
        $lv1_so = $row["lv1_so"];
        $lv2_nr = $row["lv2_nr"];
        $lv2_topic = $row["lv2_topic"];
        $lv2_so = $row["lv2_so"];
        $lv3_nr = $row["lv3_nr"];
        $lv3_topic = $row["lv3_topic"];
        $lv3_so = $row["lv3_so"];
        $lv4_nr = $row["lv4_nr"];
        $lv4_topic = $row["lv4_topic"];
        $lv4_so = $row["lv4_so"];
        $lv5_nr = $row["lv5_nr"];
        $lv5_topic = $row["lv5_topic"];
        $lv5_so = $row["lv5_so"];
        $key_split_1 = $row["key_split_1"];
        $key_split_2 = $row["key_split_2"];
        $key_split_3 = $row["key_split_3"];
        $key_split_4 = $row["key_split_4"];
        $key_split_5 = $row["key_split_5"];
        $key_split_6 = $row["key_split_6"];
        $key_split_7 = $row["key_split_7"];
        $key_split_8 = $row["key_split_8"];
        $key = $row["key"];
        $title = $row["title"];
        $preview_key = $row["preview_key"];
        $darf_wie_oft = $row["darf_wie_oft"];
        $ist_wie_oft = $row["ist_wie_oft"];
        //$is_dev = $row["is_dev"];
        $to_delete = $row["to_delete"];
        $show_also_in_lv = $row["show_also_in_lv"];
        $file_size = $row["file_size"];

        if ($lv5_topic <> '' and $lv5_topic <> '0') $this_t_level = 5;
        if ($lv5_topic == '' or $lv5_topic == '0') $this_t_level = 4;
        if ($lv4_topic == '' or $lv4_topic == '0') $this_t_level = 3;
        if ($lv3_topic == '' or $lv3_topic == '0') $this_t_level = 2;
        if ($lv2_topic == '' or $lv2_topic == '0') $this_t_level = 1;

        //$sql="update help_files_md set key1 = `key` "; 
        //q($sql);

        $sql = "select `key1`  from help_files_md where lv1_topic = '" . $lv1_topic . "' and (lv2_topic = '' or lv2_topic = '0' ) ";
        //ec($sql);
        $lv1_key = lookup($sql, 'key1');
        //ec(__line__.' '.$lv1_key);
        $lv1_topic = '<a title="gehe zu ' . $lv1_topic . '" href="wrapper_all.php?incl=help_new/help1.php&hitem=' . $lv1_key . '&hitem_txt=' . $lv1_topic . '&disallow_new_window=1">' . $lv1_topic . '</a>';

        $sql2 = "select * from help_files_md where lv1_nr = '" . $lv1_nr . "' and lv2_nr = '" . $lv2_nr . "' and  lv3_nr = 0  ";
        //ec($sql2);
        //ec(__line__.' '.anzahl_records($sql2));
        $lv2_key = lookup($sql2, 'key');
        //ec(__line__.' '.$lv2_key);
        $lv2_topic = '<a title="gehe zu ' . $lv2_topic . '" href="wrapper_all.php?incl=help_new/help1.php&hitem=' . $lv2_key . '&hitem_txt=' . $lv2_topic . '&disallow_new_window=1">' . $lv2_topic . '</a>';

        $sql2 = "select * from help_files_md where lv1_nr = '" . $lv1_nr . "' and lv2_nr = '" . $lv2_nr . "' and  lv3_nr = '" . $lv3_nr . "' and  lv4_nr = 0 ";
        $lv3_key = lookup($sql2, 'key');
        $lv3_topic = '<a title="gehe zu ' . $lv3_topic . '" href="wrapper_all.php?incl=help_new/help1.php&hitem=' . $lv3_key . '&hitem_txt=' . $lv3_topic . '&disallow_new_window=1">' . $lv3_topic . '</a>';

        $sql2 = "select * from help_files_md where lv1_nr = '" . $lv1_nr . "' and lv2_nr = '" . $lv2_nr . "' and  lv3_nr = '" . $lv3_nr . "' and  lv4_nr = lv3_nr = '" . $lv4_nr . "'  and  lv5_nr = 0 ";
        $lv4_key = lookup($sql2, 'key');
        $lv4_topic = '<a title="gehe zu ' . $lv4_topic . '" href="wrapper_all.php?incl=help_new/help1.php&hitem=' . $lv4_key . '&hitem_txt=' . $lv4_topic . '&disallow_new_window=1">' . $lv4_topic . '</a>';


        if ($this_t_level == 5) $s = $lv1_topic . $goto_icon . $lv2_topic . $goto_icon . $lv3_topic . $goto_icon . $lv4_topic;
        if ($this_t_level == 4) $s = $lv1_topic . $goto_icon . $lv2_topic . $goto_icon . $lv3_topic;
        if ($this_t_level == 3) $s = $lv1_topic . $goto_icon . $lv2_topic;
        if ($this_t_level == 2) $s = $lv1_topic;
        if ($this_t_level == 1) $s = '';


        return '<span style="color:#aaa;font-weight:normal;font-size:0.9em">' . $s . '</span>';


    }

    /*
if( eregiS('einrichtung',$str)) return 'Einrichtung ';
if( eregiS('content_management',$str)) return 'Content-Management ';
if( eregiS('links_navigation',$str)) return 'Links & Navigation ';
if( eregiS('emails_formulare',$str)) return 'Emails & Formulare ';
if( eregiS('produktdarstellung',$str)) return 'Produkt-Darstellung ';
if( eregiS('module',$str)) return 'Module ';
if( eregiS('suchmaschinen',$str)) return 'Suchmaschinen-Optimierung ';
if( eregiS('design',$str)) return 'Grafisches Design ';
if( eregiS('sonstiges',$str)) return 'Sonstiges ';

if( eregiS('manager',$str)) return 'Manager & Module ';
if( eregiS('admin',$str)) return 'allgemeine Shop-Verwaltung ';
if( eregiS('statistic',$str)) return 'Statistiken ';
if( eregiS('uploader',$str)) return 'Uploader & Tools ';


if( eregiS('configuration_wizard',$str)) return 'Konfigurations-Assistent ';
*/
}

function public_ss_preview($element, $txt = '', $large = false)
{
    global $preview_icon, $preview_icon13, $preview_icon10, $preview_pos_icon, $preview_pos_icon13, $preview_pos_icon10, $search_icon13, $search_icon;
    $img = $preview_pos_icon13;

    if (!$large) {
        $l = '
<a class="__button4" target="_blank" title="Wo ist das? Element-Vorschau - neues Fenster" href="wrapper_screenshot.php?show=' . $element . '"> ' . $txt . ' ' . $img . '</a>
';
    } else {
        $l = '
<a class="__button4" style="padding:6px 9px 0px 9px;font-size:11px;color:#369" target="_blank" title="Was ist das und wo ist das? Element-Vorschau (' . $element . ') - neues Fenster" href="wrapper_screenshot.php?show=' . $element . '"> ' . 'Was ist das? ' . $img . '</a>
';

    }

    return $l;
}

function screenshot_link($img, $txt = 'Screenshot', $title = 'Screenshot - PopUp', $width = '', $height = '', $use_icon = false)
{
    if ($use_icon) global $eye_icon_13;

    if ($title <> 'Screenshot') {
        $title = $title . ' - Screenshot';
    }

    $l = '
<a title="' . $title . '" class="lightwindow" params="lightwindow_type=external,lightwindow_width=' . $width . ',lightwindow_height=' . $height . '" href="wrapper_image.php?img=images/public_ss/' . $img . '">' . $txt . ' ' . $eye_icon_13 . '</a>
';

    return $l;
}


function screenshot_link2($img, $txt = 'Screenshot', $title = 'Screenshot - PopUp', $width = '', $height = '', $use_icon = false)
{
    if ($use_icon) global $eye_icon_13;
    if ($title <> 'Screenshot') {
        $title = $title . ' - Screenshot';
    }

    $l = '
<a title="' . $title . '" class="lightwindow" params="lightwindow_type=external,lightwindow_width=' . $width . ',lightwindow_height=' . $height . '" href="wrapper_image.php?img=images/public_ss3/' . $img . '">' . $txt . ' ' . $eye_icon_13 . '</a>
';
    return $l;
}


function is_active_icon_link($key, $msgbox = true, $float_right = true, $with_text = false, $f_size = '', $link_bars = false, $show_dev_key = false, $allow_as_button = false, $button_class = '', $page_reload = false, $style = '', $pre_txt = '')
{
//return $button_class;

    if ($page_reload) $msgbox = true;
//$msgbox=true;

    if ($float_right) {
        $float_right_txt = 'float:right;';
    } else {
        $float_right_txt = '';
    }

    $key = trim($key);

    if ($f_size <> '') {
        $f_size_str = ' font-size:' . $f_size . 'em; ';
    } else {
        $f_size_str = '';
    }


    $ausnahme_arr = array(
        'checkin_process_customer_greeting_is_active',
        'pageheader_is_active',
        'teaserpage_box_is_active',
        'mainpage_box_is_active',
        'footerpage_box_is_active',
        'top_hint_is_active',
        'order_phone_is_active',
        'main_menu_is_active',
        'manufacturers_box_is_active',
        'left_nav_is_active',
        'visitoremail_box_is_active',
        'video_box_is_active',
        'whos_online_box_is_active',
        'login_start_box_is_active',
        'all_boxes_move_to_left_col',
        'wish_list_box_is_active',
        'order_history_box_is_active',
        'best_sellers_box_is_active',
        'specials_box_is_active',
        'whats_new_box_is_active',
        'google_map_klein_show_on_page',
        'guestbook_box_is_active',

        'self_def_box_left1_is_active',
        'self_def_box_left2_is_active',
        'self_def_box_left3_is_active',
        'self_def_box_left4_is_active',
        'self_def_box_left5_is_active',
        'self_def_box_left6_is_active',
        'self_def_box_left7_is_active',
        'self_def_box_left8_is_active',
        'self_def_box_left9_is_active',
        'self_def_box_left10_is_active',
        'self_def_box_left11_is_active',
        'self_def_box_left12_is_active',

        'self_def_box_right1_is_active',
        'self_def_box_right2_is_active',
        'self_def_box_right3_is_active',
        'self_def_box_right4_is_active',
        'self_def_box_right5_is_active',
        'self_def_box_right6_is_active',
        'self_def_box_right7_is_active',
        'self_def_box_right8_is_active',
        'self_def_box_right9_is_active',
        'self_def_box_right10_is_active',
        'self_def_box_right11_is_active',
        'self_def_box_right12_is_active',

        'top_nav_is_active',
        'breadcrumb_add_navbar',
        'left_nav_is_active',
        'footer_nav_is_active',
        'breadcrumb_nav_is_active',
        'where_am_i_box_is_active',
        'toolbar_is_active',
        'toolbar_show_in_header',
        'currencies_box_show_in_toolbar',
        'google_page_translation_show_in_toolbar',
        'search_box_show_in_toolbar',
        'magnifier_box_show_in_toolbar',
        'general_infos_show_in_toolbar',
        'toolbar_show_in_footer',
        'currencies_box_show_in_footer_toolbar',
        'google_page_translation_show_in_footer_toolbar',
        'search_box_show_in_footer_toolbar',
        'magnifier_box_show_in_footer_toolbar',
        'general_infos_show_in_footer_toolbar',
        'toolbar_free_is_active',

        'general_infos_show_in_toolbar_gb',
        'general_infos_show_in_toolbar_fr',
        'general_infos_show_in_toolbar_it',
        'general_infos_show_in_toolbar_ru',
        'guestbook_box_is_active',
        'wish_list_is_active',
        'star_rating_is_active',
        'pageears_is_active',
        'easy_coupons_is_active',
        'video_box_is_active',
        'all_boxex_move_to_left_col',
        'breadcrumb_add_navbar',
        'breadcrumb_nav_on_startpage_is_active',
        'test_box1_use_header',
        'toolbar_is_active',
        'top_hint_is_active ',
        'order_phone_is_active ',
        'toolbar_free_is_active',
        'checkin_process_customer_greeting_is_active',
        'corp_logo_img_show_img',
        'footer_text_sub_page_on_startpage',
        'footer_bottom_bar_on_startpage_is_active',
        'footer_bottom_bar_is_active ',
        'footer_on_startpage_nach_oben_is_active',
        'footer_nach_oben_is_active ',
        'reviews_box_is_active',
        'google_direct_translation_is_active',
        'shop_is_multilang',
        'auto_update_currencies',
        'xxx',
        'xxx',
        'xxx',
        'xxx',
        'xxx',
        'xxx',
        'xxx',
        'xxx',
        'xxx'

    );

    if ($page_reload) {
        $script_add = '_reload';
        $titel_add = ' - Seite wird automatisch neu geladen!';
    }

    if ($link_bars and !in_array($key, $ausnahme_arr, false)) {
        $x = str_replace('_is_active', '', $key);

        $top_x = $x . '_show_in_top_nav';
        $left_x = $x . '_show_in_left_nav';
        $mid_x = $x . '_show_in_mid_nav';
        $footer_x = $x . '_show_in_footer_nav';

        if (get_dv_bool($top_x)) $top_str = '<u>oben</u>, ';
        if (get_dv_bool($mid_x)) $left_str = '<u>mitte</u>, ';
        if (get_dv_bool($left_x)) $left_str = '<u>links</u>, ';
        if (get_dv_bool($footer_x)) $footer_str = '<u>unten</u>, ';

        $bar_str = '<span title="in welcher der Link-Leisten wird dieses Element angezeigt?" style="cursor:pointer;font-size:0.8em;color:#666;margin-left:3px;font-weight:normal;white-space:nowrap"> Link in Linkleiste ' . substr(trim($top_str . $left_str . $footer_str), 0, -1) . '</span>';
        if (trim($top_str . $left_str . $footer_str) == '') $bar_str = '<span title="in welcher der Link-Leisten wird dieses Element angezeigt?" style="cursor:pointer;font-size:0.8em;color:#c33;margin-left:3px;white-space:nowrap"> (in keiner Linkleiste aktiviert!)</span>';

    }

    if (is_dev()) {
        $key1 = $key . ' - ';
    } else {
        $key1 = '';
    }

    if ($with_text) {
        $status_txt_act = '<span style="color:#060">aktiviert</span>';
        $status_txt_deact = '<span style="color:#c00">deaktiviert</span>';
    } else {
        $status_txt_act = '';
        $status_txt_deact = '';
    }

    if ($float_right) {
        $is_inactive_icon = '<img title="' . $key1 . ' aktivieren" style="' . $float_right_txt . 'opacity:0.6;margin-right:10px" src="' . DIR_WS_CATALOG . 'images/icon4/famfam/cross.png" width="12" height="12" />' . $status_txt_deact;
        $is_active_icon = '<img title="' . $key1 . ' deaktivieren" style="' . $float_right_txt . 'opacity:1.0;margin-right:10px" src="' . DIR_WS_CATALOG . 'images/icon4/famfam/tick.png" width="12" height="12" />' . $status_txt_act;
    } else {
        $is_inactive_icon = '<img title="' . $key1 . ' aktivieren" style="opacity:0.6;margin-left:3px" src="' . DIR_WS_CATALOG . 'images/icon4/famfam/cross.png" width="12" height="12" />' . $status_txt_deact;
        $is_active_icon = '<img title="' . $key1 . ' deaktivieren" style="opacity:1.0;margin-left:3px" src="' . DIR_WS_CATALOG . 'images/icon4/famfam/tick.png" width="12" height="12" />' . $status_txt_act;

    }


    $is_active = (get_dv_bool(trim($key)));

    if (is_dev() and $show_dev_key) $addk = ' ' . $key;
    $zuf = mt_rand(100000, 100000000);
    if (!$float_right) {

        if ($msgbox) {
            if ($is_active) {
                if ($allow_as_button) $allow_as_button_str = 'button_green';
                $is_active_link = '<span id="a_d_' . $key . $zuf . '"><a name="' . $key . '" id="a_' . $key . '"></a><a style="' . $f_size_str . $style . '" class="' . $button_class . '"  title="' . $key1 . ' deaktivieren ' . $titel_add . '" 
				href="javascript:toggle_activ_status_left' . $script_add . '(\'' . $key . '\',1,\'' . $button_class . '\',' . $zuf . ')">' . $is_active_icon . '</a> ' . $bar_str . '</span>';
                return $pre_txt . $is_active_link . $addk;
            } else {
                if ($allow_as_button) $allow_as_button_str = 'button_red';
                $is_inactive_link = '<span id="a_d_' . $key . $zuf . '"><a name="' . $key . '" id="a_' . $key . '"></a><a style="' . $f_size_str . $style . '" class="' . $button_class . '"  title="' . $key1 . ' aktivieren ' . $titel_add . '" 
				href="javascript:toggle_activ_status_left' . $script_add . '(\'' . $key . '\',0,\'' . $button_class . '\',' . $zuf . ')">' . $is_inactive_icon . '</a></span>';
                return $pre_txt . $is_inactive_link . $addk;
            }
        } else {
            if ($is_active) {
                $is_active_link = '<span id="a_d_' . $key . $zuf . '"><a name="' . $key . '" id="a_' . $key . '"></a><a style="' . $f_size_str . $style . '" class="' . $button_class . '"  
				title="deaktivieren  ' . $titel_add . '" ' . $f_size_str . ' href="javascript:toggle_activ_status_silent_left(\'' . $key . '\',1,\'' . $button_class . '\',' . $zuf . ')">' . $is_active_icon . '</a></span>';
                return $pre_txt . $is_active_link;
            } else {
                $is_inactive_link = '<span id="a_d_' . $key . $zuf . '"><a name="' . $key . '" id="a_' . $key . '"></a><a style="' . $f_size_str . $style . '" class="' . $button_class . '"  
				title="aktivieren  ' . $titel_add . '" ' . $f_size_str . ' href="javascript:toggle_activ_status_silent_left(\'' . $key . '\',0,\'' . $button_class . '\',' . $zuf . ')">' . $is_inactive_icon . '</a></span>';
                return $pre_txt . $is_inactive_link;
            }

        }


    } else {

        if ($msgbox) {
            if ($is_active) {
                $is_active_link = '<span id="a_d_' . $key . $zuf . '"><a title="deaktivieren  ' . $titel_add . '" ' . $f_size_str . ' href="javascript:toggle_activ_status' . $script_add . '(\'' . $key . '\',1,' . $zuf . ')">' . $is_active_icon . '</a></span>';
                return $pre_txt . $is_active_link;
            } else {
                $is_inactive_link = '<span id="a_d_' . $key . $zuf . '"><a  title="aktivieren  ' . $titel_add . '" ' . $f_size_str . ' href="javascript:toggle_activ_status' . $script_add . '(\'' . $key . '\',0,' . $zuf . ')">' . $is_inactive_icon . '</a></span>';
                return $pre_txt . $is_inactive_link;
            }
        } else {
            if ($is_active) {
                $is_active_link = '<span id="a_d_' . $key . $zuf . '"><a  title="deaktivieren  ' . $titel_add . '" ' . $f_size_str . ' href="javascript:toggle_activ_status_silent_left(\'' . $key . '\',1,' . $zuf . ')">' . $is_active_icon . '</a></span>';
                return $pre_txt . $is_active_link;
            } else {
                $is_inactive_link = '<span id="a_d_' . $key . $zuf . '"><a  title="aktivieren  ' . $titel_add . '" ' . $f_size_str . ' href="javascript:toggle_activ_status_silent_left(\'' . $key . '\',0,' . $zuf . ')">' . $is_inactive_icon . '</a></span>';
                return $pre_txt . $is_inactive_link;
            }

        }

    }


}


?>
