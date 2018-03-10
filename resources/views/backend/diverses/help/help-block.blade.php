<div class="card" id="help_block" style="display:none;">

    <div class="help_wrapper">
        <a style="margin-right:8px" class="float-right" href="javascript:toggle('help_block','slide')">
            <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></a>
        <?php
        //$this_table_name = $this_page_name; //##############################################
        if (isset($this_page_name)) $this_table_name = $this_page_name;
        create_dv($this_table_name . '_table_has_help_hints', 1, true); //if value <> '' add $first=true to avoid caching
        create_dv($this_table_name . '_table_has_help_help', 1, true);
        create_dv($this_table_name . '_table_has_help_related', 1, true);
        create_dv($this_table_name . '_table_has_help_config', 1, true);
        create_dv($this_table_name . '_table_has_items_per_page', 1, true);

        $first_avtive_tab = '';

        $this_key = $this_table_name;
        $$this_key = $this_key . '_table_has_help_hints';
        $table_has_help_hints = get_dv($$this_key);
        if ($table_has_help_hints and $first_avtive_tab == '') $first_avtive_tab = 'hints';

        $this_key = $this_table_name;
        $$this_key = $this_key . '_table_has_help_help';
        $table_has_help_help = get_dv($$this_key);
        if ($table_has_help_help and $first_avtive_tab == '') $first_avtive_tab = 'help';

        $this_key = $this_table_name;
        $$this_key = $this_key . '_table_has_help_related';
        $table_has_help_related = get_dv($$this_key);
        if ($table_has_help_related and $first_avtive_tab == '') $first_avtive_tab = 'related';

        $this_key = $this_table_name;
        $$this_key = $this_key . '_table_has_help_config';
        $table_has_help_config = get_dv($$this_key);
        $dev_only_hint = '';
        if (is_dev() and !$table_has_help_config) {
            $table_has_help_config = true;
            $dev_only_hint = ' <i class="dev_only" style="font-size:0.8em;opacity:0.5;color:#c00">(DEV only)</i>';
        } //DEV must have always access
        if ($table_has_help_config and $first_avtive_tab == '') $first_avtive_tab = 'config';

        ?>
        <ul class="nav nav-tabs" role="tablist">
            @if($table_has_help_hints)
                <?php
                $general_key = 'general_help_block_header_';
                $t_key = $general_key . 'hint';
                create_dv($t_key, 'Hinweise', true, 'div_res_de');
                ?>
                <li class="nav-item">
                    <?php echo get_edit_link_short($t_key, 'height:10px;display:inline-block;font-size:0.9em;padding-left:22px;margin-bottom:-6px;');   ?>
                    <a class="nav-link <?php if ($first_avtive_tab == 'hints') echo 'active'; ?>" data-toggle="tab"
                       href="#home3" role="tab" aria-controls="home"
                       aria-expanded="false">
                        <i class="icon-compass font-lg"></i>
                        <?php
                        echo __get_dv($t_key, 'div_res');
                        ?>
                    </a>

                </li>
            @endif
            @if($table_has_help_help)
                <?php
                $general_key = 'general_help_block_header_';
                $t_key = $general_key . 'help';
                create_dv($t_key, 'Hilfe', true, 'div_res_de');
                ?>
                <li class="nav-item">
                    <?php echo get_edit_link_short($t_key, 'height:10px;display:inline-block;font-size:0.9em;padding-left:22px;margin-bottom:-6px;');   ?>
                    <a class="nav-link <?php if ($first_avtive_tab == 'help') echo 'active'; ?>" data-toggle="tab"
                       href="#profile3" role="tab" aria-controls="profile"
                       aria-expanded="false">
                        <i class="icon-support font-lg"></i>
                        <?php echo __get_dv($t_key, 'div_res'); ?></a>
                </li>
            @endif
            @if($table_has_help_related)
                <?php
                $general_key = 'general_help_block_header_';
                $t_key = $general_key . 'related';
                create_dv($t_key, 'Verwandtes', true, 'div_res_de');
                ?>
                <li class="nav-item">
                    <?php echo get_edit_link_short($t_key, 'height:10px;display:inline-block;font-size:0.9em;padding-left:22px;margin-bottom:-6px;');   ?>
                    <a class="nav-link <?php if ($first_avtive_tab == 'related') echo 'active'; ?>" data-toggle="tab"
                       href="#messages3" role="tab" aria-controls="messages"
                       aria-expanded="true">
                        <i class="icon-people font-lg"></i>
                        <?php echo __get_dv($t_key, 'div_res');?></a>
                </li>
            @endif
            @if($table_has_help_config or is_dev())
                <?php
                $general_key = 'general_help_block_header_';
                $t_key = $general_key . 'config';
                create_dv($t_key, 'Konfiguration', true, 'div_res_de');
                ?>
                <li class="nav-item">
                    <?php echo get_edit_link_short($t_key, 'height:10px;display:inline-block;font-size:0.9em;padding-left:22px;margin-bottom:-6px;');   ?>
                    <a class="nav-link <?php if ($first_avtive_tab == 'config') echo 'active'; ?>" data-toggle="tab"
                       href="#config3" role="tab" aria-controls="config"
                       aria-expanded="true">
                        <i class="icon-wrench font-lg "></i> <?php echo __get_dv($t_key, 'div_res');?> {!! $dev_only_hint !!}
                    </a>
                </li>
            @endif
        </ul>

        <div class="tab-content">
            @if($table_has_help_hints)
                <?php
                $this_editabel_content_key_hints = $this_table_name . '_help_block_hints';
                create_dv($this_editabel_content_key_hints, 'Hier die Hinweise in gewünschter Sprache.', true, 'div_res_long_de');
                ?>
                <div style="padding:1.2em"
                     class="tab-pane <?php if ($first_avtive_tab == 'hints') echo 'active'; ?> animated fadeIn"
                     id="home3" role="tabpanel"
                     aria-expanded="true">
                    {{--1. Sie haben diese Rolle: xxxxxx und Sie haben diese Rechte: xxxxxxxxxxxxxxx--}}
                    <div class="editable_content" style="">
                        @if(is_dev())
                            <a title="DEV: Text editieren in allen Sprachen" data-fancybox="" data-type="iframe"
                               class="float-right"
                               data-src="{{url('/dashboard/pop1?key='.$this_editabel_content_key_hints.'&amp;lang=all&amp;curr_lang')}}"
                               title="info-text"
                               href="javascript:;">
                                <sup><i>edit</i></sup></a>
                        @endif
                        <?= __get_dv($this_editabel_content_key_hints, 'div_res_long') ?>
                    </div>
                </div>
            @endif
            @if($table_has_help_help)
                <?php
                $this_editabel_content_key_help = $this_table_name . '_help_block_help';
                create_dv($this_editabel_content_key_help, 'Hier die Hilfe in gewünschter Sprache.', true, 'div_res_long_de');
                ?>
                <div style="padding:1.2em"
                     class="tab-pane <?php if ($first_avtive_tab == 'help') echo 'active'; ?> animated fadeIn"
                     id="profile3" role="tabpanel"
                     aria-expanded="false">
                    <div class="editable_content" style="">
                        @if(is_dev())
                            <a title="DEV: Text editieren in allen Sprachen" data-fancybox="" data-type="iframe"
                               class="float-right"
                               data-src="{{url('/dashboard/pop1?key='.$this_editabel_content_key_help.'&amp;lang=all&amp;curr_lang')}}"
                               title="info-text"
                               href="javascript:;">
                                <sup><i>edit</i></sup></a>
                        @endif
                        <?= __get_dv($this_editabel_content_key_help, 'div_res_long') ?>
                    </div>
                </div>
            @endif
            @if($table_has_help_related)
                <?php
                $this_editabel_content_key_related = $this_table_name . '_help_block_related';
                create_dv($this_editabel_content_key_related, 'Hier die Infos in gewünschter Sprache.', true, 'div_res_long_de');
                ?>
                <div style="padding:1.2em"
                     class="tab-pane <?php if ($first_avtive_tab == 'related') echo 'active'; ?> animated fadeIn"
                     id="messages3" role="tabpanel"
                     aria-expanded="false">
                    <div class="editable_content" style="">
                        @if(is_dev())
                            <a title="DEV: Text editieren in allen Sprachen" data-fancybox="" data-type="iframe"
                               class="float-right"
                               data-src="{{url('/dashboard/pop1?key='.$this_editabel_content_key_related.'&amp;lang=all&amp;curr_lang')}}"
                               title="info-text"
                               href="javascript:;">
                                <sup><i>edit</i></sup></a>
                        @endif
                        <?= __get_dv($this_editabel_content_key_related, 'div_res_long') ?>
                    </div>
                </div>
            @endif
            @if($table_has_help_config or id_dev())
                <div style="padding:1.2em"
                     class="tab-pane <?php if ($first_avtive_tab == 'config') echo 'active'; ?> animated slideInleft"
                     id="config3" role="tabpanel"
                     aria-expanded="false">
                    <div class="card-deck">
                        @if(1==1)
                            {{--page config--}}
                            <div class="card config-card">
                                <div class="card-body">
                                    <h4 class="card-title"><span style="color:#aaa">
                                    {!! get_tr('Seiten-Konfiguration für') !!} </span>
                                        {{ucfirst($this_table_name)}}</h4>

                                    <div style="padding:4px 0;height:35px;;padding-left:12px">
                                        <?php
                                        echo get_checkbox_any_table(
                                            $table = 'diverses',
                                            $field = 'div_res',
                                            $id = $this_table_name . '_table_has_table_search',
                                            $id_field = 'div_what',
                                            $with_comment = false,
                                            $tt_hint_key = 'is_dev',
                                            $label_text = __get_dv($id, $field = 'div_res_long', $lang = null),
                                            $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                            $ax_response = true,
                                            $input_style = '',
                                            $label_style = 'margin-right:12px;font-weight:bold;width:350px;display:inline-block',
                                            $with_tooltip = true,
                                            $tt_class = 'tip',
                                            $tt_width = '400px',
                                            $with_page_reload = false,
                                            $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                            $from_inside_loop = false, // lookup for current value if set to false
                                            $as_switch = true, //only checkbox or switch?
                                            $switch_size = 'no' //xs, sm, no, lg
                                        );
                                        ?>
                                        <div style="margin:-11px 0 6px 7px">
                                            <small class="text-muted">{!! get_tr('Letztes Update') !!}
                                                {!! timeAgo(get_dv_not_cached($id,'updated_at')) !!}
                                                <?php if (is_dev()) echo ' - <b class="dev_hint">' . $id . '</b>'  ?></small>
                                        </div>
                                    </div>


                                    <div style="padding:4px 0;height:35px;;padding-left:12px;margin-top:6px">
                                        <?php
                                        echo get_checkbox_any_table(
                                            $table = 'diverses',
                                            $field = 'div_res',
                                            $id = $this_table_name . '_table_has_table_export',
                                            $id_field = 'div_what',
                                            $with_comment = false,
                                            $tt_hint_key = 'is_dev',
                                            $label_text = __get_dv($id, $field = 'div_res_long', $lang = null),
                                            $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                            $ax_response = true,
                                            $input_style = '',
                                            $label_style = 'margin-right:12px;font-weight:bold;width:350px;display:inline-block',
                                            $with_tooltip = true,
                                            $tt_class = 'tip',
                                            $tt_width = '400px',
                                            $with_page_reload = false,
                                            $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                            $from_inside_loop = false, // lookup for current value if set to false
                                            $as_switch = true, //only checkbox or switch?
                                            $switch_size = 'no' //xs, sm, no, lg
                                        );
                                        ?>
                                    </div>
                                    <div style="margin:-14px 0 6px 17px">
                                        <small class="text-muted">{!! get_tr('Letztes Update') !!}
                                            {!! timeAgo(get_dv_not_cached($id,'updated_at')) !!}
                                            <?php if (is_dev()) echo ' - <b class="dev_hint">' . $id . '</b>'  ?></small>
                                    </div>
                                    <div style="padding:4px 0;height:35px;padding-left:12px;margin-top:-4px">
                                        <?php
                                        echo get_checkbox_any_table(
                                            $table = 'diverses',
                                            $field = 'div_res',
                                            $id = $this_table_name . '_table_has_table_filter',
                                            $id_field = 'div_what',
                                            $with_comment = false,
                                            $tt_hint_key = 'is_dev',
                                            $label_text = __get_dv($id, $field = 'div_res_long', $lang = null),
                                            $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                            $ax_response = true,
                                            $input_style = '',
                                            $label_style = 'margin-right:12px;font-weight:bold;width:350px;display:inline-block',
                                            $with_tooltip = true,
                                            $tt_class = 'tip',
                                            $tt_width = '400px',
                                            $with_page_reload = false,
                                            $this_value = '',
                                            $from_inside_loop = false, // lookup for current value if set to false
                                            $as_switch = true, //only checkbox or switch?
                                            $switch_size = 'no' //xs, sm, no, lg
                                        );
                                        ?>

                                    </div>
                                    <div style="margin:-14px 0 -1px 17px">
                                        <small class="text-muted">{!! get_tr('Letztes Update') !!}
                                            {!! timeAgo(get_dv_not_cached($id,'updated_at')) !!}
                                            <?php if (is_dev()) echo ' - <b class="dev_hint">' . $id . '</b>'  ?></small>
                                    </div>
                                    <div style="margin:3px 0 8px 0;">
                                        <small class="text-muted" style="display:inline-block;line-height:130%">
                                            Deaktivieren Sie 'Tabelle filtern' wenn keine nützlichen Filter enthalten
                                            sind. Oder sprechen Sie mit dem Developer um gewünschte Filter einzubauen.
                                        </small>
                                    </div>
                                    <div style="padding:4px 0;height:35px;padding-left:12px">
                                        <?php
                                        echo get_checkbox_any_table(
                                            $table = 'diverses',
                                            $field = 'div_res',
                                            $id = $this_table_name . '_table_has_cols_filter',
                                            $id_field = 'div_what',
                                            $with_comment = false,
                                            $tt_hint_key = 'is_dev',
                                            $label_text = __get_dv($id, $field = 'div_res_long', $lang = null),
                                            $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                            $ax_response = true,
                                            $input_style = '',
                                            $label_style = 'margin-right:12px;font-weight:bold;width:350px;display:inline-block',
                                            $with_tooltip = true,
                                            $tt_class = 'tip',
                                            $tt_width = '400px',
                                            $with_page_reload = false,
                                            $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                            $from_inside_loop = false, // lookup for current value if set to false
                                            $as_switch = true, //only checkbox or switch?
                                            $switch_size = 'no' //xs, sm, no, lg
                                        );
                                        ?>
                                    </div>
                                    <div style="margin:-14px 0 8px 17px">
                                        <small class="text-muted">{!! get_tr('Letztes Update') !!}
                                            {!! timeAgo(get_dv_not_cached($id,'updated_at')) !!}
                                            <?php if (is_dev()) echo ' - <b class="dev_hint">' . $id . '</b>'  ?></small>
                                    </div>
                                    <div style="padding:4px 0;height:35px;padding-left:12px;margin-top:-4px">
                                        <?php
                                        echo get_checkbox_any_table(
                                            $table = 'diverses',
                                            $field = 'div_res',
                                            $id = $this_table_name . '_table_has_items_per_page',
                                            $id_field = 'div_what',
                                            $with_comment = false,
                                            $tt_hint_key = 'is_dev',
                                            $label_text = __get_dv($id, $field = 'div_res_long', $lang = null),
                                            $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                            $ax_response = true,
                                            $input_style = '',
                                            $label_style = 'margin-right:12px;font-weight:bold;width:350px;display:inline-block',
                                            $with_tooltip = true,
                                            $tt_class = 'tip',
                                            $tt_width = '400px',
                                            $with_page_reload = false,
                                            $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                            $from_inside_loop = false, // lookup for current value if set to false
                                            $as_switch = true, //only checkbox or switch?
                                            $switch_size = 'no' //xs, sm, no, lg
                                        );
                                        ?>
                                    </div>
                                    <div style="margin:-14px 0 8px 17px">
                                        <small class="text-muted">{!! get_tr('Letztes Update') !!}
                                            {!! timeAgo(get_dv_not_cached($id,'updated_at')) !!}
                                            <?php if (is_dev()) echo ' - <b class="dev_hint">' . $id . '</b>'  ?></small>
                                    </div>

                                    @if(table_has_column($this_table_name,'sort_order'))
                                        <p>
                                            <small style="display:inline-block;line-height:130%" class="text-muted">

                                                {!! get_tr('Beim Laden der Seite autom. sortieren nach \'sort_order\'?') !!}
                                                {!! get_tr('Falls deaktiviert erfolgt die Sortierung nach ID. Nur relevant wenn diese Tabelle ein Feld \'sort_order\' hat.') !!}
                                            </small>


                                        <div style="padding:4px 0;height:35px;padding-left:12px;margin-top:-18px">
                                            <?php
                                            echo get_checkbox_any_table(
                                                $table = 'diverses',
                                                $field = 'div_res',
                                                $id = $this_table_name . '_table_default_sort_order',
                                                $id_field = 'div_what',
                                                $with_comment = false,
                                                $tt_hint_key = 'is_dev',
                                                $label_text = __get_dv($id, $field = 'div_res_long', $lang = null),
                                                $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                                $ax_response = true,
                                                $input_style = '',
                                                $label_style = 'margin-right:12px;font-weight:bold;width:350px;display:inline-block',
                                                $with_tooltip = true,
                                                $tt_class = 'tip',
                                                $tt_width = '400px',
                                                $with_page_reload = false,
                                                $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                                $from_inside_loop = false, // lookup for current value if set to false
                                                $as_switch = true, //only checkbox or switch?
                                                $switch_size = 'no' //xs, sm, no, lg
                                            );
                                            ?>
                                            <div style="margin:-11px 0 6px 7px">
                                                <small class="text-muted">{!! get_tr('Letztes Update') !!}
                                                    {!! timeAgo(get_dv_not_cached($id,'updated_at')) !!}
                                                    <?php if (is_dev()) echo ' - <b class="dev_hint">' . $id . '</b>'  ?></small>
                                            </div>
                                        </div>
                                        </p>

                                        <p>
                                            <small style="display:inline-block;line-height:130%" class="text-muted">
                                                {!! get_tr('Bei Änderung der \'sort_order\' automatisch einen Page-Reload machen?') !!}
                                            </small>


                                        <div style="padding:4px 0;height:35px;padding-left:12px;margin-top:-18px">
                                            <?php
                                            echo get_checkbox_any_table(
                                                $table = 'diverses',
                                                $field = 'div_res',
                                                $id = $this_table_name . '_table_on_sort_order_change_reload',
                                                $id_field = 'div_what',
                                                $with_comment = false,
                                                $tt_hint_key = 'is_dev',
                                                $label_text = __get_dv($id, $field = 'div_res_long', $lang = null),
                                                $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                                $ax_response = true,
                                                $input_style = '',
                                                $label_style = 'margin-right:12px;font-weight:bold;width:350px;display:inline-block',
                                                $with_tooltip = true,
                                                $tt_class = 'tip',
                                                $tt_width = '400px',
                                                $with_page_reload = false,
                                                $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                                $from_inside_loop = false, // lookup for current value if set to false
                                                $as_switch = true, //only checkbox or switch?
                                                $switch_size = 'no' //xs, sm, no, lg
                                            );
                                            ?>
                                            <div style="margin:-11px 0 6px 7px">
                                                <small class="text-muted">{!! get_tr('Letztes Update') !!}
                                                    {!! timeAgo(get_dv_not_cached($id,'updated_at')) !!}
                                                    <?php if (is_dev()) echo ' - <b class="dev_hint">' . $id . '</b>'  ?></small>
                                            </div>
                                        </div>
                                        </p>

                                    @endif {{--table has sort_order field--}}
                                    <p class="card-text">
                                        <small style="display:inline-block;line-height:130%" class="text-muted">
                                            {!! get_tr('Einstellungen werden auf Klick sofort gespeichert und mit einem kleinem Haken rechts vom Schalter bestätigt.') !!}
                                            {!! get_tr('Nach einem Page-Reload (F5) sind nur die aktivierten Elemente auf der Seite sichtbar.') !!}
                                        </small>
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

                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est, provident quae?
                                    Asperiores cum iure magnam molestias mollitia quae. Accusamus asperiores deleniti
                                    dicta fugit illum ipsum iusto, labore laborum maiores ullam?<br>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores illo molestiae
                                    tenetur veniam. Aspernatur dolorem exercitationem facere labore, maiores neque nihil
                                    numquam omnis perspiciatis, quae qui reprehenderit sit, unde voluptatem!

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
                                    <h4 class="card-title"><span style="color:#aaa">
                                        DEV-{!! get_tr('Konfiguration für') !!}</span> {{ucfirst($this_table_name)}}
                                    </h4>
                                    {{--$this_table_name _table_has_help--}}
                                    <div style="padding:4px 0;height:35px;;padding-left:12px">
                                        <?php
                                        echo get_checkbox_any_table(
                                            $table = 'diverses',
                                            $field = 'div_res',
                                            $id = $this_table_name . '_table_has_help',
                                            $id_field = 'div_what',
                                            $with_comment = false,
                                            $tt_hint_key = 'is_dev',
                                            $label_text = __get_dv($id, $field = 'div_res_long', $lang = null),
                                            $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                            $ax_response = true,
                                            $input_style = '',
                                            $label_style = 'margin-right:12px;font-weight:bold;width:350px;display:inline-block',
                                            $with_tooltip = true,
                                            $tt_class = 'tip_lu',
                                            $tt_width = '400px',
                                            $with_page_reload = false,
                                            $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                            $from_inside_loop = false, // lookup for current value if set to false
                                            $as_switch = true, //only checkbox or switch?
                                            $switch_size = 'no' //xs, sm, no, lg
                                        );
                                        ?>
                                        <div style="margin:-11px 0 6px 7px">
                                            <small class="text-muted">{!! get_tr('Letztes Update') !!}
                                                {!! timeAgo(get_dv_not_cached($id,'updated_at')) !!}
                                                <?php if (is_dev()) echo ' - <b class="dev_hint">' . $id . '</b>'  ?></small>
                                        </div>
                                    </div>

                                    <hr>
                                    {{--$this_table_name _table_has_help_hints--}}
                                    <div style="padding:4px 0;height:35px;;padding-left:12px;margin-top:6px">
                                        <?php
                                        echo get_checkbox_any_table(
                                            $table = 'diverses',
                                            $field = 'div_res',
                                            $id = $this_table_name . '_table_has_help_hints',
                                            $id_field = 'div_what',
                                            $with_comment = false,
                                            $tt_hint_key = 'is_dev',
                                            $label_text = __get_dv($id, $field = 'div_res_long', $lang = null),
                                            $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                            $ax_response = true,
                                            $input_style = '',
                                            $label_style,
                                            $with_tooltip = true,
                                            $tt_class = 'tip_lu',
                                            $tt_width = '400px',
                                            $with_page_reload = false,
                                            $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                            $from_inside_loop = false, // lookup for current value if set to false
                                            $as_switch = true, //only checkbox or switch?
                                            $switch_size = 'no' //xs, sm, no, lg
                                        );
                                        ?>
                                    </div>
                                    <div style="margin:-14px 0 6px 17px">
                                        <small class="text-muted">{!! get_tr('Letztes Update') !!}
                                            {!! timeAgo(get_dv_not_cached($id,'updated_at')) !!}
                                            <?php if (is_dev()) echo ' - <b class="dev_hint">' . $id . '</b>'  ?></small>
                                    </div>

                                    {{--$this_table_name _table_has_help_help--}}
                                    <div style="padding:4px 0;height:35px;padding-left:12px;margin-top:-4px">
                                        <?php
                                        echo get_checkbox_any_table(
                                            $table = 'diverses',
                                            $field = 'div_res',
                                            $id = $this_table_name . '_table_has_help_help',
                                            $id_field = 'div_what',
                                            $with_comment = false,
                                            $tt_hint_key = 'is_dev',
                                            $label_text = __get_dv($id, $field = 'div_res_long', $lang = null),
                                            $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                            $ax_response = true,
                                            $input_style = '',
                                            $label_style,
                                            $with_tooltip = true,
                                            $tt_class = 'tip_lu',
                                            $tt_width = '400px',
                                            $with_page_reload = false,
                                            $this_value = '',
                                            $from_inside_loop = false, // lookup for current value if set to false
                                            $as_switch = true, //only checkbox or switch?
                                            $switch_size = 'no' //xs, sm, no, lg
                                        );
                                        ?>

                                    </div>
                                    <div style="margin:-14px 0 -1px 17px">
                                        <small class="text-muted">{!! get_tr('Letztes Update') !!}
                                            {!! timeAgo(get_dv_not_cached($id,'updated_at')) !!}
                                            <?php if (is_dev()) echo ' - <b class="dev_hint">' . $id . '</b>'  ?></small>
                                    </div>

                                    {{--$this_table_name _table_has_help_related--}}
                                    <div style="padding:4px 0;height:35px;padding-left:12px">
                                        <?php
                                        echo get_checkbox_any_table(
                                            $table = 'diverses',
                                            $field = 'div_res',
                                            $id = $this_table_name . '_table_has_help_related',
                                            $id_field = 'div_what',
                                            $with_comment = false,
                                            $tt_hint_key = 'is_dev',
                                            $label_text = __get_dv($id, $field = 'div_res_long', $lang = null),
                                            $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                            $ax_response = true,
                                            $input_style = '',
                                            $label_style,
                                            $with_tooltip = true,
                                            $tt_class = 'tip_lu',
                                            $tt_width = '400px',
                                            $with_page_reload = false,
                                            $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                            $from_inside_loop = false, // lookup for current value if set to false
                                            $as_switch = true, //only checkbox or switch?
                                            $switch_size = 'no' //xs, sm, no, lg
                                        );
                                        ?>
                                    </div>
                                    <div style="margin:-14px 0 8px 17px">
                                        <small class="text-muted">{!! get_tr('Letztes Update') !!}
                                            {!! timeAgo(get_dv_not_cached($id,'updated_at')) !!}
                                            <?php if (is_dev()) echo ' - <b class="dev_hint">' . $id . '</b>'  ?></small>
                                    </div>

                                    {{--$this_table_name _table_has_help_config--}}
                                    <div style="padding:4px 0;height:35px;padding-left:12px;margin-top:-4px">
                                        <?php
                                        echo get_checkbox_any_table(
                                            $table = 'diverses',
                                            $field = 'div_res',
                                            $id = $this_table_name . '_table_has_help_config',
                                            $id_field = 'div_what',
                                            $with_comment = false,
                                            $tt_hint_key = 'is_dev',
                                            $label_text = __get_dv($id, $field = 'div_res_long', $lang = null),
                                            $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                            $ax_response = true,
                                            $input_style = '',
                                            $label_style,
                                            $with_tooltip = true,
                                            $tt_class = 'tip_lu',
                                            $tt_width = '400px',
                                            $with_page_reload = false,
                                            $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                            $from_inside_loop = false, // lookup for current value if set to false
                                            $as_switch = true, //only checkbox or switch?
                                            $switch_size = 'no' //xs, sm, no, lg
                                        );
                                        ?>
                                    </div>
                                    <div style="margin:-14px 0 8px 17px">
                                        <small class="text-muted">{!! get_tr('Letztes Update') !!}
                                            {!! timeAgo(get_dv_not_cached($id,'updated_at')) !!}
                                            <?php if (is_dev()) echo ' - <b class="dev_hint">' . $id . '</b>'  ?></small>
                                    </div>

                                    <hr>

                                    {{--$this_table_name _table_display_debug_area--}}
                                    <div style="padding:4px 0;height:35px;padding-left:12px;margin-top:-14px">
                                        <?php
                                        echo get_checkbox_any_table(
                                            $table = 'diverses',
                                            $field = 'div_res',
                                            $id = $this_table_name . '_table_display_debug_area',
                                            $id_field = 'div_what',
                                            $with_comment = false,
                                            $tt_hint_key = 'is_dev',
                                            $label_text = __get_dv($id, $field = 'div_res_long', $lang = null),
                                            $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                                            $ax_response = true,
                                            $input_style = '',
                                            $label_style,
                                            $with_tooltip = true,
                                            $tt_class = 'tip_lu',
                                            $tt_width = '400px',
                                            $with_page_reload = true,
                                            $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                            $from_inside_loop = false, // lookup for current value if set to false
                                            $as_switch = true, //only checkbox or switch?
                                            $switch_size = 'no' //xs, sm, no, lg
                                        );
                                        ?>
                                        <div style="margin:-11px 0 6px 7px">
                                            <small class="text-muted">{!! get_tr('Letztes Update') !!}
                                                {!! timeAgo(get_dv_not_cached($id,'updated_at')) !!}
                                                <?php if (is_dev()) echo ' - <b class="dev_hint">' . $id . '</b>'  ?></small>
                                        </div>
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
