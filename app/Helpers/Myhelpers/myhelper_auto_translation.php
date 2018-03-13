<?php

/*function get_loc()
{
    return session_lang_code();
}*/
function session_lang_code()
{
    $loc = session()->get('locale');
    if (empty($loc)) {
        $loc = config('app.locale');
    }
    return $loc;
}

function session_lang_code_datepicker()
{
    $loc = session_lang_code();
    //eventuelle filter
    return $loc;
}

/*function translate_this_from_to($translate_string,$lang_code_source='de',$lang_code_target){
    return 	translate_this($translate_string,$lang_code_target,$lang_code_source);
}*/


function translate_this($translate_string, $lang_code_target, $lang_code_source = 'de')
{

    $GOOGLE_API_KEY = config('google.translation.api.key');
    if (trim(strip_tags($translate_string)) == '') return $translate_string; //if $translate_string is empty

    require_once(app_path() . '/Classes/gtranslate-api-php-0.7.9.1/googleapiversion2/GTranslateV2.php');

    $gt = new Gtranslate;
    $gt->setApiVersion(2);
    $gt->setApiKey($GOOGLE_API_KEY);
    $gt->setUrl('https://www.googleapis.com/language/translate/v2');
    $gt->setRequestType('curl');  //curl oder http - I think it must be always curl
    $gt->setFormat('html');  //html oder text
    $a = $gt->translate($lang_code_source, $lang_code_target, $translate_string);

    $r = $a[0]->translatedText;
    return $r;
}

function translate_to_all_other_langs($key, $translate_string, $lang_code_source = 'de', $method = 'all_empty')
{
    $src_text = $translate_string;
    $source_lang_code = $lang_code_source;
    $table = 'diverses';
    $field_type = 'short';
    $id_field = 'div_what';
    $id = $key;

    $translate_to_english_first = get_dv('translate_to_english_first');
    $source_lang_code_temp = $source_lang_code;
    if ($translate_to_english_first and $lang_code_source <> 'en') {
        if ($table == 'diverses') {
            if ($field_type == 'short') {
                //$field = 'div_res_' . $target_lang_code;
                $field_in_diverses = 'div_res_';
            } else {
                //$field = 'div_res_long_' . $target_lang_code;
                $field_in_diverses = 'div_res_long_';
            }
        } else { //  table = language_lines
            //$field = $target_lang_code; //in language_lines
        }
        if ($method == 'all' or $method == 'all_empty' or $method == 'all_but_default') {

            $languages = get_languages_with_en(); //we have forced to translate into english first, then from english to others with switch $translate_to_english_first
            if ($source_lang_code <> 'en') {
                if ($table == 'diverses') {
                    $this_search_field = $field_in_diverses . 'en';
                    $save_to_field = $field_in_diverses . 'en';
                } else {
                    $this_search_field = 'en';
                    $save_to_field = 'en';
                }
                $curr_content = lookup($table, $this_search_field, $id, $id_field); //reads from cache
                $was_translated = false;
                if (trim(strip_tags($curr_content)) == '') {
                    //translate first into english
                    /*#######################################################################*/
                    $translation = translate_this($src_text, 'en', $source_lang_code);
                    $affected = DB::update("update $table set $save_to_field = '$translation', updated_at = NOW()  where $id_field = ?", [$id]);
                    $c_key = $table . '.' . $save_to_field . '.' . $id_field . '.' . $id;
                    cache_it($c_key, $translation);
                    $was_translated = true;
                    /*#######################################################################*/
                }
                //in next steps use the english translation as source
                if ($was_translated) {
                    $src_text = $translation;
                } else {
                    $src_text = $curr_content;
                }
                $source_lang_code_temp = 'en';
            }
            if (get_dv('translate_to_english_only_if_set_to_first_test')) return true;
        } // end of: translate_to_english_first

        foreach ($languages as $lang) {
            if ($lang->code <> $source_lang_code and $lang->code <> $source_lang_code_temp) {
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
                    if ($translate_to_english_first) {
                        if ($lang->code == $default or $lang->code == 'en') continue; //back to loop begin - don't translate
                    } else {
                        if ($lang->code == $default) continue; //back to loop begin - don't translate
                    }
                }

                if ($table == 'diverses') {
                    $save_to_field = $field_in_diverses . $lang->code;
                } else {
                    $save_to_field = $lang->code;
                }

                /*#######################################################################*/
                $translation = translate_this($src_text, $lang->code, $source_lang_code);
                $affected = DB::update("update $table set $save_to_field = '$translation', updated_at = NOW()  where $id_field = ?", [$id]);
                $c_key = $table . '.' . $save_to_field . '.' . $id_field . '.' . $id;
                cache_it($c_key, $translation);
                /*#######################################################################*/
            }
        }
        //$return = '<script>reload_ax();</script>';
        return true;
    }


}

function get_tr($content, $from_lang_code = null, $overwrite = false, $re_translate = false, $drop_cache = false)
{

    //auslagern in key/vals:
    //$allow_auto_translate_to_all_active_languages = true;
    //$get_tr_display_edit_link = true;
    //how to handle text inside a href??
    //$request_lang_code = null;
    $content = trim($content);
    if (empty($from_lang_code)) $from_lang_code = session_lang_code();
    $key = substr($content, 0, 120);
    $key = trim($key);
    $key = str_slug($key, '.');
    //$uniqer = rand_str(6); //makes sure this key is unique
    //$key .= '|__|'.$uniqer;

    //create key if not exists - with content into session_lang_code
    create_dv($key, $content, true, $field = 'div_res_' . session_lang_code());
    //if exists ??
    if ($overwrite) {
        set_dv($key, $content, 'div_res_' . session_lang_code()); //gets cached
    }
    if ($re_translate) {
        translate_to_all_other_langs($key, $content, session_lang_code(), $method = 'all');
    } else {
        translate_to_all_other_langs($key, $content, session_lang_code(), $method = 'all_empty');

        //check if $content == array session_lang_code - if false set_dv session_lang_code
        //check if text in any active lang is empty - which langs?
        //insert content in div_res  in session_lang_code()
    }

    $translation = get_dv($key, 'div_res_' . $from_lang_code);

    if (get_dv('first_letter_in_translation_always_display_uppercase')) {
        return ucfirst($translation);
    }
    return $translation;
}

function dashboard_settings_show_edit_links()
{
    //todo create role for user who are allowed to edit
    if (is_dev() or get_dv('dashboard_settings_show_edit_links')) return true;
}

function use_translations()
{
    if (env('APP_USE_GOOGLE_TRANSLATION') and get_app_is_multilang()) return true;
}
