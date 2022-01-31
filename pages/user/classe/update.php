<?php 
define('BASE',$_SERVER['DOCUMENT_ROOT']);



session_start();
if (!$_SESSION['login'] && !$_SESSION['pass'] ) 

header("Location:../../session/login.php") ;
try{

    // recuperer les donnees depuis le lien 
  $id=$_POST['id_classe'];
  $prenom=$_POST['prenom'];
 


//    echo "id est $id";

//    exit();
    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=gesecole', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // preparation de la requete sql
    $r=$cnx->prepare("update  classe set nomclasse=? ,id_classe where id_classe=?");
    //execution de la requete 
    $r->execute([$nomclasse , $id]);
header("location:../user.php");
}catch (PDOException $e) {
    echo "  erreur  ".$e->getMessage() ;
}

?>