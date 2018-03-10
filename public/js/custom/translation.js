function my_GOOGLE_API_KEY() {
    return 'AIzaSyBkMohG-its-omt2axTUurwlZQR3BUMFr8';
}


function transl_item_make_general(id) {
    frage = 'Diesen Key zu general machen?';
    do_qu_confirm_frage_eval('ax_updater.php', 'id=630_' + id, 'CONF_transl_item_make_general' + id, frage);
}

function transl_item_deleted(id) {
    frage = 'Diesen Key l' + unescape("%F6") + 'schen?';
    do_qu_confirm_frage_eval('ax_updater.php', 'id=631_' + id, 'CONF_transl_item_deleted' + id, frage);
}


function remove_unused_translations(t_key, long_short) {

    frage = '' + unescape("%DC") + 'berfl' + unescape("%FC") + 'ssige ' + unescape("%DC") + 'bersetzungen jetzt entfernen?';

    do_qu_confirm_frage('ax_updater.php', 'id=596_' + t_key + '_x_y_x_' + long_short, 'CONF_remove_unused_translations_' + t_key, frage);

}


function full_auto_transl_divers() {
    frage = 'Jetzt alle Texte in allen Konfig.-Assistenten ' + unescape("%FC") + 'bersetzen die noch nicht ' + unescape("%FC") + 'bersetzt sind? \n\nBereits ' + unescape("%FC") + 'bersetzte Texte bleiben dabei unver' + unescape("%E4") + 'ndert!\n\n';
    do_qu_confirm_frage('ax_updater.php', 'id=539_nix', 'CONF_full_auto_transl_divers', frage);
}

function full_auto_transl_attr() {

}

function full_auto_transl_sonst() {

    frage = 'Jetzt alle Hintergund-Texte ' + unescape("%FC") + 'bersetzen die noch nicht ' + unescape("%FC") + 'bersetzt sind? \n\nBereits ' + unescape("%FC") + 'bersetzte Texte bleiben dabei unver' + unescape("%E4") + 'ndert!\n\n';
    do_qu_confirm_frage('ax_updater.php', 'id=5391_nix', 'CONF_full_auto_transl_sonst', frage);
}


function do_transl_general_en(sc, ta, ta_lang_code, sc_lang_code) {
    do_transl_new2(sc, ta, ta_lang_code, sc_lang_code);
}

function do_transl_general_en_long(sc, ta, ta_lang_code) {
    do_transl_new2(sc, ta, ta_lang_code, 'en')
}

function do_transl_long_general(sc, ta, ta_lang_code, sc_lang_code) {
    if (sc_lang_code === undefined) {
        var sc_lang_code = 'de';
    }
    do_transl_new2(sc, ta, ta_lang_code, sc_lang_code)
}


function do_transl_long_general_from_en(sc, ta, lang_code) {
    do_transl_new2(sc, ta, lang_code, 'en');
}


function do_transl_descr_general(source, target, lang_code) {
    alert('deaktiviert - Support informieren');
}


function do_transl_new2(sc, ta, ta_lang_code, sc_lang_code) {

//alert(sc);
//alert(ta);
//alert(ta_lang_code);
//alert(sc_lang_code);

//sourceText='nix!!'
//alert(sourceText);


    if (sc_lang_code === undefined) {
        var sc_lang_code = 'de';
    }
//alert(sc_lang_code);

//if ( $(sc).readAttribute('value') �� $(sc).readAttribute('cols') ) {
    if ($(sc).readAttribute('value')) {
        //if ( $(sc).readAttribute('cols') ) {
        var sourceText = $(sc).value;
    } else {
        var sourceText = $(sc).innerHTML;
    }

//alert('1. '+sourceText);
    sourceText = sourceText.replaceAll('<!--?xml version="1.0" encoding="utf-8"?-->', '');
    sourceText = trim(sourceText);
//alert('2. '+sourceText);

    if (sourceText == '') {
        Check = confirm('Das zu ' + unescape("%FC") + 'bersetzende Text-Feld in \'' + sc_lang_code + '\' ist leer!\n\nDie ' + unescape("%DC") + 'bersetzung ist leer!\n\nWenn Sie fortfahren und speichern dann wird die ' + unescape("%DC") + 'bersetzung entfernt.');

        if (Check == true) {

        } else {
            return;
        }
        //alert(unescape("%DC")+'bersetzung von \''+sc_lang_code+'\' nach \''+ta_lang_code+'\' \n\n\nKein Quell-Text!\n\nDas zu '+unescape("%FC")+'bersetzende Text-Feld in \''+sc_lang_code+'\' ist leer!     ');
        //return;


    }

//alert('3. '+sourceText);
    sourceText = sourceText.replaceAll('%', '%25');
//sourceText = sourceText.replaceAll('?','%3F');

    sourceText = sourceText.replaceAll('#', '%23');
    sourceText = sourceText.replaceAll("'", '');

//alert('32534724572 ' + sourceText);
//sourceText = escape_this2(sourceText);
//alert('4. '+sourceText);
    var element = $(sc);
    var GOOGLE_API_KEY = my_GOOGLE_API_KEY();
//alert(GOOGLE_API_KEY);

    window['translate' + sc] = function (response) {

        $(ta).value = response.data.translations[0].translatedText;
        $(ta).innerHTML = response.data.translations[0].translatedText;

        setTimeout(function () {
            window['translate' + elementID] = null;
        }, 2000);
    };

    var newScript = document.createElement('script');
    newScript.type = 'text/javascript';

    var source = 'https://www.googleapis.com/language/translate/v2?key=' + GOOGLE_API_KEY + '&source=' + sc_lang_code + '&target=' + ta_lang_code + '&callback=translate' + sc + '&q=' + sourceText;
    newScript.src = source;

    document.getElementsByTagName('head')[0].appendChild(newScript);
}


function do_takeover_new2(source, target, lang, id) {
    source_text = $(source).innerHTML;

    if ($(target).readAttribute('value')) {
        target_text = $(target).value;
    } else {
        target_text = $(target).innerHTML;
    }

    if (target_text != '') {
        target_text = escape_this2(target_text);
        //target_text = target_text.replaceAll('?','++-qmark-++');

        //target_text = target_text.replaceAll('#','++-gkreuz-++');
        //target_text = target_text.replaceAll('%','++-percent-++');
        do_qu('ax_updater.php', 'id=370_' + target_text + '_x_y_x_' + id + '_x_y_x_' + lang, 'takeover_CONF_' + id + lang);
    }
}


function products_description_auto_translation(products_id, lang_code, lang_name) {

    frage = 'Die deutsche Artikel-Beschreibung jetzt automatisch nach ' + lang_name + ' ' + unescape("%FC") + 'bersetzen?\n\nDer Text im HTML-Editor (' + lang_name + ') wird dabei ' + unescape("%FC") + 'berschrieben!\n\nAls Vorlage zur ' + unescape("%DC") + 'bersetzung wird der Text oben in DEUTSCH verwendet!\n\nSie m' + unescape("%FC") + 'ssen diese Seite danach neu laden.';
    do_qu_confirm_frage('ax_updater.php', 'id=492_' + products_id + '_x_y_x_' + lang_code + '_x_y_x_' + lang_name, 'RES_autotransl' + products_id + lang_code, frage);


}

function products_description_auto_translation2(products_id, lang_code, lang_name) {
    do_qu('ax_updater.php', 'id=493_' + products_id + '_x_y_x_' + lang_code + '_x_y_x_' + lang_name, 'RES_autotransl' + products_id + lang_code);
}

function products_description_takeover_german(products_id, lang_code, lang_name) {
    frage = 'Jetzt die deutsche Beschreibung in das Feld f' + unescape("%FC") + 'r die Beschreibung in ' + lang_name + ' einkopieren?\n\nEventuell vorhandene Beschreibung in ' + lang_name + ' wird dabei ' + unescape("%FC") + 'berschrieben.\n\nDanach machen Sie bitte einen Seiten-Reload.';
    do_qu_confirm_frage('ax_updater.php', 'id=556_' + products_id + '_x_y_x_' + lang_code + '_x_y_x_' + lang_name, 'CONF_products_description_takeover_german' + products_id + lang_code, frage);
}


function products_description_auto_translation3(products_id, lang_code, lang_name) {
    frage = 'Die deutsche Artikel-Beschreibung jetzt automatisch nach ' + lang_name + ' ' + unescape("%FC") + 'bersetzen?';
    do_qu_confirm_frage('ax_updater.php', 'id=492_' + products_id + '_x_y_x_' + lang_code + '_x_y_x_' + lang_name, 'RES_autotransl2' + products_id + lang_code, frage);
}

function products_name_auto_translation(products_id, lang_code, lang_name) {
    frage = 'Die deutsche Artikel-Bezeichnung jetzt automatisch nach ' + lang_name + ' ' + unescape("%FC") + 'bersetzen?';
    do_qu_confirm_frage('ax_updater.php', 'id=495_' + products_id + '_x_y_x_' + lang_code + '_x_y_x_' + lang_name, 'RES_autotransl' + products_id + lang_code, frage);
}


function sdp_auto_translation(source_path, saveto_path, lang_code, lang_name) {

    frage = 'Den Text jetzt automatisch nach ' + lang_name + ' ' + unescape("%FC") + 'bersetzen?\n\nDer Text unten im HTML-Editor wird dabei gel' + unescape("%F6") + 'scht!\n\nAls Vorlage zur ' + unescape("%DC") + 'bersetzung wird NICHT der Text unten im Editor verwendet\nsondern der Text in der DEUTSCHEN VERSION!';
    do_qu_confirm_frage_eval('ax_updater.php', 'id=488_' + source_path + '_x_y_x_' + saveto_path + '_x_y_x_' + lang_code, 'RES_sdp_autotransl', frage);


}


function sdp_auto_translation_all(source_path, saveto_path, lang_code, lang_name) {

    frage = 'Den Text jetzt automatisch in ALLE Sprachen ' + unescape("%FC") + 'bersetzen?\n\nAls Vorlage zur ' + unescape("%DC") + 'bersetzung wird der Text in der DEUTSCHEN VERSION verwendet!';
    do_qu_confirm_frage_eval('ax_updater.php', 'id=4784_' + source_path + '_x_y_x_' + saveto_path + '_x_y_x_' + lang_code, 'RES_sdp_auto_translation_all', frage);


}


function do_preview_general_anything(table, id_field, id, from_field, language_code) {
    do_qu('ax_updater.php', 'id=518_' + table + '_x_y_x_' + id_field + '_x_y_x_' + id + '_x_y_x_' + from_field + '_x_y_x_' + language_code, 'PREVIEW_' + table + language_code);
}


function do_takeover_general_anything(target, lang_code, table, id_field, id, from_field) {

    if ($(target).innerHTML) {
        target_text = $(target).innerHTML;
    } else {
        target_text = $(target).value;
    }

//target_text = escape_this2(target_text);

    target_text = target_text.replaceAll("#", "||kr||");
    target_text = target_text.replaceAll("%23", "||kr||");
    target_text = target_text.replaceAll("%", "||prz||");
    target_text = target_text.replaceAll("&", "||plus||");

    target_text = target_text.replaceAll('?', '++-qmark-++');
    target_text = target_text.replaceAll('�', '%E9');

    target_text = target_text.replaceAll('%3F', '++-qmark-++');

//alert(target_text);

    if (target_text != '') {
        do_qu_q('ax_updater.php', 'id=517_' + lang_code + '_x_y_x_' + table + '_x_y_x_' + target_text + '_x_y_x_' + id_field + '_x_y_x_' + id + '_x_y_x_' + from_field, 'takeover_CONF_' + table + lang_code);
    } else {

        Check = confirm('Das Feld ist leer! \n\nTragen Sie zun' + unescape("%E4") + 'chst einen ' + unescape("%FC") + 'bersetzten Text ein und speichern Sie dann.\n\nSie k' + unescape("%F6") + 'nnen den Text auch automatisch ' + unescape("%FC") + 'bersetzen lassen.\n\nTrotzdem speichern?');
        if (Check == true) {
            do_qu_q('ax_updater.php', 'id=517_' + lang_code + '_x_y_x_' + table + '_x_y_x_' + target_text + '_x_y_x_' + id_field + '_x_y_x_' + id + '_x_y_x_' + from_field, 'takeover_CONF_' + table + lang_code);
        }
        //alert('Das Feld ist leer - wurde daher nicht gespeichert! \n\nTragen Sie zun'+unescape("%E4")+'chst einen '+unescape("%FC")+'bersetzten Text ein und speichern Sie dann.\n\nSie k'+unescape("%F6")+'nnen den Text auch automatisch '+unescape("%FC")+'bersetzen lassen.');


    }

}


function do_takeover_general_anything2(target, lang_id, table, id, id_field, to_field) {
//do_takeover_general_anything2(\'transl_res_'.$products_options_id.$language_id.'\',\''.$language_id.'\',\'products_options\', '.$products_options_id.', \'products_options_id\', \'products_options_name\')" >
    if ($(target).innerHTML) {
        target_text = $(target).innerHTML;
    } else {
        target_text = $(target).value;
    }
    /*
    alert(target);
    alert(target_text);
    alert(lang_id);
    alert(table);
    alert(id_field);
    alert(id);
    alert(to_field);
    */

    target_text = escape_this2(target_text);

    target_text = target_text.replaceAll("#", "||kr||");
    target_text = target_text.replaceAll("%", "||prz||");

    target_text = target_text.replaceAll('?', '++-qmark-++');
    target_text = target_text.replaceAll('�', '%E9');


    if (target_text != '') {
        do_qu('ax_updater.php', 'id=53721_' + lang_id + '_x_y_x_' + table + '_x_y_x_' + target_text + '_x_y_x_' + id_field + '_x_y_x_' + id + '_x_y_x_' + to_field, 'takeover_CONF_' + table + '_' + id + lang_id);
    } else {
        alert('Das Feld ist leer - wurde daher nicht gespeichert! \n\nTragen Sie zun' + unescape("%E4") + 'chst einen ' + unescape("%FC") + 'bersetzten Text ein und speichern Sie dann.\n\nSie k' + unescape("%F6") + 'nnen den Text auch automatisch ' + unescape("%FC") + 'bersetzen lassen.');
    }

}


function do_takeover_general1_long_myd(target, lang_code, t_key, page) {
    if ($(target).innerHTML) {
        target_text = $(target).innerHTML;
    } else {
        target_text = $(target).value;
    }

    target_text = escape_this2(target_text);
    target_text = target_text.replaceAll("'", "");

    if (target_text != '') {
        do_qu_q('ax_updater.php', 'id=489_' + lang_code + '_x_y_x_' + t_key + '_x_y_x_' + target_text + '_x_y_x_' + page, 'takeover_CONF_' + t_key + lang_code);
    } else {


        Check = confirm('Leeres Feld speichern?');

        if (Check == true) {
            do_qu_q('ax_updater.php', 'id=489_' + lang_code + '_x_y_x_' + t_key + '_x_y_x_' + target_text + '_x_y_x_' + page, 'takeover_CONF_' + t_key + lang_code);
        } else {
            return;
        }
    }

}


function do_takeover_general1_long(target, lang_code, t_key) {
    target_text = $(target).innerHTML;

    target_text = escape_this2(target_text);


    if (target_text != '') {
        do_qu_q('ax_updater.php', 'id=487_' + lang_code + '_x_y_x_' + t_key + '_x_y_x_' + target_text, 'takeover_CONF_' + t_key + lang_code);
    } else {
        Check = confirm('Leeres Feld speichern?');
        if (Check == true) {
            do_qu_q('ax_updater.php', 'id=487_' + lang_code + '_x_y_x_' + t_key + '_x_y_x_' + target_text, 'takeover_CONF_' + t_key + lang_code);
        } else {
            return;
        }


    }

}


function do_takeover_general1(target, lang_code, t_key) {
    target_text = $(target).value;

    target_text = target_text.replaceAll("&#39;", "__hoch_komm__");

    target_text = escape_this2(target_text);

    if (target_text != '') {
        do_qu_q('ax_updater.php', 'id=486_' + target_text + '_x_y_x_' + lang_code + '_x_y_x_' + t_key, 'takeover_CONF_' + t_key + lang_code);
    } else {
        Check = confirm('Leeren Text speichern?');
        if (Check == true) {
            do_qu_q('ax_updater.php', 'id=486_' + target_text + '_x_y_x_' + lang_code + '_x_y_x_' + t_key, 'takeover_CONF_' + t_key + lang_code);
        } else {
            return;
        }


    }

}

function do_transl(sc, ta, ta_lang_code, sc_lang_code) {
    if (sc_lang_code === undefined) {
        var sc_lang_code = 'de';
    }
    do_transl_new2(sc, ta, ta_lang_code, sc_lang_code);
}


function do_transl_general(sc, ta, ta_lang_code, sc_lang_code) {

    do_transl_new2(sc, ta, ta_lang_code, sc_lang_code);
}

function do_transl_general_all_langs_and_save(div_what) {
    do_qu_eval('ax_updater.php', 'id=655_' + div_what, 'CONF_do_transl_general_all_langs_and_save_' + div_what);
}


function mydotter_lang_definitions() {
    do_qu('ax_updater.php', 'id=371_nix', 'CONF_mydotter_lang_definitions')
}

function mydotter_lang_definitions_cats() {
    do_qu('ax_updater.php', 'id=483_nix', 'CONF_mydotter_lang_definitions_cats')
}

function mydotter_lang_definitions_prods() {
    do_qu('ax_updater.php', 'id=484_nix', 'CONF_mydotter_lang_definitions_prods')
}


function open_bearb_langs(para) {

    if (para != '') {
        open_admin_bearb_ph_langs(para);
    } else {
        alert('Welcher Platzhalter?');
    }
}


function test() {

    alert_n("Protokoll: " + location.protocol);
    alert_n("Host: " + location.host);
    alert_n("Hostname: " + location.hostname);
    alert_n("Href: " + location.href);
    alert_n("Pathname :" + location.pathname);
    alert_n("Port: " + location.port);
    alert_n("Search: " + location.search);
    alert_n("Pure: " + pure_url());
}

function pure_url() {
// without query string
    return location.protocol + '//' + location.host + location.pathname;
}


function try_to_do_transl(source, target, lang_code) {
    do_transl(source, target, lang_code);
    $('CONF_translated_' + lang_code).update('Text ' + unescape("%FC") + 'bersetzt');
    conf = 'CONF_translated_' + lang_code;
    setTimeout("weg2(conf,'fade')", 3000);
}


function save_this_element(val, what, feld) {
    frage = feld + ' - Text speichern?';
    do_qu_confirm_frage('ax_updater.php', 'id=210_' + what + '_x_y_x_' + val + '_x_y_x_' + feld, 'CONF_' + feld, frage);
    conf = 'CONF_' + feld;
    setTimeout("weg2(conf,'fade')", 5000);
}

function save_this_element241(val, what, feld) {
    frage = feld + ' - Text speichern?';
    do_qu_confirm_frage('ax_updater.php', 'id=241_' + what + '_x_y_x_' + val + '_x_y_x_' + feld, 'CONF_' + feld, frage);
    conf = 'CONF_' + feld;
    setTimeout("weg2(conf,'fade')", 5000);
}

function save_transl(what, value) {
    value = value.replaceAll("'", "[X890151]");
    value = value.replaceAll("&#39;", "[X890151]");
    frage = unescape("%DC") + 'bersetzung speichern?';
    do_qu('ax_updater.php', 'id=207_' + what + '_x_y_x_' + value, 'CONF_transl_saved_' + what, frage);
    conf = 'CONF_transl_saved_' + what;
    setTimeout("weg2(conf,'fade')", 5000);
}

function save_transl_d(what, value) {
    frage = 'deutschen Text speichern?';
    do_qu_confirm_frage('ax_updater.php', 'id=207_' + what + '_x_y_x_' + value, 'CONF_transl_saved_d', frage);
    setTimeout("weg2('CONF_transl_saved_d','fade')", 5000);
}

function save_bemerkung(bem, para) {
    frage = 'Bemerkung speichern?';
    do_qu_confirm_frage('ax_updater.php', 'id=209_' + bem + '_x_y_x_' + para, 'CONF_save_bemerkung11', frage);
    setTimeout("weg2('CONF_save_bemerkung11','fade')", 5000);
}


function unlink_file(file) {
// universeller unlinker - need full fs path
    frage = 'Dieses File endg' + unescape("%FC") + 'ltig l' + unescape("%F6") + 'schen?';
    do_qu_confirm_frage('ax_updater.php', 'id=358_' + file, 'CONF_dele_file' + file, frage);

}


