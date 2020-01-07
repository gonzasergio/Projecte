<?php
require '../../app/BDConnectio/DBConnection.php';
require '../../app/Model/Model.php';
require '../../app/Model/User.php';
require '../../app/Model/Publication.php';
require '../../app/Model/Paypal.php';
require '../../app/Model/Tarjeta.php';
require '../../app/Model/Grup.php';
require '../../app/Model/Nivell.php';
require '../../app/Model/Modalitat.php';
require '../../app/DAOs/DAO_User.php';
require '../../app/DAOs/DAO_Publication.php';
require '../../app/DAOs/DAO_Paypal.php';
require '../../app/DAOs/DAO_Targeta.php';
require '../../app/DAOs/DAO_Grup.php';
require '../../app/DAOs/DAO_Nivell.php';
require '../../app/DAOs/DAO_Modalitat.php';
require '../../app/DAO_Implements/FormatSQL.php';
require '../../app/DAO_Implements/UsersDAO.php';
require '../../app/DAO_Implements/PublicationDAO.php';
require '../../app/DAO_Implements/PaypalDAO.php';
require '../../app/DAO_Implements/TarjetaDAO.php';
require '../../app/DAO_Implements/GrupDAO.php';
require '../../app/DAO_Implements/NivellDAO.php';
require '../../app/DAO_Implements/ModalitatDAO.php';
require '../../app/Controllers/Controller.php';
require '../../app/Controllers/UserController.php';
require '../../app/Controllers/PublicationController.php';
require '../../app/Controllers/PaypalController.php';
require '../../app/Controllers/TarjetaController.php';
require '../../app/Controllers/GrupController.php';
require '../../app/Controllers/NivellController.php';
require '../../app/Controllers/ModalitatController.php';


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
    case '/api/insert/paypal':
        $controller = new PaypalController();
        $controller->insertPaypal();
        break;
    case '/api/get/paypal':
        $controller = new PaypalController();
        $controller->getPaypal();
        break;
    case '/api/delete/paypal':
        $controller = new PaypalController();
        $controller->deletePaypal();
        break;
    case '/api/get/paypal/all':
        $controller = new PaypalController();
        $controller->getAllPaypals();
        break;
    case '/api/update/paypal':
        $controller = new PaypalController();
        $controller->updatePaypal();
        break;
    case '/api/insert/targeta':
        $controller = new TarjetaController();
        $controller->insertTargeta();
        break;
    case '/api/get/targeta':
        $controller = new TarjetaController();
        $controller->getTargeta();
        break;
    case '/api/delete/targeta':
        $controller = new TarjetaController();
        $controller->deleteTargeta();
        break;
    case '/api/get/targeta/all':
        $controller = new TarjetaController();
        $controller->getAllTargetes();
        break;
    case '/api/update/targeta':
        $controller = new TarjetaController();
        $controller->updateTargeta();
        break;
    case '/api/insert/grup':
        $controller = new GrupController();
        $controller->insertGrup()();
        break;
    case '/api/get/grup':
        $controller = new GrupController();
        $controller->getGrup();
        break;
    case '/api/delete/grup':
        $controller = new GrupController();
        $controller->deleteGrup();
        break;
    case '/api/get/grup/all':
        $controller = new GrupController();
        $controller->getAllGrups();
        break;
    case '/api/update/grup':
        $controller = new GrupController();
        $controller->updateGrup();
        break;
    case '/api/insert/nivell':
        $controller = new NivellController();
        $controller->insertNivell()();
        break;
    case '/api/get/nivell':
        $controller = new NivellController();
        $controller->getNivell();
        break;
    case '/api/delete/nivell':
        $controller = new NivellController();
        $controller->deleteNivell();
        break;
    case '/api/get/nivell/all':
        $controller = new NivellController();
        $controller->getAllNivells();
        break;
    case '/api/update/nivell':
        $controller = new NivellController();
        $controller->updateNivell();
        break;
    case '/api/insert/modalitat':
        $controller = new ModalitatController();
        $controller->insertModalitat()();
        break;
    case '/api/get/modalitat':
        $controller = new ModalitatController();
        $controller->getModalitat();
        break;
    case '/api/delete/modalitat':
        $controller = new ModalitatController();
        $controller->deleteModalitat();
        break;
    case '/api/get/modalitat/all':
        $controller = new ModalitatController();
        $controller->getAllModalitats();
        break;
    case '/api/update/modalitat':
        $controller = new ModalitatController();
        $controller->updateModalitat();
        break;
    default:
        include $links[$link[0]];
}

