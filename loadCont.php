<?php
$offset = 0;
$limit = 100;
$listMovies = [];
do {
    $request = "http://78.140.13.90:8080/api/feed?limit=$limit&offset=$offset";
    $json = file_get_contents($request);
    $obj = json_decode($json, true);      // Получили массив с фильмами
    if (count($obj) > 0) {
        array_push($listMovies, $obj);
    } else {
        break;
    };
    $offset = $offset + $limit;
} while (true);
echo count($listMovies);
$listMovies = serialize($listMovies);


if (file_exists('C:\OpenServer\domains\Notifier\jsonCont.json')) {
    $handle = fopen('C:\OpenServer\domains\Notifier\jsonCont.json', 'r+');
} else {
    $handle = fopen('jsonCont.json', 'x+');
};

fwrite($handle, $listMovies);
