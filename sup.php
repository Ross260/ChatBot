<?php
$idu = $_GET["idu"];
include "connect.php";
$req = "delete FROM users WHERE idu = '$idu'";
$result = mysqli_query($id, $req);
header("location:listeUsers.php");
?>
