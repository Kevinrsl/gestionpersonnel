<?php
$user='root';
$pass='';
$db='gestionpersonnel';
$db=new mysqli ('localhost',$user,$pass,$db)
or die ("impossible de se connecter");

$personnels = $db->query("SELECT * FROM personnel ORDER BY Id_service ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listePersonnel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="display-1 text-center">Liste du personnel</h1><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse</th>
                <th>Email</th>
                <th>NuméroTel</th>
                <th>Date recrutement</th>
                <th>ID service</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($personnels as $personnel): ?>
            <tr>
                <td>#<?= $personnel['Id_Personnel'] ?></td>
                <td><?= $personnel['nom_Personnel'] ?></td>
                <td><?= $personnel['prenom_Personnel'] ?></td>
                <td><?= $personnel['adresse_Personnel'] ?></td>
                <td><?= $personnel['email_Personnel'] ?></td>
                <td><?= $personnel['num_mobile_Personnel'] ?></td>
                <td><?= $personnel['date_recrutement_Personnel'] ?></td>
                <td><?= $personnel['Id_Service'] ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>

    </table>
</body>
</html>