<?php
    function get_config() {

        $configuration = array();
        $DB = new stdClass();
        $CFG = new stdClass();
        $USER = new stdClass();

        $changed_db = 1;

        if($changed_db == 0){
            // Конфигурация для прода
            $DB->dbname = 'doc-h59';
            $DB->host = 'bsu-db04.bsu.edu.ru';
            $DB->charset = 'utf8';
            $DB->user = 'doc-h59';
            $DB->password = 'K4vR6yE5swI7fN2d';
        }
        else if($changed_db == 1){
            // Конфигурация для дева
            $DB->dbname = 'dev';
            $DB->host = 'localhost';
            $DB->charset = 'utf8';
            $DB->user = 'root';
            $DB->password = '';
        }

        if($DB->dbname == 'doc-h59' && $DB->host == 'bsu-db04.bsu.edu.ru' && $DB->user == 'doc-h59')
            $CFG->adress = 'https://ck.bsu.edu.ru/';
        else
            $CFG->adress = 'ck';

        $configuration['DB'] = $DB;
        $configuration['CFG'] = $CFG;
        $configuration['USER'] = $USER;

        return  $configuration;
    }