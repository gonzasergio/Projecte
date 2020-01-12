<?php
include '../templates/globalIclude.php';
include '../../app/Model/Rute.php';

if (!(isset($_SESSION["AUTH"]))){
    header("Location: ".$link["login"]);
}

$array = [];
$nom = $_SESSION["user"];
$sql = "SELECT * FROM rutes where user_nom = '$nom'";
$title =  $lang[$idioma]["myRoute"];
include $template["routeList"];