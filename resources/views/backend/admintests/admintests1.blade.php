@extends('backend.layouts.app')
@section('title')
    <?php $this_filename ='admintests1'  ?>
admintest1
@endsection

@section('page-header')
    <h1>admintests 1</h1>
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
    <div class="card">
        <div class="card-header">
            <span class="float-right dimmed04 ml-3" style="font-weight:normal;font-size:0.9em;color:#666">{{$this_filename}}</span>
            Lightbox for Bootstrap 4
        </div>
        <div class="card-block">
            <h4 class="card-title">Lightbox for Bootstrap 4</h4>
            <p class="card-text">files in: resources/assets/plugins/ashleydw_lightbox/dist  (Samples unter examples)</p>
            <a target="_blank" href="http://ashleydw.github.io/lightbox/" class="btn btn-primary btn-sm">Lightbox for Bootstrap 4</a>
        </div>

        <div class="card-block">
            <h4 class="card-title">Remote Cointent - in Iframe</h4>
            <p class="card-text">Given a URL, that is not an image or video (including unforced types), load the content using an iFrame.</p>
            <a href="http://getbootstrap.com" data-title="Bootstrap" data-width="1200" data-height="800" data-toggle="lightbox" data-gallery="remoteload">Bootstrap Docs</a>
        </div>
    </div>




    <div class="card">
        <div class="card-header">
            Lightbox for Bootstrap 4
        </div>
        <div class="card-block">
            <h3 id="data-remote">Via <code>data-remote</code></h3>
            <p>Neither of these are <code>&lt;a /&gt;</code> tags, so both rely on the <code>data-remote</code> attribute.</p>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row" data-code="example-7" style="height:240px">
                        <img src="https://unsplash.it/600.jpg?image=259" data-toggle="lightbox" data-remote="https://unsplash.it/1200/768.jpg?image=259" class="img-fluid col-6">
                        <img src="http://i1.ytimg.com/vi/b0jqPvpn3sY/mqdefault.jpg" data-toggle="lightbox" data-remote="https://www.youtube.com/embed/b0jqPvpn3sY" class="img-fluid col-6">
                    </div>
                </div>
            </div>

            <h3 id="force-type">Force type</h3>
            <p>If the images you are linking to have no extension, the lightbox cannot detect that is an image; therefore you need to tell the lightbox what <code>data-type</code> it is.</p>
            <p>Current allowed types are: <code>['image', 'youtube', 'vimeo', 'instagram', 'video', 'url']</code></p>
            <div data-code="example-8">
                <p><a href="https://unsplash.it/1200/768?image=260" data-title="Force image display" data-footer="The remote of this modal has no extension (https://unsplash.it/1200/768?image=260) but works because the type is forced." data-toggle="lightbox" data-type="image">Click here for an image, but with no extension.</a></p>
                <p><a href="https://unsplash.it/1200/768?image=261" data-footer="Without the type forced, the lightbox will remote load the content" data-toggle="lightbox">This link is missing the type attribute, and will iframe the image.</a></p>
                <p><a href="http://www.youtube.com/watch?v=b0jqPvpn3sY" data-toggle="lightbox" data-type="image">This link is linking to a YouTube video, but forcing an image.</a></p>
            </div>

            <h3 id="hidden-elements">Hidden elements</h3>
            <p>Facebook style, only show a few images but have a large gallery</p>
            <div class="row justify-content-center" data-code="example-9">
                <a href="https://unsplash.it/1200/768.jpg?image=263" data-toggle="lightbox" data-gallery="hidden-images" class="col-4">
                    <img src="https://unsplash.it/600.jpg?image=263" class="img-fluid">
                </a>
                <a href="https://unsplash.it/1200/768.jpg?image=264" data-toggle="lightbox" data-gallery="hidden-images" class="col-4">
                    <img src="https://unsplash.it/600.jpg?image=264" class="img-fluid">
                </a>
                <a href="https://unsplash.it/1200/768.jpg?image=265" data-toggle="lightbox" data-gallery="hidden-images" class="col-4">
                    <img src="https://unsplash.it/600.jpg?image=265" class="img-fluid">
                </a>
                <!-- elements not showing, use data-remote -->
                <div data-toggle="lightbox" data-gallery="hidden-images" data-remote="https://unsplash.it/1200/768.jpg?image=264" data-title="Hidden item 1"></div>
                <div data-toggle="lightbox" data-gallery="hidden-images" data-remote="https://www.youtube.com/embed/b0jqPvpn3sY" data-title="Hidden item 2"></div>
                <div data-toggle="lightbox" data-gallery="hidden-images" data-remote="https://unsplash.it/1200/768.jpg?image=265" data-title="Hidden item 3"></div>
                <div data-toggle="lightbox" data-gallery="hidden-images" data-remote="https://unsplash.it/1200/768.jpg?image=266" data-title="Hidden item 4"></div>
                <div data-toggle="lightbox" data-gallery="hidden-images" data-remote="https://unsplash.it/1200/768.jpg?image=267" data-title="Hidden item 5"></div>
            </div>

            <h3 id="remote-content">Remote content</h3>
            <p>Given a URL, that is not an image or video (including unforced types), load the content using an iFrame.</p>
            <div class="row justify-content-center">
                <div class="col-md-10" data-code="example-10">
                    <div class="row">
                        <p class="col-sm-3"><a href="http://getbootstrap.com" data-title="Bootstrap" data-width="1200" data-toggle="lightbox" data-gallery="remoteload">Bootstrap Docs</a></p>
                    </div>
                </div>
            </div>


            <h3 id="no-wrapping">Disable wrapping</h3>
            <p>To disable wrapping, set `wrapping` to false when creating a gallery.</p>
            <div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="row">
                            <a href="https://unsplash.it/1200/768.jpg?image=251" data-toggle="lightbox" data-gallery="example-gallery-11" class="col-sm-4">
                                <img src="https://unsplash.it/600.jpg?image=251" class="img-fluid">
                            </a>
                            <a href="https://unsplash.it/1200/768.jpg?image=252" data-toggle="lightbox" data-gallery="example-gallery-11" class="col-sm-4">
                                <img src="https://unsplash.it/600.jpg?image=252" class="img-fluid">
                            </a>
                            <a href="https://unsplash.it/1200/768.jpg?image=253" data-toggle="lightbox" data-gallery="example-gallery-11" class="col-sm-4">
                                <img src="https://unsplash.it/600.jpg?image=253" class="img-fluid">
                            </a>
                        </div>
                        <div class="row">
                            <a href="https://unsplash.it/1200/768.jpg?image=254" data-toggle="lightbox" data-gallery="example-gallery-11" class="col-sm-4">
                                <img src="https://unsplash.it/600.jpg?image=254" class="img-fluid">
                            </a>
                            <a href="https://unsplash.it/1200/768.jpg?image=255" data-toggle="lightbox" data-gallery="example-gallery-11" class="col-sm-4">
                                <img src="https://unsplash.it/600.jpg?image=255" class="img-fluid">
                            </a>
                            <a href="https://unsplash.it/1200/768.jpg?image=256" data-toggle="lightbox" data-gallery="example-gallery-11" class="col-sm-4">
                                <img src="https://unsplash.it/600.jpg?image=256" class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="card">
        <div class="card-header">
            anything in internal Lightbox
        </div>
        <div class="card-block">
            <h4 class="card-title">interne Lightbox</h4>
            <p class="card-text">We open some  content from local app in lightbox...</p>
            {{--<a class=" btn btn-link btn-xs dimmed04" type="button" title="Hinweis editieren" data-fancybox="" data-src="http://boiler1.dev:81/admin/dashboard/pop1?key=is_dev&amp;lang=all&amp;curr_lang" href="javascript:;">
                edit </a>--}}
            <a class="btn btn-secondary" role="button"
               data-remote="{{env('APP_URL')}}/admin/routes"
               data-title="" data-width="1600" data-height="800"
               data-toggle="lightbox" data-gallery="remoteload01"
               data-disable-external-check="(true)">routes</a>

            <a class="btn btn-secondary "
               data-remote="{{env('APP_URL')}}/admin/dashboard/larapacks"
               data-title="" data-width="1800" data-height="800"
               data-toggle="lightbox" data-gallery="remoteload01"
               data-disable-external-check="(true)">Larapacks</a>



        </div>
    </div>




    <div class="card">
        <div class="card-header">
            interne Lightbox
        </div>
        <div class="card-block">
            <h4 class="card-title">interne Lightbox</h4>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            {{--<a class=" btn btn-link btn-xs dimmed04" type="button" title="Hinweis editieren" data-fancybox="" data-src="http://boiler1.dev:81/admin/dashboard/pop1?key=is_dev&amp;lang=all&amp;curr_lang" href="javascript:;">
                edit </a>--}}
            <a class="btn btn-primary btn-sm"
               href="{{env('APP_URL')}}/dashboard/pop1?key=is_dev&amp;lang=all&amp;curr_lang"
               data-title="" data-width="1200" data-height="800"
               data-toggle="lightbox" data-gallery="remoteload">open pop1</a>

            <a class="btn btn-primary btn-sm"
               href="{{env('APP_URL')}}/dashboard/pop2?key=is_dev&amp;lang=all&amp;curr_lang"
               data-title="" data-width="1200" data-height="800"
               data-toggle="lightbox" data-gallery="remoteload">open pop2</a>

            <a class="btn btn-primary btn-sm"
               href="{{env('APP_URL')}}/dashboard/pop3?key=is_dev&amp;lang=all&amp;curr_lang"
               data-title="" data-width="1200" data-height="800"
               data-toggle="lightbox" data-gallery="remoteload">open pop3</a>


        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Featured
        </div>
        <div class="card-block">
            <h4 class="card-title">Special title treatment</h4>
            <p
            <ul>
                <li><a target="_blank" href="{{url('laravel-filemanager/demo')}}">Filemanager demo1</a></li>
                <li><a target="_blank" href="{{url('laravel-filemanager?type=Images&CKEditor=ce&CKEditorFuncNum=0&langCode=')}}{{App::getLocale()}}">Filemanger für Bilder mit Lang-Code</a></li>
                {{--<li><a href="{{url('laravel-filemanager?type=Files&CKEditor=ce&CKEditorFuncNum=0&langCode=')}}{{App::getLocale()}}">Filemanger für Files</a></li>--}}
                <li><a class="filemanager-fullscreen" href="{{url('laravel-filemanager?type=Images&CKEditor=ce&CKEditorFuncNum=0&langCode=')}}{{App::getLocale()}}">Filemanger für Bilder Moodal</a></li>
                <li><a class="filemanager-fullscreen" href="{{url('laravel-filemanager?type=Files&CKEditor=ce&CKEditorFuncNum=0&langCode=')}}{{App::getLocale()}}">Files-Manager Moodal</a></li>
                <li><a data-fancybox data-src="{{url('laravel-filemanager?type=Files&langCode=')}}{{App::getLocale()}}" href="javascript:;">Filemanger für Files FancyBox</a></li>
                <li><a data-fancybox data-src="{{url('laravel-filemanager?type=Images&CKEditor=ce&CKEditorFuncNum=0&langCode=')}}{{App::getLocale()}}" href="javascript:;">Filemanger für Bilder FancyBox</a></li>
            </ul>

            </p>
            <a href="#" class="btn btn-primary btn-sm">Go somewhere</a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Featured
        </div>
        <div class="card-block">
            <h4 class="card-title">Special title treatment</h4>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary btn-sm">Go somewhere</a>
        </div>
    </div>


@endsection
