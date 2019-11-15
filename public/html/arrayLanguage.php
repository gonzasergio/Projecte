<?php

$lang = [
    "en" => [
        "user" => "User", 
        "password" => "Password",
        "repeatPassword" => "Repeat Password",
        "login" => "Login",
        "home" => "Home",
        "submit" => "Submit",
        "logout" => "Close Session",
        "lang" => "English",
        "langCode" => "en",
        "noRegister" => "You don't have an account? Sign up",
        "register" => "Register",
        "signUp" => "Sign Up!",
        "registerFree" => "Register for free",
        "alreadyRegister" => "Your'r already have an account? Sign on",
        "route" => "Route",
        "pay" => "Pay",
        "yourRoutes" => "Your routes",
        "name" => "Name",
        "zone" => "Zone",
        "difficulty" => "Difficulty",
        "routeList" => "Route list",
        "welcome" => "Welcome to GOATrails!",
        "keyline" => "Find the Greatest Of All Trails.",
        "startSearching" => "Start searching routes!",
        "search" => "Search",
        "myRoute" =>"My Route list"
    ],
    "es" => [
        "user" => "Usuario", 
        "password" => "Contraseña",
        "repeatPassword" => "Repetir Contraseña",
        "login" => "Iniciar Sesión",
        "home" => "Inicio",
        "submit" => "Enviar",
        "logout" => "Cerrar Sesión",
        "lang" => "Español",
        "langCode" => "es",
        "noRegister" => "¿No tienes cuenta? Registrate",
        "register" => "Registro",
        "signUp" => "¡Registrarse!",
        "registerFree" => "Registrate gratuitamente",
        "alreadyRegister" => "¿Ya tienes una cuenta? Inicia sesión",
        "route" => "Ruta",
        "pay" => "Pagar",
        "yourRoutes" => "Tus rutas",
        "name" => "Nombre",
        "zone" => "Zona",
        "difficulty" => "Dificultad",
        "routeList" => "Lista de rutas",
        "welcome" => "¡Bienvenido a GOATrails!",
        "keyline" => "Encuentra ''The Greatest Of All Trails''.",
        "startSearching" => "¡Empieza a buscar rutas!",
        "search" => "Buscar",
        "myRoute" =>"Mi Lista de rutas"

    ],
    "fr" => [
        "user" => "Utilisateur", 
        "password" => "Mot de passe",
        "repeatPassword" => "Répéter le mot de passe",
        "login" => "S'identifier",
        "home" => "Accueil",
        "submit" => "Soumettre",
        "logout" => "Fermer la session",
        "lang" => "Français",
        "langCode" => "fr",
        "noRegister" => "Vous n'avez pas de compte? S'inscrire",
        "register" => "S'inscrire",
        "signUp" => "Inscrivez-vous!",
        "registerFree" => "Inscription gratuite",
        "alreadyRegister" => "Vous avez déjà un compte? S'identifier",
        "route" => "Itinéraire",
        "pay" => "Payer",
        "yourRoutes" => "Vos rutes",
        "name" => "Nom",
        "zone" => "Zone",
        "difficulty" => "Difficulté",
        "routeList" => "Liste des itinéraires",
        "welcome" => "Bienvenue à GOATrails!",
        "keyline" => "Trouver ''The Greatest Of All Trails''.",
        "startSearching" => "Commencer à chercher des rutes!",
        "search" => "Chercher",
        "myRoute" => "Meuro Liste des itinéraires"
    ],
    "ca" => [
        "user" => "Usuari",
        "password" => "Contrasenya",
        "repeatPassword" => "Repetir Contrasenya",
        "login" => "Iniciar Sessió",
        "home" => "Inici",
        "submit" => "Enviar",
        "logout" => "Tancar la sessió",
        "lang" => "Catala",
        "langCode" => "ca",
        "noRegister" => "No tens compta? Registra't",
        "register" => "Registre",
        "signUp" => "Registrar-se!",
        "registerFree" => "Registra't gratuitament",
        "alreadyRegister" => "Ja tens un compte? Inicia sessió",
        "route" => "Ruta",
        "pay" => "Pagar",
        "yourRoutes" => "Les teves rutes",
        "name" => "Nom",
        "zone" => "Zona",
        "difficulty" => "Dificultat",
        "routeList" => "Llista de rutes",
        "welcome" => "Bienvingut a GOATrails!",
        "keyline" => "Troba ''The Greatest Of All Trails''.",
        "startSearching" => "Comença a cercar rutes!",
        "search" => "Cercar",
        "myRoute" => "La Meva Llista de rutes"
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