<?php
include 'arrayLanguage.php';

session_start();

if ((isset($_SESSION["AUTH"])) && ($_SESSION["AUTH"] == true)){
    header("Location: inici.php");
}
if (!isset($_SESSION["idioma"])){
    if (in_array(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2), $lang)){
        $idioma = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    } else {
        $idioma = "en";
    }
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
	<div class="row bg-light border-bottom p-2">
		<div class="col"></div>
    	<div class="col d-flex justify-content-end">
            <form action="sesioIdioma.php" method="post">
                <div class="form-group">
                      <select class="form-control" id="language" onChange="canviaIdioma()">
                        <option value="es" <?php echo ($idioma=='es')?('selected'):(''); ?>>Español</option>
                        <option value="en" <?php echo ($idioma=='en')?('selected'):(''); ?>>English</option>
                        <option value="fr" <?php echo ($idioma=='fr')?('selected'):(''); ?>>French</option>
                	</select>
                </div>
            </form>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="card shadow-sm mt-5" style="width: 18rem;">
            <h5 class="card-header"><?php echo $lang[$idioma]["login"]?></h5>
            <div class="card-body">
                <form>
                	<div class="form-group">
                        <label><?php echo $lang[$idioma]["user"]?></label><input class="form-control" type="text" id="name">
                    </div>
                    <div class="form-group">
                        <label><?php echo $lang[$idioma]["password"]?></label><input class="form-control" type="password" id="pass">
                    </div>
                	<button class="btn btn-primary" type="button" onClick="encripta()"><?php echo $lang[$idioma]["submit"]?></button>
                </form>
            </div>
        </div>
    </div>
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
</div>
</body>
</html>