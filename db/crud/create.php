<?php
/* Inclure le fichier config */
require_once('../connexion.php');

if(!empty($_POST)){
    //$_POST n'est pas vide.
    if(isset($_POST["title"], $_POST["purchase_date"], $_POST["description"], $_POST["usability"]) 
    && !empty($_POST["title"]) 
    && !empty($_POST["purchase_date"]) 
    && !empty($_POST["description"])
    && !empty($_POST["usability"])
    ){
        //FORM complet
        //Protection failles XSS

        $title = strip_tags($_POST["title"]);
        $date_achat = $_POST["purchase_date"];
        $caracteristiques = htmlspecialchars($_POST["description"]);
        $usability = $_POST["usability"];

        var_dump($usability);
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .wrapper{
            width: 700px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Rajouter un ordinateur</h2>
                    <p>Remplir le formulaire pour enregistrer un nouvel ordinateur dans la base de données</p>

                    <form method="post">
                        <div class="form-group">
                            <label>Titre</label>
                            <textarea name="title" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Date d'acquisition</label>
                            <input type="date" name="purchase_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Caractéristiques</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="form-group">
                            <h2>Utilisable ?</h2>
                            <input type="radio" id="yes" name="usability" value="1">
                            <label for="yes">Oui</label><br>
                            <input type="radio" id="no" name="usability" value="0">
                            <label for="no">Non</label><br>
                        </div>
                        <div class="form-group mt-4">
                            <input type="submit" class="btn btn-primary" value="Enregistrer">
                            <a href="../../index.php" class="btn btn-secondary ml-2">Annuler</a>
                        </div>
                    </form>

                </div>
            </div>        
        </div>
    </div>
</body>
</html>