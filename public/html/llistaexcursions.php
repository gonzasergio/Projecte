<?php
include '../templates/globalIclude.php';
include '../../app/BDConnectio/DBConnection.php';
include '../../app/Model/Rute.php';

$array = [];
$sql = "SELECT * FROM rutes";
$title =  $lang[$idioma]["myRoute"];

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
    <title><?php echo $lang[$idioma]["routeList"]?></title>
</head>
<body>
<?php include $template["menu"]?>

<main role="main" class="container-fluid m-main">
 <div class="row" style="height: 77.5vh">
 	<div class="col-12 col-md-6" style="height: 77.5vh">
 	
 	 	<div class="row" style="height: 8.5vh">
 	 		<div class="col mx-5 mt-4">
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
 	 	<div class="row border-bottom" style="height: 7vh">
 	 		<div class="col mx-5 mt-2">
 	 			<div>
 	 				<i class="mt-1 float-left d-inline fas fa-angle-double-left text-secondary"></i>
 	 				<div class="d-inline mx-2 text-secondary">Zonas</div>
 	 				<div class="d-inline mx-2 text-secondary">Dificultad</div>
 	 				<div class="mx-2 text-secondary d-none d-sm-inline d-md-none d-lg-inline">Distancia</div>
 	 				<i class="mt-1 d-inline float-right fas fa-angle-double-right text-secondary"></i>
 	 			</div>
 	 		</div>
 	 	</div>
 	 	
 	 	<div class="row overflow-auto" style="height: 62vh">
 	 		<div class="col pt-2">
 	 			<?php include $template["routes"]?>
 	 		</div>
 	 	</div>
 	 	
 	</div>
 	
 	<div class="d-none d-md-block col-6 overflow-hidden" style="height: 77.5vh">
 	 <img class="ml-n3" src="https://www.coolbusinessideas.com/wp-content/uploads/2018/10/Google-Map-Now-Tells-You-Offers-From-Your-Favourite-Places-.jpg">
 	</div>
 	
 </div>
 <div class="row bg-light shadow-sm">
 	<div class="col text-center border"><p class="my-2"><i class="fas fa-route"></i> Excusiones</p></div>
 	<div class="col text-center border"><p class="my-2"><i class="fas fa-map-marked-alt"></i> Mapa</p></div>
 </div>
</main>

<?php include $template["footer"]?>
</body>
</html>
