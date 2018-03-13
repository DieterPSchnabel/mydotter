<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12.03.2018
 * Time: 14:08
 */
function cache_it($c_key, $value, $minutes = CACHE_MINUTES)
{
    //$c_key = $table.'.'.$field.'.'.$id_field.'.'.$id;
    Cache::forget($c_key);
    Cache::put($c_key, $value, $minutes);
    return true;
}

function forget_all_cached_fields_for($table, $id)
{
    //before actually delete a record in table:
    //if we delete a record in a table we want also all cached items for this record being removed
    if ($table == 'diverses' and is_numeric($id)) {
        //in table diverses we use div_what rather than id for the unique identifyer
        $id_field = 'div_what';
        $div_what = get_div_what_by_id($id);
        $id = $div_what;
    } else {
        $id_field = 'id';
    }
    // get all fields from table structure
    $arr = get_columns_from_table_as_array($table);
    $c_key = '';
    foreach ($arr as $field) {
        $c_key = $table . '.' . $field . '.' . $id_field . '.' . $id;
        Cache::forget($c_key);
        $c_key = $c_key . '.count';  // important for create_dv()/check if exists - count must be null again
        Cache::forget($c_key);
    }
    return true;
}

//$c_key ='show_columns_from_' . $table_name;
//on change of table stru remove this $c_key from cache
