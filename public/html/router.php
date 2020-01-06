<?php
require '../../app/BDConnectio/DBConnection.php';
require '../../app/Model/Model.php';
require '../../app/Model/User.php';
require '../../app/Model/Publication.php';
require '../../app/DAOs/DAO_User.php';
require '../../app/DAOs/DAO_Publication.php';
require '../../app/DAO_Implements/FormatSQL.php';
require '../../app/DAO_Implements/UsersDAO.php';
require '../../app/DAO_Implements/PublicationDAO.php';
require '../../app/Controllers/Controller.php';
require '../../app/Controllers/UserController.php';
require '../../app/Controllers/PublicationController.php';


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
    case '/api/delete/user':
        $controller = new UserController();
        $controller->deleteUser();
        break;
    case '/api/get/user/all':
        $controller = new UserController();
        $controller->getAllUsers();
        break;
    case '/api/update/user':
        $controller = new UserController();
        $controller->updateUser();
        break;
    case '/api/insert/publication':
        $controller = new PublicationController();
        $controller->insertPublication();
        break;
    case '/api/get/publication':
        $controller = new PublicationController();
        $controller->getPublication();
        break;
    case '/api/delete/publication':
        $controller = new PublicationController();
        $controller->deletePublication();
        break;
    case '/api/get/user/publications':
        $controller = new PublicationController();
        $controller->getUserPublications();
        break;
    case '/api/get/route/publications':
        $controller = new PublicationController();
        $controller->getRoutePublications();
        break;
    case '/api/update/publications':
        $controller = new PublicationController();
        $controller->updatePublication();
        break;
    default:
        include $links[$link[0]];
}

