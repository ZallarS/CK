<?php

    require_once('config.php');
    require_once ('modules.php');
    require_once ('engine/connect.php');

    print_header("Архив новостей");

    $connect = connect(get_config());

?>

<body style="background-color: rgba(0, 0, 0, 0.05);">
<?php print_nav(); ?>
<div class="container py-3">

    <div class="col">
        <div class="card mb-1">
            <div class="card-body text-center">
                <h5 class="my-1"></h5>
                <p class="text-muted mb-1"></p>
                <div class="d-flex justify-content-center mb-1">
                </div><h5 class="section-title h1" id="News">Архив новостей</h5><br><br>
                <section>
                    <div class="row gx-lg-5">
                        <div class="col-lg-4 col-md-15 mb-4 "><div>

                                <?php

                                $sth = $connect->prepare("SELECT * FROM `news` ORDER BY ID DESC");
                                $sth->execute();
                                $news = $sth->fetchAll();

                                foreach ($news as $new) {
                                  echo '
                                  <div class="row mb-1" style="min-height: 330px; border-width: 2px;">
                                    <img style="display: block; max-height:200px; min-height: 200px; " src="'.$new["header_pathimage"].'"/>
                                    <div class="col-20">
                                    
                                        <p>'.$new['header'].'</p>
                                        
                                        <p>
                                            <a href="news.php?id='.$new['id'].'" class="text-dark"><u>'.date('d.m.Y',$new["timestmp"]).'</u></a>
                                        </p>
                                    </div>
                                </div></div></div><div class="col-lg-4"><div>';} ?>

                        </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<?php print_footer(get_config()); ?>
</body>





