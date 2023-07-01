<?php
include("connexion.php");
if(isset($_POST['ajouter'])){
  
  // récupérer les valeurs 
  $Nom_salle = $_POST['Nom_salle'];
  // Requête mysql pour insérer des données
  $sql = "INSERT INTO `salle`(`Nom_salle`) VALUES (:Nom_salle)";
  $res = $conn->prepare($sql);
  $exec = $res->execute(array(":Nom_salle"=>$Nom_salle));
  // vérifier si la requête d'insertion a réussi
  if($exec){
    
    header('Location: salle.php');
    echo 'Données insérées';
    
    
  }else{
    
    header('Location: salle.php');
    echo "Échec de l'opération d'insertion";
  }
}

if(isset($_POST['modifier'])){
  
  $ID_salle = $_POST['ID_salle'];
  $Nom_salle = $_POST['Nom_salle'];
  
 
  $sql = "UPDATE salle SET Nom_salle = :Nom_salle WHERE ID_salle = :ID_salle";
  $res = $conn->prepare($sql);
  $exec = $res->execute(array(":Nom_salle"=>$Nom_salle,":ID_salle"=>$ID_salle));
  // vérifier si la requête d'insertion a réussi
  if($exec){
    
    header('Location: salle.php');
    echo 'Données insérées';
    
    
  }else{
    
    header('Location: salle.php');
    echo "Échec de l'opération d'insertion";
  }
}

if(isset($_POST['supprimer'])){
  
   
  $ID_salle = $_POST['ID_salle'];
  
  // Requête mysql pour insérer des données
  $sql = "DELETE FROM `salle` WHERE `ID_salle` = :ID_salle";
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':ID_salle', $ID_salle);
  $res = $stmt->execute();


    header('Location: salle.php');

}
?>