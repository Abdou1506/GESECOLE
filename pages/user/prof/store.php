<?php
//connexion bd
try{
$prenom=$_POST['prenom'];
$nom=$_POST['nom'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$role=$_POST['role'];


$cnx=new PDO("mysql:host=localhost;dbname=gesecole", "root","");
$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//preparation de la requette sql
$r=$cnx->prepare("insert into prof (prenom,nom,email,pass,role) values(?,?,?,?,?)");
//ouverture de la connexion
$r->execute([$prenom,$nom,$email,$pass,$role]);
header("location:index.php?m=ok");
} catch (PDOException $e) {
    echo 'erreur d\'ajout : ' . $e->getMessage();
} 

?>