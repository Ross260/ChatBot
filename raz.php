<?php

//connexion à la base de donnée
$id = mysqli_connect("localhost","root","","chatbotv1");

$req = "DELETE FROM message";

 //exécution de la requete
 mysqli_query($id, $req);
 header("location: index.php");

?>