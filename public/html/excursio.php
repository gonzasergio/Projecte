<?php
session_start();
$idioma = null;
include 'arrayLanguage.php';
include '../templates/detectarIdioma.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../templates/head.php'?>
    <title><?php echo $lang[$idioma]["route"]?></title>
</head>
<body>
<?php include '../templates/menu.php'?>
<main role="main" class="container-fluid">
    <h1> <?= $_GET['name'] ?></h1>

    <a class="btn btn-primary" href="pagament.php" role="button">Link</a>

</main>
<?php include '../templates/footer.php'?>

<script type="text/javascript">
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
</script>
</body>
</html>
