<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCountriesRequest;
use App\Http\Requests\UpdateCountriesRequest;
use App\Repositories\CountriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
//use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Excel;
use Toastr;
use DB;

class CountriesController extends AppBaseController
{
    /** @var  CountriesRepository */
    private $countriesRepository;

    public function __construct(CountriesRepository $countriesRepo)
    {
        $this->countriesRepository = $countriesRepo;
    }


    public function export($type){

        $countries = $this->countriesRepository->orderBy('id', 'asc')->get();

        Excel::create('countries', function($excel) use($countries) {
            $excel->sheet('ExportFile', function($sheet) use($countries) {
                $sheet->fromArray($countries);
            });
        })->export($type);
    }

    /**
     * Display a listing of the Countries.
     *
     * @param Request $request
     * @return Response
     */

    public function index(Request $request)
    {
     $this_table = 'countries';
     $perPageLimit_default = 8;
     create_dv('countries_disp_per_page', $perPageLimit_default, true);
     $perPageLimit = get_dv('countries_disp_per_page');

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
             $countries = DB::table($this_table)->where('id', '<=', 30);
         }

         $page_appends = [
             'order' => $order,
             'dir' => $dir,
             'filter' => $filter,
         ];
         $countries = $countries->paginate($perPageLimit);
         $data[$this_table] = $countries;
         $data['dir'] = $dir ;
         $data['curr_dir'] = $dir ;
         $data['order'] = $order;
         $data['page_appends'] = $page_appends;
         return view('backend.countries.index')->with('data', $data);
     }


     if(!is_null($mysearch)) {
         // get column names from table for columns with text (char, varchar, text etc.)
         $table_fields_array = get_columns_from_table_text_only($this_table, $as_array=true);
         $number_cols = count($table_fields_array);
         //dd($number_cols);
         //dd($table_fields_array);
         $countries = DB::table($this_table)
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
         $countries = $countries->paginate($perPageLimit);

         $data[$this_table] = $countries;
         $data['dir'] = $dir ;
         $data['curr_dir'] = $dir ;
         $data['order'] = $order;
         $data['page_appends'] = $page_appends;
         return view('backend.countries.index')->with('data', $data);
     } // if(!is_null($mysearch))

     $this->countriesRepository->pushCriteria(new RequestCriteria($request));
     $page_appends = [
         'order' => $order,
         'dir' => $dir,
     ];
     $countries = $this->countriesRepository->orderBy($order, $dir)->paginate($perPageLimit);
     $data[$this_table] = $countries;
     $data['dir'] = $dir == 'asc' ? 'desc' : 'asc';
     $data['curr_dir'] = $dir ;
     $data['order'] = $order;
     $data['page_appends'] = $page_appends;
     return view('backend.countries.index')->with('data', $data);
   }


    /**
     * Show the form for creating a new Countries.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.countries.create');
    }



    /**
     * Store a newly created Countries in storage.
     *
     * @param CreateCountriesRequest $request
     *
     * @return Response
     */
    public function store(CreateCountriesRequest $request)
    {
        $input = $request->all();

        $countries = $this->countriesRepository->create($input);

        Toastr::success('Countries saved successfully.');

        return redirect(route('admin.countries.index'));
    }

    /**
     * Display the specified Countries.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $countries = $this->countriesRepository->findWithoutFail($id);

        if (empty($countries)) {
            Toastr::error('in Countries not found');

            return redirect(route('admin.countries.index'));
        }

        return view('backend.countries.show')->with('countries', $countries);
    }

    /**
     * Show the form for editing the specified Countries.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $countries = $this->countriesRepository->findWithoutFail($id);

        if (empty($countries)) {
            Toastr::error('in Countries not found');

            return redirect(route('admin.countries.index'));
        }

        return view('backend.countries.edit')->with('countries', $countries);
    }

    /**
     * Update the specified Countries in storage.
     *
     * @param  int              $id
     * @param UpdateCountriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCountriesRequest $request)
    {
        $countries = $this->countriesRepository->findWithoutFail($id);

        if (empty($countries)) {
            Toastr::error('in Countries not found');

            return redirect(route('admin.countries.index'));
        }

        $countries = $this->countriesRepository->update($request->all(), $id);

        Toastr::success($id . 'in Countries updated successfully.');

        return redirect(route('admin.countries.index'));
    }

    /**
     * Remove the specified Countries from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $countries = $this->countriesRepository->findWithoutFail($id);

        if (empty($countries)) {
            Toastr::error('Countries not found');

            return redirect(route('admin.countries.index'));
        }

        $this->countriesRepository->delete($id);

        Toastr::success($id . ' deleted successfully.');

        return redirect(route('admin.countries.index'));
    }
}
