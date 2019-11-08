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
    <meta charset="UTF-8">
	<style>
    @import url('https://fonts.googleapis.com/css?family=Ubuntu:400,500,700&display=swap');
    *{font-family: 'Ubuntu', sans-serif;}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/40bb3d9f69.js"></script>
    <link rel="icon" type="image/png" href="http://35.204.235.53/img/favicon.png">
    <title><?php echo $lang[$idioma]["home"]?></title>
    <script src="../js/global.js"></script>
</head>
<body>
    <div class="container-fluid">
	<?php include '../templates/header.php'?>
        <div class="row d-flex justify-content-center">
    		<a href="tancarsessio.php" class="h1 mt-5"><i class="fas fa-sign-out-alt"></i> <?php echo $lang[$idioma]["closeSesion"]?></a>
    	</div>
    </div>
    <?php include '../templates/footer.php'?>
</body>
</html>
