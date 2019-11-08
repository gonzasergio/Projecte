<?php

$lang = [
    "en" => [
        "user" => "User", 
        "password" => "Password",
        "repeatPassword" => "Repeat Password",
        "login" => "Login",
        "home" => "Home",
        "submit" => "Submit",
        "closeSesion" => "Close Session",
        "lang" => "English",
        "langCode" => "en",
        "noRegister" => "You don't have an account? Sign up",
        "register" => "Register",
        "signUp" => "Sign Up!",
        "registerFree" => "Register for free",
        "alreadyRegister" => "Your'r already have an account? Sign on"
    ],
    "es" => [
        "user" => "Usuario", 
        "password" => "Contraseña",
        "repeatPassword" => "Repetir Contraseña",
        "login" => "Iniciar Sesión",
        "home" => "Inicio",
        "submit" => "Enviar",
        "closeSesion" => "Cerrar Sesión",
        "lang" => "Español",
        "langCode" => "es",
        "noRegister" => "¿No tienes cuenta? Registrate",
        "register" => "Registro",
        "signUp" => "¡Registrarse!",
        "registerFree" => "Registrate gratuitamente",
        "alreadyRegister" => "¿Ya tienes una cuenta?Inicia sesión"  
    ],
    "fr" => [
        "user" => "Utilisateur", 
        "password" => "Mot de passe",
        "repeatPassword" => "Répéter le mot de passe",
        "login" => "S'identifier",
        "home" => "Accueil",
        "submit" => "Soumettre",
        "closeSesion" => "Fermer la session",
        "lang" => "Français",
        "langCode" => "fr",
        "noRegister" => "Vous n'avez pas de compte? s'inscrire",
        "register" => "S'inscrire",
        "signUp" => "Inscrivez-vous!",
        "registerFree" => "Inscription gratuite",
        "alreadyRegister" => "Vous avez déjà un compte? S'identifier"
    ],
    "ca" => [
        "user" => "Usuari",
        "password" => "Contrasenya",
        "repeatPassword" => "Repetir Contrasenya",
        "login" => "Iniciar Sessió",
        "home" => "Inici",
        "submit" => "Enviar",
        "closeSesion" => "Tancar la sessió",
        "lang" => "Catala",
        "langCode" => "ca",
        "noRegister" => "No tens compta? Registra't",
        "register" => "Registre",
        "signUp" => "Registra-se!",
        "registerFree" => "Registra't gratuitament",
        "alreadyRegister" => "Ja tens un compte? Inicia sessió"
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