<?php
   function connect($configuration){

       $dsn = "mysql:dbname=".$configuration['DB']->dbname.";host=".$configuration['DB']->host.";charset=".$configuration['DB']->charset;
       try {
           $dbh = new PDO($dsn, $configuration['DB']->user, $configuration['DB']->password);
       }
       catch (PDOException $e) {
           die('Ошибка подключения: <br>' . $e -> getMessage());
       }
       return $dbh;
   }