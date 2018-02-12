@extends('backend.layouts.app')

@section('content')
       <div class="card">
           <div class="card-header">
               <div class="float-right" style="font-size:1.4em;color:#aaa">Edit</div>
               <h2>Countries</h2>
           </div>

           <div class="card-body">
                @include('adminlte-templates::common.errors')
               {!! Form::model($countries, ['route' => ['admin.countries.update', $countries->id], 'method' => 'patch']) !!}
                @include('backend.countries.fields')
               {!! Form::close() !!}
           </div>
       </div>
@endsection