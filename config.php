<?php
    function get_config() {

        $configuration = array();
        $DB = new stdClass();
        $CFG = new stdClass();
        $USER = new stdClass();

        // Конфигурация для прода
        $DB->dbname = 'doc-h59';
        $DB->host = 'bsu-db04.bsu.edu.ru';
        $DB->charset = 'utf8';
        $DB->user = 'doc-h59';
        $DB->password = 'K4vR6yE5swI7fN2d';

        // Конфигурация для дева
      /*$DB->dbname = 'doc-h59';
        $DB->host = 'bsu-db04.bsu.edu.ru';
        $DB->charset = 'utf8';
        $DB->user = 'doc-h59';
        $DB->password = 'K4vR6yE5swI7fN2d';*/

        if($DB->dbname == 'doc-h59' && $DB->host == 'bsu-db04.bsu.edu.ru' && $DB->user == 'doc-h59'){
            $CFG->adress = 'CK';      //Тут будет прод
            // $CFG->adress = 'https://ck.bsu.edu.ru/';   // прод
        }
        else{
            $CFG->adress = 'https://ck.bsu.edu.ru/';   //Тут будет дев
        //  $CFG->adress = 'site';
        }

        $configuration['DB'] = $DB;
        $configuration['CFG'] = $CFG;
        $configuration['USER'] = $USER;

        return  $configuration;
    }