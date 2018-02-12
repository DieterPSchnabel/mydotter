<div class="dropdown-menu dropdown-menu-right animated slideInDown" aria-labelledby="navbarDropdownTestsLink">


    {{--<a class="dropdown-item {{ active_class(Active::checkUriPattern('admin/dashboard/admintests31')) }}"
       href="{{url('admin/dashboard/admintests31')}}">Tabellen and Index - at31</a>--}}



    {!!  my_active_link(
    $route = 'admin/dashboard/admintests32',
    $class = 'dropdown-item',
    $title = 'Quick-Info DEV <o>at32</o>',
    $subtitle = 'DEV-Übersicht - HowTo',
    $target='')
    !!}
    {!!  my_active_link(
    $route = 'admin/dashboard/admintests33',
    $class = 'dropdown-item',
    $title = 'all DEV-Notes <o>at33</o>',
    $subtitle = 'alle Notizen des DEV',
    $target='')
    !!}
    {!!  my_active_link(
    $route = 'admin/dashboard/admintests10',
    $class = 'dropdown-item',
    $title = 'DEV-Links <o>at10</o>',
    $subtitle = '',
    $target='')
    !!}

    {!!  my_active_link(
    $route = 'admin/dashboard/admintests31',
    $class = 'dropdown-item',
    $title = 'Tabellen and Index <o>at31</o>',
    $subtitle = 'alle Tabellen mit Feldern und Indices',
    $target='')
    !!}

    {!!  my_active_link(
    $route = 'admin/dashboard/admintests40',
    $class = 'dropdown-item',
    $title = 'Caching <o>at40</o>',
    $subtitle = 'Cache-Dauer, Cache löschen, prüfen Redis Keys',
    $target='')
    !!}

    {!!  my_active_link(
    $route = 'admin/dashboard/admintests36',
    $class = 'dropdown-item',
    $title = 'Settings & Konfig <o>at36</o>',
    $subtitle = '',
    $target='')
    !!}


    {!!  my_active_link(
    $route = 'admin/dashboard/admintests51',
    $class = 'dropdown-item',
    $title = 'myWidgets <o>at51</o>',
    $subtitle = '',
    $target='')
    !!}


    {!!  my_active_link(
    $route = 'admin/dashboard/admintests50',
    $class = 'dropdown-item',
    $title = 'Udemy Courses <o>at50</o>',
    $subtitle = '',
    $target='')
    !!}

    {!!  my_active_link(
$route = 'admin/dashboard/admintests49',
$class = 'dropdown-item',
$title = 'Laracast Courses <o>at49</o>',
$subtitle = '',
$target='')
!!}

    {!!  my_active_link(
$route = 'admin/dashboard/admintests48',
$class = 'dropdown-item',
$title = 'CodeCourse Courses <o>at48</o>',
$subtitle = '',
$target='')
!!}

    {!!  my_active_link(
$route = 'admin/dashboard/admintests47',
$class = 'dropdown-item',
$title = 'more Courses <o>at47</o>',
$subtitle = '',
$target='')
!!}

    {!!  my_active_link(
$route = 'admin/dashboard/admintests37',
$class = 'dropdown-item',
$title = 'Artisan Commands <o>at37</o>',
$subtitle = 'execute PHP Artisan Commands',
$target='')
!!}

    {{--
    <a class="dropdown-item" href="{{url('admin/dashboard/admintests52')}}">at52 - ?</a>
    <a class="dropdown-item" href="{{url('admin/dashboard/admintests53')}}">at53 - ?</a>
    <a class="dropdown-item" href="{{url('admin/dashboard/admintests54')}}">at54 - ?</a>
    <a class="dropdown-item" href="{{url('admin/dashboard/admintests55')}}">at55 - ?</a>
    --}}



</div>
