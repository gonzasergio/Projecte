<?php
include '../templates/globalIclude.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $template["head"]?>
    <title>Social</title>
</head>
<body>
<?php include $template["menu"]?>
<main role="main" class="container-fluid">
<div class="row mx-2 mx-md-5 pt-5">
	<div class="col-3 col-md-4 ml-5 d-flex justify-content-end">
		<a href="<?php echo $link["historia"] ?>?user=<?php echo $_REQUEST["user"];?>">
		<img class="d-none d-md-block rounded-circle nostoryborder mr-5" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" width="150px" height="150px">
		<img class="d-block d-md-none rounded-circle nostoryborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" width="100px" height="100px">
		</a>
	</div>
	<div class="col pl-4 pt-2">
		<div class="row">
			<div class="col">
        		<a href="<?php echo $link["historia"] ?>?user=<?php echo $_REQUEST["user"];?>" class="d-inline-block mb-3 h3 text-decoration-none text-dark"><?php echo $_GET["user"] ?></a>
        		<a href="#" class="ml-3 px-4 btn btn-sm btn-light border mt-n2 d-none d-md-inline-block"><?php echo $lang[$idioma]["follow"]?></a>
        		<div class="dropdown d-inline-block">
                	<button class="mt-n1 btn btn-link dropdown-toggle text-decoration-none text-secondary" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    	<i class="fa fa-ellipsis-h"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="gedf-drop1">
                    	<a class="dropdown-item" href="#"><i class="fas fa-exclamation-circle"></i> <?php echo $lang[$idioma]["report"];?></a>
                    </div>
            	</div>
            	<br class="d-inline-block d-md-none">
            	<a href="#" class="px-4 btn btn-sm btn-light border mt-n2 d-inline-block d-md-none"><?php echo $lang[$idioma]["follow"]?></a>
            </div>
    	</div>
    	<div class="row mt-2 d-none d-md-block">
    		<div class="col">
    			<div class="d-inline text-center"><b>21</b> <small class="text-secondary d-lg-none"><b>Publicaciones</b></small><span class="d-md-none d-lg-inline text-secondary">Publicaciones</span></div>
    			<div class="d-inline text-center"><b class="ml-md-3">75.2K</b> <small class="text-secondary d-lg-none"><b><?php echo $lang[$idioma]["followers"];?></b></small><span class="d-md-none d-lg-inline text-secondary"><?php echo $lang[$idioma]["followers"];?></span></div>
    			<div class="d-inline text-center"><b class="ml-md-3">6.7K</b> <small class="text-secondary d-lg-none"><b><?php echo $lang[$idioma]["following"];?></b></small><span class="d-md-none d-lg-inline text-secondary"><?php echo $lang[$idioma]["following"];?></span></div>
    		</div>
    	</div>
    	<div class="row mt-4 d-none d-md-block">
    		<div class="col">
    			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam sunt fugit!</p>
    			<small class="text-secondary"><?php echo $lang[$idioma]["followedBy"];?> <a href="<?php echo $link["perfil"] ?>?user=Toni" class="text-decoration-none font-weight-bold text-secondary">Toni</a>, <a href="<?php echo $link["perfil"] ?>?user=Reina isabel" class="text-decoration-none font-weight-bold text-secondary">Reina isabel</a>, <a href="<?php echo $link["perfil"] ?>?user=Bernat" class="text-decoration-none font-weight-bold text-secondary">Bernat</a> + 16 <?php echo $lang[$idioma]["more"];?></small>
    		</div>
    	</div>
	</div>
</div>
<div class="row d-block d-md-none">
	<div class="col">
		<div class="mx-0 mx-sm-5 row mt-3">
    			<div class="col text-center"><b>21</b><br> <small class="text-secondary"><b><?php echo $lang[$idioma]["posts"];?></b></small></div>
    			<div class="col text-center"><b class="ml-md-3">75.2K</b><br> <small class="text-secondary"><b><?php echo $lang[$idioma]["followers"];?></b></small></div>
    			<div class="col text-center"><b class="ml-md-3">6.7K</b><br> <small class="text-secondary"><b><?php echo $lang[$idioma]["following"];?></b></small></div>
    	</div>
    	<div class="mx-0 mx-sm-5 row mt-4">
    		<div class="col">
    			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam sunt fugit!</p>
    			<small class="text-secondary"><?php echo $lang[$idioma]["followedBy"];?> <a href="<?php echo $link["perfil"] ?>?user=Toni" class="text-decoration-none font-weight-bold text-secondary">Toni</a>, <a href="<?php echo $link["perfil"] ?>?user=Reina isabel" class="text-decoration-none font-weight-bold text-secondary">Reina isabel</a> + 17 <?php echo $lang[$idioma]["more"];?></small>
    		</div>
    	</div>
    </div>
</div>
<div class="row mx-0 mx-lg-5 mt-4 d-flex justify-content-center">
	<div class="col col-lg-10 col-xl-8 mb-3 px-0 mx-n2">
		<hr>
		<nav>
          <div class="nav nav-tabs d-flex justify-content-center border-0" id="nav-tab" role="tablist">
            <a class="border-0 mr-1 mr-sm-3 nav-item nav-link active" id="nav-publications-tab" data-toggle="tab" href="#nav-publications" role="tab" aria-controls="nav-publications" aria-selected="true"><i class="fas fa-th d-inline d-md-none h4"></i><span class="d-none d-md-inline"><i class="fas fa-th"></i> <?php echo $lang[$idioma]["posts"];?></span></a>
            <a class="border-0 mx-1 mx-sm-3 nav-item nav-link" id="nav-comments-tab" data-toggle="tab" href="#nav-comments" role="tab" aria-controls="nav-comments" aria-selected="false"><i class="fas fa-comments d-inline d-md-none h4"></i><span class="d-none d-md-inline"><i class="fas fa-comments"></i> <?php echo $lang[$idioma]["comments"];?></span></a>
            <a class="border-0 ml-1 ml-sm-3 nav-item nav-link" id="nav-achievements-tab" data-toggle="tab" href="#nav-achievements" role="tab" aria-controls="nav-achievements" aria-selected="false"><i class="fas fa-award d-inline d-md-none h4"></i><span class="d-none d-md-inline"><i class="fas fa-award"></i> <?php echo $lang[$idioma]["achievements"];?></span></a>
            <a class="border-0 mx-1 mx-sm-3 nav-item nav-link" id="nav-routes-tab" data-toggle="tab" href="#nav-routes" role="tab" aria-controls="nav-routes" aria-selected="false"><i class="fas fa-route d-inline d-md-none h4"></i><span class="d-none d-md-inline"><i class="fas fa-route"></i> <?php echo $lang[$idioma]["history"];?></span></a>
            <a class="border-0 ml-1 ml-sm-3 nav-item nav-link" id="nav-courses-tab" data-toggle="tab" href="#nav-courses" role="tab" aria-controls="nav-courses" aria-selected="false"><i class="fas fa-chalkboard-teacher d-inline d-md-none h4"></i><span class="d-none d-md-inline"><i class="fas fa-chalkboard-teacher"></i> <?php echo $lang[$idioma]["history"];?></span></a>
          </div>
        </nav>
        <hr>
	</div>
</div>
<div class="row mx-2 mx-md-5">
	<div class="col-3 d-none d-md-block">
	</div>
	<div class="col col-md-6">
		<div class="tab-content" id="nav-tabContent">
        	<div class="tab-pane fade show active" id="nav-publications" role="tabpanel" aria-labelledby="nav-publications-tab">
          		<!--- \\\\\\\Post-->
                <div class="card gedf-card mt-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                            	<a href="<?php echo $link["perfil"] ?>?user=<?php echo $_REQUEST["user"];?>">
                                <img title="<?php echo $_GET["user"] ?>" class="d-flex mr-3 rounded-circle shadow-sm storyborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" width="50px">
                                </a>
                                <div class="ml-2">
                                    <a href="<?php echo $link["perfil"] ?>?user=<?php echo $_REQUEST["user"];?>" title="<?php echo $_GET["user"] ?>" class="d-block h5 m-0 text-decoration-none text-dark"><?php echo $_GET["user"] ?> </a>
                                    <small class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> 10 min</small>
                                </div>
                            </div>
                                <div class="dropdown">
                                    <button class="text-old-primary btn btn-link dropdown-toggle text-decoration-none" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="gedf-drop1">
                                        <a class="dropdown-item" href="#"><i class="fas fa-exclamation-circle"></i> <?php echo $lang[$idioma]["report"];?></a>
                                    </div>
                                </div>
                        </div>

                    </div>
					
                    <div class="card-body">
                        <p class="card-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam sunt fugit reprehenderit consectetur exercitationem odio,
                            quam nobis? Officiis, similique, harum voluptate, facilis voluptas pariatur dolorum tempora sapiente
                            eius maxime quaerat.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="text-old-primary mr-2"><i class="far fa-heart h4"></i> <small class="h6">23K</small></a>
                        <a href="#" class="text-secondary mx-2"><i class="fas fa-comments h4"></i> <small class="h6">145</small></a>
                        <a href="#" class="text-secondary mx-2"><i class="fas fa-share h4"></i></i></a>
                    </div>
                </div>
                <!-- Post /////-->
          	</div>
          	<div class="tab-pane fade" id="nav-comments" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
          	<div class="tab-pane fade" id="nav-achievements" role="tabpanel" aria-labelledby="nav-achievements-tab">...</div>
          	<div class="tab-pane fade" id="nav-routes" role="tabpanel" aria-labelledby="nav-routes-tab">...</div>
          	<div class="tab-pane fade" id="nav-courses" role="tabpanel" aria-labelledby="nav-courses-tab">...</div>
    	</div>
	</div>
	<div class="col-3 d-none d-md-block">
	</div>
</div>
</main>
<?php include $template["footer"]?>
</body>