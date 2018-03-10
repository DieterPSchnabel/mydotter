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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Language Translation - Using Google API</title>
</head>

<body>
<h4><u>Google Translation API ver. 2</u></h4>
<form name="t_form" action="example.php" method="post">
    <div style="float:left">
        <textarea name="lang1" id="lang1" rows="10" cols="60"><?php echo @$_POST['lang1'] ?></textarea>
    </div>
    <div style="clear:both">&nbsp;</div>
    <table width="200" border="0">
        <tr>
            <td><label for="t_lang_1">From</label></td>
            <td>
                <select name="t_lang_1" id="t_lang_1">
                    <?php foreach ($language as $key => $val) {
                        if ($_POST['t_lang_1'] == $val) { ?>
                            <option value="<?php echo $val; ?>" selected="selected"><?php echo $key; ?></option>
                            <?php
                        } else { ?>
                            <option value="<?php echo $val; ?>"><?php echo $key; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="t_lang_2">To</label></td>
            <td>
                <select name="t_lang_2" id="t_lang_2">
                    <?php foreach ($language as $key => $val) {
                        if ($_POST['t_lang_2'] == $val) { ?>
                            <option value="<?php echo $val; ?>" selected="selected"><?php echo $key; ?></option>
                            <?php
                        } else { ?>
                            <option value="<?php echo $val; ?>"><?php echo $key; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" id="submit" value="Translate"/></td>
        </tr>
    </table>
    <div style="clear:both">&nbsp;</div>
</form>

<?php
if (isset($_POST['submit']) && isset($_POST['t_lang_1']) && isset($_POST['lang1']) && isset($_POST['t_lang_2'])) {
    require("GTranslateV2.php");
    $translate_string = $_POST['lang1'];
    $str1 = strtolower($_POST['t_lang_1']);
    $str2 = strtolower($_POST['t_lang_2']);
    try {
        $gt = new Gtranslate;
        $gt->setApiVersion(2);
        $gt->setApiKey('AIzaSyBkMohG-its-omt2axTUurwlZQR3BUMFr8'); /* Replace 'API KEY' with your personalized api key */
        $gt->setUrl('https://www.googleapis.com/language/translate/v2');
        $gt->setRequestType('curl');
        $a = $gt->translate($str1, $str2, $translate_string);
    } catch (GTranslateException $gt) {
        if ($a[0]->translatedText) {
            echo $a[0]->translatedText;
        } else
            echo 'Translation not possible for the selected language pair!';
    }
}
?>
<hr/>
<div style="clear:both">&nbsp;</div>
<textarea name="lang2" rows="10"
          cols="60"><?php if (isset ($a[0]->translatedText)) echo $a[0]->translatedText; else echo ''; ?></textarea>
</body>
</html>


