@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-right" style="font-size:1.4em;color:#aaa">View</div>
            <h2>
                Countries
            </h2>
        </div>
        <div class="card-body">
            @include('backend.countries.show_fields')
            <a href="{!! route('admin.countries.index') !!}" class="btn btn-primary ml-4" role="button" aria-disabled="true">Zurück</a>
        </div>
        </div>
        <br><br><br><br>
@endsection
