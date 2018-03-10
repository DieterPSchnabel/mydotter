<!DOCTYPE html>
@langrtl
    <html lang="{{ app()->getLocale() }}" dir="rtl">
@else
    <html lang="{{ app()->getLocale() }}">
@endlangrtl
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<meta name="_token" content="{{ csrf_token() }}"/>--}}
    <title>@yield('title', app_name())</title>

    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">

    @yield('meta')

    {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
    @stack('before-styles')

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    {{ style(mix('css/backend.css')) }}
    {{--<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">--}}
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote-bs4.css" rel="stylesheet">--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
    <link media="all" type="text/css" rel="stylesheet" href="/css/mycustom.css">

    @stack('after-styles')
    {{--{!! script(mix('js/backend.js')) !!}--}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.6.6/tinymce.min.js"></script>
    {{--<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>--}}
    {{--<script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>--}}
</head>

<body class="{{ config('backend.body_classes') }}">
<span id="oben1"></span>
    @include('backend.includes.header')

    <div class="app-body">
        @include('backend.includes.sidebar')

        <main class="main">
            @include('includes.partials.logged-in-as')
            {!! Breadcrumbs::render() !!}

            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="content-header">
                        @yield('page-header')
                    </div><!--content-header-->

                    @include('includes.partials.messages')
                    @yield('content')
                </div><!--animated-->
            </div><!--container-fluid-->
        </main><!--main-->

        @include('backend.includes.aside')
    </div><!--app-body-->

    @include('backend.includes.footer')

    <!-- Scripts -->
    @stack('before-scripts')
    {!! script(mix('js/backend.js')) !!}
    {!! script(mix('js/backend2.js')) !!}
    {{-- immer als letztes!--}}
<script src="{{ config('app.url') }}/js/custom/custom.js"></script>

    @stack('after-scripts')

    {{-- in backend2.js <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>--}}

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote-bs4.js"></script>--}}



    {!! Toastr::message() !!}

{{--<script>
    if($('#summernote')) $('#summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 150,
        dialogsInBody: true,
        dialogsFade: true,
        disableDragAndDrop: false
        /*codemirror: { // codemirror options
            theme: 'monokai'
        }*/
    });
</script>--}}


{{--file: '../2.1/elfinder_tinymce.html',--}}
{{--file: ' //route('elfinder.tinymce4') '--}}
{{--file: ' //resource_path().'\views\vendor\elfinder\tinymce4.php' ',--}}

<script type="text/javascript">
    function elFinderBrowser (callback, value, meta) {
        tinymce.activeEditor.windowManager.open({
            file: '<?= route('elfinder.tinymce4') ?>', // use an absolute path!
            title: 'elFinder 2.1',
            width: 900,
            height: 450,
            resizable: true
        }, {
            oninsert: function (file, fm) {
                var url, reg, info;

                // URL normalization
                url = file.url;
                reg = /\/[^/]+?\/\.\.\//;
                while(url.match(reg)) {
                    url = url.replace(reg, '/');
                }

                // Make file info
                info = file.name + ' (' + fm.formatSize(file.size) + ')';

                // Provide file and text for the link dialog
                if (meta.filetype == 'file') {
                    callback(url, {text: info, title: info});
                }

                // Provide image and alt text for the image dialog
                if (meta.filetype == 'image') {
                    callback(url, {alt: info});
                }

                // Provide alternative source and posted for the media dialog
                if (meta.filetype == 'media') {
                    callback(url);
                }
            }
        });
        return false;
    }
    // TinyMCE init
    tinymce.init({
        selector: "#mytextarea",
        height : 150,
        plugins: "image, link, media, code, fullscreen, charmap, textcolor, visualblocks",
        relative_urls: false,
        remove_script_host: false,
        toolbar: "undo redo | forecolor backcolor | styleselect | link image media | charmap code fullscreen visualblocks",
        file_picker_callback : elFinderBrowser
    });
</script>




    @include('backend.includes.partials.go-top')
    <span id="page_bott"></span>
</body>
</html>
