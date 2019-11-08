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
    		<div class="row bg-light p-2 shadow-sm">
        		<div class="col .flex-row">
        			<img src="../img/logo.png" class="rounded mr-2 float-left" alt="" height="50px">
        			<h1 class="text-secondary d-inline">GOATrails</h1>
        		</div>
            	<div class="col d-flex justify-content-end">
            	<i class="fas fa-language float-left text-secondary h1 mr-3"></i>
                    <form action="sesioIdioma.php" method="post">
                        <div class="form-group">
                              <select class="form-control float-right" id="language" onChange="canviaIdioma()">
                              <?php 
                              foreach ($lang as $i) {
                                  $selected = ($idioma==$i["langCode"])?('selected'):('');
                                  echo "<option value='".$i["langCode"]."'".$selected.">".$i["lang"]."</option>";
                              }
                              
                              ?>
                        	</select>
                        </div>
                    </form>
                </div>
            </div>
        <div class="row d-flex justify-content-center">
    		<a href="tancarsessio.php" class="h1 mt-5"><i class="fas fa-sign-out-alt"></i> <?php echo $lang[$idioma]["closeSesion"]?></a>
    	</div>
    </div>
</body>
</html>
