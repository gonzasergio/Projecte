<?php
include '../templates/globalIclude.php';

if ((isset($_SESSION["AUTH"])) && ($_SESSION["AUTH"] == true)){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../templates/head.php'?>
    <title><?php echo $lang[$idioma]["register"]?></title>
</head>
<body>
    <?php include '../templates/menu.php'?>
    <main class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="card shadow-sm mt-5" style="width: 18rem;">
                <h5 class="card-header"><i class="far fa-id-card"></i> <?php echo $lang[$idioma]["register"]?></h5>
                <div class="card-body">
                    <form>
                    	<div class="form-group">
                            <label><i class="fas fa-user text-secondary"></i> <?php echo $lang[$idioma]["user"]?>:</label><input class="form-control" type="text" id="name">
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-key text-secondary"></i> <?php echo $lang[$idioma]["password"]?>:</label><input class="form-control" type="password" id="pass">
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-key text-secondary"></i> <?php echo $lang[$idioma]["repeatPassword"]?>:</label><input class="form-control" type="password" id="pass2">
                        </div>
                    	<button class="btn btn-primary btn-block rounded-pill mt-4" type="button" onClick="comprovaContrasenya()"><?php echo $lang[$idioma]["submit"]?> &nbsp;&nbsp;<i class="fas fa-angle-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-2">
            <a href="login.php"><?php echo $lang[$idioma]["alreadyRegister"] ?>.</a>
        </div>
    </main>
    <?php include '../templates/footer.php'?>
</body>
</html>