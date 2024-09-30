<?php

    session_start();

    require_once('../config.php');
    require_once('connect.php');
    require_once('ajax_update.php');

    $configuration = get_config();
    $connect = connect($configuration);

    $module = $_GET['module'];

    if($module == "import_excel_all"){

        echo "<div id='settings' style='width: 1000px;'>";
        echo ajax_update($configuration, "import_excel_all");
    }


echo "</div>";