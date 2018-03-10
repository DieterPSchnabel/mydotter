@extends('backend.layouts.popup')

@section('page_level_styles')
@endsection

@section('content')
    @include('backend.includes.partials.dev-nav')
<div style="padding:32px 90px 0 90px">{{--pagewrapper--}}
<?php
$t_key = $_GET['key'];
$t_title = $_GET['title'];
create_dv($t_key, $value = $t_title. ' - notes go here...',$first=true, $field = 'div_res_long');

//init editor choice
$editor_selector_key = 'select_use_advanced_editor_'.$t_key; //separately for each editor
create_dv($editor_selector_key, '0',true);
?>

    {!! Form::model('Diverses', ['route' => ['admin.diverses.update_long_field_by_div_what', $t_key], 'method' => 'patch'] ) !!}

{{----------------- begin header on all  ---------------------------}}
    <div style="margin:0;font-weight:bold;color:#aaa">
        <div style="float:right;font-weight:normal;font-size:0.9em;margin:-18px 9px 12px 0">
            {{url()->full()}}
            <input class="dimmed04 text-left" style="border:none;text-align:right;min-width:250px;margin-left:26px;padding:2px 4px" onfocus="this.select()"
                   type="text" value="{{$t_key}}"/>
        </div>
        <div style="font-size:1.4em;margin:15px 0 0 4px">
            Developer-Notes <div style="font-weight:normal;font-size:0.6em">{{$t_title}}</div>
        </div>
    </div>
{{----------------- end header on all  ---------------------------}}

    <div style="margin:9px 0  9px 12px">
    <input class="btn btn-success btn-xs" type="submit" title="speichern" value="speichern">
        <a style="margin-left:36px" class="btn btn-info btn-sm" href="javascript:toggle('help_block_popup','slide')" role="button">
            <i class="icon-support"></i> Hilfe</a>
        <a style="margin-left:12px" class="btn btn-info btn-sm ml-2" href="javascript:toggle('info_ck_editor','slide')" role="button">
            <i class="icon-support"></i> Editor-Infos</a>

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
            $label_style = 'color:#999;margin-left:32px;font-weight:normal;margin-right:6px;font-size:0.9em;vertical-align:top',
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

        {{-- <a style="margin-left:36px" class="btn btn-info btn-sm" href="javascript:swal('xxx','in Arbeit','warning')" role="button">
             <i class="fa fa-window-restore"></i> Vorschau mit Backend Stylesheets</a>
         <a style="margin-left:12px" class="btn btn-info btn-sm ml-2" href="javascript:swal('xxx','in Arbeit','warning')" role="button">
             <i class="fa fa-window-restore"></i> Vorschau mit Frontend Stylesheets</a>--}}

    </div>
    {{--wenn lang_code == '' dann wird in div_res_long gspeichert, sonst in div_res_long_##--}}
    <input type="hidden" name="this_lang_code" value=""/>
    <input type="hidden" name="this_full_url" value="{{url()->full()}}"/>

    <textarea name="ce" class="form-control">
        <?php
        echo get_dv($t_key,'div_res_long');
        ?>
    </textarea>

    <div style="margin:9px 0  6px 12px;width:85%">
        <input class="btn btn-success btn-xs" type="submit" title="speichern" value="speichern">

        {{--<a class="ml-5" href="javascript:parent.location.reload()">reload</a>--}}
        {{-- <a style="margin-left:76px" class="btn btn-info btn-sm" href="javascript:parent.location.reload()" role="button">
             <i class="fa fa-refresh fa-lg" aria-hidden="true"></i> Editor schliessen mit Reload der Hintergrundseite</a>--}}

        <?php
        $what = 'editor_pop_reload_hint';
        $class="tip";
        $width='400px';
        $style='margin-left:5px';
        $icon='';
        echo tooltip($what,$class, $width,  $style, $icon);
        ?>


        <div style="font-size:0.9em;margin:30px 3px 15px 0;" class="pull-right text-right dimmed08">Benötigen Sie mehr Platz?
            <a target="_blank" href="{{url()->full()}}">Öffnen Sie diesen Editor in einem neuen Fenster.</a>
            <br>Oder klicken Sie im erweiterten Editor auf <kbd>Maximieren</kbd> oben, rechts in der Werkzeugleiste.</div>
    </div>
    {!! Form::close() !!}

    <div id="help_block_popup" style="display:none;margin:12px 24px 12px 24px;background:#eee;padding:12px;border:1px #ccc solid;width:50%">
        <a class="float-right" href="javascript:toggle('help_block_popup','fade')"><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></a>
        <?php
        echo get_dv('ckeditor_help_text','div_res_long');
        ?>
    </div>
    <div id="info_ck_editor" style="display:none;margin:12px 24px 12px 24px;background:#eee;padding:12px;border:1px #ccc solid;width:50%">
        <a class="float-right" href="javascript:toggle('info_ck_editor','fade')"><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></a>
        <?php
        echo get_dv('ckeditor_help_config','div_res_long');
        ?>
    </div>

</div>{{--/pagewrapper--}}
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
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}',

            customConfig: '/my_plugins/editors/ckeditor/js/config.js',
            height: 400,
            width: 1100,
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

    <script>
        /*-------------    ckeditor save on ctrl/s  --------------------------------*/
        var isCtrl = false;


        $('textarea[name=ce]').ckeditor(function ()
        {
            var editor = $('textarea[name=ce]');
            //var editor = ckeditor;

            editor.on( 'contentDom', function( evt )
            {

                editor.document.on( 'keyup', function(event)
                {
                    if(event.data.$.keyCode == 17) isCtrl=false;
                });

                editor.document.on( 'keydown', function(event)
                {
                    if(event.data.$.keyCode == 17) isCtrl=true;
                    if(event.data.$.keyCode == 83 && isCtrl == true)
                    {
                        //The preventDefault() call prevents the browser's save popup to appear.
                        //The try statement fixes a weird IE error.
                        try {
                            event.data.$.preventDefault();
                        } catch(err) {}
                        //Call to your save function
                        //alert('savexxxxxxxx');
                        $('textarea[name=ce]').submit;
                        return false;
                    }
                });

            }, editor.element.$);
        });

    </script>

    <script type="text/javascript">
       /* $("[data-fancybox]").on('afterClose.fb', parent.location.reload());*/
    </script>
@endsection
