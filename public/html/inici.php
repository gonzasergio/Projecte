<?php
include 'arrayLanguage.php';

session_start();
if (!(isset($_SESSION["AUTH"])) && !($_SESSION["AUTH"] == true)){
   header("Location: login.php");
}

if (!isset($_SESSION["idioma"])){
    $idioma = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
} else {
    $idioma = $_SESSION["idioma"];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $lang[$idioma]["login"]?></title>
</head>
<body>
<a href="tancarsessio.php"><?php echo $lang[$idioma]["closeSesion"]?></a>
</body>
</html>
