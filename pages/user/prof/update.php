<?php 
try{
    

define('BASE',$_SERVER['DOCUMENT_ROOT']);



session_start();
if (!$_SESSION['login'] && !$_SESSION['pass'] ) 

header("Location:../../session/login.php") ;


    // recuperer les donnees depuis le lien 
  $id=$_POST['id'];
  $prenom=$_POST['prenom'];
  $nom=$_POST['nom'];
  $email=$_POST['email'];
  $pass=$_POST['pass'];



//    echo "id est $id";

//    exit();
    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=gesecole', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // preparation de la requete sql
    $r=$cnx->prepare("update  prof set prenom=?, nom=?, email=?, pass=? where ID_PROF=?");
    //execution de la requete 
    $r->execute([$prenom,$nom,$email, $pass,$id]);
("location:index.php");
}catch (PDOException $e) {
    echo "  erreur  ".$e->getMessage() ;
}

?>