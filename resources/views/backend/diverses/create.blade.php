@extends('backend.layouts.app')

@section('title')
   Diverses
@endsection

@section('content')
          <div class="card">
              <div class="card-header">
             <div class="table-header-model-name">Diverses
             <span class="" style="margin-left:12px;font-size:1.0em;color:#ccc">Create</span>
             </div>
              </div>
<style>
    label{
        font-size: 1.2em;
        margin-bottom:0;
        color:#aaa;
    }
</style>
              <div class="card-body">
                   @include('adminlte-templates::common.errors')
                  {!! Form::open(['route' => 'admin.diverses.store']) !!}
                   @include('backend.diverses.fields')
                  {!! Form::close() !!}
              </div>
          </div>
@endsection
