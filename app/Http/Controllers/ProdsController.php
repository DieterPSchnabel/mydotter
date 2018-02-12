<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProdsRequest;
use App\Http\Requests\UpdateProdsRequest;
use App\Repositories\ProdsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
//use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Excel;
use Toastr;
use DB;

class ProdsController extends AppBaseController
{
    /** @var  ProdsRepository */
    private $prodsRepository;

    public function __construct(ProdsRepository $prodsRepo)
    {
        $this->prodsRepository = $prodsRepo;
    }


    public function export($type){

        $prods = $this->prodsRepository->orderBy('id', 'asc')->get();

        Excel::create('prods', function($excel) use($prods) {
            $excel->sheet('ExportFile', function($sheet) use($prods) {
                $sheet->fromArray($prods);
            });
        })->export($type);
    }

    /**
     * Display a listing of the Prods.
     *
     * @param Request $request
     * @return Response
     */

    public function index(Request $request)
    {
     $this_table = 'prods';
     $perPageLimit_default = 8;
     create_dv('prods_disp_per_page', $perPageLimit_default, true);
     $perPageLimit = get_dv('prods_disp_per_page');

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
         //create your own more usefull filters
         if($filter=='dummy'){
             $prods = DB::table($this_table)->where('id', '<=', 30);
         }

         $page_appends = [
             'order' => $order,
             'dir' => $dir,
             'filter' => $filter,
         ];
         $prods = $prods->paginate($perPageLimit);
         $data[$this_table] = $prods;
         $data['dir'] = $dir ;
         $data['curr_dir'] = $dir ;
         $data['order'] = $order;
         $data['page_appends'] = $page_appends;
         return view('backend.prods.index')->with('data', $data);
     }


     if(!is_null($mysearch)) {
         // get column names from table for columns with text (char, varchar, text etc.)
         $table_fields_array = get_columns_from_table_text_only($this_table, $as_array=true);
         $number_cols = count($table_fields_array);
         //dd($number_cols);
         //dd($table_fields_array);
         $prods = DB::table($this_table)
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
         $prods = $prods->paginate($perPageLimit);

         $data[$this_table] = $prods;
         $data['dir'] = $dir ;
         $data['curr_dir'] = $dir ;
         $data['order'] = $order;
         $data['page_appends'] = $page_appends;
         return view('backend.prods.index')->with('data', $data);
     } // if(!is_null($mysearch))

     $this->prodsRepository->pushCriteria(new RequestCriteria($request));
     $page_appends = [
         'order' => $order,
         'dir' => $dir,
     ];
     $prods = $this->prodsRepository->orderBy($order, $dir)->paginate($perPageLimit);
     $data[$this_table] = $prods;
     $data['dir'] = $dir == 'asc' ? 'desc' : 'asc';
     $data['curr_dir'] = $dir ;
     $data['order'] = $order;
     $data['page_appends'] = $page_appends;
     return view('backend.prods.index')->with('data', $data);
   }


    /**
     * Show the form for creating a new Prods.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.prods.create');
    }



    /**
     * Store a newly created Prods in storage.
     *
     * @param CreateProdsRequest $request
     *
     * @return Response
     */
    public function store(CreateProdsRequest $request)
    {
        $input = $request->all();

        $prods = $this->prodsRepository->create($input);

        Toastr::success('Prods saved successfully.');

        return redirect(route('admin.prods.index'));
    }

    /**
     * Display the specified Prods.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $prods = $this->prodsRepository->findWithoutFail($id);

        if (empty($prods)) {
            Toastr::error('in Prods not found');

            return redirect(route('admin.prods.index'));
        }

        return view('backend.prods.show')->with('prods', $prods);
    }

    /**
     * Show the form for editing the specified Prods.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $prods = $this->prodsRepository->findWithoutFail($id);

        if (empty($prods)) {
            Toastr::error('in Prods not found');

            return redirect(route('admin.prods.index'));
        }

        return view('backend.prods.edit')->with('prods', $prods);
    }

    /**
     * Update the specified Prods in storage.
     *
     * @param  int              $id
     * @param UpdateProdsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProdsRequest $request)
    {
        $prods = $this->prodsRepository->findWithoutFail($id);

        if (empty($prods)) {
            Toastr::error('in Prods not found');

            return redirect(route('admin.prods.index'));
        }

        $prods = $this->prodsRepository->update($request->all(), $id);

        Toastr::success($id . 'in Prods updated successfully.');

        return redirect(route('admin.prods.index'));
    }

    /**
     * Remove the specified Prods from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $prods = $this->prodsRepository->findWithoutFail($id);

        if (empty($prods)) {
            Toastr::error('Prods not found');

            return redirect(route('admin.prods.index'));
        }

        $this->prodsRepository->delete($id);

        Toastr::success($id . ' deleted successfully.');

        return redirect(route('admin.prods.index'));
    }
}
