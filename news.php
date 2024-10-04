<?php

    require_once('config.php');
    require_once ('modules.php');
    require_once ('engine/connect.php');

    print_header("Новости");

    $connect = connect(get_config());

?>

<style>


    h1 {
        text-align: center;
        padding: 40px;
        margin: 0;
        color: beige;
        font-size: 3em;
    }

    .gallery {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding: 20px;
    }

    .gallery img {
        margin: 10px;
        cursor: pointer;
        max-width: 300px;
        width: 50%;
        height: 50%;
        border-radius: 10px;
    }

    /* Lightbox styles */
    #lightbox {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        justify-content: center;
        align-items: center;
        overflow: hidden;
        flex-direction: column;
    }

    #lightbox img {
        max-width: 80%;
        max-height: 60vh;
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.8);
        border-radius: 10px;
    }

    #close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 24px;
        color: #fff;
        cursor: pointer;
        z-index: 2;
    }

    #prev-btn,
    #next-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
        color: #fff;
        background-color: rgba(0, 0, 0, 0.5);
        border: none;
        padding: 10px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    #prev-btn {
        left: 10px;
    }

    #next-btn {
        right: 10px;
    }

    #prev-btn:hover,
    #next-btn:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Styles for thumbnails */
    .thumbnail-container {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
    }
    .thumbnail {
        max-width: 50px;
        width: 100px;
        cursor: pointer;
        margin-top: 40px;
        margin-left: 5px;
        margin-right: 5px;
        border: 2px solid #fff;
        transition: opacity 0.3s;
    }

    .thumbnail:hover,
    .thumbnail.active-thumbnail {
        opacity: 0.7;
    }
</style>
<script src="js/scripts.js"></script>
<script src="js/list_images.js"></script>
<body style="background-color: rgba(0, 0, 0, 0.05);">
<?php print_nav(); ?>

<div class="container py-3">

    <div class="col">
        <div class="card mb-4">
            <div class="card-body text-center">
                <h5 class="my-3"></h5>
                <p class="text-muted mb-1"></p>
                <div class="d-flex justify-content-center mb-5" ></div>

                <?php

                $sth = $connect->prepare("SELECT * FROM `news` where id =".$_GET['id']);
                $sth->execute();
                $news = $sth->fetchAll();


            if($news){
                foreach ($news as $new){
                    if($new['id'] == $_GET['id']) {
                        echo "<font size='7'>".$new['header']."</font><hr>
            <section id='team' style='min-height: 400px'><font size='5'>". "<p align='justify'> ".$new['content']."</p></font>";

                        $sth = $connect->prepare("SELECT * FROM `news_image_list` where id_news =".$_GET['id']);
                        $sth->execute();
                        $images = $sth->fetchAll();

                        echo "<div class='gallery' onclick='openLightbox(event)'>";

                        foreach ($images as $image){
                            echo "<img src='".$image['news_imagepath']."'>";
                        }
                        echo "</div>";
                        echo "</section><input class='btn btn-primary btn-secondary btn-block' type='button' onclick='redirect(`arhive.php`)' value='К новостям'> <input class='btn btn-primary btn-secondary btn-block' type='button' onclick='redirect(`index.php`)' value='На главную'>";

                    }
                }
            }
            else{
                echo "<div class='alert alert-danger' role='alert' ><font size='5'>Новости с таким id не существует!!!</font></div>";
                echo "</section><input class='btn btn-primary btn-secondary btn-block' type='button' onclick='redirect(`arhive.php`)' value='К новостям'> <input class='btn btn-primary btn-secondary btn-block' type='button' onclick='redirect(`index.php`)' value='На главную'><br>";
            }
                ?>

                <div id="lightbox">
                    <span id="close-btn" onclick="closeLightbox()">&times;</span>

                    <img id="lightbox-img" src="">

                    <div id="thumbnail-container"></div>
                    <button id="next-btn" onclick="changeImage(1)">>>></button>
                    <button id="prev-btn" onclick="changeImage(-1)"><<<</button>
                </div>

                <script>
                    let currentIndex = 0;
                    const images = document.querySelectorAll('.gallery img');
                    const totalImages = images.length;
                </script>

            </div>
        </div>
    </div>
</div>


<?php print_footer(get_config()); ?>
</body>
