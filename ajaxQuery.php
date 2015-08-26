<?php
if(isset($_POST['src'])){
    header("Content-type: text/txt; charset=UTF-8");
    $src = $_POST['src'];
    if ($src == 'undefined'){$src = 'http://sanctuary.prelucid.com/images/2012/3/10_1332199655.jpg';};
    $headers = get_headers($src);
    list($proto, $code, $descr) = explode(' ', $headers[0], 3);
    var_dump($proto);
    var_dump($code);
    var_dump($descr);
    echo ($code);
    if( $code == '404'){$_POST['result'] = true;};
}
