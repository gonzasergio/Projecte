<?php
session_start();
include 'arrayLanguage.php';
include '../templates/detectarIdioma.php';
include '../../app/BDConnectio/DBConnection.php';
include '../../app/Model/Rute.php';

if (!(isset($_SESSION["AUTH"])) && !($_SESSION["AUTH"] == true)){
   header("Location: login.php");
}

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

        <table class="mt-5 table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Zone</th>
                <th scope="col">Km</th>
                <th scope="col">Diff</th>
            </tr>
            </thead>
            <tbody class="cursor-pointer">
            <?php foreach ($array as $rute) : ?>
                <tr class='clickable-row' data-href='excursio.php?name=<?= $rute->getName() ?>'>
                    <td><?= $rute->getId() ?></td>
                    <td><?= $rute->getName() ?></td>
                    <td><?= $rute->getZone() ?></td>
                    <td><?= $rute->getKm() ?></td>
                    <td><?= $rute->getDifficulty() ?></td>
                </tr>

            <?php endforeach; ?>
            </tbody>
        </table>

    	<div class="row d-flex justify-content-center">
            <a href="tancarsessio.php" class="h1 mt-5"><i class="fas fa-sign-out-alt"></i> <?php echo $lang[$idioma]["closeSesion"]?></a>
        </div>
    </main>
  	<?php include '../templates/footer.php'?>

    <script type="text/javascript">
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    </script>
</body>
</html>
