<?php
$bdd = new PDO ('mysql:host=localhost;dbname=gestionpersonnel;','root','');
if(isset($_GET['Id_Personnel']) AND !empty($_GET['Id_Personnel'])){
    $getId_Personnel = $_GET['Id_Personnel'];

    $recupPersonnel = $bdd->prepare('SELECT * FROM personnel WHERE Id_Personnel = ?');
    $recupPersonnel->execute(array($getId_Personnel));
    if($recupPersonnel->rowCount() > 0){
        $personnelInfos = $recupPersonnel->fetch();
        $nom_Personnel = $personnelInfos['nom_Personnel'];
        $prenom_Personnel = $personnelInfos['prenom_Personnel'];
        $adresse_Personnel = $personnelInfos['adresse_Personnel'];
        $email_Personnel = $personnelInfos['email_Personnel'];
        $num_mobile_Personnel = $personnelInfos['num_mobile_Personnel'];
        $date_recrutement_Personnel = $personnelInfos['date_recrutement_Personnel'];

        if(isset($_POST['valider'])){
            $nom_saisi = htmlspecialchars($_POST['nom_Personnel']);
            $prenom_saisi = htmlspecialchars($_POST['prenom_Personnel']);
            $adresse_saisie = htmlspecialchars($_POST['adresse_Personnel']);
            $email_saisie = htmlspecialchars($_POST['email_Personnel']);
            $num_saisi = htmlspecialchars($_POST['num_mobile_Personnel']);
            $date_saisie = htmlspecialchars($_POST['date_recrutement_Personnel']);

            $updatePersonnel = $bdd->prepare('UPDATE personnel SET nom_Personnel = ?, prenom_Personnel = ?, adresse_Personnel = ?,
             email_Personnel = ?, num_mobile_Personnel = ?, date_recrutement_Personnel = ? WHERE Id_Personnel = ?');
            $updatePersonnel->execute(array($nom_saisi, $prenom_saisi, $adresse_saisie, $email_saisie, $num_saisi, $date_saisie, $getId_Personnel));

            header('Location: personnel.php');
        }
        
    }else
    {
        echo"Aucun personnel trouvé";
    }

}else{
    echo "Aucun identifiant trouvé";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'employé</title>
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="nom_Personnel" value="<?= $nom_Personnel; ?>">
        <br>
        <input type="text" name="prenom_Personnel" value="<?= $prenom_Personnel; ?>">
        <br>
        <textarea name="adresse_Personnel">
            <?= $adresse_Personnel; ?>
        </textarea>
        <br><br>
        <input type="text" name="email_Personnel" value="<?= $email_Personnel; ?>">
        <br>
        <input type="text" name="num_mobile_Personnel" value="<?= $num_mobile_Personnel; ?>">
        <br>
        <input type="date" name="date_recrutement_Personnel" value="<?= $date_recrutement_Personnel; ?>">
        <br>
        <input type="submit" name="valider">
    </form>
</body>
</html>