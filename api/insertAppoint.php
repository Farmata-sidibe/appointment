<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, "name");
    $email = filter_input(INPUT_POST, "email");
    $title = filter_input(INPUT_POST, "title");
    $date1 = strtr($_REQUEST['date'], '/', '-');
    $date = date('Y-m-d', strtotime($date1));
    $time = filter_input(INPUT_POST, "time");

    // Créer des variables et les utiliser entre les parenthèses de PDO
    $engine = "mysql";
    $host = "localhost";
    $port = 3306;
    $dbname = "appointment";
    $username = "root";
    $password = "";
    $pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);

    // Etape 1 : Préparer la requête
    $maRequete = $pdo->prepare("INSERT INTO appoint (name, title, email, date, time) VALUES(:name, :title, :email, :date, :time)");
    // Etape 2 : Exécuter la requête
    $maRequete->execute([
        ":name" => $name,
        ":email" => $email,
        ":title" => $title,
        ":date" => $date,
        ":time" => $time

    ]);
  
    http_response_code(302); 
    header('Location: ../index.html');
    exit();
} else {
  
}
?>