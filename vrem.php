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
</head>
<body>
<div class="parser_json">
    <?php
    $request = "http://80.89.201.98:8080/notifyme/feed?json";
    $json = file_get_contents($request);
    $obj=json_decode($json, true);      // Получили массив с фильмами
    ?>
</div>
<!-- Uses a header that contracts as the page scrolls down. -->
<style>
    .waterfall-demo-header-nav .mdl-navigation__link:last-of-type  {
        padding-right: 0;
    }
</style>
<div class="mdl-layout mdl-js-layout mdl-layout--overlay-drawer-button mdl-layout--fixed-header">
    <header class="mdl-layout__header mdl-layout__header--waterfall">
        <!-- Top row, always visible -->
        <div class="mdl-layout__header-row">
            <!-- Title -->

            <img style="max-width:60pt;border-radius:25%"
                 src="http://www.radionetplus.ru/uploads/posts/2014-04/1398792327_persis-clayton-weirs-36.jpg">

            <form method="get" style="padding-left:35pt">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                    <input class="mdl-textfield__input" name="searRequest" type="text" id="sample3" />
                    <label class="mdl-textfield__label" for="sample3" style="color:#f5f5f5">Введите название или категорию..</label>
                </div>
            </form>

            <div class="mdl-layout-spacer"></div>

            <!--            <span class="mdl-layout-title">Notifier</span>-->

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
                <label class="mdl-button mdl-js-button mdl-button--icon"
                       for="waterfall-exp">
                    <i class="material-icons">filter</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" name="sample"
                           id="waterfall-exp" />
                </div>
            </div>

            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                Sign in
            </button>
        </div>
        <!--         Bottom row, not visible on scroll -->
        <div class="mdl-layout__header-row">
            <!--             Navigation -->
            <nav class="waterfall-demo-header-nav mdl-navigation ">
                <a class="mdl-navigation__link" href="">Фильмы</a>
                <a class="mdl-navigation__link" href="">Сериалы</a>
                <a class="mdl-navigation__link" href="">Музыка</a>
                <a class="mdl-navigation__link" href="">Мультфильмы</a>
                <a class="mdl-navigation__link" href="">Аниме</a>
                <a class="mdl-navigation__link" href="">Игры</a>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Категории</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="">Фильмы</a>
            <a class="mdl-navigation__link" href="">Сериалы</a>
            <a class="mdl-navigation__link" href="">Музыка</a>
            <a class="mdl-navigation__link" href="">Мультфильмы</a>
            <a class="mdl-navigation__link" href="">Аниме</a>
            <a class="mdl-navigation__link" href="">Игры</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content">
            <!-- Your content goes here -->
            <div id="Films" class="demo-grid-3 mdl-grid">
                <?php
                foreach($obj as $film){
                    echo '<div align="center" class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--2-col-phone" ><a href="'.$film['picture_big'].'"><img src="'.$film['picture'].'">'.'<br>';
                    echo '<a href=""><h5>'.$film['title'].'</h5></a></div>';
                }
                ?>
            </div>
        </div>
    </main>
</div>

</body>
</html>

