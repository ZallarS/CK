<?php
    require_once ('modules.php');
    require_once('Arrays.php');

    $id = $_GET['id'];
    $news = get_all_programms($id, 'none');
    $count = count($news);

?>

<html>
<?php print_header("Курс ДПО"); ?>

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
                                foreach ($news as $items => $key){

                                    if($key['id'] == $id) {
                                        $link = $key['link'];
                                        $presentation = $key['presentation'];
                                        echo "<font size='7'>".$key['programm_name']."</font><hr>";

                                        if($key['header'] != "") {

                                            echo "<div class='alert alert-primary' role='alert'><font size='5'>Описание</font></div>";

                                            echo "<br><font size='5'>".$key['header']."</font>";

                                        }

                                        if($key['teachers'] != "none") {

                                            $collections = get_all_programms($id,"collection");
                                            echo "<br><br><br><div class='alert alert-primary' role='alert'><font size='5'>Сотрудники</font></div><br>";
                                            foreach ($collections as $item => $i)
                                                echo "<p align='left'><font size='4'>• ".$i."</font></p>";

                                            echo "</section><br>";

                                            if($link)
                                                echo "<input class='btn btn-primary btn-secondary btn-block' type='button' onclick='redirect(`".$link."`)' value='Описание программы'> ";

                                            if($presentation)
                                                echo "<input class='btn btn-primary btn-secondary btn-block' type='button' onclick='redirect(`".$presentation."`)' value='Презентация'> ";

                                            echo "<input class='btn btn-primary btn-secondary btn-block' type='button' onclick='redirect(`index.php`)' value='На главную'><br>";
                                        }
                                        else
                                            echo "Программа находится разработке, следите за <a href='arhive.php'>новостями</a></section><br><input class='btn btn-primary btn-secondary btn-block' type='button' onclick='redirect(`index.php`)' value='На главную'><br>";
                                    }

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