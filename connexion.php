<?php
session_start();
if(isset($_POST['bout'])){
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $id = mysqli_connect("localhost","root","","chatbotv1");
    $req = "select * from user where mail='$mail' and mdp='$mdp'";
    $res = mysqli_query($id,$req);
    if(mysqli_num_rows($res) == 1){
        $ligne = mysqli_fetch_assoc($res);
        $_SESSION['mail']=$mail;
        $_SESSION['nom']=$ligne["nom"];
        $_SESSION['prenom']=$ligne["prenom"];
        header("location:chat.php");
    }else{
        $erreur = "<h3>Erreur de login ou de mot de passe!!!</h3>";
    } 
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
    <h1>Formulaire de connexion</h1><hr>
    <form action="" method="post">
        <input type="email" name="mail" placeholder="Login :" required><br><br>
        <input type="password" name="mdp" placeholder="Mot de passe :" required> <br><br>
        <?php if(isset($erreur)) echo $erreur;?>
        <input type="submit" value="CONNEXION" name="bout">
    </form><hr>
    <a href="inscription.php">Pas inscrit!</a>

</body>
</html>