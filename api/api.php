<?php
$pdo = getConnexion();
function getAppoints(){
    $pdo = getConnexion();
    $req = "SELECT * FROM appoint";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $appoints = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    sendJSON($appoints);
}

function getAppointById($id){
    $pdo = getConnexion();
    $req = "SELECT * FROM appoint WHERE id = :id";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
    $appoint = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    sendJSON($appoint);
    
}
function insertAppoint(){
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = filter_input(INPUT_POST, "name");
        $email = filter_input(INPUT_POST, "email");
        $title = filter_input(INPUT_POST, "title");
        $date1 = strtr($_REQUEST['date'], '/', '-');
        $date = date('Y-m-d', strtotime($date1));
        $time = filter_input(INPUT_POST, "time");
        $pdo = getConnexion();
        $req = "INSERT INTO appoint (name, title, email, date, time) VALUES(:name, :title, :email, :date, :time)";
        $stmt = $pdo->prepare($req);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $stmt->execute([
            ":name" => $name,
            ":email" => $email,
            ":title" => $title,
            ":date" => $date,
            ":time" => $time
        ]);
        http_response_code(302); 
        header('Location: ../index.html');
        exit();
    }
}

function getConnexion(){
    return new PDO("mysql:host=localhost:3306;dbname=appointment", "root", "");
}

function sendJSON($infos){
    header("Access-control-Allow-Origin: *");
    header("Content-Type: application/json");
    echo json_encode($infos,JSON_UNESCAPED_UNICODE);
    
}