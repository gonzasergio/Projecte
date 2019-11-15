<?php
include '../templates/globalIclude.php';
include '../../app/BDConnectio/DBConnection.php';
include '../../app/Model/Rute.php';

$sql = "SELECT * FROM rutes;";
$title =  $lang[$idioma]["routeList"];
include '../templates/routeList.php';
