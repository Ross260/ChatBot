<?php
session_start();
if (isset($_POST["bout"])) {
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];
    //                   ad serv    user   mdp   BDD
    $id = mysqli_connect("localhost", "root", "", "chatbotv1");
    $req = "select * from users where mail='$mail' and mdp='$mdp'";
    // $req = "select * from users where mail='$mail' and mdp='' or '1'";
    //     ' or '1   
    $res = mysqli_query($id, $req);
    if (mysqli_num_rows($res) > 0) {
        $ligne = mysqli_fetch_assoc($res);
        $_SESSION["nom"] = $ligne["nom"];
        $_SESSION["prenom"] = $ligne["prenom"];
        $_SESSION["mail"] = $ligne["mail"];
        $_SESSION["niveau"] = $ligne["niveau"];

        echo "<h3>Connexion réussie, vous allez être redirigé....";
        header("refresh:3;url=chat.php");
    } else {
        $erreur = "<h3>Erreur de connexion, veuillez réessayer</h3>";
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
    <h1>Formulaire de connexion</h1>
    <hr>
    <form action="" method="post">
        <input type="email" name="mail" placeholder="Mail :" required> <br><br>
        <input type="password" name="mdp" placeholder="Mot de passe :" required> <br><br>
        <?php if (isset($erreur)) echo $erreur ?>
        <input type="submit" value="CONNEXION" name="bout">
    </form>
    <hr>
    <a href="inscription.php">Pas inscrit!</a>
</body>

</html>