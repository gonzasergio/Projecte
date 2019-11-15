<?php
include '../templates/globalIclude.php';
include '../../app/BDConnectio/DBConnection.php';
include '../../app/Model/Rute.php';

$array = [];
$sql = "SELECT * FROM rutes;";
$stmt = DBConnection::getInstance()->getConnection()->prepare($sql);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    $array[] = $var = new Rute($row[0], $row[1], $row[2], $row[3], $row[4]);
}

//var_dump(basename($_SERVER['REQUEST_URI']));

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include '../templates/head.php'?>
    <title><?php echo $lang[$idioma]["home"]?></title>
</head>
<body>
	<?php include '../templates/menu.php'?>
	<main role="main" class="container-fluid">
    	<div class="row">
    		<div class="videobackground">
              <div class="overlay"></div>
              <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                <source src="../img/video.mp4" type="video/mp4">
              </video>
              <div class="container h-100">
                <div class="d-flex h-100 text-center align-items-center">
                  <div class="w-100 text-white">
                    <h1 class="display-4"><?php echo $lang[$idioma]["welcome"]?></h1>
                    <p class="lead mb-0"><?php echo $lang[$idioma]["keyline"]?></p>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </main>
  	<?php include '../templates/footer.php'?>

    <script type="text/javascript">
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    </script>
</body>
</html>
