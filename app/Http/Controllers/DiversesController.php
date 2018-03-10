<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDiversesRequest;
use App\Http\Requests\UpdateDiversesRequest;
use App\Repositories\DiversesRepository;
use DB;
use Excel;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Toastr;

//use Flash;

class DiversesController extends AppBaseController
{
    /** @var  DiversesRepository */
    private $diversesRepository;

    public function __construct(DiversesRepository $diversesRepo)
    {
        $this->diversesRepository = $diversesRepo;
    }


    public function export($type){

        $diverses = $this->diversesRepository->orderBy('id', 'asc')->get();

        Excel::create('diverses', function($excel) use($diverses) {
            $excel->sheet('ExportFile', function($sheet) use($diverses) {
                $sheet->fromArray($diverses);
            });
        })->export($type);
    }

    /**
     * Display a listing of the Diverses.
     *
     * @param Request $request
     * @return Response
     */

    public function index(Request $request)
    {
     $this_table = 'diverses';
     $perPageLimit_default = 8;
     create_dv('diverses_disp_per_page', $perPageLimit_default, true);
     $perPageLimit = get_dv('diverses_disp_per_page');

     $order = NULL;
     $order = $request->get('order'); // Order by what column?
     if(is_null($order)) $order = 'id';

     $dir = NULL;
     $dir = $request->get('dir'); // Order direction: asc or desc
     if(is_null($dir)) $dir = 'asc';

     $mysearch = NULL;
     $mysearch = $request->get('mysearch');

     $filter = null;
     $filter = $request->get('filter');


     if(!is_null($filter)) {
         //create your own, more usefull filters
         if($filter=='dummy'){
             $diverses = DB::table($this_table)->where('id', '<=', 30);
         }

         if($filter=='show_only_hints'){
             //display only lang cols that are activated in languages
             $active_str = active_languages_str_for_diverses($as_array = false, 'long');
             $active_str = $active_str . ',id,updated_at,div_what';
             $previous_active_str = get_dv('diverses_disp_cols_arr', 'div_res_long');
             $active_str = $active_str . $previous_active_str;
             set_dv('diverses' . '_disp_cols_arr', $active_str, 'div_res_long');
             //filter
             $diverses = DB::table($this_table)->where('is_hint', '=', '1');
         }
         if ($filter == 'show_only_missing_transl') {
             //display only lang cols that are activated in languages
             $active_str = active_languages_str_for_diverses($as_array = false);
             $active_str = $active_str .',id,updated_at,div_what';
             $previous_active_str = get_dv('diverses_disp_cols_arr', 'div_res_long');
             $active_str = $active_str . $previous_active_str;
             set_dv('diverses'.'_disp_cols_arr', $active_str, 'div_res_long');
             $c_key = 'diverses' . '.' . 'div_res_long' . '.' . 'div_what' . '.' . 'diverses' . '_disp_cols_arr';
             cache_it($c_key, $active_str);
             //filter
             //$diverses = DB::table($this_table)->where('is_hint', '=', '1');
             //$diverses =  DB::select('select * from diverses where is_hint = ?', [1]);

             //raw: select * from diverses where is_hint = 1 and (
             //div_res_de = '' or div_res_long_de = '' or
             //div_res_en = '' or div_res_long_en = '' or
             //div_res_fr = '' or div_res_long_fr = '' )

             $active_languages_str_for_diverses_raw_query = active_languages_str_for_diverses_raw_query();
             //$diverses =  DB::select('select * from diverses where is_hint = ?', [1])
             /*$diverses =  DB::select('select * from diverses')
                 ->where(DB::raw(" is_hint = 1 and ( div_res_de = '' or div_res_long_de = '' or div_res_en = '' or div_res_long_en = '' or div_res_fr = '' or div_res_long_fr = '' )" ));*/

             /*$diverses =  DB::select('select * from diverses')
                 ->where(DB::raw(" is_hint , 1 and ( div_res_de , '' or div_res_long_de . '' or div_res_en , '' or div_res_long_en , '' or div_res_fr , '' or div_res_long_fr , '' )" ));*/

             /*$diverses =  DB::select('select * from diverses ')*/
             $languages = get_languages();
             $r = '';
             foreach ($languages as $lang) {
                 //$r .= '\''.$lang->code.'\',';
                 //$r .= 'div_res_'.$lang->code.',';
                 //$r .= 'div_res_long_'.$lang->code.',';
             }
             $lang1 = 'en';
             $lang2 = 'fr';
             $lang3 = 'it';

             $diverses = DB::table('diverses')
                 ->select('*')
                 ->whereRaw('div_res_long_de = ""', '', 'and (')
                 /*->whereRaw( 'div_res_long_de = ""' , '', 'or')*/
                 /* ->whereRaw( 'div_res_'.$lang1.' = ""' , '', 'or')*/
                 ->whereRaw('div_res_long_' . $lang1 . ' = ""', '', 'or')
                 /*->whereRaw( 'div_res_'.$lang2.' = ""' , '', 'or')*/
                 ->whereRaw('div_res_long_' . $lang2 . ' = ""', '', 'or')
                 /*->whereRaw( 'div_res_'.$lang3.' = ""' , '', 'or')*/
                 ->whereRaw('div_res_long_' . $lang3 . ' = ""', '', 'or')
                 ->whereRaw('and is_hint = 1', '', ')')
                 /*->whereRaw( 'and id > 0)','','')*/
                 /*->toSQL()*/
             ;
//dd($diverses);

             /*$diverses = DB::select('*')
                 ->from(`diverses`)
                 ->where(DB::raw('( div_res_de = "" or div_res_long_de = "" or div_res_en = "" or div_res_long_en = "" or div_res_fr = "" or div_res_long_fr = "" or div_res_it = "" or div_res_long_it = "" )' ))
                 ->where(`is_hint`, '=', 1)
                 ->where(`id`, '>', 0, ')')
                 ->toSQL();*/

             /*->whereRaw( `div_res_de` , '' or `div_res_long_de` , '' or `div_res_en` , '' or `div_res_long_en` , '' or `div_res_fr` , '' or `div_res_long_fr` , ''  );*/


             /*$diverses = DB::select(`*`)
                 ->from(`diverses`)
                 ->where(`is_hint`, `=`, 1)
                 ->where(DB::raw(`( div_res_de = '' or div_res_long_de = '' or div_res_en = '' or div_res_long_en = '' or div_res_fr = '' or div_res_long_fr = '' )` ));*/


             /*->get();*/
             //active_languages_str_for_diverses_raw_query()

             /*#########################################*/
             //toSql();
             //dd(DB::getQueryLog()); // an array of all queries
             //$queries = DB::getQueryLog();
             //dd(end($queries)); // only last query
             /*#########################################*/
         }

         if ($filter == 'show_only_switches') {
             //display only lang cols that are activated in languages
             /*$active_str = active_languages_str_for_diverses($as_array = false);
             $active_str = $active_str .',id,updated_at,div_what';
             set_dv('diverses'.'_disp_cols_arr', $active_str, 'div_res_long');*/
             //filter
             $diverses = DB::table($this_table)->where('is_active_switch', '=', '1');
         }

         $page_appends = [
             'order' => $order,
             'dir' => $dir,
             'filter' => $filter,
         ];
         $diverses = $diverses->paginate($perPageLimit);
         $data[$this_table] = $diverses;
         $data['dir'] = $dir ;
         $data['curr_dir'] = $dir ;
         $data['order'] = $order;
         $data['page_appends'] = $page_appends;
         return view('backend.diverses.index')->with('data', $data);
     }


     if(!is_null($mysearch)) {
         // get column names from table for columns with text (char, varchar, text etc.)
         $table_fields_array = get_columns_from_table_text_only($this_table, $as_array=true);
         $number_cols = count($table_fields_array);
         //dd($number_cols);
         //dd($table_fields_array);
         $diverses = DB::table($this_table)
             ->where($table_fields_array[0], 'like', '%'.$mysearch.'%')
             /*  remove rows that are not needed - or add more rows if $numer_cols > 13 --  we have ca. 68 fields!! */
             ->orWhere(isset($table_fields_array[1]) ? $table_fields_array[1] : $table_fields_array[1], 'like', '%'.$mysearch.'%')
             ->orWhere(isset($table_fields_array[2]) ? $table_fields_array[2] : $table_fields_array[1], 'like', '%'.$mysearch.'%')
             ->orWhere(isset($table_fields_array[3]) ? $table_fields_array[3] : $table_fields_array[1] , 'like', '%'.$mysearch.'%')
             ->orWhere(isset($table_fields_array[4]) ? $table_fields_array[4] : $table_fields_array[1] , 'like', '%'.$mysearch.'%')
             ->orWhere(isset($table_fields_array[5]) ? $table_fields_array[5] : $table_fields_array[1] , 'like', '%'.$mysearch.'%')
             ->orWhere(isset($table_fields_array[6]) ? $table_fields_array[6] : $table_fields_array[1] , 'like', '%'.$mysearch.'%')
             ->orWhere(isset($table_fields_array[7]) ? $table_fields_array[7] : $table_fields_array[1] , 'like', '%'.$mysearch.'%')
             ->orWhere(isset($table_fields_array[8]) ? $table_fields_array[8] : $table_fields_array[1] , 'like', '%'.$mysearch.'%')
             ->orWhere(isset($table_fields_array[9]) ? $table_fields_array[9] : $table_fields_array[1] , 'like', '%'.$mysearch.'%')
             ->orWhere(isset($table_fields_array[10]) ? $table_fields_array[10] : $table_fields_array[1] , 'like', '%'.$mysearch.'%')
             ->orWhere(isset($table_fields_array[11]) ? $table_fields_array[11] : $table_fields_array[1] , 'like', '%'.$mysearch.'%')
             ->orWhere(isset($table_fields_array[12]) ? $table_fields_array[12] : $table_fields_array[1] , 'like', '%'.$mysearch.'%')
             ->orderBy($order, $dir);

         // Tell the Paginator to append the following to the page URL as well
         $page_appends = [
             'order' => $order,
             'dir' => $dir,
             'mysearch' => urlencode($mysearch),
         ];
         $diverses = $diverses->paginate($perPageLimit);

         $data[$this_table] = $diverses;
         $data['dir'] = $dir ;
         $data['curr_dir'] = $dir ;
         $data['order'] = $order;
         $data['page_appends'] = $page_appends;
         return view('backend.diverses.index')->with('data', $data);
     } // if(!is_null($mysearch))

     $this->diversesRepository->pushCriteria(new RequestCriteria($request));
     $page_appends = [
         'order' => $order,
         'dir' => $dir,
     ];
     $diverses = $this->diversesRepository->orderBy($order, $dir)->paginate($perPageLimit);
     $data[$this_table] = $diverses;
     $data['dir'] = $dir == 'asc' ? 'desc' : 'asc';
     $data['curr_dir'] = $dir ;
     $data['order'] = $order;
     $data['page_appends'] = $page_appends;
     return view('backend.diverses.index')->with('data', $data);
   }


    /**
     * Show the form for creating a new Diverses.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.diverses.create');
    }



    /**
     * Store a newly created Diverses in storage.
     *
     * @param CreateDiversesRequest $request
     *
     * @return Response
     */
    public function store(CreateDiversesRequest $request)
    {
        $input = $request->all();

        $diverses = $this->diversesRepository->create($input);

        Toastr::success('Diverses saved successfully.');

        return redirect(route('admin.diverses.index'));
    }

    /**
     * Display the specified Diverses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $diverses = $this->diversesRepository->findWithoutFail($id);

        if (empty($diverses)) {
            Toastr::error('in Diverses not found');

            return redirect(route('admin.diverses.index'));
        }

        return view('backend.diverses.show')->with('diverses', $diverses);
    }

    /**
     * Show the form for editing the specified Diverses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $diverses = $this->diversesRepository->findWithoutFail($id);

        if (empty($diverses)) {
            Toastr::error('in Diverses not found');

            return redirect(route('admin.diverses.index'));
        }

        return view('backend.diverses.edit')->with('diverses', $diverses);
    }

    /**
     * Update the specified Diverses in storage.
     *
     * @param  int              $id
     * @param UpdateDiversesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDiversesRequest $request)
    {
        $diverses = $this->diversesRepository->findWithoutFail($id);

        if (empty($diverses)) {
            Toastr::error('in Diverses not found');

            return redirect(route('admin.diverses.index'));
        }

        $diverses = $this->diversesRepository->update($request->all(), $id);

        Toastr::success($id . 'in Diverses updated successfully.');

        //return redirect(route('admin.diverses.index'));
        return redirect()->back();
    }


    public function update_long_field_by_div_what(Request $request, $id)
    {
        if($request->this_lang_code == ''){
            $this_field = 'div_res_long';
        }else{
            $this_field = 'div_res_long_';
        }
        set_dv($id, $request->ce, $field = $this_field.$request->this_lang_code);
        Toastr::success($id . ' updated successfully.');
        return redirect()->back();
    }
    /**
     * Remove the specified Diverses from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $diverses = $this->diversesRepository->findWithoutFail($id);

        if (empty($diverses)) {
            Toastr::error('Diverses not found');

            return redirect(route('admin.diverses.index'));
        }

        $this->diversesRepository->delete($id);

        Toastr::success($id . ' deleted successfully.');

        return redirect(route('admin.diverses.index'));
    }
}
