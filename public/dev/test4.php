<?php

require('includes/config.php');
require('includes/functions.php');
require('includes/my_cat_funct.php');
require('includes/my_cat_funct2.php');

?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>
    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->
    <![endif]-->

    <script src="includes/jquery.min.js"></script>

</head>
<body>

<h2 style="color:#bbb"><?= 'test4.php'; ?></h2>


<div id="results" style="margin:22px 24px;font-size:1.2em">
    <table style="width: 100%;"  cellpadding="6">
        <tbody>
        <tr>
            <td>get Table Stru</td>
            <td>echo fields_in_table1('diverses');</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>meistens:</td>
            <td><b>echo fields_in_table2('diverses');</b></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>echo fields_in_table3('diverses');</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>echo fields_in_table4('diverses');</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        </tbody>
    </table>
    <!-- DivTable.com -->
</div>



<div id="results" style="margin:22px 24px;font-size:1.2em">

    <?php
    //ec('xxxxxxxxxxxxx');
    //add_cols_to_diverse();
    //echo lookup('select div_res_de from diverses where id = 63051','div_res_de');
    //add_timestamp_cols_to_table('diverses');

    //echo Table_Exists('diverses55');
    //echo fields_in_table2('diverses');
    echo fields_in_table1('diverses');

    //echo number_records('select * from diverses');


    //$table = 'diverses';
    //$index_field = 'div_res';
    //echo  drop_index_if_exists($table, $index_field);

    //echo print_r(getAllTables());

    // echo get_all_tables_select();
    //echo add_timestamp_cols_to_table($table);
    //echo add_timestamp_cols_to_all_tables();
    //echo add_timestamp_cols_to_table('tests');

    ?>

    <script>
        function show_table_str(table){
            //table = $('select_table').value;
            //table = '<?php //echo getParam('select_table','') ?>';
            //alert(table);
            //alert(nr);
            //table = $('#select_table').options[selectedIndex].value;
            alert(table);
            //ax_jq(url,param,target)
            //do_qu('ax_updater.php','id=611_' + nr + '_x_y_x_' + table ,'CONF_show_table_str');
            //$('#this_selected_table').value = table;
        }

    </script>
    <div id="CONF_show_table_str"></div>

    <?php

    //echo append_from_table('diverses', 'diverses3', $where_clause=' where 1=1 ');

    //echo drop_index_if_exists($table, $index_field);
    //echo check_index_if_exists($table, $index_field);


    //$sql = 'select * from diverses';

    /*if (!$result = $mysqli->query($sql)) {
        // Oh no! The query failed.
        echo "Sorry, the website is experiencing problems.";

        // Again, do not do this on a public site, but we'll show you how
        // to get the error information
        echo "Error: Our query failed to execute and here is why: \n";
        echo "Query: " . $sql . "\n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit;
    }*/

    /*    $result = $mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {

            //echo '&nbsp; &nbsp; &nbsp; &nbsp;  '.$row['div_what'].'<br>';

        }*/

    /*
        $fields = mysqli_fetch_fields('boilerplate-rappasoft-20-3', 'diverse');
        $columns = mysql_num_fields($fields);
        for ($i = 0; $i < $columns; $i++) {$field_array[] = mysql_field_name($fields, $i);}

        if (!in_array('price', $field_array))
        {
            //$result = mysql_query('ALTER TABLE table_name ADD price VARCHAR(10)');
        }*/

    //$sql = 'select div_res_fr from diverses';
    //$sql = "SHOW COLUMNS FROM diverses LIKE 'div_res_fr' ";
    /*$sql = "SHOW COLUMNS FROM diverses ";

    if ($result=mysqli_query($mysqli,$sql))
    {
        // Get field information for all fields
        $fieldinfo=mysqli_fetch_fields($result);

        foreach ($fieldinfo as $val)
        {
            //printf("Name: %s\n",$val->name);
            //printf("Table: %s\n",$val->table);
            //printf("max. Len: %d\n",$val->max_length);
            //echo $val->name .'<br>';
            if( $result->num_rows === 0 ) {

                echo $val->name .' column fehlt<br>';
                //$alter = "ALTER TABLE tablename ADD columnname varchar(50) NOT NULL";
                //$mysqli->query($alter);
            } else {
                echo $val->name .' column exists<br>';
            }


        }
        // Free result set
        mysqli_free_result($result);
    }*/







    //$con->close();




















    ?>

    <!-- jQuery -->

    <!-- Bootstrap JavaScript -->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</div>

</body>
</html>
