<?php
session_start();
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

require '../../app/Router/Action.php';
require '../../app/Router/Router.php';

$links = [
    "" => "index.php",
    "inici" => "index.php",
    "comp-registre" => "compRegistre.php",
    "comp" => "comp.php",
    "excursions" => "llistaexcursions.php",
    "les-meves-excursions" => "misExcursiones.php",
    "els-meus-cursos" => "misCursos.php",
    "pagament" => "pagament.php",
    "excursio" => "excursio.php",
    "login" => "login.php",
    "registre" => "registre.php",
    "tancar-sessio" => "tancarsessio.php",
    "sessio-idioma" => "sesioIdioma.php",
    "arrayLanguage" => "arrayLanguage.php",
    "social" => "social.php",
    "perfil" => "perfil.php",
    "cursos" => "llistacursos.php",
    "historia" => "historia.php",
    "missatges" => "chat.php",
    "curs" => "curs.php",
    "perfil-opcions" => "perfilOpcions.php",
];



$path = strtolower($_SERVER['REQUEST_URI']);
$url = explode('/', $path);
$link = explode( '?', $url[sizeof($url)-1]);
$path = explode( '?', $path)[0];


$test = new Router();
//$test->add('get', 'test/excursio/{1,100}', 'ExcursioController', 'getView', ['id' => 3]);

// PUBLICATION
$test->add('post', 'api/publicatio', 'PublicationController', 'insertPublication');
$test->add('post', 'api/publicatio/[0-9]{1,}', 'PublicationController', 'getPublication', ['id' => 3]);
$test->add('delete', 'api/publicatio/[0-9]{1,}', 'PublicationController', 'deletePublication', ['id' => 3]);
$test->add('get', 'api/user/[0-9]{1,}/publication', 'PublicationController', 'getUserPublications', ['id' => 3]);
$test->add('get', 'api/publication/followers/[0-9]{1,}', 'PublicationController', 'getFollowersPublication', ['id' => 4]);



// USER
$test->add('get', 'api/user/[0-9]{1,}/comment', 'CommentUserController', 'getReferenceComments', ['id' => 3]);
$test->add('post', 'api/user', 'UserController', 'insertUser');
$test->add('get', 'api/user', 'UserController', 'getAllUsers');
$test->add('get', 'api/user/[A-Za-z0-9_]{1,}', 'UserController', 'getUser', ['id' => 3]);
$test->add('get', 'api/my-user', 'UserController', 'getMyUser');
$test->add('delete', 'api/user/[0-9]{1,}', 'UserController', 'deleteUser', ['id' => 3]);
$test->add('put', 'api/user/[0-9]{1,}', 'UserController', 'insertUser', ['id' => 3]);
$test->add('post', 'api/login', 'UserController', 'login');
$test->add('post', 'api/user/[0-9]{1,}/comment', 'CommentUserController', 'insertComment', ['id' => 3]);
$test->add('get', 'api/user/[0-9]{1,}/comment/[0-9]{1,}', 'CommentUserController', 'getCommentById', ['idPub' => 3, 'idCom' => 3]);
$test->add('get', 'api/user/[0-9]{1,}/comment/[0-9]{1,}/response', 'CommentUserController', 'getResponseComments', ['idPub' => 3, 'idCom' => 3]);


// PUBLICATION Comment
$test->add('get', 'api/publication/[0-9]{1,}/comment', 'CommentPublicationController', 'getReferenceComments', ['id' => 3]);
$test->add('post', 'api/publication/[0-9]{1,}/comment', 'CommentPublicationController', 'insertComment', ['id' => 3]);
$test->add('get', 'api/publication/[0-9]{1,}/comment/[0-9]{1,}', 'CommentPublicationController', 'getCommentById', ['idPub' => 3, 'idCom' => 3]);
$test->add('get', 'api/publication/[0-9]{1,}/comment/[0-9]{1,}/response', 'CommentPublicationController', 'getResponseComments', ['idPub' => 3, 'idCom' => 3]);

// ROUTE Comment
$test->add('get', 'api/route/[0-9]{1,}/comment', 'CommentRouteController', 'getReferenceComments', ['id' => 3]);
$test->add('post', 'api/route/[0-9]{1,}/comment', 'CommentRouteController', 'insertComment', ['id' => 3]);
$test->add('get', 'api/route/[0-9]{1,}/comment/[0-9]{1,}', 'CommentRouteController', 'getCommentById', ['idPub' => 3, 'idCom' => 3]);
$test->add('get', 'api/route/[0-9]{1,}/comment/[0-9]{1,}/response', 'CommentRouteController', 'getResponseComments', ['idPub' => 3, 'idCom' => 3]);

// CURS Comment
$test->add('get', 'api/curs/[0-9]{1,}/comment', 'CommentCursController', 'getReferenceComments', ['id' => 3]);
$test->add('post', 'api/curs/[0-9]{1,}/comment', 'CommentCursController', 'insertComment', ['id' => 3]);
$test->add('get', 'api/curs/[0-9]{1,}/comment/[0-9]{1,}', 'CommentCursController', 'getCommentById', ['idPub' => 3, 'idCom' => 3]);
$test->add('get', 'api/curs/[0-9]{1,}/comment/[0-9]{1,}/response', 'CommentCursController', 'getResponseComments', ['idPub' => 3, 'idCom' => 3]);

// PAYPAL
$test->add('post', 'api/paypal', 'PaypalController', 'insertPaypal');
$test->add('get', 'api/paypal', 'PaypalController', 'getAllPaypals');
$test->add('get', 'api/paypal/[0-9]{1,}', 'PaypalController', 'getPaypal', ['id' => 3]);
$test->add('delete','api/paypal/[0-9]{1,}', 'PaypalController', 'deletePaypal', ['id' => 3]);

// CARD
$test->add('post', 'api/card', 'CardController', 'insertCard');
$test->add('get', 'api/card', 'CardController', 'getAllCards');
$test->add('get', 'api/card/[0-9]{1,}', 'CardController', 'getCard', ['id' => 3]);
$test->add('delete','api/card/[0-9]{1,}', 'CardController', 'deleteCard', ['id' => 3]);

// LEVEL
$test->add('post', 'api/level', 'NivellController', 'insertNivell');
$test->add('get', 'api/level', 'NivellController', 'getAllNivells');
$test->add('get', 'api/level/[0-9]{1,}', 'NivellController', 'getNivell', ['id' => 3]);
$test->add('delete','api/level/[0-9]{1,}', 'NivellController', 'deleteNivell', ['id' => 3]);
$test->add('get','admin/level', 'NivellController', 'viewCRUD');

// MODALITY
$test->add('post', 'api/modality', 'ModalitatController', 'insertModalitat');
$test->add('get', 'api/modality', 'ModalitatController', 'getAllModalitats');
$test->add('get', 'api/modality/[0-9]{1,}', 'ModalitatController', 'getModalitat', ['id' => 2]);
$test->add('delete','api/modality/[0-9]{1,}', 'ModalitatController', 'deleteModalitat', ['id' => 3]);
$test->add('get','admin/modality', 'ModalitatController', 'viewCRUD');


// COUNTRY
$test->add('post', 'api/country', 'CountryController', 'insertCountry');
$test->add('get', 'api/country', 'CountryController', 'getAllCountry');
$test->add('get', 'api/country/[0-9]{1,}', 'CountryController', 'getCountry', ['id' => 3]);
$test->add('delete','api/country/[0-9]{1,}', 'CountryController', 'deleteCountry', ['id' => 3]);
$test->add('get','admin/country', 'CountryController', 'viewCRUD');

// REGION
$test->add('post', 'api/region', 'RegionController', 'insertRegion');
$test->add('get', 'api/region', 'RegionController', 'getAllRegion');
$test->add('get', 'api/region/[0-9]{1,}', 'RegionController', 'getRegion', ['id' => 3]);
$test->add('delete','api/region/[0-9]{1,}', 'RegionController', 'deleteRegion', ['id' => 3]);
$test->add('get','admin/region', 'RegionController', 'viewCRUD');

// CITY
$test->add('post', 'api/city', 'CityController', 'insertCity');
$test->add('get', 'api/city', 'CityController', 'getAllCity');
$test->add('get', 'api/city/[0-9]{1,}', 'CityController', 'getCity', ['id' => 3]);
$test->add('delete','api/city/[0-9]{1,}', 'CityController', 'deleteCity', ['id' => 3]);
$test->add('get','admin/city', 'CityController', 'viewCRUD');

// HISTORY
$test->add('post', 'api/history', 'HistoryController', 'insertHistory');
$test->add('get', 'api/history/[0-9]{1,}', 'HistoryController', 'getHistory', ['id' => 3]);
$test->add('delete','api/history/[0-9]{1,}', 'HistoryController', 'deleteHistory', ['id' => 3]);

//point
$test->add('get', 'api/first-points', 'PointController', 'getFirstZoneOfAllRoutes');
$test->add('get', 'api/route/[0-9]{1,}/path', 'PointController', 'getRoute', ['id' => 3]);

//basic Routes
$test->add('get', 'api/routes/basic', 'ExcursioBasicaController', 'getAllExcursions');
$test->add('get', 'api/routes/basic/[0-9]{1,}/avg', 'ExcursioBasicaController', 'getRouteAvg', ['id' => 4]);
$test->add('get', 'api/routes/basic/[0-9]{1,}', 'ExcursioBasicaController', 'getExcursio', ['id' => 4]);
$test->add('get', 'api/routes/basic/text', 'ExcursioBasicaController', 'getAllExcursionsByText');
$test->add('get', 'api/routes/basic/modality', 'ExcursioBasicaController', 'getAllExcursionsByModality');
$test->add('get', 'api/routes/basic/user/[0-9]{1,}', 'ExcursioBasicaController', 'getAllExcursionsByIdPropietari', ['id' => 5]);

//[0-9]{1,}
$test->dispatch(strtolower($_SERVER['REQUEST_METHOD']), $path);

switch ($path) {

    case '/api/get/first-point-route/all':
        $controller = new PointController();
        $controller->getFirstZoneOfAllRoutes();
        break;
    case '/api/update/publications':
        $controller = new PublicationController();
        $controller->updatePublication();
        break;
    case '/api/update/paypal':
        $controller = new PaypalController();
        $controller->updatePaypal();
        break;
    case '/api/update/targeta':
        $controller = new CardController();
        $controller->updateCard();
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
    case '/api/update/nivell':
        $controller = new NivellController();
        $controller->updateNivell();
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
    case '/admin/country':
        $controller = new CountryController();
        $controller->viewCRUD();
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
    case '/admin/region':
        $controller = new RegionController();
        $controller->viewCRUD();
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
    case '/admin/city':
        $controller = new CityController();
        $controller->viewCRUD();
        break;
    case '/api/insert/route':
        $controller = new ExcursioController();
        $controller->insertExcursio();
        break;
    case '/api/get/route':
        $controller = new ExcursioController();
        $controller->getExcursio();
        break;
    case '/api/delete/route':
        $controller = new ExcursioController();
        $controller->deleteExcursio();
        break;
    case '/api/get/route/all':
        $controller = new ExcursioController();
        $controller->getAllExcursions();
        break;
    case '/api/get/route/user':
        $controller = new ExcursioController();
        $controller->getAllExcursionsByIdPropietari();
        break;
    case '/api/update/route':
        $controller = new ExcursioController();
        $controller->updateExcursio();
        break;
    case '/api/get/route/distance':
        $controller = new ExcursioController();
        $controller->getAllExcursionsByDistance();
        break;
    case '/api/get/route/duration':
        $controller = new ExcursioController();
        $controller->getAllExcursionsByDuration();
        break;
    case '/api/get/route/price':
        $controller = new ExcursioController();
        $controller->getAllExcursionsByPric();
        break;
    case '/api/get/route/difficulty':
        $controller = new ExcursioController();
        $controller->getAllExcursionsByDifficulty();
        break;
    case '/api/get/route/modality':
        $controller = new ExcursioController();
        $controller->getAllExcursionsByModality();
        break;
    case '/api/insert/curs':
        $controller = new CursController();
        $controller->insertCurs();
        break;
    case '/api/get/curs':
        $controller = new CursController();
        $controller->getCurs();
        break;
    case '/api/delete/curs':
        $controller = new CursController();
        $controller->deleteCurs();
        break;
    case '/api/get/curs/all':
        $controller = new CursController();
        $controller->getAllCursos();
        break;
    case '/api/get/curs/perfil':
        $controller = new CursController();
        $controller->getAllCursosByIdPropietari();
        break;
    case '/api/update/curs':
        $controller = new CursController();
        $controller->updateCurs();
        break;
    case '/api/insert/history':
        $controller = new HistoryController();
        $controller->insertHistory();
        break;
    case '/api/get/history':
        $controller = new HistoryController();
        $controller->getHistory();
        break;
    case '/api/delete/history':
        $controller = new HistoryController();
        $controller->deleteHistory();
        break;
    case ( preg_match( '/excursio\/\.*/', $path ) ? true : false ):
        echo $path;
        $_GET['id'] = $url[sizeof($url)-1];
        include '../../app/Views/excursio.php';
        break;
    case '/graph':
        include '../../app/Views/GRAPH.html';
        break;
    case '/chart':
        include '../../app/Views/CHART.html';
        break;
    default:
        include '../../app/Views/' . $links[$link[0]];
}

