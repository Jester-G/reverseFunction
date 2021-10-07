<?php
function reverse(string $str) : string {

$words = explode(' ', $str);
$result = '';

foreach ($words as $word) {
    // разбиваем слово на массив букв
    $letters = preg_split('//u', $word, null, PREG_SPLIT_NO_EMPTY);
    $reversed = [];
    
    // выбираем из массива $letters только буквы (без символов) с сохранением ключей
    $onlyLetters = preg_grep('/[\w]/u', $letters);    
    
    // ищем отличие в двух массивах и получаем массив только символов
    // с сохранением ключей
    $diff = array_diff($letters, $onlyLetters);
    
    foreach ($onlyLetters as $k => $v) {

        if ($v == mb_strtoupper($v)) {

            if (ctype_digit($v) || $v == '_') {
                $reversed[$k] = array_pop($onlyLetters);
            } else {
                $reversed[$k] = mb_strtoupper(array_pop($onlyLetters));
            }

        } else {
            $reversed[$k] = mb_strtolower(array_pop($onlyLetters));
        }
    }
    
    foreach ($diff as $k => $v) {
        $reversed[$k] = $v;
    }
    
    ksort($reversed);
    
    
    foreach ($reversed as $v) {
        $result .= $v;
    }
    $result .= ' ';
}

return trim($result);
}
