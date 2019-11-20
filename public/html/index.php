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
  	<?php include $template["footer"]?>

    <script type="text/javascript">
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    </script>
</body>
</html>
