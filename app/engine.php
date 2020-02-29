<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require 'functions.php';





if (isset($_REQUEST['url'])) { $url = stripslashes($_REQUEST['url']); if ($url == '') { unset($url);} }


    if (get_data()) {
        /** если есть записи в файле*/

        /** Проверяем есть ли в массиве текущий урл*/
        $p_arr = get_data();
        $n = 0;

        foreach ($p_arr as  $key => $value) {

            if ($value == $url) { /** если совпадение есть то ничего не добавляем в массив */

                echo 'http://'.$_SERVER['HTTP_HOST'].'/'.$key;

                $n++; // увеличиваем счетчик если совпадение есть
            }
        }

        if ($n == 0) {
            /** если совпадений не было то добавляем новый урл в массив*/

            /** добавляем проверку на случай если такой короткий адрес уже есть */

            foreach ($p_arr as  $value) {
                $t = false;
                while (!$t) {
                    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $short = substr(str_shuffle($chars), 0, 5);
                    if ($short != $value) {
                        $t = true;
                    }
                }
            }

            $short_link = array($short => $url);

            $new_arr = array_merge($p_arr, $short_link);

            put_data($new_arr);

            echo 'http://'.$_SERVER['HTTP_HOST'].'/'.$short;
        }

    } else {
        /**если нет*/
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $short =  substr(str_shuffle($chars), 0, 5);

        $short_link = array($short => $url);

        put_data($short_link);

        echo 'http://'.$_SERVER['HTTP_HOST'].'/'.$short;

    }















?>