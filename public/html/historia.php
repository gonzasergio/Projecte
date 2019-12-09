<?php
include '../templates/globalIclude.php';

if (!(isset($_SESSION["AUTH"]))){
    header("Location: ".$link["login"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include $template["head"]?>
    <title><?php echo $lang[$idioma]["social"]?></title>
</head>
<body class="bg-dark overflow-hidden" style="width: 100vw; height: 100vh">
<div class="container-fluid">
	<div class="row">
		<div class="col d-flex justify-content-center">
    		<div>
    			<div class="row">
        			<div class="col">
        				<div class="position-absolute p-3">
        					<a class="text-decoration-none" href="<?php echo $link["perfil"]?>?user=<?php echo $_REQUEST["user"]?>">
    						<img title="<?php echo $_REQUEST["user"]?>" class="d-inline mr-3 rounded-circle shadow-sm storyborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" width="40px">
    						<p class="text-white d-inline"><?php echo $_REQUEST["user"]?> <span class="small ml-2 text-light">40 min</span></p>
    						</a>
    					</div>
    					
        				<button class="btn btn-outline-light rounded-pill position-absolute border-0" style="margin-top: 50vh;"><i class="fas fa-angle-left"></i></button>
        			</div>
        			<div class="col d-flex justify-content-end">
        				<div class="dropdown position-absolute mt-3" style="z-index: 10;">
                        	<button class="btn btn-link dropdown-toggle text-decoration-none text-light mr-2" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            	<i class="fa fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                            	<a class="dropdown-item" href="#"><i class="fas fa-exclamation-circle"></i> <?php echo $lang[$idioma]["report"];?></a>
                           	</div>
                        </div>
        				
        				<button class="btn btn-outline-light rounded-pill position-absolute border-0" style="margin-top: 50vh; z-index: 10;"><i class="fas fa-angle-right"></i></button>
        				
        				<div class="position-absolute"><button class="btn btn-light rounded-pill mr-3 shadow" style="margin-top: 92vh;"><i class="far fa-paper-plane"></i></button></div>
        				
        				<a href="<?php echo $link["social"]?>" class="btn btn-link text-light rounded-pill position-absolute border-0 mt-2 ml-5 d-none d-sm-block"><i class="fas fa-times"></i></a>
        			</div>
    			</div>
        		<img src="https://s2.best-wallpaper.net/wallpaper/iphone/1706/Thick-clouds-sky-top-view_iphone_1080x1920.jpg" style="height: 100vh"/>
        	</div>
		</div>
	</div>
</div>
<script src="../js/popper/popper.min.js"></script>
<script src="../js/bootstrap/bootstrap.min.js"></script>
</body>
</html>
