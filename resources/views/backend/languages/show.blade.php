@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-right" style="font-size:1.4em;color:#aaa">View</div>
            <h2>
                Languages
            </h2>
        </div>
        <div class="card-body">
            @include('backend.languages.show_fields')
            <a href="{!! route('admin.languages.index') !!}" class="btn btn-primary ml-4" role="button" aria-disabled="true">Zurück</a>
        </div>
        </div>
        <br><br><br><br>
@endsection
