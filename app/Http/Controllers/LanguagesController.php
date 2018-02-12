<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLanguagesRequest;
use App\Http\Requests\UpdateLanguagesRequest;
use App\Repositories\LanguagesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
//use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Excel;
use Toastr;
use DB;

class LanguagesController extends AppBaseController
{
    /** @var  LanguagesRepository */
    private $languagesRepository;

    public function __construct(LanguagesRepository $languagesRepo)
    {
        $this->languagesRepository = $languagesRepo;
    }


    public function export($type){

        $languages = $this->languagesRepository->orderBy('id', 'asc')->get();

        Excel::create('languages', function($excel) use($languages) {
            $excel->sheet('ExportFile', function($sheet) use($languages) {
                $sheet->fromArray($languages);
            });
        })->export($type);
    }

    /**
     * Display a listing of the Languages.
     *
     * @param Request $request
     * @return Response
     */

    public function index(Request $request)
    {
     $this_table = 'languages';
     $perPageLimit_default = 8;
     create_dv('languages_disp_per_page', $perPageLimit_default, true);
     $perPageLimit = get_dv('languages_disp_per_page');
//dd($perPageLimit);
     $order = NULL;
     $order = $request->get('order'); // Order by what column?

     $default_order = 'id';
     if(get_dv('languages_table_default_sort_order')) $default_order = 'sort_order' ;
     if(is_null($order)) $order = $default_order;

     $dir = NULL;
     $dir = $request->get('dir'); // Order direction: asc or desc
     if(is_null($dir)) $dir = 'asc';

     $mysearch = NULL;
     $mysearch = $request->get('mysearch');

     $filter = null;
     $filter = $request->get('filter');


     if(!is_null($filter)) {
         //create your own more usefull filters
         if($filter=='dummy'){
             $languages = DB::table($this_table)->where('id', '<=', 30);
         }
         if($filter=='has_status'){
             $languages = DB::table($this_table)->where('status_frontend', '=', 1)->orWhere('status', '=', 1);
         }

         $page_appends = [
             'order' => $order,
             'dir' => $dir,
             'filter' => $filter,
         ];
         $languages = $languages->paginate($perPageLimit);
         $data[$this_table] = $languages;
         $data['dir'] = $dir ;
         $data['curr_dir'] = $dir ;
         $data['order'] = $order;
         $data['page_appends'] = $page_appends;
         return view('backend.languages.index')->with('data', $data);
     }


     if(!is_null($mysearch)) {
         // get column names from table for columns with text (char, varchar, text etc.)
         $table_fields_array = get_columns_from_table_text_only($this_table, $as_array=true);
         $number_cols = count($table_fields_array);
         //dd($number_cols);
         //dd($table_fields_array);
         $languages = DB::table($this_table)
             ->where($table_fields_array[0], 'like', '%'.$mysearch.'%')
             /*  remove rows that are not needed - or add more rows if $numer_cols > 13  */
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
             ->orWhere(isset($table_fields_array[13]) ? $table_fields_array[13] : $table_fields_array[1] , 'like', '%'.$mysearch.'%')
             ->orderBy($order, $dir);

         // Tell the Paginator to append the following to the page URL as well
         $page_appends = [
             'order' => $order,
             'dir' => $dir,
             'mysearch' => urlencode($mysearch),
         ];
         $languages = $languages->paginate($perPageLimit);

         $data[$this_table] = $languages;
         $data['dir'] = $dir ;
         $data['curr_dir'] = $dir ;
         $data['order'] = $order;
         $data['page_appends'] = $page_appends;
         return view('backend.languages.index')->with('data', $data);
     } // if(!is_null($mysearch))

     $this->languagesRepository->pushCriteria(new RequestCriteria($request));
     $page_appends = [
         'order' => $order,
         'dir' => $dir,
     ];
     $languages = $this->languagesRepository->orderBy($order, $dir)->paginate($perPageLimit);
     $data[$this_table] = $languages;
     $data['dir'] = $dir == 'asc' ? 'desc' : 'asc';
     $data['curr_dir'] = $dir ;
     $data['order'] = $order;
     $data['page_appends'] = $page_appends;
     return view('backend.languages.index')->with('data', $data);
   }


    /**
     * Show the form for creating a new Languages.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.languages.create');
    }



    /**
     * Store a newly created Languages in storage.
     *
     * @param CreateLanguagesRequest $request
     *
     * @return Response
     */
    public function store(CreateLanguagesRequest $request)
    {
        $input = $request->all();

        $languages = $this->languagesRepository->create($input);

        Toastr::success('Languages saved successfully.');

        return redirect(route('admin.languages.index'));
    }

    /**
     * Display the specified Languages.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $languages = $this->languagesRepository->findWithoutFail($id);

        if (empty($languages)) {
            Toastr::error('Not found in Languages: '.$id);
            return redirect(route('admin.languages.index'));
        }

        return view('backend.languages.show')->with('languages', $languages);
    }

    /**
     * Show the form for editing the specified Languages.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $languages = $this->languagesRepository->findWithoutFail($id);

        if (empty($languages)) {
            Toastr::error('in Languages not found');

            return redirect(route('admin.languages.index'));
        }

        return view('backend.languages.edit')->with('languages', $languages);
    }

    /**
     * Update the specified Languages in storage.
     *
     * @param  int              $id
     * @param UpdateLanguagesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLanguagesRequest $request)
    {
        $languages = $this->languagesRepository->findWithoutFail($id);

        if (empty($languages)) {
            Toastr::error('in Languages not found');

            return redirect(route('admin.languages.index'));
        }

        $languages = $this->languagesRepository->update($request->all(), $id);

        Toastr::success($id . 'in Languages updated successfully.');

        return redirect(route('admin.languages.index'));
    }

    /**
     * Remove the specified Languages from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $languages = $this->languagesRepository->findWithoutFail($id);

        if (empty($languages)) {
            Toastr::error('Not found in Languages: '.$id);
            return redirect(route('admin.languages.index'));
        }

        $this->languagesRepository->delete($id);
        Toastr::success('Deleted in Languages: '.$id);
        return redirect(route('admin.languages.index'));
    }
}
