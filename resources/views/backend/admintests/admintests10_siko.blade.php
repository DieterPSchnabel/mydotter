@extends('backend.layouts.app')
@section('title')
    <?php $this_filename ='admintests10'  ?>
    DEV-Links
@endsection
@section('page-header')
    <h4>DEV-Links</h4>
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


    {{--############################# Laravel Docs #######################################--}}
    <div class="row">
        <div class="col">

            {{--<div class="card">
                <div class="card-header h4">
                    internal Links
                </div>
                <div class="card-block">
                    <p>

                    </p>
                </div>
            </div>--}}



        <?php
            $t_key_base = 'devlinks_laravel_docs';
            $curr_name = 'Laravel Docs';
        ?>
        <div class="card">
                <?php
                    $t_key_header = $t_key_base.'_header';
                    $t_key_content = $t_key_base.'_content';
                    $t_key_editor_div = $t_key_base.'_inline_editor';
                    create_dv($t_key_header,$curr_name,true);
                    create_dv($t_key_content);

                ?>
                <div class="card-header h4">
                    {{--Laravel Docs--}}
                    <?php
                        echo get_dv($t_key_header);
                        echo get_edit_link_short_toggler($t_key_editor_div,'font-size:0.8em');
                    ?>
                    <div id="{{$t_key_editor_div}}" style="display:none;font-size:0.7em;padding-top:15px;background:#ffa">
                        <?php
                            echo edit_text_in_any_table(
                            $table='diverses',
                            $field='div_res',
                            $id = $t_key_header,
                            $id_field = 'div_what',
                            $with_break = false,
                            $lang = '',
                            $with_info = false,
                            $style='font-size:1.0em;width:160px',
                            $class = 'inline_txt_any_table',
                            $show_translation_opt = false,
                            $this_value = get_dv($t_key_header),
                            $from_inside_loop = false,
                            $with_page_reload = true
                        )
                        ?>
                    </div>
                </div>
                <div class="card-block">
                    <div class="float-right dev-longtxt">
                        <a style="margin: -17px 0 0 0" class="float-right" data-fancybox
                           data-type="iframe"
                           data-src="{{env('APP_URL')}}/dashboard/pop_notes_superadmin?key={{$t_key_content}}&title={{$t_key_header}}"
                           href="javascript:;">
                            Edit </a>
                    </div>
                    <p>{!! get_dv($t_key_content, 'div_res_long'); !!}</p>
                    <p style="display:none">
                        <a href="https://laravel.com/docs/5.5/configuration" target="_blank">Startseite</a><br>
                        <a href="https://laravel.com/api/5.5/index.html" target="_blank">Laravel API</a><br>
                        <a href="https://laravel.com/docs/5.5/collections" target="_blank">Collections & Helpers</a><br>
                        <a href="https://laravel.com/docs/5.5/eloquent-collections" target="_blank">Eloquent Collections</a><br>
                        <a href="https://laravel.com/docs/5.5/helpers" target="_blank">Helpers</a><br>
                        <a href="http://cheats.jesse-obrien.ca/" target="_blank">Laravel Cheatsheet</a><br>
                        <a href="https://summerblue.github.io/laravel5-cheatsheet/" target="_blank">Artisan Cheatsheet</a><br>
                        <a href="https://laravel.com/docs/5.5/eloquent" target="_blank">Eloquent: Getting Started</a><br>
                        <a href="https://quickadminpanel.com/blog/eloquent-relationships-the-ultimate-guide/" target="_blank">Eloquent: The Ultimate Guide</a><br>
                        <a href="https://laravel.com/docs/5.5/database#running-queries" target="_blank">Running Raw SQL Queries</a><br>
                        <a href="https://laravel.com/docs/5.5/urls" target="_blank">URL Generation</a><br>
                        <a href="https://laravel.com/docs/5.5/seeding" target="_blank">Database: Seeding</a><br>
                        <a href="https://redis.io/commands" target="_blank">Redis: Commands</a><br>

                        <a href="http://www.pearltrees.com/dieterschnabel/structured-documentation/id18619895" target="_blank">my Pearltrees</a><br>
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    Bootstrap 4
                </div>
                <div class="card-block">
                    <p>
                        <a href="https://getbootstrap.com/docs/4.0/getting-started/introduction/#important-globals" target="_blank">Startseite</a><br>
                        <a href="https://getbootstrap.com/docs/3.3/javascript/" target="_blank">Javascript</a><br>
                        <a href="https://v4-alpha.getbootstrap.com/components/buttons/" target="_blank">Buttons</a><br>
                        <a href="https://v4-alpha.getbootstrap.com/components/card/" target="_blank">Cards</a><br>
                        <a href="https://getbootstrap.com/docs/4.0/layout/grid/" target="_blank">Grid System</a><br>
                        <a href="https://css-tricks.com/snippets/css/a-guide-to-flexbox/#flexbox-background" target="_blank">Flexbox</a><br>

                        <a href="https://getbootstrap.com/docs/4.0/components/alerts/" target="_blank">Components</a><br>
                        <a href="https://getbootstrap.com/docs/4.0/components/modal/" target="_blank">Modal</a><br>
                        <a href="https://getbootstrap.com/docs/4.0/utilities/borders/" target="_blank">Utilities</a><br>
                        <a href="https://getbootstrap.com/docs/4.0/extend/icons/" target="_blank">Icons</a><br>
                        <a href="https://getbootstrap.com/docs/4.0/examples/" target="_blank">Examples</a><br>
                        <a href="https://startbootstrap.com/template-overviews/bare/" target="_blank">basic HTML Templates 1</a><br>
                        <a href="https://startbootstrap.com/template-categories/unstyled/" target="_blank">basic HTML Templates 2</a><br>
                        <a href="http://www.pearltrees.com/dieterschnabel/flex-box/id16288561" target="_blank">Flex - my Pearltrees</a><br>
                        <a href="http://demo.bootstraptor.com/bootstrap4/" target="_blank">Bootstrap 4 Upgrader</a><br>
                        <br>
                        <a href="http://getbootstrap.com/docs/3.3/" target="_blank">Bootstrap3 - Startseite</a><br>

                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    Sites
                </div>
                <div class="card-block">
                    <p>
                        <a href="https://quickadminpanel.com/" target="_blank">Quick Admin Panel</a><br>
                        <a href="https://quickadminpanel.com/blog/" target="_blank">Quick Admin Panel - Blog</a><br>
                        <a href="http://laraveldaily.com/blog/" target="_blank">Laravel Daily - Blog</a><br>
                        <a href="https://murze.be/originals" target="_blank">Spatie/Murze Newsletter</a><br>
                        <a href="https://laravel-news.com/" target="_blank">Laravel News</a><br>
                        <a href="https://laravel-news.com/archive" target="_blank">Laravel News - Archive</a><br>
                        <a href="https://www.sitepoint.com/tag/laravel/" target="_blank">Sitepoint - Archive</a><br>
                        <a href="http://www.pearltrees.com/dieterschnabel/courses/id18938763" target="_blank">Courses - my Pearltrees</a><br>
                        <a href="" target="_blank">-?-</a><br>
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    Vue
                </div>
                <div class="card-block">
                    <p>
                        <a href="https://vuejs.org/v2/guide/" target="_blank">Startseite Docs</a><br>
                        <a href="https://vuejs.org/v2/style-guide/" target="_blank">Styleguide</a><br>
                        <a href="https://vue-loader.vuejs.org/en/" target="_blank">vue loader</a><br>
                        <a href="https://router.vuejs.org/en/" target="_blank">vue-router</a><br>
                        <a href="https://vuex.vuejs.org/en/" target="_blank">Vuex</a><br>
                        <a href="https://forum.vuejs.org/" target="_blank">Vue Forum</a><br>
                        <a href="https://github.com/vuejs-templates" target="_blank">vuejs-templates download</a><br>
                        <a href="https://vuetifyjs.com/vuetify/quick-start" target="_blank">Vuetify Template/Components</a><br>
                        {{--<a href="" target="_blank">-?-</a><br>--}}
                        <a href="https://github.com/axios/axios" target="_blank">axios</a><br>
                        <a href="http://www.pearltrees.com/dieterschnabel/axios/id18529579" target="_blank">axios my pearltrees</a><br>
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    local Websites 1
                </div>
                <div class="card-block">
                    <p>
                        <a target="_blank" href="http://boilerplate-rappasoft-20-3a.dev:81/">boilerplate-rappasoft-20-3a</a><br>
                        <a target="_blank" href="http://boiler1.dev:81/">boiler1</a><br>
                        <a target="_blank" href="http://bootstrap4.dev:81">bootstrap4</a><br>
                        <a target="_blank" href="http://crocodic.dev:81/admin">crocodic</a><br>
                        <a target="_blank" href="http://crudbooster.dev:81/admin">crudbooster</a><br>
                        <a target="_blank" href="http://infyom4.dev:81">infyom4</a><br>
                        <a target="_blank" href="http://josh-2017-11.dev:81">josh-2017-11</a><br>
                        <a target="_blank" href="http://mybase.dev:81/">mybase</a><br>

                        <a target="_blank" href="http://qadmin-all.dev:81">qadmin-all</a><br>
                        <a target="_blank" href="http://qadmin-permission.dev:81/login">qadmin-permission</a><br>
                        <a target="_blank" href="http://qadmin-vue.dev:81">qadmin-vue</a><br>
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    local Websites 2
                </div>
                <div class="card-block">
                    <p>


                        <a target="_blank" href="http://voyager101.dev:81/">voyager101</a><br>

                        <a target="_blank" href="http://backpack-demo.dev:81/admin/dashboard">backpack-demo admin</a><br>
                        <a target="_blank" href="http://backpack-demo.dev:81/login">backpack-demo</a><br>


                        <a target="_blank" href="http://dropzone-laravel-image-upload.dev:81/">dropzone-laravel-image-upload</a><br>

                        <a target="_blank" href="http://laravel-crud.dev:81/">laravel-crud - defekt</a><br>
                        <a target="_blank" href="http://laravel-filemanager-example-5.4-master.dev:81">filemanager-example-5.4-master <br>mit import & export</a><br>
                        <a target="_blank" href="http://laravel-plain-infyom.dev:81/">laravel-plain-infyom</a><br>

                        <a target="_blank" href="http://rappasoft.dev:81/">rappasoft</a><br>



                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
    </div>{{--<div class="row">--}}

{{--############################# Online DEV-Tools #######################################--}}
    <div class="row">

        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    Online DEV-Tools
                </div>
                <div class="card-block">
                    <p>
                        <a href="http://www.colorzilla.com/gradient-editor/" target="_blank">Gradient Generator</a><br>
                        <a href="http://www.pearltrees.com/dieterschnabel/images-placeholder/id16345867" target="_blank">Image Placeholder (Pearltrees)</a><br>
                        <a href="http://www.midnightcowboycoder.com/" target="_blank">Convert Your Legacy SQL to Laravel Builder - Orator</a><br>
                        <a href="https://www.freeformatter.com/html-formatter.html" target="_blank">format validate convert...</a><br>
                        <a href="https://jsfiddle.net/" target="_blank">jsfiddle - create</a><br>
                        <a href="https://trello.com/b/I7TjiplA/trello-tutorial" target="_blank">Trello</a><br>
                        <a href="https://www.google.fr/search?q=video+to+animated+gif&oq=video+to+animated+gif&aqs=chrome..69i57j0l5.4951j0j8&sourceid=chrome&ie=UTF-8" target="_blank">Video to animated GIF</a><br>
                        <a href="https://html-cleaner.com/html-table-generator/" target="_blank">HTML Table Generator</a><br>
                        <a href="https://www.whois.net/" target="_blank">Who is?</a><br>
                        <a href="https://whatwebcando.today/" target="_blank">What Web Can Do Today</a><br>
                        <a href="https://mailtrap.io" target="_blank">mailtrap</a><br>
                        <a href="http://www.loremipsum.de/" target="_blank">Lorem Ipsum Generator</a><br>
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    Diverse
                </div>
                <div class="card-block">
                    <p>
                        <a href="http://fontawesome.io/icons/" target="_blank">Font Awesome</a><br>
                        <a href="http://simplelineicons.com/" target="_blank">simple line icons</a><br>
                        <a href="https://caniuse.com/" target="_blank">Can I use</a><br>
                        <a href="https://fancyapps.com/fancybox/3/docs/" target="_blank">Fancybox3</a><br>
                        <a href="https://www.tinymce.com/docs/configure/" target="_blank">TinyMC</a><br>
                        <a href="https://ckeditor.com/ckeditor-5-builds/" target="_blank">CKEditor</a><br>
                        <a href="https://summernote.org/" target="_blank">summernote</a><br>
                        <a href="http://www.pearltrees.com/dieterschnabel/cdns/id16288424" target="_blank">CDNs myPearltrees</a><br>
                        <a href="https://daneden.github.io/animate.css/" target="_blank">Animate.js</a><br>
                        <a href="https://daneden.github.io/animate.css/" target="_blank">Animate.js Git mit Übersicht</a><br>
                        <a href="https://github.com/google/code-prettify" target="_blank">Code Prettify - Google</a><br>
                        <a href="https://github.com/limonte/sweetalert2" target="_blank">Sweetalert2 Git</a><br>
                        <a href="https://sweetalert2.github.io/" target="_blank">Sweetalert2 Doc</a><br>
                        <a href="http://carbon.nesbot.com/docs/" target="_blank">Carbon Doc</a><br>
                        <a href="http://bgrins.github.io/spectrum/" target="_blank">Spectrum Color-Picker</a><br>

                        <a href="" target="_blank">-?-</a><br>
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    installed Plugins
                </div>
                <div class="card-block">
                    <p>

                        <a href="http://bgrins.github.io/spectrum" target="_blank">Spectrum Colorpicker</a><br>
                        <a href="http://www.elevateweb.co.uk/image-zoom/examples" target="_blank">elevateZoom</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                    </p>
                </div>
            </div>

        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    free Stock Images
                </div>
                <div class="card-block">
                    <p>
                        <a href="https://www.pexels.com/" target="_blank">Pexels</a><br>
                        <a href="https://unsplash.com/" target="_blank">Unsplash</a><br>
                        <a href="http://www.pearltrees.com/dieterschnabel/free-stock-images/id18948795" target="_blank">my Pearltrees</a><br>
                        {{--<a href="" target="_blank">-?-</a><br>--}}
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    Helpers
                </div>
                <div class="card-block">
                    <p>
                        <a href="https://laravel.com/docs/5.5/helpers" target="_blank">Laravel Helpers</a><br>
                        <a href="https://laravel.com/docs/5.5/collections" target="_blank">Collections & Helpers</a><br>
                        <a href="https://murze.be/common-string-functions" target="_blank">spatie/string Helpers</a><br>
                        <a href="https://github.com/spatie/string" target="_blank">spatie/string Helpers Git</a><br>
                        <a href="https://github.com/awssat/str-helper" target="_blank">awssat/str-helper</a><br>
                        <a href="https://github.com/dmitry-ivanov/laravel-helper-functions" target="_blank">illuminated/helper-functions</a><br>
                        <a href="https://github.com/browner12/helpers" target="_blank">browner12/helpers</a><br>
                        <a href="https://github.com/svenluijten/helpers" target="_blank">svenluijten/helpers</a><br>
                        <a href="https://github.com/letrunghieu/active" target="_blank">letrunghieu/active git</a><br>
                        <a href="https://www.hieule.info/tag/laravel-active" target="_blank">letrunghieu/active doc</a><br>
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    Translation
                </div>
                <div class="card-block">
                    <p>
                        <a href="https://github.com/nikaia/translation-sheet" target="_blank">nikaia/translation-sheet</a><br>

                        <a href="https://murze.be/making-eloquent-models-translatable" target="_blank">spatie/laravel-translatable</a><br>
                        <a href="https://murze.be/a-laravel-package-to-store-language-lines-in-the-database" target="_blank">spatie/laravel-translation-loader</a><br>
                        <a href="https://github.com/themsaid/laravel-langman" target="_blank">themsaid/laravel-langman</a><br>

                        <a href="https://github.com/themsaid/laravel-langman-gui" target="_blank">themsaid/laravel-langman-gui git</a><br>
                        <a href="https://laravel-news.com/laravel-language-manager" target="_blank">themsaid/laravel-langman-gui doc</a><br>


                        {{--<a href="" target="_blank">-?-</a><br>--}}

                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
    </div>{{--<div class="row">--}}


    {{--##############################  infyom ######################################--}}


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    Infyom
                </div>
                <div class="card-block">
                    <p>
                        <a href="http://labs.infyom.com/laravelgenerator/" target="_blank">Docs</a><br>
                        <a href="http://labs.infyom.com/laravelgenerator/docs/5.5/introduction" target="_blank">Introduction</a><br>

                        {{--<a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>--}}
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    Larapacks 1
                </div>
                <div class="card-block">
                    <p>
                        <a href="https://github.com/UniSharp/laravel-filemanager" target="_blank">Unisharp Filemanager Git</a><br>
                        <a href="https://unisharp.github.io/laravel-filemanager/installation" target="_blank">Unisharp Filemanager Doc</a><br>

                        <a href="https://github.com/Xethron/migrations-generator" target="_blank">Xethron/migrations-generator Git</a><br>
                        <a href="http://laraveldaily.com/review-3-tools-generate-laravel-migrations-existing-database/" target="_blank">Xethron/migrations-generator Doc</a><br>

                        <a href="https://github.com/davejamesmiller/laravel-breadcrumbs" target="_blank">laravel-breadcrumbs</a><br>

                        <a href="https://github.com/appstract/laravel-options" target="_blank">	appstract/laravel-options</a><br>

                        <a href="https://laravelcollective.com/" target="_blank">LaravelCollective/html</a><br>
                        <a href="" target="_blank">-?-</a><br>
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    Larapacks 2
                </div>
                <div class="card-block">
                    <p>
                        <a href="https://github.com/letrunghieu/active" target="_blank">letrunghieu/active git</a><br>
                        <a href="https://github.com/letrunghieu/active" target="_blank">letrunghieu/active doc</a><br>

                        <a href="https://github.com/jenssegers/date" target="_blank">jenssegers/date</a><br>

                        <a href="https://github.com/laracasts/PHP-Vars-To-Js-Transformer" target="_blank">laracasts/PHP-Vars-To-Js-Transformer</a><br>

                        <a href="https://github.com/nikaia/translation-sheet" target="_blank">nikaia/translation-sheet</a><br>

                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>


                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    Spatie-Larapacks
                </div>
                <div class="card-block">
                    <p>
                        <a href="https://murze.be/" target="_blank"><b>Spatie Blog</b></a><br>
                        <a href="https://github.com/spatie/laravel-backup" target="_blank">spatie/laravel-backup Git</a><br>
                        <a href="https://docs.spatie.be/laravel-backup/v5/introduction" target="_blank">spatie/laravel-backup Doc</a><br>

                        <a href="https://murze.be/easily-convert-images-with-glide" target="_blank">spatie/laravel-glide</a><br>

                        <a href="https://docs.spatie.be/laravel-html/v2/introduction" target="_blank">spatie/laravel-html</a><br>

                        <a href="https://github.com/marvinlabs/laravel-html-bootstrap-4" target="_blank">marvinlabs/laravel-html-bootstrap-4</a><br>

                        <a href="https://murze.be/a-package-to-check-all-links-in-a-laravel-app" target="_blank">spatie/laravel-link-checker</a><br>

                        <a href="https://murze.be/an-artisan-command-to-easily-test-mailables" target="_blank">spatie/laravel-mailable-test</a><br>

                        <a href="https://docs.spatie.be/laravel-medialibrary/v6/introduction" target="_blank">spatie/laravel-medialibrary</a><br>

                        <a href="https://murze.be/a-modern-package-to-generate-html-menus" target="_blank">spatie/laravel-menu</a><br>

                        <a href="https://murze.be/automatically-generate-a-sitemap-in-laravel" target="_blank">spatie/laravel-sitemap</a><br>

                        <a href="https://murze.be/a-php-7-laravel-package-to-create-slugs" target="_blank">spatie/laravel-sluggable</a><br>

                        <a href="https://murze.be/an-opinionated-tagging-package-for-laravel-apps" target="_blank">spatie/laravel-tags</a><br>

                        <a href="https://murze.be/a-package-to-add-roles-and-permissions-to-laravel" target="_blank">spatie/laravel-permission</a><br>

                        <a href="https://murze.be/common-string-functions" target="_blank">spatie/string Helpers</a><br>
                        <a href="https://github.com/spatie/string" target="_blank">spatie/string Helpers Git</a><br>

                        {{--<a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>--}}


                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    Artisan
                </div>
                <div class="card-block">
                    <p>
                        <a href="https://github.com/svenluijten/artisan-view" target="_blank">svenluijten/artisan-view</a><br>

                        <a href="https://murze.be/quickly-dd-anything-from-the-commandline" target="_blank">spatie/laravel-artisan-dd</a><br>

                        <a href="https://github.com/spatie/laravel-db-snapshots" target="_blank">	spatie/laravel-db-snapshots</a><br>

                        <a href="https://docs.spatie.be/laravel-backup/v5/introduction" target="_blank">spatie/laravel-backup</a><br>

                        <a href="https://murze.be/an-artisan-command-to-easily-test-mailables" target="_blank">spatie/laravel-mailable-test</a><br>

                        <a href="https://laravel-news.com/improved-model-generation-with-laracademy-generators" target="_blank">laracademy/generators</a><br>
                        <a href="https://laravel-news.com/interactive-make-command" target="_blank">laracademy/interactive-make</a><br>
                        <a href="https://github.com/themsaid/laravel-langman" target="_blank">themsaid/laravel-langman - installed?</a><br>
                        <a href="https://github.com/marabesi/laration" target="_blank">marabesi/laration</a><br>
                        <a href="https://quickadminpanel.com/blog/list-of-16-artisan-make-commands-with-parameters/" target="_blank">16 Artisan make Command with Parameters</a><br>

                        {{--<a href="" target="_blank">-?-</a><br>--}}
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    Blade
                </div>
                <div class="card-block">
                    <p>
                        <a href="https://murze.be/a-blade-directive-to-export-php-variables-to-javascript" target="_blank">spatie/laravel-blade-javascript</a><br>

                        <a href="https://github.com/spatie/laravel-partialcache" target="_blank">spatie/laravel-partialcache</a><br>

                        <a href="https://github.com/appstract/laravel-blade-directives" target="_blank">appstract/laravel-blade-directives</a><br>
                        <a href="https://github.com/jhoff/blade-vue-directive" target="_blank">jhoff/blade-vue-directive</a><br>
                        <a href="https://github.com/svenluijten/artisan-view" target="_blank">svenluijten/artisan-view</a><br>
                        {{--<a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>--}}
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>

        {{-------------------------------------------------------}}
    </div>{{--<div class="row">--}}

    {{--############################# Cheatsheets ##########################################--}}

    <div class="row">

    <div class="col">
        <div class="card">
            <div class="card-header h4">
                Cheatsheets
            </div>
            <div class="card-block">
                <p>
                    <a href="https://bootstrapcreative.com/resources/bootstrap-4-css-classes-index/" target="_blank">Bootstrap 4 Cheat Sheet & Classes List Reference</a><br>
                    <a href="https://www.quackit.com/bootstrap/bootstrap_4/tutorial/" target="_blank">Bootstrap 4 Tutorial</a><br>
                    <a href="https://hackerthemes.com/bootstrap-cheatsheet/" target="_blank">Bootstrap 4 Cheat Sheet 1</a><br>
                    <a href="https://www.creative-tim.com/bootstrap-cheat-sheet" target="_blank">Bootstrap 4 CheatSheet
                     2</a><br>
                    <a href="https://bootstrapcreative.com/pattern/" target="_blank">Bootstrap Layout Examples and Code Snippets Library</a><br>
                    <a href="http://www.pearltrees.com/dieterschnabel/cheatsheets/id18529672" target="_blank">PHP Storm</a><br>
                    <a href="https://gist.github.com/hofmannsven/b219051467f86f2ac469" target="_blank">SCSS</a><br>
                    <a href="https://devhints.io/sass" target="_blank">SASS</a><br>
                    <a href="http://ndpsoftware.com/git-cheatsheet.html#loc=workspace;" target="_blank">GIT</a><br>
                    <a href="https://hellolaravel.org/cheatsheet/vue/" target="_blank">Vue</a><br>
                    <a href="https://hellolaravel.org/cheatsheet/vuex/" target="_blank">Vuex</a><br>
                    <a href="http://cheats.jesse-obrien.ca/" target="_blank">Laravel Cheatsheet</a><br>
                    <a href="https://summerblue.github.io/laravel5-cheatsheet/" target="_blank">Artisan Cheatsheet</a><br>
                    {{--<a href="" target="_blank">-?-</a><br>--}}

                </p>
            </div>
        </div>{{--<div class="card">--}}
    </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    Courses
                </div>
                <div class="card-block">
                    <p>
                        <a href="http://www.pearltrees.com/dieterschnabel/courses/id18938763" target="_blank">my pearltrees</a><br>
                        {{--<a href="" target="_blank">-?-</a><br>--}}


                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}


        <div class="col">

            <div class="card">
                <div class="card-header h4">
                    Admin Templates
                </div>
                <div class="card-block">
                    <p>
                        <a href="https://github.com/rappasoft/laravel-5-boilerplate/wiki" target="_blank">Rappasoft</a><br>
                        <a href="http://coreui.io/" target="_blank">CoreUI</a><br>
                        <a href="https://genesisui.com/vuejs-admin-template.html?id=prime" target="_blank">Genesis UI - Vue u.A.</a><br>
                        <a href="https://vuetifyjs.com/vuetify/quick-start" target="_blank">Vuetify</a><br>
                        <a href="http://www.pearltrees.com/dieterschnabel/bootstrap4-templates/id19062308" target="_blank">Bootstrap4 Vue - my pearltrees</a><br>

                        <a href="https://mdbootstrap.com/javascript/modals/" target="_blank">MDB Bootstrap4</a><br>
                        <a href="http://carbon.smartisan.io" target="_blank">Carbon</a><br>
                        <a href="https://modularcode.io/modular-admin-html/static-tables.html" target="_blank">Modular Admin 1 BS4</a><br>
                        <a href="https://modular-admin-html.modularcode.io/" target="_blank">Modular Admin 2 BS4</a><br>

                        <a href="http://themicon.co/theme/dasha/v1.2/html5jquery/sweetalert.html" target="_blank">Dasha</a><br>
                        <a href="https://bootstrap-vue.js.org/" target="_blank">Bootstrap + Vue</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="http://www.pearltrees.com/dieterschnabel/admin-templates/id18650350" target="_blank">my Pearltrees</a><br>
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <p>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <p>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <p>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
    </div>{{--<div class="row">--}}

    {{--##########################  COLORS 1 #############################################--}}

 <div class="row">

     <div class="col-3">
         <div class="card">
             <div class="card-header h4">
                 Color Definition
             </div>
             <div class="card-block">
                 <pre>
$white:     #fff;
$gray-100:  #f0f3f5;
$gray-200:  #c2cfd6;
$gray-300:  #a4b7c1;
$gray-400:  #869fac;
$gray-500:  #678898;
$gray-600:  #536c79;
$gray-700:  #3e515b;
$gray-800:  #29363d;
$gray-900:  #151b1e;
$black:     #000 !default;

$blue:      #20a8d8;
$indigo:    #6610f2 !default;
$purple:    #6f42c1 !default;
$pink:      #e83e8c !default;
$red:       #f86c6b;
$orange:    #f8cb00;
$yellow:    #ffc107 !default;
$green:     #4dbd74;
$teal:      #20c997 !default;
$cyan:      #63c2de;

                 </pre>
             </div>
         </div>{{--<div class="card">--}}
     </div>

     {{-------------------------------------------------------}}

     <div class="col-2">
         <div class="card">
             <div class="card-header h4">
                 System Colors:
             </div>
             <div class="card-block">
                    <pre>
$colors: (
  blue:      $blue,
  indigo:    $indigo,
  purple:    $purple,
  pink:      $pink,
  red:       $red,
  orange:    $orange,
  yellow:    $yellow,
  green:     $green,
  teal:      $teal,
  cyan:      $cyan,
  white:     $white,
  gray:      $gray-600,
  gray-dark: $gray-800
);
                    </pre>
             </div>
         </div>{{--<div class="card">--}}
     </div>
     {{-------------------------------------------------------}}
     <div class="col-2">
         <div class="card">
             <div class="card-header h4">
                 Theme Colors
             </div>
             <div class="card-block">
                    <pre>
$theme-colors: (
  primary:    $blue,
  secondary:  $gray-300,
  success:    $green,
  info:       $cyan,
  warning:    $yellow,
  danger:     $red,
  light:      $gray-100,
  dark:       $gray-800
);
                    </pre>
             </div>
         </div>{{--<div class="card">--}}
     </div>
     {{-------------------------------------------------------}}
     <div class="col-5">
         <div class="card">
             <div class="card-header h4">
                 nix
             </div>
             <div class="card-block">
                 <p>
                 <div class="color_display_sm" style="background:blue"></div> blue / primary

                 </p>
             </div>
         </div>{{--<div class="card">--}}
     </div>
     {{-------------------------------------------------------}}


     {{--<div class="col">
         <div class="card">
             <div class="card-header h4">
                 nix
             </div>
             <div class="card-block">
                 <p>
                     <a href="" target="_blank">-?-</a><br>
                     <a href="" target="_blank">-?-</a><br>
                     <a href="" target="_blank">-?-</a><br>
                     <a href="" target="_blank">-?-</a><br>
                     <a href="" target="_blank">-?-</a><br>
                     <a href="" target="_blank">-?-</a><br>
                     <a href="" target="_blank">-?-</a><br>
                     <a href="" target="_blank">-?-</a><br>
                     <a href="" target="_blank">-?-</a><br>
                     <a href="" target="_blank">-?-</a><br>
                 </p>
             </div>
         </div>--}}{{--<div class="card">--}}{{--
     </div>--}}
     {{-------------------------------------------------------}}
     {{--<div class="col">
         <div class="card">
             <div class="card-header h4">
                 nix
             </div>
             <div class="card-block">
                 <p>
                     <a href="" target="_blank">-?-</a><br>
                     <a href="" target="_blank">-?-</a><br>
                     <a href="" target="_blank">-?-</a><br>
                     <a href="" target="_blank">-?-</a><br>
                     <a href="" target="_blank">-?-</a><br>
                     <a href="" target="_blank">-?-</a><br>
                     <a href="" target="_blank">-?-</a><br>
                     <a href="" target="_blank">-?-</a><br>
                     <a href="" target="_blank">-?-</a><br>
                     <a href="" target="_blank">-?-</a><br>
                 </p>
             </div>
         </div>--}}{{--<div class="card">--}}{{--
     </div>--}}
     {{-------------------------------------------------------}}
 </div> {{--/row--}}

    {{--############################## COLORS 2 #########################################--}}

    <div class="row">

        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <p>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <p>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <p>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <p>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <p>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}
        <div class="col">
            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <p>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                        <a href="" target="_blank">-?-</a><br>
                    </p>
                </div>
            </div>{{--<div class="card">--}}
        </div>
        {{-------------------------------------------------------}}

    </div>

@endsection
