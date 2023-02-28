<?php
   try{
      $db = new PDO("mysql:host=localhost;dbname=phpcrud","root","");
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?>