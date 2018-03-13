<?php

function fields_in_table($table, $listtype = 2)
{

    $sql = 'SHOW COLUMNS FROM ' . $table;
    $res = q($sql);
    $r='';
    while($row = $res->fetch_assoc()){
        $columns[] = $row['Field'];
        //ec($row['Field']);
        //dd($row['Field']);

        if($listtype == 2) $r .= '$'.$row['Field'].' = $row["'.$row['Field'].'"];<br>';
        if($listtype == 1) $r .= $row['Field'].',<br>';
    }
    return $r;
}
function connect_to_mysqli()
{
    $host = env('DB_HOST');
    $username = env('DB_USERNAME');
    $password = env('DB_PASSWORD');
    $dbname = env('DB_DATABASE');
    $port = env('DB_PORT');
    $mysqli = new mysqli($host, $username, $password, $dbname, $port);

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    //global $mysqli;
    return $mysqli;
}
function q($sql)
{
    $mysqli = connect_to_mysqli();
    //$res = $mysqli->query($sql) or die(failMsg("Invalid MySql query:<br>" . $sql, mysqli_error()));
    $res = $mysqli->query($sql) ;
    return $res;
}
function number_records($sql){
    $res = q($sql);
    $anz = mysqli_num_rows($res);
    return $anz;
}
function has_records($sql){
    $res = q($sql);
    $anz = mysqli_num_rows($res);
    if($anz>0) return true;
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
function get_columns_from_table($table_name)
{
    $r = '';

    $c_key ='show_columns_from_' . $table_name;
    $columns = Cache::remember($c_key, CACHE_MINUTES, function () use ($table_name) {
        return DB::select('show columns from ' . $table_name);
    });

    foreach ($columns as $value) {
        $r.= "'" . $value->Field . "' => '" . $value->Type .  ( $value->Null == "NO" ? ' | required' : '' ) ."', <br/>" ;
    }
    return $r;
}

function get_columns_from_table_as_array($table_name)
{
    return get_columns_from_table_sortable($table_name, $as_array = true);
}
function get_columns_from_table_text_only($table_name, $as_array=false)
{
    $r = '';
    //dd($table_name);
    $r_arr = [];
    //$columns = DB::select('show columns from ' . $table_name);

    $c_key ='show_columns_from_' . $table_name;
    $columns = Cache::remember($c_key, CACHE_MINUTES, function () use ($table_name) {
        return DB::select('show columns from ' . $table_name);
    });

    foreach ($columns as $value) {
        if(stristr($value->Type,'char') or stristr($value->Type,'text')) {
            if($as_array){
                $r.= $value->Field.',';
            }else {
                $r .= "'" . $value->Field . "' => '" . $value->Type . "|" . ($value->Null == "NO" ? 'required' : '') . "', <br/>";
            }
        }
    }

    if($as_array){
        $r=substr($r,0,-1);
        $r_arr = explode(',',$r);
        return $r_arr;
    }else {
        return $r;
    }
}
function get_columns_from_table_sortable($table_name,$as_array=false)
{
    $r = '';
    $r_arr = [];

    //$columns = DB::select('show columns from ' . $table_name);

    $c_key ='show_columns_from_' . $table_name;
    $columns = Cache::remember($c_key, CACHE_MINUTES, function () use ($table_name) {
        return DB::select('show columns from ' . $table_name);
    });

    foreach ($columns as $value) {
        //if(stristr($value->Type,'char') or stristr($value->Type,'text')) {
        if($as_array){
            //array_push($r_arr,$value->Field);
            $r.= $value->Field.',';
        }else {
            $r .= "'" . $value->Field . "' => '" . $value->Type . "|" . ($value->Null == "NO" ? 'required' : '') . "', <br/>";
        }
        //}
    }

    if($as_array){
        $r=substr($r,0,-1);
        $r_arr = explode(',',$r);
        return $r_arr;
    }else {
        return $r;
    }
}
function make_col_sortable($t_order_col,$sortables_arr,$page_para,$dir,$curr_dir)
{
    $r='';
    if( in_array($t_order_col,$sortables_arr) ){
        $r.= '';
        $r.= '';
        $r.= '';
        $r.= '';
        $r.= '';
        $r.= '';
        $r.= '';
        $r.= '';
    }else{
        $r = $t_order_col;
    }
    return $r;
}
function make_col_sortable2($t_order_col, $t_order_col_disp_name, $sortables_arr, $page_para, $dir, $order, $curr_dir, $controller_path)
{
    $r = '';
    $dir = $dir == 'asc' ? 'desc' : 'asc';

    $dir = str_replace('dir=', '', $dir);
    if (is_null($curr_dir)) {
        $curr_dir = $dir;
    } else {
        $curr_dir = str_replace('dir=', '', $dir);
    }
    $order = str_replace('order=', '', $order);

    if (in_array($t_order_col, $sortables_arr)) {
        $dir = NULL;
        if (isset($_GET['dir'])) {
            $dir = $_GET['dir'];
        } else {
            $dir = 'asc';
        }

        if ($dir == 'asc') {
            $dir = 'desc';
        } else {
            $dir = 'asc';
        }
        $dir = 'dir=' . $dir;
        $r .= link_to_action($controller_path, $t_order_col_disp_name,
            $parameters = array($page_para, 'order=' . $t_order_col, $dir),
            $attributes = array('title="auf- oder absteigend" data-toggle="tooltip" data-placement="top"'));

        if ($dir == 'asc') {
            $curr_dir = 'desc';
        } else {
            $curr_dir = 'asc';
        }
        //$r .= ' '.sort_order_icon($t_order_col, $order, $curr_dir);
        $r .= ' ' . sort_order_icon($t_order_col);

    } else {
        $r = $t_order_col;
    }
    return $r;
}
function sort_order_icon($curr_col)
{
    if(  isset($_GET['dir'])  ) {
        $curr_dir = $_GET['dir'];
    }else{
        $curr_dir = 'asc';
    }
    if(  isset($_GET['order'])  ) {
        $order = $_GET['order'];
    }else{
        $order = 'id';
    }
    $unordered = '<i style="color:#ddd" class="fa fa-sort" aria-hidden="true"></i>';
    $ordered_asc = '<i title="aufsteigend" style="color:#c00" class="fa fa-sort-asc" aria-hidden="true"></i>';
    $ordered_desc = '<i title="absteigend" style="color:#c00" class="fa fa-sort-desc" aria-hidden="true"></i>';

    /*<i class="fa fa-arrow-down" aria-hidden="true"></i>
    <i class="fa fa-arrow-up" aria-hidden="true"></i>*/


    if($curr_col==$order) {
        if($curr_dir == 'asc'){
            return $ordered_asc;
        }else {
            return $ordered_desc;
        }
    }else{
        return $unordered;
    }
}
function get_table_stru($table_name){

    $z=0;
    $r = '';
    $r .= '<div class="card"><div class="card-block">';
    $r .= '<a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">Page Reload </a>';
    $r .= '<h2 class="card-title">'.$table_name.'';
    $r .= '';
    $r .= '';

    $r .= '</h2>';
    $r .= '</div></div>';

    //echo get_columns_from_table($this_page_name);
    //without cache!
    $columns = DB::select('show columns from ' . $table_name);

    foreach ($columns as $value) {
        $z++;
        if( is_odd($z) ){
            $bg=' ;background:#f3f3f3; ';
        }else{
            $bg = '';
        }
        $r .= '<div style="padding:2px 4px;'.$bg.'">';
        $r .= '';
        $r .= '<span class="text-right" style="display:inline-block;width:28px;color:#aaa;margin-right:6px">'.$z.'. </span>';
        $r .= '';
        $r .= '<span style="width:310px;font-weight:bold;display:inline-block">';
        $r .= "'" . $value->Field . "' => '" . $value->Type .  ( $value->Null == "NO" ? ' | required' : '' );
        $r .= '</span>';

        $has_index = check_index_if_exists($table_name, $value->Field);
        if($has_index){
            $r .= '<span style="margin-left:20px;color:#c00;display:inline-block;width:80px;color:#999">has index</span>';
            if($value->Field<>'id'){
                $r .= '<span style="margin-left:20px;color:#c00;display:inline-block;width:140px;">
                                        <a title="drop and create in one step" href="javascript:recreate_index(\''.$table_name.'\',\''.$value->Field.'\')">recreate index</a>
                                        <span style="margin-left:6px;color:green"
                                            id="recreate_'.$value->Field.'_conf"></span>
                                        </span>';

                $r .= '<span style="margin-left:20px;color:#c00;display:inline-block;width:120px;">
                                        <a href="javascript:drop_index(\''.$table_name.'\',\''.$value->Field.'\')">drop index</a>
                                            <span style="margin-left:6px;color:green"
                                            id="drop_'.$value->Field.'_conf"></span>
                                            </span>';
            }
        }else{
            if($value->Type<>'longtext' and $value->Type<>'text'){
                $r .= '<span style="margin-left:120px;color:green;display:inline-block;width:140px;">
                                    <a href="javascript:create_index(\''.$table_name.'\',\''.$value->Field.'\')">create index</a>
                                    <span style="margin-left:6px;color:green"
                                            id="create_'.$value->Field.'_conf"></span>
                                    </span>';
            }
        }

        $r .= '';
        $r .= '';
        $r .= '</div>';
    }
    return $r;

}
function table_has_column($table,$col){
    //dd($table);
    $sql = 'SHOW COLUMNS FROM ' . $table;
    $res = q($sql);
    $r='';
    $has_col = false;
    while($row = $res->fetch_assoc()){
        //$columns[] = $row['Field'];
        //ec($row['Field']);
        //dd($row['Field']);
        //if(head($row['Field'])==$col){
        if($row['Field']==$col){
            $has_col = true;
            break;
        }
        //if($listtype == 2) $r .= '$'.$row['Field'].' = $row["'.$row['Field'].'"];<br>';
        //if($listtype == 1) $r .= $row['Field'].',<br>';
    }
    return $has_col;
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
function update_null_dates_in_all_tables($echo){
    //$echo = false;
    $tables = DB::select('SHOW TABLES');
    $i=0;
    $standard_date = '2017-01-01 00.00.00';
    foreach($tables as $table) {
        if($echo) echo '<hr>';
        $table = head($table);
        //if($echo) ec('starting update_null_dates_in_all_tables  (once a week or on demand)');
        //dd($table);
        if (table_has_column($table, 'updated_at')) {
            $sql = "update " . $table . " set updated_at = '" . $standard_date . "' where ISNULL(updated_at) ";
            q($sql);

            //nur wenn field == timestring ?!
            $sql = "update " . $table . " set updated_at = '" . $standard_date . "' where updated_at = 0 ";
            q($sql);
            if($echo) ec('<b>'.$table.'</b> updated_at - done ');
        } else {
            //create cols
            if($echo) ec('<b>'.$table.'</b>  -------------- updated_at NOT FOUND ',false,'color:red');
        }


        if (table_has_column($table, 'created_at')) {
            $sql = "update '<b>'.$table.'</b>  set created_at = '" . $standard_date . "' where ISNULL(created_at) ";
            q($sql);

            //nur wenn field == timestring ?!
            $sql = "update '<b>'.$table.'</b>  set created_at = '" . $standard_date . "' where created_at = 0 ";
            q($sql);
            if($echo) ec('<b>'.$table.'</b>  created_at - done ');
        } else {
            //create cols
            if($echo) ec('<b>'.$table.'</b>  -------------- created_at NOT FOUND ',false,'color:red');
        }

        if (table_has_column($table, 'updated_at') and ! table_has_column($table, 'updated_by')) {
            $sql = 'ALTER TABLE '.$table.' ADD `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL AFTER `updated_at`';
            q($sql);
            if($echo) ec('<b>'.$table.'</b>  -------------- updated_by ADDED ',false,'color:green');
        }
    }
}

function check_table_for_all_langs($table='language_lines'){
    //check if there are cols in table language_line or myd_translations for each language in table languages
    $all_languages_arr = all_languages_str($as_array=true);
    foreach ($all_languages_arr as $lang) {
        if (! table_has_column($table, $lang)) {
            //create col
            $sql = 'ALTER TABLE '.$table.' ADD `'.$lang.'` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL AFTER `uk`';
            q($sql);
        }
    }
    return 'done';
}
function check_diverses_for_all_langs(){
    //check if there are cols (div_res_#lang# und div_res_long_#lang#  ) in table diverses for each language in table languages
    $table = 'diverses';
    $all_languages_arr = all_languages_str($as_array=true);
    foreach ($all_languages_arr as $lang) {
        $sql1='';
        $sql2='';
        if (! table_has_column($table, 'div_res_'.$lang)) {
            //create col
            $sql1 = 'ALTER TABLE '.$table.' ADD `div_res_'.$lang.'` VARCHAR(255) NULL DEFAULT NULL AFTER `div_res_long_uk`';
            q($sql1);
            ec('added: div_res_'.$lang);
        }
        if (! table_has_column($table, 'div_res_long_'.$lang)) {
            //create col
            $sql2 = 'ALTER TABLE '.$table.' ADD `div_res_long_'.$lang.'` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL AFTER `div_res_long_uk`';
            q($sql2);
            ec('added: div_res_long_'.$lang);
        }

    }
    return 'done';
}

function remove_dummy_text_from_diverses(){
    $table = 'diverses';
    $all_languages_arr = all_languages_str($as_array=true);
    $whats = App\Models\Diverses::all()->pluck('div_what');
    $z=0;
    foreach ($whats as $what) {
        $z++;
        $zz=0;
        //echo $what.'<br>';
        foreach ($all_languages_arr as $lang) {
            $zz++;
            $sql="update diverses set  div_res_long_".$lang." = '' where div_res_long_".$lang." like '%here...click%'  ";
            //echo ($sql);
            //break;
            q($sql);
            echo '<br>'.$zz.'. cleared div_res_'.$lang;
        }
        break;
        //if($zz>2) break;
    }
    return 'done';
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
//add all language columns in these 3 tables:
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
    //$res = $mysqli->query($sql1);
    $res = q($sql1);

    while($row = $res->fetch_assoc()){
        //echo $row['code'].'<br>';
        $field = 'div_res_'.$row['code'];
        if(in_array($field,$columns)){
            echo 'exists '.$field.'<br>';
        }else{
            echo 'NOT exists '.$field.'<br>';
            $sql = 'ALTER TABLE diverses ADD '.$field.' varchar(255)';
            //$result = q($sql);
        }

        $field = 'div_res_long_'.$row['code'];
        if(in_array($field,$columns)){
            echo 'exists '.$field.'<br>';
        }else{
            echo 'NOT exists '.$field.'<br>';
            $sql = 'ALTER TABLE diverses ADD '.$field.' text';
            //$result = q($sql);
        }

    }
return '';

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
function add_cols_to_language_lines()
{
    if(!Table_exists('language_lines')) return 'language_lines - table not found! ';
    global $mysqli;

    $sql = "SHOW COLUMNS FROM language_lines ";
    //$res = $mysqli->query($sql);
    $res = q($sql);

    while($row = $res->fetch_assoc()){
        $columns[] = $row['Field'];
    }
    //print_r($columns);

    $sql1 = "select * from languages order by code desc ";
    //$res = $mysqli->query($sql1);
    $res = q($sql1);

    while($row = $res->fetch_assoc()){
        //echo $row['code'].'<br>';
        $field = $row['code'];
        if(in_array($field,$columns)){
            echo 'exists '.$field.'<br>';
        }else{
            echo 'creating - NOT yet exists '.$field.'<br>';
            $sql = 'ALTER TABLE `language_lines` ADD `'.$field.'` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL AFTER `text`';

            //$result = $mysqli->query($sql);
            q($sql);
        }
    }
}
function add_cols_to_myd_translations()
{
    if(!Table_exists('myd_translations')) return 'myd_translations - table not found! ';
    global $mysqli;

    $sql = "SHOW COLUMNS FROM myd_translations ";
    //$res = $mysqli->query($sql);
    $res = q($sql);

    while($row = $res->fetch_assoc()){
        $columns[] = $row['Field'];
    }
    //print_r($columns);

    $sql1 = "select * from languages order by code desc ";
    //$res = $mysqli->query($sql1);
    $res = q($sql1);

    while($row = $res->fetch_assoc()){
        //echo $row['code'].'<br>';
        $field = $row['code'];
        if(in_array($field,$columns)){
            echo 'exists '.$field.'<br>';
        }else{
            echo 'creating - NOT yet exists '.$field.'<br>';
            $sql = 'ALTER TABLE `myd_translations` ADD `'.$field.'` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL AFTER `text`';

            //$result = $mysqli->query($sql);
            q($sql);
        }
    }
}
