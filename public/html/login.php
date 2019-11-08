<?php
include 'arrayLanguage.php';

session_start();

if ((isset($_SESSION["AUTH"])) && ($_SESSION["AUTH"] == true)){
    header("Location: index.php");
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
	<style>
    @import url('https://fonts.googleapis.com/css?family=Ubuntu:400,500,700&display=swap');
    *{font-family: 'Ubuntu', sans-serif;}
    </style>
    <meta charset="UTF-8">
    <title><?php echo $lang[$idioma]["login"]?></title>
    <link rel="icon" type="image/png" href="http://35.204.235.53/img/favicon.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/40bb3d9f69.js"></script>
</head>
<body>
<div class="container-fluid">
	<div class="row bg-light p-2 shadow-sm">
		<div class="col .flex-row">
			<img src="../img/logo.png" class="rounded mr-2 float-left" alt="" height="50px">
			<h1 class="text-secondary d-inline">GOATrails</h1>
		</div>
    	<div class="col d-flex justify-content-end">
    	<i class="fas fa-language float-left text-secondary h1 mr-3"></i>
            <form action="sesioIdioma.php" method="post">
                <div class="form-group">
                      <select class="form-control float-right" id="language" onChange="canviaIdioma()">
                      <?php 
                      foreach ($lang as $i) {
                          $selected = ($idioma==$i["langCode"])?('selected'):('');
                          echo "<option value='".$i["langCode"]."'".$selected.">".$i["lang"]."</option>";
                      }
                      
                      ?>
                	</select>
                </div>
            </form>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="card shadow-sm mt-5" style="width: 18rem;">
            <h5 class="card-header"><i class="fas fa-sign-in-alt"></i> <?php echo $lang[$idioma]["login"]?></h5>
            <div class="card-body">
                <form>
                	<div class="form-group">
                        <label><i class="fas fa-user text-secondary"></i> <?php echo $lang[$idioma]["user"]?>:</label><input class="form-control" type="text" id="name">
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-key text-secondary"></i> <?php echo $lang[$idioma]["password"]?>:</label><input class="form-control" type="password" id="pass">
                    </div>
                	<button class="btn btn-primary" type="button" onClick="encripta()"><?php echo $lang[$idioma]["submit"]?> &nbsp;&nbsp;<i class="fas fa-angle-right"></i></button>
                </form>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center mt-2">
    	<a href="#"><?php echo $lang[$idioma]["register"] ?>.</a>
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