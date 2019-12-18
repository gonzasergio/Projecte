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
    <title>Social</title>
</head>
<body>
<main role="main" class="container-fluid mb-0">
<div class="row">
    <div class="col col-md-3 bg-secondary border-right" style="height: 100vh">
    	<div class="row">
    		<div class="col">
            	<div class="input-group mb-3 mb-md-0 pl-0 mt-3">
                	<div class="input-group mb-3 my-0">
                    	<input type="text" class="form-control" placeholder="Cercar" aria-label="Cercar" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary text-secondary bg-white" type="button"><i class="fa fa-search"></i></button>
                        </div>
                	</div>
            	</div>
        	</div>
    	</div>
    	<div class="row overflow-auto" style="height: 82%">
    		<div class="col">
    			<ul class="list-unstyled">
    				<li>
                    	<div class="row px-3 py-2 bg-dark d-flex flex-nowrap">
                        	<a href="perfil?user=Joan">
							<img title="Joan" class="d-flex mr-3 rounded-circle shadow-sm mt-1 storyborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" height="45px" width="45px">
                            </a>
                            <div>
                                <a href="perfil?user=Joan" title="Joan" class="m-0 font-weight-bold text-decoration-none text-light">Joan <span class="small bg-danger rounded-pill text-light px-1 ml-1">1</span></a><br>
                                <p class="text-light"> <i class="fa fa-clock-o"></i>Lorem ipsum dolor sit amet</p>
                            </div>
						</div>
    				</li>
    				<li>
                    	<div class="row px-3 py-2 d-flex flex-nowrap">
                        	<a href="perfil?user=Toni">
							<img title="Toni" class="d-flex mr-3 rounded-circle shadow-sm mt-1 storyborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" height="45px" width="45px">
                            </a>
                            <div>
                                <a href="perfil?user=Toni" title="Toni" class="m-0 font-weight-bold text-decoration-none text-light">Toni </a><br>
                                <p class="text-light"> <i class="fa fa-clock-o"></i>Lorem ipsum dolor sit amet</p>
                            </div>
						</div>
    				</li>
    							
    			</ul>
    		</div>
    	</div>
    </div>
    <div class="d-none d-md-block col" style="height: 100vh">
    	<div class="row border-bottom sticky-top shadow-sm bg-light">
    		<div class="col py-3">
    			<a class="text-decoration-none" href="perfil?user=Joan">
    			<img title="Joan" class="d-inline mr-2 rounded-circle shadow-sm my-1 storyborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" height="45px" width="45px">
    			</a>
    			<a href="perfil?user=Joan" title="Joan" class="m-0 font-weight-bold text-decoration-none text-dark d-inline">Joan </a><br>
    		</div>
    	</div>
    	
    	<div class="row overflow-auto" style="height: 80%">
    		<div class="col mx-3">
    			<!-- ### DAY ### -->
            	<div class="row px-3 my-3">
            		<div class="col d-flex justify-content-center">
            			<span class="text-secondary small">-- Dilluns 14 Gener --</span>
            		</div>
            	</div>
            	<!-- ### /END DAY ### -->
            	
            	<!-- ### MISSATGE ### -->
            	<div class="row px-3 mt-n2">
            		<img title="Joan" class="d-inline mr-2 rounded-circle shadow-sm my-2 storyborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" height="35px" width="35px">
            		<div class="col py-2">
            			<div class="d-inline-block">
            				<p class="bg-secondary text-light border border-light py-2 px-4 shadow-sm mb-n1" style="border-radius: 40px;">Lorem ipsum dolor sit amet</p>
            				<span class="text-secondary small ml-3">4 min</span>
            			</div>
            		</div>
            	</div>
            	<!-- ### /END MISSATGE ### -->
            	
            	<!-- ### MISSATGE ### -->
            	<div class="row px-3 mt-n2">
            		<img title="Joan" class="d-inline mr-2 rounded-circle shadow-sm my-2 storyborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" height="35px" width="35px">
            		<div class="col py-2">
            			<div class="d-inline-block">
            				<p class="bg-secondary text-light border border-light py-2 px-4 shadow-sm mb-n1" style="border-radius: 40px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam sunt fugit reprehenderit consectetur exercitationem odio, quam nobis? Officiis, similique, harum voluptate, facilis voluptas pariatur dolorum tempora sapiente eius maxime quaerat.</p>
            				<span class="text-secondary small ml-3">4 min</span>
            			</div>
            		</div>
            	</div>
            	<!-- ### /END MISSATGE ### -->
            	
            	<!-- ### MISSATGE ### -->
            	<div class="row px-3 mt-n2 d-flex flex-row-reverse">
            		<img title="<?php echo $_SESSION["user"]?>" class="d-inline ml-2 rounded-circle shadow-sm my-2 storyborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" height="35px" width="35px">
            		<div class="col py-2 d-flex flex-row-reverse">
            			<div class="d-inline-block">
            				<p class="bg-light text-secondary border border-secondary py-2 px-4 shadow-sm mb-0" style="border-radius: 40px;">Lorem ipsum dolor sit amet</p>
            				<span class="text-secondary small float-right mr-3">2 min</span>
            			</div>
            		</div>
            	</div>
            	<!-- ### /END MISSATGE ### -->
            	
            	<!-- ### MISSATGE ### -->
            	<div class="row px-3 mt-n2">
            		<img title="Joan" class="d-inline mr-2 rounded-circle shadow-sm my-2 storyborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" height="35px" width="35px">
            		<div class="col py-2">
            			<div class="d-inline-block">
            				<p class="bg-secondary text-light border border-light py-2 px-4 shadow-sm mb-n1" style="border-radius: 40px;">Lorem ipsum dolor sit amet</p>
            				<span class="text-secondary small ml-3">1 min</span>
            			</div>
            		</div>
            	</div>
            	<!-- ### /END MISSATGE ### -->
    		</div>
    	</div>
    </div>
        	<div class="fixed-bottom container-fluid mb-4 mb-md-0">
        	<div class="row bg-secondary">
        		<div class="col col-md-3">
        			<a href="<?php echo $link["inici"]?>" class="btn btn-outline-light mt-3 rounded-pill float-right mr-3"><i class="fas fa-reply"></i></a>
        		</div>
        		<div class="d-none d-md-block col px-5 bg-light border-top">
        			<div class="input-group mb-3 mb-md-0 pl-0 mt-3">
                    	<div class="input-group mb-3 my-0">
                        	<input type="text" class="form-control" placeholder="Enviar" aria-label="Enviar" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary bg-white text-secondary" type="button"><i class="fas fa-paperclip"></i></button>
                                <button class="btn btn-outline-secondary bg-white text-secondary" type="button"><i class="far fa-paper-plane"></i></button>
                            </div>
                    	</div>
                	</div>
        		</div>
        	</div>
        </div>
</div>
</main>
</body>