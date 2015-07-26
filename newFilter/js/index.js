/*Simple example of using ng-animate with css animations in AngularJS - based on an idea at nganimate.org. Note this example uses Angular v1.1.5 and the approach/syntax is going to  changed a little in v1.2 which will be released soon  */

/*
type some text into the filter field eg "pp" (without the quotes) and non matching songes animate off screen
*/

function myCtrl($scope,$http){
    $scope.songs=['Sgt. Peppers Lonely Hearts Club Band','With a Little Help from My Friends','Lucy in the Sky with Diamonds','Getting Better' ,'Fixing a Hole','Shes Leaving Home','Being for the Benefit of Mr. Kite!' ,'Within You Without You','When Im Sixty-Four','Lovely Rita','Good Morning Good Morning','Sgt. Peppers Lonely Hearts Club Band (Reprise)','A Day in the Life'];


    $http.jsonp('http://80.89.201.98:8080/notifyme/feed?jsonp=JSON_CALLBACK'+'&callback=JSON_CALLBACK').
        success(function(data) {
            $scope.data = data;
            $scope.name = data.title;
            $scope.salutation = data.picture;
            $scope.greeting = data.picture_big;
        }).
        error(function (data) {
            $scope.data = "Request failed";
        });
}
