<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width, initial-scale=1" charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./MDL/material.min.css">
    <script src="./MDL/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--    <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.1/material.red-orange.min.css" />-->
    <link rel="stylesheet"
          href="https://storage.googleapis.com/code.getmdl.io/1.0.1/material.blue_grey-indigo.min.css"/>
    <link href="http://allfont.ru/allfont.css?fonts=roboto-condensed-regular" rel="stylesheet" type="text/css"/>
    <!--AngularJS Filter-->
    <!--    Popup window-->
    <!--    Parallax-->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="Parallax/js/index.js"></script>
    <style>
        .background {
            background: url("http://get.whotrades.com/u3/photo972D/20161575033-0/original.jpeg") repeat;
            background-size: 140% auto;
            position: fixed;
            width: 100%;
            height: 300%;
            top: 0;
            left: 0;

        }

        .wrapper {
            padding: 75px 28px;
            min-height: 1200px;
            height: auto;
            width: 75%;
            margin: auto;
            background: #fff;
            opacity: 0.9;
        }
    </style>
<body ng-app>
<!-- Simple header with scrollable tabs. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <!--Верхнее меню -->
    <header style="
        position:fixed;
    background-color: #0091ea;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    /*-webkit-box-orient: vertical;*/
    /*-webkit-box-direction: normal;*/
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -webkit-flex-direction: row;
    -ms-flex-direction: row;
    flex-direction: row;
    /*-webkit-flex-direction: column;*/
    /*-ms-flex-direction: column;*/
    /*flex-direction: column;*/
    -webkit-flex-wrap: nowrap;
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap;
    -webkit-box-pack: start;
    -webkit-justify-content: flex-start;
    -ms-flex-pack: start;
    justify-content: flex-start;
    box-sizing: border-box;
    -webkit-flex-shrink: 0;
    -ms-flex-negative: 0;
    flex-shrink: 0;
    width: 80%;
    margin-left: 10%;
    padding: 15px;
    border: none;
    /*min-height: 50px;*/
    max-height: 1000px;
    height: 48px;
    z-index: 3;
    /*background-color: rgb(244, 67, 54);*/
    color: rgb(255, 255, 255);
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .14), 0 3px 1px -2px rgba(0, 0, 0, .2), 0 1px 5px 0 rgba(0, 0, 0, .12);
    -webkit-transition-duration: .2s;
    transition-duration: .2s;
    -webkit-transition-timing-function: cubic-bezier(.4, 0, .2, 1);
    transition-timing-function: cubic-bezier(.4, 0, .2, 1);
    -webkit-transition-property: max-height, box-shadow;
    transition-property: max-height, box-shadow;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-align-self: stretch;
    -ms-flex-item-align: stretch;
    align-self: stretch;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center" class="mdl-layout__header">
        <div  class="mdl-layout__header-row">
            <!-- Поиск в обычном режиме -->
            <form action="#" method="get"><div style="margin-top: 15pt" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo mdl-layout--large-screen-only"><input class="mdl-textfield__input" name="searchRequest" type="text" id="sample3"/><label class="mdl-textfield__label" for="sample3" style="color:#f5f5f5">Введите название или категорию... </label><button style="visibility: hidden" type="submit" id="sample4"></button></div></form><label class="mdl-button mdl-js-button mdl-button--icon mdl-layout--large-screen-only" for="sample4"><i class="material-icons">search</i></label>
            <!-- Navigation. We hide it in small screens. -->
            <div class="mdl-navigation mdl-layout--large-screen-only">
                <a href="#films" class="mdl-navigation__link">Фильмы</a>
                <a href="#serials" class="mdl-navigation__link">Сериалы</a>
                <a href="#music" class="mdl-navigation__link">Музыка</a>
                <a href="#cartoons" class="mdl-navigation__link">Мультфильмы</a>
                <a href="#anime" class="mdl-navigation__link">Аниме</a>
                <a href="#games" class="mdl-navigation__link">Игры</a>
            </div>
        </div>

    </header>
    <!--/Верхнее меню -->
    <!-- LeftMenu -->
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Title</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here --></div>
    </main>
</div>

<?php
$request = "http://78.140.13.90:8080/api/feed?limit=1&offset=0";
$json = file_get_contents($request);
$obj = json_decode($json, true);      // Получили массив с фильмами
?>
<div class="background">
    <a style="position: absolute;width: 100%;height: 100%;cursor: pointer"
       href="index.php">
    </a>
    <!--<img src="http://get.whotrades.com/u3/photo972D/20161575033-0/original.jpeg">-->
</div>

<div class="wrapper">
    <?php

    $title = $_GET['title'];
    foreach ($obj as $ff) {
        if(array_search($title, $ff, true)) {
            global $id,$title,$country,$genre,$year,$producer,
                   $actors,$length,$kinopoiskId,$subject,$posterUrl,$quality;
             $id = $ff['id'];
             $title = $ff['title'];
             $country = $ff['country'];
             $genre = $ff['genre'];
             $year = $ff['year'];
             $producer = $ff['producer'];
             $actors = $ff['actors'];
             $length = $ff['length'];
             $kinopoiskId = $ff['kinopoiskId'];
             $subject = $ff['subject'];
             $posterUrl = $ff['posterUrl'];
             $quality = $ff['quality'];
        }
    }
    ?>
    <p class="pageSubTitle">Фильмы, <?=$year?></p>

    <p class="pageTitle"><?=$title?></p>

    <p class="pageSubTitle"><?=$genre?></p>
    </header>
    <section>
        <div class="demo-grid-ruler mdl-grid">
            <img style="height: auto;width:auto; max-height:700px;max-width:400px;margin-left: -8px"
                 class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone"
                 src="<?=$posterUrl?>">
<!--                 src="http://24.media.tumblr.com/5fcd2cd475bfd67fc12de7ef4c473d23/tumblr_mrvx29VT5u1s01hr2o1_1280.jpg">-->

            <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone" style="">
                <p>
                    <i>
                        <?if($title){echo 'Оригинальное название: ';}?>
                    </i>
                    <i>
                        <?if($title)echo$title?>
                    </i>
                </p>

                <p>
                    <i>
                        <?if($country){echo 'Страна: ';}?>
                    </i>
                    <i>
                        <?if($country)echo$country?>
                    </i>
                </p>

                <p>
                    <i>
                        <?if($producer){echo 'Режиссер: ';}?>
                    </i>
                    <i>
                        <?if($producer)echo$producer?>
                    </i>
                </p>

                <p>
                    <i>
                        <?if($actors){echo 'Актеры: ';}?>
                    </i>
                    <i>
                        <?if($actors)echo$actors?>
                    </i>
                </p>

                <p>
                    <i>
                        <?if($length){echo 'Время: ';}?>
                    </i>
                    <i>
                        <?if($length)echo$length?>
                    </i>
                </p>

                <p>
                    <i>
                        <?if($quality){echo 'Качество: ';}?>
                    </i>
                    <i>
                        <?if($quality)echo$quality?>
                    </i>
                </p>
            </div>

        </div>

        <div>
            <p>
                <i>
                    <?=$subject?>
                </i>
            </p>
        </div>

    </section>
</div>


</body>