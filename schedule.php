<?php

    require_once('config.php');
    require_once('modules.php');

    print_header("Расписание");

    print_nav();
?>


<link href='libs/fontawesome-free/css/all.min.css' rel='stylesheet' type='text/css'>

<script src="libs/jquery/jquery.min.js"></script>
<script src="libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="libs/jquery-easing/jquery.easing.min.js"></script>


<script src="js/scripts.js"></script>
<body style="background-color: rgba(0, 0, 0, 0.05);">

<div class="container ">
    <div class="col">
        <div class="card mb-4">
            <div class="card-body text-center">
                <h5 class="my-3"></h5>
                <p class="text-muted mb-1">Введите фамилию преподавателя или номер группы: </p>
                <input type="text" placeholder="Например: 1С-1" id="schedule_search"> <input  type="button" value="найти" onclick="search(getElementById('schedule_search'));">
                <div class="d-flex justify-content-center mb-3" ></div>
                <a href="group_members.php" style="text-decoration: none">Узнать номер группы</a>
            </div>
        </div>
    </div>
</div>

<div id="result"></div>

<div class="container">
    <div class="col">
        <div class="card mb-4">
            <div class="alert alert-primary" role="alert">
                Понедельник
                <div style="float: right">01.09.2024</div>
            </div>

            <div class="card-body text-center">

            </div>
        </div>
    </div>
</div>



<?php print_footer(get_config()); ?>
</body>
