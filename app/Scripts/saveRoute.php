<?php
$url = explode("/", $_SERVER['REQUEST_URI']);
$lastRoute = $url[sizeof($url)-1];
if ($lastRoute != 'registre' && $lastRoute != 'login' && substr($lastRoute, 0, 8) != 'historia')
    $_SESSION["lastRoute"] = $lastRoute;

if ($lastRoute == "")
    $_SESSION["lastRoute"] = "inici";