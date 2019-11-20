<?php
$idioma = null;
include '../templates/globalIclude.php';

if (!(isset($_SESSION["AUTH"]))){
    header("Location: ".$link["login"]);
}

include '../../app/BDConnectio/DBConnection.php';
include '../../app/Model/Rute.php';

$array = [];
$sql = "SELECT * FROM rutes WHERE id = '".$_GET['id']."';";
$stmt = DBConnection::getInstance()->getConnection()->prepare($sql);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    $array[] = $var = new Rute($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $template["head"]?>
    <title><?php echo $lang[$idioma]["pay"]?></title>
</head>
<body>
<?php include $template["menu"]?>
<main role="main" class="container-fluid">
	<div class="col-lg-6 col-md-10 mx-auto">
	<p class="mt-5 text-secondary h3"><?= $array[0]->getName() ?></p>
	</div>
<div class="row mt-3">
    <div class="col-lg-6 col-md-10 mx-auto">
      <div class="bg-light rounded-top shadow-sm p-2 border border-bottom-0"><h5><i class="far fa-credit-card ml-3 mt-2"></i> <?php echo $lang[$idioma]["pay"]?></h5></div>
      <div class="bg-white rounded-bottom shadow-sm p-5 border">
        <!-- Credit card form tabs -->
        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-5 mb-md-4">
          <li class="nav-item">
            <a data-toggle="pill" href="#nav-tab-card" class="nav-link active rounded">
                                <i class="far fa-credit-card"></i>
                                <?php echo $lang[$idioma]["creditCard"]?>
                            </a>
          </li>
          <li class="nav-item">
            <a data-toggle="pill" href="#nav-tab-paypal" class="nav-link rounded">
                                <i class="fab fa-paypal"></i>
                                Paypal
                            </a>
          </li>
          <li class="nav-item">
            <a data-toggle="pill" href="#nav-tab-bank" class="nav-link rounded">
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
              <button type="button" class="subscribe btn btn-primary btn-block rounded shadow-sm"> <?php echo $lang[$idioma]["confirm"]?>  </button>
            </form>
          </div>
          <!-- End -->

          <!-- Paypal info -->
          <div id="nav-tab-paypal" class="tab-pane fade">
            <p><?php echo $lang[$idioma]["paypalEasy"]?></p>
            <p>
              <button type="button" class="btn btn-primary rounded"><i class="fab fa-paypal mr-2"></i> <?php echo $lang[$idioma]["loginPaypal"]?></button>
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
<?php include $template["footer"]?>
</body>
</html>
