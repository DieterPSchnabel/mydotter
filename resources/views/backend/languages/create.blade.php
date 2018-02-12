@extends('backend.layouts.app')

@section('content')
          <div class="card">
              <div class="card-header">
                  <div class="float-right" style="font-size:1.4em;color:#aaa">Create</div>
                  <h2>Languages</h2>
              </div>

              <div class="card-body">
                   @include('adminlte-templates::common.errors')
                  {!! Form::open(['route' => 'admin.languages.store']) !!}
                   @include('backend.languages.fields')
                  {!! Form::close() !!}
              </div>
          </div>
@endsection
