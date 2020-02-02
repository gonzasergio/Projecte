<?php
$idioma = null;
include '../templates/globalIclude.php';
include '../../app/Model/Rute.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $template["head"]?>
    <title><?php echo $lang[$idioma]["route"]?> - Curs</title>
</head>
<body>
<?php include $template["menu"]?>
<main role="main" class="container-fluid">
        <div class="row mx-0 mx-sm-2 mx-md-5 px-0 px-sm-2 px-md-5 mt-4">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4 d-block-inline">Curs</h1>

        <div class="d-block-inline d-lg-none mb-4">
        	<a href="<?php echo $link["perfil"] ?>?user=Pep"><img class="rounded-circle nostoryborder" title="Curs" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" width="25px"></a> <a class="text-old-primary" title="Curs">Pep</a>
        </div>

        <hr>

        <!-- Post Content -->
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>
        <hr>
        
        <div class="d-block d-lg-none">
        <a href="<?php echo $link["pagament"]?>?id=1" class="btn btn-primary btn-block rounded shadow-sm my-4"><i class="far fa-credit-card"></i> &nbsp;<?php echo $lang[$idioma]["pay"]?></a>
         
         
         <div class="card mt-3">
          <h5 class="card-header"><?php echo $lang[$idioma]["information"];?></h5>
          <div class="card-body">
			<div class="row px-3">
				<div class="col col-xl-6">
					<p><i class="fas fa-map-marker-alt"></i> <a class="text-old-primary" href="#"> Inca</a></p>
					<div class="d-block d-xl-none">
						<p><i class="fas fa-medal"></i> <a class="text-old-primary" href="#">Facil</a></p>
					</div>
				</div>
				<div class="d-none d-xl-block col-6">
					<p><i class="fas fa-medal"></i> <a class="text-old-primary" href="#">Facil</a></p>
				</div>
			</div>
          </div>
        </div>
        
        <div class="card mt-3">
        	<h5 class="card-header"><?php echo $lang[$idioma]["averageRating"];?></h5>
        	<div class="card-body">
			<div class="row px-3">
				<div class="col">
					<p class="h2">4.3 <small>/ 5 <span class="text-muted h6 ml-2">3 <?php echo $lang[$idioma]["votes"];?></span></small></p>
					  <i class="fas fa-star text-warning"></i>
					  <i class="fas fa-star text-warning"></i>
					  <i class="fas fa-star text-warning"></i>
					  <i class="fas fa-star text-warning"></i>
					  <i class="fas fa-star text-muted"></i>
				</div>
				</div>
				</div>
			</div>
       </div>
       <hr class="d-block d-lg-none my-4">

        <!-- Comments Form -->
        <div class="card mb-3">
          <h5 class="card-header"><?php echo $lang[$idioma]["leaveAComment"]?>:</h5>
          <div class="card-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
              </div>
              <a href="#" class="btn btn-primary rounded shadow-sm text-white"><?php echo $lang[$idioma]["submit"]?> &nbsp;&nbsp;<i class="fas fa-angle-right"></i></a>
            </form>
          </div>
        </div>

        <!-- Comment with nested comments -->
        <div class="mb-4">
        	<a href="<?php echo $link["perfil"] ?>?user=Joan">
        		<img class="d-flex mr-3 rounded-circle shadow-sm nostoryborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" width="50px">
        	</a>
        <div>
            <div class="row border-bottom mb-2 mt-1">
            <div class="col-4">
            <a href="<?php echo $link["perfil"] ?>?user=Joan" class="mt-2 h5 text-dark text-decoration-none">Joan</a>
            </div>
            <div class="col text-right pr-2 mt-2">
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-secondary"></i>
            </div>
            </div>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
			<div class="row mb-2 mt-1">
            <div class="col-7 text-secondary">
            	<span>3d</span> <a href="#" class="ml-3 text-secondary text-decoration-none"><span class="d-none d-sm-inline"><?php echo $lang[$idioma]["reply"];?></span><i class="far fa-paper-plane d-inline d-sm-none"></i></a>
            </div>
            <div class="col text-secondary text-right">
            142 <i class="far fa-heart"></i>
            </div>
            </div>
            <div class="media mt-4">
            	<a href="<?php echo $link["perfil"] ?>?user=Toni">
            		<img class="d-flex mr-3 rounded-circle shadow-sm nostoryborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" width="50px">
           		</a>
            <div>
                <div class="row border-bottom mb-2 mx-1">
            		<div class="col-4">
            			<a href="<?php echo $link["perfil"] ?>?user=Toni" class="h5 text-dark text-decoration-none">Toni</a>
            		</div>
            	</div>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              	<div class="row mb-2 mt-1">
                <div class="col-7 text-secondary">
                	<span>2d</span> <a href="#" class="ml-3 text-secondary text-decoration-none"><span class="d-none d-sm-inline"><?php echo $lang[$idioma]["reply"];?></span><i class="far fa-paper-plane d-inline d-sm-none"></i></a>
                </div>
                <div class="col text-secondary text-right">
                23 <i class="far fa-heart"></i>
                </div>
                </div>
              </div>
            </div>
			
          </div>
        </div>
		
		<!-- Single Comment -->
        <div class="mb-4">
        	<a href="<?php echo $link["perfil"] ?>?user=Reina isabel">
          		<img class="d-flex mr-3 rounded-circle shadow-sm nostoryborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" width="50px">
          	</a>
          <div>
          <div class="row border-bottom mb-2 mt-1">
            <div class="col-4">
            <a href="<?php echo $link["perfil"] ?>?user=Reina isabel" class="mt-2 h5 text-dark text-decoration-none">Reina isabel</a>
            </div>
            <div class="col text-right pr-2 mt-2">
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
            </div>
            </div>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          	<div class="row mb-2 mt-1">
            <div class="col-7 text-secondary">
            	<span>6d</span> <a href="#" class="ml-3 text-secondary text-decoration-none"><span class="d-none d-sm-inline"><?php echo $lang[$idioma]["reply"];?></span><i class="far fa-paper-plane d-inline d-sm-none"></i></a>
            </div>
            <div class="col text-secondary text-right">
            317 <i class="far fa-heart"></i>
            </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col d-none d-lg-inline">

        <a href="<?php echo $link["pagament"]?>?id=1" class="btn btn-primary btn-block rounded shadow-sm mt-4 d-none d-lg-block"><i class="far fa-credit-card"></i> &nbsp;<?php echo $lang[$idioma]["pay"]?></a>

        <!-- Categories Widget -->
        <div class="card rounded mt-5">
          <div class="card-body">
            <div class="text-center">
                <a href="<?php echo $link["perfil"] ?>?user=Pep" title="Pep">
                    <img class="rounded-circle shadow-sm nostoryborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" width="80px">
                </a>
                <p class="text-secondary mt-1">
                    <a class="text-old-primary" href="<?php echo $link["perfil"] ?>?user=Pep" title="Pep">Pep</a>
                </p>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card mt-3">
          <h5 class="card-header"><?php echo $lang[$idioma]["information"];?></h5>
          <div class="card-body">
			<div class="row px-3">
				<div class="col col-xl-6">
					<p><i class="fas fa-map-marker-alt"></i> <a class="text-old-primary" href="#"> Inca</a></p>
					<div class="d-block d-xl-none">
						<p><i class="fas fa-medal"></i> <a class="text-old-primary" href="#">Facil</a></p>
					</div>
				</div>
				<div class="d-none d-xl-block col-6">
					<p><i class="fas fa-medal"></i> <a class="text-old-primary" href="#">Facil</a></p>
				</div>
			</div>
          </div>
        </div>
        
        <!-- Rating -->
        
        <div class="card mt-3">
        	<h5 class="card-header"><?php echo $lang[$idioma]["averageRating"];?></h5>
        	<div class="card-body">
			<div class="row px-3">
				<div class="col">
					<p class="h2">4.3 <small>/ 5 <span class="text-muted h6 ml-2">3 <?php echo $lang[$idioma]["votes"];?></span></small></p>
					  <i class="fas fa-star text-warning"></i>
					  <i class="fas fa-star text-warning"></i>
					  <i class="fas fa-star text-warning"></i>
					  <i class="fas fa-star text-warning"></i>
					  <i class="fas fa-star text-muted"></i>
				</div>
				</div>
				</div>
			</div>
        
        <div class="card mt-3">
        <h5 class="card-header px-3"><?php echo $lang[$idioma]["ratingBreakdown"];?></h5>
    		<div class="row my-2 ml-2 mt-4">
    			<div class="col-md-4 col-lg-4 col-xl-3 text-right">
    				<div class="mt-n1">5 <i class="fas fa-star text-warning"></i></div>
    			</div>
    			<div class="col-md-6 col-lg-6 col-xl-7 mx-n3">
    				<div class="progress">
                    	<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
            	</div>
            	<div class="col-2 mt-n1">
            		1
            	</div>
        	</div>
        	<div class="row my-2 ml-2">
    			<div class="col-md-4 col-lg-4 col-xl-3 text-right">
    				<div class="mt-n1">4 <i class="fas fa-star text-warning"></i></div>
    			</div>
    			<div class="col-md-6 col-lg-6 col-xl-7 mx-n3">
    				<div class="progress">
                    	<div class="progress-bar bg-success" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
            	</div>
            	<div class="col-2 mt-n1">
            		2
            	</div>
        	</div>
        	<div class="row my-2 ml-2">
    			<div class="col-md-4 col-lg-4 col-xl-3 text-right">
    				<div class="mt-n1">3 <i class="fas fa-star text-warning"></i></div>
    			</div>
    			<div class="col-md-6 col-lg-6 col-xl-7 mx-n3">
    				<div class="progress">
                    	<div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
            	</div>
            	<div class="col-2 mt-n1">
            		0
            	</div>
        	</div>
        	<div class="row my-2 ml-2">
    			<div class="col-md-4 col-lg-4 col-xl-3 text-right">
    				<div class="mt-n1">2 <i class="fas fa-star text-warning"></i></div>
    			</div>
    			<div class="col-md-6 col-lg-6 col-xl-7 mx-n3">
    				<div class="progress">
                    	<div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
            	</div>
            	<div class="col-2 mt-n1">
            		0
            	</div>
        	</div>
        	<div class="row my-2 ml-2">
    			<div class="col-md-4 col-lg-4 col-xl-3 text-right">
    				<div class="mt-n1">1 <i class="fas fa-star text-warning"></i></div>
    			</div>
    			<div class="col-md-6 col-lg-6 col-xl-7 mx-n3">
    				<div class="progress">
                    	<div class="progress-bar bg-danger" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
            	</div>
            	<div class="col-2 mt-n1">
            		0
            	</div>
        	</div>
        	<div class="row my-2 ml-2 mb-4">
    			<div class="col-md-4 col-lg-4 col-xl-3 text-right">
    				<div class="mt-n1">0 <i class="fas fa-star text-warning"></i></div>
    			</div>
    			<div class="col-md-6 col-lg-6 col-xl-7 mx-n3">
    				<div class="progress">
                    	<div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
            	</div>
            	<div class="col-2 mt-n1">
            		0
            	</div>
        	</div>
		</div>
        
        <!-- End Rating -->

      </div>

    </div>
</main>
<?php include $template["footer"]?>

</body>
</html>
