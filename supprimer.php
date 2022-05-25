<?php


$bdd = new PDO ('mysql:host=localhost;dbname=gestionpersonnel;','root','');

if(isset($_GET['Id_Personnel']) AND !empty($_GET['Id_Personnel'])){
    $getId_Personnel = $_GET['Id_Personnel'];
    $recupPersonnel = $bdd->prepare('SELECT * FROM personnel WHERE Id_Personnel = ?');
    $recupPersonnel->execute(array($getId_Personnel));
    if ($recupPersonnel->rowCount() > 0){
        $deletePersonnel = $bdd->prepare('DELETE FROM personnel WHERE Id_Personnel = ?');
        $deletePersonnel->execute(array($getId_Personnel));
        header('Location: personnel.php');
    }else{
        echo "Aucun personnel n'a été trouvé";
    }
}else{
    echo "Aucun identifiant trouvé";
}

?>