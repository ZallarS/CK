<?php

    require_once('config.php');
    require_once('modules.php');
    require_once ('engine/connect.php');

    print_header("Курс ДПО");

    $connect = connect(get_config());

?>

<?php  ?>

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

                                $sth = $connect->prepare("SELECT * FROM `programms` WHERE id = ".$_GET['id']);
                                $sth->execute();
                                $programms = $sth->fetchAll();

                                if($programms){
                                    foreach ($programms as $programm){

                                        if($programm['id'] == $_GET['id']) {

                                            echo "<font size='7'>".$programm['programm_name']."</font><hr>
                                              <div class='alert alert-primary' role='alert'><font size='5'>Описание</font></div>";

                                            if($programm['description'] != "")
                                                echo "<br><font size='5'>".$programm['description']."</font>";
                                            else
                                                echo "<center><div class='alert alert-warning' role='alert' style='width: 50%'><font size='5'>Описание отсутствует</font></div></center>";

                                            $sth = $connect->prepare("SELECT * FROM `programms_teacher_list` programms_teacher
                                                                        INNER JOIN `teachers` teacher ON programms_teacher.id_teacher = teacher.id
                                                                        WHERE programms_teacher.id_programm = ".$_GET['id']);
                                            $sth->execute();
                                            $teachers_in_programm = $sth->fetchAll();

                                            echo "<br><br><br><div class='alert alert-primary' role='alert'><font size='5'>Сотрудники</font></div><br>";
                                            if($teachers_in_programm){
                                                foreach ($teachers_in_programm as $teacher)
                                                    echo "<p align='left'><font size='4'>• ".$teacher['name']."</font></p>";
                                            }
                                            else{
                                                echo "<center><div class='alert alert-warning' role='alert' style='width: 50%'><font size='5'>Список преподавателей пуст</font></div></center>";
                                            }

                                            if($programm['presentation'])
                                                echo "<input class='btn btn-primary btn-secondary btn-block' type='button' onclick='redirect(`".$programm['presentation']."`)' value='Презентация'> ";

                                            if($programm['link'])
                                                echo "<input class='btn btn-primary btn-secondary btn-block' type='button' onclick='redirect(`".$programm['link']."`)' value='Описание программы'> ";

                                            echo "<input class='btn btn-primary btn-secondary btn-block' type='button' onclick='redirect(`index.php`)' value='На главную'><br>";

                                        }
                                    }
                                }
                                else{
                                    // Если такой записи в массиве нет
                                    echo "<font size='7'>Такой программы не существует!!!</font><br><br></section><br><input class='btn btn-primary btn-secondary btn-block' type='button' onclick='redirect(`index.php`)' value='На главную'><br>";                                }
                                ?>

                            </div>
                        </div>
                </section>
            </div>
        </div>
    </div>
</div>

<script src="../scripts/scripts.js"></script>

<?php print_footer(get_config()); ?>
</body>
