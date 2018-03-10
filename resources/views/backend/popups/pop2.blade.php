@extends('backend.layouts.popup')

@section('page_level_styles')
@endsection

<?php
$t_key = $_GET['full_key'];
$get_lang = session_lang_code();
$get_lang = 'all';
$curr_lang = session_lang_code();
$this_is_html_editor = true;

$languages = get_languages();
foreach ($languages as $lang) {
    $t = 'txt_' . $lang->code;
    //$$t = get_dv($t_key, 'div_res_long_' . $lang->code);
    $$t = lookup('language_lines', $lang->code, $t_key, $id_field ='full_key' );
}


//$div_id = get_dv_id($t_key);

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
$editor_selector_key = 'select_use_advanced_editor_pop2'; //separately for each editor
create_dv($editor_selector_key, '0', true);
?>


@section('content')
    <div style="padding:2px 0 12px 0;border:0px #c00 solid">{{--pagewrapper--}}
        <?php
        $has_help = true;
        $has_help_hints = true;
        $has_help_help = true;
        $has_help_related = true;
        $has_help_config = true;
        ?>
        <h4 class="float-left" style="margin:-20px 0 10px 6px;color:#aaa">Texte im Table 'language_lines'</h4>
        <div class="text-right" style="padding:0 12px 6px 12px;width:100%;">

            <span style="font-size:0.8em;" class="dimmed06 mr-15">Benötigen Sie mehr Platz?
            </span>
            <a class="btn btn-info btn-sm mr-5" role="button" target="_blank" href="{{url()->full()}}">
                Editor in neuem Fenster öffnen </a>
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
        </div>
        <?php $this_page_name = 'pop2'; //required for help-block  ?>
        @include('backend.popups.help_pop1.help-block-all_pops')

            <?php
            $field = $lang->code;
            $id = $_GET['full_key'];;
            $id_field = 'full_key';
            $with_break = false;
            $lang = 'all'; //oder all
            $with_info = true;
            $style = 'width:600px;padding-left:4px;margin-bottom:20px';
            $class = 'inline_txt_any_table';
            ?>
            <div style="margin:49px 0 0 50px">
                Es werden hier nur die Sprachen angezeigt die unter Languages aktiviert sind. &nbsp; {!! link_to_route('admin.languages.index','Goto Languages-Table',[],[ 'target="_blank"', 'class=""']) !!}
            </div>
            <div id="all_langs_view"
                 style="padding:10px 40px 0 40px;;margin:3px 0 0 0;display:display;overflow:auto;">

                {!!
                edit_text_in_div($table='language_lines',$field, $id,
                 $id_field='full_key',
                 $with_break = false,
                 $lang,
                 $with_info,
                 $style,
                 $class,
                 $this_is_html_editor)
                 !!}
            </div>
            <div style="padding:6px 30px 0 50px">
                Falls Sie das Modul 'automatische Übersetzung' noch nicht aktiviert haben verwenden Sie den Google-Translator der gleich gute Ergebnisse liefert. Die Übersetzungen müssen dann allerdings per Hand hier einkopiert werden.
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
