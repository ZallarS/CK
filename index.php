<?php
    require_once('config.php');
    require_once('modules.php');
    require_once ('engine/connect.php');

    print_header("Цифровая кафедра  НИУ «БелГУ» ");

    $connect = connect(get_config());

?>


<body style="background-color: rgba(0, 0, 0, 0.05);">
<?php print_nav(); ?>

    <div class="container py-2">
        <nav class="nav " style="background: #212529; padding: 7px 15px 15px 15px">
            <li class=""><a style="color: #ffffff; text-decoration: none; margin: 15px;" href="#News">Новости</a></li>
            <li class=""><a style="color: #ffffff; text-decoration: none; margin: 15px;" href="#about">О кафедре</a></li>
            <li class=""><a style="color: #ffffff; text-decoration: none; margin: 15px;" href="#Programms">Программы</a></li>
            <li class=""><a style="color: #ffffff; text-decoration: none; margin: 15px;" href="#contacts">Контакты</a></li>
        </nav>
        <div class="col">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <h5 class="my-3"></h5>
                    <p class="text-muted mb-1"></p>
                    <div class="d-flex justify-content-center mb-2">
                    </div><h5 class="section-title h1" id="News">Последние новости</h5>

                    <section id="team">
                        <div class="container">

                            <div class="row">
                                <?php
                                $sth = $connect->prepare("SELECT * FROM `news` ORDER BY ID DESC LIMIT 3");
                                $sth->execute();
                                $news = $sth->fetchAll();

                                foreach ($news as $new){

                                    echo "<div class='col-xs-12 col-sm-6 col-md-4'>
                                            <div class='image-flip' ontouchstart='this.classList.toggle(`hover`);'>
                                                <div class='mainflip'>
                                                    <div class='frontside'>
                                                        <div class='card'>
                                                            <div class='card-body text-center'>
                                                                <p><img width='150' class='img-fluid' src=".$new['header_pathimage']."></p>
                                                                <h4 class='card-text' style='border: 1px solid black'> ".date('d.m.Y',$new['timestmp'])." </h4>
                                                                <h4 class='card-title'> ".$new['header']." </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='backside'>
                                                        <div class='card'>
                                                            <div class='card-body text-center mt-4'>
                                                                <h4 class='card-title'>".$new['header']."<br></h4>
                                                                <p class='card-text'><a href='news.php?id=".$new['id']."'>Подробнее</a></p>
                                                                <ul class='list-inline'></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>";}?>
                                    </div>
                                </div>
                            </section>
                </div>
            </div>
        </div>
    </div>

<div class="container py-2">

    <div class="col">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="my-3"></h5>
                <p class="text-muted mb-1"></p>
                <div class="d-flex justify-content-center mb-2">
                </div><h5 class="section-title h1 text-center" id="about">О кафедре</h5>

                <section id="team">
                    На базе института инженерных и цифровых технологий НИУ "БелГУ" в рамках реализации программы Минобрнауки России «Приоритет 2030» открылась «Цифровая кафедра». Новый совместный проект Министерства науки и высшего образования и Министерства цифрового развития, связи и массовых коммуникаций Российской Федерации направлен на создание возможностей для повышения квалификации и получения новой профессии в сфере информационных технологий.
                    <br><br>Здесь студенты смогут получить дополнительное образование на «Цифровой кафедре» во время обучения по другой специальности, не связанной с IT-сферой. По окончании ВУЗ-а они не обязательно будут заниматься программированием, но полученные компетенции помогут им лучше ориентироваться в информационных технологиях.
                    <br><br>Студенты получают новые компетенции в области информационных технологий благодаря дополнительным профессиональным программам / программам профессиональной переподготовки IT-профиля, которые разработаны совместно с индустриальными партнерами и отраслевыми экспертами.
                    <br><br>В проекте «Цифровой кафедры» предусмотрено два направления подготовки: для обучающихся по профильным IT-направлениям и для тех, чья будущая специальность не относится к этой сфере.
                    <br><br>Трансформация экономики требует новых междисциплинарных навыков и сильных цифровых компетенций. Все большее проникновение информационных технологий в сферу естественных и даже гуманитарных наук приводит к растущей востребованности специалистов, которые имеют представление об IT. Новый проект — это уникальный способ получения дополнительной квалификации студентами, чье основное образование не связано с программированием.
                    <br><br>После успешного прохождения программы и сдачи экзамена в форме публичной защиты проекта студентам будет выдан диплом государственного образца о профессиональной переподготовке.

                </section>
            </div>
        </div>
    </div>
</div>

<div class="container py-2">

    <div class="col">
        <div class="card mb-4">
            <div class="card-body text-center">
                <h5 class="my-3"></h5>
                <p class="text-muted mb-1"></p>
                <div class="d-flex justify-content-center mb-2">
                </div><h5 class="section-title h1" id="Programms">Программы обучения</h5>

                <section id="team">
                    <div class="container">

                        <div class="row">
                            <?php

                            $sth = $connect->prepare("SELECT * FROM `programms`");
                            $sth->execute();
                            $programms = $sth->fetchAll();

                            if($programms){
                                foreach ($programms as $programm){

                                    echo "<div class='col-xs-12 col-sm-6 col-md-4'>
                                    <div class='image-flip' ontouchstart='this.classList.toggle(`hover`);'>
                                        <div class='mainflip'>
                                            <div class='frontside'>
                                                <div class='card'>
                                                    <div class='card-body text-center'>
                                                        <p><img class='img-fluid' src= ".$programm['header_imagepath']." ></p>
                                                        <h4 class='card-title'> ".$programm['programm_name']." </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='backside'>
                                                <div class='card'>
                                                    <div class='card-body text-center mt-4'>
                                                        <h4 class='card-title'>";

                                    $sth = $connect->prepare("SELECT * FROM `teachers` WHERE id = ".$programm['id_lead']);
                                    $sth->execute();
                                    $leads = $sth->fetchAll();

                                    if($leads){
                                        foreach ($leads as $lead){
                                            echo $programm['programm_name']."<br></h4>
                                                        <p class='card-text'>".$lead['name']." - ".$lead['position']."<br><a href='programms.php?id=".$programm['id']."'>Подробнее</a></p>
                                                        <ul class='list-inline'></ul>";
                                        }
                                    }
                                    else{
                                        echo $programm['programm_name']."<br></h4>
                                                        <p class='card-text'>Руководитель не назначен<br><a href='programms.php?id=".$programm['id']."'>Подробнее</a></p>
                                                        <ul class='list-inline'></ul>";
                                    }
                                    echo "
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";

                                }
                            }
                            else{

                            }
?>

                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>
<?php print_footer(get_config()); ?>
</body>