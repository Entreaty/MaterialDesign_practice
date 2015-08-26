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
        a{
            text-decoration: none;
        }
        .unvisible {
            display: none;
        }

        .testPoster:hover {
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, .14), 0 5px 3px -4px rgba(0, 0, 0, .2), 0 3px 7px 0 rgba(0, 0, 0, .12);
        }

        .testTitle:hover {
        }
.testCell:hover{
    cursor: pointer;
    color: red;
    transition-timing-function: ease-out;
    transition-duration: 250ms;
}
    </style>

</head>
<body style="background-color: lightgray" onload="loadPage()" id="body">

<div id="loading" class="loading-bro">
    <h1>Loading</h1>
    <svg id="load" x="0px" y="0px" viewBox="0 0 150 150">
        <circle id="loading-inner" cx="75" cy="75" r="60"/>
    </svg>
</div>

<!-- Simple header with scrollable tabs. -->
<div  id="output" class=" mdl-layout mdl-js-layout mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
    <!--Верхнее меню -->
    <div style="
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
    /*min-width: 90%;*/
    /*margin-right: 17px;*/
    /*margin-left: half-width;*/
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
    align-items: center" id="menu">
        <div class="mdl-layout-spacer"></div>
        <!-- Поиск в обычном режиме -->
        <form action="#" method="get">
            <div class="mdl-textfield mdl-js-textfield mdl-layout--large-screen-only">
                <input ng-model="search" class="mdl-textfield__input" name="searchRequest" type="text"
                       id="sample3"/><label
                    class="mdl-textfield__label" for="sample3">Введите название или
                    категорию...
                    <button style="visibility: hidden" type="submit" id="sample4"></button>
                </label>
            </div>
        </form>

        <!-- Spaceer -->
        <div class="mdl-layout-spacer mdl-layout--large-screen-only"></div>
        <div class="mdl-tabs__tab-bar mdl-layout--large-screen-only">
            <a href="#starks-panel" class="mdl-tabs__tab is-active">Фильмы</a>
            <a href="#lannisters-panel" class="mdl-tabs__tab">Сериалы</a>
            <a href="#targaryens-panel" class="mdl-tabs__tab">Игры</a>
            <a href="#targaryens-panel" class="mdl-tabs__tab">Музыка</a>
            <a href="#targaryens-panel" class="mdl-tabs__tab">Аниме</a>
            <a href="#targaryens-panel" class="mdl-tabs__tab">Мультфильмы</a>
        </div>
        <div class="mdl-layout-spacer mdl-layout--large-screen-only"></div>
    </div>

    <div style="background-color: white; padding:100px 0;width:80%;margin-left:10%" id="content" class="unvisible">


        <div class="mdl-tabs__panel is-active" id="starks-panel">
            <div class="films popupBtn demo-grid-ruller mdl-grid"></div>
        </div>


        <div class="mdl-tabs__panel" id="lannisters-panel">
            <button id="see">XXX</button>
            <div class="films popupBtn demo-grid-ruller mdl-grid"></div>
        </div>


        <div class="mdl-tabs__panel" id="targaryens-panel">
            <ul>
                <li>Viserys</li>
                <li>Daenerys</li>
            </ul>
        </div>


    </div>


</div>

<style>
    .overlay{
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        min-height: 100%;
        background: rgba(0, 0, 0, 0.7);
        z-index: 997;
        /*cursor: pointer;*/
    }
    .popupShow{
        display: none;
        position: absolute;
        z-index: 999 !important;
        /*width: 75%;*/
        min-height: 800px;
        /*margin: 5% 12.5%;*/
        background: #FFF;
        cursor: default;
    }
    .popupCloseBtn{
        /*left:85%;*/
        /*bottom:90%;*/
    }
    .fixed{
        overflow: hidden;
        position: fixed;
        /*display: none;*/
    }
    .marg{
        margin-left: 17px;
        margin-right: 17px;
    }
</style>



<section class="overlay" id="shirm"></section>

<div class="popupShow" id="popup">
    <button  class="popupCloseBtn" >X</button>


    <span id="popupCategory">Фильмы, </span><span id="popupYear"></span>

    <h1 class="popupTitle"></h1>

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

