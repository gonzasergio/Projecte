<?php
$DBConf = null;
require_once '../../app/BDConnectio/DBConfig.php';

$servername = $DBConf["servername"];
$username = $DBConf["username"];
$password = $DBConf["password"];
$dbname = $DBConf["dbname"];

$conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_GET["name"])) {
    $name = "'" . $_GET["name"] . "'";
    $stmt = $conn->prepare("SELECT * FROM persona where nom = $name");
}else{
$stmt = $conn->prepare("SELECT * FROM persona ");
}

$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($outp);