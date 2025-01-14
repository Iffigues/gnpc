<?php

function gnpc($text, $asp_like=false) {
    $open = [
        "<?php" => "?>", 
        "<?=" => "?>",
        "<?"=> "?>"
    ];
    if ($asp_like) $open["<%"] = "%>";

    var_dump($open);
    for ($i = 0; $i < strlen($text); $i++) {
        echo $text[$i] . "\n"; // Affiche chaque caractère sur une ligne
    }
}

function gnpc_from_file(string $file) {
    $content = file_get_contents($file);
    return gnpc($content);
}
