<?php


function get_data() {
    // Чтение.
    $filename = $_SERVER['DOCUMENT_ROOT'].'/app/array.txt';
    if ((file_exists($filename)) or (@trim(file_get_contents($filename)) != '')) {
        $data = @file_get_contents($filename);
        $arr = json_decode($data, TRUE);
    }
    return $arr;
}

function put_data($arr) {
    // Запись.
    $filename = $_SERVER['DOCUMENT_ROOT'].'/app/array.txt';
    $data = json_encode($arr);  // JSON формат сохраняемого значения.
    @file_put_contents($filename, $data);
}


?>