<?php
session_start();
if(!isset($_SESSION["mail"])){
    header("location:connexion.php");
}
//on se connecte à mysql  add serv user mdp  bdd
$id = mysqli_connect("localhost","root","","chatbotv1");
if(isset($_POST["bout"])){
    $pseudo = $_POST["pseudo"];
    $message = $_POST["message"];

    $req = "insert into messages (pseudo,message,date)
            values ('$pseudo', '$message', now())";
    //execution de la requete
    mysqli_query($id,$req);
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
    <h3>Bonjour, <?=$_SESSION["prenom"];?></h3>
    <div class="container">
        <header>
            <h1>Chattez'en direct! ChatBox <a href="deconnexion.php">Deco</a></h1>
        </header>
        <div class="messages">
            <ul>
                <?php
                $req = "select * from messages order by date desc";
                $result = mysqli_query($id, $req);
                while($ligne = mysqli_fetch_assoc($result)){
                    echo "<li class='mess'>".$ligne["date"]." -- ".
                    $ligne["pseudo"]." -- ".$ligne["message"]."</li>";
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