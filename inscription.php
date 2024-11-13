<?php
session_start();
if(isset($_POST['bout'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    include "connect.php";
    $req = "INSERT INTO users (nom,prenom,mail,mdp)
                VALUES ('$nom','$prenom','$mail','$mdp')";
    $res = mysqli_query($id,$req);
    echo "<h3>Inscruption réussie, connectez vous....";
    header("refresh:3;url=connexion.php");
    //header("location:connexion.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulaire d'inscription</h1><hr>

    <form action="" method="post">
        <input type="text" name="nom" placeholder="Nom :" required> <br><br>
        <input type="text" name="prenom" placeholder="Prénom :" required> <br><br>
        <input type="email" name="mail" placeholder="Mail :" required> <br><br>
        <input type="password" name="mdp" placeholder="Mot de passe :" required> <br><br>

        <input type="submit" value="ENREGISTRER" name="bout">

    </form><hr>

</body>
</html>