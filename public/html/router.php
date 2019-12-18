<?php
$links = [
    "inici" => "index.php",
    "excursions" => "llistaexcursions.php",
    "lesMevesExcursions" => "misExcursiones.php",
    "elsMeusCursos" => "misCursos.php",
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

$url = explode('/', $_SERVER['REQUEST_URI']);
$link = explode( '?', $url[sizeof($url)-1]);

include $links[$link[0]];