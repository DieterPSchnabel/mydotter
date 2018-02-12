@extends('backend.layouts.app')

@section('content')
       <div class="card">
           <div class="card-header">
               <div class="float-right" style="font-size:1.4em;color:#aaa">Edit</div>
               <h2>Languages</h2>
           </div>

           <div class="card-body">
                @include('adminlte-templates::common.errors')
               {!! Form::model($languages, ['route' => ['admin.languages.update', $languages->id], 'method' => 'patch']) !!}
                @include('backend.languages.fields')
               {!! Form::close() !!}
           </div>
       </div>
@endsection
