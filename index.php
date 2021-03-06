<?php

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
    <title>gestionpersonnel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- navbar -->

    <nav class="nav bg-light justify-content-center">
        <a href="ajout.php" class="nav-link text-dark">Ajout d'un nouvel employé</a>
        <a href="personnel.php" class="nav-link text-dark">Modifier / supprimer</a>
        <a href="liste.php" class="nav-link text-dark">Liste des employés</a>
    </nav>

    <section class="accueil bg-dark d-flex w-100 h-100 flex-column justify-content-center align-items-center">
        <h1 class="display-1 text-white text-center">TP Final - Création d'un site web</h1>
        <p class="lead text-center text-white">Essayez de supprimer seulement " Polo Paul " que vous pouvez ajouter automatiquement
        (pour qu'il me reste des employés à la fin quand même). </p>
        <p class="lead mb-5">
            <a href="#PersonnelMois" class="btn btn-lg btn-secondary">Voir les employés du mois</a>
        </p>

    </section>

    <!-- grille responsive -->

    <div class="container py-5 bg-light">

        <h2 id = "PersonnelMois" class="display-4 text-center mb-5">Bravo à nos employés du mois !</h2>

        <div class="row">

            <div class="col-md-4 col-sm-6">
                <div class="card mb-4 shadow-sm">
                    <img src="../assets/ano2.jpg" class="w-100">
                    <div class="card-body">
                        <p class="card-text">
                            Poliux Benoit <br>
                            Benoit a réalisé le plus de ventes ce mois-ci, relation client remarquable !
                        </p>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <a href="liste.php"style="text-decoration:none">Contact</a>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary ml-1">
                                <a href="personnel.php" style="text-decoration:none">Virer</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card mb-4 shadow-sm">
                    <img src="../assets/ano2.jpg" class="w-100">
                    <div class="card-body">
                        <p class="card-text">
                            Vail Julie <br>
                            Très bonne gestion du groupe, Julie sait faire preuve de sang froid, continuez ainsi !
                        </p>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <a href="liste.php"style="text-decoration:none">Contact</a> 
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary ml-1">
                                <a href="personnel.php" style="text-decoration:none">Virer</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card mb-4 shadow-sm">
                    <img src="../assets/ano2.jpg" class="w-100 ">
                    <div class="card-body">
                        <p class="card-text">
                            Maroulo Daniel <br>
                            A résolu le plus de problèmes techniques, toutes mes fécilitations !
                        </p>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <a href="liste.php"style="text-decoration:none">Contact</a>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary ml-1">
                                <a href="personnel.php" style="text-decoration:none">Virer</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</body>
</html>