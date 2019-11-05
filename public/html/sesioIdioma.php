<?php
session_start();
$_SESSION["idioma"] = $_POST["language"];
header("Location: login.php");