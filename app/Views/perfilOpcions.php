<?php
include '../templates/globalIclude.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include $template["head"]?>
    <title><?php echo $lang[$idioma]["home"]?></title>
</head>
<body>
	<?php include $template["menu"]?>
	<main role="main" class="container-fluid m-main py-5">
    	<div class="row mx-0 mx-lg-5">
    		<div class="col-md-3 ">
    			<h3><i class="fas fa-user-cog"></i> Opcions</h3>
    			<hr>
    		     <div class="list-group my-3">
                  <a href="#" class="list-group-item list-group-item-action active">Informacio personal</a>
                  <a href="#" class="list-group-item list-group-item-action">Seguretat</a>
                </div> 
    		</div>
    		<div class="col-md-9">
    		    <div class="card">
    		        <div class="card-body">
    		            <div class="row">
    		                <div class="col-md-12">
    		                    <form>
                                  <div class="form-group row">
                                    <label for="username" class="col-4 col-form-label">Nom*</label> 
                                    <div class="col-8">
                                      <input id="nom" name="nom" placeholder="Nom" class="form-control here" required="required" type="text">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">Primer llinatge*</label> 
                                    <div class="col-8">
                                      <input id="llinatge1" name="llinatge1" placeholder="Primer llinatge" class="form-control here" type="text">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="lastname" class="col-4 col-form-label">Segon llinatge</label> 
                                    <div class="col-8">
                                      <input id="llinatge2" name="llinatge2" placeholder="Segon llinatge" class="form-control here" type="text">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">Correu*</label> 
                                    <div class="col-8">
                                      <input id="correu" name="correu" placeholder="Correu" class="form-control here" required="required" type="text">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="website" class="col-4 col-form-label">Telefon</label> 
                                    <div class="col-8">
                                      <input id="telefon" name="telefon" placeholder="Telefon" class="form-control here" type="text">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="descripcio" class="col-4 col-form-label">Descripcio</label> 
                                    <div class="col-8">
                                      <textarea id="descripcio" name="descripcio" cols="40" rows="4" class="form-control"></textarea>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="offset-4 col-8">
                                      <button name="submit" type="submit" class="btn btn-primary">Guardar canvis</button>
                                    </div>
                                  </div>
                                </form>
    		                </div>
    		            </div>
    		            
    		        </div>
    		    </div>
    		</div>
    	</div>
    </main>
  	<?php include $template["footer"]?>

    <script type="text/javascript">
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    </script>
</body>
</html>
