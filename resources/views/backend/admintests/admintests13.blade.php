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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header h4">
                    <span class="float-right dimmed04 ml-3" style="font-weight:normal;font-size:0.7em;color:#666">{{$this_filename}}</span>
                    <a class="btn btn-primary btn-sm float-right" href="javascript:window.location.reload();">
                        Page Reload </a>

                    <a style="margin-right:12px" class="btn btn-primary btn-sm float-right" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_notes_admin"
                       href="javascript:;">
                        Edit </a>

                    Admin Notes
                </div>


                <div class="card-block">
                    <?php
                    $t_key = 'notes_admin';
                    create_dv($t_key, $value = 'admin-notes here...',true, $field = 'div_res_long');
                    echo get_dv($t_key,'div_res_long');
                    ?>
                </div>
            </div>{{--<div class="card">--}}
        </div>{{--<div class="col-12">--}}
    </div>{{--<div class="row">--}}

@endsection
