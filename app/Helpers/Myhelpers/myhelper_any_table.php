<?php

function set_field_in_tab($table,$id,$field,$value,$id_field='id') {
    $affected = DB::update("update $table set $field = '$value', updated_at = NOW()  where $id_field = ?", [$id]);
    $c_key = $table.'.'.$field.'.'.$id_field.'.'.$id;
    cache_it($c_key,$value);
    return $affected;
}

function delete_in_any_table($table, $id)
{
    // does it have touch() -  does it change updated_at - needed for caching models / records ???
    $deleted = DB::delete('delete from ' . $table . ' where id= ?', [$id]);
    //Cache::forget( 'all_languages' );
}

function destroy_in_any_table($app_table, $id)
{
    // does it have touch() -  does it change updated_at - needed for caching models / records ???
    $app_table::destroy($id);
}

function get_checkbox_div(
    $what, //the key in table 'diverses' in field 'div_what'
    $label_text = '', //label is only available if $with_panel == false
    $label_style = 'font-weight:bold; margin-right:6px; ',
    $with_panel = false, //wrap all in a green box?
    $data_on = 'On',
    $data_off = 'Off',
    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
    $ax_response = false, //if true: a little tick appears for confirmation after change
    $ax_response_with_page_reload = false, //if true: page will be reloaded on change
    $with_tooltip = true, //always false if $with_panel == true
    $tt_class = 'tip', // tip (right) or tip_lu (left)
    $tt_width = '350px' //width of tooltip popup
)
{
    if($ax_response_with_page_reload) $ax_response = true;
    $table = 'diverses';
    $field = 'div_res';
    $id_field = 'div_what';
    $id = $what;

    $ident = zuf(); //  returns str_random($len) default length is 10 - makes this widget unique on current page

    if (is_dev()) create_dv($what, $value = '1',true, $field = 'div_res');
    //if (allow_import_txt_from_diverses2)  get_text_from_div2($what); //imports short and long text from another table in the db so I must not type it again

    if (to_bool(lookup($table, $field, $what, $id_field))) {
        $bg_color = '#eef7ea';
        $checked = ' checked="checked" ';
        $checked_txt = '';
    } else {
        $bg_color = '#f6f6f6';
        $checked = '';
        $checked_txt = '';
    }
    if ($with_panel) {
        $with_tooltip = false; //because the text is displayed inside the panel - otherwise the tooltip displays this text
    }

    $ret = '';
        //todo  class or data-attribute for parent und/oder child relations
        $ret .= '
        <div id="wrp_' . $what .'_'.$ident. '" class="round4" 
        style="background:' . $bg_color . ';' . $wrapper_style . ';border:1px #ddd solid;padding-bottom:6px">';

    $hint_txt = get_hint_by_t_key_short($what, $text_only = true);
    $add_l = '&lang=all';
    $add_l .= '&curr_lang'; //defaults to session_lang()

    /*########################*/
    $cb_construct = '';
    $js_construct = '';
    $page_reload_indic = '0';
    $with_page_reload = $ax_response_with_page_reload;
    $as_switch = true; //we always use switch and not a plain checkbox
    /*########################*/

    /*------------ BEGIN js construct -----------------*/
    if ($with_page_reload) $page_reload_indic = '1';
    $js_construct = '
            onclick="
            checkbox_to_any_table(
            this.checked, 
            \'' . $ident . '\',
            \'' . $table . '\',
            \'' . $field . '\',
            \'' . $id_field . '\',
            \'' . $id . '\',
            \'' . $page_reload_indic . '\'
            );"
     ';
    /*------------ END js construct -----------------*/

    $t_title= '';
    if(is_dev()) $t_title= ' title="DEV: '.$what.' - get_checkbox_div()" ';

    /*--------------  begin cb_construct (Checkbox or Switch)  ----------------------------*/
    if ($as_switch) {

        $tt = '';
        if ($with_tooltip) {
            $tt = '<span class="float-right"> &nbsp; ' . tooltip($what, $tt_class, $tt_width).'</span>';
        }
        $ret .= $tt;

        $switch_size='';
        if ($with_panel) $switch_size='switch-lg';

        $cb_construct .= '
        <label class="switch switch-text switch-pill switch-success '.$switch_size.' float-right zoom100">
        <input '.$js_construct.' type="checkbox" class="switch-input " '.$checked.'>
        <span class="switch-label assi_utils_box_shadow" data-on="'. $data_on .'" data-off="'. $data_off .'"></span>
        <span '.$t_title.' class="switch-handle"></span></label>
        ';
        if($label_text<>'') $cb_construct .= '<span class="float-right" style="'.$label_style.'">'.$label_text.'</span>';
    } else {

        $cb_construct .= '<div class="checkbox checkbox-success float-right" style="display:inline">';
        if($label_text<>'') $cb_construct .= '<div style="display:inline;'.$label_style.'">
        <sub style="font-size:1.0em">'.$label_text.'</sub></div>';
        $cb_construct .= '<input '.$t_title.' '.$js_construct.' class="styled" type="checkbox" id="' . $ident . '" '.$checked.'>
        <label for="' . $ident . '"></label>';
        $cb_construct .= '</div>';

    }
    if ($ax_response) {
        //this area receives the returned data from ajax - which might be a javascript that reloads the page or a simple 'done' message
        //note that $ax_response is switched to false in case $ax_response_with_page_reload is true
        $cb_construct .= '<span class="float-right" style="margin-right:6px;width:35px;" id="' . $ident . '_conf">' . $checked_txt . '</span>';
    }
    /*--------------  end cb_construct function get_checkbox_div ----------------------------*/

    $ret .= '<div class="" style="min-height:30px;padding:0;">'; // the wrapper for the header begin

    /*--------------  BEGIN $edit_link_short ----------------------------*/
        //short text
    $edit_txt_short = 'edit';
    $edit_txt_short_hint = '';
    if(find_missing_translation($what, false)){
        $edit_txt_short_hint = ' - es fehlen Übersetzungen!';
        $edit_txt_short = 'edit!';
    }

    $edit_link_short = '
    <a class="dimmed04 ml-1" title="diesen kurzen Text editieren in allen Sprachen'.$edit_txt_short_hint.'"  
    data-fancybox data-type="iframe" data-src="' . url('/dashboard/pop_div_res_short?key=' . $what . $add_l . '') . '" href="javascript:;">
    <sup><i>' . $edit_txt_short . '</i></sup></a>';
    /*--------------  END $edit_link_short ----------------------------*/

    $t_font_size = '1.1em';
    $ret .= '
            <div  class="" 
            style="display:inline-block;padding:4px 8px 0 0;margin:-3px 0 0px 0;background:none;box-shadow:none;
           font-weight:bold;font-size:' . $t_font_size . ';max-width:80%">' . strip_tags($hint_txt) . $edit_link_short . '</div>';

    /*########################*/
    $ret.= '<div class="float-right" style="display:inline-block;margin:3px 0 -4px 0">'.$cb_construct.'</div>';
    /*########################*/
    $ret .= '</div>'; // the wrapper for the header end

    /*-------------- BEGIN  $edit_link_long ----------------------------*/
        $edit_txt_long = 'edit';
        $edit_txt_long_hint = '';
        if(find_missing_translation($what, true)){
            $edit_txt_long = 'edit!';
            $edit_txt_long_hint = ' - es fehlen Übersetzungen!';
        }

        $edit_link_long = '
            <a title="diesen langen Text editieren in allen Sprachen'.$edit_txt_long_hint.'"  
            data-fancybox data-type="iframe" data-src="' . url('/dashboard/pop1?key=' . $what . $add_l . '') . '" href="javascript:;">
            ' . $edit_txt_long . ' </a>';
    /*-------------- END $edit_link_long ----------------------------*/

    if ($with_panel) {

        /*$hint_txt = get_hint_by_t_key($what, true);
        //the wrapper for the body
        $ret .= '<div id="wrp_' . $ident . '" class="round6 assi-longtxt">'  . $hint_txt . '';
        $ret .= '<span class="float-right dimmed04" style="top:3px;right:3px;font-weight:bold;font-size:1.em;margin:-30px 0 0 9px"><i><sub>' . $edit_link_long . '</sub></i></span>';
        $ret .= '</div>';*/
        $hint_txt = get_hint_by_t_key($what, $text_only = false);

        $add_l = '&lang=all'; //defaults to session_lang()
        $add_l .= '&curr_lang'; //defaults to session_lang()

        $ret .= '
           <div id="wrp_' . $ident . '"  class="round6"
           style="margin-top:7px">' . $hint_txt ;
        $ret .= '</div>';
    }

    /*-----------------------  DEV Options only visible if is_dev()  -------------------------------------------*/
    if (is_dev() and $with_panel) {
        $ret .= '<div id="dev_only_'.$ident.'">';
        $ret .= '<div class="text-center" style="width:100%;color:#bbb;font-size:0.8em;border-top:1px #ddd solid">
        <a title="hide" href="javascript:toggle(\'dev_only_'.$ident.'\')">DEV only:</a></div>';
        /*------------ 1. line - rename ------------------------*/
        $ret .= '<div class="dimmed04" style="margin:5px 0 2px 2px"><input id="old_name_' . $what . '" onClick="this.select()" style="width:40%;max-width:290px;padding:0 4px;background:#ffe" type="text" value="' . $what . '">';

        $ret .= ' &nbsp; rename to: &nbsp; <input id="new_name_' . $what . '" style="width:32%;max-width:290px;padding:0 4px;background:#fff" type="text" value="' . $what . '"> <a href="javascript:update_div_what_key(\'' . $what . '\')"><span class="badge badge-info">go</span></a>';
        $ret .= '<span id="' . $what . '_conf"></span>';
        $ret .= '</div>';
        /*------------ 2. line - copy ------------------------*/
        $ret .= '<div class="dimmed04" style="margin:5px 0 2px 2px"><input id="old_name2_' . $what . '" onClick="this.select()" style="width:40%;max-width:290px;padding:0 4px;background:#ffe" type="text" value="' . $what . '">';

        $ret .= ' &nbsp; copy to: &nbsp; &nbsp; &nbsp; <input id="new_name2_' . $what . '" style="width:32%;max-width:290px;padding:0 4px;background:#fff" type="text" value="' . $what . '"> <a href="javascript:replicate_div_what_key(\'' . $what . '\')"><span class="badge badge-info">copy</span></a>';
        $ret .= '<span id="' . $what . '_conf2"></span>';
        $ret .= '</div>';
        $ret .= '</div>'; // id="dev_only_'.$ident.'"
    }
    /*----------------------- END  DEV Options only visible if is_dev()  -------------------------------------------*/
    $ret .= '</div>';
    return $ret;
}


function get_checkbox_any_table(
    $table,
    $field,
    $id,
    $id_field = 'id',
    $with_comment = false,
    $tt_hint_key = '',
    $label_text = '',
    $with_panel = false,
    $ax_response = false,
    $input_style = '',
    $label_style = 'font-weight:bold',
    $with_tooltip = false,
    $tt_class = 'tip',
    $tt_width = '300px',
    $with_page_reload = false, //set true for immediate page reload
    $this_value = '', // if $from_inside_loop = true set to: $model->fieldname otherwise leave empty
    $from_inside_loop = false, //$this_value is only possible if checkbox comes from foreach...
    $as_switch = false,
    $switch_size = 'sm', //xs, sm, no, lg -- no = normal - is there really a xs size?
    $dev_only = false  //only display this when is_dev() == true
)
{
    //todo remove unneeded parameters above
    if($dev_only and ! is_dev()) return '';

    if($table=='languages' and $field == 'status') Cache::forget( 'languages.status.1.all' );
    if($table=='languages' and $field == 'status_frontend') Cache::forget( 'languages.status.1.all' );

    $ident = zuf();
    if ($with_page_reload) $ax_response = false;
    $t_key = $id;
    if (! $from_inside_loop) {
        if($table=='diverses' and $field='div_res' and $id_field =='div_what'){
            create_dv($id, '1',true);
            $this_value = get_dv($id);
        }else{
            $this_value = lookup($table, $field, $id, $id_field);
        }

    }
    if ($this_value == '1') {
        $bg_color = '#eef7ea'; //panel bg
        $checked = ' checked="checked" ';
        $checked_txt = '';
    } else {
        $bg_color = '#f6f6f6'; //panel bg
        $checked = '';
        $checked_txt = '';
    }

    if ($with_panel) $with_tooltip = false;

    $tt = '';
    //dd($tt_class);
    if ($with_tooltip) {
        $what = $id;
        $tt = tooltip($what, $tt_class, $tt_width, $style='margin:4px');
    }

    $ret = '';
    if ($with_panel) {
        //todo  class or data-attribute for parent und/oder child relations
        $ret .= '
        <div id="wrp_' . $id . '" class="container round6 " 
        style="padding:9px;margin:4px 0;background:' . $bg_color . ';border:1px #ddd solid;">';
    }else{
        /*$ret .= '
        <div id="wrp_' . $id . '" class="container round6 "
        style="padding:9px;margin:4px 0;background:' . $bg_color . ';border:1px #ddd solid;">';*/

        $ret .= '<div id="wrp_' . $id . '" class="" style="display:inline-block">';
    }

    $cb_construct = '';
    $page_reload_indic = '0';
    if ($with_page_reload) $page_reload_indic = '1';
    $js_construct = '
            onclick="
            checkbox_to_any_table(
            this.checked, 
            \'' . $ident . '\',
            \'' . $table . '\',
            \'' . $field . '\',
            \'' . $id_field.'\',
            \'' . $id . '\',
            \''.$page_reload_indic.'\'
            );"
     ';
    if ($as_switch) {
        if($label_text<>'') $cb_construct .= '<span style="'.$label_style.'">'.$label_text.'</span>';
        $float = '';
        /*if ($with_panel or 1==1 ) {*/
        if ($with_panel and $label_text == '') {
            $float = 'float-right';
        }
        $lable_title='';
        if(is_dev()) $lable_title='title="DEV: '.$t_key.' - get_checkbox_any_table() "';
        $cb_construct .= '<span class="'.$float.'">'.$tt.'</span>';
        $cb_construct .= '
        <label '.$lable_title.' class="switch switch-text switch-pill switch-success switch-'.$switch_size.' '.$float.' zoom100">
        <input '.$js_construct.' type="checkbox" class="switch-input" '.$checked.'>
        <span class="switch-label assi_utils_box_shadow" data-on="On" data-off="Off"></span>
        <span  class="switch-handle"></span>';

        $cb_construct .= '</label>';
    } else {
        $cb_construct .= '<div class="checkbox checkbox-success" style="display:inline">';
        if($label_text<>'') $cb_construct .= '<div style="display:inline;'.$label_style.'">
        <sub style="font-size:1.0em">'.$label_text.'</sub></div>';
        $cb_construct .= '<input '.$js_construct.' class="styled" type="checkbox" id="' . $ident . '" '.$checked.'>
        <label for="' . $ident . '"></label>';
        $cb_construct .= $tt;
        $cb_construct .= '</div>';
    }

    if ($ax_response) $cb_construct .= '<span style="float:right;margin-left:5px;width:45px;" id="' . $ident . '_conf">' . $checked_txt . ' &nbsp; &nbsp; &nbsp; </span>';
///////////////////////////////
    $ret .= $cb_construct;
/////////////////////////////////

    if ($with_panel) {
        $what = $id;
        $hint_txt = get_hint_by_t_key($what, $text_only = false);

        $add_l = '&lang=all'; //defaults to session_lang()
        $add_l .= '&curr_lang'; //defaults to session_lang()

        $edit_link_long = '<a class="fancybox-effects-d fancybox.iframe btn btn-link btn-xs dimmed04" type="button" title="edit" 
            href="' . url('admin/dashboard/pop1?key=' . $what . $add_l . '') . '">edit</a>';
        $ret .= '
           <div id="wrp_' . $ident . '"  class="round6" 
           style="margin-top:7px">' . $hint_txt ;
        $ret .= '</div>';
    }

    /*-----------------------  DEV Options only visible if is_dev()  -------------------------------------------*/
    if (is_dev() and $with_panel) {
        $ret .= '<div id="dev_only_'.$ident.'">';
        $ret .= '<div class="text-center" style="width:100%;color:#bbb;font-size:0.8em;border-top:1px #ddd solid">
        <a title="hide" href="javascript:toggle(\'dev_only_'.$ident.'\')">DEV only:</a></div>';
        /*------------ 1. line - rename ------------------------*/
        $ret .= '<div class="text-center dimmed04" style="padding:4px 6px">';
        $ret .= "table: <b>$table</b> &nbsp; field: <b>$field</b> &nbsp; id: <b>$id</b> &nbsp; id_field: <b>$id_field</b>";
        $ret .= '</div>'; // id="dev_only_'.$ident.'"
        $ret .= '</div>'; // id="dev_only_'.$ident.'"
    }
    /*----------------------- END  DEV Options only visible if is_dev()  -------------------------------------------*/

    if ($with_panel or 1==1) $ret .= '</div>';
    $ret .= '<span style="width:35px" id="' . $ident . '_conf"></span>';
    return $ret;
}

function get_actionbox_div(
    $what,
    $axfe_id = '999999', //which action to execute in myhelper_ax.php
    $button_title = 'Diese Aktion jetzt ausführen',
    $with_panel = false,
    $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
    $ax_response_with_page_reload = false,
    $with_tooltip = true, //becomes false if $with_panel = true
    $tt_class = 'tip',
    $tt_width = '350px'
)
{

    $ident = zuf();
    create_dv($what, $value = '1',true, $field = 'div_res'); //only if not exists
    $bg_color = '#eef7ea';
    if ($with_panel) {
        $with_tooltip = false;
    }
    $tt = '';
    $ret = '';
    $add_style = '';
    if (right($what, 9) == 'is_active') $add_style = ';border: 4px #aca solid';

    //todo  class or data-attribute for parent und/oder child relations
    $ret .= '
    <div id="wrp_' . $what . '_' . $ident . '" class="round4"
    style="background:' . $bg_color . ';' . $wrapper_style . $add_style . ';border:1px #ddd solid;padding-bottom:6px">';

    $hint_txt = get_hint_by_t_key_short($what, $text_only = true);
    $add_l = '&lang=all';
    $add_l .= '&curr_lang'; //defaults to session_lang()
    $add_style = '';


    /*--------------  BEGIN $edit_link_short ----------------------------*/
    //short text
    $edit_txt_short = 'edit';
    $edit_txt_short_hint = '';
    if(find_missing_translation($what, false)){
        $edit_txt_short_hint = ' - es fehlen Übersetzungen!';
        $edit_txt_short = 'edit!';
    }

    $edit_link_short = '
    <a class="dimmed04 ml-1" title="diesen kurzen Text editieren in allen Sprachen'.$edit_txt_short_hint.'"  
    data-fancybox data-type="iframe" data-src="' . url('/dashboard/pop_div_res_short?key=' . $what . $add_l . '') . '" href="javascript:;">
    <sup><i>' . $edit_txt_short . '</i></sup></a>';
    /*--------------  END $edit_link_short ----------------------------*/

    /*-------------- BEGIN  $edit_link_long ----------------------------*/
    $edit_txt_long = 'edit';
    $edit_txt_long_hint = '';
    if(find_missing_translation($what, true)){
        $edit_txt_long = 'edit!';
        $edit_txt_long_hint = ' - es fehlen Übersetzungen!';
    }

    $edit_link_long = '
            <a title="diesen langen Text editieren in allen Sprachen'.$edit_txt_long_hint.'"  
            data-fancybox data-type="iframe" data-src="' . url('/dashboard/pop1?key=' . $what . $add_l . '') . '" href="javascript:;">
            ' . $edit_txt_long . ' </a>';
    /*-------------- END $edit_link_long ----------------------------*/

    /*########################*/
    $page_reload_indic = '0';
    $with_page_reload = $ax_response_with_page_reload;
    /*########################*/

    if ($with_page_reload) $page_reload_indic = '1';
    $js_construct = 'onclick="exec_exec_box(\''.$hint_txt.'\',\''.$axfe_id.'\',\''.$page_reload_indic.'\',\''.$ident.'\')"';
    //$t_title = ' title=' . $what . ' ';
    $tt = '';
    if ($with_tooltip) {
        $tt = '<span class="float-right"> &nbsp; ' . tooltip($what, $tt_class, $tt_width) . '</span>';
    }
    $ret .= $tt;
    /*--------------  begin button_construct  ----------------------------*/
    $button_construct = '';
    $button_construct .= '<span id="exec_'.$ident.'_'.$axfe_id.'_conf" class="_float-right" style="margin-left:-90px"></span>';
    $button_construct .= '<a class="btn btn-primary btn-sm float-right" '.$js_construct.' href="#">
                        '.$button_title.'</a>';
    /*----------------  end button_construct  ----------------------------*/
    $ret .= '<div class="" style="min-height:30px;padding:10px 10px 4px 10px;">';
    $t_font_size = '1.2em';
    $ret .= '<div  class=""
    style="display:inline-block;padding:4px 8px 0 0;margin:-10px 40px 6px 0;background:none;box-shadow:none;
    min-width:400px;max-width:700px;font-weight:bold;font-size:' . $t_font_size . '">' . strip_tags($hint_txt) . $edit_link_short . '</div>';

    /*########################*/
    $ret .= $button_construct;
    /*########################*/
    $ret .= '</div>';

    if ($with_panel) {
        $hint_txt = get_hint_by_t_key($what, $text_only = false);

        $add_l = '&lang=all'; //defaults to session_lang()
        $add_l .= '&curr_lang'; //defaults to session_lang()

        $ret .= '
           <div id="wrp_' . $ident . '"  class="round6"
           style="margin-top:7px">' . $hint_txt ;
        $ret .= '</div>';
    }
    /*----------------------- Superadmin/DEV Options  -------------------------------------------*/
    if (is_dev() and $with_panel) {
        $ret .= '<div id="dev_only_'.$ident.'">';
        $ret .= '<div class="text-center" style="width:100%;color:#bbb;font-size:0.8em;border-top:1px #ddd solid">
        <a title="hide" href="javascript:toggle(\'dev_only_'.$ident.'\')">DEV only:</a></div>';
        /*------------ 1. line - rename  -- !! after renaming you must change also $what accordingly !!  ------------------------*/
        $ret .= '<div class="dimmed04" style="margin:5px 0 2px 12px"><input id="old_name_' . $what . '" onClick="this.select()" style="width:40%;max-width:290px;padding:0 4px;background:#ffe" type="text" value="' . $what . '">';

        $ret .= ' &nbsp; rename to: &nbsp; <input id="new_name_' . $what . '" style="width:40%;max-width:290px;padding:0 4px;background:#fff" type="text" value="' . $what . '"> <a href="javascript:update_div_what_key(\'' . $what . '\')">go</a>';
        $ret .= '<span id="' . $what . '_conf"></span>';
        $ret .= '</div>';
        /*------------ 2. line - copy ------------------------*/
        $ret .= '<div class="dimmed04" style="margin:5px 0 2px 12px"><input id="old_name2_' . $what . '" onClick="this.select()" style="width:40%;max-width:290px;padding:0 4px;background:#ffe" type="text" value="' . $what . '">';

        $ret .= ' &nbsp; copy to: &nbsp; &nbsp; &nbsp; <input id="new_name2_' . $what . '" style="width:40%;max-width:290px;padding:0 4px;background:#fff" type="text" value="' . $what . '"> <a href="javascript:replicate_div_what_key(\'' . $what . '\')">copy</a>';
        $ret .= '<span id="' . $what . '_conf2"></span>';
        $ret .= '</div>';
        /*------------ 3. line - copy ------------------------*/
        /*axfe_id :  is the unique case number in myhelper_ax.php to be executed - check file */
        $ret .= '<div class="dimmed04" style="margin:5px 0 2px 12px">axfe-id:  <b>'.$axfe_id.'</b> - with page-reload: <b>'.$page_reload_indic.'</b></div>';
    }
    $ret .= '</div>';
    $ret .= '</div>';
    return $ret;
}
function edit_text_in_div(
    $table = 'diverses',
    $field,
    $id,
    $id_field = 'div_what',
    $with_break = true,
    $lang = 'all',
    $with_info = false,
    $style = 'width:30px;padding-left:4px',
    $class = 'inline_txt_any_table',
    $this_is_html_editor = false
)
{
    $r = '';
    //dd(__line__.': '.$field);
    if ($lang <> 'all') {
        return edit_text_in_any_table($table, $field, $id, $id_field, $with_break, $lang, $with_info, $style, $class,
            $show_translation_opt = true,
            $this_value = '',
            $from_inside_loop = false);
    }

    $languages = get_languages(); // array - all activated langs incl. frontend in directory order

    $r .= '<div class="round6" style="padding:0 0 20px 0;border:1px #ccc solid;background:#F5F6F7">';
    $r .= '<div class="round6" style="padding:6px 10px;margin:0 0 16px 0;font-size:1.2em;background:#f7f7f7;color:#aaa;border-bottom:1px #ccc solid;">';
    if (stristr($field, 'div_res_long')) {
        $r .= '<b>Text im HTML-Format in allen aktivierten Sprachen bearbeiten und automatisch oder manuell übersetzen</b> <span style="font-size:0.82em;margin-left:4px">';
        $r .= tooltip(
            'text_in_all_langs_hint',
            $tt_class = 'tip',  // tip oder tip_lu = position rechts-unten oder links-unten
            $tt_width = '400px',  // with px
            $tt_lang = 'all',  // force a lang other than session lang
            $tt_style = '',
            $tt_icon = '' // force an icon other than default icon
        );
        $source = $id_field . ' = <b>' . $id . '</b> in ' . $table . ' ' . $field . '_<i style="color:#66c">lang</i>';
        if (is_dev()) $r .= '<span class="pull-right">' . $source . '</span>';
    } else {
        $r .= '<b>Kurze Texte (max. 250 Zeichen) in allen Sprachen bearbeiten <span class="dimmed04">(div_res)</span></b> <span style="font-size:0.82em;margin-left:4px">';
        $r .= tooltip(
            'string_in_all_langs_hint',
            $tt_class = 'tip',  // tip oder tip_lu = position rechts-unten oder links-unten
            $tt_width = '450px',  // with px
            $tt_lang = 'all',  // force a lang other than session lang
            $tt_style = '',
            $tt_icon = '' // force an icon other than default icon
        );
        $source = $id_field . ' = <b>' . $id . '</b> in ' . $table . ' ' . $field . '_<i style="color:#66c">lang</i>';
        if (is_dev()) $r .= '<span class="pull-right">' . $source . '</span>';
    }

    $r .= '</span></div>';

    if (stristr($field, 'div_res_long')) {
        $r .= '<div style="padding:3px 6px 9px 6px;margin:0 0 6px 0;">';
        if(!$this_is_html_editor)  $r .= '<a class="btn btn-default btn-sm" data-fancybox="" data-src="' . env('APP_URL') . '/admin/dashboard/pop1?key=' . $id . '&amp;lang=all&amp;curr_lang"  
href="javascript:;">Text (alle Sprachen) im HTML-Editor öffnen (Popup)</a>';

        if(!$this_is_html_editor) $r .= tooltip(
            'get_html_editor_hint',
            $tt_class = 'tip',  // tip oder tip_lu = position rechts-unten oder links-unten
            $tt_width = '300px',  // with px
            $tt_lang = 'all',  // force a lang other than session lang
            $tt_style = '',
            $tt_icon = '' // force an icon other than default icon
        );

        if(!$this_is_html_editor) $r .= '<a style="margin-left:18px" class="filemanager-fullscreen btn btn-default btn-sm" href="' . env('APP_URL') . '/admin/dashboard/pop1?key=' . $id . '&amp;lang=all&amp;curr_lang"  
>Text (alle Sprachen) im HTML-Editor öffnen</a>';

        if(!$this_is_html_editor) $r .= tooltip(
            'get_html_editor_fullscreen_hint',
            $tt_class = 'tip',  // tip oder tip_lu = position rechts-unten oder links-unten
            $tt_width = '300px',  // with px
            $tt_lang = 'all',  // force a lang other than session lang
            $tt_style = '',
            $tt_icon = '' // force an icon other than default icon
        );

        if (use_translations() ) {
            $r .= '<div class="pull-right round6 dimmed06" style="display:inline-block;padding:6px;margin:-15px 0 -12px 0;background:#fff;font-size:0.9em;border:none">';
            $r .= 'Autom. und/oder manuelle Übersetzungen: ';

            $r .= tooltip('auto_translation_hint', $tt_class = 'tip_lu',  // tip oder tip_lu = position rechts-unten oder links-unten
                $tt_width = '500px',  // with px
                $tt_lang = 'all',  // force a lang other than session lang
                $tt_style = '', $tt_icon = '' // force an icon other than default icon
            );

            $r .= '</div>';
        }
        $r .= '</div>';
    } else {
        $r .= '<div style="padding:3px 6px 9px 6px;margin:0 0px 6px 0;min-height:35px;">';

        if (use_translations()) {
            $r .= '<div class="pull-right round6 dimmed06" style="display:inline-block;
            padding:6px;margin:0 9px 0 0;background:#fff;font-size:0.9em;">';
            $r .= 'Autom. und/oder manuelle Übersetzungen:';

            $r .= tooltip('auto_translation_hint', $tt_class = 'tip_lu',  // tip oder tip_lu = position rechts-unten oder links-unten
                $tt_width = '450px',  // with px
                $tt_lang = 'all',  // force a lang other than session lang
                $tt_style = '', $tt_icon = '' // force an icon other than default icon
            );

            $r .= '</div>';
        }

        $r .= '</div>';

    }

    foreach ($languages as $lang) {
        $this_lang = $lang->code;
        $r .= '<div style="padding-top:4px; margin:3px 60px 3px 8px;border-top: 0 #eee solid">';

        if ($table == 'diverses') {
        $r .= '<div style="display:inline-block; width:165px;color:#444;font-size:0.9em;vertical-align:top">' . flag_icon($lang->code) . ' <b>' . $lang->name . mark_missing_translation_with_icon($id, $lang->code, true) . '</b></div>';
//dd(__line__.': '.$this_lang);
            $r .= edit_text_in_any_table($table, $field, $id, $id_field, $with_break, $this_lang, $with_info, $style, $class,
                $show_translation_opt = true,
                $this_value = '',
                $from_inside_loop = false,
                $with_page_reload = true);
        }
        if ($table == 'language_lines') {
            $r .= '<div style="display:inline-block; width:135px;color:#444;font-size:0.9em;vertical-align:top">' . flag_icon($lang->code) . ' <b>' . $lang->name . mark_missing_translation_with_icon_language_lines($id, $lang->code, true) . '</b></div>';
            $r .= edit_text_in_any_table($table, $this_lang, $id, $id_field, $with_break, $this_lang, $with_info, $style, $class,
                $show_translation_opt = true,
                $this_value = '',
                $from_inside_loop = false,
                $with_page_reload = true);
        }
        //dd(__line__.': '.$table);

        $r .= '</div>';
    }

    $r .= '</div>';
    return $r;
}


function edit_text_in_any_table(
    $table,
    $field,
    $id,
    $id_field = 'id',
    $with_break = true,
    $lang = '',
    $with_info = false,
    $style = '',
    $class = 'inline_txt_any_table',
    $show_translation_opt = true,
    $this_value = '', //leave empty if $from_inside_loop = false - otherwise use $object->field
    $from_inside_loop = false,
    $with_page_reload = false
)
{
    //dd(__line__.': '.$lang);
    if($with_page_reload){
        $with_page_reload = '1';
    }else{
        $with_page_reload = '0';
    }
    $r = '';
    $ident = zuf();

    if ($table == 'diverses' and $id_field == 'div_what') {
        if($lang<>'') $field = $field . '_' . $lang;
    }
    //dd(__line__.': '.$field);
    if ($from_inside_loop) {
        $curr_val = $this_value;
    } else {
        if($table=='diverses'){
            $curr_val = get_dv($id, $field);
        }else {
            $curr_val = lookup($table, $field, $id, $id_field);
        }
    }

    if (stristr($field, 'div_res_long')) {
        $r .= '<textarea class="tinymce_basic" id="' . $ident . '" name="' . $ident . '" style="width:600px;height:50px;margin-right:9px;vertical-align:bottom">';
        $r .= $curr_val;
        $r .= '</textarea>';
    } else {
        $r .= '<input onKeypress="save_on_enter(\'' . $ident . '\',event)" id="' . $ident . '" class="' . $class . '" ';
        $r .= 'style="' . $style . ';background:#fff" ';
        $r .= 'type ="text" value="' . $curr_val . '" /> ';
    }

    if ($with_break) {
        $r .= '<br><a id="' . $ident . '_save" class="' . $class . '_save dimmed08 btn btn-success btn-xs mt-5" style="vertical-align:bottom" ';
    } else {
        $r .= '<a id="' . $ident . '_save" class="' . $class . '_save dimmed08 btn btn-success btn-xs ml-3" style="vertical-align:top" ';
    }
    $r .= 'href="javascript:';
    //js: text_to_any_table(ident ,table, field, id, id_field, with_page_reload)
    $save_txt = 'save';
    if($with_page_reload) $save_txt = 'save & reload';

    //dd(__line__.': '.$field.' - '.$lang);
    if ($lang <> '') {
            $r .= 'text_to_any_table(\'' . $ident . '\',\'' . $table . '\',\'' . $field . '\',\'' . $id . '\',\'' . $id_field . '\',\'' . $with_page_reload . '\')">' . $save_txt . ' (' . $lang . ')</a>';
    } else {
        $r .= 'text_to_any_table(\'' . $ident . '\',\'' . $table . '\',\'' . $field . '\',\'' . $id . '\',\'' . $id_field . '\',\'' . $with_page_reload . '\')">'.$save_txt.'</a>';
    }
    $r .= ' <span style="width:35px;vertical-align:top;display:inline-block" id="' . $ident . '_conf"></span>';
    $source = $id_field . ' = <b>' . $id . '</b> in ' . $table . ' ' . $field;

    if (use_translations() and $show_translation_opt) {
        $languages = get_languages();
        $r .= '<div class="pull-right dimmed06 round6" style="display:inline;margin:0 0 0 0 ;font-size:0.9em;padding:6px;border: 1px #ccc solid;background:#def;width:260px">';
        $r .= '<div style="margin:-5px 0 5px 0" class="badge badge-pill badge-primary float-right">auto</div> übersetzen von <b>' . lang_name_from_lang_code($lang) . '</b> ... ';
        $r .= '<br>';
        $r .= '<select style="margin-right:8px">';
        $r .= '<option value="">bitte wählen</option>';
        $r .= '<option value="all">in alle anderen Sprachen</option>';
        $r .= '<option value="all_empty">in alle leere Sprachen</option>';
        foreach ($languages as $langs) {
            if ($langs->code <> $lang) {
                $r .= '<option value="' . $langs->code . '">nach ' . $langs->name . ' (' . $langs->code . ')</option>';
            }
        }

        $r .= '</select>';
        $r .= '';
        $r .= '<a title="translate" class="' . $class . '_save btn btn-default btn-xs" style="vertical-align:top;margin-top:-1px" ';
        $r .= 'href="javascript:alert(\'in Arbeit\')';
        $r .= '">Go</a>';
        $r .= '';

        $r .= '</div>';
    }

    if (stristr($field, 'div_res_long')) {
        if ($with_info and is_dev()) {
            $r .= '<div style="margin:-1px 0 0px 400px;color:#999;font-size:0.8em" class="dimmed04">' . $source . '</div>';
        }
    } else {
        if ($with_info and is_dev()) {
            $r .= '<div style="margin:-12px 0 13px 400px;color:#999;font-size:0.8em;" class="dimmed04">' . $source . '</div>';
        } else {
            $r .= '<div style="margin:-9px 0 10px 0px;color:#999;font-size:0.8em;" class="dimmed04">&nbsp;</div>';
        }
    }
    return $r;
}


function get_colorpicker_any_table(
    $table = 'diverses',
    $field = 'div_res',
    $id,
    $id_field = 'div_what',
    $with_comment = false,
    $hint_key = '',
    $label_text = '',
    $with_panel = false,
    $with_tooltip = false,
    $ax_response = false,
    $text_first = false,
    $input_style = '',
    $label_style = 'font-weight:bold',
    $cb_type = '',
    $tt_class = 'tip',
    $tt_width = '300px',
    $panel_class = '',
    $panel_style = ''
)

{
    $ident = hash('sha1', $table . zuf());
    if ($cb_type == '') $cb_type = 'success';

    $what = $id;

    create_dv($what, $value = '',true, $field = 'div_res');

    $curr_color = lookup($table, $field, $id, $id_field);
    if ($curr_color == '') $curr_color = '#ffffdd';
    //$curr_color = '#ffffdd';


    $checked = '';
    $bg_color = '#eef7ea';


    if ($with_panel) $with_tooltip = false;
    $tt = '';
    if ($with_tooltip) {
        $tt = ' &nbsp; ' . tooltip(
                $what,
                $class = $tt_class,  // tip oder tip_lu = position rechts-unten oder links-unten
                $width = $tt_width,  // with px
                $lang = '',  // hints are multilang
                $style = '',
                $icon = '' // force an icon other than default icon
            );
    }

    $ret = '';

    if ($with_panel) {
        $ret .= '
        <div id="wrp_' . $ident . '" class="panel panel-default" 
        style="padding:2px 6px 0 9px;margin:4px 0;background:' . $bg_color . ';padding-bottom:6px">';

        //$title_txt = 'Farbe für den Hintergrund wählen';
        $title_field = 'div_res_de';

        $ret .= edit_text_in_any_table($ident, $table, $title_field, $id, $id_field, $with_break = false, $all_langs = true, $style = 'width:500px;padding-left:4px;font-weight:bold', $class = 'inline_txt_any_table');

        $hint_txt = get_hint_by_t_key($what, $text_only = true);

        $add_l = '&lang=all'; //defaults to session_lang()
        $add_l .= '&curr_lang'; //defaults to session_lang()

        $edit_link = '';
        if (is_dev()) $edit_link = '<div style="font-size:0.8em" class="pull-right">
            <a class="fancybox-effects-d fancybox.iframe btn btn-link btn-xs dimmed04" type="button" title="edit" 
            href="' . url('admin/dashboard/pop1?key=' . $what . $add_l . '') . '">editxx4</a>
        </div>';

        $ret .= '
        <div id="wrp_' . $ident . '" class="panel panel-default" 
        style="padding:4px 4px 0px 4px;margin:5px auto 3px 0;border-style: solid;max-width:500px;border-radius:0;background:#fff">' . strip_tags($hint_txt) . $edit_link . '</div>';
    }


    $ret .= '<div style="margin:6px 0 5px 2px">
            <input type="text" id="' . $id . '" /> ' . $tt . ' <em id="' . $id . '_log"></em> <span id="' . $ident . '_conf"></span> </div>';


    $ret .= '<script>
$(document).ready(function() {
    $("#' . $id . '").spectrum({
    color: "' . $curr_color . '",

    showInput: true,
    className: "full-spectrum",
    showInitial: true,
    showPalette: true,
    //showSelectionPalette: true,
    //maxSelectionSize: 10,
    preferredFormat: "hex",
    localStorageKey: "spectrum.demo",

    showPaletteOnly: true,
    togglePaletteOnly: true,


    move: function (color) {
        
    },
    show: function () {
    
    },
    beforeShow: function () {
    
    },
    hide: function () {
    
    },
    change: function(color) {
        ax_jq(\'/axfe\',\'id=103_\'+color.toHexString()+\'_xyx_\'+\'' . $ident . '\'+\'_xyx_\'+\'' . $table . '\'+\'_xyx_\'+\'' . $field . '\'+\'_xyx_\'+\'' . $id_field . '\'+\'_xyx_\'+\'' . $id . '\',\'' . $ident . '\'+\'_conf\');
        $("#' . $id . '_log").text("gewählt: " + color.toHexString());
    },
        palette: [ ]
    });

});
</script>';

    /*if( $ax_response)  $ret .= '<span style="margin-left:9px" id="'.$ident.'_conf">'.$checked_txt.'</span>';*/


    if ($with_panel) $ret .= '</div>';


    return $ret;
}


function date_time_picker_new_any_table(
    $table,
    $field,
    $id,
    $id_field = 'id',
    $label_text = 'Single DateTime Picker - save to any table:',
    $date_to_sql = 'false',
    $picker_type = '', //datetime, date, time
    $with_tooltip = false,
    $ax_response = false,
    $panel_class = '',
    $panel_style = 'width:310px;border:1px #ccc solid;padding:6px;background:#EEF7EA',
    $input_style = 'font-size:1.2em;color:#00c',
    $label_style = 'font-weight:bold',
    $tt_class = 'tip',
    $tt_width = '300px'
)
{
    $dateonly = false;
    if ($picker_type == 'date') $dateonly = true;
    $ident = zuf();

    $curr_value = lookup($table, $field, $id, $id_field);
    //dd($field);
    if ($curr_value == '') $curr_value = '2016-01-01 00:00:00';
    //if($picker_type=='date') $curr_value = str_replace(' 00:00:00','',$curr_value);
    $ts = strtotime($curr_value);

    $locale = session_lang_code_datepicker();
    if ($locale == 'de') {
        if ($dateonly) {
            $val = date("d. M Y", $ts);
        } else {
            $val = date("d. M Y - H:i", $ts);
        }
        //$val = datestring_translate($val);
    } else {
        if ($dateonly) {
            $val = date("M-d-Y", $ts);
        } else {
            $val = date("M-d-Y - H:i", $ts);
        }
    }

    $tt = '';
    if ($with_tooltip) $tt = tooltip(
        'date_time_picker_hint',
        $tt_class = 'tip',  // tip oder tip_lu = position rechts-unten oder links-unten
        $tt_width = $tt_width,  // with px
        $tt_lang = 'all',  // tooltips sind immer hints also immer multilang (div_res_long)
        $tt_style = '',
        $tt_icon = '' // force an icon other than default icon
    );
    $ret = '';

    /*data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii " data-link-field="dtp_input1"*/


    $ret .= '
<div class="form-group round6 " style="border:1px #ccc solid;padding:9px;background:#EEF7EA">
    <label for="dtp_input1" class="control-label">' . $label_text . $tt . '</label><br>
    <div class="input-group date form_datetime col-md-4"  style="margin-bottom:6px">

    <span class="input-group-addon" style="background:#eee"><span class="glyphicon glyphicon-th"></span></span>

    <input id="wrp_' . $ident . '" class="form-control" style="font-size:1.2em;color:#00c;background:#fff" type="text" value="' . $val . '" readonly>

<span class="input-group-addon" id="hgreen" style="background:#00a65a">
<a title="save" href="javascript:date_to_any_table(\'' . $ident . '\' ,\'' . $table . '\', \'' . $field . '\', \'' . $id . '\', \'' . $id_field . '\',\'' . $date_to_sql . '\')">

<span style="color:#ddd" class="glyphicon glyphicon-ok"></span>
    </a></span>

        </div>
        <span style="margin-left:35px;font-weight:bold;font-size:1.2em;color:#00a65a" id="' . $ident . '_conf">&nbsp;</span>
        <input type="text" id="' . $ident . '" value="' . $curr_value . '" /><br/>
        </div>
';

    $js_format1 = 'dd. MM yyyy - HH:ii';
    $js_format2 = 'yyyy-mm-dd HH:ii';
    if ($dateonly) {
        $js_format1 = 'dd. MM yyyy';
        $js_format2 = 'yyyy-mm-dd';
    }

    /*https://eonasdan.github.io/bootstrap-datetimepicker/*/

    $ret .= "


<script type=\"text/javascript\">
$(document).ready(function() {
    $('.form_datetime').datetimepicker({
        language:  '" . session_lang_code_datepicker() . "',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 0,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 0,
        pickerPosition: 'bottom-right',
        format: '" . $js_format1 . "',
        linkField: '" . $ident . "',
        linkFormat: '" . $js_format2 . "'
    });

        $(\"#wrp_" . $ident . "\").on(\"change\", function (e) {
           // $('#datetimepicker7').data(\"DateTimePicker\").minDate(e.date);
            //alert( $('#wrp_" . $ident . "').val() );
            $('#" . $ident . "').value = $('#wrp_" . $ident . "').val();
        });

});
</script>
";

    $ret .= '';
    $ret .= '';

    return $ret;

}


function get_select_by_t_key(
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
    $wrapper_style = 'margin:4px 0;'
)
{
    $with_panel = false;
    $table = 'diverses';
    $field = 'div_res';
    $id_field = 'div_what';

    $ident = zuf();
    $bg_color = '#eef7ea';
    $what = $t_key;

    if (is_dev()) create_dv($t_key, $value = '300px', true, $field = 'div_res');

    $curr_value = get_dv($t_key);
    if ($with_panel) {
        $with_tooltip = false;
    }
    $tt = '';
    $ret = '';

    if ($with_panel) {
        //todo  class or data-attribute for parent und/oder child relations
        $ret .= '
        <div id="wrp_' . $t_key . '" class="round4"
        style="background:' . $bg_color . ';padding:2px 6px;border:1px #ddd solid;' . $wrapper_style . ';">';
    }

    $hint_txt = get_hint_by_t_key_short($what, $text_only = true);
    $add_l = '&lang=all';
    $add_l .= '&curr_lang'; //defaults to session_lang()

    $add_style = '';

    $edit_txt = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>';

    $edit_link_long = '
    <div style="margin-top:12px;font-size:0.8em;display:inline-block;' . $add_style . '" class="pull-right">
    <a class=" btn btn-link btn-xs dimmed04" ' . find_missing_translation_get_color($what, true) . '" type="button" title="edit"
    data-fancybox data-src="' . url('admin/dashboard/pop1?key=' . $what . $add_l . '') . '" href="javascript:;">
    ' . $edit_txt . ' </a></div>';


    //short text
    $edit_txt_short = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
    $edit_txt_short_hint = '';
    if(find_missing_translation($what, false)){
        $edit_txt_short = '<i style="color:red" class="fa fa-pencil-square-o" aria-hidden="true"></i>';
        $edit_txt_short_hint = ' - es fehlen Übersetzungen!';
    }

    //long text
    $edit_txt_long = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
    $edit_txt_long_hint = '';
    if(find_missing_translation($what, true)){
        $edit_txt_long = '<i style="color:red" class="fa fa-pencil-square-o" aria-hidden="true"></i>';
        $edit_txt_long_hint = ' - es fehlen Übersetzungen!';
    }

    $edit_link_long = '
        <div class="short-hint-edit-link dimmed06" style="margin-top:14px;display:inline-block;' . $add_style . ';" class="pull-right">
        <a title="diesen langen Text editieren in allen Sprachen'.$edit_txt_long_hint.'"  
        data-fancybox data-type="iframe" data-src="' . url('/dashboard/pop1?key=' . $what . $add_l . '') . '" href="javascript:;">
        ' . $edit_txt_long . ' </a></div>';


    $edit_link_short = '
        <div class="short-hint-edit-link dimmed06" style="margin-left:24px;' . $add_style . ';">
        <a title="diesen kurzen Text editieren in allen Sprachen'.$edit_txt_short_hint.'"  
        data-fancybox data-type="iframe" data-src="' . url('/dashboard/pop_div_res_short?key=' . $what . $add_l . '') . '" href="javascript:;">
        ' . $edit_txt_short . '</a></div>';

    $ret .= '
    <div class="" style="">  ';


    $ret .= '<span class="pull-right" style="margin-right:0">';
    $ret .= '<span style="margin-right:12px">aktueller Wert: 
            <span style="font-weight:bold;min-width:35px;display:inline-block"  id="conf_' . $ident . '">' . $curr_value . '</span></span>';

    $ret .= '<span style="color:#aaa;margin-right:6px">Bitte wählen: </span><select class="round4 assi_utils_box_shadow" id="select_' . $ident . '" style="' . $style . ';
        padding:3px 4px;margin:3px 0 -3px 0;border:1px #ccc solid;"
            onchange="set_div(this.options[selectedIndex].value, \'' . $what . '\', \'' . $ident . '\')">';
    /*################ select construct #########################*/
    if(trim($t_key_arr)=='') {
        for ($i = $arr_from; $i <= $arr_to; $i = $i + $arr_step) {
            $sel = '';
            if ((int)($curr_value == $i)) $sel = 'selected';
            $ret .= '<option ' . $sel . ' value = "' . $pref . $i . $suff . '">' . $pref . ' ' . $i . ' ' . $suff . '</option>';
        }
    }else{

        $t_options_arr = explode(',',$t_key_arr);
        //dd(count($t_options_arr));
        for ($i = 0; $i < count($t_options_arr); $i++) {
            $sel = '';
            if ((int)($curr_value == ($i+1))) $sel = 'selected';
            $ret .= '<option ' . $sel . ' value = "' . ($i+1) . '">' . ($i+1) .'. '. $t_options_arr[$i] . '</option>';
        }


    }
    /*################ select construct #########################*/
    $ret .= '</select>';

    $ret .= '</span>';

    $t_font_size = '1.2em';

    $ret .= '
    <div id="__wrp_' . $ident . '" class="panel panel-default"
    style="display:inline-block;padding:4px 8px;margin:0 0 6px 0;background:none;border: none;box-shadow:none;
    min-width:400px;max-width:700px;font-weight:bold;font-size:' . $t_font_size . '">' .
        strip_tags($hint_txt) . $edit_link_short . '</div>';

    $tt = '';
    if ($with_tooltip) {
        $tt = ' &nbsp; ' . tooltip($what, $tt_class = $tt_class,  // tip or tip_lu = position right-bottom or left-bottom
                $tt_width = $tt_width,  // with px
                $tt_lang = 'all',  // force a lang other than session lang
                $tt_style = '',
                $tt_icon = '' // force an icon other than default icon
            );
    }
    $ret .= $tt;

    $ret .= '</div>';

    if ($with_panel) {
        $ret .= '<div class="pull-right" style="margin:0 8px 0 0">' . $edit_link_long . '</div>';
        $hint_txt = get_hint_by_t_key($what, $text_only = true);

        $ret .= '
        <div id="wrp_' . $ident . '" class="panel panel-default round6 assi-longtxt"
        style="">' . ' ' . $hint_txt . '</div>';
    }

    if (is_dev() and $with_panel ) {
        /*------------ 1. line - rename ------------------------*/
        $ret .= '<div class="dimmed04" style="margin:5px 0 2px 12px"><input id="old_name_' . $what . '" onClick="this.select()" style="width:40%;max-width:290px;padding:0 4px;background:#ffe" type="text" value="' . $what . '">';

        $ret .= ' &nbsp; rename to: &nbsp; <input id="new_name_' . $what . '" style="width:40%;max-width:290px;padding:0 4px;background:#fff" type="text" value="' . $what . '"> <a href="javascript:update_div_what_key(\'' . $what . '\')">go</a>';
        $ret .= '<span id="' . $what . '_conf"></span>';
        $ret .= '</div>';
        /*------------ 2. line - copy ------------------------*/
        $ret .= '<div class="dimmed04" style="margin:5px 0 2px 12px"><input id="old_name2_' . $what . '" onClick="this.select()" style="width:40%;max-width:290px;padding:0 4px;background:#ffe" type="text" value="' . $what . '">';

        $ret .= ' &nbsp; copy to: &nbsp; &nbsp; &nbsp; <input id="new_name2_' . $what . '" style="width:40%;max-width:290px;padding:0 4px;background:#fff" type="text" value="' . $what . '"> <a href="javascript:replicate_div_what_key(\'' . $what . '\')">copy</a>';
        $ret .= '<span id="' . $what . '_conf2"></span>';
        $ret .= '</div>';
    }

    if ($with_panel) $ret .= '</div>';

    return $ret;
}


function get_colorpicker_by_t_key(
    $t_key,
    $wrapper_style = 'margin:0 0 4px 0;',
    $with_panel = true,
    $with_tooltip = true, //becomes false if $with_panel = true
    $tt_class= 'tip', //tip or tip_lu
    $tt_width = '450px'
)
{

    if($with_panel) $with_tooltip = false;
    $tt = '';
    if ($with_tooltip) {
        $tt = tooltip($t_key, $tt_class, $tt_width, $style='');
    }

    //$with_panel = false;
    $table = 'diverses';
    $field = 'div_res';
    $id_field = 'div_what';

    $ident = zuf();
    $bg_color = '#eef7ea';
    $what = $t_key;

    if (is_dev()) create_dv($t_key, $value = '#ffffaa', true, $field = 'div_res');

    $sql = "select div_res from diverses where div_what = '$t_key' ";
    $curr_value = lookup2($sql, 'div_res');

    $ret = '';

    if ($with_panel) {
        $with_tooltip = false;
        //todo  class or data-attribute for parent und/oder child relations
        $ret .= '
        <div id="wrp_' . $t_key . '" class="round4"
        style="background:' . $bg_color . ';' . $wrapper_style . ';padding-bottom:6px;border:1px #ddd solid;">';
    }else{
        $ret .= '
        <div id="wrp_' . $t_key . '" class="round4"
        style="border:1px #ddd solid;background:' . $bg_color . ';">';
    }
    //$ret .= $tt;
    $hint_txt = get_hint_by_t_key_short($what, $text_only = true);
    $add_l = '&lang=all';
    $add_l .= '&curr_lang'; //defaults to session_lang()

    $add_style = '';

    /*-------------- BEGIN  $edit_link_long ----------------------------*/
    $edit_txt_long = 'edit';
    $edit_txt_long_hint = '';
    if(find_missing_translation($what, true)){
        $edit_txt_long = 'edit!';
        $edit_txt_long_hint = ' - es fehlen Übersetzungen!';
    }

    $edit_link_long = '
            <a title="diesen langen Text editieren in allen Sprachen'.$edit_txt_long_hint.'"  
            data-fancybox data-type="iframe" data-src="' . url('/dashboard/pop1?key=' . $what . $add_l . '') . '" href="javascript:;">
            ' . $edit_txt_long . ' </a>';
    /*-------------- END $edit_link_long ----------------------------*/

    /*--------------  BEGIN $edit_link_short ----------------------------*/
    //short text
    $edit_txt_short = 'edit';
    $edit_txt_short_hint = '';
    if(find_missing_translation($what, false)){
        $edit_txt_short_hint = ' - es fehlen Übersetzungen!';
        $edit_txt_short = 'edit!';
    }

    $edit_link_short = '
    <a class="dimmed04 ml-1" title="diesen kurzen Text editieren in allen Sprachen'.$edit_txt_short_hint.'"  
    data-fancybox data-type="iframe" data-src="' . url('/dashboard/pop_div_res_short?key=' . $what . $add_l . '') . '" href="javascript:;">
    <sup><i>' . $edit_txt_short . '</i></sup></a>';
    /*--------------  END $edit_link_short ----------------------------*/



    $ret .= '<div class="" 
    style="margin:7px 9px 9px 8px">  ';

    $ret .= '<span class="pull-right" style="margin-right:0px;with:34%">';


    $ret .= '<span style="margin-right:12px;color:#aaa">
    <span style="font-weight:normal;min-width:35px;display:inline-block"  id="' . $ident . '_conf">' . $curr_value . '</span></span>';

    $ret .= '<span style="color:#aaa;margin-right:6px">andere Farbe wählen: </span>';


    $ret.= '<input onchange="save_color(this.value,\'' . $ident . '\',\'' . $what . '\')" value="" type=\'text\' class="float-right" id="togglePaletteOnly_' . $ident . '"/>';
    $ret .= '<span style="width:35px;margin-left:0px">'.$tt.'</span>';
    //$ret .= '<span style="width:35px;margin-left:9px">'.$tt.'</span>';
    $ret .= '</span>';



    $t_font_size = '1.1em';
    $ret .= '
    <div id="__wrp_' . $ident . '" class=""
    style="display:block;padding:4px 8px 0 0;margin:-3px 0 0 0;background:none;border: none;box-shadow:none;
    font-weight:bold;font-size:' . $t_font_size . ';max-width:60%">' . strip_tags($hint_txt) . $edit_link_short . '</div>';


    $ret .= '</div>'; // the wrapper for the header end

    if ($with_panel) {
        $hint_txt = get_hint_by_t_key($what, true);
        //the wrapper for the body
        $ret .= '<div id="wrp_' . $ident . '" class="round6 assi-longtxt">'  . $hint_txt . '';
        $ret .= '<span class="float-right dimmed04" style="top:3px;right:3px;font-weight:bold;font-size:1.em;margin:-30px 0 0 9px"><i><sub>' . $edit_link_long . '</sub></i></span>';
        $ret .= '</div>';

    }

    /*-----------------------  DEV Options only visible if is_dev()  -------------------------------------------*/
    if (is_dev() and $with_panel) {
        $ret .= '<div id="dev_only_'.$ident.'">';
        $ret .= '<div class="text-center" style="width:100%;color:#bbb;font-size:0.8em;border-top:1px #ddd solid">
        <a title="hide" href="javascript:toggle(\'dev_only_'.$ident.'\')">DEV only:</a></div>';
        /*------------ 1. line - rename ------------------------*/
        $ret .= '<div class="dimmed04" style="margin:5px 0 2px 2px"><input id="old_name_' . $what . '" onClick="this.select()" style="width:40%;max-width:290px;padding:0 4px;background:#ffe" type="text" value="' . $what . '">';

        $ret .= ' &nbsp; rename to: &nbsp; <input id="new_name_' . $what . '" style="width:32%;max-width:290px;padding:0 4px;background:#fff" type="text" value="' . $what . '"> <a href="javascript:update_div_what_key(\'' . $what . '\')"><span class="badge badge-info">go</span></a>';
        $ret .= '<span id="' . $what . '_conf"></span>';
        $ret .= '</div>';
        /*------------ 2. line - copy ------------------------*/
        $ret .= '<div class="dimmed04" style="margin:5px 0 2px 2px"><input id="old_name2_' . $what . '" onClick="this.select()" style="width:40%;max-width:290px;padding:0 4px;background:#ffe" type="text" value="' . $what . '">';

        $ret .= ' &nbsp; copy to: &nbsp; &nbsp; &nbsp; <input id="new_name2_' . $what . '" style="width:32%;max-width:290px;padding:0 4px;background:#fff" type="text" value="' . $what . '"> <a href="javascript:replicate_div_what_key(\'' . $what . '\')"><span class="badge badge-info">copy</span></a>';
        $ret .= '<span id="' . $what . '_conf2"></span>';
        $ret .= '</div>';
        $ret .= '</div>'; // id="dev_only_'.$ident.'"
    }
    /*----------------------- END  DEV Options only visible if is_dev()  -------------------------------------------*/

    if ($with_panel or 1==1) $ret .= '</div>';

    //todo create color pallete
    $ret.='<script>
    document.addEventListener(\'DOMContentLoaded\', function() {
        $("#togglePaletteOnly_' . $ident . '").spectrum({
            showPaletteOnly: true,
            togglePaletteOnly: true,
            togglePaletteMoreText: \'mehr\',
            togglePaletteLessText: \'weniger\',
            color: \''.$curr_value.'\',
            /*hideAfterPaletteSelect:true,*/
            showInitial: true,
            showInput: true,
            preferredFormat: "hex",
            chooseText: "Wählen",
            cancelText: "Abbruch",
            containerClassName: \'\',
            replacerClassName: \'round6 assi_utils_box_shadow\',
            palette: [
                ["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
                ["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
                ["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
                ["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
                ["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
                ["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
                ["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
                ["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]
            ]
        });
    });
</script>';

    return $ret;
}

//TODO
/*function get_long_html1_editor_by_t_key_field_plain($t_key, $field = 't_key_comment')
{
    return '<div>not yet: get_long_html1_editor_by_t_key_field_plain</div>';
}*/

//TODO
/*function get_enh_html_editor_by_t_key_link($t_key, $field = 't_key_comment')
{
    return '<div>not yet: get_enh_html_editor_by_t_key_link</div>';
}*/

//get_long_html_editor_any_table($id,$table,$field,$id_field,$use_enh_editor=true)

// get_enh_html_editor_any_table($id,$table,$field,$id_field)
// get_plain_text_editor_any_table($id,$table,$field,$id_field,$class,$style,$before_txt='',$after_txt='')
// get_hint_by_t_key($t_key,$use_outer_div=true,$show_header=true,$use_comment_div=true)
// get_bool_any_table($id, $table, $field, $id_field)

// radiobox ajax
//colorpicker any table
//date picker any table
//datetime picker
//date range picker

