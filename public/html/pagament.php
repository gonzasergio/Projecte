<?php
session_start();
$idioma = null;
include 'arrayLanguage.php';
include '../templates/detectarIdioma.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../templates/head.php'?>
    <title><?php echo $lang[$idioma]["pay"]?></title>
</head>
<body>
<?php include '../templates/menu.php'?>
<main role="main" class="container-fluid">
    <h1> <?php echo $lang[$idioma]["pay"]?></h1>


</main>
<?php include '../templates/footer.php'?>
</body>
</html>
