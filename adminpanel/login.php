<?php
    session_start();
    if($_SESSION)
        header('Location: index.php');

    require_once('../config.php');
    require_once ('../modules.php');
    print_header("Авторизация");
?>

<link href='../libs/fontawesome-free/css/all.min.css' rel='stylesheet' type='text/css'>
<link href='../libs/bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
<link href='../css/ruang-admin.min.css' rel='stylesheet'>

<h1 class="text-primary text-center">Авторизация</h1>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form id="registrationForm" action="../engine/signin.php" method="post">
                        <div class="form-group">
                            <label for="login">Логин</label>
                            <input type="text" class="form-control" id="login" name="login" placeholder="логин" required />
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Пароль" required />
                        </div>
                        <center><button class="btn btn-success ">Войти</button></center>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>