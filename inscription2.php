<?php 
if(!empty($_POST)){
    // Test si formulaire s'envoie bien
    // var_dump($_POST);

    if(isset($_POST["nom"], $_POST["prenom"], $_POST["pseudo"], $_POST["pass"]) 
    && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["pseudo"]) && !empty($_POST["pass"])){
        // Formulaire complet
        // On va récupérer les données en les protégeant
        $nom = strip_tags($_POST["nom"]);
        $prenom = strip_tags($_POST["prenom"]);
        $pseudo = strip_tags($_POST["pseudo"]);
        $pass = password_hash($_POST["pass"], PASSWORD_BCRYPT);

        require_once "connexion.php";
        $sql = "INSERT INTO `utilisateurs` (`nom`, `prenom`, `pseudo`, `pass`) VALUES (:nom, :prenom, :pseudo, '$pass')";
        $query = $db->prepare($sql);
        $query->bindValue(":nom", $nom, PDO::PARAM_STR);
        $query->bindValue(":prenom", $prenom, PDO::PARAM_STR);
        $query->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        $query->execute();

        header("Location: index.php");

    }else{
        die("Le formulaire est incomplet !");
    }
}
?>

<?php include("frontend/template/header.php"); ?>

    <div class="container-fluid d-flex align-items-center flex-column mt-4">
        <form method="post">
            <div class="form-outline mb-4">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" placeholder="Entrer votre nom "></input>
            </div>
            <div class="form-outline mb-4">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Entrer votre prenom "></input>
            </div>
            <div class="form-outline mb-4">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Entrer votre pseudo "></input>
            </div>
            <div class="form-outline mb-4">
                <label for="pass">Mot de passe</label>
                <input type="password" name="pass" id="pass" class="form-control" placeholder="Entrer votre mot de passe "></input>
            </div>
            <div class="row mb-4">
                <div class="col d-flex justify-content-center mb-2">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                        <label class="form-check-label" for="form1Example3"> Se souvenir de moi </label>
                    </div>
                </div>
            <button type="submit" class="btn btn-primary btn-block">Je m'inscris</button>
        </form>
    </div>

<?php include("frontend/template/footer.php"); ?>