<?php
function reverse(string $str) : string {

$arr = explode(' ', $str);
$result = '';

foreach ($arr as $a) {
    $letters = preg_split('//u', $a, null, PREG_SPLIT_NO_EMPTY);
    $reversed = [];
    
    $w = preg_grep('/[\w]/u', $letters);
    //$letters2 = preg_split('//u', $w, null, PREG_SPLIT_NO_EMPTY);
    
    $diff = array_diff($letters, $w);
    
    foreach ($w as $k => $v) {
        if ($v == mb_strtoupper($v)) {
            if (ctype_digit($v) || $v == '_') {
                $reversed[$k] = array_pop($w);
            } else {
                $reversed[$k] = mb_strtoupper(array_pop($w));
            }
        } else {
            $reversed[$k] = mb_strtolower(array_pop($w));
        }
    }
    
    foreach ($diff as $k => $v) {
        $reversed[$k] = $v;
    }
    //foreach ($)
    ksort($reversed);
    //print_r($reversed);
    
    foreach ($reversed as $v) {
        $result .= $v;
    }
    $result .= ' ';
}

return trim($result);
}