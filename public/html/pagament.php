<?php
$idioma = null;
include '../templates/globalIclude.php';

if (!(isset($_SESSION["AUTH"]))){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../templates/head.php'?>
    <title><?php echo $lang[$idioma]["pay"]?></title>
</head>
<body>
<?php include '../templates/menu.php'?>
<main role="main" class="container-fluid">
<div class="row mt-5">
    <div class="col-lg-6 mx-auto">
      <div class="bg-light rounded-top shadow-sm p-2 border border-bottom-0"><h5><i class="far fa-credit-card ml-3 mt-2"></i> <?php echo $lang[$idioma]["pay"]?></h5></div>
      <div class="bg-white rounded-bottom shadow-sm p-5 border">
        <!-- Credit card form tabs -->
        <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
          <li class="nav-item">
            <a data-toggle="pill" href="#nav-tab-card" class="nav-link active rounded-pill">
                                <i class="far fa-credit-card"></i>
                                <?php echo $lang[$idioma]["creditCard"]?>
                            </a>
          </li>
          <li class="nav-item">
            <a data-toggle="pill" href="#nav-tab-paypal" class="nav-link rounded-pill">
                                <i class="fab fa-paypal"></i>
                                Paypal
                            </a>
          </li>
          <li class="nav-item">
            <a data-toggle="pill" href="#nav-tab-bank" class="nav-link rounded-pill">
                                <i class="fa fa-university"></i>
                                 <?php echo $lang[$idioma]["bankTransfer"]?>
                             </a>
          </li>
        </ul>
        <!-- End -->


        <!-- Credit card form content -->
        <div class="tab-content">

          <!-- credit card info-->
          <div id="nav-tab-card" class="tab-pane fade show active">
            <form role="form">
              <div class="form-group">
                <label for="username"><?php echo $lang[$idioma]["cardFullName"]?></label>
                <input type="text" name="username" placeholder="<?php echo $lang[$idioma]["cardNameExample"]?>" required class="form-control">
              </div>
              <div class="form-group">
                <label for="cardNumber"><?php echo $lang[$idioma]["cardNumber"]?></label>
                <div class="input-group">
                  <input type="text" name="cardNumber" placeholder="<?php echo $lang[$idioma]["yourCardNumber"]?>" class="form-control" required>
                  <div class="input-group-append">
                    <span class="input-group-text text-muted">
                                                <i class="fab fa-cc-visa mx-1"></i>
                                                <i class="fab fa-cc-amex mx-1"></i>
                                                <i class="fab fa-cc-mastercard mx-1"></i>
                                            </span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <div class="form-group">
                    <label><span class="hidden-xs"><?php echo $lang[$idioma]["expiration"]?></span></label>
                    <div class="input-group">
                      <input type="number" placeholder="MM" name="" class="form-control" required>
                      <input type="number" placeholder="YY" name="" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group mb-4">
                    <label data-toggle="tooltip" title="<?php echo $lang[$idioma]["ccvTip"]?>">CVV
                                                <i class="fa fa-question-circle"></i>
                                            </label>
                    <input type="text" required class="form-control">
                  </div>
                </div>



              </div>
              <button type="button" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> <?php echo $lang[$idioma]["confirm"]?>  </button>
            </form>
          </div>
          <!-- End -->

          <!-- Paypal info -->
          <div id="nav-tab-paypal" class="tab-pane fade">
            <p><?php echo $lang[$idioma]["paypalEasy"]?></p>
            <p>
              <button type="button" class="btn btn-primary rounded-pill"><i class="fab fa-paypal mr-2"></i> <?php echo $lang[$idioma]["loginPaypal"]?></button>
            </p>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
          <!-- End -->

          <!-- bank transfer info -->
          <div id="nav-tab-bank" class="tab-pane fade">
            <h6><?php echo $lang[$idioma]["bankDetails"]?></h6>
            <dl>
              <dt><?php echo $lang[$idioma]["bank"]?></dt>
              <dd> THE WORLD BANK</dd>
            </dl>
            <dl>
              <dt><?php echo $lang[$idioma]["bankAccount"]?></dt>
              <dd>7775877975</dd>
            </dl>
            <dl>
              <dt>IBAN</dt>
              <dd>CZ7775877975656</dd>
            </dl>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
          <!-- End -->
        </div>
        <!-- End -->

      </div>
    </div>
  </div>
</div>
<script>
$(function() {
	  $('[data-toggle="tooltip"]').tooltip()
	})
</script>


</main>
<?php include '../templates/footer.php'?>
</body>
</html>
