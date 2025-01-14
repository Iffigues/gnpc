<?php

function gnpc($text, $asp_like=false) {
    $e = [];
    $open = [
        "<?php" => "?>", 
        "<?=" => "?>",
        "<?"=> "?>"
    ];
    if ($asp_like) $open["<%"] = "%>";

    for ($i = 0; $i < strlen($text); $i = $i) {
        $o = $i;
        if ($text[$i] == "<") {
            $i = 100;
            continue;
        }
        while ($text[$o] != "<") {
            $o = $o + 1;
        }
        echo substr($text, $i, $o);
        $i = $o;
        echo($text[$i]); 
    }
}

function gnpc_from_file(string $file) {
    $content = file_get_contents($file);
    return gnpc($content);
}

gnpc_from_file("test/test1.php");