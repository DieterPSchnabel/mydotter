<header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">☰</button>
    <a title="zum Admin-Dashboard" class="navbar-brand" href="{{ route('admin.dashboard') }}"></a>
    <button title="linke Sidebar ein- und ausblenden" class="navbar-toggler sidebar-minimizer d-md-down-none " type="button">☰</button>

    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
        <a style="display: display;" title="Fullscreen aktivieren" id="fs-doc-button" class="nav-link" href="#"><i class="fa fa-arrows-alt" aria-hidden="false"></i></a>
        <a style="display: none;" title="Fullscreen deaktivieren" id="fs-exit-doc-button" class="nav-link" href="#"><i style="color:#b00;" class="fa fa-arrows-alt" aria-hidden="true"></i></a>
        </li>

        <li class="nav-item px-3">
            <a title="zum Frontend - neues Fenster" target="_blank" class="nav-link" href="{{ route('frontend.index') }}"><i class="icon-home"></i></a>
        </li>

        <li class="nav-item px-3">
            <a title="Admin-Dashboard" class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('navs.frontend.dashboard') }}</a>
        </li>

        {{--@if (config('locale.status') && count(config('locale.languages')) > 1)--}}
        @if ( get_languages('', true) > 1)
            <li class="nav-item px-3 dropdown">
                <a title="Sprache für mich wählen" class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="d-md-down-none">{{ __('menus.language-picker.language') }} {!! flag_icon(app()->getLocale(),$size='20') !!}({{ strtoupper(app()->getLocale()) }})</span>
                </a>
                @include('includes.partials.lang')
            </li>
        @endif
        <li class="nav-item px-3 dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span>DevTests1</span>
            </a>
            @include('includes.partials.admintestSelect')
        </li>
        <li class="nav-item px-3 dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span>DevTests2</span>
            </a>
            @include('includes.partials.admintestSelect2')
        </li>
        <li class="nav-item px-3 dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span>DevTests3</span>
            </a>
            @include('includes.partials.admintestSelect3')
        </li>
        <li class="nav-item px-3 dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span>DevPages</span>
            </a>
            @include('includes.partials.admintestSelect4')
        </li>

        <li class="nav-item px-3 dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                {{--<span class="d-md-down-none">{{ __('menus.language-picker.language') }}</span>--}}
                <span>LocalApps</span>
            </a>
            @include('includes.partials.localappsSelect')
        </li>

    </ul>

    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#"><i class="icon-bell"></i><span class="badge badge-pill badge-info">0</span></a>
        </li>
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#"><i class="icon-list"></i></a>
        </li>
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#"><i class="icon-location-pin"></i></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="{{ $logged_in_user->picture }}" class="img-avatar" alt="{{ $logged_in_user->email }}">
                <span class="d-md-down-none">{{ $logged_in_user->full_name }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right animated zoomInDown">
                <div class="dropdown-header" style="background:#20A8D8;color:#fff;padding:8px 0 3px 12px">
                    <h6>Admin</h6>
                </div>

                <a class="dropdown-item"
                   href="{{url('admin/dashboard/admintests13')}}">
                    <i class="fa fa-sticky-note-o fa-blue" aria-hidden="true"></i> Admin-Notes</a>

                    <a class="dropdown-item" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_admin"
                       href="javascript:">
                    <i class="fa fa-sticky-note-o fa-blue" aria-hidden="true"></i> Admin-Notes (Popup)</a>


                <a class="dropdown-item" href="javascript:swal('Todo List Admin','in Arbeit','warning')"><i class="fa fa-th-list fa-orange" aria-hidden="true"></i> Todo List
                    <span class="badge badge-primary">0</span></a>
                {{--------------------------------------------------------------------}}
                <div class="dropdown-header" style="background:#20A8D8;color:#fff;padding:8px 0 3px 12px">
                    <h6>DEV</h6>
                </div>

                <a class="dropdown-item" data-fancybox data-type="iframe"
                   data-src="{{config('app.url')}}/admin/dashboard/admintests10"
                   href="javascript:">
                    <i class="fa fa-cogs fa-green" aria-hidden="true"></i> Settings {!! $fa_popup !!}</a>

                <a class="dropdown-item" data-fancybox data-type="iframe"
                   data-src="{{config('app.url')}}/dashboard/pop_dev_links"
                   href="javascript:">
                <i class="fa fa-link fa-red" aria-hidden="true"></i> Links {!! $fa_popup !!}</a>


                    <a class="dropdown-item"
                       href="{{url('admin/dashboard/admintests12')}}">
                    <i class="fa fa-sticky-note-o fa-blue" aria-hidden="true"></i> Superadmin-Notes </a>

                    <a class="dropdown-item" data-fancybox data-type="iframe"
                       data-src="{{config('app.url')}}/dashboard/pop_notes_superadmin"
                       href="javascript:">
                    <i class="fa fa-sticky-note-o fa-blue" aria-hidden="true"></i> Superadmin-Notes (Popup)</a>


                <a class="dropdown-item" href="#"><i class="fa fa-th-list fa-orange" aria-hidden="true"></i> Todo List<span class="badge badge-primary">0</span></a>

                <?php $this_ident = rand_str() ?>
                <a class="dropdown-item" href="javascript:flush_cache('{{$this_ident}}')"><i class="fa fa-th-list fa-orange" aria-hidden="true"></i> Cache::flush() <span style="margin-left:8px" id="{{$this_ident}}_conf"></span></a>


                {{--<a class="dropdown-item" href="#">I'm Superadmin</a>--}}
               {{-- <div style="padding:10px">I'm Superadmin
                    {!!
                                 get_checkbox_any_table(
                                    $table= 'diverses',
                                    $field = 'div_res',
                                    $id = 'is_dev',
                                    $id_field ='div_what',
                                    $with_comment=false,
                                    $tt_hint_key = 'is_dev',
                                    $label_text = '',
                                    $with_panel = false,
                                    $ax_response = true,
                                    $input_style= '',
                                    $label_style = 'margin-left:12px;font-weight:normal;',
                                    $with_tooltip = false,
                                    $tt_class = 'tip',
                                    $tt_width = '300px',
                                    $with_page_reload = false,
                                    $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
                                    $from_inside_loop = false, // lookup for current value if set to false
                                    $as_switch = false, //only checkbox or switch?
                                    $switch_size = 'no' //xs, sm, no, lg
                                 );
                                !!}

                </div>--}}
                {{--------------------------------------------------------------------}}

                <a style="background:#234;color:#aaa;font-weight:bold" class="dropdown-item" href="{{ route('frontend.auth.logout') }}"><i class="fa fa-lock"></i> {{ __('navs.general.logout') }}</a>
            </div>
        </li>
    </ul>

    <button class="navbar-toggler aside-menu-toggler" type="button">☰</button>
</header>
