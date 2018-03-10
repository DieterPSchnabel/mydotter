@extends('backend.layouts.popup')

@section('page_level_styles')
@endsection

@section('content')

    <?php
    //$t_key = $_GET['key'];
    $t_key = 'notes_admin';
    create_dv($t_key, $value = 'superadmin-notes here...',true, $field = 'div_res_long');
    ?>

    {!! Form::model('Diverses', ['route' => ['admin.diverses.update_long_field_by_div_what', $t_key], 'method' => 'patch']) !!}


    <div style="margin:0 6px 9px 6px;font-weight:bold;color:#aaa">
        <span style="float:right;font-weight:normal;font-size:0.9em;">
            {{ url()->current() }}
            <input class="dimmed04 text-left" style="border:none;text-align:right;min-width:250px;margin-left:26px;padding:2px 4px" onfocus="this.select()"
                   type="text" value="{{$t_key}}"/>
        </span>
        <span style="font-size:1.4em">
            Notizen des Admin
        </span>
    </div>
    <div style="margin:9px 0  9px 12px">
        <input class="btn btn-success btn-xs" type="submit" title="speichern" value="speichern">
    </div>
    {{--wenn lang_code == '' dann wird in div_res_long gspeichert, sonst in div_res_long_##--}}
    <input type="hidden" name="this_lang_code" value=""/>

    <textarea name="ce" class="form-control">
        <?php
        echo get_dv($t_key,'div_res_long');
        ?>
    </textarea>

    <div style="margin:9px 0  6px 12px">
        <input class="btn btn-success btn-xs" type="submit" title="speichern" value="speichern">
        <span style="font-size:0.8em" class="pull-right dimmed06">Benötigen Sie mehr Platz?
            <a target="_blank" href="{{url()->full()}}">Öffnen Sie diesen Editor in einem neuen Fenster.</a> Oder klicken Sie auf <i class="fa fa-arrows-alt" aria-hidden="true"></i> oben in der Werkzeugleiste.</span>
    </div>
    {!! Form::close() !!}
@endsection



@section('page_level_scripts')

    <script>
        var route_prefix = "{{ url(config('lfm.prefix')) }}";
    </script>

    <!-- CKEditor init 4.8.0 -->
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>--}}
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/adapters/jquery.js"></script>--}}

    <script src="resources/assets/plugins/ckeditor_my_version_compact/ckeditor.js"></script>
    <script src="resources/assets/plugins/ckeditor_my_version_compact/adapters/jquery.js"></script>


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


@endsection
