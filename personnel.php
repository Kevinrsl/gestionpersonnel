<?php

$id=mysqli_connect("localhost","root","","gestionpersonnel");

try
{
    $bdd = new PDO ('mysql:host=localhost;dbname=gestionpersonnel;charset=utf8','root','');
}
 catch (Exception $e)
{
    die('Erreur : ' .$e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher le personnel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- afficher le personnel groupé par service -->
    <?php
        $recupPersonnels = $bdd->query('SELECT * FROM personnel');
        while ($personnel = $recupPersonnels->fetch()){
            ?>
            <div class="personnel text-center" style="border: 1px solid black;">
                <p> <a>ID : </a> <?= $personnel ["Id_Personnel"]; ?></p>
                <p><a>Nom : </a><?= $personnel ["nom_Personnel"]; ?></p>
                <p><a>Prenom : </a><?= $personnel ["prenom_Personnel"]; ?></p>
                <p><a>Adresse : </a><?= $personnel ["adresse_Personnel"]; ?></p>
                <p><a>Email : </a><?= $personnel ["email_Personnel"]; ?></p>
                <p><a>Numéro mobile : </a><?= $personnel ["num_mobile_Personnel"]; ?></p>
                <p><a>Date de recrutement : </a><?= $personnel ["date_recrutement_Personnel"]; ?></p>
                <a href="supprimer.php?Id_Personnel=<?= $personnel['Id_Personnel']; ?>">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                    Supprimer le membre</button>
                </a>
                <a href="modifier.php?Id_Personnel=<?= $personnel['Id_Personnel']; ?>">
                    <button type="button" class="btn btn-sm btn-outline-secondary ml-1">
                    Modifier le membre</button>
                </a>
            </div>
            <?php
        }
    ?>
</body>
</html>