<?php 
try{

    // recuperer les donnees depuis le lien 
  $id_etudiant=$_GET['id_etudiant'];
  //echo "id_etudiant  est $id_etudiant";

  // exit();
    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=gesecole', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // preparation de la requete sql
    $r=$cnx->prepare("delete from etudiant where id_etudiant=?");
    //execution de la requete 
    $r->execute([$id_etudiant]);
    header("location:../user.php");
}catch (PDOException $e) {
    echo "  erreur de suppression de l'etudiant  ".$e->getMessage() ;
}

?>