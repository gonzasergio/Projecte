<?php
include '../templates/globalIclude.php';

if (!(isset($_SESSION["AUTH"]))){
    header("Location: ".$link["login"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $template["head"]?>
    <title>Social</title>
</head>
<body>
<?php include $template["menu"]?>
<main role="main" class="container-fluid">
<div class="mt-4 px-1 px-md-3 d-block d-md-none storyrow overflow-auto">
    <div class="userstory d-block-inline">
    	<div class="d-flex justify-content-center">
    	<a href="<?php echo $link["historia"] ?>?user=<?php echo $_SESSION["user"];?>">
        <img title="<?php echo $_SESSION["user"];?>" class="mb-0 mr-3 rounded-circle shadow-sm storyborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" width="60px">
    	</a>
    	</div>
    	<div class="d-flex justify-content-center">
    		<a href="<?php echo $link["historia"] ?>?user=<?php echo $_SESSION["user"];?>" title="<?php echo $_SESSION["user"];?>" class="m-0 small text-decoration-none text-dark"><?php echo $_SESSION["user"];?></a>
    	</div>
    </div>
    <div class="userstory d-block-inline">
    	<div class="d-flex justify-content-center">
    	<a href="<?php echo $link["historia"] ?>?user=Toni">
        <img title="Toni" class="mb-0 mr-3 rounded-circle shadow-sm storyborder-seen" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" width="60px">
    	</a>
    	</div>
    	<div class="d-flex justify-content-center">
    		<a href="<?php echo $link["historia"] ?>?user=Toni" title="Toni" class= "m-0 small text-decoration-none text-dark">Toni</a>
    	</div>
    </div>
</div>
<div class="row mt-3 px-1 px-md-3">
<div class="col-lg-9 col-md-8 mt-n2 mt-md-2 mx-2 mb-3 mb-md-0">
        <a href="#" class="text-primary h5 d-none d-md-block"><i class="fas fa-plus-circle"></i> <?php echo $lang[$idioma]["newStory"];?></a>
        <a href="#" class="text-primary d-block d-md-none"><i class="fas fa-plus-circle"></i> <?php echo $lang[$idioma]["newStory"];?></a>
        <hr class="d-block d-md-none">
</div>

<div class="col-md d-flex flex-md-row-reverse">
		
<div class="input-group mb-3 mb-md-0 pl-0">
    <div class="input-group mb-3 my-0">
      <input type="text" class="form-control" placeholder="<?php echo $lang[$idioma]["findUser"];?>" aria-label="<?php echo $lang[$idioma]["findUser"];?>" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn btn-outline-primary" type="button"><i class="fa fa-search"></i></button>
      </div>
    </div>
</div>
</div>
</div>


    <div class="container-fluid gedf-wrapper mt-3">
        <div class="row">
            <div class="col-md-3 d-none d-lg-block">
                <div class="card">
                    <div class="card-body">
                    	<a id="myUserLink">
						<img id="myUserImg" class="d-flex mb-2 mr-3 rounded-circle shadow-sm storyborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" width="75px">
                        </a>
                        <a id="myUserName" class="h5 text-dark text-decoration-none"></a>
                        <div class="h7">
                            <p id="myUserDescription"></p>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="h6 text-muted"><?php echo $lang[$idioma]["followers"];?></div>
                            <div class="h5"><p id="myFollowersNum"></p></div>
                        </li>
                        <li class="list-group-item">
                            <div class="h6 text-muted"><?php echo $lang[$idioma]["following"];?></div>
                            <div class="h5"><p id="myFollowingNum"></p></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8 col-lg-6 gedf-main">

                <!--- \\\\\\\Post-->
                <div class="card gedf-card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true"><?php echo $lang[$idioma]["publication"];?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images"><?php echo $lang[$idioma]["images"];?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                <div class="form-group">
                                    <label class="sr-only" for="message"><?php echo $lang[$idioma]["share"];?></label>
                                    <textarea class="form-control" id="message" rows="3" placeholder="<?php echo $lang[$idioma]["whatAreYouThinking"];?>"></textarea>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="form-control-file" id="customFile">
                                        <label class="custom-file-label" for="customFile"><?php echo $lang[$idioma]["uploadImage"];?></label>
                                    </div>
                                </div>
                                <div class="py-4"></div>
                            </div>
                        </div>
                        <div class="btn-toolbar justify-content-between">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary"><?php echo $lang[$idioma]["share"];?></button>
                            </div>
                            
                            <div class="btn-group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-link dropdown-toggle text-decoration-none text-old-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-globe"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="#"><i class="fa fa-globe"></i> <?php echo $lang[$idioma]["public"];?></a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-user-lock"></i> <?php echo $lang[$idioma]["private"];?></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Post /////-->

                <!--- \\\\\\\Post-->
                <div id="publication">

                </div>
                <!-- Post /////-->
                
                     <div class="card gedf-card my-4 d-block d-md-none">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $lang[$idioma]["suggestions"];?></h5>
							<div class="row px-3 mt-3 mb-3">
								<a href="<?php echo $link["perfil"] ?>?user=Reina isabel">
									<img title="Reina isabel" class="d-flex mr-3 rounded-circle shadow-sm mt-2 nostoryborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" height="40px" width="40px">
								</a>
								<div class="ml-2">
									<a href="<?php echo $link["perfil"] ?>?user=Reina isabel" title="Reina isabel" class= "mt-n2 text-decoration-none font-weight-bold text-dark">Reina isabel </a><br>
									<button class="btn btn-light btn-sm"> <small><?php echo $lang[$idioma]["follow"];?></small></button>
								</div>
							</div>
                            <a href="#" class="card-link text-old-primary"><?php echo $lang[$idioma]["seeMore"];?></a>
                        </div>
                    </div>



            </div>
            <div class="col-md-4 col-lg-3 d-none d-md-block">
			
                <div class="card gedf-card mb-4 order-0">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $lang[$idioma]["stories"];?></h5>
                        <div class="row px-3">
                        	<a href="<?php echo $link["historia"] ?>?user=<?php echo $_SESSION["user"];?>">
							<img title="<?php echo $_SESSION["user"];?>" class="d-flex mr-3 rounded-circle shadow-sm mt-1 storyborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" height="40px" width="40px">
                            </a>
                            <div class="ml-2">
                                <a  href="<?php echo $link["historia"] ?>?user=<?php echo $_SESSION["user"];?>"  title="<?php echo $_SESSION["user"];?>" class="m-0 font-weight-bold text-decoration-none text-dark"><?php echo $_SESSION["user"];?> </a><br>
                                <small class="text-muted"> <i class="fa fa-clock-o"></i> 40 min</small>
                            </div>
						</div>
						<div class="row px-3 mt-3">
							<a href="<?php echo $link["historia"] ?>?user=Toni">
							<img title="Toni" class="d-flex mr-3 rounded-circle shadow-sm mt-1 storyborder-seen" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" height="40px" width="40px">
                            </a>
                            <div class="ml-2">
                                <a href="<?php echo $link["historia"] ?>?user=Toni" title="Toni" class= "m-0 font-weight-bold text-decoration-none text-dark">Toni </a><br>
                                <small class="text-muted"> <i class="fa fa-clock-o"></i> 1 h</small>
                            </div>
						</div>
                    </div>
                </div>
				
                <div class="card gedf-card my-4">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $lang[$idioma]["suggestions"];?></h5>
							<div class="row px-3 mt-3 mb-3">
								<a href="<?php echo $link["perfil"] ?>?user=Reina isabel">
									<img title="Reina isabel" class="d-flex mr-3 rounded-circle shadow-sm mt-2 nostoryborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" height="40px" width="40px">
								</a>
								<div class="ml-2">
									<a href="<?php echo $link["perfil"] ?>?user=Reina isabel" title="Reina isabel" class= "mt-n2 text-decoration-none font-weight-bold text-dark">Reina isabel </a><br>
									<button class="btn btn-light btn-sm"> <small><?php echo $lang[$idioma]["follow"];?></small></button>
								</div>
							</div>
                            <a href="#" class="card-link text-old-primary"><?php echo $lang[$idioma]["seeMore"];?></a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

</main>
<?php include $template["footer"]?>

<script src="/js/social.js?1500"></script>
</body>