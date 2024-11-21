<?php
session_start();
echo "Le compte ".$_SESSION["mail"]." a été déconnecté...";
session_destroy();
header("refresh:3;url=connexion.php");
?>