<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Repositories\ProductsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
//use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Excel;
use Toastr;
use DB;

class ProductsController extends AppBaseController
{
    /** @var  ProductsRepository */
    private $productsRepository;

    public function __construct(ProductsRepository $productsRepo)
    {
        $this->productsRepository = $productsRepo;
    }


    public function export($type){

        $products = $this->productsRepository->orderBy('id', 'asc')->get();

        Excel::create('products', function($excel) use($products) {
            $excel->sheet('ExportFile', function($sheet) use($products) {
                $sheet->fromArray($products);
            });
        })->export($type);
    }

    /**
     * Display a listing of the Products.
     *
     * @param Request $request
     * @return Response
     */

    public function index(Request $request)
    {
     $this_table = 'products';
     $perPageLimit_default = 8;
     create_dv('products_disp_per_page', $perPageLimit_default, true);
     $perPageLimit = get_dv('products_disp_per_page');

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
             $products = DB::table($this_table)->where('id', '<=', 30);
         }

         $page_appends = [
             'order' => $order,
             'dir' => $dir,
             'filter' => $filter,
         ];
         $products = $products->paginate($perPageLimit);
         $data[$this_table] = $products;
         $data['dir'] = $dir ;
         $data['curr_dir'] = $dir ;
         $data['order'] = $order;
         $data['page_appends'] = $page_appends;
         return view('backend.products.index')->with('data', $data);
     }


     if(!is_null($mysearch)) {
         // get column names from table for columns with text (char, varchar, text etc.)
         $table_fields_array = get_columns_from_table_text_only($this_table, $as_array=true);
         $number_cols = count($table_fields_array);
         //dd($number_cols);
         //dd($table_fields_array);
         $products = DB::table($this_table)
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
         $products = $products->paginate($perPageLimit);

         $data[$this_table] = $products;
         $data['dir'] = $dir ;
         $data['curr_dir'] = $dir ;
         $data['order'] = $order;
         $data['page_appends'] = $page_appends;
         return view('backend.products.index')->with('data', $data);
     } // if(!is_null($mysearch))

     $this->productsRepository->pushCriteria(new RequestCriteria($request));
     $page_appends = [
         'order' => $order,
         'dir' => $dir,
     ];
     $products = $this->productsRepository->orderBy($order, $dir)->paginate($perPageLimit);
     $data[$this_table] = $products;
     $data['dir'] = $dir == 'asc' ? 'desc' : 'asc';
     $data['curr_dir'] = $dir ;
     $data['order'] = $order;
     $data['page_appends'] = $page_appends;
     return view('backend.products.index')->with('data', $data);
   }


    /**
     * Show the form for creating a new Products.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.products.create');
    }



    /**
     * Store a newly created Products in storage.
     *
     * @param CreateProductsRequest $request
     *
     * @return Response
     */
    public function store(CreateProductsRequest $request)
    {
        $input = $request->all();

        $products = $this->productsRepository->create($input);

        Toastr::success('Products saved successfully.');

        return redirect(route('admin.products.index'));
    }

    /**
     * Display the specified Products.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $products = $this->productsRepository->findWithoutFail($id);

        if (empty($products)) {
            Toastr::error('in Products not found');

            return redirect(route('admin.products.index'));
        }

        return view('backend.products.show')->with('products', $products);
    }

    /**
     * Show the form for editing the specified Products.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $products = $this->productsRepository->findWithoutFail($id);

        if (empty($products)) {
            Toastr::error('in Products not found');

            return redirect(route('admin.products.index'));
        }

        return view('backend.products.edit')->with('products', $products);
    }

    /**
     * Update the specified Products in storage.
     *
     * @param  int              $id
     * @param UpdateProductsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductsRequest $request)
    {
        $products = $this->productsRepository->findWithoutFail($id);

        if (empty($products)) {
            Toastr::error('in Products not found');

            return redirect(route('admin.products.index'));
        }

        $products = $this->productsRepository->update($request->all(), $id);

        Toastr::success($id . 'in Products updated successfully.');

        return redirect(route('admin.products.index'));
    }

    /**
     * Remove the specified Products from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $products = $this->productsRepository->findWithoutFail($id);

        if (empty($products)) {
            Toastr::error('Products not found');

            return redirect(route('admin.products.index'));
        }

        $this->productsRepository->delete($id);

        Toastr::success($id . ' deleted successfully.');

        return redirect(route('admin.products.index'));
    }
}
