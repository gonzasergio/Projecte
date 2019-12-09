<div class='dropdown show'>
	<a class='btn btn-link text-light dropdown-toggle text-decoration-none' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
		<i class='fas fa-user'></i>&nbsp;&nbsp;
		<span class='d-none d-md-inline'>
      	<?php echo $_SESSION["user"];?>
		</span>
	</a>      				  
<div class='dropdown-menu dropdown-menu-right' aria-labelledby='dropdownMenuLink'>
	<a class='dropdown-item' href='<?php echo $link["lesMevesExcursions"]?>'><i class='fas fa-map-marked-alt'></i> <?php echo $lang[$idioma]["myRoute"];?></a>
	<a class='dropdown-item' href='<?php echo $link["tancarSessio"]?>'><i class='fas fa-sign-out-alt' aria-hidden='true'></i> <?php echo $lang[$idioma]["logout"];?></a>
</div>
</div>