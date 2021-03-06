<?php
function array_sort($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
            break;
            case SORT_DESC:
                arsort($sortable_array);
            break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[] = $array[$k];
        }
    }

    return $new_array;
}
function getExcerpt($str, $startPos=0, $maxLength=100) {
    if(strlen(strip_tags($str)) > $maxLength) {
        $excerpt   = substr(strip_tags($str), $startPos, $maxLength-3);
        $lastSpace = strrpos($excerpt, ' ');
        $excerpt   = substr($excerpt, 0, $lastSpace);
        $excerpt  .= '...';
    } else {
        $excerpt = strip_tags($str);
    }
    
    return $excerpt;
}
function rewrite($s)
{
    $table = array('À'=>'a','Á'=>'a','Â'=>'A','Ã'=>'A','Ä'=>'A','Å'=>'A','Ă'=>'A','Ā'=>'A','Ą'=>'A','Æ'=>'A','Ǽ'=>'A','à'=>'a','á'=>'a','â'=>'a','ã'=>'a','ä'=>'a','å'=>'a','ă'=>'a','ā'=>'a','ą'=>'a','æ'=>'a','ǽ'=>'a','Ả'=>'a','ả'=>'a','Ạ'=>'a','ạ'=>'a','Ắ'=>'A','Ằ'=>'A','ắ'=>'a','ằ'=>'a','ẳ'=>'a','Ẳ'=>'A','Ẵ'=>'A','ẵ'=>'a', 'Ặ'=>'A','ặ'=>'a','Ấ'=>'A','ấ'=>'a','Ầ'=>'A','ầ'=>'a','Ẩ'=>'A','ẩ'=>'a','Ẫ'=>'A','ẫ'=>'a','Ậ'=>'A','ậ'=>'a', 'Þ'=>'B', 'þ'=>'b', 'ß'=>'Ss', 'Ç'=>'C', 'Č'=>'C', 'Ć'=>'C', 'Ĉ'=>'C', 'Ċ'=>'C', 'ç'=>'c', 'č'=>'c', 'ć'=>'c', 'ĉ'=>'c', 'ċ'=>'c', 'Đ'=>'d', 'Ď'=>'d', 'Đ'=>'d', 'đ'=>'d', 'ď'=>'d', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ĕ'=>'E', 'Ē'=>'E', 'Ę'=>'E', 'Ė'=>'E', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ĕ'=>'e', 'ē'=>'e', 'ę'=>'e', 'ė'=>'e', 'Ĝ'=>'G', 'Ğ'=>'G', 'Ġ'=>'G', 'Ģ'=>'G', 'ĝ'=>'g', 'ğ'=>'g', 'ġ'=>'g', 'ģ'=>'g', 'Ĥ'=>'H', 'Ħ'=>'H', 'ĥ'=>'h', 'ħ'=>'h', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'İ'=>'I', 'Ĩ'=>'I', 'Ī'=>'I', 'Ĭ'=>'I', 'Į'=>'I','Ỉ'=>'I','Ị'=>'I', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'į'=>'i', 'ĩ'=>'i', 'ī'=>'i', 'ĭ'=>'i', 'ı'=>'i','ỉ'=>'i','ị'=>'i', 'Ĵ'=>'J', 'ĵ'=>'j', 'Ķ'=>'K', 'ķ'=>'k', 'ĸ'=>'k', 'Ĺ'=>'L', 'Ļ'=>'L','Ľ'=>'L', 'Ŀ'=>'L', 'Ł'=>'L', 'ĺ'=>'l', 'ļ'=>'l', 'ľ'=>'l', 'ŀ'=>'l', 'ł'=>'l', 'Ñ'=>'N', 'Ń'=>'N', 'Ň'=>'N', 'Ņ'=>'N', 'Ŋ'=>'N', 'ñ'=>'n', 'ń'=>'n','ň'=>'n', 'ņ'=>'n', 'ŋ'=>'n', 'ŉ'=>'n', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ō'=>'O', 'Ŏ'=>'O', 'Ő'=>'O', 'Œ'=>'O', 'ò'=>'o','ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ō'=>'o', 'ŏ'=>'o', 'ő'=>'o', 'œ'=>'o', 'ð'=>'o', 'Ŕ'=>'R', 'Ř'=>'R', 'ŕ'=>'r', 'ř'=>'r', 'ŗ'=>'r','Š'=>'S', 'Ŝ'=>'S', 'Ś'=>'S', 'Ş'=>'S', 'š'=>'s', 'ŝ'=>'s', 'ś'=>'s', 'ş'=>'s', 'Ŧ'=>'T', 'Ţ'=>'T', 'Ť'=>'T', 'ŧ'=>'t', 'ţ'=>'t', 'ť'=>'t', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ũ'=>'U', 'Ū'=>'U', 'Ŭ'=>'U', 'Ů'=>'U', 'Ű'=>'U', 'Ų'=>'U','Ữ'=>'U', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ũ'=>'u', 'ū'=>'u', 'ŭ'=>'u', 'ů'=>'u', 'ű'=>'u', 'ų'=>'u','ữ'=>'u', 'Ŵ'=>'W', 'Ẁ'=>'W', 'Ẃ'=>'W', 'Ẅ'=>'W', 'ŵ'=>'w', 'ẁ'=>'w', 'ẃ'=>'w', 'ẅ'=>'w', 'Ý'=>'Y', 'Ÿ'=>'Y', 'Ŷ'=>'Y', 'ý'=>'y', 'ÿ'=>'y', 'ŷ'=>'y', 'Ž'=>'Z', 'Ź'=>'Z', 'Ż'=>'Z', 'Ž'=>'Z', 'ž'=>'z', 'ź'=>'z', 'ż'=>'z', 'ž'=>'z', ' '=>'-', ','=>'', '.'=>'', '"'=>'', '“'=>'', '”'=>'', '‘'=>"", '’'=>"", '•'=>'', '…'=>'', '—'=>'-', '–'=>'-', '¿'=>'', '¡'=>'', '°'=>'', '¼'=>'', '½'=>'', '¾'=>'', '⅓'=>'', '⅔'=>'', '⅛'=>'', '⅜'=>'', '⅝'=>'', '⅞'=>'', '÷'=>'', '×'=>'', '±'=>'', '√'=>'', '∞'=>'', '≈'=>'', '≠'=>'', '≡'=>'', '≤'=>'', '≥'=>'','←'=>'', '→'=>'', '↑'=>'', '↓'=>'', '↔'=>'', '↕'=>'','℅'=>'', '℮'=>'','Ω'=>'','♀'=>'', '♂'=>'','©'=>'', '®'=>'', '™'=>'','%'=>'',':'=>'','/'=>'','?'=>'', 'Đ'=>'D', 'đ'=>'d', 'Ă'=>'A','Ắ'=>'A','Ằ'=>'A','Ẳ'=>'A','Ẵ'=>'A','Ặ'=>'A', 'ă'=>'a','ắ'=>'a','ằ'=>'a','ẳ'=>'a','ẵ'=>'a','ặ'=>'a', 'Â'=>'A','Ấ'=>'A','Ầ'=>'A','Ẩ'=>'A','Ẫ'=>'A','Ậ'=>'A','â'=>'a','ấ'=>'a','ầ'=>'a','ẩ'=>'a','ẫ'=>'a','ậ'=>'a', 'Í'=>'I','Ì'=>'I','Ỉ'=>'I','Ĩ'=>'I','Ị'=>'I', 'í'=>'i','ì'=>'i','ỉ'=>'i','ĩ'=>'i','ị'=>'i', 'Ó'=>'O','Ò'=>'O','Ỏ'=>'O','Õ'=>'O','Ọ'=>'O', 'ó'=>'o','ò'=>'o','ỏ'=>'o','õ'=>'o','ọ'=>'o', 'Ô'=>'O','Ố'=>'O','Ồ'=>'O','Ổ'=>'O','Ỗ'=>'O','Ộ'=>'O', 'ô'=>'o','ố'=>'o','ồ'=>'o','ổ'=>'o','ỗ'=>'o','ộ'=>'o', 'Ơ'=>'O','Ớ'=>'O','Ờ'=>'O','Ở'=>'O','Ỡ'=>'O','Ợ'=>'O', 'ơ'=>'o','ớ'=>'o','ờ'=>'o','ở'=>'o','ỡ'=>'o','ợ'=>'o', 'Ú'=>'U','Ù'=>'U','Ủ'=>'U','Ũ'=>'U','Ụ'=>'U', 'ú'=>'u','ù'=>'u','ủ'=>'u','ũ'=>'u','ụ'=>'u', 'Ư'=>'U','Ứ'=>'U','Ừ'=>'U','Ử'=>'U','Ữ'=>'U','Ự'=>'U', 'ư'=>'u','ứ'=>'u','ừ'=>'u','ử'=>'u','ữ'=>'u','ự'=>'u', 'É'=>'E','È'=>'E','Ẻ'=>'E','Ẽ'=>'E','Ẹ'=>'E', 'é'=>'e','è'=>'e','ẻ'=>'e','ẽ'=>'e','ẹ'=>'e', 'Ê'=>'E','Ế'=>'E','Ề'=>'E','Ể'=>'E','Ễ'=>'E','Ệ'=>'E', 'ê'=>'e','ế'=>'e','ề'=>'e','ể'=>'e','ễ'=>'e','ệ'=>'e',';'=>'-',"'"=>'');
    $string = strtr($s, $table);
    $string = preg_replace("/[^\x9\xA\xD\x20-\x7F]/u", "", $string);
    $string=strtolower($string);
    $string = str_replace("--", '', $string);
    return $string;
}