

<?php
//mon fichier de routage -->
require_once("./api.php");
/* recupérer les demandes */
try {
    if(!empty($_GET['demande'])){
        $url = explode("/", filter_var($_GET['demande'],FILTER_SANITIZE_URL));
        switch($url[0]){
            case "appoints" :
                if (empty($url[1])) {
                    getAppoints();
                }else {
                    getAppointById($url[1]);
                }
                break;
                case "appoint" :
                    if (!empty($url[1])) {
                        getAppointById($url[1]);
                    }
                    else {
                        throw new Exception ("Vous n'avez pas renseigné l'id de l'appoint");
                    }
                break;
                default : throw new Exception ("la demande n'est pas valide, vérifiez l'url");
        }
    }else {
        throw new Exception ("Probleme de recupération");
    }
} catch (Exception $e) {
    $erreur =[
        "message" => $e->getMessage(),
        "code" => $e->getCode()
    ];
    print_r($erreur);
}

