<?php
$handle = fopen('C:\OpenServer\domains\Notifier\jsonCont.json', 'r');
$listMovies = unserialize(fgets($handle));
ob_start();
for($j=0; $j<2;$j++){
for($i=0; $i<100;$i++){
    ?>

        <a class="popupBtn <?if($j>0) echo'unvisible'?> mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--2-col-phone"
           href="#?id=<?=$listMovies[$j][$i]['id'] ?>">
            <div class=""><img class=" testPoster" style="width: 150px;height: 200px"
                               src="<?=$listMovies[$j][$i]['posterUrl'] ?>">
                <br>

                <p><?=$listMovies[$j][$i]['title'] ?><br><?=$listMovies[$j][$i]['year'] ?>, <?=$listMovies[$j][$i]['country'] ?>
                </p>
            </div>
        </a>
<?php
}}
ob_end_flush();

//function createPageContent($data, $pageN){
//    $handle = fopen('page_'.$pageN, 'r+');


//    $dom = new DOMDocument('1.0', 'utf-8');
//    $elementDiv = $dom->createElement('div', '');
//    $elementDiv = $dom->createAttribute('class','demo-grid-ruller mdl-grid');
//    $elementA = $dom->createElement('a', '');
//    $elementA = $dom->createAttribute('class','popupBtn mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--2-col-phone');
//    $elementA = $dom->createAttribute('href','#?id='.'1111');
//    $elementDivInner = $dom->createElement('div', '');
//    $elementImg = $dom->createElement('img', '');
//    $elementImg = $dom->createAttribute('class','testPoster');
//    $elementImg = $dom->createAttribute('style','width: 150px;height: 200px');
//    $elementImg = $dom->createAttribute('src','http://sanctuary.prelucid.com/images/2012/3/10_1332199655.jpg');
//    $elementBr = $dom->createElement('br');
//    $elementP = $dom->createElement('p','Title+br+Year+, + Country');
//
//    $dom->appendChild($elementDiv);
//    $elementDiv->appendChild($elementA);
//    $elementA->appendChild($elementDivInner);
//    $elementDivInner->appendChild($elementImg);
//    $elementDivInner->appendChild($elementBr);
//    $elementDivInner->appendChild($elementP);
//
//    echo $dom->saveXML();
//
//    $dom->loadHTML("./index.php");


//    $pageContent = ;
//    fwrite($handle, $pageContent);



/*
$doc = new DOMDocument();       // Обявляем класс
$doc->loadHTMLFile("test.html");    // Загружаем файл test.html
$element = $doc->createElement('test', 'This is the root element!');    // Создаем новый элемент
$doc->getElementById('test')->appendChild($element);    // Помещаем его внутрь елемента с id = test
echo $doc->saveHTML();  // Сохраняем DOM
$doc->saveHTMLFile("test.html");    // Сохраняем файл test.html
*/
?>