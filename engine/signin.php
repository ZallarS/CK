<?php

    if ($_SESSION){
        session_destroy();
        header('Location: ../adminpanel/index.php');
        exit();
    }
    else{
        session_start();

        require_once('../config.php');
        require_once('connect.php');

        $configuration = get_config();
        $connect = connect($configuration);

        $login    =  $_POST['login'];
        $password =  $_POST['password'];

        $sth = $connect->prepare("SELECT * FROM `users` WHERE `login` = :login AND `password` = :password");
        $sth->bindParam(':login', $login);
        $sth->bindParam(':password', md5($password));
        $sth->execute();
        $results = $sth->fetchAll();

        foreach ($results as $result){
            $_SESSION['id']      = $result['id'] ;
            $_SESSION['name']    = $result['name'] ;
            $_SESSION['id_role'] = $result['id_role'] ;
        }
        header('Location: ../adminpanel/index.php');
        exit();
    }