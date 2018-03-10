<div class="sidebar">

    <div class="dimmed04" style="color:#eee;margin:6px 0 0 16px">
        <?php
        echo get_checkbox_any_table(
            $table = 'diverses',
            $field = 'div_res',
            $id = 'dashboard_settings_sidebar_minimized',
            $id_field = 'div_what',
            $with_comment = false,
            $tt_hint_key = 'is_dev',
            $label_text = 'Sidebar minimal?',
            $with_panel = false,
            $ax_response = true,
            $input_style = '',
            $label_style = 'margin-right:6px;font-weight:normal;',
            $with_tooltip = false,
            $tt_class = 'tip zindex-max',
            $tt_width = '300px',
            $with_page_reload = true,
            $this_value = '',  // !!! only if $from_inside_loop = true fill with {$model->fieldname}
            $from_inside_loop = false, // lookup for current value if set to false
            $as_switch = true, //only checkbox or switch?
            $switch_size = 'xs' //xs, sm, no, lgz-index:100000 !important;
        );

        ?>
    </div>


    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                {{ __('menus.backend.sidebar.general') }}
            </li>

            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/dashboard')) }}" href="{{ route('admin.dashboard') }}"><i class="icon-speedometer"></i> {{ __('menus.backend.sidebar.dashboard') }}</a>
            </li>

            <li class="nav-title">
                {{ __('menus.backend.sidebar.system') }}
            </li>

            @if ($logged_in_user->isAdmin())
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/auth*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="icon-user"></i> {{ __('menus.backend.access.title') }}

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/user*')) }}" href="{{ route('admin.auth.user.index') }}">
                                {{ __('labels.backend.access.users.management') }}

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/role*')) }}" href="{{ route('admin.auth.role.index') }}">
                                {{ __('labels.backend.access.roles.management') }}
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="icon-list"></i> {{ __('menus.backend.log-viewer.main') }}
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer')) }}" href="{{ route('log-viewer::dashboard') }}">
                            {{ __('menus.backend.log-viewer.dashboard') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('log-viewer::logs.list') }}">
                            {{ __('menus.backend.log-viewer.logs') }}
                        </a>
                    </li>
                </ul>

            {{--<li class="{{ Request::is('llands*') ? 'active' : '' }}">
                <a href="{!! route('infy.llands.index') !!}"><i class="fa fa-edit"></i><span>Llands</span></a>
            </li>--}}
            {{--<li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('infy/llands*')) }}" href="{{ route('infy.llands.index') }}">
                    <i class="fa fa-edit"></i> <span>Llands</span>
                </a>
            </li>--}}
                @include('backend.includes.menu_items')

            </li>


        </ul>
    </nav>
</div><!--sidebar-->


