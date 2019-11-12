<?php
$DBConf = null;
require_once '../../app/BDConnectio/DBConfig.php';

$servername = $DBConf["servername"];
$username = $DBConf["username"];
$password = $DBConf["password"];
$dbname = $DBConf["dbname"];

$postname = $_POST['name'];
$postpass = $_POST['pass'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT nom FROM persona WHERE nom = "'.$postname.'"';
$insert = 'INSERT INTO persona VALUES("'.$postname.'", "'.$postpass.'")';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<script>alert("Aquest usuari ja esta logueat");parent.location = "registre.php"</script>';
} else {
    $conn->query($insert);
    header("Location: login.php");
}
$conn->close();
?>