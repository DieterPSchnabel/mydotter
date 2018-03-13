{{-- backend/includes/partials/dev-nav.blade--}}
<div style="padding:8px 12px;background:#eee;margin:0 0 8px 0;font-size:1.5em">
    <a class="btn btn-default btn-sm ml-1 mr-5" data-fancybox data-type="iframe"
       data-src="{{config('app.url')}}/dashboard/pop_dev_links"
       href="javascript:;">
        Links {!! fa_popup() !!}</a>

    <a class="btn btn-default btn-sm ml-1 " data-fancybox data-type="iframe"
       data-src="{{config('app.url')}}/dashboard/pop_dev_info"
       href="javascript:;">
        Dev Info {!! fa_popup() !!}</a>

    {{--<a class="btn btn-default btn-sm ml-1 " data-fancybox data-type="iframe"
       data-src="{{config('app.url')}}/dashboard/pop_dev_howto"
       href="javascript:;">
        How to {!! fa_popup() !!}</a>--}}

    <a class="btn btn-default btn-sm ml-1 " data-fancybox data-type="iframe"
       data-src="{{config('app.url')}}/dashboard/pop_dev_settings"
       href="javascript:;">
        Settings {!! fa_popup() !!}</a>

    <a class="btn btn-default btn-sm ml-1 " data-fancybox data-type="iframe"
       data-src="{{config('app.url')}}/dashboard/pop_dev_helpers"
       href="javascript:;">
        Helpers {!! fa_popup() !!}</a>

    <div class="dropdown  ml-1 " style="display:inline-block">
        <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            How to
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

            <a class="dropdown-item" data-fancybox data-type="iframe"
               data-src="{{config('app.url')}}/dashboard/pop_dev_howto?p=18"
               href="javascript:;">
                Spatie - How to 18 {!! fa_popup() !!}</a>

            <a class="dropdown-item" data-fancybox data-type="iframe"
               data-src="{{config('app.url')}}/dashboard/pop_dev_howto?p=19"
               href="javascript:;">
                Translations - How to 19 {!! fa_popup() !!}</a>

            <a class="dropdown-item" data-fancybox data-type="iframe"
               data-src="{{config('app.url')}}/dashboard/pop_dev_howto?p=20"
               href="javascript:;">
                Artisan - How to 20 {!! fa_popup() !!}</a>

            <a class="dropdown-item" data-fancybox data-type="iframe"
               data-src="{{config('app.url')}}/dashboard/pop_dev_howto?p=21"
               href="javascript:;">
                Generators - How to 21 {!! fa_popup() !!}</a>

            <a class="dropdown-item" data-fancybox data-type="iframe"
               data-src="{{config('app.url')}}/dashboard/pop_dev_howto?p=22"
               href="javascript:;">
                Filesystem - How to 22 {!! fa_popup() !!}</a>

            <a class="dropdown-item" data-fancybox data-type="iframe"
               data-src="{{config('app.url')}}/dashboard/pop_dev_howto?p=23"
               href="javascript:;">
                Auth/Permissions - How to 23 {!! fa_popup() !!}</a>

            <a class="dropdown-item" data-fancybox data-type="iframe"
               data-src="{{config('app.url')}}/dashboard/pop_dev_howto?p=24"
               href="javascript:;">
                Date/Time - How to 24 {!! fa_popup() !!}</a>

            <a class="dropdown-item" data-fancybox data-type="iframe"
               data-src="{{config('app.url')}}/dashboard/pop_dev_howto?p=25"
               href="javascript:;">
                to Javascript - How to 25 {!! fa_popup() !!}</a>

            <a class="dropdown-item" data-fancybox data-type="iframe"
               data-src="{{config('app.url')}}/dashboard/pop_dev_howto?p=26"
               href="javascript:;">
                Infyom - How to 26 {!! fa_popup() !!}</a>

            <a class="dropdown-item" data-fancybox data-type="iframe"
               data-src="{{config('app.url')}}/dashboard/pop_dev_howto?p=27"
               href="javascript:;">
                Allgemein - How to 27 {!! fa_popup() !!}</a>

        </div>
    </div>

    <span class="ml-1" style="opacity:0.15">||</span>

    <a class="btn btn-default btn-sm ml-1 " data-fancybox data-type="iframe"
       data-src="{{config('app.url')}}/admin/decompose"
       href="javascript:;">
        Decomposer {!! fa_popup() !!}</a>

    <a class="btn btn-default btn-sm ml-1 " data-fancybox data-type="iframe"
       data-src="{{config('app.url')}}/admin/dashboard/installed_as_per_decomposer"
       href="javascript:;">
        installed Larapacks {!! fa_popup() !!}</a>

    <a class="btn btn-default btn-sm ml-1 " target="_blank" href="{{url('admin/routes')}}">Routes</a>

    <a class="btn btn-default btn-sm ml-1 " data-fancybox data-type="iframe"
       data-src="../../dev/php_info.php"
       href="javascript:;">
        PHP Info {!! fa_popup() !!}</a>

    <a class="btn btn-default btn-sm ml-1 " target="_blank" href="{{url('enveditor')}}">.env Editor</a>

    <a class="btn btn-default btn-sm ml-1 " target="_blank" href="{{url('admin/dashboard/config')}}">Config Manager</a>

    <a class="btn btn-default btn-sm ml-1 " target="_blank" href="https://mailtrap.io/inboxes">MailTrap Inbox</a>

    <?php $this_ident = rand_str() ?>
    <a class="btn btn-default btn-sm ml-1" href="javascript:flush_cache('{{$this_ident}}')"><i
                class="fa fa-th-list fa-orange" aria-hidden="true"></i> Cache::flush() <span style="margin-left:8px"
                                                                                             id="{{$this_ident}}_conf"></span></a>


    <div style="font-size:0.8em;display:inline-block;margin:9px 0 -9px 0" class="float-right">
<?php
        echo get_checkbox_any_table(
            $table = 'diverses',
            $field = 'div_res',
            $id = 'is_dev',
            $id_field = 'div_what',
            $with_comment = false,
            $tt_hint_key = 'is_dev',
            $label_text = 'is Dev: ',
            $with_panel = false, //if with panel -> no toltip - for text is displayed in panel
            $ax_response = true,
            $input_style = '',
            $label_style = 'margin-left:12px;font-weight:normal;margin-right:6px;font-size:0.7em',
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
        <sup><a style="margin-left:20px;font-size:1.0em;font-weight:normal;" class="dimmed04" target="_blank" title="open in new window"
           href="{{url()->full()}}">open in new window</a></sup>
</div>


</div>

