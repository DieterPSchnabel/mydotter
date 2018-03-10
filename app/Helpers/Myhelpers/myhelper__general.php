<?php





//$cos = App\Models\Diverses::all()->pluck('div_what');
//$cos = App\Models\Diverses::->(where 1=1)->pluck('div_what');

//$cos =  DB::table('diverses')->pluck('div_what');
//$languages = get_languages(); // array - all activated langs in sort order

//session()->put('locale', 'fr');
//$loc = session()->get('locale');



//$value = $request->session()->get('key');
//$value = session('locale', 'default');
//ec(__line__.': '.$value);

//dd($session);


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

// Laravel Collection-Helpers:
/*
all
average
avg
chunk
collapse
combine
concat
contains
containsStrict
count
crossJoin
dd
diff
diffKeys
dump
each
eachSpread
every
except
filter
first
flatMap
flatten
flip
forget
forPage
get
groupBy
has
implode
intersect
isEmpty
isNotEmpty
keyBy
keys
last
map
mapInto
mapSpread
mapToGroups
mapWithKeys
max
median
merge
min
mode
nth
only
pad
partition
pipe
pluck
pop
prepend
pull
push
put
random
reduce
reject
reverse
search
shift
shuffle
slice
sort
sortBy
sortByDesc
splice
split
sum
take
tap
toArray
toJson
transform
union
unique
uniqueStrict
unless
values
when
where
whereStrict
whereIn
whereInStrict
whereNotIn
whereNotInStrict
zip
*/


//use App\Models\Diverses;
function ___________define_diverse(){
// in routes/ web.php

/*    ec(__line__.': '.App::getLocale());
    ec(__line__.': '.session()->get('locale'));
    ec(__line__.': '.session_lang_code());
    ec(__line__.': '.env('APP_LOCALE') );
    ec(__line__.': '.env('APP_FALLBACK_LOCALE') );*/


    $languages = get_languages();

    //$cos = DB::table('diverses')->get();;
   // $cos =   App\Models\Diverses::all();

    $cos = Cache::remember('diverses.all', constant("CACHE_MINUTES"), function () {
            return App\Models\Diverses::all();
     });

    foreach ($cos as $co) {
        /*foreach($languages as $lang){
            $res_field = "div_res_long_".$lang->code;
            $def_name = $co->div_what.'_'.$lang->code;
            define($def_name, $co->$res_field, true);
        }*/
        //description short and long, all active languages
        foreach($languages as $lang) {
            //$res_field = "div_res_long_" . session_lang_code();
            $res_field = "div_res_long_" . $lang->code;
            $def_name = $co->div_what . '_l_' . $lang->code;

            //APP_FALLBACK_LOCALE=en
            //APP_LOCALE=de
            //if(  (trim($co->$res_field)=='' or is_null($co->$res_field))   and session_lang_code() <> env('APP_LOCALE')){
            /* if(  (trim($co->$res_field)=='' or is_null($co->$res_field))   ){
                 $res_field = "div_res_long_".env('APP_FALLBACK_LOCALE');
                 $def_name = $co->div_what.'_l_'.session_lang_code();
                 define($def_name, $co->$res_field, true);
             } else {*/
            if (!defined($def_name)) define($def_name, $co->$res_field, true);
            //}
            //ec('1. '.$def_name. ' = '. $co->$res_field);
        }

        foreach($languages as $lang) {


        $res_field = "div_res_".$lang->code;
        $def_name = $co->div_what.'_s_'.$lang->code;

        /*    if( (trim($co->$res_field)=='' or is_null($co->$res_field)) and session_lang_code() <> env('APP_LOCALE')){
                $res_field = "div_res_".env('APP_LOCALE');
                define($def_name, $co->$res_field, true);
            }else {*/
            if (!defined($def_name)) define($def_name, $co->$res_field, true);
        //}

        //ec('2. '.$def_name. ' = '. $co->$res_field);
        }


        //content

        $res_field = "div_res_long";
        $def_name = $co->div_what.'_long';
        //ec($def_name. '  ');
        if (!defined($def_name)) define($def_name, $co->$res_field, true);
        //ec('3. '.$def_name. ' = '. $co->$res_field);

        $res_field = "div_res";
        $def_name = $co->div_what;
        //ec($def_name. '  ');
        if (!defined($def_name)) define($def_name, $co->$res_field, true);
        //ec('4. '.$def_name. ' = '. $co->$res_field);

    }


}

/**
 * Global helpers file with misc functions.
 */
if (! function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (! function_exists('access')) {
    /**
     * Access (lol) the Access:: facade as a simple function.
     */
    function access()
    {
        return app('access');
    }
}

if (! function_exists('history')) {
    /**
     * Access the history facade anywhere.
     */
    function history()
    {
        return app('history');
    }
}

if (! function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (! function_exists('includeRouteFiles')) {

    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function includeRouteFiles($folder)
    {
        $directory = $folder;
        $handle = opendir($directory);
        $directory_list = [$directory];

        while (false !== ($filename = readdir($handle))) {
            if ($filename != '.' && $filename != '..' && is_dir($directory.$filename)) {
                array_push($directory_list, $directory.$filename.'/');
            }
        }

        foreach ($directory_list as $directory) {
            foreach (glob($directory.'*.php') as $filename) {
                require $filename;
            }
        }
    }
}

if (! function_exists('getRtlCss')) {

    /**
     * The path being passed is generated by Laravel Mix manifest file
     * The webpack plugin takes the css filenames and appends rtl before the .css extension
     * So we take the original and place that in and send back the path.
     *
     * @param $path
     *
     * @return string
     */
    function getRtlCss($path)
    {
        $path = explode('/', $path);
        $filename = end($path);
        array_pop($path);
        $filename = rtrim($filename, '.css');

        return implode('/', $path).'/'.$filename.'.rtl.css';
    }
}




function use_translations()
{
    if(env('APP_USE_GOOGLE_TRANSLATION') and get_app_is_multilang() ) return true;
}

//todo app_top
function is_admin_area()
{
    return true;
}
//todo
/*   ............. 2 logisch .................. */

function to_bool($val)
{
    //if ($val == 1 or $val === true or $val === 'true' or $val === '1') {
    if ($val === 1 or $val === true or $val === 'true'  or $val === '1') {
        return true;
    } else {
        return false;
    }
}
function zuf($len=10)
{
    return str_random($len);
}
/**
 * alias function for session_lang_code()
 */

function is_odd($number)
{
    return $number & 1; // 0 = even, 1 = odd
}

/*   ............. 4 Diverses .................. */
function cache_it($c_key,$value,$minutes=CACHE_MINUTES){
    //$c_key = $table.'.'.$field.'.'.$id_field.'.'.$id;
    Cache::forget( $c_key );
    Cache::put($c_key, $value, $minutes);
    return true;
}
function is_dev()
{

    $is_dev = to_bool(get_dv('is_dev')); // is cached in lookup()
    return $is_dev;
}

//function get_dv_id($what, $field = 'id', $lang = '')
function get_dv_id($what)
{
    $c_key = 'diverses'.'.id.'.'div_what'.'.'.$what;
    $res = Cache::remember($c_key, CACHE_MINUTES, function () use ($what) {
        $res = App\Models\Diverses::where('div_what', '=', $what)->firstOrFail();
        return $res->id;
    });
    //return $res->id;
    return $res;
}

function lookup($table, $field, $id, $id_field ='id' )
{
    //if(is_null($id) or $id=='') return 'Fehler1 in lookup - keine $id';
    if(is_null($id) or $id=='') return '';
    $c_key = $table.'.'.$field.'.'.$id_field.'.'.$id;

    $res = Cache::remember($c_key, CACHE_MINUTES, function () use ($table, $field, $id, $id_field) {
        return DB::select("select $field from $table where $id_field = ?", [$id]);
    });
    //if($id=='actionbox_update_null_dates_all_tables') dd(is_string($res));
    //dd(count($res)>0);
    //if(! is_null($res) and is_array($res) and count($res)>0 ) {
    if(is_string($res)) return $res;
    if(! is_null($res) and count($res)>0 ) {
            $arr = (array)$res;
            return $arr[0]->$field;
    }else{
        //return '<b style="font-size:1.3em;color:#c00">Fehler2 in lookup -  $t_key not exists ('.$id.')</b>';
        return '';
    }

}
function lookup_without_cache($table, $field, $id, $id_field ='id' )
{
    //dd(__line__.': '.$field);
    if(is_null($id) or $id=='') return 'Fehler1 in lookup - keine $id';
    $c_key = $table.'.'.$field.'.'.$id_field.'.'.$id;

    /*$res = Cache::remember($c_key, CACHE_MINUTES, function () use ($table, $field, $id, $id_field) {
        return DB::select("select $field from $table where $id_field = ?", [$id]);
    });*/
    $res = DB::select("select $field from $table where $id_field = ?", [$id]);
    if(! is_null($res) and is_array($res) and count($res)>0 ) {
        $arr = (array)$res;
        return $arr[0]->$field;
    }else{
        return '<b style="font-size:1.3em;color:#c00">Fehler3 in lookup no cache -  $t_key not exists ('.$id.')</b>';
    }
}
function lookup2($sql, $field)
{
    $field = trim($field);
    $resultat = q($sql);
    //dd($resultat);
    if($resultat === 1) return true;
    if($resultat === true) return true;
    if($resultat === 0) return false;
    if($resultat === false) return false;
    if(is_null($resultat)) return false;
    $row = $resultat->fetch_assoc();
    return $row[$field];
}
//function get_dv($what, $field = 'div_res', $lang = '')
function get_dv($what, $field = 'div_res')
{
    $what = trim($what);
    //caching in lookup() !!
    $res = lookup('diverses', $field, $what, $id_field ='div_what' );
    return $res;
}

function get_dv_not_cached($what, $field = 'div_res')
{
    $what = trim($what);
    //caching in lookup() !!
    $res = lookup_without_cache('diverses', $field, $what, $id_field = 'div_what');
    return $res;
}

function get_div_what_by_id($div_id)
{
    $res = lookup('diverses', 'div_what', $div_id, $id_field = 'id');
    return $res;
}
function __get_dv($what, $field = 'div_res', $lang=null) //div_res or div_res_long for short text or long text in diverses
{
    if(empty($lang)) {
        $field = $field . '_' . session_lang_code();
    }else{
        $field = $field . '_' . $lang;
    }
    $what = trim($what);

    //caching in lookup() !!
    $res = trim(lookup('diverses', $field, $what, $id_field ='div_what'));

    if( empty($res) ){
        //find fallback alternative if first try is empty
        $session_lang_code = session_lang_code();
        $fallback_lang = env("APP_FALLBACK_LOCALE");
        $new_field = str_replace($session_lang_code,$fallback_lang,$field);
        //fallback alternative:
        $res = lookup_without_cache('diverses', $new_field, $what, $id_field ='div_what' );
        if( empty($res) ){
            if(is_dev()){
                return '<span class="dimmed04" style="color:#ddd">#DEV: __get_dv(' . $what . '/' . $field . ')</span>';
            }
            return '';
        }
    }
    return $res;
}
function __get_dv_arr($what)
{
    $what = trim($what);
    $res = App\Models\Diverses::where('div_what', $what)->firstOrFail()->toArray();
    //$res1 = array_collapse($res);
    return $res;
    //usage:
    /*$x = get_dv_arr('is_dev');
    //ec( print_ar($x) );
    $dont_show_array = ['id', 'div_what', 'updated_at', 'created_at'];
    foreach ($x as $key => $value) {
        if(!in_array($key, $dont_show_array))  {
            ec($key.' - '.$value);
        }
    }*/
}
function get_dv_c_key($what, $field = 'div_res')
{
    //Cache::flush();
    $what = trim($what);
    $c_key = 'diverses'.'.'.$field.'.'.'div_what'.'.'.$what;
    $res = Cache::remember($c_key, CACHE_MINUTES, function () use ($what,$field) {
        return lookup('diverses', $field, $what, $id_field = 'div_what' );
    });
    //$res = lookup('diverses', $field, $what, $id_field ='div_what' );
    return $c_key;
}
function set_dv($what, $value, $field = 'div_res')
{
    $what = trim($what);
    $c_key = 'diverses'.'.'.$field.'.'.'div_what'.'.'.$what;
    cache_it($c_key,$value); //forgets old value and caches new value
}
function set_dv_id($id, $value, $field = 'div_res')
{
    App\Models\Diverses::where('id', '=', $id)->update([$field => $value]); //addslashes??
    $c_key = 'diverses'.'.'.$field.'.'.'div_what'.'.'.$what;
    //cache_it('diverses',$field,$id,$value);
}


function create_dv($what, $value = '',$first=false, $field = 'div_res')
{
    /*
    create without a value if possible - like: create_dv('mykey')
    if you must add a value then add $first=true - like create_dv('mykey','myvalue',true)
    important for proper caching!
    */
    $what = trim($what);
    //create_dv($what, $value = '1', $field = 'div_res');
    $c_key = 'diverses'.'.'.$field.'.'.'div_what'.'.'.$what.'.count';
        $count = 0;
        $count = Cache::remember($c_key, CACHE_MINUTES, function () use ($what,$field)
        {
            return App\Models\Diverses::where(['div_what' => $what])->count();
        });
        if ($count == 0) {
            App\Models\Diverses::create(['div_what' => $what, $field => $value]);
            //$count
            $c_key = 'diverses'.'.'.$field.'.'.'div_what'.'.'.$what.'.count';
            cache_it($c_key,1); //here always value = 1 because it was just created
            //$value
            if($value<>'' and ! $first) {
                //if value=='' or $first indicates the very first creation of key - so don't cache it yet
                //seems to be obsolete ?? but works
                $c_key = 'diverses' . '.' . $field . '.' . 'div_what' . '.' . $what;
                cache_it($c_key, $value);
            }
        }
}

function set_app_top($what, $value)
{
    $what = trim($what);
    set_dv($what, $value, 'app_top');
}

function replicate_record_by_div_what($div_what, $new_div_what){
    $div_what = trim($div_what);
    $new_div_what = trim($new_div_what);
    $dont_copy_array = ['id', 'div_what', 'updated_at', 'created_at'];

    //check if exists
    //already checked in myhelper_ax at 112 - gives warning in return if exists - and then stops

    $record = App\Models\Diverses::where('div_what', $div_what)->get()->toArray();
    $res1_arr = $record;

    $newID = App\Models\Diverses::create(
        [
            'div_what' => $new_div_what
        ]);
    $insert_id = $newID->id;

    $res1_arr = array_collapse($res1_arr); // !!

    $update_fields_arr = [];
    foreach ($res1_arr as $key => $value) {
        if(!in_array($key, $dont_copy_array))  {
            $update_fields_arr[$key] = $value;
        }
    }

    App\Models\Diverses::where('div_what', '=', $new_div_what)->update($update_fields_arr);
    return true;
}

function dashboard_settings_show_edit_links()
{
    //todo create role for user who are allowed to edit
    if (is_dev() or get_dv('dashboard_settings_show_edit_links')) return true;
}
// my functions

if (! function_exists('img_my_logo')) {

    /**
     * @param string $size
     * @param string $title
     * @param string $style
     * @param string $class
     * @return string
     */
    function img_my_logo($size = '36', $title = '', $style = '', $class = '')
    {
        return '<img src="'.url('img/logos/mydotter/logo-57x57.png').'" width="'.$size.'px" height="'.$size.'px" title="'.$title.'" class="'.$class.'" style="'.$style.'" />';
    }
}

//<img src="{{url('img/logos/mydotter/logo-57x57.png')}}" width="36px" height="36px" />

function getParamCookie($aVarName, $aVarAlt)
{

    $lVarName = $_COOKIE[$aVarName];
    if (! Empty($lVarName)) {
        return cleanInput($lVarName);
    } else {
        return $aVarAlt;
    }
}

function getParam($aVarName, $aVarAlt)
{

    $lVarName = $_REQUEST[$aVarName];
    //$lVarName=$_GET[$aVarName];
    if (! Empty($lVarName)) {
        if (is_array($lVarName)) {
            $lReturnArray = [];
            foreach ($lVarName as $key => $value) {
                $value = cleanInput($value);
                $key = cleanInput($key);
                $lReturnArray[$key] = $value;
            }

            return $lReturnArray;
        } else {
            return cleanInput($lVarName);
        }
    } else {
        $lVarName = $_COOKIE[$aVarName];
        if (! Empty($lVarName)) {
            return cleanInput($lVarName);
        } else {
            return $aVarAlt;
        }
    }
}

function getParamInt($aVarName, $aVarAlt)
{
    $lNum = "";

    if ($_REQUEST["$aVarName"] != "") {
        $lNum = $_REQUEST["$aVarName"];
    } elseif ($_REQUEST["$aVarName"] != "") {
        $lNum = $_REQUEST["$aVarAlt"];
    }

    return preg_replace('/\D+(\.)+/', '', $lNum);
}

function cleanInput($var)
{
    return htmlspecialchars($var);
}

function productImagePath($image_name)
{
    return public_path('images/products/'.$image_name);
}

function filesize_in_kb_mb($file)
{

    if (file_exists($file)) {
        $x = filesize($file);
        $x = $x / 1024;

        if ($x < 1000) {

            return nuf(round($x, 0)).' KB';
        } else {
            return nuf(round($x / 1000, 1)).' MB';
        }
    } else {
        return 'file not found!';
    }
}

function get_image_dimensions($file, $what = 3)
{
    $this_img_size = getimagesize($file);
    $this_img_width = $this_img_size[0];
    $this_img_height = $this_img_size[1];
    $this_img_dimensions = $this_img_size[3];

    if ($what == 0) {
        return $this_img_width;
    }
    if ($what == 1) {
        return $this_img_height;
    }
    if ($what == 3) {
        return $this_img_dimensions;
    }
}

function number_files_in_folder_filemanager($folder)
{
    $anz = 0;
    $anz_sub = 0;
    $dossier = opendir($folder);
    while ($file = readdir($dossier)) {
        if ($file != "." && $file != ".." && $file != "Thumbs.db") {
            if (! is_dir($folder."/".$file)) { // Works always
                // if (get_ext($file) == 'jpg' or get_ext($file) == 'gif' or get_ext($file) == 'png') {
                //ec("$file");
                $anz++;
                // }
            }else{
                //ec($folder."/".$file);
                if($file<>'thumbs') $anz_sub++;
            }

        }
    }
    closedir($dossier);
    $r = $anz.' files / '.$anz_sub.' subfolder';
    //$r = $anz;
    return $r;
}
function number_files_in_folder($folder)
{
    //$folder = $folder.'\\';
    //$folder = 'C:\laragon\www6\rappasoft\public\myuploads/images//shares/ttt2';
    //$folder = 'C:\laragon\www6\rappasoft\public\images//shares/ttt2';
    $anz = 0;
    $anz_sub = -1;
    $dossier = opendir($folder);
    while ($file = readdir($dossier)) {
        if ($file != "." && $file != ".." && $file != "Thumbs.db") {
            if (! is_dir($folder."/".$file)) { // Works always
                // if (get_ext($file) == 'jpg' or get_ext($file) == 'gif' or get_ext($file) == 'png') {
                //ec("$file");
                $anz++;
                // }
            }else{
                $anz_sub++;
            }

        }
    }
    closedir($dossier);
    //$r = $anz.' files / '.$anz_sub.' subfolder';
    $r = $anz;
    return $r;
//return $folder;
}
function number_files_in_folder2($folder)
{
    $folderPath = $folder;
    $countFile = 0;
    $totalFiles = glob($folderPath."*");
    if ($totalFiles) {
        $countFile = count($totalFiles);
    }

    return $countFile;
}

function ec($txt, $bold = false, $style = "")
{
    if ($bold) {
        $bold_txt = 'font-weight:bold;';
    } else {
        $bold_txt = '';
    }
    if ($style <> '') {
        $style_txt = ';'.$style.';';
    }
    echo '<div style="font-size:1.2em;padding:3px 10px;background:#ffffe9;color:#001;'.$bold_txt.$style.'">'.$txt.'</div>';
}

function ecdb($txt, $bold = false, $style = "")
{
    global $debug_show_index_page_no;
    if (to_bool($debug_show_index_page_no)) {
        if ($bold) {
            $bold_txt = 'font-weight:bold;';
        } else {
            $bold_txt = '';
        }
        if ($style <> '') {
            $style_txt = ';'.$style.';';
        }
        if (i_am_superadmin()) {
            echo '<div style="font-size:1.2em;padding:3px 10px;background:#e9ffe9;color:#001;'.$bold_txt.$style.'">'.$txt.'</div>';
        }
    }
}

/*
function failMsg($aTitle, $aContent)
{
    echo "<p><b style='color:red'>Error occurred </b><br />
	We are sorry, but an unexpected error occurred and the system could not continue serving you.
	</p>";
    echo "<p><b>" . $aTitle . "</b><br /> " . $aContent . "</p>";
    //$show_bar = 0;
}*/

/*function get_highest_id($table)
{
$sql = "select * from $table order by id desc limit 1";
//return q($sql);
    $resultat = q($sql);
    if($resultat === 1) return true;
    if($resultat === true) return true;

    if($resultat === 0) return false;
    if($resultat === false) return false;
    if(is_null($resultat)) return false;

    $row = $resultat->fetch_assoc();
    return $row['id'];
}*/

function is_valid_email($email)
{
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        return true;
    } else {
        return false;
    }
}

function my_server_url()
{
    $server_name = $_SERVER['SERVER_NAME'];

    if (!in_array($_SERVER['SERVER_PORT'], [80, 443])) {
        $port = ":$_SERVER[SERVER_PORT]";
    } else {
        $port = '';
    }

    if (!empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1')) {
        $scheme = 'https';
    } else {
        $scheme = 'http';
    }
    return $scheme.'://'.$server_name.$port;
}
//shop images

function manuf_img_path_reg($absolute_path=false)
{
    if($absolute_path){
        $p = public_path();
    }else {
        $p = my_server_url();
    }
    $p .= '/img/shop/manufacturers/regular/';
    return $p;
}
function manuf_img_path_ori($absolute_path=false)
{
    if($absolute_path){
        $p = public_path();
    }else {
        $p = my_server_url();
    }
    $p .= '/img/shop/manufacturers/original/';
    return $p;
}

function encodeToUtf8_loc($string)
{
    //return mb_convert_encoding($string, "UTF-8", mb_detect_encoding($string, "UTF-8, ISO-8859-1, ISO-8859-15", true));

    return mb_convert_encoding($string, "UTF-8", "auto");
}
//in assistnas einfügen von div mit option zum ein- ausblenden
function vb_div($id)
{
    $is_active = to_bool(get_dv($id));
    $disp = 'none';
    if($is_active) $disp = 'display';
    return '<div id = "vw_'.$id.'" style="display:'.$disp.';
                           padding:0 3px 6px 12px;margin:0;background:#aca">';
}

function get_options_for_records_per_page($max, $currently_selected=8)
{
    $arr = array(1,2,3,4,5,8,10,12,15,20,30,40,50,100,200,500);

    $r='';
        foreach ($arr as $value) {
            $select_str = '';
            if ($value < $max) {
                if($currently_selected==$value) $select_str ='selected';
                $r .= '<option '. $select_str .' value ="' . $value . '">' . $value . '</option>';
            }
        }
            $select_str = '';
            if($currently_selected==$max) $select_str ='selected';
            $r .= '<option '. $select_str .' value ="'.$max.'">alle '.$max.' &nbsp; </option>';
    return $r;
}

function get_options_for_boxes_per_page($max, $currently_selected=8)
{
    $r='';
    for ($i=1; $i++; $i <= $max) {
        $select_str = '';
        if ($i <= $max) {
            if($currently_selected==$i) $select_str ='selected';
            $r .= '<option '. $select_str .' value ="' . $i . '">' . $i . ' Cards</option>';
        }else{
            break;
        }
    }
    return $r;
}

function print_ar($array, $count=0) {
    $i=0;
    $k=0;
    $count=0;
    $tab ='';
    while($i != $count) {
        $i++;
        $tab .= "&nbsp;&nbsp;|&nbsp;&nbsp;";
    }
    foreach($array as $key=>$value){
        if(is_array($value)){
            echo $tab."[<strong><u>$key</u></strong>]<br />";
            $count++;
            print_ar($value, $count);
            $count--;
        }
        else{
            $tab2 = substr($tab, 0, -12);
            echo "$tab2~ $key: <strong>$value</strong><br />";
        }
        $k++;
    }
    $count--;
}

function tab_head_td_mark($col)
{
    if(isset($_GET['order']) ) {
        if($_GET['order'] == $col) {
            return 'class="bg_mark"';
        }
    }
}

function once_every_hours($eintrag_inDiv, $cronjob = false, $val = '48')
{
// in Div:  short = update_customers_orders_wie_oft  (Std) z.B: 24
// long = update_customers_orders_wie_oft (letzten Datum SQL )
// Bespiel: once_every_hours('update_customers_orders_wie_oft')

// zB: send_mail_that_there_is_no_nl_job = 24
// sendet alle 24 Std. div_res
// letztes SendeDatum im SQL-Format in div_res_long 2008-08-08 10:00:00
//$item='send_mail_that_there_is_no_nl_job';
//create_dv($what,$val)
    set_dv_if_not_exists_to($eintrag_inDiv, $val, $app_top = false);

    $item = $eintrag_inDiv;
    $send_every_hours = get_dv($item);

    if ($cronjob) $send_every_hours = floor($send_every_hours / 2);

    $last_send_date = get_div_long_value_byKey($item); // Datum in SQL Format

    if ($last_send_date == '') $last_send_date = '2001-01-01 00:00:00';

    $last_send_date_timestamp = getTimestampFromSQLDate($last_send_date);
    $last_send_date_timestamp = $last_send_date_timestamp + ($send_every_hours * 60 * 60);

    $t = local_time();
    $t_sql = Timestamp_to_SQLDate($t);


    if ($t > $last_send_date_timestamp) {
        //update $item
        $sql = "update diverses set div_res_long = '" . $t_sql . "' where div_what = '" . $item . "' ";
        q($sql);
        return true;
    } else {
        return false;
    }
}

// if (once_every_days('send_mail_that_there_is_no_nl_job')) do this
function once_every_days($eintrag_inDiv)
{
// sendet alle 60 Tage div_res
// letztes SendeDatum im SQL-Format in div_res_long 2008-08-08 10:00:00
//$item='send_mail_that_there_is_no_nl_job';
    $item = $eintrag_inDiv;
    $send_every_days = get_dv($item);
    $last_send_date = get_div_long_value_byKey($item);
    if ($last_send_date == '') $last_send_date = '2001-01-01 00:00:00';

    $last_send_date_timestamp = getTimestampFromSQLDate($last_send_date);
    $last_send_date_timestamp = $last_send_date_timestamp + ($send_every_days * 24 * 60 * 60);

    $t = time();
    $t_sql = Timestamp_to_SQLDate($t);

    if ($t > $last_send_date_timestamp) {
        //update $item
        $sql = "update diverses set div_res_long = '" . $t_sql . "' where div_what = '" . $item . "' ";
        q($sql);
        return true;
    } else {
        return false;
    }
}

function ip_adr()
{
    return $_SERVER['REMOTE_ADDR'];
}
function fa_popup(){
    /*$fa_popup = '<sup><i title="Popup" style="color:#888;margin-left:2px;font-weight:normal;text-shadow:none;" class="fa fa-window-restore" aria-hidden="true"></i></sup>';*/

    $fa_popup = '<i title="Popup" style="color:#000;margin-left:2px;font-weight:200;text-shadow:none;opacity:0.25" class="fa fa-window-restore" aria-hidden="true"></i>';
    return $fa_popup;
}

//$item_counter_str = '<span style="font-size:0.8em;color:#aaa">#'.$item_counter.'</span>';
function item_counter_str($item_counter)
{
return '<span style="font-size:0.8em;color:#69c">#'.$item_counter.'</span>';
}
function timeAgo($date)
{
    return \Carbon\Carbon::createFromTimestampUTC(strtotime($date))->diffForHumans();
}

function formatDate($date)
{
    return \Carbon\Carbon::createFromTimestampUTC(strtotime($date))->format('d. M y - H:i');
}


/*{{--<div style="color:#777;font-size:0.9em">{!! $languages->created_at->format('d. M y - H:i') !!}</div>--}}*/
