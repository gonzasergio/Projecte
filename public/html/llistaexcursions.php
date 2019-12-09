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
 <div class="row" style="height: 584.65px">
 	<div class="col-12 col-md-6" style="height: 584.65px">
 	
 	 	<div class="row" style="height: 64.11px">
 	 		<div class="col mx-3 mx-md-5 mt-4">
 	 			<div class="input-group mb-3 mb-md-0 pl-0">
                    <div class="input-group mb-3 my-0">
                      <input type="text" class="form-control" placeholder="<?php echo $lang[$idioma]["search"]?>" aria-label="<?php echo $lang[$idioma]["search"]?>" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                </div>
 	 		</div>
 	 	</div>
 	 	<div class="row border-bottom" style="height: 52.8px">
 	 		<div class="col mx-3 mx-md-5 mt-2">
 	 			<div>
 	 				<i class="mt-1 float-left d-inline fas fa-angle-double-left text-secondary"></i>
 	 				<div class="d-inline mx-2 text-secondary"><?php echo $lang[$idioma]["zone"]?></div>
 	 				<div class="d-inline mx-2 text-secondary"><?php echo $lang[$idioma]["difficulty"]?></div>
 	 				<div class="mx-2 text-secondary d-inline d-md-none d-lg-inline"><?php echo $lang[$idioma]["distance"]?></div>
 	 				<i class="mt-1 d-inline float-right fas fa-angle-double-right text-secondary"></i>
 	 			</div>
 	 		</div>
 	 	</div>
 	 	
 	 	<div class="row overflow-auto" style="height: 467.73px">
 	 		<div class="col pt-2">
 	 			<?php include $template["routes"]?>
 	 		</div>
 	 	</div>
 	 	
 	</div>
 	
 	<div class="d-none d-md-block col-6 overflow-hidden p-0" style="height: 584.65px">
        <div id="mapa" style="width: 100%; height: 100%; z-index: 10">

        </div>
 	</div>
 	
 </div>
 <div class="row bg-light shadow-sm">
 	<div class="col text-center border"><p class="my-2"><i class="fas fa-route"></i> <?php echo $lang[$idioma]["routes"]?></p></div>
 	<div class="col text-center border"><p class="my-2"><i class="fas fa-map-marked-alt"></i> <?php echo $lang[$idioma]["map"]?></p></div>
 </div>
</main>

<?php include $template["footer"]?>

<script>
    var m = L.map('mapa').setView([39.66637682250297, 2.9030112138683597], 11);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoicHJvZmV3ZWIiLCJhIjoiY2pwM3JxeHR3MGF6cjNrcXcwbmh0MGZtOCJ9.mxvmjOpVymwltGGlcxHx8g'
    }).addTo(m);

    let marker = L.marker([39.56961188244454,3.211168229307762]).addTo(m);
    marker.bindPopup("<b>Manacor</b>");

    marker = L.marker([39.64281188244454,3.011168229307762]).addTo(m);
    marker.bindPopup("<b>Sineu</b>");
</script>
</body>
</html>
