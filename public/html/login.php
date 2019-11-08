<?php
session_start();
include 'arrayLanguage.php';
include '../templates/detectarIdioma.php';

if ((isset($_SESSION["AUTH"])) && ($_SESSION["AUTH"] == true)){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $lang[$idioma]["login"]?></title>
	<link rel="stylesheet" type="text/css" href="../css/global.css">
    <link rel="icon" type="image/png" href="http://35.204.235.53/img/favicon.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/40bb3d9f69.js"></script>
    <script src="../js/global.js"></script>
</head>
<body>
<div class="container-fluid">
	<?php include '../templates/header.php'?>
    <div class="row d-flex justify-content-center">
        <div class="card shadow-sm mt-5" style="width: 18rem;">
            <h5 class="card-header"><i class="fas fa-sign-in-alt"></i> <?php echo $lang[$idioma]["login"]?></h5>
            <div class="card-body">
                <form>
                	<div class="form-group">
                        <label><i class="fas fa-user text-secondary"></i> <?php echo $lang[$idioma]["user"]?>:</label><input class="form-control" type="text" id="name">
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-key text-secondary"></i> <?php echo $lang[$idioma]["password"]?>:</label><input class="form-control" type="password" id="pass">
                    </div>
                	<button class="btn btn-primary" type="button" onClick="encripta('comp.php')"><?php echo $lang[$idioma]["submit"]?> &nbsp;&nbsp;<i class="fas fa-angle-right"></i></button>
                </form>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center mt-2">
    	<a href="registre.php"><?php echo $lang[$idioma]["noRegister"] ?>.</a>
    </div>
    <?php include '../templates/footer.php'?>
</div>
</body>
</html>