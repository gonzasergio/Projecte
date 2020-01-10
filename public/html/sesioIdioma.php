<?php
$_SESSION["idioma"] = $_POST["language"];
$idioma = [$_SESSION["idioma"]];
$url = explode('/', $_SERVER['HTTP_REFERER']);
$idiomas = ['es', 'en', 'fr', 'ca' ];

var_dump($url);

foreach ($idiomas as $i) {
    if (($key = array_search($i, $url)) !== false) {
        unset($url[$key]);
    }
}

var_dump($url);

array_splice( $url, sizeof($url)-1 , 0, $idioma );

$path = '';

for ($i = 0 ; $i < sizeof($url) ; $i++){
    $col = ($i !== sizeof($url)-1) ? '/' : '';
    $path = $path . $url[$i] . $col;
}

header('Location: '  . $path);