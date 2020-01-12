<?php
include '../templates/globalIclude.php';

if ((isset($_SESSION["AUTH"])) && ($_SESSION["AUTH"] == true)){
    header("Location: ".$link["inici"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $template["head"]?>
    <title><?php echo $lang[$idioma]["register"]?></title>
</head>
<body>
    <?php include $template["menu"]?>
    <main class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="card shadow-sm mt-5" style="width: 18rem;">
                <h5 class="card-header"><i class="far fa-id-card"></i> <?php echo $lang[$idioma]["register"]?></h5>
                <div class="card-body">
                    
                    <form>
                        <div class="form-group">
                            <label><i class="fas fa-key text-secondary"></i> Email:</label>
                            <input class="form-control" type="text" id="email">
                            <small id="incorrectPass2" class="form-text text-danger"></small>
                        </div>
                    	<div class="form-group">
                            <label><i class="fas fa-user text-secondary"></i> <?php echo $lang[$idioma]["user"]?>:</label>
                            <input class="form-control" type="text" id="name">
                            <small id="incorrectUser" class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-key text-secondary"></i> <?php echo $lang[$idioma]["password"]?>:</label>
                            <input class="form-control" type="password" id="pass">
                            <small id="incorrectPass" class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-key text-secondary"></i> <?php echo $lang[$idioma]["repeatPassword"]?>:</label>
                            <input class="form-control" type="password" id="pass2">
                            <small id="incorrectPass2" class="form-text text-danger"></small>
                        </div>
                    	<button class="btn btn-primary btn-block rounded mt-4 disabled" type="button" id="submit"><?php echo $lang[$idioma]["submit"]?> &nbsp;&nbsp;<i class="fas fa-angle-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-2">
            <a href="<?php echo $link["login"]?>"><?php echo $lang[$idioma]["alreadyRegister"] ?>.</a>
        </div>
    </main>
    <script src="../js/bootstrap/bootstrap-validate.js" ></script>
    <script>
    	bootstrapValidate("#name", "min:3:<?php echo $lang[$idioma]["userShort"]?>");
    	bootstrapValidate("#pass", "min:2:<?php echo $lang[$idioma]["passwordShort"]?>");
    	bootstrapValidate("#pass2", "matches:#pass:<?php echo $lang[$idioma]["passwordsDoesntMatch"]?>");

    	$(document).ready(function() {

			  $("#name").keyup(function() {
				  if ($("#incorrectUser").text() != ""){
					  $("#name").removeClass("is-invalid");
				  }
    				  $("#incorrectUser").text("");
			  });
			  
    	      $('#submit').click(function(){
        	      if (!($("#submit").hasClass("disabled"))){
            	      var name = $("#name").val();
            	      var pass = String(CryptoJS.MD5($("#pass").val()));
    	    	  $.post( "compRegistre.php", {name: name, pass: pass}, function( data ) {
     	    		  if (data == 0) {
        	    		  window.location.href = "login.php";
    	    		  } else {
    	    			  $("#incorrectUser").text("<?php echo $lang[$idioma]['userAlreadyExists']?>");
    	    			  $("#name").addClass("is-invalid");
    	    			  $("#userCreated").addClass("d-none");
    	    		  }
    	    		});
        	      }
    	      });
    	      
    	  });
  	  
  	  $("form").keyup(function(){
			if($("#name").hasClass("is-invalid") || $("#pass").hasClass("is-invalid") || $("#pass2").hasClass("is-invalid") || $("#name").val() == "" || $("#pass").val() == "" || $("#pass2").val() == ""){
				$("#submit").addClass("disabled ");
			} else {
				$("#submit").removeClass("disabled");
			}
  	  	  });
    </script>
    <?php include $template["footer"]?>
</body>
</html>