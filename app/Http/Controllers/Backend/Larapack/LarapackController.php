<?php

namespace App\Http\Controllers\Backend\Larapack;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Larapacks\Larapack;
use Illuminate\Support\Facades\DB;
use Excel;
use Toastr;

class LarapackController extends Controller
{
    public function export($type){
        $items = Larapack::orderBy('id', 'asc')->get();
        Excel::create('Larapacks', function($excel) use($items) {
            $excel->sheet('ExportFile', function($sheet) use($items) {
                $sheet->fromArray($items);
            });
        })->export($type);
    }

/*    public function get_important()
    {
        $items = Larapack::orderBy('id', 'asc')->where('important',1)->get();

        return view('backend.larapacks.important')->with($items);
        //return $items;
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $qparams = null;
        //$qparams = $request->get('qparams');
        //dd($qparams);
        $mysearch = null;
        $filter = null;
        $page_appends = null;
        $perPageLimit_default = 12;
        create_dv('larapacks_disp_per_page', $perPageLimit_default, true);
        $perPageLimit = get_dv('larapacks_disp_per_page');

        $order = NULL;
        $order = $request->get('order'); // Order by what column?
        if(is_null($order)) $order = 'id';

        $dir = NULL;
        $dir = $request->get('dir'); // Order direction: asc or desc
        if(is_null($dir)) $dir = 'desc';

        $mysearch = NULL;
        $mysearch = $request->get('mysearch'); // filter?

        $myid = NULL;
        $myid = $request->get('myid'); // filter?

        $filter = null;
        $filter = $request->get('filter'); // filter?

        $page_appends = null;
                if(!is_null($mysearch)) {
                    /*$order='id';
                    $dir='asc';
                    $myid=null;
                    $filter=null;*/


                    $table_fields_array = get_columns_from_table_text_only('larapacks', $as_array=true);
                    $number_cols = count($table_fields_array);
                    //dd($number_cols);
                    //dd($table_fields_array);
                    $links = DB::table('larapacks')
                        ->where($table_fields_array[0], 'like', '%'.$mysearch.'%')
                        ->orWhere($table_fields_array[1], 'like', '%'.$mysearch.'%')
                        ->orWhere($table_fields_array[2], 'like', '%'.$mysearch.'%')
                        ->orWhere($table_fields_array[3], 'like', '%'.$mysearch.'%')
                        ->orWhere($table_fields_array[4], 'like', '%'.$mysearch.'%')
                        ->orWhere($table_fields_array[5], 'like', '%'.$mysearch.'%')
                        ->orWhere($table_fields_array[6], 'like', '%'.$mysearch.'%')
                        ->orWhere($table_fields_array[7], 'like', '%'.$mysearch.'%')
                        ->orWhere($table_fields_array[8], 'like', '%'.$mysearch.'%')

                        ->orderBy($order, $dir);
                    // Tell the Paginator to append the following to the page URL as well
                    $page_appends = [
                        //'page' => $page,
                        'order' => $order,
                        'dir' => $dir,
                        'mysearch' => urlencode($mysearch),
                    ];
                    $links = $links->paginate($perPageLimit);
                    $data['links'] = $links;
                    //$data['dir'] = $dir == 'asc' ? 'desc' : 'asc';
                    $data['dir'] = $dir ;
                    $data['curr_dir'] = $dir ;
                    $data['order'] = $order;
                    $data['page_appends'] = $page_appends;
                    return view('backend.larapacks.index')->with($data);
                }else {
                    $links = DB::table('larapacks')->orderBy($order, $dir);
                    $page_appends = [
                        'order' => $order,
                        'dir' => $dir,
                    ];
                }
        //dd($myid);
        if($myid){
            //dd($myid);
            //$links = Larapack::find($myid);
            $links = DB::table('larapacks')->where('id', '=', $myid);
            //dd($links);
            $page_appends = [
                'order' => $order,
                'dir' => $dir,
            ];
            $links = $links->paginate($perPageLimit);
            $data['links'] = $links;
           //dd($data);
            $data['dir'] = $dir == 'asc' ? 'desc' : 'asc';
            $data['curr_dir'] = $dir ;
            $data['order'] = $order;
            $data['page_appends'] = $page_appends;
            return view('backend.larapacks.index')->with($data);
        }

        if($filter){
            //dd($filter);
            //$links = Larapack::find($myid);
            if($filter=='pt_only'){
                $links = DB::table('larapacks')->where('pt_title', '<>', '');
            }
            if($filter=='tools_only'){
                $links = DB::table('larapacks')
                    ->where('tag1', '=', 'Online-Tool')
                    ->orWhere('tag2', '=', 'Online-Tool')
                    ->orWhere('tag3', '=', 'Online-Tool');
            }
            if($filter=='important'){
                $links = DB::table('larapacks')
                    ->where('tag1', '=', '!important!')
                    ->orWhere('tag2', '=', '!important!')
                    ->orWhere('tag3', '=', '!important!');
            }
            if($filter=='is_installed'){
                $links = DB::table('larapacks')->where('is_installed', '=', '1');
            }

            if($filter=='isInfo'){
                $links = DB::table('larapacks')
                    ->where('tag1', '=', 'isInfo')
                    ->orWhere('tag2', '=', 'isInfo')
                    ->orWhere('tag3', '=', 'isInfo');
            }

            //no_git_url
/*            if($filter=='no_git_url'){
                $links = DB::table('larapacks')->where([
                    ['git_url', '=', ''],
                    ['install_str', '<>', '']
                ]);
            }*/

            //dd($links);
            $page_appends = [
                'order' => $order,
                'dir' => $dir,
            ];
            $links = $links->paginate($perPageLimit);
            $data['links'] = $links;
            //dd($data);
            $data['dir'] = $dir == 'asc' ? 'desc' : 'asc';
            //$data['dir'] = $dir;
            $data['curr_dir'] = $dir ;
            $data['order'] = $order;
            $data['page_appends'] = $page_appends;
            return view('backend.larapacks.index')->with($data);
        }



        $links = $links->paginate($perPageLimit);
        $data['links'] = $links;
        $data['dir'] = $dir == 'asc' ? 'desc' : 'asc';
        $data['curr_dir'] = $dir ;
        $data['order'] = $order;
        $data['page_appends'] = $page_appends;
        return view('backend.larapacks.index')->with($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $links = Larapack::orderBy('id', 'desc')->limit(10)->get();
        return view('backend.larapacks.create', ['links' => $links]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'tag1' => 'max:191',
            'tag2' => 'max:191',
            'tag3' => 'max:191',
            'install_str' => 'max:191',
            'git_url' => 'max:191',
            'doc_url' => 'max:191',
            'pt_title' => 'max:191',
            'pt_link' => 'max:191',
            'is_installed' => 'max:5',
            'description' => '',
        ]);

        $link = tap(new Larapack($data))->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Larapack::find($id);
//dd(request()->query());
        //load form view
        return view('backend.larapacks.edit', ['item' => $item, 'q' => request()->query()]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //dd($request);
        $data = $request->validate([
            'tag1' => 'max:191',
            'tag2' => 'max:191',
            'tag3' => 'max:191',
            'install_str' => 'max:191',
            'git_url' => 'max:191',
            'doc_url' => 'max:191',
            'pt_title' => 'max:191',
            'pt_link' => 'max:191',
            'is_installed' => 'required_without:test',
            'description' => '',
        ]);
        Larapack::find($id)->update($data);
        $links = Larapack::all();
        Toastr::success('Update für Record '. $id . ' wurde gespeichert!', '', []);
        return redirect()->route('admin.dashboard.larapacks',['myid' => $id]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $item = Larapack::findOrFail($id);
        $item->delete();

        $dir = $request->get('dir'); // Order direction: asc or desc
        if(is_null($dir)) $dir = 'desc';
        $order = $request->get('order'); // Order by what column?
        if(is_null($order)) $order = 'id';
        Toastr::success( 'id# '.$id . ' wurde gelöscht!', 'Gelöscht', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.dashboard.larapacks', array('order' => $order, 'dir' => $dir));
    }

    public function installed_as_per_decomposer()
    {
        return view('backend.larapacks.installed_as_per_decomposer');
    }
}
