@if ($breadcrumbs)
    {{--<span class="breadcrumb-item float-right">vorige Seite</span>--}}
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url()->previous()}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> vorige Seite </a></li>

        <li title="neues Fenster" target="_blank" class="breadcrumb-item"><a href="{{env('APP_URL')}}"><i class="fa fa-home" aria-hidden="true"></i> Frontpage</a></li>

        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @else
                <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
            @endif
        @endforeach

        @yield('breadcrumb-links')
    </ol>





@endif
