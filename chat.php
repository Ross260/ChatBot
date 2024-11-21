<?php
session_start();
include "connect.php";

if(!isset($_SESSION['mail'])) {
    header('Location: connexion.php');
}
//connexion au serveur mysql

if(isset($_POST["bout"])){
    $pseudo = $_POST["pseudo"];
    $message = $_POST["message"];
    $req = "insert into messages (pseudo,message,date)
            values ('$pseudo','$message',NOW())";  
    //execution de la requete
    mysqli_query($id, $req);
    header("location:chat.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    Bonjour <?=$_SESSION["prenom"]?>,  
            <?php if($_SESSION["niveau"]==2) {
                echo "<a href='listeUsers.php'>Liste</a>";
            }
            ?>
            <br><a href="deconnexion.php">Deconnexion</a>
    <div class="container">
        <header>
            <h1>Chattez'en direct! Chatbox --- <a href="raz.php">RAZ</a></h1>
        </header>
        <div class="messages">
            <ul>
                <?php
                //affichage des messages
                $req = "SELECT * FROM messages";
                $result = mysqli_query($id, $req);
                while($ligne = mysqli_fetch_assoc($result)){
                    echo "<li class='mess'>".$ligne["date"]." : ".$ligne["pseudo"].
                            " : ".$ligne["message"]."</li>";
                }
                ?>
                
            </ul>
        </div>
        <div class="formulaire">
            <form action="" method="post">
                <input type="text" name="pseudo" placeholder="Pseudo" required>
                <input type="text" name="message" placeholder="Message" required><br>
                <input type="submit" value="ENVOYER" name="bout">
            </form>

        </div>
    </div>
</body>
</html>