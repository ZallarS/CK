<?php
require_once ('modules.php');
require_once('Arrays.php');
?>
<html>
<head>
    <title>Цифровая кафедра НИУ БелГУ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/css.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background-color: rgba(0, 0, 0, 0.05);">
<?php print_nav(); ?>

    <div class="container py-3">
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
                    </div><h5 class="section-title h1" id="News">Новости</h5>

                    <section id="team">
                        <div class="container">

                            <div class="row">
                                <?php
                                $news = get_all_news(0,'none');
                                $count = count($news);
                                foreach ($news as $items => $key){
                                    $news_header = $key['header'];
                                    $news_date = $key['date'];
                                    $program_img = $key['img'];
                                    $news_id = $key['id'];
                                    if($key['id'] <=3) {
                                        echo "<div class='col-xs-12 col-sm-6 col-md-4'>
                                    <div class='image-flip' ontouchstart='this.classList.toggle(`hover`);'>
                                        <div class='mainflip'>
                                            <div class='frontside'>
                                                <div class='card'>
                                                    <div class='card-body text-center'>
                                                        <p><img width='150' class='img-fluid' src= $program_img ></p>
                                                        <h4 class='card-text' style='border: 1px solid black'> $news_date </h4>
                                                        <h4 class='card-title'> $news_header </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='backside'>
                                                <div class='card'>
                                                    <div class='card-body text-center mt-4'>
                                                        <h4 class='card-title'>$news_header<br></h4>
                                                        <p class='card-text'><a href='news.php?id=$news_id'>Подробнее</a></p>
                                                        <ul class='list-inline'></ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";}}?>

                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>

<div class="container">

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

<div class="container py-5">

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
                            $programms = get_all_programms(0,'none');
                            $count = count($programms);
                            foreach ($programms as $items => $key){
                                $program_header = $key['header'];
                                $program_name = $key['programm_name'];
                                $program_lead = $key['lead'];
                                $program_img = $key['img'];
                                $program_id = $key['id'];
                                $program_link = $key['link'];
                               echo "<div class='col-xs-12 col-sm-6 col-md-4'>
                                    <div class='image-flip' ontouchstart='this.classList.toggle(`hover`);'>
                                        <div class='mainflip'>
                                            <div class='frontside'>
                                                <div class='card'>
                                                    <div class='card-body text-center'>
                                                        <p><img class='img-fluid' src= $program_img ></p>
                                                        <h4 class='card-title'> $program_name </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='backside'>
                                                <div class='card'>
                                                    <div class='card-body text-center mt-4'>
                                                        <h4 class='card-title'>";
                                                        if($program_header == "Программа находится в разработке") {
                                                            echo "$program_header<br></h4>
                                                        <p class='card-text'>$program_lead<br><a href='programms.php?id=$program_id'>Подробнее</a></p>
                                                        <ul class='list-inline'></ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";}
                                                        else{
                                                            echo "Руководитель программы:<br></h4>
                                                        <p class='card-text'>$program_lead<br><a href='programms.php?id=$program_id'>Подробнее</a></p>
                                                        <ul class='list-inline'></ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";}
                            }?>

                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>
<?php print_footer(); ?>
</body>
</html>