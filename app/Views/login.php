<?php
include '../templates/links.php';
include $link["arrayLanguage"];
include $template["detectarIdioma"];

if (isset($_SESSION["lastRoute"])){
    $url = ($_SESSION["lastRoute"] == '') ? $link["inici"] : $_SESSION["lastRoute"];
} else {
    $url = $link["inici"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $template["head"];?>
    <title><?php echo $lang[$idioma]["login"]?></title>
</head>
<body>
    <?php include $template["menu"];?>
    <main class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="card shadow-sm mt-5" style="width: 18rem;">
                <h5 class="card-header"><i class="fas fa-sign-in-alt"></i> <?php echo $lang[$idioma]["login"]?></h5>
                <div class="card-body">
                    <form>
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
                    	<button class="btn btn-primary btn-block rounded mt-4 disabled" type="button" id="submit"><?php echo $lang[$idioma]["submit"]?> &nbsp;&nbsp;<i class="fas fa-angle-right"></i></button>
               		</form>
     	    	</div>
        	</div>
        </div>
        <div class="row d-flex justify-content-center mt-2">
            <a href="<?php echo $link["registre"]?>"><?php echo $lang[$idioma]["noRegister"] ?>.</a>
        </div>
    </main>
    <script type="text/javascript">
    $("#name").keyup(function() {
		  if ($("#incorrectUser").text() != ""){
			  $("#name").removeClass("is-invalid");
		  }
			  $("#incorrectUser").text("");
	  });

    $("#pass").keyup(function() {
		  if ($("#incorrectPass").text() != ""){
			  $("#pass").removeClass("is-invalid");
		  }
			  $("#incorrectPass").text("");
	  });
	  
    $('#submit').click(function(){
	      if (!($("#submit").hasClass("disabled"))){
  	      var name = $("#name").val();
  	      var pass = String(CryptoJS.MD5($("#pass").val()));

              $.ajax({
                  url: '/api/login',
                  type: 'POST',
                  data: {
                      password: pass,
                      userName: name
                  },
                  success: function(data) {

                      switch (data) {
                          case "0":
                              window.location.href = "<?php echo $url?>";
                              break;
                          case "1":
                              $("#incorrectUser").text("<?php echo $lang[$idioma]['userDoesntExists']?>");
                              $("#incorrectPass").text("");
                              $("#name").addClass("is-invalid");
                              $("#pass").removeClass("is-invalid");
                              break;
                          case "2":
                              $("#incorrectPass").text("<?php echo $lang[$idioma]['passwordDoesntMatch']?>");
                              $("#incorrectUser").text("");
                              $("#pass").addClass("is-invalid");
                              $("#name").removeClass("is-invalid");
                              break;
                      }
                  }
              });
	      }
    });

    $("form").keyup(function(){
		if($("#name").hasClass("is-invalid") || $("#pass").hasClass("is-invalid") || $("#name").val() == "" || $("#pass").val() == ""){
			$("#submit").addClass("disabled ");
		} else {
			$("#submit").removeClass("disabled");
		}
	  	  });
    </script>
    <?php include $template["footer"];?>
</body>
</html>