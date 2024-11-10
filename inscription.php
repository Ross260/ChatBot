
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>


  <style>
    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #f4f4f4;
    }
    .form-container {
      width: 400px;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .form-group {
      margin-bottom: 15px;
    }
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 90%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    button {
      width: 100%;
      padding: 10px;
      background-color: #28a745;
      border: none;
      color: white;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
    }
    button:hover {
      background-color: #218838;
    }
  </style>


</head>
<body>

    <div class="form-container">
    <h1>Formulaire d'inscription</h1>

<?php 

//connexion à la base de donnée
$id = mysqli_connect("localhost","root","","chatbotv1");

if (isset($_POST["send"])) {

    $prenom = $_POST["first_name"];
    $nom = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $req = "select * from user where email = '$email' ";
    $res = mysqli_query($id, $req);
    if (mysqli_num_rows($res) == 0) {
        $req = "INSERT INTO user (nom_user,prenom_user,password_user,email) values ('$nom','$prenom','$password','$email')" ;
        
        //exécution de la requete
        mysqli_query($id, $req);
        echo "<p style='color:green'>Incription avec succes</p>";
        header("refresh:3;url=connexion.php");
    }else{
        echo "<p style='color:red'>L'inscription a échoué ! Ce mail est déja utiliser par un compte";
    }

}

?>

    <br><br>
  <form action="" method="POST">
    <div class="form-group">
      <label for="first-name">First Name</label>
      <input type="text" id="first-name" name="first_name" required>
    </div>

    <div class="form-group">
      <label for="last-name">Last Name</label>
      <input type="text" id="last-name" name="last_name" required>
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
    </div>

    <button type="submit" name="send">Register</button>
    
    <br>
 
        <?php
        // if (isset($_POST["send"])) {
        //     if(mysqli_query($id, $req)){
        //         echo "<p style='color:green'>Incription avec succes</p>";
        //         header("refresh:3;url=connexion.php");
        //     }else {
        //         echo "<p style='color:red'>l'inscription a échoué";
                
        //     }
        // }
        ?>
   
  </form>
</div>

</body>
</html>
