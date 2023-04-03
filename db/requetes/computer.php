<?php

// On inclut la connexion à la base
require_once('db/connexion.php');

// On écrit notre requête
$sql = 'SELECT * FROM `computer`';

// On prépare la requête
$query = $db->prepare($sql);

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);

?>