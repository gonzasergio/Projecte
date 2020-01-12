<footer class="footer container-fluid">
	<div class="row bg-secondary" style="height: 134.28px">
      	<div class="col px-5 text-center my-auto">
          	<li class="list-inline-item">
                <p class="text-light h5"><?php echo (!(isset($_SESSION["AUTH"])))?($lang[$idioma]["registerFree"]):($lang[$idioma]["startSearching"]) ?></p>
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

<script src="/js/crypto-js/aes.js"></script>
<script src="/js/popper/popper.min.js"></script>
<script src="/js/bootstrap/bootstrap.min.js"></script>
