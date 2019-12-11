<?php
include '../templates/globalIclude.php';
include '../../app/BDConnectio/DBConnection.php';
include '../../app/Model/Rute.php';

$array = [];
$nom = $_SESSION["user"];
$sql = "SELECT * FROM rutes where user_nom = '$nom'";
$title =  $lang[$idioma]["myCourses"];
include $template["routeList"];