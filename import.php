<?php

require_once('db/connexion.php');

if(isset($_FILES['file'])){
    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];

    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));
    //Tableau des extensions que l'on accepte
    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
    $maxSize = 400000;

    if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
        $uniqueName = uniqid('', true);
        //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
        $file = $uniqueName.".".$extension;
        //$file = 5f586bf96dcd38.73540086.jpg

        $query = $db->prepare('INSERT INTO `file` (name) VALUES (?)');
        $query->execute([$file]);

        echo "Image enregistrée";
    }
    else{
        echo "Une erreur est survenue";
    }
}

?>

<?php include("frontend/template/header.php"); ?>
<?php include("frontend/template/navbar.php"); ?>

<div class="container">
    <div class="row d-flex justify-content-between">
        <div class="card mt-4" style="width: 18rem;">
            <div class="dot">
                <span>1</span>
            </div>
            <div class="card-body">
                <h5 class="card-title">Vos papiers</h5>
                <p class="card-text">Munissez-vous de votre carte grise, de votre eprmis, ainsi que de votre attestation d'assurance.</p>
                <i class="fa-solid fa-address-card fa-2xl"></i>
            </div>
        </div>
        <div class="card mt-4" style="width: 18rem;">
            <div class="dot">
                <span>2</span>
            </div>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card mt-4" style="width: 18rem;">
            <div class="dot">
                <span>3</span>
            </div>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">    
    <div class="file">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">Fichier</label>
                <input class="form-control-file" type="file" name="file">
            </div>
            <button type="submit">Enregistrer</button>
        </form>
    </div>
</div>

<?php include("frontend/template/footer.php"); ?>