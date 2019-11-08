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
        "noRegister" => "You don't have an account? Sign up",
        "register" => "Register"
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
        "noRegister" => "¿No tienes cuenta? Registrate",
        "register" => "Registro"
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
        "noRegister" => "Vous n'avez pas de compte? s'inscrire",
        "register" => "S'inscrire"
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
        "noRegister" => "No tens compta? Registra't",
        "register" => "Registre"
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