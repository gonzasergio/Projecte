<?php
$lastRoute = basename($_SERVER['REQUEST_URI']);

if ($lastRoute != 'registre.php' && $lastRoute != 'login.php' && substr($lastRoute, 0, 12) != 'historia.php')
    $_SESSION["lastRoute"] = $lastRoute;

if (substr($lastRoute, 0, 12) == 'historia.php')
    $_SESSION["lastRoute"] = "social.php";

if ($lastRoute == "html")
    $_SESSION["lastRoute"] = "index.php";
