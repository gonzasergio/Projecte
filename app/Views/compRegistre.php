<?php
include '../templates/links.php';

$array = [];
$user = $_REQUEST["name"];
$pass = $_REQUEST["pass"];
$sql = "SELECT * FROM persona where nom = '$user'";
$insert = 'INSERT INTO persona VALUES("'.$user.'", "'.$pass.'")';
$stmt = DBConnection::getInstance()->getConnection()->prepare($sql);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    $array[] = $row;
}

if ($array){
    echo "1";
} else {
    $stmt = DBConnection::getInstance()->getConnection()->prepare($insert);
    $stmt->execute();
    echo "0";
}