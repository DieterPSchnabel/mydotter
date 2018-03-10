@extends('backend.layouts.app')
@section('title')
   Diverses
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
          <div class="table-header-model-name">Diverses
              <span class="" style="margin-left:12px;font-size:1.0em;color:#ccc">{!! get_tr('Anzeige') !!}</span>
          </div>
        </div>
        <div class="card-body">
            {{--<a href="{!! route('admin.diverses.index') !!}" class="btn btn-primary ml-4" role="button" aria-disabled="true">Zurück</a>--}}
            <a href="javascript:fancybox_close()" class="btn btn-primary">{!! get_tr('schliessen') !!}</a>

            {{--<a href="{{ route('admin.diverses.64004.edit') }}" class="btn btn-primary ml-20">edit</a>--}}

            <a style="" class="" title="edit all"
               href="{{ route('admin.diverses.edit',[$diverses->id]) }}">
                <button type="button" class="btn btn-primary ml-20" data-toggle="tooltip" data-placement="top"
                        title="xxx" data-original-title="edit">
                    <i class="fa fa-pencil fa-sm-text-shadow"></i> {!! get_tr('Bearbeiten') !!}
                </button>
            </a>

            <br><br>

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

            @include('backend.diverses.show_fields')
            <br>
            {{--<a href="{!! route('admin.diverses.index') !!}" class="btn btn-primary ml-4" role="button" aria-disabled="true">Zurück</a>--}}
            <a href="javascript:fancybox_close()" class="btn btn-primary">{!! get_tr('schliessen') !!}</a>
        </div>
        </div>
        <br><br><br><br>
@endsection
