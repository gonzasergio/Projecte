<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link rel="shortcut icon" href="favicon.ico"/>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

<form action="" method="post" target="_self">
    Prova: <input type="text" name="value"><br>
    <input type="submit" value="Submit">
</form>
<?

session_start();

if (isset($_POST['value'])) add(isset($_POST['value']));

function add($list) {
    if (!isset($_SESSION['list'])) $_SESSION['list'] = array();
    if (!isset($_POST['value'])) return;
    array_push($_SESSION['list'] , $_POST['value']);
    header('Location: whishList.php');
}
foreach ($_SESSION['list'] as $i){
    echo "<b>$i</b><br/>";
}

?>
</body>
</html>