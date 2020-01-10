<?php
$_SESSION["idioma"] = $_POST["language"];
$idioma = [$_SESSION["idioma"]];
$url = explode('/', $_SERVER['HTTP_REFERER']);
$idiomas = ['es', 'en', 'fr', 'ca' ];


foreach ($idiomas as $i) {
    if (($key = array_search($i, $url)) !== false) {
        unset($url[$key]);
    }
}


array_splice( $url, sizeof($url)-1 , 0, $idioma );

$path = '';

for ($i = 0 ; $i < sizeof($url) ; $i++){
    $col = ($i !== sizeof($url)-1) ? '/' : '';
    $path = $path . $url[$i] . $col;
}

header('Location: '  . $path);