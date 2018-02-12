@extends('backend.layouts.app')

@section('content')
       <div class="card">
           <div class="card-header">
               <div class="table-header-model-name">Prods</div>
               <div class="" style="margin-left:30pxfont-size:1.4em;color:#aaa">Edit</div>
           </div>

           <div class="card-body">
                @include('adminlte-templates::common.errors')
               {!! Form::model($prods, ['route' => ['admin.prods.update', $prods->id], 'method' => 'patch']) !!}
                @include('backend.prods.fields')
               {!! Form::close() !!}
           </div>
       </div>
@endsection
