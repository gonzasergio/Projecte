<?php
include 'arrayLanguage.php';

session_start();

if ((isset($_SESSION["AUTH"])) && ($_SESSION["AUTH"] == true)){
    header("Location: inici.php");
}
if (!isset($_SESSION["idioma"])){
  $idioma = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
} else {
  $idioma = $_SESSION["idioma"];
}

//var_dump($_SESSION["idioma"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $lang[$idioma]["login"]?></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<form action="sesioIdioma.php" method="post">
  <select id="language" onChange="canviaIdioma()">
    <option value="es" <?php echo ($idioma=='es')?('selected'):(''); ?>>Español</option>
    <option value="en" <?php echo ($idioma=='en')?('selected'):(''); ?>>English</option>
    <option value="fr" <?php echo ($idioma=='fr')?('selected'):(''); ?>>French</option>
  </select>
</form>
<form>
    <?php echo $lang[$idioma]["user"]?><input type="text" id="name">
    <?php echo $lang[$idioma]["password"]?><input type="password" id="pass">
    <button type="button" onClick="encripta()"><?php echo $lang[$idioma]["submit"]?></button>
</form>
<p id="test"></p>
<script>
function canviaIdioma(){
  selector = document.getElementById('language').value;
  post("sesioIdioma.php",{language:selector});
}

function encripta(){
    var encrypted = String(CryptoJS.MD5(document.getElementById("pass").value));
    var nom = document.getElementById("name").value;
	post("comp.php",{pass:encrypted, name:nom});
}

function post(path, params, method='post') {

  const form = document.createElement('form');
  form.method = method;
  form.action = path;

  for (const key in params) {
    if (params.hasOwnProperty(key)) {
      const hiddenField = document.createElement('input');
      hiddenField.type = 'hidden';
      hiddenField.name = key;
      hiddenField.value = params[key];

      form.appendChild(hiddenField);
    }
  }

  document.body.appendChild(form);
  form.submit();
}
</script>
</body>
</html>