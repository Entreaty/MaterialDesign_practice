/*Simple example of using ng-animate with css animations in AngularJS - based on an idea at nganimate.org. Note this example uses Angular v1.1.5 and the approach/syntax is going to  changed a little in v1.2 which will be released soon  */

/*
 type some text into the filter field eg "pp" (without the quotes) and non matching songes animate off screen
 */

function myFunction() {
    alert("Просто Height : " + document.getElementById('output').offsetHeight+"\nВся страничка длиной: " + document.getElementById('output').scrollHeight+"\nсмещение scrollbar: " + $('.mdl-layout__content').scrollTop()+", \nВысота окна контента: " + $('.mdl-layout__content').height()+', \nВысота всей странички: '+document.body.clientHeight+', \nВысота экрана разрешение: '+screen.height+', \nРазница смещения скрола и высоты боди элемента= '+(document.getElementById('output').scrollHeight-$('.mdl-layout__content').scrollTop()));
//    alert($('.mdl-layout__content').scrollTop());
}

function myCtrl($scope, $http) {
    //$scope.songs=['Sgt. Peppers Lonely Hearts Club Band','With a Little Help from My Friends','Lucy in the Sky with Diamonds','Getting Better' ,'Fixing a Hole','Shes Leaving Home','Being for the Benefit of Mr. Kite!' ,'Within You Without You','When Im Sixty-Four','Lovely Rita','Good Morning Good Morning','Sgt. Peppers Lonely Hearts Club Band (Reprise)','A Day in the Life'];


    $http.jsonp('http://78.140.13.90:8080/api/feed?jsonp=JSON_CALLBACK&limit=49&offset=0').
        success(function (data) {
            $scope.data = data;
        }).
        error(function (data) {
            $scope.data = "Request failed";
        });
    //$http.jsonp('http://80.89.201.98:8080/notifyme/feed?jsonp=JSON_CALLBACK'+'&callback=JSON_CALLBACK').
    //    success(function(data) {
    //        $scope.data = data;
    //        $scope.name = data.title;
    //        $scope.salutation = data.picture;
    //        $scope.greeting = data.picture_big;
    //    }).
    //    error(function (data) {
    //        $scope.data = "Request failed";
    //    });
}

$(document).ready(function (e) {
    var limit = 20;
    var offset = 0;
    var tagId = '#output2';
    $('#output').on("scroll", function () {
        if (($('.mdl-layout__content').scrollTop() + document.getElementById('output').offsetHeight) >= 0.95 * (document.getElementById('output').scrollHeight)) {
            //window.alert('end');
            loader();
        }
    });
    function loader() {
        $.ajax({
            type: "GET",
            url: 'http://78.140.13.90:8080/api/feed',
            dataType: "json",
            data: "limit=" + limit + '&offset=' + offset*limit,
            crossDomain: true,
            success: onAjaxSuccess
        });

        function onAjaxSuccess(data) {
            for (i = 0; i < 20; i++) {
                $(tagId).append(data[i].title + '<br>');
            }
        }

        offset++;
    }
});
