@extends('backend.layouts.popup')

@section('page_level_styles')
@endsection

@section('content')
    {{--@include('backend.includes.partials.dev-nav')
    @include('backend.admintests.admintests29')--}}

    <h3>Actions for {{$_GET['key']}}</h3>

    <p>
        replace Textparts in this column
    </p>

    <p>
        check for missing translations in this col and translate from english or from default
    </p>

    <p>
        create Excel File with this lang and defined other langs
    </p>

@endsection



@section('page_level_scripts')
@endsection
