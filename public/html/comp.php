<?php
include '../templates/links.php';

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

$sql = 'SELECT password FROM persona WHERE nom = "'.$postname.'"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$fila = $result->fetch_array(MYSQLI_ASSOC);
	$result = $fila['password'];
    if($result == $postpass ){
		session_start();
		$_SESSION["AUTH"]=true;
		$_SESSION["user"]=ucfirst(strtolower($postname));
		if (isset($_SESSION["lastRoute"])){
		    $url = ($_SESSION["lastRoute"] == '') ? $link["inici"] : $_SESSION["lastRoute"];
		    header("Location: $url ");
		    //var_dump($url);
		} else {
		    header("Location: ".$link["inici"]);
		}
    } else {
        echo '<script>alert("Contrasenya incorrecte");parent.location = "'.$link["login"].'"</script>';
    }
} else {
    echo '<script>alert("Usuari incorrecte");parent.location = "'.$link["login"].'"</script>';
}
$conn->close();
?>