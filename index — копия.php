<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./MDL/material.min.css">
    <script src="./MDL/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.1/material.red-orange.min.css" />
    <style>
        .center {
            width: 850px; /* Ширина элемента в пикселах */
            padding: 50px; /* Поля вокруг текста */
            margin: auto; /* Выравниваем по центру */
        }
        .center2 {
            width: 800px; /* Ширина элемента в пикселах */
            padding: 0px; /* Поля вокруг текста */
            margin: auto; /* Выравниваем по центру */
        }
    </style>
</head>
<body>
<div class="parser_json">
<?php
$request = "http://80.89.201.98:8080/notifyme-1.0-SNAPSHOT/feed";
$json = file_get_contents($request);
$obj=json_decode($json, true);      // Получили массив с фильмами
?>
</div>
<div class="center header1" style="margin: auto">
    <table width="70%" border="0" cellpadding="5" >
        <tr align="center" valign="center">
            <td class="header1_logo"><img style="max-width:60pt;border-radius:25%" src="http://www.radionetplus.ru/uploads/posts/2014-04/1398792327_persis-clayton-weirs-36.jpg"></td>
            <td class="header1_search"><input style="width:400pt;height:25pt;border-radius:5%" placeholder="Выберите фильм или категорию..." name="searchRequest" form="data"></td>
            <form action="#">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                    <input class="mdl-textfield__input" type="text" id="sample3" />
                    <label class="mdl-textfield__label" for="sample3">Text...</label>
                </div>
            </form>
            <td><button type="submit" form="data" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    Найти
                </button>
            </td>
            <td><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                Авторизоваться
            </button>
            </td>


        </tr>
    </table>
    <div class="categories">
        <table width="10%" border="0" cellpadding="15">
            <tr align="right" valign="top">
                <td><a href="">Фильмы</a></td>
                <td><a href="">Сериалы</a></td>
                <td><a href="">Музыка</a></td>
                <td><a href="">Мультфильмы</a></td>
                <td><a href="">Аниме</a></td>
                <td><a href="">Игры</a></td>
            </tr>
        </table>
    </div>
</div>
<div class="center2 page-content">
    <div id="Films" class="demo-grid-3 mdl-grid">
        <?php $tr=1;
        foreach($obj as $film){
            echo '<div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--2-col-phone"><a href="'.$film['picture_big'].'"><img src="'.$film['picture'].'">'.'<br>';
            echo '<a href="">'.$film['title'].'</a></div>';
            if($tr==3){echo '<tr>'; $tr=0;};
            $tr++;
        }
        ?>
    </div>
    <div class="serials">
        <table width="50%" border="0" cellpadding="25">
            <tr><h3>Сериалы <a href="" title="Перейти в раздел">→</a></h3></tr>
            <tr>
                <td><img style="max-width:100pt;border-radius:25%" src="http://n225.uplea.com/uploads/posts/2014-05/1398961940_continuum06.jpg"></td>
                <td><img style="max-width:100pt;border-radius:25%" src="https://im1-tub-ru.yandex.net/i?id=11ed88f337c579d3136738e4df5a1589&n=33&h=170"></td>
                <td><img style="max-width:100pt;border-radius:25%" src="https://im3-tub-ru.yandex.net/i?id=693d4a50f4d03e7ef0842774056ea8bd&n=33&h=170"></td>
            </tr>
            <tr>
                <td><a href="">Сериал 1</a></td>
                <td><a href="">Сериал 2</a></td>
                <td><a href="">Сериал 3</a></td>
            </tr>
        </table>
    </div>
    <div class="games">
        <table width="50%" border="0" cellpadding="25">
            <tr><h3>Игры <a href="" title="Перейти в раздел">→</a></h3></tr>
            <tr>
                <td><img style="max-width:100pt;border-radius:25%" src="https://im3-tub-ru.yandex.net/i?id=01c5a5035742cbbac9455125a3129154&n=33&h=170"></td>
                <td><img style="max-width:100pt;border-radius:25%" src="https://im2-tub-ru.yandex.net/i?id=29bd8a7968993125fddfc80044732ece&n=33&h=170"></td>
                <td><img style="max-width:100pt;border-radius:25%" src="http://garethsmod.com/wp-content/uploads/2014/05/Highlife.jpg"></td>
            </tr>
            <tr>
                <td><a href="">Игра 1</a></td>
                <td><a href="">Игра 2</a></td>
                <td><a href="">Игра 3</a></td>
            </tr>
        </table>
    </div>
    <div class="page-footer"></div>
    <form id="data"></form>
</div>
</body>
</html>

