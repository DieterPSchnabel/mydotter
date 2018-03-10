@extends('backend.layouts.app')

<?php
//dd($_SERVER['QUERY_STRING']);

?>

@section('title')
   Diverses
@endsection
@section('content')
       <div class="card">
           <div class="card-header">
             <div class="table-header-model-name">Diverses
                 <span class="" style="margin-left:12px;font-size:1.0em;color:#ccc">{!! get_tr('Bearbeiten') !!}</span>
             </div>
           </div>
<style>
    label{
        font-size: 1.2em;
        font-weight: bold;
        margin-bottom:0;
        color:#aaa;
    }
    textarea.form-control{
        height: 60px;
        resize: both;
        overflow: auto;
    }

    div.card-body {
        background: #e4e5e6
    }

</style>
           <div class="card-body">
                @include('adminlte-templates::common.errors')
               {!! Form::model($diverses, ['route' => ['admin.diverses.update', $diverses->id], 'method' => 'patch']) !!}

                   <!-- Submit Field top -->
                       <div class="form-group col-sm-12" style="margin:2px 0 14px 0">
                           <input class="btn btn-primary" type="submit" value="{!! get_tr('speichern') !!}">
                           <a href="javascript:fancybox_close()"
                              class="btn btn-default">{!! get_tr('schliessen') !!}</a>
                       </div>
                @include('backend.diverses.fields')
               {!! Form::close() !!}
           </div>
       </div>
@endsection
