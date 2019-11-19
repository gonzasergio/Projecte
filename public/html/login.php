<?php
include '../templates/globalIclude.php';

if ((isset($_SESSION["AUTH"])) && ($_SESSION["AUTH"] == true)){
    header("Location: ".$lin["inici"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $template["head"];?>
    <title><?php echo $lang[$idioma]["login"]?></title>
</head>
<body>
    <?php include $template["menu"];?>
    <main class="container-fluid">
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
                    	<button class="btn btn-primary btn-block rounded-pill mt-4" type="button" onClick="encripta('<?php echo $link["compLogin"]?>')"><?php echo $lang[$idioma]["submit"]?> &nbsp;&nbsp;<i class="fas fa-angle-right"></i></button>
               		</form>
     	    	</div>
        	</div>
        </div>
        <div class="row d-flex justify-content-center mt-2">
            <a href="<?php echo $link["registre"]?>"><?php echo $lang[$idioma]["noRegister"] ?>.</a>
        </div>
    </main>
    <?php include $template["footer"];?>
</body>
</html>