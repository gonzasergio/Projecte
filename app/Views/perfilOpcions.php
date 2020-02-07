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
    		     <div class="list-group my-3 nav nav-tab" id="Tab" role="tablist">
                  <a id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true" class="list-group-item list-group-item-action active">Informacio personal</a>
                  <a id="security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="security" aria-selected="false" class="list-group-item list-group-item-action">Seguretat</a>
                  <a id="pagament-tab" data-toggle="tab" href="#pagament" role="tab" aria-controls="pagament" aria-selected="false" class="list-group-item list-group-item-action">Pagament</a>
                </div> 
    		</div>
    		<div class="col-md-9">
    		    <div class="card">
    		        <div class="card-body">
    		            <div class="row tab-content">
    		                <div role="tabpanel" aria-labelledby="info-tab" id="info" class="col-md-12 tab-pane active">
    		                    <form>
                                  <div class="form-group row">
                                    <label for="username" class="col-4 col-form-label">Usuari*</label> 
                                    <div class="col-8">
                                      <input id="username" name="username" placeholder="Usuari" class="form-control here" required="required" type="text">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="nom" class="col-4 col-form-label">Nom*</label> 
                                    <div class="col-8">
                                      <input id="nom" name="nom" placeholder="Nom" class="form-control here" required="required" type="text">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="llinatge1" class="col-4 col-form-label">Primer llinatge*</label> 
                                    <div class="col-8">
                                      <input id="llinatge1" name="llinatge1" placeholder="Primer llinatge" class="form-control here" type="text">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="llinatge2" class="col-4 col-form-label">Segon llinatge</label> 
                                    <div class="col-8">
                                      <input id="llinatge2" name="llinatge2" placeholder="Segon llinatge" class="form-control here" type="text">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="correu" class="col-4 col-form-label">Correu*</label> 
                                    <div class="col-8">
                                      <input id="correu" name="correu" placeholder="Correu" class="form-control here" required="required" type="text">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="telefon" class="col-4 col-form-label">Telefon</label> 
                                    <div class="col-8">
                                      <input id="telefon" name="telefon" placeholder="Telefon" class="form-control here" type="text">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="dni" class="col-4 col-form-label">DNI</label> 
                                    <div class="col-8">
                                      <input id="dni" name="dni" placeholder="DNI" class="form-control here" type="text">
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
    		                <div role="tabpanel" aria-labelledby="security-tab" id="security" class="col-md-12 tab-pane">
    		                    <form>
                                  <div class="form-group row">
                                    <label for="passactual" class="col-4 col-form-label">Contrasenya actual*</label> 
                                    <div class="col-8">
                                      <input id="passactual" name="passactual" placeholder="Contrasenya actual" class="form-control here" required="required" type="password">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="passnew" class="col-4 col-form-label">Contraseya nova*</label> 
                                    <div class="col-8">
                                      <input id="passnew" name="passnew" placeholder="Contraseya nova" class="form-control here" type="password">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="repeatpassnew" class="col-4 col-form-label">Repetir Contrasenya nova*</label> 
                                    <div class="col-8">
                                      <input id="repeatpassnew" name="repeatpassnew" placeholder="Repetir Contrasenya nova" class="form-control here" type="text">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="offset-4 col-8">
                                      <button name="submit" type="submit" class="btn btn-primary">Guardar canvis</button>
                                    </div>
                                  </div>
                                </form>
    		                </div>
    		                <div role="tabpanel" aria-labelledby="pagament-tab" id="pagament" class="col-md-12 tab-pane"></div>
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
        $('#info').tab('show')
    </script>
</body>
</html>
