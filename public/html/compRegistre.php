<?php
include '../templates/links.php';

$DBConf = null;
require_once '../../app/BDConnectio/DBConfig.php';

$servername = $DBConf["servername"];
$username = $DBConf["username"];
$password = $DBConf["password"];
$dbname = $DBConf["dbname"];

$user = "'". $_POST["name"] . "'";
$pass = "'". $_POST["pass"] . "'";

$conn = new mysqli($servername, $username, $password, $dbname);

$insert = "insert into persona values($user, $pass)";
$conn->query($insert);

header("Location: " . $link["login"]);