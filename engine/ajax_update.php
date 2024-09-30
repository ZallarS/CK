<?php
    function ajax_update($configuration, $mode){

        require_once('connect.php');
        require_once('libs.php');

        $connect = connect($configuration);

        $str = '';
        if ($mode == "excel_import_all") {
            if (CheckSQL($connect, "SELECT * FROM `users` ")) {
                echo 11111;
                $str .= "<br><br><center><a><input type='submit' class='btn btn-info' onclick='edit_account()' value='Применить'></a></center>";
            }
        }
        return $str;
    }