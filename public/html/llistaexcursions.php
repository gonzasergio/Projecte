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
    <title><?php echo $lang[$idioma]["routeList"]?></title>
</head>
<body>
	<?php include '../templates/menu.php'?>
	<main role="main" class="container-fluid">
		<div class="row d-flex justify-content-center">
			<h3 class="mt-5 text-secondary"><i class='fas fa-map-marked-alt'></i> <?php echo $lang[$idioma]["routeList"]?></h3>
            <table class="mt-3 table table-hover table-striped table table-borderless table-responsive-sm shadow-sm mx-5">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col"><?php echo $lang[$idioma]["name"]?></th>
                    <th scope="col"><?php echo $lang[$idioma]["zone"]?></th>
                    <th scope="col">Km</th>
                    <th scope="col"><?php echo $lang[$idioma]["difficulty"]?></th>
                </tr>
                </thead>
                <tbody class="cursor-pointer">
                <?php foreach ($array as $rute) : ?>
                    <tr class='clickable-row' data-href="excursio.php?name=<?= $rute->getName() ?>">
                        <td><?= $rute->getId() ?></td>
                        <td><?= $rute->getName() ?></td>
                        <td><?= $rute->getZone() ?></td>
                        <td><?= $rute->getKm() ?></td>
                        <td><?= $rute->getDifficulty() ?></td>
                    </tr>
    
                <?php endforeach; ?>
                </tbody>
            </table>
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
