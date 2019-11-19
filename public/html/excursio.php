<?php
$idioma = null;
include '../templates/globalIclude.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $template["head"]?>
    <title><?php echo $lang[$idioma]["route"]?></title>
</head>
<body>
<?php include $template["menu"]?>
<main role="main" class="container-fluid">
        <div class="row mx-2 mx-md-5 px-2 px-md-5 mt-4">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4"><?= $_GET['name'] ?></h1>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="https://static1.squarespace.com/static/524883b7e4b03fcb7c64e24c/524bba63e4b0bf732ffc8bce/5602efbde4b0becc00344018/1564332731825/?format=2500w" alt="">

        <hr>

        <!-- Post Content -->
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>
        <hr>

        <!-- Comments Form -->
        <div class="card mb-3">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        <!-- Comment with nested comments -->
        <div class="mb-4">
          <img class="d-flex mr-3 rounded-circle" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" width="50px">
          <div>
            <h5 class="mt-0">Joan</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" width="50px">
              <div>
                <h5 class="mt-0">Toni</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>
			
          </div>
        </div>
		
		<!-- Single Comment -->
        <div class="mb-4">
          <img class="d-flex mr-3 rounded-circle" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" width="50px">
          <div>
            <h5 class="mt-0">Reina isabel</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col">

        <a class="btn btn-block btn-primary mt-4" href="<?php echo $link["pagament"]?>" type="button"><i class="far fa-credit-card"></i> <?php echo $lang[$idioma]["pay"]?></a>


        <!-- Categories Widget -->
        <div class="card rounded mt-5">
          <div class="card-body">
            <div class="text-center">
                <a href="#" title="Usuari">
                    <img class="rounded-circle shadow-sm" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" width="80px">
                </a>
                <p class="text-secondary mt-1">
                    <a href="#" title="Usuari">Usuari</a>
                </p>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card mt-3">
          <h5 class="card-header">Information</h5>
          <div class="card-body">
			<div class="row px-3">
				<div class="col-6">
					<p><i class="fas fa-walking"></i> 50 km</p>
				</div>
				<div class="col-6">
					<p><i class="fas fa-medal"></i> <a href="#"> Hard</a></p>
				</div>
			</div>
          </div>
        </div>

      </div>

    </div>
</main>
<?php include $template["footer"]?>

</body>
</html>
