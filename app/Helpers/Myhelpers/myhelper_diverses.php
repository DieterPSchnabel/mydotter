<?php

function update_diverses_demo_text()
{
    $languages = get_languages();
    foreach($languages as $lang) {
        /*DB::table('diverses')
            ->where('id', 63052)
            ->update(['div_res_'.$lang->code => 'div_res' .' short '.$lang->code]);*/

        /*      $user = \App\Models\Diverses::where('id', 63052)
                      ->update([
                              'div_res_'.$lang->code => 'div_res'.' short '.$lang->code,
                              'div_res_long_'.$lang->code => 'div_res'.' long '.$lang->code
                          ]

                      );*/
        $ds = \App\Models\Diverses::all();
        //$ds = \App\Models\Diverses::get(63052, 63120);
        foreach($ds as $d) {
            $dw = $d->div_what;
            $id = $d->id;
            DB::table('diverses')
                ->where('id', $id)
                ->update(['div_res_'.$lang->code => $dw.' short '.$lang->code]);

            DB::table('diverses')
                ->where('id', $id)
                ->update(['div_res_long_'.$lang->code => $dw.' long '.$lang->code]);
        }
    }
}

function create_lang_cols_in_div_2()
{
    //use App/Models/Diverse;
    $table = 'diverses';
    $r = '';
    $languages = get_languages_all($sorder='code', $rf='desc', $anz=false);
    foreach($languages as $lang) {

        if (!Schema::hasColumn($table, 'div_res_'.$lang->code)) {
            $r .= ' div_res_'.$lang->code.'<br>';

            Schema::table($table, function (Blueprint $table) {
                $table->string('div_res_'.$lang->code, 255)->nullable();
            });

            Schema::table($table, function (Blueprint $table) {
                $table->text('div_res_long_'.$lang->code)->nullable();
            });
        }
    }
    return $r;
}
function get_text_from_div2_temp($what)
{
    $table = 'diverses2';
    $field = 't_key_txt';
    $id = $what;
    $txt_short = lookup($table, $field, $id, $id_field = 'div_what');
    //$txt_short = encodeToUtf8_loc($txt_short);
    $txt_short = trim($txt_short);
    $txt_short = iconv("UTF-8","Windows-1252",$txt_short);

    return $txt_short;
}



function get_text_from_div2($what){
    $table = 'diverses2';
    $field = 't_key_txt';
    $id = $what;
    $txt_short = lookup($table, $field, $id, $id_field ='div_what' );

    $field = 't_key_comment';
    $txt_long = lookup($table, $field, $id, $id_field ='div_what' );

    $table = 'diverses';
    $field = 'div_res_de';
    $value = trim($txt_short);
    $value = strip_tags($value);
    //$value = encodeToUtf8_loc($value);
    $value = iconv("UTF-8","Windows-1252",$value);
    if($value<>'' ) set_field_in_tab($table,$id,$field,$value,$id_field='div_what');

    $field = 'div_res_long_de';
    $value = trim($txt_long);
    //$value = encodeToUtf8_loc($value);
    $value = iconv("UTF-8","Windows-1252",$value);
    if($value<>'' ) set_field_in_tab($table,$id,$field,$value,$id_field='div_what');

    return true;
}
