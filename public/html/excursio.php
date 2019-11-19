<?php
$idioma = null;
include '../templates/globalIclude.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../templates/head.php'?>
    <title><?php echo $lang[$idioma]["route"]?></title>
</head>
<body>
<?php include '../templates/menu.php'?>
<main role="main" class="container-fluid">
    <div class="m-5">
        <h1> <?= $_GET['name'] ?></h1>
        <a class="btn btn-primary rounded-pill mt-4" href="pagament.php" role="button"><i class="far fa-credit-card"></i> <?php echo $lang[$idioma]["pay"]?></a>
    </div>
</main>
<?php include '../templates/footer.php'?>

</body>
</html>
