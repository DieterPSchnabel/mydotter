<?php

$mysqli = new mysqli("localhost", "root", "my4711", "boilerplate-rappasoft-20-3", 3306);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$set_mysql_base = "boilerplate-rappasoft-20-3";
