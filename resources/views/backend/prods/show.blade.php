@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
           <div class="table-header-model-name">Prods</div>
           <div class="" style="margin-left:30px;font-size:1.4em;color:#aaa">Show</div>
        </div>
        <div class="card-body">

<style>
    div.form-group{
        font-size:1.3em;
        margin:2px 30px;
        background:#f9f9f9;
        padding:4px 12px 0px 12px;
        border:1px #ccc solid;
    }
    div.form-group span {
        margin-left:24px;
        font-weight:bold;
        color:#0044cc;

    }
    div.form-group label {
        min-width:220px;
        color:#777;
        padding:3px 8px;
        background:#eee;
    }
</style>

            @include('backend.prods.show_fields')
            <br>
            <a href="{!! route('admin.prods.index') !!}" class="btn btn-primary ml-4" role="button" aria-disabled="true">Zurück</a>
        </div>
        </div>
        <br><br><br><br>
@endsection
