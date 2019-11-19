<div class='d-none d-md-block'>
	<a href='<?php echo $link["login"] ?>' class='btn btn-sm btn-light rounded'>
		<?php echo $lang[$idioma]["login"];?>
	</a>
	<a href='<?php echo $link["registre"] ?>' class='ml-2 btn btn-sm btn-outline-light rounded'>
		<?php echo $lang[$idioma]["register"];?>
	</a>
</div>
                      
<div class='d-block d-md-none'>
	<div class='dropdown show'>
		<a class='btn text-light dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
			<i class='fas fa-user'></i>
 		</a>
	<div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
	<a class='dropdown-item' href='<?php echo $link["login"] ?>'><i class='fas fa-sign-in-alt' aria-hidden='true'></i> <?php echo $lang[$idioma]["login"]?></a>
	<a class='dropdown-item' href='<?php echo $link["registre"] ?>'><i class='far fa-id-card' aria-hidden='true'></i> <?php echo $lang[$idioma]["register"]?></a>
	</div>
</div>
</div>