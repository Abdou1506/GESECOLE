<?php 
try{

    // recuperer les donnees depuis le lien 
  $id_classe=$_GET['id_classe'];
  //echo "id_etudiant  est $id_etudiant";

  // exit();
    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=gesecole', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // preparation de la requete sql
    $r=$cnx->prepare("delete from classe where id_classe=?");
    //execution de la requete 
    $r->execute([$id_classe]);
    header("location:../user.php");
}catch (PDOException $e) {
    echo "  erreur de suppression de la classe  ".$e->getMessage() ;
}

?>