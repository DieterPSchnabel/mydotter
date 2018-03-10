@extends('backend.layouts.app')
@section('title')
    <?php $this_filename ='admintests12'  ?>

    Notes Superadmin
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
        /*        div.f_container{
                    width:100%;
                    display: flex; !* or inline-flex *!
                    align-items: flex-start;
                    flex-direction: row;
                    flex-wrap: wrap;
                }
                div.ccol{
                    margin: 2px;
                }
                div.card{
                    width:253px;
                }*/
    </style>


<div class="f_container" style="background:none">

    xxxxxxxxxx
</div>{{--<div class="f_container">--}}

@endsection
