<?php

function have($str, $i, $array) {
    foreach ($array as $value) {
        echo $value."\n";        
    }
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
        
        if ($text[$i] == "<") 
            $o = have($text, $i, $key);
        else
            while ($text[$o] != "<")  $o = $o + 1;
        array_push($e, substr($text, $i, $o));
        $i = $o;
    }
}

function gnpc_from_file(string $file) {
    $content = file_get_contents($file);
    return gnpc($content);
}

gnpc_from_file("test/test1.php");
