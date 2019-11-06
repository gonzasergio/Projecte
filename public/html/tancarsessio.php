<?php
include 'arrayLanguage.php';
session_start();

if (!isset($_SESSION["idioma"])){
    if (in_array(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2), $lang)){
        $idioma = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    } else {
        $idioma = "en";
    }
} else {
    $idioma = $_SESSION["idioma"];
}

session_destroy();
session_start();

$_SESSION["idioma"] = $idioma;

header("Location: login.php");
?>