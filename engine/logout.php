<?php
    session_start();
    if ($_SESSION){
        session_destroy();
        header('Location: ../adminpanel/login.php');
        exit();
    }