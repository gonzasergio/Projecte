<footer class="footer container-fluid">
	<div class="row">
      	<div class="col bg-secondary p-5 text-center">
          	<li class="list-inline-item">
                <h5 class="text-light"><?php echo (!(isset($_SESSION["AUTH"])))?($lang[$idioma]["registerFree"]):($lang[$idioma]["startSearching"]) ?></h5>
            </li>
            <li class="list-inline-item">
                <a href="<?php echo (!(isset($_SESSION["AUTH"])))?($link["registre"]):($link["excursions"]); ?>" class="btn btn-outline-light rounded">
                	<?php echo (!(isset($_SESSION["AUTH"])))?($lang[$idioma]["signUp"]):($lang[$idioma]["search"]) ?>
                </a>
        	</li>
      	</div>
    </div>
    <div class="row text-center bg-dark p-2">
        <div class="col text-center bg-dark p-2">
        	<a href="<?php echo $link["inici"]?>" class="text-secondary">&copy; <?php echo date("Y"); ?> Copyright - GOATrails.com</a>
        </div>
	</div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
