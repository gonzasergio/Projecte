<?php

require '../../app/BDConnectio/DBConnection.php';

function autoloader($classname) {
    if (file_exists("../../app/Model/".$classname.".php")){
        require '../../app/Model/'.$classname.'.php';
    }
    if (file_exists("../../app/DAOs/".$classname.".php")){
        require '../../app/DAOs/'.$classname.'.php';
    }
    if (file_exists("../../app/Controllers/".$classname.".php")){
        require '../../app/Controllers/'.$classname.'.php';
    }
    if (file_exists("../../app/DAO_Implements/".$classname.".php")){
        require '../../app/DAO_Implements/'.$classname.'.php';
    }
}
spl_autoload_register("autoloader");

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


$path = str_replace("/projecte/public/html", "", strtolower($_SERVER['REQUEST_URI']));
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
        $controller->insertModalitat();
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
    case '/api/insert/country':
        $controller = new CountryController();;
        $controller->insertCountry();
        break;
    case '/api/get/country':
        $controller = new CountryController();
        $controller->getCountry();
        break;
    case '/api/delete/country':
        $controller = new CountryController();
        $controller->deleteCountry();
        break;
    case '/api/get/country/all':
        $controller = new CountryController();
        $controller->getAllCountry();
        break;
    case '/api/update/country':
        $controller = new CountryController();
        $controller->updateCountry();
        break;
    case '/api/insert/region':
        $controller = new RegionController();;
        $controller->insertRegion();
        break;
    case '/api/get/region':
        $controller = new RegionController();
        $controller->getRegion();
        break;
    case '/api/delete/region':
        $controller = new RegionController();
        $controller->deleteRegion();
        break;
    case '/api/get/region/all':
        $controller = new RegionController();
        $controller->getAllRegion();
        break;
    case '/api/update/region':
        $controller = new RegionController();
        $controller->updateRegion();
        break;
    case '/api/insert/city':
        $controller = new CityController();
        $controller->insertCity();
        break;
    case '/api/get/city':
        $controller = new CityController();
        $controller->getCity();
        break;
    case '/api/delete/city':
        $controller = new CityController();
        $controller->deleteCity();
        break;
    case '/api/get/city/all':
        $controller = new CityController();
        $controller->getAllCity();
        break;
    case '/api/update/city':
        $controller = new CityController();
        $controller->updateCity();
        break;
    default:
        include $links[$link[0]];
}

