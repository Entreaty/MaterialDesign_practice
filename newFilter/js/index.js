var dataGlobal = [];
var bagTitle = [];


$.ajax({
    url: "http://78.140.13.90:8080/api/feed?limit=60&offset=0",
    dataType: "json",
    type: "GET",
    success: function (data) {
        dataGlobal=dataGlobal.concat(data);
        $.each(data, function (i) {
            $(".films").append(
                '<div class="testCell mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--2-col-phone">' +
                    '<img class="testPoster" style="width: 100%;height: 200px" src="' + data[i].posterUrl + '">' +
                '<br>' +
                '<p class="testTitle">' +
                '<a class="popupBtn" href="#?id='+data[i].id+'">"'+data[i].title.split(' /')[0] + '<br>' +
                data[i].year + ', ' + data[i].country + '<br>' +
                data[i].genre.toLowerCase() +'</a>'+
                '</p>' +
                '</div>');
        });
    },
    beforeSend: function () {
        //$('#output').scrollTop(0.5 * (document.getElementById('output').scrollHeight));
    }
});

$('#output').ready(function () {
    var limit = 30;
    var offset = 2;

    function scrolling() {
        $('#output').on("scroll", function () {
            if (($('#output').scrollTop() + document.getElementById('output').offsetHeight)
                >= 0.75 * (document.getElementById('output').scrollHeight)) {
                loader();
            }
        });
    }

    function loader() {
        if (wait === true) {
            $.ajax({
                url: "http://78.140.13.90:8080/api/feed",
                dataType: "json",
                type: "GET",
                data: {limit: limit, offset: offset * limit},
                success: onAjaxSuccess,
                beforeSend: function () {
                    wait = false;
                }
            });
        }

        function onAjaxSuccess(data) {
            offset++;
            dataGlobal=dataGlobal.concat(data);
            $.each(data, function (i) {
                if(data[i].genre){
                    if(data[i].posterUrl == null){data[i].posterUrl ='http://sanctuary.prelucid.com/images/2012/3/10_1332199655.jpg'};
                $(".films").append(
                '<div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--2-col-phone">' +
                '<img class="testPoster" style="width: 100%;height: 200px" src="' + data[i].posterUrl + '">' +
                '<br>' +
                '<p class="testTitle">' +
                '<a class="popupBtn" href="#?id='+data[i].id+'">"'+data[i].title.split(' /')[0] + '<br>' +
                data[i].year + ', ' + data[i].country + '<br>' +
                data[i].genre.toLowerCase() +'</a>'+
                '</p>' +
                '</div>');}
                else{bagTitle[i] = (data[i].title)}
                wait = true;

            });
        }


    }

    wait = true;
    $("#output").on("scroll.once", scrolling);
});


function loadPage() {
    document.getElementById('content').classList.remove('unvisible');
    document.getElementById('loading').classList.add('unvisible');

}


function scrollWidth(){var div = $('<div>').css({
            position: "absolute",
            top: "0px",
            left: "0px",
            width: "100px",
            height: "100px",
            visibility: "hidden",
            overflow: "scroll"
        });$('body').eq(0).append(div);var width = div.get(0).offsetWidth - div.get(0).clientWidth;div.remove();return width;}

function designN(){
    var aaa  = document.getElementById('body').clientWidth - scrollWidth();
    var ccc  = document.getElementById('body').clientHeight;
    $("#menu").css({"width": 0.8*aaa, 'background-color':'orange', 'margin-left':0.1*aaa});
    $("#content").css({"width": 0.8*aaa, 'margin-left':0.1*aaa});
    $("#popup").css({"width": 0.7*aaa, 'margin-left':0.15*aaa, 'margin-top':0.1*ccc, 'margin-bottom':0.1*ccc});
    $(".popupCloseBtn").css({'position':'absolute','top':'5px', 'right':'5px'});
}


$(window).resize( designN);




$(document).ready(function () {

    designN();

    $(window).on('popstate',function(){
        var urlGET = window.location.href; // получаем параметры из урла
        var idGET = urlGET.split('?')[1];
        var idGET = idGET.split('=')[1];
        var idGET = idGET.split('&')[0];
        jQuery.each(dataGlobal,function(i){
            if(dataGlobal[i].id == idGET){
                $('.popupPoster').attr('src', dataGlobal[i].posterUrl );
                $("#popupCategory").html(dataGlobal[i].category);
                $("#popupYear").html(dataGlobal[i].year);
                $(".popupTitle").html(dataGlobal[i].title);
                $("#popupGenre").html(dataGlobal[i].genre);
                $("#popupProducer").html(dataGlobal[i].producer);
                $("#popupActors").html(dataGlobal[i].actors);
                $("#popupCountry").html(dataGlobal[i].country);
                $("#popupLength").html(dataGlobal[i].length);
                $("#popupQuality").html(dataGlobal[i].quality);
                $("#popupSubject").html(dataGlobal[i].subject);
            }
        });
    });


    $('#see').click(function(){
        alert(dataGlobal);
        alert(bagTitle);
    });



    $('.popupBtn').on("click",'a.popupBtn', function () {
        $('.overlay').fadeIn();
        $('.popupShow').fadeIn();
        document.getElementById('output').classList.add('fixed');
        document.getElementById('popup').classList.remove('fixed');
    });

    $('.popupCloseBtn,.overlay').on("click", function(){
        document.getElementById('output').classList.remove('fixed');
        document.getElementById('popup').classList.add('fixed');
        $('.overlay').fadeOut("slow");
        $('.popupShow').fadeOut("slow");
    })
});

