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
<?php
$language = array(
    'AFRIKAANS' => 'af',
    'ALBANIAN' => 'sq',
    'AMHARIC' => 'am',
    'ARABIC' => 'ar',
    'ARMENIAN' => 'hy',
    'AZERBAIJANI' => 'az',
    'BASQUE' => 'eu',
    'BELARUSIAN' => 'be',
    'BENGALI' => 'bn',
    'BIHARI' => 'bh',
    'BRETON' => 'br',
    'BULGARIAN' => 'bg',
    'BURMESE' => 'my',
    'CATALAN' => 'ca',
    'CHEROKEE' => 'chr',
    'CHINESE' => 'zh',
    'CHINESE_SIMPLIFIED' => 'zh-CN',
    'CHINESE_TRADITIONAL' => 'zh-TW',
    'CORSICAN' => 'co',
    'CROATIAN' => 'hr',
    'CZECH' => 'cs',
    'DANISH' => 'da',
    'DHIVEHI' => 'dv',
    'DUTCH' => 'nl',
    'ENGLISH' => 'en',
    'ESPERANTO' => 'eo',
    'ESTONIAN' => 'et',
    'FAROESE' => 'fo',
    'FILIPINO' => 'tl',
    'FINNISH' => 'fi',
    'FRENCH' => 'fr',
    'FRISIAN' => 'fy',
    'GALICIAN' => 'gl',
    'GEORGIAN' => 'ka',
    'GERMAN' => 'de',
    'GREEK' => 'el',
    'GUJARATI' => 'gu',
    'HAITIAN_CREOLE' => 'ht',
    'HEBREW' => 'iw',
    'HINDI' => 'hi',
    'HUNGARIAN' => 'hu',
    'ICELANDIC' => 'is',
    'INDONESIAN' => 'id',
    'INUKTITUT' => 'iu',
    'IRISH' => 'ga',
    'ITALIAN' => 'it',
    'JAPANESE' => 'ja',
    'JAVANESE' => 'jw',
    'KANNADA' => 'kn',
    'KAZAKH' => 'kk',
    'KHMER' => 'km',
    'KOREAN' => 'ko',
    'KURDISH' => 'ku',
    'KYRGYZ' => 'ky',
    'LAO' => 'lo',
    'LATIN' => 'la',
    'LATVIAN' => 'lv',
    'LITHUANIAN' => 'lt',
    'LUXEMBOURGISH' => 'lb',
    'MACEDONIAN' => 'mk',
    'MALAY' => 'ms',
    'MALAYALAM' => 'ml',
    'MALTESE' => 'mt',
    'MAORI' => 'mi',
    'MARATHI' => 'mr',
    'MONGOLIAN' => 'mn',
    'NEPALI' => 'ne',
    'NORWEGIAN' => 'no',
    'OCCITAN' => 'oc',
    'ORIYA' => 'or',
    'PASHTO' => 'ps',
    'PERSIAN' => 'fa',
    'POLISH' => 'pl',
    'PORTUGUESE' => 'pt',
    'PORTUGUESE_PORTUGAL' => 'pt-PT',
    'PUNJABI' => 'pa',
    'QUECHUA' => 'qu',
    'ROMANIAN' => 'ro',
    'RUSSIAN' => 'ru',
    'SANSKRIT' => 'sa',
    'SCOTS_GAELIC' => 'gd',
    'SERBIAN' => 'sr',
    'SINDHI' => 'sd',
    'SINHALESE' => 'si',
    'SLOVAK' => 'sk',
    'SLOVENIAN' => 'sl',
    'SPANISH' => 'es',
    'SUNDANESE' => 'su',
    'SWAHILI' => 'sw',
    'SWEDISH' => 'sv',
    'SYRIAC' => 'syr',
    'TAJIK' => 'tg',
    'TAMIL' => 'ta',
    'TATAR' => 'tt',
    'TELUGU' => 'te',
    'THAI' => 'th',
    'TIBETAN' => 'bo',
    'TONGA' => 'to',
    'TURKISH' => 'tr',
    'UKRAINIAN' => 'uk',
    'URDU' => 'ur',
    'UZBEK' => 'uz',
    'UIGHUR' => 'ug',
    'VIETNAMESE' => 'vi',
    'WELSH' => 'cy',
    'YIDDISH' => 'yi',
    'YORUBA' => 'yo'
);
?>

@section('content')
    @include('backend.includes.partials.dev-nav')
    @if(is_dev())
        <div style="font-weight:normal;font-size:1.0em;color:#999;margin:-4px 0 2px 6px">{{$this_filename}}</div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Translations</h3>
                </div>
                <div class="card-block">
                    <h4 class="card-title">auto Translations 1</h4>
                    <p class="card-text">
                        <?php
                        //function translate_this($translate_string,$lang_code_target,$lang_code_source='de')
                        $translate_string = 'Mein Auto ist blau.';

                        $translate_string = get_dv('is_dev_nix', $field = 'div_res_long_de');



                        $lang_code_target = 'en';
                        //ec( translate_this($translate_string,$lang_code_target,$lang_code_source='de')  );
                        $x = translate_this($translate_string, $lang_code_target, $lang_code_source = 'de');
                        //dd($x);
                        set_dv('is_dev_nix', $x, 'div_res_long_en');

                        $source_lang_code = 'de';
                        $src_text = 'Ich bin der Developer.';

                        $languages = get_languages();
                        foreach ($languages as $lang) {
                            if ($lang->code <> $source_lang_code) {
                                $target_lang_code = $lang->code;
                                //dd($target_lang_code);
                                //return $target_lang_code;
                                //$target_lang_code = 'en';
                                //$this_field = str_replace('all',$target_lang_code,$field);
                                //$translation = translate_this($src_text,$target_lang_code,$source_lang_code);
                                /*$affected = DB::update("update $table set $this_field = '$translation', updated_at = NOW()  where $id_field = ?", [$id]);
                                $c_key = $table.'.'.$this_field.'.'.$id_field.'.'.$id;
                                cache_it($c_key,$translation);*/
                                //ec($translation);
                            }
                        }


                        ?>
                    </p>

                </div>

            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Translations</h3>
                </div>

                <div class="card-block">
                    <h4 class="card-title">auto Translations 1</h4>
                    <p>xx</p>
                    <?php

                    $field = 'div_res';
                    $id = 'is_dev';
                    $id_field = 'div_what';
                    $with_break = false;
                    $lang = 'all'; //oder all
                    $with_info = true;
                    $style = 'width:600px;padding-left:4px;margin-bottom:14px';
                    $class = 'inline_txt_any_table';
                    //dd($id);

                    ?>
                    {{--{!!
                    //dd($field);
                    edit_text_in_div($table='diverses',$field, $id,
                        $id_field='div_what',
                        $with_break = false,
                        $lang='all',
                        $with_info,
                        $style,
                        $class)
                    !!}--}}
                </div>
                <div class="card-block">
                    <?php

                    $field = 'div_res_long';
                    $id = 'is_dev';
                    $id_field = 'div_what';
                    $with_break = false;
                    $lang = 'all'; //oder all
                    $with_info = true;
                    $style = 'width:600px;padding-left:4px;margin-bottom:14px';
                    $class = 'inline_txt_any_table';
                    //dd($id);

                    ?>
                    {!!
                    //dd($field);
                    edit_text_in_div($table='diverses',$field, $id,
                        $id_field='div_what',
                        $with_break = false,
                        $lang='all',
                        $with_info,
                        $style,
                        $class)
                    !!}
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Translations</h3>
                </div>
                <div class="card-block">
                    <h4 class="card-title">auto Translations 1</h4>
                    <p class="card-text">xxx</p>
                </div>
                <div class="card-block">
                    xxxxxxxxxxx111
                </div>
            </div>
        </div>
    </div>

@endsection
