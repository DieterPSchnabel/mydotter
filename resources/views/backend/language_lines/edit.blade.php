@extends('backend.layouts.app')
@section('title')
   Language Lines
@endsection
@section('content')
       <div class="card">
           <div class="card-header">
             <div class="table-header-model-name">Language Lines
             <span class="" style="margin-left:12px;font-size:1.0em;color:#ccc">Edit</span>
             </div>
           </div>
<style>
    label{
        font-size: 1.2em;
        margin-bottom:0;
        color:#aaa;
    }
    textarea.form-control{
        height:40px;
        resize: both;
        overflow: auto;
    }
</style>
           <div class="card-body">
                @include('adminlte-templates::common.errors')
               {!! Form::model($languageLines, ['route' => ['admin.languageLines.update', $languageLines->id], 'method' => 'patch']) !!}

                   <!-- Submit Field top -->
                       <div class="form-group col-sm-12" style="margin:2px 0 14px 0">
                           <input class="btn btn-primary" type="submit" value="Save">
                           <a href="{{url('/admin/languageLines')}}" class="btn btn-default">Cancel</a>
                       </div>
                @include('backend.language_lines.fields')
               {!! Form::close() !!}
           </div>
       </div>
@endsection
