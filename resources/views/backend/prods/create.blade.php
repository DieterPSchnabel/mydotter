@extends('backend.layouts.app')

@section('content')
          <div class="card">
              <div class="card-header">
                  <div class="float-right" style="font-size:1.4em;color:#aaa">Create</div>
                  <h2>Prods</h2>
              </div>

              <div class="card-body">
                   @include('adminlte-templates::common.errors')
                  {!! Form::open(['route' => 'admin.prods.store']) !!}
                   @include('backend.prods.fields')
                  {!! Form::close() !!}
              </div>
          </div>
@endsection
