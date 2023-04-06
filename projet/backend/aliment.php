<?php

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
  case 'GET':
    if(!empty($_GET["id"]))
    {
      $id = $_GET["id"];
      getAliment($id);
    }
    else{
      getAliment();
    }
    break;
  case 'POST':
    addAliment();
    break;

  default:
    // Requête invalide
    header("HTTP/1.0 405 Method Not Allowed");
    break;
}

function getAliment($id =null){
    require_once('init_pdo.php');
    if ($id === null) {
      $query = $pdo->prepare("SELECT * FROM aliments ");
      $query->execute();
      $aliments = $query->fetchAll();
      foreach($aliments as $aliment){
        $query = $pdo->prepare("SELECT nom FROM type WHERE id = ? ");
        $query->execute([$aliment["id_type"]]);
        $type=$query->fetch();
        $query = $pdo->prepare("SELECT quantité FROM contient WHERE id_alim = ? and id_nut=136 ");
        $query->execute([$aliment["id"]]);
        $kcal=$query->fetch();
        $query = $pdo->prepare("SELECT quantité FROM contient WHERE id_alim = ? and id_nut=141 ");
        $query->execute([$aliment["id"]]);
        $proteines=$query->fetch();
        $query = $pdo->prepare("SELECT quantité FROM contient WHERE id_alim = ? and id_nut=142 ");
        $query->execute([$aliment["id"]]);
        $glucides=$query->fetch();
        $query = $pdo->prepare("SELECT quantité FROM contient WHERE id_alim = ? and id_nut=143 ");
        $query->execute([$aliment["id"]]);
        $lipides=$query->fetch();
        $data=array(
          'nom_alim' => $aliment['nom'],
          'nom_type' => $type['nom'],
          'kcal'    => $kcal,
          'proteine' => $proteines,
          'glucide' => $glucides,
          'lipides' => $lipides
        );

        $datas[]=$data;
      }
      $res=array("data" => $datas);
      header('Content-Type: application/json');
      echo json_encode($res, JSON_PRETTY_PRINT);
    } else {
    $query = $pdo->prepare("SELECT * FROM aliments WHERE id = ?");
    $query->execute([$id]);
    $response=array();
    $aliment = $query->fetch();
    $query = $pdo->prepare("SELECT nom FROM type WHERE id = ? ");
        $query->execute([$aliment["id_type"]]);
        $type=$query->fetch();
        $query = $pdo->prepare("SELECT quantité FROM contient WHERE id_alim = ? and id_nut=136 ");
        $query->execute([$aliment["id"]]);
        $kcal=$query->fetch();
        $query = $pdo->prepare("SELECT quantité FROM contient WHERE id_alim = ? and id_nut=141 ");
        $query->execute([$aliment["id"]]);
        $proteines=$query->fetch();
        $query = $pdo->prepare("SELECT quantité FROM contient WHERE id_alim = ? and id_nut=142 ");
        $query->execute([$aliment["id"]]);
        $glucides=$query->fetch();
        $query = $pdo->prepare("SELECT quantité FROM contient WHERE id_alim = ? and id_nut=143 ");
        $query->execute([$aliment["id"]]);
        $lipides=$query->fetch();
        $data=array(
          'nom_alim' => $aliment['nom'],
          'nom_type' => $type['nom'],
          'kcal'    => $kcal,
          'proteine' => $proteines,
          'glucide' => $glucides,
          'lipides' => $lipides
        );

        $datas[]=$data;
      }
      $res=array("data" => $datas);
      header('Content-Type: application/json');
      echo json_encode($res, JSON_PRETTY_PRINT);
}
function addAliment(){
  require_once('init_pdo.php');
    $nom =  $_POST['nom'];
    $type = $_POST['type'];
    $sql = "INSERT INTO aliments(nom,id_type)  VALUES ('$nom','$type')";
    $test=$pdo->prepare($sql)->execute();
    if ($test)
    {$response=array(
        'status' => 1,
        'status_message' =>'Aliment ajoute avec succes.'
      );}
 else
     {$response=array(
        'status' => 0,
        'status_message' =>'Erreur de la requête.'
      );
    }
     header('Content-Type: application/json');
     echo json_encode($response);
}
?>