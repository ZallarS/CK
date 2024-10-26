<?php
require_once('config.php');
require_once('modules.php');
require_once ('engine/connect.php');

print_header("Распределённые студенты");

$connect = connect(get_config());

?>


<body style="background-color: rgba(0, 0, 0, 0.05);">
<?php print_nav(); ?>

<div class="container py-3">

    <div class="col">
        <div class="card mb-4">
            <div class="alert alert-primary text-center" role="alert">
                СПИСОК РАСПРЕДЕЛЁННЫХ ПО ГРУППАМ СТУДЕНТОВ
            </div>

            <div class="card-body text-center">
                <h5 class="my-3">Если вас или вашей группы нет в списке, но вы зачислены на курс - пишите на почту semendyaev_yu@bsu.edu.ru</h5>
                <p class="text-muted mb-1"> </p>

                <div class="d-flex justify-content-center mb-2"></div>

                    <div class="container">

                        <div class="row">
                            <?php


                            $sth = $connect->prepare("SELECT * FROM `groups` ORDER BY name");
                            $sth->execute();
                            $groups = $sth->fetchAll();
                            $gropname = '';
                            foreach ($groups as $group){
                                        $gropname = $group['name'];
                                        if(!ctype_digit($gropname)){
                                            $gropname .=  " <font color='#ff4500'>(Вне «БелГУ») </font>";
                                        }
                                echo "<div class='col-xs-12 col-sm-6 col-md-4'>
                                        <div class='card'>
                                            <div class='card-body text-center'>
                                                <details>
                                                    <summary>".$gropname."</summary>";

                                                    $sth = $connect->prepare("SELECT * FROM `students` WHERE group_ed = '".$group['name']."'  ORDER BY fullname ");
                                                    $sth->execute();
                                                    $groups2 = $sth->fetchAll();

                                                    if(!$groups2){

                                                        $sth = $connect->prepare("SELECT * FROM `students` WHERE group_ed = ".$group['name']."  ORDER BY fullname ");
                                                        $sth->execute();
                                                        $groups2 = $sth->fetchAll();
                                                    }

                                                    foreach ($groups2 as $group2){
                                                        echo "<p>".$group2['fullname']."<font color='green'> (".$group2['group_ck'].")</font></p>";
                                                    }
                                                echo "</details>   
                                            </div>
                                        </div>
                                      </div>";
                            }
                            ?>
                        </div>
                    </div><br><br><input class='btn btn-primary btn-secondary btn-block' type='button' onclick='redirect(`schedule.php`)' value='К расписанию'> <input class='btn btn-primary btn-secondary btn-block' type='button' onclick='redirect(`index.php`)' value='На главную'>
                </div>
            </div>
        </div>
    </div>
<script src="js/scripts.js"></script>
<?php print_footer(get_config()); ?>
</body>