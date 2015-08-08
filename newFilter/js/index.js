function myCtrl($scope, $http) {
    var limit = 20;
    var offset = 0;
    $scope.data = [];
    $http.jsonp('http://78.140.13.90:8080/api/feed?jsonp=JSON_CALLBACK&limit=50&offset=0')
        .success(function (data) {
            $scope.data = $scope.data.concat(data);
            //$('#output').unbind("scroll");
            //$('#output').unbind("scroll", Ebar());
            //$scope.data[0]['id'] += 're';
            //$scope.BD = data;
            //$scope.data[0]['title'] += 1;
            //alert($scope.BD);
            //alert($scope.data[0]['title']);
        });


        function Ebw() {
            //window.alert('aa');
            return $http.jsonp('http://78.140.13.90:8080/api/feed?jsonp=JSON_CALLBACK&limit=' + limit + '&offset=' + offset * limit)
                .success(function (data) {
                    $scope.data = $scope.data.concat(data);

                    offset++;
                    //$('#output').unbind("scroll");
                    //$('#output').unbind("scroll", Ebar());
                    //$scope.data[0]['id'] += 're';
                    //$scope.BD = data;
                    //$scope.data[0]['title'] += 1;
                    //alert($scope.BD);
                    //alert($scope.data[0]['title']);
                });

        }
    $('#output').on("scroll", function () {
        if (($('.mdl-layout__content').scrollTop() + document.getElementById('output').offsetHeight)
            >= 0.75 * (document.getElementById('output').scrollHeight)) {
            $scope.$apply();
            //window.alert('end');
            Ebw();
        }
    });


}