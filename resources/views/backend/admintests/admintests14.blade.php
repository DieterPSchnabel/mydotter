@extends('backend.layouts.app')
@section('title')
    <?php $this_filename ='admintests14'  ?>
    {{$this_filename}}
@endsection
@section('page-header')
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

    <style>
        .col{
            padding-right:8px;
            padding-left:8px;
        }
    </style>




    {{--<div class="container-fluid">--}}
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Bootstrap Modals
                    </div>
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">
                            Launch demo modal
                        </button>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#largeModal">
                            Launch large modal
                        </button>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#smallModal">
                            Launch small modal
                        </button>
                        <hr>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#primaryModal">
                            Primary modal
                        </button>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#successModal">
                            Success modal
                        </button>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#warningModal">
                            Warning modal
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dangerModal">
                            Danger modal
                        </button>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#infoModal">
                            Info modal
                        </button>
                    </div>
                </div>
            </div>
            <!--/.col-->
        </div>
    </div>
    <!--/.row-->
    </div>




    {{--</div>--}}
    <!-- /.conainer-fluid -->




    {{--################################# end row 1####################################################--}}


    <div class="row">
        {{-----------------------------------------------------}}
        <?php

        $title1 = 'Modals Notes'; //at14
        $key1 = 'modals_sa_notes';
        $url1 = link_to_route('admin.dashboard.admintests14', 'New Window', [], ['target="_blank"', 'class="btn btn-primary btn-sm float-right mr-10"']);
        $doc_url1 = link_to_route_popup('dashboard/pop_dev_any_at?at=14', 'Popup');

        ?>


        <div class="col">

            {{----------------------------------------------------}}
            <?php
            $item_counter = 1;
            $t_key = $key1;
            $t_title = $title1;
            ?>
            <div class="card">
                <div class="card-header h4">
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-success btn-sm float-right" data-fancybox
                       data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin?key={{$t_key}}&title={{$t_title}}"
                       href="javascript:;">
                        Edit </a>

                    @if($url1<>'')
                        {{$url1}}
                    @endif

                    @if($doc_url1<>'')
                        {!! $doc_url1  !!}
                    @endif

                    {!! item_counter_str($item_counter) !!} {{$t_title}} <span
                            style="display:none">{{$t_key}}</span>
                </div>
                <div class="card-block dev-longtxt" id="{{$t_key}}" style="">
                    {{--<pre>nix</pre>--}}
                    <?php
                    echo get_dv($t_key, 'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}


        </div>{{--<div class="col">--}}
        {{-----------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <p>
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col">--}}

        {{-----------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <p>
                        Test mit window.location.reload()
                    </p>
                    <p>
                        window.location.reload(): <a href="javascript:window.location.reload()">reload</a>
                    </p>
                    <p>
                        ax reload() mit #mydotter_overlay: <a href="javascript:reload_ax()">reload</a>
                    </p>

                </div>
            </div>{{--<div class="card">--}}
            {{-----------------------------------------------------}}

        </div>{{--<div class="row">--}}
        {{--################################# end row 1####################################################--}}







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


        @section('modals')
            <div class="modal animated lightSpeedIn" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Modal title</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>One fine body…</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class="modal animated  zoomInUp" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Modal title</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                <?php
                                echo get_dv('todo_superadmin', 'div_res_long');
                                ?>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class="modal animated  slideInUp" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Modal title</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>One fine body…</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class="modal animated bounceInDown" id="primaryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-primary" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Modal title</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>One fine body…</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class="modal animated  zoomInUp" id="successModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-success" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Modal title</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>One fine body…</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class="modal animated slideInLeft" id="warningModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-warning" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Modal title</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>One fine body…</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-warning">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class="modal fade" id="dangerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-danger" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Modal title</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>One fine body…</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-info" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Modal title</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>One fine body…</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-info">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
@endsection
