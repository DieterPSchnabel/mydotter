@extends('backend.layouts.popup')

@section('page_level_styles')
@endsection

@section('content')
    <?php
    $t_at = $_GET['at'];
    ?>

    @include('backend.admintests.admintests'.$t_at)
@endsection



@section('page_level_scripts')
@endsection
