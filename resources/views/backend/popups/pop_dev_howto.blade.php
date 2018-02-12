@extends('backend.layouts.popup')

@section('page_level_styles')
@endsection

@section('content')
    <?php
    if(  isset($_GET['p'])  ) {
        $p = $_GET['p'];
    }else{
        $p = '23';
    }
    $incl_str = 'backend.admintests.admintests'.$p;
    ?>

    @include('backend.includes.partials.dev-nav');
    @include($incl_str);


@endsection



@section('page_level_scripts')
@endsection
