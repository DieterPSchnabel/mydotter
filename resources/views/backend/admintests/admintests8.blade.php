@extends('backend.layouts.app')
@section('title')
    <?php $this_filename ='admintests8'  ?>
    admintest8
@endsection
@section('page-header')
    <h4>admintests8</h4>
@endsection

@section('meta')
<!-- nixxxxxxxxxxxxx meta -->
@endsection


@section('before-styles-end')
    <!-- nixxxxxxxxxxxxx before-styles-end -->
@endsection


@section('content')
    @include('backend.includes.partials.dev-nav')
    @if(is_dev())
        <div style="font-weight:normal;font-size:1.0em;color:#999;margin:-4px 0 2px 6px">{{$this_filename}}</div>
    @endif
    {{--
    <div class="card">
        <div class="card-header h4">
            fancybox3
        </div>
        <div class="card-block">
            <p>
            </p>
        </div>
    </div>
    --}}
    <div class="row">
        <div class="col-6">

            <div class="card">
                <div class="card-header h4">
                    Number Input Buttons - mit zoom - without direct save
                    <span class="float-right dimmed04 ml-3" style="font-weight:normal;font-size:0.7em;color:#666">{{$this_filename}}</span>
                </div>
                <div class="card-block">
                    <pre>change_sort_order(</pre>
                    <p>
                    <?php
                        $so_id = 'so_123';
                        $zoom_effect = 'zoom80';
                        $so_width = '130px ';
                    ?>
                    <div class="btn-group btn-block {{$zoom_effect}} float-left" role="group" aria-label="plus-minus" style="width:{{$so_width}};padding:0">
                        <button type="button" class="btn btn-sm btn-danger" onclick="change_sort_order(-1,'{{$so_id}}')">
                            <i class="fa fa-minus" aria-hidden="true"></i></button>
                        <input type="text" value="3" class="text-center" style="width:45px" id="{{$so_id}}" />
                        <button type="button" class="btn btn-sm btn-success" onclick="change_sort_order(1,'{{$so_id}}')">
                            <i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                    <script>
                        /*
                        //in mycustom.js
                        function change_sort_order(val,id){
                            var quant=$('#'+id).val();
                            var newval = parseInt(quant)+val;
                            $('#'+id).val(newval) ;
                        }*/
                    </script>
                    </p>


                </div>
            </div>{{--<div class="card">--}}

            <div class="card">
                <div class="card-header h4">
                    Number Input Buttons - mit zoom - WITH direct save
                </div>
                <div class="card-block">
                    <pre>change_sort_order_and_save(</pre>
                    <p>
                    <?php
                    $table = 'languages';
                    $table_id_field = 'id';
                    $table_id = '2';
                    $table_col = 'sort_order';
                    $with_page_reload = false;
                    $curr_value = lookup($table, $table_col, $table_id, $table_id_field );

                    $so_id = 'so_124';
                    $zoom_effect = 'zoom80';
                    $so_width = '130px ';
                    ?>
                    <div class="btn-group btn-block {{$zoom_effect}} float-left" role="group" aria-label="plus-minus" style="width:{{$so_width}};padding:0">
                        <button type="button" class="btn btn-sm btn-danger"
                                onclick="change_sort_order_and_save(-1,'{{$so_id}}','{{$table}}','{{$table_id_field}}','{{$table_id}}','{{$table_col}}','{{$with_page_reload}}')">
                            <i class="fa fa-minus" aria-hidden="true"></i></button>
                        <input type="text" value="{{$curr_value}}" class="text-center" style="width:45px" id="{{$so_id}}" />
                        <button type="button" class="btn btn-sm btn-success"
                                onclick="change_sort_order_and_save(1,'{{$so_id}}','{{$table}}','{{$table_id_field}}','{{$table_id}}','{{$table_col}}','{{$with_page_reload}}')">
                            <i class="fa fa-plus" aria-hidden="true"></i></button> <span id="{{$table.'_'.$table_id.'_'.$table_col.'_conf'}}"></span>
                    </div>


                    </p>
                </div>
            </div>{{--<div class="card">--}}

        </div>{{--<div class="col-6">--}}

        {{--#####################################################################################--}}

        <div class="col-6">

            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <pre>nix</pre>
                    <p>
                    </p>
                </div>
            </div>{{--<div class="card">--}}

            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <pre>nix</pre>
                    <p>
                    </p>
                </div>
            </div>{{--<div class="card">--}}


        </div>{{--<div class="col-6">--}}

    </div>{{--<div class="row">--}}

    {{--#####################################################################################--}}
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <pre>nix</pre>
                    <p>
                    </p>
                </div>
            </div>{{--<div class="card">--}}

            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <pre>nix</pre>
                    <p>
                    </p>
                </div>
            </div>{{--<div class="card">--}}

        </div>{{--<div class="col-12">--}}
    </div>{{--<div class="row">--}}



    {{--<div class="card">
        <div class="card-header h4">
            nix
        </div>
        <div class="card-block">
            <pre>nix</pre>
            <p>
            </p>
        </div>
    </div>--}}

@endsection
