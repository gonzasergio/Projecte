<?php
$idioma = null;
include '../templates/globalIclude.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $template["head"]?>
    <title><?php echo $lang[$idioma]["route"]?></title>
</head>
<body>
<?php include $template["menu"]?>
<main role="main" class="container-fluid">
    <div class="m-5">
        <h1> <?= $_GET['name'] ?></h1>
        <a class="btn btn-primary rounded mt-4 mb-5" href="<?php echo $link["pagament"]?>" role="button"><i class="far fa-credit-card"></i> <?php echo $lang[$idioma]["pay"]?></a>
    </div>
</main>
<?php include $template["footer"]?>

</body>
</html>
