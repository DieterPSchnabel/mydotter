<?php

$cache_minutes_selection = lookup_without_cache('diverses', 'div_res', 'cache_minutes_selection', $id_field ='div_what' );
if($cache_minutes_selection=='1') {
    define("CACHE_MINUTES", "0"); // no caching
    define("CACHE_MINUTES_SHORT", "0");  // 1
}
if($cache_minutes_selection=='2') {
    define("CACHE_MINUTES", "1"); // 1 min
    define("CACHE_MINUTES_SHORT", "1");  // 1
}
if($cache_minutes_selection=='3') {
    define("CACHE_MINUTES", "60"); // 60 min
    define("CACHE_MINUTES_SHORT", "1");  // 1
}
if($cache_minutes_selection=='4') {
    define("CACHE_MINUTES", "11400"); // 10 Tage
    define("CACHE_MINUTES_SHORT", "10");  // 1
/*}else{
    define("CACHE_MINUTES", "0"); // no caching
    define("CACHE_MINUTES_SHORT", "0");  // 1*/
}
