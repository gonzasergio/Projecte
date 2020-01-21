<?php
include '../templates/links.php';

$name = $_POST["name"];
$pass = $_POST["pass"];

$result = "";
$sql = 'SELECT password, id FROM persona WHERE nom = "'.$name.'"';

$stmt = DBConnection::getInstance()->getConnection()->prepare($sql);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    $result = $row[0];
    $id = $row[1];
}
if ($result) {
    if($result == $pass ){
		$_SESSION["AUTH"]=true;
		$_SESSION["user"]=ucfirst(strtolower($name));
        $_SESSION["id"]=$id;
		echo '0';
    } else {
        echo '2';
    }
} else {
    echo '1';
}
