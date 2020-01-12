<?php
include '../templates/globalIclude.php';
include '../../app/Model/Rute.php';

$array = [];
$sql = "SELECT * FROM rutes";
$title =  $lang[$idioma]["courses"];
include $template["routeList"];