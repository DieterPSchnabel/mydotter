@extends('backend.layouts.app')
@section('title')
    <?php $this_filename ='admintests5'  ?>
    edit text
@endsection
@section('page-header')
    <h4>edit text in all languages</h4>
@endsection

@section('meta')
<!-- nixxxxxxxxxxxxx meta -->
@endsection


@section('before-styles-end')
    <!-- nixxxxxxxxxxxxx before-styles-end -->
@endsection


@section('content')
    <style>
        pre{
            font-size:1.1em;
            color:#009;
            background:#f9fff9;
            border:1px #ccc solid;
            padding:5px 10px
        }
    </style>
    @include('backend.includes.partials.dev-nav')
    @if(is_dev())
        <div style="font-weight:normal;font-size:1.0em;color:#999;margin:-4px 0 2px 6px">{{$this_filename}}</div>
    @endif
    {{--
    <div class="card">
        <div class="card-header h4">
            fancybox3
        </div>
        <div class="card-block">
            <p>
            </p>
        </div>
    </div>
    --}}
    <div class="row">
        <div class="col-6">

            <div class="card">
                <div class="card-header h4">
                    Languages Table
                    <span class="float-right dimmed04 ml-3" style="font-weight:normal;font-size:0.7em;color:#666">{{$this_filename}}</span>
                </div>
                <div class="card-block">
                    {{--<pre>nix</pre>--}}
                    <p>
                    <a type="button" class="btn btn-secondary" data-fancybox data-type="iframe"
                       data-src="{{url('admin/languages')}}"
                       href="javascript:;">
                        Languages in Popup (fancybox)</a>

                    <a type="button" class="btn btn-secondary" data-fancybox data-type="iframe"
                       data-src="{{url('admin/languages')}}"
                       href="javascript:;">
                        Languages in Popup (fancybox) nur die reine Tabelle??</a>
                    </p>
                </div>
            </div>{{--<div class="card">--}}

            <div class="card">
                <div class="card-header h4">
                    Edit Text in all languages
                </div>
                <div class="card-block">
                    <pre>parameter für pop1:
tab=table&fld=field&idf=id_field&id=id&is_l=1&lang=de/all&curr_lang=fr</pre>
                    <p>
                        <a type="button" class="btn btn-secondary" data-fancybox data-type="iframe"
                           data-src="{{ url('dashboard/pop1') }}?key=order_phone_text"
                           href="javascript:;">
                            Editor in Popup (fancybox)</a>

                        <a type="button" class="btn btn-secondary" target="_blank"
                           href="{{ url('dashboard/pop1') }}?key=order_phone_text">
                            Editor in neuem Tab</a>
                    </p>
                </div>
            </div>{{--<div class="card">--}}



            <div class="card">
                <div class="card-header h4">
                    locale - aktuelle Language
                </div>
                <div class="card-block">
<pre>
echo 'aktuell: '.config('app.locale_php'). ' --- 1. config locale_php';
echo App::getLocale(). '  --- 2. App::getLocale() ';
//echo $_ENV['APP_LOCALE_PHP']. '   --- 3. ENV locale_php ';
APP_LOCALE = de
APP_FALLBACK_LOCALE = en
            </pre>
                    <p style="font-size:1.2em">
                    <?php
                    echo 'aktuell: '.config('app.locale_php'). ' --- 1. config locale_php <br>';
                    echo '<b style="color:blue">'.session()->get('locale'). '</b>  --- 2. session locale  <br>';
                    echo $_ENV['APP_LOCALE_PHP']. '   --- 3. APP_LOCALE_PHP  <br>';
                    echo env("APP_LOCALE"). '   --- 4. .env APP_LOCALE <br>';
                    echo env("APP_FALLBACK_LOCALE"). '   --- 5. .env APP_FALLBACK_LOCALE <br>';


                    ?>
                </div>
            </div>{{--<div class="card">--}}


        </div>{{--<div class="col-6">--}}

        {{--#####################################################################################--}}

        <div class="col-6">

            <div class="card">
                <div class="card-header h4">
                    aktivierte Languages
                </div>
                <div class="card-block">
                    {{--<pre>nix</pre>--}}
                    <p>
                        <?php
                        $languages = get_languages();

                        foreach ($languages as $lang) {
                            echo $lang->code . ' ' . $lang->directory . '<br>';
                        }

                        ?>
                    </p>
                </div>
            </div>{{--<div class="card">--}}

            <div class="card">
                <div class="card-header h4">
                    all languages
                </div>
                <div class="card-block">
                    {{--<pre>nix</pre>--}}
                    <p>
                        <?php
                        $languages = get_languages_all($sorder='directory', $rf='asc', $anz=false);

                        foreach ($languages as $lang_all) {
                            echo $lang_all->code . ' ' . $lang_all->directory . ' ' . $lang_all->name . ' '. flag_icon($lang_all->code). '<br>';
                        }


                        ?>
                    </p>
                </div>
            </div>{{--<div class="card">--}}


        </div>{{--<div class="col-6">--}}

    </div>{{--<div class="row">--}}

    {{--#####################################################################################--}}
    <div class="row">
        <div class="col-12">


            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    {{--<pre>nix</pre>--}}
                    <p>
                    </p>
                </div>
            </div>{{--<div class="card">--}}

        </div>{{--<div class="col-12">--}}
    </div>{{--<div class="row">--}}



    {{--<div class="card">
        <div class="card-header h4">
            nix
        </div>
        <div class="card-block">
            <pre>nix</pre>
            <p>
            </p>
        </div>
    </div>--}}

@endsection
