<?php
$url = explode("/", $_SERVER['REQUEST_URI']);
$lastRoute = $url[sizeof($url)-1];

if ($lastRoute != '' && $lastRoute != 'registre' && $lastRoute != 'login' && $lastRoute != 'missatges' && substr($lastRoute, 0, 8) != 'historia')
    $_SESSION["lastRoute"] = $lastRoute;

