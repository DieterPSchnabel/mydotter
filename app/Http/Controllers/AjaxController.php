<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Toastr;

class AjaxController extends Controller
{
   public function index(Request $request){
       //dd($request);
   	$para_komplett = $request['id'] ;
	$teile = explode("_", $para_komplett, 2);
	$id = str_replace('id=', "", $teile[0]);
	$para = $teile[1];

	//helpers_ax.php
	$return_msg = do_exec2($id, $para);
    //Toastr::success('Update wurde gespeichert!', '', []);
	return response()->json(array('msg'=> $return_msg), 200);
   }    



   public function ___checkbox_to_any_table(Request $request){
   	$para = $request['id'] ;
 
/*
   	$r_arr = explode("_xyx_", $para);
 //function checkbox_to_any_table(checked, ident ,table, field, id_field, id){
 	$checked = $r_arr[0];
 	$ident = $r_arr[1];
 	$table = $r_arr[2];
 	$field = $r_arr[3];
 	$id_field = $r_arr[4]; 	 	
 	$id = $r_arr[5];
*/
 	$sql="update $table set $field = ? where $id_field = ?";
/*
	DB::table($table)
            ->where($id_field, $id)
            ->update([$field => $checked]); 	
*/
	//return response()->json(array('msg'=> $msg), 200);
	//return response()->json(array('msg'=> 'done '.$sql), 200);
      return response()->json(array('msg'=> $sql), 200);

   }






} //end class AjaxController extends Controller

