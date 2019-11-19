<div class='d-none d-md-block'>
	<a href='login.php' class='btn btn-sm btn-light rounded-pill'>
		<?php echo $lang[$idioma]["login"];?>
	</a>
	<a href='registre.php' class='ml-2 btn btn-sm btn-outline-light rounded-pill'>
		<?php echo $lang[$idioma]["register"];?>
	</a>
</div>
                      
<div class='d-block d-md-none'>
	<div class='dropdown show'>
		<a class='btn text-light dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
			<i class='fas fa-user'></i>
 		</a>
	<div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
	<a class='dropdown-item' href='login.php'><i class='fas fa-sign-in-alt' aria-hidden='true'></i> <?php echo $lang[$idioma]["login"]?></a>
	<a class='dropdown-item' href='register.php'><i class='far fa-id-card' aria-hidden='true'></i> <?php echo $lang[$idioma]["register"]?></a>
	</div>
</div>
</div>