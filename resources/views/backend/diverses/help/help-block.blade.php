<div class="card" id="help_block" style="display:none;">

    <div class="help_wrapper">
        <a style="margin-right:8px" class="float-right" href="javascript:toggle('help_block','slide')">
            <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></a>
        <?php
        //$this_table_name = $this_page_name; //##############################################
        if(isset($this_page_name)) $this_table_name = $this_page_name;
        create_dv($this_table_name.'_table_has_help_hints',1,true); //if value <> '' add $first=true to avoid caching
        create_dv($this_table_name.'_table_has_help_help',1,true);
        create_dv($this_table_name.'_table_has_help_related',1,true);
        create_dv($this_table_name.'_table_has_help_config',1,true);
        create_dv($this_table_name.'_table_has_items_per_page',1,true);

         $first_avtive_tab = '';

        $this_key = $this_table_name;
        $$this_key = $this_key.'_table_has_help_hints';
        $table_has_help_hints = get_dv($$this_key);
        if ($table_has_help_hints and $first_avtive_tab == '') $first_avtive_tab = 'hints';

        $this_key = $this_table_name;
        $$this_key = $this_key.'_table_has_help_help';
        $table_has_help_help = get_dv($$this_key);
        if ($table_has_help_help and $first_avtive_tab == '') $first_avtive_tab = 'help';

        $this_key = $this_table_name;
        $$this_key = $this_key.'_table_has_help_related';
        $table_has_help_related = get_dv($$this_key);
        if ($table_has_help_related and $first_avtive_tab == '') $first_avtive_tab = 'related';

        $this_key = $this_table_name;
        $$this_key = $this_key.'_table_has_help_config';
        $table_has_help_config = get_dv($$this_key);
        $dev_only_hint = '';
        if(is_dev() and !$table_has_help_config) {
            $table_has_help_config = true;
            $dev_only_hint = ' <i class="dev_only" style="font-size:0.8em;opacity:0.5;color:#c00">(DEV only)</i>';
        } //DEV must have always access
        if ($table_has_help_config and $first_avtive_tab == '') $first_avtive_tab = 'config';

        ?>
        <ul class="nav nav-tabs" role="tablist">
            @if($table_has_help_hints)
                <li class="nav-item">
                    <a class="nav-link <?php if($first_avtive_tab=='hints') echo 'active'; ?>" data-toggle="tab" href="#home3" role="tab" aria-controls="home"
                       aria-expanded="false">
                        <i class="icon-compass font-lg"></i> Hinweise</a>
                </li>
            @endif
            @if($table_has_help_help)
                <li class="nav-item">
                    <a class="nav-link <?php if($first_avtive_tab=='help') echo 'active'; ?>" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile"
                       aria-expanded="false">
                        <i class="icon-support font-lg"></i> Hilfe</a>
                </li>
            @endif
            @if($table_has_help_related)
                <li class="nav-item">
                    <a class="nav-link <?php if($first_avtive_tab=='related') echo 'active'; ?>" data-toggle="tab" href="#messages3" role="tab" aria-controls="messages"
                       aria-expanded="true">
                        <i class="icon-people font-lg"></i> Verwandtes</a>
                </li>
            @endif
            @if($table_has_help_config)
                <li class="nav-item">
                    <a class="nav-link <?php if($first_avtive_tab=='config') echo 'active'; ?>" data-toggle="tab" href="#config3" role="tab" aria-controls="config"
                       aria-expanded="true">
                        <i class="icon-wrench font-lg "></i> Konfiguration {!! $dev_only_hint !!}</a>
                </li>
            @endif
        </ul>

        <div class="tab-content">
            @if($table_has_help_hints)
                <div style="padding:1.2em" class="tab-pane <?php if($first_avtive_tab=='hints') echo 'active'; ?> animated fadeIn" id="home3" role="tabpanel"
                     aria-expanded="true">
                    1. Sie haben diese Rolle: xxxxxx und Sie haben diese Rechte: xxxxxxxxxxxxxxx<br>
                    2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat. Duis aute irure
                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                    sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
            @endif
            @if($table_has_help_help)
                <div style="padding:1.2em" class="tab-pane <?php if($first_avtive_tab=='help') echo 'active'; ?> animated fadeIn" id="profile3" role="tabpanel"
                     aria-expanded="false">
                    2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat. Duis aute irure
                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                    sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
            @endif
            @if($table_has_help_related)
                <div style="padding:1.2em" class="tab-pane <?php if($first_avtive_tab=='related') echo 'active'; ?> animated fadeIn" id="messages3" role="tabpanel"
                     aria-expanded="false">
                    3. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat. Duis aute irure
                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                    sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
            @endif
            @if($table_has_help_config)
                <div style="padding:1.2em" class="tab-pane <?php if($first_avtive_tab=='config') echo 'active'; ?> animated fadeIn" id="config3" role="tabpanel"
                     aria-expanded="false">
                    <div class="card-deck">
                        @if(1==2)
                        {{--page config--}}
                        <div class="card config-card">
                            <div class="card-body">
                                <h4 class="card-title"><span style="color:#aaa">Seiten-Konfiguration für</span> {{ucfirst($this_table_name)}}</h4>

                                    <div style="padding:4px 0;height:35px;;padding-left:12px">
                                    <?php
                                    echo get_checkbox_any_table(
                                        $table= 'diverses',
                                        $field = 'div_res',
                                        $id = $this_table_name.'_table_has_table_search',
                                        $id_field ='div_what',
                                        $with_comment=false,
                                        $tt_hint_key = 'is_dev',
                                        $label_text = "'Suche nach' anzeigen?",
                                        $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                        $ax_response = true,
                                        $input_style= '',
                                        $label_style = 'margin-right:12px;font-weight:bold;width:80%;display:inline-block',
                                        $with_tooltip = false,
                                        $tt_class = 'tip',
                                        $tt_width = '300px',
                                        $with_page_reload = false,
                                        $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                        $from_inside_loop = false, // lookup for current value if set to false
                                        $as_switch = true, //only checkbox or switch?
                                        $switch_size = 'no' //xs, sm, no, lg
                                    );
                                    ?>
                                        <div style="margin:-11px 0 6px 7px"><small class="text-muted">Letztes Update
                                                {!! timeAgo(get_dv($id,'updated_at')) !!}
                                                <?php if(is_dev()) echo ' - <b class="dev_hint">'.$id.'</b>'  ?></small></div>
                                </div>
                                <div style="padding:4px 0;height:35px;;padding-left:12px;margin-top:6px">
                                    <?php
                                    echo get_checkbox_any_table(
                                        $table= 'diverses',
                                        $field = 'div_res',
                                        $id = $this_table_name.'_table_has_table_export',
                                        $id_field ='div_what',
                                        $with_comment=false,
                                        $tt_hint_key = 'is_dev',
                                        $label_text = "'Tabelle exportieren' anzeigen?",
                                        $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                        $ax_response = true,
                                        $input_style= '',
                                        $label_style ,
                                        $with_tooltip = false,
                                        $tt_class = 'tip',
                                        $tt_width = '300px',
                                        $with_page_reload = false,
                                        $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                        $from_inside_loop = false, // lookup for current value if set to false
                                        $as_switch = true, //only checkbox or switch?
                                        $switch_size = 'no' //xs, sm, no, lg
                                    );
                                    ?>
                                </div>
                                <div style="margin:-14px 0 6px 17px"><small class="text-muted">Letztes Update
                                        {!! timeAgo(get_dv($id,'updated_at')) !!}
                                        <?php if(is_dev()) echo ' - <b class="dev_hint">'.$id.'</b>'  ?></small></div>
                                <div style="padding:4px 0;height:35px;padding-left:12px;margin-top:-4px">
                                    <?php
                                    echo get_checkbox_any_table(
                                        $table= 'diverses',
                                        $field = 'div_res',
                                        $id = $this_table_name.'_table_has_table_filter',
                                        $id_field ='div_what',
                                        $with_comment=false,
                                        $tt_hint_key = 'is_dev',
                                        $label_text = "'Tabelle filtern' anzeigen?",
                                        $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                        $ax_response = true,
                                        $input_style= '',
                                        $label_style ,
                                        $with_tooltip = false,
                                        $tt_class = 'tip',
                                        $tt_width = '300px',
                                        $with_page_reload = false,
                                        $this_value = '',
                                        $from_inside_loop = false, // lookup for current value if set to false
                                        $as_switch = true, //only checkbox or switch?
                                        $switch_size = 'no' //xs, sm, no, lg
                                    );
                                    ?>

                                </div>
                                <div style="margin:-14px 0 -1px 17px"><small class="text-muted">Letztes Update
                                        {!! timeAgo(get_dv($id,'updated_at')) !!}
                                        <?php if(is_dev()) echo ' - <b class="dev_hint">'.$id.'</b>'  ?></small></div>
                                <div style="margin:3px 0 8px 0;">
                                    <small class="text-muted" style="display:inline-block;line-height:130%">Deaktivieren Sie 'Tabelle filtern' wenn keine nützlichen Filter enthalten sind. Oder sprechen Sie mit dem Developer um gewünschte Filter einzubauen.
                                    </small>
                                </div>
                                <div style="padding:4px 0;height:35px;padding-left:12px">
                                    <?php
                                    echo get_checkbox_any_table(
                                        $table= 'diverses',
                                        $field = 'div_res',
                                        $id = $this_table_name.'_table_has_cols_filter',
                                        $id_field ='div_what',
                                        $with_comment=false,
                                        $tt_hint_key = 'is_dev',
                                        $label_text = "'Spalten ausblenden' anzeigen?",
                                        $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                        $ax_response = true,
                                        $input_style= '',
                                        $label_style ,
                                        $with_tooltip = false,
                                        $tt_class = 'tip',
                                        $tt_width = '300px',
                                        $with_page_reload = false,
                                        $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                        $from_inside_loop = false, // lookup for current value if set to false
                                        $as_switch = true, //only checkbox or switch?
                                        $switch_size = 'no' //xs, sm, no, lg
                                    );
                                    ?>
                                </div>
                                <div style="margin:-14px 0 8px 17px"><small class="text-muted">Letztes Update
                                        {!! timeAgo(get_dv($id,'updated_at')) !!}
                                        <?php if(is_dev()) echo ' - <b class="dev_hint">'.$id.'</b>'  ?></small></div>
                                <div style="padding:4px 0;height:35px;padding-left:12px;margin-top:-4px">
                                    <?php
                                    echo get_checkbox_any_table(
                                        $table= 'diverses',
                                        $field = 'div_res',
                                        $id = $this_table_name.'_table_has_items_per_page',
                                        $id_field ='div_what',
                                        $with_comment=false,
                                        $tt_hint_key = 'is_dev',
                                        $label_text = "'Records pro Seite' anzeigen?",
                                        $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                        $ax_response = true,
                                        $input_style= '',
                                        $label_style ,
                                        $with_tooltip = false,
                                        $tt_class = 'tip',
                                        $tt_width = '300px',
                                        $with_page_reload = false,
                                        $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                        $from_inside_loop = false, // lookup for current value if set to false
                                        $as_switch = true, //only checkbox or switch?
                                        $switch_size = 'no' //xs, sm, no, lg
                                    );
                                    ?>
                                </div>
                                <div style="margin:-14px 0 8px 17px"><small class="text-muted">Letztes Update
                                        {!! timeAgo(get_dv($id,'updated_at')) !!}
                                        <?php if(is_dev()) echo ' - <b class="dev_hint">'.$id.'</b>'  ?></small></div>

                                <p><small style="display:inline-block;line-height:130%" class="text-muted">Beim Laden der Seite autom. sortieren nach sort_order?
                                        Falls deaktiviert erfolgt die Sortierung nach ID.</small>


                                <div style="padding:4px 0;height:35px;padding-left:12px;margin-top:-18px">
                                    <?php
                                    echo get_checkbox_any_table(
                                        $table= 'diverses',
                                        $field = 'div_res',
                                        $id = $this_table_name.'_table_default_sort_order',
                                        $id_field ='div_what',
                                        $with_comment=false,
                                        $tt_hint_key = 'is_dev',
                                        $label_text = "nach 'sort_order' sortieren?",
                                        $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                        $ax_response = true,
                                        $input_style= '',
                                        $label_style ,
                                        $with_tooltip = false,
                                        $tt_class = 'tip',
                                        $tt_width = '300px',
                                        $with_page_reload = false,
                                        $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                        $from_inside_loop = false, // lookup for current value if set to false
                                        $as_switch = true, //only checkbox or switch?
                                        $switch_size = 'no' //xs, sm, no, lg
                                    );
                                    ?>
                                        <div style="margin:-11px 0 6px 7px"><small class="text-muted">Letztes Update
                                                {!! timeAgo(get_dv($id,'updated_at')) !!}
                                                <?php if(is_dev()) echo ' - <b class="dev_hint">'.$id.'</b>'  ?></small></div>
                                </div>
                                </p>

                                <p><small style="display:inline-block;line-height:130%" class="text-muted">Bei
                                        Änderung der 'sort_order' automatisch einen Page-Reload machen?</small>


                                <div style="padding:4px 0;height:35px;padding-left:12px;margin-top:-18px">
                                    <?php
                                    echo get_checkbox_any_table(
                                        $table= 'diverses',
                                        $field = 'div_res',
                                        $id = $this_table_name.'_table_on_sort_order_change_reload',
                                        $id_field ='div_what',
                                        $with_comment=false,
                                        $tt_hint_key = 'is_dev',
                                        $label_text = "Änderung an 'sort_order' mit autom. Page-Reload?",
                                        $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                        $ax_response = true,
                                        $input_style= '',
                                        $label_style ,
                                        $with_tooltip = false,
                                        $tt_class = 'tip',
                                        $tt_width = '300px',
                                        $with_page_reload = false,
                                        $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                        $from_inside_loop = false, // lookup for current value if set to false
                                        $as_switch = true, //only checkbox or switch?
                                        $switch_size = 'no' //xs, sm, no, lg
                                    );
                                    ?>
                                    <div style="margin:-11px 0 6px 7px"><small class="text-muted">Letztes Update
                                            {!! timeAgo(get_dv($id,'updated_at')) !!}
                                            <?php if(is_dev()) echo ' - <b class="dev_hint">'.$id.'</b>'  ?></small></div>
                                </div>
                                </p>


                                <p class="card-text">
                                    <small style="display:inline-block;line-height:130%" class="text-muted">Einstellungen werden auf Klick sofort gespeichert und mit einem kleinem Haken rechts vom Schalter bestätigt.

                                        Nach einem Page-Reload (F5) sind nur die aktivierten Elemente auf der Seite sichtbar.</small>
                                </p>
                            </div>
                        </div>
                        @endif

                        {{--general config--}}
                        <div class="card config-card">
                            {{--<img class="card-img-top" src="..." alt="Card image cap">--}}
                            <div class="card-body">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">
                                    Beim Ändern der sort_order immer eine Page-Reload machen?<br>
                                    linke side-bar beim Laden einer Seite breit oder small?<br>

                                </p>
                                <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </p>
                            </div>
                        </div>

                        @if(is_dev())
                        {{--dev config--}}
                        <div class="card config-card">
                            {{--<img class="card-img-top" src="..." alt="Card image cap">--}}
                            <div class="card-body">
                                <h4 class="card-title"><span style="color:#aaa">DEV-Konfiguration für</span> {{ucfirst($this_table_name)}}</h4>
                                {{--$this_table_name _table_has_help--}}
                                <div style="padding:4px 0;height:35px;;padding-left:12px">
                                    <?php
                                    echo get_checkbox_any_table(
                                        $table= 'diverses',
                                        $field = 'div_res',
                                        $id = $this_table_name.'_table_has_help',
                                        $id_field ='div_what',
                                        $with_comment=false,
                                        $tt_hint_key = 'is_dev',
                                        $label_text = "'Hilfe' generell anzeigen?",
                                        $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                        $ax_response = true,
                                        $input_style= '',
                                        $label_style = 'margin-right:12px;font-weight:bold;width:350px;display:inline-block',
                                        $with_tooltip = false,
                                        $tt_class = 'tip',
                                        $tt_width = '300px',
                                        $with_page_reload = false,
                                        $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                        $from_inside_loop = false, // lookup for current value if set to false
                                        $as_switch = true, //only checkbox or switch?
                                        $switch_size = 'no' //xs, sm, no, lg
                                    );
                                    ?>
                                    <div style="margin:-11px 0 6px 7px"><small class="text-muted">Letztes Update
                                            {!! timeAgo(get_dv($id,'updated_at')) !!}
                                            <?php if(is_dev()) echo ' - <b class="dev_hint">'.$id.'</b>'  ?></small></div>
                                </div>

                                <hr>
                                {{--$this_table_name _table_has_help_hints--}}
                                <div style="padding:4px 0;height:35px;;padding-left:12px;margin-top:6px">
                                    <?php
                                    echo get_checkbox_any_table(
                                        $table= 'diverses',
                                        $field = 'div_res',
                                        $id = $this_table_name.'_table_has_help_hints',
                                        $id_field ='div_what',
                                        $with_comment=false,
                                        $tt_hint_key = 'is_dev',
                                        $label_text = "'Hilfe->Hinweise' anzeigen?",
                                        $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                        $ax_response = true,
                                        $input_style= '',
                                        $label_style ,
                                        $with_tooltip = false,
                                        $tt_class = 'tip',
                                        $tt_width = '300px',
                                        $with_page_reload = false,
                                        $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                        $from_inside_loop = false, // lookup for current value if set to false
                                        $as_switch = true, //only checkbox or switch?
                                        $switch_size = 'no' //xs, sm, no, lg
                                    );
                                    ?>
                                </div>
                                <div style="margin:-14px 0 6px 17px"><small class="text-muted">Letztes Update
                                        {!! timeAgo(get_dv($id,'updated_at')) !!}
                                        <?php if(is_dev()) echo ' - <b class="dev_hint">'.$id.'</b>'  ?></small></div>

                                {{--$this_table_name _table_has_help_help--}}
                                <div style="padding:4px 0;height:35px;padding-left:12px;margin-top:-4px">
                                    <?php
                                    echo get_checkbox_any_table(
                                        $table= 'diverses',
                                        $field = 'div_res',
                                        $id = $this_table_name.'_table_has_help_help',
                                        $id_field ='div_what',
                                        $with_comment=false,
                                        $tt_hint_key = 'is_dev',
                                        $label_text = "'Hilfe->Hilfe' anzeigen?",
                                        $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                        $ax_response = true,
                                        $input_style= '',
                                        $label_style ,
                                        $with_tooltip = false,
                                        $tt_class = 'tip',
                                        $tt_width = '300px',
                                        $with_page_reload = false,
                                        $this_value = '',
                                        $from_inside_loop = false, // lookup for current value if set to false
                                        $as_switch = true, //only checkbox or switch?
                                        $switch_size = 'no' //xs, sm, no, lg
                                    );
                                    ?>

                                </div>
                                <div style="margin:-14px 0 -1px 17px"><small class="text-muted">Letztes Update
                                        {!! timeAgo(get_dv($id,'updated_at')) !!}
                                        <?php if(is_dev()) echo ' - <b class="dev_hint">'.$id.'</b>'  ?></small></div>

                                {{--$this_table_name _table_has_help_related--}}
                                <div style="padding:4px 0;height:35px;padding-left:12px">
                                    <?php
                                    echo get_checkbox_any_table(
                                        $table= 'diverses',
                                        $field = 'div_res',
                                        $id = $this_table_name.'_table_has_help_related',
                                        $id_field ='div_what',
                                        $with_comment=false,
                                        $tt_hint_key = 'is_dev',
                                        $label_text = "'Hilfe->Verwandtes' anzeigen?",
                                        $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                        $ax_response = true,
                                        $input_style= '',
                                        $label_style ,
                                        $with_tooltip = false,
                                        $tt_class = 'tip',
                                        $tt_width = '300px',
                                        $with_page_reload = false,
                                        $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                        $from_inside_loop = false, // lookup for current value if set to false
                                        $as_switch = true, //only checkbox or switch?
                                        $switch_size = 'no' //xs, sm, no, lg
                                    );
                                    ?>
                                </div>
                                <div style="margin:-14px 0 8px 17px"><small class="text-muted">Letztes Update
                                        {!! timeAgo(get_dv($id,'updated_at')) !!}
                                        <?php if(is_dev()) echo ' - <b class="dev_hint">'.$id.'</b>'  ?></small></div>

                                {{--$this_table_name _table_has_help_config--}}
                                <div style="padding:4px 0;height:35px;padding-left:12px;margin-top:-4px">
                                    <?php
                                    echo get_checkbox_any_table(
                                        $table= 'diverses',
                                        $field = 'div_res',
                                        $id = $this_table_name.'_table_has_help_config',
                                        $id_field ='div_what',
                                        $with_comment=false,
                                        $tt_hint_key = 'is_dev',
                                        $label_text = "'Hilfe->Konfiguration' anzeigen?",
                                        $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                        $ax_response = true,
                                        $input_style= '',
                                        $label_style ,
                                        $with_tooltip = false,
                                        $tt_class = 'tip',
                                        $tt_width = '300px',
                                        $with_page_reload = false,
                                        $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                        $from_inside_loop = false, // lookup for current value if set to false
                                        $as_switch = true, //only checkbox or switch?
                                        $switch_size = 'no' //xs, sm, no, lg
                                    );
                                    ?>
                                </div>
                                <div style="margin:-14px 0 8px 17px"><small class="text-muted">Letztes Update
                                        {!! timeAgo(get_dv($id,'updated_at')) !!}
                                        <?php if(is_dev()) echo ' - <b class="dev_hint">'.$id.'</b>'  ?></small></div>

                                <hr>

                                {{--$this_table_name _table_display_debug_area--}}
                                <div style="padding:4px 0;height:35px;padding-left:12px;margin-top:-14px">
                                    <?php
                                    echo get_checkbox_any_table(
                                        $table= 'diverses',
                                        $field = 'div_res',
                                        $id = $this_table_name.'_table_display_debug_area',
                                        $id_field ='div_what',
                                        $with_comment=false,
                                        $tt_hint_key = 'is_dev',
                                        $label_text = "Debug-Bereich anzeigen?",
                                        $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                        $ax_response = true,
                                        $input_style= '',
                                        $label_style ,
                                        $with_tooltip = false,
                                        $tt_class = 'tip',
                                        $tt_width = '300px',
                                        $with_page_reload = true,
                                        $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                        $from_inside_loop = false, // lookup for current value if set to false
                                        $as_switch = true, //only checkbox or switch?
                                        $switch_size = 'no' //xs, sm, no, lg
                                    );
                                    ?>
                                    <div style="margin:-11px 0 6px 7px"><small class="text-muted">Letztes Update
                                            {!! timeAgo(get_dv($id,'updated_at')) !!}
                                            <?php if(is_dev()) echo ' - <b class="dev_hint">'.$id.'</b>'  ?></small></div>
                                </div>


                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
