var listMovies = [];
var bagTitle = [];
wait = true;
url = "http://78.140.13.90:8080/api/feed";
firstLoadLimit = 60;
firstLoadOffset = 0;
var limit = 30;
var offset = 1;

$('body').one("ready", ajaxCall(url, firstLoadLimit, firstLoadOffset));

$(window).ready(function () {

    $('#output').on("scroll", function scrolling() {

        if (($('#output').scrollTop() + document.getElementById('output').offsetHeight)
            >= 0.75 * (document.getElementById('output').scrollHeight)) {

            ajaxCall(url, limit, offset);

        }

    });


});

function ajaxCall(url, limit, offset) {


    if (wait === true) {

        $.ajax({
            url: url,
            dataType: "json",
            type: "GET",
            data: {limit: limit, offset: offset * limit},
            success: fillingContent,
            beforeSend: function () {
                wait = false;
                //$('#output').scrollTop(0.5 * (document.getElementById('output').scrollHeight));
            }
        });

    }


}

function fillingContent(data) {
    offset++;
    listMovies = listMovies.concat(data);
    $.each(data, function (i) {
        if (data[i].genre) {
            if (data[i].posterUrl == null) {
                data[i].posterUrl = 'http://sanctuary.prelucid.com/images/2012/3/10_1332199655.jpg'
            }
            $(".films").append(
                '<a class=" popupBtn mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--2-col-phone" href="#?id=' + data[i].id + '">' +
                '<div class="testTicket"><img class="testPoster" style="width: 150px;height: 200px" src="' + data[i].posterUrl + '">' +
                '<p class="testTitle1">' +data[i].title.split(' /')[0] + '</p>' +
                '<p class="testTitle2" style="">'+data[i].year + ', ' + data[i].country +'</p>' +
                 '</div></a>');
        }
        else {
            bagTitle[i] = (data[i].title)
        }
        wait = true;

    });
}


function loadPage() {
    document.getElementById('content').classList.remove('unvisible');
    document.getElementById('menu').classList.remove('unvisible');
    document.getElementById('search').classList.remove('unvisible');
    document.getElementById('tabs').classList.remove('unvisible');
    document.getElementById('loading').classList.add('unvisible');
    $(".mdl-layout__drawer-button").addClass('mdl-layout--small-screen-only');
}


function scrollWidth() {
    var div = $('<div>').css({
        position: "absolute",
        top: "0px",
        left: "0px",
        width: "100px",
        height: "100px",
        visibility: "hidden",
        overflow: "scroll"
    });
    $('body').eq(0).append(div);
    var width = div.get(0).offsetWidth - div.get(0).clientWidth;
    div.remove();
    return width;
}

function designN() {
    var aaa = document.getElementById('body').clientWidth - scrollWidth();
    var ccc = document.getElementById('body').clientHeight;
    if(1024<aaa){
        //PC
        $("#menu").css({"width": 0.8 * aaa, 'background-color': 'orange', 'margin-left': 0.1 * aaa});
        $("#content").css({"width": 0.8 * aaa, 'margin-left': 0.1 * aaa});
        $("#popup").css({"width": 0.6 * aaa,'margin-left': 0.2 * aaa,'margin-top': 0.03 * ccc,'margin-bottom': 0.1 * ccc});
    }else if((480<aaa)&&(aaa<=1024)){
        //Tablet
        $("#menu").css({"width": '100%', 'background-color': 'orange', 'margin':'auto'});
        $("#content").css({"width": '100%', 'margin':'auto'});
        $("#popup").css({"width": aaa,'margin-left': 0,'margin-top': '48px','margin-bottom': '48px'});
        //$(".popupPoster").css({"width": '100%','margin': '0'});
    }else if(aaa<=480){
        //Phone
        $("#menu").css({"width": '100%', 'background-color': 'orange', 'margin':'auto'});
        $("#content").css({"width": '100%', 'margin':'auto'});
        $("#popup").css({"width": '100%','margin': '0'});
        //$(".popupPoster").css({"width": '100%','margin': '0'});
    }
    //$("#menu").css({"width": 0.8 * aaa, 'background-color': 'orange', 'margin-left': 0.1 * aaa});
    //$("#content").css({"width": 0.8 * aaa, 'margin-left': 0.1 * aaa});
    //$("#popup").css({"width": 0.7 * aaa,'margin-left': 0.15 * aaa,'margin-top': 0.1 * ccc,'margin-bottom': 0.1 * ccc});
    $(".popupCloseBtn").css({'position': 'absolute', 'top': '5px', 'right': '5px'});
}


$(window).resize(designN);


$(document).ready(function () {

    designN();

    $(window).on('popstate', function () {
        var urlGET = window.location.href; // получаем параметры из урла
        var idGET = urlGET.split('id=')[1];
        //var idGET = idGET.split('=')[1];
        //var idGET = idGET.split('&')[0];
        jQuery.each(listMovies, function (i) {
            if (listMovies[i].id == idGET) {
                $('.popupPoster').attr('src', listMovies[i].posterUrl);
                $("#popupCategory").html(listMovies[i].category);
                $("#popupYear").html(listMovies[i].year);
                $(".popupTitle").html(listMovies[i].title);
                $("#popupGenre").html(listMovies[i].genre);
                $("#popupProducer").html(listMovies[i].producer);
                $("#popupActors").html(listMovies[i].actors);
                $("#popupCountry").html(listMovies[i].country);
                $("#popupLength").html(listMovies[i].length);
                $("#popupQuality").html(listMovies[i].quality);
                $("#popupSubject").html(listMovies[i].subject);
            }
        });
    });


    $('#see').click(function () {
        //alert(listMovies);
        //alert(bagTitle);
        var x = document.getElementById('lannisters-panel');    // получаем параметр
        x.innerHTML = 'TEST';
    });
    $('#see2').click(function () {
        $.ajax({
            url: './server.php',
            dataType: "text",
            type: "POST",
            data: {id:'menu', limit:100, offset:0},
            success: function(data){alert(data);
            },
            beforeSend: function () {
            }
        });
    });


    $('.popupBtn').on("click", 'a.popupBtn, img.popupBtn, div.popupBtn', function () {
        $('.overlay').fadeIn();
        $('.popupShow').fadeIn();
        document.getElementById('output').classList.add('fixed');
        document.getElementById('popup').classList.remove('fixed');
    });

    $('.popupCloseBtn,.overlay').on("click", function () {
        document.getElementById('output').classList.remove('fixed');
        document.getElementById('popup').classList.add('fixed');
        $('.overlay').fadeOut("slow");
        $('.popupShow').fadeOut(0);
    })
});

//(function (global, name, def) {
//    if (typeof (define) == 'function' && define['amd']) define(name, def);
//    else global[name] = def();
//}) (this, 'loadImage', function () {
//    return function (imageSrc, done) {
//        var q = new Promise(function (res, rej) {
//            var img = new Image();
//            img.src = imageSrc;
//            img.onerror = function (e) {
//                rej(e);
//            };
//            img.onload = function (e) {
//                res(img);
//            };
//            if (img.complete) res(img);
//        });
//        return q;
//    }
//});
//url2='http://www.kokoko.ru/uploads/posts/1208420453_14.jpg';
//
//loadImage(url2).then(function (img) {
//
//    x = img.height/200;
//    y = img.width/x;
//    m = (y - 150)/2;
//    //alert('Картинка: ' + img.name+ '\nвысота: '+img.height+'\nширина: '+img.width+'\nx: '+x+'\ny: '+y+'\nm: '+m);
//    $(".serials").append('<div style="height: 200px; width: 150px;overflow: hidden"><img style="height: 200px; margin:0 -'+m+'px" src="'+url2+'"></div>');
//}, function (e) {
//    alert('Ошибка при загрузке картинки: ' + e);
//});
