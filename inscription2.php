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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription bis</title>
</head>
<body>
    <form method="post">
        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom"></input>
        </div>
        <div>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom"></input>
        </div>
        <div>
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo"></input>
        </div>
        <div>
            <label for="pass">Mot de passe</label>
            <input type="password" name="pass" id="pass"></input>
        </div>
        <button type="submit">Je m'inscris</button>
    </form>
</body>
</html>