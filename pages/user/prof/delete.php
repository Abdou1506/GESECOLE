<?php 
try{

    // recuperer les donnees depuis le lien 
  $id_prof=$_GET['id_prof'];
  //echo "id_prof  est $id_prof";

  // exit();
    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=gesecole', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // preparation de la requete sql
    $r=$cnx->prepare("delete from prof where id_prof=?");
    //execution de la requete 
    $r->execute([$id_prof]);
    header("location:index.php");
}catch (PDOException $e) {
    echo "  erreur de suppression de l'etudiant  ".$e->getMessage() ;
}

?>