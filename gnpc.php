<?php

function have($str, $i, $array) {
    foreach ($array as $value) if (substr_compare($str, $value, $i, strlen($value)) === 0) return $value;
    return false;
}


function print_to($str, $i) {
    for (;$str[$i]; $i++) {
        echo $str[$i];
    }
}

function parse_php($str, $i, $end) {
    $b = $i;
    for (; $str[$b] && substr_compare($str, $end, $b,strlen($end)) !== 0; $b++) {
    }

    return $b + strlen($end);
}

function gnpc($text, $asp_like=false) {
    $e = [];
    $open = [
        "<?php" => "?>", 
        "<?=" => "?>",
        "<?"=> "?>"
    ];
    if ($asp_like) $open["<%"] = "%>";
    $key = array_keys($open);

    for ($i = 0; $i < strlen($text); $i = $i) {
        $o = $i;
        $contain = false;

        if ($text[$i] == "<") 
             $contain = have($text, $i, $key);
        if ($contain) { 
            $o = parse_php($text, $i, $open[$contain]); 
        } else {
            while ($text[$o] != "<")  $o = $o + 1;
        }
        array_push($e, substr($text, $i, $o));
        $i = $o;
    }
    return $e;
}

function gnpc_from_file(string $file) {
    $content = file_get_contents($file);
    return gnpc($content);
}

$res = gnpc_from_file("test/test1.php");

foreach($res as $k => $v) {
    echo $k." = ".$v."\n";
}