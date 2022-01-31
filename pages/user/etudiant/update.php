<?php 
try{

    // recuperer les donnees depuis le lien 
  $id=$_POST['id_etudiant'];
  $prenom=$_POST['prenom'];
  $nom=$_POST['nom'];
  $email=$_POST['email'];
  $pass=$_POST['pass'];
$id_classe=$_POST['id_classe'];


//    echo "id est $id";

//    exit();
    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=gesecole', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // preparation de la requete sql
    $r=$cnx->prepare("update  etudiant set prenom=?, nom=?, email=?, pass=?, id_classe=? where id_etudiant=?");
    //execution de la requete 
    $r->execute([$prenom,$nom,$email, $pass, $id_classe, $id ]);
header("location:../user.php");
}catch (PDOException $e) {
    echo "  erreur  ".$e->getMessage() ;
}

?>