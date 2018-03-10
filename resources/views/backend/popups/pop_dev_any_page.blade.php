@extends('backend.layouts.popup')

@section('page_level_styles')
@endsection

@section('content')
    <?php
    $page = $_GET['p'];
    $id = $_GET['id'];

    ec($page);
    ec($id);
    ?>

    {{--@include('backend.admintests.admintests'.$t_at)--}}
    {{--@include($page)--}}
@endsection



@section('page_level_scripts')
@endsection
