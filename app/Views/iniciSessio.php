<?php
include '../templates/links.php';
session_start();
$_SESSION["AUTH"]=true;
$_SESSION["user"]=ucfirst(strtolower($_POST['name']));
if (isset($_SESSION["lastRoute"])){
    $url = ($_SESSION["lastRoute"] == '') ? $link["inici"] : $_SESSION["lastRoute"];
    header("Location: $url ");
} else {
    header("Location: ".$link["inici"]);
}