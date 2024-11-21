<?php
$id = mysqli_connect("localhost", "root", "", "chatbotv1");
if (isset($_POST["bout"])) {
    echo "<pre>";
    var_dump($_POST);
    var_dump($_FILES);
    echo "</pre>";

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];

    // if($_FILES["avatar"]["size"] > 400000)
    // {
    //     echo "L'image est trop grande";
    // }

    $req = "select max(idu) as maxi from users";
    $res = mysqli_query($id, $req);
    $ligne = mysqli_fetch_assoc($res);
    $newId = $ligne["maxi"] + 1;
    $pos = strpos($_FILES["avatar"]["name"], ".");

    $ext = substr($_FILES["avatar"]["name"], $pos);

    move_uploaded_file($_FILES["avatar"]["tmp_name"], "avatar/" . $newId . $ext);
    //                   ad serv    user   mdp   BDD  
    $req = "select * from users where mail='$mail'";
    $res = mysqli_query($id, $req);
    if (mysqli_num_rows($res) == 0) {
        $req = "INSERT INTO users (nom, prenom, mail, mdp, avatar)
            VALUES ('$nom', '$prenom', '$mail', '$mdp', '$newId$ext')";
        if (empty($_FILES["avatar"]["name"])) {
            $req = "INSERT INTO users (nom, prenom, mail, mdp)
            VALUES ('$nom', '$prenom', '$mail', '$mdp')";
        }
        $res = mysqli_query($id, $req);
        echo "<h3>Inscription réussie, connectez vous...</h3>";
        header("refresh:3;url=connexion.php");
        //header("location:connexion.php");
    } else {
        echo "<h3>Mail déjà utilisé...</h3>";
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

    <h1>Formulaire d'inscription</h1>
    <hr>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="nom" placeholder="Nom :" required> <br><br>
        <input type="text" name="prenom" placeholder="Prénom :" required> <br><br>
        <input type="email" name="mail" placeholder="Mail :" required> <br><br>
        <input type="password" name="mdp" placeholder="Mot de passe :" required> <br><br>
        <input type="file" name="avatar"> <br><br>
        <input type="submit" value="ENREGISTRER" name="bout">

    </form>
    <hr>

</body>

</html>