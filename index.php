<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width, initial-scale=1.0" charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./MDL/material.min.css">
    <script src="./MDL/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--    <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.1/material.red-orange.min.css" />-->
    <link rel="stylesheet"
          href="https://storage.googleapis.com/code.getmdl.io/1.0.1/material.blue_grey-indigo.min.css"/>
    <link href="http://allfont.ru/allfont.css?fonts=roboto-condensed-regular" rel="stylesheet" type="text/css"/>
    <!--AngularJS Filter-->
    <link rel="stylesheet" href="./newFilter/css/normalize.css">
    <script src="./newFilter/js/prefixfree.min.js"></script>
    <script src='./AngularJS/angular.min.js'></script>
    <script src="./newFilter/js/index.js"></script>
    <script src="./newFilter/js/index.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.1.5/angular.min.js'></script>
    <!--    Popup window-->
    <!--    Parallax-->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="Parallax/js/index.js"></script>
    <!--    <style>-->
    <!--        .waterfall-demo-header-nav .mdl-navigation__link:last-of-type {-->
    <!--            padding-right: 0;-->
    <!--        }-->
    <!--    </style>-->
    <style>
        a {
            color: dimgray;
            text-decoration: none;
        }

        A:hover {
            /*text-decoration: underline; *//* Добавляем подчеркивание при наведении курсора на ссылку */
            color: orangered;

            /* Ссылка красного цвета */
        }
    </style>
    <style>
        .animate-enter, .animate-leave {
            transition: 200ms ease-in all;
            position: relative;
            display: block;
        }

        .animate-enter.animate-enter-active, .animate-leave {
            left: 0;
        }

        .animate-leave.animate-leave-active, .animate-enter {
            left: 200px;
        }
    </style>
    <style>
        .background {
            /*background: url("http://get.whotrades.com/u3/photo972D/20161575033-0/original.jpeg") repeat;*/
            /*background-size: 140% auto;*/
            /*position: fixed;*/
            /*width: 100%;*/
            /*height: 300%;*/
            /*top: 0;*/
            /*left: 0;*/
            /*z-index: -1*/
            background: rgba(0, 0, 0, 0.5);
        }

        .wrapper {
            min-height: 1200px;
            height: auto;
            width: 75%;
            margin: auto;
            background: #fff;
            opacity: 0.9;
        }
    </style>
</head>
<body ng-app>
<!-- Simple header with scrollable tabs. -->
<div class=" mdl-layout mdl-js-layout mdl-layout--fixed-header ">
<!--Верхнее меню -->
<header class=" mdl-layout__header mdl-layout__header--waterfall">
    <div class="mdl-layout__header-row">
        <!--Navigation-->
        <nav  class="mdl-navigation mdl-cell--hide-tablet mdl-cell--hide-phone">
            <a class="mdl-navigation__link" href="">Фильмы</a>
            <a class="mdl-navigation__link" href="">Сериалы</a>
            <a class="mdl-navigation__link" href="">Музыка</a>
            <a class="mdl-navigation__link" href="">Мультфильмы</a>
            <a class="mdl-navigation__link" href="">Аниме</a>
            <a class="mdl-navigation__link" href="">Игры</a>
        </nav>
        <!-- Title -->
        <!-- Поиск в режиме телефона -->
        <form action="#" method="get">
            <div
                class="mdl-textfield mdl-js-textfield mdl-textfield--expandable textfield-demo mdl-layout--small-screen-only">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="sample6">
                    <i class="material-icons">search</i>
                </label>

                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" id="sample6"/>
                    <label class="mdl-textfield__label" for="sample-expandable">Expandable Input</label>
                </div>
            </div>
        </form>
        <!-- Spaceer -->
        <div class="mdl-layout-spacer"></div>
        <!-- Поиск в обычном режиме -->
        <form action="#" method="get">
            <div style="margin-top: 15pt"
                 class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo mdl-layout--large-screen-only">
                <input class="mdl-textfield__input" name="searchRequest" type="text" id="sample3"/>
                <label class="mdl-textfield__label" for="sample3" style="color:#f5f5f5">Введите название или
                    категорию... </label>
                <button style="visibility: hidden" type="submit" id="sample4"></button>
            </div>
        </form>
        <label class="mdl-button mdl-js-button mdl-button--icon mdl-layout--large-screen-only" for="sample4">
            <i class="material-icons">search</i>
        </label>

        <!-- Filter -->
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
            <label class="mdl-button mdl-js-button mdl-button--icon"
                   for="waterfall-exp">
                <i id="tt2" class="material-icons">filter</i>
            </label>

            <div class="mdl-textfield__expandable-holder">
                <input ng-model="search" class="mdl-textfield__input" type="text" name="sample" id="waterfall-exp"/>
            </div>
            <div style="background-color: #ffffff; color:dimgray" class="mdl-tooltip">
                Фильтр
            </div>
        </div>
        <!-- /Filter -->
    </div>
    <!-- Tabs -->
    <!--        <div class="mdl-layout__tab-bar mdl-js-ripple-effect" style="height: 48px">-->
    <!--            <a href="#scroll-tab-films" class="mdl-layout__tab is-active">Фильмы</a>-->
    <!--            <a href="#scroll-tab-serials" class="mdl-layout__tab">Сериалы</a>-->
    <!--            <a href="#scroll-tab-music" class="mdl-layout__tab">Музыка</a>-->
    <!--            <a href="#scroll-tab-cartoons" class="mdl-layout__tab">Мультфильмы</a>-->
    <!--            <a href="#scroll-tab-anime" class="mdl-layout__tab">Аниме</a>-->
    <!--            <a href="#scroll-tab-games" class="mdl-layout__tab">Игры</a>-->
    <!--        </div>-->
</header>
<!--/Верхнее меню -->
<!-- LeftMenu -->
<div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Чебурда</span>

    <form action="#" method="get">
        <div
            class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo mdl-layout--small-screen-only">
            <input class="mdl-textfield__input" name="searchRequest" type="text" id="sample3"/>
            <label class="mdl-textfield__label" for="sample3" style="color:dimgray">Поиск...</label>
        </div>
    </form>
    <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="">Фильмы</a>
        <a class="mdl-navigation__link" href="">Сериалы</a>
        <a class="mdl-navigation__link" href="">Музыка</a>
        <a class="mdl-navigation__link" href="">Мультфильмы</a>
        <a class="mdl-navigation__link" href="">Аниме</a>
        <a class="mdl-navigation__link" href="">Игры</a>
    </nav>
</div>
<!-- /LeftMenu -->
<!-- mainContent-->
<main class=" mdl-layout__content" ng-controller="myCtrl">
<section class="mdl-layout__tab-panel is-active " id="scroll-tab-films">
    <!-- Your content goes here -->
    <div class="page-content">
        <div class="demo-grid-ruller mdl-grid">
            <div ng-animate="'animate'"
                 ng-repeat="result in data | filter:search"
                 align="center"
                 class="mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                <a href="{{result.picture_big}}">
                    <img src="{{result.picture}}">
                    <a style="text-decoration: none;" href="#popup1">
                        <h5>
                            {{result.title}}
                        </h5>
                    </a>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="mdl-layout__tab-panel" id="scroll-tab-serials">
    <div class="page-content"><!-- Your content goes here --></div>
</section>
<section class="mdl-layout__tab-panel" id="scroll-tab-music">
    <div class="page-content"><!-- Your content goes here --></div>
</section>
<section class="mdl-layout__tab-panel" id="scroll-tab-cartoons">
    <div class="page-content"><!-- Your content goes here --></div>
</section>
<section class="mdl-layout__tab-panel" id="scroll-tab-anime">
    <div class="page-content"><!-- Your content goes here --></div>
</section>
<section class="mdl-layout__tab-panel" id="scroll-tab-games">
    <div class="page-content"><!-- Your content goes here --></div>
</section>
</main>
</div>


</body>
</html>

