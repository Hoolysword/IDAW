<?php

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
  case 'GET':
    if(!empty($_GET["login"]))
    {
      $id = $_GET["login"];
      $mdp = $_GET["mdp"];
      verifyUser($id,$mdp);
    }else{
    }
    break;

  default:
    // Requête invalide
    header("HTTP/1.0 408 Method Not Allowed");
    break;
}

function verifyUser($login,$mdp){
    require_once('init_pdo.php');

        $query = $pdo->prepare("SELECT *
        FROM users
        WHERE login = ? ");
    
    $query->execute([$login]);
    $response = $query->fetchAll();
    if($response[0]["mdp"]==$mdp){
        $response = array(
            'status' => 1,
            'status_message' => 'Utilisateur authentifié  avec succes.'
          );
    }
    else{
        $response = array(
            'status' => 1,
            'status_message' => 'Utilisateur authentifié  avec succes.'
          );
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}