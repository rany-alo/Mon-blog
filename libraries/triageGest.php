<?php
    require_once "database.php";     
// Ce fichier va se connecter à la base de données, récupérer les données et les envoyer en json 

header('Content-type: application/json');
 $db = getdb();
 $gest = $_GET['id_gestionaire'];
try {
    $rqt = "SELECT * FROM passage join users on 
    passage.id_gestionaire = users.id WHERE passage.id_gestionaire = :gest;";
    $rqtPreparee = $db->prepare($rqt); 
    $rqtPreparee->bindParam('gest', $gest);
    $rqtPreparee->execute(); 
    $resultats = $rqtPreparee->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultats);
} catch(Exception $e)  {
    echo json_encode(["error" => $e->getMessage()]);
}
?>