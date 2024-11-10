<?php 

//connexion à la base de donnée
$id = mysqli_connect("localhost","root","","chatbotv1");

if (isset($_POST["bout"])) {
    $pseudo = $_POST["pseudo"];
    $message = $_POST["message"];
    
    $req = "INSERT INTO message (pseudo,message,date) values ('$pseudo','$message',NOW() )" ;

    //exécution de la requete
    mysqli_query($id, $req);

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
    <div class="container">
        <header>
            <h1>Chattez'en direct! Chatbox ---- <a href="raz.php">RAZ</a></h1>
            <h3><button style="height:30px; width:70px;border-radius:20px;"><a href="inscription.php">inscription</a></button></h3>
            
        </header>
        <div class="messages">
            <ul>
                <li class="mess">2024-10-08 12:43:31 - Guez: Salut</li>
                <li class="mess">2024-10-08 12:43:31 - Guez: Salut</li>
                <li class="mess">2024-10-08 12:43:31 - Guez: Salut</li>
                <?php if (isset($_POST["bout"])) {
                    
                    $sql = "SELECT * FROM message";
                    $result = mysqli_query($id, $sql);

                    while($ligne = mysqli_fetch_assoc($result)){
                        echo "<li class='mess'>".$ligne["date"].": ".$ligne["pseudo"].": ".$ligne["message"]." </li> <br>";
                    }
                    
                } ?>
            </ul>
        </div>
        <div class="formulaire">
            <form action="" method="post">
                <input type="text" name="pseudo" placeholder="Pseudo" value="<?php if (isset($_POST["bout"])) {echo "$pseudo";} ?>" require>
                <input type="text" name="message" placeholder="Message" value="<?php if (isset($_POST["bout"])) {echo "$message";} ?>" require><br>
                <input type="submit" value="ENVOYER" name="bout">
            </form>
                


        </div>
    </div>
</body>
</html>


