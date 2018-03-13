<div class="f_container ">
    {{---------------  1  -----------------}}
    <div class="f_col" style="padding:5px">
        <?php
        //$card_counter++;
        $card_counter = 1;
        $t_key = 'config_assi1' . '_' . $card_counter;
        $t_key_header = $t_key . '_header';
        create_dv($t_key_header, 'Titel', true);
        //$t_key_editor_add_txt = 'config_translation_add_txt_editor';
        $t_key_editor_add_txt = $t_key . '_add_txt_editor';
        create_dv($t_key_editor_add_txt, '', true);

        $t_key_editor_top_txt = $t_key . '_top_txt_editor';
        create_dv($t_key_editor_top_txt, '', true);
        ?>
        <div class="card" style="margin:0;border: 0px #c00 solid">
            <div class="card-header h4" style="padding:5px 10px">

                <?php
                echo '<span style="color:#ccc;font-size:0.8em">' . $card_counter . '. </span>';
                echo __get_dv($t_key_header, 'div_res');//div_res or div_res_long;
                echo get_edit_link_short($t_key_header, 'font-size:0.8em');
                ?>

                <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04"
                   href="javascript:toggle('cont_{{$t_key}}','slide')">
                    <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                @if($card_counter==1)
                    <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none"
                       class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                        <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                    <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px"
                       class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                        <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                @endif
                <div class="editable_top" style="">
                    @if(is_dev())
                        <a title="{!! get_tr('Zusatz-Text editieren in allen Sprachen') !!}" data-fancybox=""
                           data-type="iframe" class="float-right"
                           data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}"
                           title="info-text"
                           href="javascript:">
                            <sup><i>{!! get_tr('edit') !!}</i></sup></a>
                    @endif
                    <?php echo __get_dv($t_key_editor_top_txt, 'div_res_long'); ?>
                </div>
            </div>

            {{--begin block wrapper--}}
            <div id="cont_{{$t_key}}" style="display:none">{{--begin block wrapper--}}

                {{--translate_to_english_first--}}
                <div class="card-block {{--dev-longtxt--}}" style="padding:5px 8px">
                    <?php
                    echo get_checkbox_div(
                        $what = 'translate_to_english_first',
                        $label_text = '',
                        $label_style = 'font-weight:bold; margin-right:6px; ',
                        $with_panel = true,
                        $data_on = 'On',
                        $data_off = 'Off',
                        $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                        $ax_response = false,
                        $ax_response_with_page_reload = false,
                        $with_tooltip = true,
                        $tt_class = 'tip_lu',
                        $tt_width = '450px'
                    )
                    ?>
                </div>{{--<div class="card-block">--}}
                <hr class="style-four">{{--##############################################################--}}

                {{--translate_to_english_only_if_set_to_first_test  for debugging--}}
                {{--DEV only!!--}}
                @if(is_dev())
                    <div class="card-block" style="padding:5px 8px;">
                        <?php
                        echo get_checkbox_div(
                            $what = 'translate_to_english_only_if_set_to_first_test',
                            $label_text = '',
                            $label_style = 'font-weight:bold; margin-right:6px; ',
                            $with_panel = true,
                            $data_on = 'On',
                            $data_off = 'Off',
                            $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                            $ax_response = false,
                            $ax_response_with_page_reload = false,
                            $with_tooltip = true,
                            $tt_class = 'tip_lu',
                            $tt_width = '450px'
                        )
                        ?>
                    </div>
                    <hr class="style-four">{{--#####################$t_key_editor_top_txt############################--}}
                @endif

                {{--first_letter_in_translation_always_display_uppercase--}}
                <div class="card-block {{--dev-longtxt--}}" style="padding:5px 8px;">
                    <?php
                    echo get_checkbox_div(
                        $what = 'first_letter_in_translation_always_display_uppercase',
                        $label_text = '',
                        $label_style = 'font-weight:bold; margin-right:6px; ',
                        $with_panel = true,
                        $data_on = 'On',
                        $data_off = 'Off',
                        $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                        $ax_response = false,
                        $ax_response_with_page_reload = false,
                        $with_tooltip = true,
                        $tt_class = 'tip_lu',
                        $tt_width = '450px'
                    )
                    ?>
                </div>
                <hr class="style-four">{{--#####################$t_key_editor_top_txt############################--}}

                {{--edit & display additional help-text in footer of assistant--}}
                <?php
                $this_long_add_help_text = __get_dv($t_key_editor_add_txt, 'div_res_long');
                ?>
                <div class="add_text_wrp" style="margin: 0px 12px 12px 12px">
                    <a title="{!! get_tr('Zusatz-Text editieren in allen Sprachen') !!}" data-fancybox=""
                       data-type="iframe" class="float-right"
                       data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}"
                       title="info-text"
                       href="javascript:">
                        <sup><i>{!! get_tr('edit') !!}</i></sup></a>
                    @if($this_long_add_help_text<>'')
                        <div class="dev-longtxt">
                            <?= $this_long_add_help_text ?>
                        </div>
                    @endif
                </div>{{--end class="add_text_wrp"--}}


            </div>{{--end block wrapper--}}

        </div>{{--<div class="card">--}}
    </div>{{--<div class="f_col">--}}

    {{---------------  2  -----------------}}

    {{--dashboard_settings_sidebar_minimized--}}


    <div class="f_col" style="padding:5px">
        <?php
        //$card_counter++;
        $card_counter = 2;
        $t_key = 'config_assi1' . '_' . $card_counter;
        $t_key_header = $t_key . '_header';
        create_dv($t_key_header, 'Titel', true);
        //$t_key_editor_add_txt = 'config_translation_add_txt_editor';
        $t_key_editor_add_txt = $t_key . '_add_txt_editor';
        create_dv($t_key_editor_add_txt, '', true);

        $t_key_editor_top_txt = $t_key . '_top_txt_editor';
        create_dv($t_key_editor_top_txt, '', true);
        ?>
        <div class="card" style="margin:0;border: 0px #c00 solid">
            <div class="card-header h4" style="padding:5px 10px">

                <?php
                echo '<span style="color:#ccc;font-size:0.8em">' . $card_counter . '. </span>';
                echo __get_dv($t_key_header, 'div_res');//div_res or div_res_long;
                echo get_edit_link_short($t_key_header, 'font-size:0.8em');
                ?>

                <a title="show/hide" style="margin-right:-3px" class="btn btn-sm float-right dimmed04"
                   href="javascript:toggle('cont_{{$t_key}}','slide')">
                    <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></a>

                @if($card_counter==1)
                    <a id="hide_all_cards_link" title="all show/hide" style="margin-right:-3px;display:none"
                       class="btn btn-sm float-right dimmed04" href="javascript:hide_all_cards()">
                        <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                    <a id="show_all_cards_link" title="all show/hide" style="margin-right:-3px"
                       class="btn btn-sm float-right dimmed04" href="javascript:show_all_cards()">
                        <i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                @endif
                <div class="editable_top" style="">
                    @if(is_dev())
                        <a title="{!! get_tr('Zusatz-Text editieren in allen Sprachen') !!}" data-fancybox=""
                           data-type="iframe" class="float-right"
                           data-src="{{url('/dashboard/pop1?key='.$t_key_editor_top_txt.'&amp;lang=all&amp;curr_lang')}}"
                           title="info-text"
                           href="javascript:">
                            <sup><i>{!! get_tr('edit') !!}</i></sup></a>
                    @endif
                    <?php echo __get_dv($t_key_editor_top_txt, 'div_res_long'); ?>
                </div>
            </div>

            {{--begin block wrapper--}}
            <div id="cont_{{$t_key}}" style="display:none">{{--begin block wrapper--}}

                {{--dashboard_settings_sidebar_minimized--}}
                <div class="card-block {{--dev-longtxt--}}" style="padding:5px 8px">
                    <?php
                    echo get_checkbox_div(
                        $what = 'dashboard_settings_sidebar_minimized',
                        $label_text = '',
                        $label_style = 'font-weight:bold; margin-right:6px; ',
                        $with_panel = true,
                        $data_on = 'On',
                        $data_off = 'Off',
                        $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                        $ax_response = false,
                        $ax_response_with_page_reload = false,
                        $with_tooltip = true,
                        $tt_class = 'tip_lu',
                        $tt_width = '450px'
                    )
                    ?>
                </div>{{--<div class="card-block">--}}
                <hr class="style-four">{{--##############################################################--}}


                {{--dashboard_settings_show_edit_links--}}
                <div class="card-block {{--dev-longtxt--}}" style="padding:5px 8px;">
                    <?php
                    echo get_checkbox_div(
                        $what = 'dashboard_settings_show_edit_links',
                        $label_text = '',
                        $label_style = 'font-weight:bold; margin-right:6px; ',
                        $with_panel = true,
                        $data_on = 'On',
                        $data_off = 'Off',
                        $wrapper_style = 'padding:2px 9px 0 9px;margin:0 0 4px 0;',
                        $ax_response = false,
                        $ax_response_with_page_reload = false,
                        $with_tooltip = true,
                        $tt_class = 'tip_lu',
                        $tt_width = '450px'
                    )
                    ?>
                </div>
                <hr class="style-four">{{--#####################$t_key_editor_top_txt############################--}}

                {{--edit & display additional help-text in footer of assistant--}}
                <?php
                $this_long_add_help_text = __get_dv($t_key_editor_add_txt, 'div_res_long');
                ?>
                <div class="add_text_wrp" style="margin: 0px 12px 12px 12px">
                    <a title="{!! get_tr('Zusatz-Text editieren in allen Sprachen') !!}" data-fancybox=""
                       data-type="iframe" class="float-right"
                       data-src="{{url('/dashboard/pop1?key='.$t_key_editor_add_txt.'&amp;lang=all&amp;curr_lang')}}"
                       title="info-text"
                       href="javascript:">
                        <sup><i>{!! get_tr('edit') !!}</i></sup></a>
                    @if($this_long_add_help_text<>'')
                        <div class="dev-longtxt">
                            <?= $this_long_add_help_text ?>
                        </div>
                    @endif
                </div>{{--end class="add_text_wrp"--}}


            </div>{{--end block wrapper--}}

        </div>{{--<div class="card">--}}
    </div>{{--<div class="f_col">--}}

    {{---------------  3  -----------------}}




</div>


<script>
    /*var anz = <?php //echo $card_counter ?> ;*/
    var number_assistants = 20; //todo estimated can be much higher since there ist no counter++ anymore

    function show_all_cards() {
        if ($('#show_all_cards_switch')) $('#show_all_cards_switch').hide();
        if ($('#hide_all_cards_switch')) $('#hide_all_cards_switch').show();
        if ($('#show_all_cards_link')) $('#show_all_cards_link').hide();
        if ($('#hide_all_cards_link')) $('#hide_all_cards_link').show();
        for (i = 1; i <= number_assistants; i++) {
            if ($('#cont_settings_dashboard_' + i)) show('cont_settings_dashboard_' + i);
            if ($('#cont_{{'config_assi1'}}_' + i)) show('cont_{{'config_assi1'}}_' + i);
        }
    }

    function hide_all_cards() {
        if ($('#hide_all_cards_switch')) $('#hide_all_cards_switch').hide();
        if ($('#show_all_cards_switch')) $('#show_all_cards_switch').show();
        if ($('#hide_all_cards_link')) $('#hide_all_cards_link').hide();
        if ($('#show_all_cards_link')) $('#show_all_cards_link').show();
        for (i = 1; i <= number_assistants; i++) {
            if ($('#cont_settings_dashboard_' + i)) hide('cont_settings_dashboard_' + i);
            if ($('#cont_{{'config_assi1'}}_' + i)) hide('cont_{{'config_assi1'}}_' + i);
        }
    }

</script>
