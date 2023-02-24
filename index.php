<?php

// On inclut la connexion à la base
require_once('connexion.php');

// On écrit notre requête
$sql = 'SELECT * FROM `students`';

// On prépare la requête
$query = $db->prepare($sql);

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('deconnexion.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
</head>
<body>

    <h1>Liste des produits</h1>
    <table>
        <thead>
            <th>ID</th>
            <th>Nom</th>
            <th>Ecole</th>
            <th>Age</th>
            <th>Actions</th>
        </thead>
        <tbody>
        <?php
            foreach($result as $row){
        ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['produit'] ?></td>
                    <td><?= $row['prix'] ?></td>
                    <td><?= $row['nombre'] ?></td>
                    <td><a href="read.php?id=<?= $row['id'] ?>">Voir</a>  <a href="update.php?id=<?= $row['id'] ?>">Modifier</a>  <a href="delete.php?id=<?= $row['id'] ?>">Supprimer</a></td>
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
    <a href="create.php">Ajouter</a>
</body>
</html>