<?php
$array = [];
$stmt = DBConnection::getInstance()->getConnection()->prepare($sql);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    $array[] = $var = new Rute($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $template["head"]?>
    <title><?php echo $lang[$idioma]["routeList"]?></title>
</head>
<body>
<?php include $template["menu"]?>
<main role="main" class="container-fluid">
    <div class="row d-flex justify-content-center">
        <h3 class="mt-5 text-secondary"><i class='fas fa-map-marked-alt'></i> <?= /** @var TYPE_NAME $title */$title?></h3>
    </div>
	<div class="row mx-2 mx-sm-5 border rounded shadow-sm pt-4 mt-4">
	 <?php foreach ($array as $rute) : ?>
	 		<div class="container-fluid">
                <div class="row border-bottom mx-2 mx-md-5 mb-4">
                	<div class="d-none d-sm-block col-sm-4 col-md-3 col-lg-2 text-center">
                    	<a href="#" title="<?= $rute->getUserNom() ?>">
                        	<img class="rounded-circle shadow-sm nostoryborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" width="80px">
                    	</a>
                    	<p class="text-secondary mt-1">
                    		<a href="#" title="<?= $rute->getUserNom() ?>" class="text-secondary"><?= $rute->getUserNom() ?></a>
                    	</p>
                	</div>
                    <div class="col">
                            <h4><a href="<?php echo $link["excursio"] ?>?id=<?= $rute->getId() ?>"><?= $rute->getName() ?></a></h4>
                            <div class="mb-2">
                            <div class="d-block d-sm-none mb-n1">
                                <a href="#" title="<?= $rute->getUserNom() ?>"><small><i class='fas fa-user'></i></small> <?= $rute->getUserNom() ?></a>
                                <br>
                            </div>
                            <small>
                                <i class="fas fa-walking"></i> <span class="mr-2"><?= $rute->getKm() ?> km &nbsp;</span>
                                <i class="fas fa-medal"></i> <a class="mr-2" href="#"> <?= $rute->getDifficulty() ?></a>
                                <i class="fas fa-map-marker-alt"></i> <a class="mr-2" href="#"> <?= $rute->getZone() ?></a>
                            </small>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
             </div>
 	<?php endforeach; ?>
	</div>
</main>
<?php include $template["footer"]?>

<script type="text/javascript">
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
</script>
</body>
</html>
