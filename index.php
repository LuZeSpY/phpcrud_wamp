<?php include("frontend/template/header.php"); ?>
<?php include("frontend/template/navbar.php"); ?>

<div class="container-fluid">

<h1 class="text-center my-4">Gestion du parc informatique</h1>

    <div class="d-flex align-items-center">
        <h2>Ordinateurs complets</h2>
        <a class="mx-2" href="db/crud/create.php"><i class="fa-solid fa-plus" style="color: #008000;"></i></a>
    </div>
    <div class="computer mb-4 d-flex">
        <?php
            require_once('db/requetes/computer.php');
            foreach($result as $row){
        ?>
        <div class="col-lg-3 col-md-4">
            <div class="card">
                <?php 
                    if( $row['utilisable'] == 0 ){
                        echo '<span class="badge badge-success mb-2">Utilisable</span>';
                    }else{
                        echo '<span class="badge badge-warning mb-2">À réparer</span>';
                    }
                ?>
                <div class="card-body">
                    <h5 class="card-title"><?= $row['titre'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Date d'acquisition : <?= $row['date_acquisition'] ?></h6>
                    <p class="card-text"><?= $row['date_acquisition'] ?></p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>

        </div>
        <?php } ?>
    </div>

    <h2>Écrans</h2>
    <a href="db/crud/create.php">Ajouter</a>
    <div class="computer">    
        <table class="table">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Date d'acquisition</th>
                <th scope="col">Marque</th>
                <th scope="col">Taille de l'écran</th>
                <th scope="col">Caractéristiques</th>
                <th scope="col">Actions</th>
            </thead>
            <tbody>
            <?php
                require_once('db/requetes/screen.php');
                foreach($result as $row){
            ?>
                    <tr>
                        <td scope="row"><?= $row['id'] ?></td>
                        <td scope="row"><?= $row['date_acquisition'] ?></td>
                        <td scope="row"><?= $row['marque'] ?></td>
                        <td scope="row"><?= $row['taille'] ?></td>
                        <td scope="row"><?= $row['caracteristiques'] ?></td>
                        <td scope="row"><a href="db/crud/read.php?id=<?= $row['id'] ?>"><i class="fa-solid fa-eye p-1"></i></a>  <a href="db/crud/update.php?id=<?= $row['id'] ?>"><i class="fa-solid fa-pencil px-3 p-1"></i></a>  <a href="db/crud/delete.php?id=<?= $row['id'] ?>"><i class="fa-solid fa-trash-can p-1"></i></a></td>
                    </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    </div>

    <h2>Pièces détachées</h2>

</div>

<?php include("frontend/template/footer.php"); ?>