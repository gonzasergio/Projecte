<?php
$servername = "localhost";
$username = "admin";
$password = "12345678";
$dbname = "persona";

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
        header("Location: inici.php");
    } else {
        echo '<script>alert("Contrasenya incorrecte");parent.location = "login.php"</script>';
    }
} else {
	echo '<script>alert("Usuari incorrecte");parent.location = "login.php"</script>';
}
$conn->close();
?>