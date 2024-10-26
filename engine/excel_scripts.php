<?php

    require_once('../config.php');
    require_once('connect.php');
    require_once('../vendor/autoload.php');

    use PhpOffice\PhpSpreadsheet\IOFactory;

    $json = array();
    $connect = connect(get_config());

    $inputFileName = '../uploads/2.xls';

    $oSpreadsheet = IOFactory::load($inputFileName); // Вариант и для xls и xlsX

    $oCells = $oSpreadsheet->getActiveSheet()->getCellCollection();

    for ($iRow = 1; $iRow <= $oCells->getHighestRow(); $iRow++) {

        for ($iCol = 'A'; $iCol <= $oCells->getHighestColumn(); $iCol++) {

            $oCell = $oCells->get($iCol.$iRow);
            if($oCell){
                $json[$iRow][] = $oCell->getValue();
            }


        }

    }

    for($i=2;$i<count($json);$i++){

        //$sth = $connect->prepare("INSERT INTO `students` SET `fullname` = '".$json[$i][0]."', `group_ed` = '".$json[$i][1]."', `group_ck` = '".$json[$i][2]."' ");
       // $sth->execute();

    }
