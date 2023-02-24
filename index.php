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

?>

<?php include("frontend/template/header.php"); ?>
<?php include("frontend/template/navbar.php"); ?>

<div class="container">    
    <table class="table">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Prix</th>
            <th scope="col">Stock</th>
            <th scope="col">Actions</th>
        </thead>
        <tbody>
        <?php
            foreach($result as $row){
        ?>
                <tr>
                    <td scope="row"><?= $row['id'] ?></td>
                    <td scope="row"><?= $row['nom'] ?></td>
                    <td scope="row"><?= $row['ecole'] ?></td>
                    <td scope="row"><?= $row['age'] ?></td>
                    <td scope="row"><a href="read.php?id=<?= $row['id'] ?>"><i class="fa-solid fa-eye p-1"></i></a>  <a href="update.php?id=<?= $row['id'] ?>"><i class="fa-solid fa-pencil px-3 p-1"></i></a>  <a href="delete.php?id=<?= $row['id'] ?>"><i class="fa-solid fa-trash-can p-1"></i></a></td>
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
    <a href="create.php">Ajouter</a>
</div>

<?php include("frontend/template/footer.php"); ?>