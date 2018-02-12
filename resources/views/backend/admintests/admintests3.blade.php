@extends('backend.layouts.app')

@section('title')
    <?php $this_filename = 'admintests3'  ?>
    admintest3
@endsection

@section('page-header')
    <h4>admintest3</h4>
@endsection

@section('meta')
    <!-- nixxxxxxxxxxxxx meta -->
@endsection


@section('before-styles-end')
    <!-- nixxxxxxxxxxxxx before-styles-end -->
@endsection


@section('content')
    @include('backend.includes.partials.dev-nav')
    @if(is_dev())
        <div style="font-weight:normal;font-size:1.0em;color:#999;margin:-4px 0 2px 6px">{{$this_filename}}</div>
    @endif
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <span class="float-right dimmed04 ml-3"
                          style="font-weight:normal;font-size:0.9em;color:#666">{{$this_filename}}</span>
                    <a target="_blank" href="https://fancyapps.com/fancybox/3/docs/"
                       class="btn btn-primary btn-sm float-right">Documentation</a>
                    fancybox3
                </div>
                <div class="card-block">
                    <h4 class="card-title">fancybox3</h4>
                    <p class="card-text">files in: resources/assets/plugins/fancybox3 </p>
                </div>

                <div class="card-block">
                    <h4 class="card-title">Remote Content - in Iframe</h4>
                    <p class="card-text">Given a URL, that is not an image or video (including unforced types), load the
                        content using an iFrame.</p>
                    {{--<a href="http://getbootstrap.com" data-title="Bootstrap" data-width="1200" data-height="800" data-toggle="lightbox" data-gallery="remoteload">Bootstrap Docs</a>--}}
                    <a type="button" class="btn btn-secondary animated fadeInLeftBig" data-fancybox data-type="iframe"
                       data-src="http://getbootstrap.com" href="javascript:;">
                        Webpage
                    </a>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    fancybox3
                </div>
                <div class="card-block">
                    <h4 class="card-title">fancybox3</h4>
                    <p class="card-text">Local content in popups.</p>

                    <a type="button" class="btn btn-secondary" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop1?key=is_dev&amp;lang=all&amp;curr_lang"
                       href="javascript:;">
                        open pop1</a>

                    <a type="button" class="btn btn-secondary" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop2?key=is_dev&amp;lang=all&amp;curr_lang"
                       href="javascript:;">
                        open pop2</a>

                    <a type="button" class="btn btn-secondary" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop3?key=is_dev&amp;lang=all&amp;curr_lang"
                       href="javascript:;">
                        open pop3</a>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    fancybox3
                </div>
                <div class="card-block">
                    <h4 class="card-title">DEV Links</h4>
                    <p class="card-text">Local content in popups.</p>

                    {{--<a type="button" class="btn btn-secondary" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop_dev_links"
                       href="javascript:;">--}}
                    <a type="button" class="btn btn-secondary" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/admin/dashboard/admintests10"
                       href="javascript:;">

                        open DEV Links</a>

                    <br><br>

                    {{--<a class="fancybox fancybox.ajax" href="{{url('admin/languages')}}">--}}
                    <a type="button" class="btn btn-secondary" data-fancybox data-type="iframe"
                       data-src="{{url('admin/languages')}}"
                       href="javascript:;">

                        Languages in Fancybox</a>


                    {{--<a class="fancybox fancybox-effects-d fancybox.iframe" href="{{url('admin/languages')}}"><b>Iframe
                            Languages in Fancybox</b></a>--}}


                </div>
            </div>


        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <a target="_blank" href="https://unisharp.github.io/laravel-filemanager/installation"
                       class="btn btn-primary btn-sm float-right">Documentation</a>
                    Unisharp Filemanager
                </div>

                <div class="card-block">
                    <h4 class="card-title">Unisharp Filemanager</h4>

                </div>
                <div class="card-block">
                    <p class="card-text">Local content in popups.</p>

                    {{--<a type="button" class="btn btn-secondary" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/dashboard/pop1?key=is_dev&amp;lang=all&amp;curr_lang"
                       href="javascript:;">
                        Filemanager Demo in neuem Fenster</a>--}}

                    <a class="btn btn-secondary" target="_blank" href="{{url('laravel-filemanager/demo')}}">
                        Filemanager Demo mit Text-Editoren in neuem Fenster</a>

                    <a type="button" class="btn btn-secondary" data-fancybox data-type="iframe"
                       data-src="{{url('laravel-filemanager/demo')}}"
                       href="javascript:;">
                        Filemanager Demo mit Text-Editoren in Popup</a>

                    <div style="min-height:4px"></div>
                    <a type="button" class="btn btn-secondary" target="_blank"
                       href="{{env('APP_URL')}}/laravel-filemanager?type=Images&amp;langCode=de">
                        Filemanager in neuem Fenster (für Images)</a>

                    <a type="button" class="btn btn-secondary" target="_blank"
                       href="{{env('APP_URL')}}/laravel-filemanager?type=Files&amp;langCode=de">
                        Filemanager in neuem Fenster (für Files)</a>

                    <div style="min-height:4px"></div>
                    <a type="button" class="btn btn-secondary" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/laravel-filemanager?type=Image&amp;langCode=de"
                       href="javascript:;">
                        Filemanager in Popup (für Images)</a>

                    <a type="button" class="btn btn-secondary" data-fancybox data-type="iframe"
                       data-src="{{env('APP_URL')}}/laravel-filemanager?type=Files&amp;langCode=de"
                       href="javascript:;">
                        Filemanager in Popup (für Files)</a>
                </div>
                <div class="card-block" style="background:#ffe">
                    <p class="card-text">Todo: Filemanager in Popup (für Images) mit Fehler, während Filemanager in
                        Popup (für Files) funktioniert!?</p>
                    <p>Beides funktioniert in neuem Fenster.</p>
                </div>

            </div>


            {{--<div class="card">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-block">
                    <h4 class="card-title">Special title treatment</h4>
                    <p
                    <ul>
                        <li><a target="_blank" href="{{url('laravel-filemanager/demo')}}">Filemanager demo1</a></li>
                        <li><a target="_blank" href="{{url('laravel-filemanager?type=Images&CKEditor=ce&CKEditorFuncNum=0&langCode=')}}{{App::getLocale()}}">Filemanger für Bilder mit Lang-Code</a></li>
                        --}}{{--<li><a href="{{url('laravel-filemanager?type=Files&CKEditor=ce&CKEditorFuncNum=0&langCode=')}}{{App::getLocale()}}">Filemanger für Files</a></li>--}}{{--
                        <li><a class="filemanager-fullscreen" href="{{url('laravel-filemanager?type=Images&CKEditor=ce&CKEditorFuncNum=0&langCode=')}}{{App::getLocale()}}">Filemanger für Bilder Moodal</a></li>
                        <li><a class="filemanager-fullscreen" href="{{url('laravel-filemanager?type=Files&CKEditor=ce&CKEditorFuncNum=0&langCode=')}}{{App::getLocale()}}">Files-Manager Moodal</a></li>
                        <li><a data-fancybox data-src="{{url('laravel-filemanager?type=Files&langCode=')}}{{App::getLocale()}}" href="javascript:;">Filemanger für Files FancyBox</a></li>
                        <li><a data-fancybox data-src="{{url('laravel-filemanager?type=Images&CKEditor=ce&CKEditorFuncNum=0&langCode=')}}{{App::getLocale()}}" href="javascript:;">Filemanger für Bilder FancyBox</a></li>
                    </ul>

                    </p>
                    <a href="#" class="btn btn-primary btn-sm">Go somewhere</a>
                </div>
            </div>
        --}}
        </div>
    </div>
@endsection
