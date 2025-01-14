<?php

function gnpc($text) {
    $open = ["<?php", "<?=", "<?", "<%"];
    $close = ["?>", "%>"];
    $reg = "<(\?php|\?=|\?|%)[.]*(\?>|%>)?"
}

function gnpc_from_file(string $file) {
    $content = file_get_contents($file);
    return gnpc($content);
}
