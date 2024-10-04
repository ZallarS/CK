<?php

    require_once('../config.php');
    require_once('connect.php');
    require_once('../vendor/autoload.php');

    use PhpOffice\PhpSpreadsheet\IOFactory;

    $json = array();
    $connect = connect(get_config());

    $inputFileName = '../uploads/1.xlsx';

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
        $json[$i][1] = trim($json[$i][1]);
        $json[$i][2] = trim($json[$i][2]);
        $json[$i][3] = trim($json[$i][3]);
        $json[$i][4] = trim($json[$i][4]);
        $json[$i][5] = trim($json[$i][5]);
        echo $json[$i][1]." ".$json[$i][2]." ".$json[$i][3]." ".$json[$i][4]." ".$json[$i][5];
       //  $sth = $connect->prepare("INSERT INTO `students` SET `fullname` = '".$json[$i][1]." ".$json[$i][2]." ".$json[$i][3]."', `group_ed` = '".$json[$i][4]."', `group_ck` = '".$json[$i][5]."' ");
       //  $sth->execute();

    }


//var_dump($stack);

    //$result = array_unique($arr);
    //var_dump($arr);
   // for ($i = 0;$i<count($arr);$i++){
//
   //     echo $stack[$i]."\n";
   // }

    //foreach ($json as $item) {
   //     echo $item[0]."\n";
   // }






