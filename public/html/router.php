<?php
require '../../app/BDConnectio/DBConnection.php';
require '../../app/Model/User.php';
require '../../app/DAOs/DAO_User.php';
require '../../app/DAO_Implements/UsersDAO.php';
require '../../app/Controllers/UserController.php';


$links = [
    "inici" => "index.php",
    "excursions" => "llistaexcursions.php",
    "les-meves-excursions" => "misExcursiones.php",
    "els-meus-cursos" => "misCursos.php",
    "pagament" => "pagament.php",
    "excursio" => "excursio.php",
    "login" => "login.php",
    "registre" => "registre.php",
    "tancarSessio" => "tancarsessio.php",
    "sessioIdioma" => "sesioIdioma.php",
    "arrayLanguage" => "arrayLanguage.php",
    "social" => "social.php",
    "perfil" => "perfil.php",
    "cursos" => "llistacursos.php",
    "historia" => "historia.php",
    "missatges" => "chat.php",
];


$path = str_replace("/projecte/public/html", "", $_SERVER['REQUEST_URI']);
$url = explode('/', $path);
$link = explode( '?', $url[sizeof($url)-1]);
$path = explode( '?', $path)[0];

//echo $path;
switch ($path) {
    case '/api/insert/user':
        $controller = new UserController();
        $controller->insertUser();
        break;
    case '/api/get/user':
        $controller = new UserController();
        $controller->getUser();
        break;
    case '/api/get/user/all':
        $controller = new UserController();
        $controller->getAllUsers();
        break;
    case '/api/update/user':
        $controller = new UserController();
        $controller->updateUser();
        break;
    default:
        include $links[$link[0]];
}

