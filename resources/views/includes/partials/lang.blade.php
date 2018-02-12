<div class="dropdown-menu dropdown-menu-right animated slideInDown" aria-labelledby="navbarDropdownLanguageLink">
    {{--@foreach (array_keys(config('locale.languages')) as $lang)
        @if ($lang != app()->getLocale())
            <a href="{{ '/lang/'.$lang }}" class="dropdown-item">{{ __('menus.language-picker.langs.'.$lang) }}</a>
        @endif
    @endforeach--}}

    <?php
    $langs = get_languages();
    ?>
    @foreach ($langs as $lang)
        @if ($lang->code != App::getLocale())
            <a href="{{ '/lang/'.$lang->code }}" class="dropdown-item">
               {!! flag_icon($lang->code,$size='20') !!} {{ __('menus.language-picker.langs.'.$lang->code) }}</a>
        @endif
    @endforeach
</div>
