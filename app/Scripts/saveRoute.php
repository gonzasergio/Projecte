<?php
$lastRoute = basename($_SERVER['REQUEST_URI']);

if ($lastRoute != 'registre.php' && $lastRoute != 'login.php')
    $_SESSION["lastRoute"] = $lastRoute;
