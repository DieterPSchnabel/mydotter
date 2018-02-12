{{------------ HEAD 2. ROW ------------}}
<div style="background-color: #f0f3f5;padding-top:4px;padding-bottom:4px;">
    <div class="input-group float-left" style="margin-top:0px;">
        {{------------ SEARCH ------------}}
        @if($has_table_search)
            <form id="mysearch_form" method="get" action="larapacks" style="margin:0 50px 3px 18px;">
                <div class="input-group" >
                    {{--<input name="qparams" id="qparams" type="text" value=" //echo $_SERVER['QUERY_STRING'] " >--}}
                    @if(isset($_GET['mysearch']) )
                        <input name="mysearch" id="mysearch" type="text" class="form-control " placeholder="Suche nach..." value="{{$_GET['mysearch']}}" autofocus />
                    @else
                        <input name="mysearch" id="mysearch" type="text" class="form-control " placeholder="Suche nach..."/>
                    @endif
                    <span class="input-group-btn">
                        <button onClick='$("#mysearch_form").submit()' class="btn btn-default" type="button"
                                data-toggle="tooltip" data-placement="right" title="" data-original-title="Suchtext eingeben und hier klicken oder Enter (auf der Tastatur)">
                            <i class="fa fa-search fa-sm-text-shadow" aria-hidden="true"></i></button>
                        </span>
                </div>
            </form>
        @endif

        {{------------ TABLE EXPORT ------------}}
        @if($has_table_export)
            <div class="btn-group" style="margin:0 30px 3px 0px;">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tabelle exportieren
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ URL::to('admin/dashboard/larapacks/export/xls') }}">Excel.xls</a>
                        <a class="dropdown-item" href="{{ URL::to('admin/dashboard/larapacks/export/xlsx') }}">Excel.xlsx</a>
                        <a class="dropdown-item" href="{{ URL::to('admin/dashboard/larapacks/export/csv') }}">Excel.csv</a>
                        <a class="dropdown-item" href="{{ URL::to('admin/dashboard/larapacks/export/pdf') }}">PDF</a>
                    </div>
                </div>
            </div>
        @endif

        {{------------ TABLE FILTER ------------}}
        @if($has_table_filter)
            <div class="btn-group" style="margin:0 30px 3px 0;">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tabelle filtern
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ URL::to('admin/dashboard/larapacks') }}?filter=pt_only">nur PT-Links</a>
                        <a class="dropdown-item" href="{{ URL::to('admin/dashboard/larapacks') }}?filter=tools_only">nur Online-Tools</a>
                        <a class="dropdown-item" href="{{ URL::to('admin/dashboard/larapacks') }}?filter=is_installed">nur is installed</a>
                        <a class="dropdown-item" href="{{ URL::to('admin/dashboard/larapacks') }}?filter=important">nur !important!</a>
                        <a class="dropdown-item" href="{{ URL::to('admin/dashboard/larapacks') }}?filter=isInfo">Anleitungen</a>
                        {{--<a class="dropdown-item" href="{{ URL::to('admin/dashboard/larapacks') }}?filter=no_git_url">ohne GIT-URL</a>--}}
                        <hr>
                        <a class="dropdown-item" href="{{ URL::to('admin/dashboard/larapacks') }}?mysearch=LaravelCollective">Laravel Collective</a>
                        <a class="dropdown-item" href="{{ URL::to('admin/dashboard/larapacks') }}?mysearch=spatie/laravel-html">Menu Generator</a>

                        <a class="dropdown-item" href="{{ URL::to('admin/dashboard/larapacks') }}?mysearch=Bootstrap 4">Bootstrap 4</a>

                        <a class="dropdown-item" href="{{ URL::to('admin/dashboard/larapacks') }}">alle zeigen</a>
                    </div>
                </div>
            </div>
        @endif

        {{------------ DISPLAY PER PAGE ------------}}
        @if($has_items_per_page)
            <?php
            $currently_selected = get_dv('larapacks_disp_per_page');
            ?>
            <div style="margin-left:30px">
                <span style="display:inline-block;margin:0 6px 3px 0;vertical-align:text-top">Records pro Seite:</span>
                <select class="custom-select" style="margin:0 0 3px 6px;"
                        onchange="set_dv(this.options[selectedIndex].value)">
                    {!! get_options_for_records_per_page($links->total(),$currently_selected) !!}
                </select>
                <?php $zuf = zuf(); ?>
                <span id="{!! $zuf !!}_conf" style="width:25px"></span>
                <script>
                    function set_dv(anz) {
                        ax_jq('/axfe','id=106_'+anz+'_xyx_'+'larapacks_disp_per_page','{!! $zuf !!}'+'_conf');
                        //alert ('in Arbeit');
                    }
                </script>
            </div>
        @endif

        {{--todo: tooltips--}}
    </div>
</div>
{{-- / END HEAD  2. ROW ------------}}
