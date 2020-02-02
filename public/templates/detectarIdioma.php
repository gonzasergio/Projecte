<?php

$path = strtolower($_SERVER['REQUEST_URI']);
$url = explode('/', $path);

if(array_key_exists($url[1], $lang)){
    $_SESSION['idioma'] = $url[1];
    $idioma = $url[1];
} else {

    if (!isset($_SESSION["idioma"])) {
        if (in_array(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2), array_keys($lang))) {
            $idioma = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        } else {
            $idioma = "en";
        }
    } else {
        $idioma = $_SESSION["idioma"];
    }

}
