<?php
$engine = "mysql";
$host = "localhost";
$port = 3306;
$dbname = "appointment";
$username = "root";
$password = "";
$pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);

$maRequete = $pdo->prepare("SELECT * FROM appoint");
// Etape 2 : On exécute la requête
$maRequete->execute();
// Etape 3 : Si c'est un SELECT, on récupère LE (fetch) ou LES (fetchAll) résultatS
// PDO::FETCH_ASSOC va ramener uniquement les noms de colonnes
$appoints = $maRequete->fetchAll(PDO::FETCH_ASSOC);
?>