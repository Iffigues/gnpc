<?php

function gnpc($text) {
    $open = ["<?php", "<?=", "<?", "<%"];
    $close = ["?>", "%>"];
    $reg = "<\s*(\?php|\?=|\?|%)(\s)*.*(\s)*(.)*(\?>|%>)?"
}

function gnpc_from_file(string $file) {
    $content = file_get_contents($file);
    return gnpc($content);
}
