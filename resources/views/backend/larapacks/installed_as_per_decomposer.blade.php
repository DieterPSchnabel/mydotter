@extends('backend.layouts.app')

@section('page-header')
    <span>installed_as_per_decomposer.blade.php</span>
@endsection

@section('meta')
<!-- nixxxxxxxxxxxxx meta -->
@endsection


@section('before-styles-end')
    <!-- nixxxxxxxxxxxxx before-styles-end -->
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
        <h2>Installed Larapacks lt. <a  target="_blank" href="{{url('admin/decompose')}}">Decomposer</a></h2>
        </div>
        <div class="card-body">
        {!! installed_larapacks() !!}
        </div>
    </div><!--box box-success-->

    <br><br><br><br>


@endsection
