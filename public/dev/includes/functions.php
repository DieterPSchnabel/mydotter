<?php
/*



*/

//https://www.phpclasses.org/blog/package/9199/post/3-Smoothly-Migrate-your-PHP-Code-using-the-Old-MySQL-extension-to-MySQLi.html#migrate


function getAllTables()
{
    global $set_mysql_base;
    global $mysqli;
    $database = $set_mysql_base;
    $res = q("show tables from `$set_mysql_base`");
    $res_str = '';
    $i=0;
    while($row = $res->fetch_assoc()){
        $i++;
        //ec($i.' '.$row['Tables_in_'.$set_mysql_base]);
        if(trim($row['Tables_in_'.$set_mysql_base])<>'')
            $res_str .=  $row['Tables_in_'.$set_mysql_base].'<br>';
    }
    $res_arr = explode('<br>',$res_str);
    sort($res_arr);
    return $res_arr;
}

function get_all_tables_select()
{
    $arr = getAllTables();
    $r='';
    $r.='
    <select class="myselect" style="margin:0 12px 0 6px;font-size:1.2em" 
    onChange="show_table_str(this.options[selectedIndex].value)"       
    name="select_table" id="select_table">';

    $r.='<option value="">Tabelle w&auml;hlen...</option>';
    foreach($arr as $ar) {
        $r.="<option value='$ar'>$ar</option>";
    }

    $r.='<option value=""></option>
    </select>';

    $r.= '<input type="text" value="" id="this_selected_table">
    <a style="margin-left:24px" href="javascript:show_table_str(\'1\')">Table Stru1</a>
    <a style="margin-left:9px" href="javascript:show_table_str(\'2\')"><b>Table Stru2</b></a>
    <a style="margin-left:9px" href="javascript:show_table_str(\'3\')">Table Stru3</a>
    <a style="margin-left:9px" href="javascript:show_table_str(\'4\')">Table Stru4</a>
    <a style="margin-left:9px" href="javascript:show_table_str(\'5\')">Table Stru5</a>
    
    
    
    
    
    
    ';



    return $r;
}

function append_from_table($from_tab, $to_tab, $where_clause=' where 1=1 ')
{

    if(table_exists($to_tab) ){
        $sql = 'DROP TABLE IF EXISTS `'.$to_tab.'` ';
        q($sql);
    }

    $sql = 'CREATE TABLE `'.$to_tab.'` AS(SELECT * FROM `'.$from_tab.'` '.$where_clause.' )';
    q($sql);
    return true;
}



function drop_index_if_exists($table, $index_field)
{
    $sql = " SHOW KEYS FROM " . $table . " where Column_name = '" . $index_field . "' ";
    if (has_records($sql)) {
        //$sql = "ALTER TABLE `" . $table . "` DROP INDEX `" . $index_field . "` ( `" . $index_field . "` ) ";
        $sql = "ALTER TABLE `" . $table . "` DROP INDEX  `" . $index_field . "` ";
        q($sql);
        return true;
    }
}

function create_index_if_not_exists($table, $index_field)
{
    $sql = " SHOW KEYS FROM " . $table . " where Column_name = '" . $index_field . "' ";

    if (!has_records($sql)) {
        $sql = "ALTER TABLE `" . $table . "` ADD INDEX `" . $index_field . "` ( `" . $index_field . "` ) ";
        q($sql);
        return true;
    }
}

function check_index_if_exists($table, $index_field)
{
    $sql = " SHOW KEYS FROM " . $table . " where Column_name = '" . $index_field . "' ";

    if (has_records($sql)) {
        return true;
    } else {
        return false;
    }
}


function has_records($sql){
    $res = q($sql);
    $anz = mysqli_num_rows($res);
    if($anz>0) return true;
}

function number_records($sql){
    $res = q($sql);
    $anz = mysqli_num_rows($res);
    return $anz;
}

function fields_in_table1($table){
    global $mysqli;
    $result = q("SELECT * FROM ".$table);
    $fields = mysqli_field_count($mysqli);
    $rows   = mysqli_num_rows( $result);

    $r='<b style="color:#c66;font-size:1.3em">';
    $r .=  __file__ . ' -> '.   __function__.' -> line: '.__line__;
    $r .= '</b><br><br>';

    for($x=0; $x<$fields; $x++) {
        $fieldInfo = mysqli_fetch_field( $result );
        /*
        mysql_field_len
        mysql_field_name
        mysql_field_table
        */


        $name = $fieldInfo->name;
        $r.= '\''.$name.'\',<br>';
    }
    return $r;
}

function fields_in_table2($table){
    global $mysqli;
    $result = q("SELECT * FROM ".$table);
    $fields = mysqli_field_count($mysqli);
    $rows   = mysqli_num_rows( $result);

    $r='<b style="color:#bcd">';
    $r .=  __file__ . ' -> '.   __function__.' -> line: '.__line__;
    $r .= '</b><br><br>';

    for($x=0; $x<$fields; $x++) {
        $fieldInfo = mysqli_fetch_field( $result );
        /*
        mysql_field_len
        mysql_field_name
        mysql_field_table
        */
        $name = $fieldInfo->name;
        $r.= '$'.$name.' = $row["'.$name.'"];<br>';
    }
    return $r;
}


function Table_Exists($table_name)
{
    $sql = "show tables like '" . $table_name . "'";
    $res = q($sql);
    $anz = 0;
    while($row = $res->fetch_assoc()){
        $anz ++;
    }
    if($anz >0){
        return true;
    }else{
        return false;
    }
}

function lookup($sql, $field)
{
    $field = trim($field);
    $resultat = q($sql);
    $row = $resultat->fetch_assoc();
    return $row[$field];
}

function q($sql)
{
    global $mysqli;
    $res = $mysqli->query($sql) or die(failMsg("Invalid MySql query:<br>" . $sql, mysqli_error()));
    return $res;
}


function add_timestamp_cols_to_all_tables()
{
// exept migrations
    $all_tabs = getAllTables();
    foreach($all_tabs as $tab){
        if($tab <> 'migrations' and $tab <>'')

            add_timestamp_cols_to_table($tab);

        //ec('--'.$tab.'--');
    }


}

function add_timestamp_cols_to_table($table)
{
    $sql = "SHOW COLUMNS FROM  ". $table;
    $res = q($sql);
    $field_create = 'created_at';
    $field_update = 'updated_at';
    while($row = $res->fetch_assoc()){
        $columns[] = $row['Field'];
    }
    if(in_array($field_create,$columns)){
        echo $table. ' exists '.$field_create.'<br>';
    }else{
        echo $table. ' Creating '.$field_create.'<br>';
        $sql= "ALTER TABLE `$table` ADD `$field_create` TIMESTAMP NULL DEFAULT NULL ";
        $result = q($sql);
        $sql="UPDATE `$table` set `$field_create` = NOW() ";
        q($sql);
    }
    if(in_array($field_update,$columns)){
        echo $table. ' exists '.$field_update.'<br>';
    }else{
        echo $table. '<b style="color:#c00"> Creating </b>'.$field_update.'<br>';
        $sql= "ALTER TABLE `$table` ADD `$field_update` TIMESTAMP NULL DEFAULT NULL ";
        $result = q($sql);
        //$sql="UPDATE `$table` set `$field_create` = NOW() ";
        //q($sql);
    }
}


function add_cols_to_diverse()
{
    global $mysqli;

    $sql = "SHOW COLUMNS FROM diverses ";
    //$res = $mysqli->query($sql);
    $res = q($sql);

    while($row = $res->fetch_assoc()){

        $columns[] = $row['Field'];

    }

    //print_r($columns);


    $sql1 = "select * from languages ";
    $res = $mysqli->query($sql1);

    while($row = $res->fetch_assoc()){
        //echo $row['code'].'<br>';
        $field = 'div_res_'.$row['code'];
        if(in_array($field,$columns)){
            echo 'exists '.$field.'<br>';
        }else{
            echo 'NOT exists '.$field.'<br>';
            $sql = 'ALTER TABLE diverses ADD '.$field.' varchar(255)';
            //$result = $mysqli->query($sql);
        }

        $field = 'div_res_long_'.$row['code'];
        if(in_array($field,$columns)){
            echo 'exists '.$field.'<br>';
        }else{
            echo 'NOT exists '.$field.'<br>';
            $sql = 'ALTER TABLE diverses ADD '.$field.' text';
            //$result = $mysqli->query($sql);
        }

    }


    $sql1 = "select * from languages ";
    $res = $mysqli->query($sql1);

    while($row = $res->fetch_assoc()){
        //echo $row['code'].'<br>';
        $field = 'div_res_long_'.$row['code'];
        $field_short = 'div_res_'.$row['code'];
        $lang_dir = $row['directory'];
        echo $field.'<br>';

        //$sql2="select '.$field.' from diverses ";

        $sql2="select * from diverses ";
        $res2 = $mysqli->query($sql2);
        while($row2 = $res2->fetch_assoc()){
            //echo $row2['div_res_de'].'<br>';
            echo $row2[$field].'<br>';
            //if($row2[$field]=='' or $row2[$field]=='your translation here...click edit'){
            $t_id = $row2['id'];
            $sql5 = "update diverses set ".$field." = 'your long  $lang_dir  description here...click edit' where id =".$t_id;
            echo $sql5.'<br>';
            //$q = $mysqli->query($sql5);

            $sql5 = "update diverses set ".$field_short." = 'short title  $lang_dir  here...click edit' where id =".$t_id;
            echo $sql5.'<br>';
            //$q = $mysqli->query($sql5);

            //}
        }

        //$field = 'div_res_long_'.$row['code'];


    }





}
