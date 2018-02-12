<div class="dropdown-menu dropdown-menu-right animated slideInDown" aria-labelledby="navbarDropdownTestsLink">

    <a class="dropdown-item" href="{{url('admin/dashboard/larapacks')}}">Larapacks</a>
    <a class="dropdown-item" target="_blank" href="{{url('admin/dashboard/installed_as_per_decomposer')}}">updated installed Larapacks</a>

    <a class="dropdown-item" target="_blank" href="../../dev/php_info.php">PHP Info</a>
    <a class="dropdown-item" target="_blank" href="{{url('admin/routes')}}">Routes</a>
    <a class="dropdown-item" target="_blank" href="{{url('admin/decompose')}}">Decomposer</a>
    <a class="dropdown-item" target="_blank" href="{{url('enveditor')}}">.env Editor</a>
    <a class="dropdown-item" target="_blank" href="{{url('admin/dashboard/config')}}">Config Manager</a>
    <a class="dropdown-item" target="_blank" href="https://mailtrap.io/inboxes">MailTrap Inbox</a>
    {{--<hr class="dropdown-item">--}}

    {{--@for ($i = 1; $i < 11; $i++)
            <a class="dropdown-item" href="{{url('admin/dashboard/admintests')}}{{$i}}">admintest{{$i}}</a>
    @endfor--}}

    {!!  my_active_link(
    $route = 'admin/dashboard/admintests1',
    $class = 'dropdown-item',
    $title = 'lightbox - deinstalliert! at1',
    $subtitle = '',
    $target='')
    !!}
    {!!  my_active_link(
    $route = 'admin/dashboard/admintests2',
    $class = 'dropdown-item',
    $title = 'path() - colors<br>Awesome Bootstrap Checkbox at2',
    $subtitle = '',
    $target='')
    !!}

    {!!  my_active_link(
    $route = 'admin/dashboard/admintests3',
    $class = 'dropdown-item',
    $title = 'fancybox',
    $subtitle = 'Unisharp Filemanager at3')
    !!}

    {!!  my_active_link(
    $route = 'admin/dashboard/admintests4',
    $class = 'dropdown-item',
    $title = 'fancybox<br>Tooltips at4',
    $subtitle = '',
    $target='')
    !!}

    {!!  my_active_link(
    $route = 'admin/dashboard/admintests5',
    $class = 'dropdown-item',
    $title = 'fancybox<br>Languages at5',
    $subtitle = '',
    $target='')
    !!}
    {!!  my_active_link(
    $route = 'admin/dashboard/admintests6',
    $class = 'dropdown-item',
    $title = 'translations - any table at6',
    $subtitle = '',
    $target='')
    !!}
    {!!  my_active_link(
    $route = 'admin/dashboard/admintests7',
    $class = 'dropdown-item',
    $title = 'Diverses at7',
    $subtitle = '',
    $target='')
    !!}

    {!!  my_active_link(
    $route = 'admin/dashboard/admintests8',
    $class = 'dropdown-item',
    $title = 'Konfig Assi at8',
    $subtitle = '',
    $target='')
    !!}

    {!!  my_active_link(
    $route = 'admin/dashboard/admintests9',
    $class = 'dropdown-item',
    $title = 'Picker at9',
    $subtitle = '',
    $target='')
    !!}

    {!!  my_active_link(
    $route = 'admin/dashboard/admintests10',
    $class = 'dropdown-item',
    $title = 'DEV-Links at10',
    $subtitle = '',
    $target='')
    !!}

</div>
