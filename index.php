<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width, initial-scale=1.0" charset="UTF-8">
    <title>Notifier free movies, serials and other fun stuff</title>

    <link rel="stylesheet" href="./MDL/material.min.css">
    <script src="./MDL/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!--JQuery-->
    <script src="./jquery-2.1.4.js"></script>
    <!--JavaScript-->
    <script src="./js/index.js"></script>
    <!--CSS    -->
    <link rel="stylesheet" href="./css/all.css">

<!--    <link rel="import" href="/test.html">-->
</head>
<body style="background-color: lightgray" onload="loadPage()" id="body">

<div id="loading" class="loading-bro">
    <h1>Loading</h1>
    <svg id="load" x="0px" y="0px" viewBox="0 0 150 150">
        <circle id="loading-inner" cx="75" cy="75" r="60"/>
    </svg>
</div>

<!-- Simple header with scrollable tabs. -->
<div id="output" class=" mdl-layout mdl-js-layout mdl-tabs mdl-js-tabs mdl-js-ripple-effect">

    <!-- Drawer на маленьком экране -->
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Выберите категорию</span>
        <a style="color: rgba(0, 0, 0, .87)" href="#starks-panel" class="mdl-tabs__tab is-active">Фильмы</a>
        <a style="color: rgba(0, 0, 0, .87)" href="#lannisters-panel" class="mdl-tabs__tab">Сериалы</a>
        <a style="color: rgba(0, 0, 0, .87)" href="#targaryens-panel" class="mdl-tabs__tab">Игры</a>
        <a style="color: rgba(0, 0, 0, .87)" href="#targaryens-panel" class="mdl-tabs__tab">Музыка</a>
        <a style="color: rgba(0, 0, 0, .87)" href="#targaryens-panel" class="mdl-tabs__tab">Аниме</a>
        <a style="color: rgba(0, 0, 0, .87)" href="#targaryens-panel" class="mdl-tabs__tab">Мультфильмы</a>
    </div>

    <!--Верхнее меню -->
    <div id="menu" class="menu unvisible">
        <div class="mdl-layout-spacer"></div>
        <!-- Поиск в обычном режиме -->
        <form id="search" class="unvisible" action="" method="get">
            <div class="mdl-textfield mdl-js-textfield mdl-layout--large-screen-only">

                <input ng-model="search" class="mdl-textfield__input" name="searchRequest" type="text"
                       id="sample3"/><label
                    class="mdl-textfield__label" for="sample3">Введите название или
                    категорию...
                    <button style="visibility: hidden" type="submit" id="sample4"></button>
                </label>
            </div>
        </form>

        <!-- Поиск на маленьком экране -->
        <form action="" method="get">
            <div class="mdl-textfield mdl-js-textfield mdl-layout--small-screen-only mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
                <label class="mdl-button mdl-js-button mdl-button--icon"
                       for="fixed-header-drawer-exp">
                    <i class="material-icons">search</i>
                </label>

                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" name="searchRequest"
                           id="fixed-header-drawer-exp"/>
                </div>
            </div>
        </form>

        <!-- Spaceer -->
        <div class=" mdl-layout-spacer mdl-layout--large-screen-only"></div>
        <div id="tabs" class="unvisible mdl-tabs__tab-bar mdl-layout--large-screen-only">
            <a href="#starks-panel" class="mdl-tabs__tab is-active">Фильмы</a>
            <a href="#lannisters-panel" class="mdl-tabs__tab">Сериалы</a>
            <a href="#targaryens-panel" class="mdl-tabs__tab">Игры</a>
            <a href="#targaryens-panel" class="mdl-tabs__tab">Музыка</a>
            <a href="#targaryens-panel" class="mdl-tabs__tab">Аниме</a>
            <a href="#targaryens-panel" class="mdl-tabs__tab">Мультфильмы</a>
        </div>
        <div class="mdl-layout-spacer mdl-layout--large-screen-only"></div>
    </div>

    <div style="background-color: white" id="content" class="unvisible">


        <div style="padding-top: 60px" class="mdl-tabs__panel is-active" id="starks-panel">
            <div class="films popupBtn demo-grid-ruller mdl-grid"></div>
        </div>




        <div style="padding-top: 60px" class="mdl-tabs__panel" id="lannisters-panel">
            <button id="see">XXX</button>
            <button id="see2">AJAX_SERVER_BUTTON</button>
            <div class="Im popupBtn demo-grid-ruller mdl-grid" ><?php //include('server.php');?></div>
        </div>


        <div style="padding-top: 60px" class="serials mdl-tabs__panel" id="targaryens-panel">
            <ul>
                <li>Viserys</li>
                <li>Daenerys</li>
            </ul>
        </div>


    </div>


</div>

<section class="overlay" id="shirm"></section>

<div class="popupShow" id="popup">
    <button class="popupCloseBtn">X</button>


    <span id="popupCategory">Фильмы, </span><span id="popupYear"></span>

    <h3 class="popupTitle"></h3>

    <span id="popupGenre"></span>

    <div class="demo-grid-ruler mdl-grid">
        <img style="height: auto;width:auto; max-height:700px;max-width:400px;margin-left: -8px"
             class="popupPoster mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">

        <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone" style="">
            <p>
                <i>Оригинальное название: </i>
                <i class="popupTitle"></i>
            </p>

            <p>
                <i>Страна: </i>
                <i id="popupCountry"></i>
            </p>

            <p>
                <i>Режиссер: </i>
                <i id="popupProducer"></i>
            </p>

            <p>
                <i>Актеры: </i>
                <i id="popupActors"></i>
            </p>

            <p>
                <i>Время: </i>
                <i id="popupLength"></i>
            </p>

            <p>
                <i>Качество: </i>
                <i id="popupQuality"></i>
            </p>
        </div>

        <div>
            <p>
                <i id="popupSubject"></i>
            </p>
        </div>

    </div>
</div>

</body>
</html>

