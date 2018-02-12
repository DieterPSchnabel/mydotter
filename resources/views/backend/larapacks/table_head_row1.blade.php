{{------------ HEAD 1. ROW ------------}}
<div style="position:absolute;font-size:1em;top:6px;right:410px;text-align:text-center">
    {{--@include('adminlte-templates::common.paginate', ['records' => $links])--}}
    {!! $links->appends($page_appends)->render() !!}
</div>
<h3 class="card-header" style="border-bottom:none">
    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
        <div class="dimmed04 float-right" style="display:inline-block;margin:6px 36px 6px 0;font-size:0.5em">
            <b>{{$links->firstItem()}}</b> - <b>{{$links->lastItem()}}</b> / <b>{{$links->total()}}</b> records</div>
        <a class="btn btn-primary ml-1" role="button" href="{{url('admin/dashboard/larapacks/create')}}">neu erfassen</a>
        @if($has_help)
            {{------------ TABLE HILFE ------------}}
            <a style="margin-left:12px" class="btn btn-outline-info" href="javascript:toggle('help_block','slide')" role="button">
                <i class="icon-support font-lg"></i> Hilfe</a>
        @endif
    </div>
    Larapacks

    @if(isset($_GET['mysearch']) or isset($_GET['myid']) or isset($_GET['filter']))
        @if( isset($_GET['mysearch']) )
            <span style="margin-left:60px;font-size:0.6em;font-weight:normal"><b>{{$links->total()}}</b>
                @if ($links->total()==1)
                    Ergebnis für Suche nach:
                @else
                    Ergebnisse für Suche nach:
                @endif
                <b><mark>{{urldecode($_GET['mysearch'])}}</mark></b>
                    </span>
        @endif
        <span style="margin-left:40px;font-size:0.6em;font-weight:normal">
                        <a class="" href="{{url('admin/dashboard/larapacks')}}">wieder alle Daten anzeigen</a></span>
    @endif
</h3>
{{-- / END HEAD  1. ROW ------------}}