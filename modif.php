<?php
include "connect.php";
if(isset($_POST["bout"])){
    $idu = $_POST["idu"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $mail = $_POST["mail"];
    $niveau = $_POST["niveau"];
    $req = "update users set nom='$nom',
                            prenom='$prenom',
                            mail='$mail',
                            niveau='$niveau'
            where idu=$idu";
    
    $res = mysqli_query($id, $req);
    header("location:listeUsers.php");

}

$idu = $_GET["idu"];

$req = "select * FROM users WHERE idu = '$idu'";
$result = mysqli_query($id, $req);
$ligne = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Modification de <?=$ligne["nom"]." ".$ligne["prenom"]?></h1><hr>
    <form action="" method="post">
        <input type="text" name="nom" placeholder="Nom :" value="<?=$ligne["nom"]?>">
        <input type="text" name="prenom" placeholder="Prénom :" value="<?=$ligne["prenom"]?>">
        <input type="email" name="mail" placeholder="Mail :" value="<?=$ligne["mail"]?>">
        <input type="number" name="niveau" placeholder="Niveau :" value="<?=$ligne["niveau"]?>">
        <input type="hidden" name="idu" value="<?=$ligne["idu"]?>">
        <input type="submit" value="Modifier" name="bout">
    </form>
</body>
</html>