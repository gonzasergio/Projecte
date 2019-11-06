<?php

$lang = [
    "en" => [
        "user" => "User", 
        "password" => "Password", 
        "login" => "Login",
        "home" => "Home",
        "submit" => "Submit",
        "closeSesion" => "Close Session",
        "lang" => "English",
        "langCode" => "en",
        "register" => "You don't have an account? Sign up"
    ],
    "es" => [
        "user" => "Usuario", 
        "password" => "Contraseña", 
        "login" => "Iniciar Sesión",
        "home" => "Inicio",
        "submit" => "Enviar",
        "closeSesion" => "Cerrar Sesión",
        "lang" => "Español",
        "langCode" => "es",
        "register" => "¿No tienes cuenta? Registrate"
    ],
    "fr" => [
        "user" => "Utilisateur", 
        "password" => "Mot de passe", 
        "login" => "S'identifier",
        "home" => "Accueil",
        "submit" => "Soumettre",
        "closeSesion" => "Fermer la session",
        "lang" => "Français",
        "langCode" => "fr",
        "register" => "Vous n'avez pas de compte? s'inscrire"
    ],
    "ca" => [
        "user" => "Usuari",
        "password" => "Contrasenya",
        "login" => "Iniciar Sessió",
        "home" => "Inici",
        "submit" => "Enviar",
        "closeSesion" => "Tancar la sessió",
        "lang" => "Catala",
        "langCode" => "ca",
        "register" => "No tens compta? Registra't"
    ]
];

//ORDENAR ARRAY
function sort_array_of_array(&$array, $subfield)
{
    $sortarray = array();
    foreach ($array as $key => $row)
    {
        $sortarray[$key] = $row[$subfield];
    }
    
    array_multisort($sortarray, SORT_ASC, $array);
}

sort_array_of_array($lang, 'lang');