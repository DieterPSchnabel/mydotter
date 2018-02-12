@extends('backend.layouts.app')
@section('title')
   Diverses
@endsection
@section('content')
       <div class="card">
           <div class="card-header">
             <div class="table-header-model-name">Diverses
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
               {!! Form::model($diverses, ['route' => ['admin.diverses.update', $diverses->id], 'method' => 'patch']) !!}

                   <!-- Submit Field top -->
                       <div class="form-group col-sm-12" style="margin:2px 0 14px 0">
                           <input class="btn btn-primary" type="submit" value="Save">
                           <a href="{{url('/admin/diverses')}}" class="btn btn-default">Cancel</a>
                       </div>
                @include('backend.diverses.fields')
               {!! Form::close() !!}
           </div>
       </div>
@endsection
