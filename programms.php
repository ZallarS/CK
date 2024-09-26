<?php
require_once ('modules.php');
require_once('Arrays.php');
?>

<html>
<head>
    <title>Цифровая кафедра НИУ БелГУ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <script src="scripts/scripts.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background-color: rgba(0, 0, 0, 0.05);">
<?php print_nav(); ?>
<div class="container py-3">

    <div class="col">
        <div class="card mb-1">
            <div class="card-body text-center">
                <h5 class="my-1"></h5>
                <p class="text-muted mb-1"></p>
                <div class="d-flex justify-content-center mb-1">
                </div>
                <section>
                                <?php
                                $id = $_GET['id'];
                                $news = get_all_programms($id,'none');
                                $count = count($news);
                                foreach ($news as $items => $key)

                                    if($key['id'] == $id) {
                                        $link = $key['link'];
                                        echo "<font size='7'>".$key['programm_name']."</font><hr><p align='center' id='team' ></p>";

                                        if($key['teachers'] != "none") {

                                            $collections = get_all_programms($id,"collection");
                                            echo "<font size='6'>Сотрудники:</font><br><br><br>";
                                            foreach ($collections as $item => $i)
                                                echo "<p align='left'><font size='4'>• ".$i."</font></p>";

                                            echo "</section><br><input class='btn btn-primary btn-secondary btn-block' type='button' onclick='redirect(`".$link."`)' value='Описание программы'> <input class='btn btn-primary btn-secondary btn-block' type='button' onclick='redirect(`index.php`)' value='На главную'> <input class='btn btn-primary btn-secondary btn-block' type='button' onclick='redirect(`https://dekanat.bsu.edu.ru/blocks/bsu_portfolio/digital_profile_retraining_program/`)' value='Записаться'><br>";
                                        }
                                        else
                                            echo "Программа находится разработке, следите за <a href='arhive.php'>новостями</a></section><br><input class='btn btn-primary btn-secondary btn-block' type='button' onclick='redirect(`index.php`)' value='На главную'><br>";


                                    }
                                    // Если такой записи в массиве нет
                                    if($id > $count)
                                        echo "<font size='7'>Такой программы не существует!!!</font><br><br></section><br><input class='btn btn-primary btn-secondary btn-block' type='button' onclick='redirect(`index.php`)' value='На главную'><br>";

                                ?>


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