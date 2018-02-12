<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLanguage_linesRequest;
use App\Http\Requests\UpdateLanguage_linesRequest;
use App\Repositories\Language_linesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
//use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Excel;
use Toastr;
use DB;

class Language_linesController extends AppBaseController
{
    /** @var  Language_linesRepository */
    private $languageLinesRepository;

    public function __construct(Language_linesRepository $languageLinesRepo)
    {
        $this->languageLinesRepository = $languageLinesRepo;
    }


    public function export($type){

        $languageLines = $this->languageLinesRepository->orderBy('id', 'asc')->get();

        Excel::create('languageLines', function($excel) use($languageLines) {
            $excel->sheet('ExportFile', function($sheet) use($languageLines) {
                $sheet->fromArray($languageLines);
            });
        })->export($type);
    }

    /**
     * Display a listing of the Language_lines.
     *
     * @param Request $request
     * @return Response
     */

    public function index(Request $request)
    {
     $this_table = 'languageLines';

     $perPageLimit_default = 8;
     create_dv('languageLines_disp_per_page', $perPageLimit_default, true);
     $perPageLimit = get_dv('languageLines_disp_per_page');

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
         //create your own, more usefull filters snake_case('fooBar')
         if($filter=='dummy'){
             $languageLines = DB::table(snake_case($this_table))->where('id', '<=', 30);
         }

         $page_appends = [
             'order' => $order,
             'dir' => $dir,
             'filter' => $filter,
         ];
         $languageLines = $languageLines->paginate($perPageLimit);
         $data[$this_table] = $languageLines;
         $data['dir'] = $dir ;
         $data['curr_dir'] = $dir ;
         $data['order'] = $order;
         $data['page_appends'] = $page_appends;
         return view('backend.language_lines.index')->with('data', $data);
     }


     if(!is_null($mysearch)) {
         // get column names from table for columns with text (char, varchar, text etc.)
         $table_fields_array = get_columns_from_table_text_only(snake_case($this_table), $as_array=true);
         $number_cols = count($table_fields_array);
         //dd($number_cols);
         //dd($table_fields_array);
         $languageLines = DB::table(snake_case($this_table))
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
             ->orderBy($order, $dir);

         // Tell the Paginator to append the following to the page URL as well
         $page_appends = [
             'order' => $order,
             'dir' => $dir,
             'mysearch' => urlencode($mysearch),
         ];
         $languageLines = $languageLines->paginate($perPageLimit);

         $data[$this_table] = $languageLines;
         $data['dir'] = $dir ;
         $data['curr_dir'] = $dir ;
         $data['order'] = $order;
         $data['page_appends'] = $page_appends;
         return view('backend.language_lines.index')->with('data', $data);
     } // if(!is_null($mysearch))

     $this->languageLinesRepository->pushCriteria(new RequestCriteria($request));
     $page_appends = [
         'order' => $order,
         'dir' => $dir,
     ];
     $languageLines = $this->languageLinesRepository->orderBy($order, $dir)->paginate($perPageLimit);
     $data[$this_table] = $languageLines;
     $data['dir'] = $dir == 'asc' ? 'desc' : 'asc';
     $data['curr_dir'] = $dir ;
     $data['order'] = $order;
     $data['page_appends'] = $page_appends;
     return view('backend.language_lines.index')->with('data', $data);
   }


    /**
     * Show the form for creating a new Language_lines.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.language_lines.create');
    }



    /**
     * Store a newly created Language_lines in storage.
     *
     * @param CreateLanguage_linesRequest $request
     *
     * @return Response
     */
    public function store(CreateLanguage_linesRequest $request)
    {
        $input = $request->all();

        $languageLines = $this->languageLinesRepository->create($input);

        Toastr::success('Language Lines saved successfully.');

        return redirect(route('admin.languageLines.index'));
    }

    /**
     * Display the specified Language_lines.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $languageLines = $this->languageLinesRepository->findWithoutFail($id);

        if (empty($languageLines)) {
            Toastr::error('in Language Lines not found');

            return redirect(route('admin.languageLines.index'));
        }

        return view('backend.language_lines.show')->with('languageLines', $languageLines);
    }

    /**
     * Show the form for editing the specified Language_lines.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $languageLines = $this->languageLinesRepository->findWithoutFail($id);

        if (empty($languageLines)) {
            Toastr::error('in Language Lines not found');

            return redirect(route('admin.languageLines.index'));
        }

        return view('backend.language_lines.edit')->with('languageLines', $languageLines);
    }

    /**
     * Update the specified Language_lines in storage.
     *
     * @param  int              $id
     * @param UpdateLanguage_linesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLanguage_linesRequest $request)
    {
        $languageLines = $this->languageLinesRepository->findWithoutFail($id);

        if (empty($languageLines)) {
            Toastr::error('in Language Lines not found');

            return redirect(route('admin.languageLines.index'));
        }

        $languageLines = $this->languageLinesRepository->update($request->all(), $id);

        Toastr::success($id . 'in Language Lines updated successfully.');

        return redirect(route('admin.languageLines.index'));
    }

    /**
     * Remove the specified Language_lines from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $languageLines = $this->languageLinesRepository->findWithoutFail($id);

        if (empty($languageLines)) {
            Toastr::error('Language Lines not found');

            return redirect(route('admin.languageLines.index'));
        }

        $this->languageLinesRepository->delete($id);

        Toastr::success($id . ' deleted successfully.');

        return redirect(route('admin.languageLines.index'));
    }
}
