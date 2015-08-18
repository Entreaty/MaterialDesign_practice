<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width, initial-scale=1.0" charset="UTF-8">
    <title></title>

    <link rel="stylesheet" href="./MDL/material.min.css">
    <script src="./MDL/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!--    JQuery-->
    <script src="./jquery-2.1.4.js"></script>

    <!--AngularJS Filter-->
    <script src="./newFilter/js/index.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.1.5/angular.min.js'></script>
    <!--    Parallax-->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="Parallax/js/index.js"></script>
    <style>
        /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
        @import url(http://fonts.googleapis.com/css?family=Roboto:400,300);
        .loading-bro {
            top: 25%;
            left: 45%;
            /*padding: 25% 25%;*/
            /*margin: 25% auto;*/
            width: 150px;
            position: fixed;
        }
        .loading-bro > h1 {
            width: 75%;
            text-align: center;
            font-size: 2.5em;
            margin-bottom: 1em;
            font-weight: 300;
            color: #8E8E8E;
        }

        #load {
            width: 75%;
            animation: loading 3s linear infinite;
        }
        #load #loading-inner {
            stroke-dashoffset: 0;
            stroke-dasharray: 300;
            stroke-width: 10;
            stroke-miterlimit: 10;
            stroke-linecap: round;
            animation: loading-circle 2s linear infinite;
            stroke: #51BBA7;
            fill: transparent;
        }

        @keyframes loading {
            0% {
                transform: rotate(0);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        @keyframes loading-circle {
            0% {
                stroke-dashoffset: 0;
            }
            100% {
                stroke-dashoffset: -600;
            }
        }

    </style>
    <style>
        .unvisible{
            display: none;
        }
    </style>

</head>
<body onload="loadPage()" ng-app>

<div id="loading" class="loading-bro">
    <h1>Loading</h1>
    <svg id="load" x="0px" y="0px" viewBox="0 0 150 150">
        <circle id="loading-inner" cx="75" cy="75" r="60"/>
    </svg>
</div>

<!-- Simple header with scrollable tabs. -->
<div     id="output" class="unvisible mdl-layout mdl-js-layout ">
    <!--Верхнее меню -->
    <div  class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
    <div
        style="
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
    width: 90%;
    margin-left: 5%;
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
    align-items: center"
        >
        <div class="mdl-layout-spacer"></div>
        <!-- Поиск в обычном режиме -->
        <form action="#" method="get">
            <div class="mdl-textfield mdl-js-textfield ">
                <input ng-model="search" class="mdl-textfield__input" name="searchRequest" type="text" id="sample3"/><label
                    class="mdl-textfield__label" for="sample3" >Введите название или
                    категорию...
                    <button style="visibility: hidden" type="submit" id="sample4"></button>
                </label>
            </div>
        </form>

        <!-- Spaceer -->
        <div class="mdl-layout-spacer"></div>
        <div  class="mdl-tabs__tab-bar">
            <a href="#starks-panel" class="mdl-tabs__tab is-active">Фильмы</a>
            <a href="#lannisters-panel" class="mdl-tabs__tab">Сериалы</a>
            <a href="#targaryens-panel" class="mdl-tabs__tab">Игры</a>
            <a href="#targaryens-panel" class="mdl-tabs__tab">Музыка</a>
            <a href="#targaryens-panel" class="mdl-tabs__tab">Аниме</a>
            <a href="#targaryens-panel" class="mdl-tabs__tab">Мультфильмы</a>
        </div>
        <div class="mdl-layout-spacer"></div>
    </div>





        <div style="padding:100px 0;width:80%;margin-left:10%" class="mdl-tabs__panel is-active" id="starks-panel" ng-controller="myCtrl">
            <!-- Your content goes here -->
            <div id="output2" class="demo-grid-ruller mdl-grid">
                <div ng-animate="'animate'"
                     ng-repeat="result in data | filter:search"
                     align="center"
                     class="mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--2-col-phone">
<!--                                                                        <img style="width: 150px;height: 200px" src="{{result.posterUrl}}">-->
                    <a style="text-align: start; text-decoration: none;" href="Card.php?title={{result.title}}">
                        <h5>
                            {{result.title}}
                        </h5>
                        <h5></h5>
                    </a>
                </div>
            </div>

        </div>
        <div class="mdl-tabs__panel" id="lannisters-panel">
            <ul>
                <li>Tywin</li>
                <li>Cersei</li>
                <li>Jamie</li>
                <li>Tyrion</li>
            </ul>
        </div>
        <div class="mdl-tabs__panel" id="targaryens-panel">
            <ul>
                <li>Viserys</li>
                <li>Daenerys</li>
            </ul>
        </div>
    </div>
    <!-- mainContent-->

</div>


</body>
</html>

