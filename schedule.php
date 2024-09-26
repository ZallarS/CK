<?php
require_once ('modules.php');
require_once('Arrays.php');
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
<html>
<head>
    <title>Цифровая кафедра НИУ БелГУ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/css.css" rel="stylesheet">
    <script src="scripts/scripts.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background-color: rgba(0, 0, 0, 0.05);">
<?php print_nav(); ?>

<div class="container py-3">

    <div class="col">
        <div class="card mb-4">
            <div class="card-body text-center">
                <h5 class="my-3"></h5>
                <p class="text-muted mb-1"></p>
                <div class="d-flex justify-content-center mb-5" ><font size="6">Уважаемые преподаватели и студенты! Расписание Временно не работает по ряду причин. Приносим извинения.</font></div>

            </div>
        </div>
    </div>
</div>


<?php print_footer(); ?>
</body>
</html>