<?php
include '../templates/links.php';

$name = $_POST["name"];
$pass = $_POST["pass"];

$result = "";
$sql = 'SELECT password FROM persona WHERE nom = "'.$name.'"';

$stmt = DBConnection::getInstance()->getConnection()->prepare($sql);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    $result = $row[0];
}
if ($result) {
    if($result == $pass ){
		$_SESSION["AUTH"]=true;
		$_SESSION["user"]=ucfirst(strtolower($name));
		echo '0';
    } else {
        echo '2';
    }
} else {
    echo '1';
}
