<?php
session_start();
include 'arrayLanguage.php';
include '../templates/detectarIdioma.php';
include '../../app/BDConnectio/DBConnection.php';
include '../../app/Model/Rute.php';

$array = [];
$sql = "SELECT * FROM rutes;";
$stmt = DBConnection::getInstance()->getConnection()->prepare($sql);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    $array[] = $var = new Rute($row[0], $row[1], $row[2], $row[3], $row[4]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include '../templates/head.php'?>
    <title><?php echo $lang[$idioma]["home"]?></title>
</head>
<body>
	<?php include '../templates/menu.php'?>
	<main role="main" class="container-fluid">
		<h1 class="m-5">Pagina inici</h1>
    </main>
  	<?php include '../templates/footer.php'?>

    <script type="text/javascript">
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    </script>
</body>
</html>
