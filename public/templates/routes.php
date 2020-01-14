	 <?php foreach ($array as $rute) : ?>
	 		<div class="container-fluid">
                <div class="row border-bottom mx-2 mx-lg-3 mb-4">
                	<div class="d-none d-md-block col-sm-4 col-md-3 col-lg-2 text-center">
                    	<a href="<?php echo $link["perfil"] ?>?user=<?= $rute->getUserNom() ?>" title="<?= $rute->getUserNom() ?>">
                        	<img style="max-width: 80px" class="rounded-circle shadow-sm nostoryborder w-100" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg">
                    	</a>
                    	<p class="text-secondary mt-1">
                    		<a href="<?php echo $link["perfil"] ?>?user=<?= $rute->getUserNom() ?>" title="<?= $rute->getUserNom() ?>" class="text-secondary text-decoration-none"><?= $rute->getUserNom() ?></a>
                    	</p>
                	</div>
                    <div class="col">
                            <h4 class="mb-0"><a href="<?php echo $link["excursio"] ?>/<?= $rute->getId() ?>"><?= $rute->getName() ?></a></h4>
                            <small>
                        	<i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-secondary"></i>
                    		</small>
                            <div class="mb-2">
                            <div class="d-block d-md-none mb-n1">
                                <a class="text-decoration-none" href="<?php echo $link["perfil"] ?>?user=<?= $rute->getUserNom() ?>" title="<?= $rute->getUserNom() ?>"><small><i class='fas fa-user'></i></small> <?= $rute->getUserNom() ?></a>
                                <br>
                            </div>
                            <small>
                                <i class="fas fa-walking"></i> <span class="mr-2"><?= $rute->getKm() ?> km &nbsp;</span>
                                <i class="fas fa-medal"></i> <a class="mr-2" href="#"> <?= $rute->getDifficulty() ?></a>
                                <i class="fas fa-map-marker-alt"></i> <a class="mr-2" href="#"> <?= $rute->getZone() ?></a>
                            </small>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
             </div>
 	<?php endforeach; ?>

<script type="text/javascript">
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
</script>
