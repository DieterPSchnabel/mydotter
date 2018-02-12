<?php

/*
$this->mPlural = Str::plural($this->mName);
$this->mCamel = Str::camel($this->mName);
$this->mCamelPlural = Str::camel($this->mPlural);
$this->mSnake = Str::snake($this->mName);
$this->mSnakePlural = Str::snake($this->mPlural);
$this->mDashed = str_replace('_', '-', Str::snake($this->mSnake));
$this->mDashedPlural = str_replace('_', '-', Str::snake($this->mSnakePlural));
$this->mSlash = str_replace('_', '/', Str::snake($this->mSnake));
$this->mSlashPlural = str_replace('_', '/', Str::snake($this->mSnakePlural));
$this->mHuman = title_case(str_replace('_', ' ', Str::snake($this->mSnake)));
$this->mHumanPlural = title_case(str_replace('_', ' ', Str::snake($this->mSnakePlural)));
*/

// Laravel Helpers:
/*
see also laravel build in helpers

Strings
__
camel_case
class_basename
e
ends_with
kebab_case
preg_replace_array
snake_case
starts_with
str_after
str_before
str_contains
str_finish
str_is
str_limit
str_plural
str_random
str_replace_array
str_replace_first
str_replace_last
str_singular
str_slug
str_start
studly_case
title_case
trans
trans_choice

Arrays & Objects
__
array_add
array_collapse
array_divide
array_dot
array_except
array_first
array_flatten
array_forget
array_get
array_has
array_last
array_only
array_pluck
array_prepend
array_pull
array_random
array_set
array_sort
array_sort_recursive
array_where
array_wrap
data_fill
data_get
data_set
head
last

*/
function strip_tag_p($txt){
    $txt = str_replace('<p>','',$txt);
    $txt = str_replace('</p>','',$txt);
    return $txt;
}

function properCase($text)
{
return ucfirst(strtolower($text));
}
function lowerCase($text)
{
return strtolower($text);
}
function upperCase($text)
{
return strtoupper($text);
}
//title_case - for sentence in headers - Laravel
function mark($text) {
        if( isset($_GET['mysearch']) ) {
            $search = $_GET['mysearch'];
            //$text = str_replace($search, '<mark>'.$search.'</mark>', $text);
            $text = str_replace(upperCase($search), '<mark>'.upperCase($search).'</mark>', $text);
            $text = str_replace(lowerCase($search), '<mark>'.lowercase($search).'</mark>', $text);
            $text = str_replace(properCase($search), '<mark>'.propercase($search).'</mark>', $text);
            return $text;
        }else{
            return $text;
        }
}
function left($string, $count)
{
    return substr($string, 0, $count);
}

function right($str, $length)
{
    return substr($str, -$length);
}

function TextBetween($s1, $s2, $s)
{
    $s1 = strtolower($s1);
    $s2 = strtolower($s2);
    $L1 = strlen($s1);
    $scheck = strtolower($s);
    if ($L1 > 0) {
        $pos1 = strpos($scheck, $s1);
    } else {
        $pos1 = 0;
    }
    if ($pos1 !== false) {
        if ($s2 == '') {
            return substr($s, $pos1 + $L1);
        }
        $pos2 = strpos(substr($scheck, $pos1 + $L1), $s2);
        if ($pos2 !== false) {
            return substr($s, $pos1 + $L1, $pos2);
        }
    }

    return '';
}

function remove_newlines($str)
{
    return preg_replace("/[\n\r]/", "", $str);;
}

function remove_spaces($str)
{
//$str = 'foo   o';
// Das ist jetzt 'foo o'
    $str = preg_replace('/\s\s+/', ' ', $str);
    return $str;
}
