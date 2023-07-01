<?php
include("connexion.php");
if(isset($_POST['ajouter'])){
  
  // récupérer les valeurs 
  $Nom_exam = $_POST['Nom_exam'];
  $ID_mdl = $_POST['ID_mdl'];
  $date_d = $_POST['date_debut'];
  $date_debut = date("Y-m-d H:i:s",strtotime($date_d));
  // Requête mysql pour insérer des données
  $sql = "INSERT INTO `exam`(`Nom_exam`, `ID_mdl`, `date_debut`) VALUES (:Nom_exam,:ID_mdl,:date_debut)";
  $res = $conn->prepare($sql);
  $exec = $res->execute(array(":Nom_exam"=>$Nom_exam,":ID_mdl"=>$ID_mdl,":date_debut"=>$date_debut));
  // vérifier si la requête d'insertion a réussi
  if($exec){
    
    header('Location: exam.php');
    echo 'Données insérées';
    
    
  }else{
    
    header('Location: exam.php');
    echo "Échec de l'opération d'insertion";
  }
}

if(isset($_POST['modifier'])){
  
  $ID_exam = $_POST['ID_exam'];
  $Nom_exam = $_POST['Nom_exam'];
  $ID_mdl = $_POST['ID_mdl'];
  $date_d = $_POST['date_debut'];
  $date_debut = date("Y-m-d H:i:s",strtotime($date_d));
  
  $sql = "UPDATE exam SET Nom_exam = :Nom_exam, ID_mdl = :ID_mdl, date_debut = :date_debut WHERE ID_exam = :ID_exam";
  $res = $conn->prepare($sql);
  $exec = $res->execute(array(":Nom_exam"=>$Nom_exam,":ID_mdl"=>$ID_mdl,":date_debut"=>$date_debut,":ID_exam"=>$ID_exam));
  
  if($exec){
    
    header('Location: exam.php');
    echo 'Données insérées';
    
    
  }else{
    
    header('Location: exam.php');
    echo "Échec de l'opération d'insertion";
  }
}

if(isset($_POST['supprimer'])){
  
  
  $ID_exam = $_POST['ID_exam'];
  
  $sql = "DELETE FROM `exam` WHERE `ID_exam` = :ID_exam";
  $res = $conn->prepare($sql);
  $exec = $res->execute(array(":ID_exam"=>$ID_exam));
  
 
    
    header('Location: exam.php');
}
?>