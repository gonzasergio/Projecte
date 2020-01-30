<?php
include '../templates/globalIclude.php';
include '../../app/Model/Rute.php';

$array = [];
$sql = "SELECT * FROM rutes";

$stmt = DBConnection::getInstance()->getConnection()->prepare($sql);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    $array[] = $var = new Rute($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $template["head"]?>
    <title><?php echo $lang[$idioma]["courses"]?></title>
</head>
<body>
<?php include $template["menu"]?>
<main role="main" class="container-fluid">
	<div class="row mx-2 mx-sm-5 pt-4 mt-4">
	<div class="col-3 col-xl-2 mt-4 class border-right d-none d-md-block">
	<div class="mb-3">
    	<p class="font-weight-bold border-bottom">Zona<i class="fas fa-caret-up float-right"></i></p>
        <div class="form-group">
            <label for="selectpais">Pais:</label>
            <select class="form-control" id="selectpais">
            	<option>1</option>
            	<option>2</option>
            	<option>3</option>
            	<option>4</option>
            	<option>5</option>
        	</select>
        </div>
        <div class="form-group">
            <label for="selectregio">Regio:</label>
            <select class="form-control" id="selectregio">
            	<option>1</option>
            	<option>2</option>
            	<option>3</option>
            	<option>4</option>
            	<option>5</option>
        	</select>
        </div>
        <div class="form-group">
            <label for="selectciutat">Ciutat:</label>
            <select class="form-control" id="selectciutat">
            	<option>1</option>
            	<option>2</option>
            	<option>3</option>
            	<option>4</option>
            	<option>5</option>
        	</select>
        </div>
    </div>
    <div class="mb-3">
    	<p class="font-weight-bold border-bottom">Dificultat<i class="fas fa-caret-up float-right"></i></p>
    	<div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Facil</label>
      	</div>
      	<div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Intermig</label>
      	</div>
      	<div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Avançat</label>
      	</div>
  	</div>
  	<div class="mb-3">
		<p class="font-weight-bold border-bottom">Hores<i class="fas fa-caret-down float-right"></i></p>
	</div>
	<div class="mb-3">
		<p class="font-weight-bold border-bottom">Data<i class="fas fa-caret-down float-right"></i></p>
	</div>
	</div>
	<div class="col">
		<div class="row mb-0 mb-md-4" style="min-height: 64.11px; height: 8.5vh">
 	 		<div class="col mx-3 mx-md-5 mt-4">
 	 			<div class="input-group mb-3 mb-md-0 pl-0">
                    <div class="input-group mb-3 my-0">
                      <input type="text" class="form-control" placeholder="Cercar" aria-label="Cercar" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                </div>
 	 		</div>
 	 	</div>
 	 	<div class="row border-bottom d-block mb-4 d-md-none" style="min-height: 52.8px; height: 7vh">
 	 		<div class="col mx-3 mx-md-5 mt-2">
 	 			<div>
 	 				<i class="mt-1 float-left d-inline fas fa-angle-double-left text-secondary"></i>
 	 				<div class="d-inline mx-2 text-secondary">Zona</div>
 	 				<div class="d-inline mx-2 text-secondary">Dificultat</div>
 	 				<div class="mx-2 text-secondary d-inline d-md-none d-lg-inline">Distancia</div>
 	 				<i class="mt-1 d-inline float-right fas fa-angle-double-right text-secondary"></i>
 	 			</div>
 	 		</div>
 	 	</div>
 	 	
	 <div id="curs">
	 
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
<script src="/js/LlistaCursos.js?1500"></script>
</body>
</html>
