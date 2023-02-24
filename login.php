<?php 
if(!empty($_POST)){
    // Test si formulaire s'envoie bien
    // var_dump($_POST);
   if(isset($_POST["pseudo"], $_POST["pass"])
   && !empty($_POST["pseudo"]) && !empty($_POST["pass"])) {
      require_once "connexion.php";

      $sql = "SELECT * FROM `utilisateurs` WHERE `pseudo` = :pseudo";

      $query = $db->prepare($sql);
      $query->bindValue(":pseudo", $_POST["pseudo"], PDO::PARAM_STR);
      $query->execute();

      $user = $query->fetch();

      //TEST PASSWORD

      // $password = "123456";
      // $hash = password_hash($password, PASSWORD_BCRYPT);
      // if(!password_verify($password, $hash)){
      //    die('Ca déconne');
      // };
      // var_dump($password, $hash);

      //

      if(!$user){
         die("L'utilisateur et/ou le mot de passe est incorrect !");
      }
      // Vérification du mot de passe
      if(!password_verify($_POST["pass"], $user["pass"])){
         die("L'utilisateur et/ou le mot de passe est incorrect !");
      }

      session_start();

      $_SESSION["user"] = [
         "id" => $user["id"],
         "pseudo" => $user["pseudo"]
      ];

      // On redirige
      header("Location: index2.php");

   }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <form method="post">
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo"></input>
        </div>
        <div>
            <label for="pass">Mot de passe</label>
            <input type="password" name="pass" id="pass"></input>
        </div>
        <button type="submit">Je me connecte</button>
    </form>
</body>
</html>