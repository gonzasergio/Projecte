<header class="container-fluid">
    <div class="row bg-secondary pt-1">
        <div class="col d-flex justify-content-end">
            <i class="fas fa-language float-left text-light h2 mr-3"></i>
            <form action="sesioIdioma.php" method="post">
                <div class="form-group">
                    <select class="form-control float-right custom-select-sm" id="language" onChange="canviaIdioma()">
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
    <div class="row bg-light p-2 shadow-sm">
        <div class="col .flex-row">
            <img src="../img/logo.png" class="rounded mr-2 float-left" alt="" height="50px">
            <h1 class="text-secondary d-inline">GOATrails</h1>
        </div>
        <div class="col d-flex justify-content-end">
        </div>
    </div>
</header>