<?php

if (!function_exists('datetime')) {

    /**
     * allows you to easily apply a runtime timezone value to all of your datetimes
     *
     * @param \Datetime $value
     * @param string    $format
     * @param string    $timezone
     * @return string
     */
    function datetime($value, $format = 'm/d/y', $timezone = null)
    {
        //null value
        if (is_null($value)) {
            return null;
        }

        //timezone -. set to: 'default_timezone' => env('APP_TIMEZONE', 'europe/berlin'),
        $timezone = ($timezone) ?: config('helpers.default_timezone');

        //set timezone
        if ($timezone) {
            $value->setTimezone($timezone);
        }

        //format
        return $value->format($format);
    }
}

if (!function_exists('datetimeSpan')) {

    /**
     * allows you to easily apply a runtime timezone value to a datetime span
     *
     * @param \Datetime $start
     * @param \Datetime $end
     * @param string    $startFormat
     * @param string    $endFormat
     * @param string    $timezone
     * @return string
     */
    function datetimeSpan($start, $end, $startFormat, $endFormat, $timezone = null)
    {
        //null start or end
        if (is_null($start) || is_null($end)) {
            return null;
        }

        //timezone
        $timezone = ($timezone) ?: config('helpers.default_timezone');

        //set timezone
        if ($timezone) {
            $start->setTimezone($timezone);
            $end->setTimezone($timezone);
        }

        //format
        return $start->format($startFormat) . ' - ' . $end->format($endFormat);
    }
}

function datestring_translate($str, $to_lang = 'de')
{
    $str = str_replace('Mar', 'Mär', $str);
    $str = str_replace('May', 'Mai', $str);
    $str = str_replace('Oct', 'Okt', $str);
    $str = str_replace('Dec', 'Dez', $str);

    return $str;
}
function germDateToSQL($datestring)
{
//01.04.2008 22:01:58 = 2008-04-01 22:01:58
    $datestring1 = substr($datestring, 0, 10);
    $ttime = str_replace($datestring1, "", $datestring);
    $ttime = trim($ttime);
    $arr = explode(".", $datestring1);
    $temp = $arr[2].'-'.$arr[1].'-'.$arr[0];

    return $temp.' '.$ttime;
}
function wochentag($sqlDate)
{
//2008-06-20 19:43:00
    /*
$stunde = substr($sqlDate,11,2);
$minute = substr($sqlDate,14,2);
$sekunde = substr($sqlDate,17,2);
$monat = substr($sqlDate,6,2);
$tag = substr($sqlDate,8,2);
$jahr = substr($sqlDate,0,4);
$mydate = mktime($stunde, $minute, $sekunde, $monat, $tag, $jahr);
*/
    $mydate = strtotime($sqlDate);
    $weekday = date("w", $mydate);
    //$weekdays = array(ll("Sonntag"), ll("Montag"), ll("Dienstag"), ll("Mittwoch"), ll("Donnerstag"), ll("Freitag"), ll("Samstag"));
    $weekdays = ["Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag"];
    $weekdayname = $weekdays[$weekday];

    return $weekdayname;
}
function changeDateFormate($date, $date_format)
{
    return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format($date_format);
}
function date_from_timestamp($timestamp, $format)
{
    return date($format, $timestamp);
}
function Timestamp_to_SQLDate($aTimeStamp)
{
    if ($aTimeStamp > 0) {
        return date("Y-m-d H:i:s", $aTimeStamp);
    } else {
        return $aTimeStamp;
    }
}
function Timestamp_to_SQLDate_Null_Uhr($aTimeStamp)
{
    if ($aTimeStamp > 0) {
        return date("Y-m-d 00:00:00", $aTimeStamp);
    } else {
        return $aTimeStamp;
    }
}
function getDatefromTimestamp_short($aTimeStamp)
{
    if ($aTimeStamp > 0) {
        return date("d.m.Y", $aTimeStamp);
    } else {
        return $aTimeStamp;
    }
}

function getTimestampFromSQLDate($sqlDate)
{
    $ts = strtotime($sqlDate);
    return $ts;
}
function getSQLDatefromGermDate($datestring)
{
    return germDateToSQL($datestring);
}

function getSQLDatefromTimestamp($aTimeStamp)
{
    return date("Y-m-d H:i:s", $aTimeStamp);
}

function getSQLDatefromTimestamp_local_time($aTimeStamp)
{
    //$time_diff = 60*60*9; // 9 Std.
    $time_diff = 0;
    $aTimeStamp = $aTimeStamp + $time_diff;
    return date("Y-m-d H:i:s", $aTimeStamp);
}

function getGermanDatefromTimestamp($aTimeStamp)
{
    return date("d.m.Y H:i:s", $aTimeStamp);
}

function getGermanDatefromTimestamp_no_secs($aTimeStamp)
{
    return date("d.m.Y H:i", $aTimeStamp);
}

function getGermanDatefromSQLDate($sqlDate)
{
    $x = getTimestampFromSQLDate($sqlDate);
    return getDatefromTimestamp($x);
}

function getGermanDatefromSQLDate_short($sqlDate)
{
    $x = getTimestampFromSQLDate($sqlDate);
    return getDatefromTimestamp_short($x);
}

function add_days_to_sql_date($sqlDate, $days)
{
    $secs = $days * 24 * 60 * 60;
    $TimeStamp = getTimestampFromSQLDate($sqlDate);
    $TimeStamp = $TimeStamp + $secs;
    return getSQLDatefromTimestamp($TimeStamp);
}


function tag_and_date_germ_from_SQLDate($SQLDate)
{
    $r_wtag = wochentag($SQLDate);
    return $r_wtag . ', ' . getGermanDatefromSQLDate($SQLDate);
}

function tag_and_date_germ_from_Timestamp_local_time($Timestamp)
{
    $SQLDate = getSQLDatefromTimestamp_local_time($Timestamp);
    $r_wtag = wochentag($SQLDate);
    return $r_wtag . ', ' . getGermanDatefromSQLDate($SQLDate);
}

function tag_and_date_germ_from_Timestamp_server_time($Timestamp)
{
    $SQLDate = getSQLDatefromTimestamp($Timestamp);
    $r_wtag = wochentag($SQLDate);
    return $r_wtag . ', ' . getGermanDatefromSQLDate($SQLDate);
}

function germ_datestring_to_sql($datestring)
{
    $arr = explode(".", $datestring);
    $temp = trim($arr[2]) . '-' . trim($arr[1]) . '-' . trim($arr[0]);
    return $temp;
}

function sql_to_germ_datestring($datestring)
{
    $datestring = str_replace('00:00:00', '', $datestring);
    $datestring = trim($datestring);

    $arr = explode("-", $datestring);
    $temp = $arr[2] . '.' . $arr[1] . '.' . $arr[0];
    if ($temp == '00.00.0000') {
        return '';
    } else {
        return $temp . '';
    }
}

function addDaysToTimeStamp($aAddDays, $aTimestamp)
{
    return mktime(
        date("H", $aTimestamp),
        date("i", $aTimestamp),
        date("s", $aTimestamp),
        date("m", $aTimestamp),
        date("d", $aTimestamp) + $aAddDays,
        date("Y", $aTimestamp));
}

function subtractDaysFromTimeStamp($aAddDays, $aTimestamp)
{
    return mktime(
        date("H", $aTimestamp),
        date("i", $aTimestamp),
        date("s", $aTimestamp),
        date("m", $aTimestamp),
        date("d", $aTimestamp) - $aAddDays,
        date("Y", $aTimestamp));
}

function makeExpireDate($daysToAdd)
{
    return mktime(date("H"), date("i"), date("s"), date("m"), date("d") + $daysToAdd, date("Y"));
}

function makeExpireDateFromTimeStamp($timestamp, $daysToAdd)
{
    return mktime(date("H"), date("i"), date("s"), date("m"), date("d") + $daysToAdd, date("Y"));
}

function getDateAddHours($aTimeStamp, $Hours)
{
    return mktime(date("H", $aTimeStamp) + $Hours, date("i", $aTimeStamp), date("s", $aTimeStamp), date("m", $aTimeStamp), date("d", $aTimeStamp), date("Y", $aTimeStamp));
}

function getDateAddMonths($aTimeStamp, $aMonths)
{
    return mktime(date("H", $aTimeStamp), date("i", $aTimeStamp), date("s", $aTimeStamp), date("m", $aTimeStamp) + $aMonths, date("d", $aTimeStamp), date("Y", $aTimeStamp));
}

function getDateAddDays($aTimeStamp, $aDays)
{
    return mktime(date("H", $aTimeStamp), date("i", $aTimeStamp), date("s", $aTimeStamp), date("m", $aTimeStamp), date("d", $aTimeStamp) + $aDays, date("Y", $aTimeStamp));
}

function getDateSubstMonths($aTimeStamp, $aMonths)
{
    return mktime(date("H", $aTimeStamp), date("i", $aTimeStamp), date("s", $aTimeStamp), date("m", $aTimeStamp) - $aMonths, date("d", $aTimeStamp), date("Y", $aTimeStamp));
}

function siko_datum_ext_for_table()
{
    $t = time();
    $t2 = Timestamp_to_SQLDate($t);
    $t2 = str_replace('-', '_', $t2);
    $t2 = substr($t2, 5, 5);

    return "_siko_" . $t2;
}

function long_siko_datum_ext_for_table()
{
    $t = time();
    $t2 = Timestamp_to_SQLDate($t);
    $t2 = str_replace('-', '', $t2);
    $t2 = str_replace(':', '', $t2);
    $t2 = str_replace(' ', '_', $t2);

    return $t2;
}
