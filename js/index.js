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
                '<a class="popupBtn mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--2-col-phone" href="#?id=' + data[i].id + '">' +
                '<div class="">' +
                '<img class=" testPoster" style="width: 100%;height: 200px" src="' + data[i].posterUrl + '">' +
                '<br>' +
                '<p>' +
                 data[i].title.split(' /')[0] + '<br>' +
                data[i].year + ', ' + data[i].country + '<br>' +
                data[i].genre.toLowerCase()  +
                '</p>' +
                '</div>'+ '</a>');
        }
        else {
            bagTitle[i] = (data[i].title)
        }
        wait = true;

    });
}


function loadPage() {
    document.getElementById('content').classList.remove('unvisible');
    document.getElementById('loading').classList.add('unvisible');
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
    $("#menu").css({"width": 0.8 * aaa, 'background-color': 'orange', 'margin-left': 0.1 * aaa});
    $("#content").css({"width": 0.8 * aaa, 'margin-left': 0.1 * aaa});
    $("#popup").css({
        "width": 0.7 * aaa,
        'margin-left': 0.15 * aaa,
        'margin-top': 0.1 * ccc,
        'margin-bottom': 0.1 * ccc
    });
    $(".popupCloseBtn").css({'position': 'absolute', 'top': '5px', 'right': '5px'});
}


$(window).resize(designN);


$(document).ready(function () {

    designN();

    $(window).on('popstate', function () {
        var urlGET = window.location.href; // получаем параметры из урла
        var idGET = urlGET.split('?')[1];
        var idGET = idGET.split('=')[1];
        var idGET = idGET.split('&')[0];
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
        alert(listMovies);
        alert(bagTitle);
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

