<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Liste des utilisateurs</h1><hr>
    <table>
        <tr>
            <th> # </th><th>Nom</th><th>Prénom</th><th>Mail</th><th>Niveau</th>
            <th> Avatar </th>
            <th><img src="modif.jfif" width="30"></th>
            <th><img src="sup.jpg" width="30"></th>
        </tr>
    <?php
    include "connect.php";
    $req = "SELECT * FROM users";
    $res = mysqli_query($id, $req);
    while($ligne = mysqli_fetch_assoc($res)){
        echo "<tr>
                <td>".$ligne["idu"]."</td>
                <td>".$ligne["nom"]."</td>
                <td>".$ligne["prenom"]."</td>
                <td>".$ligne["mail"]."</td>
                <td>".$ligne["niveau"]."</td>
                <td><img src='avatar/".$ligne["avatar"]."' width='30'></td>
                <td><a href='modif.php?idu=".$ligne["idu"]."'><img src='modif.jfif' width='22'></a></td>
                <td><a href='sup.php?idu=".$ligne["idu"]."'><img src='sup.jpg' width='22'></a></td>
                
            </tr>";
    }
    ?>
    </table>
</body>
</html>