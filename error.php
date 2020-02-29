<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require $_SERVER['DOCUMENT_ROOT'].'/app/functions.php';

$p_arr = get_data();



/** ищем в массиве совпаддение по данному урл */
if ((is_array($p_arr)) && ($p_arr != '')) {
    /** если файл не пустой */


    $p_arr = get_data();

    /* записываем текущий урл в переменную */
    $url = substr($_SERVER['REQUEST_URI'], 1);

    /** Проверяем совпадает ли текущий урл с короткими адресами из массива*/
    $n = 0;
    foreach ($p_arr as $key => $value) {
        if ($key == $url) {
            $n++; // увеличиваем счетчик если совпадение есть
            $get_url = $value;
        }
    }
    if ($n != 0) {
        header('Refresh:0; URL=' . $get_url);
        //echo $get_url;
    } else {
        /** если текущий урл не совпадает с данными из массива*/
        header( 'Refresh:2; URL=http://'.$_SERVER['HTTP_HOST'].'/404.php' );
        echo "404 в массиве нет страиц с таким урл <br>";
    }

} else {
    header('Refresh:2; URL=http://'.$_SERVER['HTTP_HOST']);
    echo "404 файл с данными пустой<br>";
}



echo " ";
//print_r($p_arr);
?>