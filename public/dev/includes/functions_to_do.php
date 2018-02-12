<?php


function fields_in_table($table){

    $result = mysql_query("SELECT * FROM ".$table);
    $fields = mysql_num_fields($result);
    $rows   = mysql_num_rows($result);
    $table = mysql_field_table($result, 0);
    $r.= "Die Tabelle '".$table."'hat ".$fields." Felder und ".$rows." Datens&auml;tze:\n";
    $r.= "Die Tabelle hat folgende Felder:\n";
    for ($i=0; $i < $fields; $i++) {
        $type  = mysql_field_type($result, $i);
        $name  = mysql_field_name($result, $i);
        $len   = mysql_field_len($result, $i);
        $flags = mysql_field_flags($result, $i);
        $r.= $type." ".$name." ".$len." ".$flags."\n";
    }
    $r.='<br><br>plain:<br><br>';
    for ($i=0; $i < $fields; $i++) {
        $name  = mysql_field_name($result, $i);
        $r.= $name."\n";
    }

    return deuml(nl2br($r));
}


function fields_in_table2($table){

    $result = q("SELECT * FROM ".$table);
    $fields = field_count($result);
    //$rows   = num_rows($result);
    /*
        for ($i=0; $i < $fields; $i++) {
            $name  = field_name($result, $i);
            $r.= '$'.$name.' = $row["'.$name.'"];<br>';
        }*/

    /*    $result = mysql_query("SELECT * FROM ".$table);
        $fields = mysql_num_fields($result);
        $rows   = mysql_num_rows($result);
        $table = mysql_field_table($result, 0);

        for ($i=0; $i < $fields; $i++) {
            $name  = mysql_field_name($result, $i);
            $r.= '$'.$name.' = $row["'.$name.'"];<br>';
        }

        return $r;*/

    //$result = q("SELECT * FROM ".$table);
    return $fields;
    //return print_r($result);
}


function fields_in_table3($table,$pure=false){
    $result = mysql_query("SELECT * FROM ".$table);
    $fields = mysql_num_fields($result);
    $rows   = mysql_num_rows($result);
    $table = mysql_field_table($result, 0);

    for ($i=0; $i < $fields; $i++) {
        $name  = mysql_field_name($result, $i);
        //$r.= '$'.$name.' = $row["'.$name.'"];<br>';
        //id = '".addslashes($data_array[$ii]['id'])."',
        if ($pure){
            //$r.= $name.'=\'".addslashes($data_array[$ii][\''.$name.'\'])."\''.', ';
            $r.= $name.'=".addslashes($data_array[$ii][\''.$name.'\'])."'.', ';
        }else{
            $r.= $name.'=\'".addslashes($data_array[$ii][\''.$name.'\'])."\''.', <br>';
        }
    }
    if($pure){
        return substr($r,0,-2);
    }else{
        return $r;
    }
}


function fields_in_table4($table){
    $result = mysql_query("SELECT * FROM ".$table);
    $fields = mysql_num_fields($result);
    $rows   = mysql_num_rows($result);
    $table = mysql_field_table($result, 0);

    for ($i=0; $i < $fields; $i++) {
        $name  = mysql_field_name($result, $i);
        $r.= '$'.$name." = getParam('".$name."','');<br>";
    }
    return $r;
}

function fields_in_table5($table){
    $result = mysql_query("SELECT * FROM ".$table);
    $fields = mysql_num_fields($result);
    $rows   = mysql_num_rows($result);
    $table = mysql_field_table($result, 0);

    for ($i=0; $i < $fields; $i++) {
        $name  = mysql_field_name($result, $i);
        $r.= ' '.$name." = \"'.$".$name.".'\",<br>";
    }
    return $r;
}



function append_from_table($from_tab, $to_tab, $where_clause=' where 1=1 '){

    //if(table_exists($to_tab) ){
    $sql = 'DROP TABLE IF EXISTS `'.$to_tab.'` ';
    q($sql);
    //}

    $sql = 'CREATE TABLE `'.$to_tab.'` AS(SELECT * FROM `'.$from_tab.'` '.$where_clause.' )';
    q($sql);
    return true;
}
