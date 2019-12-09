<header class="container-fluid sticky">
    <div class="row bg-secondary pt-2">
        <div class="col d-flex justify-content-start">
            <form action="<?php echo $link["sessioIdioma"]?>" method="post">
                <div class="form-group">
                    <select class="form-control float-right custom-select-sm" id="language" onChange="canviaIdioma()">
                        <?php
                          foreach ($lang as $i) {
                              $selected = ($idioma==$i["langCode"])?('selected'):('');
                              echo "<option class ='font-weight-normal text-secondary' value='".$i["langCode"]."'".$selected.">".$i["lang"]."</option>";
                        }
    
                        ?>
                	</select>
                </div>
            </form>
            <i class="fas fa-language float-left text-light h2 ml-3"></i>
        </div>
    	<div class="col d-flex justify-content-end">
      				<?php
      				if (!(isset($_SESSION["AUTH"]))){
      				  include $template["responsive-login-btn"];
      				} else {
      				  include $template["profile-dropdown"];
      				}
      				?>
    	</div>
    </div>
</header>
<script type="text/javascript">
$('document').ready(function(){
var loc = window.location.pathname;
var doc = loc.split(/(\\|\/)/g).pop();
switch (doc) {
case "llistaexcursions.php":
	$("li#Llista").attr("class","active");
	break;
case "social.php":
	$("li#Social").attr("class","active");
	break;
case "index.php":
	$("li#Home").attr("class","active");
	  break;
case "":
	$("li#Home").attr("class","active");
	  break;
}
});
</script>
    <nav class="navbar navbar-light navbar-expand-md bg-light p-2 shadow-sm sticky-top sticky-nav">
    	<a class="navbar-brand mr-5" href="<?php echo $link["inici"]?>">
            <img src="../img/logo.png" class="rounded mr-2 float-left" alt="" height="50px">
        	<h1 class="text-secondary">GOATrails</h1>
        </a>
      	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      		<span class="navbar-toggler-icon"></span>
      	</button>
      	<div class="h5 collapse navbar-collapse mt-2" id="navbarNavDropdown">
        	<ul class="navbar-nav ml-4 ml-md-auto">
          		<li id="Home" class="nav-item mx-1">
            		<a class="nav-link" href="<?php echo $link["inici"]?>"><i class="fas fa-home"></i> <?php echo $lang[$idioma]["home"] ?></a>
          		</li>
          		<li id="Llista" class="nav-item mx-1">
            		<a class="nav-link" href="<?php echo $link["excursions"]?>"><i class="fas fa-route"></i> <?php echo $lang[$idioma]["routeList"] ?></a>
          		</li>
          		<li id="Cursos" class="nav-item mx-1">
            		<a class="nav-link" href="#"><i class="fas fa-chalkboard-teacher"></i> Cursos</a>
          		</li>
          		<li id="Social" class="nav-item mx-1">
            		<a class="nav-link" href="<?php echo $link["social"]?>"><i class="fas fa-users"></i> <?php echo $lang[$idioma]["social"];?></a>
          		</li>
        	</ul>
      </div>
    </nav>