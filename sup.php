<?php
include "connect.php";
$idu = $_GET['idu'];
$query = "delete FROM user WHERE idu = '$idu'";
mysqli_query($id, $query);
header("location:listeUsers.php");
?>