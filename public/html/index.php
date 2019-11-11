<?php
session_start();
include 'arrayLanguage.php';
include '../templates/detectarIdioma.php';

if (!(isset($_SESSION["AUTH"])) && !($_SESSION["AUTH"] == true)){
   header("Location: login.php");
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
    	<div class="row d-flex justify-content-center">
            <a href="tancarsessio.php" class="h1 mt-5"><i class="fas fa-sign-out-alt"></i> <?php echo $lang[$idioma]["closeSesion"]?></a>
        </div>
    </main>
  	<?php include '../templates/footer.php'?>
</body>
</html>
