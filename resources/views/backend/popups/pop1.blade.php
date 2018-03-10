@extends('backend.layouts.popup')

@section('page_level_styles')
@endsection

<?php
$t_key = $_GET['key'];
$get_lang = session_lang_code();
$get_lang = 'all';
$curr_lang = session_lang_code();
$this_is_html_editor = true;

$languages = get_languages();
foreach ($languages as $lang) {
    $t = 'txt_' . $lang->code;
    $$t = get_dv($t_key, 'div_res_long_' . $lang->code);
}


$div_id = get_dv_id($t_key);

$sess_lang_code = session_lang_code();
if ($get_lang == 'all') {
    $languages = get_languages(); // array - all activated langs in sort order
    $this_lang_code = 'all';
    $single_lang = false;
} else {
    $this_lang_code = $get_lang;
    if ($this_lang_code == '') $this_lang_code = $sess_lang_code;
    $languages = get_languages($this_lang_code); // array - all activated langs in sort order
    $single_lang = true;
}

//init editor choice
$editor_selector_key = 'select_use_advanced_editor_pop1'; //separately for each editor
create_dv($editor_selector_key, '0', true);
?>


@section('content')
    <div style="padding:2px 10px 0 10px;border:0px #c00 solid">{{--pagewrapper--}}
        <?php
        $has_help = true;
        $has_help_hints = true;
        $has_help_help = true;
        $has_help_related = true;
        $has_help_config = true;
        ?>
        <h4 class="float-left" style="margin:-20px 0 10px 6px;color:#aaa">HTML-Texte für Tooltips und Hinweise im Table 'diverse' <span class="dimmed04">(div_res_long)</span></h4>
        <div class="text-right" style="padding:0 12px 6px 12px;width:100%;">

            <span style="font-size:0.8em;" class="dimmed06 mr-15">Benötigen Sie mehr Platz?
                Oder klicken Sie auf <i class="fa fa-arrows-alt" aria-hidden="true"></i> in der Werkzeugleiste des  erweiterten Editors. Oder Editor...</span>
            <a class="btn btn-info btn-sm mr-5" role="button" target="_blank" href="{{url()->full()}}">
                ...in neuem Fenster öffnen </a>
        </div>
        <div style="padding:0 12px 6px 12px;width:100%;">
            @if(is_dev())
            <span style="float:right;font-weight:normal;font-size:1.0em">
                {{ url()->current() }}
                <input class="dimmed04" style="border:none;text-align:right;min-width:250px;margin-left:16px;padding:2px 4px" onfocus="this.select()" type="text" value="{{$t_key}}"/>
            </span>
            @endif

            @if($has_help)
                {{------------ TABLE HILFE ------------}}
                <a style="margin-left:4px;" class="btn btn-info btn-sm" href="javascript:toggle('help_block','slide')"
                   role="button">
                    <i class="icon-support"></i> Hilfe</a>
            @endif

            <?php

            //select editor of choice
            echo get_checkbox_any_table(
                $table = 'diverses',
                $field = 'div_res',
                $id = $editor_selector_key,
                $id_field = 'div_what',
                $with_comment = false,
                $tt_hint_key = 'is_dev',
                $label_text = 'erweiterten Editor verwenden? ',
                $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
                $ax_response = true,
                $input_style = '',
                $label_style = 'color:#999;margin-left:42px;font-weight:normal;margin-right:6px;font-size:0.9em;vertical-align:top',
                $with_tooltip = true,
                $tt_class = 'tip',
                $tt_width = '400px',
                $with_page_reload = true,
                $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname} - otherwise leave empty
                $from_inside_loop = false, // lookup for current value if set to false
                $as_switch = true, //only checkbox or switch?
                $switch_size = 'no' //xs, sm, no, lg
            );
            ?>

        </div>
    <?php $this_page_name = 'pop1'; //required for help-block  ?>
    @include('backend.popups.help_pop1.help-block-all_pops')

        <!-- Custom Tabs -->
        <a class="nav-tabs-custom round6 " style="background:#ECF0F5">
            <ul class="nav nav-tabs" style="font-weight:bold">
                {{-- loop 1 --}}
                @foreach($languages as $lang)
                    <?php
                    if ($curr_lang <> '' and $curr_lang == $lang->code) {
                    ?>
                    <li class="nav-item">
                        <a href="#tab_{{$lang->code}}" class="nav-link active"
                           data-toggle="tab">{!! flag_icon($lang->code) !!} {{$lang->name}}
                            {!! mark_missing_translation_with_icon($t_key, $lang->code, true) !!}
                        </a></li>
                    <?php } else { ?>
                    <li class="nav-item">
                        <a href="#tab_{{$lang->code}}" class="nav-link"
                           data-toggle="tab">{!! flag_icon($lang->code) !!} {{$lang->name}}
                            {!! mark_missing_translation_with_icon($t_key, $lang->code, true) !!}
                        </a>
                    </li>

                    <?php } ?>

                @endforeach
                {{-- end loop 1 --}}
            </ul>



            <div class="tab-content" style="background:none;padding:0;margin:0">
                <!-- loop 2 -->
                <?php  $i = 1; ?>
                @foreach($languages as $lang)
                    <?php
                    /*if ($i==1) {  */
                    if ($curr_lang <> '' and $curr_lang == $lang->code) {
                    ?>
                    <div class="tab-pane active" id="tab_{{$lang->code}}" style="background:#f5f6f7">
                        <?php } else { ?>
                        <div class="tab-pane" id="tab_{{$lang->code}}" style="background:#f5f6f7">
                            <?php } ?>

                            {!! Form::model('Diverses', ['route' => ['admin.diverses.update_long_field_by_div_what', $t_key], 'method' => 'patch','name' => 'nixxx','id' => 'div_form' ]) !!}
                            <input name="lang" type="hidden" value="{{$lang->code}}">

                            <input name="lang" type="hidden" value="{{$lang->code}}">

                            <div style="margin:0 6px 9px 6px;font-weight:bold;color:#aaa">
                                <span style="font-size:1.3em">
                                    Text bearbeiten - {{$lang->directory}} {!! flag_icon($lang->code) !!}
                                </span>
                                <span style="font-weight:normal" class="float-right">aktuelle Einstellungen in config.app: 1. Sprache = <b>{{config('app.locale')}}</b> - Fallback-Sprache = <b>{{config('app.fallback_locale')}}</b>
                                    <?php
                                    $what = 'set_main_lang_and_fallback_lang';
                                    $class = "tip_lu";
                                    $width = '400px';
                                    $style = 'margin-left:5px';
                                    $icon = '';
                                    echo tooltip($what, $class, $width, $style, $icon);
                                    ?>
                                </span>
                            </div>

                            <input type="hidden" name="this_lang_code" value="{{$lang->code}}"/>

                            <textarea name="ce" class="form-control">
                                <?php
                                $t = 'txt_' . $lang->code;
                                echo $$t;
                                ?>
                            </textarea>

                            <div style="margin:9px 0  6px 12px">
                                <input id="submit_btn" class="btn btn-success btn-sm" type="submit" title="speichern"
                                       value="speichern">

                                <a style="margin-left:76px" class="btn btn-info btn-sm"
                                   href="javascript:javascript:submit_and_reload();" role="button">
                                    <i class="fa fa-refresh fa-lg" aria-hidden="true"></i> Editor schliessen mit Reload der Hintergrundseite</a>

                                <?php
                                $what = 'editor_pop_reload_hint';
                                $class="tip";
                                $width='400px';
                                $style='margin-left:5px';
                                $icon='';
                                echo tooltip($what,$class, $width,  $style, $icon);
                                ?>

                            </div>


                            {!! Form::close() !!}

                            <script>
                                function submit_and_reload() {
                                    //div_form.submit;
                                    //document.getElementById('submit_btn').click();
                                    //document.getElementById('div_form').submit();
                                    parent.location.reload();
                                }
                            </script>

                        </div>
                        <?php  $i++;  ?>
                        @endforeach
                        {{--end loop 2 --}}
            </div>
            <!-- nav-tabs-custom -->




            <?php
            $field = 'div_res_long';
            $id = $_GET['key'];;
            $id_field = 'div_what';
            $with_break = false;
            $lang = 'all'; //oder all
            $with_info = true;
            $style = 'width:700px;padding-left:4px';
            $class = 'inline_txt_any_table';

            ?>
            {{--<div style="margin:29px 0 0 105px"><a href="javascript:toggle('all_langs_view')">Text in allen Sprachen auf
                    einen Blick - ein/ausblenden <i class="fa fa-caret-square-o-down" aria-hidden="true"></i></a></div>--}}
            <div id="all_langs_view"
                 style="padding:0 0px 0 0px;;margin:3px 0 0 0;display:display;overflow:auto;">
               {!!
               edit_text_in_div($table='diverses',$field, $id,
                $id_field='div_what',
                $with_break = false,
                $lang,
                $with_info,
                $style,
                $class,
                $this_is_html_editor)
                !!}

            </div>
            <div style="padding:6px 0 0 40px">
                Falls Sie das Modul 'automatische Übersetzung' noch nicht aktiviert haben verwenden Sie den Google-Translator der gleich gute Ergebnisse liefert. <br>Die Übersetzungen müssen dann allerdings per Hand hier einkopiert werden.
                <a class="btn btn-default btn-sm" target="_blank"
                   href="https://translate.google.de/">Google-Translator</a>
            </div>
    </div>
    </div>{{--pagewrapper--}}
@endsection

@section('page_level_scripts')
    <script>
        var route_prefix = "{{ url(config('lfm.prefix')) }}";
    </script>

    <!-- CKEditor init 4.8.0 -->
    @if(get_dv($editor_selector_key))
        {{--enhanced version--}}
        {{--<script src="{{ config('app.url') }}/my_plugins/ckeditor_my_version_compact/ckeditor.js"></script>
        <script src="{{ config('app.url') }}/my_plugins/ckeditor_my_version_compact/styles.js"></script>
        <script src="{{ config('app.url') }}/my_plugins/ckeditor_my_version_compact/adapters/jquery.js"></script>--}}
        {{--more enhanced version--}}
        <script src="{{ config('app.url') }}/my_plugins/ckeditor_4.8.0_more_enhanced/ckeditor.js"></script>
        <script src="{{ config('app.url') }}/my_plugins/ckeditor_4.8.0_more_enhanced/styles.js"></script>
        <script src="{{ config('app.url') }}/my_plugins/ckeditor_4.8.0_more_enhanced/adapters/jquery.js"></script>

    @else
        {{--basic version--}}
        <script src="{{ config('app.url') }}/my_plugins/ckeditor_4.8.0_basic/ckeditor.js"></script>
        <script src="{{ config('app.url') }}/my_plugins/ckeditor_4.8.0_basic/styles.js"></script>
        <script src="{{ config('app.url') }}/my_plugins/ckeditor_4.8.0_basic/adapters/jquery.js"></script>
    @endif

    <script>
        $('textarea[name=ce]').ckeditor({
            height: 100,
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}',

            /*customConfig: '/my_plugins/editors/ckeditor/js/config.js',*/
            height: 100,
            <?php if(get_dv($editor_selector_key)) { ?>
                customConfig: '/my_plugins/ckeditor_4.8.0_more_enhanced/config.js',
                width: 1200,
            <?php }else{ ?>
                customConfig: '/my_plugins/ckeditor_4.8.0_basic/config.js',
                width: 800,
            <?php } ?>
            language: '{!! session_lang_code()  !!}'

        });
    </script>

    {{--{{ config('app.url') }}/my_plugins/jQuery-Easydrag/jQuery-Easydrag.js--}}

    <script>
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
    </script>
    <script>
        $('#lfm').filemanager('image', {prefix: route_prefix});
    </script>



@endsection
