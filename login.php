<?php 
if(!empty($_POST)){
    // Test si formulaire s'envoie bien
    // var_dump($_POST);
   if(isset($_POST["pseudo"], $_POST["pass"])
   && !empty($_POST["pseudo"]) && !empty($_POST["pass"])) {
      require_once "db/connexion.php";

      $sql = "SELECT * FROM `utilisateurs` WHERE `pseudo` = :pseudo";

      $query = $db->prepare($sql);
      $query->bindValue(":pseudo", $_POST["pseudo"], PDO::PARAM_STR);
      $query->execute();

      $user = $query->fetch();

      //TEST PASSWORD

    //   $password = "123456";
    //   $hash = password_hash($password, PASSWORD_BCRYPT);
    //   if(!password_verify($password, $hash)){
    //      die('Ca déconne');
    //   };
    //   var_dump($password, $hash);

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
      header("Location: import.php");

   }
}
?>

<?php include("frontend/template/header.php"); ?>

<div class="container mt-4">
    <form method="post">
        <div class="form-outline mb-4">
            <label for="pseudo">Pseudo</label>
            <input class="form-control" type="text" name="pseudo" id="pseudo"></input>
        </div>
        <div class="form-outline mb-4">
            <label for="pass">Mot de passe</label>
            <input class="form-control" type="password" name="pass" id="pass"></input>
        </div>
        <!-- <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3"/>
                    <label class="form-check-label" for="form1Example3"> Remember me </label>
                </div>
            </div>

            <div class="col">
            <a href="#!">Forgot password?</a>
            </div>
        </div> -->

        <button type="submit">Je me connecte</button>
    </form>
</div>

<?php include("frontend/template/footer.php"); ?>