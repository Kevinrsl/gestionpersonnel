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

// Ajout employé automatiquement

$statement = $bdd->prepare("INSERT INTO personnel(nom_Personnel, prenom_Personnel, adresse_Personnel, email_Personnel, num_mobile_Personnel, date_recrutement_Personnel, Id_Service)
 VALUES(:nom_Personnel, :prenom_Personnel, :adresse_Personnel, :email_Personnel, :num_mobile_Personnel, :date_recrutement_Personnel, :Id_Service)");

if(isset($_POST['ajout'])){
    $statement-> execute([
        "nom_Personnel" => "Polo",
        "prenom_Personnel" => "Paul",
        "adresse_Personnel" => "3 tranche 22155 rotule",
        "email_Personnel" =>"polo.paul@entrepriseY.com",
        "num_mobile_Personnel"=>"0712345678",
        "date_recrutement_Personnel"=>"2022-05-20",
        "Id_Service"=>4
    ]);
    ?> <p class="text-center"> <?php echo "Polo Paul a été ajouté à la base de donnée.";?></p>
<?php
}else{
    ?> <p class="text-center"> <?php echo "Appuyez sur ce bouton pour ajouter Polo Paul";?></p><?php
}


// <!-- // Ajout employé manuellement -->

if(isset($_POST['envoi'])){
    if(!empty($_POST['nom_Personnel']) AND !empty($_POST['prenom_Personnel']) AND !empty($_POST['adresse_Personnel']) AND !empty($_POST['email_Personnel']) AND !empty($_POST['num_mobile_Personnel']) AND !empty($_POST['date_recrutement_Personnel']) AND !empty($_POST['Id_Service'])){
        $nom_Personnel = htmlspecialchars($_POST['nom_Personnel']);
        $prenom_Personnel = htmlspecialchars($_POST['prenom_Personnel']);
        $adresse_Personnel = htmlspecialchars($_POST['adresse_Personnel']);
        $email_Personnel = htmlspecialchars($_POST['email_Personnel']);
        $num_mobile_Personnel = htmlspecialchars($_POST['num_mobile_Personnel']);
        $date_recrutement_Personnel = htmlspecialchars($_POST['date_recrutement_Personnel']);
        $Id_Service = htmlspecialchars($_POST['Id_Service']);

        $insererpersonnel = $bdd->prepare(' INSERT INTO personnel(nom_Personnel, prenom_Personnel, adresse_Personnel, email_Personnel, num_mobile_Personnel, date_recrutement_Personnel, Id_Service)VALUES(?, ?, ?, ?, ?, ?, ?)');
        $insererpersonnel-> execute(array($nom_Personnel, $prenom_Personnel, $adresse_Personnel, $email_Personnel, $num_mobile_Personnel, $date_recrutement_Personnel, $Id_Service));

        echo " L'employé a bien été ajouté";
    }else{
        echo "Veuillez compléter tous les champs...";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un nouvel employé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST" class="text-center">
        <input type="submit" name="ajout" class="btn btn-sm btn-outline-secondary ml-1">
        <br><br>
        <p>Voulez vous ajouter votre propre employé ?</p>
        <p>Nom : </p><input type="text" name="nom_Personnel">
        <br>
        <p>Prenom : </p><input type="text" name="prenom_Personnel">
        <br>
        <p>Adresse : </p><input type="text" name="adresse_Personnel">
        <br>
        <p>Email : </p><input type="text" name="email_Personnel">
        <br>
        <p>Numéro mobile : </p><input type="text" name="num_mobile_Personnel">
        <br>
        <p>Date de recrutement : </p><input type="date" name="date_recrutement_Personnel">
        <br>
        <p>Numéro de service (4-5-6) : </p><input type="int(1)" name="Id_Service">
        <br>
        <br><input type="submit" name="envoi" class="btn btn-sm btn-outline-secondary ml-1">
        
        </class>
    </form>
</body>
</html>